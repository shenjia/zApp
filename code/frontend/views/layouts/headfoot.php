<?php $this->beginContent('//layouts/root'); ?>
<div id="header">
	<div class="wrapper">
		<div class="logo"><a href="/"><h1><?php echo Yii::t( 'title', 'site' ); ?></h1></a></div>
		<div class="nav">
		</div>
	</div>
</div>
<?php echo $content;?>
<div id="footer">
	<div class="wrapper">
	<p>
	Copyright &copy <?= date('Y') ?>
	<?php echo Yii::t( 'title', 'site' ); ?>
	</p>
	</div>
</div>
<?php $this->endContent(); ?>