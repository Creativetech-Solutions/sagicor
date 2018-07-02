	<?php $this->load->view('site/pages/registration/reg_banner');
	$userData = $data['userData'];
	$exp_date = decryption($userData->exp_date);

	if(!empty($exp_date)){
	    $explodedExpDate = explode('-',$exp_date);
	    $ccmonth = $explodedExpDate[1];
	    $ccyear = $explodedExpDate[0];
	}
	?>
	<style>
		.no-pad {padding:0;text-align: left}

	</style>
	<?php if($this->session->flashdata('verified')){ ?>
        <div class="col-xs-12 alert alert-success error-noti" role="alert">
        <?=$this->session->flashdata('verified')?>
        </div>
    <?php 
    	$this->session->unset_userdata('verifier_id');
    } else { ?>
	<div class="row reg-ovrview">
		<div class="col-xs-12 text-center"><h3>Please Verify Your Account Details</h3><br></div>
		<?php if($this->session->flashdata('error')){ ?>
			<div class="col-xs-12 alert alert-danger error-noti" role="alert">
			Please Enter Full Credit Card Number
			</div>
		<?php } ?>
		<div class="col-xs-12">
			<form action="<?=base_url('Verification/verifying')?>" class="confirm-form" method="post" accept-charset="utf-8">
				<div class="form-group text-left col-xs-4">
					<label class="pull-left">Title</label>
					<select name="title" class="form-control">
						<option value="Mr" <?=$userData->title == 'Mr' ? 'selected':'' ?> >Mr</option>
						<option value="Mrs" <?=$userData->title == 'Mrs' ? 'selected':'' ?>>Mrs</option>
						<option value="Ms" <?=$userData->title == 'Ms' ? 'selected':'' ?>>Ms</option>
						<option value="Dr" <?=$userData->title == 'Dr' ? 'selected':'' ?>>Dr</option>
					</select>
				</div>
				<div class="form-group text-left col-xs-4">
					<label class="pull-left">First Name</label><input type="text" name="first_name" value="<?=$userData->first_name ?>" class="form-control" requried="required">
				</div>

				<div class="form-group text-left col-xs-4">
					<label class="pull-left">Last Name</label><input type="text" name="last_name" value="<?=$userData->last_name ?>" class="form-control" requried="required">
				</div>
		
				<div class="form-group text-left col-xs-4">
					<label class="pull-left">Email</label><input type="email" name="email" value="<?=$userData->email ?>" class="form-control" readonly="readonly" requried="required">
				</div>
				
				<div class="form-group text-left col-xs-4">
					<label class="pull-left">DOB</label><input type="text" name="birth_date" value="<?=$userData->birth_date ?>" class="form-control datepicker" requried="required">
				</div>
				<div class="form-group text-left col-xs-4">
					<label class="pull-left">Gender</label>
					<select name="gender" class="form-control">
						<option value="">Select Gender</option>
						<option <?=$userData->gender == 'Male' ? 'selected':'' ?> value="Male" selected="selected">Male</option>
						<option <?=$userData->gender == 'Female' ? 'selected':'' ?> value="Female">Female</option>
					</select>
				</div>

				<div class="form-group text-left col-xs-4">
					<label class="pull-left">Card Type</label>
					<select name="cc_type" class="form-control">
						<option <?=$userData->cc_type == 'Visa' ? 'selected':'' ?> value="Visa">Visa</option>
						<option <?=$userData->cc_type == 'MasterCard' ? 'selected':'' ?> value="MasterCard">MasterCard</option>
						<option <?=$userData->cc_type == 'Amex' ? 'selected':'' ?> value="Amex">Amex</option>
					</select>
					</div>

				<div class="form-group text-left col-xs-4">
					<label class="pull-left">Card Name</label><input type="text" name="card_name" value="<?=$userData->card_name ?>" class="form-control" requried="required">
				</div>
				<div class="form-group text-left col-xs-4">
					<label class="pull-left">Card Number</label><input type="text" name="card_number" value="<?=decryption($userData->card_number) ?>" class="form-control" requried="required">
				</div>
				<div class="form-group text-left col-xs-4">
					<label class="pull-left">Month</label>
					<select name="exp_date_mon" class="form-control">
						<option value="01" <?=(isset($ccmonth) && $ccmonth == '01') ? 'selected="selected"' : ''; ?> >January</option>
						<option value="02" <?= (isset($ccmonth) && $ccmonth == '02') ? 'selected="selected"' : ''; ?> >Feburary</option>
						<option value="03" <?= (isset($ccmonth) && $ccmonth == '03') ? 'selected="selected"' : ''; ?> >March</option>
						<option value="04" <?= (isset($ccmonth) && $ccmonth == '04') ? 'selected="selected"' : ''; ?> >April</option>
						<option value="05" <?= (isset($ccmonth) && $ccmonth == '05') ? 'selected="selected"' : ''; ?> >May</option>
						<option value="06" <?= (isset($ccmonth) && $ccmonth == '06') ? 'selected="selected"' : ''; ?> >June</option>
						<option value="07" <?= (isset($ccmonth) && $ccmonth == '07') ? 'selected="selected"' : ''; ?> >July</option>
						<option value="08" <?= (isset($ccmonth) && $ccmonth == '08') ? 'selected="selected"' : ''; ?> >August</option>
						<option value="09" <?= (isset($ccmonth) && $ccmonth == '09') ? 'selected="selected"' : ''; ?> >September</option>
						<option value="10" <?= (isset($ccmonth) && $ccmonth == '10') ? 'selected="selected"' : ''; ?> >October</option>
						<option value="11" <?= (isset($ccmonth) && $ccmonth == '11') ? 'selected="selected"' : ''; ?> >November</option>
						<option value="12" <?= (isset($ccmonth) && $ccmonth == '12') ? 'selected="selected"' : ''; ?> >December</option>
					</select>
				</div>
				<div class="form-group text-left col-xs-4">
					<label class="pull-left">Year</label>
					<?php

			        // Sets the top option to be the current year. (IE. the option that is chosen by default).
			        $currently_selected = date('Y');
			        // Year to start available options at
			        $earliest_year = 2030;
			        // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
			        $latest_year = 2016;
			        echo '<select class="form-control select" id="cc-year" name="cc_year">';

			        // Loops over each int[year] from current year, back to the $earliest_year [2016]
			        foreach ( range( $latest_year, $earliest_year ) as $i ) {
			            // Shows the option with the next year in range.

			            echo '<option value="'.$i.'"'.($i == $ccyear ? ' selected="selected"' : '').'>'.$i.'</option>';
			        }
			        echo '</select>';
			        ?>
				</div>
				<div class="form-group text-left col-xs-4">
					<label class="pull-left">CVV</label><input type="text" name="cvv" value="<?=decryption($userData->cvv) ?>" class="form-control" requried="required">
				</div>
				<div class="col-xs-12 form-group text-center">
					<br>
					<input type="submit" style="color:white" class="btn btn-warning confirm-btn" value="Verify Now">
				</div>
			</form>
		</div>
	</div>

	<?php }?>



</div>
<!-- /m_editable -->
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


