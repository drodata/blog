//$.ready(function(){
$(document).ready(function(){
	$.ajax({ 
	 	type: "POST" 
		,url: "/blog/pk/clip/ajaxGetTaxonomy" 
		,dateType: "json"
	}).done(function( d ) {
		function split( val ) {
			return val.split( /,\s*/ );
		}
		function extractLast( term ) {
			return split( term ).pop();
		} 
		$( ".AutoCompleteClipTaxonomy" ).bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB && $( this ).data( "ui-autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			}).autocomplete({
				minLength: 2,
				autoFocus: true,
				source: function( request, response ) {
					response( $.ui.autocomplete.filter(
						d, extractLast( request.term ) ) );
				},
				focus: function() {
					return false;
				},
				select: function( event, ui ) {
					var terms = split( this.value );
					terms.pop();
					terms.push( ui.item.value );
					terms.push( "" );
					this.value = terms.join( ", " );
					return false;
				}
			});

	});
});
