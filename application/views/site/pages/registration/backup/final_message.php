<!-- content -->
<?php
/*
echo "<pre>";
var_dump($this->data['userData']);
if (isset($this->data['guestData'])) {
//    var_dump($this->data['guestData']);
}
echo "end guest</pre>";*/

//Winners Section
//Getting all the values.
$title = isset($data['userData']) ? $data['userData']->title : '';
$first_name = isset($data['userData']) ? $data['userData']->first_name : '';
$last_name = isset($data['userData']) ? $data['userData']->last_name : '';
$name_badge = isset($data['userData']) ? $data['userData']->name_badge : '';
$name_badge_last = isset($data['userData']) ? $data['userData']->name_badge_last : '';
$birth_date = isset($data['userData']) ? $data['userData']->birth_date : '';
$birth_country = isset($data['userData']) ? $data['userData']->birth_country : '';
$home = isset($data['userData']) ? $data['userData']->home : '';
$email = isset($data['userData']) ? $data['userData']->email : '';
$st_1address = isset($data['userData']) ? $data['userData']->st_1address : '';
$city = isset($data['userData']) ? $data['userData']->city : '';
$country = isset($data['userData']) ? $data['userData']->country : '';
$shirt_size = isset($data['userData']) ? $data['userData']->shirt_size : '';
$passport = isset($data['userData']) ? $data['userData']->passport : '';
$citizen = isset($data['userData']) ? $data['userData']->citizen : '';
$issue_city = isset($data['userData']) ? $data['userData']->issue_city : '';
$issue_date = isset($data['userData']) ? $data['userData']->issue_date : '';
$expire_date = isset($data['userData']) ? $data['userData']->expire_date : '';
$emerg_name = isset($data['userData']) ? $data['userData']->emergency_name : '';
$emerg_home = isset($data['userData']) ? $data['userData']->emergency_home : '';
$seating = isset($data['userData']) ? $data['userData']->seating : '';
$bags = isset($data['userData']) ? $data['userData']->bags : '';
$bed = isset($data['userData']) ? $data['userData']->bed : '';
$airport_code = isset($data['userData']) ? $data['userData']->airport_code : '';
$depart_date = isset($data['userData']) ? $data['userData']->depart_date : '';
$return_date = isset($data['userData']) ? $data['userData']->return_date : '';
$companion = isset($data['userData']) ? $data['userData']->noguest : '';
$cc_type = isset($data['cardDetails']) ? $data['cardDetails']['cc_type'] : '';
$card_name = isset($data['cardDetails']) ? $data['cardDetails']['card_name'] : '';
$card_number = isset($data['cardDetails']) ? $data['cardDetails']['card_number'] : '';
$exp_date = isset($data['cardDetails']) ? $data['cardDetails']['exp_date'] : '';
$cvv = isset($data['cardDetails']) ? $data['cardDetails']['cvv'] : '';
$cc_st_1address = isset($data['cardDetails']) ? $data['cardDetails']['cc_st_1address'] : '';
$cc_country = isset($data['cardDetails']) ? $data['cardDetails']['cc_country'] : '';



//WInner Message
$winnerErrors = false;


