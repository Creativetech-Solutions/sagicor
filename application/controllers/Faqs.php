<?php

/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/11/2016
 * Time: 5:06 AM
 */
class Faqs extends Frontend_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function faq(){
        //Load the view
        $this->f_show('site/pages/faqs/faq');
    }
}