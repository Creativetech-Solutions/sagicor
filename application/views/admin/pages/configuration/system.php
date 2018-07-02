<?php
    $site_name = (isset($page_data) && isset($page_data->site_name))?$page_data->site_name:'';
    $site_email = (isset($page_data) && isset($page_data->site_name))?$page_data->site_email:'';
    $site_url = (isset($page_data) && isset($page_data->site_name))?$page_data->site_url:'';
    $reg_allowed = (isset($page_data) && isset($page_data->site_name))?$page_data->reg_allowed:'';
    $user_limit = (isset($page_data) && isset($page_data->site_name))?$page_data->user_limit:'';
    $reg_verify = (isset($page_data) && isset($page_data->site_name))?$page_data->reg_verify:'';
    $notify_admin = (isset($page_data) && isset($page_data->site_name))?$page_data->notify_admin:'';
    $auto_verify = (isset($page_data) && isset($page_data->site_name))?$page_data->auto_verify:'';
    $user_perpage = (isset($page_data) && isset($page_data->site_name))?$page_data->user_perpage:'';
    $thumb_w = (isset($page_data) && isset($page_data->site_name))?$page_data->thumb_w:'';
    $thumb_h = (isset($page_data) && isset($page_data->site_name))?$page_data->thumb_h:'';
    $logo = (isset($page_data) && isset($page_data->site_name))?$page_data->logo:'';
    $backup = (isset($page_data) && isset($page_data->site_name))?$page_data->backup:'';

    //Mailing Details.
    $mailer = (isset($page_data) && isset($page_data->site_name))?$page_data->mailer:'';
    $smtp_host = (isset($page_data) && isset($page_data->site_name))?$page_data->smtp_host:'';
    $smtp_user = (isset($page_data) && isset($page_data->site_name))?$page_data->smtp_user:'';
    $smtp_pass = (isset($page_data) && isset($page_data->site_name))?$page_data->smtp_pass:'';
    $smtp_port = (isset($page_data) && isset($page_data->site_name))?$page_data->smtp_port:'';
    $is_ssl = (isset($page_data) && isset($page_data->site_name))?$page_data->is_ssl:'';

?>

