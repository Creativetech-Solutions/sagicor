<?php
 $this->load->view('site/ui_components/header');
?>



<!-- content -->


<?php

/**
 * @var $view MY_Controller has the view key in data array
 */
$this->load->view($view);

?>

<!-- content end -->

<?php
$this->load->view('site/ui_components/footer');

$this->load->view('site/ui_components/scripts');
?>