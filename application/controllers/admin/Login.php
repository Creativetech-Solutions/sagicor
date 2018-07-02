<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {


	public function __construct()
  {	
	
		parent::__construct();
		$this->load->model('Common_model');		
		//$this->load->library('session');	
		// Your own constructor code
	  if(loginCheckBool() === TRUE) {
	  	//If User is Already been Login then just redirect the user.
		//No need to show the user the login page if he/she is already been logged in..
		  $user = $this->session->userdata('loggedinuser');
		  //need to redirect depending on the user level
		  if(intval($user->userlevel) === 9){ //Super Admin
			  redirect(base_url().'admin/CPanel');
		  }else{
			  redirect(base_url(), 'refresh');
		  }
	  }

	}	


	public function index()
	{		
		$data = array(				
				'page_title' => "Please enter your user credentials to login",
				'page_view' => "administration/pages/login"				
		);														
		$this->load->view('admin/pages/login',$data);		
	}
	
	public function authenticate()
	{
		
		$vals = $this->input->post();
		//check if username and password enter		
		if(empty($vals['username']) || empty($vals['password'])){
				$this->session->set_flashdata('flashresponse', '<span class="error">Please enter valid username and password.</span>');			
				redirect(base_url().'admin/login', 'refresh');	
		}		
		
		$where  = "username='".$vals['username']."' AND password= '".$vals['password']."'";
		$user =	$this->Common_model->get_record_where('users',$where);
		if(empty($user)){
				$this->session->set_flashdata('flashresponse', '<span class="error">Login and/or password did not match to the database.</span>');			
				redirect(base_url().'admin/login', 'refresh');	
		}
		
		if($user->active)
		{			
			switch ($user->active) {
				case "b":							
						$this->session->set_flashdata('flashresponse', '<span class="error">Your account has been banned.</span>');						
						redirect(base_url().'admin/login', 'refresh');					
						//return 1;
						break;
				case "n":
						$this->session->set_flashdata('flashresponse', '<span class="error">Your account it\'s not activated.</span>');			
						redirect(base_url().'admin/login', 'refresh');
						//return 2;
						break;
				case "t":
						$this->session->set_flashdata('flashresponse','<span class="error">You need to verify your email address.</span>');			
						redirect(base_url().'admin/login', 'refresh');
						//return 3;
						break;
				case "y":
						// update the last login date
						$user->lastlogin = date('Y-m-d h:i:s');
						$this->Common_model->update('users',['id'=>$user->id],['lastlogin'=>$user->lastlogin]);
						$this->session->set_userdata('loggedinuser', $user);
						//need to redirect depending on the user level
						if(intval($user->userlevel) === 9){ //Super Admin
							redirect(base_url().'admin/CPanel');
						}else{
							redirect(base_url(), 'refresh');
						}
						break;	
				default :
						$this->session->set_flashdata('flashresponse','<span class="error">Unknown Status.</span>');			
						redirect(base_url().'admin/login', 'refresh');
						break;
									
			}						
		}//switch end

	}


}
