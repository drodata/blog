<?php
/* @var $this CustomerController */
/* @var $model CustomerForm */

$this->breadcrumbs=array(
	'客户管理'=>array('admin'),
	'查看详情',
);

?>

<h3>客户“<?php echo $model->full_name; ?>“ 详情</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'full_name',
		'short_name',
		'address_s',
		'zip',
		'contacter',
		'duty',
		'cell_phone',
		'office_phone',
		'fax',
	),
)); ?>

<br><center>
<?php //echo CHtml::link('添加发货地址',array('customer/addaddress?cid='.$model->id)); ?>
<?php echo CHtml::link('添加发货地址',array('customer/address/create?cid='.$model->id)); ?>
</center>
