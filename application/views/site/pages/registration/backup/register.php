

<?php


//First Get Winner Details
$userID = isset($data['userData'])?$data['userData']->UserID:'';
$regID = isset($data['userData'])?$data['userData']->RegID:'';
$winnerFirstName = isset($data['userData'])?$data['userData']->first_name:'';
$winnerLastName = isset($data['userData'])?$data['userData']->last_name:'';
$gender = isset($data['userData'])?$data['userData']->gender:'';
$title = isset($data['userData'])?$data['userData']->title:'';
$shirt_size = isset($data['userData'])?$data['userData']->shirt_size:'';
$name_badge = isset($data['userData'])?$data['userData']->name_badge:'';
$name_badge_last = isset($data['userData'])?$data['userData']->name_badge_last:'';
$city = isset($data['userData'])?$data['userData']->city:'';
$birth_date = isset($data['userData'])?$data['userData']->birth_date:'';
$home = isset($data['userData'])?$data['userData']->home:'';
$work = isset($data['userData'])?$data['userData']->work:'';
$cell = isset($data['userData'])?$data['userData']->cell:'';
$email = isset($data['userData'])?$data['userData']->email:'';
$alt_email = isset($data['userData'])?$data['userData']->alt_email:'';
$birth_country = isset($data['userData'])?$data['userData']->birth_country:'';
$guest = isset($data['userData'])?$data['userData']->noguest:'';
$country = isset($data['userData'])?$data['userData']->country:'';
$st_1address = isset($data['userData'])?$data['userData']->st_1address:'';
$st_2address = isset($data['userData'])?$data['userData']->st_2address:'';
$state = isset($data['userData'])?$data['userData']->state:'';
$countries = $data['countries'];

//Address1
$addressZip = isset($data['userData'])?$data['userData']->zip:'';

if(!empty($birth_date)){
    $dob = explode('-',$birth_date);
    $dob_year = $dob[0];
    $dob_month = $dob[1];
    $dob_day = $dob[2];
}

//If there is any guest info we would need to show that too..
$regID_g = $guestFirstName = $guestLastName = $gender_g = $title_g = $shirt_size_g = $name_badge_g =$name_badge_last_g = $city_g = $birth_date_g = $home_g = $work_g = $cell_g = $email_g = $alt_email_g = $birth_country_g = $guest_g = $country_g = $st_1address_g = $st_2address_g = $state_g = $zip_g = '';

if(isset($data['guestData']) && is_object($data['guestData'])){
    $regID_g = $data['guestData']->RegID;
    $guestFirstName = $data['guestData']->first_name;
    $guestLastName = $data['guestData']->last_name;
    $gender_g = $data['guestData']->gender;
    $title_g = $data['guestData']->title;
    $shirt_size_g = $data['guestData']->shirt_size;
    $name_badge_g = $data['guestData']->name_badge;
    $name_badge_last_g = $data['guestData']->name_badge_last;
    $city_g = $data['guestData']->city;
    $birth_date_g = $data['guestData']->birth_date;
    $home_g = $data['guestData']->home;
    $work_g = $data['guestData']->work;
    $cell_g = $data['guestData']->cell;
    $email_g = $data['guestData']->email;
    $alt_email_g = $data['guestData']->alt_email;
    $birth_country_g = $data['guestData']->birth_country;
    $guest_g = $data['guestData']->noguest;
    $country_g = $data['guestData']->country;
    $st_1address_g = $data['guestData']->st_1address;
    $st_2address_g = $data['guestData']->st_2address;
    $state_g = $data['guestData']->state;
    $zip_g = $data['guestData']->zip;
    if(!empty($birth_date_g)){
        $dob_g = explode('-',$birth_date_g);
        $dob_year_g = $dob_g[0];
        $dob_month_g = $dob_g[1];
        $dob_day_g = $dob_g[2];
    }
}

