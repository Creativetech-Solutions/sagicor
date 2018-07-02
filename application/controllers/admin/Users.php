<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Backend_Controller {


	public function __construct()
  {	
	
		parent::__construct();
		//$this->load->model('Common_model');		
		// Your own constructor code  
		$this->load->library('Datatables');	
		ini_set('max_execution_time', 0); 
		ini_set('memory_limit','2048M');
	}	



	public function index()
	{
		$userrow =  $this->Common_model->select('users');
		$this->data['viewData'] = array(
			'page_data'   => $userrow,
			'page_title' => "User Administration",
			'page_view' => "admin/pages/users"
		);
		$this->load->view('admin/shared/master',$this->data);
	}

	public function listing(){
		$table = "users";
		$selectData = array(
			'id as UserID,
			 username as Username,
			 CONCAT(fname," ",lname) AS FullName,
			 DATE_FORMAT(lastlogin, "%d. %b. %Y %H:%i") as LastLogin,
			 			 
			 CASE active
			  WHEN "y" THEN "<i class=\'icon-ok-sign text-green\'></i> Active"
			  WHEN "n" THEN CONCAT("<a class=\"activate\" id=\"act_", id, "\" ><i class=\"icon-adjust text-orange\"></i> Inactive </a>")
			  WHEN "t" THEN "<i class=\'icon-time text-blue\'></i> Pending"
			  WHEN "b" THEN "<i class=\'icon-ban-circle text-red\'></i> Banned"
			 ELSE "" END AS UserStatus,
			 
			 CASE userlevel
			  WHEN "1" THEN "<i class=\'icon-user tooltip text-green\' data-title=\'Reserved\'></i>"
			  WHEN "2" THEN "<i class=\'icon-user tooltip text-blue\' data-title=\'Reservations\'></i>"
			  WHEN "3" THEN "<i class=\'icon-user tooltip text-orange\' data-title=\'Fast Track\'></i>"
			  WHEN "4" THEN "<i class=\'icon-user tooltip text-green\' data-title=\'Accounts\'></i>"
			  WHEN "5" THEN "<i class=\'icon-user tooltip text-blue\' data-title=\'Supervisor\'></i>"
			  WHEN "6" THEN "<i class=\'icon-user tooltip text-orange\' data-title=\'Manager\'></i>"
			  WHEN "7" THEN "<i class=\'icon-user tooltip text-orange\' data-title=\'Administrator\'></i>"
			  WHEN "9" THEN "<i class=\'icon-user tooltip text-orange\' data-title=\'Super Admin\'></i>"
			  ELSE "Undefined" END AS UserLevel

			 ',false
		);
		$addColumn = array(
			'ViewEditActionButtons'	=> array(
				'
				<span class="tbicon"> <a class="tooltip" href="'.base_url().'admin/users/edit/$1" data-title="Edit"><i class="icon-pencil"></i></a> </span>
				<span class="tbicon"> <a data-rel="chrislawe" class="tooltip delete" id="item_51" data-title="Delete"><i class="icon-trash"></i></a> </span>
				','UserID'
			)
		);
		$users = $this->Common_model->select_fields_joined_DT($selectData,$table,'','','','','',$addColumn);
		print $users;
	}

	public function add(){
		//echo '<pre>'; print_r($this->data['mailConfiguration']); exit;
		//if user data posted then just add the new user.
		if($this->input->post()){
			$username = trim($this->input->post('username'));
			$password = $this->input->post('password');
			$email = trim($this->input->post('email'));
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$userlevel = $this->input->post('userlevel');
			$active = $this->input->post('active');
			$newsletter = $this->input->post('newsletter');
			$notify = $this->input->post('notify');
			$reg_id = $this->input->post('reg_id');
			$reg_idg = $this->input->post('reg_idg');
			$notes = $this->input->post('notes');

			//President's Club
			$club = $this->input->post('club');
			if(isset($club) && $club === "on"){
				$club = 1;
			}else{
				$club = 0;
			}

			$validationErrors = false;

			if(empty($username) || strlen($username) < 6){
				msgError('<strong> Username </strong> must be 6 ore more characters');
				$validationErrors = true;
			}

			if(empty($password) || strlen($password) < 6){
				msgError('<strong> Password </strong> must be minimum 6 characters');
				$validationErrors = true;
			} 

			//validate email address
			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				msgError('Email Address is not valid');
				$validationErrors = true;
			}

			//validate First Name
			if (empty($fname)) {
				msgError('Please Enter First Name');
				$validationErrors = true;
			}

			//validate Last Name
			if (empty($lname)) {
				msgError('Please Enter Last Name');
				$validationErrors = true;
			}


			//Check if there are any errors in validation then stop executing further this method
			if($validationErrors === true){
				return NULL;
			}

			//check if email already exists.
			$usersTable = 'users';
			$return = false;

			$selectData = array('COUNT(1) AS TotalFound');
			//Now check if username already exists
			$where = array(
				'username' => $username
			);
			$count = $this->Common_model->select_fields_where($usersTable,$selectData,$where,true);
			if($count->TotalFound > 0){
				msgError('This Username has already been Taken');
				$return = true;
			}

			//check if email or username is not duplicating
			$where = array(
				'email' => $email
			);
			$count = $this->Common_model->select_fields_where($usersTable,$selectData,$where,true);
			if($count->TotalFound > 0){
				msgError('Entered Email Address Is Already In Use');
				$return = true;
			}

			if($return === true){
				return NULL;
			}



			$insertData = array(
				'username' => $username,
				'password' => $password,
				'email' => $email,
				'fname' => $fname,
				'lname' => $lname,
				'userlevel' => $userlevel,
				'active' => $active,
				'newsletter' => $newsletter,
				'notes' => $notes,
				'reg_id' => $reg_id,
				'reg_idg' => $reg_idg,
				'created' => $this->data['dbCurrentDateTime'],
				'club' => $club
			);

			$UserID = $this->Common_model->insert_record($usersTable,$insertData);

			if(!isset($UserID) || empty($UserID)){
				msgError('Some Error Occurred, Could not create new user.');
				return NULL;
			}else{
				$msg = "New User Successfully Created";
				msgOk($msg);
			}

			//If pointer reachers here. means user has been created. just now upload and update the user file.

			//Need to start work for file if posted

			if(isset($_FILES['avatar']['name']) && $_FILES['avatar']['name']!= '')
			{
				$errors = '';
				$uploadDirectory = 'uploads/profiles/'.$UserID.'/';

				if(!is_dir($uploadDirectory)){
					mkdir($uploadDirectory,0777,true);
				}

				$config['upload_path'] = $uploadDirectory;
				$config['overwrite'] = TRUE;
				$config["allowed_types"] = 'jpg|jpeg|png|gif';
				$config["max_size"] = 1024;
				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('avatar')) {
					$error = $this->upload->display_errors();
					$msg = "<br /> User Image Could Not Be Uploaded".$error;
					msgError($msg);

				} else {
					//success
					$upload_data = $this->upload->data();
					$update['avatar'] = $upload_data['file_name'];
					$updateResult = $this->Common_model->update_query('users', 'id', $UserID, $update);
					if($updateResult === true){
						msgOk("User Image Uploaded");
					}
				}
			}

			//Finally Send an email to the newly created user

			if($notify){ //If notification is true, means need to send email to user.
				$emailTemplate = get_email_templates(3);
				if(!empty($emailTemplate->subject)){
					$messageSubject=$emailTemplate->subject;
				}else{
					$messageSubject="Your have been granted access";
				}


				$messageBody="Dear <b>".$fname." ".$lname.",</b><br />
				 You have been registered to our website, Your new username is: ".$username;
				$config=$this->data['mailConfiguration'];
				$this->load->library('email');
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");
				if(!empty($emailTemplate->body)){
					$messageBody= str_replace(array('[SENDER]', '[NAME]', '[MAILSUBJECT]', '[USERNAME]', '[PASSWORD]'),
						array($this->data['noReply'], $this->data['Company'], $messageSubject, $username, $password), $emailTemplate->body);
				}else{
					$messageBody="Dear <b>".$fname." ".$lname.",</b><br />
				 	You have been registered to our website, Your new username is: ".$username;
				}

				//Now Lets Send The Email..
				$this->email->to($email);
				$this->email->from($this->data['noReply'],$this->data['Company']);
				$this->email->subject($messageSubject);
				$this->email->message(htmlspecialchars_decode($messageBody));
				if($this->email->send()) {
					msgOk("Email Sent to: ".$email);
				}else{
					msgError("Could not send email to ".$email);
				}
			}

		return;

		}
		$this->data['viewData'] = array(
			'page_title' => "Add New User",
			'page_view' => "admin/pages/add-user"
		);
		$this->load->view('admin/shared/master',$this->data);
	}

