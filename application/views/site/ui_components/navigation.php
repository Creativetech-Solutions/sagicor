<nav>

    <ul class="nav nav-pills pull-right" style="margin-top: 10px;">

        <!-- Start Convention dropdown -->

        <li role="presentation">

            <div class="dropdown">

                <button class="btn btn-<?=((strtolower($this->router->fetch_class()).'/'.strtolower($this->router->fetch_method())==='home/index') || (strtolower($this->router->fetch_class()).'/'.strtolower($this->router->fetch_method())==='home/club_rules') || (strtolower($this->router->fetch_class()).'/'.strtolower($this->router->fetch_method())==='home/qualifiers') )?'info':'default'; ?> dropdown-toggle" type="button" id="dropdownConvention" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                    Convention <span class="caret"></span>

                </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownConvention">

                    <li role="presentation"><a href="<?= base_url(); ?>">Welcome</a></li>

                    <li role="presentation"><a href="<?= base_url(); ?>home/club_rules">Club Rules</a></li>

                    <li role="presentation"><a href="<?= base_url(); ?>home/qualifiers">Qualifiers</a></li>

                </ul>

            </div>

        </li>

        <!-- end Convention dropdown -->

        <!-- Start The Hotel dropdown -->

        <li role="presentation">

            <div class="dropdown">

                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownTheHotel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                    The Hotel <span class="caret"></span>

                </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownTheHotel">

                    <li role="presentation"><a href="<?= base_url(); ?>hotel/intro">Hotel Arts</a></li>

                    <!-- Start submenu dropdown -->

                    <li role="presentation" class="dropdown-submenu"><a href="#">Hotel Arts Amenities</a>

                        <ul class="dropdown-menu">

                            <li><a tabindex="-1" href="<?= base_url(); ?>hotel/hotel_facts_rooms">Rooms &amp; Amenities</a></li>

                            <li role="presentation"><a href="<?= base_url(); ?>hotel/hotel_facts_dining">Dining (Restaurants &amp; Lounges)</a></li>

                            <li role="presentation"><a href="<?= base_url(); ?>hotel/hotel_facts_recreation">Recreation Facilities</a></li>

                        </ul>

                    </li>

                    <!-- end submenu dropdown -->

                </ul>

            </div>

        </li>

        <!-- end The Hotel dropdown -->

        <!-- Start Destination dropdown -->

        <li role="presentation">

            <div class="dropdown">

                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownDestination" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                    The Destination <span class="caret"></span>

                </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownDestination">

                    <li role="presentation" class="active"><a href="<?= base_url(); ?>destination/fun_facts">Barcelona Fun Facts</a></li>

                    <li role="presentation"><a href="<?= base_url(); ?>destination/about_barcelona">About Barcelona</a></li>

                    <li role="presentation"><a href="<?= base_url(); ?>destination/weather">Weather</a></li>

                </ul>

            </div>

        </li>

        <!-- end Destination dropdown -->

        <!-- Start Itinerary dropdown -->

        <li role="presentation">

            <div class="dropdown">

                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownItinerary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                    Itinerary <span class="caret"></span>

                </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownItinerary">

                    <li role="presentation"><a href="<?= base_url();?>itinerary/pacesetter_club">PaceSetter's Club</a></li>

                    <li role="presentation"><a href="<?= base_url();?>itinerary/president_club">President's Club</a></li>

                </ul>

            </div>

        </li>

        <!-- end Itinerary dropdown -->

        <li role="presentation">
            <!-- <a class="activity btn btn-default" href="activities.php">
               Activities <span class="caret"></span>
             </a>-->
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownActivities" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Activities <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownActivities">
                <li role="presentation"><a href="<?= base_url();?>activities/activity_descriptions">Activity Descriptions</a></li>
                <li role="presentation"><a href="<?= base_url();?>activities/activities">Activity Registration</a></li>
            </ul>
            <!--<a href="activities.php">Activities</a>-->
        </li>

        <!-- Start Travel dropdown -->

        <li role="presentation">

            <div class="dropdown">

                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownTravel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                    Travel <span class="caret"></span>

                </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownTravel">

                    <li role="presentation"><a href="<?= base_url();?>travel/info">Travel Info</a></li>

                    <li role="presentation"><a href="<?= base_url();?>travel/docs">Travel Documents</a></li>

                </ul>

            </div>

        </li>

        <!-- end Travel dropdown -->

        <!-- Start FAQs dropdown -->

        <li role="presentation">

            <div class="dropdown">

                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownFAQ" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                    FAQs <span class="caret"></span>

                </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownFAQ">

                    <li role="presentation"><a href="<?= base_url();?>faqs/faq#travel" rel="" id="faq1">Travel</a></li>

                    <li role="presentation"><a href="<?= base_url();?>faqs/faq#hotel" rel="" id="faq2">Hotel</a></li>

                    <li role="presentation"><a href="<?= base_url();?>faqs/faq#programme" rel="" id="faq3">Programme</a></li>

                    <li role="presentation"><a href="<?= base_url();?>faqs/faq#electricity" rel="" id="faq4">Electricity/Voltage</a></li>

                    <li role="presentation"><a href="<?= base_url();?>faqs/faq#currency" rel="" id="faq5">Currency</a></li>

                    <li role="presentation"><a href="<?= base_url();?>faqs/faq#taxes" rel="" id="faq6">Taxes &amp; refunds</a></li>

                    <li role="presentation"><a href="<?= base_url();?>faqs/faq#general" rel="" id="faq7">General</a></li>

                </ul>

            </div>

        </li>

        <!-- end FAQs dropdown -->

        <li role="presentation"><a href="<?= base_url();?>contact">Contact Us</a></li>

        <li role="presentation" style="display:none;"><a href="register.php?fname=Nicole&lname=Moody">Registration</a></li>

        <?php
            if(isset($this->data['loggedinuser']) && intval($this->data['loggedinuser']->userlevel) === 1){
                echo '<li style="display:block;" role="presentation"><a href="'.base_url().'registration/register">Registration</a></li>';
            }
        ?>


    </ul>

</nav>