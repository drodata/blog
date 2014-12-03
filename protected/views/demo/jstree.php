<?php
?>
<div class="rows">
	<div class="col-md-3">
		<div id="category-tree">
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
