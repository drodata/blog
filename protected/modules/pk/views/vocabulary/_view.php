<h1> 
<?=$vocabulary->name?>
<?=$vocabulary->pronunciation ? ' /'.$vocabulary->pronunciation.'/' : ''?>
<?php echo CHtml::link('U',Yii::app()->request->baseUrl.'/'.$this->module->id.'/'.$this->id.'/update?id='.$vocabulary->id); ?>
</h1>
<ol>
<?php
	foreach ($vocabulary->explanations as $exp) {
		echo '<li>';
		$this->renderPartial('/explanation/_view', array(
			'data' => $exp,
		));
		echo '</li>';
	}
?>
</ol>
