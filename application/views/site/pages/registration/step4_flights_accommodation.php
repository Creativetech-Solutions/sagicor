<?php $this->load->view('site/pages/registration/reg_banner')?>
     <?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/18/2016
 * Time: 11:32 AM
 */

//Winner Section
//ff flyer
$fflyer = isset($data['userData']) ? $data['userData']->fflyer : '';
$ff_number = isset($data['userData']) ? $data['userData']->ff_number : '';
$ff_airline = isset($data['userData']) ? $data['userData']->ff_airline : '';
$off_airline = isset($data['userData']) ? $data['userData']->off_airline : '';
$seating = isset($data['userData']) ? $data['userData']->seating : '';
$bags = isset($data['userData']) ? $data['userData']->bags : '';
$bed = isset($data['userData']) ? $data['userData']->bed : '';
$airport_code = isset($data['userData']) ? $data['userData']->airport_code : '';
$depart_date = isset($data['userData']) ? $data['userData']->depart_date : '';
$return_date = isset($data['userData']) ? $data['userData']->return_date : '';
$club = isset($data['userData']) ? $data['userData']->club : '';
$air_notes = isset($data['userData']) ? $data['userData']->air_notes : '';
$air_notes_dpt = isset($data['userData']) ? $data['userData']->air_notes_dpt : '';
$Companion = isset($data['userData']) ? $data['userData']->noguest : '';
$travel_req = isset($data['userData']) ? $data['userData']->travel_req : '';
$desired_dpt = isset($data['userData']) ? $data['userData']->desired_dpt_date : '';
$desired_rt = isset($data['userData']) ? $data['userData']->desired_ret_date : '';

//ff alt flyer
$fflyer_alt = isset($data['userData']) ? $data['userData']->fflyer_alt : '';
$ff_number_alt = isset($data['userData']) ? $data['userData']->ff_number_alt : '';
$ff_airline_alt = isset($data['userData']) ? $data['userData']->ff_airline_alt : '';
$off_airline_alt = isset($data['userData']) ? $data['userData']->off_airline_alt : '';
$guest = isset($data['userData']) ? $data['userData']->noguest: 'No';

//Guest Section
//ff flyer
$fflyer_g = $ff_number_g = $ff_airline_g = $off_airline_g = $seating_g = $bags_g = $bed_g = $airport_code_g = $depart_date_g = $return_date_g = $club_g = $air_notes_g = $Companion_g = $travel_req_g = $fflyer_alt_g = $ff_number_alt_g = $ff_airline_alt_g = $off_airline_alt_g = $desired_dpt_g= $desired_rt_g = '' ;
if(isset($data['guestData']) && is_object($data['guestData'])){
    $fflyer_g = $data['guestData']->fflyer;
    $ff_number_g = $data['guestData']->ff_number;
    $ff_airline_g = $data['guestData']->ff_airline;
    $off_airline_g = $data['guestData']->off_airline;
    $seating_g = $data['guestData']->seating;
    $bags_g = $data['guestData']->bags;
    $bed_g = $data['guestData']->bed;
    $airport_code_g = $data['guestData']->airport_code;
    $depart_date_g = $data['guestData']->depart_date;
    $return_date_g = $data['guestData']->return_date;
    $club_g = $data['guestData']->club;
    $air_notes_g = $data['guestData']->air_notes;
    $air_notes_dpt_g = $data['guestData']->air_notes_dpt;
    $Companion_g = $data['guestData']->noguest;
    $travel_req_g = $data['guestData']->travel_req;

    //ff alt flyer
    $fflyer_alt_g = $data['guestData']->fflyer_alt;
    $ff_number_alt_g = $data['guestData']->ff_number_alt;
    $ff_airline_alt_g = $data['guestData']->ff_airline_alt;
    $off_airline_alt_g = $data['guestData']->off_airline_alt;
    $desired_dpt_g = $data['guestData']->desired_dpt_date;
    $desired_rt_g = $data['guestData']->desired_ret_date;
}

//frequent flyer selection
if ($fflyer == "Yes"){
    $showFF = "block";
    $ffyesselect = "selected";
    $ffnoselect = "";
} elseif ($fflyer == "No") {
    $showFF = "none";
    $ffyesselect = "";
    $ffnoselect = "selected";
} else{
    $showFF = "none";
    $ffyesselect = "";
    $ffnoselect = "selected";
}

//frequent flyer selection alt
if ($fflyer_alt == "Yes"){
    $showFF_alt = "block";
    $ffyesselect_alt = "selected";
    $ffnoselect_alt = "";
} elseif ($fflyer_alt == "No") {
    $showFF_alt = "none";
    $ffyesselect_alt = "";
    $ffnoselect_alt = "selected";
} else{
    $showFF_alt = "none";
    $ffyesselect_alt = "";
    $ffnoselect_alt = "selected";
}


//Just copying from previous code to save some time.

if ($return_date == "other"){

    $airnoteOther = "selected";

    $airnoteDefault = "";

    $showHomenote = "block";

} else {

    $airnoteOther = "";

    $airnoteDefault = "selected";

    $showHomenote = "none";

}

if ($depart_date == "other" || $return_date == "other"){

    $showTravelreq = "none";

} else {

    $showTravelreq = "block";

}


