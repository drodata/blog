<h3> <?php echo $this->action->id.' '.$this->id;?> </h3>
<?php
echo $this->renderPartial('_form', array(
	'model' => $model,
));	
?>
