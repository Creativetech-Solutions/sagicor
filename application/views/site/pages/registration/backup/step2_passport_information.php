<?php
//Lets get all the info
//First Get the Winner Data
$regID = isset($data['userData']) ? $data['userData']->RegID : '';
$passport = isset($data['userData']) ? $data['userData']->passport : '';
$citizen = isset($data['userData']) ? $data['userData']->citizen : '';
$issue_city = isset($data['userData']) ? $data['userData']->issue_city : '';
$issue_date = isset($data['userData']) ? $data['userData']->issue_date : '';
$expire_date = isset($data['userData']) ? $data['userData']->expire_date : '';
$us_visa = isset($data['userData']) ? $data['userData']->us_visa : '';
$obtain_visa = isset($data['userData']) ? $data['userData']->obtain_visa : '';
$us_visa_no = isset($data['userData']) ? $data['userData']->schengen : '';
$us_visa_exp = isset($data['userData']) ? $data['userData']->schengen_exp_date : '';
$visa_no = isset($data['userData']) ? $data['userData']->visa_type : '';
$visa_exp = isset($data['userData']) ? $data['userData']->visa_exp_date : '';
$countries = $data['countries'];
$guest = isset($data['userData']) ? $data['userData']->noguest: 'No';
if(!empty($issue_date)){
    $issue_date_exploded = explode('-',$issue_date);
    $pp_issue_year = $issue_date_exploded[0];
    $pp_issue_month = $issue_date_exploded[1];
    $pp_issue_day = $issue_date_exploded[2];
}
if(!empty($expire_date)){
    $expire_date_exploded = explode('-',$expire_date);
    $pp_expire_year = $expire_date_exploded[0];
    $pp_expire_month = $expire_date_exploded[1];
    $pp_expire_day = $expire_date_exploded[2];
}


//Now get info data for guest
$regID_g = $passport_g = $citizen_g = $issue_city_g = $issue_date_g = $expire_date_g = $us_visa_g = $obtain_visa_g = $us_visa_no_g = $us_visa_exp_g = $visa_no_g = $visa_exp_g = '';
if(isset($data['guestData']) && is_object($data['guestData'])){
    $regID_g = $data['guestData']->RegID;
    $passport_g = $data['guestData']->passport;
    $citizen_g = $data['guestData']->citizen;
    $issue_city_g = $data['guestData']->issue_city;
    $issue_date_g = $data['guestData']->issue_date;
    $expire_date_g = $data['guestData']->expire_date;
    $us_visa_g = $data['guestData']->us_visa;
    $obtain_visa_g = $data['guestData']->obtain_visa;
    $us_visa_no_g = $data['guestData']->schengen;
    $us_visa_exp_g = $data['guestData']->schengen_exp_date ;
    $visa_no_g = $data['guestData']->visa_type ;
    $visa_exp_g = $data['guestData']->visa_exp_date ;
}


if(!empty($issue_date_g)){
    $issue_date_exploded_g = explode('-',$issue_date_g);
    $pp_issue_year_g = $issue_date_exploded_g[0];
    $pp_issue_month_g = $issue_date_exploded_g[1];
    $pp_issue_day_g = $issue_date_exploded_g[2];
}
if(!empty($expire_date_g)){
    $expire_date_exploded_g = explode('-',$expire_date_g);
    $pp_expire_year_g = $expire_date_exploded_g[0];
    $pp_expire_month_g = $expire_date_exploded_g[1];
    $pp_expire_day_g = $expire_date_exploded_g[2];
}

?>

