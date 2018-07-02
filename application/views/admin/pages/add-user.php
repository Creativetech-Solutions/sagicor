<div class="wrap clearfix">

    <div id="content-wrap">

        <div id="content">

            <div id="msgholder"></div>

            <p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i> Here you can add new user<br>
                Fields marked <i class="icon-append icon-asterisk"></i> are required.</p>
            <form class="xform" id="admin_form" method="post">
                <header>User Manager<span>Adding New User</span></header>
                <div class="row">
                    <section class="col col-6">
                        <label class="input"> <i class="icon-prepend icon-user"></i> <i class="icon-append icon-asterisk"></i>
                            <input type="text" name="username" placeholder="Username">
                        </label>
                        <div class="note note-error">Username *</div>
                    </section>
                    <section class="col col-6">
                        <label class="input"> <i class="icon-prepend icon-lock"></i> <i class="icon-append icon-asterisk"></i>
                            <input type="text" name="password" placeholder="password">
                        </label>
                        <div class="note note-error">Password *</div>
                    </section>
                </div>
                <div class="row">
                    <section class="col col-4">
                        <label class="input"> <i class="icon-prepend icon-envelope-alt"></i> <i class="icon-append icon-asterisk"></i>
                            <input type="text" name="email" placeholder="Email">
                        </label>
                        <div class="note note-error">Email *</div>
                    </section>
                    <section class="col col-4">
                        <label class="input"> <i class="icon-prepend icon-user"></i>
                            <input type="text" name="fname" placeholder="First Name">
                        </label>
                        <div class="note note-error">First Name *</div>
                    </section>
                    <section class="col col-4">
                        <label class="input"> <i class="icon-prepend icon-user"></i>
                            <input type="text" name="lname" placeholder="Last Name">
                        </label>
                        <div class="note note-error">Last Name *</div>
                    </section>
                </div>
                <hr>
                <div class="row">
                    <section class="col col-4">
                        <select name="userlevel">
                            <option value="9">Super Admin</option>
                            <option value="1">Registered User</option>
                        </select>
                        <div class="note">Userlevel <i class="icon-exclamation-sign  tooltip" data-title="Userlevels 2-7 have the same rights as registered users,but can access diferent pages based on their userlevel."></i></div>
                    </section>
                    <section class="col col-5">
                        <div class="inline-group">
                            <label class="radio">
                                <input name="active" type="radio" value="y" checked="checked" >
                                <i></i>Active</label>
                            <label class="radio">
                                <input type="radio" name="active" value="n" >
                                <i></i>Inactive</label>
                            <label class="radio">
                                <input type="radio" name="active" value="b" >
                                <i></i>Banned</label>
                            <label class="radio">
                                <input type="radio" name="active" value="t">
                                <i></i>Pending</label>
                        </div>
                        <div class="note">User Status</div>
                    </section>
                    <section class="col col-3">
                        <div class="inline-group">
                            <label class="radio">
                                <input name="newsletter" type="radio" value="1" checked="checked">
                                <i></i>Yes</label>
                            <label class="radio">
                                <input type="radio" name="newsletter" value="0" >
                                <i></i>No</label>
                        </div>
                        <div class="note">Newsletter Subscriber</div>
                    </section>
                </div>
                <div class="row">
                    <section class="col col-4">
                        <label class="input">
                            <input name="avatar" type="file" class="fileinput"/>
                        </label>
                        <div class="note">User Avatar</div>
                    </section>
                    <section class="col col-3">
                        <label class="checkbox">
                            <input type="checkbox" name="notify" value="1">
                            <i></i>Notify User</label>
                        <div class="note note-info">Send welcome email to this user</div>
                    </section>
                    <section class="col col-3">
                        <div class="inline-group">
                            <label class="checkbox">
                                <input type="checkbox" name="club">
                                <i></i>President's Club</label>
                        </div>
                    </section>
                </div>
                <div class="row">
                    <section class="col col-4">
                        <label class="input"> <i class="icon-prepend icon-user"></i>
                            <input type="text" placeholder="Registration ID" name="reg_id">
                        </label>
                        <div class="note note-error">User Registration ID</div>
                    </section>
                    <section class="col col-4">
                        <label class="input"> <i class="icon-prepend icon-user"></i>
                            <input type="text" placeholder="Guest Registration ID" name="reg_idg">
                        </label>
                        <div class="note note-error">Guest Registration ID</div>
                    </section>
                </div>
                <div class="row">
                    <section class="col col-12">
                        <label class="textarea">
                            <textarea name="notes" placeholder="User Notes" rows="3"></textarea>
                        </label>
                        <div class="note note">User Notes - For internal use only.</div>
                    </section>
                </div>
                <footer>
                    <button class="button" name="dosubmit" type="submit">Add User<span><i class="icon-ok"></i></span></button>
                    <a href="index.php?do=users" class="button button-secondary">Cancel</a> </footer>
            </form>


            <script type="text/javascript">

                // <![CDATA[

                $(document).ready(function () {

                    var options = {

                        target: "#msgholder",

                        beforeSubmit:  showLoader,

                        success: showResponse,

                        url: "<?=base_url()?>admin/users/add",

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



                // ]]>

            </script>
        </div>

    </div>

</div>