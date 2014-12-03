<?php
/* @var $this SupplierController */

$this->breadcrumbs=array(
	'Supplier',
);
?>
<h1>供应商管理页面</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'supplier-grid',
	'dataProvider'=>$model->searchSupplier(),
	'filter'=>$model,
	'columns'=>array(
		/*
		'supplier_company',
		array(
			'name'=>'supplier_company',
			'type'=>'html',
			'value'=>'CHtml::link("$data->",array("customer/view?id=$data->company_id"))',
		),
		*/
		array(
			'name'=>'supplier_company',
			'value'=>'$data->company->full_name'
		),
		'contacter',
		'cell_phone',
		'office_phone',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
			'buttons'=>array(
				'view'=>array(
					'label'=>'View',
					'url'=>'"supplier/view?id=".$data->company->company_id',
				),
				'update'=>array(
					'label'=>'Update',
					'url'=>'"supplier/update?id=".$data->company->company_id',
				),
			),
		),
	),
)); ?>
