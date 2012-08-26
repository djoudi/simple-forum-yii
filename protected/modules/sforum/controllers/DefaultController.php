<?php

class DefaultController extends SforumbaseController
{
	public function actionIndex()
	{
		$categories = Sforum::model()->with('forums')->findAll('t.parent_id=0');
		
		$this->render('index', array(
			'categories' => $categories
		));
	}
}