//guest/companion requirements section
$title_g = isset($data['guestData']) ? $data['guestData']->title : '';
$first_name_g = isset($data['guestData']) ? $data['guestData']->first_name : '';
$last_name_g = isset($data['guestData']) ? $data['guestData']->last_name : '';
$name_badge_g = isset($data['guestData']) ? $data['guestData']->name_badge : '';
$name_badge_last_g = isset($data['guestData']) ? $data['guestData']->name_badge_last : '';
$birth_date_g = isset($data['guestData']) ? $data['guestData']->birth_date : '';
$birth_country_g = isset($data['guestData']) ? $data['guestData']->birth_country : '';
$home_g = isset($data['guestData']) ? $data['guestData']->home : '';
$email_g = isset($data['guestData']) ? $data['guestData']->email : '';
$st_1address_g = isset($data['guestData']) ? $data['guestData']->st_1address : '';
$city_g = isset($data['guestData']) ? $data['guestData']->city : '';
$country_g = isset($data['guestData']) ? $data['guestData']->country : '';
$shirt_size_g = isset($data['guestData']) ? $data['guestData']->shirt_size : '';
$passport_g = isset($data['guestData']) ? $data['guestData']->passport : '';
$citizen_g = isset($data['guestData']) ? $data['guestData']->citizen : '';
$emerg_name_g = isset($data['guestData']) ? $data['guestData']->emergency_name : '';
$emerg_home_g = isset($data['guestData']) ? $data['guestData']->emergency_home : '';
$seating_g = isset($data['guestData']) ? $data['userData']->seating : '';
$bags_g = isset($data['guestData']) ? $data['guestData']->bags : '';
$bed_g = isset($data['guestData']) ? $data['guestData']->bed : '';
$airport_code_g = isset($data['guestData']) ? $data['guestData']->airport_code : '';
$depart_date_g = isset($data['guestData']) ? $data['guestData']->depart_date : '';
$return_date_g = isset($data['guestData']) ? $data['guestData']->return_date : '';
$issue_city_g = isset($data['guestData']) ? $data['guestData']->issue_city : '';
$issue_date_g = isset($data['guestData']) ? $data['guestData']->issue_date : '';
$expire_date_g = isset($data['guestData']) ? $data['guestData']->expire_date : '';

$companionErrors = false;
?>

<div class="row">

    <ul class="progress-indicator">

        <li class="completed">

            <span class="bubble"></span>

            <i class="fa fa-check-circle"></i>

            1. <small>Personal Information</small>

        </li>

        <li class="completed">

            <span class="bubble"></span>

            <i class="fa fa-check-circle"></i>

            2. <small>Passport Information</small>

        </li>

        <li class="completed">

            <span class="bubble"></span>

            <i class="fa fa-check-circle"></i>

            3. <small>Emergency Contact</small>

        </li>

        <li class="completed">

            <span class="bubble"></span>

            <i class="fa fa-check-circle"></i>

            4. <small>Flights and Accommodation</small>

        </li>

        <li class="completed">

            <span class="bubble"></span>

            5. <small>Activities</small>

        </li>

        <li class="completed">

            <span class="bubble"></span>

            <strong>6. <small>Credit Card Details</small></strong>

        </li>

    </ul>

    <h3>Registration Successful!</h3><br />

    <!-- registration form -->
    <div class="alert alert-success col-xs-11" role="alert">

        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>

        Thank you for submitting your registration. Please be sure to come back and complete any required fields before registration closes on Wednesday, February 28th

    </div>

    <div class="clearfix"></div>

    <div id="winnerBlock" style="display:block">

        <h4>Please return to complete the following required items</h4>

        <?php
        $isAnyFieldEmpty = false;
        if(!isValidPassportDate($expire_date)) {
            $isAnyFieldEmpty = true;
            echo 'Passport expires within 6 months of travel. Please renew your passport and enter your new passport details.<br />';
        }
        $winnerFields = [
            'Personal Information' => [
                'title'=>'Title',
                'first_name'=>'First Name',
                'last_name' =>'Last Name',
                'name_badge'=>'Badge First Name',
                'name_badge_last'=>'Badge Last Name',
                'birth_date'=>'Date Of Birth',
                'home'=>'Home Phone',
                'email'=>'Email',
                'st_1address'=>'Street Address 1',
                'city'=>'State/Province/Parish',
                'country'=>'Country',
                'shirt_size'=>'Shirt Size'
                ],
            'Passport Information' => [
                'passport'=>'Passport Number',
                'citizen'=>'Passport Country',
                'issue_date'=>'Passport Issue Date',
                'issue_city'=>'Passport Issue City',
                'expire_date'=>'Passport Expire Date'
            ],
            'Emergency Contact Information'=>[
                'emerg_name'=>'Emergency Contact Name',
                'emerg_home'=>'Emergency Contact Home Phone Number'
            ],
            'Flight and Accommodation'=>[
                'seating'=>'Airline Seat preference',
                'bags'=>'Number of bags you will personally check in',
                'bed'=>'Bed Configuration',
                'airport_code'=>'I will be flying out of',
                'depart_date'=>'I would like to depart from my home city',
                'return_date'=>'How are you returning?'
            ],
            'Credit Cart Information' => [
                'cc_type'=>'Credit Card Type',
                'card_name'=>'Credit Card Holder',
                'card_number'=>'Credit Card Number',
                'exp_date'=>'Credit Card Expiration Date',
                'cvv'=>'Credit Card CVV',
                'cc_st_1address'=>'Credit Card Street Address 1',
                'cc_country'=>'Credit Card Country'
                ]
            ];

        foreach($winnerFields as $k => $sect){
            $count = 0;
            foreach($sect as $key => $field){
                if(empty($$key)){
                    if($count == 0){
                        echo '<strong>'.str_replace('_','',$k).'</strong><br/>';
                        $count +=1;
                    }
                    echo $field.'<br/>';
                    $winnerErrors = true;
                    $isAnyFieldEmpty = true;
                } 
            }
        }
        ?>

    </div>

    <div class="clearfix"></div>
