<?php
$this->pageTitle=Yii::app()->name . ' - 物流公司管理';
$this->breadcrumbs=array(
	'物流公司'=>array('admin'),
);
?>

<h2>管理物流公司</h2>

<?php echo CHtml::link('新建物流公司',array('logistics/create')); ?>
 |
<?php echo CHtml::link('新建物流公司分部',array('logistics/createbranch')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'address-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'company_search',
			'value'=>'($data->duty)?$data->company->full_name."［".$data->duty."］":$data->company->full_name'
		),
		'contacter',
		'office_phone',
		'cell_phone',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{hide}',
			'buttons'=>array(
				'hide'=>array(
					'label'=>'Hide',
					// 这个 url PHP 表达式颇费周折，逐个验证出来的
					'url'=>'"hide?id=".$data->address_id',
					'options'=>array(
						'class'=>'hideAddrL',
					),
					'click'=>'doConfirm',
				),
			),
		),
	),
)); ?>
<?php
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScript(
	'',
	'
	function doConfirm(){return confirm("请再次确认删除操作");}
	',
	CClientScript::POS_END
);
?>
