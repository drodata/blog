<?php
if ( isset($_GET['section_id']) ) {
	$section = Section::model()->findByPk($_GET['section_id']);
	$section_title = isset($section->link) ? CHtml::link($section->name, $section->link) : $section->name;
	echo '<h2>Clips in《'.$section->source->name.'》—— '.$section_title.'</h2>';
}
?>

<?php $this->widget('bootstrap.widgets.Button', array(
	'buttonType'=> 'link',
	'type'=>'success', 
	'url' => Yii::app()->request->baseUrl.'/'.$this->module->id.'/'.$this->id.'/create',
	'label'=> 'Create',
	'htmlOptions'=> array(
	),
)); ?>

<?php 
$this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'viewData' => array(
		'parsedown' => $parsedown,
	),
	'template'=>"{items}\n{pager}",
)); ?>

<?php
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerCssFile(
	Yii::app()->clientScript->getCoreScriptUrl().
	'/jui/css/base/jquery-ui.css'
);
	Yii::app()->clientScript->registerScriptFile(
		$this->module->assetsUrl.'/js/quick-add-clip-taxonomy.js',
		CClientScript::POS_END
	);
?>
