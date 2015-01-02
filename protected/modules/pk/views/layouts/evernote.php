<?php $this->beginContent('/layouts/main'); ?>
	<!--
	<div class="bg-warning" id="tree-navi">
		<h3>Folder</h3>
		<div class="col-sm-12 tree" id="folder-tree" style="overflow:auto;"></div>

		<h3>Sources</h3>
		<div class="col-sm-12 tree" id="section-tree"></div>
	</div>
	<div class="bg-info" id="slice-div">
	</div>
	<div class="" id="content-div">
	</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
		</div>
	</div>
</div>
	-->
<script type="text/javascript"> 
	$(document).ready(function(){
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
				,url: "/pk/clip/ajaxSearch" 
				,data: r
				//,beforeSend:loading
			}).done(function( d ) {
				$('#slice-div').html( d.slice );
				$('#content-div').html( d.content );
			});
		});
		$('#folder-tree').jstree({
			'core' : {
				'data' : {
					'url' : '/pk/folder/ajaxGetChildren',
					'data' : function (node) {
						return { 'id' : node.id };
					}
				}
			}
		});

		$('#section-tree').jstree({
			'core' : {
				'data' : {
					'url' : '/pk/section/ajaxGetChildren',
					'data' : function (node) {
						return { 'id' : node.id };
					}
				}
			}
		});
	});
</script>
<?php $this->endContent(); ?>