<div class="row">

    <ul class="progress-indicator">

        <li class="completed">

            <span class="bubble"></span>

            <i class="fa fa-check-circle"></i>

            1.
            <small>Personal Information</small>

        </li>

        <li class="active">

            <span class="bubble"></span>

            <strong>2.
                <small>Passport Information</small>
            </strong>

        </li>

        <li>

            <span class="bubble"></span>

            3.
            <small>Emergency Contact</small>

        </li>

        <li>

            <span class="bubble"></span>

            4.
            <small>Flights and Accommodation</small>

        </li>

        <li>

            <span class="bubble"></span>

            5.
            <small>Activities</small>

        </li>

        <li>

            <span class="bubble"></span>

            6.
            <small>Credit Card Details</small>

        </li>

    </ul>

    <h3>Registration - Step 2: Passport Information</h3><br>

    <!-- registration form -->
    <div class="alert alert-danger error-noti" role="alert" style="display: none">
    </div>
    <form action="<?= base_url() ?>registration/step3_emergency_contact" method="post">

        <input value="<?= $regID ?>" name="id" id="id" class="hidden">

        <input value="<?= $regID_g ?>" name="id_g" id="id_g" class="hidden">

        <input value="2016-03-24" name="req_date" id="req-date" class="hidden">

        <h3>Winner Information</h3>
        <div class="wrap-info">
            <div role="alert" class="alert alert-success col-xs-11">

                <button aria-label="Close" data-dismiss="alert" class="close" type="button"></button>

                <strong>ALL</strong> of the following information must be taken from the passport on which you are traveling
                to Barcelona.

            </div>

            <div class="clearfix"></div>

            <div class="form-group col-xs-3"><!-- passport# field -->

                <label>Passport #</label>

                <input type="text" value="<?= $passport ?>" name="passport" id="passport" placeholder=""
                       class="form-control"
                      >

            </div>

            <div class="form-group col-xs-3"><!-- citizenship field -->

                <label>Passport Citizenship</label>
                <select  name="citizen" id="citizen" class="form-control select country-visa">
                    <option value="0">Select Country</option>
                    <?php 
                        if(is_array($countries) && !empty($countries)){
                            foreach ($countries as $key => $cntry) {
                                if($citizen == $cntry->id) $selected = 'selected';
                                else $selected = '';
                                echo '<option '.$selected.' value="'.$cntry->id.'">'.$cntry->name.'</option>';
                            }
                        }
                    ?> 
                </select>

            </div>

            <div class="form-group col-xs-3"><!--passport city field -->

                <label>Passport Issue City</label>

                <input type="text" value="<?= $issue_city ?>" name="issue_city" id="issue-city"
                       placeholder="" class="form-control">

            </div>

            <div class="clearfix"></div>

            <strong class="help-block">&nbsp;&nbsp;&nbsp;&nbsp;Passport Issue Date:</strong>

            <!-- start issue date -->

            <div class="form-group col-xs-2"><!-- issue month selection -->

                <label>Month</label>

                <select name="pp_issue_month" id="pp-issue-month" class="form-control select">

                    <option value=""></option>
                    <option <?= (isset($pp_issue_month) && $pp_issue_month === "01")?"selected='selected'":""; ?>value="01">January</option>
                    <option <?= (isset($pp_issue_month) && $pp_issue_month === "02")?"selected='selected'":""; ?>value="02">February</option>
                    <option <?= (isset($pp_issue_month) && $pp_issue_month === "03")?"selected='selected'":""; ?>value="03">March</option>
                    <option <?= (isset($pp_issue_month) && $pp_issue_month === "04")?"selected='selected'":""; ?>value="04">April</option>
                    <option <?= (isset($pp_issue_month) && $pp_issue_month === "05")?"selected='selected'":""; ?>value="05">May</option>
                    <option <?= (isset($pp_issue_month) && $pp_issue_month === "06")?"selected='selected'":""; ?>value="06">June</option>
                    <option <?= (isset($pp_issue_month) && $pp_issue_month === "07")?"selected='selected'":""; ?>value="07">July</option>
                    <option <?= (isset($pp_issue_month) && $pp_issue_month === "08")?"selected='selected'":""; ?>value="08">August</option>
                    <option <?= (isset($pp_issue_month) && $pp_issue_month === "09")?"selected='selected'":""; ?>value="09">September</option>
                    <option <?= (isset($pp_issue_month) && $pp_issue_month === "10")?"selected='selected'":""; ?>value="10">October</option>
                    <option <?= (isset($pp_issue_month) && $pp_issue_month === "11")?"selected='selected'":""; ?>value="11">November</option>
                    <option <?= (isset($pp_issue_month) && $pp_issue_month === "12")?"selected='selected'":""; ?>value="12">December</option>
                </select>

            </div>

            <div class="form-group col-xs-2"><!-- issue date selection -->

                <label>Date</label>

                <select name="pp_issue_date" id="pp-issue-date" class="form-control select">

                    <option value=""></option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "01")?"selected='selected'":"";?>>01</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "02")?"selected='selected'":"";?>>02</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "03")?"selected='selected'":"";?>>03</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "04")?"selected='selected'":"";?>>04</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "05")?"selected='selected'":"";?>>05</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "06")?"selected='selected'":"";?>>06</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "07")?"selected='selected'":"";?>>07</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "08")?"selected='selected'":"";?>>08</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "09")?"selected='selected'":"";?>>09</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "10")?"selected='selected'":"";?>>10</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "11")?"selected='selected'":"";?>>11</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "12")?"selected='selected'":"";?>>12</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "13")?"selected='selected'":"";?>>13</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "14")?"selected='selected'":"";?>>14</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "15")?"selected='selected'":"";?>>15</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "16")?"selected='selected'":"";?>>16</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "17")?"selected='selected'":"";?>>17</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "18")?"selected='selected'":"";?>>18</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "19")?"selected='selected'":"";?>>19</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "20")?"selected='selected'":"";?>>20</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "21")?"selected='selected'":"";?>>21</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "22")?"selected='selected'":"";?>>22</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "23")?"selected='selected'":"";?>>23</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "24")?"selected='selected'":"";?>>24</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "25")?"selected='selected'":"";?>>25</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "26")?"selected='selected'":"";?>>26</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "27")?"selected='selected'":"";?>>27</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "28")?"selected='selected'":"";?>>28</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "29")?"selected='selected'":"";?>>29</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "30")?"selected='selected'":"";?>>30</option>
                    <option <?=(isset($pp_issue_day) && $pp_issue_day === "31")?"selected='selected'":"";?>>31</option>

                </select>

            </div>

            <div class="form-group col-xs-2"><!-- issue year selection -->

                <label>Year</label>

                <select name="pp_issue_year" id="pp-issue-year" class="form-control select">
                    <option value=""></option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "1990" ))?'selected="selected"':"" ?> value="1990">1990</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "1991" ))?'selected="selected"':"" ?> value="1991">1991</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "1992" ))?'selected="selected"':"" ?> value="1992">1992</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "1993" ))?'selected="selected"':"" ?> value="1993">1993</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "1994" ))?'selected="selected"':"" ?> value="1994">1994</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "1995" ))?'selected="selected"':"" ?> value="1995">1995</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "1996" ))?'selected="selected"':"" ?> value="1996">1996</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "1997" ))?'selected="selected"':"" ?> value="1997">1997</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "1998" ))?'selected="selected"':"" ?> value="1998">1998</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "1999" ))?'selected="selected"':"" ?> value="1999">1999</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2000" ))?'selected="selected"':"" ?> value="2000">2000</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2001" ))?'selected="selected"':"" ?> value="2001">2001</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2002" ))?'selected="selected"':"" ?> value="2002">2002</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2003" ))?'selected="selected"':"" ?> value="2003">2003</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2004" ))?'selected="selected"':"" ?> value="2004">2004</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2005" ))?'selected="selected"':"" ?> value="2005">2005</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2006" ))?'selected="selected"':"" ?> value="2006">2006</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2007" ))?'selected="selected"':"" ?> value="2007">2007</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2008" ))?'selected="selected"':"" ?> value="2008">2008</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2009" ))?'selected="selected"':"" ?> value="2009">2009</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2010" ))?'selected="selected"':"" ?> value="2010">2010</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2011" ))?'selected="selected"':"" ?> value="2011">2011</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2012" ))?'selected="selected"':"" ?> value="2012">2012</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2013" ))?'selected="selected"':"" ?> value="2013">2013</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2014" ))?'selected="selected"':"" ?> value="2014">2014</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2015" ))?'selected="selected"':"" ?> value="2015">2015</option>
                    <option <?= (isset($pp_issue_year) && ($pp_issue_year === "2016" ))?'selected="selected"':"" ?> value="2016">2016</option>
                </select>

            </div>

            <div class="clearfix"></div>

            <strong class="help-block">&nbsp;&nbsp;&nbsp;&nbsp;Passport Expiration Date:</strong>

            <!-- end issue date -->

            <div class="clearfix"></div>

            <!-- start expire date -->

            <div class="form-group col-xs-2"><!-- expire month selection -->

                <label>Month</label>

                <select name="pp_expire_month" id="pp-expire-month" class="form-control select">
                    <option value=""></option>
                    <option <?= (isset($pp_expire_month) && $pp_expire_month === "01")?"selected='selected'":""; ?>value="01">January</option>
                    <option <?= (isset($pp_expire_month) && $pp_expire_month === "02")?"selected='selected'":""; ?>value="02">February</option>
                    <option <?= (isset($pp_expire_month) && $pp_expire_month === "03")?"selected='selected'":""; ?>value="03">March</option>
                    <option <?= (isset($pp_expire_month) && $pp_expire_month === "04")?"selected='selected'":""; ?>value="04">April</option>
                    <option <?= (isset($pp_expire_month) && $pp_expire_month === "05")?"selected='selected'":""; ?>value="05">May</option>
                    <option <?= (isset($pp_expire_month) && $pp_expire_month === "06")?"selected='selected'":""; ?>value="06">June</option>
                    <option <?= (isset($pp_expire_month) && $pp_expire_month === "07")?"selected='selected'":""; ?>value="07">July</option>
                    <option <?= (isset($pp_expire_month) && $pp_expire_month === "08")?"selected='selected'":""; ?>value="08">August</option>
                    <option <?= (isset($pp_expire_month) && $pp_expire_month === "09")?"selected='selected'":""; ?>value="09">September</option>
                    <option <?= (isset($pp_expire_month) && $pp_expire_month === "10")?"selected='selected'":""; ?>value="10">October</option>
                    <option <?= (isset($pp_expire_month) && $pp_expire_month === "11")?"selected='selected'":""; ?>value="11">November</option>
                    <option <?= (isset($pp_expire_month) && $pp_expire_month === "12")?"selected='selected'":""; ?>value="12">December</option>

                </select>

            </div>

            <div class="form-group col-xs-2"><!-- expire date selection -->

                <label>Date</label>

                <select name="pp_expire_date" id="pp-expire-date" class="form-control select">

                    <option value=""></option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "01")?"selected='selected'":"";?>>01</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "02")?"selected='selected'":"";?>>02</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "03")?"selected='selected'":"";?>>03</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "04")?"selected='selected'":"";?>>04</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "05")?"selected='selected'":"";?>>05</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "06")?"selected='selected'":"";?>>06</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "07")?"selected='selected'":"";?>>07</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "08")?"selected='selected'":"";?>>08</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "09")?"selected='selected'":"";?>>09</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "10")?"selected='selected'":"";?>>10</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "11")?"selected='selected'":"";?>>11</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "12")?"selected='selected'":"";?>>12</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "13")?"selected='selected'":"";?>>13</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "14")?"selected='selected'":"";?>>14</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "15")?"selected='selected'":"";?>>15</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "16")?"selected='selected'":"";?>>16</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "17")?"selected='selected'":"";?>>17</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "18")?"selected='selected'":"";?>>18</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "19")?"selected='selected'":"";?>>19</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "20")?"selected='selected'":"";?>>20</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "21")?"selected='selected'":"";?>>21</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "22")?"selected='selected'":"";?>>22</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "23")?"selected='selected'":"";?>>23</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "24")?"selected='selected'":"";?>>24</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "25")?"selected='selected'":"";?>>25</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "26")?"selected='selected'":"";?>>26</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "27")?"selected='selected'":"";?>>27</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "28")?"selected='selected'":"";?>>28</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "29")?"selected='selected'":"";?>>29</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "30")?"selected='selected'":"";?>>30</option>
                    <option <?=(isset($pp_expire_day) && $pp_expire_day === "31")?"selected='selected'":"";?>>31</option>

                </select>

            </div>

            <div class="form-group col-xs-2"><!-- expire year selection -->

                <label>Year</label>

                <select name="pp_expire_year" id="pp-expire-year" class="form-control select">
                    <option value=""></option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2016" ))?'selected="selected"':"" ?> value="2016">2016</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2017" ))?'selected="selected"':"" ?> value="2017">2017</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2018" ))?'selected="selected"':"" ?> value="2018">2018</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2019" ))?'selected="selected"':"" ?> value="2019">2019</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2020" ))?'selected="selected"':"" ?> value="2020">2020</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2021" ))?'selected="selected"':"" ?> value="2021">2021</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2022" ))?'selected="selected"':"" ?> value="2022">2022</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2023" ))?'selected="selected"':"" ?> value="2023">2023</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2024" ))?'selected="selected"':"" ?> value="2024">2024</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2025" ))?'selected="selected"':"" ?> value="2025">2025</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2026" ))?'selected="selected"':"" ?> value="2026">2026</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2027" ))?'selected="selected"':"" ?> value="2027">2027</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2028" ))?'selected="selected"':"" ?> value="2028">2028</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2029" ))?'selected="selected"':"" ?> value="2029">2029</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2030" ))?'selected="selected"':"" ?> value="2030">2030</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2031" ))?'selected="selected"':"" ?> value="2031">2031</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2032" ))?'selected="selected"':"" ?> value="2032">2032</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2033" ))?'selected="selected"':"" ?> value="2033">2033</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2034" ))?'selected="selected"':"" ?> value="2034">2034</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2035" ))?'selected="selected"':"" ?> value="2035">2035</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2036" ))?'selected="selected"':"" ?> value="2036">2036</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2037" ))?'selected="selected"':"" ?> value="2037">2037</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2038" ))?'selected="selected"':"" ?> value="2038">2038</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2039" ))?'selected="selected"':"" ?> value="2039">2039</option>
                    <option <?= (isset($pp_expire_year) && ($pp_expire_year === "2040" ))?'selected="selected"':"" ?> value="2040">2040</option>
                </select>
            </div>

            <!-- end expire date -->

            <div class="clearfix"></div>

            <div class="visatype" id="visaType">

                <div class="form-group col-xs-12 col-sm-6 col-md-4"><!--Schengen Visa Number -->

                    <label class="visa-type-lbl">Canadian Visa/Canadian eTA Number</label>

                    <input type="text" value="<?=$visa_no?>" value="" name="visa_type" placeholder="" class="form-control">

                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4"><!--Schengen Visa Number -->

                    <label class="visa-type-exp-lbl">Canadian Visa/Canadian eTA Expiration Date</label>

                    <div data-date="<?=$visa_exp?>" data-name="visa_exp_date" data-format="y-m-d" class="bfh-datepicker">
                        <div data-toggle="bfh-datepicker" class="input-group bfh-datepicker-toggle"><span
                                class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input
                                type="text" placeholder="" class="form-control" name="exp_date"></div>
                        <div class="bfh-datepicker-calendar">
                            <table class="calendar table table-bordered">
                                <thead>
                                <tr class="months-header">
                                    <th colspan="4" class="month"><a href="#" class="previous">
                                    <i class="glyphicon glyphicon-chevron-left"></i></a><span>May</span><a href="#" class="next">
                                    <i class="glyphicon glyphicon-chevron-right"></i></a></th>
                                    <th colspan="3" class="year"><a href="#" class="previous">
                                    <i class="glyphicon glyphicon-chevron-left"></i></a><span>2016</span>
                                    <a href="#" class="next"><i class="glyphicon glyphicon-chevron-right"></i></a></th>
                                </tr>
                                <tr class="days-header">
                                    <th>SUN</th>
                                    <th>MON</th>
                                    <th>TUE</th>
                                    <th>WED</th>
                                    <th>THU</th>
                                    <th>FRI</th>
                                    <th>SAT</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td data-day="1">1</td>
                                    <td data-day="2">2</td>
                                    <td data-day="3">3</td>
                                    <td data-day="4">4</td>
                                    <td data-day="5">5</td>
                                    <td data-day="6">6</td>
                                    <td data-day="7">7</td>
                                </tr>
                                <tr>
                                    <td data-day="8">8</td>
                                    <td data-day="9">9</td>
                                    <td data-day="10">10</td>
                                    <td data-day="11">11</td>
                                    <td data-day="12">12</td>
                                    <td data-day="13">13</td>
                                    <td data-day="14">14</td>
                                </tr>
                                <tr>
                                    <td data-day="15">15</td>
                                    <td data-day="16">16</td>
                                    <td class="today" data-day="17">17</td>
                                    <td data-day="18">18</td>
                                    <td data-day="19">19</td>
                                    <td data-day="20">20</td>
                                    <td data-day="21">21</td>
                                </tr>
                                <tr>
                                    <td data-day="22">22</td>
                                    <td data-day="23">23</td>
                                    <td data-day="24">24</td>
                                    <td data-day="25">25</td>
                                    <td data-day="26">26</td>
                                    <td data-day="27">27</td>
                                    <td data-day="28">28</td>
                                </tr>
                                <tr>
                                    <td data-day="29">29</td>
                                    <td data-day="30">30</td>
                                    <td data-day="31">31</td>
                                    <td class="off">1</td>
                                    <td class="off">2</td>
                                    <td class="off">3</td>
                                    <td class="off">4</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <div class="clearfix"></div>
            <div class="form-group col-xs-8"><!-- US visa selection -->

                <span class="help-block">Do you have a valid US Visa, OR Do you hold a valid US Resident Card/Green Card?</span>

                <select name="us_visa" id="us-visa" class="form-control select">
                    <option <?= ($us_visa === 'No')?'selected="selected"':''; ?> value="No">No</option>
                    <option <?= ($us_visa === 'Yes')?'selected="selected"':''; ?> value="Yes">Yes</option>
                </select>

            </div>

            <div class="clearfix"></div>
            <div id="visa-info" class="form-group col-xs-8"><!-- US visa selection -->

                <span class="help-block">Are you able to obtain a US Visa?</span>

                <select name="obtain_us_visa" id="obtain-us-visa" class="form-control select">
                    <option <?=($obtain_visa === 'Yes')?'selected="selected"':"";?>>Yes</option>
                    <option <?=($obtain_visa === 'No')?'selected="selected"':"";?>>No</option>
                </select>

            </div>

            <div class="clearfix"></div>

            <div style="display:none;" class="usvisainfo" id="usa-v-info">

                <div class="form-group col-xs-3"><!--Schengen Visa Number -->

                    <label>Usa Visa number</label>



                    <input type="text" value="<?=$us_visa_no?>" name="schengen" placeholder="" class="form-control">

                </div>

                <div class="form-group col-xs-3"><!--Schengen Visa Number -->

                    <label>Usa Expiration date</label>

                    <div data-date="<?=$us_visa_exp?>" data-name="schengen_exp_date" data-format="y-m-d" class="bfh-datepicker">
                        <div data-toggle="bfh-datepicker" class="input-group bfh-datepicker-toggle"><span
                                class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input
                                type="text" placeholder="" class="form-control" name="schengen_exp_date"></div>
                        <div class="bfh-datepicker-calendar">
                            <table class="calendar table table-bordered">
                                <thead>
                                <tr class="months-header">
                                    <th colspan="4" class="month"><a href="#" class="previous">
                                    <i class="glyphicon glyphicon-chevron-left"></i></a><span>May</span><a href="#" class="next">
                                    <i class="glyphicon glyphicon-chevron-right"></i></a></th>
                                    <th colspan="3" class="year"><a href="#" class="previous">
                                    <i class="glyphicon glyphicon-chevron-left"></i></a><span>2016</span>
                                    <a href="#" class="next"><i class="glyphicon glyphicon-chevron-right"></i></a></th>
                                </tr>
                                <tr class="days-header">
                                    <th>SUN</th>
                                    <th>MON</th>
                                    <th>TUE</th>
                                    <th>WED</th>
                                    <th>THU</th>
                                    <th>FRI</th>
                                    <th>SAT</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td data-day="1">1</td>
                                    <td data-day="2">2</td>
                                    <td data-day="3">3</td>
                                    <td data-day="4">4</td>
                                    <td data-day="5">5</td>
                                    <td data-day="6">6</td>
                                    <td data-day="7">7</td>
                                </tr>
                                <tr>
                                    <td data-day="8">8</td>
                                    <td data-day="9">9</td>
                                    <td data-day="10">10</td>
                                    <td data-day="11">11</td>
                                    <td data-day="12">12</td>
                                    <td data-day="13">13</td>
                                    <td data-day="14">14</td>
                                </tr>
                                <tr>
                                    <td data-day="15">15</td>
                                    <td data-day="16">16</td>
                                    <td class="today" data-day="17">17</td>
                                    <td data-day="18">18</td>
                                    <td data-day="19">19</td>
                                    <td data-day="20">20</td>
                                    <td data-day="21">21</td>
                                </tr>
                                <tr>
                                    <td data-day="22">22</td>
                                    <td data-day="23">23</td>
                                    <td data-day="24">24</td>
                                    <td data-day="25">25</td>
                                    <td data-day="26">26</td>
                                    <td data-day="27">27</td>
                                    <td data-day="28">28</td>
                                </tr>
                                <tr>
                                    <td data-day="29">29</td>
                                    <td data-day="30">30</td>
                                    <td data-day="31">31</td>
                                    <td class="off">1</td>
                                    <td class="off">2</td>
                                    <td class="off">3</td>
                                    <td class="off">4</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <?php 
            if($guest == 'Yes') { ?>
        <div style="display: block;" class="wrap-info" id="guest-info">

            <div class="clearfix"></div>

            <hr>

            <h3>Guest Information</h3>

            <strong class="help-block">Passport Information</strong>

            <div role="alert" class="alert alert-success col-xs-11">

                <button aria-label="Close" data-dismiss="alert" class="close" type="button"></button>

                <strong>ALL</strong> of the following information must be taken from the passport on which you are
                traveling to Barcelona.

            </div>

            <div class="clearfix"></div>

            <div class="form-group col-xs-3"><!-- passport# field -->

                <label>Passport #</label>

                <input type="text" value="123456678899" name="passport_g" id="passport-g" placeholder=""
                       class="form-control">

            </div>

            <div class="form-group col-xs-3"><!-- citizenship field -->

                <label>Passport Citizenship</label>
            <select name="citizen_g" id="citizen_g" class="form-control select country-visa">
            <option value="0">Select Country</option>
                <?php 
                    if(is_array($countries) && !empty($countries)){
                        foreach ($countries as $key => $cntry) {
                            if($citizen_g == $cntry->id) $selected = 'selected';
                            else $selected = '';
                            echo '<option '.$selected.' value="'.$cntry->id.'">'.$cntry->name.'</option>';
                        }
                    }
                ?> 
            </select>

            </div>

            <div class="form-group col-xs-3"><!--passport city field -->

                <label>Passport Issue City</label>

                <input type="text" value="Peshawar" name="issue_city_g" id="issue-city-g"
                       placeholder="" class="form-control">

            </div>

            <div class="clearfix"></div>

            <strong class="help-block">&nbsp;&nbsp;&nbsp;&nbsp;Passport Issue Date:</strong>

            <!-- start issue date -->

            <div class="form-group col-xs-2"><!-- issue month selection -->

                <label>Month</label>

                <select name="pp_issue_month_g" id="pp-issue-month_g" class="form-control select">

                    <option value=""></option>
                    <option <?= (isset($pp_issue_month_g) && $pp_issue_month_g === "01")?"selected='selected'":""; ?>value="01">January</option>
                    <option <?= (isset($pp_issue_month_g) && $pp_issue_month_g === "02")?"selected='selected'":""; ?>value="02">February</option>
                    <option <?= (isset($pp_issue_month_g) && $pp_issue_month_g === "03")?"selected='selected'":""; ?>value="03">March</option>
                    <option <?= (isset($pp_issue_month_g) && $pp_issue_month_g === "04")?"selected='selected'":""; ?>value="04">April</option>
                    <option <?= (isset($pp_issue_month_g) && $pp_issue_month_g === "05")?"selected='selected'":""; ?>value="05">May</option>
                    <option <?= (isset($pp_issue_month_g) && $pp_issue_month_g === "06")?"selected='selected'":""; ?>value="06">June</option>
                    <option <?= (isset($pp_issue_month_g) && $pp_issue_month_g === "07")?"selected='selected'":""; ?>value="07">July</option>
                    <option <?= (isset($pp_issue_month_g) && $pp_issue_month_g === "08")?"selected='selected'":""; ?>value="08">August</option>
                    <option <?= (isset($pp_issue_month_g) && $pp_issue_month_g === "09")?"selected='selected'":""; ?>value="09">September</option>
                    <option <?= (isset($pp_issue_month_g) && $pp_issue_month_g === "10")?"selected='selected'":""; ?>value="10">October</option>
                    <option <?= (isset($pp_issue_month_g) && $pp_issue_month_g === "11")?"selected='selected'":""; ?>value="11">November</option>
                    <option <?= (isset($pp_issue_month_g) && $pp_issue_month_g === "12")?"selected='selected'":""; ?>value="12">December</option>_g

                </select>

            </div>

            <div class="form-group col-xs-2"><!-- issue date selection -->

                <label>Date</label>

                <select name="pp_issue_date_g" id="pp-issue-date_g" class="form-control select">

                    <option value=""></option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "01")?"selected='selected'":"";?>>01</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "02")?"selected='selected'":"";?>>02</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "03")?"selected='selected'":"";?>>03</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "04")?"selected='selected'":"";?>>04</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "05")?"selected='selected'":"";?>>05</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "06")?"selected='selected'":"";?>>06</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "07")?"selected='selected'":"";?>>07</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "08")?"selected='selected'":"";?>>08</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "09")?"selected='selected'":"";?>>09</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "10")?"selected='selected'":"";?>>10</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "11")?"selected='selected'":"";?>>11</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "12")?"selected='selected'":"";?>>12</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "13")?"selected='selected'":"";?>>13</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "14")?"selected='selected'":"";?>>14</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "15")?"selected='selected'":"";?>>15</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "16")?"selected='selected'":"";?>>16</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "17")?"selected='selected'":"";?>>17</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "18")?"selected='selected'":"";?>>18</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "19")?"selected='selected'":"";?>>19</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "20")?"selected='selected'":"";?>>20</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "21")?"selected='selected'":"";?>>21</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "22")?"selected='selected'":"";?>>22</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "23")?"selected='selected'":"";?>>23</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "24")?"selected='selected'":"";?>>24</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "25")?"selected='selected'":"";?>>25</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "26")?"selected='selected'":"";?>>26</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "27")?"selected='selected'":"";?>>27</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "28")?"selected='selected'":"";?>>28</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "29")?"selected='selected'":"";?>>29</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "30")?"selected='selected'":"";?>>30</option>
                    <option <?=(isset($pp_issue_day_g) && $pp_issue_day_g === "31")?"selected='selected'":"";?>>31</option>
                </select>

            </div>

            <div class="form-group col-xs-2"><!-- issue year selection -->

                <label>Year</label>

                <select name="pp_issue_year_g" id="pp-issue-year_g" class="form-control select">
                    <option value=""></option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "1990" ))?'selected="selected"':"" ?> value="1990">1990</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "1991" ))?'selected="selected"':"" ?> value="1991">1991</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "1992" ))?'selected="selected"':"" ?> value="1992">1992</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "1993" ))?'selected="selected"':"" ?> value="1993">1993</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "1994" ))?'selected="selected"':"" ?> value="1994">1994</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "1995" ))?'selected="selected"':"" ?> value="1995">1995</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "1996" ))?'selected="selected"':"" ?> value="1996">1996</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "1997" ))?'selected="selected"':"" ?> value="1997">1997</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "1998" ))?'selected="selected"':"" ?> value="1998">1998</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "1999" ))?'selected="selected"':"" ?> value="1999">1999</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2000" ))?'selected="selected"':"" ?> value="2000">2000</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2001" ))?'selected="selected"':"" ?> value="2001">2001</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2002" ))?'selected="selected"':"" ?> value="2002">2002</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2003" ))?'selected="selected"':"" ?> value="2003">2003</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2004" ))?'selected="selected"':"" ?> value="2004">2004</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2005" ))?'selected="selected"':"" ?> value="2005">2005</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2006" ))?'selected="selected"':"" ?> value="2006">2006</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2007" ))?'selected="selected"':"" ?> value="2007">2007</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2008" ))?'selected="selected"':"" ?> value="2008">2008</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2009" ))?'selected="selected"':"" ?> value="2009">2009</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2010" ))?'selected="selected"':"" ?> value="2010">2010</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2011" ))?'selected="selected"':"" ?> value="2011">2011</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2012" ))?'selected="selected"':"" ?> value="2012">2012</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2013" ))?'selected="selected"':"" ?> value="2013">2013</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2014" ))?'selected="selected"':"" ?> value="2014">2014</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2015" ))?'selected="selected"':"" ?> value="2015">2015</option>
                    <option <?= (isset($pp_issue_year_g) && ($pp_issue_year_g === "2016" ))?'selected="selected"':"" ?> value="2016">2016</option>
                </select>

            </div>

            <div class="clearfix"></div>

            <strong class="help-block">&nbsp;&nbsp;&nbsp;&nbsp;Passport Expiration Date:</strong>

            <!-- end issue date -->

            <div class="clearfix"></div>

            <!-- start expire date -->

            <div class="form-group col-xs-2"><!-- expire month selection -->

                <label>Month</label>

                <select name="pp_expire_month_g" id="pp-expire-month_g" class="form-control select">

                    <option value=""></option>
                    <option <?= (isset($pp_expire_month_g) && $pp_expire_month_g === "01")?"selected='selected'":""; ?>value="01">January</option>
                    <option <?= (isset($pp_expire_month_g) && $pp_expire_month_g === "02")?"selected='selected'":""; ?>value="02">February</option>
                    <option <?= (isset($pp_expire_month_g) && $pp_expire_month_g === "03")?"selected='selected'":""; ?>value="03">March</option>
                    <option <?= (isset($pp_expire_month_g) && $pp_expire_month_g === "04")?"selected='selected'":""; ?>value="04">April</option>
                    <option <?= (isset($pp_expire_month_g) && $pp_expire_month_g === "05")?"selected='selected'":""; ?>value="05">May</option>
                    <option <?= (isset($pp_expire_month_g) && $pp_expire_month_g === "06")?"selected='selected'":""; ?>value="06">June</option>
                    <option <?= (isset($pp_expire_month_g) && $pp_expire_month_g === "07")?"selected='selected'":""; ?>value="07">July</option>
                    <option <?= (isset($pp_expire_month_g) && $pp_expire_month_g === "08")?"selected='selected'":""; ?>value="08">August</option>
                    <option <?= (isset($pp_expire_month_g) && $pp_expire_month_g === "09")?"selected='selected'":""; ?>value="09">September</option>
                    <option <?= (isset($pp_expire_month_g) && $pp_expire_month_g === "10")?"selected='selected'":""; ?>value="10">October</option>
                    <option <?= (isset($pp_expire_month_g) && $pp_expire_month_g === "11")?"selected='selected'":""; ?>value="11">November</option>
                    <option <?= (isset($pp_expire_month_g) && $pp_expire_month_g === "12")?"selected='selected'":""; ?>value="12">December</option>

                </select>

            </div>

            <div class="form-group col-xs-2"><!-- expire date selection -->

                <label>Date</label>

                <select name="pp_expire_date_g" id="pp-expire-date_g" class="form-control select">

                    <option value=""></option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "01")?"selected='selected'":"";?>>01</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "02")?"selected='selected'":"";?>>02</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "03")?"selected='selected'":"";?>>03</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "04")?"selected='selected'":"";?>>04</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "05")?"selected='selected'":"";?>>05</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "06")?"selected='selected'":"";?>>06</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "07")?"selected='selected'":"";?>>07</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "08")?"selected='selected'":"";?>>08</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "09")?"selected='selected'":"";?>>09</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "10")?"selected='selected'":"";?>>10</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "11")?"selected='selected'":"";?>>11</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "12")?"selected='selected'":"";?>>12</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "13")?"selected='selected'":"";?>>13</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "14")?"selected='selected'":"";?>>14</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "15")?"selected='selected'":"";?>>15</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "16")?"selected='selected'":"";?>>16</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "17")?"selected='selected'":"";?>>17</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "18")?"selected='selected'":"";?>>18</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "19")?"selected='selected'":"";?>>19</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "20")?"selected='selected'":"";?>>20</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "21")?"selected='selected'":"";?>>21</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "22")?"selected='selected'":"";?>>22</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "23")?"selected='selected'":"";?>>23</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "24")?"selected='selected'":"";?>>24</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "25")?"selected='selected'":"";?>>25</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "26")?"selected='selected'":"";?>>26</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "27")?"selected='selected'":"";?>>27</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "28")?"selected='selected'":"";?>>28</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "29")?"selected='selected'":"";?>>29</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "30")?"selected='selected'":"";?>>30</option>
                    <option <?=(isset($pp_expire_day_g) && $pp_expire_day_g === "31")?"selected='selected'":"";?>>31</option>

                </select>

            </div>

            <div class="form-group col-xs-2"><!-- expire year selection -->

                <label>Year</label>

                <select name="pp_expire_year_g" id="pp-expire-year_g" class="form-control select">
                    <option value=""></option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2016" ))?'selected="selected"':"" ?> value="2016">2016</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2017" ))?'selected="selected"':"" ?> value="2017">2017</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2018" ))?'selected="selected"':"" ?> value="2018">2018</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2019" ))?'selected="selected"':"" ?> value="2019">2019</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2020" ))?'selected="selected"':"" ?> value="2020">2020</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2021" ))?'selected="selected"':"" ?> value="2021">2021</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2022" ))?'selected="selected"':"" ?> value="2022">2022</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2023" ))?'selected="selected"':"" ?> value="2023">2023</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2024" ))?'selected="selected"':"" ?> value="2024">2024</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2025" ))?'selected="selected"':"" ?> value="2025">2025</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2026" ))?'selected="selected"':"" ?> value="2026">2026</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2027" ))?'selected="selected"':"" ?> value="2027">2027</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2028" ))?'selected="selected"':"" ?> value="2028">2028</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2029" ))?'selected="selected"':"" ?> value="2029">2029</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2030" ))?'selected="selected"':"" ?> value="2030">2030</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2031" ))?'selected="selected"':"" ?> value="2031">2031</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2032" ))?'selected="selected"':"" ?> value="2032">2032</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2033" ))?'selected="selected"':"" ?> value="2033">2033</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2034" ))?'selected="selected"':"" ?> value="2034">2034</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2035" ))?'selected="selected"':"" ?> value="2035">2035</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2036" ))?'selected="selected"':"" ?> value="2036">2036</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2037" ))?'selected="selected"':"" ?> value="2037">2037</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2038" ))?'selected="selected"':"" ?> value="2038">2038</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2039" ))?'selected="selected"':"" ?> value="2039">2039</option>
                    <option <?= (isset($pp_expire_year_g) && ($pp_expire_year_g === "2040" ))?'selected="selected"':"" ?> value="2040">2040</option>
                </select>

            </div>

            <!-- end expire date -->

            <div class="clearfix"></div>

           <div class="form-group col-xs-8">
                <span class="help-block">Do you have a valid US Visa, OR Do you hold a valid US Resident Card/Green Card?</span>
                <select name="us_visa_g" id="us-visa_g" class="form-control select">
                    <option <?= ($us_visa_g === 'Yes')?'selected="selected"':''; ?>value="Yes">Yes</option>
                    <option <?= ($us_visa_g === 'No')?'selected="selected"':''; ?>value="No">No</option>
                </select>
            </div> 

            <div class="clearfix"></div>
            <div id="visa-info_g" class="form-group col-xs-8">

                <span class="help-block">Are you able to obtain a US Visa?</span>

                <select name="obtain_us_visa_g" id="obtain-us-visa_g" class="form-control select">

                    <!--<option>Yes</option>-->

                    <option <?=($obtain_visa === 'Yes')?'selected="selected"':"";?> value="Yes">Yes</option>

                    <option <?=($obtain_visa === 'No')?'selected="selected"':"";?> value="No">No</option>

                </select>

            </div>

            <div class="clearfix"></div>

            <div style="display:none;" id="schengen-info_g">

                <div class="form-group col-xs-3"><!--Schengen Visa Number -->

                    <label>Schengen Visa number</label>

                    <input type="text" value="" name="schengen_g" placeholder=""
                           class="form-control">

                </div>

                <div class="form-group col-xs-3"><!--Schengen Visa Number -->

                    <label>Schengen Expiration date</label>

                    <div data-date="" data-name="schengen_exp_date_g" data-format="y-m-d" class="bfh-datepicker">
                        <div data-toggle="bfh-datepicker" class="input-group bfh-datepicker-toggle"><span
                                class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input
                                type="text" placeholder="" class="form-control" name="schengen_exp_date_g"></div>
                        <div class="bfh-datepicker-calendar">
                            <table class="calendar table table-bordered">
                                <thead>
                                <tr class="months-header">
                                    <th colspan="4" class="month"><a href="#" class="previous"><i
                                                class="glyphicon glyphicon-chevron-left"></i></a><span>May</span><a
                                            href="#" class="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                                    </th>
                                    <th colspan="3" class="year"><a href="#" class="previous"><i
                                                class="glyphicon glyphicon-chevron-left"></i></a><span>2016</span><a
                                            href="#" class="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                                    </th>
                                </tr>
                                <tr class="days-header">
                                    <th>SUN</th>
                                    <th>MON</th>
                                    <th>TUE</th>
                                    <th>WED</th>
                                    <th>THU</th>
                                    <th>FRI</th>
                                    <th>SAT</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td data-day="1">1</td>
                                    <td data-day="2">2</td>
                                    <td data-day="3">3</td>
                                    <td data-day="4">4</td>
                                    <td data-day="5">5</td>
                                    <td data-day="6">6</td>
                                    <td data-day="7">7</td>
                                </tr>
                                <tr>
                                    <td data-day="8">8</td>
                                    <td data-day="9">9</td>
                                    <td data-day="10">10</td>
                                    <td data-day="11">11</td>
                                    <td data-day="12">12</td>
                                    <td data-day="13">13</td>
                                    <td data-day="14">14</td>
                                </tr>
                                <tr>
                                    <td data-day="15">15</td>
                                    <td data-day="16">16</td>
                                    <td class="today" data-day="17">17</td>
                                    <td data-day="18">18</td>
                                    <td data-day="19">19</td>
                                    <td data-day="20">20</td>
                                    <td data-day="21">21</td>
                                </tr>
                                <tr>
                                    <td data-day="22">22</td>
                                    <td data-day="23">23</td>
                                    <td data-day="24">24</td>
                                    <td data-day="25">25</td>
                                    <td data-day="26">26</td>
                                    <td data-day="27">27</td>
                                    <td data-day="28">28</td>
                                </tr>
                                <tr>
                                    <td data-day="29">29</td>
                                    <td data-day="30">30</td>
                                    <td data-day="31">31</td>
                                    <td class="off">1</td>
                                    <td class="off">2</td>
                                    <td class="off">3</td>
                                    <td class="off">4</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
            <div style="display:none;" class="usvisainfo" id="usa-v-info">

                <div class="form-group col-xs-3"><!--Schengen Visa Number -->

                    <label>Usa Visa number</label>

                    <input type="text" value="<?=$us_visa_no_g?>" name="schengen_g" placeholder="" class="form-control">

                </div>

                <div class="form-group col-xs-3"><!--Schengen Visa Number -->

                    <label>Usa Expiration date</label>

                    <div data-date="<?=$us_visa_exp_g?>" data-name="schengen_exp_date_g" data-format="y-m-d" class="bfh-datepicker">
                        <div data-toggle="bfh-datepicker" class="input-group bfh-datepicker-toggle"><span
                                class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input
                                type="text" placeholder="" class="form-control" name="schengen_exp_date_g"></div>
                        <div class="bfh-datepicker-calendar">
                            <table class="calendar table table-bordered">
                                <thead>
                                <tr class="months-header">
                                    <th colspan="4" class="month"><a href="#" class="previous">
                                    <i class="glyphicon glyphicon-chevron-left"></i></a><span>May</span><a href="#" class="next">
                                    <i class="glyphicon glyphicon-chevron-right"></i></a></th>
                                    <th colspan="3" class="year"><a href="#" class="previous">
                                    <i class="glyphicon glyphicon-chevron-left"></i></a><span>2016</span>
                                    <a href="#" class="next"><i class="glyphicon glyphicon-chevron-right"></i></a></th>
                                </tr>
                                <tr class="days-header">
                                    <th>SUN</th>
                                    <th>MON</th>
                                    <th>TUE</th>
                                    <th>WED</th>
                                    <th>THU</th>
                                    <th>FRI</th>
                                    <th>SAT</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td data-day="1">1</td>
                                    <td data-day="2">2</td>
                                    <td data-day="3">3</td>
                                    <td data-day="4">4</td>
                                    <td data-day="5">5</td>
                                    <td data-day="6">6</td>
                                    <td data-day="7">7</td>
                                </tr>
                                <tr>
                                    <td data-day="8">8</td>
                                    <td data-day="9">9</td>
                                    <td data-day="10">10</td>
                                    <td data-day="11">11</td>
                                    <td data-day="12">12</td>
                                    <td data-day="13">13</td>
                                    <td data-day="14">14</td>
                                </tr>
                                <tr>
                                    <td data-day="15">15</td>
                                    <td data-day="16">16</td>
                                    <td class="today" data-day="17">17</td>
                                    <td data-day="18">18</td>
                                    <td data-day="19">19</td>
                                    <td data-day="20">20</td>
                                    <td data-day="21">21</td>
                                </tr>
                                <tr>
                                    <td data-day="22">22</td>
                                    <td data-day="23">23</td>
                                    <td data-day="24">24</td>
                                    <td data-day="25">25</td>
                                    <td data-day="26">26</td>
                                    <td data-day="27">27</td>
                                    <td data-day="28">28</td>
                                </tr>
                                <tr>
                                    <td data-day="29">29</td>
                                    <td data-day="30">30</td>
                                    <td data-day="31">31</td>
                                    <td class="off">1</td>
                                    <td class="off">2</td>
                                    <td class="off">3</td>
                                    <td class="off">4</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="visatype" id="visaType_g">

            <div class="form-group col-xs-12 col-sm-6 col-md-4"><!--Schengen Visa Number -->

                    <label class="visa-type-lbl">Canadian Visa/Canadian eTA Number</label>

                    <input type="text" value="<?=$visa_no_g?>" value="" name="visa_type_g" placeholder="" class="form-control">

                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4"><!--Schengen Visa Number -->

                    <label class="visa-type-exp-lbl">Canadian Visa/Canadian eTA Expiration Date</label>

                    <div data-date="<?=$visa_exp_g?>" data-name="visa_exp_date_g" data-format="y-m-d" class="bfh-datepicker">
                        <div data-toggle="bfh-datepicker" class="input-group bfh-datepicker-toggle"><span
                                class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input
                                type="text" placeholder="" class="form-control" name="exp_date_g"></div>
                        <div class="bfh-datepicker-calendar">
                            <table class="calendar table table-bordered">
                                <thead>
                                <tr class="months-header">
                                    <th colspan="4" class="month"><a href="#" class="previous">
                                    <i class="glyphicon glyphicon-chevron-left"></i></a><span>May</span><a href="#" class="next">
                                    <i class="glyphicon glyphicon-chevron-right"></i></a></th>
                                    <th colspan="3" class="year"><a href="#" class="previous">
                                    <i class="glyphicon glyphicon-chevron-left"></i></a><span>2016</span>
                                    <a href="#" class="next"><i class="glyphicon glyphicon-chevron-right"></i></a></th>
                                </tr>
                                <tr class="days-header">
                                    <th>SUN</th>
                                    <th>MON</th>
                                    <th>TUE</th>
                                    <th>WED</th>
                                    <th>THU</th>
                                    <th>FRI</th>
                                    <th>SAT</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td data-day="1">1</td>
                                    <td data-day="2">2</td>
                                    <td data-day="3">3</td>
                                    <td data-day="4">4</td>
                                    <td data-day="5">5</td>
                                    <td data-day="6">6</td>
                                    <td data-day="7">7</td>
                                </tr>
                                <tr>
                                    <td data-day="8">8</td>
                                    <td data-day="9">9</td>
                                    <td data-day="10">10</td>
                                    <td data-day="11">11</td>
                                    <td data-day="12">12</td>
                                    <td data-day="13">13</td>
                                    <td data-day="14">14</td>
                                </tr>
                                <tr>
                                    <td data-day="15">15</td>
                                    <td data-day="16">16</td>
                                    <td class="today" data-day="17">17</td>
                                    <td data-day="18">18</td>
                                    <td data-day="19">19</td>
                                    <td data-day="20">20</td>
                                    <td data-day="21">21</td>
                                </tr>
                                <tr>
                                    <td data-day="22">22</td>
                                    <td data-day="23">23</td>
                                    <td data-day="24">24</td>
                                    <td data-day="25">25</td>
                                    <td data-day="26">26</td>
                                    <td data-day="27">27</td>
                                    <td data-day="28">28</td>
                                </tr>
                                <tr>
                                    <td data-day="29">29</td>
                                    <td data-day="30">30</td>
                                    <td data-day="31">31</td>
                                    <td class="off">1</td>
                                    <td class="off">2</td>
                                    <td class="off">3</td>
                                    <td class="off">4</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
         <?php }
        ?>

        <div class="clearfix"></div>

        <div class="form-group left30">

            <div>

               <!--  <a role="button" class="btn btn-success"
                   href="<?= base_url() ?>registration/register">Previous</a> -->
                <button type="submit" name="prev_update" id="update" value="" class="btn btn-success left10 submit-btn">Previous</button>
                <button type="submit" name="update" id="update" class="btn btn-success left10 submit-btn">Next</button>

            </div>

        </div>

    </form>

    <!-- end registration form -->
