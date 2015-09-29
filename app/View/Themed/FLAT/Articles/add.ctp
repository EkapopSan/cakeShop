<div class="row-fluid">
    <div class="box">
        <div class="box-title">
            <h3>New Article.</h3>
        </div>
        <div class="box-content">
            <div class="row-fluid">
                <div class="span12">
                    <input type="text" class="form-control" placeholder="Title of Post." />
                    <?php echo $this->Form->textarea('newsContent', array('class'=>$ckeditorClass)) ?>
                    <script type="text/javascript">
                        var ck_newsContent = CKEDITOR.replace('newsContent');
                        ck_newsContent.setData('<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>');
                        CKFinder.setupCKEditor(ck_newsContent, '<?php echo $ckfinderPath; ?>');
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>