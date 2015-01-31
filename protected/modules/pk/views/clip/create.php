<h3> <?php echo $this->action->id.' '.$this->id;?> </h3>
<?php
echo $this->renderPartial('_cu', array(
	'modelClip'=>$modelClip,
	'modelScrap'=>$modelScrap,
	'formTaxonomy' => $formTaxonomy,
));	
?>
