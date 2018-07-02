<?php $this->load->view('site/pages/registration/reg_banner')?>
     <?php

//First Get Winner Info
$emergency_name = isset($data['userData']) ? $data['userData']->emergency_name : '';
$emergency_home = isset($data['userData']) ? $data['userData']->emergency_home : '';
$emergency_work = isset($data['userData']) ? $data['userData']->emergency_work : '';
$emergency_cell = isset($data['userData']) ? $data['userData']->emergency_cell : '';

$dr_name = isset($data['userData']) ? $data['userData']->dr_name : '';
$dr_day_phone = isset($data['userData']) ? $data['userData']->dr_day_phone : '';
$dr_alt_phone = isset($data['userData']) ? $data['userData']->dr_alt_phone : '';
$med_conditions = isset($data['userData']) ? $data['userData']->med_conditions : '';
$medication = isset($data['userData']) ? $data['userData']->medication : '';
$med_food = isset($data['userData']) ? $data['userData']->med_food : '';
$omed_food = isset($data['userData']) ? $data['userData']->omed_food : '';
$religious_food = isset($data['userData']) ? $data['userData']->religious_food : '';
$oreligious_food = isset($data['userData']) ? $data['userData']->oreligious_food : '';
$diabetic = isset($data['userData']) ? $data['userData']->diabetic : '';
$hypertension = isset($data['userData']) ? $data['userData']->hypertension : '';
$vegetarian = isset($data['userData']) ? $data['userData']->vegetarian : '';
$fish = isset($data['userData']) ? $data['userData']->fish : '';
$chicken = isset($data['userData']) ? $data['userData']->chicken : '';
$intolerant = isset($data['userData']) ? $data['userData']->intolerant : '';
$occasion = isset($data['userData']) ? $data['userData']->occasion : '';
$special_date = isset($data['userData']) ? $data['userData']->special_date : '';
$guest = isset($data['userData']) ? $data['userData']->noguest: 'No';


//Get the Companion/Guest Info
$emergency_name_g = $emergency_home_g = $emergency_work_g = $emergency_cell_g = $dr_name_g = $dr_day_phone_g = $dr_alt_phone_g = $med_conditions_g = $medication_g = $med_food_g = $omed_food_g = $religious_food_g = $oreligious_food_g = $diabetic_g = $hypertension_g = $vegetarian_g = $fish_g = $chicken_g = $intolerant_g = $occasion_g = $special_date_g = '';
if(isset($data['guestData']) && is_object($data['guestData'])){
    $emergency_name_g = $data['guestData']->emergency_name;
    $emergency_home_g = $data['guestData']->emergency_home;
    $emergency_work_g = $data['guestData']->emergency_work;
    $emergency_cell_g = $data['guestData']->emergency_cell;

    $dr_name_g = $data['guestData']->dr_name;
    $dr_day_phone_g = $data['guestData']->dr_day_phone;
    $dr_alt_phone_g = $data['guestData']->dr_alt_phone;
    $med_conditions_g = $data['guestData']->med_conditions;
    $medication_g = $data['guestData']->medication;
    $med_food_g = $data['guestData']->med_food;
    $omed_food_g = $data['guestData']->omed_food;
    $religious_food_g = $data['guestData']->religious_food;
    $oreligious_food_g = $data['guestData']->oreligious_food;
    $diabetic_g = $data['guestData']->diabetic;
    $hypertension_g = $data['guestData']->hypertension;
    $vegetarian_g = $data['guestData']->vegetarian;
    $fish_g = $data['guestData']->fish;
    $chicken_g = $data['guestData']->chicken;
    $intolerant_g = $data['guestData']->intolerant;
    $occasion_g = $data['guestData']->occasion;
    $special_date_g = $data['guestData']->special_date;
}

?>

