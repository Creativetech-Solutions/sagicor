
  <link href="<?=base_url();?>assets/site/css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/site/css/bootstrap/bootstrap-formhelpers.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?=base_url('/assets/theme')?>/css/registration.css?crc=3952659194" id="pagesheet"/>

    <div class="browser_width colelem shared_content" id="u80117-bw" data-content-guid="u80117-bw_content">
      <div class="shadow museBGSize" id="u80117"><!-- group -->
       <div class="clearfix" id="u80117_align_to_page">
        <!-- m_editable region-id="editable-static-tag-U83194-BP_infinity" template="registration.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
        <div class="ASM---h1---Page-Headline clearfix grpelem" id="u83194-4" data-muse-uid="U83194" data-muse-type="txt_frame" data-IBE-flags="txtStyleSrc"><!-- content -->
         <h1 id="u83194-2">REGISTRATION</h1>
        </div>
        <!-- /m_editable -->
       </div>
      </div>
     </div>
     


     <script>
       $(document).ready(function(e){
        <?php 
          if($data['regIsLocked']){ ?>
              $('select, input, textarea, .bfh-datepicker').not("input[name='s_type'],input[name='redirect_to']").attr('disabled', 'disabled');
              $('.bfh-datepicker').css({'background-color':'#eee','cursor':'not-allowed'});


          <?php
              $fieldsToBeEnable = '';
              // check if canadian visa field is required for winner
              if($data['userData']->citizen  != 28 && $data['userData']->citizen != 147) { // not canada or usa
                // check if canadian visa field is empty
                if(empty($data['userData']->visa_type)){
                  // enabled the canadian visa number field
                  $fieldsToBeEnable .= "input[name='visa_type'],";
                }
                if(empty($data['userData']->visa_exp_date) || $data['userData']->visa_exp_date == '0000-00-00'){
                  // enabled the canadian visa exp field
                  $fieldsToBeEnable .= "input[name='visa_exp_date'], div[data-name='visa_exp_date'],";
                }
              }
              // check if companion exist then do same for it
              if($data['userData']->noguest == 'Yes'){
                // check if canadian visa field is required for winner
                if($data['guestData']->citizen  != 28 && $data['guestData']->citizen != 147) { // not canada or usa
                  // check if canadian visa field is empty
                  if(empty($data['guestData']->visa_type)){
                    // enabled the canadian visa number field
                    $fieldsToBeEnable .= "input[name='visa_type_g'],";
                  }
                  if(empty($data['guestData']->visa_exp_date) || $data['guestData']->visa_exp_date == '0000-00-00'){
                    // enabled the canadian visa exp field
                    $fieldsToBeEnable .= "input[name='visa_exp_date_g'], div[data-name='visa_exp_date_g'],";
                  }
                } // end of citizen check IF
              } // end of companion check IF

              if(!empty($fieldsToBeEnable)){ 
                $fieldsToBeEnable = trim($fieldsToBeEnable,',');
               ?>
                $("<?=$fieldsToBeEnable?>").removeAttr('disabled').css({'background-color':'white','cursor':'default'});
              <?php }
            } // end of regIsLocked IF
          ?>
       })

     </script>
     <div class="ASM---p---body-text clearfix colelem shared_content" id="u80116-4" data-muse-uid="U80116" data-muse-type="txt_frame" data-IBE-flags="txtStyleSrc" data-content-guid="u80116-4_content">