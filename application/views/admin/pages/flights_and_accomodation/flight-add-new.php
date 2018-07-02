<!-- Start Content-->

<?php
//getting required values.
$regID = isset($page_data['registration'])?$page_data['registration']->id:'';
$reg_no = isset($page_data['registration'])?$page_data['registration']->reg_id:'';
$userID = isset($page_data['registration'])?$page_data['registration']->user_id:'';
$title = isset($page_data['registration'])?$page_data['registration']->title:'';
$first_name = isset($page_data['registration'])?$page_data['registration']->first_name:'';
$last_name = isset($page_data['registration'])?$page_data['registration']->last_name:'';
?>

<div class="wrap clearfix">

    <div id="content-wrap">

        <div id="content">

            <div id="msgholder"></div>

            <br />
            <div id="fullform">
                <p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i> Please fill out flight information.<br>
                    &nbsp;</p>
                <form class="xform" id="flight_info_form" method="post" action="<?=base_url()?>admin/flights/process_add_flight">
                    <header><?php echo $title; ?> <?php echo $first_name; ?> <?php echo $last_name; ?> <span>Flight Details</span></header>

                    <div class="row">
                        <section class="col col-10"><h3>Travel to Barcelona: Segment 1</h3></section>
                        <input type="text" name="regID" value="<?php echo $regID; ?>" hidden>
                        <input type="text" name="regno" value="<?php echo $reg_no; ?>" hidden>
                        <input type="text" name="tt_tf1" value="1" hidden>
                        <input type="text" name="segment1" value="1" hidden>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-to1" name="dest_to1" placeholder="To"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-from1" name="dest_from1" placeholder="From"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_month1" id="dateofservice__month1" class="form-control select">
                                <option value="">--Select Month--</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "01")?"selected='selected'":""; ?>value="01">January</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "02")?"selected='selected'":""; ?>value="02">February</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "03")?"selected='selected'":""; ?>value="03">March</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "04")?"selected='selected'":""; ?>value="04">April</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "05")?"selected='selected'":""; ?>value="05">May</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "06")?"selected='selected'":""; ?>value="06">June</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "07")?"selected='selected'":""; ?>value="07">July</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "08")?"selected='selected'":""; ?>value="08">August</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "09")?"selected='selected'":""; ?>value="09">September</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "10")?"selected='selected'":""; ?>value="10">October</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "11")?"selected='selected'":""; ?>value="11">November</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "12")?"selected='selected'":""; ?>value="12">December</option>
                            </select>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_date1" id="dateofservice__date1" class="form-control select">
                                <option value="">--Select Date--</option>
                                <option value="01" <?=(isset($arrivalDate) && $arrivalDate === "01")?"selected='selected'":"";?>>01</option>
                                <option value="02" <?=(isset($arrivalDate) && $arrivalDate === "02")?"selected='selected'":"";?>>02</option>
                                <option value="03" <?=(isset($arrivalDate) && $arrivalDate === "03")?"selected='selected'":"";?>>03</option>
                                <option value="04" <?=(isset($arrivalDate) && $arrivalDate === "04")?"selected='selected'":"";?>>04</option>
                                <option value="05" <?=(isset($arrivalDate) && $arrivalDate === "05")?"selected='selected'":"";?>>05</option>
                                <option value="06" <?=(isset($arrivalDate) && $arrivalDate === "06")?"selected='selected'":"";?>>06</option>
                                <option value="07" <?=(isset($arrivalDate) && $arrivalDate === "07")?"selected='selected'":"";?>>07</option>
                                <option value="08" <?=(isset($arrivalDate) && $arrivalDate === "08")?"selected='selected'":"";?>>08</option>
                                <option value="09" <?=(isset($arrivalDate) && $arrivalDate === "09")?"selected='selected'":"";?>>09</option>
                                <option value="10" <?=(isset($arrivalDate) && $arrivalDate === "10")?"selected='selected'":"";?>>10</option>
                                <option value="11" <?=(isset($arrivalDate) && $arrivalDate === "11")?"selected='selected'":"";?>>11</option>
                                <option value="12" <?=(isset($arrivalDate) && $arrivalDate === "12")?"selected='selected'":"";?>>12</option>
                                <option value="13" <?=(isset($arrivalDate) && $arrivalDate === "13")?"selected='selected'":"";?>>13</option>
                                <option value="14" <?=(isset($arrivalDate) && $arrivalDate === "14")?"selected='selected'":"";?>>14</option>
                                <option value="15" <?=(isset($arrivalDate) && $arrivalDate === "15")?"selected='selected'":"";?>>15</option>
                                <option value="16" <?=(isset($arrivalDate) && $arrivalDate === "16")?"selected='selected'":"";?>>16</option>
                                <option value="17" <?=(isset($arrivalDate) && $arrivalDate === "17")?"selected='selected'":"";?>>17</option>
                                <option value="18" <?=(isset($arrivalDate) && $arrivalDate === "18")?"selected='selected'":"";?>>18</option>
                                <option value="19" <?=(isset($arrivalDate) && $arrivalDate === "19")?"selected='selected'":"";?>>19</option>
                                <option value="20" <?=(isset($arrivalDate) && $arrivalDate === "20")?"selected='selected'":"";?>>20</option>
                                <option value="21" <?=(isset($arrivalDate) && $arrivalDate === "21")?"selected='selected'":"";?>>21</option>
                                <option value="22" <?=(isset($arrivalDate) && $arrivalDate === "22")?"selected='selected'":"";?>>22</option>
                                <option value="23" <?=(isset($arrivalDate) && $arrivalDate === "23")?"selected='selected'":"";?>>23</option>
                                <option value="24" <?=(isset($arrivalDate) && $arrivalDate === "24")?"selected='selected'":"";?>>24</option>
                                <option value="25" <?=(isset($arrivalDate) && $arrivalDate === "25")?"selected='selected'":"";?>>25</option>
                                <option value="26" <?=(isset($arrivalDate) && $arrivalDate === "26")?"selected='selected'":"";?>>26</option>
                                <option value="27" <?=(isset($arrivalDate) && $arrivalDate === "27")?"selected='selected'":"";?>>27</option>
                                <option value="28" <?=(isset($arrivalDate) && $arrivalDate === "28")?"selected='selected'":"";?>>28</option>
                                <option value="29" <?=(isset($arrivalDate) && $arrivalDate === "29")?"selected='selected'":"";?>>29</option>
                                <option value="30" <?=(isset($arrivalDate) && $arrivalDate === "30")?"selected='selected'":"";?>>30</option>
                                <option value="31" <?=(isset($arrivalDate) && $arrivalDate === "31")?"selected='selected'":"";?>>31</option>
                            </select>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="airline-fligh1t" name="airline_flight1" placeholder="Flight #"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="class1" placeholder="Flight Class">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="seat1" placeholder="Seat Number">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dpt-time1" name="dpt_time1" placeholder="Departure Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="arr-time1" name="arr_time1" placeholder="Arrival Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>
                    </div>
                    <!-- segment 1 end -->
                    <hr />
                    <div class="row">
                        <section class="col col-10"><h3>Travel to Barcelona: Segment 2</h3></section>
                        <input type="text" id="tt-tf2" name="tt_tf2" value="1" hidden>
                        <input type="text" id="segment2" name="segment2" value="2" hidden>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-to2" name="dest_to2" placeholder="To"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-from2" name="dest_from2" placeholder="From"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_month2" id="dateofservice__month2" class="form-control select">
                                <option value="">--Select Month--</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "01")?"selected='selected'":""; ?>value="01">January</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "02")?"selected='selected'":""; ?>value="02">February</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "03")?"selected='selected'":""; ?>value="03">March</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "04")?"selected='selected'":""; ?>value="04">April</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "05")?"selected='selected'":""; ?>value="05">May</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "06")?"selected='selected'":""; ?>value="06">June</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "07")?"selected='selected'":""; ?>value="07">July</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "08")?"selected='selected'":""; ?>value="08">August</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "09")?"selected='selected'":""; ?>value="09">September</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "10")?"selected='selected'":""; ?>value="10">October</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "11")?"selected='selected'":""; ?>value="11">November</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "12")?"selected='selected'":""; ?>value="12">December</option>
                            </select>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_date2" id="dateofservice__date2" class="form-control select">
                                <option value="">--Select Date--</option>
                                <option value="01" <?=(isset($arrivalDate) && $arrivalDate === "01")?"selected='selected'":"";?>>01</option>
                                <option value="02" <?=(isset($arrivalDate) && $arrivalDate === "02")?"selected='selected'":"";?>>02</option>
                                <option value="03" <?=(isset($arrivalDate) && $arrivalDate === "03")?"selected='selected'":"";?>>03</option>
                                <option value="04" <?=(isset($arrivalDate) && $arrivalDate === "04")?"selected='selected'":"";?>>04</option>
                                <option value="05" <?=(isset($arrivalDate) && $arrivalDate === "05")?"selected='selected'":"";?>>05</option>
                                <option value="06" <?=(isset($arrivalDate) && $arrivalDate === "06")?"selected='selected'":"";?>>06</option>
                                <option value="07" <?=(isset($arrivalDate) && $arrivalDate === "07")?"selected='selected'":"";?>>07</option>
                                <option value="08" <?=(isset($arrivalDate) && $arrivalDate === "08")?"selected='selected'":"";?>>08</option>
                                <option value="09" <?=(isset($arrivalDate) && $arrivalDate === "09")?"selected='selected'":"";?>>09</option>
                                <option value="10" <?=(isset($arrivalDate) && $arrivalDate === "10")?"selected='selected'":"";?>>10</option>
                                <option value="11" <?=(isset($arrivalDate) && $arrivalDate === "11")?"selected='selected'":"";?>>11</option>
                                <option value="12" <?=(isset($arrivalDate) && $arrivalDate === "12")?"selected='selected'":"";?>>12</option>
                                <option value="13" <?=(isset($arrivalDate) && $arrivalDate === "13")?"selected='selected'":"";?>>13</option>
                                <option value="14" <?=(isset($arrivalDate) && $arrivalDate === "14")?"selected='selected'":"";?>>14</option>
                                <option value="15" <?=(isset($arrivalDate) && $arrivalDate === "15")?"selected='selected'":"";?>>15</option>
                                <option value="16" <?=(isset($arrivalDate) && $arrivalDate === "16")?"selected='selected'":"";?>>16</option>
                                <option value="17" <?=(isset($arrivalDate) && $arrivalDate === "17")?"selected='selected'":"";?>>17</option>
                                <option value="18" <?=(isset($arrivalDate) && $arrivalDate === "18")?"selected='selected'":"";?>>18</option>
                                <option value="19" <?=(isset($arrivalDate) && $arrivalDate === "19")?"selected='selected'":"";?>>19</option>
                                <option value="20" <?=(isset($arrivalDate) && $arrivalDate === "20")?"selected='selected'":"";?>>20</option>
                                <option value="21" <?=(isset($arrivalDate) && $arrivalDate === "21")?"selected='selected'":"";?>>21</option>
                                <option value="22" <?=(isset($arrivalDate) && $arrivalDate === "22")?"selected='selected'":"";?>>22</option>
                                <option value="23" <?=(isset($arrivalDate) && $arrivalDate === "23")?"selected='selected'":"";?>>23</option>
                                <option value="24" <?=(isset($arrivalDate) && $arrivalDate === "24")?"selected='selected'":"";?>>24</option>
                                <option value="25" <?=(isset($arrivalDate) && $arrivalDate === "25")?"selected='selected'":"";?>>25</option>
                                <option value="26" <?=(isset($arrivalDate) && $arrivalDate === "26")?"selected='selected'":"";?>>26</option>
                                <option value="27" <?=(isset($arrivalDate) && $arrivalDate === "27")?"selected='selected'":"";?>>27</option>
                                <option value="28" <?=(isset($arrivalDate) && $arrivalDate === "28")?"selected='selected'":"";?>>28</option>
                                <option value="29" <?=(isset($arrivalDate) && $arrivalDate === "29")?"selected='selected'":"";?>>29</option>
                                <option value="30" <?=(isset($arrivalDate) && $arrivalDate === "30")?"selected='selected'":"";?>>30</option>
                                <option value="31" <?=(isset($arrivalDate) && $arrivalDate === "31")?"selected='selected'":"";?>>31</option>
                            </select>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="airline-flight2" name="airline_flight2" placeholder="Flight #"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="class2" placeholder="Flight Class">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="seat2" placeholder="Seat Number">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dpt-time2" name="dpt_time2" placeholder="Departure Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="arr-time2" name="arr_time2" placeholder="Arrival Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>
                    </div>
                    <!-- segment 2 end -->

                    <hr />
                    <div class="row">
                        <section class="col col-10"><h3>Travel to Barcelona: Segment 3</h3></section>
                        <input type="text" name="tt_tf3" value="1" hidden>
                        <input type="text" name="segment3" value="3" hidden>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-to3" name="dest_to3" placeholder="To"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-from3" name="dest_from3" placeholder="From"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_month3" id="dateofservice__month3" class="form-control select">
                                <option value="">--Select Month--</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "01")?"selected='selected'":""; ?>value="01">January</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "02")?"selected='selected'":""; ?>value="02">February</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "03")?"selected='selected'":""; ?>value="03">March</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "04")?"selected='selected'":""; ?>value="04">April</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "05")?"selected='selected'":""; ?>value="05">May</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "06")?"selected='selected'":""; ?>value="06">June</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "07")?"selected='selected'":""; ?>value="07">July</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "08")?"selected='selected'":""; ?>value="08">August</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "09")?"selected='selected'":""; ?>value="09">September</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "10")?"selected='selected'":""; ?>value="10">October</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "11")?"selected='selected'":""; ?>value="11">November</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "12")?"selected='selected'":""; ?>value="12">December</option>
                            </select>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_date3" id="dateofservice__date3" class="form-control select">
                                <option value="">--Select Date--</option>
                                <option value="01" <?=(isset($arrivalDate) && $arrivalDate === "01")?"selected='selected'":"";?>>01</option>
                                <option value="02" <?=(isset($arrivalDate) && $arrivalDate === "02")?"selected='selected'":"";?>>02</option>
                                <option value="03" <?=(isset($arrivalDate) && $arrivalDate === "03")?"selected='selected'":"";?>>03</option>
                                <option value="04" <?=(isset($arrivalDate) && $arrivalDate === "04")?"selected='selected'":"";?>>04</option>
                                <option value="05" <?=(isset($arrivalDate) && $arrivalDate === "05")?"selected='selected'":"";?>>05</option>
                                <option value="06" <?=(isset($arrivalDate) && $arrivalDate === "06")?"selected='selected'":"";?>>06</option>
                                <option value="07" <?=(isset($arrivalDate) && $arrivalDate === "07")?"selected='selected'":"";?>>07</option>
                                <option value="08" <?=(isset($arrivalDate) && $arrivalDate === "08")?"selected='selected'":"";?>>08</option>
                                <option value="09" <?=(isset($arrivalDate) && $arrivalDate === "09")?"selected='selected'":"";?>>09</option>
                                <option value="10" <?=(isset($arrivalDate) && $arrivalDate === "10")?"selected='selected'":"";?>>10</option>
                                <option value="11" <?=(isset($arrivalDate) && $arrivalDate === "11")?"selected='selected'":"";?>>11</option>
                                <option value="12" <?=(isset($arrivalDate) && $arrivalDate === "12")?"selected='selected'":"";?>>12</option>
                                <option value="13" <?=(isset($arrivalDate) && $arrivalDate === "13")?"selected='selected'":"";?>>13</option>
                                <option value="14" <?=(isset($arrivalDate) && $arrivalDate === "14")?"selected='selected'":"";?>>14</option>
                                <option value="15" <?=(isset($arrivalDate) && $arrivalDate === "15")?"selected='selected'":"";?>>15</option>
                                <option value="16" <?=(isset($arrivalDate) && $arrivalDate === "16")?"selected='selected'":"";?>>16</option>
                                <option value="17" <?=(isset($arrivalDate) && $arrivalDate === "17")?"selected='selected'":"";?>>17</option>
                                <option value="18" <?=(isset($arrivalDate) && $arrivalDate === "18")?"selected='selected'":"";?>>18</option>
                                <option value="19" <?=(isset($arrivalDate) && $arrivalDate === "19")?"selected='selected'":"";?>>19</option>
                                <option value="20" <?=(isset($arrivalDate) && $arrivalDate === "20")?"selected='selected'":"";?>>20</option>
                                <option value="21" <?=(isset($arrivalDate) && $arrivalDate === "21")?"selected='selected'":"";?>>21</option>
                                <option value="22" <?=(isset($arrivalDate) && $arrivalDate === "22")?"selected='selected'":"";?>>22</option>
                                <option value="23" <?=(isset($arrivalDate) && $arrivalDate === "23")?"selected='selected'":"";?>>23</option>
                                <option value="24" <?=(isset($arrivalDate) && $arrivalDate === "24")?"selected='selected'":"";?>>24</option>
                                <option value="25" <?=(isset($arrivalDate) && $arrivalDate === "25")?"selected='selected'":"";?>>25</option>
                                <option value="26" <?=(isset($arrivalDate) && $arrivalDate === "26")?"selected='selected'":"";?>>26</option>
                                <option value="27" <?=(isset($arrivalDate) && $arrivalDate === "27")?"selected='selected'":"";?>>27</option>
                                <option value="28" <?=(isset($arrivalDate) && $arrivalDate === "28")?"selected='selected'":"";?>>28</option>
                                <option value="29" <?=(isset($arrivalDate) && $arrivalDate === "29")?"selected='selected'":"";?>>29</option>
                                <option value="30" <?=(isset($arrivalDate) && $arrivalDate === "30")?"selected='selected'":"";?>>30</option>
                                <option value="31" <?=(isset($arrivalDate) && $arrivalDate === "31")?"selected='selected'":"";?>>31</option>
                            </select>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="airline-flight3" name="airline_flight3" placeholder="Flight #"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="class3" placeholder="Flight Class">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="seat3" placeholder="Seat Number">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dpt-time3" name="dpt_time3" placeholder="Departure Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="arr-time3" name="arr_time3" placeholder="Arrival Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>
                    </div>
                    <!-- segment 3 end -->

                    <hr />
                    <div class="row">
                        <section class="col col-10"><h3>Travel to Barcelona: Segment 4</h3></section>
                        <input type="text" name="tt_tf4" value="1" hidden>
                        <input type="text" name="segment4" value="4" hidden>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-to4" name="dest_to4" placeholder="To"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-from4" name="dest_from4" placeholder="From"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_month4" id="dateofservice__month4" class="form-control select">
                                <option value="">--Select Month--</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "01")?"selected='selected'":""; ?>value="01">January</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "02")?"selected='selected'":""; ?>value="02">February</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "03")?"selected='selected'":""; ?>value="03">March</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "04")?"selected='selected'":""; ?>value="04">April</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "05")?"selected='selected'":""; ?>value="05">May</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "06")?"selected='selected'":""; ?>value="06">June</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "07")?"selected='selected'":""; ?>value="07">July</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "08")?"selected='selected'":""; ?>value="08">August</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "09")?"selected='selected'":""; ?>value="09">September</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "10")?"selected='selected'":""; ?>value="10">October</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "11")?"selected='selected'":""; ?>value="11">November</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "12")?"selected='selected'":""; ?>value="12">December</option>
                            </select>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_date4" id="dateofservice__date4" class="form-control select">
                                <option value="">--Select Date--</option>
                                <option value="01" <?=(isset($arrivalDate) && $arrivalDate === "01")?"selected='selected'":"";?>>01</option>
                                <option value="02" <?=(isset($arrivalDate) && $arrivalDate === "02")?"selected='selected'":"";?>>02</option>
                                <option value="03" <?=(isset($arrivalDate) && $arrivalDate === "03")?"selected='selected'":"";?>>03</option>
                                <option value="04" <?=(isset($arrivalDate) && $arrivalDate === "04")?"selected='selected'":"";?>>04</option>
                                <option value="05" <?=(isset($arrivalDate) && $arrivalDate === "05")?"selected='selected'":"";?>>05</option>
                                <option value="06" <?=(isset($arrivalDate) && $arrivalDate === "06")?"selected='selected'":"";?>>06</option>
                                <option value="07" <?=(isset($arrivalDate) && $arrivalDate === "07")?"selected='selected'":"";?>>07</option>
                                <option value="08" <?=(isset($arrivalDate) && $arrivalDate === "08")?"selected='selected'":"";?>>08</option>
                                <option value="09" <?=(isset($arrivalDate) && $arrivalDate === "09")?"selected='selected'":"";?>>09</option>
                                <option value="10" <?=(isset($arrivalDate) && $arrivalDate === "10")?"selected='selected'":"";?>>10</option>
                                <option value="11" <?=(isset($arrivalDate) && $arrivalDate === "11")?"selected='selected'":"";?>>11</option>
                                <option value="12" <?=(isset($arrivalDate) && $arrivalDate === "12")?"selected='selected'":"";?>>12</option>
                                <option value="13" <?=(isset($arrivalDate) && $arrivalDate === "13")?"selected='selected'":"";?>>13</option>
                                <option value="14" <?=(isset($arrivalDate) && $arrivalDate === "14")?"selected='selected'":"";?>>14</option>
                                <option value="15" <?=(isset($arrivalDate) && $arrivalDate === "15")?"selected='selected'":"";?>>15</option>
                                <option value="16" <?=(isset($arrivalDate) && $arrivalDate === "16")?"selected='selected'":"";?>>16</option>
                                <option value="17" <?=(isset($arrivalDate) && $arrivalDate === "17")?"selected='selected'":"";?>>17</option>
                                <option value="18" <?=(isset($arrivalDate) && $arrivalDate === "18")?"selected='selected'":"";?>>18</option>
                                <option value="19" <?=(isset($arrivalDate) && $arrivalDate === "19")?"selected='selected'":"";?>>19</option>
                                <option value="20" <?=(isset($arrivalDate) && $arrivalDate === "20")?"selected='selected'":"";?>>20</option>
                                <option value="21" <?=(isset($arrivalDate) && $arrivalDate === "21")?"selected='selected'":"";?>>21</option>
                                <option value="22" <?=(isset($arrivalDate) && $arrivalDate === "22")?"selected='selected'":"";?>>22</option>
                                <option value="23" <?=(isset($arrivalDate) && $arrivalDate === "23")?"selected='selected'":"";?>>23</option>
                                <option value="24" <?=(isset($arrivalDate) && $arrivalDate === "24")?"selected='selected'":"";?>>24</option>
                                <option value="25" <?=(isset($arrivalDate) && $arrivalDate === "25")?"selected='selected'":"";?>>25</option>
                                <option value="26" <?=(isset($arrivalDate) && $arrivalDate === "26")?"selected='selected'":"";?>>26</option>
                                <option value="27" <?=(isset($arrivalDate) && $arrivalDate === "27")?"selected='selected'":"";?>>27</option>
                                <option value="28" <?=(isset($arrivalDate) && $arrivalDate === "28")?"selected='selected'":"";?>>28</option>
                                <option value="29" <?=(isset($arrivalDate) && $arrivalDate === "29")?"selected='selected'":"";?>>29</option>
                                <option value="30" <?=(isset($arrivalDate) && $arrivalDate === "30")?"selected='selected'":"";?>>30</option>
                                <option value="31" <?=(isset($arrivalDate) && $arrivalDate === "31")?"selected='selected'":"";?>>31</option>
                            </select>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="airline-fligh1t" name="airline_flight4" placeholder="Flight #"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="class4" placeholder="Flight Class">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="seat4" placeholder="Seat Number">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dpt-time4" name="dpt_time4" placeholder="Departure Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="arr-time4" name="arr_time4" placeholder="Arrival Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>
                    </div>
                    <!-- segment 4 end -->
                    <hr />
                    <div class="row">
                        <section class="col col-10"><h3>Travel from Barcelona: Segment 1</h3></section>
                        <input type="text" id="tt-tf5" name="tt_tf5" value="2" hidden>
                        <input type="text" id="segment5" name="segment5" value="5" hidden>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-to5" name="dest_to5" placeholder="To"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-from5" name="dest_from5" placeholder="From"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_month5" id="dateofservice__month5" class="form-control select">
                                <option value="">--Select Month--</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "01")?"selected='selected'":""; ?>value="01">January</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "02")?"selected='selected'":""; ?>value="02">February</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "03")?"selected='selected'":""; ?>value="03">March</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "04")?"selected='selected'":""; ?>value="04">April</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "05")?"selected='selected'":""; ?>value="05">May</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "06")?"selected='selected'":""; ?>value="06">June</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "07")?"selected='selected'":""; ?>value="07">July</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "08")?"selected='selected'":""; ?>value="08">August</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "09")?"selected='selected'":""; ?>value="09">September</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "10")?"selected='selected'":""; ?>value="10">October</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "11")?"selected='selected'":""; ?>value="11">November</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "12")?"selected='selected'":""; ?>value="12">December</option>
                            </select>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_date5" id="dateofservice__date5" class="form-control select">
                                <option value="">--Select Date--</option>
                                <option value="01" <?=(isset($arrivalDate) && $arrivalDate === "01")?"selected='selected'":"";?>>01</option>
                                <option value="02" <?=(isset($arrivalDate) && $arrivalDate === "02")?"selected='selected'":"";?>>02</option>
                                <option value="03" <?=(isset($arrivalDate) && $arrivalDate === "03")?"selected='selected'":"";?>>03</option>
                                <option value="04" <?=(isset($arrivalDate) && $arrivalDate === "04")?"selected='selected'":"";?>>04</option>
                                <option value="05" <?=(isset($arrivalDate) && $arrivalDate === "05")?"selected='selected'":"";?>>05</option>
                                <option value="06" <?=(isset($arrivalDate) && $arrivalDate === "06")?"selected='selected'":"";?>>06</option>
                                <option value="07" <?=(isset($arrivalDate) && $arrivalDate === "07")?"selected='selected'":"";?>>07</option>
                                <option value="08" <?=(isset($arrivalDate) && $arrivalDate === "08")?"selected='selected'":"";?>>08</option>
                                <option value="09" <?=(isset($arrivalDate) && $arrivalDate === "09")?"selected='selected'":"";?>>09</option>
                                <option value="10" <?=(isset($arrivalDate) && $arrivalDate === "10")?"selected='selected'":"";?>>10</option>
                                <option value="11" <?=(isset($arrivalDate) && $arrivalDate === "11")?"selected='selected'":"";?>>11</option>
                                <option value="12" <?=(isset($arrivalDate) && $arrivalDate === "12")?"selected='selected'":"";?>>12</option>
                                <option value="13" <?=(isset($arrivalDate) && $arrivalDate === "13")?"selected='selected'":"";?>>13</option>
                                <option value="14" <?=(isset($arrivalDate) && $arrivalDate === "14")?"selected='selected'":"";?>>14</option>
                                <option value="15" <?=(isset($arrivalDate) && $arrivalDate === "15")?"selected='selected'":"";?>>15</option>
                                <option value="16" <?=(isset($arrivalDate) && $arrivalDate === "16")?"selected='selected'":"";?>>16</option>
                                <option value="17" <?=(isset($arrivalDate) && $arrivalDate === "17")?"selected='selected'":"";?>>17</option>
                                <option value="18" <?=(isset($arrivalDate) && $arrivalDate === "18")?"selected='selected'":"";?>>18</option>
                                <option value="19" <?=(isset($arrivalDate) && $arrivalDate === "19")?"selected='selected'":"";?>>19</option>
                                <option value="20" <?=(isset($arrivalDate) && $arrivalDate === "20")?"selected='selected'":"";?>>20</option>
                                <option value="21" <?=(isset($arrivalDate) && $arrivalDate === "21")?"selected='selected'":"";?>>21</option>
                                <option value="22" <?=(isset($arrivalDate) && $arrivalDate === "22")?"selected='selected'":"";?>>22</option>
                                <option value="23" <?=(isset($arrivalDate) && $arrivalDate === "23")?"selected='selected'":"";?>>23</option>
                                <option value="24" <?=(isset($arrivalDate) && $arrivalDate === "24")?"selected='selected'":"";?>>24</option>
                                <option value="25" <?=(isset($arrivalDate) && $arrivalDate === "25")?"selected='selected'":"";?>>25</option>
                                <option value="26" <?=(isset($arrivalDate) && $arrivalDate === "26")?"selected='selected'":"";?>>26</option>
                                <option value="27" <?=(isset($arrivalDate) && $arrivalDate === "27")?"selected='selected'":"";?>>27</option>
                                <option value="28" <?=(isset($arrivalDate) && $arrivalDate === "28")?"selected='selected'":"";?>>28</option>
                                <option value="29" <?=(isset($arrivalDate) && $arrivalDate === "29")?"selected='selected'":"";?>>29</option>
                                <option value="30" <?=(isset($arrivalDate) && $arrivalDate === "30")?"selected='selected'":"";?>>30</option>
                                <option value="31" <?=(isset($arrivalDate) && $arrivalDate === "31")?"selected='selected'":"";?>>31</option>
                            </select>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="airline-flight5" name="airline_flight5" placeholder="Flight #"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="class5" placeholder="Flight Class">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="seat5" placeholder="Seat Number">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dpt-time5" name="dpt_time5" placeholder="Departure Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="arr-time5" name="arr_time5" placeholder="Arrival Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="pnr5" placeholder="PNR">
                            </label>
                        </section>
                    </div>
                    <!-- segment 1 end -->

                    <hr />
                    <div class="row">
                        <section class="col col-10"><h3>Travel from Barcelona: Segment 2</h3></section>
                        <input type="text" name="tt_tf6" value="2" hidden>
                        <input type="text" name="segment6" value="6" hidden>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-to6" name="dest_to6" placeholder="To"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-from6" name="dest_from6" placeholder="From"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_month6" id="dateofservice__month6" class="form-control select">
                                <option value="">--Select Month--</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "01")?"selected='selected'":""; ?>value="01">January</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "02")?"selected='selected'":""; ?>value="02">February</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "03")?"selected='selected'":""; ?>value="03">March</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "04")?"selected='selected'":""; ?>value="04">April</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "05")?"selected='selected'":""; ?>value="05">May</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "06")?"selected='selected'":""; ?>value="06">June</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "07")?"selected='selected'":""; ?>value="07">July</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "08")?"selected='selected'":""; ?>value="08">August</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "09")?"selected='selected'":""; ?>value="09">September</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "10")?"selected='selected'":""; ?>value="10">October</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "11")?"selected='selected'":""; ?>value="11">November</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "12")?"selected='selected'":""; ?>value="12">December</option>
                            </select>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_date6" id="dateofservice__date6" class="form-control select">
                                <option value="">--Select Date--</option>
                                <option value="01" <?=(isset($arrivalDate) && $arrivalDate === "01")?"selected='selected'":"";?>>01</option>
                                <option value="02" <?=(isset($arrivalDate) && $arrivalDate === "02")?"selected='selected'":"";?>>02</option>
                                <option value="03" <?=(isset($arrivalDate) && $arrivalDate === "03")?"selected='selected'":"";?>>03</option>
                                <option value="04" <?=(isset($arrivalDate) && $arrivalDate === "04")?"selected='selected'":"";?>>04</option>
                                <option value="05" <?=(isset($arrivalDate) && $arrivalDate === "05")?"selected='selected'":"";?>>05</option>
                                <option value="06" <?=(isset($arrivalDate) && $arrivalDate === "06")?"selected='selected'":"";?>>06</option>
                                <option value="07" <?=(isset($arrivalDate) && $arrivalDate === "07")?"selected='selected'":"";?>>07</option>
                                <option value="08" <?=(isset($arrivalDate) && $arrivalDate === "08")?"selected='selected'":"";?>>08</option>
                                <option value="09" <?=(isset($arrivalDate) && $arrivalDate === "09")?"selected='selected'":"";?>>09</option>
                                <option value="10" <?=(isset($arrivalDate) && $arrivalDate === "10")?"selected='selected'":"";?>>10</option>
                                <option value="11" <?=(isset($arrivalDate) && $arrivalDate === "11")?"selected='selected'":"";?>>11</option>
                                <option value="12" <?=(isset($arrivalDate) && $arrivalDate === "12")?"selected='selected'":"";?>>12</option>
                                <option value="13" <?=(isset($arrivalDate) && $arrivalDate === "13")?"selected='selected'":"";?>>13</option>
                                <option value="14" <?=(isset($arrivalDate) && $arrivalDate === "14")?"selected='selected'":"";?>>14</option>
                                <option value="15" <?=(isset($arrivalDate) && $arrivalDate === "15")?"selected='selected'":"";?>>15</option>
                                <option value="16" <?=(isset($arrivalDate) && $arrivalDate === "16")?"selected='selected'":"";?>>16</option>
                                <option value="17" <?=(isset($arrivalDate) && $arrivalDate === "17")?"selected='selected'":"";?>>17</option>
                                <option value="18" <?=(isset($arrivalDate) && $arrivalDate === "18")?"selected='selected'":"";?>>18</option>
                                <option value="19" <?=(isset($arrivalDate) && $arrivalDate === "19")?"selected='selected'":"";?>>19</option>
                                <option value="20" <?=(isset($arrivalDate) && $arrivalDate === "20")?"selected='selected'":"";?>>20</option>
                                <option value="21" <?=(isset($arrivalDate) && $arrivalDate === "21")?"selected='selected'":"";?>>21</option>
                                <option value="22" <?=(isset($arrivalDate) && $arrivalDate === "22")?"selected='selected'":"";?>>22</option>
                                <option value="23" <?=(isset($arrivalDate) && $arrivalDate === "23")?"selected='selected'":"";?>>23</option>
                                <option value="24" <?=(isset($arrivalDate) && $arrivalDate === "24")?"selected='selected'":"";?>>24</option>
                                <option value="25" <?=(isset($arrivalDate) && $arrivalDate === "25")?"selected='selected'":"";?>>25</option>
                                <option value="26" <?=(isset($arrivalDate) && $arrivalDate === "26")?"selected='selected'":"";?>>26</option>
                                <option value="27" <?=(isset($arrivalDate) && $arrivalDate === "27")?"selected='selected'":"";?>>27</option>
                                <option value="28" <?=(isset($arrivalDate) && $arrivalDate === "28")?"selected='selected'":"";?>>28</option>
                                <option value="29" <?=(isset($arrivalDate) && $arrivalDate === "29")?"selected='selected'":"";?>>29</option>
                                <option value="30" <?=(isset($arrivalDate) && $arrivalDate === "30")?"selected='selected'":"";?>>30</option>
                                <option value="31" <?=(isset($arrivalDate) && $arrivalDate === "31")?"selected='selected'":"";?>>31</option>
                            </select>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="airline-flight6" name="airline_flight6" placeholder="Flight #"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="class6" placeholder="Flight Class">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="seat6" placeholder="Seat Number">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dpt-time6" name="dpt_time6" placeholder="Departure Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="arr-time6" name="arr_time6" placeholder="Arrival Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="pnr6" placeholder="PNR">
                            </label>
                        </section>
                    </div>
                    <!-- segment 2 end -->
                    <hr />
                    <div class="row">
                        <section class="col col-10"><h3>Travel from Barcelona: Segment 3</h3></section>
                        <input type="text" name="tt_tf7" value="2" hidden>
                        <input type="text" name="segment7" value="7" hidden>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-to7" name="dest_to7" placeholder="To"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-from7" name="dest_from7" placeholder="From"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_month7" id="dateofservice__month7" class="form-control select">
                                <option value="">--Select Month--</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "01")?"selected='selected'":""; ?>value="01">January</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "02")?"selected='selected'":""; ?>value="02">February</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "03")?"selected='selected'":""; ?>value="03">March</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "04")?"selected='selected'":""; ?>value="04">April</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "05")?"selected='selected'":""; ?>value="05">May</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "06")?"selected='selected'":""; ?>value="06">June</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "07")?"selected='selected'":""; ?>value="07">July</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "08")?"selected='selected'":""; ?>value="08">August</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "09")?"selected='selected'":""; ?>value="09">September</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "10")?"selected='selected'":""; ?>value="10">October</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "11")?"selected='selected'":""; ?>value="11">November</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "12")?"selected='selected'":""; ?>value="12">December</option>
                            </select>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_date7" id="dateofservice__date7" class="form-control select">
                                <option value="">--Select Date--</option>
                                <option value="01" <?=(isset($arrivalDate) && $arrivalDate === "01")?"selected='selected'":"";?>>01</option>
                                <option value="02" <?=(isset($arrivalDate) && $arrivalDate === "02")?"selected='selected'":"";?>>02</option>
                                <option value="03" <?=(isset($arrivalDate) && $arrivalDate === "03")?"selected='selected'":"";?>>03</option>
                                <option value="04" <?=(isset($arrivalDate) && $arrivalDate === "04")?"selected='selected'":"";?>>04</option>
                                <option value="05" <?=(isset($arrivalDate) && $arrivalDate === "05")?"selected='selected'":"";?>>05</option>
                                <option value="06" <?=(isset($arrivalDate) && $arrivalDate === "06")?"selected='selected'":"";?>>06</option>
                                <option value="07" <?=(isset($arrivalDate) && $arrivalDate === "07")?"selected='selected'":"";?>>07</option>
                                <option value="08" <?=(isset($arrivalDate) && $arrivalDate === "08")?"selected='selected'":"";?>>08</option>
                                <option value="09" <?=(isset($arrivalDate) && $arrivalDate === "09")?"selected='selected'":"";?>>09</option>
                                <option value="10" <?=(isset($arrivalDate) && $arrivalDate === "10")?"selected='selected'":"";?>>10</option>
                                <option value="11" <?=(isset($arrivalDate) && $arrivalDate === "11")?"selected='selected'":"";?>>11</option>
                                <option value="12" <?=(isset($arrivalDate) && $arrivalDate === "12")?"selected='selected'":"";?>>12</option>
                                <option value="13" <?=(isset($arrivalDate) && $arrivalDate === "13")?"selected='selected'":"";?>>13</option>
                                <option value="14" <?=(isset($arrivalDate) && $arrivalDate === "14")?"selected='selected'":"";?>>14</option>
                                <option value="15" <?=(isset($arrivalDate) && $arrivalDate === "15")?"selected='selected'":"";?>>15</option>
                                <option value="16" <?=(isset($arrivalDate) && $arrivalDate === "16")?"selected='selected'":"";?>>16</option>
                                <option value="17" <?=(isset($arrivalDate) && $arrivalDate === "17")?"selected='selected'":"";?>>17</option>
                                <option value="18" <?=(isset($arrivalDate) && $arrivalDate === "18")?"selected='selected'":"";?>>18</option>
                                <option value="19" <?=(isset($arrivalDate) && $arrivalDate === "19")?"selected='selected'":"";?>>19</option>
                                <option value="20" <?=(isset($arrivalDate) && $arrivalDate === "20")?"selected='selected'":"";?>>20</option>
                                <option value="21" <?=(isset($arrivalDate) && $arrivalDate === "21")?"selected='selected'":"";?>>21</option>
                                <option value="22" <?=(isset($arrivalDate) && $arrivalDate === "22")?"selected='selected'":"";?>>22</option>
                                <option value="23" <?=(isset($arrivalDate) && $arrivalDate === "23")?"selected='selected'":"";?>>23</option>
                                <option value="24" <?=(isset($arrivalDate) && $arrivalDate === "24")?"selected='selected'":"";?>>24</option>
                                <option value="25" <?=(isset($arrivalDate) && $arrivalDate === "25")?"selected='selected'":"";?>>25</option>
                                <option value="26" <?=(isset($arrivalDate) && $arrivalDate === "26")?"selected='selected'":"";?>>26</option>
                                <option value="27" <?=(isset($arrivalDate) && $arrivalDate === "27")?"selected='selected'":"";?>>27</option>
                                <option value="28" <?=(isset($arrivalDate) && $arrivalDate === "28")?"selected='selected'":"";?>>28</option>
                                <option value="29" <?=(isset($arrivalDate) && $arrivalDate === "29")?"selected='selected'":"";?>>29</option>
                                <option value="30" <?=(isset($arrivalDate) && $arrivalDate === "30")?"selected='selected'":"";?>>30</option>
                                <option value="31" <?=(isset($arrivalDate) && $arrivalDate === "31")?"selected='selected'":"";?>>31</option>
                            </select>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="airline-flight7" name="airline_flight7" placeholder="Flight #"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="class7" placeholder="Flight Class">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="seat7" placeholder="Seat Number">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dpt-time7" name="dpt_time7" placeholder="Departure Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="arr-time7" name="arr_time7" placeholder="Arrival Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="pnr7" placeholder="PNR">
                            </label>
                        </section>
                    </div>
                    <!-- segment 3 end -->
                    <hr />
                    <div class="row">
                        <section class="col col-10"><h3>Travel from Barcelona: Segment 4</h3></section>
                        <input type="text" name="tt_tf8" value="2" hidden>
                        <input type="text" name="segment8" value="8" hidden>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-to8" name="dest_to8" placeholder="To"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dest-from8" name="dest_from8" placeholder="From"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_month8" id="dateofservice__month8" class="form-control select">
                                <option value="">--Select Month--</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "01")?"selected='selected'":""; ?>value="01">January</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "02")?"selected='selected'":""; ?>value="02">February</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "03")?"selected='selected'":""; ?>value="03">March</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "04")?"selected='selected'":""; ?>value="04">April</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "05")?"selected='selected'":""; ?>value="05">May</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "06")?"selected='selected'":""; ?>value="06">June</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "07")?"selected='selected'":""; ?>value="07">July</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "08")?"selected='selected'":""; ?>value="08">August</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "09")?"selected='selected'":""; ?>value="09">September</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "10")?"selected='selected'":""; ?>value="10">October</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "11")?"selected='selected'":""; ?>value="11">November</option>
                                <option <?= (isset($arrivalMonth) && $arrivalMonth === "12")?"selected='selected'":""; ?>value="12">December</option>
                            </select>
                        </section>
                        <section class="col col-2">
                            <select name="dateofservice_date8" id="dateofservice__date8" class="form-control select">
                                <option value="">--Select Date--</option>
                                <option value="01" <?=(isset($arrivalDate) && $arrivalDate === "01")?"selected='selected'":"";?>>01</option>
                                <option value="02" <?=(isset($arrivalDate) && $arrivalDate === "02")?"selected='selected'":"";?>>02</option>
                                <option value="03" <?=(isset($arrivalDate) && $arrivalDate === "03")?"selected='selected'":"";?>>03</option>
                                <option value="04" <?=(isset($arrivalDate) && $arrivalDate === "04")?"selected='selected'":"";?>>04</option>
                                <option value="05" <?=(isset($arrivalDate) && $arrivalDate === "05")?"selected='selected'":"";?>>05</option>
                                <option value="06" <?=(isset($arrivalDate) && $arrivalDate === "06")?"selected='selected'":"";?>>06</option>
                                <option value="07" <?=(isset($arrivalDate) && $arrivalDate === "07")?"selected='selected'":"";?>>07</option>
                                <option value="08" <?=(isset($arrivalDate) && $arrivalDate === "08")?"selected='selected'":"";?>>08</option>
                                <option value="09" <?=(isset($arrivalDate) && $arrivalDate === "09")?"selected='selected'":"";?>>09</option>
                                <option value="10" <?=(isset($arrivalDate) && $arrivalDate === "10")?"selected='selected'":"";?>>10</option>
                                <option value="11" <?=(isset($arrivalDate) && $arrivalDate === "11")?"selected='selected'":"";?>>11</option>
                                <option value="12" <?=(isset($arrivalDate) && $arrivalDate === "12")?"selected='selected'":"";?>>12</option>
                                <option value="13" <?=(isset($arrivalDate) && $arrivalDate === "13")?"selected='selected'":"";?>>13</option>
                                <option value="14" <?=(isset($arrivalDate) && $arrivalDate === "14")?"selected='selected'":"";?>>14</option>
                                <option value="15" <?=(isset($arrivalDate) && $arrivalDate === "15")?"selected='selected'":"";?>>15</option>
                                <option value="16" <?=(isset($arrivalDate) && $arrivalDate === "16")?"selected='selected'":"";?>>16</option>
                                <option value="17" <?=(isset($arrivalDate) && $arrivalDate === "17")?"selected='selected'":"";?>>17</option>
                                <option value="18" <?=(isset($arrivalDate) && $arrivalDate === "18")?"selected='selected'":"";?>>18</option>
                                <option value="19" <?=(isset($arrivalDate) && $arrivalDate === "19")?"selected='selected'":"";?>>19</option>
                                <option value="20" <?=(isset($arrivalDate) && $arrivalDate === "20")?"selected='selected'":"";?>>20</option>
                                <option value="21" <?=(isset($arrivalDate) && $arrivalDate === "21")?"selected='selected'":"";?>>21</option>
                                <option value="22" <?=(isset($arrivalDate) && $arrivalDate === "22")?"selected='selected'":"";?>>22</option>
                                <option value="23" <?=(isset($arrivalDate) && $arrivalDate === "23")?"selected='selected'":"";?>>23</option>
                                <option value="24" <?=(isset($arrivalDate) && $arrivalDate === "24")?"selected='selected'":"";?>>24</option>
                                <option value="25" <?=(isset($arrivalDate) && $arrivalDate === "25")?"selected='selected'":"";?>>25</option>
                                <option value="26" <?=(isset($arrivalDate) && $arrivalDate === "26")?"selected='selected'":"";?>>26</option>
                                <option value="27" <?=(isset($arrivalDate) && $arrivalDate === "27")?"selected='selected'":"";?>>27</option>
                                <option value="28" <?=(isset($arrivalDate) && $arrivalDate === "28")?"selected='selected'":"";?>>28</option>
                                <option value="29" <?=(isset($arrivalDate) && $arrivalDate === "29")?"selected='selected'":"";?>>29</option>
                                <option value="30" <?=(isset($arrivalDate) && $arrivalDate === "30")?"selected='selected'":"";?>>30</option>
                                <option value="31" <?=(isset($arrivalDate) && $arrivalDate === "31")?"selected='selected'":"";?>>31</option>
                            </select>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="airline-flight8" name="airline_flight8" placeholder="Flight #"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="class8" placeholder="Flight Class">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="seat8" placeholder="Seat Number">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="dpt-time8" name="dpt_time8" placeholder="Departure Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" id="arr-time8" name="arr_time8" placeholder="Arrival Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" name="pnr8" placeholder="PNR">
                            </label>
                        </section>
                    </div>
                    <!-- segment 4 end -->
                    <footer>
                        <section class="col col-4">
                            <label class="checkbox">
                                <input type="checkbox" name="duplicate_guest">
                                <i></i>Duplicate for companion?</label>
                        </section>
                        <button class="button" id="addflight" name="addflight" type="submit">Submit<span><i class="icon-ok"></i></span></button>
                        <a href="<?=base_url()?>admin/flights/info/<?=$regID?>" class="button button-secondary">Back to Flights & Accommodation</a> </footer>
                </form>
            </div>
        </div>

    </div>

</div>

<!-- End Content/-->