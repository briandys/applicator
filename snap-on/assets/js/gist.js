// ------------------------------------ Smooth Scrolling
// https://css-tricks.com/smooth-scrolling-accessibility/

( function() {

    function filterPath( string ) {
        return string
            .replace( /^\//, '' )
            .replace( /(index|default).[a-zA-Z]{3,4}$/, '' )
            .replace( /\/$/, '' );
    }

    var locationPath = filterPath( location.pathname );

    $( 'a[href*="#"]' ).each( function() {

        var thisPath = filterPath( this.pathname ) || locationPath;

        var hash = this.hash;

        if ( $( "#" + hash.replace( /#/, '' ) ).length )
        {
             if ( locationPath == thisPath && ( location.hostname == this.hostname || !this.hostname ) && this.hash.replace( /#/, '' ) )
             {
                 var $target = $( hash ),
                     target = this.hash;

                 if ( target )
                 {
                     $( this ).on( 'click.applicator', function ( event ) {
                         event.preventDefault();
                         $htmlBody.stop().animate( {
                             scrollTop: $target.offset().top
                         }, 1000, 'easeInOutCirc', function() {
                             location.hash = target;
                             $target.focus();
                             if ( $target.is( ":focus" ) )
                             {
                                 return false;
                             }
                             else
                             {
                                 $target.attr( 'tabindex', '-1' );
                                 $target.focus();
                             }
                         } );
                     } );
                 }
             }
        }
    } );
}() );