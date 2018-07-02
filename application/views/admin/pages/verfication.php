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
                <th class="header">User CC</th>
                <th class="header">Email Send</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>

        <div class="col-xs-12" style="padding:12px">
            <span style="float:left">Select All Users</span>
            <input style="float: left;width: 20px;" type="checkbox" name="all_user_ids" class="all_user_ids" />
            <button class="send_email_to_user">Send Email To Selected Users<span><i class="icon-ok"></i></span></button>
        </div>
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
        var url_DT = "<?=base_url();?>admin/Users/verification_listing";
        var aoColumns_DT = [
            /* User ID */ {
                "mData": "UserID",
                "bVisible": true,
                "bSortable": true,
                "bSearchable": true,
                "render": function ( data, type, row, meta ) {
                  return '<input type="checkbox" class="user_id_check" name="user_ids[]" value="'+row.UserID+'" />';
                }
            },
            /* Username  */ {
                "mData" : "Username"
            },
            /* Full Name */ {
                "mData" : "FullName"
            },
            /* Card Number */ {
                "mData" : "CardNumber"
            },
            /* Card Number */ {
                "mData" : "Verified",
                "className":"isEmailSend"
            },
        ];
        var HiddenColumnID_DT = "UserID";
        var sDom_DT = '<"H"r>t<"F"<"row"<"col-lg-6 col-xs-12" i> <"col-lg-6 col-xs-12" p>>>';
        commonDataTables_cstm(usersTableSelector,url_DT,aoColumns_DT,sDom_DT,HiddenColumnID_DT);

        //Code for search box
        $("#search-input").on("keyup",function (e) {
            oTable.fnFilter( $(this).val());
        });



    });


    $(document).on("change",".all_user_ids", function() {
        if(this.checked) {
            $('.user_id_check').prop('checked', true);
        } else {

            $('.user_id_check').prop('checked', false);
        }
    });
    $(document).on("click",".send_email_to_user", function() {
        var userIds = $('.user_id_check:checked').map(function(idx, elem) {
            return $(elem).val();
          }).get();
        if(userIds.length){
            $.ajax({
                url:"<?=base_url();?>admin/Users/sendVerificationEmails",
                data:{userIds: userIds},
                type:"POST",
                beforeSend:function(){
                    showLoader();
                },
                success:function(msg){
                    $.each(userIds, function(i, val){
                        $('#usersList').find('tr[data-id="'+val+'"]').find('.isEmailSend').html('Yes');

                    })
                    hideLoader();
                    $("#msgholder").html(msg);
                    $('html, body').animate({
                        scrollTop: 0
                    }, 600);


                }
            });
        }
    });

     function commonDataTables_cstm(selector,url,aoColumns,sDom,HiddenColumnID,RowCallBack,DrawCallBack,filters,sortBy){
        // console.log(HiddenColumnID);
        //Little Code For Sorting.
        if(typeof sortBy === "undefined"){
            sortBy = {
                'ColumnID' : 0,
                'SortType' : 'asc'
            }
        }
        oTable = selector.dataTable({
            "bServerSide": true,
            "bProcessing": true,
            "bPaginate" :false,
            "sPaginationType": "full_numbers",
            "bDestroy":true,
            "sServerMethod": "POST",
            "aaSorting":[[ sortBy['ColumnID'], sortBy['SortType'] ]],
            "sDom" : sDom,
            "aoColumns":aoColumns,
            "sAjaxSource": url,
            "iDisplayLength": 10,
            'fnServerData' : function(sSource, aoData, fnCallback){
                $.ajax({
                    'dataType': 'json',
                    'type': 'POST',
                    'url': url,
                    'data': aoData,
                    'success': fnCallback
                }); //end of ajax
            },
            'fnRowCallback': function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                if(typeof HiddenColumnID !== "undefined"){
                    $(nRow).attr("data-id",aData[HiddenColumnID]);
                }else{
                    $(nRow).attr("data-id",aData[0]);
                }

                if(typeof RowCallBack !== "undefined" || RowCallBack === ''){
                    eval(RowCallBack);
                }
                return nRow;
            },
            //This function is called on every 'draw' event, and allows you to dynamically modify any aspect you want about the created DOM.
            fnDrawCallback : function (oSettings) {
                if(typeof DrawCallBack !== "undefined" || DrawCallBack === ''){
                    eval(DrawCallBack);
                }
            },
            "fnServerParams": function (aoData, fnCallBack) {
                if (typeof filters !== "undefined") {
                    eval(filters);
                }
            }
        });
    }
</script>