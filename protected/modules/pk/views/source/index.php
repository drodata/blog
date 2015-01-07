<h1><code><?php echo $this->id . '/' . $this->action->id; ?></code></h1>


<div class="row">
	<div class="col-sm-12 tree" id="section-tree"></div>
</div>

<script type="text/javascript"> 
	$(document).ready(function(){
		$('#section-tree').jstree({
			'core' : {
				'data' : {
					'url' : '/blog/pk/section/ajaxGetChildren',
					'data' : function (node) {
						return { 'id' : node.id };
					}
				}
			}
		});
		/* search clip
		$('.tree').on('changed.jstree', function(e, data){
			var i, j = [];
			var r = {};
			$('#tree-navi').find('.jstree-clicked').each(function(){
				var id = $(this).parents('.jstree-node').first().attr('id');
				r[ id.split('_')[0] ] = id.split('_')[1];
			});
			$.ajax({ 
				 type: "POST" 
				,dataType: "json"
				,url: "/blog/pk/clip/ajaxSearch" 
				,data: r
				//,beforeSend:loading
			}).done(function( d ) {
				$('#slice-div').html( d.slice );
				$('#content-div').html( d.content );
			});
		});
		*/
	});
</script>

<?php $this->widget('bootstrap.widgets.Button', array(
	'buttonType'=>'link', 
	'type'=>'primary', 
	'label'=>'Create',
	'url' => Yii::app()->request->baseUrl.'/'.$this->module->id.'/'.$this->id.'/create',
	'htmlOptions'=> array(
		//'id' => 'submit',
	),
)); ?>

<?php
$this->widget('bootstrap.widgets.GridView', array(
	'type' => array('striped', 'condensed'),
	'id'=>'source-grid',
	'dataProvider'=>$model->search(),
	'selectableRows'=>0,
	'filter'=>$model,
	'columns'=>array(
		'name',
		'author',
		array(
			'name'=>'type',
			'value'=>'Lookup::item("SourceType", $data->type)',
			'filter'=>Lookup::items('SourceType'),
		),
		'link',
		'note',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update} {delete}',
		),
	),
)); 
?>
