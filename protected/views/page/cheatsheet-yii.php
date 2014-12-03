<?php $this->beginWidget('CMarkdown'); ?>

## 在页面中引入内嵌 CSS 的标签

	[html]
	<style type="text/css">
	</style>
## 在页面中引入内嵌 JavaScript 的标签

	[html]
	<script type="text/javascript"> 
	</script>
## 在`view`文件中引用 jQuery 代码

	[php]
	Yii::app()->clientScript->registerCoreScript('jquery');
## 快速在`view`文件中插入一段 JS 代码

	[php]
	Yii::app()->clientScript->registerScript(
		'auto',
		'ivk_essay_label_autocomplete();',
		CClientScript::POS_END
	);
## 快速在`view`文件中插入 JS 文件

	[php]
	Yii::app()->clientScript->registerScriptFile(
		Yii::app()->baseUrl.'/js/expense.js',
		CClientScript::POS_HEAD
	);

## Create Time Now
	[php]
	new CDbExpression('NOW()');
## 按汉字首字母排序

	[php]
	$criteria->order = 'CONVERT(full_name USING gbk) ASC';
<?php $this->endWidget('CMarkdown'); ?>
