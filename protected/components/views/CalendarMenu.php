	<?php
		$criteria = new CDbCriteria;
		$criteria->order = 'name';
		$cats = Category::model()->findAll( $criteria );

		$opt = '<ul>';
		foreach ($cats as $r) {
			$opt .= '<li>'.CHtml::link($r->name, Yii::app()->request->baseUrl.'/essay/category/'.$r->slug).'</li>';
		}
		$opt .= '<ul>';

		echo  $opt;

	?>
