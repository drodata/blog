	<div class="" id="category-tree">
	<?php // jsTree will populate this div. ?>
	</div>

	<hr>

	<div class="" id="">
		L: <input class="search-label" type="text" accesskey="l"/>
		<br>
		<form class="search-keyword">
			K: <input type="text" accesskey="k"/>
		</form>
		CTime:<?php echo CHtml::dropDownList('c_time','',Essay::getCreateYearMonthList(), array(
			'prompt' => '不限',
			'class' => 'search-date',
		))?>

		<input class="page-number" type="hidden" value="1" />
		<input class="scrolled" type="hidden" value="0" />

		<?php 
		$this->widget('bootstrap.widgets.Button', array(
			'buttonType'=>'link', 
			'url' => '#',
			'type'=>'success', 
			'label'=>'reset',
			'size' => 'xs',
			'htmlOptions' => array(
				'class' => 'search-reset',
				'accesskey' => 'r',
			),
		));
		?>
	</div>
