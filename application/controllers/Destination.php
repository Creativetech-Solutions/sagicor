<?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/10/2016
 * Time: 5:42 AM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Destination extends Frontend_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function fun_facts(){
        //Load the view
        $this->f_show('site/pages/destination/fun-facts');
    }
    public function about_barcelona(){
        //Load the view
        $this->f_show('site/pages/destination/about-barcelona');
    }
    public function weather(){
        //Load the view
        $this->f_show('site/pages/destination/weather');
    }
    public function montreal(){
        $this->f_show('site/pages/destination/montreal', NULL, NULL, 'new');
    }

}