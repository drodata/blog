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
	'url' => Yii::app()->request->baseUrl.'/'.$this->id.'/create?section_id='.$_GET['section_id'],
	'label'=> 'Quick Create',
	'htmlOptions'=> array(
	),
)); ?>

<?php 
$this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'/dashboard/_view',
	'template'=>"{items}\n{pager}",
)); ?>

