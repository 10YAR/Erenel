<form method="POST" class="trip-frm2 booking-frm" role="form" action="/reservation">
    <div class="col-md-12 col-sm-12">
        <label for="autocomplete_depart" class="strong-stat">Départ</label>
        <div class="field-box form-group">
            <input id="autocomplete_depart" type="text" placeholder="Entrez une adresse" required="" class="pac-target-input" autocomplete="off">
            <input type="hidden" name="trip_pick_address" id="trip_pick_address">
            <input type="hidden" name="trip_pick_place_id" id="trip_pick_place_id">
            <i class="fal fa-location-dot"></i>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <label for="autocomplete_arrivee" class="strong-stat">Arrivée</label>
        <div class="field-box form-group">
            <input id="autocomplete_arrivee" type="text" placeholder="Entrez une adresse" required="" class="pac-target-input" autocomplete="off">
            <input type="hidden" name="trip_drop_address" id="trip_drop_address">
            <input type="hidden" name="trip_drop_place_id" id="trip_drop_place_id">
            <i class="fal fa-location-dot"></i>
        </div>
    </div>
    <div class="d-rows">
        <div>
            <label for="flatpickr_date" class="strong-stat">Quand ?</label>
            <div class="field-box form-group booking-frm">
                <input id="flatpickr_date" class="flatpickr-input active" type="text" name="trip_date" placeholder="Sélectionnez la date" style="-webkit-appearance: none;" readonly="readonly" required="">
                <i class="fal fa-calendar-days"></i>
            </div>
        </div>
        <div>
            <label for="flatpickr_time" class="strong-stat">À quelle heure ?</label>
            <div class="field-box form-group booking-frm">
                <input id="flatpickr_time" class="flatpickr-input active" type="text" name="trip_time" placeholder="Selectionnez l'heure" style="-webkit-appearance: none;" readonly="readonly" required="">
                <i class="fal fa-clock"></i>
            </div>
        </div>
    </div>
    <div class="d-rows">
        <div>
            <label for="nb_passagers" class="strong-stat">Nombre de Passagers</label>
            <div class="field-box form-group">
                <select id="nb_passagers" name="nb_passagers">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <i class="fal fa-user-group"></i>
            </div>
        </div>
        <div>
            <label for="nb_bagages" class="strong-stat">Nombre de Bagages</label>
            <div class="field-box form-group">
                <select id="nb_bagages" name="nb_bagages">
                    <option value="0" selected>0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4 ou plus</option>
                </select>
                <i class="fal fa-suitcase"></i>
            </div>
        </div>
    </div>
    <div class="d-rows">
        <div class="trip_price_container">
            <div id="trip_error"></div>
            <div class="field-box"></div>
            <input id="input_aller_retour" type="hidden" name="retour" value="false">
            <span id="mark_tarif" role="tarif"></span>
            <br>
            <span id="mark_distance" role="distance"></span>
            <br>
            <span id="mark_duration" role="durée trajet"></span>
        </div>
        <div style="text-align: right;">
            <button type="submit" role="button" class="as-btn style3 booking-btn" id="trip_continue_button" disabled="disabled">Continuer <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
        </div>
    </div>
</form>