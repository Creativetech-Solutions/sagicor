<div class="wrap clearfix">

    <div id="content-wrap">

        <div id="content">

            <div id="msgholder"></div>

            <p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i>You can add Registration Manager details on this panel<br>&nbsp;</p>
            <section class="widget">
                <header>
                    <div class="row">
                        <h1><i class="icon-reorder"></i> Registration Manager <button hidden="">Export report</button></h1>
                    </div>
                </header>
                <div class="content2">
                     <div class="row">
                        <div class="ptop30">
                            <form class="xform" id="dForm" method="post" style="padding:0;">
                                <section class="col col-6">
                                    <select name="select" id="userfilter">
                                        <option value="NA">--- Reset Registration Filter ---</option>
                                    </select>
                                </section>
                                <div class="hr2"></div>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-prepend icon-search"></i>
                                        <input type="text" name="searchReg"  id="search-input" placeholder="Search Registration">
                                    </label>
                                    <div id="suggestions"></div>
                                </section>

                                <section class="col col-2">
                                    <button class="button inline" name="find" type="submit">Find<span><i class="icon-chevron-right"></i></span></button>
                                </section>
                            </form>
                        </div>
                    </div>
                    <table id="regReqList" class="myTable" style="width: 99%;">
                        <thead>
                        <tr>
                            <th width="header" class="left header">Reg ID</th>
                            <th class="header">Title</th>
                            <th class="header">First Name</th>
                            <th class="header">Last Name</th>
                            <th class="header">Status</th>
                            <th class="header">Club</th>
                            <th class="header">System Ref#</th>
                            <th class="header">Action</th>
                        </tr>
                        </thead>
                        <tbody>
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
        var flightsListTable = $("#regReqList");
        var url_DT = "<?=base_url();?>admin/registration/listing";
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
                "mData" : "Status"
            },
            /*  User Level */ {
                "mData" : "Club"
            },
            /*  User Level */ {
                "mData" : "sysRefNo"
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
    });
</script>
