<div class="wrap clearfix">

    <div id="content-wrap">

        <div id="content">

            <div id="msgholder"></div>

            <p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i>You can add flight and accommodation details on this panel<br>&nbsp;</p>
            <section class="widget">
                <header>
                    <div class="row">
                        <h1><i class="icon-reorder"></i> Flights &amp; Accommodation <button hidden="">Export report</button></h1>
                    </div>
                </header>
                <div class="content2">
                    <div class="row">
                        <div class="ptop30">
                            <form class="xform" id="dForm" method="post" style="padding:0;">
                                <section class="col col-6">
                                    <select name="select" id="userfilter">
                                        <option value="NA">--- Reset Flight Filter ---</option>
                                    </select>
                                </section>
                                <div class="hr2"></div>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-prepend icon-search"></i>
                                        <input type="text" name="serachflight"  id="search-input" placeholder="Search Flights">
                                    </label>
                                    <div id="suggestions"></div>
                                </section>

                                <section class="col col-2">
                                    <button class="button inline" name="find" type="submit">Find<span><i class="icon-chevron-right"></i></span></button>
                                </section>
                            </form>
                        </div>
                    </div>
                    <table id="flights" class="myTable" style="display: table;">
                        <thead>
                        <tr>
                            <th width="header" class="left header">Reg ID</th>
                            <th class="header">Title</th>
                            <th class="header">First Name</th>
                            <th class="header">Last Name</th>
                            <th class="header">Name Badge</th>

                            <th class="header">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd">
                            <td>001a</td>
                            <td>Mrs</td>
                            <td>Amanda</td>
                            <td>Abraham</td>
                            <td>Amanda</td>

                            <td><span class="tbicon"> <a data-title="View Flights &amp; Accommodation" class="tooltip" href="index.php?do=flight-info&amp;id=13&amp;regno=001a"><i class="icon-pencil"></i></a> </span></td>
                        </tr>
                        </tbody></table>
                </div>
                </section>
            </div>
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/customScripting.js"></script>
<script type="text/javascript">
    $(function () {
        //// Need To Work ON New Way Of DataTables..
        oTable ="";
        //Initialize Select2 Elements
        var flightsListTable = $("#flights");
        var url_DT = "<?=base_url();?>admin/flights/get_registered_users";
        var aoColumns_DT = [
            /* User ID RegID*/ {
                "mData": "RegID",
                "bVisible": true,
                "bSortable": true,
                "bSearchable": true
            },
            /* Username  */ {
                "mData" : "Title"
            },
            /* Full Name */ {
                "mData" : "FirstName"
            },
            /* User Status */ {
                "mData" : "LastName"
            },
            /*  User Level */ {
                "mData" : "NameBadge"
            },
            /* Last User Login */ {
                "mData": "actionButtons"
            }
        ];
        var HiddenColumnID_DT = "ID";
        var sDom_DT = '<"H"r>t<"F"<"row"<"col-lg-6 col-xs-12" i> <"col-lg-6 col-xs-12" p>>>';
        commonDataTables(flightsListTable,url_DT,aoColumns_DT,sDom_DT,HiddenColumnID_DT);

        //Code for search box
        $("#search-input").on("keyup",function (e) {
            oTable.fnFilter( $(this).val());
        });
/*
        //Code to Redirect to Delete User on click.
        flightsListTable.on("click",".delete",function(e){
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
                            $("#msgholder").html(msg);
                            $('html, body').animate({
                                scrollTop: 0
                            }, 600);
                        }
                    });
                }
            });
        });*/


    });
</script>
