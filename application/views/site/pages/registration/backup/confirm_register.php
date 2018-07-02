<?php $this->load->view('site/pages/registration/reg_banner');
$countries = $data['countries'];
$activities = $data['activities'];
//Winners Section
//Getting all the values.
$title = isset($data['userData']) ? $data['userData']->title : '';
$first_name = isset($data['userData']) ? $data['userData']->first_name : '';
$last_name = isset($data['userData']) ? $data['userData']->last_name : '';
$name_badge = isset($data['userData']) ? $data['userData']->name_badge : '';
$name_badge_last = isset($data['userData']) ? $data['userData']->name_badge_last : '';
$birth_date = isset($data['userData']) ? $data['userData']->birth_date : '';
$birth_country = isset($data['userData']) ? $data['userData']->birth_country : '';
$gender = isset($data['userData']) ? $data['userData']->gender : '';
$home = isset($data['userData']) ? $data['userData']->home : '';
$work = isset($data['userData']) ? $data['userData']->work : '';
$cell = isset($data['userData']) ? $data['userData']->cell : '';
$email = isset($data['userData']) ? $data['userData']->email : '';
$alt_email = isset($data['userData']) ? $data['userData']->alt_email : '';
$st_1address = isset($data['userData']) ? $data['userData']->st_1address : '';
$city = isset($data['userData']) ? $data['userData']->city : '';
$zip = isset($data['userData']) ? $data['userData']->zip : '';
$country = isset($data['userData']) ? $data['userData']->country : '';
$shirt_size = isset($data['userData']) ? $data['userData']->shirt_size : '';
$passport = isset($data['userData']) ? $data['userData']->passport : '';
$citizen = isset($data['userData']) ? $data['userData']->citizen : '';
$issue_city = isset($data['userData']) ? $data['userData']->issue_city : '';
$issue_date = isset($data['userData']) ? $data['userData']->issue_date : '';
$expire_date = isset($data['userData']) ? $data['userData']->expire_date : '';
$us_visa = isset($data['userData']) ? $data['userData']->us_visa : '';
$obtain_visa = isset($data['userData']) ? $data['userData']->obtain_visa : '';
$emerg_name = isset($data['userData']) ? $data['userData']->emergency_name : '';
$emerg_home = isset($data['userData']) ? $data['userData']->emergency_home : '';
$emergency_work = isset($data['userData']) ? $data['userData']->emergency_work : '';
$emergency_cell = isset($data['userData']) ? $data['userData']->emergency_cell : '';
$dr_name = isset($data['userData']) ? $data['userData']->dr_name : '';
$dr_day_phone = isset($data['userData']) ? $data['userData']->dr_day_phone : '';
$dr_alt_phone = isset($data['userData']) ? $data['userData']->dr_alt_phone : '';
$med_conditions = isset($data['userData']) ? $data['userData']->med_conditions : '';
$medication = isset($data['userData']) ? $data['userData']->medication : '';
$med_food = isset($data['userData']) ? $data['userData']->med_food : '';
$religious_food = isset($data['userData']) ? $data['userData']->religious_food : '';
$intolerant = isset($data['userData']) ? $data['userData']->intolerant : '';
$occasion = isset($data['userData']) ? $data['userData']->occasion : '';
$special_date = isset($data['userData']) ? $data['userData']->special_date : '';
$fflyer = isset($data['userData']) ? $data['userData']->fflyer : '';
$ff_number = isset($data['userData']) ? $data['userData']->ff_number : '';
$ff_airline = isset($data['userData']) ? $data['userData']->ff_airline : '';
$off_airline = isset($data['userData']) ? $data['userData']->off_airline : '';
$fflyer_alt = isset($data['userData']) ? $data['userData']->fflyer_alt : '';
$ff_number_alt = isset($data['userData']) ? $data['userData']->ff_number_alt : '';
$ff_airline_alt = isset($data['userData']) ? $data['userData']->ff_airline_alt : '';
$seating = isset($data['userData']) ? $data['userData']->seating : '';
$bags = isset($data['userData']) ? $data['userData']->bags : '';
$bed = isset($data['userData']) ? $data['userData']->bed : '';
$airport_code = isset($data['userData']) ? $data['userData']->airport_code : '';
$depart_date = isset($data['userData']) ? $data['userData']->depart_date : '';
$return_date = isset($data['userData']) ? $data['userData']->return_date : '';
$desired_dt = isset($data['userData']) ? $data['userData']->desired_dpt_date : '';
$desired_rt = isset($data['userData']) ? $data['userData']->desired_ret_date : '';
$air_notes_dpt = isset($data['userData']) ? $data['userData']->air_notes_dpt : '';
$air_notes = isset($data['userData']) ? $data['userData']->air_notes : '';
$travel_req = isset($data['userData']) ? $data['userData']->travel_req : '';
$companion = isset($data['userData']) ? $data['userData']->noguest : '';
$visa_type = (isset($data['userData']) &&  $data['userData']->visa_type != '0000-00-00')? $data['userData']->visa_type : '';
$visa_exp_date = (isset($data['userData']) && $data['userData']->visa_exp_date != '0000-00-00') ? $data['userData']->visa_exp_date : '';
$choice1 = isset($data['userData']) ? $data['userData']->choice1 : ''; //88
$choice2 = isset($data['userData']) ? $data['userData']->choice2 : '';
$choice3 = isset($data['userData']) ? $data['userData']->choice3 : '';


$cc_type = isset($data['userData']) ? $data['userData']->cc_type : ''; //62
$card_name = isset($data['userData']) ? $data['userData']->card_name : ''; //63
$card_number = isset($data['userData']) ? $data['userData']->card_number : ''; //64
$exp_date = isset($data['userData']) ? $data['userData']->exp_date : ''; //65
$cvv = isset($data['userData']) ? $data['userData']->cvv : ''; //65
$billing_address = isset($data['userData']) ? $data['userData']->billing_address : ''; //66
$cc_st_1address = isset($data['userData']) ? $data['userData']->cc_st_1address : ''; //67
$cc_city = isset($data['userData']) ? $data['userData']->cc_city : ''; //69
$cc_zip = isset($data['userData']) ? $data['userData']->cc_zip : ''; //71
$cc_country = isset($data['userData']) ? $data['userData']->cc_country : ''; //72

