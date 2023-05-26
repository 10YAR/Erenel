let autocomplete_depart;
let autocomplete_arrivee;


function initializeMap(callback) {
    // Map Limit to Seine et Marne
    const northeast = { lat: 51.181670, lng: 7.275912 };
    const southwest = { lat: 43.217616, lng: -4.092856};
    const boundsCustom = new google.maps.LatLngBounds(southwest, northeast);

    autocomplete_depart = new google.maps.places.Autocomplete(
        (document.getElementById('autocomplete_depart')),
        {
            types: ['geocode', 'establishment'],
            bounds: boundsCustom,
            strictBounds: true,
            country: ["fr"]
        });
    google.maps.event.addListener(autocomplete_depart, 'place_changed', function () {
        checkPrice();
    });

    autocomplete_arrivee = new google.maps.places.Autocomplete(
        (document.getElementById('autocomplete_arrivee')),
        {
            types: ['geocode', 'establishment'],
            bounds: boundsCustom,
            strictBounds: true,
            country: ["fr"]
        });
    google.maps.event.addListener(autocomplete_arrivee, 'place_changed', function () {
        checkPrice();
    });
}

jQuery(document).ready(function () {
    let busy = false;
    jQuery("#date-pick, #time-pick").change(function() {
        if (!busy) {
            busy = true;
            checkPrice();
            jQuery(this).blur();
            busy = false;
        }
    });

    jQuery('#nb_heure').on('input', function() {
        checkPrice();
    });

    jQuery("#slide").animate({width:'toggle'},350);
});

function checkPrice() {
    jQuery("#mark_tarif, #mark_distance, #mark_duration").hide();
    jQuery("#trip_continue_button").attr("disabled","disabled");
    jQuery("#trip_pick_place_id").val("");
    jQuery("#trip_drop_place_id").val("");
    jQuery("#trip_pick_address").val("");
    jQuery("#trip_drop_address").val("");
    jQuery(".trip_error").html("");

    const depart = jQuery("#autocomplete_depart").val();
    const arrivee = jQuery("#autocomplete_arrivee").val();
    const date = jQuery("#date-pick").val();
    const time = jQuery("#time-pick").val();
    const type = jQuery("#input_type").val();
    const nb_heure = jQuery("#nb_heure").val();

    let place_depart = autocomplete_depart.getPlace();
    let place_arrivee = autocomplete_arrivee.getPlace();


    if ((type != "a-lheure" && depart && arrivee && date && time && place_depart.place_id && place_arrivee.place_id)
    || (type == "a-lheure" && date && time && nb_heure)) {
        let place_depart_id = "";
        let place_arrivee_id = "";

        if (typeof(place_depart) !== "undefined" && typeof(place_arrivee) !== "undefined") {
            place_depart_id = place_depart.place_id;
            place_arrivee_id = place_arrivee.place_id;
        }

        jQuery.post("/xhr.calculate_trip.php",
            {
                depart: place_depart_id,
                arrivee: place_arrivee_id,
                pick_date: date,
                pick_time: time,
                type: type,
                nb_heure: nb_heure
            })
            .done(function( data ) {
                data = JSON.parse(data);
                let text_aller = (type == "aller-retour") ? "(Aller-retour)" : "";

                if (data.price && !data.error) {

                    if (data.type_trajet != "a-lheure") {
                        jQuery("#mark_distance").html("Trajet de " + data.distance + " " + text_aller);
                        jQuery("#mark_duration").html(" en " + data.text_duration);

                        jQuery("#trip_pick_place_id").val(place_depart.place_id);
                        jQuery("#trip_drop_place_id").val(place_arrivee.place_id);
                        jQuery("#trip_pick_address").val(place_depart.formatted_address);
                        jQuery("#trip_drop_address").val(place_arrivee.formatted_address);

                        jQuery("#trip_distance").val(data.distance);
                    }

                    jQuery("#mark_tarif").html(data.price + " €");
                    jQuery("#trip_price").val(data.price);
                    jQuery("#mark_tarif, #mark_distance, #mark_duration").show();
                    jQuery("#trip_continue_button").removeAttr("disabled");

                }else if (data.error) {
                    jQuery(".trip_error").html(data.message.toString());
                }
            });
    }
}

