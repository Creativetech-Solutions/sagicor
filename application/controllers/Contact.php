<?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/11/2016
 * Time: 5:28 AM
 */
class Contact extends Frontend_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        //Load the view
       // $this->f_show('site/pages/contact');
       $this->f_show('site/pages/contact/contact-us.php',NULL,NULL,'new');
    }

    public function contact_form_submitted(){
    	$this->f_show('site/pages/contact/contact-form-submitted.php',NULL,NULL,'new');
    }
}