/*	public function sendEmail(){
				$emailTemplate = get_email_templates(3);
				if(!empty($emailTemplate->subject)){
					$messageSubject=$emailTemplate->subject;
				}else{
					$messageSubject="Congratulation Your Account have been created";
				}
				$fname = "Arslan";
				$lname = "Mehmood";
				$username = 'Testuser';
				$password = 'password';
				$email = "testuser@yopmail.com";
				$messageBody="Dear <b>".$fname." ".$lname.",</b><br />
				 You have been registered to our website, Your new username is: ".$username;
				$config=$this->data['mailConfiguration'];
				$this->load->library('email');
				$this->email->initialize($config);
				if(!empty($emailTemplate->body)){
					$messageBody= str_replace(array('[SENDER]', '[NAME]', '[MAILSUBJECT]', '[USERNAME]', '[PASSWORD]'),
						array($this->data['noReply'], $this->data['Company'], $messageSubject, $username, $password), $emailTemplate->body);
				}
				$messageBody = "<html><body>".htmlspecialchars_decode($messageBody)."</body></html>";

				//Now Lets Send The Email..
				$this->email->to($email);
				$this->email->from($this->data['noReply'],$this->data['Company']);
				$this->email->subject($messageSubject);
				$this->email->message($messageBody);
				echo '<pre>'; print_r($this->email);
				if($this->email->send()) {
					echo "Email Sent : ";
				}
	}*/

	public function edit($userID){

		$userTable = 'users';
		$selectData = '
		username AS Username,
		email AS Email,
		fname AS FirstName,
		lname AS LastName,
		password AS Password,
		userlevel AS UserLevel,
		active AS UserStatus,
		club AS Club,
		regclose AS CloseReg,
		reg_id as RegID,
		reg_idg as GuestRegistrationID,
		lastlogin as LastLogin,
		created as RegistrationDate,
		lastip as LastIP
		';
		$where = array(
			'id' => $userID
		);
		$userDetails =  $this->Common_model->select_fields_where($userTable,$selectData,$where,TRUE);
		$this->data['viewData'] = array(
			'page_data'   => $userDetails,
			'page_title' => "Edit User",
			'page_view' => "admin/pages/edit-user"
		);
		$this->load->view('admin/shared/master',$this->data);
	}

	public function update(){

		$UserID = $this->input->post('id');

		if(!isset($UserID) || !is_numeric($UserID)){
			msgError($this->data['ErrorMsg']['Post']);
			return NULL;
		}
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = trim($this->input->post('email'));
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$userlevel = $this->input->post('userlevel');
		$active = $this->input->post('active');
		$newsletter = $this->input->post('newsletter');
		$reg_id = $this->input->post('reg_id');
		$reg_idg = $this->input->post('reg_idg');
		$notes = $this->input->post('notes');

		//President's Club
		$club = $this->input->post('club');
		if(isset($club) && $club === "on"){
			$club = 1;
		}else{
			$club = 0;
		}

		//Close Registration bool
		$regclose = $this->input->post('regclose');
		if(isset($regclose) && $regclose === "on"){
			$regclose = 1;
		}else{
			$regclose = 0;
		}


		$validationErrors = false;

		//Password is Optional if if box is not empty then
		if(!empty($password)){
			if(strlen($password) < 6){
				msgError('<strong> Password </strong> must be minimum 6 characters');
				$validationErrors = true;
			} 
		}

		//validate email address
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			msgError('Email Address is not valid');
			$validationErrors = true;
		}

		//validate First Name
		if (empty($fname)) {
			msgError('Please Enter First Name');
			$validationErrors = true;
		}

		//validate Last Name
		if (empty($lname)) {
			msgError('Please Enter Last Name');
			$validationErrors = true;
		}

		//Check if there are any errors in validation then stop executing further this method
		if($validationErrors === true){
			return NULL;
		}

		$updateData = array(
			'email' => $email,
			'fname' => $fname,
			'lname' => $lname,
			'userlevel' => $userlevel,
			'active' => $active,
			'newsletter' => $newsletter,
			'notes' => $notes,
			'reg_id' => $reg_id,
			'reg_idg' => $reg_idg,
			'club' => $club,
			'regclose' => $regclose,
		);

		if(!empty($password)){
			$updateData['password'] = $password;
		}

		$checkPreviousSaveStatus = $this->Common_model->select_fields_where('users','active',['id'=>$UserID], true);
		//Update Query
		$updateData = $this->Common_model->update_query('users','id',$UserID,$updateData);
		if($updateData === true){ // update club value in registration table

			// check status change and active send an email
			if($checkPreviousSaveStatus->active != 'y' && $active == 'y'){
				$this->sendActivationEmail($username, $password, $email);
			}

			$dataToBeUpdate = ['club'=>$club,'reg_id'=>$reg_id, 'email'=>$email];
			if($regclose == 1) 
				$dataToBeUpdate['status'] = 'confirm';
			else $dataToBeUpdate['status'] = '';
	        $this->Common_model->update('register', ['user_id'=>$UserID], $dataToBeUpdate);

	        $dataToBeUpdate = ['club'=>$club,'reg_id'=>$reg_idg];
			if($regclose == 1) 
				$dataToBeUpdate['status'] = 'confirm';
			else $dataToBeUpdate['status'] = '';
	        $this->Common_model->update('register', ['guest_of'=>$UserID], $dataToBeUpdate);
			msgOk('For User <strong>'. $username .'</strong> Record Successfully Updated');
		}else{
			if($updateData['code'] === 0){
				msgError('Same Record Already Exist');
			}else{
				msgError($updateData['message']);
			}
		}
	}

	public function delete(){
		//Need To Delete a User if Pressed Delete..
		//Get Posted UserID
		$userID = $this->input->post('id');
		
		if(empty($userID) || !is_numeric($userID)){
			msgError($this->data['ErrorMsg']['Post']);
			return NULL;
		}
		$where = array(
			'id' => $userID
		);
		$deleted = $this->Common_model->delete('users',$where);
		if($deleted){
			// delete registration data also
			$where = ['user_id'=>$userID];
			$this->Common_model->delete('register', $where);
			$where = ['guest_of'=>$userID];
			$this->Common_model->delete('register', $where);
			msgOk('User Record deleted successfully!');
		}
	}

	public function activate(){
		$userID = $this->input->post('id');
		$updateData = array(
			'active' => 'y'
		);
		$activated = $this->Common_model->update_query('users','id',$userID,$updateData);
		if($activated !== true){
			msgError($activated);
			return NULL;
		}else{
			//Get user Details
			$selectData = array(
				'username AS Username,
				email AS Email,
				CONCAT(fname," ",lname) AS FullName,
				password',
				false
			);
			$whereUser = array(
				'id' => $userID
			);
			$user = $this->Common_model->select_fields_where('users',$selectData,$whereUser,true);
			msgOk('User <strong>'.$user->Username.'</strong> Successfully Activated');
		}

		//If successfully Updated, Then Send an email to the user

		$messageSubject="Account Activated on ".$this->data['Company'];
		$emailTemplate = get_email_templates(20);
		if(!empty($emailTemplate->subject)){
			$messageSubject=$emailTemplate->subject;
		}else{
			$messageSubject="Your have been granted access";
		}
		$messageBody= str_replace(array('[SENDER]', '[NAME]', '[MAILSUBJECT]', '[USERNAME]', '[PASSWORD]'),
			array($this->data['noReply'], $this->data['Company'], $messageSubject, $user->Username, $user->password), $emailTemplate->body);

		$messageBody = htmlspecialchars_decode($messageBody);
		$config=$this->data['mailConfiguration'];
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		//Now Lets Send The Email..
		$this->email->to($user->Email);

		$this->email->from($this->data['noReply'],$this->data['Company']);
		$this->email->subject($messageSubject);
		$this->email->message($messageBody);
		if($this->email->send()) {
			msgOk("Activation Email Successfully Sent to User email: <strong>".$user->Email."</strong>");
		}else{
			msgError("Could not send email to <strong>".$user->Email."</strong>");
		}
	}

	// send email
	protected function sendActivationEmail($username, $password, $email){

		$emailTemplate = get_email_templates(20);
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
		$this->email->send();
	}

	public function verfication(){
		$userrow =  $this->Common_model->select('users');
		$this->data['viewData'] = array(
			'page_data'   => $userrow,
			'page_title' => "Send verfication Email",
			'page_view' => "admin/pages/verfication"
		);
		$this->load->view('admin/shared/master',$this->data);
	}

	public function verification_listing(){
		$table = "users u";
		$selectData = array(
			'u.id as UserID,
			 u.username as Username,
			 CONCAT(r.first_name," ",r.last_name) AS FullName,
			 r.card_number as CardNumber,
			 CASE u.verified
			  WHEN "1" THEN "Yes"
			  ELSE "No" END AS Verified
			 ',false
		);


        $joins = array(
            array(
                'table' => 'register r',
                'condition' => 'r.user_id = u.id',
                'type' => 'INNER'
            )
        );
		$addColumn = array(
			'ViewEditActionButtons'	=> array(
				'
				<span class="tbicon"> <a class="tooltip" href="'.base_url().'admin/users/edit/$1" data-title="Edit"><i class="icon-pencil"></i></a> </span>
				<span class="tbicon"> <a data-rel="chrislawe" class="tooltip delete" id="item_51" data-title="Delete"><i class="icon-trash"></i></a> </span>
				','UserID'
			)
		);
		$users = $this->Common_model->select_fields_joined_DT($selectData,$table,$joins,'','','','',$addColumn);
		
		$users = json_decode($users);
		$userdata = $users->aaData;
		foreach($userdata as $key => $data){
			$userdata[$key]->CardNumber = decryption($data->CardNumber);
		}

		$users->aaData = $userdata;
		echo json_encode($users);
	}

	public function sendVerificationEmails(){
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$userIds = $this->input->post('userIds');
			$userIds = implode("','",$userIds);
			$query = "SELECT * FROM users WHERE id IN ('".$userIds."')";
			$query = $this->db->query($query);
			foreach($query->result() as $row){
				$this->sendVerficationEmail($row->email, $row->fname, $row->lname,$row->id);
			}

			echo "Email Has Been Sent To Selected Users";
		}
	}



    protected function sendVerficationEmail($email, $fname, $lname, $id){
    	if(!empty($email)){

    		//$email = "nicole.moody@sunlinc.net";
    		//$email = "arslanmehmood051@gmail.com";
    		$encryptedEmail = encryption($email);
    		$encryptedEmail = strtr(
	                $encryptedEmail,
	                array(
	                    '+' => '.',
	                    '=' => '-',
	                    '/' => '~'
	                )
	            );
			$link = '<a href="'.base_url('Verifying/index/'.$encryptedEmail).'">Verify Now</a>';
			
	        $emailTemplate = get_email_templates(21);
			$messageSubject=$emailTemplate->subject;

			$config=$this->data['mailConfiguration'];
			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$messageBody= str_replace(array('[SENDER]', '[NAME]', '[MAILSUBJECT]', '[USERNAME]', '[VERIFICATION]'),
				array($this->data['noReply'], $this->data['Company'], $messageSubject, $fname." ".$lname, $link), $emailTemplate->body);
			

			//Now Lets Send The Email..
			$this->email->to($email);
			$this->email->from($this->data['noReply'],$this->data['Company']);
			$this->email->subject($messageSubject);
			$this->email->message(htmlspecialchars_decode($messageBody));
			if($this->email->send()){
				$this->Common_model->update('users',['id'=>$id], ['verified'=>1]);
			}
    	}
    }
}
