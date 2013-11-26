<?php
$this->pageTitle = Yii::t('title', 'site') . ' - ' . Yii::t('title', 'login'); 
Resource::loadCss( 'admin_login' );
?>
<div class="wrap">
    <h1><?= Yii::t('title', 'site')?></h1>
    <?php $form = $this->beginWidget('Form', array(
		'id'=>'login-form',
		'action'=>'/account/login',
        'enableAjaxValidation' => false,
        'enableClientValidation' => false,
		'focus'=>array($model,$model->hasErrors('password') ? 'password' : 'username'),
	)); ?>
    <div class="login">
        <ul>
            <li>
            	<?php echo $form->textField($model, 'username', array(
            		'class' => 'input',
            	    'required' => true,
            		'placeholder' => $model->label('username')
            	))?>
            </li>
            <li>
            	<?php echo $form->passwordField($model, 'password', array(
            		'class' => 'input',
            	    'required' => true,
            		'placeholder' => $model->label('password')
            	))?>
            </li>
        </ul>
        <button type="submit" name="submit" class="btn"><?= Yii::t('button', 'login')?></button>
    </div>
    <?php $this->endWidget();?>
</div>