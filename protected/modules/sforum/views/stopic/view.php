<?php
/* @var $this SforumController */
/* @var $model Sforum */

$this->breadcrumbs=array(
	'Forums'=>array('default/index'),
	$model->name,
);

?>
<?php
/* @var $this SforumController */
/* @var $model Sforum */

if( $model->sforum_id && $model->forum) {
	$this->breadcrumbs=array(
		'Forums'=>array('default/index'),
		$model->forum->name => array('sforum/view', 'id' => $model->sforum_id),
		$model->name,
	);
}
else {
	$this->breadcrumbs=array(
		'Forums'=>array('default/index'),
		$model->name,
	);
}

?>

<div class="forum-detail-view">
	
	<div class="forum-topic-view">
		<h1><?php echo CHtml::encode($model->name); ?></h1>
	</div>
	
	<div class="forum-topic-replies">
		<div class="forum-topic-reply-row odd-reply">
			<h3 class="first"><a class="link" href="#a-<?=$model->id?>"><?php echo CHtml::encode($model->name); ?></a></h3>
			<p><?php echo CHtml::encode($model->description); ?></p>
		</div>
		<?php
		$this->renderPartial('_posts_list', array(
			'topic' => $model,
		));
		?>
	</div>
	
	<div class="forum-topic-reply-form">
		<?php
		if( Yii::app()->user->isGuest )
		{
			if( $this->module->ananymousComments ) {
				$this->renderPartial('_reply_form_ananymous', array(
					'topic' => $model,
					'model' => new Spost(),
				));
			}
		}
		else
		{
			$this->renderPartial('_reply_form', array(
				'topic' => $model,
				'model' => new Spost(),
			));
		}
			
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
