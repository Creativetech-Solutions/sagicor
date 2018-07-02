<?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/16/2016
 * Time: 3:01 PM
 */

class Flights extends Backend_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['viewData'] = array(
            'page_title' => "Flights & Accommodation",
            'page_view' => "admin/pages/flights_and_accomodation/list"
        );
        $this->load->view('admin/shared/master', $this->data);
    }

    public function get_registered_users(){
        $this->load->library('datatables');
        $registrationsTable = 'register';
        $selectData = array('id as ID, reg_id as RegID, title as Title, first_name as FirstName, last_name as LastName, name_badge as NameBadge',false);
        $where = array(
            'reg_id !=' => ''
        );
        $addColumn = array(
          'actionButtons' => array('<span class="tbicon"> <a href="'.base_url().'admin/Flights/info/$1" class="tooltip" data-title="View Flights &amp; Accommodation"><i class="icon-pencil"></i></a> </span>','ID')
        );
        $list = $this->Common_model->select_fields_joined_DT($selectData,$registrationsTable,'',$where,'','','',$addColumn);
        print $list;
    }

    public function info($regID){

        //Getting Data from register table
        $registerTable = 'register';
        $selectData = array(
            '
               *
            ',false
        );
        $where = array(
            'id' => $regID
        );

       $page_data['registration'] = $this->Common_model->select_fields_where($registerTable,$selectData,$where,true);

        $this->data['viewData'] = array(
            'page_data' =>$page_data,
            'page_title' => "Flights Info",
            'page_view' => "admin/pages/flights_and_accomodation/flight-info"
        );
        $this->load->view('admin/shared/master', $this->data);
    }

    public function process_info(){
        if(!$this->input->post()){
            flash_msg("FAIL::".$this->data['ErrorMsg']['InvalidURL']);
            redirect('admin/flights');
        }

        $regID = $this->input->post('regID');
        $arrival_month = $this->input->post('arrival_month');
        $arrival_date = $this->input->post('arrival_date');
        $arr_flight = $this->input->post('arr_flight');
        $arr_time = $this->input->post('arr_time');
        $room_number = $this->input->post('room_number');
        $duplicate_guest = $this->input->post('duplicate_guest');
        $pnr = $this->input->post('pnr');

        //Check if regID is valid or not.
        if(empty($regID) || !is_numeric($regID)){
            flash_msg("FAIL::".$this->data['ErrorMsg']['Post']);
            redirect(previousURL());
        }

        //setting up arrivalTime
        $arrivalDate = $arrival_month.'-'.$arrival_date;
        //now we can update the db.
        $registerTable = 'register';
        $updateData = array(
            'room_number' => $room_number,
            'arrival_date_dest' => $arrivalDate,
            'arrival_flight_dest' => $arr_flight,
            'arrival_time_dest' => $arr_time,
            'pnr' => $pnr
        );
        $whereUpdateWinner = array(
            'id' => $regID
        );

        $updateResult = $this->Common_model->update($registerTable,$whereUpdateWinner,$updateData);
        if($updateResult === true || $updateResult['code'] === 0){
            //check if we need to duplicated this info for the companion or guest of this user.
            if(isset($duplicate_guest)){
                //We would need userID of this reg
                $selectWinnerData = array('user_id AS UserID',false);
                $whereSelectWinner = array(
                    'id' => $regID
                );
                $winnerInfo = $this->Common_model->select_fields_where($registerTable,$selectWinnerData,$whereSelectWinner,true);
                $userID = $winnerInfo->UserID;
                //Get the guest or companion ID
                $selectCompanionData = 'id as RegID';
                $whereCompanion = array(
                    'guest_of' => $userID
                );
                $companionInfo = $this->Common_model->select_fields_where($registerTable,$selectCompanionData,$whereCompanion,true);
                if(isset($companionInfo) && !empty($companionInfo->RegID)){
                    $companionRegID = $companionInfo->RegID;
                    $whereCompanionUpdate = array(
                        'id' => $companionRegID
                    );
                    $guestInfo = $this->Common_model->update($registerTable,$whereCompanionUpdate,$updateData);
                    if($guestInfo === true){
                        flash_msg('OK::Record Successfully Updated for both Winner and Companion');
                        redirect(previousURL());
                    }else{
                        if($guestInfo['code'] === 0){
                            flash_msg('FAIL::Nothing to update for guest. Same Record already exist for Companion.');
                        }else{
                            flash_msg('FAIL::'.$guestInfo['message']);
                        }
                    }
                }else{
                    flash_msg("OK::Record Successfully Updated for Winner, but no record found for guest to Companion");
                }
            }else{
                flash_msg("OK::Record Successfully Updated.");
            }
            redirect(previousURL());
        }
    }

    public function add_flight($regID){

        if(!isset($regID) || empty($regID)){
            $msg = "FAIL::".$this->data['ErrorMsg']['InvalidURL'];
            flash_msg($msg);
            redirect('admin/flights');
        }

        $regTable = 'register';
        $selectData = array(
            '*',false
        );
        $where = array(
            'id' => $regID
        );

        $pageData['registration'] = $this->Common_model->select_fields_where($regTable,$selectData,$where,true);


        $this->data['viewData'] = array(
            'page_data' => $pageData,
            'page_title' => "Flights & Accommodation",
            'page_view' => "admin/pages/flights_and_accomodation/flight-add-new"
        );
        $this->load->view('admin/shared/master', $this->data);
    }
    public function process_add_flight(){
        if(!$this->input->post()){
            $msg = "FAIL::".$this->data['ErrorMsg']['InvalidURL'];
            flash_msg($msg);
            redirect(previousURL());
        }

        //Get all the posted values.

        $regID = $this->input->post('regID');
        $regno = $this->input->post('regno');
        $duplicateGuest = $this->input->post('duplicate_guest');

        //segment1
        $tt_tf1 = $this->input->post('tt_tf1');
        $segment1 = $this->input->post('segment1');
        $dest_to1 = $this->input->post('dest_to1');
        $dest_from1 = $this->input->post('dest_from1');
        $dateofservice_month1 = $this->input->post('dateofservice_month1');
        $dateofservice_date1 = $this->input->post('dateofservice_date1');
        $airline_flight1 = $this->input->post('airline_flight1');
        $class1 = $this->input->post('class1');
        $seat1 = $this->input->post('seat1');
        $dpt_time1 = $this->input->post('dpt_time1');
        $arr_time1 = $this->input->post('arr_time1');

        //segment2
        $tt_tf2 = $this->input->post('tt_tf2');
        $segment2 = $this->input->post('segment2');
        $dest_to2 = $this->input->post('dest_to2');
        $dest_from2 = $this->input->post('dest_from2');
        $dateofservice_month2 = $this->input->post('dateofservice_month2');
        $dateofservice_date2 = $this->input->post('dateofservice_date2');
        $airline_flight2 = $this->input->post('airline_flight2');
        $class2 = $this->input->post('class2');
        $seat2 = $this->input->post('seat2');
        $dpt_time2 = $this->input->post('dpt_time2');
        $arr_time2 = $this->input->post('arr_time2');

        //segment3
        $tt_tf3 = $this->input->post('tt_tf3');
        $segment3 = $this->input->post('segment3');
        $dest_to3 = $this->input->post('dest_to3');
        $dest_from3 = $this->input->post('dest_from3');
        $dateofservice_month3 = $this->input->post('dateofservice_month3');
        $dateofservice_date3 = $this->input->post('dateofservice_date3');
        $airline_flight3 = $this->input->post('airline_flight3');
        $class3 = $this->input->post('class3');
        $seat3 = $this->input->post('seat3');
        $dpt_time3 = $this->input->post('dpt_time3');
        $arr_time3 = $this->input->post('arr_time3');

        //segment4
        $tt_tf4 = $this->input->post('tt_tf4');
        $segment4 = $this->input->post('segment4');
        $dest_to4 = $this->input->post('dest_to4');
        $dest_from4 = $this->input->post('dest_from4');
        $dateofservice_month4 = $this->input->post('dateofservice_month4');
        $dateofservice_date4 = $this->input->post('dateofservice_date4');
        $airline_flight4 = $this->input->post('airline_flight4');
        $class4 = $this->input->post('class4');
        $seat4 = $this->input->post('seat4');
        $dpt_time4 = $this->input->post('dpt_time4');
        $arr_time4 = $this->input->post('arr_time4');

        //segment5
        $tt_tf5 = $this->input->post('tt_tf5');
        $segment5 = $this->input->post('segment5');
        $dest_to5 = $this->input->post('dest_to5');
        $dest_from5 = $this->input->post('dest_from5');
        $dateofservice_month5 = $this->input->post('dateofservice_month5');
        $dateofservice_date5 = $this->input->post('dateofservice_date5');
        $airline_flight5 = $this->input->post('airline_flight5');
        $class5 = $this->input->post('class5');
        $seat5 = $this->input->post('seat5');
        $dpt_time5 = $this->input->post('dpt_time5');
        $arr_time5 = $this->input->post('arr_time5');

        //segment6
        $tt_tf6 = $this->input->post('tt_tf6');
        $segment6 = $this->input->post('segment6');
        $dest_to6 = $this->input->post('dest_to6');
        $dest_from6 = $this->input->post('dest_from6');
        $dateofservice_month6 = $this->input->post('dateofservice_month6');
        $dateofservice_date6 = $this->input->post('dateofservice_date6');
        $airline_flight6 = $this->input->post('airline_flight6');
        $class6 = $this->input->post('class6');
        $seat6 = $this->input->post('seat6');
        $dpt_time6 = $this->input->post('dpt_time6');
        $arr_time6 = $this->input->post('arr_time6');

        //segment7
        $tt_tf7 = $this->input->post('tt_tf7');
        $segment7 = $this->input->post('segment7');
        $dest_to7 = $this->input->post('dest_to7');
        $dest_from7 = $this->input->post('dest_from7');
        $dateofservice_month7 = $this->input->post('dateofservice_month7');
        $dateofservice_date7 = $this->input->post('dateofservice_date7');
        $airline_flight7 = $this->input->post('airline_flight7');
        $class7 = $this->input->post('class7');
        $seat7 = $this->input->post('seat7');
        $dpt_time7 = $this->input->post('dpt_time7');
        $arr_time7 = $this->input->post('arr_time7');

        //segment8
        $tt_tf8 = $this->input->post('tt_tf8');
        $segment8 = $this->input->post('segment8');
        $dest_to8 = $this->input->post('dest_to8');
        $dest_from8 = $this->input->post('dest_from8');
        $dateofservice_month8 = $this->input->post('dateofservice_month8');
        $dateofservice_date8 = $this->input->post('dateofservice_date8');
        $airline_flight8 = $this->input->post('airline_flight8');
        $class8 = $this->input->post('class8');
        $seat8 = $this->input->post('seat8');
        $dpt_time8 = $this->input->post('dpt_time8');
        $arr_time8 = $this->input->post('arr_time8');


        //Need to check if same record is required for companion too or not.
        if(isset($duplicateGuest)){
            $registerTable = 'register';
            $travelTable = 'travel';

            $selectForRegister = array(
                'user_id AS UserID, noguest as Companion',false
            );

            $whereForRegister = array(
                'id' => $regID
            );

            $regDetails = $this->Common_model->select_fields_where($registerTable,$selectForRegister,$whereForRegister,true);

            if(isset($regDetails) && !empty($regDetails->UserID)){
                //now find guest if this user has any guest.
                $winnerUserID = $regDetails->UserID;
                $hasCompanion = $regDetails->Companion;
                if($hasCompanion !== 'Yes'){
                    $msg = 'FAIL::This Winner has no companion';
                    flash_msg($msg);
                }else{
                    $selectForCompanion = array(
                       'id as RegID, reg_id as RegNo',false
                    );
                    $whereForCompanion = array(
                        'guest_of' => $winnerUserID
                    );

                    $companionInfo = $this->Common_model->select_fields_where($registerTable,$selectForCompanion,$whereForCompanion,true);
                    if(isset($companionInfo) && !empty($companionInfo->RegID)){
                        $companionRegID = $companionInfo->RegID;
                        $companionRegNo = $companionInfo->RegNo;
                    }else{
                        $msg = 'FAIL::Could Not Find Companion, so could not Update record for companion.';
                        flash_msg($msg);
                    }
                }
            }

        }

        //As we have now all the inputs start inserting in the table if there is any data. posted
        $travelTable = 'travel';
        if(!empty($dest_to1)){

            $date1 =    $dateofservice_month1.'-'.$dateofservice_date1;

            $insertData = array(
                'tt_tf' => $tt_tf1,
                'segment' => $segment1,
                'dest_to' => $dest_to1,
                'dest_from' => $dest_from1,
                'date' => $date1,
                'airline_flight' => $airline_flight1,
                'class' => $class1,
                'seat_no' => $seat1,
                'depart_time' => $dpt_time1,
                'arrival_time' => $arr_time1,
                'reg_id' => $regno,
                'regid' => $regID
            );
            $this->Common_model->insert_record($travelTable,$insertData);

            if(isset($hasCompanion) && $hasCompanion === "Yes"){
                if(isset($companionRegNo) && !empty($companionRegNo)){
                    $companionInsertData = array(
                        'tt_tf' => $tt_tf1,
                        'segment' => $segment1,
                        'dest_to' => $dest_to1,
                        'dest_from' => $dest_from1,
                        'date' => $date1,
                        'airline_flight' => $airline_flight1,
                        'class' => $class1,
                        'seat_no' => $seat1,
                        'depart_time' => $dpt_time1,
                        'arrival_time' => $arr_time1,
                        'reg_id' => $companionRegNo,
                        'regid' => $companionRegID
                    );
                    $this->Common_model->insert_record($travelTable,$companionInsertData);
                }//end of companionRegNo If
            }//End of hasCompanion If
        }

        if(!empty($dest_to2)){
            $date2 =    $dateofservice_month2.'-'.$dateofservice_date2;

            $insertData = array(
                'tt_tf' => $tt_tf2,
                'segment' => $segment2,
                'dest_to' => $dest_to2,
                'dest_from' => $dest_from2,
                'date' => $date2,
                'airline_flight' => $airline_flight2,
                'class' => $class2,
                'seat_no' => $seat2,
                'depart_time' => $dpt_time2,
                'arrival_time' => $arr_time2,
                'reg_id' => $regno,
                'regid' => $regID
            );

            $this->Common_model->insert_record($travelTable,$insertData);


            if(isset($hasCompanion) && $hasCompanion === "Yes"){
                if(isset($companionRegNo) && !empty($companionRegNo)){
                    $companionInsertData = array(
                        'tt_tf' => $tt_tf2,
                        'segment' => $segment2,
                        'dest_to' => $dest_to2,
                        'dest_from' => $dest_from2,
                        'date' => $date2,
                        'airline_flight' => $airline_flight2,
                        'class' => $class2,
                        'seat_no' => $seat2,
                        'depart_time' => $dpt_time2,
                        'arrival_time' => $arr_time2,
                        'reg_id' => $companionRegNo,
                        'regid' => $companionRegID
                    );
                    $this->Common_model->insert_record($travelTable,$companionInsertData);
                }//end of companionRegNo If
            }//End of hasCompanion If
        }

        if(!empty($dest_to3)){
            $date3 =    $dateofservice_month3.'-'.$dateofservice_date3;

            $insertData = array(
                'tt_tf' => $tt_tf3,
                'segment' => $segment3,
                'dest_to' => $dest_to3,
                'dest_from' => $dest_from3,
                'date' => $date3,
                'airline_flight' => $airline_flight3,
                'class' => $class3,
                'seat_no' => $seat3,
                'depart_time' => $dpt_time3,
                'arrival_time' => $arr_time3,
                'reg_id' => $regno,
                'regid' => $regID
            );

            $this->Common_model->insert_record($travelTable,$insertData);

            if(isset($hasCompanion) && $hasCompanion === "Yes"){
                if(isset($companionRegNo) && !empty($companionRegNo)){
                    $companionInsertData = array(
                        'tt_tf3' => $tt_tf3,
                        'segment3' => $segment3,
                        'dest_to3' => $dest_to3,
                        'dest_from3' => $dest_from3,
                        'date' => $date3,
                        'airline_flight3' => $airline_flight3,
                        'class3' => $class3,
                        'seat3' => $seat3,
                        'dpt_time3' => $dpt_time3,
                        'arr_time3' => $arr_time3,
                        'reg_id' => $companionRegNo,
                        'regid' => $companionRegID
                    );
                    $this->Common_model->insert_record($travelTable,$companionInsertData);
                }//end of companionRegNo If
            }//End of hasCompanion If
        }

        if(!empty($dest_to4)){

            $date4 =    $dateofservice_month4.'-'.$dateofservice_date4;

            $insertData = array(
                'tt_tf' => $tt_tf4,
                'segment' => $segment4,
                'dest_to' => $dest_to4,
                'dest_from' => $dest_from4,
                'date' => $date4,
                'airline_flight' => $airline_flight4,
                'class' => $class4,
                'seat_no' => $seat4,
                'depart_time' => $dpt_time4,
                'arrival_time' => $arr_time4,
                'reg_id' => $regno,
                'regid' => $regID
            );

            $this->Common_model->insert_record($travelTable,$insertData);
            if(isset($hasCompanion) && $hasCompanion === "Yes"){
                if(isset($companionRegNo) && !empty($companionRegNo)){
                    $companionInsertData = array(
                        'tt_tf' => $tt_tf4,
                        'segment' => $segment4,
                        'dest_to' => $dest_to4,
                        'dest_from' => $dest_from4,
                        'date' => $date4,
                        'airline_flight' => $airline_flight4,
                        'class' => $class4,
                        'seat_no' => $seat4,
                        'depart_time' => $dpt_time4,
                        'arrival_time' => $arr_time4,
                        'reg_id' => $companionRegNo,
                        'regid' => $companionRegID
                    );
                    $this->Common_model->insert_record($travelTable,$companionInsertData);
                }//end of companionRegNo If
            }//End of hasCompanion If
        }

        if(!empty($dest_to5)){

            $date5 =    $dateofservice_month5.'-'.$dateofservice_date5;


            $insertData = array(
                'tt_tf' => $tt_tf5,
                'segment' => $segment5,
                'dest_to' => $dest_to5,
                'dest_from' => $dest_from5,
                'date' => $date5,
                'airline_flight' => $airline_flight5,
                'class' => $class5,
                'seat_no' => $seat5,
                'depart_time' => $dpt_time5,
                'arrival_time' => $arr_time5,
                'reg_id' => $regno,
                'regid' => $regID
            );

            $this->Common_model->insert_record($travelTable,$insertData);
            if(isset($hasCompanion) && $hasCompanion === "Yes"){
                if(isset($companionRegNo) && !empty($companionRegNo)){
                    $companionInsertData = array(
                        'tt_tf' => $tt_tf5,
                        'segment' => $segment5,
                        'dest_to' => $dest_to5,
                        'dest_from' => $dest_from5,
                        'date' => $date5,
                        'airline_flight' => $airline_flight5,
                        'class' => $class5,
                        'seat_no' => $seat5,
                        'depart_time' => $dpt_time5,
                        'arrival_time' => $arr_time5,
                        'reg_id' => $companionRegNo,
                        'regid' => $companionRegID
                    );
                    $this->Common_model->insert_record($travelTable,$companionInsertData);
                }//end of companionRegNo If
            }//End of hasCompanion If
        }

        if(!empty($dest_to6)){
            $date6 =    $dateofservice_month5.'-'.$dateofservice_date6;

            $insertData = array(
                'tt_tf' => $tt_tf6,
                'segment' => $segment6,
                'dest_to' => $dest_to6,
                'dest_from' => $dest_from6,
                'date' => $date6,
                'airline_flight' => $airline_flight6,
                'class' => $class6,
                'seat_no' => $seat6,
                'depart_time' => $dpt_time6,
                'arrival_time' => $arr_time6,
                'reg_id' => $regno,
                'regid' => $regID
            );

            $this->Common_model->insert_record($travelTable,$insertData);
            if(isset($hasCompanion) && $hasCompanion === "Yes"){
                if(isset($companionRegNo) && !empty($companionRegNo)){
                    $companionInsertData = array(
                        'tt_tf' => $tt_tf6,
                        'segment' => $segment6,
                        'dest_to' => $dest_to6,
                        'dest_from' => $dest_from6,
                        'date' => $date6,
                        'airline_flight' => $airline_flight6,
                        'class' => $class6,
                        'seat_no' => $seat6,
                        'depart_time' => $dpt_time6,
                        'arrival_time' => $arr_time6,
                        'reg_id' => $companionRegNo,
                        'regid' => $companionRegID
                    );
                    $this->Common_model->insert_record($travelTable,$companionInsertData);
                }//end of companionRegNo If
            }//End of hasCompanion If
        }

        if(!empty($dest_to7)){
            $date7 =    $dateofservice_month5.'-'.$dateofservice_date7;
            $insertData = array(
                'tt_tf' => $tt_tf7,
                'segment' => $segment7,
                'dest_to' => $dest_to7,
                'dest_from' => $dest_from7,
                'date' => $date7,
                'airline_flight' => $airline_flight7,
                'class' => $class7,
                'seat_no' => $seat7,
                'depart_time' => $dpt_time7,
                'arrival_time' => $arr_time7,
                'reg_id' => $regno,
                'regid' => $regID
            );

            $this->Common_model->insert_record($travelTable,$insertData);
            if(isset($hasCompanion) && $hasCompanion === "Yes"){
                if(isset($companionRegNo) && !empty($companionRegNo)){
                    $companionInsertData = array(
                        'tt_tf' => $tt_tf7,
                        'segment' => $segment7,
                        'dest_to' => $dest_to7,
                        'dest_from' => $dest_from7,
                        'date' => $date7,
                        'airline_flight' => $airline_flight7,
                        'class' => $class7,
                        'seat_no' => $seat7,
                        'depart_time' => $dpt_time7,
                        'arrival_time' => $arr_time7,
                        'reg_id' => $companionRegNo,
                        'regid' => $companionRegID
                    );
                    $this->Common_model->insert_record($travelTable,$companionInsertData);
                }//end of companionRegNo If
            }//End of hasCompanion If
        }

        if(!empty($dest_to8)){

            $date8 =    $dateofservice_month5.'-'.$dateofservice_date8;

            $insertData = array(
                'tt_tf' => $tt_tf8,
                'segment' => $segment8,
                'dest_to' => $dest_to8,
                'dest_from' => $dest_from8,
                'date' => $date8,
                'airline_flight' => $airline_flight8,
                'class' => $class8,
                'seat_no' => $seat8,
                'depart_time' => $dpt_time8,
                'arrival_time' => $arr_time8,
                'reg_id' => $regno,
                'regid' => $regID
            );

            $this->Common_model->insert_record($travelTable,$insertData);
            if(isset($hasCompanion) && $hasCompanion === "Yes"){
                if(isset($companionRegNo) && !empty($companionRegNo)){
                    $companionInsertData = array(
                        'tt_tf' => $tt_tf8,
                        'segment' => $segment8,
                        'dest_to' => $dest_to8,
                        'dest_from' => $dest_from8,
                        'date' => $date8,
                        'airline_flight' => $airline_flight8,
                        'class' => $class8,
                        'seat_no' => $seat8,
                        'depart_time' => $dpt_time8,
                        'arrival_time' => $arr_time8,
                        'reg_id' => $companionRegNo,
                        'regid' => $companionRegID
                    );
                    $this->Common_model->insert_record($travelTable,$companionInsertData);
                }//end of companionRegNo If
            }//End of hasCompanion If
        }


        if(isset($regID) && is_numeric($regID)){
            redirect('admin/flights/info/'.$regID);
        }else{
            redirect('admin/flights');
        }
    }

    public function list_flights($reg_no){
        //load the datatables library
        $this->load->library('datatables');

        $table = 'travel';
        $selectData = array(            '
            id as TravelID,
            segment as SEG,
            CASE tt_tf WHEN 1 THEN "TT LV" WHEN 2 THEN "TF LV" ELSE "" END AS TT_TF,            
            dest_to AS `To`,
            dest_from AS `From`,
            `date` AS `Date`,
            airline_flight AS Flight,
            class AS Class,
            seat_no AS Seat,
            depart_time AS DepartTime,
            arrival_time AS ArrivalTime
            ',false
        );
        $where = array(
            //'reg_id' => $reg_no
            'regid' => $reg_no
        );
        $orderBy = array(
            'segment','ASC'
        );
        $addColumn = array(
            'actionButtons' => array(
                '
            <span class="tbicon"> <a href="'.base_url().'admin/flights/edit_segment/$1" class="tooltip" data-title="Edit flight segments"><i class="icon-edit"></i></a> </span>
            <span class="tbicon"> <a href="'.base_url().'admin/flights/remove_segment/$1" class="tooltip" data-title="Delete flight segment"><i class="icon-remove-sign"></i></a> </span>
                ','TravelID'
            )
        );
        $result = $this->Common_model->select_fields_joined_DT($selectData,$table,'',$where,'','','',$addColumn,'');
        print $result;
    }

    public function edit_segment($segmentTravelID){

        //we need regID in view so lets query for it.
        $table = 'travel T';
        $joins = array(
            array(
                'table' => 'register R',
                'condition' => 'T.reg_id = R.reg_id',
                'type' => 'INNER'
            )
        );
        $selectData = array('
            COUNT(1) AS TotalFound,
            T.id AS TravelID,,
            T.reg_id AS RegNo,
             R.id AS RegID,
             T.dest_to as `To`,
             T.dest_from as `From`,
             `date` as `Date`,
             airline_flight as Flight,
             class AS Class,
            seat_no AS Seat,
            depart_time AS DepartTime,
            arrival_time AS ArrivalTime,
            R.title AS Title,
            R.first_name AS FirstName,
            R.last_name AS LastName,
            T.tt_tf,
            T.segment
        ',false);
        $where = array(
          'T.id' => $segmentTravelID
        );

        $info = $this->Common_model->select_fields_where_like_join($table,$selectData,$joins,$where,true);
        if(!empty($info) && !empty($info->RegID) && $info->TotalFound == 1){
            $viewData['regID'] = $info->RegID;
        }else{
            $viewData['regID'] = '';
        }

        $viewData['editViewData'] = $info;

        $this->data['viewData'] = array(
            'page_data' => $viewData,
            'page_title' => "Edit Segment",
            'page_view' => "admin/pages/flights_and_accomodation/segment-edit"
        );
        $this->load->view('admin/shared/master', $this->data);
    }

    public function update_segment(){

        //Get all the posted Values
        $travelID = $this->input->post('travelID');
        $regno = $this->input->post('regno');
        $dest_to1 = $this->input->post('dest_to1');
        $dest_from1 = $this->input->post('dest_from1');
        $dateofservice_month1 = $this->input->post('dateofservice_month1');
        $dateofservice_date1 = $this->input->post('dateofservice_date1');
        $airline_flight1 = $this->input->post('airline_flight1');
        $class1 = $this->input->post('class1');
        $seat1 = $this->input->post('seat1');
        $dpt_time1 = $this->input->post('dpt_time1');
        $arr_time1 = $this->input->post('arr_time1');

        $Date = $dateofservice_month1.'-'.$dateofservice_date1;

        //Need to check if travel id and regno is provided.


        if(!isset($travelID) || empty($travelID) || !is_numeric($travelID)){
            $this->session->set_flashdata('alertMsg',"FAIL::".$this->data['ErrorMsg']['Post']);
            redirect(previousURL());
        }

        if(!isset($regno) || empty($regno)){
            $this->session->set_flashdata('alertMsg',"FAIL::".$this->data['ErrorMsg']['Post']);
            redirect(previousURL());
        }

        $updateData = array(
            'id' => $travelID,
            'reg_id' => $regno,
            'dest_to' => $dest_to1,
            'dest_from' => $dest_from1,
            'date' => $Date,
            'airline_flight' => $airline_flight1,
            'class' => $class1,
            'seat_no' => $seat1,
            'depart_time' => $dpt_time1,
            'arrival_time' => $arr_time1
        );

        $whereUpdate = array(
          'id' =>   $travelID
        );

        $updateResult = $this->Common_model->update('travel',$whereUpdate,$updateData);

        if($updateResult === true){
            $alertMsg = 'OK::Record Successfully Updated';
        }else{
            if($updateResult['code'] == 0){
                $alertMsg = 'FAIL::Nothing to Update, Same Record Already Exist';
            }else{
                $alertMsg = 'FAIL::'.$updateResult['message'];
            }
        }
        $this->session->set_flashdata('alertMsg',$alertMsg);
        redirect('admin/flights/edit_segment/'.$travelID);

    }

    public function remove_segment($segmentID){
        if(!isset($segmentID) || !is_numeric($segmentID)){
            flash_msg("FAIL::".$this->data['ErrorMsg']['InvalidURL']);
            redirect('admin/flights');
        }
        $whereDelete = array(
           'id' => $segmentID
        );
        $affectedRows = $this->Common_model->delete('travel',$whereDelete);

        if($affectedRows > 0){
            flash_msg('OK::Record Successfully Deleted');
            redirect(previousURL());
        }
    }
}