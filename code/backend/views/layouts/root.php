<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="language" content="<?php echo Yii::app()->language; ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="robots" content="none" />
	<base target="_self" /> 
	<title><?php echo CHtml::encode( is_null($this->pageTitle) ? Yii::t( 'title', 'site') : $this->pageTitle );?></title>
	<?php Resource::loadCss( 'app' ); ?>
</head>
<body>
<?php echo $content; ?>
</body>
</html>