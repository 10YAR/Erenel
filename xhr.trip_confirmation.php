<?php
date_default_timezone_set('Europe/Paris');
require_once "vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Telegram;
use SendinBlue\Client\Model\CreateContact;
use SendinBlue\Client\Model\SendSmtpEmail;

// Demande de réservation
if (isset($_GET['action']) && $_GET['action'] === 'book') {
   $depart = $_POST['depart'];
   $arrivee = $_POST['arrivee'];

   $depart_id = $_POST['depart_id'];
   $arrivee_id = $_POST['arrivee_id'];

   $date = $_POST['date'];
   $time = $_POST['time'];

   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];

   $price = $_POST['price'];
   $type = $_POST['type'];
   $distance = $_POST['distance'];
   $nb_heure = $_POST['nb_heure'];
   $nb_passagers = $_POST['nb_passagers'];
   $nb_bagages = $_POST['nb_bagages'];

    try {
        sendTelegramBooking($name, $phone, $email, $date, $time, $price, $type, $nb_passagers, $nb_bagages, $depart, $arrivee, $depart_id, $arrivee_id, $distance, $nb_heure);
        echo '{"status": "success"}';
    } catch (TelegramException $e) {
        echo '{"status": "error"}';
    }
    createSendinblueContact($name, $email, $phone);
}

if (isset($_GET['action']) && $_GET['action'] === 'accept' && !empty($_GET['token'])) {
    $datas = getBooking($_GET['token']);
    $message = "*-CONFIRMATION-*\n\nLa réservation de *" . $datas['name'] . " (" . $datas['phone'] . ")* a été acceptée.\nUn mail de confirmation à été envoyé au client.";

    $type = ($datas['type'] === 'aller') ? 'Aller simple' : (($datas['type'] == 'aller-retour') ? 'Aller retour' : 'Réservation à l\'heure');
    try {
        $params = array(
            'date' => $datas['date'],
            'heure' => $datas['time'],
            'depart' => $datas['depart'],
            'arrivee' => $datas['arrivee'],
            'tarif' => $datas['tarif'],
            'type' => $type,
            'nb_heures' => $datas['nb_heures'],
        );
        $templateId = ($datas['type'] === 'a-lheure') ? 2 : 1;
        sendEmail($datas['email'], $datas['name'], $templateId, $params);
        sendTelegramMessage($message);
        header("Location: /");
    } catch (TelegramException $e) {
        echo "Erreur";
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'refuse' && !empty($_GET['token'])) {
    $datas = getBooking($_GET['token']);
    $message = "*-ANNULATION-*\n\nLa réservation de *" . $datas['name'] . " (" . $datas['phone'] . ")* a été annulée. \nUn mail d'annulation a été envoyé au client";
    try {
        $params = array(
            'date' => $datas['date'],
            'heure' => $datas['time'],
            'tarif' => $datas['tarif'],
        );
        sendEmail($datas['email'], $datas['name'], 3, $params);
        sendTelegramMessage($message);
        header("Location: /");
    } catch (TelegramException $e) {
        echo "Erreur";
    }
}



function sendEmail($email, $nom, $templateId, $params): bool
{

    $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $_ENV["SENDINBLUE_API_KEY"]);

    $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
        new GuzzleHttp\Client(),
        $config
    );
    $sendSmtpEmail = new SendSmtpEmail();
    $sendSmtpEmail['to'] = array(array('email' => $email , 'name' => $nom));
    $sendSmtpEmail['templateId'] = $templateId;
    $sendSmtpEmail['params'] = $params;

    try {
        $apiInstance->sendTransacEmail($sendSmtpEmail);
        return true;
    } catch (Exception $e) {
        mail($_ENV["ADMIN_EMAIL"], "Erreur lors de l'envoi de l'email", $e->getMessage());
        return false;
    }
}


