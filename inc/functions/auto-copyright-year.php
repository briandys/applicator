<?php // Auto Copyright Year

if ( ! function_exists( 'applicator_copyright_year' ) ) {
    function applicator_copyright_year() {
        echo date( 'Y' );
    }
    add_action( 'applicator_auto_copyright_year', 'applicator_copyright_year');
}