<p>
	<?=Lookup::item('ExplanationClass', $data->class)?>: 
	<?=$data->explanation?>
	<i><?=$data->native_explanation?></i>
	<a href="<?=Yii::app()->request->baseUrl.'/'.$this->module->id.'/explanation/update?id='.$data->id?>">
		<i class="fa fa-pencil"></i>
	</a>
	</p>
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
			));
		}
		?>
