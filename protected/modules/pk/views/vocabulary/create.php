<h3><?php echo $this->action->id.' '.$this->id; ?></h3>
<?php
echo $this->renderPartial('_cu', array('model' => $model));	

	$action = $this->id;
	Yii::app()->clientScript->registerScript('createhide',
	'
	var elements = $("#'.$action.'-cu-form").afGet("Vocabulary");
	elements.name.focus();
	'
	, CClientScript::POS_END);
?>
