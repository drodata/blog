<?php 
	$this->renderPartial('_view', array(
		'data'=>$model,
	));

	//echo $this->renderPartial('_CUDialog');

	Yii::app()->clientScript->registerScriptFile(
		Yii::app()->baseUrl.'/js/essay.js',
		CClientScript::POS_HEAD
	);
?>
