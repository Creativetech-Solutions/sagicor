<?php //echo "<pre> userrow = "; print_r($userrow); echo "<pre>";  ?>

<p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i>Here you can manage your users. <br />
    You can email each user by clicking on username. You can also activate each user account by clicking on <i class="icon-adjust"></i> icon</p>


<section class="widget">
    <header>
        <div class="row">
            <h1><i class="icon-reorder"></i> Viewing Users</h1>
            <aside> <a class="hint--left hint--add hint--always hint--rounded" data-hint="Add User" href="<?=base_url();?>admin/users/add"><span class="icon-plus"></span></a><a class="hint--left hint--add hint--always hint--rounded" data-hint="Sort Users" href="index.php?do=sort"><span class="icon-sort-by-attributes"></span></a></aside>
        </div>
    </header>
    <div class="content2">
        <div class="row">
            <div class="ptop30">
                <form class="xform" id="dForm" method="post" style="padding:0;">
                    <section class="col col-6">
                        <select name="select" id="userfilter">
                            <option value="NA">--- Reset User Filter ---</option>
                        </select>
                    </section>
                    <div class="hr2"></div>
                    <section class="col col-4">
                        <label class="input"> <i class="icon-prepend icon-search"></i>
                            <input type="text" name="serachuser"  id="search-input" placeholder="Search User">
                        </label>
                        <div id="suggestions"></div>
                    </section>

                    <section class="col col-2">
                        <button class="button inline" name="find" type="submit">Find<span><i class="icon-chevron-right"></i></span></button>
                    </section>
                </form>
            </div>
        </div>
        <table id="usersList" class="myTable">
            <thead>
            <tr>
                <th width="header" class="left">#</th>
                <th class="header">Username</th>
                <th class="header">Full Name</th>
                <th class="header">User Status</th>
                <th class="header">Level</th>
                <th class="header">Last Login</th>
                <th class="header">Actions</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</section>
<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/customScripting.js"></script>
<script type="text/javascript">
    $(function () {
        //// Need To Work ON New Way Of DataTables..
        oTable ="";
        //Initialize Select2 Elements
        var usersTableSelector = $("#usersList");
        var url_DT = "<?=base_url();?>admin/Users/listing";
        var aoColumns_DT = [
            /* User ID */ {
                "mData": "UserID",
                "bVisible": true,
                "bSortable": true,
                "bSearchable": true
            },
            /* Username  */ {
                "mData" : "Username"
            },
            /* Full Name */ {
                "mData" : "FullName"
            },
            /* User Status */ {
                "mData" : "UserStatus"
            },
            /*  User Level */ {
                "mData" : "UserLevel"
            },
            /* Last User Login */ {
                "mData": "LastLogin"
            },
            /* Action Buttons */ {
                "mData" : "ViewEditActionButtons"
            }
        ];
        var HiddenColumnID_DT = "UserID";
        var sDom_DT = '<"H"r>t<"F"<"row"<"col-lg-6 col-xs-12" i> <"col-lg-6 col-xs-12" p>>>';
        commonDataTables(usersTableSelector,url_DT,aoColumns_DT,sDom_DT,HiddenColumnID_DT);

        //Code for search box
        $("#search-input").on("keyup",function (e) {
            oTable.fnFilter( $(this).val());
        });

        //Code to Redirect to Delete User on click.
        usersTableSelector.on("click",".delete",function(e){
            var ref = $(this);
            var uid = $(this).parents('tr').attr('data-id');
            var text = "<div><i class=\"icon-warning-sign icon-2x pull-left\"></i>Are you sure you want to delete this record?<br /><strong>This action cannot be undone!!!</strong></div>";
            new Messi(text, {
                title: "Delete User",
                modal: true,
                closeButton: true,
                buttons: [{
                    id: 0,
                    label: "Delete",
                    val: 'Y'
                }],
                callback: function (val) {
                    $.ajax({
                        type: 'post',
                        url: "<?php echo base_url(); ?>admin/users/delete",
                        data: {
                            id: uid
                        },
                        cache: false,
                        beforeSend: function () {
                            showLoader();
                        },
                        success: function (msg) {
                            hideLoader();
                            $("#msgholder").html(msg);
                            ref.parents('tr').remove();
                            $('html, body').animate({
                                scrollTop: 0
                            }, 600);
                        }
                    });
                }
            });
        });

        //Code to Activate User on Click
        usersTableSelector.on('click','a.activate', function (e) {
            var $ref = $(this);
            var uid = $(this).attr('id').replace('act_', '')
            var text = "<i class=\"icon-warning-sign icon-3x pull-left\"></i>Are you sure you want to activate this user account?<br /><strong>Email notification will be sent as well</strong>";
            new Messi(text, {
                title: "Activate User Account",
                modal: true,
                closeButton: true,
                buttons: [{
                    id: 0,
                    label: "Activate",
                    val: 'Y'
                }],
                callback: function (val) {
                    $.ajax({
                        type: 'post',
                        url: "<?=base_url();?>admin/users/activate",
                        data: {
                            activateAccount: 1,
                            id: uid,
                        },
                        cache: false,
                        beforeSend: function () {
                            showLoader();
                        },
                        success: function (msg) {
                            hideLoader();
                            $ref.replaceWith('<i class="icon-ok-sign text-green"></i> Active');
                            $("#msgholder").html(msg);
                            $('html, body').animate({
                                scrollTop: 0
                            }, 600);
                        }
                    });
                }
            });
        });


    });
</script>