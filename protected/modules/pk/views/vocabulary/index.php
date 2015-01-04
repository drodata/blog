
<input type="text" class="vocabulary-search form-control" />

<div class="search-result"></div>

<?php
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerCssFile(
	Yii::app()->clientScript->getCoreScriptUrl().
	'/jui/css/base/jquery-ui.css'
);
Yii::app()->clientScript->registerScript(
	'vocabulary-search-autocomplete',
	'
	$(".vocabulary-search").focus();
	$.ajax({ 
	 	type: "POST" 
		,url: "/blog/pk/vocabulary/ajaxGetList" 
		,dateType: "json"
	}).done(function( list ) {
		$(".vocabulary-search").autocomplete({
			source: list,
			minLength: 2,
			autoFocus: true,
			select: function( event, ui ) {
				$.ajax({ 
				 	type: "POST" 
					,url: "/blog/pk/vocabulary/ajaxSearch" 
					,dateType: "json"
					,data: { name: ui.item.value }
				}).done(function( d ) {
					$(".search-result").html( d.result );
				});
			}
		});
	});
	',
	CClientScript::POS_END
);
?>
