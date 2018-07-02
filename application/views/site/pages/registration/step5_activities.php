<?php $this->load->view('site/pages/registration/reg_banner')?>
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

$actvtyArray = [
        'Winner'=>[
            ['label'=>'First choice', 'field'=>'choice1'],
            ['label'=>'Second choice', 'field'=>'choice2'],
            ['label'=>'Third choice', 'field'=>'choice3'],
        ]
    ];
  if($companion == 'Yes') { 
    $actvtyArray['Companion'] = [
            ['label'=>'First choice', 'field'=>'choice1_g'],
            ['label'=>'Second choice', 'field'=>'choice2_g'],
            ['label'=>'Third choice', 'field'=>'choice3_g'],
        ];
  }  

?>

<div class="row text-left content-wrapper">

<?php $this->load->view('site/pages/registration/steps_nav');?>

<h3>Registration - Step 5: Activities</h3>

<!-- registration form -->
<form class="register-form" method="post" action="<?=base_url()?>registration/step6_credit_card">
    <h3>Winner Information</h3>
    <div class="clearfix"></div>
    <div class="activities">
    <?php foreach($actvtyArray['Winner'] as $choice) { ?>
        <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- diabetic selection -->
            <strong class="help-block"><?=$choice['label']?></strong>
            <select class="form-control select choice" id="<?=$choice['field']?>" name="<?=$choice['field']?>">
                    <option class="default" value="0"><?=$choice['label']?></option>
                    <!-- <option class="default" selected="selected" value="0">Coming Soon</option> -->
                 <?php 
                    if(is_array($activities) || is_object($activities)){
                        foreach($activities as $key => $activity){
                            if($$choice['field'] == $activity->id) $s = 'selected';
                            else $s = '';
                            echo '<option '.$s.' value="'.$activity->id.'">'.$activity->activity.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
    <?php } ?>
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
        <?php foreach($actvtyArray['Companion'] as $choice) { ?>
            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- diabetic selection -->
                <strong class="help-block"><?=$choice['label']?></strong>
                <select class="form-control select choice" id="<?=$choice['field']?>" name="<?=$choice['field']?>">
                    <option class="default" value="0"><?=$choice['label']?></option>
                    
                    <!-- <option class="default" selected="selected" value="0">Coming Soon</option> -->
                    <?php 
                    if(is_array($activities) || is_object($activities)){
                        foreach($activities as $key => $activity){
                            if($$choice['field'] == $activity->id) $s = 'selected';
                            else $s = '';
                            echo '<option '.$s.' value="'.$activity->id.'">'.$activity->activity.'</option>';
                        }
                    }
                ?>
                </select>
            </div>
        <?php } ?>
        </div>
    <?php } ?>
    <div class="clearfix"></div>
    <div class="form-group">
       
        <button type="submit" name="prev_update" id="update" value="" class="btn btn-success left10">Previous</button>
        <button type="submit" class="btn btn-success left10 no_custom" >Next</button>
    </div>
                   <input type="hidden" name="redirect_to" value="" />
</form>
</div>

<script type="text/javascript">
    window.onload = function(){
        var selectboxes = document.getElementsByTagName('select');
        for(var i = 0; i <= selectboxes.length; i++){
            renderChoices(selectboxes[i]);
        }
    }
    $(document).on('change','.choice', function(){
        renderChoices(this);
    })

    function renderChoices(ele){
        $id = $(ele).attr('id');
        $val = $(ele).val();
        $(ele).parents('.activities').find('select').not('#'+$id).find('option[value="'+$val+'"]').not('.default').attr("disabled", true);
    }

</script>
     </div>
     <!-- /m_editable -->
    </div>
   