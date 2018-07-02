<?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/16/2016
 * Time: 3:26 PM
 */

class Registration extends Frontend_Controller{
    public $loggedInUserID;
    function __construct()
    {
        parent::__construct();

        //get User Details
        //Get User Details
        $whereUserID = array(
            'u.id' => $this->data['loggedinuser']->id
        );
        $joins = array(
            array(
                'table' => 'register r',
                'condition' => 'r.user_id = u.id',
                'type' => 'LEFT'
            )
        );
        $selectData = array('
            u.id as UserID, u.accept_reg, r.id as RegID, r.*
        ',false);
        $this->data['userData'] = $this->Common_model->select_fields_where_like_join('users u',$selectData,$joins,$whereUserID,true);
        if(!empty($this->data['userData'])){
            //need to check if this user has any guest with him/her and get that guest info also.


            $noGuest = $this->data['userData']->noguest;
            //seems to like Yes means this user has guest according or old code.
            if($noGuest === 'Yes'){
                $userID = $this->data['userData']->UserID;

                $whereGuestData = array(
                    'guest_of' => $userID
                );
                $selectGuestData = array('
                    r.id as RegID,
                     r.*
                ',false
                );

                $this->data['guestData'] = $this->Common_model->select_fields_where('register r',$selectGuestData,$whereGuestData,true);
            }

        }
        $this->loggedInUserID = $this->data['loggedinuser']->id;
        $this->data['countries'] = $this->Common_model->select_fields('countries', '*', FALSE, '', 'name');
        if($this->checkRegLock()){
            $this->data['regIsLocked'] = true;
        } else {
            $this->data['regIsLocked'] = false;
        } 
    }

    public function register(){
        $userID = $this->loggedInUserID;
        $user = $this->Common_model->select_fields_where('users', 'club', ['id'=>$userID], true);
        $this->data['tempUser'] = $user;
        $this->f_show('site/pages/registration/register',$this->data,NULL,'new');
    }


    public function step2_passport(){
        /**
         * First we need to process data from previous Step 1
         */
        if($this->input->post()){ 
            $postData = $this->input->post();
            $this->saveStepOneInfo();
            $this->updateUserVal();
            
            $redirectTo = $this->input->post('redirect_to');
            if(!empty($redirectTo)) redirect($redirectTo);
        }

        $this->f_show('site/pages/registration/step2_passport_information',$this->data,NULL,'new');

    }

    public function step3_emergency_contact(){
        //before showing emergency contact. First we need to know if any data was posted or not.
        if($this->input->post()){
            $postData = $this->input->post();
            $this->saveStepTwoInfo(); 
            if($this->input->post('s_type') == 'previous'){
                redirect("Registration/register");
            }

            $redirectTo = $this->input->post('redirect_to');
            if(!empty($redirectTo)) redirect($redirectTo);
        }

        $this->f_show('site/pages/registration/step3_emergency_contact',$this->data,NULL,'new');
    }

    public function step4_flights_accommodation()
    {
        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->saveStepThreeInfo(); 
            if(isset($postData['prev_update'])){
                redirect("Registration/step2_passport");
            }

            $redirectTo = $this->input->post('redirect_to');
            if(!empty($redirectTo)) redirect($redirectTo);
        }

        $this->f_show('site/pages/registration/step4_flights_accommodation',$this->data,NULL,'new');

    }

    public function step5_activities(){

        if($this->input->post()){
            $postData = $this->input->post();
            $this->saveStepFourInfo(); 
            if(isset($postData['prev_update'])){
                redirect("Registration/step3_emergency_contact");
            }

            $redirectTo = $this->input->post('redirect_to');
            if(!empty($redirectTo)) redirect($redirectTo);
        }
        $this->data['activities'] = $this->Common_model->select('activities');
        $this->f_show('site/pages/registration/step5_activities',$this->data,NULL,'new');
    }

    public function step6_credit_card(){  
        if($this->input->post()){
            $postData = $this->input->post();
            $this->saveStepFiveInfo(); 
            if(isset($postData['prev_update'])){
                redirect("Registration/step4_flights_accommodation");
            }

            $redirectTo = $this->input->post('redirect_to');
            if(!empty($redirectTo)) redirect($redirectTo);
        }
        $this->f_show('site/pages/registration/step6_credit_card',$this->data,NULL,'new');
    }

    public function final_message(){ 
        if($this->input->post()){
            $postData = $this->input->post();
            $this->saveStepSixInfo(); 
            if(isset($postData['prev_update'])){
                redirect("Registration/step5_activities");
            }

            $redirectTo = $this->input->post('redirect_to');
            if(!empty($redirectTo)) redirect($redirectTo);

            $this->f_show('site/pages/registration/final_message',$this->data,NULL,'new');
        }else{
            redirect('registration/register');
        }
    }

    public function confirm_registration(){
        if($this->input->post('confirm')){
            $this->data['activities'] = $this->Common_model->select('activities');
            $this->f_show('site/pages/registration/confirm_register', $this->data, NULL, 'new');
        }else{
            redirect('registration/register');
        }
    }

    // check vis info
    public function checkVisa(){
        $countryId = $this->input->post('country');
        if(!empty($countryId)){
            $visaInfo = $this->Common_model->select_fields_where('visa_info', '*', ['country_id'=>$countryId], true);
            if(is_object($visaInfo) && !empty($visaInfo)){
                echo "OK::".$visaInfo->usa_visa."::".$visaInfo->type;
            } else echo "Error";
        } else echo "Error";
    } // end of function

