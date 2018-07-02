<div class="wrap clearfix">

    <div id="content-wrap">

        <div id="content">

            <div id="msgholder"></div>



            <p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i>Make sure your database is backed up frequently. Click on Create backup to manually backup your database.<br>

                The backups are stored in the [<strong>/admin/backups/</strong>] folder and can be downloaded from the list below. <br>

                Your most recent backup is highlighted. Make sure you download your most recent backup, and delete the rest.</p>

            <section class="widget">

                <header>

                    <div class="row">

                        <h1><i class="icon-reorder"></i> Viewing Backups</h1>

                        <aside> <a href="<?=base_url()?>admin/configuration/do_backup" data-hint="Create Backup" class="hint--left hint--add hint--always hint--rounded"><span class="icon-plus"></span></a> </aside>

                    </div>

                </header>

                <?php

                if(isset($page_data['backups'])){
                    foreach($page_data['backups'] as $backup){
                        print $backup;
                    }
                }

                ?>

            </section>

            <script type="text/javascript">

                // &lt;![CDATA[

                $(document).ready(function () {

                    $('.widget').on('click','a.delete', function () {

                        var parent = $(this).closest('div');

                        var id = parent.attr('id').replace('item_', '');

                        var title = $(this).attr('data-rel');

                        var text = '<div class="messi-content" style="height: auto;"><div><i class="icon-warning-sign icon-2x pull-left"></i>Are you sure you want to delete this record<br><strong>This action cannot be undone!!!</strong></div></div>';

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

                                        url: "<?=base_url()?>admin/configuration/trash_backup",

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

                        var text = '<div class="messi-content" style="height: auto;"><div><i class="icon-warning-sign icon-2x pull-left"></i>Are you sure you want to restore databse?<br><strong>This action cannot be undone!!!</strong></div></div>';

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

                                        url: "<?= base_url() ?>admin/configuration/restore_backup",

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

                // ]]&gt;

            </script>
        </div>

    </div>

</div>