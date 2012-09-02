<div id="a-<?=$data->id?>-div" class="forum-topic-reply-row <?php if($index%2 == 0) echo 'even-reply'; else echo 'odd-reply'; ?>">
	<h3 class="first"><a class="link" href="<?=$this->createUrl('stopic/view', array('id' => $data->topic->id));?>">Re: <?php echo CHtml::encode($data->topic->name); ?></a></h3>
	<span class="author-info">
		<?php echo CHtml::encode($data->created_by_name); ?>, 
		<?php echo SforumUtils::displayDateTime($data->created_on); ?>, 
		<?php echo CHtml::encode($data->ip); ?>
	</span>
	<p><?php echo SforumUtils::post($data->body); ?></p>
	<span>
	<input type="button" value=" <?=($data->status==1?'Approved':'Approve')?> " <?=($data->status==1?'disabled':'')?> /> 
	<input type="button" value=" Delete " /> 
	</span>
</div>