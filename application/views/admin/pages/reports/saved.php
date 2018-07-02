<div class="wrap clearfix">
    <div id="content-wrap">
        <div id="content">
            <div id="msgholder"></div>
            <p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i>Saved Reports from the Reports Section are listed below (if there are any saved reports)<br>
                Currently Reports are saved as Date Names <br>
                You can regenerate report back again by clicking the respective saved link</p>
            <section class="widget">
                <header>
                    <div class="row">
                        <h1><i class="icon-reorder"></i> Saved Reports</h1>
                        <aside> <a class="hint--left hint--add hint--always hint--rounded" data-hint="Create Backup" href="http://localhost/sagicorconvention/admin/configuration/do_backup"><span class="icon-plus"></span></a> </aside>
                    </div>
                </header>
                <?php
                foreach($page_data as $key=> $row){
                    echo '<div id="'.$row->reportID.'" class="db-backup">';
                    echo '<i class="icon-file pull-left icon-4x icon-white"></i><span>'.$row->reportTitle.'</span>';
                    echo '<a href="'.base_url().'admin/Reports/deleteSavedReport/'.$row->reportID.'"><small data-title="Delete: '.$row->reportTitle.'" class="sdelet tooltip"><i class="icon-trash icon-white"></i></small></a>';
                    echo '<a class="download-report" href="'.base_url().'admin/Reports/generateSavedReport/'.$row->reportID.'"><small data-title="Download" class="sdown tooltip"><i class="icon-download-alt icon-white"></i></small></a>';
                    echo '<p>'.date("d-M-Y", strtotime($row->reportDateSaved)).'</p>';
                    echo '</div>';
                }
                ?>
            </section>
            <script type="text/javascript">
                // &amp;lt;![CDATA[
                $(document).ready(function () {
                    $('.widget').on('click','a.delete', function () {
                        var parent = $(this).closest('div');
                        var id = parent.attr('id').replace('item_', '');
                        var title = $(this).attr('data-rel');
                        var text = '&lt;div class="messi-content" style="height: auto;"&gt;&lt;div&gt;&lt;i class="icon-warning-sign icon-2x pull-left"&gt;&lt;/i&gt;Are you sure you want to delete this record&lt;br&gt;&lt;strong&gt;This action cannot be undone!!!&lt;/strong&gt;&lt;/div&gt;&lt;/div&gt;';
                        new Messi(text, {
                            title: "Delete Database Backup",
                            modal: true,
                            closeButton: true,
                            buttons: [{
                                id: 0,
                                label: "Delete",
                                val: 'Y'
                            }],
                            callback: function (val) {
                                if (val === "Y") {
                                    $.ajax({
                                        type: 'post',
                                        url: "http://localhost/sagicorconvention/admin/configuration/trash_backup",
                                        data: 'deleteBackup=' + id,
                                        beforeSend: function () {
                                            parent.animate({
                                                'backgroundColor': '#FFBFBF'
                                            }, 400);
                                        },
                                        success: function (msg) {
                                            parent.fadeOut(400, function () {
                                                parent.remove();
                                            });
                                            $("html, body").animate({
                                                scrollTop: 0
                                            }, 600);
                                            $("#msgholder").html(msg);
                                        }
                                    });
                                }
                            }
                        })
                    });
                    $('a.restore').on('click', function () {
                        var parent = $(this).closest('div');
                        var id = parent.attr('id').replace('item_', '')
                        var title = $(this).attr('data-rel');
                        var text = '&lt;div class="messi-content" style="height: auto;"&gt;&lt;div&gt;&lt;i class="icon-warning-sign icon-2x pull-left"&gt;&lt;/i&gt;Are you sure you want to restore databse?&lt;br&gt;&lt;strong&gt;This action cannot be undone!!!&lt;/strong&gt;&lt;/div&gt;&lt;/div&gt;';
                        new Messi(text, {
                            title: "Restore Database",
                            modal: true,
                            closeButton: true,
                            buttons: [{
                                id: 0,
                                label: "Restore Database",
                                val: 'Y'
                            }],
                            callback: function (val) {
                                if (val === "Y") {
                                    $.ajax({
                                        type: 'post',
                                        url: "http://localhost/sagicorconvention/admin/configuration/restore_backup",
                                        data: 'restoreBackup=' + id,
                                        success: function (msg) {
                                            parent.effect('highlight', 1500);
                                            var data = msg.split("::");
                                            $("html, body").animate({
                                                scrollTop: 0
                                            }, 600);
                                            $("#msgholder").html(data[1]);
                                            if(data[0] == "OK"){
                                                $(".db-backup").removeClass('db-latest');
                                                parent.addClass('db-latest');
                                            }
                                        }
                                    });
                                }
                            }
                        })
                    });
                });

                $(document).on('click','.download-report', function(e){
                    e.preventDefault();
                     var text = "<i class=\"icon-info-sign icon-3x pull-left\"></i>Select Type of Report<br /> ";
                     var href = $(this).attr('href');
                    new Messi(text, {
                        title: "Download Report",
                        modal: true,
                        closeButton: true,
                        buttons: [{
                            id: 1,
                            label: "Default Report",
                            val: 'D'
                        },{
                            id: 0,
                            label: "Single Row Report",
                            val: 'S'
                        }],
                        callback: function (val) {
                            window.location.assign(href+'/'+val);
                        }
                    });
                })
                // ]]&amp;gt;
            </script>
        </div>
    </div>
</div>