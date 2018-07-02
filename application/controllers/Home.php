<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Frontend_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Common_model');
	}


	public function index()
	{
		//Load the view
		//$this->f_show('site/pages/home/index');
		$this->f_show('site/pages/home/index2',NULL, NULL, 'new');
		
	}
	public function club_rules(){

		//Load the view
		//$this->f_show('site/pages/home/club-rules');
		$this->f_show('site/pages/home/club-rules2',NULL, NULL, 'new');
	}
	public function qualifiers(){

		//Load the view
		//$this->f_show('site/pages/home/qualifiers');
		$this->f_show('site/pages/home/qualifiers2',NULL, NULL, 'new');
	}

	public function insert(){
		/*$data = file_get_contents("https://raw.githubusercontent.com/meMo-Minsk/all-countries-and-cities-json/master/countries.min.json");
		$data = json_decode($data);
		foreach($data as $country => $cities){

			$countryId = $this->Common_model->insert_record('countries', ['name' => $country]);
			foreach($cities as $city){
				$this->Common_model->insert_record('cities', ['name'=>$city, 'country_id'=>$countryId]);
			}
			echo 'Record Inserted <br>';
		}*/
		/*$codesArray = json_decode($json);
		$countries = $this->Common_model->select('countries');
			foreach ($countries as $key => $value) {
				$name = $value->name;
				if(isset($codesArray->$name) && !empty($codesArray->$name)){
					$this->Common_model->update('countries', ['id'=>$value->id], ['code'=>$codesArray->$name->code]);
				}
			}*/
		}
}
