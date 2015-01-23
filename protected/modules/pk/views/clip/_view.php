<div class="clip-item bg-success">
	<h5>
		<?php echo $data->title;?>
	</h5>
	<blockquote>
		<?php 
		echo $parsedown->text( $data->content );
		?>
		<footer>
			Source: <?php echo $data->section->source->name.', @'.$data->c_time; ?>

			<a href="<?=Yii::app()->request->baseUrl.'/'.$this->module->id
				.'/clip/update?id='.$data->id?>">
				<i class="fa fa-pencil"></i>
			</a>
			<a href="<?=Yii::app()->request->baseUrl.'/'.$this->module->id
				.'/clip/delete?id='.$data->id?>">
				<i class="fa fa-times"></i>
			</a>
			<span class="clip-taxonomy">
				<?=Clip::taxonomyString($data->id)?>
			</span>

		</footer>
	</blockquote>
	<?php
	if ($data->note) {
	?>
		<div>
		<p>
			<?php 
			echo $parsedown->text( $data->note );
			?>
		</p>
		</div>

	<?php
	}
	?>
</div>

