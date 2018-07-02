<?php

//Winner Section
$choice1 = isset($data['userData']) ? $data['userData']->choice1 : ''; //88
$choice2 = isset($data['userData']) ? $data['userData']->choice2 : '';
$choice3 = isset($data['userData']) ? $data['userData']->choice3 : '';
$companion = isset($data['userData']) ? $data['userData']->noguest : ''; //76
$activities = $data['activities'];
//Guest Section
$choice1_g = $choice2_g = $choice3_g = '';
if(isset($data['guestData']) && is_object($data['guestData'])){
    $choice1_g = $data['guestData']->choice1; //88
    $choice2_g = $data['guestData']->choice2;
    $choice3_g = $data['guestData']->choice3;
}

?>

<ul class="progress-indicator">
    <li class="completed">
        <span class="bubble"></span>
        <i class="fa fa-check-circle"></i>
        1. <small>Personal Information</small>
    </li>
    <li class="completed">
        <span class="bubble"></span>
        <i class="fa fa-check-circle"></i>
        2. <small>Passport Information</small>
    </li>
    <li class="completed">
        <span class="bubble"></span>
        3. <small>Emergency Contact</small>
    </li>
    <li class="completed">
        <span class="bubble"></span>
        4. <small>Flights and Accommodation</small>
    </li>
    <li class="active">
        <span class="bubble"></span>
        <strong>5. <small>Activities</small></strong>
    </li>
    <li>
        <span class="bubble"></span>
        6. <small>Credit Card Details</small>
    </li>
</ul>
<h3>Registration - Step 5: Activities</h3>

<!-- registration form -->
<form method="post" action="<?=base_url()?>registration/step6_credit_card">
    <h3>Winner Information</h3>
    <div class="clearfix"></div>
    <div class="activities">
        <div class="form-group col-xs-4"><!-- diabetic selection -->
            <strong class="help-block">First choice</strong>
            <select class="form-control select choice" id="choice1" name="choice1">
                    <option class="default" value="0">First Choice</option>
                 <?php 
                    if(is_array($activities) || is_object($activities)){
                        foreach($activities as $key => $activity){
                            if($choice1 == $activity->id) $s = 'selected';
                            else $s = '';
                            echo '<option '.$s.' value="'.$activity->id.'">'.$activity->activity.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group col-xs-4"><!-- hypertension selection -->
            <strong class="help-block">Second choice</strong>
            <select class="form-control select choice" id="choice2" name="choice2">
                    <option class="default" value="0">Second choice</option>
                <?php 
                    if(is_array($activities) || is_object($activities)){
                        foreach($activities as $key => $activity){
                            if($choice2 == $activity->id) $s = 'selected';
                            else $s = '';
                            echo '<option '.$s.' value="'.$activity->id.'">'.$activity->activity.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group col-xs-4"><!-- vegetarian selection -->
            <strong class="help-block">Third choice</strong>
            <select class="form-control select choice" id="choice3" name="choice3">
                    <option class="default" value="0">Third choice</option>
                 <?php 
                    if(is_array($activities) || is_object($activities)){
                        foreach($activities as $key => $activity){
                            if($choice3 == $activity->id) $s = 'selected';
                            else $s = '';
                            echo '<option '.$s.' value="'.$activity->id.'">'.$activity->activity.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    <?php if($companion == 'Yes') { ?>
        <div id="guest-info" class="activities" style="display: 'none';">
            <div class="clearfix"></div>
            <hr />
            <h3>Guest Information</h3>
            <div class="alert alert-success col-xs-11" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                Please choose one (1) activity for each activity choice
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-xs-4"><!-- diabetic selection -->
                <strong class="help-block">First choice</strong>
                <select class="form-control select choice" id="choice1_g" name="choice1_g">
                    <option class="default" value="0">First choice</option>
                    <?php 
                    if(is_array($activities) || is_object($activities)){
                        foreach($activities as $key => $activity){
                            if($choice1_g == $activity->id) $s = 'selected';
                            else $s = '';
                            echo '<option '.$s.' value="'.$activity->id.'">'.$activity->activity.'</option>';
                        }
                    }
                ?>
                </select>
            </div>
            <div class="form-group col-xs-4"><!-- hypertension selection -->
                <strong class="help-block">Second choice</strong>
                <select class="form-control select choice" id="choice2_g" name="choice2_g">
                    <option class="default" value="0">Second choice</option>
                    <?php 
                    if(is_array($activities) || is_object($activities)){
                        foreach($activities as $key => $activity){
                            if($choice2_g == $activity->id) $s = 'selected';
                            else $s = '';
                            echo '<option '.$s.' value="'.$activity->id.'">'.$activity->activity.'</option>';
                        }
                    }
                ?>
                </select>
            </div>
            <div class="form-group col-xs-4"><!-- vegetarian selection -->
                <strong class="help-block">Third choice</strong>
                <select class="form-control select choice" id="choice3_g" name="choice3_g">
                    <option class="default" value="0">Third choice</option>
                     <?php 
                    if(is_array($activities) || is_object($activities)){
                        foreach($activities as $key => $activity){
                            if($choice3_g == $activity->id) $s = 'selected';
                            else $s = '';
                            echo '<option '.$s.' value="'.$activity->id.'">'.$activity->activity.'</option>';
                        }
                    }
                ?>
                </select>
            </div>
        </div>
    <?php } ?>
    <div class="clearfix"></div>
    <div class="form-group">
       
        <button type="submit" name="prev_update" id="update" value="" class="btn btn-success left10">Previous</button>
        <input type="submit" value="Next" class="btn btn-success left10 no_custom"  />
    </div>
</form>


<script type="text/javascript">

    $(document).on('change','.choice', function(){
        $id = $(this).attr('id');
        $val = $(this).val();
        $(this).parents('.activities').find('select').not('#'+$id).find('option[value="'+$val+'"]').not('.default').attr("disabled", true);
    })

</script>