<?php
$templateID = (isset($page_data['templateDetails']) && !empty($page_data['templateDetails']))?$page_data['templateDetails']->id:'';
$body = (isset($page_data['templateDetails']) && !empty($page_data['templateDetails']))?$page_data['templateDetails']->body:'';
$name = (isset($page_data['templateDetails']) && !empty($page_data['templateDetails']))?$page_data['templateDetails']->name:'';
$subject = (isset($page_data['templateDetails']) && !empty($page_data['templateDetails']))?$page_data['templateDetails']->subject:'';
$description = (isset($page_data['templateDetails']) && !empty($page_data['templateDetails']))?$page_data['templateDetails']->help:'';
?>
<div class="wrap clearfix">

    <div id="content-wrap">

        <div id="content">

            <div id="msgholder"></div>




            <p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i> Here you can update your email template<br>

                Fields marked <i class="icon-append icon-asterisk"></i> are required.</p>

            <form method="post" id="admin_form" class="xform">

                <header>Email Template Manager<span>Editing Email Template <i class="icon-double-angle-right"></i> <?=$name;?></span></header>

                <div class="row">

                    <section class="col col-6">

                        <label class="input"> <i class="icon-append icon-asterisk"></i>

                            <input type="text" placeholder="Template Title" value="<?=$name?>" name="name">

                        </label>

                        <div class="note note-error">Template Title</div>

                    </section>

                    <section class="col col-6">

                        <label class="input"> <i class="icon-append icon-asterisk"></i>

                            <input type="text" placeholder="Email Subject" value="<?=$subject?>" name="subject">

                        </label>

                        <div class="note note-error">Email Subject</div>

                    </section>

                </div>

                <hr>

                <div class="row">

                    <section class="col col-12">

                        <label class="textarea">

                            <textarea rows="3" name="help"><?=$description?></textarea>

                        </label>

                        <div class="note">Description</div>

                    </section>

                </div>

                <section>
                    <div class="field-wrap wysiwyg-wrap">
                        <textarea class="post" name="body" rows="15" cols="30"><?php echo $body;?></textarea>
                    </div>
                    <div class="label2 label-important">Do Not Replace Variables Between [ ]</div>
                </section>

                <footer>

                    <button type="submit" name="dosubmit" class="button">Update Template<span><i class="icon-ok"></i></span></button>

                    <a class="button button-secondary" href="<?=base_url()?>admin/templates">Cancel</a> </footer>

                <input type="hidden" value="<?=$templateID;?>" name="id">

            </form>



            <script type="text/javascript">

                // &lt;![CDATA[

                $(document).ready(function () {

                    var options = {

                        target: "#msgholder",

                        beforeSubmit:  showLoader,

                        success: showResponse,

                        url: "<?=base_url()?>admin/templates/update/<?=$templateID?>",

                        resetForm : 0,

                        clearForm : 0,

                        data: {

                            processEmailTemplate: 1

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