<?php if($companion == 'Yes'){ ?>
    <div id="companionBlock" style="display:block;">

        <h4>Please return to complete the below information for your travelling companion</h4>

        <?php

        if(!isValidPassportDate($expire_date_g)) {
            $isAnyFieldEmpty = true;
            echo 'Companion Passport expires within 6 months of travel.<br />';
        }
        $guestFields = [
            'Personal Information' => [
                'email_g'=>'E-Mail',
                'title_g'=>'Title',
                'first_name_g'=>'First Name',
                'last_name_g' =>'Last Name',
                'name_badge_g'=>'Badge First Name',
                'name_badge_last_g'=>'Badge Last Name',
                'birth_date_g'=>'Date Of Birth',
                'birth_country_g'=>'Birth Place (Country Of Birth)',
                'home_g'=>'Home Phone',
                'st_1address_g'=>'Street Address 1',
                'city_g'=>'State/Province/Parish',
                'country_g'=>'Country',
                'shirt_size_g'=>'Shirt Size'
                ],
            'Passport Information' => [
                'passport_g'=>'Passport Number',
                'citizen_g'=>'Passport Country',
                'issue_date_g'=>'Passport Issue Date',
                'issue_city_g'=>'Passport Issue City',
                'expire_date_g'=>'Passport Expire Date'
            ],
            'Emergency Contact Information'=>[
                'emerg_name_g'=>'Emergency Contact Name',
                'emerg_home_g'=>'Emergency Contact Home Phone Number'
            ],
            'Flight and Accommodation'=>[
                'seating_g'=>'Airline Seat preference',
                'bags_g'=>'Number of bags you will personally check in',
                //'bed_g'=>'Bed Configuration',
                'airport_code_g'=>'I will be flying out of',
                'depart_date_g'=>'I would like to depart from my home city',
                'return_date_g'=>'How are you returning?'
            ],
         ];


        foreach($guestFields as $k => $sect){
            $count = 0;
            foreach($sect as $key => $field){
                if(empty($$key)){
                    if($count == 0){
                        echo '<strong>'.str_replace('_','',$k).'</strong><br/>';
                        $count +=1;
                    }
                    echo $field.'<br/>';
                    $companionErrors = true;
                    $isAnyFieldEmpty = true;
                } 
            }
        }
      
        ?>

    </div><br />
    <?php } 

    ?>
    <div class="clearfix"></div>

    <div class="form-group left30">

        <div>

            <a href="<?=base_url()?>registration/step6_credit_card" class="btn btn-success" role="button">Previous</a>

            <a href="<?=base_url()?>registration/register" class="btn btn-success left10" role="button">Review registration</a>
            <form method="POST" action="<?=base_url()?>registration/lock" class="form-control" style="display:inline;box-shadow: none;border:none">
            <?php 
                if($isAnyFieldEmpty == false){
                    echo '<input type="hidden" name="confirm" value="1" />';
                    echo "<button type='submit' class='btn btn-success left10' >Confirm Registration</button>";
                }
            ?>
            </form>

        </div>

    </div>

</div>

<!-- content end -->

<script type="text/javascript">
    $(function(){
        <?php
        if ($winnerErrors === true) {
            echo '$("#winnerBlock").show();';
        }else{
            echo '$("#winnerBlock").hide();';
        } ?>

        <?php
        if ($companionErrors === true && $companion === 'Yes') {
            echo '$("#companionBlock").show();';
        }else{
            echo '$("#companionBlock").hide();';
        } ?>
    });
</script>
