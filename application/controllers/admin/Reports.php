<?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/18/2016
 * Time: 7:05 PM
 */
class Reports extends Backend_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){

        $PTable = "register R";
        $selectData = array(
            '
            R.id AS RegID,
              R.reg_id AS RegNo,
              CASE R.guest_of WHEN 0 THEN "Winner" WHEN guest_of IS NULL THEN "" ELSE "Companion" END AS winnerCompanion,
              CASE R.club when 1 THEN "Pres Club" ELSE "PaceSetters" END AS pressClubPaces,
              CASE U.regclose when 0 THEN "Open" ELSE "Close" END AS Status,
              R.first_name as FirstName,
              R.last_name as LastName,
              R.title as Title,
              R.birth_date AS DOB,
              R.name_badge AS NameBadge,
              R.name_badge_last AS NameBadgeLast,
              R.gender AS Gender,
              R.shirt_size AS ShirtSize,
              R.birth_country,
              R.home AS Home,
              R.work AS Work,
              R.cell AS Cell,
              R.email AS Email,
              R.alt_email AS AltEmail,
              R.st_1address AS St1Address,
              R.city AS City,
              R.State AS State,
              R.zip AS Zip,
              R.country,
              R.passport AS Passport,
              R.citizen,
              R.issue_city AS IssueCity,
              R.issue_date AS IssueDate,
              R.expire_date AS ExpireDate,
              R.us_visa AS UsVisa,
              R.obtain_visa AS ObtainVisa,
              R.visa_type as VisaType,
              R.visa_exp_date as VisaExpDate,
              R.emergency_name AS EmergencyName,
              R.emergency_home AS EmergencyHome,
              R.emergency_work AS EmergencyWork,
              R.emergency_cell AS EmergencyCell,
              R.dr_name AS DrName,
              R.dr_day_phone AS DrDayPhone,
              R.dr_alt_phone AS DrAltPhone,
              R.med_conditions AS MedConditions,
              R.medication AS Medication,
              R.med_food AS MedFoods,
              R.religious_food AS ReligiousFood,
              CASE R.diabetic WHEN 1 THEN "Yes" ELSE "No" END AS Diabetic,
              CASE R.hypertension WHEN 1 THEN "Yes" ELSE "No" END AS Hypertension,
              CASE R.vegetarian WHEN 1 THEN "Yes" ELSE "No" END AS Vegetarian,
              CASE R.fish WHEN 1 THEN "Yes" ELSE "No" END AS Fish,
              CASE R.chicken WHEN 1 THEN "Yes" ELSE "No" END AS Chicken,
              R.intolerant AS LactoseGluten,
              R.occasion AS Occasion,
              R.special_date AS SpecialDate,
              R.fflyer AS FFlyer,
              R.ff_number AS FNumber,
              R.ff_airline AS FAirline,
              R.off_airline AS OtherFAirLine,
              R.fflyer_alt AS FFlyerAlt,
              R.ff_number_alt AS FNumberAlt,
              R.ff_airline_alt AS FAirlineAlt,
              R.off_airline_alt AS OtherFAirlineAlt,
              R.seating AS Seating,
              R.bags AS Bags,
              R.bed AS Bed,
              R.airport_code AS AirportCode,
              R.depart_date AS HomeCityDpt,
              R.return_date AS ReturnDate,
              R.air_notes AS AirNotesReturn,
              R.air_notes_dpt AS AirNotesHome,
              R.travel_req AS TravelRequest,
              R.spouse_activity AS SpouseActivity,
              R.cc_type AS CCType,
              R.card_name AS CardName,
              R.card_number AS CardNumber,
              R.exp_date AS CardExpDate,
              R.cvv AS CVV,
              R.cc_st_1address AS ccST1Address,
              R.cc_st_2address AS ccST2Address,
              R.cc_city AS ccCity,
              R.cc_state AS ccState,
              R.cc_zip AS ccZip,
              R.cc_country,
              R.choice1,
              R.choice2,
              R.choice3,
              R.arrival_date_dest AS ArrDateDst,
              R.arrival_flight_dest AS ArrFlightDst,
              R.arrival_time_dest AS ArrTimeDst,                          
              R.depart_date_dest AS DepartDateDst,
              R.depart_flight_dest AS DepartFlightDst,
              R.depart_time_dest AS DepartTimeDst,
              R.room_number AS RoomNo,
              R.desired_dpt_date as DesiredDptDate,
              R.desired_ret_date as DesiredRetDate,
              U.userlevel as Level,
              GROUP_CONCAT(T.tt_tf) AS TtTf,
              GROUP_CONCAT(T.segment) AS Segments,
              GROUP_CONCAT(T.id) AS TravelID,
              GROUP_CONCAT(dest_from) AS DestFrom,
              GROUP_CONCAT(dest_to) AS DestTo,
              GROUP_CONCAT(airline_flight) AS AirLineFlight, 
              GROUP_CONCAT(class) AS SegmentClass,
              GROUP_CONCAT(`date`) AS DateOfService,  
              GROUP_CONCAT(depart_time) AS DepartTime,
              GROUP_CONCAT(arrival_time) AS ArrivalTime,
              GROUP_CONCAT(seat_no) AS SeatNo
            ',false
        );
        $joins = array(
            array(
                'table' => 'users U',
                'condition' => 'U.id = R.user_id',
                'type' => 'LEFT'
            ),
            array(
                'table' => 'travel T',
                'condition' => 'T.reg_id = R.reg_id',
                'type' => 'LEFT'
            )
        );
        $countryFields = ['B'=>['birth_country', 'BirthCountry'], 'C'=>['country', 'Country'], 'CI'=>['citizen', 'Citizen'], 'CC'=>['cc_country','ccCountry']];
        foreach($countryFields as $key => $contField){
          $selectData[0] .= ", ".$key."."."name AS ".$contField[1];
          array_push($joins, [
              'table'=>'countries '.$key,
              'condition' => $key.'.id = R.'.$contField[0],
              'type' => 'LEFT'
            ]);
        }
        $choices = ['Ch1'=>['choice1','Choice1'], 'Ch2'=>['choice2','Choice2'], 'Ch3'=>['choice3','Choice3']];
        foreach($choices as $key => $choice){
          $selectData[0] .= ", ".$key."."."activity AS ".$choice[1];
          array_push($joins, [
              'table'=>'activities '.$key,
              'condition' => $key.'.id = R.'.$choice[0],
              'type' => 'LEFT'
            ]);
        }
        $where = '';
        $groupBy = 'RegID';
        $list = $this->Common_model->select_fields_where_like_join($PTable,$selectData,$joins,$where,false,'','',$groupBy);
        $query = $this->db->last_query();
        $listArray = json_decode(json_encode($list),true);
        if(!empty($listArray) && is_array($listArray)){
            foreach($listArray as $key=>$innerArray){
                //currently only keeping 4 segments
                $arrivalSegments = array(
                     1 => array(),
                     2 => array(),
                     3 => array(),
                     4 => array()
                );
                $departureSegments = array(
                     1 => array(),
                     2 => array(),
                     3 => array(),
                     4 => array()
                );
                if(!empty($innerArray['Segments'])){
                    $segmentsExploded = explode(",",$innerArray['Segments']);
                    $TtTf = explode(",",$innerArray['TtTf']);
                    $DestFromExploded = explode(",",$innerArray['DestFrom']);
                    $DestToExploded = explode(",",$innerArray['DestTo']);
                    $AirLineFlightExploded = explode(",",$innerArray['AirLineFlight']);
                    $SegmentClassExploded = explode(",",$innerArray['SegmentClass']);
                    $DateOfServiceExploded = explode(",",$innerArray['DateOfService']);
                    $DepartTimeExploded = explode(",",$innerArray['DepartTime']);
                    $ArrivalTimeExploded = explode(",",$innerArray['ArrivalTime']);
                    $SeatNoExploded = explode(",",$innerArray['SeatNo']);

                    foreach($segmentsExploded as $explodedKey=> $explodedValue){
                        if(intval($TtTf[$explodedKey]) === 1){ //means Arrival Segments
                            $arrivalSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegFrom'] = $DestFromExploded[$explodedKey];
                            $arrivalSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegTo'] = $DestToExploded[$explodedKey];
                            $arrivalSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegFlightNumber'] = $AirLineFlightExploded[$explodedKey];
                            $arrivalSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegClass'] = $SegmentClassExploded[$explodedKey];
                            $arrivalSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegDOS'] = $DateOfServiceExploded[$explodedKey];
                            $arrivalSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegDepartureTime'] = $DepartTimeExploded[$explodedKey];
                            $arrivalSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegArrivalTime'] = $ArrivalTimeExploded[$explodedKey];
                            $arrivalSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegSeatNumber'] = $SeatNoExploded[$explodedKey];
                        }elseif(intval($TtTf[$explodedKey]) === 2){ //means Departure Segments
                            $departureSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegFrom'] = $DestFromExploded[$explodedKey];
                            $departureSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegTo'] = $DestToExploded[$explodedKey];
                            $departureSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegFlightNumber'] = $AirLineFlightExploded[$explodedKey];
                            $departureSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegClass'] = $SegmentClassExploded[$explodedKey];
                            $departureSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegDOS'] = $DateOfServiceExploded[$explodedKey];
                            $departureSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegDepartureTime'] = $DepartTimeExploded[$explodedKey];
                            $departureSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegArrivalTime'] = $ArrivalTimeExploded[$explodedKey];
                            $departureSegments[intval($segmentsExploded[$explodedKey])]['ArrivalSegSeatNumber'] = $SeatNoExploded[$explodedKey];
                        }
                    }

                    $listArray[$key]['arrivalSegments'] = $arrivalSegments;
                    $listArray[$key]['departureSegments'] = $departureSegments;
                }
              // remove admin data 
              if($innerArray['Level'] == 9) 
                unset($listArray[$key]);
            }
            $viewData['UsersRegList'] = $listArray;
            $viewData['query'] = $query;
        }

