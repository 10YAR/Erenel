<?php
date_default_timezone_set('Europe/Paris');
require_once "vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

global $pdo;
$pdo = new PDO('mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);

if (!empty($_POST['pick_date']) && !empty($_POST['pick_time']) && !empty($_POST['type'])) {

    $depart = $_POST["depart"];
    $arrivee = $_POST["arrivee"];
    $pick_date = $_POST["pick_date"];
    $pick_time = $_POST["pick_time"];
    $type = $_POST['type'];
    $nb_heure = $_POST['nb_heure'];

    echo json_encode(calculatePrice($depart, $arrivee, $pick_date, $pick_time, $type, $nb_heure));
}

function calculatePrice($depart, $arrivee, $pick_date, $pick_time, $type_trajet, $nb_heure): array
{

    // Step 1: Gestion de la date / heure
    $pick_hour = substr($pick_time, 0, 2);
    $pick_minute = substr($pick_time, 3, 2);
    $formatted_date = transDate($pick_date) . " ".$pick_hour.":".$pick_minute.":00";
    $timestamp1 = strtotime($formatted_date);
    $timestamp2 = strtotime(date("Y-m-d H:i:s"));
    // Cas où la date de réservation est déjà passée
    if ($timestamp1 <= $timestamp2) {
        return (["error" => 1, "message" => "L'heure indiquée est déjà passée."]);
    }
    // Cas où la réservation est trop tôt (-10 minutes)
    $diff_timestamp = $timestamp1 - $timestamp2;
    if ($diff_timestamp < 600) {
        return (["error" => 2, "message" => "Votre réservation est trop tôt.<br /> Choisissez un horaire de départ supérieur à 10 minutes."]);
    }


    // Step 2: Gestion du prix
    $km_price = getTarif();
    $heure_price = getTarif("prix_heure");
    // Si réservation de nuit... prix plus cher!
    $pick_time_frm = (float) ($pick_hour . "." . $pick_time);
    if ($pick_time_frm >= 22.0 || $pick_time_frm <= 7.0) {
        $km_price = getTarif("prix_km_nuit");
        $heure_price = getTarif("prix_heure_nuit");
    }

    // Si trajet à l'heure on retourne directement le prix
    if ($type_trajet === "a-lheure") {
        $price = $nb_heure * $heure_price;
        return (["type_trajet" => "a-lheure", "price" => (ceil(round($price)/10) * 10) - 5]);
    }

    // Step 3: Gestion du trajet (pour les aller simple ou aller-retour)

    // Cas où l'adresse de départ est trop loin de Montereau
    $distance_from_home = getDistance("ChIJA-x2ddZC70cR5s7vOh8QaPA", $depart);
    $value_distance_from_home = $distance_from_home->routes[0]->legs[0]->distance->value ?? 1000000;
    if ($value_distance_from_home > 150000) {
        //return (["error" => 3, "message" => "Nous sommes désolés, nous ne proposons pas nos services de taxi dans votre secteur"]);
    }

    $distance = getDistance($depart, $arrivee);
    $text_distance = $distance->routes[0]->legs[0]->distance->text;
    $value_distance = $distance->routes[0]->legs[0]->distance->value;
    $duration = $timestamp1 + $distance->routes[0]->legs[0]->duration->value;
    $duration_text = $distance->routes[0]->legs[0]->duration->text;

    $kms = $value_distance / 1000;
    $kms_from_home = $value_distance_from_home / 1000;

    if ($kms <= 13) {
        if ($pick_time_frm >= 22.0 || $pick_time_frm <= 7.0)
            $price = 35;
        else
            $price = 25;
    } else {
        $price = ceil($kms * $km_price);
    }
    if ($kms_from_home > 50) {
        $price += ceil($kms_from_home * $km_price) / 6;
    }

    // Si c'est un trajet aller retour c'est 2x plus cher
    if ($type_trajet === "aller-retour") {
        $price *= 2;
        $dist_only = str_replace(" km", "", $text_distance);
        $text_distance = ($dist_only * 2) . " km";
        $duration_text .= " (x2)";
    }

    $duration_text = str_replace([" hour", " mins"], ["h", "min"], $duration_text);
    return (["type" => "trajet", "price" => (ceil(round($price)/10) * 10) - 5, "distance" => $text_distance, "duration" => $duration, "text_duration" => $duration_text]);

}

function getDistance($addressFrom, $addressTo) {
    $apiKey = $_ENV['GOOGLE_CLOUD_API_KEY'];
    $api = file_get_contents("https://maps.googleapis.com/maps/api/directions/json?origin=place_id:".($addressFrom)."&destination=place_id:".($addressTo)."&region=fr&unit=metric&key=".$apiKey);
    return json_decode($api);
}

function transDate($date): string
{
    $day = substr($date, 0, 2);
    $month = substr($date, 3, 2);
    $year = substr($date, 6, 4);
    return $year . "-" . $month . "-" . $day ;
}

function getTarif($type = "prix_km") {
    global $pdo;
    $req = $pdo->prepare("SELECT option_value FROM wp_options WHERE option_name = ?");
    $req->execute([$type]);
    $value = $req->fetch();
    return $value["option_value"] ?? 0;
}