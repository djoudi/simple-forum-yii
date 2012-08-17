<?php
/* @var $this SforumController */
/* @var $model Sforum */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sforum-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'of_posts'); ?>
		<?php echo $form->textField($model,'of_posts'); ?>
		<?php echo $form->error($model,'of_posts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'of_topics'); ?>
		<?php echo $form->textField($model,'of_topics'); ?>
		<?php echo $form->error($model,'of_topics'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by_name'); ?>
		<?php echo $form->textField($model,'created_by_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'created_by_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_by'); ?>
		<?php echo $form->textField($model,'modified_by'); ?>
		<?php echo $form->error($model,'modified_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_by_name'); ?>
		<?php echo $form->textField($model,'modified_by_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'modified_by_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_on'); ?>
		<?php echo $form->textField($model,'created_on'); ?>
		<?php echo $form->error($model,'created_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_on'); ?>
		<?php echo $form->textField($model,'modified_on'); ?>
		<?php echo $form->error($model,'modified_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_post_id'); ?>
		<?php echo $form->textField($model,'last_post_id'); ?>
		<?php echo $form->error($model,'last_post_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_topic_id'); ?>
		<?php echo $form->textField($model,'last_topic_id'); ?>
		<?php echo $form->error($model,'last_topic_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->