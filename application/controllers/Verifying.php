<?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/16/2016
 * Time: 3:26 PM
 */

class Verifying extends MY_Controller{

    public function index($param){
        if(empty($param))
            redirect('/');

        $email = strtr(
                    $param,
                    array(
                       '.' => '+',
                        '-' => '=',
                        '~' => '/'
                    )
                );
        $userEmail = decryption($email);
        if(empty($userEmail))
            redirect('/');

        $user = $this->Common_model->select_fields_where('users','id',['email'=>$userEmail,'is_verified'=>0], true);

        if(!isset($user->id) || empty($user->id))
            redirect('/');

        $this->session->set_userdata('verifier_id',$user->id);

        redirect('Verification');

    }

    public function test(){
        $userEmail = "arslanmehmood051@gmail.com";
        $email = encryption($userEmail);

        $email = strtr(
                    $email,
                    array(
                       '+' => '.',
                        '=' => '-',
                        '/' => '~'
                    )
                );
        redirect('Verifying/index/'.$email);
    }
}