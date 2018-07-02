


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Sagicor Convention 2018</title>



    <!-- Bootstrap -->

    <link href="<?=base_url();?>assets/site/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/site/css/bootstrap/bootstrap-formhelpers.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="<?=base_url();?>assets/site/css/style.css" rel="stylesheet">

    <script type="text/javascript" src="<?=base_url();?>assets/site/js/modernizr.custom.26633.js"></script>



    <noscript>

        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/site/css/fallback.css" />

    </noscript>

    <!--[if lt IE 9]>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/site/css/fallback.css" />

    <![endif]-->

    <link href="<?php echo base_url(); ?>assets/site/css/progress-wizard.min.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <!-- jQuery -->
    <script src="<?=base_url()?>assets/site/js/jquery-1.12.3.min.js"></script>

</head>

<body>

<div class="container">

    <div class="header clearfix">

        <h3 class="text-muted"><a href="<?=base_url();?>"><img src="<?php echo base_url(); ?>assets/site/img/Sagicor2018Logo_FINAL.jpg" style="max-height:114px" alt="Sagicor Convention 2018 | Montreal" /></a></h3>

        <?php 
       if(LoggedIn()) {
        $this->load->view('site/ui_components/navigation');
       } ?>

    </div>