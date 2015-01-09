<h3> <?php echo $this->action->id.' '.$this->id;?> </h3>
<?php
echo $this->renderPartial('_cu', array(
	'model' => $model,
	'formTaxonomy' => $formTaxonomy,
));	

if (isset($_GET['section_id'])) {
	$action = $this->id;
	$section_id = $_GET['section_id'];
	Yii::app()->clientScript->registerScript('createhide',
	'
	var elements = $("#'.$action.'-cu-form").afGet("Clip");
	elements.section_id.parents(".form-group").first().hide();
	elements.section_id.feValue('.$section_id.');
	elements.content.focus();
	'
	, CClientScript::POS_END);
}
?>
