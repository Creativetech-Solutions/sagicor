<?php
$tableData = $page_data['UsersRegList'];
echo '<div class="hidden" style="display:none"><pre>';
print_r($page_data);
echo '</pre></div>';
//var_dump($page_data['checkBoxesColumns']);

if(isset($page_data['checkBoxesColumns']) && !empty($page_data['checkBoxesColumns']) && is_array($page_data['checkBoxesColumns'])){
    foreach($page_data['checkBoxesColumns'] as $key => $array){
        if($array->Column === 'regID'){
            $CheckBox_regID = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'winnerCompanion'){
            $CheckBox_winnerCompanion = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'club'){
            $CheckBox_club = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'title'){
            $CheckBox_title = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'firstName'){
            $CheckBox_firstName = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'lastName'){
            $CheckBox_lastName = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'dateOfBirth'){
            $CheckBox_dateOfBirth = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'badgeFirstName'){
            $CheckBox_badgeFirstName = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'badgeLastName'){
            $CheckBox_badgeLastName = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'gender'){
            $CheckBox_gender = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'shirtSize'){
            $CheckBox_shirtSize = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'birth_country'){
            $CheckBox_birth_country = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'homeTel'){
            $CheckBox_homeTel = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'workTel'){
            $CheckBox_workTel = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'workCell'){
            $CheckBox_workCell = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'email'){
            $CheckBox_email = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'altEmail'){
            $CheckBox_altEmail = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'st1Address'){
            $CheckBox_st1Address = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'st2Address'){
            $CheckBox_st2Address = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'city'){
            $CheckBox_city = ($array->visible === '1')?'checked="checked"':'';
        }
       /* if($array->Column === 'state'){
            $CheckBox_state = ($array->visible === '1')?'checked="checked"':'';
        }*/
        if($array->Column === 'zip'){
            $CheckBox_zip = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'country'){
            $CheckBox_country = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'freqFlyer'){
            $CheckBox_freqFlyer = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'freqFlyerNum'){
            $CheckBox_freqFlyerNum = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'fAirLine'){
            $CheckBox_fAirLine = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'otherFAirLine'){
            $CheckBox_otherFAirLine = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'freqFlyerNum2'){
            $CheckBox_freqFlyerNum2 = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'fAirLine2'){
            $CheckBox_fAirLine2 = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'otherFAirLine2'){
            $CheckBox_otherFAirLine2 = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'multipleFF'){
            $CheckBox_multipleFF = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'seatingPref'){
            $CheckBox_seatingPref = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'bagsNum'){
            $CheckBox_bagsNum = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'airNotes'){
            $CheckBox_airNotes = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'airNotesReturn'){
            $CheckBox_airNotesReturn = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'bedConfiguration'){
            $CheckBox_bedConfiguration = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'airPortNum'){
            $CheckBox_airPortNum = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'homeCityDpt'){
            $CheckBox_homeCityDpt = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'return'){
            $CheckBox_return = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'desiredDptDate'){
            $desiredDptDate = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'desiredRetDate'){
            $desiredRetDate = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'passportNum'){
            $CheckBox_passportNum = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'passportCitizen'){
            $CheckBox_passportCitizen = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'passportIssueCity'){
            $CheckBox_passportIssueCity = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'passportIssueDate'){
            $CheckBox_passportIssueDate = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'passportExpDate'){
            $CheckBox_passportExpDate = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'validUS'){
            $CheckBox_validUS = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'ableUS'){
            $CheckBox_ableUS = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'visaType'){
            $visaType = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'visaExpDate'){
            $visaExpDate = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'emergencyName'){
            $CheckBox_emergencyName = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'emergencyHome'){
            $CheckBox_emergencyHome = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'emergencyWork'){
            $CheckBox_emergencyWork = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'emergencyCell'){
            $CheckBox_emergencyCell = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'DrName'){
            $CheckBox_DrName = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'DrDay'){
            $CheckBox_DrDay = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'DrAlt'){
            $CheckBox_DrAlt = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'medConditions'){
            $CheckBox_medConditions = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'presMedication'){
            $CheckBox_presMedication = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'medFoods'){
            $CheckBox_medFoods = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'RelFoods'){
            $CheckBox_RelFoods = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'Diabetic'){
            $CheckBox_Diabetic = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'Hypertension'){
            $CheckBox_Hypertension = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'Vegetarian'){
            $CheckBox_Vegetarian = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'VegFish'){
            $CheckBox_VegFish = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'VegChicken'){
            $CheckBox_VegChicken = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'Lactose'){
            $CheckBox_Lactose = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'ccType'){
            $CheckBox_ccType = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'cardName'){
            $CheckBox_cardName = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'cardNum'){
            $CheckBox_cardNum = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'cardExp'){
            $CheckBox_cardExp = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'cvv'){
            $CheckBox_cvv = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'ccSt1'){
            $CheckBox_ccSt1 = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'ccSt2'){
            $CheckBox_ccSt2 = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'ccCity'){
            $CheckBox_ccCity = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'ccState'){
            $CheckBox_ccState = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'ccZip'){
            $CheckBox_ccZip = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'ccCountry'){
            $CheckBox_ccCountry = ($array->visible === '1')?'checked="checked"':'';
        }

        if($array->Column === 'choice1'){
            $CheckBox_choice1 = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'choice2'){
            $CheckBox_choice2 = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'choice3'){
            $CheckBox_choice3 = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'specialOccasion'){
            $CheckBox_specialOccasion = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'occasionDate'){
            $CheckBox_occasionDate = ($array->visible === '1')?'checked="checked"':'';
        }
        if($array->Column === 'spouceActivity'){
            $CheckBox_spouceActivity = ($array->visible === '1')?'checked="checked"':'';
        }

        // added by AD 

        if($array->Column === 'arrivalFlight')
            $CheckBox_arrFlight = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'arrivalTime')
            $CheckBox_arrTime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'pnr')
            $CheckBox_pnr = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'roomNumber')
            $CheckBox_roomNo = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_1_To')
            $CheckBox_arrSeg1To = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_1_From')
            $CheckBox_arrSeg1From = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_1_Flight_No')
            $CheckBox_arrSeg1Flight = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_1_Date')
            $CheckBox_arrSeg1Date = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_1_Class')
            $CheckBox_arrSeg1Class = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_1_Dept_Time')
            $CheckBox_arrSeg1Deptime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_1_Arr_Time')
            $CheckBox_arrSeg1Arrtime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_1_Seat_No')
            $CheckBox_arrSeg1Seat = ($array->visible === '1')?'checked="checked"':'';

        
        if($array->Column === 'Arr_Segment_2_To')
            $CheckBox_arrSeg2To = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_2_From')
            $CheckBox_arrSeg2From = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_2_Flight_No')
            $CheckBox_arrSeg2Flight = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_2_Date')
            $CheckBox_arrSeg2Date = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_2_Class')
            $CheckBox_arrSeg2Class = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_2_Dept_Time')
            $CheckBox_arrSeg2Deptime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_2_Arr_Time')
            $CheckBox_arrSeg2Arrtime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_2_Seat_No')
            $CheckBox_arrSeg2Seat = ($array->visible === '1')?'checked="checked"':'';

        
        if($array->Column === 'Arr_Segment_3_To')
            $CheckBox_arrSeg3To = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_3_From')
            $CheckBox_arrSeg3From = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_3_Flight_No')
            $CheckBox_arrSeg3Flight = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_3_Date')
            $CheckBox_arrSeg3Date = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_3_Class')
            $CheckBox_arrSeg3Class = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_3_Dept_Time')
            $CheckBox_arrSeg3Deptime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_3_Arr_Time')
            $CheckBox_arrSeg3Arrtime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_3_Seat_No')
            $CheckBox_arrSeg3Seat = ($array->visible === '1')?'checked="checked"':'';

        
        if($array->Column === 'Arr_Segment_4_To')
            $CheckBox_arrSeg4To = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_4_From')
            $CheckBox_arrSeg4From = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_4_Flight_No')
            $CheckBox_arrSeg4Flight = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_4_Date')
            $CheckBox_arrSeg4Date = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_4_Class')
            $CheckBox_arrSeg4Class = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_4_Dept_Time')
            $CheckBox_arrSeg4Deptime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_4_Arr_Time')
            $CheckBox_arrSeg4Arrtime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Arr_Segment_4_Seat_No')
            $CheckBox_arrSeg4Seat = ($array->visible === '1')?'checked="checked"':'';

        
        if($array->Column === 'Dpt_Segment_1_To')
            $CheckBox_dptSeg1To = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_1_From')
            $CheckBox_dptSeg1From = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_1_Flight_No')
            $CheckBox_dptSeg1Flight = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_1_Date')
            $CheckBox_dptSeg1Date = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_1_Class')
            $CheckBox_dptSeg1Class = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_1_Dept_Time')
            $CheckBox_dptSeg1Deptime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_1_Arr_Time')
            $CheckBox_dptSeg1Arrtime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_1_Seat_No')
            $CheckBox_dptSeg1Seat = ($array->visible === '1')?'checked="checked"':'';

        
        if($array->Column === 'Dpt_Segment_2_To')
            $CheckBox_dptSeg2To = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_2_From')
            $CheckBox_dptSeg2From = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_2_Flight_No')
            $CheckBox_dptSeg2Flight = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_2_Date')
            $CheckBox_dptSeg2Date = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_2_Class')
            $CheckBox_dptSeg2Class = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_2_Dept_Time')
            $CheckBox_dptSeg2Deptime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_2_Arr_Time')
            $CheckBox_dptSeg2Arrtime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_2_Seat_No')
            $CheckBox_dptSeg2Seat = ($array->visible === '1')?'checked="checked"':'';

        
        if($array->Column === 'Dpt_Segment_3_To')
            $CheckBox_dptSeg3To = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_3_From')
            $CheckBox_dptSeg3From = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_3_Flight_No')
            $CheckBox_dptSeg3Flight = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_3_Date')
            $CheckBox_dptSeg3Date = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_3_Class')
            $CheckBox_dptSeg3Class = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_3_Dept_Time')
            $CheckBox_dptSeg3Deptime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_3_Arr_Time')
            $CheckBox_dptSeg3Arrtime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_3_Seat_No')
            $CheckBox_dptSeg3Seat = ($array->visible === '1')?'checked="checked"':'';

        
        if($array->Column === 'Dpt_Segment_4_To')
            $CheckBox_dptSeg4To = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_4_From')
            $CheckBox_dptSeg4From = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_4_Flight_No')
            $CheckBox_dptSeg4Flight = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_4_Date')
            $CheckBox_dptSeg4Date = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_4_Class')
            $CheckBox_dptSeg4Class = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_4_Dept_Time')
            $CheckBox_dptSeg4Deptime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_4_Arr_Time')
            $CheckBox_dptSeg4Arrtime = ($array->visible === '1')?'checked="checked"':'';
        
        if($array->Column === 'Dpt_Segment_4_Seat_No')
            $CheckBox_dptSeg4Seat = ($array->visible === '1')?'checked="checked"':'';
        
    }
}