    // confirm registration lock
    public function registration_confirmed(){
        $userID = $this->loggedInUserID;
        if($this->input->post()){
            $this->confirmRegistration();
            $this->Common_model->update('users',['id'=>$userID],['regclose'=>1]);
            $this->Common_model->update('register', ['user_id'=>$userID], ['status'=>'confirm']);
            $this->Common_model->update('register', ['guest_of'=>$userID], ['status'=>'confirm']);
            $this->session->set_flashdata('reg_conf',"Your Registration is Confirmed");
            $this->f_show('site/pages/registration/reg_closed', NULL, NULL, 'new');
        } else 
            redirect('registration/register');
    } // end of function

    // protected functions start here
    protected function checkRegLock(){
        $userID = $this->loggedInUserID;
        $result = $this->db->select('status')->from('register')->where(['user_id'=>$userID])->or_where(['guest_of'=>$userID])->get()->result();
        if(empty($result)) return false;
        foreach($result as $row){
            if($row->status != "confirm") 
                return false; 
        } 
        return true;
    }
    protected function updateUserVal(){
        if($this->data['regIsLocked']) return true;
        $userID = $this->loggedInUserID;
        $selectData = ['club, email, reg_id, reg_idg', false];
        $user = $this->Common_model->select_fields_where('users',$selectData,['id'=>$userID], true);
        $this->Common_model->update('register', ['user_id'=>$userID], ['club'=>$user->club, 'email'=>$user->email, 'reg_id'=>$user->reg_id]);
        $this->Common_model->update('register', ['guest_of'=>$userID], ['club'=>$user->club,'reg_id'=>$user->reg_idg]);
    }
    protected function saveStepOneInfo(){
        if($this->data['regIsLocked']) return true;
        //Winner Section
        $pid = $this->input->post('pid'); //UserID
        $regID = $this->input->post('regid');
        $title_name = $this->input->post('title_name');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $dob_month = $this->input->post('dob_month');
        $dob_date = $this->input->post('dob_date');
        $dob_year = $this->input->post('dob_year');
        $name_badge = $this->input->post('name_badge');
        $gender = $this->input->post('gender');
        $shirt_size = $this->input->post('shirt_size');
        $birth_country = $this->input->post('birth_country');
        $home_phone = $this->input->post('home_phone');
        $work_phone = $this->input->post('work_phone');
        $cell_phone = $this->input->post('cell_phone');
        $email = $this->input->post('email');
        $alt_email = $this->input->post('alt_email');
        $st_1address = $this->input->post('st_1address');
       // $st_2address = $this->input->post('st_2address');
        $city = $this->input->post('city');
        //$state = $this->input->post('state');
        if($this->input->post('zip'))
            $zip = $this->input->post('zip');
        else $zip = '';

        $country = $this->input->post('country');

        //below fields are for other use
        $companion = $this->input->post('companion');
        $name_badge_last = $this->input->post('name_badge_last');

        $dob = $dob_year.'-'.$dob_month.'-'.$dob_date;
        //Guest Info
        $id_g = $this->input->post('id_g');
        $title_name_g = $this->input->post('title_name_g');
        $first_name_g = $this->input->post('first_name_g');
        $last_name_g = $this->input->post('last_name_g');
        $dob_month_g = $this->input->post('dob_month_g');
        $dob_date_g = $this->input->post('dob_date_g');
        $dob_year_g = $this->input->post('dob_year_g');
        $name_badge_g = $this->input->post('name_badge_g');
        $gender_g = $this->input->post('gender_g');
        $shirt_size_g = $this->input->post('shirt_size_g');
        $birth_country_g = $this->input->post('birth_country_g');
        $home_phone_g = $this->input->post('home_phone_g');
        $work_phone_g = $this->input->post('work_phone_g');
        $cell_phone_g = $this->input->post('cell_phone_g');
        $email_g = $this->input->post('email_g');
        $alt_email_g = $this->input->post('alt_email_g');
        $st_1address_g = $this->input->post('st_1address_g');
        //$st_2address_g = $this->input->post('st_2address_g');
        $city_g = $this->input->post('city_g');
        //$state_g = $this->input->post('state_g');
        if($this->input->post('zip_g'))
            $zip_g = $this->input->post('zip_g');
        else $zip_g = '';

        $country_g = $this->input->post('country_g');
        $name_badge_last_g = $this->input->post('name_badge_last_g');

        $dob_g = $dob_year_g.'-'.$dob_month_g.'-'.$dob_date_g;

        //As we have all the data..
        // We Need to start process with inserting winner info first.

        $winnerInsertUpdateData = array(
            'title' => $title_name,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birth_date' => $dob,
            'name_badge' => $name_badge,
            'gender' => $gender,
            'shirt_size' => $shirt_size,
            'birth_country' => $birth_country,
            'home' => $home_phone,
            'work' => $work_phone,
            'cell' => $cell_phone,
            'email' => $email,
            'alt_email' => $alt_email,
            'st_1address' => $st_1address,
            'noguest' => $companion,
           // 'st_2address' => $st_2address,
            'city' => $city,
           // 'state' => $state,
            'zip' => $zip,
            'country' => $country,
            'name_badge_last' => $name_badge_last,
        );

        $guestInsertUpdateData = array(
            'title' => $title_name_g,
            'first_name' => $first_name_g,
            'last_name' => $last_name_g,
            'birth_date' => $dob_g,
            'name_badge' => $name_badge_g,
            'gender' => $gender_g,
            'shirt_size' => $shirt_size_g,
            'birth_country' => $birth_country_g,
            'home' => $home_phone_g,
            'work' => $work_phone_g,
            'cell' => $cell_phone_g,
            'email' => $email_g,
            'alt_email' => $alt_email_g,
            'st_1address' => $st_1address_g,
           // 'st_2address' => $st_2address_g,
            'city' => $city_g,
            'noguest' => $companion,
           // 'state' => $state_g,
            'zip' => $zip_g,
            'guest' => 0,
            'country' => $country_g,
            'name_badge_last' => $name_badge_last_g,
        );

        //Now first check if there is any info of this user in register table.
        //If no insert and if yes then update.

        $selectRegisterCOUNT = array(
            '
         COUNT(1) as TotalFound,
         id as RegisterID
        ',false
        );
        $whereRegisterCOUNT = array(
            'user_id' => $pid
        );
        $records = $this->Common_model->select_fields_where('register',$selectRegisterCOUNT,$whereRegisterCOUNT,true);
        if(intval($records->TotalFound) > 0){
            $registrationID = $records->RegisterID;
            //Means Record Already Exist for same user. only we need to update it.
            $updateWinnerWhere = array(
                'id' => $registrationID
            );
            $this->Common_model->update('register',$updateWinnerWhere,$winnerInsertUpdateData);
        }else{
            //We have to Insert new Record as no record was found
            $winnerInsertUpdateData['user_id'] = $pid;
            $registrationID = $this->Common_model->insert_record('register',$winnerInsertUpdateData);
        }

        $this->data['userData']->noguest = $companion;
        //If we have WinnerID and if we have to add guest too then we can continue to next step.
        if($companion === 'Yes'){
            //Need To check if companion record already exists or Not.

            $selectRegisterCOUNT = array(
                'COUNT(1) as TotalFound,
                 id as GuestRegisterID
                ',false
            );
            $whereRegisterCOUNT = array(
                'guest_of' => $pid
            );

            $records = $this->Common_model->select_fields_where('register',$selectRegisterCOUNT,$whereRegisterCOUNT,true);

            if($records->TotalFound > 0){
                //Means We Already have a guest record for selected winner
                $whereGuestUpdate = array(
                    'id' => $records->GuestRegisterID
                );
                $this->Common_model->update('register',$whereGuestUpdate,$guestInsertUpdateData);

            }else{
                //Means We need to insert Guest Record for this User.
                $guestInsertUpdateData['guest_of'] = $pid;
                $registrationID = $this->Common_model->insert_record('register',$guestInsertUpdateData);
            }
        } else {
            $guest = $this->Common_model->select_fields_where('register','id', ['guest_of'=>$pid], true);
            if(isset($guest->id) && !empty($guest->id))
                $this->Common_model->update('register',['id'=>$guest->id], ['noguest'=>$companion]);
        }
        


      /*  echo '<pre>'; print_r($this->input->post());
        echo 'where data is ';
        print_r($this->data); exit;*/
    }
    protected function saveStepTwoInfo(){
        if($this->data['regIsLocked']) { 
            // here one more check, i.e if canadian visa field is required and previously it was empty then save it
            $this->saveRemainingFields();
            return true;
        }
        $userID = $this->loggedInUserID;
      //winner section
        $passport = $this->input->post('passport');
        $citizen = $this->input->post('citizen');
        $issue_city = $this->input->post('issue_city');
        $pp_issue_month = $this->input->post('pp_issue_month');
        $pp_issue_date = $this->input->post('pp_issue_date');
        $pp_issue_year = $this->input->post('pp_issue_year');
        $pp_exp_month = $this->input->post('pp_expire_month');
        $pp_exp_date = $this->input->post('pp_expire_date');
        $pp_exp_year = $this->input->post('pp_expire_year');
        $us_visa = $this->input->post('us_visa');
        $obtain_us_visa = $this->input->post('obtain_us_visa');
        $issue_date     = "$pp_issue_year-$pp_issue_month-$pp_issue_date";
        $expire_date    = "$pp_exp_year-$pp_exp_month-$pp_exp_date";

      //  $usa_visa_num     =     $this->input->post('schengen'); // schengen is usa visa info
     //   $usa_exp_date      =     $this->input->post('schengen_exp_date');
        $visa_num      =     $this->input->post('visa_type');
        $visa_exp_date      =     $this->input->post('visa_exp_date');
        if($citizen == 28 || $citizen == 147){ //united state or canada
            $visa_num = $visa_exp_date = "";
        }
        //guest section
        $passport_g      =     $this->input->post('passport_g');
        $citizen_g      =     $this->input->post('citizen_g');
        $issue_city_g      =     $this->input->post('issue_city_g');
        $pp_issue_month_g      =     $this->input->post('pp_issue_month_g');
        $pp_issue_date_g      =     $this->input->post('pp_issue_date_g');
        $pp_issue_year_g      =     $this->input->post('pp_issue_year_g');
        $pp_exp_month_g      =     $this->input->post('pp_expire_month_g');
        $pp_exp_date_g      =     $this->input->post('pp_expire_date_g');
        $pp_exp_year_g      =     $this->input->post('pp_expire_year_g');
        $us_visa_g      =     $this->input->post('us_visa_g');
        $obtain_us_visa_g      =     $this->input->post('obtain_us_visa_g');
        $visa_num_g      =     $this->input->post('visa_type_g');
        $visa_exp_date_g      =     $this->input->post('visa_exp_date_g');
      //  $schengen_g      =     $this->input->post('schengen_g');
      //  $schengen_exp_date_g      =     $this->input->post('schengen_exp_date_g');
        $issue_date_g       = "$pp_issue_year_g-$pp_issue_month_g-$pp_issue_date_g";
        $expire_date_g  = "$pp_exp_year_g-$pp_exp_month_g-$pp_exp_date_g";
        if($citizen_g == 28 || $citizen_g == 147){ //united state or canada
            $visa_num_g = $visa_exp_date_g = "";
        }
       
        //First We Need to check if there is User Data in table
        $selectRegData = array('id as RegID, noguest as Companion',false);
        $whereRegData = array(
            'user_id' => $userID
        );
        $winnerRegRecord = $this->Common_model->select_fields_where('register',$selectRegData,$whereRegData,true);

        if(isset($winnerRegRecord) && !empty($winnerRegRecord->RegID)){
            $winnerRegID = $winnerRegRecord->RegID;
            $companion = $winnerRegRecord->Companion;

        //we can start update process here
            $updateWinnerData = array(
                'passport' => $passport,
                'citizen' => $citizen,
                'issue_city' => $issue_city,
                'issue_date' => $issue_date,
                'expire_date' => $expire_date,
                'us_visa' => $us_visa,
                'obtain_visa' => $obtain_us_visa,
               // 'schengen' => $usa_visa_num,
               // 'schengen_exp_date' => $usa_exp_date,
                'visa_type' => $visa_num,
                'visa_exp_date' => $visa_exp_date,
            );
            $whereUpdateWinner = array(
                'id' => $winnerRegID
            );

            $this->Common_model->update('register',$whereUpdateWinner,$updateWinnerData);

            //Also we need to run update query for guest/companion if and if there is any companion/guest
            if($companion === 'Yes'){

                $selectRegData = array('id as RegID',false);
                $whereRegData = array(
                    'guest_of' => $userID
                );
                $guestRegRecord = $this->Common_model->select_fields_where('register',$selectRegData,$whereRegData,true);

                if(isset($guestRegRecord) && !empty($guestRegRecord->RegID)){
                    $guestRegID = $guestRegRecord->RegID;
                    $updateGuestData = array(
                        'passport' => $passport_g,
                        'citizen' => $citizen_g,
                        'issue_city' => $issue_city_g,
                        'issue_date' => $issue_date_g,
                        'expire_date' => $expire_date_g,
                        'us_visa' => $us_visa_g,
                        'obtain_visa' => $obtain_us_visa_g,
                        'visa_type' => $visa_num_g,
                        'visa_exp_date' => $visa_exp_date_g,
                    );

                    $whereUpdateWinner = array(
                        'id' => $guestRegID
                    );
                    $this->Common_model->update('register',$whereUpdateWinner,$updateGuestData);
                }
            }
        }

    }
    protected function saveStepThreeInfo(){
        if($this->data['regIsLocked']) return true;
        $userID = $this->loggedInUserID;
        $emergency_name = $this->input->post('emergency_name');
        $emergency_home_phone = $this->input->post('emergency_home_phone');
        $emergency_work_phone = $this->input->post('emergency_work_phone');
        $emergency_cell_phone = $this->input->post('emergency_cell_phone');
        $dr_name = $this->input->post('dr_name');
        $dr_day_phone = $this->input->post('dr_day_phone');
        $dr_alt_phone = $this->input->post('dr_alt_phone');
        $medical_conditions = $this->input->post('medical_conditions');
        $medication = $this->input->post('medication');
        $medical_food = $this->input->post('medical_food');
        $religious_food = $this->input->post('religious_food');
        $intolerant = $this->input->post('intolerant');
        $occasion = $this->input->post('occasion');
        $special_date = $this->input->post('special_date');

        $diabetic = $this->input->post('diabetic');
        $hypertension = $this->input->post('hypertension');
        $vegetarian = $this->input->post('vegetarian');
        $fish = $this->input->post('fish');
        $chicken = $this->input->post('chicken');


        //Just Updating Checks with 1's and 0's
        if (isset($diabetic)) {
            $diabetic = 1;
        } else {
            $diabetic = 0;
        }

        if (isset($hypertension)) {
            $hypertension = 1;
        } else {
            $hypertension = 0;
        }

        if (isset($vegetarian)) {
            $vegetarian = 1;
        } else {
            $vegetarian = 0;
        }

        if (isset($fish)) {
            $fish = 1;
        } else {
            $fish = 0;
        }

        if (isset($chicken)) {
            $chicken = 1;
        } else {
            $chicken = 0;
        }

        //Companion Info if any
        //guest section
        $emergency_name_g = $this->input->post('emergency_name_g');
        $emergency_home_phone_g = $this->input->post('emergency_home_phone_g');
        $emergency_work_phone_g = $this->input->post('emergency_work_phone_g');
        $emergency_cell_phone_g = $this->input->post('emergency_cell_phone_g');
        $dr_name_g = $this->input->post('dr_name_g');
        $dr_day_phone_g = $this->input->post('dr_day_phone_g');
        $dr_alt_phone_g = $this->input->post('dr_alt_phone_g');
        $medical_conditions_g = $this->input->post('medical_conditions_g');
        $medication_g = $this->input->post('medication_g');
        $medical_food_g = $this->input->post('medical_food_g');
        $religious_food_g = $this->input->post('religious_food_g');
        $intolerant_g = $this->input->post('intolerant_g');
        $occasion_g = $this->input->post('occasion_g');
        $special_date_g = $this->input->post('special_date_g');

        $diabetic_g = $this->input->post('diabetic_g');
        $hypertension_g = $this->input->post('hypertension_g');
        $vegetarian_g = $this->input->post('vegetarian_g');
        $fish_g = $this->input->post('fish_g');
        $chicken_g = $this->input->post('chicken_g');

        $diabetic_g = (isset($diabetic_g) && !empty($diabetic_g)) ? 1 : 0;
        $hypertension_g = (isset($hypertension_g) && !empty($hypertension_g)) ? 1 : 0;
        $vegetarian_g = (isset($vegetarian_g) && !empty($vegetarian_g)) ? 1 : 0;
        $fish_g = (isset($fish_g) && !empty($fish_g)) ? 1 : 0;
        $chicken_g = (isset($chicken_g) && !empty($chicken_g)) ? 1 : 0;

        //Update Winner Info
        //First  Get RegID
        $selectDataWinner = array(
            'id as RegID, noguest as Companion', false
        );
        $whereWinner = array(
            'user_id' => $userID
        );
        $winnerRegRecord = $this->Common_model->select_fields_where('register', $selectDataWinner, $whereWinner, true);

        if (isset($winnerRegRecord) && !empty($winnerRegRecord->RegID)) {
            $winnerRegID = $winnerRegRecord->RegID;
            $companion = $winnerRegRecord->Companion;
            //we can update the record now.
            $winnerUpdateData = array(
                'emergency_name' => $emergency_name,
                'emergency_home' => $emergency_home_phone,
                'emergency_work' => $emergency_work_phone,
                'emergency_cell' => $emergency_cell_phone,
                'dr_name' => $dr_name,
                'dr_day_phone' => $dr_day_phone,
                'dr_alt_phone' => $dr_alt_phone,
                'med_conditions' => $medical_conditions,
                'medication' => $medication,
                'med_food' => $medical_food,
                'religious_food' => $religious_food,
                'intolerant' => $intolerant,
                'occasion' => $occasion,
                'special_date' => $special_date,
                //Checkboxes
                'diabetic' => $diabetic,
                'hypertension' => $hypertension,
                'vegetarian' => $vegetarian,
                'fish' => $fish,
                'chicken' => $chicken,
            );

            $whereUpdate = array(
                'id' => $winnerRegID
            );

            $this->Common_model->update('register', $whereUpdate, $winnerUpdateData);

            if ($companion === "Yes") { //If this winner has any companion, need to update the data of companion too.

                //To Update guest info..
                //We First need to Get RegID of Guest
                $selectDataGuest = array(
                    'id as RegID', false
                );
                $guestWinner = array(
                    'guest_of' => $userID
                );
                $guestRegRecord = $this->Common_model->select_fields_where('register', $selectDataGuest, $guestWinner, true);

                if (isset($guestRegRecord->RegID) && !empty($guestRegRecord->RegID)) {
                    $guestRegID = $guestRegRecord->RegID;


                    //Now we can update Guest Details.
                    $guestUpdateData = array(
                        'emergency_name' => $emergency_name_g,
                        'emergency_home' => $emergency_home_phone_g,
                        'emergency_work' => $emergency_work_phone_g,
                        'emergency_cell' => $emergency_cell_phone_g,
                        'dr_name' => $dr_name_g,
                        'dr_day_phone' => $dr_day_phone_g,
                        'dr_alt_phone' => $dr_alt_phone_g,
                        'med_conditions' => $medical_conditions_g,
                        'medication' => $medication_g,
                        'med_food' => $medical_food_g,
                        'religious_food' => $religious_food_g,
                        'intolerant' => $intolerant_g,
                        'occasion' => $occasion_g,
                        'special_date' => $special_date_g,
                        //Checkboxes
                        'diabetic' => $diabetic_g,
                        'hypertension' => $hypertension_g,
                        'vegetarian' => $vegetarian_g,
                        'fish' => $fish_g,
                        'chicken' => $chicken_g,
                    );


                    $whereUpdate = array(
                        'id' => $guestRegID
                    );

                    $this->Common_model->update('register', $whereUpdate, $guestUpdateData);
                }
            }
        }
    }
    protected function saveStepFourInfo(){
        if($this->data['regIsLocked']) return true;
        $userID = $this->loggedInUserID;
        //Winner Section
        $fflyer = $this->input->post('frequent_flyer');
        $ff_number = $this->input->post('frequent_flyer_no');
        $off_airline = $this->input->post('off_airline');
        $fflyer_alt = $this->input->post('frequent_flyer_alt');
        $seating = $this->input->post('seating');
        $bags = $this->input->post('luggage');
        $bed = $this->input->post('bed');
        $air_notes = $this->input->post('air_notes');
        $air_notes_dpt = $this->input->post('air_notes_dpt');
        $airport_code = $this->input->post('airport_code');
        $depart_date = $this->input->post('depart_date');
        $return_date = $this->input->post('return_date');
        $ff_number_alt = $this->input->post('frequent_flyer_no_alt');
        $off_airline_alt = $this->input->post('off_airline_alt');
        $travel_req = $this->input->post('travel_req');

        if($depart_date == 'other'){
            $dpt_mon = $this->input->post('desired_dpt_mon');
            $dpt_day = $this->input->post('desired_dpt_day');
            $desired_dpt = date('Y').'-'.$dpt_mon.'-'.$dpt_day;
        } else $desired_dpt = '';

        if($return_date == 'other'){
            $rt_mon = $this->input->post('desired_rt_mon');
            $rt_day = $this->input->post('desired_rt_day');
            $desired_rt = date('Y').'-'.$rt_mon.'-'.$rt_day;
        } else $desired_rt = '';

        if ($fflyer == "No"){
            $ff_airline = "";
        } else {
            $ff_airline = $this->input->post('ff_airline');
        }

        if ($fflyer_alt == "No"){
            $ff_airline_alt = "";
        } else {
            $ff_airline_alt = $this->input->post('ff_airline_alt');
        }

        //Guest Section
        $fflyer_g = $this->input->post('frequent_flyer_g');
        $ff_number_g = $this->input->post('frequent_flyer_no_g');
        $off_airline_g = $this->input->post('off_airline_g');
        $fflyer_alt_g = $this->input->post('frequent_flyer_alt_g');
        $air_notes_g = $this->input->post('air_notes_g');
        $air_notes_gdpt = $this->input->post('air_notes_gdpt');
        $bags_g = $this->input->post('luggage_g');
        $airport_code_g = $this->input->post('airport_code_g');
        $depart_date_g = $this->input->post('depart_date_g');
        $return_date_g = $this->input->post('return_date_g');
        $ff_number_alt_g = $this->input->post('frequent_flyer_no_alt_g');
        $off_airline_alt_g = $this->input->post('off_airline_alt_g');
        $travel_req_g = $this->input->post('travel_req_g');

        if($depart_date_g == 'other'){
            $dpt_mon = $this->input->post('desired_dpt_mon_g');
            $dpt_day = $this->input->post('desired_dpt_day_g');
            $desired_dpt_g = date('Y').'-'.$dpt_mon.'-'.$dpt_day;
        } 
        else $desired_dpt_g = '';

        if($return_date_g == 'other'){
            $rt_mon = $this->input->post('desired_rt_mon_g');
            $rt_day = $this->input->post('desired_rt_day_g');
            $desired_rt_g = date('Y').'-'.$rt_mon.'-'.$rt_day;
        } else $desired_rt_g = '';


        if ($fflyer_g == "No"){
            $ff_airline_g = "";
        } else {
            $ff_airline_g   = $this->input->post('ff_airline_g');
        }

        if ($fflyer_alt_g == "No"){
            $ff_airline_alt_g = "";
        } else {
            $ff_airline_alt_g    = $this->input->post('ff_airline_alt_g');
        }


        ///Now lets see if there is register record against this user..
        $registerTable = "register";
        $selectWinnerData = array(
            'id as RegID, noguest as Companion',false
        );
        $whereWinner = array(
            'user_id' => $userID
        );

        $winnerRegRecord = $this->Common_model->select_fields_where($registerTable,$selectWinnerData,$whereWinner,true);

        if(isset($winnerRegRecord) && !empty($winnerRegRecord->RegID)){
            $winnerRegID = $winnerRegRecord->RegID;
            $Companion = $winnerRegRecord->Companion;
            //now we can update winner record in table.
            $winnerUpdateData = array(
                'fflyer' => $fflyer,
                'ff_number' => $ff_number,
                'ff_airline' => $ff_airline,
                'off_airline' => $off_airline,
                'fflyer_alt' => $fflyer_alt,
                'seating' => $seating,
                'bags' => $bags,
                'bed' => $bed,
                'air_notes' => $air_notes,
                'airport_code' => $airport_code,
                'depart_date' => $depart_date,
                'return_date' => $return_date,
                'ff_number_alt' => $ff_number_alt,
                'ff_airline_alt' => $ff_airline_alt,
                'off_airline_alt' => $off_airline_alt,
                'air_notes_dpt' => $air_notes_dpt,
                'travel_req' => $travel_req,
                'desired_dpt_date' => $desired_dpt,
                'desired_ret_date' => $desired_rt
            );

            $whereWinnerUpdate = array(
                'id' => $winnerRegID
            );
            $this->Common_model->update($registerTable,$whereWinnerUpdate,$winnerUpdateData);

            if($Companion === "Yes"){ //If Winner has guest or companion

                ///Now lets see if there is register record against this user..
                $registerTable = "register";
                $selectGuestData = array(
                    'id as RegID',false
                );
                $whereGuest = array(
                    'guest_of' => $userID
                );

                $guestRegRecord = $this->Common_model->select_fields_where($registerTable,$selectGuestData,$whereGuest,true);

                if(isset($guestRegRecord) && !empty($guestRegRecord->RegID)){

                    $guestRegID = $guestRegRecord->RegID;


                    $guestUpdateData = array(
                        'fflyer' => $fflyer_g,
                        'ff_number' => $ff_number_g,
                        'ff_airline' => $ff_airline_g,
                        'off_airline' => $off_airline_g,
                        'fflyer_alt' => $fflyer_alt_g,
                        //'seating' => $seating_g,
                        'bags' => $bags_g,
                        //'bed' => $bed_g,
                        'air_notes' => $air_notes_g,
                        'airport_code' => $airport_code_g,
                        'depart_date' => $depart_date_g,
                        'return_date' => $return_date_g,
                        'ff_number_alt' => $ff_number_alt_g,
                        'ff_airline_alt' => $ff_airline_alt_g,
                        'off_airline_alt' => $off_airline_alt_g,
                        'air_notes_dpt' => $air_notes_gdpt,
                        'travel_req' => $travel_req_g,
                        'desired_dpt_date' => $desired_dpt_g,
                        'desired_ret_date' => $desired_rt_g
                    );

                    $whereGuestUpdate = array(
                        'id' => $guestRegID
                    );

                    $this->Common_model->update($registerTable,$whereGuestUpdate,$guestUpdateData);
                }
            }
        }    
    }
    protected function saveStepFiveInfo(){
        if($this->data['regIsLocked']) return true;
        $userID = $this->loggedInUserID;
        $choice1 = $this->input->post('choice1');
        $choice2 = $this->input->post('choice2');
        $choice3 = $this->input->post('choice3');

        $choice1_g = $this->input->post('choice1_g');
        $choice2_g = $this->input->post('choice2_g');
        $choice3_g = $this->input->post('choice3_g');

        ///Now lets see if there is register record against this user..
        $registerTable = "register";
        $selectWinnerData = array(
            'id as RegID, noguest as Companion',false
        );
        $whereWinner = array(
            'user_id' => $userID
        );

        $winnerRegRecord = $this->Common_model->select_fields_where($registerTable,$selectWinnerData,$whereWinner,true);

        if(isset($winnerRegRecord) && !empty($winnerRegRecord->RegID)){
            $winnerRegID = $winnerRegRecord->RegID;
            $Companion = $winnerRegRecord->Companion;
            //now we can update winner record in table.
            $winnerUpdateData = array(
                'choice1' => $choice1,
                'choice2' => $choice2,
                'choice3' => $choice3
            );

            $whereWinnerUpdate = array(
                'id' => $winnerRegID
            );
            $this->Common_model->update($registerTable,$whereWinnerUpdate,$winnerUpdateData);

            if($Companion === "Yes"){ //If Winner has guest or companion

                ///Now lets see if there is register record against this user..
                $registerTable = "register";
                $selectGuestData = array(
                    'id as RegID',false
                );
                $whereGuest = array(
                    'guest_of' => $userID
                );

                $guestRegRecord = $this->Common_model->select_fields_where($registerTable,$selectGuestData,$whereGuest,true);

                if(isset($guestRegRecord) && !empty($guestRegRecord->RegID)){

                    $guestRegID = $guestRegRecord->RegID;


                    $guestUpdateData = array(
                        'choice1' => $choice1_g,
                        'choice2' => $choice2_g,
                        'choice3' => $choice3_g
                    );

                    $whereGuestUpdate = array(
                        'id' => $guestRegID
                    );

                    $this->Common_model->update($registerTable,$whereGuestUpdate,$guestUpdateData);
                }
            }
        }

    }
    protected function saveStepSixInfo(){
        if($this->data['regIsLocked']) return true;
        $userID = $this->loggedInUserID;
        $cc_type = $this->input->post('cc_type');
        $card_name = $this->input->post('card_name');
        $card_no = $this->input->post('card_no');
        $cc_month = $this->input->post('cc_month');
        $cc_year = $this->input->post('cc_year');
        $cvv = $this->input->post('cvv');
        $cc_st_1address = $this->input->post('cc_st_1address');
        $cc_st_2address = $this->input->post('cc_st_2address');
        $cc_city = $this->input->post('cc_city');
        $cc_state = $this->input->post('cc_state');
        $cc_zip = $this->input->post('cc_zip');
        $cc_country = $this->input->post('cc_country');

        $exp_date = $cc_year.'-'.$cc_month;

        $registerTable = 'register';

        //check the userReg ID

        $selectWinnerData = array('id as RegID',false);
        $whereWinner =array(
            'user_id' => $userID
        );
        $winnerRegRecord = $this->Common_model->select_fields_where($registerTable,$selectWinnerData,$whereWinner,true);
        if(isset($winnerRegRecord) && !empty($winnerRegRecord->RegID)){
            $winnerRegID= $winnerRegRecord->RegID;

            $winnerUpdateData = array(
                'cc_type' => $cc_type,
                'card_name' => $card_name,
                //'card_number' => encryption($card_no),
                'exp_date' => encryption($exp_date),
                'cvv' => encryption($cvv),
                'cc_st_1address' => $cc_st_1address,
                'cc_st_2address' => $cc_st_2address,
                'cc_city' => $cc_city,
                'cc_state' => $cc_state,
                'cc_zip' => $cc_zip,
                'cc_country' => $cc_country
            );

            if (!preg_match( '/(\*)/', $card_no )) {
                $winnerUpdateData['card_number'] = encryption($card_no);
            }

            $updateWhere = array(
                'id' => $winnerRegID
            );

            $updateResult = $this->Common_model->update($registerTable,$updateWhere,$winnerUpdateData);
        }

        $this->data['cardDetails'] = array(
            'cc_type' => $cc_type,
            'card_name' => $card_name,
            'card_number' => $card_no,
            'exp_date' => $exp_date,
            'cvv' => $cvv,
            'cc_st_1address' => $cc_st_1address,
            'cc_country' => $cc_country
        );

    }
    protected function confirmRegistration(){
        $userID = $this->loggedInUserID;
        $postedData = $this->input->post();
       /* echo '<pre>';
        print_r($postedData); exit;*/
        $fields = $this->getFields();

        $fieldsToBeEncrypt = ['card_number','exp_date','cvv'];

        $insertData= [];
        foreach($postedData as $key=>$data){
            if(strpos($key, '_guest')){ 
                $key = str_replace('_guest', '', $key);
                $type = 'companion';
            } else $type = 'winner';

            if(in_array($key, $fields['required']) && !empty($data) && $data != '0000-00-00'){ // if field is required and not empty
                if(in_array($key, $fieldsToBeEncrypt)) // fields to be encrpt
                    $data = encryption($data);
                $insertData[$type][$key] = $data;
            }
            else if(in_array($key, $fields['optionals'])){
                $insertData[$type][$key] = $data;
            }
        }
        // update data 
        $this->Common_model->update('register',['user_id'=>$userID], $insertData['winner']);
        // check if guest exist then update guest data also
        $row = $this->Common_model->select_fields_where('register','noguest, visa_type, visa_exp_date', ['user_id'=>$userID], true);
        if($row->noguest == 'Yes'){
            $this->Common_model->update('register', ['guest_of'=>$userID], $insertData['companion']);
        }

        // lets check if user has completed the remaining required fields
        // remaining required fields are 
        $remainingReqFields = ['visa_type','visa_exp_date'];
        $this->sendRegCompletedEmail();
    }
    protected function getFields(){
        $data = [
        'required' => ['title','first_name','last_name','name_badge','name_badge_last','birth_date','home','st_1address','city','country','passport','citizen','issue_date','issue_city','expire_date','emergency_name','emergency_home','seating','bags','bed','airport_code','depart_date','return_date','cc_type','card_name','card_number','exp_date','cvv','cc_st_1address','cc_country','visa_type','visa_exp_date','choice1','choice2','choice3'],
        'optionals' => ['gender','birth_country','work','cell','alt_email','zip','us_visa','obtain_visa','emergency_work','emergency_cell','dr_name','dr_day_phone','dr_alt_phone','med_conditions','medication','med_food','religious_food','intolerant','occasion','special_date','fflyer','ff_number','ff_airline','off_airline','fflyer_alt','ff_number_alt','ff_airline_alt','desired_dpt_date','desired_ret_date','cc_city','cc_zip','travel_req','air_notes','air_notes_dpt']
        ];
        if($this->data['userData']->club == 1){
            array_push($data['required'],'shirt_size');
        }
        return $data;
    }

