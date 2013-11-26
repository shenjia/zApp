<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo Yii::app()->language; ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="format-detection" content="telephone=no" />
	<base target="_self"> 
	<title><?php echo CHtml::encode( empty($this->pageTitle) ? Yii::t( 'nav', 'site') : $this->pageTitle );?></title>
	<?php Resource::loadCss( 'app' ); ?>
</head>
<body>
<?php echo $content; ?>
</body>
</html>