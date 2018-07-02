<?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/16/2016
 * Time: 3:26 PM
 */

class Verification extends MY_Controller{
    public $loggedInUserID;
    function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('verifier_id'))
            redirect('/');
        //get User Details
        //Get User Details
        $whereUserID = array(
            'u.id' => $this->session->userdata('verifier_id')
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
        $this->loggedInUserID = $this->session->userdata('verifier_id');
        $this->data['regIsLocked'] = false;
        
    }


    public function getCCNumbers(){ 
       // exit;
    	// get record from previous table
    	
    	exit;
    }

    public function encrypCc(){
        exit;
        $cc1 = encryption('4657490000077736');
        $cc2 = encryption('4320062000065362');
        $cc3 = encryption('4241159912364176');
        $cc4 = encryption('5466589999999939');

        echo 'Olivia E Marshall => '.$cc1.'<br>109804f4e4ffc2cf648893c71026ff3399d235dc30fc37d72fe39e9e8cf40e3e2060c797b7476d0d66d6cb599b70ce91c34e11ffe4f1bdb36e96a7ba193b0055JfNMCSw0h+ENaUCJp4hWno/ZgGNDhRLyGwsBLRQ4trKF0DUPqI1T5oHpFqX7n0QX';
        echo 'Gay L V Griffith => '.$cc2.'<br>d6a9e79a0ac1599a034c99c011e2cecf0ba054eed37f79be07c0c619cfed992c035eaa9c6601c0c49c5adace41651d8a0916df40c09fe5fff450e01cbf3728b2w3CaNeS/iGWQpZCumPfg593+vmimnGQtiFSlhp6ac3NYNUzR8F1gQExt9xN684GK';
        echo 'Shakira Brown => '.$cc3.'<br>6aa1abf4c3f542bde013f50ad4bc4412fccdf537ce8e81725b42b5d78b407a853c0e6042c49229abe0d27afc5d92f5b6aa339e5f40e8c3290d03b3e01aac8dc3VNYfxfIt3VspEF7axsLkgvZxvc1jnLmioi60HWMMoQfttosOxJtbPTIX1Lz3DZIk';
        echo 'Karl Williams  => '.$cc4.'<br>02b4f5d4a3da3a62efab3534e41bf9ec16855fd617bdc15b30e0846c4aa7668510eec9c9be2fc2dea40fe3255e15b80ab1375c3da4cd1c937804023a6948c437LshkaRZEXAzEImhyz0ix2+GmdnF+0j3+d+Nu0HYD4IzqtU5fNdqgkRVsljEv/E4B';
    }
    public function index(){

      /*  $userId = $this->loggedInUserID;
        $user = $this->Common_model->select_fields_where('users','is_verified',['id'=>$userId], true);

        if($user->is_verified == 1){
            $this->session->set_flashdata('verified','You Credit Card Information is Verifed Successfully');
            redirect('registration/register');
        }
*/
         $viewData = array(
                'view' => 'site/pages/verify_info',
                'data' => $this->data,
            );
            $this->load->view('site/layouts/main_new', $viewData);
    }

     public function verifying(){
        $postData = $this->input->post();
        $userID = $this->loggedInUserID;
        $title = $this->input->post('title');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $birth_date = $this->input->post('birth_date');
        $gender = $this->input->post('gender');
        $cc_type = $this->input->post('cc_type');
        $card_name = $this->input->post('card_name');
        $card_number = $this->input->post('card_number');
        $exp_date_yr = $this->input->post('cc_year');
        $exp_date_mon = $this->input->post('exp_date_mon');
        $cvv = $this->input->post('cvv');
        $exp_date = $exp_date_yr.'-'.$exp_date_mon;

        if (preg_match( '/(\*)/', $card_number )) {
            $this->session->set_flashdata('error','Please Enter Full Credit Card Number');
            redirect('Verification');
        }

        $updateData = [
            'title' => $title,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birth_date' => $birth_date,
            'gender' => $gender,
            'cc_type' => $cc_type,
            'card_name' => $card_name,
            'card_number' => encryption($card_number),
            'exp_date' => encryption($exp_date),
            'cvv' => encryption($cvv),
        ];

        $update = $this->Common_model->update('register',['user_id'=>$userID], $updateData);
        if($update){
            $this->session->set_flashdata('verified','Thank you for your information');
            $this->Common_model->update('users',['id'=>$userID],['is_verified'=>1]);
            redirect('Verification');
        }
    }


}