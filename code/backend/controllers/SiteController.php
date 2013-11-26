<?php
class SiteController extends Controller
{
    public $publicActions = array('error');
	public function actions()
	{
		return array(
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionIndex()
	{
	    $this->layout = 'top';
		$this->render('index');
	}
	
	public function actionHome() 
	{
	    $this->render('home');
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}