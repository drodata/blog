<br>
<br>
<br>
<div class="rows">
	<div class="col-md-12">
	</div>
</div>

<div class="rows">
	<div class="col-md-8">
	<?php $this->beginWidget('CMarkdown'); ?>
## go
	<?php $this->endWidget('CMarkdown'); ?>
	</div>
	<div class="col-md-4">
		<div id="json-data-1"> </div>

		<script type="text/javascript"> 
		$(function(){
			$('#json-data-1').jstree({
				'core' : {
					'data' : [
						{ 
							"id": "abc",
							"parent" : "#",
							"icon": "fa fa-plus",
							"state": {
								"selected": true,
							},
							"text" : "Simple root node",
							"a_attr": {
								"href": "http://baidu.com",
							},
						},
						{ 
							"id": "abc-2",
							"parent" : "abc",
							"icon": "",
							"text" : "go" 
						},
						{ "id" : "json-data-2", "parent" : "#", "text" : "Simple root node2" },
					] 
				}
			});
		});
		</script>
	</div>
</div>

<div class="rows">
	<div class="col-md-3">
		<div id="xcategory-tree">
		</div>
	</div>
	<div class="col-md-9">
	</div>
</div>

<script type="text/javascript"> 
$(function(){

$('#category-tree').jstree({
  "core" : {
    "animation" : 200,
    "check_callback" : true,
    "themes" : {
		 "stripes" : true
	 },
	'data' : {
		'url' : '/blog/category/ajaxGetChildren',
		'data' : function (node) {
			return { 'id' : node.id };
		}
	}
  },
  "types" : {
    "#" : {
      "max_children" : 1, 
      "max_depth" : 4, 
      "valid_children" : ["root"]
    },
    "root" : {
      "icon" : "/static/3.0.8/assets/images/tree_icon.png",
      "valid_children" : ["default"]
    },
    "default" : {
      "valid_children" : ["default","file"]
    },
    "file" : {
      "icon" : "glyphicon glyphicon-file",
      "valid_children" : []
    }
  },
  "plugins" : [
    "contextmenu", "dnd", "search",
    "state", "types", "wholerow"
  ]
});
		/*
	$.jstree.defaults.core.themes= {
		icons: true,
		dots: false,
		variant : "large",
		stripes: true,
	};
	$('#category-tree').on('changed.jstree', function(e, data){

	}).jstree({
		'core' : {
			'data' : {
				'url' : '/blog/category/ajaxGetChildren',
				'data' : function (node) {
					return { 'id' : node.id };
				}
			}
		}
	});
		*/
});
</script>
