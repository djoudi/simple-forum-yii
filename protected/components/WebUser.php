<?php

class WebUser extends CWebUser {
	public function getIsAdmin() {
		if(Yii::app()->user->isGuest) {
			return false;
		}
		
		$user = \User::model()->find('id=:id', array(':id' => Yii::app()->user->id));
		
		if(!$user)
			return false;
		
		if($user->user_type == 'A')
			return true;
		
		return false;
	}
}