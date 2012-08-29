<div class="forum-topic-reply-row <?php if($index%2 == 0) echo 'even-reply'; else echo 'odd-reply'; ?>">
	<h3 class="first"><a class="link" href="#a-<?=$data->id?>">Re: <?php echo CHtml::encode($data->topic->name); ?></a></h3>
	<p><?php echo CHtml::encode($data->body); ?></p>
</div>