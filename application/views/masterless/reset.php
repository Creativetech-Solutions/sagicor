<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Alvin Herbert - Sunlinc" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Sagicor Convention 2018</title>
    <link href="<?=base_url(); ?>assets/site/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url(); ?>assets/site/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/site/css/register_style.css" />
    <link rel="stylesheet" href="<?=base_url(); ?>assets/site/css/jquery-ui.css" type="text/css" />
    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="style/css/ie7.css" media="all" />
    <![endif]-->
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
    <![endif]-->
    <!--[if IE 9]>
    <link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
    <![endif]-->
    <script type="text/javascript" src="<?=base_url(); ?>assets/admin/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url(); ?>assets/site/js/jquery-ui.js"></script>



</head>
<body>
<style>
  input, input:hover{color:white!important;}
</style>
  <div class="container">
    <?php
      $messages = $this->session->flashdata("alertMsg");
      if(isset($messages) && is_array($messages) && !empty($messages)){
          echo '<div class="bgred"><p><span class="icon-minus-sign"></span><i class="close icon-remove-circle"></i><span>Error!</span>An error occurred while processing request</p>';
          echo '<ul class="error">';
          foreach($messages as $message){
              echo '<li><i class="icon-double-angle-right"></i>'.$message.'</li>';
          }
          echo '</ul></div>';
      } 
      if($this->session->flashdata("successMsg")){
        $message = $this->session->flashdata("successMsg");
           echo '<div class="bggreen"><p><span class="icon-minus-sign"></span><i class="close icon-remove-circle"></i><span>Success!</span></p>';
            echo '<ul class="success">';
                echo '<li><i class="icon-double-angle-right"></i>'.$message.'</li>';
            echo '</ul></div>';
      }
     ?>
    <div class="header clearfix">
        <h3 class="text-muted"><a href="<?=base_url();?>"><img src="<?php echo base_url(); ?>assets/site/img/Sagicor2018Logo_FINAL.jpg" style="max-height:114px" alt="Sagicor Convention 2018 | Montreal"  /></a>
        </h3>
    </div>
      <p class="pagetip"><i class="icon-lightbulb icon-3x pull-left"></i> Please enter your username and e-mail address below to reset your password. You will receive a new password sent to your e-mail.</p>


  <div class="row">
    <div id="fullform">
      <form class="xform" id="admin_form" action="<?=base_url() ?>login/reset" method="post">
        <section>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>Username</label>
              <label class="input"> <i class="icon-prepend icon-user"></i> <i class="icon-append icon-asterisk"></i>
                <input  type="text" name="uname" placeholder="Username" required="required">
              </label>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>Email Address</label>
              <label class="input"> <i class="icon-prepend icon-envelope-alt"></i> <i class="icon-append icon-asterisk"></i>
                <input  type="text" name="email" placeholder="Email Address" required="required">
              </label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
               <label for="captcha">Captcha Code: <img src="<?=base_url();?>login/captcha" alt="" class="captcha-append" /></label>
                <input type="text" name="captcha" placeholder="Captcha Code" required="required">
              </label>
            </div>
          </div>
        </section>
        <footer>
          <input type="submit" class="pull-left" name="dosubmit" value="Reset Password">&nbsp; &nbsp;
          <a class="btn pull-left" style="margin-left:12px" href="<?=base_url('/login')?>">Go To Login</a>
        </footer>
      </form>
      <footer class="footer">
        <p>&copy; <?php echo date('Y'); ?> Sunlinc. All rights reserved.</p>
      </footer>
    </div>
  </div>
    
  </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url(); ?>assets/site/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>