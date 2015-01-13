$(document).ready(function(){
	var wd = $('#section-cu-form');
	var e = wd.afGet('Section');
	e.source_id.change(function(){
		var av = $(this).feValue();
		$.ajax({ 
			 type: "POST" 
			,dataType: "json"
			,url: "/blog/pk/source/ajaxGetSectionList" 
			,data: { source_id: av }
		}).done(function( d ) {
			e.parent.html(d.entity);
		});
	});
});
