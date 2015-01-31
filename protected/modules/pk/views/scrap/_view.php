<div class="row">
	<div class="col-md-12 bg-success">
		<blockquote>
			<?php 
			echo $parsedown->text( $data->content );
			?>
			<footer>
				Source: <?php echo $data->section->source->name; ?>

				<?php 
				echo CHtml::link(
					'<i class="fa fa-pencil"></i>',
					Yii::app()->request->baseUrl.'/'.$this->module->id.'/scrap/update?id='.$data->id
					.'&redirect='.urlencode(Yii::app()->request->url), array(
				));
				echo CHtml::link(
					'<i class="fa fa-times"></i>',
					Yii::app()->request->baseUrl.'/'.$this->module->id.'/scrap/delete?id='.$data->id
					.'&redirect='.urlencode(Yii::app()->request->url), array(
						'confirm' => 'Note: delete clip will also delete clips/quotations belongs to it.',
				));
				echo CHtml::link(
					'add clip',
					Yii::app()->request->baseUrl.'/'.$this->module->id.'/clip/create?scrap_id='
						.$data->id.'&section_id='.$data->section->id, array(
					)
				);
				echo CHtml::link(
					', add a new vocabulary',
					Yii::app()->request->baseUrl.'/'.$this->module->id.'/vocabulary/create?scrap_id='.$data->id, array(
					)
				);
				?>
			</footer>
		</blockquote>
		<?php
		if (isset($data->quotations))
		{
			foreach ($data->quotations as $quotation)
			{
		?>
		<p>
			<b><?=$quotation->explanation->vocabulary->name?></b>:
			<i><?=$quotation->explanation->explanation?></i>
		</p>
		<?php
			}
		}
		?>
	</div>
</div>
<div class="row">
	<div class="col-md-6 bg-warning">
	<?php
	if (isset($data->clips))
	{
		foreach ($data->clips as $clip)
		{
	?>
			<h4><?=$clip->title?></h4>
			<p><?=$parsedown->text( $clip->note )?></p>
			<span class="clip-taxonomy">
				<?=Clip::taxonomyString($clip->id)?>
			</span>
			<footer>
				<?=$clip->c_time?>
				<?php
				echo CHtml::link(
					'update',
					Yii::app()->request->baseUrl.'/'.$this->module->id.'/clip/update?id='.$clip->id
						.'&scrap_id='.$data->id, array(
					)
				);
				echo CHtml::link(
					'<i class="fa fa-times"></i>',
					Yii::app()->request->baseUrl.'/'.$this->module->id.'/clip/delete?id='.$clip->id, array(
						'confirm' => 'Note: are you really delete this clip?',
					)
				);
				?>
			</footer>
	<?php
		}
	}
	?>
	</div>
</div>
<br>
<br>
<?php
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerCssFile(
	Yii::app()->clientScript->getCoreScriptUrl().
	'/jui/css/base/jquery-ui.css'
);
	Yii::app()->clientScript->registerScriptFile(
		$this->module->assetsUrl.'/js/quick-add-clip-taxonomy.js',
		CClientScript::POS_END
	);
?>
