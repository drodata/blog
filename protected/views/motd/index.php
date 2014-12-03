<?php
$this->widget('ext.googlechart.VisualizationChart', array('visualization' => 'SteppedAreaChart',
            'data' => array(
                array('age', 'weight', 'dd'),
                array('dd',11,30),
                array('cc',0,20),
                array('cc',13,30),
                array('cd',14,80),
            ),
            'options' => array(
        )));
$this->widget('ext.googlechart.VisualizationChart', array('visualization' => 'ScatterChart',
            'data' => array(
                array('age', 'weight'),
                array(11,3000),
                array(12,2000),
                array(13,3000),
                array(14,8000),
            ),
            'options' => array(
        )));
$this->widget('ext.googlechart.VisualizationChart', array('visualization' => 'LineChart',
            'data' => array(
                array('Month', 'sales', 'expense'),
                array('一月',3000, 3400),
                array('二月',2000, 3400),
                array('2013',0, 3400),
                array('2014',8000, 40),
            ),
            'options' => array(
        )));
$this->widget('ext.googlechart.VisualizationChart', array('visualization' => 'ColumnChart',
            'data' => array(
                array('Month', 'Y2011', '2012', '2013'),
                array('Jan',3000, 3400, 2400),
                array('Feb',2000, 3400, 1400),
                array('Mar',0, 0, 0),
                array('Apr',8000, 3400, 2400),
                array('5月',8000, 3400, 2400),
                array('6',3000, 1400, 2400),
                array('7',4000, 3400, 2400),
                array('Feb',2000, 3400, 1400),
                array('Mar',0, 0, 0),
                array('Apr',8000, 3400, 2400),
                array('5月',8000, 3400, 2400),
                array('6',3000, 1400, 2400),
            ),
            'options' => array(
        )));
$this->widget('ext.googlechart.VisualizationChart', array('visualization' => 'BarChart',
            'data' => array(
                array('year', 'sales', 'expense'),
                array('2011',3000, 3400),
                array('2012',2000, 3400),
                array('2013',3000, 3400),
                array('2014',8000, 3400),
            ),
            'options' => array(
        )));
$this->widget('ext.googlechart.VisualizationChart', array('visualization' => 'BubbleChart',
            'data' => array(
                array('id', 'life', 'rate', 'region', 'amount'),
                array('can', 40.33, 1.56, 'North America', 332323),
                array('g', 20.33, 3.56, 'Sorth America', 362323),
            ),
            'options' => array(
        )));
$this->widget('ext.googlechart.VisualizationChart', array('visualization' => 'AreaChart',
            'data' => array(
                array('year', 'sales', 'expense'),
                array('2011',3000, 3400),
                array('2012',2000, 3400),
                array('2013',3000, 3400),
                array('2014',8000, 3400),
                array('2015',2000, 3400),
                array('2016',3000, 3400),
                array('2017',3000, 3400),
                array('2018',8000, 3400),
            ),
            'options' => array(
        )));
/* @var $this MotdController */

$this->breadcrumbs=array(
	'Motd',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<a href="/blog/motd/create">新建</a>
<a id="motdCreateBtn" href="">jquery Test</a>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'template'=>"{items}\n{pager}",
)); ?>
<?php
Yii::app()->clientScript->registerScriptFile(
	Yii::app()->baseUrl.'/js/motd.js',
	CClientScript::POS_END
);
?>