$card_number = decryption($card_number);
$exp_date = decryption($exp_date);
$cvv = decryption($cvv);

if(!empty($exp_date)){
    $explodedExpDate = explode('-',$exp_date);
    $ccmonth = $explodedExpDate[1];
    $ccyear = $explodedExpDate[0];
}

if(isset($data['guestData']) && !empty($data['guestData'])){
//guest/companion requirements section
$title_g = $data['guestData']->title;
$first_name_g = $data['guestData']->first_name;
$last_name_g = $data['guestData']->last_name;
$name_badge_g = $data['guestData']->name_badge;
$name_badge_last_g = $data['guestData']->name_badge_last;
$birth_date_g = $data['guestData']->birth_date;
$birth_country_g = $data['guestData']->birth_country;
$gender_g = $data['guestData']->gender;
$cell_g = $data['guestData']->cell;
$work_g = $data['guestData']->work;
$home_g = $data['guestData']->home;
$email_g = $data['guestData']->email;
$zip_g = $data['guestData']->zip;
$alt_email_g = $data['guestData']->alt_email;
$st_1address_g = $data['guestData']->st_1address;
$city_g = $data['guestData']->city;
$country_g = $data['guestData']->country;
$shirt_size_g = $data['guestData']->shirt_size;
$passport_g = $data['guestData']->passport;
$citizen_g = $data['guestData']->citizen;
$us_visa_g = $data['guestData']->us_visa;
$obtain_visa_g = $data['guestData']->obtain_visa;
$emerg_name_g = $data['guestData']->emergency_name;
$emerg_home_g = $data['guestData']->emergency_home;
$emergency_work_g = $data['guestData']->emergency_work;
$emergency_cell_g = $data['guestData']->emergency_cell;
$dr_name_g = $data['guestData']->dr_name;
$dr_day_phone_g = $data['guestData']->dr_day_phone;
$dr_alt_phone_g = $data['guestData']->dr_alt_phone;
$med_conditions_g = $data['guestData']->med_conditions;
$medication_g = $data['guestData']->medication;
$med_food_g = $data['guestData']->med_food;
$religious_food_g = $data['guestData']->religious_food;
$intolerant_g = $data['guestData']->intolerant;
$occasion_g = $data['guestData']->occasion;
$special_date_g = $data['guestData']->special_date;
$fflyer_g = $data['guestData']->fflyer;
$ff_number_g = $data['guestData']->ff_number;
$ff_airline_g = $data['guestData']->ff_airline;
$off_airline_g = $data['guestData']->off_airline;
$fflyer_alt_g = $data['guestData']->fflyer_alt;
$ff_number_alt_g = $data['guestData']->ff_number_alt;
$ff_airline_alt_g = $data['guestData']->ff_airline_alt;
//$seating_g = $data['userData']->seating;
$bags_g = $data['guestData']->bags;
//$bed_g = $data['guestData']->bed;
$airport_code_g = $data['guestData']->airport_code;
$depart_date_g = $data['guestData']->depart_date;
$return_date_g = $data['guestData']->return_date;
$desired_dt_g  = $data['guestData']->desired_dpt_date;
$desired_rt_g  = $data['guestData']->desired_ret_date;
$air_notes_dpt_g = $data['guestData']->air_notes_dpt;
$air_notes_g = $data['guestData']->air_notes;
$issue_city_g = $data['guestData']->issue_city;
$issue_date_g = $data['guestData']->issue_date;
$expire_date_g = $data['guestData']->expire_date;
$visa_type_g = ($data['guestData']->visa_type != '0000-00-00') ? $data['guestData']->visa_type : '';
$visa_exp_date_g = ($data['guestData']->visa_exp_date != '0000-00-00') ? $data['guestData']->visa_exp_date : '';
$travel_req_g = $data['guestData']->travel_req;
$choice1_g = $data['guestData']->choice1; //88
$choice2_g = $data['guestData']->choice2;
$choice3_g = $data['guestData']->choice3;
} else {

$title_g = $first_name_g = $last_name_g = $name_badge_g = $name_badge_last_g = $birth_date_g = $birth_country_g = $gender_g = $cell_g = $work_g = $home_g = $email_g = $zip_g = $alt_email_g = $st_1address_g = $city_g = $country_g = $shirt_size_g = $passport_g = $citizen_g = $us_visa_g = $obtain_visa_g = $emerg_name_g = $emerg_home_g = $emergency_work_g = $emergency_cell_g = $dr_name_g = $dr_day_phone_g = $dr_alt_phone_g = $med_conditions_g = $medication_g = $med_food_g = $religious_food_g = $occasion_g = $special_date_g = $fflyer_g = $ff_number_g = $ff_airline_g = $off_airline_g = $fflyer_alt_g = $bags_g = $airport_code_g = $depart_date_g = $return_date_g = $desired_dt_g = $desired_rt_g = $issue_city_g = $issue_date_g = $expire_date_g = $visa_type_g = $travel_req_g = $visa_exp_date_g = $choice1_g = $choice2_g = $choice3_g = $intolerant_g = $air_notes_dpt_g = $air_notes_g = $ff_number_alt_g = $ff_airline_alt_g = "";
}
?>
<style>
	.no-pad {padding:0;text-align: left}
	.reg-quick-view {height: 500px; overflow-y: scroll;position: relative;float: left;}
			$inputFields['Companion'][$field]['class'] .= " hide-field";

</style>

