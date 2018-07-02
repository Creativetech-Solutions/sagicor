<?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/10/2016
 * Time: 5:00 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends Frontend_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->f_show('site/pages/hotel/the-hotel',NULL,NULL,'new');
    }
    public function intro()
    {
        //Load the view
        $this->f_show('site/pages/hotel/intro');
    }

    public function hotel_facts_rooms(){

        //Load the view
        $this->f_show('site/pages/hotel/hotel-facts-rooms');
    }

    public function hotel_facts_recreation(){

        //Load the view
        $this->f_show('site/pages/hotel/hotel-facts-recreation');
    }

    public function hotel_facts_dining(){

        //Load the view
        $this->f_show('site/pages/hotel/hotel-facts-dining');
    }
}