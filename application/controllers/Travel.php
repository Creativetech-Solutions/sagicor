<?php

/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/11/2016
 * Time: 5:06 AM
 */
class Travel extends Frontend_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function info(){
        //Load the view
        $this->f_show('site/pages/travel/travel-info');
    }

    public function docs(){
        //Load the view
        $this->f_show('site/pages/travel/travel-docs');
    }

    public function index(){
        $this->f_show('site/pages/travel/travel', NULL, NULL,'new');
    }
}