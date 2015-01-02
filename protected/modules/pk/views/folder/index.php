<h1><code><?php echo $this->id . '/' . $this->action->id; ?></code></h1>

<div class="row">
	<div class="col-sm-4" id="folder-tree">
	</div>
</div>
<script type="text/javascript"> 
	$(document).ready(function(){
		$('#folder-tree').on('changed.jstree', function(e, data){
			alert('Selected: ' + data.instance.get_node(data.selected).id);
		}).jstree({
			'core' : {
				'data' : {
					'url' : '/blog/pk/folder/ajaxGetChildren',
					'data' : function (node) {
						return { 'id' : node.id };
					}
				}
			}
		});
	});
</script>
<?php $this->widget('bootstrap.widgets.Button', array(
	'buttonType'=>'link', 
	'type'=>'primary', 
	'label'=>'Create',
	'url' => Yii::app()->request->baseUrl.'/'.$this->id.'/create',
	'htmlOptions'=> array(
		//'id' => 'submit',
	),
)); ?>

<?php
$this->widget('bootstrap.widgets.GridView', array(
	'type' => array('striped', 'condensed'),
	'id'=>$this->id.'-grid',
	'dataProvider'=>$model->search(),
	'selectableRows'=>0,
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'parent',
		'position',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update} {delete}',
		),
	),
)); 
?>
