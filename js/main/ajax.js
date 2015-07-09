$( document ).ready( function() {

	$.get( "template/main/overview.php", function( data ) {
	  	$( "#main-view" ).html( data );
	}); 

	$( document ).on( "click", "#send_request", function() {
		var rname = $(this).data('rname');

		$('#myModal').on('shown.bs.modal', function () {
			$( '#r_name' ).html( rname );
	  		$('#request_text').focus();
		})		
	} );
} );