function createSendinblueContact($name, $email, $tel)
{
    // Converts the attributes to a format that SendinBlue can understand
    $name = explode(" ", $name);
    $firstname = $name[0];
    $lastname = $name[1] ?? null;
    $tel = "33".substr($tel, 1, strlen($tel));

    $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $_ENV["SENDINBLUE_API_KEY"]);

    $apiInstance = new SendinBlue\Client\Api\ContactsApi(
        new GuzzleHttp\Client(),
        $config
    );
    $createContact = new CreateContact(); // Values to create a contact
    $createContact['email'] = $email;
    $createContact["updateEnabled"] = true;
    $createContact['listIds'] = [2];
    $createContact['attributes'] = array('NOM' => $firstname, "PRENOM" => $lastname, 'SMS' => $tel);

    try {
        $apiInstance->createContact($createContact);
        return true;
    } catch (Exception $e) {
        mail($_ENV["ADMIN_EMAIL"], "Erreur lors de l'ajout du contact SendinBlue", $e->getMessage());
        return false;
    }
}

function getBooking($token) {
    return json_decode(base64_decode($token), true);
}

/**
 * @throws TelegramException
 */
function sendTelegramMessage($message): void
{
    initTelegram();
    Request::sendMessage([
        'chat_id' => $_ENV["TELEGRAM_CHAT_ID"],
        'text'    => $message,
        'parse_mode' => "MARKDOWN"
    ]);
}

/**
 * @throws TelegramException
 */
function sendTelegramBooking($name, $phone, $email, $date, $time, $price, $type, $nb_passagers, $nb_bagages, $depart = null, $arrivee = null, $depart_id = null, $arrivee_id = null, $distance = null, $nb_heure = null): void
{
    if ($type === "aller-retour") {
        $retourMessage = "(*Aller-retour*)";
    } elseif ($type === "aller") {
        $retourMessage = "";
    } else {
        $retourMessage = "(*Réservation à l'heure*)";
    }

    $bookingToken = base64_encode(json_encode([
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'date' => $date,
        'time' => $time,
        'price' => $price,
        'type' => $type,
        'nb_passagers' => $nb_passagers,
        'nb_bagages' => $nb_bagages,
        'depart' => $depart,
        'arrivee' => $arrivee,
        'depart_id' => $depart_id,
        'arrivee_id' => $arrivee_id,
        'distance' => $distance,
        'nb_heure' => $nb_heure,
    ]));

    $telegram = initTelegram();
    if ($telegram) {

        if ($type === 'a-lheure') {
            $messageType = "*Nombre d'heures:* $nb_heure\n";
        } else {
            $messageType = "*Départ*\n".substr($depart, 0,-8)."\n\n*Arrivée*\n".substr($arrivee, 0,-8)."\n\n*$distance* [Itinéraire Google Maps](https://www.google.com/maps/dir/?api=1&origin=".urlencode($depart)."&destination=".urlencode($arrivee)."&destination_place_id=$arrivee_id&origin_place_id=$depart_id)\n\n";
        }

        Request::sendMessage([
            'chat_id' => $_ENV["TELEGRAM_CHAT_ID"],
            'text'    => "*---Nouvelle course---*\n\n"
                . "*Appelez le client pour confirmer la course*\n\n"
                . "*$name ($phone)*\n\n"
                . "*Date:* $date à ".str_replace(':', 'h', $time)."\n\n"
                . $messageType
                . "*Passagers:* $nb_passagers *| Bagages:* $nb_bagages\n\n"
                . "*Tarif: $price € $retourMessage*\n\n"
                . "❌ [Refuser la course](".$_ENV['SITE_URL']."/xhr.trip_confirmation.php?action=refuse&token=$bookingToken)\n\n✔ [Accepter la course](".$_ENV['SITE_URL']."/xhr.trip_confirmation.php?action=accept&token=$bookingToken)",
            'parse_mode' => "MARKDOWN",
            'disable_web_page_preview' => true
        ]);
    }

}

function initTelegram()
{
    $bot_api_key  = $_ENV["TELEGRAM_API_KEY"];
    $bot_username = 'ErenelBot';

    try {
        $telegram = new Telegram($bot_api_key, $bot_username);
        $telegram->handleGetUpdates();
    } catch (TelegramException $e) {
        mail($_ENV["ADMIN_EMAIL"], "Erreur lors de l'initialisation Telegram", $e->getMessage());
        return false;
    }

    return $telegram;
}