    // save remaining fields
    protected function saveRemainingFields(){
        $userID = $this->loggedInUserID;
        $postData = $this->input->post();
        $newData = [];
        $update = false;
        if($this->data['userData']->citizen != 28 && $this->data['userData']->citizen != 147){
            $visaNo = $this->data['userData']->visa_type;
            $visaExpDate = $this->data['userData']->visa_exp_date;
            if(empty($visaNo) && !empty($postData['visa_type']))
                $newData['visa_type'] = $postData['visa_type'];

            if((empty($visaExpDate) || $visaExpDate == "0000-00-00") && !empty($postData['visa_exp_date']))
                $newData['visa_exp_date'] = date('Y-m-d', strtotime($postData['visa_exp_date']));
        }
        if(!empty($newData)){
            $this->Common_model->update('register',['user_id'=>$userID], $newData);
            $update = true;
        }
        if($this->data['userData']->noguest == 'Yes'){ // do this for companion also
            $newData = [];
            if($this->data['guestData']->citizen != 28 && $this->data['guestData']->citizen != 147){
                $visaNo = $this->data['guestData']->visa_type;
                $visaExpDate = $this->data['guestData']->visa_exp_date;
                if(empty($visaNo) && !empty($postData['visa_type_g']))
                    $newData['visa_type'] = $postData['visa_type_g'];

                if((empty($visaExpDate) || $visaExpDate == "0000-00-00") && !empty($postData['visa_exp_date_g']))
                    $newData['visa_exp_date'] = date('Y-m-d', strtotime($postData['visa_exp_date_g']));
            }
            if(!empty($newData)){
                $this->Common_model->update('register', ['guest_of'=>$userID], $newData);
                $update = true;
            }
        }
  
        if($update){
            $status = $this->Common_model->select_fields_where('register','status',['user_id'=>$userID], true); 
            if($status->status == 'confirm'){
                $this->sendRegCompletedEmail(); // check all req fields are completed ,send email
            }
        }
    }

