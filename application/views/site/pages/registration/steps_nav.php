  <?php 
  		$method = strtolower($this->router->fetch_method());
  		
  ?>
<style>
	.steps-nav a {color:inherit;}
	.steps-nav a:hover{color:#00A2E5;}
	.steps-nav a:hover .bubble, a:hover .bubble:before, a:hover .bubble:after{background-color:#00A2E5!important;}
</style>
  <ul class="progress-indicator steps-nav">

        <li class="<?=($method == 'register') ? 'active': 'completed';?>"> 
        	<a class="sub-nav" data-href="registration/register" href="<?=base_url('registration/register')?>">
        		<span class="bubble"></span> 
        		<strong> 1. <small>Personal Information</small></strong> 
        	</a>
        </li>

        <li class="<?=($method != 'step2_passport') ?(($method == 'register') ? '': 'completed'): 'active';?>"> 
        	<a class="sub-nav" data-href="registration/step2_passport" href="<?=base_url('registration/step2_passport')?>">
	        	<span class="bubble"></span> 2. 
	        	<small>Passport Information</small> 
        	</a>
        </li>

        <li class="<?=($method != 'step3_emergency_contact') ?(($method == 'register' || $method == 'step2_passport') ? '': 'completed'): 'active';?>"> 
        	<a class="sub-nav" data-href="registration/step3_emergency_contact" href="<?=base_url('registration/step3_emergency_contact')?>">
	        	<span class="bubble"></span> 3. 
	        	<small>Emergency Contact</small> 
        	</a>
        </li>

        <li class="<?=($method != 'step4_flights_accommodation') ?(($method == 'step5_activities' || $method == 'step6_credit_card' || $method == 'final_message') ? 'completed': ''): 'active';?>"> 
        	<a class="sub-nav" data-href="registration/step4_flights_accommodation" href="<?=base_url('registration/step4_flights_accommodation')?>">
	        	<span class="bubble"></span> 4. 
	        	<small>Flights and Accommodation</small> 
        	</a>
        </li>

        <li class="<?=($method != 'step5_activities') ?(($method == 'step6_credit_card' || $method == 'final_message') ? 'completed': ''): 'active';?>"> 
        	<a class="sub-nav" data-href="registration/step5_activities" href="<?=base_url('registration/step5_activities')?>">
	        	<span class="bubble"></span> 5. 
	        	<small>Activities</small> 
        	</a>
        </li>

        <li class="<?=($method != 'step6_credit_card') ?(($method == 'final_message') ? 'completed': ''): 'active';?>"> 
        	<a class="sub-nav" data-href="registration/step6_credit_card" href="<?=base_url('registration/step6_credit_card')?>">
	        	<span class="bubble"></span> 6. 
	        	<small>Credit Card Details</small> 
        	</a>
        </li>

    </ul>


    <script>
        $(document).on('click','.sub-nav', function(e){
            e.preventDefault();
            var link = $(this).attr('data-href');
            var redirect = $(this).attr('href');
            <?php if(strtolower($this->router->fetch_method()) == 'step2_passport'){ ?>
                var $msg = checkPassportDate();
                if($.isEmptyObject($msg)){
                    $('input[name="redirect_to"]').val(link);
                    $('.register-form').submit();
                } else {
                    $('html, body').animate({
                        scrollTop: $(".error-noti").offset().top
                    }, 1000);
                }
            <?php } else if(strtolower($this->router->fetch_method()) != 'final_message'){ ?>
                    $('input[name="redirect_to"]').val(link);
                    $('.register-form').submit();
            <?php } else {?>
                    window.location.assign(redirect);
            <?php } ?>


        })
    </script>