<?php // Entry Content
// To enable Child Themes to hook up conditionals in displaying single content without duplicating index.php

if ( ! function_exists( 'applicator_post_content' ) ) {
    function applicator_post_content() {
        get_template_part( 'content', get_post_format() );
    }
}