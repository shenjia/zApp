<?php $this->beginContent('//layouts/root'); ?>
<?php 
Resource::loadCss('admin_style');
Resource::loadJs(array('wind', 'admin')); 
?>
<script>
var app = {
	VERSION: '<?= RESOURCE_VERSION ?>',
	URL : {
		LOGIN : '',
		RESOURCE: '<?= rtrim(RESOURCE_SERVER, '/') ?>',
	}
};
</script>
<div class="wrap">
    <?php echo $content; ?>
</div>
<?php $this->endContent(); ?>