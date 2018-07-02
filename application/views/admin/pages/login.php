<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
  /*if ($user->is_Admin())
      redirect_to("index.php");
  if (isset($_POST['submit']))
      : $result = $user->login($_POST['username'], $_POST['password']);
  //Login successful 
  if ($result)
      : redirect_to("index.php");
			//: redirect_to("admin-panel/admin/index.php");
  endif;
  endif;*/
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?php echo base_url(); ?>assets/admin/theme/css/login.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
</head>
<body>
<div class="bgb">
  <div id="content">
    <header class="logintitle">
      <h1><i class="icon-lock icon-3x pull-left"></i> Admin Panel<span><?php echo $this->config->item('site_name'); ?></span></h1>
    </header>
    <div class="loginwrap">
      <form id="admin_form" name="admin_form" method="post" action="<?php echo base_url(); ?>admin/login/authenticate" class="xform loginform">
        <section>
          <div class="row">
            <div class="col col-12">
              <label class="input"> <i class="icon-prepend icon-user"></i>
                <input placeholder="Username"  name="username">
              </label>
            </div>
          </div>
        </section>
        <section>
          <div class="row">
            <div class="col col-12">
              <label class="input"> <i class="icon-prepend icon-lock"></i>
                <input placeholder="**********" type="password" name="password">
              </label>
            </div>
          </div>
        </section>
        <footer>
          <button name="submit" class="button-login">Login</button>
        </footer>
      </form>
    </div>
    <div class="loginshadow"></div>
    <div id="footer">Copyright &copy;<?php echo date('Y').' '.$this->config->item('site_name');?></div>
    
    <div id="message-box">
    <?php $flash = $this->session->flashdata('flashresponse'); ?>
		<?php if(isset($flash) && $flash != '' ): ?>
      <div class="bgred">
      		<ul class="error">         	
            <li><i class="icon-double-angle-right"></i><?php echo $flash;?></li>            
					</ul>
      </div>
    <?php endif; ?>
    </div><!-- message-box -->
   
  </div>
</div>
</body>
</html>