<p>
<a href="<?=Yii::app()->request->baseUrl.'/'.$this->module->id
	.'/explanation/create?vocabulary_id='.$vocabulary->id?>">
	<i class="fa fa-plus"></i>
</a>
</p>
<ol>
<?php
	foreach ($vocabulary->explanations as $exp) {
		echo '<li>';
		$this->renderPartial('/explanation/_view', array(
			'data' => $exp,
			'parsedown' => $parsedown,
		));
		echo '</li>';
	}
?>
</ol>
