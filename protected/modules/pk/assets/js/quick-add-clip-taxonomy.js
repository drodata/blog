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
