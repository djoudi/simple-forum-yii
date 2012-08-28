<?php
/* @var $this SforumController */
/* @var $model Sforum */

$this->breadcrumbs=array(
	'Forums'=>array('default/index'),
	$model->name,
);

?>

<div class="forum-detail-view">
	
	<div class="forum-topic-view">
		<h1><?php echo CHtml::encode($model->name); ?></h1>
		<p><?php echo CHtml::encode($model->description); ?></p>
	</div>
	
	<div class="forum-topic-replies">
	<?php
	$this->renderPartial('_topic_list', array(
		'forum' => $model,
	));
	?>
	</div>
</div>
<?php 
/*
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'image',
		'status',
		'of_posts',
		'of_topics',
		'created_by',
		'created_by_name',
		'modified_by',
		'modified_by_name',
		'created_on',
		'modified_on',
		'last_post_id',
		'last_topic_id',
		'type',
	),
)); 
*/
?>