?>

<script language="javascript">



    // Set the default "show" mode to that specified by W3C DOM

    // compliant browsers



    var showMode = 'table-cell';



    // However, IE5 at least does not render table cells correctly

    // using the style 'table-cell', but does when the style 'block'

    // is used, so handle this



    if (document.all) showMode='block';



    // This is the function that actually does the manipulation



    function toggleVis(btn){



        // First isolate the checkbox by name using the

        // name of the form and the name of the checkbox



        btn   = document.forms['tcol'].elements[btn];



        // Next find all the table cells by using the DOM function

        // getElementsByName passing in the constructed name of

        // the cells, derived from the checkbox name



        cells = document.getElementsByName('t'+btn.name);



        // Once the cells and checkbox object has been retrieved

        // the show hide choice is simply whether the checkbox is

        // checked or clear



        mode = btn.checked ? showMode : 'none';



        // Apply the style to the CSS display property for the cells



        for(j = 0; j < cells.length; j++) cells[j].style.display = mode;

    }



</script>

<style>

    .dropdown-check-list .anchor {

        position: relative;

        cursor: pointer;

        display: inline-block;

        padding: 5px 50px 5px 10px;

        border: 1px solid #ccc;

    }

    .dropdown-check-list .anchor:after {

        position: absolute;

        content: "";

        border-left: 2px solid black;

        border-top: 2px solid black;

        padding: 5px;

        right: 10px;

        top: 20%;

        -moz-transform: rotate(-135deg);

        -ms-transform: rotate(-135deg);

        -o-transform: rotate(-135deg);

        -webkit-transform: rotate(-135deg);

        transform: rotate(-135deg);

    }

    .dropdown-check-list .anchor:active:after {

        right: 8px;

        top: 21%;

    }
</style>

<style type="text/css">
    input[type="checkbox"] {
        width: 20px;
        margin: 0px;
    }
    .checkboxGroupHead {
        color:purple;
        font-weight: bold;
        display: block;
        font-size: 16px;
/*        margin: 15px;
        margin-bottom: 0px;*/
        margin:30px 15px 5px 0px;
    }
    .checkBoxGroupDiv > ul {
        margin-left:15px;
    }
</style>

<p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i>You can export Registration reports by clicking on the <strong>Export</strong> button <br />&nbsp;</p>



