<?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/10/2016
 * Time: 5:00 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Itinerary extends Frontend_Controller {

    function __construct()
    {
        parent::__construct();
    }


    public function pacesetter_club()
    {
        //Load the view
        // $this->f_show('site/pages/itinerary/pacesetter-club');
        $this->f_show('site/pages/itinerary/pacesetter-s-club',NULL,NULL,'new');
    }
		
		public function president_club()
    {
        //Load the view
        //$this->f_show('site/pages/itinerary/president-club');
        $this->f_show('site/pages/itinerary/president-s-club',NULL,NULL,'new');
    }
}