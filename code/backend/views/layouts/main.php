<?php $this->beginContent('//layouts/headfoot'); ?>
<?php Resource::loadCss('admin_style'); ?>
<div class="wrap">
    <?php echo $content; ?>
</div>
<?php $this->endContent(); ?>