<section class="widget">
    <header>
        <div class="row">
            <h1><i class="icon-reorder"></i> Registration Reports - <button id="exportReport">Export report</button><button id="saveAsDefault">Save as Default Checks</button></h1>
        </div>
    </header>

    <div class="content2" style="margin-left: 20px">

        <br />

        <form name="tcol" onsubmit="return false">

            <div id="list1" class="dropdown-check-list" tabindex="100">

                <span class="anchor"><h3>Click to toggle columns</h3></span>

                <table id="checkBoxesList">
                    <tr>
                        <td style="width:33%; vertical-align: top">
                            <div id="personalInformation" class="checkBoxGroupDiv" style="display: inline-block;">
                                <span class="checkboxGroupHead">PERSONAL INFORMATION</span>
                                <input class="selectAll" id="personalInformationCheckAll" type="checkbox" name="selectAllPersonalInfo" onclick="toggleVis(this.name)" >
                                <label for="personalInformationCheckAll">Select All</label>
                                <ul class="items">
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_regID)?$CheckBox_regID:""?> id="regID" name="regID" onclick="toggleVis(this.name)">
                                        <label for="regID">Reg ID</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_winnerCompanion)?$CheckBox_winnerCompanion:""?> id="winnerCompanion" name="winnerCompanion" onclick="toggleVis(this.name)">
                                        <label for="winnerCompanion">Winner/Companion</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_club)?$CheckBox_club:""?> id="club" name="club" onclick="toggleVis(this.name)">
                                        <label for="club">Pres Club/PaceS</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_title)?$CheckBox_title:""?> id="titleChk" name="title" onclick="toggleVis(this.name)">
                                        <label for="titleChk">Title</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_firstName)?$CheckBox_firstName:""?> id="fName" name="firstName" onclick="toggleVis(this.name)">
                                        <label for="fName">First Name</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_lastName)?$CheckBox_lastName:""?> id="lName" name="lastName" onclick="toggleVis(this.name)" >
                                        <label for="lName">Last Name</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_dateOfBirth)?$CheckBox_dateOfBirth:""?> id="birthDate" name="dateOfBirth" onclick="toggleVis(this.name)" >
                                        <label for="birthDate">D.O.B</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_badgeFirstName)?$CheckBox_badgeFirstName:""?> id="badgeFirstName" name="badgeFirstName" onclick="toggleVis(this.name)" >
                                        <label for="badgeFirstName">Badge:First Name</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_badgeLastName)?$CheckBox_badgeLastName:""?> id="badgeLastName" name="badgeLastName" onclick="toggleVis(this.name)" >
                                        <label for="badgeLastName">Badge:Last Name</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_gender)?$CheckBox_gender:""?> id="genderChk" name="gender" onclick="toggleVis(this.name)" >
                                        <label for="genderChk">Gender</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_shirtSize)?$CheckBox_shirtSize:""?> id="shirtSize" name="shirtSize" onclick="toggleVis(this.name)" >
                                        <label for="shirtSize">Shirt Size</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_birth_country)?$CheckBox_birth_country:""?> id="birth_country" name="birth_country" onclick="toggleVis(this.name)">
                                        <label for="birth_country">Birth Country</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_homeTel)?$CheckBox_homeTel:""?> id="homeTel" name="homeTel" onclick="toggleVis(this.name)">
                                        <label for="homeTel">Home Tel</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_workTel)?$CheckBox_workTel:""?> id="workTel" name="workTel" onclick="toggleVis(this.name)">
                                        <label for="workTel">Work Tel</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_workCell)?$CheckBox_workCell:""?> id="workCell" name="workCell" onclick="toggleVis(this.name)">
                                        <label for="workCell">Cell#</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_email)?$CheckBox_email:""?> id="emailChk" name="email" onclick="toggleVis(this.name)" >
                                        <label for="emailChk">Email</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_altEmail)?$CheckBox_altEmail:""?> id="altEmailChk" name="altEmail" onclick="toggleVis(this.name)" >
                                        <label for="altEmailChk">Alt Email</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_st1Address)?$CheckBox_st1Address:""?> id="st1Address" name="st1Address" onclick="toggleVis(this.name)" >
                                        <label for="st1Address">St Address 1</label>
                                    </li>
                                    <li>
                                        <input type="checkbox"<?=isset($CheckBox_city)?$CheckBox_city:""?> id="cityChk" name="city" onclick="toggleVis(this.name)" >
                                        <label for="city">City/State/Province/Parish</label>
                                    </li>
                                    <li>
                                        <input type="checkbox"<?=isset($CheckBox_zip)?$CheckBox_zip:""?> id="zipChk" name="zip" onclick="toggleVis(this.name)" >
                                        <label for="zipChk">Zip</label>
                                    </li>
                                    <li>
                                        <input type="checkbox"<?=isset($CheckBox_country)?$CheckBox_country:""?> id="countryChk" name="country" onclick="toggleVis(this.name)" >
                                        <label for="countryChk">Country</label>
                                    </li>
                                </ul>
                            </div>
                            <div id="flightAccommodation" class="checkBoxGroupDiv" style="display: inline-block;">
                                <span class="checkboxGroupHead">FLIGHT & ACCOMMODATION</span>
                                <input id="flightAccCheckAll" type="checkbox" class="selectAll" name="selectAllFlightAccInfo" onclick="toggleVis(this.name)" >
                                <label for="flightAccCheckAll">Select All</label>
                                <ul class="items">
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_freqFlyer)?$CheckBox_freqFlyer:""?> id="freqFlyer" name="freqFlyer" onclick="toggleVis(this.name)" >
                                        <label for="freqFlyer"> Freq. Flyer</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_freqFlyerNum)?$CheckBox_freqFlyerNum:""?> id="freqFlyerNum" name="freqFlyerNum" onclick="toggleVis(this.name)" >
                                        <label for="freqFlyerNum">Freq. FLyer#</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_fAirLine)?$CheckBox_fAirLine:""?> id="fAirLine" name="fAirLine" onclick="toggleVis(this.name)" >
                                        <label for="fAirLine"> FF Airline</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_otherFAirLine)?$CheckBox_otherFAirLine:""?> id="otherFAirLine" name="otherFAirLine" onclick="toggleVis(this.name)" >
                                        <label for="otherFAirLine">Other FF Airline</label>
                                    </li>

                                    <li >
                                        <input type="checkbox" <?=isset($CheckBox_freqFlyerNum2)?$CheckBox_freqFlyerNum2:""?> id="freqFlyerNum2" name="freqFlyerNum2" onclick="toggleVis(this.name)" >
                                        <label for="freqFlyerNum2">Freq. Flyer# 2</label>
                                    </li>
                                    <li >
                                        <input type="checkbox" <?=isset($CheckBox_fAirLine2)?$CheckBox_fAirLine2:""?> id="fAirLine2" name="fAirLine2" onclick="toggleVis(this.name)" >
                                        <label for="fAirLine2">FF Airline 2</label>
                                    </li>
                                    <li >
                                        <input type="checkbox" <?=isset($CheckBox_otherFAirLine2)?$CheckBox_otherFAirLine2:""?> id="otherFAirLine2" name="otherFAirLine2" onclick="toggleVis(this.name)" >
                                        <label for="otherFAirLine2">Other FF Airline 2</label>
                                    </li>
                                    <li >
                                        <input type="checkbox" <?=isset($CheckBox_multipleFF)?$CheckBox_multipleFF:""?> id="multipleFF" name="multipleFF" onclick="toggleVis(this.name)" >
                                        <label for="multipleFF">Multiple FF</label>
                                    </li>

                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_seatingPref)?$CheckBox_seatingPref:""?> id="seatingPref" name="seatingPref" onclick="toggleVis(this.name)" >
                                        <label for="seatingPref">Airline seat pref.</label>
                                    </li>

                                    <li >
                                        <input type="checkbox" <?=isset($CheckBox_bagsNum)?$CheckBox_bagsNum:""?> id="bagsNum" name="bagsNum" onclick="toggleVis(this.name)" >
                                        <label for="bagsNum"># of bags</label>
                                    </li>

                                    <li >
                                        <input type="checkbox" <?=isset($CheckBox_bedConfiguration)?$CheckBox_bedConfiguration:""?> id="bedConfiguration" name="bedConfiguration" onclick="toggleVis(this.name)" >
                                        <label for="bedConfiguration">Bed configuration</label>
                                    </li>
                                    <li >
                                        <input type="checkbox" <?=isset($CheckBox_airPortNum)?$CheckBox_airPortNum:""?> id="airPortNum" name="airPortNum" onclick="toggleVis(this.name)" >
                                        <label for="airPortNum">Airport</label>
                                    </li>
                                    <li >
                                        <input type="checkbox" <?=isset($CheckBox_homeCityDpt)?$CheckBox_homeCityDpt:""?> id="homeCityDpt" name="homeCityDpt" onclick="toggleVis(this.name)" >
                                        <label for="homeCityDpt">Home City Dpt</label>
                                    </li>
                                    <li >
                                        <input type="checkbox" id="desiredDptDate" <?=isset($desiredDptDate)?$desiredDptDate:""?> name="desiredDptDate" onclick="toggleVis(this.name)" >
                                        <label for="desiredDptDate">Other Dept Date</label>
                                    </li>
                                    <li >
                                        <input type="checkbox" <?=isset($CheckBox_airNotes)?$CheckBox_airNotes:""?> id="airNotes" name="airNotes" onclick="toggleVis(this.name)" >
                                        <label for="airNotes">Air Notes Home</label>
                                    </li>

                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_return)?$CheckBox_return:""?> id="returnChk" name="return" onclick="toggleVis(this.name)" >
                                        <label for="returnChk">Returning</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="desiredRetDate" <?=isset($desiredRetDate)?$desiredRetDate:""?> name="desiredRetDate" onclick="toggleVis(this.name)" >
                                        <label for="desiredRetDate">Other Return Date</label>
                                    </li>
                                    <li >
                                        <input type="checkbox" <?=isset($CheckBox_airNotesReturn)?$CheckBox_airNotesReturn:""?> id="airNotesReturn" name="airNotesReturn" onclick="toggleVis(this.name)" >
                                        <label for="airNotesReturn">Air Notes Return</label>
                                    </li>


                                </ul>

                            </div>
                        </td>
                        <td style="width: 33%; vertical-align: top">
                            <div id="passportInformation" class="checkBoxGroupDiv" style="display: inline-block;">
                                <span class="checkboxGroupHead">PASSPORT INFORMATION</span>
                                <input class="selectAll" id="passportInformationCheckAll" type="checkbox" name="selectAllPassportInfo" onclick="toggleVis(this.name)" >
                                <label for="passportInformationCheckAll">Select All</label>
                                <ul class="items">
                                    <li><input type="checkbox" <?=isset($CheckBox_passportNum)?$CheckBox_passportNum:""?> id="passportNum" name="passportNum" onclick="toggleVis(this.name)" >
                                        <label for="passportNum">Passport#</label>
                                    </li>
                                    <li><input type="checkbox" <?=isset($CheckBox_passportCitizen)?$CheckBox_passportCitizen:""?> id="passportCitizen" name="passportCitizen" onclick="toggleVis(this.name)" >
                                        <label for="passportCitizen"> Passport Citizenship</label>
                                    </li>
                                    <li><input type="checkbox" <?=isset($CheckBox_passportIssueCity)?$CheckBox_passportIssueCity:""?> id="passportIssueCity" name="passportIssueCity" onclick="toggleVis(this.name)" >
                                        <label for="passportIssueCity"> Passport Issue City</label>
                                    </li>
                                    <li><input type="checkbox" <?=isset($CheckBox_passportIssueDate)?$CheckBox_passportIssueDate:""?> id="passportIssueDate" name="passportIssueDate" onclick="toggleVis(this.name)" >
                                        <label for="passportIssueDate"> Passport Issue date</label>
                                    </li>
                                    <li><input type="checkbox" <?=isset($CheckBox_passportExpDate)?$CheckBox_passportExpDate:""?> id="passportExpDate" name="passportExpDate" onclick="toggleVis(this.name)" >
                                        <label for="passportExpDate"> Passport exp date</label>
                                    </li>
                                    <li><input type="checkbox" <?=isset($CheckBox_validUS)?$CheckBox_validUS:""?> id="validUS" name="validUS" onclick="toggleVis(this.name)" >
                                        <label for="validUS">Valid US Visa</label>
                                    </li>
                                    <li><input type="checkbox" <?=isset($CheckBox_ableUS)?$CheckBox_ableUS:""?> id="ableUS" name="ableUS" onclick="toggleVis(this.name)" >
                                        <label for="ableUS"> Able to obtain visa</label>
                                    </li>
                                    <li><input type="checkbox" <?=isset($visaType)?$visaType:""?> id="visaType" name="visaType" onclick="toggleVis(this.name)" >
                                        <label for="visaType"> Canadian Visa/eTA</label>
                                    </li>
                                    <li><input type="checkbox" <?=isset($visaExpDate)?$visaExpDate:""?> id="visaExpDate" name="visaExpDate" onclick="toggleVis(this.name)" >
                                        <label for="visaExpDate">Visa Exp Date</label>
                                    </li>
                                </ul>
                            </div>
                            <div id="emergencyInfo" class="checkBoxGroupDiv" style="display: inline-block;">
                                <span class="checkboxGroupHead">EMERGENCY, MEDICAL, DIETARY</span>
                                <input class="selectAll" id="emergencyInfoCheckAll" type="checkbox" name="selectAllEmergencyInfo" onclick="toggleVis(this.name)" >
                                <label for="emergencyInfoCheckAll">Select All</label>
                                <ul class="items">
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_emergencyName)?$CheckBox_emergencyName:""?> id="emergencyName" name="emergencyName" onclick="toggleVis(this.name)" >
                                        <label for="emergencyName">Emergency Name</label>
                                    </li>

                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_emergencyHome)?$CheckBox_emergencyHome:""?> id="emergencyHome" name="emergencyHome" onclick="toggleVis(this.name)" >
                                        <label for="emergencyHome">Emergency Home#</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_emergencyWork)?$CheckBox_emergencyWork:""?> id="emergencyWork" name="emergencyWork" onclick="toggleVis(this.name)" >
                                        <label for="emergencyWork">Emergency Work#</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_emergencyCell)?$CheckBox_emergencyCell:""?> id="emergencyCell" name="emergencyCell" onclick="toggleVis(this.name)" >
                                        <label for="emergencyCell">Emergency Cell#</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_DrName)?$CheckBox_DrName:""?> id="DrName" name="DrName" onclick="toggleVis(this.name)" >
                                        <label for="DrName">Dr Name</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_DrDay)?$CheckBox_DrDay:""?> id="DrDayNum" name="DrDay" onclick="toggleVis(this.name)" >
                                        <label for="DrDayNum">Dr Day#</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_DrAlt)?$CheckBox_DrAlt:""?> id="DrAlt" name="DrAlt" onclick="toggleVis(this.name)" >
                                        <label for="DrAlt">Dr Alt#</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_medConditions)?$CheckBox_medConditions:""?> id="medConditions" name="medConditions" onclick="toggleVis(this.name)" >
                                        <label for="medConditions">Medical Conditions</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_presMedication)?$CheckBox_presMedication:""?> id="presMedication" name="presMedication" onclick="toggleVis(this.name)" >
                                        <label for="presMedication">Prescription Medication</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_medFoods)?$CheckBox_medFoods:""?> id="medFoods" name="medFoods" onclick="toggleVis(this.name)" >
                                        <label for="medFoods">Medical Food (Cannot Eat)</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_RelFoods)?$CheckBox_RelFoods:""?> id="RelFoods" name="RelFoods" onclick="toggleVis(this.name)" >
                                        <label for="RelFoods">Religious Food (Cannot Eat)</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_Diabetic)?$CheckBox_Diabetic:""?> id="Diabetic" name="Diabetic" onclick="toggleVis(this.name)" >
                                        <label for="Diabetic">Diabetic</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_Hypertension)?$CheckBox_Hypertension:""?> id="Hypertension" name="Hypertension" onclick="toggleVis(this.name)" >
                                        <label for="Hypertension">Hypertension</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_Vegetarian)?$CheckBox_Vegetarian:""?> id="Vegetarian" name="Vegetarian" onclick="toggleVis(this.name)" >
                                        <label for="Vegetarian">Vegetarian</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_VegFish)?$CheckBox_VegFish:""?> id="VegFish" name="VegFish" onclick="toggleVis(this.name)" >
                                        <label for="VegFish">Veg. Fish</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_VegChicken)?$CheckBox_VegChicken:""?> id="VegChicken" name="VegChicken" onclick="toggleVis(this.name)" >
                                        <label for="VegChicken">Veg. Chicken</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_Lactose)?$CheckBox_Lactose:""?> id="Lactose" name="Lactose" onclick="toggleVis(this.name)" >
                                        <label for="Lactose">Lactose Gluten</label>
                                    </li>
                                </ul>
                            </div>


                            <div id="activities" class="checkBoxGroupDiv">
                                <span class="checkboxGroupHead">ACTIVITIES</span>
                                <input id="activitiesCheckAll" class="selectAll" type="checkbox" name="col1" >
                                <label for="activitiesCheckAll">Select All</label>
                                <ul class="items">
                                    <li>
                                        <input <?=isset($CheckBox_choice1)?$CheckBox_choice1:""?> id="choice1Chk" type="checkbox" name="choice1" onclick="toggleVis(this.name)">
                                        <label for="choice1Chk">1st Choice</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_choice2)?$CheckBox_choice2:""?> id="choice2Chk" type="checkbox" name="choice2" onclick="toggleVis(this.name)">
                                        <label for="choice2Chk">2nd Choice</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_choice3)?$CheckBox_choice3:""?> id="choice3Chk" type="checkbox" name="choice3" onclick="toggleVis(this.name)">
                                        <label for="choice3Chk">3rd Choice</label>
                                    </li>
                                </ul>
                            </div>
                            <div id="occasionInfo" class="checkBoxGroupDiv">
                                <span class="checkboxGroupHead">Occasion Details</span>
                                <input id="occasionInfoCheckAll" class="selectAll" type="checkbox" onclick="toggleVis(this.name)" name="col1" >
                                <label for="occasionInfoCheckAll">Select All</label>
                                <ul class="items">
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_specialOccasion)?$CheckBox_specialOccasion:""?> id="specialOccasion" name="specialOccasion" onclick="toggleVis(this.name)" >
                                        <label for="specialOccasion">Special Occasion</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" <?=isset($CheckBox_occasionDate)?$CheckBox_occasionDate:""?> id="occasionDate" name="occasionDate" onclick="toggleVis(this.name)" >
                                        <label for="occasionDate">Occasion Date</label>
                                    </li>
                                </ul>
                            </div>

                              <div id="cardInfo" class="checkBoxGroupDiv" style="display: inline-block;">
                                <span class="checkboxGroupHead">Card Details</span>
                                <input id="cardInfoCheckAll" class="selectAll" type="checkbox" onclick="toggleVis(this.name)" name="col1" >
                                <label for="cardInfoCheckAll">Select All</label>
                                <ul class="items">
                                    <li>
                                        <input <?=isset($CheckBox_ccType)?$CheckBox_ccType:""?> id="ccType" type="checkbox" name="ccType" onclick="toggleVis(this.name)" >
                                        <label for="ccType">CC Type</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_cardName)?$CheckBox_cardName:""?> id="cardName" type="checkbox" name="cardName" onclick="toggleVis(this.name)" >
                                        <label for="cardName">Card Name</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_cardNum)?$CheckBox_cardNum:""?> id="cardNum" type="checkbox" name="cardNum" onclick="toggleVis(this.name)" >
                                        <label for="cardNum">Card#</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_cardExp)?$CheckBox_cardExp:""?> id="cardExp" type="checkbox" name="cardExp" onclick="toggleVis(this.name)" >
                                        <label for="cardExp">Exp Date</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_cvv)?$CheckBox_cvv:""?> id="cvv" type="checkbox" name="cvv" onclick="toggleVis(this.name)" >
                                        <label for="cvv">CVV</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_ccSt1)?$CheckBox_ccSt1:""?> id="ccSt1" type="checkbox" name="ccSt1" onclick="toggleVis(this.name)" >
                                        <label for="ccSt1">CC St Address 1</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_ccCity)?$CheckBox_ccCity:""?> id="ccCity" type="checkbox" name="ccCity" onclick="toggleVis(this.name)" >
                                        <label for="ccCity">CC City</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_ccZip)?$CheckBox_ccZip:""?> id="ccZip" type="checkbox" name="ccZip" onclick="toggleVis(this.name)" >
                                        <label for="ccZip">CC Zip</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_ccCountry)?$CheckBox_ccCountry:""?> id="ccCountry" type="checkbox" name="ccCountry" onclick="toggleVis(this.name)" >
                                        <label for="ccCountry">CC Country</label>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td style="width: 33%; vertical-align: top">

                            <div id="admin_air" class="checkBoxGroupDiv" style="display: inline-block;">
                                <span class="checkboxGroupHead">Admin Air</span>
                                <input id="adminAirCheckAll" class="selectAll" type="checkbox" onclick="toggleVis(this.name)" name="col1" >
                                <label for="cardInfoCheckAll">Select All</label>
                                <ul class="items">

                                    <li >
                                        <input type="checkbox" <?=isset($CheckBox_arrFlight)?$CheckBox_arrFlight:""?> id="arrivalFlight" name="arrivalFlight" onclick="toggleVis(this.name)" >
                                        <label for="arrivalFlight">Arrival Flight</label>
                                    </li>
                                    <li >
                                        <input type="checkbox" <?=isset($CheckBox_arrTime)?$CheckBox_arrTime:""?> id="arrivalTime" name="arrivalTime" onclick="toggleVis(this.name)" >
                                        <label for="arrivalTime">Arrival Time</label>
                                    </li>
                                    <li >
                                        <input type="checkbox" <?=isset($CheckBox_pnr)?$CheckBox_pnr:""?> id="pnr" name="pnr" onclick="toggleVis(this.name)" >
                                        <label for="pnr">Pnr</label>
                                    </li>
                                    <li >
                                        <input type="checkbox" <?=isset($CheckBox_roomNo)?$CheckBox_roomNo:""?> id="roomNum" name="roomNumber" onclick="toggleVis(this.name)" >
                                        <label for="roomNumber">Room Number</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg1From)?$CheckBox_arrSeg1From:""?> id="Arr_Segment_1_From" type="checkbox" name="Arr_Segment_1_From" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_1_From">Arr Seg 1 TT From</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_arrSeg1To)?$CheckBox_arrSeg1To:""?> id="Arr_Segment_1_To" type="checkbox" name="Arr_Segment_1_To" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_1_To">Arr Seg 1 TT To</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg1Date)?$CheckBox_arrSeg1Date:""?> id="Arr_Segment_1_Date" type="checkbox" name="Arr_Segment_1_Date" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_1_Date">Arr Seg 1 TT Date</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg1Flight)?$CheckBox_arrSeg1Flight:""?> id="Arr_Segment_1_Flight_No" type="checkbox" name="Arr_Segment_1_Flight_No" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_1_Flight_No">Arr Seg 1 TT Flight</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg1Class)?$CheckBox_arrSeg1Class:""?> id="Arr_Segment_1_Class" type="checkbox" name="Arr_Segment_1_Class" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_1_Class">Arr Seg 1 TT Class</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_arrSeg1Seat)?$CheckBox_arrSeg1Seat:""?> id="Arr_Segment_1_Seat_No" type="checkbox" name="Arr_Segment_1_Seat_No" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_1_Seat_No">Arr Seg 1 TT Seat Number</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg1Deptime)?$CheckBox_arrSeg1Deptime:""?> id="Arr_Segment_1_Dept_Time" type="checkbox" name="Arr_Segment_1_Dept_Time" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_1_Dept_Time">Arr Seg 1 TT Departure Time</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg1Arrtime)?$CheckBox_arrSeg1Arrtime:""?> id="Arr_Segment_1_Arr_Time" type="checkbox" name="Arr_Segment_1_Arr_Time" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_1_Arr_Time">Arr Seg 1 TT Arrival Time</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg2From)?$CheckBox_arrSeg2From:""?> id="Arr_Segment_2_From" type="checkbox" name="Arr_Segment_2_From" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_2_From">Arr Seg 2 TT From</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_arrSeg2To)?$CheckBox_arrSeg2To:""?> id="Arr_Segment_2_To" type="checkbox" name="Arr_Segment_2_To" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_2_To">Arr Seg 2 TT To</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg2Date)?$CheckBox_arrSeg2Date:""?> id="Arr_Segment_2_Date" type="checkbox" name="Arr_Segment_2_Date" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_2_Date">Arr Seg 2 TT Date</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg2Flight)?$CheckBox_arrSeg2Flight:""?> id="Arr_Segment_2_Flight_No" type="checkbox" name="Arr_Segment_2_Flight_No" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_2_Flight_No">Arr Seg 2 TT Flight</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg2Class)?$CheckBox_arrSeg2Class:""?> id="Arr_Segment_2_Class" type="checkbox" name="Arr_Segment_2_Class" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_2_Class">Arr Seg 2 TT Class</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_arrSeg2Seat)?$CheckBox_arrSeg2Seat:""?> id="Arr_Segment_2_Seat_No" type="checkbox" name="Arr_Segment_2_Seat_No" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_2_Seat_No">Arr Seg 2 TT Seat Number</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg2Deptime)?$CheckBox_arrSeg2Deptime:""?> id="Arr_Segment_2_Dept_Time" type="checkbox" name="Arr_Segment_2_Dept_Time" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_2_Dept_Time">Arr Seg 2TT Departure Time</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg2Arrtime)?$CheckBox_arrSeg2Arrtime:""?> id="Arr_Segment_2_Arr_Time" type="checkbox" name="Arr_Segment_2_Arr_Time" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_2_Arr_Time">Arr Seg 2 TT Arrival Time</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg3From)?$CheckBox_arrSeg3From:""?> id="Arr_Segment_3_From" type="checkbox" name="Arr_Segment_3_From" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_3_From">Arr Seg 3 TT From</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_arrSeg3To)?$CheckBox_arrSeg3To:""?> id="Arr_Segment_3_To" type="checkbox" name="Arr_Segment_3_To" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_3_To">Arr Seg 3 TT To</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg3Date)?$CheckBox_arrSeg3Date:""?> id="Arr_Segment_3_Date" type="checkbox" name="Arr_Segment_3_Date" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_3_Date">Arr Seg 3 TT Date</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg3Flight)?$CheckBox_arrSeg3Flight:""?> id="Arr_Segment_3_Flight_No" type="checkbox" name="Arr_Segment_3_Flight_No" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_3_Flight_No">Seg 3 TT Flight</label>
                                    </li>

                                   
                                    <li>
                                        <input <?=isset($CheckBox_arrSeg3Class)?$CheckBox_arrSeg3Class:""?> id="Arr_Segment_3_Class" type="checkbox" name="Arr_Segment_3_Class" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_3_Class">Arr Seg 3 TT Class</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_arrSeg3Seat)?$CheckBox_arrSeg3Seat:""?> id="Arr_Segment_3_Seat_No" type="checkbox" name="Arr_Segment_3_Seat_No" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_3_Seat_No">Arr Seg 3 TT Seat Number</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg3Deptime)?$CheckBox_arrSeg3Deptime:""?> id="Arr_Segment_3_Dept_Time" type="checkbox" name="Arr_Segment_3_Dept_Time" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_3_Dept_Time">Arr Seg 3 TT Departure Time</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg3Arrtime)?$CheckBox_arrSeg3Arrtime:""?> id="Arr_Segment_3_Arr_Time" type="checkbox" name="Arr_Segment_3_Arr_Time" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_3_Arr_Time">Arr Seg 3 TT Arrival Time</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg4From)?$CheckBox_arrSeg4From:""?> id="Arr_Segment_4_From" type="checkbox" name="Arr_Segment_4_From" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_4_From">Arr Seg 4 TT From</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_arrSeg4To)?$CheckBox_arrSeg4To:""?> id="Arr_Segment_4_To" type="checkbox" name="Arr_Segment_4_To" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_4_To">Arr Seg 4 TT To</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg4Date)?$CheckBox_arrSeg4Date:""?> id="Arr_Segment_4_Date" type="checkbox" name="Arr_Segment_4_Date" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_4_Date">Arr Seg 4 TT Date</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg4Flight)?$CheckBox_arrSeg4Flight:""?> id="Arr_Segment_4_Flight_No" type="checkbox" name="Arr_Segment_4_Flight_No" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_4_Flight_No">Arr Seg 4 TT Flight</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg4Class)?$CheckBox_arrSeg4Class:""?> id="Arr_Segment_4_Class" type="checkbox" name="Arr_Segment_4_Class" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_4_Class">Arr Seg 4 TT Class</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_arrSeg4Seat)?$CheckBox_arrSeg4Seat:""?> id="Arr_Segment_4_Seat_No" type="checkbox" name="Arr_Segment_4_Seat_No" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_4_Seat_No">Arr Seg 4 TT Seat Number</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg4Deptime)?$CheckBox_arrSeg4Deptime:""?> id="Arr_Segment_4_Dept_Time" type="checkbox" name="Arr_Segment_4_Dept_Time" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_4_Dept_Time">Arr Seg 4 TT Departure Time</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg4Arrtime)?$CheckBox_arrSeg4Arrtime:""?> id="Arr_Segment_4_Arr_Time" type="checkbox" name="Arr_Segment_4_Arr_Time" onclick="toggleVis(this.name)" >
                                        <label for="Arr_Segment_4_Arr_Time">Arr Seg 4 TT Arrival Time</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg1From)?$CheckBox_dptSeg1From:""?> id="Dpt_Segment_1_From" type="checkbox" name="Dpt_Segment_1_From" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_1_From">Dpt Seg 1 TT From</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_dptSeg1To)?$CheckBox_dptSeg1To:""?> id="Dpt_Segment_1_To" type="checkbox" name="Dpt_Segment_1_To" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_1_To">Dpt Seg 1 TT To</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg1Date)?$CheckBox_dptSeg1Date:""?> id="Dpt_Segment_1_Date" type="checkbox" name="Dpt_Segment_1_Date" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_1_Date">Dpt Seg 1 TT Date</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg1Flight)?$CheckBox_dptSeg1Flight:""?> id="Dpt_Segment_1_Flight_No" type="checkbox" name="Dpt_Segment_1_Flight_No" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_1_Flight_No">Dpt Seg 1 TT Flight</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg1Class)?$CheckBox_dptSeg1Class:""?> id="Dpt_Segment_1_Class" type="checkbox" name="Dpt_Segment_1_Class" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_1_Class">Dpt Seg 1 TT Class</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_dptSeg1Seat)?$CheckBox_dptSeg1Seat:""?> id="Dpt_Segment_1_Seat_No" type="checkbox" name="Dpt_Segment_1_Seat_No" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_1_Seat_No">Dpt Seg 1 TT Seat Number</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg1Deptime)?$CheckBox_dptSeg1Deptime:""?> id="Dpt_Segment_1_Dept_Time" type="checkbox" name="Dpt_Segment_1_Dept_Time" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_1_Dept_Time">Dpt Seg 1 TT Departure Time</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg1Arrtime)?$CheckBox_dptSeg1Arrtime:""?> id="Dpt_Segment_1_Arr_Time" type="checkbox" name="Dpt_Segment_1_Arr_Time" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_1_Arr_Time">Dpt Seg 1 TT Arrival Time</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg2From)?$CheckBox_dptSeg2From:""?> id="Dpt_Segment_2_From" type="checkbox" name="Dpt_Segment_2_From" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_2_From">Dpt Seg 2 TT From</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg2To)?$CheckBox_dptSeg2To:""?> id="Dpt_Segment_2_To" type="checkbox" name="Dpt_Segment_2_To" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_2_To">Dpt Seg 2 TT To</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_dptSeg2Date)?$CheckBox_dptSeg2Date:""?> id="Dpt_Segment_2_Date" type="checkbox" name="Dpt_Segment_2_Date" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_2_Date">Dpt Seg 2 TT Date</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg2Flight)?$CheckBox_dptSeg2Flight:""?> id="Dpt_Segment_2_Flight_No" type="checkbox" name="Dpt_Segment_2_Flight_No" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_2_Flight_No">Dpt Seg 2 TT Flight</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg2Class)?$CheckBox_dptSeg2Class:""?> id="Dpt_Segment_2_Class" type="checkbox" name="Dpt_Segment_2_Class" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_2_Class">Dpt Seg 2 TT Class</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_dptSeg2Seat)?$CheckBox_dptSeg2Seat:""?> id="Dpt_Segment_2_Seat_No" type="checkbox" name="Dpt_Segment_2_Seat_No" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_2_Seat_No">Dpt Seg 2 TT Seat Number</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg2Deptime)?$CheckBox_dptSeg2Deptime:""?> id="Dpt_Segment_2_Dept_Time" type="checkbox" name="Dpt_Segment_2_Dept_Time" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_2_Dept_Time">Dpt Seg 2 TT Departure Time</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg2Arrtime)?$CheckBox_dptSeg2Arrtime:""?> id="Dpt_Segment_2_Arr_Time" type="checkbox" name="Dpt_Segment_2_Arr_Time" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_2_Arr_Time">Dpt Seg 2 TT Arrival Time</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg3From)?$CheckBox_dptSeg3From:""?> id="Dpt_Segment_3_From" type="checkbox" name="Dpt_Segment_3_From" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_3_From">Dpt Seg 3 TT From</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_dptSeg3To)?$CheckBox_dptSeg3To:""?> id="Dpt_Segment_3_To" type="checkbox" name="Dpt_Segment_3_To" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_3_To">Dpt Seg 3 TT To</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg3Date)?$CheckBox_dptSeg3Date:""?> id="Dpt_Segment_3_Date" type="checkbox" name="Dpt_Segment_3_Date" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_3_Date">Dpt Seg 3 TT Date</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg3Flight)?$CheckBox_dptSeg3Flight:""?> id="Dpt_Segment_3_Flight_No" type="checkbox" name="Dpt_Segment_3_Flight_No" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_3_Flight_No">Dpt Seg 3 TT Flight</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg3Class)?$CheckBox_dptSeg3Class:""?> id="Dpt_Segment_3_Class" type="checkbox" name="Dpt_Segment_3_Class" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_3_Class">Dpt Seg 3 TT Class</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_dptSeg3Seat)?$CheckBox_dptSeg3Seat:""?> id="Dpt_Segment_3_Seat_No" type="checkbox" name="Dpt_Segment_3_Seat_No" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_3_Seat_No">Dpt Seg 3 TT Seat Number</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg3Deptime)?$CheckBox_dptSeg3Deptime:""?> id="Dpt_Segment_3_Dept_Time" type="checkbox" name="Dpt_Segment_3_Dept_Time" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_3_Dept_Time">Dpt Seg 3 TT Departure Time</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg3Arrtime)?$CheckBox_dptSeg3Arrtime:""?> id="Dpt_Segment_3_Arr_Time" type="checkbox" name="Dpt_Segment_3_Arr_Time" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_3_Arr_Time">Dpt Seg 3 TT Arrival Time</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg4From)?$CheckBox_arrSeg4From:""?> id="Dpt_Segment_4_From" type="checkbox" name="Dpt_Segment_4_From" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_4_From">Dpt Seg 4 TT From</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_dptSeg4To)?$CheckBox_dptSeg4To:""?> id="Dpt_Segment_4_To" type="checkbox" name="Dpt_Segment_4_To" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_4_To">Dpt Seg 4 TT To</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg4Date)?$CheckBox_arrSeg4Date:""?> id="Dpt_Segment_4_Date" type="checkbox" name="Dpt_Segment_4_Date" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_4_Date">Dpt Seg 4 TT Date</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg4Flight)?$CheckBox_arrSeg4Flight:""?> id="Dpt_Segment_4_Flight_No" type="checkbox" name="Dpt_Segment_4_Flight_No" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_4_Flight_No">Dpt Seg 4 TT Flight</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_dptSeg4Class)?$CheckBox_dptSeg4Class:""?> id="Dp_Segment_4_Class" type="checkbox" name="Dpt_Segment_4_Class" onclick="toggleVis(this.name)" >
                                        <label for="Dp_Segment_4_Class">Dpt Seg 4 TT Class</label>
                                    </li>
                                    <li>
                                        <input <?=isset($CheckBox_arrSeg4Seat)?$CheckBox_arrSeg4Seat:""?> id="Dpt_Segment_4_Seat_No" type="checkbox" name="Dpt_Segment_4_Seat_No" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_4_Seat_No">Dpt Seg 4 TT Seat Number</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg4Deptime)?$CheckBox_arrSeg4Deptime:""?> id="Dpt_Segment_4_Dept_Time" type="checkbox" name="Dpt_Segment_4_Dept_Time" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_4_Dept_Time">Dpt Seg 4 TT Departure Time</label>
                                    </li>

                                    <li>
                                        <input <?=isset($CheckBox_arrSeg4Arrtime)?$CheckBox_arrSeg4Arrtime:""?> id="Dpt_Segment_4_Arr_Time" type="checkbox" name="Dpt_Segment_4_Arr_Time" onclick="toggleVis(this.name)" >
                                        <label for="Dpt_Segment_4_Arr_Time">Dpt Seg 4 TT Arrival Time</label>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

        </form>

    </div>

                <!-- <th class="header schengenNum">Schengen Visa#</th>
                <th class="header schengenVisaExp">Schengen exp date</th> -->
    <div class="content2" style="overflow:auto; height: 600px;">
        <table id="reportsTable" class="myTable" >
            <thead>
            <tr>
                <th class="header left regID">Reg ID</th>
                <th class="header winnerCompanion">Winer/Companion</th>
                <th class="header">Pres Club/PaceS</th>
                <th class="header left">Status</th>
                <th class="header title">Title</th>
                <th class="header firstName">First Name</th>
                <th class="header lastName">Last Name</th>
                <th class="header dateOfBirth">D.O.B</th>
                <th class="header badgeFirstName">Name Badge</th>
                <th class="header badgeLastName">Name Badge Last</th>
                <th class="header gender">Sex</th>
                <th class="header shirtSize">Shirt Size</th>
                <th class="header birth_country">Birth Country</th>
                <th class="header homeTel">Home#</th>
                <th class="header workTel">Work#</th>
                <th class="header workCell">Cell#</th>
                <th class="header email">Email</th>
                <th class="header altEmail">Alt Email</th>
                <th class="header st1Address">St Address 1</th>
                <th class="header state">City/State/Province/Parish</th>
                <th class="header zip">Zip</th>
                <th class="header country">Country</th>
                <th class="header passportNum">Passport#</th>
                <th class="header passportCitizen">Passport Citizenship</th>
                <th class="header passportIssueCity">Passport Issue City</th>
                <th class="header passportIssueDate">Passport Issue Date</th>
                <th class="header passportExpDate">Passport Exp Date</th>
                <th class="header validUS">Valid US Visa</th>
                <th class="header ableUS">Able to Obtain Visa</th>
                <th class="header canadian-visa">Canadian Visa/eTA</th>
                <th class="header canadian-visa-exp">Visa Exp Date</th>
                <th class="header emergencyName">Emergency Name</th>
                <th class="header emergencyHome">Emergency Home#</th>
                <th class="header emergencyWork">Emergency Work#</th>
                <th class="header emergencyCell">Emergency Cell#</th>
                <th class="header DrName">Dr. Name</th>
                <th class="header DrDay">Dr. Day#</th>
                <th class="header DrAlt">Dr. Alt#</th>
                <th class="header medConditions">Medical Conditions</th>
                <th class="header presMedication">Prescription Medication</th>
                <th class="header medFoods">Medical Foods (Cannot Eat)</th>
                <th class="header RelFoods">Religious Food (Cannot Eat)</th>
                <th class="header Diabetic">Diabetic</th>
                <th class="header Hypertension">Hypertension</th>
                <th class="header Vegetarian">Vegetarian</th>
                <th class="header VegFish">Veg. Fish</th>
                <th class="header VegChicken">Veg. Chicken</th>
                <th class="header Lactose">Lactose/Gluten</th>
                <th class="header specialOccasion">Special Occasion</th>
                <th class="header occasionDate">Occasion Date</th>
                <th class="header freqFlyer">Frequent Flyer</th>
                <th class="header freqFlyerNum">Frequent Flyer#</th>
                <th class="header fAirLine">FF Airline</th>
                <th class="header otherFAirLine">Other FF Airline</th>
                <th class="header multipleFF">Multiple FF</th>
                <th class="header freqFlyerNum2">Frequent Flyer# 2</th>
                <th class="header fAirLine2">FF Airline 2</th>
                <th class="header otherFAirLine2">Other FF Airline 2</th>
                <th class="header seatingPref">Airline seat preference</th>
                <th class="header bagsNum"># of Bags</th>
                <th class="header bedConfiguration">Beg Configuration</th>
                <th class="header airPortNum">Airport</th>
                <th class="header homeCityDpt">Home City dpt</th>
                <th class="header homeCityDpt">Desired Dept Date</th>
                <th class="header return">Returning</th>
                <th class="header return">Desired Ret Date</th>
                <th class="header airNotes">Air Notes Home</th>
                <th class="header airNotesReturn">Air Notes Return</th>
                <th class="header">Travel Request</th>
                <th class="header ccType">CC Type</th>
                <th class="header cardName">Card Name</th>
                <th class="header cardNum">Card#</th>
                <th class="header cardExp">Exp Date</th>
                <th class="header cvv">CVV</th>
                <th class="header ccSt1">CC St Address 1</th>
                <th class="header ccCity">CC City</th>
                <th class="header ccZip">CC Zip</th>
                <th class="header ccCountry">CC Country</th>
                <th class="header choice1">Activity 1st Choice</th>
                <th class="header choice2">Activity 2nd Choice</th>
                <th class="header choice3">Activity 3rd Choice</th>
                <th class="header">Arr | Date BCN</th>
                <th class="header">Arr | Flight BCN</th>
                <th class="header">Arr | Time</th>
                <th class="header">Dpt | Date BCN</th>
                <th class="header">Dpt | Flight BCN</th>
                <th class="header">Dpt | Time</th>
                <th class="header">Room Number</th>
                <th class="header">Arr | Segment 1 From</th>
                <th class="header">Arr | Segment 1 To</th>
                <th class="header">Arr | Segment 1 Flight Number</th>
                <th class="header">Arr | Segment 1 Class</th>
                <th class="header">Arr | Segment 1 Date of service</th>
                <th class="header">Arr | Segment 1 Departure Time</th>
                <th class="header">Arr | Segment 1 Arrival Time</th>
                <th class="header">Arr | Segment 1 Seat Number</th>
                <th class="header">Arr | Segment 2 From</th>
                <th class="header">Arr | Segment 2 To</th>
                <th class="header">Arr | Segment 2 Flight Number</th>
                <th class="header">Arr | Segment 2 Class</th>
                <th class="header">Arr | Segment 2 Date of service</th>
                <th class="header">Arr | Segment 2 Departure Time</th>
                <th class="header">Arr | Segment 2 Arrival Time</th>
                <th class="header">Arr | Segment 2 Seat Number</th>
                <th class="header">Arr | Segment 3 From</th>
                <th class="header">Arr | Segment 3 To</th>
                <th class="header">Arr | Segment 3 Flight Number</th>
                <th class="header">Arr | Segment 3 Class</th>
                <th class="header">Arr | Segment 3 Date of service</th>
                <th class="header">Arr | Segment 3 Departure Time</th>
                <th class="header">Arr | Segment 3 Arrival Time</th>
                <th class="header">Arr | Segment 3 Seat Number</th>
                <th class="header">Arr | Segment 4 From</th>
                <th class="header">Arr | Segment 4 To</th>
                <th class="header">Arr | Segment 4 Flight Number</th>
                <th class="header">Arr | Segment 4 Class</th>
                <th class="header">Arr | Segment 4 Date of service</th>
                <th class="header">Arr | Segment 4 Departure Time</th>
                <th class="header">Arr | Segment 4 Arrival Time</th>
                <th class="header">Arr | Segment 4 Seat Number</th>
                <th class="header">Dpt | Segment 1 From</th>
                <th class="header">Dpt | Segment 1 To</th>
                <th class="header">Dpt | Segment 1 Flight Number</th>
                <th class="header">Dpt | Segment 1 Class</th>
                <th class="header">Dpt | Segment 1 Date of service</th>
                <th class="header">Dpt | Segment 1 Departure Time</th>
                <th class="header">Dpt | Segment 1 Arrival Time</th>
                <th class="header">Dpt | Segment 1 Seat Number</th>
                <th class="header">Dpt | Segment 2 From</th>
                <th class="header">Dpt | Segment 2 To</th>
                <th class="header">Dpt | Segment 2 Flight Number</th>
                <th class="header">Dpt | Segment 2 Class</th>
                <th class="header">Dpt | Segment 2 Date of service</th>
                <th class="header">Dpt | Segment 2 Departure Time</th>
                <th class="header">Dpt | Segment 2 Arrival Time</th>
                <th class="header">Dpt | Segment 2 Seat Number</th>
                <th class="header">Dpt | Segment 3 From</th>
                <th class="header">Dpt | Segment 3 To</th>
                <th class="header">Dpt | Segment 3 Flight Number</th>
                <th class="header">Dpt | Segment 3 Class</th>
                <th class="header">Dpt | Segment 3 Date of service</th>
                <th class="header">Dpt | Segment 3 Departure Time</th>
                <th class="header">Dpt | Segment 3 Arrival Time</th>
                <th class="header">Dpt | Segment 3 Seat Number</th>
                <th class="header">Dpt | Segment 4 From</th>
                <th class="header">Dpt | Segment 4 To</th>
                <th class="header">Dpt | Segment 4 Flight Number</th>
                <th class="header">Dpt | Segment 4 Class</th>
                <th class="header">Dpt | Segment 4 Date of service</th>
                <th class="header">Dpt | Segment 4 Departure Time</th>
                <th class="header">Dpt | Segment 4 Arrival Time</th>
                <th class="header">Dpt | Segment 4 Seat Number</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $count = 1;
            foreach($tableData as $row){

                if ($count++ > 10) break;
                echo "<tr>";
                echo "
                <td>".$row['RegNo']."</td>
                <td>".$row['winnerCompanion']."</td>
                <td>".$row['pressClubPaces']."</td>
                <td>".$row['Status']."</td>
                <td>".$row['Title']."</td>
                <td>".$row['FirstName']."</td>
                <td>".$row['LastName']."</td>
                <td>".$row['DOB']."</td>
                <td>".$row['NameBadge']."</td>
                <td>".$row['NameBadgeLast']."</td>
                <td>".$row['Gender']."</td>
                <td>".$row['ShirtSize']."</td>
                <td>".$row['BirthCountry']."</td>
                <td>".$row['Home']."</td>
                <td>".$row['Work']."</td>
                <td>".$row['Cell']."</td>
                <td>".$row['Email']."</td>
                <td>".$row['AltEmail']."</td>
                <td>".$row['St1Address']."</td>
                <td>".$row['City']."</td>
                <td>".$row['Zip']."</td>
                <td>".$row['Country']."</td>
                <td>".$row['Passport']."</td>
                <td>".$row['Citizen']."</td>
                <td>".$row['IssueCity']."</td>
                <td>".$row['IssueDate']."</td>
                <td>".$row['ExpireDate']."</td>
                <td>".$row['UsVisa']."</td>
                <td>".$row['ObtainVisa']."</td>
                <td>".$row['VisaType']."</td>
                <td>".$row['VisaExpDate']."</td>
                <td>".$row['EmergencyName']."</td>
                <td>".$row['EmergencyHome']."</td>
                <td>".$row['EmergencyWork']."</td>
                <td>".$row['EmergencyCell']."</td>
                <td>".$row['DrName']."</td>
                <td>".$row['DrDayPhone']."</td>
                <td>".$row['DrAltPhone']."</td>
                <td>".$row['MedConditions']."</td>
                <td>".$row['Medication']."</td>
                <td>".$row['MedFoods']."</td>
                <td>".$row['ReligiousFood']."</td>
                <td>".$row['Diabetic']."</td>
                <td>".$row['Hypertension']."</td>
                <td>".$row['Vegetarian']."</td>
                <td>".$row['Fish']."</td>
                <td>".$row['Chicken']."</td>
                <td>".$row['LactoseGluten']."</td>
                <td>".$row['Occasion']."</td>
                <td>".$row['SpecialDate']."</td>
                <td>".$row['FFlyer']."</td>
                <td>".$row['FNumber']."</td>
                <td>".$row['FAirline']."</td>
                <td>".$row['OtherFAirLine']."</td>
                <td>".$row['FFlyerAlt']."</td>
                <td>".$row['FNumberAlt']."</td>
                <td>".$row['FAirlineAlt']."</td>
                <td>".$row['OtherFAirlineAlt']."</td>
                <td>".$row['Seating']."</td>
                <td>".$row['Bags']."</td>
                <td>".$row['Bed']."</td>
                <td>".$row['AirportCode']."</td>
                <td>".$row['HomeCityDpt']."</td>
                <td>".$row['DesiredDptDate']."</td>
                <td>".$row['ReturnDate']."</td>
                <td>".$row['DesiredRetDate']."</td>
                <td>".$row['AirNotesHome']."</td>
                <td>".$row['AirNotesReturn']."</td>
                <td>".$row['TravelRequest']."</td>
                <td>".$row['CCType']."</td>
                <td>".$row['CardName']."</td>
                <td>".decryption($row['CardNumber'])."</td>
                <td>".decryption($row['CardExpDate'])."</td>
                <td>".decryption($row['CVV'])."</td>
                <td>".$row['ccST1Address']."</td>
                <td>".$row['ccCity']."</td>
                <td>".$row['ccZip']."</td>
                <td>".$row['ccCountry']."</td>
                <td>".$row['Choice1']."</td>
                <td>".$row['Choice2']."</td>
                <td>".$row['Choice3']."</td>                
                <td>".$row['ArrDateDst']."</td>
                <td>".$row['ArrFlightDst']."</td>
                <td>".$row['ArrTimeDst']."</td>
                <td>".$row['DepartDateDst']."</td>
                <td>".$row['DepartFlightDst']."</td>
                <td>".$row['DepartTimeDst']."</td>
                <td>".$row['RoomNo']."</td>

                <td>".(isset($row['arrivalSegments'][1]['ArrivalSegFrom'])?$row['arrivalSegments'][1]['ArrivalSegFrom']:"")."</td>
                <td>".(isset($row['arrivalSegments'][1]['ArrivalSegTo'])?$row['arrivalSegments'][1]['ArrivalSegTo']:"")."</td>
                <td>".(isset($row['arrivalSegments'][1]['ArrivalSegFlightNumber'])?$row['arrivalSegments'][1]['ArrivalSegFlightNumber']:"")."</td>
                <td>".(isset($row['arrivalSegments'][1]['ArrivalSegClass'])?$row['arrivalSegments'][1]['ArrivalSegClass']:"")."</td>
                <td>".(isset($row['arrivalSegments'][1]['ArrivalSegDOS'])?$row['arrivalSegments'][1]['ArrivalSegDOS']:"")."</td>
                <td>".(isset($row['arrivalSegments'][1]['ArrivalSegDepartureTime'])?$row['arrivalSegments'][1]['ArrivalSegDepartureTime']:"")."</td>
                <td>".(isset($row['arrivalSegments'][1]['ArrivalSegArrivalTime'])?$row['arrivalSegments'][1]['ArrivalSegArrivalTime']:"")."</td>
                <td>".(isset($row['arrivalSegments'][1]['ArrivalSegSeatNumber'])?$row['arrivalSegments'][1]['ArrivalSegSeatNumber']:"")."</td> 
                
                <td>".(isset($row['arrivalSegments'][2]['ArrivalSegFrom'])?$row['arrivalSegments'][2]['ArrivalSegFrom']:"")."</td>
                <td>".(isset($row['arrivalSegments'][2]['ArrivalSegTo'])?$row['arrivalSegments'][2]['ArrivalSegTo']:"")."</td>
                <td>".(isset($row['arrivalSegments'][2]['ArrivalSegFlightNumber'])?$row['arrivalSegments'][2]['ArrivalSegFlightNumber']:"")."</td>
                <td>".(isset($row['arrivalSegments'][2]['ArrivalSegClass'])?$row['arrivalSegments'][2]['ArrivalSegClass']:"")."</td>
                <td>".(isset($row['arrivalSegments'][2]['ArrivalSegDOS'])?$row['arrivalSegments'][2]['ArrivalSegDOS']:"")."</td>
                <td>".(isset($row['arrivalSegments'][2]['ArrivalSegDepartureTime'])?$row['arrivalSegments'][2]['ArrivalSegDepartureTime']:"")."</td>
                <td>".(isset($row['arrivalSegments'][2]['ArrivalSegArrivalTime'])?$row['arrivalSegments'][2]['ArrivalSegArrivalTime']:"")."</td>
                <td>".(isset($row['arrivalSegments'][2]['ArrivalSegSeatNumber'])?$row['arrivalSegments'][2]['ArrivalSegSeatNumber']:"")."</td> 
                
                <td>".(isset($row['arrivalSegments'][3]['ArrivalSegFrom'])?$row['arrivalSegments'][3]['ArrivalSegFrom']:"")."</td>
                <td>".(isset($row['arrivalSegments'][3]['ArrivalSegTo'])?$row['arrivalSegments'][3]['ArrivalSegTo']:"")."</td>
                <td>".(isset($row['arrivalSegments'][3]['ArrivalSegFlightNumber'])?$row['arrivalSegments'][3]['ArrivalSegFlightNumber']:"")."</td>
                <td>".(isset($row['arrivalSegments'][3]['ArrivalSegClass'])?$row['arrivalSegments'][3]['ArrivalSegClass']:"")."</td>
                <td>".(isset($row['arrivalSegments'][3]['ArrivalSegDOS'])?$row['arrivalSegments'][3]['ArrivalSegDOS']:"")."</td>
                <td>".(isset($row['arrivalSegments'][3]['ArrivalSegDepartureTime'])?$row['arrivalSegments'][3]['ArrivalSegDepartureTime']:"")."</td>
                <td>".(isset($row['arrivalSegments'][3]['ArrivalSegArrivalTime'])?$row['arrivalSegments'][3]['ArrivalSegArrivalTime']:"")."</td>
                <td>".(isset($row['arrivalSegments'][3]['ArrivalSegSeatNumber'])?$row['arrivalSegments'][3]['ArrivalSegSeatNumber']:"")."</td> 
                
                <td>".(isset($row['arrivalSegments'][4]['ArrivalSegFrom'])?$row['arrivalSegments'][4]['ArrivalSegFrom']:"")."</td>
                <td>".(isset($row['arrivalSegments'][4]['ArrivalSegTo'])?$row['arrivalSegments'][4]['ArrivalSegTo']:"")."</td>
                <td>".(isset($row['arrivalSegments'][4]['ArrivalSegFlightNumber'])?$row['arrivalSegments'][4]['ArrivalSegFlightNumber']:"")."</td>
                <td>".(isset($row['arrivalSegments'][4]['ArrivalSegClass'])?$row['arrivalSegments'][4]['ArrivalSegClass']:"")."</td>
                <td>".(isset($row['arrivalSegments'][4]['ArrivalSegDOS'])?$row['arrivalSegments'][4]['ArrivalSegDOS']:"")."</td>
                <td>".(isset($row['arrivalSegments'][4]['ArrivalSegDepartureTime'])?$row['arrivalSegments'][4]['ArrivalSegDepartureTime']:"")."</td>
                <td>".(isset($row['arrivalSegments'][4]['ArrivalSegArrivalTime'])?$row['arrivalSegments'][4]['ArrivalSegArrivalTime']:"")."</td>
                <td>".(isset($row['arrivalSegments'][4]['ArrivalSegSeatNumber'])?$row['arrivalSegments'][4]['ArrivalSegSeatNumber']:"")."</td> 
                               
                <td>".(isset($row['departureSegments'][1]['ArrivalSegFrom'])?$row['departureSegments'][1]['ArrivalSegFrom']:"")."</td>
                <td>".(isset($row['departureSegments'][1]['ArrivalSegTo'])?$row['departureSegments'][1]['ArrivalSegTo']:"")."</td>
                <td>".(isset($row['departureSegments'][1]['ArrivalSegFlightNumber'])?$row['departureSegments'][1]['ArrivalSegFlightNumber']:"")."</td>
                <td>".(isset($row['departureSegments'][1]['ArrivalSegClass'])?$row['departureSegments'][1]['ArrivalSegClass']:"")."</td>
                <td>".(isset($row['departureSegments'][1]['ArrivalSegDOS'])?$row['departureSegments'][1]['ArrivalSegDOS']:"")."</td>
                <td>".(isset($row['departureSegments'][1]['ArrivalSegDepartureTime'])?$row['departureSegments'][1]['ArrivalSegDepartureTime']:"")."</td>
                <td>".(isset($row['departureSegments'][1]['ArrivalSegArrivalTime'])?$row['departureSegments'][1]['ArrivalSegArrivalTime']:"")."</td>
                <td>".(isset($row['departureSegments'][1]['ArrivalSegSeatNumber'])?$row['departureSegments'][1]['ArrivalSegSeatNumber']:"")."</td> 
                               
                <td>".(isset($row['departureSegments'][2]['ArrivalSegFrom'])?$row['departureSegments'][2]['ArrivalSegFrom']:"")."</td>
                <td>".(isset($row['departureSegments'][2]['ArrivalSegTo'])?$row['departureSegments'][2]['ArrivalSegTo']:"")."</td>
                <td>".(isset($row['departureSegments'][2]['ArrivalSegFlightNumber'])?$row['departureSegments'][2]['ArrivalSegFlightNumber']:"")."</td>
                <td>".(isset($row['departureSegments'][2]['ArrivalSegClass'])?$row['departureSegments'][2]['ArrivalSegClass']:"")."</td>
                <td>".(isset($row['departureSegments'][2]['ArrivalSegDOS'])?$row['departureSegments'][2]['ArrivalSegDOS']:"")."</td>
                <td>".(isset($row['departureSegments'][2]['ArrivalSegDepartureTime'])?$row['departureSegments'][2]['ArrivalSegDepartureTime']:"")."</td>
                <td>".(isset($row['departureSegments'][2]['ArrivalSegArrivalTime'])?$row['departureSegments'][2]['ArrivalSegArrivalTime']:"")."</td>
                <td>".(isset($row['departureSegments'][2]['ArrivalSegSeatNumber'])?$row['departureSegments'][2]['ArrivalSegSeatNumber']:"")."</td> 
                               
                <td>".(isset($row['departureSegments'][3]['ArrivalSegFrom'])?$row['departureSegments'][3]['ArrivalSegFrom']:"")."</td>
                <td>".(isset($row['departureSegments'][3]['ArrivalSegTo'])?$row['departureSegments'][3]['ArrivalSegTo']:"")."</td>
                <td>".(isset($row['departureSegments'][3]['ArrivalSegFlightNumber'])?$row['departureSegments'][3]['ArrivalSegFlightNumber']:"")."</td>
                <td>".(isset($row['departureSegments'][3]['ArrivalSegClass'])?$row['departureSegments'][3]['ArrivalSegClass']:"")."</td>
                <td>".(isset($row['departureSegments'][3]['ArrivalSegDOS'])?$row['departureSegments'][3]['ArrivalSegDOS']:"")."</td>
                <td>".(isset($row['departureSegments'][3]['ArrivalSegDepartureTime'])?$row['departureSegments'][3]['ArrivalSegDepartureTime']:"")."</td>
                <td>".(isset($row['departureSegments'][3]['ArrivalSegArrivalTime'])?$row['departureSegments'][3]['ArrivalSegArrivalTime']:"")."</td>
                <td>".(isset($row['departureSegments'][3]['ArrivalSegSeatNumber'])?$row['departureSegments'][3]['ArrivalSegSeatNumber']:"")."</td> 
                               
                <td>".(isset($row['departureSegments'][4]['ArrivalSegFrom'])?$row['departureSegments'][4]['ArrivalSegFrom']:"")."</td>
                <td>".(isset($row['departureSegments'][4]['ArrivalSegTo'])?$row['departureSegments'][4]['ArrivalSegTo']:"")."</td>
                <td>".(isset($row['departureSegments'][4]['ArrivalSegFlightNumber'])?$row['departureSegments'][4]['ArrivalSegFlightNumber']:"")."</td>
                <td>".(isset($row['departureSegments'][4]['ArrivalSegClass'])?$row['departureSegments'][4]['ArrivalSegClass']:"")."</td>
                <td>".(isset($row['departureSegments'][4]['ArrivalSegDOS'])?$row['departureSegments'][4]['ArrivalSegDOS']:"")."</td>
                <td>".(isset($row['departureSegments'][4]['ArrivalSegDepartureTime'])?$row['departureSegments'][4]['ArrivalSegDepartureTime']:"")."</td>
                <td>".(isset($row['departureSegments'][4]['ArrivalSegArrivalTime'])?$row['departureSegments'][4]['ArrivalSegArrivalTime']:"")."</td>
                <td>".(isset($row['departureSegments'][4]['ArrivalSegSeatNumber'])?$row['departureSegments'][4]['ArrivalSegSeatNumber']:"")."</td>
                ";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</section>
<script src="<?=base_url()?>assets/admin/js/jquery.table2excel.js"></script>
<script type="text/javascript">
    $(function(){
        var checkBoxesList = $("#checkBoxesList");
        var checkBoxes = checkBoxesList.find("input[type='checkbox']");

        checkBoxes.each(function(key,val){
            if($(this).attr("class") !== "selectAll"){
                var checkBoxName = $(this).attr("name");
                var table = $("#reportsTable");
                var tableHeadIndex = table.find("thead th."+checkBoxName).index();
//                console.log(table.find("tbody tr td").eq(tableHeadIndex).text());
                if(tableHeadIndex === -1){
                    /*console.log(checkBoxName);
                    console.log($(this).attr("class"))*/
                }

                if($(this).is(":checked")){
//                console.log(tableHeadIndex);
               // table.find("th").eq(tableHeadIndex).show();
              //  table.find("td").eq(tableHeadIndex).show();
                table.find("tr").find('td:eq('+tableHeadIndex+')').show();
                table.find("tr").find('th:eq('+tableHeadIndex+')').show();
                }else{
               // table.find("tr").find("th").eq(tableHeadIndex).hide();
               // table.find("tr").find("td").eq(tableHeadIndex).hide();
                table.find("tr").find('td:eq('+tableHeadIndex+')').hide();
                table.find("tr").find('th:eq('+tableHeadIndex+')').hide();
                }
            }
        });

       // checkBoxesList.hide();
        $(".anchor").on('click',function(){
            checkBoxesList.toggle();
        });

        $(".selectAll").on("change",function(){
            console.log('checkbox');
            var checkbox = $(this);
            if(this.checked){
                console.log('checked');
                console.log(checkbox);
                checkbox.parents('div.checkBoxGroupDiv').find('input[type="checkbox"]').prop("checked",true);
            }else{
                console.log('unchecked');
                checkbox.parents('div.checkBoxGroupDiv').find('input[type="checkbox"]').prop("checked",false);
            }

        });
    });

    $("#exportReport").on("click",function(){
        var text = "<i class=\"icon-info-sign icon-3x pull-left\"></i>Do you want to save the generated Report?<br /> ";
        new Messi(text, {
            title: "Generate Report",
            modal: true,
            closeButton: true,
            buttons: [{
                id: 0,
                label: "Save Report",
                val: 'Y'
            },{
                id: 1,
                label: "Generate Only(Default)",
                val: 'D'
            },{
                id: 2,
                label: "Generate Only(Single)",
                val: 'S'
            }],
            callback: function (val) {
                //We Also Need to Save the Report
                var reportName = "";
                reportName = prompt("Specify Name For Report");
                var checkBoxesList = $("#checkBoxesList");
                var checkBoxes = checkBoxesList.find("input[type='checkbox']:checked");
                var postData = {
                    reportName:reportName,
                    saveReport:val,
                    'selectedChecks[]' : []
                };
                var selectedChecks = [];
                checkBoxes.each(function() {
                    if($(this).attr("class") !== "selectAll"){
                        postData['selectedChecks[]'].push($(this).attr('name'));
                    }
                });
                console.log(postData);
                $.ajax({
                    type: 'post',
                    url: "<?=base_url();?>admin/Reports/saveReport",
                    data: postData,
                    cache: false,
                    beforeSend: function () {
                        showLoader();
                    },
                    success: function (msg) {
                        hideLoader();
                        var data = msg.split("::");
                        $("#msgholder").html(data[1]);
                        $('html, body').animate({
                            scrollTop: 0
                        }, 600);
                        
                        if(data[0] === "OK"){
                            window.location.href = data[2];
                        }

                    }
                });
            }
        });
    });

    $("#saveAsDefault").on("click",function(){
        var text = "<i class=\"icon-info-sign icon-3x pull-left\"></i>Are you sure, you want to save the selected checks as default Selection?<br />";
        new Messi(text, {
            title: "Save Check Boxes as Default Selection",
            modal: true,
            closeButton: true,
            buttons: [{
                id: 0,
                label: "Yes",
                val: 'Y'
            }],
            callback: function () {
                var checkBoxesList = $("#checkBoxesList");
                var checkBoxes = checkBoxesList.find("input[type='checkbox']:checked");
                var postData = {
                    'selectedChecks[]' : []
                };
                var selectedChecks = [];
                checkBoxes.each(function() {
                    if($(this).attr("class") !== "selectAll"){
                        postData['selectedChecks[]'].push($(this).attr('name'));
                    }
                });
                $.ajax({
                    type: 'post',
                    url: "<?=base_url();?>admin/Reports/saveDefaultChecks",
                    data: postData,
                    cache: false,
                    beforeSend: function () {
                        showLoader();
                    },
                    success: function (msg) {
                        hideLoader();
                        var data = msg.split("::");
                        $("#msgholder").html(data[1]);
                        $('html, body').animate({
                            scrollTop: 0
                        }, 600);
                    }
                });
            }
        });
    });

    window.onload = function(){
        var selectAll = $(".selectAll");
        $.each(selectAll, function(i, val){
            var $select = 1;
            var checkInput = $(selectAll[i]).parents('div.checkBoxGroupDiv').find('input[type="checkbox"]:not(.selectAll)');
            $.each(checkInput, function(j, val2){
                if($(checkInput[j]).attr("checked") != "checked"){
                    $select = 0; 
                }
            });
            if($select == 1){
                 $(selectAll[i]).prop("checked", true);
            }
        });
        
    }
</script>

