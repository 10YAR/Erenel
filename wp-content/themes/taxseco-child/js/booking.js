let autocomplete_depart;
let autocomplete_arrivee;

function changeType(retour) {
    document.getElementById("input_aller_retour").value = retour;
    checkPrice();
}

function initializeMap(callback) {
    const northeast = { lat: 49.092907, lng: 3.494669 };
    const southwest = { lat: 48.159944, lng: 1.990433};
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
    const today = new Date();
    jQuery("#flatpickr_date").flatpickr({
        position:" center",
        monthSelectorType: "static",
        enableTime: false,
        dateFormat: "d/m/Y",
        minDate: today,
        locale: "fr"
    });
    jQuery("#flatpickr_time").flatpickr({
        position:" center",
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        locale: "fr"
    });

    jQuery("#flatpickr_date, #flatpickr_time").change(function() {
        checkPrice();
    });
});

function checkPrice() {
    jQuery("#mark_tarif, #mark_distance, #mark_duration").hide();
    jQuery("#trip_continue_button").attr("disabled","disabled");
    jQuery("#trip_pick_place_id").val("");
    jQuery("#trip_drop_place_id").val("");
    jQuery("#trip_pick_address").val("");
    jQuery("#trip_drop_address").val("");
    jQuery("#trip_error").html("");

    const depart = jQuery("#autocomplete_depart").val();
    const arrivee = jQuery("#autocomplete_arrivee").val();
    const date = jQuery("#flatpickr_date").val();
    const time = jQuery("#flatpickr_time").val();
    const allerretour = jQuery("#input_aller_retour").val();

    let place_depart = autocomplete_depart.getPlace();
    let place_arrivee = autocomplete_arrivee.getPlace();

    if (depart && arrivee && date && time && place_depart.place_id && place_arrivee.place_id) {
        jQuery.post("/xhr.calculate_trip.php",
            {
                depart: place_depart.place_id,
                arrivee: place_arrivee.place_id,
                pick_date: date,
                pick_time: time,
                allerretour: allerretour
            })
            .done(function( data ) {
                data = JSON.parse(data);
                let text_aller = (allerretour == "true") ? "(Aller-retour)" : "(Aller simple)";

                if (data.distance && data.price && !data.error) {
                    jQuery("#mark_distance").html("Distance: " + data.distance + " " + text_aller);
                    jQuery("#mark_tarif").html("Tarif: " + data.price + " €");
                    jQuery("#mark_duration").html("Durée trajet: " + data.text_duration);
                    jQuery("#mark_tarif, #mark_distance, #mark_duration").show();
                    jQuery("#trip_continue_button").removeAttr("disabled");

                    jQuery("#trip_pick_place_id").val(place_depart.place_id);
                    jQuery("#trip_drop_place_id").val(place_arrivee.place_id);
                    jQuery("#trip_pick_address").val(place_depart.formatted_address);
                    jQuery("#trip_drop_address").val(place_arrivee.formatted_address);
                }else if (data.error) {
                    jQuery("#trip_error").html(data.message.toString());
                }
            });
    }
}