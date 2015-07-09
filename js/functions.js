$( document ).ready( function() {
	/**
	* 
	* When site fires
	*/
	$.get( "template/login.php", function( data ) {
	  	$( "#front-view" ).html( data );
	  	console.log( 'first login' );
	}); 

	$( document ).on( "click", "#new_account", function(e) {
		e.preventDefault();
		$.get( "template/signup.php", function( data ) {
	  		$( "#front-view" ).html( data );
	  		console.log( 'login' );
		}); 
	} );

	$( document ).on( "click", "#new_login", function(e) {
		e.preventDefault();
		$.get( "template/login.php", function( data ) {
	  		$( "#front-view" ).html( data );
	  		console.log( 'signup' );
		}); 

	} );
} );