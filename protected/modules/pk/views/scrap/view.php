<?php
if (isset($section))
{
?>
<h2><i>
	<?php echo $section->source->name.' - '.implode(' - ', Section::nameList($section->id)); ?>
</i></h2>
<p>
	<?php echo CHtml::link($section->link,$section->link,array(
		'target' => '_blank',
	));?>
</p>
<?php
}

$tail = isset($section) ? '?section_id='.$section->id.'&redirect='.urlencode(Yii::app()->request->url) : '';
$this->widget('bootstrap.widgets.Button', array(
	'buttonType'=>'link', 
	'type'=>'primary', 
	'label'=>'Create Scrap',
	'url' => Yii::app()->request->baseUrl.'/'.$this->module->id.'/'.$this->id.'/create'.$tail,
	'htmlOptions'=> array(
	),
));
?>

<?php 
$this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'viewData' => array(
		'parsedown' => $parsedown,
	),
	'itemView'=>'_view',
	'template'=>"{items}\n{pager}",
)); ?>