<div class="wrap clearfix">

    <div id="content-wrap">

        <div id="content">

            <div id="msgholder"></div>


            <p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i> Here you can update your system configuration<br>

                Fields marked <i class="icon-append icon-asterisk"></i> are required.</p>

            <form method="post" id="admin_form" class="xform">

                <header>System Configuration</header>

                <div class="row">

                    <section class="col col-4">

                        <label class="input"> <i class="icon-prepend icon-asterisk"></i> <i data-title="The name of your web site, which is displayed in various locations across your site,&lt;br /&gt;including email and newsletter notifications" class="icon-append icon-exclamation-sign  tooltip"></i>

                            <input type="text" placeholder="Website Name" value="<?=$site_name;?>" name="site_name" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">

                        </label>

                        <div class="note note-error">Website Name</div>

                    </section>

                    <section class="col col-4">

                        <label class="input"><i class="icon-prepend icon-asterisk"></i> <i class="icon-append icon-exclamation-sign  tooltip" data-title="Insert full URL WITHOUT any trailing slash  (e.g. http://www.yourdomain.com)"></i>

                            <input type="text" placeholder="Website Url" value="<?=$site_url;?>" name="site_url">

                        </label>

                        <div class="note note-error">Website Url</div>

                    </section>

                    <section class="col col-4">

                        <label class="input"><i class="icon-prepend icon-asterisk"></i> <i data-title="This is the main email notices will be sent to. It is also used as the from 'email'&lt;br /&gt;when emailing other automatic emails" class="icon-append icon-exclamation-sign  tooltip"></i>

                            <input type="text" placeholder="Website Email" value="<?=$site_email;?>" name="site_email">

                        </label>

                        <div class="note note-error">Website Email</div>

                    </section>

                </div>

                <div class="row">

                    <section class="col col-4">

                        <label class="input"> <i class="icon-prepend icon-asterisk"></i> <i data-title="Default number of items used for pagination" class="icon-append icon-exclamation-sign  tooltip"></i>

                            <input type="text" placeholder="Items Per Page" value="<?=$user_perpage;?>" name="user_perpage">

                        </label>

                        <div class="note note-error">Items Per Page</div>

                    </section>

                    <section class="col col-4">

                        <label class="input"><i class="icon-prepend icon-asterisk"></i> <i data-title="Default thumbnail width, in px used for resizing avatars" class="icon-append icon-exclamation-sign  tooltip"></i>

                            <input type="text" placeholder="Thumbnail Width" value="<?=$thumb_w;?>" name="thumb_w">

                        </label>

                        <div class="note note-error">Thumbnail Width</div>

                    </section>

                    <section class="col col-4">

                        <label class="input"><i class="icon-prepend icon-asterisk"></i> <i data-title="Default thumbnail height, in px used for resizing avatars" class="icon-append icon-exclamation-sign  tooltip"></i>

                            <input type="text" placeholder="Thumbnail Height" value="<?=$thumb_h;?>" name="thumb_h">

                        </label>

                        <div class="note note-error">Thumbnail Height</div>

                    </section>

                </div>

                <hr>

                <div class="row">

                    <section class="col col-3">

                        <div class="inline-group">

                            <label class="radio">

                                <input type="radio" <?=($reg_verify === '1')?'checked="checked"':'';?> value="1" name="reg_verify">

                                <i></i>Yes</label>

                            <label class="radio">

                                <input type="radio" <?=(intval($reg_verify) === 0)?'checked="checked"':'';?> value="0" name="reg_verify">

                                <i></i>No</label>

                        </div>

                        <div class="note">Registration Verification <i data-title="If Yes users will need to confirm their email address and go through activation process." class="icon-exclamation-sign  tooltip"></i> </div>

                    </section>

                    <section class="col col-3">

                        <div class="inline-group">

                            <label class="radio">

                                <input type="radio" <?=($auto_verify === '1')?'checked="checked"':'';?> value="1" name="auto_verify">

                                <i></i>Yes</label>

                            <label class="radio">

                                <input type="radio" <?=($auto_verify === '0')?'checked="checked"':'';?> value="0" name="auto_verify">

                                <i></i>No</label>
                        </div>

                        <div class="note">Auto Registration <i data-title="If Yes, once registration process is completed users will be able to login.&lt;br /&gt;If No Admin will need to manually activate each account." class="icon-exclamation-sign  tooltip"></i></div>

                    </section>

                    <section class="col col-3">

                        <div class="inline-group">

                            <label class="radio">

                                    <input type="radio" <?=($reg_allowed === '1')?'checked="checked"':'';?> value="1" name="reg_allowed">

                                <i></i>Yes</label>

                            <label class="radio">

                                    <input type="radio" <?=($reg_allowed === '0')?'checked="checked"':'';?> value="0" name="reg_allowed">

                                <i></i>No</label>

                        </div>

                        <div class="note">Allow Registration <i data-title="Enable/Disable User Registration." class="icon-exclamation-sign  tooltip"></i></div>

                    </section>

                    <section class="col col-3">
                        <div class="inline-group">
                            <label class="radio">
                                <input type="radio" <?=($notify_admin === '1')?'checked="checked"':'';?> value="1" name="notify_admin">
                                <i></i>Yes</label>
                            <label class="radio">
                                <input type="radio" <?=($notify_admin === '0')?'checked="checked"':'';?> value="0" name="notify_admin">
                                <i></i>No</label>
                        </div>

                        <div class="note">Registration Notification <i data-title="Receive notification upon each new user registration." class="icon-exclamation-sign  tooltip"></i></div>

                    </section>

                </div>

                <div class="row">

                    <section class="col col-2">

                        <label class="input"><i data-title="Limit number of users that are allowed to register 0 = Unlimited" class="icon-append icon-exclamation-sign  tooltip"></i>

                            <input type="text" placeholder="User Limit" value="0" name="user_limit">

                        </label>

                        <div class="note">User Limit</div>

                    </section>

                    <section class="col col-4">

                        <label class="input">

                            <input type="file" class="fileinput" name="logo" style="height: 30px; font-size: 30px;">

                        </label>

                        <div class="note">Company Logo</div>

                    </section>

                    <section class="col col-6">

                        <div class="inline-group">

                            <label class="checkbox">

                                <input type="checkbox" class="checkbox" value="1" name="dellogo">

                                <i></i>Delete Logo</label>

                        </div>

                        <div class="note">If no logo exists, Site Name will be used instead.</div>

                    </section>

                </div>

                <hr>

                <header>Default Mailer</header>

                <div class="row">

                    <section class="col col-6">

                        <select id="mailerchange" name="mailer" style="display: none;">

                                <option <?=(($mailer === "PHP")? "selected='selected'":''); ?> value="PHP">PHP Mailer</option>

                                <option <?=(($mailer === "SMTP")? "selected='selected'":''); ?> value="SMTP">SMTP Mailer</option>

                        </select>


                        <div class="note">Use PHP Mailer or SMTP protocol for sending emails</div>

                    </section>

                </div>

                <div class="row showsmtp" style="display: none;">

                    <section class="col col-4">

                        <label class="input"> <i class="icon-prepend icon-asterisk"></i> <i data-title="Specify main SMTP server. E.g.:(mail.yourserver.com)" class="icon-append icon-exclamation-sign  tooltip"></i>

                            <input type="text" placeholder="SMTP Hostname" value="<?=$smtp_host?>" name="smtp_host">

                        </label>

                        <div class="note note">SMTP Hostname</div>

                    </section>

                    <section class="col col-4">

                        <label class="input"> <i class="icon-prepend icon-asterisk"></i>

                            <input type="text" placeholder="SMTP Username" value="<?=$smtp_user?>" name="smtp_user">

                        </label>

                        <div class="note">SMTP Username</div>

                    </section>

                    <section class="col col-4">

                        <label class="input"> <i class="icon-prepend icon-asterisk"></i>

                            <input type="text" placeholder="SMTP Password" value="<?=$smtp_pass?>" name="smtp_pass">

                        </label>

                        <div class="note">SMTP Password</div>

                    </section>

                </div>

                <div class="row showsmtp" style="display: none;">

                    <section class="col col-4">

                        <div class="inline-group">

                            <label class="label">Requires SSL</label>

                            <label class="radio">

                                <input type="radio" <?=($is_ssl === 1)?'checked="checked"':''; ?> value="1" name="is_ssl">

                                <i></i>Yes</label>

                            <label class="radio">

                                <input type="radio" <?=($is_ssl === 0)?'checked="checked"':''; ?> value="0" name="is_ssl">

                                <i></i>No</label>

                        </div>

                        <div class="note">Choose Yes if your server requires SSL connection</div>

                    </section>

                    <section class="col col-4">

                        <label class="input"> <i class="icon-prepend icon-asterisk"></i> <i data-title="Mail server port ( Can be 25, 26. 456 for GMAIL. 587 for Yahoo ). Ask your host if uncertain." class="icon-append icon-exclamation-sign  tooltip"></i>

                            <input type="text" placeholder="SMTP Port" value="465" name="smtp_port">

                        </label>

                        <div class="note">SMTP Port</div>

                    </section>

                </div>

                <footer>

                    <button type="submit" name="dosubmit" class="button">Update Configuration<span><i class="icon-ok"></i></span></button>

                </footer>

            </form>



            <script type="text/javascript">

                // &lt;![CDATA[

                $(document).ready(function () {

                    var options = {

                        target: "#msgholder",

                        beforeSubmit:  showLoader,

                        success: showResponse,

                        url: "<?=base_url();?>admin/configuration/update_sys",

                        resetForm : 0,

                        clearForm : 0,

                        data: {

                            processConfig: 1

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

            <script type="text/javascript">

                // &lt;![CDATA[

                $(document).ready(function () {

                    var res2 = 'PHP';

                    (res2 == "SMTP" ) ? $('.showsmtp').show() : $('.showsmtp').hide();

                    $('#mailerchange').change(function () {

                        var res = $("#mailerchange option:selected").val();

                        (res == "SMTP" ) ? $('.showsmtp').show() : $('.showsmtp').hide();

                    });



                });

                // ]]&gt;

            </script>
        </div>
    </div>

</div>