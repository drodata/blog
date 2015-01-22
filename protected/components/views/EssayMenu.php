<?php
?>
<ul>
<li>
<?php echo CHtml::link('Create', Yii::app()->request->baseUrl.'/essay/create',array(
	'accesskey'=>'n',
	'class' => 'EssayCU',
	'data-action' => 'create',
	)); ?>
</li>
</li>
<li>
<?php echo CHtml::link('Category Admin', Yii::app()->request->baseUrl.'/category',array()); ?>
</li>
<li>
<?php echo CHtml::link('Test Page', Yii::app()->request->baseUrl.'/site/test',array()); ?>
</li>
<li><?php echo CHtml::link('Playground', Yii::app()->request->baseUrl.'/z/playground',array()); ?></li>
<li><?php echo CHtml::link('Bootstrap JavaScript', Yii::app()->request->baseUrl.'/page/view/bootstrap-javascript',array()); ?></li>
</ul>
