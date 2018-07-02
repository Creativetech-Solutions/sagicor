<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Alvin Herbert - Sunlinc" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Sagicor Convention 2018</title>
    <link href="<?=base_url(); ?>assets/site/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url(); ?>assets/site/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/site/css/register_style.css" />
    <link rel="stylesheet" href="<?=base_url(); ?>assets/site/css/jquery-ui.css" type="text/css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="style/css/ie7.css" media="all" />
    <![endif]-->
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
    <![endif]-->
    <!--[if IE 9]>
    <link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
    <![endif]-->
    <script type="text/javascript" src="<?=base_url(); ?>assets/admin/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url(); ?>assets/site/js/jquery-ui.js"></script>
    <script src="<?=base_url(); ?>assets/admin/js/jquery.ui.touch-punch.js"></script>

    <script src="<?=base_url(); ?>assets/admin/js/jquery.wysiwyg.js"></script>

   <!--  <script src="<?=base_url(); ?>assets/admin/js/global.js"></script>

    <script src="<?=base_url(); ?>assets/admin/js/custom.js"></script> -->

    <script src="<?=base_url(); ?>assets/admin/js/modernizr.mq.js" type="text/javascript" ></script>

    <script src="<?=base_url(); ?>assets/admin/js/checkbox.js"></script>
