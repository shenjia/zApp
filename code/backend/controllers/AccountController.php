<?php
class AccountController extends Controller
{
    public function actionLogin()
	{
		$model = new LoginForm;

		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			if ($model->validate() && $model->login())
				$this->redirect('/site/index');
		}
		$this->layout = 'top';
		$this->render('login', array('model' => $model));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}