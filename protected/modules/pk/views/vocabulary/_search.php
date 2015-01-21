<?php
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'name'=>'vocabulary-search',
	'sourceUrl' => '/blog/pk/vocabulary/ajaxGetList',
    'htmlOptions'=>array(
		'class' => 'form-control',
		'style' => 'width:300px;',
		'accesskey' => 'j',
		'placeholder' => 'search vocabulary',
    ),
	'options' => array(
		'minLength' => 2,
		'autoFocus'=>true,
		'select'=> 'js:function( event, ui ) {
			$.ajax({ 
			 	type: "POST" 
				,url: "/blog/pk/vocabulary/ajaxSearch" 
				,dateType: "json"
				,data: { name: ui.item.value }
			}).done(function( d ) {
				$("#general-modal").find(".modal-title").html( d.title );
				$("#general-modal").find(".modal-body").html( d.result );
				$("#general-modal").find(".modal-dialog").addClass("modal-lg");
				$("#general-modal").find("pre code").each(function(i, block) {
					hljs.highlightBlock(block);
				});

				$("#general-modal").find(".native-exp").hide();
				$("li.explanation").hover(
					function() {
						$(this).find(".native-exp").show();
					}, function() {
						$(this).find(".native-exp").hide();
					}
				);
				$("#general-modal").modal({
					backdrop: false,
				});
			});
		}',
	),
));
?>
