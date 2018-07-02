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
    <script src="<?=base_url(); ?>assets/admin/js/jquery.ui.touch-punch.js"></script>

    <script src="<?=base_url(); ?>assets/admin/js/jquery.wysiwyg.js"></script>

    <script src="<?=base_url(); ?>assets/admin/js/global.js"></script>

    <script src="<?=base_url(); ?>assets/admin/js/custom.js"></script>

    <script src="<?=base_url(); ?>assets/admin/js/modernizr.mq.js" type="text/javascript" ></script>

    <script src="<?=base_url(); ?>assets/admin/js/checkbox.js"></script>
</head>
<body>

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
// get post data on validation fails
$fname = $lname = $username = $email = $email2 = $pass = $pass2 = '';
if($this->session->flashdata('postData')){
    $postData = $this->session->flashdata('postData');
    $fname = $postData['fname'];
    $lname = $postData['lname'];
    $username = $postData['username'];
    $email = $postData['email'];
    $email2 = $postData['email2'];
    $pass = $postData['pass'];
    $pass2 = $postData['pass2'];
}
?>
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted"><a href="<?=base_url();?>"><img src="<?php echo base_url(); ?>assets/site/img/Sagicor2018Logo_FINAL.jpg" style="max-height:114px" alt="Sagicor Convention 2018 | Montreal"  /></a>
            </h3>
        </div>
    </div>
<div class="row">
    <div id="fullform">
        <form class="xform" id="admin_form" action="<?=base_url() ?>login/do_register"  method="post">
            <div >
            <h1>Request a Username &amp; Password</h1>
                <div class="form-group col-xs-4">
                    <label for="username">Username</label>
                    <div style="color: black; margin-left: 10px;">Username must be at least 6 characters</div>
                    <input style="color: #ffffff;" type="text" value="<?=$username?>" name="username" id="username" required>
                </div>
                <div class="form-group col-xs-4">
                    <label for="fname">First name</label>
                    <br />
                    <input style="color: #ffffff;" type="text" value="<?=$fname?>" name="fname" placeholder="First Name" required>
                </div>
                <div class="form-group col-xs-4">
                    <label for="lname">Last name</label>
                    <br />
                    <input style="color: #ffffff;" type="text" value="<?=$lname?>" name="lname" placeholder="Last Name" required>
                </div>
                <div class="form-group col-xs-4">
                    <label for="username">Email</label>
                    <input id="email1" style="color: #ffffff;" value="<?=$email?>" type="email" name="email" placeholder="Email" required>
                    <div style="color: blue;" id="divCheckEmailMatch"></div>
                </div>
                <div class="form-group col-xs-4">
                    <label for="username">Confirm Email</label>
                    <input id="email2" style="color: #ffffff;" value="<?=$email2?>" type="email" name="email2" placeholder="Email" onchange="checkEmailMatch();" required>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-xs-4">
                    <label for="pass">Password</label>
                    <div style="color: black; margin-left: 10px;">Password must be at least 8 characters</div>
                    <input id="pass1" style="color: #ffffff;" value="<?=$pass?>" type="password" name="pass" placeholder="Password" required>
                    <div style="color: blue; margin-left: 10px;" id="divCheckPasswordMatch"></div>
                </div>
                <div class="form-group col-xs-4">
                    <label for="pass2">Repeat Password</label>
                    <br />
                    <input id="pass2" style="color: #ffffff;" value="<?=$pass2?>" type="password" name="pass2" placeholder="Repeat password" onchange="checkPasswordMatch();" required>
                </div>


                <div class="clearfix"></div>
                <div class="form-group col-xs-3">
                    <label for="captcha"><img src="<?=base_url();?>login/captcha" alt="" class="captcha-append" /></label>
                    <input style="color: #ffffff;" type="text" name="captcha" placeholder="Captcha Code">
                </div>
                <div class="clearfix"></div>
            </div>
            <p class="p-container" style="float: left;">
                <input style="margin-left: 10px;" type="submit" id="dosubmit" value="Register"> 
                <a href="<?=base_url('/login')?>" class="btn">Back To Login</a>
            </p>
            <input name="doRegister" type="hidden" value="1" />
        </form>
    </div>
</div>

<script type="text/javascript">
    function checkPasswordMatch() {
        var password = $("#pass1").val();
        var confirmPassword = $("#pass2").val();

        if (password != confirmPassword)
            $("#divCheckPasswordMatch").html("Passwords do not match!");
        else
            $("#divCheckPasswordMatch").html("Passwords match.");
    }

    function checkEmailMatch() {
        var email = $("#email1").val();
        var confirmEmail = $("#email2").val();

        if (email != confirmEmail)
            $("#divCheckEmailMatch").html("Email addresses do not match!");
        else
            $("#divCheckEmailMatch").html("Email address match.");
    }

    $(document).ready(function () {
        $("#pass2").keyup(checkPasswordMatch);
        $("#email2").keyup(checkEmailMatch);
    });


</script>
<script src="<?=base_url(); ?>assets/site/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>