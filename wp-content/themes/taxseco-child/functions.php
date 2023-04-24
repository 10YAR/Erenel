<?php
/**
 *
 * @Packge      taxseco
 * @Author      Angfuzsoft
 * @Author URL  https://www.angfuzsoft.com/
 * @version     1.0
 *
 */
/**
 * Enqueue style of child theme
 */
function taxseco_child_enqueue_styles() {
    wp_enqueue_style( 'taxseco-style', get_template_directory_uri() . '/style.css?v='.time() );
    wp_enqueue_style( 'taxseco-child-style', get_stylesheet_directory_uri() . '/style.css?v='.time(),array( 'taxseco-style' ), wp_get_theme()->get('Version'));
}
add_action( 'wp_enqueue_scripts', 'taxseco_child_enqueue_styles', 100000 );

function erenel_enqueue_scripts() {
    wp_enqueue_script( 'booking', get_stylesheet_directory_uri() . '/js/booking.js?v='.time(), array( 'jquery' ), wp_get_theme()->get('Version'), true );
    wp_enqueue_script( 'google-cloud', "https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&callback=initializeMap&key=" . $_ENV['GOOGLE_CLOUD_API_KEY'], array( 'booking' ), wp_get_theme()->get('Version'), true );
    wp_enqueue_script( 'google-captcha', "https://www.google.com/recaptcha/api.js?render=" . $_ENV['CAPTCHA_PUBLIC_API_KEY'], array( 'booking' ), wp_get_theme()->get('Version'), true );
}
add_action( 'wp_enqueue_scripts', 'erenel_enqueue_scripts' );


add_options_page("Tarifs", "Tarifs", "manage_options", "tarifs", "tarifs");
function tarifs() {

    echo "<h1>Tarifs</h1>";

    if (isset($_POST['saveTarifs']) && !empty($_POST['prix_km']) && !empty($_POST['prix_km_nuit']) && !empty($_POST['prix_heure']) && !empty($_POST['prix_heure_nuit'])) {
        update_option("prix_km", $_POST['prix_km']);
        update_option("prix_km_nuit", $_POST['prix_km_nuit']);
        update_option("prix_heure", $_POST['prix_heure']);
        update_option("prix_heure_nuit", $_POST['prix_heure_nuit']);
        echo "<div style='display:block;color:white;background-color:green;border-radius:3px;max-width:300px;font-weight:600;font-size:14px;padding:15px 10px;line-height:15px;'>Les tarifs ont été mis à jour</div>";
    }

    $prix_km = get_option("prix_km");
    $prix_km_nuit = get_option("prix_km_nuit");
    $prix_heure = get_option("prix_heure");
    $prix_heure_nuit = get_option("prix_heure_nuit");

    echo "
    <form method='post' style='display:flex;flex-direction:column;'>
       <h3>Prix du KM</h3>
       <div style='display:block;text-align:left;margin: 5px 0;'>
            <label for='prix_km' style='min-width:120px;display:inline-block;'>Prix du KM</label>
            <input type='number' step='0.1' name='prix_km' id='prix_km' value='".$prix_km."'> 
       </div>
       <div style='display:block;text-align:left;margin: 5px 0;'>
            <label for='prix_km_nuit' style='min-width:120px;display:inline-block;'>Prix du KM (nuit)</label>
            <input type='number' step='0.1' name='prix_km_nuit' id='prix_km_nuit' value='".$prix_km_nuit."'> 
       </div>
       <br />
       <h3>Prix de l'heure</h3>
       <div style='display:block;text-align:left;margin: 5px 0;'>
            <label for='prix_heure' style='min-width:120px;display:inline-block;'>Prix à l'heure</label>
            <input type='number' step='0.1' name='prix_heure' id='prix_heure' value='".$prix_heure."'> 
       </div>
       <div style='display:block;text-align:left;margin: 5px 0;'>
            <label for='prix_heure_nuit' style='min-width:120px;display:inline-block;'>Prix à l'heure (nuit)</label>
            <input type='number' step='0.1' name='prix_heure_nuit' id='prix_heure_nuit' value='".$prix_heure_nuit."'> 
       </div>
       <div style='display:block;width:120px;margin-top:15px;'>
        <input type='submit' name='saveTarifs' class='button-primary' value='Enregistrer' />
       </div>
    </form>
    ";
}