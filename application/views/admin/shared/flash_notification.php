<?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/20/2016
 * Time: 9:28 AM
 */
?>

<div id="message-box">

    <?php
    $flash = $this->session->flashdata('alertMsg');
    ?>
<?php if(isset($flash) && $flash != '' ):
        $exploded = explode("::",$flash);
        $type = $exploded[0];
        $msg = $exploded[1];
            if($exploded[0] === "FAIL"){
    ?>
    <div class="bgred">
        <ul class="error">
            <li><i class="icon-double-angle-right"></i><?php echo $msg;?></li>
        </ul>
    </div>
<?php
            } //Endif for FAIL
if($exploded[0] === "OK"){ ?>
    <div class="bggreen">
        <ul class="success">
            <li style="color:white;"><i class="icon-double-angle-right"></i><?php echo $msg;?></li>
        </ul>
    </div>

    <?php
} //Endif For OK
            endif;  //Final endif for main if

?>
</div><!-- message-box -->