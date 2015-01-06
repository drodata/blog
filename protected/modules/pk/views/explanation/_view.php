	<span class="h3 text-info">
		<?=$parsedown->text($data->explanation)?>
	</span>
	<span class="label label-primary">
		<?=Lookup::item('ExplanationClass', $data->class)?>
	</span>
	<?=Explanation::taxonomyString($data->id)?>
	<span class="h6">
		<?=$data->native_explanation?>
	</span>
	<a href="<?=Yii::app()->request->baseUrl.'/'.$this->module->id.'/explanation/update?id='.$data->id?>">
		<i class="fa fa-pencil"></i>
	</a>
	<p>
		<a href="<?=Yii::app()->request->baseUrl.'/'.$this->module->id
			.'/quotation/create?explanation_id='.$data->id?>">
			<i class="fa fa-plus"></i>
		</a>
	</p>
	<?php
	foreach ($data->quotations as $qt) {
		$this->renderPartial('/quotation/_view', array(
			'data' => $qt,
			'parsedown' => $parsedown,
		));
	}
	?>
