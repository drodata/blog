<?php
/* @var $this SupplierController */

$this->breadcrumbs=array(
	'Supplier'=>array('/supplier'),
	'View',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'company.full_name',
        'contacter',
	'cell_phone',
	'office_phone',
    ),
));
?>