if ($fflyer_g == "Yes") {
    $showFF_g = "block";
    $ffyesselect_g = "selected";
    $ffnoselect_g = "";
} elseif ($fflyer_g == "No") {
    $showFF_g = "none";
    $ffyesselect_g = "";
    $ffnoselect_g = "selected";
} else {
    $showFF_g = "none";
    $ffyesselect_g = "";
    $ffnoselect_g = "selected";
}

//frequent flyer selection alt guest

if ($fflyer_alt_g == "Yes"){

    $showFF_alt_g = "block";

    $ffyesselect_alt_g = "selected";

    $ffnoselect_alt_g = "";

} elseif ($fflyer_alt_g == "No") {

    $showFF_alt_g = "none";

    $ffyesselect_alt_g = "";

    $ffnoselect_alt_g = "selected";

} else{

    $showFF_alt_g = "none";

    $ffyesselect_alt_g = "";

    $ffnoselect_alt_g = "selected";

}


if ($depart_date_g == "other" || $return_date_g == "other"){

    $showTravelreq_g = "none";

} else {

    $showTravelreq_g = "block";

}

?>

<style>
    .lbl-nopad{padding-bottom: 0;margin-bottom: 0}
</style>
<div class="row text-left content-wrapper">

<?php $this->load->view('site/pages/registration/steps_nav');?>

    <h3>Registration - Step 4: Flights and Accommodation</h3>
    <form class="register-form" method="post" action="<?=base_url()?>registration/step5_activities">

        <h3 class="left30">Winner Information</h3>

        <div class="clearfix"></div>

        <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4 left15"><!-- frequent flyer selection -->

            <label>Do you have a frequent flyer number?</label>

            <select class="form-control select" id="frequent-flyer" name="frequent_flyer" onchange="ffCheck(this);">

                <option value="No" <?php echo $ffnoselect; ?>>No</option>

                <option id="yesFF" value="Yes" <?php echo $ffyesselect; ?>>Yes</option>

            </select>

        </div>

        <span id="ff-info" style="display:<?php echo $showFF; ?>;">

        <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4"><!-- frequent flyer number -->

            <label>Frequent Flyer #</label>

            <input type="text" class="form-control" placeholder="" id="frequent-flyer-no" name="frequent_flyer_no" value="<?php echo $ff_number ?>" />

        </div>

       <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4 left15"><!-- frequent flyer airline selection -->

           <label>Frequent Flyer Airline</label>

           <select class="form-control select" id="ff-airline" name="ff_airline" onchange="ffCheckno(this);">
               <option value="American Airlines" <?=($ff_airline === "American Airlines")?'selected="selected"':''; ?>>American Airlines</option>
               <option value="Caribbean Airlines" <?=($ff_airline === "Caribbean Airlines")?'selected="selected"':''; ?>>Caribbean Airlines</option>
               <option value="Delta Airlines" <?=($ff_airline === "Delta Airlines")?'selected="selected"':''; ?>>Delta Airlines</option>
               <option value="US Airways" <?=($ff_airline === "US Airways")?'selected="selected"':''; ?>>US Airways</option>
               <option value="United Airlines" <?=($ff_airline === "United Airlines")?'selected="selected"':''; ?>>United Airlines</option>
               <option value="Liat" <?=($ff_airline === "Liat")?'selected="selected"':''; ?>>Liat</option>
               <option id="noFF" value="other" <?=($ff_airline === "other")?'selected="selected"':''; ?>>Other</option>
           </select>

       </div>

        <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4" id="ffno-info" style="display:<?= ($ff_airline === 'other')?'block':'none'; ?>;"><!-- frequent flyer number -->

            <label>Other Airline</label>

            <input type="text" class="form-control" placeholder="" id="off-airline" name="off_airline" value="<?php echo $off_airline; ?>" />

        </div>

       <div class="clearfix"></div>

        <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-6 left15"><!-- frequent flyer alt selection -->

            <label>Do you have more than one frequent flyer number?</label>

            <select class="form-control select" id="frequent-flyer-alt" name="frequent_flyer_alt" onchange="ff_altCheck(this);">

                <option value="No" <?=($fflyer_alt === 'No')?'selected="selected"':'';?>>No</option>

                <option id="yesFF-alt" value="Yes" <?=($fflyer_alt === 'Yes')?'selected="selected"':'';?>>Yes</option>

            </select>

        </div>

        <span id="ff-info-alt" style="display:<?php echo $showFF_alt; ?>;">

        <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4"><!-- frequent flyer number -->

            <label>Frequent Flyer # 2</label>

            <input type="text" class="form-control" placeholder="" id="frequent-flyer-no-alt" name="frequent_flyer_no_alt" value="<?= $ff_number_alt ?>" />

        </div>

       <div class="clearfix"></div>

       <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4 left15"><!-- frequent flyer airline selection -->

           <label>Frequent Flyer Airline 2</label>

           <select class="form-control select" id="ff-airline-alt" name="ff_airline_alt" onchange="off_altCheck(this);">
               <option value="American Airlines" <?=($ff_airline_alt === "American Airlines")?'selected="selected"':''; ?>>American Airlines</option>
               <option value="Caribbean Airlines" <?=($ff_airline_alt === "Caribbean Airlines")?'selected="selected"':''; ?>>Caribbean Airlines</option>
               <option value="Delta Airlines" <?=($ff_airline_alt === "Delta Airlines")?'selected="selected"':''; ?>>Delta Airlines</option>
               <option value="US Airways" <?=($ff_airline_alt === "US Airways")?'selected="selected"':''; ?>>US Airways</option>
               <option value="United Airlines" <?=($ff_airline_alt === "United Airlines")?'selected="selected"':''; ?>>United Airlines</option>
               <option value="Liat" <?=($ff_airline_alt === "Liat")?'selected="selected"':''; ?>>Liat</option>
               <option id="yesFF_alt" value="other" <?=($ff_airline_alt === "other")?'selected="selected"':''; ?>>Other</option>

           </select>

       </div>

        <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4" id="off-info-alt" style="display:<?=($ff_airline_alt === "other")?'block':'none'; ?>;"><!-- frequent flyer number -->

            <label>Other Airline 2</label>

            <input type="text" class="form-control" placeholder="" id="off-airline_alt" name="off_airline_alt" value="<?= $off_airline_alt; ?>" />

        </div>

        </span>

        </span>

        <div class="clearfix"></div>

        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-7 left15"><!-- seating selection -->

            <label>Airline seat preference of you and your companion</label>

            <select class="form-control select" id="seating" name="seating">

                <option <?php echo ($seating == 'No Preference') ? 'selected="selected"' : ''; ?>>No Preference</option>

                <option <?php echo ($seating == 'Aisle/Center') ? 'selected="selected"' : ''; ?>>Aisle/Center</option>

                <option <?php echo ($seating == 'Window/Center') ? 'selected="selected"' : ''; ?>>Window/Center</option>

                <option <?php echo ($seating == 'Aisle/Aisle') ? 'selected="selected"' : ''; ?>>Aisle/Aisle</option>

            </select>

        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-7 left15"><!-- luggage selection -->

            <label>Number of bags you will personally check in - **Airline baggage charges may apply**</label>

            <select class="form-control select" id="luggage" name="luggage">

                <option <?php echo ($bags == 'No') ? 'selected="selected"' : ''; ?>>None</option>

                <option <?php echo ($bags == 1) ? 'selected="selected"' : ''; ?>>1</option>

                <option <?php echo ($bags == 2) ? 'selected="selected"' : ''; ?>>2</option>

            </select>

        </div>

        <div class="clearfix"></div>

        <hr />

        <strong class="help-block">Accommodation</strong>

        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-7 left15"><!-- bed configuration selection -->

            <label>Bed configuration</label>

            <select class="form-control select" id="bed" name="bed">
                <option value=""></option>
                <option <?= ($bed == '1 King bed') ? 'selected="selected"' : ''; ?>>1 King bed</option>
                <option <?= ($bed == '2 Double beds') ? 'selected="selected"' : ''; ?>>2 Double beds</option>

            </select>

        </div>

        <div class="clearfix"></div>

        <hr />

        <strong class="help-block">Travel Information</strong>

        <div class="alert alert-success col-xs-12 left30" role="alert">

            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>

            Travel will be arranged based on the best possible routing from your home city. Please note that every effort will be made to accommodate your flight request, where possible. Additional charges may apply to you personally, should you wish to make a stop over or extend your trip. Information on applicable charges will be communicated to you by e.mail and must be confirmed by you within 24 hours.  Please also note that we are unable to guarantee your request.

        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-4 left15"><!-- airport code field -->

            <label>What airport will you be flying out of?</label>

            <input type="text" class="form-control" placeholder="" id="airport-code" name="airport_code" value="<?=$airport_code?>">

        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-4 left15"><!-- depart location selection -->

            <label>I would like to depart from my home city</label>

            <select class="form-control select" id="depart-date" name="depart_date" onchange="homeCheck(this);">

                <option></option>
                   <?php 
                        if($club == 0) 
                            $optVal = 'On group date - Sunday, June 10';
                        else $optVal = 'On President\'s Club departure date - Friday, June 8';
                    ?>
                    <option id="yeshome" <?=($depart_date !== 'other')?'selected="selected"':'';?> value="<?=$optVal?>"><?=$optVal?></option>

                <option value="other" <?=($depart_date === 'other')?'selected="selected"':'';?>>Other</option>

            </select>

        </div>
        <div class="clearfix"></div>
        <div style="display:<?=($depart_date == 'other') ? 'block':'none' ?>" class="desired-dpt">
            <strong class="help-block">Desired Departure Date</strong>
            <?php 
                if($desired_dpt != "0000-00-00"){
                    $dptMon = date('m', strtotime($desired_dpt));
                    $dptDay = date('d', strtotime($desired_dpt)); 
                } else $dptMon = $dptDay = "";
            ?>
            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- expire month selection -->
                <label>Month</label>
                <select name="desired_dpt_mon" class="form-control select">
                    <option value=""></option>
                    <option <?=($dptMon == "01")? 'selected="selected"':''?> value="01">January</option>
                    <option <?=($dptMon == "02")? 'selected="selected"':''?> value="02">February</option>
                    <option <?=($dptMon == "03")? 'selected="selected"':''?> value="03">March</option>
                    <option <?=($dptMon == "04")? 'selected="selected"':''?> value="04">April</option>
                    <option <?=($dptMon == "05")? 'selected="selected"':''?> value="05">May</option>
                    <option <?=($dptMon == "06")? 'selected="selected"':''?> value="06">June</option>
                    <option <?=($dptMon == "07")? 'selected="selected"':''?> value="07">July</option>
                    <option <?=($dptMon == "08")? 'selected="selected"':''?> value="08">August</option>
                    <option <?=($dptMon == "09")? 'selected="selected"':''?> value="09">September</option>
                    <option <?=($dptMon == "10")? 'selected="selected"':''?> value="10">October</option>
                    <option <?=($dptMon == "11")? 'selected="selected"':''?> value="11">November</option>
                    <option <?=($dptMon == "12")? 'selected="selected"':''?> value="12">December</option>

                </select>
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- expire date selection -->

                <label>Date</label>

                <select name="desired_dpt_day" id="" class="form-control select">

                    <option value=""></option>
                    <?php 
                        for($i=1;$i<=31;$i++){
                            if($i<10) $day = '0'.$i;
                            else $day = $i;
                            if($dptDay == $i) $sel = 'selected="selected"';
                            else $sel = '';
                            echo '<option '.$sel.' value="'.$day.'">'.$day.'</option>';
                        }
                    ?>

                </select>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-xs-8 left15" id="airnote-info" style="display:<?=($depart_date === 'other')?'block':'none';?>;">

            <label>Departure Notes for Air Travel</label>

            <textarea class="form-control" id="air-note" name="air_notes_dpt" placeholder="Please detail any additional specifics for your deviation request"><?php echo $air_notes_dpt; ?></textarea>

        </div>

        <div id="home-info" class="form-group col-xs-5 left15"><!-- return location selection -->

            <label>How are you returning?</label>

            <select class="form-control select" id="return-date" name="return_date" onchange="airnoteCheck(this);">

                <option></option>

                <option  value="On group date - Friday, June 15" <?php echo $airnoteDefault; ?>>On group date - Friday, June 15</option>

                <option id="airnote" value="other" <?php echo $airnoteOther; ?>>Other</option>

            </select>

        </div>

        <div class="clearfix"></div>
        <div style="display:<?=($return_date == 'other') ? 'block':'none' ?>" class="desired-ret">
            <strong class="help-block">Desired Return Date</strong>
            <?php 
                if($desired_rt != "0000-00-00"){
                    $rtMon = date('m', strtotime($desired_rt));
                    $rtDay = date('d', strtotime($desired_rt)); 
                } else $rtMon = $rtDay = "";
            ?>
            <div class="form-group col-xs-6 col-sm-6 col-md-3"><!-- expire month selection -->
                <label>Month</label>
                <select name="desired_rt_mon" class="form-control select">
                    <option value=""></option>
                    <option <?=($rtMon == "01")? 'selected="selected"':''?> value="01">January</option>
                    <option <?=($rtMon == "02")? 'selected="selected"':''?> value="02">February</option>
                    <option <?=($rtMon == "03")? 'selected="selected"':''?> value="03">March</option>
                    <option <?=($rtMon == "04")? 'selected="selected"':''?> value="04">April</option>
                    <option <?=($rtMon == "05")? 'selected="selected"':''?> value="05">May</option>
                    <option <?=($rtMon == "06")? 'selected="selected"':''?> value="06">June</option>
                    <option <?=($rtMon == "07")? 'selected="selected"':''?> value="07">July</option>
                    <option <?=($rtMon == "08")? 'selected="selected"':''?> value="08">August</option>
                    <option <?=($rtMon == "09")? 'selected="selected"':''?> value="09">September</option>
                    <option <?=($rtMon == "10")? 'selected="selected"':''?> value="10">October</option>
                    <option <?=($rtMon == "11")? 'selected="selected"':''?> value="11">November</option>
                    <option <?=($rtMon == "12")? 'selected="selected"':''?> value="12">December</option>

                </select>
            </div>
            <div class="form-group col-xs-6 col-sm-6 col-md-3"><!-- expire date selection -->

                <label>Date</label>

                <select name="desired_rt_day" id="" class="form-control select">

                    <option value=""></option>
                    <?php 
                        for($i=1;$i<=31;$i++){
                            if($i<10) $day = '0'.$i;
                            else $day = $i;
                            if($rtDay == $i) $sel = 'selected="selected"';
                            else $sel = '';
                            echo '<option '.$sel.' value="'.$day.'">'.$day.'</option>';
                        }
                    ?>

                </select>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-xs-8 left15" id="homenote-info" style="display:<?php echo $showHomenote; ?>;">

            <label>Return Notes for Air Travel</label>

            <textarea class="form-control" id="air-note" name="air_notes" placeholder="Please detail any additional specifics for your deviation request"><?=$air_notes; ?></textarea>

        </div>

        <div class="form-group col-xs-8 left15" id="travelreq-info">

            <label class="lbl-nopad">Additional travel request</label>

            <span class="help-block">Please provide any additional travel requests here, such as route or upgrade preference. Please note that any deviations and upgrades may incur additional charges, and will be confirmed to you prior to purchasing your ticket.
            </span>
            <textarea class="form-control" id="travel-note" name="travel_req" placeholder=""><?=$travel_req ?></textarea>

        </div>
        <?php if($Companion == 'Yes') { ?> 
            <div id="guest-info" style="display:'none';">

                <div class="clearfix"></div>

                <hr />

                <h3 class="left30">Guest Information</h3>

                <strong class="help-block">Flights and Accommodation</strong>

                <div class="clearfix"></div>

                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 left15"><!-- frequent flyer selection -->

                    <label>Do you have a frequent flyer number?</label>

                    <select class="form-control select" id="frequent-flyer_g" name="frequent_flyer_g" onchange="ffCheck_g(this);">
                        <option value="No" <?php echo $ffnoselect_g; ?>>No</option>

                        <option id="yesFF_g" value="Yes" <?php echo $ffyesselect_g; ?>>Yes</option>

                    </select>

                </div>
                <span id="ff-info_g" style="display:<?php echo $showFF_g; ?>;">

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- frequent flyer number -->

                        <label>Frequent Flyer #</label>

                        <input type="text" class="form-control" placeholder="" id="frequent-flyer-no_g" name="frequent_flyer_no_g" value="<?=$ff_number_g ?>" />

                    </div>


                   <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 left15"><!-- frequent flyer airline selection -->

                       <label>Frequent Flyer Airline</label>

                       <select class="form-control select" id="ff-airline_g" name="ff_airline_g" onchange="ffCheckno_g(this);">
                           <option value="American Airlines" <?=($ff_airline_g === "American Airlines")?'selected="selected"':''; ?>>American Airlines</option>
                           <option value="Caribbean Airlines" <?=($ff_airline_g === "Caribbean Airlines")?'selected="selected"':''; ?>>Caribbean Airlines</option>
                           <option value="Delta Airlines" <?=($ff_airline_g === "Delta Airlines")?'selected="selected"':''; ?>>Delta Airlines</option>
                           <option value="US Airways" <?=($ff_airline_g === "US Airways")?'selected="selected"':''; ?>>US Airways</option>
                           <option value="United Airlines" <?=($ff_airline_g === "United Airlines")?'selected="selected"':''; ?>>United Airlines</option>
                           <option value="Liat" <?=($ff_airline_g === "Liat")?'selected="selected"':''; ?>>Liat</option>
                           <option id="noFF" value="other" <?=($ff_airline_g === "other")?'selected="selected"':''; ?>>Other</option>
                       </select>

                   </div>

                    <div class="form-group col-xs-4" id="ffno-info_g" style="display:<?=($ff_airline_g==='other')?'block':'none' ?>;"><!-- frequent flyer number -->

                        <label>Other Airline</label>

                        <input type="text" class="form-control" placeholder="" id="off-airline_g" name="off_airline_g" value="<?=$off_airline_g; ?>" />

                    </div>

                    <div class="clearfix"></div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-6 left15"><!-- frequent flyer alt selection -->

                        <label>Do you have more than one frequent flyer number?</label>

                        <select class="form-control select" id="frequent-flyer-alt_g" name="frequent_flyer_alt_g" onchange="ff_alt_gCheck(this);">

                            <option value="No" <?=($fflyer_alt_g === 'No')?'selected="selected"':'';?>>No</option>

                            <option id="yesFF-alt_g" value="Yes" <?=($fflyer_alt_g === 'Yes')?'selected="selected"':'';?>>Yes</option>

                        </select>

                    </div>

                    <span id="ff-info-alt_g" style="display:<?=($fflyer_alt_g === 'Yes')?'block':'none';?>;">

                        <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- frequent flyer number -->

                            <label>Frequent Flyer # 2</label>

                            <input type="text" class="form-control" placeholder="" id="frequent-flyer-no-alt_g" name="frequent_flyer_no_alt_g" value="<?=$ff_number_alt_g ?>" />

                        </div>

                       <div class="clearfix"></div>

                       <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 left15"><!-- frequent flyer airline selection -->

                           <label>Frequent Flyer Airline 2</label>

                           <select class="form-control select" id="ff-airline-alt_g" name="ff_airline_alt_g" onchange="off_alt_gCheck(this);">
                               <option value="American Airlines" <?=($ff_airline_alt_g === "American Airlines")?'selected="selected"':''; ?>>American Airlines</option>
                               <option value="Caribbean Airlines" <?=($ff_airline_alt_g === "Caribbean Airlines")?'selected="selected"':''; ?>>Caribbean Airlines</option>
                               <option value="Delta Airlines" <?=($ff_airline_alt_g === "Delta Airlines")?'selected="selected"':''; ?>>Delta Airlines</option>
                               <option value="US Airways" <?=($ff_airline_alt_g === "US Airways")?'selected="selected"':''; ?>>US Airways</option>
                               <option value="United Airlines" <?=($ff_airline_alt_g === "United Airlines")?'selected="selected"':''; ?>>United Airlines</option>
                               <option value="Liat" <?=($ff_airline_alt_g === "Liat")?'selected="selected"':''; ?>>Liat</option>
                               <option id="noFF" value="other" <?=($ff_airline_alt_g === "other")?'selected="selected"':''; ?>>Other</option>
                           </select>

                       </div>

                        <div class="form-group col-xs-4" id="off-info-alt_g" style="display:<?=($ff_airline_alt_g === 'other')?'block':'none'; ?>;"><!-- frequent flyer number -->

                            <label>Other Airline 2</label>

                            <input type="text" class="form-control" placeholder="" id="off-airline_alt_g" name="off_airline_alt_g" value="<?=$off_airline_alt_g?>">

                        </div>

                    </span>

                </span>

                <div class="clearfix"></div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-7 left15"><!-- luggage selection -->

                    <label>Number of bags you will personally check in - **Airline baggage charges may apply**</label>

                    <select class="form-control select" id="luggage-g" name="luggage_g">

                        <option <?php echo ($bags_g == 'No') ? 'selected="selected"' : ''; ?>>None</option>

                        <option <?php echo ($bags_g == 1) ? 'selected="selected"' : ''; ?>>1</option>

                        <option <?php echo ($bags_g == 2) ? 'selected="selected"' : ''; ?>>2</option>

                    </select>

                </div>

                <div class="clearfix"></div>

                <hr />

                <strong class="help-block">Travel Information</strong>

                <div class="alert alert-success col-xs-11 left30" role="alert">

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>

                    Travel will be arranged based on the best possible routing from your home city. Please note that every effort will be made to accommodate your flight request, where possible. Additional charges may apply to you personally, should you wish to make a stop over or extend your trip. Information on applicable charges will be communicated to you by e.mail and must be confirmed by you within 24 hours.  Please also note that we are unable to guarantee your request. </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-4 left15"><!-- airport code field -->

                    <label>What airport will you be flying out of?</label>

                    <input type="text" class="form-control" placeholder="" id="airport-code-g" name="airport_code_g" value="<?=$airport_code_g?>">

                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-4 left15"><!-- depart location selection -->

                    <label>I would like to depart from my home city</label>

                    <select class="form-control select" id="depart-date_g" name="depart_date_g" onchange="homeCheck_g(this);">

                        <option></option>

                        <?php 
                            if($club_g == 0) 
                                $optVal = 'On group date - Sunday, June 10';
                            else $optVal = 'On President\'s Club departure date - Friday, June 8';
                        ?>
                        <option id="yeshome_g" <?=($depart_date !== 'other')?'selected="selected"':'';?> value="<?=$optVal?>"><?=$optVal?></option>

                        <option value="other" <?=($depart_date_g === 'other')?'selected="selected"':'';?>>Other</option>

                    </select>

                </div>


            <div class="clearfix"></div>
            <div style="display:<?=($depart_date_g == 'other') ? 'block':'none' ?>" class="desired-dpt_g">
                <strong class="help-block">Desired Departure Date</strong>
                <?php 
                    if($desired_dpt_g != "0000-00-00"){
                        $dptMon_g = date('m', strtotime($desired_dpt_g));
                        $dptDay_g = date('d', strtotime($desired_dpt_g)); 
                    } else $dptMon_g = $dptDay_g = "";
                ?>
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- expire month selection -->
                    <label>Month</label>
                    <select name="desired_dpt_mon_g" class="form-control select">
                        <option value=""></option>
                        <option <?=($dptMon_g == "01")? 'selected="selected"':''?> value="01">January</option>
                        <option <?=($dptMon_g == "02")? 'selected="selected"':''?> value="02">February</option>
                        <option <?=($dptMon_g == "03")? 'selected="selected"':''?> value="03">March</option>
                        <option <?=($dptMon_g == "04")? 'selected="selected"':''?> value="04">April</option>
                        <option <?=($dptMon_g == "05")? 'selected="selected"':''?> value="05">May</option>
                        <option <?=($dptMon_g == "06")? 'selected="selected"':''?> value="06">June</option>
                        <option <?=($dptMon_g == "07")? 'selected="selected"':''?> value="07">July</option>
                        <option <?=($dptMon_g == "08")? 'selected="selected"':''?> value="08">August</option>
                        <option <?=($dptMon_g == "09")? 'selected="selected"':''?> value="09">September</option>
                        <option <?=($dptMon_g == "10")? 'selected="selected"':''?> value="10">October</option>
                        <option <?=($dptMon_g == "11")? 'selected="selected"':''?> value="11">November</option>
                        <option <?=($dptMon_g == "12")? 'selected="selected"':''?> value="12">December</option>

                    </select>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- expire date selection -->

                    <label>Date</label>

                    <select name="desired_dpt_day_g" class="form-control select">

                        <option value=""></option>
                        <?php 
                            for($i=1;$i<=31;$i++){
                                if($i<10) $day = '0'.$i;
                                else $day = $i;
                                if($dptDay_g == $i) $sel = 'selected="selected"';
                                else $sel = '';
                                echo '<option '.$sel.' value="'.$day.'">'.$day.'</option>';
                            }
                        ?>

                    </select>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-9 left15" id="airnote-info_g" style="display:<?=($depart_date_g === 'other')?'block':'none'; ?>;">

                <label>Departure Notes for Air Travel</label>

                <textarea class="form-control" id="air-note_g" name="air_notes_gdpt" placeholder="Please detail any additional specifics for your deviation request"><?=$air_notes_dpt_g ?></textarea>

            </div>

            <div class="clearfix"></div>


            <div id="home-info_g" class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 left15" style="display:block;"><!-- return location selection -->

                <label>How are you returning?</label>

                <select class="form-control select" id="return-date_g" name="return_date_g" onchange="airnote_gCheck(this);">

                    <option></option>

                    <option value="On group date - Friday, June 15" <?php echo ($return_date_g !== 'other')?'selected="selected"':''; ?>>On group date - Friday, June 15</option>

                    <option id="airnote_g" value="other" <?php echo ($return_date_g === 'other')?'selected="selected"':''; ?>>Other</option>

                </select>
            </div>
            <div class="clearfix"></div>
            <div style="display:<?=($return_date_g == 'other') ? 'block':'none' ?>" class="desired-ret_g">
                <strong class="help-block">Desired Return Date</strong>
                <?php 
                    if($desired_rt_g != "0000-00-00"){
                        $rtMon_g = date('m', strtotime($desired_rt_g));
                        $rtDay_g = date('d', strtotime($desired_rt_g)); 
                    } else $rtMon_g = $rtDay_g = "";
                ?>
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- expire month selection -->
                    <label>Month</label>
                    <select name="desired_rt_mon_g" class="form-control select">
                        <option value=""></option>
                        <option <?=($rtMon_g == "01")? 'selected="selected"':''?> value="01">January</option>
                        <option <?=($rtMon_g == "02")? 'selected="selected"':''?> value="02">February</option>
                        <option <?=($rtMon_g == "03")? 'selected="selected"':''?> value="03">March</option>
                        <option <?=($rtMon_g == "04")? 'selected="selected"':''?> value="04">April</option>
                        <option <?=($rtMon_g == "05")? 'selected="selected"':''?> value="05">May</option>
                        <option <?=($rtMon_g == "06")? 'selected="selected"':''?> value="06">June</option>
                        <option <?=($rtMon_g == "07")? 'selected="selected"':''?> value="07">July</option>
                        <option <?=($rtMon_g == "08")? 'selected="selected"':''?> value="08">August</option>
                        <option <?=($rtMon_g == "09")? 'selected="selected"':''?> value="09">September</option>
                        <option <?=($rtMon_g == "10")? 'selected="selected"':''?> value="10">October</option>
                        <option <?=($rtMon_g == "11")? 'selected="selected"':''?> value="11">November</option>
                        <option <?=($rtMon_g == "12")? 'selected="selected"':''?> value="12">December</option>

                    </select>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- expire date selection -->

                    <label>Date</label>

                    <select name="desired_rt_day_g" class="form-control select">

                        <option value=""></option>
                        <?php 
                            for($i=1;$i<=31;$i++){
                                if($i<10) $day = '0'.$i;
                                else $day = $i;
                                if($rtDay_g == $i) $sel = 'selected="selected"';
                                else $sel = '';
                                echo '<option '.$sel.'value="'.$day.'">'.$day.'</option>';
                            }
                        ?>

                    </select>
                </div>
            </div>
            <div class="clearfix"></div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-9 left15" id="homenote-info_g" style="display:<?=($return_date_g === 'other')?'block':'none';?>;">

                    <label>Returning Notes for Air Travel</label>

                    <textarea class="form-control" id="air-note_g" name="air_notes_g" placeholder="Please detail any additional specifics for your deviation request"><?=$air_notes_g?></textarea>

                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-9 left15" id="travelreq-info_g">

                    <label class="lbl-nopad">Additional travel request</label>
                    <span class="help-block">
                        Please provide any additional travel requests here, such as route or upgrade preference. Please note that any deviations and upgrades may incur additional charges, and will be confirmed to you prior to purchasing your ticket.
                    </span>
                    <textarea class="form-control" id="travel-note_g" name="travel_req_g" placeholder=""><?=$travel_req_g?></textarea>

                </div>

                <!--<div class="alert alert-warning col-xs-11 left30" role="alert">

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>

                    There will be a presentation by motivational speaker Peter Cleveland on September 23. For those companions who do not wish to attend, we have organized a backstage tour of Jubilee. If you would like to partifipate in the Spouse Program at Jubilee, please indicate below.

               </div>-->

        </div>


        <?php } ?>
        <div class="clearfix"></div>

        <div class="form-group left30">

            <div>

                
                <button type="submit" name="prev_update" id="update" value="" class="btn btn-success left10">Previous</button>

                <button class="btn btn-success left10" id="update" name="update" type="submit">Next</button>

            </div>

        </div>

                   <input type="hidden" name="redirect_to" value="" />
    </form>
