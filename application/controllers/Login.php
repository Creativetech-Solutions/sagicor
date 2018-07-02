<?php

/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/11/2016
 * Time: 5:06 AM
 */
class Login extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        if(!LoggedIn())
            $this->f_show('site/pages/login', NULL, 'guest');
        else redirect('/');
    }
    public function authenticate()
    {
        $vals = $this->input->post();
        //check if username and password enter
        if(empty($vals['username']) || empty($vals['password'])){
            $this->session->set_flashdata('flashresponse', '<div class="alert-danger">Please enter valid username and password.</div>');
            redirect(base_url().'login', 'refresh');
        }

        $where  = "username='".$vals['username']."' AND password= '".$vals['password']."'";
        $user =	$this->Common_model->get_record_where('users',$where);
        if(empty($user)){
            $this->session->set_flashdata('flashresponse', '<div class="alert-danger">Login and/or password did not match to the database.</div>');
            redirect(base_url().'login', 'refresh');
        }

        if($user->active)
        { 
            switch ($user->active) {
                case "b":
                    $this->session->set_flashdata('flashresponse', '<div class="alert-danger error">Your account has been banned.</div>');
                    redirect(base_url().'login', 'refresh');
                    //return 1;
                    break;
                case "n":
                    $this->session->set_flashdata('flashresponse', '<div class="alert-danger error">Your account is not activated.</div>');
                    redirect(base_url().'login', 'refresh');
                    //return 2;
                    break;
                case "t":
                    $this->session->set_flashdata('flashresponse','<div class="alert-danger error">You need to verify your email address.</div>');
                    redirect(base_url().'login', 'refresh');
                    //return 3;
                    break;
                case "y":// update the last login date
                    $user->lastlogin = date('Y-m-d h:i:s');
                    $this->Common_model->update('users',['id'=>$user->id],['lastlogin'=>$user->lastlogin]);
                    $this->session->set_userdata('loggedinuser', $user);

                    //need to redirect depending on the user level
                    if(intval($user->userlevel) === 9){ //Super Admin
                        redirect(base_url().'admin/CPanel', 'refresh');
                    }else{
                        redirect(base_url(), 'refresh');
                    }
                    break;
                default :
                    $this->session->set_flashdata('flashresponse','<span class="alert-danger error">Unknown Status.</span>');
                    redirect(base_url().'admin/login', 'refresh');
                    break;

            }
        }//switch end

    }

    public function register(){
        $this->load->view('masterless/register');
    }


    public function do_register(){

        $sessionCaptcha = $_SESSION['captchacode'];

        $username = $this->input->post('username');
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        $email2 = $this->input->post('email2');
        $password = $this->input->post('pass');
        $cPassword = $this->input->post('pass2');
        $captcha = $this->input->post('captcha');

        $validationErrors = false;
        $msgErrors = array();

        if(empty($username) || strlen($username) < 6){
            array_push($msgErrors,'<strong> Username </strong> must be 6 ore more characters');
            $validationErrors = true;
        }

        if(empty($password) || strlen($password) < 8){
            array_push($msgErrors,'<strong> Password </strong> must be minimum 8 characters');
//            msgError('<strong> Password </strong> must be minimum 8 characters');
            $validationErrors = true;
        } elseif($password !== $cPassword) {
            array_push($msgErrors,'<strong> Passwords </strong> do not match');
//            msgError('<strong> Passwords </strong> do not match');
        }

        //validate email address
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            array_push($msgErrors,'Email Address is not valid');
//            msgError('Email Address is not valid');
            $validationErrors = true;
        }

        //Check if Email Matches
        if($email !== $email2){
            array_push($msgErrors,'Email and Confirm Email dosen\'t match');
//            msgError('Email and Confirm Email dosen\'t match');
            $validationErrors = true;
        }

        //validate First Name
        if (empty($fname)) {
            array_push($msgErrors,'Please Enter First Name');
            $validationErrors = true;
        }

        //validate Last Name
        if (empty($lname)) {
            array_push($msgErrors,'Please Enter Last Name');
            $validationErrors = true;
        }

        //Finally Check Captcha
        if(intval($captcha) !== intval($sessionCaptcha)){
            array_push($msgErrors,'Entered Captcha Code is Incorrect');
            $validationErrors = true;
        }

        //Check if there are any errors in validation then stop executing further this method
        if($validationErrors === true){
            $this->session->set_flashdata('alertMsg',$msgErrors);
            $this->session->set_flashdata('postData', $this->input->post());
            redirect('login/register');
            return NULL;
        }

        //OK now again before moving further first we need to check if this email or username is unique or not.

        $usersTable = "users";
        $selectData = array('COUNT(1) as TotalFound',false);
        $whereUsername = array(
            'username' => $username
        );
        $countUsername = $this->Common_model->select_fields_where($usersTable,$selectData,$whereUsername,true);

        if(intval($countUsername->TotalFound) > 0){ //Means Record Already exist with same username
            array_push($msgErrors,"Sorry, This Username Is Already Taken");
        }

        //Where Email
        $whereEmail = array(
            'email' => $email
        );
        $countEmail = $this->Common_model->select_fields_where($usersTable,$selectData,$whereEmail,true);

        if($countEmail->TotalFound > 0){ //Means Record Already exist with same username
            array_push($msgErrors,"Entered Email Address Is Already In Use.");
        }

        if(!empty($msgErrors)){
            $this->session->set_flashdata('alertMsg',$msgErrors);
            $this->session->set_flashdata('postData', $this->input->post());
            redirect('login/register');
        }


        //If pointer reaches here. means we are good to send request to system.
        $insertData = array(
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'fname' => $fname,
            'lname' => $lname,
            'userlevel' => 1,
            'created' => $this->data['dbCurrentDateTime']
        );

        if(isset($this->data['siteSettings']) && !empty($this->data['siteSettings'])){
            $reg_verify = $this->data['siteSettings']->reg_verify;
            $auto_verify = $this->data['siteSettings']->auto_verify;
            if ($reg_verify == 1) {
                $active = "t";
            } elseif ($auto_verify == 0) {
                $active = "n";
            } else {
                $active = "y";
            }
        }else{
            $active = $this->data['newUserRegisterRequestStatus'];
        }
        $insertData['active'] = $active;


        //Now Query to Insert Data in table.
        $insertResult = $this->Common_model->insert_record('users',$insertData);

        if($insertResult > 0){
            //If Success, Also Email to User.

            // send email to admin
            $this->sendRequestToAdmin($insertData);
            $messageSubject="Account Created on ".$this->data['Company'];
            $emailTemplate = get_email_templates(17);
            if(!empty($emailTemplate->subject)){
                $messageSubject=$emailTemplate->subject;
            }else{
                $messageSubject="Your have been granted access";
            }
            $messageBody= str_replace(array('[SENDER]', '[NAME]', '[MAILSUBJECT]', '[USERNAME]', '[PASSWORD]'),
            array($this->data['noReply'], $this->data['Company'], $messageSubject, $username, $password), $emailTemplate->body);

            $messageBody = htmlspecialchars_decode($messageBody);
            $config=$this->data['mailConfiguration'];
            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");

            //Now Lets Send The Email..
            $this->email->to($email);
            $this->email->from($this->data['noReply'],$this->data['Company']);
            $this->email->subject($messageSubject);
            $this->email->message($messageBody);
            if($this->email->send()) {
//                msgOk("Email Sent to: ".$email);
                redirect('Login/register_success','refresh');
            }else{
//                msgError("Could not send email to ".$email);
                redirect('Login/register_success','refresh');
            }
        }
    }
   
   /* public function testing(){
        $messageSubject="Your have been granted access";
        $messageBody = "just testing";
        $config=$this->data['mailConfiguration'];
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        //Now Lets Send The Email..
        $this->email->to('arslanmehmood051@gmail.com');

        $this->email->from($this->data['noReply'],$this->data['Company']);
        $this->email->subject($messageSubject);
        $this->email->message($messageBody);
        if($this->email->send()) {
            echo 'success';
        }else{
            echo 'error';
        }
    }*/
    public function sendRequestToAdmin($data){
        $messageSubject="Request For Username And Password";
        $messageBody= $data['fname']." ".$data['lname']." Has Send You a Request for Username and Password. Currently, the User Status is Inactive.
        You can manage user status from <a href='".base_url('admin/Users')."'> here </a><br>
        Thanks";
        $config=$this->data['mailConfiguration'];
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $adminEmail = "registration@sagicorconvention.com";
        //Now Lets Send The Email..
        $this->email->to($adminEmail);
        $this->email->from($this->data['noReply'],$this->data['Company']);
        $this->email->subject($messageSubject);
        $this->email->message($messageBody);
        $this->email->send();
    }

    public function register_success(){
        $this->load->view('masterless/register_success');
    }
    // reset password page
    public function reset(){
        if($this->input->post()){
            $sessionCaptcha = $_SESSION['captchacode'];
            $msgErrors = []; $validationErrors = false;
            $usrname = $this->input->post('uname');
            $email = $this->input->post('email');
            $captcha = $this->input->post('captcha');

            if(empty($usrname) || strlen($usrname) < 6){
                array_push($msgErrors,'<strong> Username </strong> must be 6 ore more characters');
                $validationErrors = true;
            }
            //validate email address
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                array_push($msgErrors,'Email Address is not valid');
                $validationErrors = true;
            }

            //Finally Check Captcha
            if(intval($captcha) !== intval($sessionCaptcha)){
                array_push($msgErrors,'Entered Captcha Code is Incorrect');
                $validationErrors = true;
            }

            if($validationErrors === true){
                $this->session->set_flashdata('alertMsg',$msgErrors);
                redirect('login/reset');
                return NULL;
            }

            $password = makePassword(12);
            // update password in database 
            $this->Common_model->update('users', ['username'=>$usrname, 'email'=>$email], ['password'=>$password]);
            $messageSubject = "Your Password Has Been Changed!";
            $messageBody = "Your New Login Details are below: <br>
                        <table><tbody>
                        <tr><td>Username:</td><td>".$usrname."</td></tr>
                        <tr><td>Password:</td><td>".$password."</td></tr>
                        </tbody></table>";
            $config = $this->data['mailConfiguration'];
            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");

            //Now Lets Send The Email..
            $this->email->to($email);
            $this->email->from($this->data['noReply'],$this->data['Company']);
            $this->email->subject($messageSubject);
            $this->email->message($messageBody);
            if($this->email->send()) {
                $this->session->set_flashdata('successMsg','Success! You have successfully requested to change your password. Please check your e-mail for further info!');
                redirect('login/reset','refresh');
            }else{
                array_push($msgErrors,'Error! There was an error during the process. Please contact the administrator.');
                $this->session->set_flashdata('alertMsg',$msgErrors);
                redirect('login/reset','refresh');
            }
        } 
        else
            $this->load->view('masterless/reset');      
    }
    
    public function secureTest124kkksss(){
        exit;
        $this->load->model('Common_model');
    	$result = $this->Common_model->select('registering');
    	
    	foreach($result as $row){

    		// update CC number if that user exist
    	//	if(!preg_match( '/(\*)/', decryption($row->card_number) )){
	    		$where = [
		    				//'title'=>$row->title,
		    				'first_name'=>$row->first_name,
		    				'last_name'=>$row->last_name,
		    				'email'=>$row->email,
		    				//'cvv'=>$row->cvv
		    			];
	    		$data = ['exp_date' => $row->exp_date];
            //echo decryption($row->card_number);
           // echo decryption($row->exp_date);
           // echo '<br>';
	    		$this->Common_model->update('register', $where, $data);
	    		echo 'Record is Updated <br>';
    	//	}
    	}
    }
}