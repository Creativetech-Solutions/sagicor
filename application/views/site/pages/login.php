<div class="loginfloat ">
    <form method="post" action="<?=base_url()?>login/authenticate" lpformnum="30">
        <h1 style="color:#00adef;">Login</h1><br>
        <div class="inset">
            <p>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" style="color: rgb(0, 0, 0); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" style="color: rgb(0, 0, 0); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
            </p>
            <div class="alert-danger"></div>
        </div>
        <?php
        if($this->session->flashdata('flashresponse')){
            print $this->session->flashdata('flashresponse');
        }
        ?>

        <?php

        if(isset($this->data['siteSettings']) && !empty($this->data['siteSettings'])){

            if(intval($this->data['siteSettings']->reg_allowed) === 1){
                $registration = '<span><a href="'.base_url().'login/register">Click here to request your username and password</a></span><br>';
            }
        }else{
                $registration = '<span><a href="'.base_url().'login/register">Click here to request your username and password</a></span><br>';
        }
 ?>
        <p class="p-container">
            <?=isset($registration)?$registration:''?>
            <span class="pull-left"><a href="<?=base_url()?>login/reset">Forgot password? Click here to reset.</a></span><br>
            <input type="submit" value="Log in" id="dosubmit" name="login">
        </p>
        <input type="hidden" value="1" name="doLogin">
    </form>
</div>
<div id="ri-grid" class="ri-grid ri-grid-size-2 ri-shadow">
    <img class="img-responsive flip-img" src="<?=base_url();?>assets/site/images/Culture01.jpg"/>
    <?php /* ?>
    <img class="ri-loading-image" src="<?=base_url();?>assets/site/images/loading.gif"/><ul>
        <?php
        //images directory
        $dirname = "assets/site/images/photos/";
        //specify image extension
        $images = glob($dirname."*.jpg");
        //show all images in directory
        foreach($images as $image) {
            echo '<li><a href="#"><img src="'.$image.'" /></a></li>';
        }
        ?> 
    </ul> <?php */ ?>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript"> 

/*$(document).on('blur, keyup','input', function(e){
    if($(this).val() != '')
        $(this).css('background-image','none');
    else 
        $(this).css('background-image','url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAALZJREFUOBFjYKAANDQ0rGWiQD9IqzgL0BQ3IKMXiB8AcSKQ/waIrYDsKUD8Fir2pKmpSf/fv3+zgPxfzMzMSbW1tbeBbAaQC+b+//9fB4h9gOwikCAQTAPyDYHYBciuBQkANfcB+WZAbPP37992kBgIUOoFBiZGRsYkIL4ExJvZ2NhAXmFgYmLKBPLPAfFuFhaWJpAYEBQC+SeA+BDQC5UQIQpJYFgdodQLLyh0w6j20RCgUggAAEREPpKMfaEsAAAAAElFTkSuQmCC")');
})*/


  /*  $(function() {

        $( '#ri-grid' ).gridrotator( {
            w1024			: {
                rows	: 3,
                columns	: 6
            },
            w768			: {
                rows	: 3,
                columns	: 7
            },
            w480			: {
                rows	: 3,
                columns	: 5
            },
            w320			: {
                rows	: 2,
                columns	: 4
            },
            w240			: {
                rows	: 2,
                columns	: 3
            }
        } );

    });*/
</script>