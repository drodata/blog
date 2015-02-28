<?php 
	$this->renderPartial('_view', array(
		'data'=>$model,
	));
?>
<?php
	echo $this->renderPartial('_CUDialog');
?>
