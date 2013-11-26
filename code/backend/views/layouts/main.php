<?php $this->beginContent('//layouts/root'); ?>
<?php 
Resource::loadCss('admin_style');
Resource::loadJs(array('wind', 'admin')); 
?>
<div class="wrap">
    <?php echo $content; ?>
</div>
<?php $this->endContent(); ?>