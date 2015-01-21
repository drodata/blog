<div class="row">
	<div class="col-md-6">
		<?php 
		$this->widget('bootstrap.widgets.TbListView', array(
			'dataProvider'=>$clipDataProvider,
			'itemView'=>'clip/_view',
			'viewData' => array(
				'parsedown' => $parsedown,
			),
			'template'=>"{items}\n{pager}",
		)); ?>
	</div>
	<div class="col-md-6">
		<?php 
		/*
		$this->widget('bootstrap.widgets.TbListView', array(
			'dataProvider'=>$quotationDataProvider,
			'itemView'=>'quotation/_view',
			'viewData' => array(
				'parsedown' => $parsedown,
			),
			'template'=>"{items}\n{pager}",
		)); 
		*/
		?>
	</div>
</div>
