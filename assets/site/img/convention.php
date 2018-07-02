<?php

/**
 * @author Alvin Herbert
 * @copyright 2016
 */



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sagicor 2016 - Barcelona | Convention</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript" src="js/modernizr.custom.26633.js"></script>
    
		<noscript>
			<link rel="stylesheet" type="text/css" href="css/fallback.css" />
		</noscript>
		<!--[if lt IE 9]>
			<link rel="stylesheet" type="text/css" href="css/fallback.css" />
		<![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right" style="margin-top: 100px;">
            <li role="presentation" class="active"><a href="convention.php">Convention</a></li>
            <li role="presentation"><a href="#">The Hotel</a></li>
            <li role="presentation"><a href="#">Barcelona</a></li>
            <li role="presentation"><a href="#">Itinerary</a></li>
            <li role="presentation"><a href="#">Travel</a></li>
            <li role="presentation"><a href="#">Registration</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
          </ul>
        </nav>
        <h3 class="text-muted"><img src="img/sagicor2016logo.jpg" /></h3>
      </div>
      <div class="barcalona-banner">
		<img src="img/banner-welcome.jpg"/>
      </div>
      <hr />
      <!-- content -->
      <div class="row" style="margin-top: -20px;">
        <div class="col-md-12">
        <h2>Welcome</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tellus ex, eleifend facilisis augue sit amet, semper vestibulum sem. Sed pellentesque, dui eget cursus ornare, nibh sem bibendum enim, vel bibendum nulla nulla quis enim. Nullam vel lorem et nunc bibendum consequat a in ipsum. Nunc sit amet massa in ipsum tempor tempus vel nec quam. Praesent pretium vulputate aliquam. Sed malesuada eros ac mattis vestibulum. Mauris suscipit faucibus hendrerit.</p>
        <p>Cras ac lobortis est. Ut velit lorem, ultrices a lacus eget, vulputate convallis diam. Duis at fringilla mi. Mauris molestie augue nunc, at tristique nunc ullamcorper eget. Curabitur rhoncus tincidunt accumsan. Quisque mattis sapien id odio sagittis lacinia. Vestibulum a nibh scelerisque velit dapibus dignissim. Curabitur non laoreet enim. Nulla facilisi. Praesent euismod rutrum lectus. Sed libero purus, consequat at nulla vel, mollis pharetra diam.</p>
        <p>Praesent pellentesque suscipit purus a aliquam. Duis id massa diam. Maecenas ullamcorper purus vel purus sagittis auctor. Suspendisse aliquam massa sed nisl viverra sollicitudin. Fusce sit amet magna eu purus interdum aliquam. Mauris commodo quis lectus vitae varius. Maecenas elementum venenatis euismod. Aliquam luctus nulla vel fringilla ullamcorper. Nulla et gravida sapien, nec interdum purus. Aliquam convallis commodo bibendum. Nulla accumsan lectus sed arcu condimentum mattis. Sed mi orci, tincidunt eget tortor facilisis, porta iaculis nunc. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer sit amet tempus mi. Sed commodo nisi at dolor congue scelerisque. Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>
        </div>
      </div>
      <!-- content end -->
      <footer class="footer">
        <p>&copy; 2016 sunlinc. All rights reserved. <span class="pull-right"><a href="#">Admin Panel | <a href="#">Logout</a></a></span></p>
      </footer>

    </div> <!-- /container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.gridrotator.js"></script>
		<script type="text/javascript">	
			$(function() {
			
				$( '#ri-grid' ).gridrotator( {
					w320 : {
						rows : 3,
						columns : 4
					},
					w240 : {
						rows : 3,
						columns : 3
					}
				} );
			
			});
		</script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>