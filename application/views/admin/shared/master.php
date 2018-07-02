<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?= isset($viewData['page_title'])?$viewData['page_title']:""; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php $this->load->view('admin/shared/scripts');?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/DataTables/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/DataTables/css/dataTables.bootstrap.min.css">
</head>
<body>
<div style="display: none;" id="loader"></div>
<!-- navbar  -->
<div id="navbar">
  <div class="container">
    <div class="row grid_24 clearfix">
      <div class="col grid_5"> <a href="<?php echo base_url();?>admin/CPanel">
      		<img src="<?php echo base_url(); ?>assets/admin/images/Sagicor2018Logo_admin.png" alt="Sagicor Convention 2018 | Montreal" class="logo"></a> </div> 
          <!-- admin/images/logo.png -->
          
			<div class="col grid_19">
        <p class="flright">Welcome: <?php echo $this->data['loggedinuser']->username ; 
 					//echo "<pre> this data =  "; print_r( ); echo "</pre>";    
					
				 //echo $loggedinas;?><br />Last Login: <?php echo $this->data['loggedinuser']->lastlogin; //echo strftime("%c", strtotime($user->last));?></p>
      </div>

      
    </div>
  </div>
</div>
<!-- navbar end here -->
<!-- crumbs -->
<div id="crumbs">
  <div class="container">
    <div class="row grid_24 clearfix">
      <div class="col grid_16"> <i class="icon-th"></i> <a href="<?php echo base_url()?>admin/CPanel">Dashboard</a> <i class="icon-angle-right"></i>
        
<i class="icon-group"></i> <?= isset($viewData['page_title'])?$viewData['page_title']:""; ?>     </div>
      <div class="col grid_8 nav-extra">
        <p class="flright">
          <a href="<?php echo base_url()?>admin/profile/edit"><i class="icon-user"></i> Profile</a>
          <a href="<?php echo base_url()?>login/logout"><i class="icon-off"></i> Sign Out</a> </p>
      </div>
    </div>
  </div>
</div>
<!-- crumbs end  -->

<div class="container">

<?php $this->load->view('admin/shared/header');?>


<?php
$this->load->view('admin/shared/flash_notification');
?>

<?php $this->load->view($viewData['page_view'],(isset($viewData['page_data']) && !empty($viewData['page_data']))?$viewData:array());?>
</div><!-- container /-->


<div class="top20">&nbsp;</div>
<!-- Start Footer-->
<div class="footer clearfix">
  Copyright <?php echo date('Y').' |'; ?> Barcelona Administration Panel;?><br />sunlinc.net &bull; Administration Panel
</div>
<!-- End Footer-->
<script type="text/javascript">
var menu = new cbpHorizontalSlideOutMenu(document.getElementById('cbp-hsmenu-wrapper'));
</script>
</body>
</html>