	<h5>
		<?php echo $data->title;?>
	</h5>
	<blockquote>
		<?php 
		echo $parsedown->text( $data->content );
		?>
		<footer>
			Folder: <?php echo $data->folder->name.', '.$data->section->source->name.', @'.$data->c_time; ?>
			<?php echo CHtml::link('Update',Yii::app()->request->baseUrl.'/pk/clip/update?id='.$data->id); ?>
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

<hr>
