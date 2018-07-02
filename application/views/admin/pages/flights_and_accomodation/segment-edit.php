<?php
$previousUrl = (isset($page_data['regID']) && !empty($page_data['regID']))?base_url().'admin/flights/info/'.$page_data['regID']:base_url().'admin/flights/';
$To = (isset($page_data['editViewData']) && !empty($page_data['editViewData']->To))?$page_data['editViewData']->To:'';
$From = (isset($page_data['editViewData']) && !empty($page_data['editViewData']->To))?$page_data['editViewData']->From:'';
$Date = (isset($page_data['editViewData']) && !empty($page_data['editViewData']->To))?$page_data['editViewData']->Date:'';
$Flight = (isset($page_data['editViewData']) && !empty($page_data['editViewData']->To))?$page_data['editViewData']->Flight:'';
$Seat = (isset($page_data['editViewData']) && !empty($page_data['editViewData']->To))?$page_data['editViewData']->Seat:'';
$Class = (isset($page_data['editViewData']) && !empty($page_data['editViewData']->To))?$page_data['editViewData']->Class:'';
$DepartTime = (isset($page_data['editViewData']) && !empty($page_data['editViewData']->To))?$page_data['editViewData']->DepartTime:'';
$ArrivalTime = (isset($page_data['editViewData']) && !empty($page_data['editViewData']->To))?$page_data['editViewData']->ArrivalTime:'';
$TravelID = (isset($page_data['editViewData']) && !empty($page_data['editViewData']->To))?$page_data['editViewData']->TravelID:'';
$RegNo = (isset($page_data['editViewData']) && !empty($page_data['editViewData']->To))?$page_data['editViewData']->RegNo:'';
$tt_tf = (isset($page_data['editViewData']) && !empty($page_data['editViewData']->To))?$page_data['editViewData']->tt_tf:'';
$segment = (isset($page_data['editViewData']) && !empty($page_data['editViewData']->To))?$page_data['editViewData']->segment:'';

$Title = (isset($page_data['editViewData']) && !empty($page_data['editViewData']->To))?$page_data['editViewData']->Title:'';
$FirstName = (isset($page_data['editViewData']) && !empty($page_data['editViewData']->To))?$page_data['editViewData']->FirstName:'';
$LastName = (isset($page_data['editViewData']) && !empty($page_data['editViewData']->To))?$page_data['editViewData']->LastName:'';

if ($tt_tf <= 3){
    $seg_title = 'to';
} else {
    $seg_title = 'from';
}

//Get month and date from Date Variable

if(!empty($Date)){
    $explodedDate = explode('-',$Date);
    $arrivalMonth = $explodedDate[0];
    $arrivalDate = $explodedDate[1];
}

?>
<div class="wrap clearfix">
    <div id="content-wrap">
        <div id="content">
            <div id="msgholder"></div>
            <br>
            <div id="fullform">

                <p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i> Please fill out flight information.<br>

                    &nbsp;</p>

                <form action="<?=base_url()?>admin/flights/update_segment" method="post" id="flight_info_form" class="xform">

                    <header><?=$Title.' '.$FirstName.' '.$LastName?> <span>Flight Details</span></header>

                    <div class="row">
                        <section class="col col-10"><h3>Travel <?=$seg_title?> Vegas: Segment <?=$segment?></h3></section>
                        <input type="text" hidden="" value="<?=$TravelID?>" name="travelID">
                        <input type="text" hidden="" value="<?=$RegNo?>" name="regno">
                        <section class="col col-4">
                            <label class="input">
                                <input type="text" value="<?=$To?>" placeholder="To" name="dest_to1" id="dest-to1"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" value="<?=$From?>" placeholder="From" name="dest_from1" id="dest-from1"><i class="icon-append icon-plane"></i>
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
                                <input type="text" value="<?=$Flight?>" placeholder="Flight #" name="airline_flight1" id="airline-fligh1t"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" value="<?=$Class?>" placeholder="Flight Class" name="class1">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" value="<?=$Seat?>" placeholder="Seat Number" name="seat1">
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" value="<?=$DepartTime?>" name="dpt_time1" id="dpt-time1" placeholder="Departure TIme"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                        <section class="col col-4">
                            <label class="input">
                                <input type="text" value="<?=$ArrivalTime?>" name="arr_time1" id="arr-time1" placeholder="Arrival Time"><i class="icon-append icon-plane"></i>
                            </label>
                        </section>

                    </div>
                    <!-- segment 1 end -->
                    <footer>

                        <button type="submit" name="updateflight" id="updateflight" class="button">Submit<span><i class="icon-ok"></i></span></button>
                        <a class="button button-secondary" href="<?=$previousUrl?>">Back to Flights &amp; Accommodation</a> </footer>

                </form>

            </div>
        </div>

    </div>

</div>