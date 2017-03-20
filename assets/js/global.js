( function ( $ ) {
    
    var $html = $( document.documentElement );
	
    
    //-------------------------  Remove DOM Unready Class
    $( function () {
        $html.removeClass( 'dom--unready' );
    } );
    
    

} )( jQuery );