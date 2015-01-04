	<p>
		<?=$data->explanation?>
		<i><?=$data->native_explanation?></i>
		<?php echo CHtml::link('Update',Yii::app()->request->baseUrl.'/'.$this->module->id.'/explanation/update?id='.$data->id); ?>
	</p>
	<p>Quotations:</p>
	<ol>
		<?php
		foreach ($data->quotations as $qt) {
			echo '<li>';
			$this->renderPartial('/quotation/_view', array(
				'data' => $qt,
			));
			echo '</li>';
		}
		?>
	</ol>
