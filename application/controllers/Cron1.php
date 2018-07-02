<?php
/**
 * uring the time that registration isConfigurationystem is meant to run a cron at the end of every week which checks
 * to see whether the user has entered the ‘mandatory’ criteria
 * (please note that mandatory fields are in red text in the attached spreadsheet):
 *
 *
 */
class Cron extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model');
    }

    protected function check_mandatory_fields()
    { exit;
        //We need to check if mandatory fields have been entered by user or no, if not, and if registration is open then email them.
        $PTable = 'register R';
        $selectData = array('
        id AS RegID,
        email AS Email,
        R.title,
        R.first_name,
        R.last_name,
        R.birth_date,
        R.name_badge,
        R.name_badge_last,
        R.gender,
        R.shirt_size,
        R.home,
        R.passport,
        R.citizen,
        R.issue_city,
        R.issue_date,
        R.expire_date,
        R.emergency_name,
        R.emergency_home,
        R.seating,
        R.bags,
        R.bed
        ', false);
        $where = '(
         (R.title IS NULL OR R.title = "") OR
         (R.first_name IS NULL OR R.first_name = "") OR 
         (R.last_name IS NULL OR R.last_name = "") OR 
         (R.birth_date IS NULL OR R.birth_date = "") OR 
         (R.name_badge IS NULL OR R.name_badge = "") OR 
         (R.name_badge_last IS NULL OR R.name_badge_last = "") OR 
         (R.gender IS NULL OR R.gender = "") OR 
         (R.shirt_size IS NULL OR R.shirt_size = "") OR 
         (R.home IS NULL OR R.home = "") OR
         (R.passport IS NULL OR R.passport = "") OR
         (R.citizen IS NULL OR R.citizen = "") OR
         (R.issue_city IS NULL OR R.issue_city = "") OR
         (R.issue_date IS NULL OR R.issue_date = "") OR
         (R.expire_date IS NULL OR R.expire_date = "") OR
         (R.emergency_name IS NULL OR R.emergency_name = "") OR
         (R.emergency_home IS NULL OR R.emergency_home = "") OR
         (R.seating IS NULL OR R.emergency_name = "") OR
         (R.bags IS NULL OR R.emergency_name = "") OR
         (R.bed IS NULL OR R.emergency_name = "")
          ) AND (email IS NOT NULL) AND email != ""
         ';
        $incompleteUsers = $this->Common_model->select_fields_where($PTable, $selectData, $where);
        //        var_dump($incompleteUsers);

        if (!empty($incompleteUsers)) {
            $failedEmails = array();
            $successEmails = array();
            foreach ($incompleteUsers as $key => $User) {

                $userEmail = $User->Email;

                //Need to check what values are missing.
                $errorMessages = "<ul>";
                if(empty($User->title)){
                    $errorMessages.="<li>Your Profile Registration is Missing <strong>Title</strong></li>";
                }
                if(empty($User->first_name)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>First Name</b></li>";
                }
                if(empty($User->last_name)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Last Name</b></li>";
                }
                if(empty($User->birth_date)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Birth Date</b></li>";
                }
                if(empty($User->name_badge)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Name Badge</b></li>";
                }
                if(empty($User->name_badge_last)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Name Badge Last</b></li>";
                }
                if(empty($User->gender)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Gender</b></li>";
                }
                if(empty($User->shirt_size)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Shirt Size</b></li>";
                }
                if(empty($User->home)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Home Telephone Number</b></li>";
                }
                if(empty($User->passport)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Passport</b></li>";
                }
                if(empty($User->citizen)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Citizen</b></li>";
                }
                if(empty($User->issue_city)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Issue City</b></li>";
                }
                if(empty($User->issue_date)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Issue Date</b></li>";
                }
                if(empty($User->expire_date)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Expire Date</b></li>";
                }
                if(empty($User->emergency_name)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Emergency Name</b></li>";
                }
                if(empty($User->emergency_home)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Emergency Home Telephone Contact</b></li>";
                }
                if(empty($User->seating)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Your Seating Preference</b></li>";
                }
                if(empty($User->bags)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>No of Bags</b></li>";
                }
                if(empty($User->bed)){
                    $errorMessages.="<li>Your Profile Registration is Missing <b>Bed Configuration</b></li>";
                }
                $errorMessages .= "</ul>";


                //Also Need to Send Email to User, so they should know they need to complete their profile.

                $messageSubject="You are Missing Some attributes in Your Registration";
                $messageBody="<html>Dear User!<br />
                You are missing some information in your registration page, please complete your profile.
                <br/>
                Complete the Following items in your profile<br/>
				 ".$errorMessages."</html>";
                $config=$this->data['mailConfiguration'];
                $this->load->library('email');
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");

                //Now Lets Send The Email..
                $this->email->to($userEmail);
                $this->email->from($this->data['noReply'],$this->data['Company']);
                $this->email->subject($messageSubject);
                $this->email->message($messageBody);
                if($this->email->send()) {
                    $successEmails[$User->RegID] = $User->Email;
                }else{
                    $failedEmails[$User->RegID] = $User->Email;
                }
            }

            if(!empty($successEmails)){
                echo "Emails were successfully sent to the following users<br />";
                print_r($successEmails);
            }

            if(!empty($failedEmails)){
                echo "Emails could not be sent to the following users <br />";
                print_r($failedEmails);
            }
        } 
    }


    public function checkRegistrationComplete(){ 
        exit;
        $selectData = ['u.email as uEmail, u.id as userID, R.*', false];
        $joins = [
           ['table' => 'register R',
            'condition'=>'u.id = R.user_id OR u.id = R.guest_of',
            'type' => 'inner' ]
        ];
        $where = ['u.userlevel !='=> 9];
        $registrations = $this->Common_model->select_fields_where_like_join('users u', $selectData, $joins, $where);

        $misReqFieldTemp = get_email_templates(18);
        $confRegTemp = get_email_templates(19);
        $userRegistration = [];
        foreach($registrations as $register){
            if(isset($userRegistration[$register->userID]))
                array_push($userRegistration[$register->userID], $register);
            else $userRegistration[$register->userID] = [$register];
        }
        foreach($userRegistration as $register){
            $this->makeEmailBody($register, $misReqFieldTemp, $confRegTemp);
        }

    }

    protected function makeEmailBody($data, $reqFieldTmp, $confRegTmp){
        $messageBody = "";
        $isAnyFieldEmpty = 0;
        $status = "";
        foreach($data as $reg){
            if($reg->user_id != 0){
                $status = $reg->status;
                $winnerFields = $this->winnerFields();

                if($reg->club == 1){
                    $winnerFields['Personal Information']['shirt_size'] = 'Shirt Size';
                }

                // check citizen 
                if($reg->citizen != 28 && $reg->citizen != 147){
                    $winnerFields['Passport Information']['visa_type'] = 'Canadian Visa/Canadian eTA Number';
                    $winnerFields['Passport Information']['visa_exp_date'] = 'Canadian Visa/Canadian eTA Expiration Date';
                }

                $titleCount = 0;
                foreach($winnerFields as $k => $sect){
                    $messageBody .= "";
                    $count = 0;
                    foreach($sect as $key => $field){
                        if(empty($reg->$key) || (strpos($key, 'date') && ($reg->$key == '--' || $reg->$key == '0000-00-00'))){ 
                            if($titleCount == 0){
                                $messageBody = "<br/><h3>Winner Missing Info</h3>";
                                $titleCount += 1;
                            }
                            if($count == 0){    
                                $messageBody .= '<strong>'.$k.'</strong><br/>';
                                $count += 1;
                            }
                            $messageBody .= $field.'<br/>';
                            $isAnyFieldEmpty = 1;
                        }
                    } // end of inner foreach
                }
            } else if($reg->guest_of != 0 && $reg->noguest == 'Yes'){
                $guestFields = $this->guestFields();
                if($reg->club == 1){
                    $guestFields['Personal Information']['shirt_size'] = 'Shirt Size';
                }

                
                // check citizen 
                if($reg->citizen != 28 && $reg->citizen != 147){
                    $guestFields['Passport Information']['visa_type'] = 'Canadian Visa/Canadian eTA Number';
                    $guestFields['Passport Information']['visa_exp_date'] = 'Canadian Visa/Canadian eTA Expiration Date';
                }

                $titleCount = 0;
                foreach($guestFields as $k => $sect){
                    $count = 0;
                    foreach($sect as $key => $field){
                        if(empty($reg->$key) || (strpos($key, 'date') && ($reg->$key == '--' || $reg->$key == '0000-00-00'))){
                            if($titleCount == 0){
                                $messageBody .= "<h3>Your Companion Missing Info</h3>";
                                $titleCount += 1;
                            }
                            if($count == 0){    
                                $messageBody .= '<strong>'.$k.'</strong><br/>';
                                $count += 1;
                            }
                            $messageBody .= $field.'<br/>';
                            $isAnyFieldEmpty = 1;
                        }
                    } // end of inner foreach
                }
            }
        }
        if($isAnyFieldEmpty == 1){
            $this->sendEmail($reqFieldTmp, $messageBody, $reg->uEmail);  
        } 
        // check if no field is empty then send confirmation email
        else if($isAnyFieldEmpty == 0 && $status != 'confirm'){
           $this->sendEmail($confRegTmp, "", $reg->uEmail); 
        }
    }

    protected function winnerFields(){
          return $winnerFields = [
            'Personal Information' => [
                'title'=>'Title',
                'first_name'=>'First Name',
                'last_name' =>'Last Name',
                'name_badge'=>'Badge First Name',
                'name_badge_last'=>'Badge Last Name',
                'birth_date'=>'Date Of Birth',
               // 'birth_country'=>'Birth Place (Country Of Birth)',
                'home'=>'Home Phone',
                'email'=>'Email',
                'st_1address'=>'Street Address 1',
                'city'=>'State/Province/Parish',
                'country'=>'Country',
                ],
            'Passport Information' => [
                'passport'=>'Passport Number',
                'citizen'=>'Passport Country',
                'issue_date'=>'Passport Issue Date',
                'issue_city'=>'Passport Issue City',
                'expire_date'=>'Passport Expire Date'
            ],
            'Emergency Contact Information'=>[
                'emergency_name'=>'Emergency Contact Name',
                'emergency_home'=>'Emergency Contact Home Phone Number'
            ],
            'Flight and Accommodation'=>[
                'seating'=>'Airline Seat preference',
                'bags'=>'Number of bags you will personally check in',
                'bed'=>'Bed Configuration',
                'airport_code'=>'I will be flying out of',
                'depart_date'=>'I would like to depart from my home city',
                'return_date'=>'How are you returning?'
            ],
            'Activities' => [
                'choice1'=>'First choice',
                'choice2'=>'Second choice',
                'choice3'=>'Third choice',
            ],
            'Credit Cart Information' => [
                'cc_type'=>'Credit Card Type',
                'card_name'=>'Credit Card Holder',
                'card_number'=>'Credit Card Number',
                'exp_date'=>'Credit Card Expiration Date',
                'cvv'=>'Credit Card CVV',
                'cc_st_1address'=>'Credit Card Street Address 1',
                'cc_country'=>'Credit Card Country'
                ]
            ];
    }

    protected function guestFields(){
        return $guestFields =  [
            'Personal Information' => [
                'title'=>'Title',
                'first_name'=>'First Name',
                'last_name' =>'Last Name',
                'name_badge'=>'Badge First Name',
                'name_badge_last'=>'Badge Last Name',
                'birth_date'=>'Date Of Birth',
               // 'birth_country'=>'Birth Place (Country Of Birth)',
                'home'=>'Home Phone',
                'email'=>'Email',
                'st_1address'=>'Street Address 1',
                'city'=>'State/Province/Parish',
                'country'=>'Country',
                ],
            'Passport Information' => [
                'passport'=>'Passport Number',
                'citizen'=>'Passport Country',
                'issue_date'=>'Passport Issue Date',
                'issue_city'=>'Passport Issue City',
                'expire_date'=>'Passport Expire Date'
            ],
            'Emergency Contact Information'=>[
                'emergency_name'=>'Emergency Contact Name',
                'emergency_home'=>'Emergency Contact Home Phone Number'
            ],
            'Flight and Accommodation'=>[
                'bags'=>'Number of bags you will personally check in',
                'airport_code'=>'I will be flying out of',
                'depart_date'=>'I would like to depart from my home city',
                'return_date'=>'How are you returning?'
            ],
            'Activities' => [
                'choice1'=>'First choice',
                'choice2'=>'Second choice',
                'choice3'=>'Third choice',
            ]
         ];

    }
    protected function sendEmail($emailTemplate, $messageBody, $to){
        if(!empty($emailTemplate->subject)){
            $messageSubject=$emailTemplate->subject;
        }
        $messageBody = str_replace(array('[SENDER]', '[NAME]', '[MAILSUBJECT]','[BODY]'),
            array($this->data['noReply'], $this->data['Company'], $messageSubject, $messageBody), $emailTemplate->body);

        $messageBody = htmlspecialchars_decode($messageBody);
        $config=$this->data['mailConfiguration'];
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        //Now Lets Send The Email..
        $this->email->to($to);

        $this->email->from($this->data['noReply'],$this->data['Company']);
        $this->email->subject($messageSubject);
        $this->email->message($messageBody);
        if($this->email->send()) {
            echo "Email Sent to ".$to;
        }else{
            echo "Email Not Sent";
        }
    }


    protected function checkRegistrationComplete2(){
        exit;
        $registrations = $this->Common_model->select('register');
        $misReqFieldTemp = get_email_templates(18);
        $confRegTemp = get_email_templates(19);
        foreach($registrations as $register){
            $this->makeEmailBody($register, $misReqFieldTemp, $confRegTemp);
        }
    }
    protected function makeEmailBody2($data, $reqFieldTmp, $confRegTmp){
        $messageBody = "";
        $winnerFields = $this->winnerFields();
        $guestFields = $this->guestFields();
        $isAnyFieldEmpty = false;
        if($data->user_id != 0) { 
            $messageBody = "<h3>Winner Missing Info</h3>";
            foreach($winnerFields as $k => $sect){
                $messageBody .= "";
                $count = 0;
                foreach($sect as $key => $field){
                    if(empty($data->$key)){ 
                        if($count == 0){    
                            $messageBody .= '<strong>'.$k.'</strong><br/>';
                            $count += 1;
                        }
                        $messageBody .= $field.'<br/>';
                        $isAnyFieldEmpty = true;
                    }
                } // end of inner foreach
            }

            $userEmail = $this->Common_model->select_fields_where('users', '*', ['id'=>$data->user_id], true);
            if($isAnyFieldEmpty == true){
                $this->sendEmail($reqFieldTmp, $messageBody, $userEmail->email);  
            } 
        } else if($data->guest_of != 0) {
            $messageBody = "<h3>Your Companion Missing Info</h3>";
            foreach($guestFields as $k => $sect){
                $count = 0;
                foreach($sect as $key => $field){
                    if(empty($data->$key)){
                        if($count == 0){    
                            $messageBody .= '<strong>'.$k.'</strong><br/>';
                            $count += 1;
                        }
                        $messageBody .= $field.'<br/>';
                        $isAnyFieldEmpty = true;
                    }
                } // end of inner foreach
            }

            $userEmail = $this->Common_model->select_fields_where('users', '*', ['id'=>$data->guest_of], true);
            if($isAnyFieldEmpty == true){
                $this->sendEmail($reqFieldTmp, $messageBody, $userEmail->email);  
            } 
        }
        // check if no field is empty then send confirmation email
        if($isAnyFieldEmpty == false && isset($userEmail->email) && $userEmail->status != 'confirm'){
            $this->sendEmail($confRegTmp, "", $userEmail->email); 
        }
    }
    protected function testScript(){
        $config=$this->data['mailConfiguration'];
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        //Now Lets Send The Email..
        $this->email->to("arslanmehmood051@gmail.com");

        $this->email->from($this->data['noReply'],$this->data['Company']);
        $this->email->subject("Test");
        $this->email->message("Test");
        if($this->email->send()) {
            echo "Email Sent to arslanmehmood051@gmail.com";
        }else{
            echo "Email Not Sent";
        }
    }
}