?>
<div class="row">

    <ul class="progress-indicator">

        <li class="active"> <span class="bubble"></span> <strong> 1. <small>Personal Information</small></strong> </li>

        <li> <span class="bubble"></span> 2. <small>Passport Information</small> </li>

        <li> <span class="bubble"></span> 3. <small>Emergency Contact</small> </li>

        <li> <span class="bubble"></span> 4. <small>Flights and Accommodation</small> </li>

        <li> <span class="bubble"></span> 5. <small>Activities</small> </li>

        <li> <span class="bubble"></span> 6. <small>Credit Card Details</small> </li>

    </ul>

    <h3>Registration - Step 1: Personal Information</h3>

    <br>

    <!-- registration form -->

    <form id="submitForm" action="<?= base_url()?>registration/step2_passport" method="post">

        <h3>Winner Information</h3>
        <div class="info-wrap">
            <div class="form-group">

                <input value="<?=$userID?>" name="pid" id="pid" class="hidden">

                <input value="<?=$regID?>" name="regid" id="regid" class="hidden">

                <input value="" name="id_g" id="id_g" class="hidden">


                <input value="newUser111" name="registrationid" id="registrationid" class="hidden">

                <input value="newUser111" name="registrationid_g" id="registrationid-g" class="hidden">



                <!-- first name / last name fields -->

                <div class="form-group col-xs-3"><!-- title selection -->

                    <label>Title</label>

                    <select name="title_name" id="title-name" class="form-control select">

                        <option value=""></option>

                        <option <?php echo ($title == 'Mr') ? 'selected="selected"' : ''; ?>>Mr</option>

                        <option <?php echo ($title == 'Mrs') ? 'selected="selected"' : ''; ?>>Mrs</option>

                        <option <?php echo ($title == 'Ms') ? 'selected="selected"' : ''; ?>>Ms</option>

                        <option <?php echo ($title == 'Dr') ? 'selected="selected"' : ''; ?>>Dr</option>

                    </select>

                </div>

                <div class="form-group col-xs-4">

                    <label>First Name, as per passport being used</label>

                    <input type="text" value="<?=$winnerFirstName?>" name="first_name" id="first-name" placeholder="" class="form-control" >

                    </div>

                <div class="form-group col-xs-4">

                    <label>Last Name, as per passport being used</label>

                    <input type="text" value="<?=$winnerLastName?>" name="last_name" id="last-name" placeholder="" class="form-control">

                    </div>

            </div>

            <div class="clearfix"></div>

            <strong class="help-block">Date Of Birth</strong>
            <!-- start dob -->

            <div class="form-group col-xs-2"><!-- dob month selection -->

                <label>Month</label>

                <select name="dob_month" id="dob-month" class="form-control select">

                    <option></option>

                    <option <?= (isset($dob_month) && $dob_month === "01")?"selected='selected'":""; ?>value="01">January</option>
                    <option <?= (isset($dob_month) && $dob_month === "02")?"selected='selected'":""; ?>value="02">February</option>
                    <option <?= (isset($dob_month) && $dob_month === "03")?"selected='selected'":""; ?>value="03">March</option>
                    <option <?= (isset($dob_month) && $dob_month === "04")?"selected='selected'":""; ?>value="04">April</option>
                    <option <?= (isset($dob_month) && $dob_month === "05")?"selected='selected'":""; ?>value="05">May</option>
                    <option <?= (isset($dob_month) && $dob_month === "06")?"selected='selected'":""; ?>value="06">June</option>
                    <option <?= (isset($dob_month) && $dob_month === "07")?"selected='selected'":""; ?>value="07">July</option>
                    <option <?= (isset($dob_month) && $dob_month === "08")?"selected='selected'":""; ?>value="08">August</option>
                    <option <?= (isset($dob_month) && $dob_month === "09")?"selected='selected'":""; ?>value="09">September</option>
                    <option <?= (isset($dob_month) && $dob_month === "10")?"selected='selected'":""; ?>value="10">October</option>
                    <option <?= (isset($dob_month) && $dob_month === "11")?"selected='selected'":""; ?>value="11">November</option>
                    <option <?= (isset($dob_month) && $dob_month === "12")?"selected='selected'":""; ?>value="12">December</option>
                </select>

            </div>

            <div class="form-group col-xs-2"><!-- dob month selection -->

                <label>Date</label>

                <select name="dob_date" id="dob-date" class="form-control select">

                    <option></option>
                    <option <?=(isset($dob_day) && $dob_day === "01")?"selected='selected'":"";?>>01</option>
                    <option <?=(isset($dob_day) && $dob_day === "02")?"selected='selected'":"";?>>02</option>
                    <option <?=(isset($dob_day) && $dob_day === "03")?"selected='selected'":"";?>>03</option>
                    <option <?=(isset($dob_day) && $dob_day === "04")?"selected='selected'":"";?>>04</option>
                    <option <?=(isset($dob_day) && $dob_day === "05")?"selected='selected'":"";?>>05</option>
                    <option <?=(isset($dob_day) && $dob_day === "06")?"selected='selected'":"";?>>06</option>
                    <option <?=(isset($dob_day) && $dob_day === "07")?"selected='selected'":"";?>>07</option>
                    <option <?=(isset($dob_day) && $dob_day === "08")?"selected='selected'":"";?>>08</option>
                    <option <?=(isset($dob_day) && $dob_day === "09")?"selected='selected'":"";?>>09</option>
                    <option <?=(isset($dob_day) && $dob_day === "10")?"selected='selected'":"";?>>10</option>
                    <option <?=(isset($dob_day) && $dob_day === "11")?"selected='selected'":"";?>>11</option>
                    <option <?=(isset($dob_day) && $dob_day === "12")?"selected='selected'":"";?>>12</option>
                    <option <?=(isset($dob_day) && $dob_day === "13")?"selected='selected'":"";?>>13</option>
                    <option <?=(isset($dob_day) && $dob_day === "14")?"selected='selected'":"";?>>14</option>
                    <option <?=(isset($dob_day) && $dob_day === "15")?"selected='selected'":"";?>>15</option>
                    <option <?=(isset($dob_day) && $dob_day === "16")?"selected='selected'":"";?>>16</option>
                    <option <?=(isset($dob_day) && $dob_day === "17")?"selected='selected'":"";?>>17</option>
                    <option <?=(isset($dob_day) && $dob_day === "18")?"selected='selected'":"";?>>18</option>
                    <option <?=(isset($dob_day) && $dob_day === "19")?"selected='selected'":"";?>>19</option>
                    <option <?=(isset($dob_day) && $dob_day === "20")?"selected='selected'":"";?>>20</option>
                    <option <?=(isset($dob_day) && $dob_day === "21")?"selected='selected'":"";?>>21</option>
                    <option <?=(isset($dob_day) && $dob_day === "22")?"selected='selected'":"";?>>22</option>
                    <option <?=(isset($dob_day) && $dob_day === "23")?"selected='selected'":"";?>>23</option>
                    <option <?=(isset($dob_day) && $dob_day === "24")?"selected='selected'":"";?>>24</option>
                    <option <?=(isset($dob_day) && $dob_day === "25")?"selected='selected'":"";?>>25</option>
                    <option <?=(isset($dob_day) && $dob_day === "26")?"selected='selected'":"";?>>26</option>
                    <option <?=(isset($dob_day) && $dob_day === "27")?"selected='selected'":"";?>>27</option>
                    <option <?=(isset($dob_day) && $dob_day === "28")?"selected='selected'":"";?>>28</option>
                    <option <?=(isset($dob_day) && $dob_day === "29")?"selected='selected'":"";?>>29</option>
                    <option <?=(isset($dob_day) && $dob_day === "30")?"selected='selected'":"";?>>30</option>
                    <option <?=(isset($dob_day) && $dob_day === "31")?"selected='selected'":"";?>>31</option>
                </select>

            </div>

            <div class="form-group col-xs-2"><!-- dob year selection -->

                <label>Year</label>

                <select name="dob_year" id="dob-year" class="form-control select">
                    <option value=""></option>
                    <option <?= (isset($dob_year) && ($dob_year === "2000" ))?'selected="selected"':"" ?> value="2000">2000</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1999" ))?'selected="selected"':"" ?> value="1999">1999</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1998" ))?'selected="selected"':"" ?> value="1998">1998</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1997" ))?'selected="selected"':"" ?> value="1997">1997</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1996" ))?'selected="selected"':"" ?> value="1996">1996</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1995" ))?'selected="selected"':"" ?> value="1995">1995</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1994" ))?'selected="selected"':"" ?> value="1994">1994</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1993" ))?'selected="selected"':"" ?> value="1993">1993</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1992" ))?'selected="selected"':"" ?> value="1992">1992</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1991" ))?'selected="selected"':"" ?> value="1991">1991</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1990" ))?'selected="selected"':"" ?> value="1990">1990</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1989" ))?'selected="selected"':"" ?> value="1989">1989</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1988" ))?'selected="selected"':"" ?> value="1988">1988</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1987" ))?'selected="selected"':"" ?> value="1987">1987</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1986" ))?'selected="selected"':"" ?> value="1986">1986</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1985" ))?'selected="selected"':"" ?> value="1985">1985</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1984" ))?'selected="selected"':"" ?> value="1984">1984</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1983" ))?'selected="selected"':"" ?> value="1983">1983</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1982" ))?'selected="selected"':"" ?> value="1982">1982</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1981" ))?'selected="selected"':"" ?> value="1981">1981</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1980" ))?'selected="selected"':"" ?> value="1980">1980</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1979" ))?'selected="selected"':"" ?> value="1979">1979</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1978" ))?'selected="selected"':"" ?> value="1978">1978</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1977" ))?'selected="selected"':"" ?> value="1977">1977</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1976" ))?'selected="selected"':"" ?> value="1976">1976</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1975" ))?'selected="selected"':"" ?> value="1975">1975</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1974" ))?'selected="selected"':"" ?> value="1974">1974</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1973" ))?'selected="selected"':"" ?> value="1973">1973</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1972" ))?'selected="selected"':"" ?> value="1972">1972</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1971" ))?'selected="selected"':"" ?> value="1971">1971</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1970" ))?'selected="selected"':"" ?> value="1970">1970</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1969" ))?'selected="selected"':"" ?> value="1969">1969</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1968" ))?'selected="selected"':"" ?> value="1968">1968</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1967" ))?'selected="selected"':"" ?> value="1967">1967</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1966" ))?'selected="selected"':"" ?> value="1966">1966</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1965" ))?'selected="selected"':"" ?> value="1965">1965</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1964" ))?'selected="selected"':"" ?> value="1964">1964</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1963" ))?'selected="selected"':"" ?> value="1963">1963</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1962" ))?'selected="selected"':"" ?> value="1962">1962</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1961" ))?'selected="selected"':"" ?> value="1961">1961</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1960" ))?'selected="selected"':"" ?> value="1960">1960</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1959" ))?'selected="selected"':"" ?> value="1959">1959</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1958" ))?'selected="selected"':"" ?> value="1958">1958</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1957" ))?'selected="selected"':"" ?> value="1957">1957</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1956" ))?'selected="selected"':"" ?> value="1956">1956</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1955" ))?'selected="selected"':"" ?> value="1955">1955</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1954" ))?'selected="selected"':"" ?> value="1954">1954</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1953" ))?'selected="selected"':"" ?> value="1953">1953</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1952" ))?'selected="selected"':"" ?> value="1952">1952</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1951" ))?'selected="selected"':"" ?> value="1951">1951</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1950" ))?'selected="selected"':"" ?> value="1950">1950</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1949" ))?'selected="selected"':"" ?> value="1949">1949</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1948" ))?'selected="selected"':"" ?> value="1948">1948</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1947" ))?'selected="selected"':"" ?> value="1947">1947</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1946" ))?'selected="selected"':"" ?> value="1946">1946</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1945" ))?'selected="selected"':"" ?> value="1945">1945</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1944" ))?'selected="selected"':"" ?> value="1944">1944</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1943" ))?'selected="selected"':"" ?> value="1943">1943</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1942" ))?'selected="selected"':"" ?> value="1942">1942</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1941" ))?'selected="selected"':"" ?> value="1941">1941</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1940" ))?'selected="selected"':"" ?> value="1940">1940</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1939" ))?'selected="selected"':"" ?> value="1939">1939</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1938" ))?'selected="selected"':"" ?> value="1938">1938</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1937" ))?'selected="selected"':"" ?> value="1937">1937</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1936" ))?'selected="selected"':"" ?> value="1936">1936</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1935" ))?'selected="selected"':"" ?> value="1935">1935</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1934" ))?'selected="selected"':"" ?> value="1934">1934</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1933" ))?'selected="selected"':"" ?> value="1933">1933</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1932" ))?'selected="selected"':"" ?> value="1932">1932</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1931" ))?'selected="selected"':"" ?> value="1931">1931</option>
                    <option <?= (isset($dob_year) && ($dob_year === "1930" ))?'selected="selected"':"" ?> value="1930">1930</option>
                </select>
            </div>

            <div class="clearfix"></div>


            <!-- end dob -->

            <div class="clearfix"></div>
            <strong class="help-block">Please enter your preferred first and last name as you wish it to appear on your name badge.</strong>
            <div class="form-group col-xs-4"><!-- Name badge field 1 -->

                <label>Name Badge: First Name</label>

                <input type="text" value="<?=$name_badge?>" name="name_badge" id="name-badge" placeholder="" class="form-control">

                </div>

            <div class="form-group col-xs-4"><!-- Name badge field 2 -->

                <label>Name Badge: Last Name</label>

                <input type="text" value="<?=$name_badge_last?>" name="name_badge_last" id="name-badge-last" placeholder="" class="form-control">
            </div>

            <div class="clearfix"></div>

            <div class="form-group col-xs-3"><!-- title selection -->

                <label>Gender</label>

                <select name="gender" id="gender" class="form-control select">

                    <option value="">Select Gender</option>

                    <option <?php echo ($gender == 'Male') ? 'selected="selected"' : ''; ?>>Male</option>

                    <option <?php echo ($gender == 'Female') ? 'selected="selected"' : ''; ?>>Female</option>

                </select>

            </div>

            <div class="form-group col-xs-4">

                <label>Shirt Size</label>

                <select name="shirt_size" id="shirt-size" class="form-control select">
                    <option value="">Select shirt size</option>
                    <option <?php echo ($shirt_size == 'S') ? 'selected="selected"' : ''; ?>>S</option>
                    <option <?php echo ($shirt_size == 'M') ? 'selected="selected"' : ''; ?>>M</option>
                    <option <?php echo ($shirt_size == 'L') ? 'selected="selected"' : ''; ?>>L</option>
                    <option <?php echo ($shirt_size == 'XL') ? 'selected="selected"' : ''; ?>>XL</option>
                    <option <?php echo ($shirt_size == 'XXL') ? 'selected="selected"' : ''; ?>>XXL</option>
                </select>

            </div>

            <div class="form-group col-xs-3"><!-- country selection -->

                <label>Country of Birth</label>
                <select name="birth_country" id="birth_country" class="form-control select">
                    <option value="0">Select Country</option>
                    <?php 
                        if(is_array($countries) && !empty($countries)){
                            foreach ($countries as $key => $cntry) {
                                if($cntry->id == $birth_country) $selected = 'selected';
                                else $selected = '';
                                echo '<option '.$selected.' value="'.$cntry->id.'">'.$cntry->name.'</option>';
                            }
                        }
                    ?> 
                </select>


            </div>

            <div class="clearfix"></div>

            <hr>

           <strong class="help-block">Contact Information</strong>

            <div class="form-group col-xs-12">

                <div class="form-inline"><!-- contact information fields -->

                    <label>Home</label>

                    <input type="text" value="<?=$home?>" name="home_phone" id="home-phone" data-format="ddddddddddddddd" class="form-control left15 right10 input-medium bfh-phone">

                    <label>Work</label>

                    <input type="text" value="<?=$work?>" name="work_phone" id="work-phone" data-format="ddddddddddddddd" class="form-control right10 input-medium bfh-phone">

                    <label>Cell</label>

                    <input type="text" value="<?=$cell?>" name="cell_phone" id="cell-phone" data-format="ddddddddddddddd" class="form-control input-medium bfh-phone">

                    <br>

                    <span class="help-block">Include area code in contact numbers</span> </div>

            </div>

            <div class="clearfix"></div>

            <div class="form-group col-xs-3"><!-- email Street Address 1 field -->
                <label>E-mail</label>
                <input type="email" value="<?=$email?>" name="email" id="email" placeholder="" class="form-control" >

            </div>

            <div class="form-group col-xs-3"><!-- email Street Address 2 field -->
                <label>Alternate E-mail</label>
                <input type="email" value="<?=$alt_email?>" name="alt_email" id="alt-email" placeholder="" class="form-control">

            </div>

            <div class="clearfix"></div>

            <hr>

            <strong class="help-block">Address</strong>

            <div class="form-group col-xs-3"><!-- country selection -->

                <label>Country</label>
                <select name="country" id="country" class="form-control select address-check">
                    <option value="0">Select Country</option>
                    <?php 
                        if(is_array($countries) && !empty($countries)){
                            foreach ($countries as $key => $cntry) { 
                                if($cntry->id == $country) $selected = 'selected';
                                else $selected = '';
                                echo '<option '.$selected.' value="'.$cntry->id.'">'.$cntry->name.'</option>';
                            }
                        }
                    ?> 
                </select>


            </div>


            <div class="form-group col-xs-7"><!-- Street Address 1 field -->

                <label>Street Address</label>

                <input type="text" value="<?=$st_1address?>" name="st_1address" id="st-1address" placeholder="" class="form-control">

            </div>

            <!--     <div class="form-group col-xs-7">

                <label>Street Address 2</label>

                <input type="text" value="<?=$st_2address?>" name="st_2address" id="st-2address" placeholder="Street Street Address 2" class="form-control">

            </div> 
            <div class="clearfix"></div>-->


            <div class="form-group col-xs-3" id="address-info"><!-- city field -->

                <label class="address-lbl">City/State</label>

                <input type="text" value="<?=$city?>" name="city" id="city" placeholder="" class="form-control address-info">

            </div>
            <!-- 
            <div class="form-group col-xs-3">

                <label>State/Parish</label>

                <input type="text" value="<?=$state?>" name="state" id="state" placeholder="State/Providence/Parish" class="form-control">

            </div>

            <div class="clearfix"></div> -->

            <div class="form-group col-xs-3 zip_address"><!-- zip code field -->

                <label>Zip</label>

                <input type="text" value="<?=$addressZip?>" name="zip" id="zip" placeholder="" class="form-control">

            </div>

            <div class="form-group col-xs-4">

                <label>Are you traveling with a companion</label>

                <select onchange="yesnoCheck(this);" class="form-control select" name="companion" id="noGuest">

                    <option <?= ($guest === 'No')?'selected="selected"':''; ?>value="No">No</option>

                    <option <?= ($guest === 'Yes')?'selected="selected"':''; ?>value="Yes">Yes</option>


                </select>

            </div>
        </div>
        <div style="display: none;" class="info-wrap" id="guest-info">

            <div class="clearfix"></div>

            <hr>

            <h3>Guest Information</h3>

            <strong class="help-block">Personal Information</strong>

            <div class="form-group col-xs-3"><!-- title selection -->

                <label>Title</label>

                <select name="title_name_g" id="title-name-g" class="form-control select">

                    <option value=""></option>

                    <option <?php echo ($title_g == 'Mr') ? 'selected="selected"' : ''; ?>>Mr</option>

                    <option <?php echo ($title_g == 'Mrs') ? 'selected="selected"' : ''; ?>>Mrs</option>

                    <option <?php echo ($title_g == 'Ms') ? 'selected="selected"' : ''; ?>>Ms</option>

                    <option <?php echo ($title_g == 'Dr') ? 'selected="selected"' : ''; ?>>Dr</option>

                </select>

            </div>

            <div class="form-group col-xs-4">

                <label>First Name, as per passport being used</label>

                <input type="text" value="<?=$guestFirstName?>" name="first_name_g" id="first-name-g" placeholder="" class="form-control right10">

            </div>

            <div class="form-group col-xs-4">

                <label>Last Name, as per passport being used</label>

                <input type="text" value="<?=$guestLastName?>" name="last_name_g" id="last-name-g" placeholder="" class="form-control left10">
            </div>

            <div class="clearfix"></div>

            <!-- start dob -->
            <strong class="help-block">Date Of Birth</strong>
            <div class="form-group col-xs-2"><!-- dob month selection -->

                <label>Month</label>

                <select name="dob_month_g" id="dob-month_g" class="form-control select">

                    <option value=""></option>
                    <option <?= (isset($dob_month_g) && $dob_month_g === "01")?"selected='selected'":""; ?>value="01">January</option>
                    <option <?= (isset($dob_month_g) && $dob_month_g === "02")?"selected='selected'":""; ?>value="02">February</option>
                    <option <?= (isset($dob_month_g) && $dob_month_g === "03")?"selected='selected'":""; ?>value="03">March</option>
                    <option <?= (isset($dob_month_g) && $dob_month_g === "04")?"selected='selected'":""; ?>value="04">April</option>
                    <option <?= (isset($dob_month_g) && $dob_month_g === "05")?"selected='selected'":""; ?>value="05">May</option>
                    <option <?= (isset($dob_month_g) && $dob_month_g === "06")?"selected='selected'":""; ?>value="06">June</option>
                    <option <?= (isset($dob_month_g) && $dob_month_g === "07")?"selected='selected'":""; ?>value="07">July</option>
                    <option <?= (isset($dob_month_g) && $dob_month_g === "08")?"selected='selected'":""; ?>value="08">August</option>
                    <option <?= (isset($dob_month_g) && $dob_month_g === "09")?"selected='selected'":""; ?>value="09">September</option>
                    <option <?= (isset($dob_month_g) && $dob_month_g === "10")?"selected='selected'":""; ?>value="10">October</option>
                    <option <?= (isset($dob_month_g) && $dob_month_g === "11")?"selected='selected'":""; ?>value="11">November</option>
                    <option <?= (isset($dob_month_g) && $dob_month_g === "12")?"selected='selected'":""; ?>value="12">December</option>

                </select>

            </div>

            <div class="form-group col-xs-2"><!-- dob month selection -->

                <label>Date</label>

                <select name="dob_date_g" id="dob-date_g" class="form-control select">

                    <option></option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "01")?"selected='selected'":"";?>>01</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "02")?"selected='selected'":"";?>>02</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "03")?"selected='selected'":"";?>>03</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "04")?"selected='selected'":"";?>>04</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "05")?"selected='selected'":"";?>>05</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "06")?"selected='selected'":"";?>>06</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "07")?"selected='selected'":"";?>>07</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "08")?"selected='selected'":"";?>>08</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "09")?"selected='selected'":"";?>>09</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "10")?"selected='selected'":"";?>>10</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "11")?"selected='selected'":"";?>>11</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "12")?"selected='selected'":"";?>>12</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "13")?"selected='selected'":"";?>>13</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "14")?"selected='selected'":"";?>>14</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "15")?"selected='selected'":"";?>>15</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "16")?"selected='selected'":"";?>>16</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "17")?"selected='selected'":"";?>>17</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "18")?"selected='selected'":"";?>>18</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "19")?"selected='selected'":"";?>>19</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "20")?"selected='selected'":"";?>>20</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "21")?"selected='selected'":"";?>>21</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "22")?"selected='selected'":"";?>>22</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "23")?"selected='selected'":"";?>>23</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "24")?"selected='selected'":"";?>>24</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "25")?"selected='selected'":"";?>>25</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "26")?"selected='selected'":"";?>>26</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "27")?"selected='selected'":"";?>>27</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "28")?"selected='selected'":"";?>>28</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "29")?"selected='selected'":"";?>>29</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "30")?"selected='selected'":"";?>>30</option>
                    <option <?=(isset($dob_day_g) && $dob_day_g === "31")?"selected='selected'":"";?>>31</option>

                </select>

            </div>

            <div class="form-group col-xs-2"><!-- dob month selection -->

                <label>Year</label>

                <select name="dob_year_g" id="dob-year_g" class="form-control select">
                    <option value=""></option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "2000" ))?'selected="selected"':"" ?> value="2000">2000</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1999" ))?'selected="selected"':"" ?> value="1999">1999</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1998" ))?'selected="selected"':"" ?> value="1998">1998</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1997" ))?'selected="selected"':"" ?> value="1997">1997</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1996" ))?'selected="selected"':"" ?> value="1996">1996</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1995" ))?'selected="selected"':"" ?> value="1995">1995</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1994" ))?'selected="selected"':"" ?> value="1994">1994</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1993" ))?'selected="selected"':"" ?> value="1993">1993</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1992" ))?'selected="selected"':"" ?> value="1992">1992</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1991" ))?'selected="selected"':"" ?> value="1991">1991</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1990" ))?'selected="selected"':"" ?> value="1990">1990</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1989" ))?'selected="selected"':"" ?> value="1989">1989</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1988" ))?'selected="selected"':"" ?> value="1988">1988</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1987" ))?'selected="selected"':"" ?> value="1987">1987</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1986" ))?'selected="selected"':"" ?> value="1986">1986</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1985" ))?'selected="selected"':"" ?> value="1985">1985</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1984" ))?'selected="selected"':"" ?> value="1984">1984</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1983" ))?'selected="selected"':"" ?> value="1983">1983</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1982" ))?'selected="selected"':"" ?> value="1982">1982</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1981" ))?'selected="selected"':"" ?> value="1981">1981</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1980" ))?'selected="selected"':"" ?> value="1980">1980</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1979" ))?'selected="selected"':"" ?> value="1979">1979</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1978" ))?'selected="selected"':"" ?> value="1978">1978</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1977" ))?'selected="selected"':"" ?> value="1977">1977</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1976" ))?'selected="selected"':"" ?> value="1976">1976</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1975" ))?'selected="selected"':"" ?> value="1975">1975</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1974" ))?'selected="selected"':"" ?> value="1974">1974</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1973" ))?'selected="selected"':"" ?> value="1973">1973</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1972" ))?'selected="selected"':"" ?> value="1972">1972</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1971" ))?'selected="selected"':"" ?> value="1971">1971</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1970" ))?'selected="selected"':"" ?> value="1970">1970</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1969" ))?'selected="selected"':"" ?> value="1969">1969</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1968" ))?'selected="selected"':"" ?> value="1968">1968</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1967" ))?'selected="selected"':"" ?> value="1967">1967</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1966" ))?'selected="selected"':"" ?> value="1966">1966</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1965" ))?'selected="selected"':"" ?> value="1965">1965</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1964" ))?'selected="selected"':"" ?> value="1964">1964</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1963" ))?'selected="selected"':"" ?> value="1963">1963</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1962" ))?'selected="selected"':"" ?> value="1962">1962</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1961" ))?'selected="selected"':"" ?> value="1961">1961</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1960" ))?'selected="selected"':"" ?> value="1960">1960</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1959" ))?'selected="selected"':"" ?> value="1959">1959</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1958" ))?'selected="selected"':"" ?> value="1958">1958</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1957" ))?'selected="selected"':"" ?> value="1957">1957</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1956" ))?'selected="selected"':"" ?> value="1956">1956</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1955" ))?'selected="selected"':"" ?> value="1955">1955</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1954" ))?'selected="selected"':"" ?> value="1954">1954</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1953" ))?'selected="selected"':"" ?> value="1953">1953</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1952" ))?'selected="selected"':"" ?> value="1952">1952</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1951" ))?'selected="selected"':"" ?> value="1951">1951</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1950" ))?'selected="selected"':"" ?> value="1950">1950</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1949" ))?'selected="selected"':"" ?> value="1949">1949</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1948" ))?'selected="selected"':"" ?> value="1948">1948</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1947" ))?'selected="selected"':"" ?> value="1947">1947</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1946" ))?'selected="selected"':"" ?> value="1946">1946</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1945" ))?'selected="selected"':"" ?> value="1945">1945</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1944" ))?'selected="selected"':"" ?> value="1944">1944</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1943" ))?'selected="selected"':"" ?> value="1943">1943</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1942" ))?'selected="selected"':"" ?> value="1942">1942</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1941" ))?'selected="selected"':"" ?> value="1941">1941</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1940" ))?'selected="selected"':"" ?> value="1940">1940</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1939" ))?'selected="selected"':"" ?> value="1939">1939</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1938" ))?'selected="selected"':"" ?> value="1938">1938</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1937" ))?'selected="selected"':"" ?> value="1937">1937</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1936" ))?'selected="selected"':"" ?> value="1936">1936</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1935" ))?'selected="selected"':"" ?> value="1935">1935</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1934" ))?'selected="selected"':"" ?> value="1934">1934</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1933" ))?'selected="selected"':"" ?> value="1933">1933</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1932" ))?'selected="selected"':"" ?> value="1932">1932</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1931" ))?'selected="selected"':"" ?> value="1931">1931</option>
                    <option <?= (isset($dob_year_g) && ($dob_year_g === "1930" ))?'selected="selected"':"" ?> value="1930">1930</option>
                </select>
            </div>

            <div class="clearfix"></div>

            <!-- end dob -->
            <strong class="help-block">Please enter your preferred first and last name as you wish it to appear on your name badge</strong>
            <div class="form-group col-xs-4"><!-- Name badge field 1 -->

                <label>Name Badge: First Name</label>

                <input type="text" value="<?=$name_badge_g?>" name="name_badge_g" id="name-badge-g" placeholder="" class="form-control">
            </div>

            <div class="form-group col-xs-4"><!-- Name badge field 2 -->

                <label>Name Badge: Last Name</label>

                <input type="text" value="<?=$name_badge_last_g?>" name="name_badge_last_g" id="name-badge-last-g" placeholder="" class="form-control">
            </div>

            <div class="clearfix"></div>

            <div class="form-group col-xs-3"><!-- title selection -->

                <label>Gender</label>

                <select name="gender_g" id="gender-g" class="form-control select">

                    <option value="">Select Gender</option>
                    <option <?php echo ($gender_g == 'Male') ? 'selected="selected"' : ''; ?>>Male</option>
                    <option <?php echo ($gender_g == 'Female') ? 'selected="selected"' : ''; ?>>Female</option>

                </select>

            </div>

            <div class="form-group col-xs-4">

                <label>Shirt Size</label>

                <select name="shirt_size_g" id="shirt-size-g" class="form-control select">
                    <option value="">Select shirt size</option>
                    <option <?php echo ($shirt_size_g == 'S') ? 'selected="selected"' : ''; ?>>S</option>
                    <option <?php echo ($shirt_size_g == 'M') ? 'selected="selected"' : ''; ?>>M</option>
                    <option <?php echo ($shirt_size_g == 'L') ? 'selected="selected"' : ''; ?>>L</option>
                    <option <?php echo ($shirt_size_g == 'XL') ? 'selected="selected"' : ''; ?>>XL</option>
                    <option <?php echo ($shirt_size_g == 'XXL') ? 'selected="selected"' : ''; ?>>XXL</option>
                </select>

            </div>

            <div class="form-group col-xs-3"><!-- country selection -->

                <label>Country of Birth</label>

                <select name="birth_country_g" id="birth-country_g" class="form-control select">
                <option value="0">Select Country</option>
                <?php 
                    if(is_array($countries) && !empty($countries)){
                        foreach ($countries as $key => $cntry) {
                            echo '<option value="'.$cntry->id.'">'.$cntry->name.'</option>';
                        }
                    }
                ?> 
                </select>

            </div>

            <div class="clearfix"></div>

            <hr>

            <strong class="help-block">Contact Information</strong>

            <div class="form-group col-xs-12">

                <div class="form-inline"><!-- contact information fields -->

                    <label>Home</label>

                    <input type="text" value="<?=$home_g?>" name="home_phone_g" id="home-phone-g" data-format="ddddddddddddddd" class="form-control left15 right10 input-medium bfh-phone">

                    <label>Work</label>

                    <input type="text" value="<?=$work_g?>" name="work_phone_g" id="work-phone-g" data-format="ddddddddddddddd" class="form-control right10 input-medium bfh-phone">

                    <label>Cell</label>

                    <input type="text" value="<?=$cell_g?>" name="cell_phone_g" id="cell-phone-g" data-format="ddddddddddddddd" class="form-control input-medium bfh-phone">

                    <br>

                    <span class="help-block">Include area code in contact numbers</span> </div>

            </div>

            <div class="clearfix"></div>

            <div class="form-group col-xs-3"><!-- email Street Address 1 field -->
                <label>E-mail</label>
                <input type="email" value="<?=$email_g?>" name="email_g" id="email-g" placeholder="" class="form-control">

            </div>

            <div class="form-group col-xs-3"><!-- email Street Address 2 field -->
                <label>Alternate E-mail</label>
                <input type="email" value="<?=$alt_email_g?>" name="alt_email_g" id="alt-email-g" placeholder="" class="form-control">

            </div>

            <div class="clearfix"></div>

            <hr>

            <strong class="help-block">Address</strong>

            <div class="form-group col-xs-3"><!-- country selection -->

                <label>Country</label>
                <select name="country_g" id="country_g" class="form-control select address-check">
                <option value="0">Select Country</option>
                <?php 
                    if(is_array($countries) && !empty($countries)){
                        foreach ($countries as $key => $cntry) {
                            echo '<option value="'.$cntry->id.'">'.$cntry->name.'</option>';
                        }
                    }
                ?> 
                </select>

            </div>


            <div class="form-group col-xs-7"><!-- Street Address 1 field -->

                <label>Street Address</label>

                <input type="text" value="<?=$st_1address_g?>" name="st_1address_g" id="st-1address-g" placeholder="" class="form-control">

            </div>

          <!--   <div class="form-group col-xs-7">

                <label>Street Address 2</label>

                <input type="text" value="<?=$st_2address_g?>" name="st_2address_g" id="st-2address-g" placeholder="Street Street Address 2" class="form-control">
            </div>
 -->
            <div class="clearfix"></div>

            <div id="address-info_g" class="form-group col-xs-3 "><!-- city field -->

                <label class="address-lbl">City/State</label>

                <input type="text" value="<?=$city_g?>" name="city_g" id="city-g" placeholder="" class="form-control address-info">

            </div>