<?php 
	
	$titleOptions = [
		'Mr' => 'Mr',
		'Mrs' => 'Mrs',
		'Ms' => 'Ms',
		'Dr' => 'Dr',
	];

	$countryOptions = [];
	if(is_array($countries) && !empty($countries)){
	    foreach ($countries as $key => $cntry) 
	    	$countryOptions[$cntry->id] = $cntry->name;
	}

	$daysOption = [];
	for($i=1; $i<=31; $i++){
		if($i <= 9) $i = '0'.$i;
		$daysOption[$i] = $i;
	}
	$monthOptions = [];
	$monthOptions['01'] = 'January';
	$monthOptions['02'] = 'Feburary';
	$monthOptions['03'] = 'March';
	$monthOptions['04'] = 'April';
	$monthOptions['05'] = 'May';
	$monthOptions['06'] = 'June';
	$monthOptions['07'] = 'July';
	$monthOptions['08'] = 'August';
	$monthOptions['09'] = 'September';
	$monthOptions['10'] = 'October';
	$monthOptions['11'] = 'November';
	$monthOptions['12'] = 'December';

	$IssueYearOptions = [];
	for($i=1990; $i<=2016; $i++){
		$IssueYearOptions[$i] = $i;
	}
	$ExpYearOptions = [];
	for($i=2016; $i<=2040; $i++){
		$ExpYearOptions[$i] = $i;
	}

	$genderOptions = [
		''=>'Select Gender',
		'Male'=>'Male',
		'Female'=>'Female'
	];

	$shrtSizOptions = [
		''=>'Select Shirt Size',
		'S'=>'S',
		'M'=>'M',
		'L'=>'L',
		'XL'=>'XL',
		'XXL'=>'XXL'
	];

	$lactGultenOptions = [];
	$lactGultenOptions['Yes – I\'m gluten intolerant'] = "Yes – I'm gluten intolerant";
	$lactGultenOptions['Yes – I\'m lactose intolerant'] = "Yes – I'm lactose intolerant";
	$lactGultenOptions['Yes, I\'m both gluten & lactose intolerant'] = "Yes, I'm both gluten & lactose intolerant";
	$specOccasOptions = [
		'Birthday' => 'Birthday',
		'Wedding Anniversary' => 'Wedding Anniversary'
	];

	$bedConfigOptions = [
		'1 King bed'  => '1 King bed',
		'2 Double beds'  => '2 Double beds',
	];

	$ffairlineOptions = [
		''=>'',
		'American Airlines'=>'American Airlines',
		'Caribbean Airlines'=>'Caribbean Airlines',
		'Delta Airlines'=>'Delta Airlines',
		'US Airways'=>'US Airways',
		'United Airlines'=>'United Airlines',
		'Liat'=>'Liat',
	];

	$yesNoOptions = ['No'=>'No', 'Yes'=>'Yes'];
	$seatingPreference = [
		'No Preference' => 'No Preference',
		'Aisle/Center' => 'Aisle/Center',
		'Window/Center' => 'Window/Center',
		'Aisle/Aisle' => 'Aisle/Aisle',
	];
	$noOfBags = [
		'None' => 'None',
		'1' => '1',
		'2' => '2',
	];

	$depCityOptions = [
		'' => '',
		'On group date - Monday, June 11' => 'On group date - Monday, June 11',
		'other' => 'Other'
	];

	$retCityOptions = [
		'' => '',
		'On group date - Friday, June 15' => 'On group date - Friday, June 15',
		'other' => 'Other'
	];

	$activitiesOptions = [];
	foreach($activities as $activity){
		$activitiesOptions[$activity->id] = $activity->activity;
	}

	$vistTypeOptions = [
		'' => '',
		'Visa' => 'Visa',
		'MasterCard' => 'MasterCard',
		'Amex' => 'Amex'
	];

	$ccYr = [];
	for($i = 2016; $i<=2030; $i++){
		$ccYr[$i] = $i;
	}

	$inputFields = [
		'Winner' => [
			'Title' => ['name'=>'title','type'=>'dropdown','options'=>'titleOptions', 'class'=>'form-control','requried'=>'required','value'=>$title],
			'First Name, as per passport being used'=> ['name'=>'first_name','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$first_name],
			'Last Name, as per passport being used'=> ['name'=>'last_name','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$last_name],
			'DOB'=> ['name'=>'birth_date','type'=>'text','class'=>'form-control datepicker','requried'=>'required','value'=>$birth_date],
			'Name Badge First'=> ['name'=>'name_badge','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$name_badge],
			'Name Badge Last'=> ['name'=>'name_badge_last','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$name_badge_last],
			'Gender'=> ['name'=>'gender','type'=>'dropdown','options'=>'genderOptions','class'=>'form-control','value'=>$gender],
			'Shirt Size'=> ['name'=>'shirt_size','type'=>'dropdown','options'=>'shrtSizOptions','class'=>'form-control','requried'=>'required','value'=>$shirt_size],
			'Country Of Birth'=> ['name'=>'birth_country','type'=>'dropdown', 'options'=>'countryOptions','class'=>'form-control','value'=>$birth_country],
			'Home Phone'=> ['name'=>'home','type'=>'text','maxlength'=>'15','class'=>'form-control','requried'=>'required','value'=>$home],
			'Work Phone'=> ['name'=>'work','type'=>'text','maxlength'=>'15','class'=>'form-control','requried'=>'required','value'=>$work],
			'Cell'=> ['name'=>'cell','type'=>'text','maxlength'=>'15','class'=>'form-control','value'=>$cell],
			'Email'=> ['name'=>'email','type'=>'text','class'=>'form-control','readonly' => 'readonly','requried'=>'required','value'=>$email],
			'Alt Email'=> ['name'=>'alt_email','type'=>'text','class'=>'form-control','value'=>$alt_email],
			'Country'=> ['name'=>'country','type'=>'dropdown', 'options'=>'countryOptions','class'=>'form-control','requried'=>'required','value'=>$country],
			'Street'=> ['name'=>'st_1address','type'=>'text','class'=>'form-control','value'=>$st_1address],
			'City/Parish/Village'=> ['name'=>'city','type'=>'text','class'=>'form-control','value'=>$city],
			'Zip'=> ['name'=>'zip','type'=>'text','class'=>'form-control','value'=>$zip],
			'Passport #'=> ['name'=>'passport','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$passport],
			'Passport Citizenship'=> ['name'=>'citizen','type'=>'dropdown', 'options'=>'countryOptions','class'=>'form-control','requried'=>'required','value'=>$citizen],
			'Passport City'=> ['name'=>'issue_city','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$issue_city],
			'Passport Issue Month'=> ['name'=>'issue_date_mon','type'=>'dropdown','options'=>'monthOptions','class'=>'form-control','requried'=>'required','value'=>(!empty($issue_date) ? date('m', strtotime($issue_date)) : '')],
			'Passport Issue Date'=> ['name'=>'issue_date_dy','type'=>'dropdown', 'options'=>'daysOption','class'=>'form-control','requried'=>'required','value'=>(!empty($issue_date) ? date('d', strtotime($issue_date)) : '')],
			'Passport Issue Year'=> ['name'=>'issue_date_yr','type'=>'dropdown','class'=>'form-control', 'options'=>'IssueYearOptions', 'value'=>(!empty($issue_date) ? date('Y', strtotime($issue_date)) : '')],
			'Passport Expire Month'=> ['name'=>'expire_date_mon','type'=>'dropdown','options'=>'monthOptions','class'=>'form-control','requried'=>'required','value'=>(!empty($issue_date) ? date('m', strtotime($expire_date)) : '')],
			'Passport Expire Date'=> ['name'=>'expire_date_dy','type'=>'dropdown', 'options'=>'daysOption','class'=>'form-control','requried'=>'required','value'=>(!empty($issue_date) ? date('d', strtotime($expire_date)) : '')],
			'Passport Expire Year'=> ['name'=>'expire_date_yr','type'=>'dropdown','options'=>'ExpYearOptions','class'=>'form-control','requried'=>'required','value'=>(!empty($issue_date) ? date('Y', strtotime($expire_date)) : '')],
			'Canadian Visa/Canadian eTA Number'=> ['name'=>'visa_type','type'=>'text','class'=>'form-control','value'=>$visa_type],
			'Canadian Visa/Canadian eTA Expiration Date'=> ['name'=>'visa_exp_date','type'=>'text','class'=>'form-control datepicker','value'=>$visa_exp_date],
			'Do you have a valid US Visa, OR Do you hold a valid US Resident Card/Green Card?' => ['name'=>'us_visa','type'=>'dropdown','options'=>'yesNoOptions','class'=>'form-control','value'=>$us_visa],
			'Are you able to obtain a US Visa?' => ['name'=>'obtain_visa','type'=>'dropdown','options'=>'yesNoOptions','class'=>'form-control','value'=>$obtain_visa],
			'Emergency Contact Name'=> ['name'=>'emergency_name','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$emerg_name],
			'Emergency Home Phone'=> ['name'=>'emergency_home','maxlength'=>'15','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$emerg_home],
			'Emergency Work Phone'=> ['name'=>'emergency_work','maxlength'=>'15','type'=>'text','class'=>'form-control','value'=>$emergency_work],
			'Emergency Cell'=> ['name'=>'emergency_cell','maxlength'=>'15','type'=>'text','class'=>'form-control','value'=>$emergency_cell],
			'Primary Doctor'=> ['name'=>'dr_name','type'=>'text','class'=>'form-control','value'=>$dr_name],
			'Dr. Day Phone'=> ['name'=>'dr_day_phone','type'=>'text','maxlength'=>'15','class'=>'form-control','value'=>$dr_day_phone],
			'Dr. Alt Phone'=> ['name'=>'dr_alt_phone','type'=>'text','maxlength'=>'15','class'=>'form-control','value'=>$dr_alt_phone],
			'Medical Conditions'=> ['name'=>'med_conditions','type'=>'text','class'=>'form-control','value'=>$med_conditions],
			'Prescription Medication'=> ['name'=>'medication','type'=>'text','class'=>'form-control','value'=>$medication],
			'I absolutely, for medical reasons, cannot eat the following foods'=> ['name'=>'med_food','type'=>'text','class'=>'form-control','value'=>$med_food],
			'I prefer not to eat the following foods for religious or other reasons'=> ['name'=>'religious_food','type'=>'text','class'=>'form-control','value'=>$religious_food],
			'Are you lactose or gluten intolerant?'=> ['name'=>'intolerant','type'=>'dropdown','options'=>'lactGultenOptions','class'=>'form-control','value'=>$intolerant],
			'Special Occasion (during program dates)?'=> ['name'=>'occasion','type'=>'dropdown','options'=>'specOccasOptions','class'=>'form-control','value'=>$occasion],
			'Specify date'=> ['name'=>'special_date','type'=>'text','class'=>'form-control datepicker','value'=>$special_date],
			'Do you have a frequent flyer number?'=> ['name'=>'fflyer','type'=>'dropdown','options'=>'yesNoOptions','class'=>'form-control','value'=>$fflyer],
			'Frequent Flyer #'=> ['name'=>'ff_number','type'=>'text','class'=>'form-control','value'=>$ff_number],
			'Frequent Flyer Airline'=> ['name'=>'ff_airline','type'=>'dropdown','options'=>'ffairlineOptions','class'=>'form-control','value'=>$ff_airline],
			'Do you have more than one frequent flyer number?'=> ['name'=>'fflyer_alt','type'=>'dropdown','options'=>'yesNoOptions','class'=>'form-control','value'=>$fflyer_alt],
			'Frequent Flyer # 2'=> ['name'=>'ff_number_alt','type'=>'text','class'=>'form-control','value'=>$ff_number_alt],
			'Frequent Flyer Airline 2'=> ['name'=>'ff_airline_alt','type'=>'dropdown','options'=>'ffairlineOptions','class'=>'form-control','value'=>$ff_airline_alt],
			'Airline seat preference of you and your companion'=> ['name'=>'seating','type'=>'dropdown','options'=>'seatingPreference', 'class'=>'form-control','requried'=>'required','value'=>$seating],
			'Number of bags you will personally check in'=> ['name'=>'bags','type'=>'dropdown', 'options'=>'noOfBags','class'=>'form-control','requried'=>'required','value'=>$bags],
			'Bed configuration'=> ['name'=>'bed','type'=>'dropdown','options'=>'bedConfigOptions','class'=>'form-control','requried'=>'required','value'=>$bed],
			'What airport will you be flying out of?'=> ['name'=>'airport_code','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$airport_code],
			'I would like to depart from my home city'=> ['name'=>'depart_date','type'=>'dropdown','options'=>'depCityOptions','class'=>'form-control','requried'=>'required','value'=>$depart_date],
			'Desired Departure Day'=> ['name'=>'desired_dpt_date_dy','type'=>'dropdown','options'=>'daysOption','class'=>'form-control','value'=>(!empty($desired_dt) ? date('d', strtotime($desired_dt)) : '')],
			'Desired Departure Month'=> ['name'=>'desired_dpt_date_mon','type'=>'dropdown','options'=>'monthOptions','class'=>'form-control','value'=>(!empty($desired_dt) ? date('m', strtotime($desired_dt)) : '')],
			'Departure Notes for Air Travel'=> ['name'=>'air_notes_dpt','type'=>'textarea','rows'=>'3','class'=>'form-control','value'=>$air_notes_dpt],
			'How are you returning?'=> ['name'=>'return_date','type'=>'dropdown','options'=>'retCityOptions','class'=>'form-control','requried'=>'required','value'=>$return_date],
			'Desired Return Day'=> ['name'=>'desired_ret_date_dy','type'=>'dropdown','options'=>'daysOption','class'=>'form-control','value'=>(!empty($desired_rt) ? date('d', strtotime($desired_rt)) : '')],
			'Desired Return Month'=> ['name'=>'desired_ret_date_mon','type'=>'dropdown','options'=>'monthOptions','class'=>'form-control','value'=>(!empty($desired_rt) ? date('m', strtotime($desired_rt)) : '')],
			'Return Notes for Air Travel'=> ['name'=>'air_notes','type'=>'textarea','rows'=>'3','class'=>'form-control','value'=>$air_notes],
			'Additional travel request'=> ['name'=>'travel_req','type'=>'textarea','rows'=>'3','class'=>'form-control','value'=>$travel_req],
			'Activity First Choice'=> ['name'=>'choice1','type'=>'dropdown','options'=>'activitiesOptions','class'=>'form-control','value'=>$choice1],
			'Activity Second Choice'=> ['name'=>'choice2','type'=>'dropdown','options'=>'activitiesOptions','class'=>'form-control','value'=>$choice2],
			'Activity Third Choice'=> ['name'=>'choice3','type'=>'dropdown','options'=>'activitiesOptions','class'=>'form-control','value'=>$choice3],
			'Card Type'=> ['name'=>'cc_type','type'=>'dropdown','options'=>'vistTypeOptions','class'=>'form-control','requried'=>'required','value'=>$cc_type],
			'Name'=> ['name'=>'card_name','type'=>'text','class'=>'form-control','value'=>$card_name],
			'Card Number'=> ['name'=>'card_number','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$card_number],
			'Month'=> ['name'=>'exp_date_mon','type'=>'dropdown','options'=>'monthOptions','class'=>'form-control','requried'=>'required','value'=>$ccmonth],
			'Year'=> ['name'=>'exp_date_yr','type'=>'dropdown','options'=>'ccYr','class'=>'form-control','requried'=>'required','value'=>$ccyear],
			'CVV'=> ['name'=>'cvv','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$cvv],
			'Billing Street Address'=> ['name'=>'cc_st_1address','type'=>'text','class'=>'form-control','value'=>$cc_st_1address],
			'Billing City'=> ['name'=>'cc_city','type'=>'text','class'=>'form-control','value'=>$cc_city],
			'Billing Zip'=> ['name'=>'cc_zip','type'=>'text','class'=>'form-control','value'=>$cc_zip],
			'Billing Country'=> ['name'=>'cc_country','type'=>'dropdown', 'options'=>'countryOptions','class'=>'form-control','value'=>$cc_country],
		],
		'Companion' => [
			'Title'     => ['name'=>'title_guest','type'=>'dropdown','options'=>'titleOptions','class'=>'form-control','requried'=>'required','value'=>$title_g],
			'First Name, as per passport being used'=> ['name'=>'first_name_guest','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$first_name_g],
			'Last Name, as per passport being used'=> ['name'=>'last_name_guest','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$last_name_g],
			'DOB'=> ['name'=>'birth_date_guest','type'=>'text','class'=>'form-control datepicker','requried'=>'required','value'=>$birth_date_g],
			'Name Badge First'=> ['name'=>'name_badge_guest','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$name_badge_g],
			'Name Badge Last'=> ['name'=>'name_badge_last_guest','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$name_badge_last_g],
			'Gender'=> ['name'=>'gender_guest','type'=>'dropdown','options'=>'genderOptions','class'=>'form-control','value'=>$gender_g],
			'Shirt Size'=> ['name'=>'shirt_size_guest','type'=>'dropdown','options'=>'shrtSizOptions','class'=>'form-control','requried'=>'required','value'=>$shirt_size_g],
			'Country Of Birth'=> ['name'=>'birth_country_guest','type'=>'dropdown', 'options'=>'countryOptions','class'=>'form-control','value'=>$birth_country_g],
			'Home Phone'=> ['name'=>'home_guest','type'=>'text','maxlength'=>'15','class'=>'form-control','requried'=>'required','value'=>$home_g],
			'Work Phone'=> ['name'=>'work_guest','type'=>'text','maxlength'=>'15','class'=>'form-control','value'=>$work_g],
			'Cell'=> ['name'=>'cell_guest','type'=>'text','maxlength'=>'15','class'=>'form-control','value'=>$cell_g],
			'Email'=> ['name'=>'email_guest','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$email_g],
			'Alt Email'=> ['name'=>'alt_email_guest','type'=>'text','class'=>'form-control','value'=>$alt_email_g],
			'Country'=> ['name'=>'country_guest','type'=>'dropdown', 'options'=>'countryOptions','class'=>'form-control','requried'=>'required','value'=>$country_g],
			'Street'=> ['name'=>'st_1address_guest','type'=>'text','class'=>'form-control','value'=>$st_1address_g],
			'City/Parish/Village'=> ['name'=>'city_guest','type'=>'text','class'=>'form-control','value'=>$city_g],
			'Zip'=> ['name'=>'zip_guest','type'=>'text','class'=>'form-control','value'=>$zip_g],
			'Passport #'=> ['name'=>'passport_guest','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$passport_g],
			'Passport Citizenship'=> ['name'=>'citizen_guest','type'=>'dropdown', 'options'=>'countryOptions','class'=>'form-control','requried'=>'required','value'=>$citizen_g],
			'Passport City'=> ['name'=>'issue_city_guest','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$issue_city_g],
			'Passport Issue Month'=> ['name'=>'issue_date_mon_guest','type'=>'dropdown','options'=>'monthOptions','class'=>'form-control','requried'=>'required','value'=>(!empty($issue_date) ? date('m', strtotime($issue_date_g)) : '')],
			'Passport Issue Date'=> ['name'=>'issue_date_dy_guest','type'=>'dropdown','options'=>'daysOption','class'=>'form-control','requried'=>'required','value'=>(!empty($issue_date) ? date('d', strtotime($issue_date_g)) : '')],
			'Passport Issue Year'=> ['name'=>'issue_date_yr_guest','type'=>'dropdown','class'=>'form-control', 'options'=>'IssueYearOptions','requried'=>'required','value'=>(!empty($issue_date) ? date('Y', strtotime($issue_date_g)) : '')],
			'Passport Expire Month'=> ['name'=>'expire_date_mon_guest','type'=>'dropdown','options'=>'monthOptions','class'=>'form-control','requried'=>'required','value'=>(!empty($issue_date) ? date('m', strtotime($expire_date_g)) : '')],
			'Passport Expire Date'=> ['name'=>'expire_date_dy_guest','type'=>'dropdown','options'=>'daysOption','class'=>'form-control','requried'=>'required','value'=>(!empty($issue_date) ? date('d', strtotime($expire_date_g)) : '')],
			'Passport Expire Year'=> ['name'=>'expire_date_yr_guest','type'=>'dropdown','options'=>'ExpYearOptions','class'=>'form-control','requried'=>'required','value'=>(!empty($issue_date) ? date('Y', strtotime($expire_date_g)) : '')],
			'Canadian Visa/Canadian eTA Number'=> ['name'=>'visa_type_guest','type'=>'text','class'=>'form-control','value'=>$visa_type_g],
			'Canadian Visa/Canadian eTA Expiration Date'=> ['name'=>'visa_exp_date_guest','type'=>'text','class'=>'form-control datepicker','value'=>$visa_exp_date_g],
			'Do you have a valid US Visa, OR Do you hold a valid US Resident Card/Green Card?' => ['name'=>'us_visa_guest','type'=>'dropdown','options'=>'yesNoOptions','class'=>'form-control','value'=>$us_visa_g],
			'Are you able to obtain a US Visa?' => ['name'=>'obtain_visa_guest','type'=>'dropdown','options'=>'yesNoOptions','class'=>'form-control','value'=>$obtain_visa_g],
			'Emergency Contact Name'=> ['name'=>'emergency_name_guest','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$emerg_name_g],
			'Emergency Home Phone'=> ['name'=>'emergency_home_guest','maxlength'=>'15','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$emerg_home_g],
			'Emergency Work Phone'=> ['name'=>'emergency_work_guest','maxlength'=>'15','type'=>'text','class'=>'form-control','value'=>$emergency_work_g],
			'Emergency Cell'=> ['name'=>'emergency_cell_guest','maxlength'=>'15','type'=>'text','class'=>'form-control','value'=>$emergency_cell_g],
			'Primary Doctor'=> ['name'=>'dr_name_guest','type'=>'text','class'=>'form-control','value'=>$dr_name_g],
			'Dr. Day Phone'=> ['name'=>'dr_day_phone_guest','maxlength'=>'15','type'=>'text','class'=>'form-control','value'=>$dr_day_phone_g],
			'Dr. Alt Phone'=> ['name'=>'dr_alt_phone_guest','maxlength'=>'15','type'=>'text','class'=>'form-control','value'=>$dr_alt_phone_g],
			'Medical Conditions'=> ['name'=>'med_conditions_guest','type'=>'text','class'=>'form-control','value'=>$med_conditions_g],
			'Prescription Medication'=> ['name'=>'medication_guest','type'=>'text','class'=>'form-control','value'=>$medication_g],
			'I absolutely, for medical reasons, cannot eat the following foods'=> ['name'=>'med_food_guest','type'=>'text','class'=>'form-control','value'=>$med_food_g],
			'I prefer not to eat the following foods for religious or other reasons'=> ['name'=>'religious_food_guest','type'=>'text','class'=>'form-control','value'=>$religious_food_g],
			'Are you lactose or gluten intolerant?'=> ['name'=>'intolerant_guest','type'=>'dropdown','options'=>'lactGultenOptions','class'=>'form-control','value'=>$intolerant_g],
			'Special Occasion (during program dates)?'=> ['name'=>'occasion_guest','type'=>'dropdown','options'=>'specOccasOptions','class'=>'form-control','value'=>$occasion_g],
			'Specify date'=> ['name'=>'special_date_guest','type'=>'text','class'=>'form-control datepicker','value'=>$special_date_g],
			'Do you have a frequent flyer number?'=> ['name'=>'fflyer_guest','type'=>'dropdown','options'=>'yesNoOptions','class'=>'form-control','value'=>$fflyer_g],
			'Frequent Flyer #'=> ['name'=>'ff_number_guest','type'=>'text','class'=>'form-control','value'=>$ff_number_g],
			'Frequent Flyer Airline'=> ['name'=>'ff_airline_guest','type'=>'dropdown','options'=>'ffairlineOptions','class'=>'form-control','value'=>$ff_airline_g],
			'Do you have more than one frequent flyer number?'=> ['name'=>'fflyer_alt_guest','type'=>'dropdown','options'=>'yesNoOptions','class'=>'form-control','value'=>$fflyer_alt_g],
			'Frequent Flyer # 2'=> ['name'=>'ff_number_alt_guest','type'=>'text','class'=>'form-control','value'=>$ff_number_alt_g],
			'Frequent Flyer Airline 2'=> ['name'=>'ff_airline_alt_guest','type'=>'dropdown','options'=>'ffairlineOptions','class'=>'form-control','value'=>$ff_airline_alt_g],
			'Number of bags you will personally check in'=> ['name'=>'bags_guest','type'=>'dropdown', 'options'=>'noOfBags','class'=>'form-control','requried'=>'required','value'=>$bags_g],
			'What airport will you be flying out of?'=> ['name'=>'airport_code_guest','type'=>'text','class'=>'form-control','requried'=>'required','value'=>$airport_code_g],
			'I would like to depart from my home city'=> ['name'=>'depart_date_guest','type'=>'dropdown','options'=>'depCityOptions','class'=>'form-control','requried'=>'required','value'=>$depart_date_g],
			'Desired Departure Day'=> ['name'=>'desired_dpt_date_dy_guest','type'=>'dropdown','options'=>'daysOption','class'=>'form-control','value'=>(!empty($desired_dt_g) ? date('d', strtotime($desired_dt_g)) : '')],
			'Desired Departure Month'=> ['name'=>'desired_dpt_date_mon_guest','type'=>'dropdown','options'=>'monthOptions','class'=>'form-control','value'=>(!empty($desired_dt_g) ? date('m', strtotime($desired_dt_g)) : '')],
			'Departure Notes for Air Travel'=> ['name'=>'air_notes_dpt_guest','rows'=>'3','type'=>'textarea','class'=>'form-control','value'=>$air_notes_dpt_g],
			'How are you returning?'=> ['name'=>'return_date_guest','type'=>'dropdown','options'=>'retCityOptions','class'=>'form-control','requried'=>'required','value'=>$return_date_g],
			'Desired Return Day'=> ['name'=>'desired_ret_date_dy_guest','type'=>'dropdown','options'=>'daysOption','class'=>'form-control','value'=>(!empty($desired_rt_g) ? date('d', strtotime($desired_rt_g)) : '')],
			'Desired Return Month'=> ['name'=>'desired_ret_date_mon_guest','type'=>'dropdown','options'=>'monthOptions','class'=>'form-control','value'=>(!empty($desired_rt_g) ? date('m', strtotime($desired_rt_g)) : '')],
			'Return Notes for Air Travel'=> ['name'=>'air_notes_guest','type'=>'textarea','rows'=>'3','class'=>'form-control','value'=>$air_notes_g],
			'Additional travel request'=> ['name'=>'travel_req_guest','type'=>'textarea','rows'=>'3','class'=>'form-control','value'=>$travel_req_g],
			'Activity First Choice'=> ['name'=>'choice1_guest','type'=>'dropdown','options'=>'activitiesOptions','class'=>'form-control','value'=>$choice1_g],
			'Activity Second Choice'=> ['name'=>'choice2_guest','type'=>'dropdown','options'=>'activitiesOptions','class'=>'form-control','value'=>$choice2_g],
			'Activity Third Choice'=> ['name'=>'choice3_guest','type'=>'dropdown','options'=>'activitiesOptions','class'=>'form-control','value'=>$choice3_g],
		]
	] ;

	// fields to be display noned:
	$dsplyNonFelds = ['Winner'=>[],'Companion'=>[]];
	if($citizen == 28 || $citizen == 147) //united state or canada
		array_push($dsplyNonFelds['Winner'], 'Canadian Visa/Canadian eTA Number','Canadian Visa/Canadian eTA Expiration Date','Do you have a valid US Visa, OR Do you hold a valid US Resident Card/Green Card?','Are you able to obtain a US Visa?');
	if($citizen_g == 28 || $citizen_g == 147) //united state or canada
		array_push($dsplyNonFelds['Companion'], 'Canadian Visa/Canadian eTA Number','Canadian Visa/Canadian eTA Expiration Date','Do you have a valid US Visa, OR Do you hold a valid US Resident Card/Green Card?','Are you able to obtain a US Visa?');
	if($us_visa == 'Yes') 
		array_push($dsplyNonFelds['Winner'], 'Are you able to obtain a US Visa?');
	if($us_visa_g == 'Yes') 
		array_push($dsplyNonFelds['Companion'], 'Are you able to obtain a US Visa?');
	if($depart_date != 'other') 
		array_push($dsplyNonFelds['Winner'], 'Desired Departure Day','Desired Departure Month','Departure Notes for Air Travel');
	if($depart_date_g != 'other')
		array_push($dsplyNonFelds['Companion'], 'Desired Departure Day','Desired Departure Month','Departure Notes for Air Travel');
	if($return_date != 'other')
		array_push($dsplyNonFelds['Winner'], 'Desired Return Day','Desired Return Month','Return Notes for Air Travel');
	if($return_date_g != 'other')
		array_push($dsplyNonFelds['Companion'], 'Desired Return Day','Desired Return Month','Return Notes for Air Travel');

	
	// hide field
	if(!empty($dsplyNonFelds['Winner'])){
		foreach($dsplyNonFelds['Winner'] as $field){
			$inputFields['Winner'][$field]['class'] .= " hide-field";
		}
	}
	if(!empty($dsplyNonFelds['Companion'])){
		foreach($dsplyNonFelds['Companion'] as $field){
			$inputFields['Companion'][$field]['class'] .= " hide-field";
		}
	}

	/*echo '<pre>';
	print_r($inputFields);
	exit;*/
?>
			
		<div class="row reg-ovrview">
			<div class="col-xs-12 text-center"><h3>Confirm Your Registration</h3></div>
		    <div class="col-xs-12 alert alert-danger error-noti" role="alert" style="display: none">
		    </div>
			<?php 
				$html = '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>Winner</h3></div>';
				$html .= '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>Companion</h3></div>';
				$html .= '<div class="col-xs-12 no-pad reg-quick-view">';
				$hiddenFields = [
					'issue_date'=>'','expire_date'=>'','desired_dpt_date'=>'',
					'desired_ret_date'=>'','exp_date'=>'','issue_date_guest'=>'','expire_date_guest'=>''
					,'desired_dpt_date_guest'=>'','desired_ret_date_guest'=>'','exp_date_guest'=>''];

				echo form_open('registration/registration_confirmed',['class'=>'confirm-form'],$hiddenFields);
				foreach($inputFields as $key=>$field){
					$html .= '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 column '.$key.'">';
					//$html .= '<div class="group-title"><h3>'.$key.'</h3></div>';
					$fields = array_keys($field);
					foreach($fields as $input){
						$html .= '<div class="form-group text-left col-xs-12">
									<label class="pull-left">'.$input.'</label>';
						switch ($field[$input]['type']) {
							case 'dropdown':
								$js = 'class="'.$field[$input]['class'].'"';
								$html .= form_dropdown($field[$input]['name'], $$field[$input]['options'], $field[$input]['value'],$js);
								break;
							case 'textarea':
								$html .= form_textarea($field[$input]);
								break;
							default:
								$html .= form_input($field[$input]);
								break;
						}
						$html .= '</div>';
					}
					$html .='</div>';
				}
				$html .= '</div>';
			echo $html;
			?>
			<div class="col-xs-12 form-group">
				<br>
	            <button class="btn btn-warning left10 confirm-btn" name="lock" type="submit">Confirm &amp; Close Registration</button>
            </div>
			<?php echo form_close();?>
		</div>



     </div>
     <!-- /m_editable -->
    </div>

    <script type="text/javascript">

    	$(document).ready(function(e){
    		$('.hide-field').parents('.form-group').hide();

    		$( function() {
			    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
		  	});
    	})

    	// hide field on base of passport citizenship
    	var feldsHideOnPassCitzn = ['visa_type','visa_exp_date','us_visa','obtain_visa'];

    	$(document).on('change','select[name="citizen"],select[name="citizen_guest"]', function(e){
    		var parent = $(this).parents('.column');
    		var citizen = $(this).val();
    		if(parent.hasClass('Companion')) 
    			var append = "_guest"; 
    		else var append = "";
    		$.each(feldsHideOnPassCitzn, function(i,val){
    			if(citizen == 28 || citizen == 147) //united state or canada
    				parent.find('input[name="'+val+append+'"], select[name="'+val+append+'"]').parents('.form-group').hide();
    			else parent.find('input[name="'+val+append+'"], select[name="'+val+append+'"]').parents('.form-group').show();
    		})
    	})

    	// hide field on base of depart date
    	$(document).on('change','select[name="depart_date"],select[name="depart_date_guest"]', function(e){
    		var feldsHideOnDptDate = ['desired_dpt_date_dy','desired_dpt_date_mon','air_notes_dpt'];
    		hideFields(feldsHideOnDptDate, this, 'other');
    	})

    	// hide field on base of depart date
    	$(document).on('change','select[name="return_date"],select[name="return_date_guest"]', function(e){
    		var feldsHideOnRetDate = ['desired_ret_date_dy','desired_ret_date_mon','air_notes'];
    		hideFields(feldsHideOnRetDate, this, 'other');
    	})

    	$(document).on('change','select[name="fflyer"], select[name="fflyer_guest"]', function(e){
    		var fieldsHidOnFF = ['ff_number','ff_airline','fflyer_alt','ff_number_alt','ff_airline_alt'];
    		hideFields(fieldsHidOnFF, this, 'Yes');
    	})

    	$(document).on('change','select[name="fflyer_alt"], select[name="fflyer_alt_guest"]', function(e){
    		var fieldsHidOnFFAlt = ['ff_number_alt','ff_airline_alt'];
    		hideFields(fieldsHidOnFFAlt, this, 'Yes');
    	})

    	function hideFields(fieldsToBeHidden, ref, valueToBe){
    		var parent = $(ref).parents('.column');
    		var deptDt = $(ref).val();
    		if(parent.hasClass('Companion')) 
    			var append = "_guest"; 
    		else var append = "";
    		$.each(fieldsToBeHidden, function(i,val){
    			if(deptDt == valueToBe) //united state or canada
    				parent.find('textarea[name="'+val+append+'"], input[name="'+val+append+'"], select[name="'+val+append+'"]').parents('.form-group').show();
    			else parent.find('textarea[name="'+val+append+'"], input[name="'+val+append+'"], select[name="'+val+append+'"]').parents('.form-group').hide();
    		})
    	}

    	$(document).on('click','.confirm-btn',function(e){
    		e.preventDefault();
    		// lets fill the date fields
    		// winner 
        	var $eTime  = "2018-12-15"
    		var dateFieldMap = {
    			'issue_date':['issue_date_yr','issue_date_mon','issue_date_dy'],

    			'expire_date':['expire_date_yr','expire_date_mon','expire_date_dy'],

    			'desired_dpt_date':['','desired_dpt_date_mon','desired_dpt_date_dy'],

    			'desired_ret_date':['','desired_ret_date_mon','desired_ret_date_dy'],

    			'exp_date':['exp_date_yr','exp_date_mon',''],

    			'issue_date_guest':['issue_date_yr_guest','issue_date_mon_guest','issue_date_dy_guest'],

    			'expire_date_guest':['expire_date_yr_guest','expire_date_mon_guest','expire_date_dy_guest'],

    			'desired_dpt_date_guest':['','desired_dpt_date_mon_guest','desired_dpt_date_dy_guest'],

    			'desired_ret_date_guest':['','desired_ret_date_mon_guest','desired_ret_date_dy_guest']
    		};
    		var date;
    		$.each(dateFieldMap, function(i, val){
    			date = "";
    			if(val[0] == ''){
    				date = (new Date()).getFullYear();

    			} else {
	    			date = $('select[name="'+val[0]+'"]').val();
    			}

	    		date = date+"-"+$('select[name="'+val[1]+'"]').val();

	    		if(val[2] != ''){
	    			date = date+"-"+$('select[name="'+val[2]+'"]').val();
	    		} 
	    		$('input[name="'+i+'"]').val(date);
    		})

    		// passport expire check
    		var year = $('select[name="expire_date_yr"]').val();
    		var month = $('select[name="expire_date_mon"]').val();
    		var day = $('select[name="expire_date_dy"]').val();
    		var $msg = {};
    		if(Date.parse(year+"-"+month+"-"+day) <= Date.parse($eTime))
    		{ 
    			$msg['Winner']="Passport expires within 6 months of travel. Please renew your passport and enter your new passport details.<br>";
    			$(".error-noti").show();
    		}
    		<?php 
    		if(isset($data['userData']->noguest) && $data['userData']->noguest == 'Yes') {
    		?>
    		var year = $('select[name="expire_date_yr_guest"]').val();
    		var month = $('select[name="expire_date_mon_guest"]').val();
    		var day = $('select[name="expire_date_dy_guest"]').val();
    		if(Date.parse(year+"-"+month+"-"+day) <= Date.parse($eTime))
    		{ 
    			$msg['Guest']="Guest Passport expires within 6 months of travel. Please renew your passport and enter your new passport details.<br>";
    			$(".error-noti").show();
    		}
    		<?php } ?>

    		$(".error-noti").empty();
	        $.each($msg, function(i, val){
	            $(".error-noti").append("<strong>"+i+"</strong> : "+val);
	        })
	        if($.isEmptyObject($msg)){
    			$(".error-noti").hide();
    			// submit form
	             $('.confirm-form').submit();
	        } else {
	        	console.log('Here ?');
	            $('html, body').animate({
	                scrollTop: $(".error-noti").offset().top
	            }, 1000);
	        }

    		// submit form
    		//$('.confirm-form').submit();
    		
    	})
    </script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>