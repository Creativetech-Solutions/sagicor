<div class="barcalona-banner">
    <img src="<?=base_url()?>assets/site/img/banner-activities.jpg">
</div>
<hr/>
<div style="margin-top: -20px;" class="row">
    <div class="col-md-12">
        <h2>Activities</h2>
        <p>
            <!--<h3>Coming soon!</h3>-->
        </p><form action="<?=base_url()?>Activities/update" class="activities" method="post">
            <input value="<?=(isset($data) && !empty($data['regDetails']) && is_numeric($data['regDetails']->RegID))?$data['regDetails']->RegID:''?>" name="id" id="id" class="hidden">
            <input value="<?=(isset($data) && !empty($data['guestDetails']) && is_numeric($data['guestDetails']->RegID))?$data['guestDetails']->RegID:''?>" name="g_id" id="g_id" class="hidden">
            <h3>Winner Information</h3>
            <?php
            $flashMsg = $this->session->flashdata('siteMsg');
            if (isset($flashMsg) && !empty($flashMsg)) {
               try{
                $flashMsgExp = explode('::',$flashMsg);
                   if($flashMsgExp[0] === "FAIL"){
                       echo '<div class="alert alert-danger col-xs-11" role="alert">';
                       echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                       echo $flashMsgExp[1];
                       echo '</div>';
                   }elseif($flashMsgExp[0] === "OK"){
                       echo '<div class="alert alert-success col-xs-11" role="alert">';
                       echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>';
                       echo $flashMsgExp[1];
                       echo '</div>';
                   }
               }catch (Exception $ex){
                    //Do Nothing :)
               }
            }
            ?>
            <!--<div class="alert alert-danger col-xs-11" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                Activity selection will be open on March 18th, at the conclusion of registration.
            </div>-->
            <div class="clearfix"></div>
            <div>
                <div class="form-group col-xs-4"><!-- diabetic selection -->
                    <span class="help-block">First choice</span>
                    <select name="choice1" id="choice1_winner" class="form-control select activityChoicew choice">
                        <option value="" class="default">Select First Choice</option>
                        <?php foreach($data['choices'] as $choice){
                                if(isset($data) && !empty($data['regDetails']) &&
                                 $data['regDetails']->choice1 == $choice->id){
                                    $s = 'selected="selected"';
                                } else $s = '';
                            echo '<option '.$s.' value="'.$choice->id.'">'.$choice->activity.'</option>';
                        }?>
                    </select>
                </div>
                <div class="form-group col-xs-4"><!-- hypertension selection -->
                    <span class="help-block">Second choice</span>
                    <select name="choice2" id="choice2_winner" class="form-control select activityChoicew choice">
                        <option value="" class="default">Select Second Choice</option>
                        <?php foreach($data['choices'] as $choice){
                                if(isset($data) && !empty($data['regDetails']) &&
                                 $data['regDetails']->choice2 == $choice->id){
                                    $s = 'selected="selected"';
                                } else $s = '';
                            echo '<option '.$s.' value="'.$choice->id.'">'.$choice->activity.'</option>';
                        }?>
                    </select>
                </div>
                <div class="form-group col-xs-4"><!-- vegetarian selection -->
                    <span class="help-block">Third choice</span>
                    <select name="choice3" id="choice3_winner" class="form-control select activityChoicew choice">
                        <option value="" class="default">Select Third Choice</option>
                        <?php foreach($data['choices'] as $choice){
                                if(isset($data) && !empty($data['regDetails']) &&
                                 $data['regDetails']->choice3 == $choice->id){
                                    $s = 'selected="selected"';
                                } else $s = '';
                            echo '<option '.$s.' value="'.$choice->id.'">'.$choice->activity.'</option>';
                        }?>
                    </select>
                </div>
                <div <?=(isset($data) && !empty($data['regDetails']) && $data['regDetails']->Companion === "Yes")?'style="display: block;"':'style="display: none;"'?> id="guest-info">
                    <div class="clearfix"></div>
                    <hr>
                    <h3>Guest Information</h3>
                    <div role="alert" class="alert alert-success col-xs-11">
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"></button>
                        Please choose one (1) activity for each activity choice
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-xs-4"><!-- diabetic selection -->
                        <span class="help-block">First choice</span>
                        <select name="choice1_g" id="choice1_g" class="form-control select activityChoiceg choice">
                            <option value="" class="default">Select First Choice</option>
                            <?php foreach($data['choices'] as $choice){
                                    if(isset($data) && !empty($data['guestDetails']) &&
                                     $data['guestDetails']->choice1 == $choice->id){
                                        $s = 'selected="selected"';
                                    } else $s = '';
                                echo '<option '.$s.' value="'.$choice->id.'">'.$choice->activity.'</option>';
                            }?>
                        </select>
                    </div>
                    <div class="form-group col-xs-4"><!-- hypertension selection -->
                        <span class="help-block">Second choice</span>
                        <select name="choice2_g" id="choice2_g" class="form-control select activityChoiceg choice">
                            <option value="" class="default">Select Second Choice</option>
                            <?php foreach($data['choices'] as $choice){
                                    if(isset($data) && !empty($data['guestDetails']) &&
                                     $data['guestDetails']->choice2 == $choice->id){
                                        $s = 'selected="selected"';
                                    } else $s = '';
                                echo '<option '.$s.' value="'.$choice->id.'">'.$choice->activity.'</option>';
                            }?>
                        </select>
                    </div>
                    <div class="form-group col-xs-4"><!-- vegetarian selection -->
                        <span class="help-block">Third choice</span>
                        <select name="choice3_g" id="choice3_g" class="form-control select activityChoiceg choice">
                            <option value="" class="default">Select Third Choice</option>
                            <?php foreach($data['choices'] as $choice){
                                    if(isset($data) && !empty($data['guestDetails']) &&
                                     $data['guestDetails']->choice3 == $choice->id){
                                        $s = 'selected="selected"';
                                    } else $s = '';
                                echo '<option '.$s.' value="'.$choice->id.'">'.$choice->activity.'</option>';
                            }?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <input type="submit" value="Submit" class="btn btn-success" name="update">
        </form>
    </div>
</div>

<script type="text/javascript">

    $(document).on('change','.choice', function(){
        $id = $(this).attr('id');
        $val = $(this).val();
        $(this).parents('.activities').find('select').not('#'+$id).find('option[value="'+$val+'"]').not('.default').attr("disabled", true);
    })

</script>