</div>

<script type="text/javascript">
    $(function () {

        //Update the citizenship of winner
        $('#citizen option').each(function() {
            if(this.value == "<?php echo $citizen; ?>"){
                $(this).prop('selected',true);
            }
        });

        //Update the citizenship of guest
        $('#citizen_g option').each(function() {
            if(this.value == "<?php echo $citizen_g; ?>"){
                $(this).prop('selected',true);
            }
        });

        //Some Code for Dropdowns.

        //For Winner Visa Check
        var winnerHasUSVisa = $("#us-visa");
        var winnerVisaInfo = $("#visa-info");
        if(winnerHasUSVisa.val() === "No"){
            winnerVisaInfo.css("display","block");
        }else{
            winnerVisaInfo.css("display","none");
        }
        winnerHasUSVisa.on('change',function(){
            var val = $(this).val();
            if(val === "No"){
                winnerVisaInfo.css("display","block");
            }else{
                winnerVisaInfo.css("display","none");
            }
        });

        //For Companion Visa Check
        var companionHasUSVisa = $("#us-visa_g");
        var companionVisaInfo = $("#visa-info_g");
        if(companionHasUSVisa.val() === "No"){
            companionVisaInfo.css("display","block");
        }else{
            companionVisaInfo.css("display","none");
        }
        companionHasUSVisa.on('change',function(){
            var val = $(this).val();
            if(val === "No"){
                companionVisaInfo.css("display","block");
            }else{
                companionVisaInfo.css("display","none");
            }
        });
    });


    // check if require visa 
    $(document).on('change','.country-visa',function(){ 
        visaCheck($(this).val(), $(this));
    })
    $(document).ready(function(e){
        visaCheck($($('.country-visa')[0]).val(), $($('.country-visa')[0]));
    })
    function visaCheck(value, ref){
        $parent = ref.parents('.wrap-info');
        if(value == 28 || value == 147){ //united state or canada
            $parent.find('.visatype').hide();
        } else $parent.find('.visatype').show();
        /*$.ajax({
            url:"<?=base_url()?>Registration/checkVisa",
            type:"POST",
            data:{country:value},
            success:function(data){
                var data = data.split("::");
                if(data[0] == 'OK'){
                    if(data[1] == 'Yes' || data[2] == 'Canadian Visa'){
                        $parent.find('.visatype').hide();
                    } else $parent.find('.visatype').show();
                    //$parent.find('.visatype').find('.visa-type-lbl').html(data[2]+' Number');
                   // $parent.find('.visatype').find('.visa-type-exp-lbl').html(data[2]+' Exp Date');
                } else {
                    $parent.find('.visatype').show();
                }
            }
        });*/
    }

    $(document).on('click','.submit-btn',function(e){
        e.preventDefault();
        var $eTime  = "2018-12-15"
        var $winMon = $('#pp-expire-month').val();
        var $winDt = $('#pp-expire-date').val();
        var $winYr = $('#pp-expire-year').val();
        var $msg = {};
        if(Date.parse($winYr+"-"+$winMon+"-"+$winDt) <= Date.parse($eTime)){
            $msg['Winner']="Passport expires within 6 months of travel. Please renew your passport and enter your new passport details.<br>";
            $(".error-noti").show();
        }
        var $winMon = $('#pp-expire-month_g').val();
        var $winDt = $('#pp-expire-date_g').val();
        var $winYr = $('#pp-expire-year_g').val();
        if(Date.parse($winYr+"-"+$winMon+"-"+$winDt) <= Date.parse($eTime)){
            $msg["Guest"]="Guest Passport expires within 6 months of travel.";
            $(".error-noti").show();
        }
        console.log($msg);
        $(".error-noti").empty();
        $.each($msg, function(i, val){
            $(".error-noti").append("<strong>"+i+"</strong> : "+val);
        })
        if($.isEmptyObject($msg)){
            $("form").submit();
        } else {
            $('html, body').animate({
                scrollTop: $(".error-noti").offset().top
            }, 1000);
        }
    })

</script>