<div class="row text-left content-wrapper">
<?php $this->load->view('site/pages/registration/steps_nav');?>
  

    <h3>Registration - Step 3: Emergency Contact</h3><br>

    <!-- registration form -->

    <form class="register-form" action="<?=base_url()?>registration/step4_flights_accommodation" method="post">

        <input value="257" name="id" id="id" class="hidden">

        <input value="258" name="id_g" id="id_g" class="hidden">

        <h3>Winner Information</h3>

        <strong class="help-block">Emergency Contact</strong>

        <div class="clearfix"></div>

        <div class="form-group col-xs-12">


            <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <label>Emergency Contact Name</label> 
                <input type="text" value="<?=$emergency_name?>" name="emergency_name" id="emergency-name" placeholder="" class="form-control right10" >
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <label>Home Phone</label> <input type="text" value="<?=$emergency_home?>" name="emergency_home_phone" id="emergency-home-phone" data-format="ddddddddddddddd" class="form-control right10 input-medium bfh-phone">
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <label>Work Phone</label> <input type="text" value="<?=$emergency_work?>" name="emergency_work_phone" id="emergency-work-phone" data-format="ddddddddddddddd" class="form-control right10 input-medium bfh-phone">
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <label>Cell</label> <input type="text" value="<?=$emergency_cell?>" name="emergency_cell_phone" id="emergency-cell-phone" data-format="ddddddddddddddd" class="form-control input-medium bfh-phone">

            </div>

                <span class="help-block col-xs-12">Include area code in contact numbers</span>
        </div>

        <hr>

        <strong class="help-block">Medical Information</strong>

        <div class="form-group col-xs-12">

            <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <label>Primary Doctor</label> 
                <input type="text" value="<?=$dr_name?>" name="dr_name" id="dr-name" placeholder="" class="form-control right10">
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <label>Dr. Day Phone</label> <input type="text" value="<?=$dr_day_phone?>" name="dr_day_phone" id="dr-day-phone" data-format="ddddddddddddddd" class="form-control right10 input-medium bfh-phone">
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <label>Dr. Alt Phone</label> <input type="text" value="<?=$dr_alt_phone?>" name="dr_alt_phone" id="dr-alt-phone" data-format="ddddddddddddddd" class="form-control input-medium bfh-phone">
            </div>

                <span class="help-block col-xs-12">Include area code in contact numbers</span>

        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-9"><!-- medical conditions -->

            <label>Medical Conditions</label>

            <textarea placeholder="Please indicate any on-going medical conditions here" name="medical_conditions" id="medical-conditions" class="form-control"><?=$med_conditions?></textarea>

        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-9"><!-- prescription medication -->

            <label>Prescription Medication</label>

            <textarea placeholder="Please indicate any prescription medication you are currently taking here" name="medication" id="medication" class="form-control"><?=$medication?></textarea>

        </div>

        <div class="clearfix"></div>

        <hr>

        <strong class="help-block">Dietary Information</strong>

        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-7"><!-- food selection -->

            <label>I absolutely, for medical reasons, cannot eat the following foods</label>

            <input value="<?=$med_food?>" onchange="medfoodCheck(this);" placeholder="" name="medical_food" id="medical-food" class="form-control">

        </div>

        <div class="clearfix"></div>

        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-7"><!-- food selection -->

            <label>I prefer not to eat the following foods for religious or other reasons</label>

            <input value="<?=$religious_food?>" onchange="regfoodCheck(this);" placeholder="" name="religious_food" id="religious-food" class="form-control">

        </div>

        <div class="clearfix"></div>

        <div class="form-group col-xs-3"><!-- diabetic selection -->

            <label>

                <input type="checkbox" <?=($diabetic === '1')?'checked="checked"':'';?> name="diabetic"> I am diabetic

            </label>

        </div>

        <div class="form-group col-xs-3"><!-- vegetarian selection -->

            <label>

                <input type="checkbox" <?=($hypertension === '1')?'checked="checked"':'';?> name="hypertension"> I suffer from hypertension

            </label>

        </div>

        <div class="clearfix"></div>

        <div class="form-group col-xs-3"><!-- vegetarian selection -->

            <label>

                <input type="checkbox" <?=($vegetarian === '1')?'checked="checked"':'';?> id="dietreq" name="vegetarian"> I am vegetarian

            </label>

        </div>

        <div style="display:block;" id="diet-box">

            <div class="form-group col-xs-3"><!-- fish selection -->

                <label>

                    <input type="checkbox" <?=($fish === '1')?'checked="checked"':'';?> name="fish"> I do however eat fish

                </label>

            </div>

            <div class="form-group col-xs-3"><!-- chicken selection -->

                <label>

                    <input type="checkbox" <?=($chicken === '1')?'checked="checked"':'';?> name="chicken"> I do however eat chicken

                </label>

            </div>

        </div>

        <div class="clearfix"></div>

        <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4"><!-- intolerant selection -->

            <label>Are you lactose or gluten intolerant?</label>

            <select name="intolerant" id="intolerant" class="form-control select">
                <option value=""></option>
                <option <?=($intolerant == "Yes – I'm gluten intolerant") ? "selected='selected'":""?> value="Yes – I'm gluten intolerant">Yes – I'm gluten intolerant</option>
                <option <?=($intolerant == "Yes – I'm gluten intolerant") ? "selected='selected'":""?> value="Yes – I'm lactose intolerant">Yes – I'm lactose intolerant</option>
                <option <?=($intolerant == "Yes, I'm both gluten & lactose intolerant") ? "selected='selected'":""?> value="Yes, I'm both gluten & lactose intolerant">Yes, I'm both gluten & lactose intolerant</option>
            </select>
        </div>

        <div class="clearfix"></div>

        <hr>

        <strong class="help-block">Additional Information</strong>

        <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4"><!-- occasion selection -->

            <label>Special Occasion (during program dates)?</label>

            <select name="occasion" id="occasion" class="form-control select">

                        <option value=""></option>
                <!--<option>Wedding Anniversary</option>-->

                <option <?=($occasion === "Birthday")?'selected="selected"':'';?> value="Birthday">Birthday</option>
                <option <?=($occasion === "Wedding Anniversary")?'selected="selected"':'';?> value="Wedding Anniversary">Wedding Anniversary</option>

            </select>

        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-4"><!-- special occasion field -->

            <label>Specify date</label><br>
            <select name="special_date"  class="form-control select">

                    <option value=""></option>
                    <option <?=($special_date=='2017-06-08')?'selected="selected"':''?> value="2017-06-08">June, 08</option>
                    <option <?=($special_date=='2017-06-09')?'selected="selected"':''?> value="2017-06-09">June, 09</option>
                    <option <?=($special_date=='2017-06-10')?'selected="selected"':''?> value="2017-06-10">June, 10</option>
                    <option <?=($special_date=='2017-06-11')?'selected="selected"':''?> value="2017-06-11">June, 11</option>
                    <option <?=($special_date=='2017-06-12')?'selected="selected"':''?> value="2017-06-12">June, 12</option>
                    <option <?=($special_date=='2017-06-13')?'selected="selected"':''?> value="2017-06-13">June, 13</option>
                    <option <?=($special_date=='2017-06-14')?'selected="selected"':''?> value="2017-06-14">June, 14</option>
                    <option <?=($special_date=='2017-06-15')?'selected="selected"':''?> value="2017-06-15">June, 15</option>
            </select>
           <!--  <div class="bfh-datepicker" data-format="y-m-d" data-name="special_date" data-date="<?=$special_date?>">

                <div class="input-prepend bfh-datepicker-toggle" data-toggle="bfh-datepicker">

                    <span class="add-on"><i class="icon-calendar"></i></span>

                    <input type="text" class="input-medium" readonly>

                </div>

                <div class="bfh-datepicker-calendar">

                    <table class="calendar table table-bordered">

                        <thead>

                        <tr class="months-header">

                            <th class="month" colspan="4">

                                <a class="previous" href="#"><i class="icon-chevron-left"></i></a>

                                <span></span>

                                <a class="next" href="#"><i class="icon-chevron-right"></i></a>

                            </th>

                            <th class="year" colspan="3">

                                <a class="previous" href="#"><i class="icon-chevron-left"></i></a>

                                <span></span>

                                <a class="next" href="#"><i class="icon-chevron-right"></i></a>

                            </th>

                        </tr>

                        <tr class="days-header">

                        </tr>

                        </thead>

                        <tbody>

                        </tbody>

                    </table>

                </div>

            </div> -->

        </div>

        <?php if($guest == 'Yes') { ?> 
            <div style="display: block;" id="guest-info">

                <div class="clearfix"></div>

                <hr>

                <h3>Guest Information</h3>

                <strong class="help-block">Emergency Contact</strong>

                <div class="clearfix"></div>

                <div class="form-group col-xs-12">

                <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label>Emergency Contact Name</label> 

                    <input type="text" value="<?=$emergency_name_g?>" name="emergency_name_g" id="emergency-name-g" placeholder="" class="form-control right10">
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label>Home Phone</label> <input type="text" value="<?=$emergency_home_g?>" name="emergency_home_phone_g" id="emergency-home-phone-g" data-format="ddddddddddddddd" class="form-control right10 input-medium bfh-phone">
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="clearfix"></div>
                    <label>Work Phone</label> <input type="text" value="<?=$emergency_work_g?>" name="emergency_work_phone_g" id="emergency-work-phone-g" data-format="ddddddddddddddd" class="form-control right10 input-medium bfh-phone">
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label>Cell</label> <input type="text" value="<?=$emergency_cell_g?>" name="emergency_cell_phone_g" id="emergency-cell-phone-g" data-format="ddddddddddddddd" class="form-control input-medium bfh-phone">
                </div>
                    <span class="help-block col-xs-12">Include area code in contact numbers</span>


                </div>

                <div class="clearfix"></div>

                <hr>

                <strong class="help-block">Medical Information</strong>

                <div class="form-group col-xs-12">


                <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label>Primary Doctor</label> 
                    <input type="text" value="<?=$dr_name_g?>" name="dr_name_g" id="dr-name-g" placeholder="" class="form-control right10">
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label>Dr. Day Phone</label> <input type="text" value="<?=$dr_day_phone_g?>" name="dr_day_phone_g" id="dr-day-phone-g" data-format="ddddddddddddddd" class="form-control right10 input-medium bfh-phone">
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <label>Dr. Alt Phone</label> <input type="text" value="<?=$dr_alt_phone_g?>" name="dr_alt_phone_g" id="dr-alt-phone-g" data-format="ddddddddddddddd" class="form-control input-medium bfh-phone">
                </div>

                        <span class="help-block col-xs-12">Include area code in contact numbers</span>


                </div>

                <div class="form-group col-xs-9"><!-- medical conditions -->

                    <label>Medical Conditions</label>

                    <textarea placeholder="Please indicate any on-going medical conditions here" name="medical_conditions_g" id="medical-conditions-g" class="form-control"><?=$med_conditions_g?></textarea>

                </div>

                <div class="form-group col-xs-9"><!-- prescription medication -->

                    <label>Prescription Medication</label>

                    <textarea placeholder="Please indicate any prescription medication you are currently taking here" name="medication_g" id="medication-g" class="form-control"><?=$medication_g?></textarea>

                </div>

                <div class="clearfix"></div>

                <hr>

                <strong class="help-block">Dietary Information</strong>

                <div class="form-group col-xs-7"><!-- food selection -->

                    <label>I absolutely, for medical reasons, cannot eat the following foods</label>

                    <input value="<?=$med_food_g?>" placeholder="" onchange="medfoodCheck_g(this);" name="medical_food_g" id="medical-food_g" class="form-control">

                </div>

                <div class="clearfix"></div>

                <div class="form-group col-xs-7"><!-- food selection -->

                    <label>I prefer not to eat the following foods for religious or other reasons</label>

                    <input value="<?=$religious_food_g?>" onchange="regfoodCheck_g(this);" placeholder="" name="religious_food_g" id="religious-food_g" class="form-control">

                </div>

                <div class="clearfix"></div>

                <div class="form-group col-xs-3"><!-- diabetic selection -->

                    <label>

                        <input type="checkbox" <?=($diabetic_g === '1')?'checked="checked"':'';?> name="diabetic_g"> I am diabetic

                    </label>

                </div>

                <div class="form-group col-xs-3"><!-- vegetarian selection -->

                    <label>

                        <input type="checkbox" <?=($hypertension_g === '1')?'checked="checked"':'';?> name="hypertension_g"> I suffer from hypertension

                    </label>

                </div>

                <div class="clearfix"></div>

                <div class="form-group col-xs-3"><!-- vegetarian selection -->

                    <label>

                        <input type="checkbox" <?=($vegetarian_g === '1')?'checked="checked"':'';?> id="dietreq_g" name="vegetarian_g"> I am vegetarian

                    </label>

                </div>

                <div style="display:none;" id="diet-box_g">

                    <div class="form-group col-xs-3"><!-- fish selection -->

                        <label>

                            <input type="checkbox" <?=($fish_g === '1')?'checked="checked"':'';?> name="fish_g"> I do however eat fish

                        </label>

                    </div>

                    <div class="form-group col-xs-3"><!-- chicken selection -->

                        <label>

                            <input type="checkbox" <?=($chicken_g === '1')?'checked="checked"':'';?> name="chicken_g"> I do however eat chicken

                        </label>

                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="form-group col-xs-6"><!-- intolerant selection -->

                    <label>Are you lactose or gluten intolerant?</label>

                    <select name="intolerant_g" id="intolerant" class="form-control select">
                        <option value=""></option>
                        <option <?=($intolerant_g == "Yes – I'm gluten intolerant") ? "selected='selected'":""?> value="Yes – I'm gluten intolerant">Yes – I'm gluten intolerant</option>
                        <option <?=($intolerant_g == "Yes – I'm lactose intolerant") ? "selected='selected'":""?> value="Yes – I'm lactose intolerant">Yes – I'm lactose intolerant</option>
                        <option <?=($intolerant_g == "Yes, I'm both gluten & lactose intolerant") ? "selected='selected'":""?> value="Yes, I'm both gluten & lactose intolerant">Yes, I'm both gluten & lactose intolerantt</option>
                    </select>

                </div>

                <div class="clearfix"></div>

                <hr>

                <strong class="help-block">Additional Information</strong>

                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-4"><!-- occasion selection -->

                    <label>Special occasion (during program dates)?</label>

                    <select name="occasion_g" id="occasion-g" class="form-control select">
                        <option value=""></option>
                        <option <?=($occasion_g === "Birthday")?'selected="selected"':'';?> value="Birthday">Birthday</option>
                        <option <?=($occasion_g === "Wedding Anniversary")?'selected="selected"':'';?> value="Wedding Anniversary">Wedding Anniversary</option>

                    </select>

                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-4"><!-- special occasion field -->

                    <label>Specify date</label><br>
                    <select name="special_date_g"  class="form-control select">
                        <option value=""></option>

                        <option <?=($special_date_g=='2017-06-08')?'selected="selected"':''?> value="2017-06-08">June, 08</option>
                        <option <?=($special_date_g=='2017-06-09')?'selected="selected"':''?> value="2017-06-09">June, 09</option>
                        <option <?=($special_date_g=='2017-06-10')?'selected="selected"':''?> value="2017-06-10">June, 10</option>
                        <option <?=($special_date_g=='2017-06-11')?'selected="selected"':''?> value="2017-06-11">June, 11</option>
                        <option <?=($special_date_g=='2017-06-12')?'selected="selected"':''?> value="2017-06-12">June, 12</option>
                        <option <?=($special_date_g=='2017-06-13')?'selected="selected"':''?> value="2017-06-13">June, 13</option>
                        <option <?=($special_date_g=='2017-06-14')?'selected="selected"':''?> value="2017-06-14">June, 14</option>
                        <option <?=($special_date_g=='2017-06-15')?'selected="selected"':''?> value="2017-06-15">June, 15</option>
                    </select>
                 <!--    <div class="bfh-datepicker" data-format="y-m-d" data-name="special_date_g" data-date="<?=$special_date_g ?>">

                        <div class="input-prepend bfh-datepicker-toggle" data-toggle="bfh-datepicker">

                            <span class="add-on"><i class="icon-calendar"></i></span>

                            <input type="text" class="input-medium" readonly>

                        </div>

                        <div class="bfh-datepicker-calendar">

                            <table class="calendar table table-bordered">

                                <thead>

                                <tr class="months-header">

                                    <th class="month" colspan="4">

                                        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>

                                        <span></span>

                                        <a class="next" href="#"><i class="icon-chevron-right"></i></a>

                                    </th>

                                    <th class="year" colspan="3">

                                        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>

                                        <span></span>

                                        <a class="next" href="#"><i class="icon-chevron-right"></i></a>

                                    </th>

                                </tr>

                                <tr class="days-header">

                                </tr>

                                </thead>

                                <tbody>

                                </tbody>

                            </table>

                        </div>

                    </div> -->

                </div>

            </div>
        <?php }?>

        <div class="clearfix"></div>

        <div class="form-group">

            <div>

                <button type="submit" name="prev_update" id="update" value="" class="btn btn-success left10">Previous</button>

                <button type="submit" name="update" id="update" class="btn btn-success left10">Next</button>

            </div>

        </div>

                   <input type="hidden" name="redirect_to" value="" />
    </form>
</div>
<script type="text/javascript">
    $(function () {

        //For Winner
        var winnerDietReq =  $("#dietreq");
        var winnerDietBox =  $("#diet-box");
        if(winnerDietReq.is(':checked')){
            winnerDietBox.show();
        }else{
            winnerDietBox.hide();
        }
        //For Winner on change
        winnerDietReq.on("change",function(){
            if($(this).is(':checked')){
                winnerDietBox.show();
            }else{
                winnerDietBox.hide();
            }
        });

        //For Guest/Companion
       var guestDietReq =  $("#dietreq_g");
       var guestDietBox =  $("#diet-box_g");
        if(guestDietReq.is(':checked')){
            guestDietBox.show();
        }else{
            guestDietBox.hide();
        }
        //For Guest/Companion on change
        guestDietReq.on("change",function(){
            if($(this).is(':checked')){
                guestDietBox.show();
            }else{
                guestDietBox.hide();
            }
        });
    });
</script>
     </div>
     <!-- /m_editable -->
    </div>
   