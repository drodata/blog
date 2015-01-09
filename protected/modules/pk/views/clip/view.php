<?php
if ( isset($_GET['section_id']) ) {
	$section = Section::model()->findByPk($_GET['section_id']);
	$section_title = isset($section->link) ? CHtml::link($section->name, $section->link) : $section->name;
	echo '<h2>Clips in《'.$section->source->name.'》—— '.$section_title.'</h2>';
}
?>

<?php $this->widget('bootstrap.widgets.Button', array(
	'buttonType'=> 'link',
	'type'=>'success', 
	'url' => Yii::app()->request->baseUrl.'/'.$this->module->id.'/'.$this->id.'/create',
	'label'=> 'Create',
	'htmlOptions'=> array(
	),
)); ?>

<?php 
$this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'viewData' => array(
		'parsedown' => $parsedown,
	),
	'template'=>"{items}\n{pager}",
)); ?>

<?php
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerCssFile(
	Yii::app()->clientScript->getCoreScriptUrl().
	'/jui/css/base/jquery-ui.css'
);
?>
<script type="text/javascript"> 
	$(document).ready(function(){
		var ipt = $('<input type="text" class="quick-add-taxonomy" />');
		$(document).on('click', '.fa-plus', function(){
			var clipId = $(this).data('id');
			var container = $(this).parents('.clip-taxonomy').first();
			ipt.appendTo($(this).parent());
			$('.quick-add-taxonomy').val('').focus();
			$.ajax({ 
			 	type: "POST" 
				,url: "/blog/pk/clip/ajaxGetTaxonomy" 
				,dateType: "json"
			}).done(function( labels ) {
				$('.quick-add-taxonomy').autocomplete({
					source: labels,
					minLength: 2,
					autoFocus: true,
				});

				$('.quick-add-taxonomy').bind("enterKey",function(e){
					$.ajax({ 
					 	type: "POST" 
						,url: "/blog/pk/clip/ajaxQuickAddTaxonomy" 
						,dateType: "json"
						,data: {
							id: clipId,
							name: $(this).val(),
						}
					}).done(function(d) {
						container.html(d.new);
					}).fail( ajax_fail_handler);
				});
				$('.quick-add-taxonomy').keyup(function(e){
					if(e.keyCode == 13)
					{
						$(this).trigger("enterKey");
					}
				});
			});
			$('.quick-add-taxonomy').blur(function(){
				$(this).remove();
			});
		});
	});
</script>