<!-- 
            <div class="form-group col-xs-3">

                <label>State/parish</label>

                <input type="text" value="<?=$state_g?>" name="state_g" id="state-g" placeholder="State/Providence/Parish" class="form-control">

            </div> -->

            <div class="form-group col-xs-3 zip_address"><!-- zip code field -->

                <label>Zip</label>

                <input type="text" value="<?=$zip_g?>" name="zip_g" id="zip-g" placeholder="" class="form-control">

            </div>

        </div>

    </form></div>
<div class="clearfix"></div>
<div class="form-group left30">

    <div>

        <button type="submit" id="update" name="update" class="btn btn-success ">Next</button>

    </div>

</div>
<script type="text/javascript">
    $(function(){

        //check the value if guest is selected
        var hasCompanion = $("#noGuest");
        var guestBlock = $("#guest-info");
        if(hasCompanion.val() === 'Yes'){
            guestBlock.css('display','block');
        }

        hasCompanion.on("change",function(e){
            var val = $(this).val();
            if(val === 'Yes'){
                guestBlock.css('display','block');
            }else{
                guestBlock.css('display','none');
            }
        });


        //Update the Birth Country Dropdown of the Winner
        $('#birth-country option').each(function() {
            if(this.value == "<?php echo $birth_country; ?>"){
                $(this).prop('selected',true);
            }
        });

        //Update the Birth Country Dropdown of the companion
        $('#birth-country_g option').each(function() {
            if(this.value == "<?php echo $birth_country_g; ?>"){
                $(this).prop('selected',true);
            }
        });

        //Update Current Address Country
        $('#country option').each(function() {
            if(this.value == "<?php echo $country; ?>"){
                $(this).prop('selected',true);
            }
        });

        //Update Current Address Country for guest
        $('#country_g option').each(function() {
            if(this.value == "<?php echo $country_g; ?>"){
                $(this).prop('selected',true);
            }
        });


        $("#update").on("click",function(){
            $('#submitForm').submit();
        });

    });


    function yesnoCheck(guestSelect){

        console.log(guestSelect);

        if(guestSelect){

            guestOptionValue = document.getElementById("noGuest").value;

            if(guestOptionValue == guestSelect.value){

                document.getElementById("guest-info").style.display = "none";

            }

            else{

                document.getElementById("guest-info").style.display = "block";

            }

        }

        else{

            document.getElementById("guest-info").style.display = "block";

        }

    }

    // addres check 
    $(document).ready(function(e){
        $val = $('#country_g :selected').text();
        checkAddress($('#country_g'), $val);
        $val = $('#country :selected').text();
        checkAddress($('#country'), $val);
    });
    $(document).on('change','.address-check', function(e){
        $id = $(this).attr('id');
        $val = $('#'+$id+' :selected').text();
        checkAddress(this, $val);
    });

    function checkAddress(ele, $val){
        $parent = $(ele).parents('.info-wrap');
        switch($val){
            case 'Barbados':
                $parent.find('.address-lbl').html('Parish');
                $parent.find('.zip_address').hide(); break;
            case 'Antigua and Barbuda':
                $parent.find('.address-lbl').html('Village');
                $parent.find('.zip_address').hide(); break;
            case 'Trinidad and Tobago':
                $parent.find('.address-lbl').html('Town');
                $parent.find('.zip_address').hide(); break;
            case 'Jamaica':
                $parent.find('.address-lbl').html('Town');
                $parent.find('.zip_address').hide(); break;
            default: 
                $parent.find('.address-lbl').html('City');
                $parent.find('.zip_address').show(); break;
        } 
    }

</script>