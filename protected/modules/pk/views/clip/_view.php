<div class="clip-item">
		<span class="clip-taxonomy" data-clip-id="<?=$data->id?>">
			<?=Clip::taxonomyString($data->id)?>
		</span>
	<h4>
		<?php echo $data->title;?>
	</h4>
	<blockquote>
		<?php 
		echo $parsedown->text( $data->scrap->content );
		?>
		<footer>
			<?php 
			echo CHtml::link(
				$data->scrap->section->name,
				Yii::app()->request->baseUrl.'/'.$this->module->id.'/section/view?id='.$data->scrap->section->id, array(
					'title' => 'view all clips in '.implode(' - ', Section::nameList($data->scrap->section->id)),
					'rel' => 'tooltip',
			));
			?>

			<?php 
			echo CHtml::link(
				'<i class="fa fa-pencil"></i>',
				Yii::app()->request->baseUrl.'/'.$this->module->id.'/scrap/update?id='.$data->scrap->id
				.'&redirect='.urlencode(Yii::app()->request->url), array(
			));
			echo CHtml::link(
				'<i class="fa fa-times"></i>',
				Yii::app()->request->baseUrl.'/'.$this->module->id.'/scrap/delete?id='.$data->scrap->id
				.'&redirect='.urlencode(Yii::app()->request->url), array(
					'confirm' => 'Note: delete clip will also delete clips/quotations belongs to it.',
			));
			echo CHtml::link(
				'<i class="fa fa-plus"></i>',
				Yii::app()->request->baseUrl.'/'.$this->module->id.'/vocabulary/create?scrap_id='.$data->scrap->id, array(
					'title' => 'Add a new vocabulary',
				)
			);
			?>

		</footer>
	</blockquote>
	<?php
	/*
	if (isset($data->scrap->quotations))
	{
		$this->renderPartial('/scrap/_quotation', array(
			'quotations' => $data->scrap->quotations,
		));
	}
	*/
	?>
	<div>
		<p>
			<?php 
			echo $parsedown->text( $data->note );
			echo '@ '.$data->c_time;

			echo CHtml::link('<i class="fa fa-pencil"></i>',
				Yii::app()->request->baseUrl.'/'.$this->module->id.'/clip/update?id='.$data->id
				.'&redirect='.urlencode(Yii::app()->request->url), array(
					'title' => 'edit clip',
			));
			echo CHtml::link(
				'<i class="fa fa-times"></i>',
				Yii::app()->request->baseUrl.'/'.$this->module->id.'/clip/delete?id='.$data->id
				.'&redirect='.urlencode(Yii::app()->request->url), array(
					'title' => 'delete clip',
					'confirm' => 'You are about to delete a clip, please confirm.',
			));
			?>
		</p>
	</div>
</div>

