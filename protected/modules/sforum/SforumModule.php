<?php
// 1845 488 10

class SforumModule extends CWebModule
{
	/**
	 * @var string the default layout for the views.
	 */
	public $layout='//layouts/main';
	
	public $version = '1.0';
	
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'sforum.models.*',
			'sforum.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
