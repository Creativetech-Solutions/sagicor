<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Profile extends Backend_Controller{





	public function __construct()

  {	

	

		parent::__construct();

		//$this->load->model('Common_model');		

		// Your own constructor code    			

	}	







	public function index()

	{



		$this->data['viewData'] = array(

				'page_title' => "User Administration",

				'page_view' => "admin/pages/users"				

				);



		$this->load->view('admin/shared/master',$this->data);

	}

	

	public function edit(){

		$userID = $this->session->userdata('loggedinuser')->id;

		$where  = "id=".$userID; 				  					

		$user =	$this->Common_model->get_record_where('users',$where);

		//echo "<pre> user = "; print_r( $user  ); echo "</pre>";  			

		$this->data['viewData'] = array(

				'page_data' => $user,

				'page_title' => "User Profile Edit",

				'page_view'	=> "admin/pages/edit-profile"

		);		

		$this->load->view('admin/shared/master',$this->data);

		

	}

	

	

	public function update(){

		

		$vals = $this->input->post();

		//echo "<pre> vals = "; print_r( $vals  ); echo "</pre>";  

		

		$userID = $this->session->userdata('loggedinuser')->id;		

		$update = '';		

		foreach ($vals as $key => $value){ if($key !='' && $value!='') $update[$key] = $value; }

		

		$update['club'] = (isset($update['club']) && $update['club'] == 'on' )? '1' : '0';

		$update['regclose']=(isset($update['regclose']) && $update['regclose'] == 'on' )? '1' : '0';



		if(isset($update['password'])){ $update['password'] =  md5($update['password']);}

		//echo "<pre> update = "; print_r( $update  ); echo "</pre>";  exit;





		$errors = '';

		

		//Coding for updating the User Profile Picture Goes Under this If Statement.

		$allowedExt = array('jpeg','jpg','png','gif');			

	  if(isset($_FILES['avatar']['name']) && $_FILES['avatar']['name']!= '' )

		 {

        $config['upload_path'] = 'uploads/profiles/'.$userID.'/';

        $config['overwrite'] = TRUE;

        $config["allowed_types"] = 'jpg|jpeg|png|gif';

        $config["max_size"] = 1024;

        $this->load->library('upload', $config);



        if(!$this->upload->do_upload('avatar')) {               

            $error = $this->upload->display_errors();

						$errors .=  '<div class="error bgred"> Error '.$error.'</div>';

						//$this->session->set_flashdata('flashresponse', '<div class="error bgred"> Error '.$error.'</div>');			

						//redirect(base_url().'admin/profile/edit', 'refresh');				

									

        } else {

            //success

						$upload_data = $this->upload->data();

						$update['avatar'] = $upload_data['file_name'];                                   

        }  

    }

		

	

	//echo "<pre> update = "; print_r( $update  ); echo "</pre>";  exit; 

		$restuls = $this->Common_model->update_query('users', 'id', $userID, $update);	

		

		if(!is_array($restuls) && $restuls == 1) {   			

			$dataToBeUpdate = ['club'=>$update['club'],'reg_id'=>$update['reg_id'], 'email'=>$update['email']];
			if($update['regclose'] == 1) 
				$dataToBeUpdate['status'] = 'confirm';
			else $dataToBeUpdate['status'] = '';
	        $this->Common_model->update('register', ['user_id'=>$userID], $dataToBeUpdate);

	        $dataToBeUpdate = ['club'=>$update['club'],'reg_id'=>$update['reg_idg']];
			if($update['regclose'] == 1) 
				$dataToBeUpdate['status'] = 'confirm';
			else $dataToBeUpdate['status'] = '';
	        $this->Common_model->update('register', ['guest_of'=>$userID], $dataToBeUpdate);

			$errors .=  '<div class="message bggreen"><p>User Data Updated Successfully!.</p></div>';

			//$this->session->set_flashdata('flashresponse', '<div class="message bggreen"><p>User Data Updated Successfully!.</p></div>');			

			//redirect(base_url().'admin/profile/edit', 'refresh'); 								

		}elseif(isset($restuls['code'])){

				if($restuls['code'] == 0){

					  $errors .= '<div class="message bggreen"><p>Same Data.</p></div>';

					

						//$this->session->set_flashdata('flashresponse', '<div class="message bggreen"><p>Same Data.</p></div>');			

						//redirect(base_url().'admin/profile/edit', 'refresh');						

					}  

				else{ 				

						 $errors .= '<div class="error bgred"><p>Error Updating Record.'.$restuls['message'].'</p></div>';

						//$this->session->set_flashdata('flashresponse', '<div class="error bgred"><p>Error Updating Record.'.$restuls['message'].'</p></div>');			

						//redirect(base_url().'admin/profile/edit', 'refresh'); 

				 }	

		}

			

		

				

		$this->session->set_flashdata('flashresponse',  $errors);			

		redirect(base_url().'admin/profile/edit', 'refresh'); 

		  	

	}

	

	

	

	

}

