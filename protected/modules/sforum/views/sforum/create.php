<?php
/* @var $this SforumController */
/* @var $model Sforum */

$this->breadcrumbs=array(
	'Sforums'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sforum', 'url'=>array('index')),
	array('label'=>'Manage Sforum', 'url'=>array('admin')),
);
?>

<h1>Create Sforum</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>