        //Need to work for CheckBoxes also.
        $checkBoxSelectData = 'col AS Column, visible';
        $viewData['checkBoxesColumns'] = $this->Common_model->select_fields('report_checkbox_settings',$checkBoxSelectData,false);


        //checkbox
        $this->data['viewData'] = array(
            'page_data' => $viewData,
            'page_title' => "Reports",
            'page_view' => "admin/pages/reports/index"
        );
        $this->load->view('admin/shared/master', $this->data);
    }

    public function saved(){

        $table = "reporttable";
        $selectData = '*';
        $viewData['Reports'] = $this->Common_model->select_fields($table,$selectData);

        //checkbox
        $this->data['viewData'] = array(
            'page_data' => $viewData['Reports'],
            'page_title' => "Reports",
            'page_view' => "admin/pages/reports/saved"
        );
        $this->load->view('admin/shared/master', $this->data);
    }

    public function saveReport(){
        //Check if we need to save the report or Not.
        $postedValues = $this->input->post('saveReport');
        if(!isset($postedValues)){
          $postedValues = 'D';
        }
        //report name
        $titleToSaveWith = $this->input->post('reportName');
        if(empty($titleToSaveWith))
          $titleToSaveWith = date("Y-m-d")."-".time();
        //Get all the selected CheckBoxes.
        $postedSelectedChecks = $this->input->post('selectedChecks');


        // added by AD 
        // travel array
        $travelCheckboxes = $this->travelCheckboxes();

        $regCheckboxes = $this->registerCheckboxes();
        $guestRegCheckboxes = $this->registerCheckboxes('G_');

        $PTable = "register R";
        $selectData = array('R.reg_id AS RegNo, R.id as Id, CASE status WHEN \'confirm\' THEN \'Y\' ELSE \'N\' END AS \'Lock\', U.userlevel as Level, R.user_id as UserID, R.noguest as isGuest', false);
        $joins = array(
            array(
                'table' => 'users U',
                'condition' => 'U.id = R.user_id',
                'type' => 'LEFT'
            ),
        );

        $excelHeads = array();
        $guestSelectData = ['R.reg_id AS G_RegNo, R.id as Id', false];
        array_push($excelHeads,"Reg ID", "Lock");
        foreach ($postedSelectedChecks as $key=>$val){

            if($val==='winnerCompanion' && $postedValues != 'S'){
                $selectData[0] .= ', CASE R.guest_of WHEN 0 THEN "Winner" WHEN guest_of IS NULL THEN "" ELSE "Companion" END AS winnerCompanion';
                array_push($excelHeads,"Winner/Companion");
            }
            if($val==='club'){
                $selectData[0] .= ', CASE R.club when 1 THEN "Pres Club" ELSE "PaceSetters" END AS pressClubPaces';
                array_push($excelHeads,"Pres Club/PaceS");
            }

            if(isset($regCheckboxes[$val])){
              $selectData[0] .= $regCheckboxes[$val]['name_as'];
              if($postedValues === 'S'){ // when guest and winner record in single row
                array_push($excelHeads, 'W_'.$regCheckboxes[$val]['title']);
              } else {
                array_push($excelHeads, $regCheckboxes[$val]['title']);
              }
            }

            if(in_array($val, $travelCheckboxes)){
              if($postedValues != 'S')
                array_push($excelHeads, $val);
              else 
                array_push($excelHeads, 'W_'.$val);
            }
        }
        $where = '';
        // check if single row report then only get winner records
        if($postedValues === 'S'){
          array_push($excelHeads,"G_Reg_ID");
          // add headers for guest 
          foreach ($postedSelectedChecks as $key=>$val){

            if(isset($regCheckboxes[$val])){
              $guestSelectData[0] .= $guestRegCheckboxes[$val]['name_as'];
              array_push($excelHeads, 'G_'.$regCheckboxes[$val]['title']);
            }
            if(in_array($val, $travelCheckboxes))
                array_push($excelHeads, 'G_'.$val);
          }


          $where = ['user_id!='=>'0'];
        } 



        $groupBy = 'R.id';
        $list = $this->Common_model->select_fields_where_like_join($PTable,$selectData,$joins,$where,false,'','',$groupBy,'','',true);
        $countryFields = ['BirthCountry', 'Country', 'Citizen', 'ccCountry'];
        $choices = ['Choice1', 'Choice2', 'Choice3'];

      //  $excelHeads = $this->excelHeader($excelHeads,$postedSelectedChecks);
        if(!empty($list) && is_array($list)){
            foreach($list as $key=>$innerArray){  
                // remove admin data 
              if($innerArray['Level'] == 9 || ($innerArray['UserID'] == 0 && $innerArray['isGuest'] == 'No')){
                unset($list[$key]);
                continue;
              } else unset($list[$key]['Level']);
                //currently only keeping 4 segments
              $list[$key] = $this->filterValues($list[$key], $countryFields,$choices);
          
              $list[$key] = $this->mapTravels($list[$key], $excelHeads, $postedValues === 'S' ? "W_":"");

              if($postedValues === 'S' && $innerArray['isGuest'] == 'Yes')
                $list[$key] = $this->guestData($list[$key],$guestSelectData,$postedSelectedChecks,$guestRegCheckboxes, $countryFields,$choices, $excelHeads);
              
              unset($list[$key]['Id']);
              unset($list[$key]['UserID']);
              unset($list[$key]['isGuest']);

            }

           

            //finally generate the excel report now
             $this->load->library('excel');
            //activate worksheet number 1
            $this->excel->setActiveSheetIndex(0);
            //name the worksheet
            /*$this->excel->getActiveSheet()->setTitle(date('Y-m-d').'Customized Report');
            $this->excel->getActiveSheet()->setCellValue('A1', 'Sagicor Customized Report');
            //change the font size
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
            //make the font become bold
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
            //merge cell A1 until D1
            $this->excel->getActiveSheet()->mergeCells('A1:E1');

            $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            */
            //For Heading
            // $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
            $rowIndex = count($list)+1;
            $this->excel->getActiveSheet()->fromArray($excelHeads, null, 'A1');
            //$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
            $row = $this->excel->getActiveSheet()->getRowIterator(1)->current();
            $cellIterator = $row->getCellIterator();
            //$cellIterator->setIterateOnlyExistingCells(false);
            foreach ($cellIterator as $cell) {
                if($cell->getValue() == 'W_cardNum' || $cell->getValue() == 'cardNum'){
                  $colIndex = $cell->getColumn();
                  $this->excel->getActiveSheet()->getStyle('A1:'.$colIndex.$rowIndex)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    
                }
            }
            //anotther way of making bold
            $first_letter = PHPExcel_Cell::stringFromColumnIndex(0);
            $last_letter = PHPExcel_Cell::stringFromColumnIndex(count($excelHeads)-1);
            $header_range = "{$first_letter}1:{$last_letter}1";
            $this->excel->getActiveSheet()->getStyle($header_range)->getFont()->setBold(true);

            $this->excel->getActiveSheet()->fromArray($list,null,'A2');
            $filename = $titleToSaveWith.'.xlsx';
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
            $dirPath = FCPATH.'uploads/generated_reports/';
            $filePath = $dirPath.$filename;
            if(!is_dir(FCPATH.'uploads/generated_reports')){
                mkdir($dirPath,0777,true);
            }

            $objWriter->save($filePath);


        //We Also Need to Check, do we need to save this report?
        //If So then Save it in db.
        $this->db->trans_start();
        if(isset($postedValues) && $postedValues === 'Y'){
            $reportHeadInsertData = array(
                'reportTitle' => $titleToSaveWith,
                'reportDateSaved' => date("Y-m-d")
            );
            $reportID = $this->Common_model->insert_record('reporttable',$reportHeadInsertData);
            if(isset($reportID) && is_numeric($reportID) && $reportID > 0){
                //if Head is inserted successfully inset the lines now
                //first need to get the checks ids.
                $CheckNames = "'".implode("','",$postedSelectedChecks)."'";
                $selectChecks = array('id AS CheckID',false);
                $whereChecks = 'col IN ('.$CheckNames.')';
                $selectedChecksIDs = $this->Common_model->select_fields_where('report_checkbox_settings',$selectChecks,$whereChecks,false,'','','','','',true);

                if(!empty($selectedChecksIDs)){
                    $columnsIDs = array_column($selectedChecksIDs,'CheckID');
                    foreach($columnsIDs as $id){
                        $toInsertArray = array(
                            'reportID' => $reportID,
                            'checkID' => $id
                        );
                        $this->Common_model->insert_record('report_checks',$toInsertArray);
                    }
                }
            }
        }
        $this->db->trans_complete();

          if ($this->db->trans_status() === true) {
              echo "OK::";
              msgOk("Report Checks Successfully Saved");
              echo "::" . base_url()."uploads/generated_reports/".$filename;
          } else {
              echo "FAIL::";
              msgError("Could Not Save Report");
          }
        }
    }

    public function generateSavedReport($reportID, $reportType)
    {
        if(!isset($reportType) || empty($reportType))
          redirect(previousURL());

        //report
        if (!isset($reportID) || !is_numeric($reportID)) {
            flash_msg("FAIL::" . $this->data['ErrorMsg']['Post']);
            redirect(previousURL());
        }


        $table = "reporttable RT";
        $selectData = 'col as CheckBoxName';
        $joins = array(
            array(
                'table' => 'report_checks RC',
                'condition' => 'RC.reportID = RT.reportID',
                'type' => 'INNER'
            ),
            array(
                'table' => 'report_checkbox_settings RCS',
                'condition' => 'RCS.id = RC.checkID AND RCS.col != "regID"',
                'type' => 'INNER'
            )
        );
        $where = array(
            'RT.reportID' => $reportID,
        );
        $selectedCheckboxes = $this->Common_model->select_fields_where_like_join($table, $selectData, $joins, $where, false, '', '', '', '', '', true);


        $travelCheckboxes = $this->travelCheckboxes();
        $regCheckboxes = $this->registerCheckboxes();
        $guestRegCheckboxes = $this->registerCheckboxes('G_');
        $guestSelectData = ['R.reg_id AS G_RegNo, R.id as Id', false];
        if (!empty($selectedCheckboxes) && is_array($selectedCheckboxes)) {
            $selectedCheckboxesColumn = array_column($selectedCheckboxes, 'CheckBoxName');


            $selectData = array("R.reg_id AS RegNo,R.id as Id, CASE status WHEN 'confirm' THEN 'Y' ELSE 'N' END AS 'Lock', U.userlevel as Level, R.user_id as UserID, R.noguest as isGuest", false);
            array_unshift($selectedCheckboxesColumn,"Reg ID", "Lock");
            foreach ($selectedCheckboxesColumn as $key => $val) {
                if ($val === 'winnerCompanion' && $reportType != 'S') {
                    $selectData[0] .= ', CASE R.guest_of WHEN 0 THEN "Winner" WHEN guest_of IS NULL THEN "" ELSE "Companion" END AS winnerCompanion';
                }
                if($val==='club'){
                  $selectedCheckboxesColumn[$key] = "PresClub-PaceS";
                    $selectData[0] .= ', CASE R.club when 1 THEN "Pres Club" ELSE "PaceSetters" END AS pressClubPaces';
                }

                if(isset($regCheckboxes[$val])){
                  $selectData[0] .= $regCheckboxes[$val]['name_as'];
                }
            }

            //do the query
            $joinsForReport = array(
                array(
                    'table' => 'users U',
                    'condition' => 'U.id = R.user_id',
                    'type' => 'LEFT'
                ),
            );

            $where = '';
            if($reportType == 'S'){
              array_push($selectedCheckboxesColumn,"G_Reg_ID");
              // add headers for guest 
              foreach ($selectedCheckboxesColumn as $key=>$val){

                if(isset($regCheckboxes[$val])){
                  $guestSelectData[0] .= $guestRegCheckboxes[$val]['name_as'];
                  array_push($selectedCheckboxesColumn, 'G_'.$regCheckboxes[$val]['title']);
                }
                if(in_array($val, $travelCheckboxes))
                    array_push($selectedCheckboxesColumn, 'G_'.$val);


                if($reportType == 'S') // when guest and winner record in single row
                  $selectedCheckboxesColumn[$key] = 'W_'.$selectedCheckboxesColumn[$key];
              }

              $where = ['user_id !='=> 0];
            }

            $groupBy = 'R.id';
            $list = $this->Common_model->select_fields_where_like_join('register R', $selectData, $joinsForReport, $where, false, '', '', $groupBy, '', '', true);
            
            $countryFields = ['BirthCountry', 'Country', 'Citizen', 'ccCountry'];
            $choices = ['Choice1', 'Choice2', 'Choice3'];
            if (!empty($list) && is_array($list)) {
                foreach ($list as $key => $innerArray) {
                    if($innerArray['Level'] == 9 || ($innerArray['UserID'] == 0 && $innerArray['isGuest'] == 'No')){
                      unset($list[$key]);
                      continue;
                    } else unset($list[$key]['Level']);

                  $list[$key] = $this->filterValues($list[$key], $countryFields,$choices
                    );
                  $list[$key] = $this->mapTravels($list[$key], $selectedCheckboxesColumn, $reportType == 'S' ? "W_":"");


                if($reportType == 'S' && $innerArray['isGuest'] == 'Yes')
                  $list[$key] = $this->guestData($list[$key],$guestSelectData,$selectedCheckboxesColumn,$guestRegCheckboxes, $countryFields,$choices, $selectedCheckboxesColumn);

                  unset($list[$key]['Id']);
                  unset($list[$key]['UserID']);
                  unset($list[$key]['isGuest']);
                }

                if($reportType == 'S'){// modify header
                  if (($key = array_search('W_winnerCompanion', $selectedCheckboxesColumn)) !== false) 
                    unset($selectedCheckboxesColumn[$key]);
                } 

               
                //finally generate the excel report now
                $this->load->library('excel');
                //activate worksheet number 1
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
               /* $this->excel->getActiveSheet()->setTitle(date('Y-m-d') . 'Customized Report');
                $this->excel->getActiveSheet()->setCellValue('A1', 'Sagicor Customized Report');
                //change the font size
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                //merge cell A1 until D1
                $this->excel->getActiveSheet()->mergeCells('A1:E1');

                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);*/

                $rowIndex = count($list)+1;
                $this->excel->getActiveSheet()->fromArray($selectedCheckboxesColumn, null, 'A1');
                //$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $row = $this->excel->getActiveSheet()->getRowIterator(1)->current();
                $cellIterator = $row->getCellIterator();
                //$cellIterator->setIterateOnlyExistingCells(false);
                foreach ($cellIterator as $cell) {
                    if($cell->getValue() == 'W_cardNum' || $cell->getValue() == 'cardNum'){
                      $colIndex = $cell->getColumn();
                      $this->excel->getActiveSheet()->getStyle('A1:'.$colIndex.$rowIndex)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                        
                    }
                }

                //anotther way of making bold
                $first_letter = PHPExcel_Cell::stringFromColumnIndex(0);
                $last_letter = PHPExcel_Cell::stringFromColumnIndex(count($selectedCheckboxesColumn) - 1);
                $header_range = "{$first_letter}1:{$last_letter}1";
                $this->excel->getActiveSheet()->getStyle($header_range)->getFont()->setBold(true);

                $this->excel->getActiveSheet()->fromArray($list, null, 'A2');
                $filename = date("Y-m-d") . "-" . time() . '.xlsx';
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
                $dirPath = FCPATH . 'uploads/generated_reports/';
                $filePath = $dirPath . $filename;
                if (!is_dir(FCPATH . 'uploads/generated_reports')) {
                    mkdir($dirPath, 0777, true);
                }

                $filename='customized_report.xlsx';

                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache

                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');

            }
        }
    }

    public function deleteSavedReport($reportID){
        if(!isset($reportID) || !is_numeric($reportID)){
            flash_msg("FAIL::".$this->data['ErrorMsg']['Post']);
            redirect(previousURL());
        }
        $whereDelete = array(
            'reportID' => $reportID
        );
        $deleteResult = $this->Common_model->delete('reporttable',$whereDelete);
        if(isset($deleteResult) && $deleteResult > 0){
            flash_msg("OK::Record Successfully Deleted");
        }else{
            flash_msg("FAIL::Some Error Occurred, Records could not be deleted");
        }
        redirect('admin/Reports/saved');
    }

    public function saveDefaultChecks(){
        //First un-select all the existing checks
        $table = 'report_checkbox_settings';
        $updateData = array(
            'visible' => 0
        );
        $where = array(
            'visible' => 1
        );
        $this->Common_model->update($table,$where,$updateData);

        //Get all the selected CheckBoxes.
        $postedSelectedChecks = $this->input->post('selectedChecks');
        try {

            $CheckNames = "'" . implode("','", $postedSelectedChecks) . "'";

            //Now again update the checks
            $updateData = array(
                'visible' => 1
            );
            $where = 'col IN (' . $CheckNames . ')';
            $updateResult = $this->Common_model->update($table, $where, $updateData);
            if($updateResult === true){
                echo "OK::";
                msgOk("Successfully Updated the Default Checks");
            }else{
                echo "FAIL::";
                msgError("Could Not Update the Default Checks");
            }
        } catch (Exception $ex) {
            msgError("Could Not Save Checks");
        }
    }


    // guest fields
    protected function guestData($list, $guestSelectData, $postedSelectedChecks, $guestRegCheckboxes, $countryFields,$choices, $excelHeads){
      $data = $this->Common_model->select_fields_where('register R', $guestSelectData, ['guest_of'=>$list['UserID']], true, '', '', '', '', '',true);
     
      if(!$data){
          $data = ['Id'=>0];
          foreach ($postedSelectedChecks as $key=>$val){
            if(isset($guestRegCheckboxes[$val]))
              $data['G_'.$val] = '';
          }
      } else {
        $data = $this->filterValues($data, $countryFields,$choices, 'G_');
      }

      $data = $this->mapTravels($data, $excelHeads, 'G_');

      unset($data['Id']);
      return array_merge($list, $data);

    }

    // find associative travel
    protected function mapTravels($list, $excelHeads, $type=""){
     

      $route = $type.'Arr';
      $j = 0;
      for($i=1; $i<=8;$i++){
        $j += 1;
        $travelSeg[$i] = $this->Common_model->select_fields_where('travel', '*', ['regid'=>$list['Id'],'segment'=>$i], true);

        if($i==5)
          $j = 1;

        if($i > 4)
          $route = $type.'Dpt';
       

        if(in_array($route.'_Segment_'.$j.'_From', $excelHeads))
            $list[$route.'_Segment_'.$j.'_From'] = $travelSeg[$i] ? $travelSeg[$i]->dest_from:'';

        if(in_array($route.'_Segment_'.$j.'_To', $excelHeads))
            $list[$route.'_Segment_'.$j.'_To'] = $travelSeg[$i] ? $travelSeg[$i]->dest_to:'';

        if(in_array($route.'_Segment_'.$j.'_Date', $excelHeads))
            $list[$route.'_Segment_'.$j.'_Date'] = $travelSeg[$i] ? $travelSeg[$i]->date:'';

        if(in_array($route.'_Segment_'.$j.'_Flight_No', $excelHeads))
            $list[$route.'_Segment_'.$j.'_Flight_No'] = $travelSeg[$i] ? $travelSeg[$i]->airline_flight:'';

        if(in_array($route.'_Segment_'.$j.'_Class', $excelHeads))
            $list[$route.'_Segment_'.$j.'_Class'] = $travelSeg[$i] ? $travelSeg[$i]->class:'';

        if(in_array($route.'_Segment_'.$j.'_Seat_No', $excelHeads))
            $list[$route.'_Segment_'.$j.'_Seat_No'] = $travelSeg[$i] ? $travelSeg[$i]->seat_no:'';

        if(in_array($route.'_Segment_'.$j.'_Dept_Time', $excelHeads))
            $list[$route.'_Segment_'.$j.'_Dept_Time'] = $travelSeg[$i] ? $travelSeg[$i]->depart_time:'';

        if(in_array($route.'_Segment_'.$j.'_Arr_Time', $excelHeads))
            $list[$route.'_Segment_'.$j.'_Arr_Time'] = $travelSeg[$i] ? $travelSeg[$i]->arrival_time:'';


      }
          
     
      return $list;
    }

    protected function excelHeader($excelHeads, $selectedCheckboxes){
        $count = 1;
        for ($i = 1; $i <= 4; $i++){
          // get segments 
          array_push($excelHeads, "Arr|Segment ".$count." From","Arr|Segment ".$count." To","Arr|Segment ".$count." Flight No.", "Arr|Segment ".$count." Date","Arr|Segment ".$count." Class", "Arr|Segment ".$count." Dept Time","Arr|Segment ".$count." Arr Time", "Arr|Segment ".$count." Seat No.");
          $count++;
        }

        $count = 1;
        for ($i = 1; $i <= 4; $i++){
          // get segments 
          array_push($excelHeads,"Dpt|Segment ".$count." From","Dpt|Segment ".$count." To", "Dpt|Segment ".$count." Flight No.", "Dpt|Segment ".$count." Date","Dpt|Segment ".$count." Class", "Dpt|Segment ".$count." Dept Time","Dpt|Segment ".$count." Dpt Time", "Dpt|Segment ".$count." Seat No.");
          $count++;
        }
        return $excelHeads;
    }


    protected function registerCheckboxes($type=''){

        return [
            'title'=>['title'=>'Title','name_as'=>', R.title as '.$type.'Title'],
            'firstName'=>['title'=>'First Name','name_as'=>', R.first_name as '.$type.'FirstName'],
            'lastName'=>['title'=>'Last Name','name_as'=>', R.last_name as '.$type.'LastName'],
            'dateOfBirth'=>['title'=>'D.O.B','name_as'=>', R.birth_date AS '.$type.'DOB'],
            'badgeFirstName'=>['title'=>'Badge:First Name','name_as'=>', R.name_badge AS '.$type.'NameBadge'],
            'badgeLastName'=>['title'=>'Badge: Last Name','name_as'=>', R.name_badge_last AS '.$type.'NameBadgeLast'],
            'gender'=>['title'=>'Gender','name_as'=>', R.gender AS '.$type.'Gender'],
            'shirtSize'=>['title'=>'Shirt Size','name_as'=>', R.shirt_size AS '.$type.'ShirtSize'],
            'birth_country'=>['title'=>'Birth Country','name_as'=>', R.birth_country AS '.$type.'BirthCountry'],
            'homeTel'=>['title'=>'Home Tel','name_as'=>', R.home AS '.$type.'Home'],
            'workTel'=>['title'=>'Work Tel','name_as'=>', R.work AS '.$type.'Work'],
            'workCell'=>['title'=>'Work Cell','name_as'=>', R.cell AS '.$type.'Cell'],
            'email'=>['title'=>'Email','name_as'=>', R.email AS '.$type.'Email'],
            'altEmail'=>['title'=>'Alt Email','name_as'=>', R.alt_email AS '.$type.'AltEmail'],
            'st1Address'=>['title'=>'Street 1 Address','name_as'=>', R.st_1address AS '.$type.'St1Address'],
            'st2Address'=>['title'=>'Street 2 Address','name_as'=>', R.st_2address AS '.$type.'St2Address'],
            'city'=>['title'=>'City/State/Province/Parish','name_as'=>', R.city AS '.$type.'City'],
            'zip'=>['title'=>'Zip','name_as'=>', R.zip AS '.$type.'Zip'],
            'country'=>['title'=>'Country','name_as'=>', R.country AS '.$type.'Country'],
            'freqFlyer'=>['title'=>'Frequent Flyer','name_as'=>', R.fflyer AS '.$type.'FFlyer'],
            'freqFlyerNum'=>['title'=>'Freq Num #','name_as'=>', R.ff_number AS '.$type.'FNumber'],
            'fAirLine'=>['title'=>'Airline','name_as'=>', R.ff_airline AS '.$type.'FAirline'],
            'otherFAirLine'=>['title'=>'Other FF Airline','name_as'=>', R.off_airline AS '.$type.'OtherFAirLine'],
            'freqFlyerNum2'=>['title'=>'FF Num Alt','name_as'=>', R.ff_number_alt AS '.$type.'FNumberAlt'],
            'fAirLine2'=>['title'=>'FF Airline Alt','name_as'=>', R.ff_airline_alt AS '.$type.'FAirlineAlt'],
            'otherFAirLine2'=>['title'=>'Other FF Airline Alt','name_as'=>', R.off_airline_alt AS '.$type.'OtherFAirLineAlt'],
            'multipleFF'=>['title'=>'Multiple FF','name_as'=>', R.fflyer_alt AS '.$type.'FFlyerAlt'],
            'seatingPref'=>['title'=>'Seating Pref','name_as'=>', R.seating AS '.$type.'Seating'],
            'bagsNum'=>['title'=>'# of Bags','name_as'=>', R.bags AS '.$type.'Bags'],
            'airNotes'=>['title'=>'Air Notes Home','name_as'=>', R.air_notes_dpt AS '.$type.'AirNotesHome'],
            'airNotesReturn'=>['title'=>'Air Notes Return','name_as'=>', R.air_notes AS '.$type.'AirNotesReturn'],
            'bedConfiguration'=>['title'=>'bedConfiguration','name_as'=>', R.bed AS '.$type.'Bed'],
            'airPortNum'=>['title'=>'airPortNum','name_as'=>', R.airport_code AS '.$type.'AirportCode'],
            'homeCityDpt'=>['title'=>'homeCityDpt','name_as'=>', R.depart_date AS '.$type.'HomeCityDpt'],
            'desiredDptDate'=>['title'=>'DesiredDptDate','name_as'=>', CASE R.depart_date WHEN("On group date - Sunday, June 10") THEN "2018-06-10" WHEN("On President\'s Club departure date - Friday, June 8") THEN "2018-06-08" ELSE R.desired_dpt_date END AS '.$type.'DesiredDptDate'],
            'return'=>['title'=>'Returning Date','name_as'=>', R.return_date AS '.$type.'ReturnDate'],
            'desiredRetDate'=>['title'=>'DesiredRetDate','name_as'=>', CASE R.return_date WHEN("On group date - Friday, June 15") THEN "2018-06-15" ELSE R.desired_ret_date END AS '.$type.'DesiredRetDate'],
            'arrivalFlight'=>['title'=>'ArrivalFlight','name_as'=>', R.arrival_flight_dest AS '.$type.'ArrivalFlight'],
            'arrivalTime'=>['title'=>'ArrivalTime','name_as'=>', R.arrival_time_dest AS '.$type.'ArrivalTime'],
            'pnr'=>['title'=>'Pnr','name_as'=>', R.pnr AS '.$type.'Pnr'],
            'roomNumber'=>['title'=>'RoomNumber','name_as'=>', R.room_number AS '.$type.'RoomNumber'],
            'passportNum'=>['title'=>'passportNum','name_as'=>', R.passport AS '.$type.'Passport'],
            'passportCitizen'=>['title'=>'passportCitizen','name_as'=>', R.citizen AS '.$type.'Citizen'],
            'passportIssueCity'=>['title'=>'passportIssueCity','name_as'=>', R.issue_city AS '.$type.'IssueCity'],
            'passportIssueDate'=>['title'=>'passportIssueDate','name_as'=>', R.issue_date AS '.$type.'IssueDate'],
            'passportExpDate'=>['title'=>'passportExpDate','name_as'=>', R.expire_date AS '.$type.'ExpireDate'],
            'validUS'=>['title'=>'validUS','name_as'=>', R.us_visa AS '.$type.'UsVisa'],
            'ableUS'=>['title'=>'ableUS','name_as'=>', R.obtain_visa AS '.$type.'ObtainVisa'],
            'visaType'=>['title'=>'CanadianVisa/eTA','name_as'=>', R.visa_type AS '.$type.'CanadianVisa'],//...
            'visaExpDate'=>['title'=>'VisaExpDate','name_as'=>', R.visa_exp_date AS '.$type.'VisaExpDate'],
            'emergencyName'=>['title'=>'emergencyName','name_as'=>', R.emergency_name AS '.$type.'EmergencyName'],
            'emergencyHome'=>['title'=>'emergencyHome','name_as'=>', R.emergency_home AS '.$type.'EmergencyHome'],
            'emergencyWork'=>['title'=>'emergencyWork','name_as'=>', R.emergency_work AS '.$type.'EmergencyWork'],
            'emergencyCell'=>['title'=>'emergencyCell','name_as'=>', R.emergency_cell AS '.$type.'EmergencyCell'],
            'DrName'=>['title'=>'DrName','name_as'=>', R.dr_name AS '.$type.'DrName'],
            'DrDay'=>['title'=>'DrDay','name_as'=>', R.dr_day_phone AS '.$type.'DrDayPhone'],
            'DrAlt'=>['title'=>'DrAlt','name_as'=>', R.dr_alt_phone AS '.$type.'DrAltPhone'],
            'medConditions'=>['title'=>'medConditions','name_as'=>', R.med_conditions AS '.$type.'MedConditions'],
            'presMedication'=>['title'=>'presMedication','name_as'=>', R.medication AS '.$type.'Medication'],
            'medFoods'=>['title'=>'medFoods','name_as'=>', R.med_food AS '.$type.'MedFoods'],
            'RelFoods'=>['title'=>'RelFoods','name_as'=>', R.religious_food AS '.$type.'ReligiousFood'],
            'Diabetic'=>['title'=>'Diabetic','name_as'=>', CASE R.diabetic WHEN 1 THEN "Yes" ELSE "No" END AS '.$type.'Diabetic'],     
            'Hypertension'=>['title'=>'Hypertension','name_as'=>', CASE R.hypertension WHEN 1 THEN "Yes" ELSE "No" END AS '.$type.'Hypertension'],
            'Vegetarian'=>['title'=>'Vegetarian','name_as'=>', CASE R.vegetarian WHEN 1 THEN "Yes" ELSE "No" END AS '.$type.'Vegetarian'],
            'VegFish'=>['title'=>'VegFish','name_as'=>', CASE R.fish WHEN 1 THEN "Yes" ELSE "No" END AS '.$type.'Fish'],
            'VegChicken'=>['title'=>'VegChicken','name_as'=>', CASE R.chicken WHEN 1 THEN "Yes" ELSE "No" END AS '.$type.'Chicken'],
            'Lactose'=>['title'=>'Lactose','name_as'=>', R.intolerant AS '.$type.'LactoseGluten'],
            'ccType'=>['title'=>'ccType','name_as'=>', R.cc_type AS '.$type.'CCType'],
            'cardName'=>['title'=>'cardName','name_as'=>', R.card_name AS '.$type.'CardName'],
            'cardNum'=>['title'=>'cardNum','name_as'=>', R.card_number AS '.$type.'CardNumber'],
            'cardExp'=>['title'=>'cardExp','name_as'=>', R.exp_date AS '.$type.'CardExpDate'],
            'cvv'=>['title'=>'cvv','name_as'=>', R.cvv AS '.$type.'CVV'],
            'ccSt1'=>['title'=>'ccSt1','name_as'=>', R.cc_st_1address AS '.$type.'ccST1Address'],
            'ccSt2'=>['title'=>'ccSt2','name_as'=>', R.cc_st_2address AS '.$type.'ccST2Address'],//....
            'ccCity'=>['title'=>'ccCity','name_as'=>', R.cc_city AS '.$type.'ccCity'],
            'ccState'=>['title'=>'ccState','name_as'=>', R.cc_state AS '.$type.'ccState'],
            'ccZip'=>['title'=>'ccZip','name_as'=>', R.cc_zip AS '.$type.'ccZip'],
            'ccCountry'=>['title'=>'ccCountry','name_as'=>', R.cc_country AS '.$type.'ccCountry'],
            'choice1'=>['title'=>'choice1','name_as'=>', R.choice1 AS '.$type.'Choice1'],
            'choice2'=>['title'=>'choice2','name_as'=>', R.choice2 AS '.$type.'Choice2'],
            'choice3'=>['title'=>'choice3','name_as'=>', R.choice3 AS '.$type.'Choice3'],
            'specialOccasion'=>['title'=>'specialOccasion','name_as'=>', R.occasion AS '.$type.'Occasion'],
            'occasionDate'=>['title'=>'occasionDate','name_as'=>', R.special_date AS '.$type.'SpecialDate'],
            'spouceActivity'=>['title'=>'Spouse Activity','name_as'=>', R.spouse_activity AS '.$type.'SpouseActivity'],

        ];
    }

    protected function filterValues($list, $countryFields, $choices, $type=""){
      // decrypt credit card date
      if(isset($list[$type.'CardNumber']))
        $list[$type.'CardNumber'] = " ".decryption($list[$type.'CardNumber'])." ";
      if(isset($list[$type.'CardExpDate']))
        $list[$type.'CardExpDate'] = decryption($list[$type.'CardExpDate']);
      if(isset($list[$type.'CVV']))
        $list[$type.'CVV'] = decryption($list[$type.'CVV']);

      foreach($countryFields as $field){
        if(isset($list[$type.$field])){
          $country = $this->Common_model->select_fields_where('countries','name', ['id'=>$list[$type.$field]], true);
          if(isset($country->name))
            $list[$type.$field] = $country->name;
          if($list[$type.$field] == '0') $list[$type.$field] = "";
        }
      }
      // get choice 
      foreach($choices as $choice){
        if(isset($list[$type.$choice])){
          $activity = $this->Common_model->select_fields_where('activities','activity', ['id'=>$list[$type.$choice]], true);
          if(isset($activity->activity))
            $list[$type.$choice] = $activity->activity;
          if($list[$type.$choice] == '0') $list[$type.$choice] = "";
        }
      }

      return $list;
  }

  protected function travelCheckboxes(){
    return [
     'Arr_Segment_1_From','Arr_Segment_1_To','Arr_Segment_1_Date','Arr_Segment_1_Class','Arr_Segment_1_Flight_No','Arr_Segment_1_Seat_No','Arr_Segment_1_Dept_Time','Arr_Segment_1_Arr_Time','Arr_Segment_2_From','Arr_Segment_2_To','Arr_Segment_2_Date','Arr_Segment_2_Class','Arr_Segment_2_Flight_No','Arr_Segment_2_Seat_No','Arr_Segment_2_Dept_Time','Arr_Segment_2_Arr_Time','Arr_Segment_3_From','Arr_Segment_3_To','Arr_Segment_3_Date','Arr_Segment_3_Class','Arr_Segment_3_Flight_No','Arr_Segment_3_Seat_No','Arr_Segment_3_Dept_Time','Arr_Segment_3_Arr_Time','Arr_Segment_4_From','Arr_Segment_4_To','Arr_Segment_4_Date','Arr_Segment_4_Class','Arr_Segment_4_Flight_No','Arr_Segment_4_Seat_No','Arr_Segment_4_Dept_Time','Arr_Segment_4_Arr_Time','Dpt_Segment_1_From','Dpt_Segment_1_To','Dpt_Segment_1_Date','Dpt_Segment_1_Class','Dpt_Segment_1_Flight_No','Dpt_Segment_1_Seat_No','Dpt_Segment_1_Dept_Time','Dpt_Segment_1_Arr_Time','Dpt_Segment_2_From','Dpt_Segment_2_To','Dpt_Segment_2_Date','Dpt_Segment_2_Class','Dpt_Segment_2_Flight_No','Dpt_Segment_2_Seat_No','Dpt_Segment_2_Dept_Time','Dpt_Segment_2_Arr_Time','Dpt_Segment_3_From','Dpt_Segment_3_To','Dpt_Segment_3_Date','Dpt_Segment_3_Class','Dpt_Segment_3_Flight_No','Dpt_Segment_3_Seat_No','Dpt_Segment_3_Dept_Time','Dpt_Segment_3_Arr_Time','Dpt_Segment_4_From','Dpt_Segment_4_To','Dpt_Segment_4_Date','Dpt_Segment_4_Class','Dpt_Segment_4_Flight_No','Dpt_Segment_4_Seat_No','Dpt_Segment_4_Dept_Time','Dpt_Segment_4_Arr_Time'];
  }
}