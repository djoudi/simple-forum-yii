<tr valign="top">
	<td valign="top" width="70%"><a href="<?=$this->createUrl('sforum/view', array('id' => $forum->id))?>">
		<b><?php
		echo CHtml::encode($forum->name);
		?></b>
		</a>
		<p>
		<?php
		echo CHtml::encode($forum->description);
		?>
	</p>
	</td>
	<td valign="top" width="50"><?php
		echo $forum->of_topics . ' Topics <br/>';
		echo $forum->of_posts . ' Posts <br/>';
	?></td>
	<td valign="top"><?php
		echo $forum->created_by_name . '<br/>' . SforumUtils::displayDateTime($forum->created_on);
	?></td>
</tr>