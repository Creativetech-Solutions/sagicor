<?php
$userDetails = $page_data;

/*echo "<pre>";
print_r($userDetails);
echo "</pre>";*/
?>

<div class="wrap clearfix">

    <div id="content-wrap">

        <div id="content">

            <div id="msgholder"></div>

            <p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i> Here you can update your user info<br>
                Fields marked <i class="icon-append icon-asterisk"></i> are required.</p>
            <form method="post" id="admin_form" class="xform">
                <header>User Manager<span>Editing Current User <i class="icon-double-angle-right"></i> <?=isset($userDetails->Username)?$userDetails->Username:"" ?></span></header>
                <div class="row">
                    <section class="col col-6">
                        <label class="input state-disabled"> <i class="icon-prepend icon-user"></i> <i class="icon-append icon-asterisk"></i>
                            <input type="text" placeholder="Username" value="<?=isset($userDetails->Username)?$userDetails->Username:"" ?>" readonly="readonly" name="username" disabled="disabled">
                        </label>
                        <div class="note note-error">Username</div>
                    </section>
                    <section class="col col-6">
                        <label class="input"> <i class="icon-prepend icon-lock"></i> <i class="icon-append icon-asterisk"></i>
                            <input type="text" value="<?=isset($userDetails->Password)?$userDetails->Password:"" ?>" placeholder="password" name="password" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: pointer;">
                        </label>
                        <div class="note note-info">Leave it empty unless changing the password</div>
                    </section>
                </div>
                <div class="row">
                    <section class="col col-4">
                        <label class="input"> <i class="icon-prepend icon-envelope-alt"></i> <i class="icon-append icon-asterisk"></i>
                            <input type="text" placeholder="Email" value="<?=isset($userDetails->Email)?$userDetails->Email:"" ?>" name="email">
                        </label>
                        <div class="note note-error">Email</div>
                    </section>
                    <section class="col col-4">
                        <label class="input"> <i class="icon-prepend icon-user"></i>
                            <input type="text" placeholder="First Name" value="<?=isset($userDetails->FirstName)?$userDetails->FirstName:"" ?>" name="fname">
                        </label>
                        <div class="note note-error">First Name</div>
                    </section>
                    <section class="col col-4">
                        <label class="input"> <i class="icon-prepend icon-user"></i>
                            <input type="text" placeholder="Last Name" value="<?=isset($userDetails->LastName)?$userDetails->LastName:"" ?>" name="lname">
                        </label>
                        <div class="note note-error">Last Name</div>
                    </section>
                </div>
                <div class="row">
                    <section class="col col-4">
                        <select name="userlevel">
                                <option value="1" <?=(isset($userDetails->UserLevel) && $userDetails->UserLevel == 1)?'selected="selected"':"" ?>>Registered User</option>
                                <option value="9" <?=(isset($userDetails->UserLevel) && $userDetails->UserLevel == 9)?'selected="selected"':"" ?>>Super Admin</option>
                            </select>
                        <div class="note">Userlevel <i data-title="Userlevels 2-7 are custom groups, they have the same rights as registered users,but can access diferent pages based on their userlevel." class="icon-exclamation-sign  tooltip"></i></div>
                    </section>
                    <section class="col col-5">
                        <div class="inline-group">
                            <label class="radio">
                                <input type="radio" <?=(isset($userDetails->UserStatus) && $userDetails->UserStatus == "y")?'checked="checked"':"" ?> value="y" name="active">
                                <i></i>Active</label>
                            <label class="radio">
                                <input type="radio" <?=(isset($userDetails->UserStatus) && $userDetails->UserStatus == "n")?'checked="checked"':"" ?> value="n" name="active">
                                <i></i>Inactive</label>
                            <label class="radio">
                                <input type="radio" <?=(isset($userDetails->UserStatus) && $userDetails->UserStatus == "b")?'checked="checked"':"" ?> value="b" name="active">
                                <i></i>Banned</label>
                            <label class="radio">
                                <input type="radio" <?=(isset($userDetails->UserStatus) && $userDetails->UserStatus == "t")?'checked="checked"':"" ?> value="t" name="active">
                                <i></i>Pending</label>
                        </div>
                    </section>
                    <section class="col col-3">
                        <div class="inline-group">
                            <label class="checkbox">
                                <input type="checkbox" <?php echo ($userDetails->Club == 1) ? 'checked="checked"' : ''; ?> name="club">
                                <i></i>President's Club</label>
                            <label class="checkbox">
                                <input type="checkbox" <?php echo ($userDetails->CloseReg == 1) ? 'checked="checked"' : ''; ?> name="regclose">
                                <i></i>Close Registration</label>
                        </div>
                    </section>
                    <div hidden="">
                        <section hidden="" class="col col-3">
                            <div class="inline-group">
                                <label class="radio">
                                    <input type="radio" checked="checked" value="1" name="newsletter">
                                    <i></i>Yes</label>
                                <label class="radio">
                                    <input type="radio" value="0" name="newsletter">
                                    <i></i>No</label>
                            </div>
                            <div class="note">Newsletter Subscriber</div>
                        </section>
                    </div>
                </div>
                <div hidden="" class="row">
                    <section class="col col-4">
                        <label class="input">
                        
                            <div class="jstyling-file"><div class="jstyling-file-f"></div><div class="jstyling-file-b">Browse<input type="file" class="fileinput" name="avatar" style="height: 30px; font-size: 30px;"></div></div>
                        </label>
                        <div class="note">User Avatar</div>
                    </section>
                   <!--  <section class="col col-4"> <img class="avatar" title="" alt="" src="../thumbmaker.php?src=http://sagicorconvention.com/uploads/blank.png&amp;w=40&amp;h=40&amp;s=1&amp;a=t1"> </section> -->
                </div>
                <div class="row">
                    <section class="col col-4">
                        <label class="input"> <i class="icon-prepend icon-user"></i>
                            <input type="text" placeholder="Registration ID" value="<?=isset($userDetails->RegID) ? $userDetails->RegID : ''; ?>" name="reg_id">
                        </label>
                        <div class="note note-error">User Registration ID</div>
                    </section>
                    <section class="col col-4">
                        <label class="input"> <i class="icon-prepend icon-user"></i>
                            <input type="text" placeholder="Guest Registration ID" value="<?=isset($userDetails->GuestRegistrationID) ? $userDetails->GuestRegistrationID : ''; ?>" name="reg_idg">
                        </label>
                        <div class="note note-error">Guest Registration ID</div>
                    </section>
                </div>
                <div class="row">
                    <section class="col col-4">
                        <label class="input state-disabled"> <i class="icon-prepend icon-calendar"></i>
                            <input type="text" placeholder="Email" value="<?=isset($userDetails->RegistrationDate) ? $userDetails->RegistrationDate : ''; ?>" readonly="readonly" disabled="disabled" name="created">
                        </label>
                        <div class="note">Registration Date:</div>
                    </section>
                    <section class="col col-4">
                        <label class="input state-disabled"> <i class="icon-prepend icon-calendar"></i>
                            <input type="text" placeholder="First Name" value="<?=isset($userDetails->LastLogin) ? $userDetails->LastLogin : ''; ?>" readonly="readonly" disabled="disabled" name="lastlogin">
                        </label>
                        <div class="note">Last Login</div>
                    </section>
                    <section class="col col-4">
                        <label class="input state-disabled"> <i class="icon-prepend icon-laptop"></i>
                            <input type="text" placeholder="Last Name" value="<?=isset($userDetails->LastIP) ? $userDetails->LastIP : ''; ?>" readonly="readonly" disabled="disabled" name="lastip">
                        </label>
                        <div class="note">Last Login IP</div>
                    </section>
                </div>

                <div hidden="" class="row">
                    <hr>
                    <section class="col col-12">
                        <label class="textarea">
                            <textarea rows="3" placeholder="User Notes" name="notes"></textarea>
                        </label>
                        <div class="note note">User Notes - For internal use only.</div>
                    </section>
                </div>
                <footer>
                    <button type="submit" name="dosubmit" class="button">Update User Profile<span><i class="icon-ok"></i></span></button>
                    <a class="button button-secondary" href="<?=base_url()?>admin/users">Cancel</a> </footer>
                <input type="hidden" value="<?=isset($userDetails->Username)?$userDetails->Username:"" ?>" name="username">
                <input type="hidden" value="<?=$this->uri->segment(4);?>" name="id">
            </form>


            <script type="text/javascript">

                // &lt;![CDATA[

                $(document).ready(function () {

                    var options = {

                        target: "#msgholder",

                        beforeSubmit:  showLoader,

                        success: showResponse,

                        url: "<?=base_url()?>admin/users/update",

                        resetForm : 0,

                        clearForm : 0,

                        data: {

                            processUser: 1

                        }

                    };

                    $("#admin_form").ajaxForm(options);

                });

                function showResponse(msg) {

                    hideLoader();

                    $(this).html(msg);

                    $("html, body").animate({

                        scrollTop: 0

                    }, 600);

                }



                // ]]&gt;

            </script>
        </div>

    </div>

</div>