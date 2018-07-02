<?php $this->load->view('site/pages/registration/reg_banner')?>
     <?php
$cc_type = isset($data['userData']) ? $data['userData']->cc_type : ''; //62
$card_name = isset($data['userData']) ? $data['userData']->card_name : ''; //63
$card_number = isset($data['userData']) ? $data['userData']->card_number : ''; //64
$exp_date = isset($data['userData']) ? $data['userData']->exp_date : ''; //65
$cvv = isset($data['userData']) ? $data['userData']->cvv : ''; //65
$billing_address = isset($data['userData']) ? $data['userData']->billing_address : ''; //66
$cc_st_1address = isset($data['userData']) ? $data['userData']->cc_st_1address : ''; //67
$cc_st_2address = isset($data['userData']) ? $data['userData']->cc_st_2address : ''; //68
$cc_city = isset($data['userData']) ? $data['userData']->cc_city : ''; //69
$cc_state = isset($data['userData']) ? $data['userData']->cc_state : ''; //70
$cc_zip = isset($data['userData']) ? $data['userData']->cc_zip : ''; //71
$cc_country = isset($data['userData']) ? $data['userData']->cc_country : ''; //72
$accept_reg = isset($data['userData']) ? $data['userData']->accept_reg : ''; //72
$countries = $data['countries'];

$card_number = decryption($card_number);
$exp_date = decryption($exp_date);
$cvv = decryption($cvv);

if(!empty($exp_date)){
    $explodedExpDate = explode('-',$exp_date);
    $ccmonth = $explodedExpDate[1];
    $ccyear = $explodedExpDate[0];
}
?>

<div class="row text-left content-wrapper">

<?php $this->load->view('site/pages/registration/steps_nav');?>


<h3>Registration - Final Step: Credit Card Information</h3><br />

<!-- registration form -->

