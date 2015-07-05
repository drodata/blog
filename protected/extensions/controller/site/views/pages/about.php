<?php
//K::printR( exif_read_data('/home/ts/video/andro.avi/VID_20121213_170830.mp4') );
$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<?php
$this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'Primary',
	'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'size'=>'large', // null, 'large', 'small' or 'mini'
	'icon' => 'ok',
)); 
?>
