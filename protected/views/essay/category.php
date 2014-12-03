<?php 
	// index and label alse use this view.

	if (isset($model)) {
		/*
		echo $this->renderPartial('_searchForm', array(
			'model' => $model,
		));
		*/
	} else {
		$model = new EssayLabel;
	}

	$this->widget('bootstrap.widgets.TbListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_list',
		'template'=>"{items}\n{pager}",
		'sortableAttributes'=>array(
			//'essay.c_time',
		),
	)); 
?>
