<?php
//print_r($category); die;
?>
<div class="sforum-list-row">
	<div class="sforum-category-row">
	<table width="100%" border=0 cellspacing=0 cellpadding=0>
	<tr>
		<td>
		<?php
		echo CHtml::encode($category->name);
		?>
		</td>
		<td width="100">
			<a href="<?=$this->createUrl('sforum/create', array('Sforum[parent_id]' => $category->id));?>">+ Add Forum</a>
		</td>
	<tr>
	</table>
	</div>
	<div class="sforum-forum-table-div">
	<?php
	
	if( $category->forums ) {
		$this->renderPartial('/default/_forum_forum_table', array(
			'forums' => $category->forums
		));
	}
	else {
		echo "no forums found.";
	}
	?>
	</div>
</div>