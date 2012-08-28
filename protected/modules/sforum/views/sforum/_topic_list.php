<div class="forum-view-buttons">
	<input type="button" value=" Create Topic " onclick="window.location='<?=$this->createUrl('/sforum/stopic/create', array('Stopic[sforum_id]' => $forum->id))?>';"/> 
	<input type="button" value=" Create Poll " onclick="window.location='<?=$this->createUrl('/sforum/stopic/createpoll', array('Stopic[sforum_id]' => $forum->id))?>';"/>
</div>

<div class="forum-topic-replies-div">
<?php
if($forum->topics):
?>
<table class="forum-topic-replies-table" width="100%" cellpadding=0 cellspacing=0 border=0>
<tr>
	<th>
	<?=Stopic::model()->getAttributeLabel('name')?>
	</th>
	<th>
	<?=Stopic::model()->getAttributeLabel('created_by_name')?>
	</th>
	<th>
	<?=Stopic::model()->getAttributeLabel('created_on')?>
	</th>
	<th>
	<?=Stopic::model()->getAttributeLabel('of_replies')?>
	</th>
	<th>
	<?=Stopic::model()->getAttributeLabel('of_views')?>
	</th>
</tr>
<?php
foreach( $forum->topics as $topic ) {
	$this->renderPartial('_topic_list_row', array(
		'topic' => $topic,
	));
}
?>
</table>
<?php
else:
	echo "No topics found";
endif;
?>
</div>