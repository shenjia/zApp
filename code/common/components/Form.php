<?php
class Form extends CActiveForm 
{
    public $enableAjaxValidation = true;
	public $enableClientValidation = true;
	public $clientOptions = array(
		'inputContainer'=>'tr',
		'validateOnSubmit'=>true,
        //'beforeValidate'=>'app.form.resetSubmit'
	);
	public $htmlOptions = array(
		'autocomplete'=>'off'
	);

	/**
	 * 显示检查状态和提示
	 */
	public function hint ( $model, $attribute, $htmlOptions = array() ) 
	{
		Value::append( $htmlOptions[ 'class' ], $attribute );
		Value::append( $htmlOptions[ 'class' ], 'hintMessage' );
		$content = Yii::t( 'form/' . $this->id, $attribute . '_hint' );
		$tags = CHtml::tag( 'span', array( 'class' => 'checkStatus' ), '', true );
		$tags .= CHtml::tag( 'div', $htmlOptions, $content, true );
		return $tags;
	}
}