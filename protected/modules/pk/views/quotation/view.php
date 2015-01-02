<?php
if ( isset($_GET['section_id']) ) {
	$section = Section::model()->findByPk($_GET['section_id']);
	echo '<h2>Vocabularies in《'.$section->source->name.'》—— '.$section->name.'</h2>';
}
?>

<?php $this->widget('bootstrap.widgets.Button', array(
	'buttonType'=> 'link',
	'type'=>'info', 
	'url' => Yii::app()->request->baseUrl.'/vocabulary/create',
	'label'=> 'Create Vocabulary',
	'htmlOptions'=> array(
	),
)); ?>
<?php $this->widget('bootstrap.widgets.Button', array(
	'buttonType'=> 'link',
	'type'=>'warning', 
	'url' => Yii::app()->request->baseUrl.'/explanation/create',
	'label'=> 'Create Explanation',
	'htmlOptions'=> array(
	),
)); ?>
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
	'itemView'=>'_view',
	'template'=>"{items}\n{pager}",
)); ?>