<form class="register-form" method="post" action="<?=base_url()?>registration/final_message">

    <h3>Winner Information</h3>

    <div class="alert alert-success col-xs-11" role="alert">

        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>

        Please provide us with your Credit Card information for your Hotel incidental (personal) charges.  Please note all information given here is encrypted and secure.

    </div>

    <div class="clearfix"></div>

    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- country selection -->

        <label>Card Type</label>

        <select class="form-control select" id="cc-type" name="cc_type">
            <option value=""></option>
            <option <?php echo ($cc_type == 'Visa') ? 'selected="selected"' : ''; ?>>Visa</option>

            <option <?php echo ($cc_type == 'MasterCard') ? 'selected="selected"' : ''; ?>>MasterCard</option>

            <option <?php echo ($cc_type == 'Amex') ? 'selected="selected"' : ''; ?>>Amex</option>

        </select>

    </div>

    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- name as it appears on credit card field -->

        <label>Name</label>

        <input type="text" class="form-control" placeholder="" id="card-name" name="card_name" value="<?php echo $card_name; ?>">

        <span class="help-block">Name as it appears on credit card</span>

    </div>

    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- credit card number field -->

        <label>Card Number</label>

        <input type="text" class="form-control" placeholder="" id="card-no" name="card_no" maxlength="16" value="<?= !empty($card_number)?'************'.substr($card_number,-4):''; ?>">

    </div>

    <div class="clearfix"></div>

    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- cc expire month selection -->

        <label>Month</label>

        <select class="form-control select" id="cc-month" name="cc_month">

            <option value=""></option>

            <option value="01" <?=(isset($ccmonth) && $ccmonth == '01') ? 'selected="selected"' : ''; ?>>01 January</option>

            <option value="02" <?= (isset($ccmonth) && $ccmonth == '02') ? 'selected="selected"' : ''; ?>>02 February</option>

            <option value="03" <?= (isset($ccmonth) && $ccmonth == '03') ? 'selected="selected"' : ''; ?>>03 March</option>

            <option value="04" <?= (isset($ccmonth) && $ccmonth == '04') ? 'selected="selected"' : ''; ?>>04 April</option>

            <option value="05" <?= (isset($ccmonth) && $ccmonth == '05') ? 'selected="selected"' : ''; ?>>05 May</option>

            <option value="06" <?= (isset($ccmonth) && $ccmonth == '06') ? 'selected="selected"' : ''; ?>>06 June</option>

            <option value="07" <?= (isset($ccmonth) && $ccmonth == '07') ? 'selected="selected"' : ''; ?>>07 July</option>

            <option value="08" <?= (isset($ccmonth) && $ccmonth == '08') ? 'selected="selected"' : ''; ?>>08 August</option>

            <option value="09" <?= (isset($ccmonth) && $ccmonth == '09') ? 'selected="selected"' : ''; ?>>09 September</option>

            <option value="10" <?= (isset($ccmonth) && $ccmonth == '10') ? 'selected="selected"' : ''; ?>>10 October</option>

            <option value="11" <?= (isset($ccmonth) && $ccmonth == '11') ? 'selected="selected"' : ''; ?>>11 November</option>

            <option value="12" <?= (isset($ccmonth) && $ccmonth == '12') ? 'selected="selected"' : ''; ?>>12 December</option>

        </select>

    </div>

    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- cc expire year year selection -->

        <label>Year</label>

        <?php

        // Sets the top option to be the current year. (IE. the option that is chosen by default).

        $currently_selected = date('Y');

        // Year to start available options at

        $earliest_year = 2030;

        // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.

        $latest_year = 2016;



        echo '<select class="form-control select" id="cc-year" name="cc_year"><option value=""></option>';



        // Loops over each int[year] from current year, back to the $earliest_year [2016]

        foreach ( range( $latest_year, $earliest_year ) as $i ) {

            // Shows the option with the next year in range.

            echo '<option value="'.$i.'"'.($i == $ccyear ? ' selected="selected"' : '').'>'.$i.'</option>';

        }

        echo '</select>';

        ?>

    </div>

    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- Security Code CVV2 field -->

        <label>CVV</label>

        <input type="text" class="form-control" placeholder="" id="ccv" name="cvv" maxlength="4" value="<?php echo $cvv; ?>">

    </div>

    <div class="clearfix"></div>


    <div class="clearfix"></div>

    <strong class="help-block">Billing Address</strong>

    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- address 1 field -->

        <label>Street</label>
        <input type="text" class="form-control" placeholder="" id="cc-st-address" name="cc_st_1address" value="<?php echo $cc_st_1address; ?>">

    </div>

    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- city field -->

        <label>City</label>
        <input type="text" class="form-control" placeholder="" id="cc-city" name="cc_city" value="<?php echo $cc_city; ?>">

    </div>



    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- zip code field -->

        <label>Zip</label>

        <input type="text" class="form-control" placeholder="" id="cc-zip" name="cc_zip" value="<?php echo $cc_zip; ?>">

    </div>

    <div class="clearfix"></div>
    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4"><!-- country selection -->

        <label>Country</label>
        <select class="form-control select" id="cc-country" name="cc_country">
            <option value="0">Select Country</option>
            <?php 
                if(is_array($countries) && !empty($countries)){
                    foreach ($countries as $key => $cntry) {
                        if($cntry->id == $cc_country) $selected = 'selected';
                        else $selected = '';
                        echo '<option '.$selected.' value="'.$cntry->id.'">'.$cntry->name.'</option>';
                    }
                }
            ?> 
        </select>

    </div>

    <div class="clearfix"></div>

    <div class="form-group">

        <div>

               <button type="submit" name="prev_update" id="update" value="" class="btn btn-success left10">Previous</button>

            <?php if ($accept_reg == 1){

                $acceptshow = 'show';

                $submitshow = 'none';

            } else {

                $acceptshow = 'none';

                $submitshow = 'show';

            } ?>
        <?php if(!$data['regIsLocked']){  ?>
            <button class="btn btn-warning left10" id="update" name="update" type="submit" style="display: <?php echo $submitshow; ?>;">Submit Registration</button>

        <?php } ?>

        </div>

    </div>
    <input type="hidden" name="redirect_to" value="" />

</form>
</div>
<script type="text/javascript">
    $(function () {
        //Update the Birth Country Dropdown of the Winner
        $('#cc-country option').each(function() {
            if(this.value == "<?= $cc_country; ?>"){
                $(this).prop('selected',true);
            }
        });
    });
</script>
     </div>
     <!-- /m_editable -->
    </div>
   