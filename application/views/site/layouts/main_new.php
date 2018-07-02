<?php
$class = $this->router->fetch_class();
if(strtolower($class) == 'registration' || strtolower($class) == 'verification'){
	$this->load->view('site/ui_components/new_header');
}
?>



<!-- content -->


<?php

/**
 * @var $view MY_Controller has the view key in data array
 */
$this->load->view($view);

?>

<!-- content end 

get limit, http , session, sleep, report, -->

<?php
if(strtolower($class) == 'registration' ){
	$contentPath = contentPlaceHolders($this->router->fetch_class(), $this->router->fetch_method());
	$this->load->view($contentPath);
} else if(strtolower($class) == 'verification'){
	$this->load->view('site/ui_components/placeholders/registration');
}

$this->load->view('site/ui_components/scripts');
?>