</div>
<script type="text/javascript">

    //Winner Methods
    function ffCheck(ffSelect){

        if(ffSelect){

            ffOptionValue = document.getElementById("yesFF").value;

            if(ffOptionValue == ffSelect.value){

                document.getElementById("ff-info").style.display = "block";

            }

            else{

                document.getElementById("ff-info").style.display = "none";

            }

        }

        else{

            document.getElementById("ff-info").style.display = "none";

        }

    }
    function ffCheckno(ffnoSelect){

        console.log(ffnoSelect);

        if(ffnoSelect){

            ffnoOptionValue = document.getElementById("noFF").value;

            if(ffnoOptionValue == ffnoSelect.value){

                document.getElementById("ffno-info").style.display = "block";

            }

            else{

                document.getElementById("ffno-info").style.display = "none";

            }

        }

        else{

            document.getElementById("ffno-info").style.display = "none";

        }

    }
    function ff_altCheck(ff_altyesSelect){

        console.log(ff_altyesSelect);

        if(ff_altyesSelect){

            ff_altyesOptionValue = document.getElementById("yesFF-alt").value;

            if(ff_altyesOptionValue == ff_altyesSelect.value){

                document.getElementById("ff-info-alt").style.display = "block";

            }

            else{

                document.getElementById("ff-info-alt").style.display = "none";

            }

        }

        else{

            document.getElementById("ff-info-alt").style.display = "none";

        }

    }
    function off_altCheck(off_altyesSelect){

        console.log(off_altyesSelect);

        if(off_altyesSelect){

            off_altyesOptionValue = document.getElementById("yesFF_alt").value;

            if(off_altyesOptionValue == off_altyesSelect.value){

                document.getElementById("off-info-alt").style.display = "block";

            }

            else{

                document.getElementById("off-info-alt").style.display = "none";

            }

        }

        else{

            document.getElementById("off-info-alt").style.display = "none";

        }

    }

    function homeCheck(homeSelect){

        console.log(homeSelect);

        if(homeSelect){

            homeOptionValue = document.getElementById("yeshome").value;

            if(homeOptionValue == homeSelect.value){

                document.getElementById("airnote-info").style.display = "none";

              //  document.getElementById("travelreq-info").style.display = "block";

                $('.desired-dpt').hide();

            }

            else{
                $('.desired-dpt').show();

                document.getElementById("airnote-info").style.display = "block";

             //   document.getElementById("travelreq-info").style.display = "none";

            }

        }

        else{

            document.getElementById("airnote-info").style.display = "block";

            //document.getElementById("travelreq-info").style.display = "none";

        }

    }
    function airnoteCheck(airnoteSelect){

        console.log(airnoteSelect);

        if(airnoteSelect){

            airnoteOptionValue = document.getElementById("airnote").value;

            if(airnoteOptionValue == airnoteSelect.value){

                document.getElementById("homenote-info").style.display = "block";

             //   document.getElementById("travelreq-info").style.display = "none";
                $('.desired-ret').show();
            }

            else{

                $('.desired-ret').hide();
                document.getElementById("homenote-info").style.display = "none";

            //    document.getElementById("travelreq-info").style.display = "block";

            }

        }

        else{

                $('.desired-rt').hide();
            document.getElementById("homenote-info").style.display = "none";

           // document.getElementById("travelreq-info").style.display = "block";

        }

    }


    //Guest/Companion Methods
    function ffCheck_g(ffSelect_g){

        console.log(ffSelect_g);

        if(ffSelect_g){

            ffOptionValue_g = document.getElementById("yesFF_g").value;

            if(ffOptionValue_g == ffSelect_g.value){

                document.getElementById("ff-info_g").style.display = "block";

            }

            else{

                document.getElementById("ff-info_g").style.display = "none";

            }

        }

        else{

            document.getElementById("ff-info_g").style.display = "none";

        }

    }
    function ffCheckno_g(ffnoSelect_g){

        console.log(ffnoSelect_g);

        if(ffnoSelect_g){

            ffno_gOptionValue = document.getElementById("noFF_g").value;

            if(ffno_gOptionValue == ffnoSelect_g.value){

                document.getElementById("ffno-info_g").style.display = "block";

            }

            else{

                document.getElementById("ffno-info_g").style.display = "none";

            }

        }

        else{

            document.getElementById("ffno-info_g").style.display = "none";

        }

    }
    function ff_alt_gCheck(ff_alt_gyesSelect){

        console.log(ff_alt_gyesSelect);

        if(ff_alt_gyesSelect){

            ff_alt_gyesOptionValue = document.getElementById("yesFF-alt_g").value;

            if(ff_alt_gyesOptionValue == ff_alt_gyesSelect.value){

                document.getElementById("ff-info-alt_g").style.display = "block";

            }

            else{

                document.getElementById("ff-info-alt_g").style.display = "none";

            }

        }

        else{

            document.getElementById("ff-info-alt_g").style.display = "none";

        }

    }
    function off_alt_gCheck(off_alt_gyesSelect){

        console.log(off_alt_gyesSelect);

        if(off_alt_gyesSelect){

            off_alt_gyesOptionValue = document.getElementById("yesFF_alt_g").value;

            if(off_alt_gyesOptionValue == off_alt_gyesSelect.value){

                document.getElementById("off-info-alt_g").style.display = "block";

            }

            else{

                document.getElementById("off-info-alt_g").style.display = "none";

            }

        }

        else{

            document.getElementById("off-info-alt_g").style.display = "none";

        }

    }

    function homeCheck_g(homeSelect_g){

        console.log(homeSelect_g);

        if(homeSelect_g){

            home_gOptionValue = document.getElementById("yeshome_g").value;

            if(home_gOptionValue == homeSelect_g.value){

                document.getElementById("airnote-info_g").style.display = "none";

          //      document.getElementById("travelreq-info_g").style.display = "block";
                $('.desired-dpt_g').hide();
            }

            else{

                document.getElementById("airnote-info_g").style.display = "block";

            //    document.getElementById("travelreq-info_g").style.display = "none";
                $('.desired-dpt_g').show();

            }

        }

        else{

            document.getElementById("airnote-info_g").style.display = "block";

         //   document.getElementById("travelreq-info_g").style.display = "none";

        }

    }
    function airnote_gCheck(airnote_gSelect){

        console.log(airnote_gSelect);

        if(airnote_gSelect){

            airnote_gOptionValue = document.getElementById("airnote_g").value;

            if(airnote_gOptionValue == airnote_gSelect.value){

                document.getElementById("homenote-info_g").style.display = "block";

                //document.getElementById("travelreq-info_g").style.display = "none";
                $('.desired-ret_g').show();
            }

            else{

                document.getElementById("homenote-info_g").style.display = "none";

              //  document.getElementById("travelreq-info_g").style.display = "block";

                $('.desired-ret_g').hide();
            }

        }

        else{
            $('.desired-ret_g').hide();
            document.getElementById("homenote-info_g").style.display = "none";

          //  document.getElementById("travelreq-info_g").style.display = "block";

        }

    }



</script>
     </div>
     <!-- /m_editable -->
    </div>
   