    protected function sendRegCompletedEmail(){
        $userID = $this->loggedInUserID;
        $selectData = ["visa_type, visa_exp_date, noguest"];
        $sendMail = true;
        $user = $this->Common_model->select_fields_where('register',$selectData[0], ['user_id'=>$userID], true);  
        if(empty($user->visa_type) || empty($user->visa_exp_date) || $user->visa_exp_date == '0000-00-00'){
            $sendMail = false;
        }
        if($user->noguest == 'Yes'){
            $user = $this->Common_model->select_fields_where('register',$selectData[0], ['guest_of'=>$userID], true);   
            if(empty($user->visa_type) || empty($user->visa_exp_date) || $user->visa_exp_date == '0000-00-00')
            {
                $sendMail = false;
            }
        }

        if($sendMail){
            // when no required field is empty, then send registration completed email
            $emailTemplate = get_email_templates(4);
            if(!empty($emailTemplate->subject)){
                $messageSubject=$emailTemplate->subject;
            }else{
                $messageSubject="You have been completed your registration";
            }
            $messageBody= str_replace(array('[SENDER]', '[NAME]', '[MAILSUBJECT]'),
                array($this->data['noReply'], $this->data['Company'], $messageSubject), $emailTemplate->body);

            $messageBody = htmlspecialchars_decode($messageBody);
            $config=$this->data['mailConfiguration'];
            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");

            //Now Lets Send The Email..
            $this->email->to($this->data['loggedinuser']->email);

            $this->email->from($this->data['noReply'],$this->data['Company']);
            $this->email->subject($messageSubject);
            $this->email->message($messageBody);
            $this->email->send();
        }
    }


   
}
