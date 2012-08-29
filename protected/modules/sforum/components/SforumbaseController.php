<?php

class SforumbaseController extends CController {
	public $breadcrumbs = array();
	public $menu = array();
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			/*
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			*/
			array('allow',
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function init() {
		parent::init();
		
		Yii::app()->clientscript->registerCssFile($this->module->assetsUrl.'/css/main.css');
	}
	
	public function loadModel($id) {
		throw new CException('Yii error, This method should not be called here.');
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	protected function performDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function createModel($modelName, $args=array())
	{
		extract($args);
		
		$model=new $modelName;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST[$modelName]))
		{
			if( isset($beforePopulate) ) {
				$beforePopulate->bindTo($this, $this);
				$beforePopulate($model);
			}
			
			$model = SforumActiveRecord::populateFromPOST($model);
			
			if( isset($afterPopulate) ) {
				$afterPopulate->bindTo($this, $this);
				$afterPopulate($model);
			}
			
			if( isset($beforeSave) ) {
				$beforeSave->bindTo($this, $this);
				$beforeSave($model);
			}
			if($model->save()) {
			
				if( isset($afterSave) ) {
					$afterSave->bindTo($this, $this);
					$afterSave($model);
				}
				else {
					$this->safeRedirect(array('view','id'=>$model->id));
				}
			}
		}
		else {
			$model = SforumActiveRecord::populateFromRequest($model);
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	protected function updateModel($id, $modelName, $args=array())
	{
		extract($args);
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST[$modelName]))
		{
			if( isset($beforePopulate) ) {
				$beforePopulate->bindTo($this, $this);
				$beforePopulate($model);
			}
			
			$model = SforumActiveRecord::populateFromPOST($model);
			
			if( isset($afterPopulate) ) {
				$afterPopulate->bindTo($this, $this);
				$afterPopulate($model);
			}
			
			if( isset($beforeSave) ) {
				$beforeSave->bindTo($this, $this);
				$beforeSave($model);
			}
			if($model->save()) {
				if( isset($afterSave) ) {
					$afterSave->bindTo($this, $this);
					$afterSave($model);
				}
				else {
					$this->safeRedirect(array('view','id'=>$model->id));
				}
			}
		}
		else {
			//$model = SforumActiveRecord::populateFromRequest($model);
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	protected function loadModelGeneric($modelName, $id)
	{
		$model=$modelName::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404, 'Yii error, the requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sforum-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public final function safeRedirect( $path )
	{
		if( isset($_REQUEST['retUrl']) && $_REQUEST['retUrl'] ) {
			$this->innerRedirect( $_REQUEST['retUrl'] );
		}
		
		$this->redirect( $path );
	}
	
	/**
	* redirect to only in our site
	*/
	public function innerRedirect( $url ) {
		$onError = '/';
		
		if( $this->module ) {
			$onError = '/' . $this->module->id;
		}
		
		if( ($parts = parse_url($url)) === false ) {
			$this->redirect( $onError );
		}
		
		if( substr($parts['path'], 0, 1) != '/' )
			$parts['path'] = '/' . $parts['path'];
			
		$this->redirect( $parts['path'] . ( (isset($parts['query']) && $parts['query'])?'?'.$parts['query']:'') . ((isset($parts['fragment']) && $parts['fragment'])?'#'.$parts['fragment']:'') );
	}
}