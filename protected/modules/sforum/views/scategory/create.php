<?php
/* @var $this SforumController */
/* @var $model Sforum */

$this->breadcrumbs=array(
	'Category'=>array('sforum/index'),
	'Create',
);

?>

<h1>Create Category</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>