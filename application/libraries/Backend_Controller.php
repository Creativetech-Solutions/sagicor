<?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/12/2016
 * Time: 12:27 AM
 */


class Backend_Controller extends MY_Controller{
    function __construct()
    {
        parent::__construct();

        //Redirect to Login Page if user is not already been logged in.
        if(loginCheckBool() !== TRUE || checkIsAdmin() !== TRUE){
            $this->session->set_flashdata('flashresponse','<span class="error">Please Login.</span>');
            redirect(base_url().'admin/login', 'refresh');
        }
    }

}