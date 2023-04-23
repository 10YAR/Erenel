<div class="courseType__Container">
    <div onclick="changeType('aller')" class="courseType type_aller active toHideInStepTwo">
        Aller simple
    </div>
    <div onclick="changeType('aller-retour')"  class="courseType type_aller-retour toHideInStepTwo">
        Aller-retour
    </div>
    <div onclick="changeType('a-lheure')"  class="courseType type_alheure toHideInStepTwo">
        À l'heure
    </div>
</div>
<div class="toShowInStepTwo">
    Informations de contact
</div>
<section id="firstStep">
    <form method="POST" class="trip-frm2 booking-frm" role="form" action="/reservation">
        <div class="col-md-12 col-sm-12 depart_container">
            <label for="autocomplete_depart" class="strong-stat firstChild">Départ</label>
            <div class="field-box form-group">
                <input id="autocomplete_depart" type="text" placeholder="Entrez une adresse" required="" class="pac-target-input" autocomplete="off">
                <input type="hidden" name="trip_pick_address" id="trip_pick_address">
                <input type="hidden" name="trip_pick_place_id" id="trip_pick_place_id">
                <i class="fal fa-location-dot"></i>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 arrivee_container">
            <label for="autocomplete_arrivee" class="strong-stat">Arrivée</label>
            <div class="field-box form-group">
                <input id="autocomplete_arrivee" type="text" placeholder="Entrez une adresse" required="" class="pac-target-input" autocomplete="off">
                <input type="hidden" name="trip_drop_address" id="trip_drop_address">
                <input type="hidden" name="trip_drop_place_id" id="trip_drop_place_id">
                <i class="fal fa-location-dot"></i>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 nb_heure_container">
            <label for="nb_heure" class="strong-stat firstChild">Combien d'heures souhaitez-vous réserver ?</label>
            <div class="field-box form-group">
                <input id="nb_heure" type="number" placeholder="Entrez un nombre d'heures" min="1">
                <i class="fal fa-clock"></i>
            </div>
        </div>
        <div class="d-rows">
            <div>
                <label for="date-pick" class="strong-stat">Quand ?</label>
                <div class="field-box form-group booking-frm">
                    <input id="date-pick" class="date-pick active" type="text" name="trip_date" placeholder="Sélectionnez la date" style="-webkit-appearance: none;" readonly="readonly" required="">
                    <i class="fal fa-calendar-days"></i>
                </div>
            </div>
            <div>
                <label for="time-pick" class="strong-stat">À quelle heure ?</label>
                <div class="field-box form-group booking-frm">
                    <input id="time-pick" class="time-pick active" type="text" name="trip_time" placeholder="Selectionnez l'heure" style="-webkit-appearance: none;" readonly="readonly" required="">
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
                <div class="trip_error"></div>

                <div id="trip_total">
                    <span id="mark_tarif" role="tarif"></span>
                    <br>
                    <span id="mark_distance" role="distance"></span>
                    <span id="mark_duration" role="durée trajet"></span>
                </div>
            </div>
            <div style="width:fit-content;">
                <button type="button" role="button" class="as-btn booking-btn" id="trip_continue_button" disabled="disabled" onclick="nextStep(1)">Continuer </button>
            </div>
        </div>

        <input id="input_type" type="hidden" name="trip_type" value="aller">
        <input id="trip_price" type="hidden" name="trip_price" value="">
        <input id="trip_distance" type="hidden" name="trip_distance" value="">
    </form>
</section>
<section id="secondStep">
    <form class="cb-frm" method="POST">
        <div class="col-md-12 col-sm-12">
            <label for="input_name" class="strong-stat">Nom et prénom</label>
            <div class="field-box form-group booking-frm">
                <input id="input_name" type="text" name="input_name" placeholder="Nom et prénom" required/>
                <i class="far fa-user"></i>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <label for="input_phone" class="strong-stat">Téléphone mobile</label>
            <div class="field-box form-group booking-frm">
                <input id="input_phone" type="tel" name="input_phone" placeholder="Téléphone mobile" required/>
                <i class="fa-regular fa-phone"></i>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <label for="input_email" class="strong-stat">Email</label>
            <div class="field-box form-group booking-frm">
                <input id="input_email" type="email" name="input_email" placeholder="Email" required/>
                <i class="far fa-envelope"></i>
            </div>
        </div>
        <div class="trip_error_2"></div>
        <div style="text-align:right;margin-top:15px;">
            <button type="button" class="as-btn booking-btn" id="ride-bbtn" onclick="nextStep(2)">Je réserve <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
        </div>
    </form>
</section>
<section id="thirdStep">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="tab-content" style="text-align: center;">
            <i class="fas fa-check" style="color:#09c009;font-size: 4rem;"></i>
            <h3>Merci.</h3>
            <p style="font-size: 16px;">
                Nous allons vous contacter par téléphone pour confirmer votre réservation. <br />
                Le numéro qui vous appelera sera : 06 08 17 42 45<br />
                <span style="font-size: 14px;">(Ce message ne vaut pas confirmation de réservation)</span>
            </p>
        </div>
    </div>
</section>