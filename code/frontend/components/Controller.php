<?php
class Controller extends CController
{
	public $layout='//layouts/main';
	public $menu = array();
	public $breadcrumbs = array();
	public $_pageTitle = null;
	public $publicActions = array('*');
	
	protected function beforeAction($action)
	{
		if (in_array('*', $this->publicActions)) return true;
		
		if (in_array($action->getId(), $this->publicActions)) return true;
		
		if (Yii::app()->user->isGuest) {
		    if (Yii::app()->request->isAjaxRequest) {
		        echo 'top.location.href="' . Yii::app()->user->loginUrl . '";';
		    }
		    Yii::app()->user->loginRequired();
		}
	    return true;
	}

	public function getPageTitle()
	{
		if ($this->_pageTitle!==null) return $this->_pageTitle;
		
		$name = Yii::t('title', $this->getId());
		if ($this->getAction()!==null && strcasecmp($this->getAction()->getId(),$this->defaultAction)) {
			return $this->_pageTitle = Yii::t('title', 'site') . ' - ' . Yii::t('title', $this->getAction()->getId()) . ' - ' . $name;
		} else {
			return $this->_pageTitle = Yii::t('title', 'site') . ' - ' . $name;
		}
	}
	
	public function setPageTitle($title)
	{
		return $this->_pageTitle = $title;
	}
}