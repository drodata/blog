<?php $this->beginWidget('CMarkdown'); ?>
	[javascript]
	jQuery('#essay-list').yiiListView({
		'ajaxUpdate':['essay-list'],
		'ajaxVar':'ajax',
		'pagerClass':'pagination',
		'loadingClass':'list-view-loading',
		'sorterClass':'sorter',
		'enableHistory':false
	});
## Page Redirect

	[javascript]
	window.location = 'http://example.com';
## 让代码停顿 2 秒后再运行
	
	[javascript]
	setInterval(function(){
		...
	}, 2000);
## for/in 遍历对象;

	[javascript]
	var info = {
		"name": "trekshot",
		"age": 28,
		"married": true,
		"email": "chnkui@gmail.com"
	};
	for (var prop in info) {
		$("Name: " + prop + "; Value: " + info[prop]);
	}

<?php $this->endWidget('CMarkdown'); ?>