</head>
<body>
<style>
    .input-black{background-color: #27292c;color: white;}
</style>
<div style="display:none" id="loader"></div>
<div id="msgholder"></div>
<div class="row">

    <form method="post" action="<?=base_url()?>admin/Registration/update/<?=$this->uri->segment(4)?>" lpformnum="30">
        <h1><img alt="" src="<?=base_url(); ?>assets/site/img/sagicor2016logo.jpg"><br><br>
            Registration Editor: . </h1>
        <div>
            <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-11">
                <label for="reg_id">Registration ID</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->reg_id:''?>" id="username" name="reg_id"
                       style="color: rgb(255, 255, 255); cursor: pointer;">
            </div>
            <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-11">
                <label for="title">Title</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->title:''?>" placeholder="title" name="title" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-11">
                <label for="first_name">First name</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->first_name:''?>" placeholder="First Name" name="first_name" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-11">
                <label for="last_name">Last name</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->last_name:''?>" placeholder="Last Name" name="last_name" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="birth_date">Date of birth</label>
                <input type="text" value="<?=(isset($regInfo) && $regInfo->birth_date != '--' && $regInfo->birth_date != '0000-00-00')?$regInfo->birth_date:''?>" placeholder="Date of birth" class="datepicker" name="birth_date" style="color: #ffffff;">
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-11">
                <label for="name_badge">Badge First name</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->name_badge:''?>" placeholder="Badge First Name" name="name_badge" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-11">
                <label for="name_badge_last">Badge Last name</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->name_badge_last:''?>" placeholder="Badge Last Name" name="name_badge_last"
                       style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-11">
                <label for="gender">Gender</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->gender:''?>" placeholder="Gender" name="gender" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-11">
                <label for="shirt_size">Shirt Size</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->shirt_size:''?>" placeholder="Shirt Size" name="shirt_size" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="birth_country">Country of Birth</label>
                <select name="birth_country" class="form-control input-black">
                    <?php 
                        if(is_array($countries) && !empty($countries)){
                            foreach ($countries as $key => $cntry) {
                                if($cntry->id == $regInfo->birth_country) $selected = 'selected';
                                else $selected = '';
                                echo '<option '.$selected.' value="'.$cntry->id.'">'.$cntry->name.'</option>';
                            }
                        }
                    ?> 
                </select>
            </div>
            <div class="clearfix"></div>
            <h3 style="margin-left: 10px;">Contact Information</h3>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="home">Home</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->home:''?>" placeholder="home" name="home" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="work">Work</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->work:''?>" placeholder="work" name="work" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="cell">Cell</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->cell:''?>" placeholder="cell" name="cell" style="color: #ffffff;">
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="email">Email</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->email:''?>" placeholder="email" name="email" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="alt_email">Alternate email</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->alt_email:''?>" placeholder="alternate email" name="alt_email" style="color: #ffffff;">
            </div>
            <div class="clearfix"></div>
            <h3 style="margin-left: 10px;">Address</h3>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="country">Country</label>
                <select name="country" class="form-control input-black">
                    <?php 
                        if(is_array($countries) && !empty($countries)){
                            foreach ($countries as $key => $cntry) {
                                if($cntry->id == $regInfo->country) $selected = 'selected';
                                else $selected = '';
                                echo '<option '.$selected.' value="'.$cntry->id.'">'.$cntry->name.'</option>';
                            }
                        }
                    ?> 
                </select>
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="st_1address">Street Address 1</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->st_1address:''?>" placeholder="Street Address 1" name="st_1address" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="st_2address">St Address 2</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->st_2address:''?>" placeholder="Street Address 2" name="st_2address" style="color: #ffffff;">
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="city">City</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->city:''?>" placeholder="city" name="city" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="state">State/Parish</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->state:''?>" placeholder="state" name="state" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="zip">Zip</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->zip:''?>" placeholder="zip" name="zip" style="color: #ffffff;">
            </div>
            <div class="clearfix"></div>
            <h3 style="margin-left: 10px;">Passport Information</h3>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="passport">Passport #</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->passport:''?>" placeholder="Passport number" name="passport" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="citizen">Passport Citizenship</label>
                <select name="citizen" class="form-control input-black country-visa" >
                    <?php 
                        if(is_array($countries) && !empty($countries)){
                            foreach ($countries as $key => $cntry) {
                                if($cntry->id == $regInfo->citizen) $selected = 'selected';
                                else $selected = '';
                                echo '<option '.$selected.' value="'.$cntry->id.'">'.$cntry->name.'</option>';
                            }
                        }
                    ?> 
                </select>
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="issue_city">Passport Issue City</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->issue_city:''?>" placeholder="issue_city" name="issue_city" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="issue_date">Passport Issue Date</label>
                <input type="text" value="<?=(isset($regInfo) && $regInfo->issue_date != '--' && $regInfo->issue_date != '0000-00-00')?$regInfo->issue_date:''?>" placeholder="Passport issue date" class="datepicker" name="issue_date" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="expire_date">Passport Expire Date</label>
                <input type="text" value="<?=(isset($regInfo) && $regInfo->expire_date != '--' && $regInfo->expire_date != '0000-00-00')?$regInfo->expire_date:''?>" placeholder="expire_date" name="expire_date" class="datepicker" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="us_visa">Do you have a valid US Visa?</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->us_visa:''?>" placeholder="US Visa" name="us_visa" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="obtain_visa">Are you able to obtain one?</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->obtain_visa:''?>" placeholder="obtain visa" name="obtain_visa" style="color: #ffffff;">
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11 pass-visa usa-visa-info">
                <label for="usa_visa_num">Canadian Visa Number</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->visa_type:''?>" placeholder="Visa Number" name="visa_type" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11 pass-visa usa-visa-info">
                <label for="usa_visa_exp">Canadian Visa Expiration Date</label>
                <input type="text" value="<?=(isset($regInfo) && $regInfo->visa_exp_date!='0000-00-00' && $regInfo->visa_exp_date!='--')?$regInfo->visa_exp_date:''?>" placeholder="Passport issue date" name="visa_exp_date" class="datepicker" style="color: #ffffff;">
            </div>
            <div class="clearfix"></div>
            <h3 style="margin-left: 10px;">Emergency Contact</h3>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="emergency_name">Contact name</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->emergency_name:''?>" placeholder="contact name" name="emergency_name" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="emergency_home">Home</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->emergency_home:''?>" placeholder="home" name="emergency_home" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="emergency_work">Work</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->emergency_work:''?>" placeholder="work" name="emergency_work" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="emergency_cell">Cell</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->emergency_cell:''?>" placeholder="cell" name="emergency_cell" style="color: #ffffff;">
            </div>
            <div class="clearfix"></div>
            <h3 style="margin-left: 10px;">Medical Information</h3>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="dr_name">Doctor Name</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->dr_name:''?>" placeholder="doctor name" name="dr_name" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="dr_day_phone">Dr Day phone</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->dr_day_phone:''?>" placeholder="dr day phone" name="dr_day_phone" style="color: #ffffff;">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-11">
                <label for="dr_alt_phone">Dr Alternate Phone</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->dr_alt_phone:''?>" placeholder="dr alternate phone" name="dr_alt_phone"
                       style="color: #ffffff;">
            </div>
            <div class="clearfix"></div>
            <div class="form-group  col-lg-6 col-md-6 col-sm-6 col-xs-11">
                <label for="med_conditions">Medical Conditions</label>
                <textarea style="width: 400px; height: 100px;" class="form-control" placeholder="Medical conditions"
                          name="med_conditions"><?=isset($regInfo)?$regInfo->med_conditions:''?></textarea>
            </div>
            <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-11">
                <label for="medication">Medication</label>
                <textarea style="width: 400px; height: 100px;" class="form-control" placeholder="" name="medication"><?=isset($regInfo)?$regInfo->medication:''?></textarea>
            </div>
            <div class="clearfix"></div>
            <h3 style="margin-left: 10px;">Dietary Information</h3>
            <div class="form-group col-xs-5 col-sm-5 col-md-5 col-lg-5">
                <label for="med_food">I absolutely, for medical reasons, cannot eat the following foods</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->med_food:''?>" placeholder="list foods here" name="med_food" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-5 col-sm-5 col-md-5 col-lg-5">
                <label for="religious_food">I absolutely, for religious reasons, cannot eat the following foods</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->religious_food:''?>" placeholder="list food here" name="religious_food" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-11 col-sm-4 col-md-3 col-lg-3"><!-- diabetic selection -->
                <label>
                    <input value="1" type="checkbox" <?=(isset($regInfo) && $regInfo->diabetic === '1')?'checked="checked"':''?> name="diabetic"> I am diabetic
                </label>
            </div>
            <div class="form-group col-xs-11 col-sm-4 col-md-3 col-lg-3"><!-- hypertension selection -->
                <label>
                    <input value="1" type="checkbox" <?=(isset($regInfo) && $regInfo->hypertension === '1')?'checked="checked"':''?> name="hypertension"> I suffer from hypertension
                </label>
            </div>
            <div class="form-group col-xs-11 col-sm-4 col-md-3 col-lg-3"><!-- vegetarian selection -->
                <label>
                    <input value="1" type="checkbox" <?=(isset($regInfo) && $regInfo->vegetarian === '1')?'checked="checked"':''?> id="dietreq" name="vegetarian"> I am vegetarian
                </label>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-xs-11 col-sm-4 col-md-3 col-lg-3"><!-- Fish selection -->
                <label>
                    <input value="1" type="checkbox" <?=(isset($regInfo) && $regInfo->fish === '1')?'checked="checked"':''?> name="fish"> However I do eat fish
                </label>
            </div>
            <div class="form-group col-xs-11 col-sm-4 col-md-3 col-lg-3"><!-- Chicken selection -->
                <label>
                    <input value="1" type="checkbox" <?=(isset($regInfo) && $regInfo->chicken === '1')?'checked="checked"':''?> id="dietreq" name="chicken"> However I do eat chicken
                </label>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-xs-11 col-sm-6 col-md-5 col-lg-4">
                <label for="intolerant">Are you lactose or gluten intolerant?</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->intolerant:''?>" placeholder="" name="intolerant" style="color: #ffffff;">
            </div>
            <div class="clearfix"></div>

            <h5>Additional Information</h5>
            <div class="form-group col-xs-4"><!-- occasion selection -->
                <label>Special Occasion?</label>
                <select name="occasion" id="occasion" class="form-control select input-black">
                    <option></option>
                    <option <?=($regInfo->occasion === "Birthday")?'selected="selected"':'';?> value="Birthday">Birthday</option>
                    <option <?=($regInfo->occasion === "Wedding Anniversary")?'selected="selected"':'';?> value="Wedding Anniversary">Wedding Anniversary</option>
                </select>
                <span class="help-block">Special occasion <i>(during program dates)</i></span>
            </div>
            <div class="form-group col-xs-4"><!-- occasion selection -->
                <label>Specify Date</label>
                <input type="text" value="<?=(isset($regInfo) && $regInfo->special_date != '0000-00-00' && $regInfo->special_date != '--')?$regInfo->special_date:''?>" placeholder="" name="special_date" class="datepicker" style="color: #ffffff;">
               
            </div>
            <div class="clearfix"></div>
            <h3 style="margin-left: 10px;">Flights and accommocation</h3>
            <div class="form-group col-xs-3">
                <label for="fflyer">Do you have a frequent flyer number</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->fflyer:''?>" placeholder="" name="fflyer" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <label for="ff_number">Frequent flyer #</label><br>
                <input type="text" value="<?=isset($regInfo)?$regInfo->ff_number:''?>" placeholder="" name="ff_number" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <label for="ff_airline">Frequent flyer airline</label><br>
                <input type="text" value="<?=isset($regInfo)?$regInfo->ff_airline:''?>" placeholder="" name="ff_airline" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <label for="off_airline">Other Airline</label><br>
                <input type="text" value="<?=isset($regInfo)?$regInfo->off_airline:''?>" placeholder="" name="off_airline" style="color: #ffffff;">
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <label for="fflyer">Do you have more than one frequent flyer number</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->fflyer_alt:''?>" placeholder="" name="fflyer_alt" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <label for="ff_number">Frequent flyer #2</label><br>
                <input type="text" value="<?=isset($regInfo)?$regInfo->ff_number_alt:''?>" placeholder="" name="ff_number_alt" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <label for="ff_airline">Frequent flyer airline 2</label><br>
                <input type="text" value="<?=isset($regInfo)?$regInfo->ff_airline_alt:''?>" placeholder="" name="ff_airline_alt" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <label for="off_airline">Other Airline 2</label><br>
                <input type="text" value="<?=isset($regInfo)?$regInfo->off_airline_alt:''?>" placeholder="" name="off_airline_alt" style="color: #ffffff;">
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <label for="seating">Airline Seat preference</label><br>
                <input type="text" value="<?=isset($regInfo)?$regInfo->seating:''?>" placeholder="" name="seating" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <label for="bags"># of bag you will personally check in</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->bags:''?>" placeholder="" name="bags" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <label for="bed">Bed Configuration</label><br>
                <input type="text" value="<?=isset($regInfo)?$regInfo->bed:''?>" placeholder="" name="bed" style="color: #ffffff;">
            </div>
            <div class="clearfix"></div>
            <h3 style="margin-left: 10px;">Travel Information</h3>
            <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <label for="airport_code">What airport will you be flying out?</label><br>
                <input type="text" value="<?=isset($regInfo)?$regInfo->airport_code:''?>" placeholder="" name="airport_code" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <label for="depart_date">Departure Date</label><br>
                <input type="text" value="<?=isset($regInfo)?$regInfo->depart_date:''?>" placeholder="" name="depart_date" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <label for="return_date">How are you returning</label><br>
                <input type="text" value="<?=isset($regInfo)?$regInfo->return_date:''?>" placeholder="" name="return_date" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label for="air_notes_dpt">Departure Notes for air travel</label>
                <textarea style="width: 400px; height: 100px;" class="form-control" placeholder="" name="air_notes_dpt"><?=isset($regInfo)?$regInfo->air_notes_dpt:''?></textarea>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label for="air_notes">Return Notes for air travel</label>
                <textarea style="width: 400px; height: 100px;" class="form-control" placeholder="" name="air_notes"><?=isset($regInfo)?$regInfo->air_notes:''?></textarea>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label for="travel_req">Additional travel request</label>
                <textarea style="width: 400px; height: 100px;" class="form-control" placeholder="" name="travel_req"><?=isset($regInfo)?$regInfo->travel_req:''?></textarea>
            </div>
            <div class="clearfix"></div>
            <h3 style="margin-left: 10px;">Activities</h3>
            <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <label for="choice1">Choice 1</label>
                 <select name="choice1" class="form-control input-black">
                    <option></option>
                    <?php 
                        if(is_array($activities) && !empty($activities)){
                            foreach ($activities as $key => $activity) {
                                if($activity->id == $regInfo->choice1) $selected = 'selected';
                                else $selected = '';
                                echo '<option '.$selected.' value="'.$activity->id.'">'.$activity->activity.'</option>';
                            }
                        }
                    ?> 
                </select>
            </div>
            <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <label for="choice1">Choice 2</label>
                 <select name="choice2" class="form-control input-black">
                    <option></option>
                    <?php 
                        if(is_array($activities) && !empty($activities)){
                            foreach ($activities as $key => $activity) {
                                if($activity->id == $regInfo->choice2) $selected = 'selected';
                                else $selected = '';
                                echo '<option '.$selected.' value="'.$activity->id.'">'.$activity->activity.'</option>';
                            }
                        }
                    ?> 
                </select>
            </div>
            <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <label for="choice1">Choice 3</label>
                 <select name="choice3" class="form-control input-black">
                    <option></option>
                    <?php 
                        if(is_array($activities) && !empty($activities)){
                            foreach ($activities as $key => $activity) {
                                if($activity->id == $regInfo->choice3) $selected = 'selected';
                                else $selected = '';
                                echo '<option '.$selected.' value="'.$activity->id.'">'.$activity->activity.'</option>';
                            }
                        }
                    ?> 
                </select>
            </div>
            <div class="clearfix"></div>
            <h3 style="margin-left: 10px;">Credit Card Information</h3>
            <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                <label for="cc_type">Card Type</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->cc_type:''?>" placeholder="" name="cc_type" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <label for="card_name">Card holder name</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->card_name:''?>" placeholder="" name="card_name" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <label for="card_number">Card Number</label>
                <input type="text" value="<?=isset($regInfo)? decryption($regInfo->card_number):''?>" placeholder="" name="card_number" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                <label for="exp_date">Expire date</label>
                <input type="text" value="<?=isset($regInfo)? decryption($regInfo->exp_date):''?>" placeholder="" name="exp_date" class="datepicker" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-2">
                <label for="cvv">CVV</label>
                <input type="text" value="<?=isset($regInfo)? decryption($regInfo->cvv):''?>" placeholder="" name="cvv" style="color: #ffffff;">
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <label for="cc_st_1address">Street Address 1</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->cc_st_1address:''?>" placeholder="Street Address 1" name="cc_st_1address"
                       style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <label for="cc_st_2address">St Address 2</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->cc_st_2address:''?>" placeholder="Street Address 2" name="cc_st_2address"
                       style="color: #ffffff;">
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <label for="cc_city">City</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->cc_city:''?>" placeholder="city" name="cc_city" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <label for="cc_state">State/Parish</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->cc_state:''?>" placeholder="state" name="cc_state" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <label for="cc_zip">Zip</label>
                <input type="text" value="<?=isset($regInfo)?$regInfo->cc_zip:''?>" placeholder="zip" name="cc_zip" style="color: #ffffff;">
            </div>
            <div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <label for="cc_country">Country</label>
                <select name="cc_country" class="form-control input-black" >
                    <?php 
                        if(is_array($countries) && !empty($countries)){
                            foreach ($countries as $key => $cntry) {
                                if($cntry->id == $regInfo->cc_country) $selected = 'selected';
                                else $selected = '';
                                echo '<option '.$selected.' value="'.$cntry->id.'">'.$cntry->name.'</option>';
                            }
                        }
                    ?> 
                </select>
            </div>
            <div class="clearfix"></div>
            <p style="float: left;" class="p-container">
                <a href="<?=base_url()?>admin/Registration/reg_list" class="btn pull-left">Back To List</a>&nbsp;&nbsp;
                 <input type="submit" value="Update Registration">
            </p>
            <div class="clearfix"></div>
            <div style="padding-left: 10px; padding-right: 10px;">
                <footer class="footer">
                    <p>&copy; 2016 Sunlinc. All rights reserved. <span class="pull-right">
     <a href="<?=base_url()?>admin"> Admin Panel</a> | <a href="<?=base_url().'admin/Registration/reg_list'?>">Registration Manager</a> | <a href="<?=base_url()?>Login/logout">Logout</a>
    </span></p>
                </footer>
            </div>
        </div>
    </form>

</div>
<script src="<?= base_url(); ?>assets/site/js/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script>
    // check if require visa 
    $(document).on('change','.country-visa',function(){ 
        visaCheck($(this).val());
    })
    $(document).ready(function(e){
        visaCheck($('.country-visa').val(), $('.country-visa'));
        // date picker
     
      $('.datepicker').daterangepicker({
        autoUpdateInput: false,
        locale: {
          format: 'YYYY-MM-DD'
        },
        "singleDatePicker": true,
    }, function(start, end, label) {
      console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
    });
    })
    function visaCheck(value, ref){
        if(value == 28 || value == 147){ //united state or canada
            $('.usa-visa-info').hide();
        } else $('.usa-visa-info').show();
       
    }

</script>
</body>
</html>