<div class="wrap clearfix">

    <div id="content-wrap">

        <div id="content">

            <div id="msgholder"></div>

            <p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i>Below are your email templates.<br>

                You can modify content of template(s) to suit your needs</p>

            <section class="widget">

                <header>

                    <div class="row">

                        <h1><i class="icon-reorder"></i> Viewing Email Templates</h1>

                    </div>

                </header>

                <div class="content2">

                    <table id="templatesList" class="myTable" style="display: table;">

                        <thead>

                        <tr>

                            <th class="header">#</th>

                            <th class="header">Template Name</th>

                            <th class="header">Description</th>

                            <th class="header">Edit</th>

                        </tr>

                        </thead>

                        <tbody>
                        </tbody>
                    </table>
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
        var usersTableSelector = $("#templatesList");
        var url_DT = "<?=base_url();?>admin/templates/listing";
        var aoColumns_DT = [
            /* User ID */ {
                "mData": "id",
                "bVisible": true,
                "bSortable": true,
                "bSearchable": true
            },
            /* Username  */ {
                "mData" : "name"
            },
            /* Full Name */ {
                "mData" : "help"
            },
            /* User Status */ {
                "mData" : "actionButtons"
            }
        ];
        var HiddenColumnID_DT = "id";
        var sDom_DT = '<"H"r>t<"F"<"row"<"col-lg-6 col-xs-12" i> <"col-lg-6 col-xs-12" p>>>';
        commonDataTables(usersTableSelector,url_DT,aoColumns_DT,sDom_DT,HiddenColumnID_DT);

        //Code for search box
        $("#search-input").on("keyup",function (e) {
            oTable.fnFilter( $(this).val());
        });

        //Code to Redirect to Delete User on click.
        usersTableSelector.on("click",".delete",function(e){
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
        });


    });
</script>