function nextStep(step) {
    switch (step) {
        case 1:
            jQuery("#firstStep").animate({height:'0', padding: '0 25px'},400, 'swing', function() {
                jQuery("#firstStep").hide();
                jQuery(".toShowInStepTwo").show();
                jQuery("#secondStep").animate({height:'toggle'},400, 'swing');
                jQuery(".toHideInStepTwo, .courseType__Container").hide();
            });
            break;
        case 2:
            const name = jQuery("#input_name").val();
            const phone = jQuery("#input_phone").val();
            const email = jQuery("#input_email").val();
            if (!name || !phone || !email) {
                jQuery(".trip_error_2").html("Merci de remplir tout les champs.");
            } else {
                jQuery(".toShowInStepTwo").html("Confirmation de la réservation");
                const confirmation = sendBooking();
                if (confirmation) {
                    jQuery("#secondStep").animate({height: '0', padding: '0 25px'}, 400, 'swing', function () {
                        jQuery("#secondStep").hide();
                        jQuery("#thirdStep").animate({height:'toggle'},400, 'swing');
                    });

                } else {
                    jQuery(".trip_error_2").html("Une erreur est survenue lors de la confirmation de votre réservation. Veuillez réessayer.");
                }
            }
            break;
    }

}

function changeType(type) {
    jQuery(".nb_heure_container").hide();
    jQuery(".depart_container, .arrivee_container").show();
    jQuery(".type_aller, .type_aller-retour, .type_alheure").removeClass("active");

    jQuery("#mark_tarif, #mark_distance, #mark_duration").html("");
    jQuery("#trip_price").val("");

    switch (type) {
        case "aller":
            jQuery("#input_type").val("aller");
            jQuery(".type_aller").addClass("active");
            break;
        case "aller-retour":
            jQuery("#input_type").val("aller-retour");
            jQuery(".type_aller-retour").addClass("active");
            break;
        case "a-lheure":
            jQuery("#input_type").val("a-lheure");
            jQuery(".type_alheure").addClass("active");
            jQuery(".depart_container, .arrivee_container").hide();
            jQuery(".nb_heure_container").show();
            break;
    }
    checkPrice();
}

function sendBooking() {
    const name = jQuery("#input_name").val();
    const phone = jQuery("#input_phone").val();
    const email = jQuery("#input_email").val();
    const depart = jQuery("#autocomplete_depart").val();
    const arrivee = jQuery("#autocomplete_arrivee").val();
    const distance = jQuery("#trip_distance").val();
    const date = jQuery("#date-pick").val();
    const time = jQuery("#time-pick").val();
    const type = jQuery("#input_type").val();
    const nb_heure = jQuery("#nb_heure").val();
    const nb_passagers = jQuery("#nb_passagers").val();
    const nb_bagages = jQuery("#nb_bagages").val();
    const price = jQuery("#trip_price").val();

    let place_depart = autocomplete_depart.getPlace();
    let place_arrivee = autocomplete_arrivee.getPlace();

    let place_depart_id = "";
    let place_arrivee_id = "";

    if (typeof(place_depart) !== "undefined" && typeof(place_arrivee) !== "undefined") {
        place_depart_id = place_depart.place_id;
        place_arrivee_id = place_arrivee.place_id;
    }

    const dataToPost = {
        name: name,
        phone: phone,
        email: email,
        depart: depart,
        arrivee: arrivee,
        depart_id: place_depart_id,
        arrivee_id: place_arrivee_id,
        nb_passagers: nb_passagers,
        nb_bagages: nb_bagages,
        distance: distance,
        date: date,
        time: time,
        type: type,
        nb_heure: nb_heure,
        price: price
    };
    let confirmation = false;
    jQuery.ajax({
        type: 'POST',
        url: '/xhr.trip_confirmation.php?action=book',
        data: dataToPost,
        success: function(data) {
            confirmation = (data.status == "success");
        },
        dataType: 'json',
        async: false
    });

    return confirmation
}