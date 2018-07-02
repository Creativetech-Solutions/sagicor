<?php



//First Get the Data.

$regID = isset($page_data['registration'])?$page_data['registration']->id:'';

$regNo = isset($page_data['registration'])?$page_data['registration']->reg_id:'';

$title = isset($page_data['registration'])?$page_data['registration']->title:'';

$first_name = isset($page_data['registration'])?$page_data['registration']->first_name:'';

$last_name = isset($page_data['registration'])?$page_data['registration']->last_name:'';

$room_number = isset($page_data['registration'])?$page_data['registration']->room_number:'';

$pnr = isset($page_data['registration'])?$page_data['registration']->pnr:'';

$guest_of = isset($page_data['registration'])?$page_data['registration']->guest_of:'';



//Arrival DateTime and Flight

$arrival_date_dest = isset($page_data['registration'])?$page_data['registration']->arrival_date_dest:'';

$arrival_flight_dest = isset($page_data['registration'])?$page_data['registration']->arrival_flight_dest:'';

$arrival_time_dest = isset($page_data['registration'])?$page_data['registration']->arrival_time_dest:'';



//Departure DateTime and Flight

$depart_date_dest = isset($page_data['registration'])?$page_data['registration']->depart_date_dest:'';

$depart_flight_dest = isset($page_data['registration'])?$page_data['registration']->depart_flight_dest:'';

$depart_time_dest = isset($page_data['registration'])?$page_data['registration']->depart_time_dest:'';



if(!empty($arrival_date_dest)){

    $arrivalDate = explode('-',$arrival_date_dest);

    $arrivalMonth = $arrivalDate[0];

    $arrivalDate = $arrivalDate[1];

}



?>



<div class="wrap clearfix">



    <div id="content-wrap">



        <div id="content">



            <div id="msgholder"></div>



            <br>

            <div id="fullform">

                <p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i> Please fill out accommodation details and add flight information.<br>

                    &nbsp;</p>

                <form action="<?=base_url()?>admin/flights/process_info" method="post" id="flight_info_form" class="xform">

                    <header><?=$title.' '.$first_name.' '.$last_name;?><span>Accommodation Details</span></header>

                    <input type="text" hidden="" value="<?=$regID?>" name="regID">

                    <div class="row">

                        <label class="input">Arrival Date</label>

                        <section class="col col-2">



                            <select name="arrival_month" id="arrival_month" class="form-control select">

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

                            <select name="arrival_date" id="arrival_date" class="form-control select">

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

                                <input type="text" value="<?=$arrival_flight_dest?>" placeholder="Arrival Flight" name="arr_flight" id="arr-flight" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;"><i class="icon-append icon-plane"></i>

                            </label>

                        </section>



                        <section class="col col-4">

                            <label class="input">

                                <input type="text" value="<?=$arrival_time_dest?>" placeholder="Arrival Time" name="arr_time" id="arr-time"><i class="icon-append icon-time"></i>

                            </label>

                        </section>

                    </div>

                    <div class="row">



                        <section class="col col-4">

                            <label class="input">

                                <input type="text" value="<?=$pnr?>" placeholder="PNR" name="pnr">

                            </label>

                        </section>

                        <section class="col col-4">

                            <label class="input">

                                <input type="text" value="<?=$room_number?>" placeholder="Room Number" name="room_number"><i class="icon-append icon-building"></i>

                            </label>

                        </section>

                        <?php



                        if($guest_of === '0'){

                            ?>

                            <section class="col col-4">

                                <label class="checkbox">

                                    <input type="checkbox" name="duplicate_guest">

                                    <i></i>Duplicate for companion?</label>

                            </section>

                        <?php

                        }

                        ?>



                    </div>

                    <footer>

                        <button type="submit" name="update" id="update" class="button">Submit<span><i class="icon-ok"></i></span></button>

                        <a class="button button-secondary" href="<?=base_url()?>admin/flights">Back to listing</a> </footer>

                </form>

            </div>

            <section class="widget">

                <header>

                    <div class="row">

                        <h1><i class="icon-reorder"></i> Flights Details <button hidden="">Export report</button></h1>

                        <aside> <a href="<?=base_url()?>admin/flights/add_flight/<?=$regID?>" data-hint="Add Flight" class="hint--left hint--add hint--always hint--rounded"><span class="icon-plus"></span></a> </aside>

                    </div>

                </header>

                <div hidden=""><span style="text-align: center; margin-top: 10px;" class="col col-12">No flight details found!</span></div>

                <div class="content2">



                    <table id="flightsList" class="myTable" style="display: table; width:99%;">

                        <thead>

                        <tr>

                            <th width="header" class="left header">Seg.</th>

                            <th class="header">TT/TF</th>

                            <th class="header">To</th>

                            <th class="header">From</th>

                            <th class="header">Date</th>

                            <th class="header">Flight#</th>



                            <th class="header">Class</th>



                            <th class="header">Seat</th>



                            <th class="header">Depart Time</th>



                            <th class="header">Arrival Time</th>



                            <th class="header">Action</th>

                        </tr>

                        </thead>

                        <tbody>

                      </tbody>

                    </table>

                </div>

            </section>

        </div>



    </div>



</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/DataTables/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/customScripting.js"></script>

<script type="text/javascript">

    $(function () {

        //// Need To Work ON New Way Of DataTables..

        oTable ="";

        //Initialize Select2 Elements

        var flightsListTable = $("#flightsList");

        var url_DT = "<?=base_url();?>admin/flights/list_flights/<?=$regID?>";

        var aoColumns_DT = [

            /* User ID */ {

                "mData": "SEG",

                "bVisible": true,

                "bSortable": true,

                "bSearchable": true

            },

            /* Username  */ {

                "mData" : "TT_TF"

            },

            /* Full Name */ {

                "mData" : "To"

            },

            /* User Status */ {

                "mData" : "From"

            },

            /*  User Level */ {

                "mData" : "Date"

            },

            /* Last User Login */ {

                "mData": "Flight"

            },

            /* Last User Login */ {

                "mData": "Class"

            },

            /* Last User Login */ {

                "mData": "Seat"

            },

            /* Last User Login */ {

                "mData": "DepartTime"

            },

            /* Last User Login */ {

                "mData": "ArrivalTime"

            },

            {

                "mData": "actionButtons"

            }

        ];

        var HiddenColumnID_DT = "ID";

        var sDom_DT = '<"H"r>t<"F"<"row"<"col-lg-6 col-xs-12" i> <"col-lg-6 col-xs-12" p>>>';

        commonDataTables(flightsListTable,url_DT,aoColumns_DT,sDom_DT,HiddenColumnID_DT);



        //Code for search box

        $("#search-input").on("keyup",function (e) {

            oTable.fnFilter( $(this).val());

        });

    });

</script>