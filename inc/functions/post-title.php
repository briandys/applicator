<?php // Remove "Private" and "Protected" from Post Titles
// https://css-tricks.com/snippets/wordpress/remove-privateprotected-from-post-titles/

if ( ! function_exists( 'applicator_func_the_title_trim' ) ) {
    function applicator_func_the_title_trim( $title ) {

        $title = esc_attr( $title );

        $findthese = array(
            '#Protected:#',
            '#Private:#'
        );

        $replacewith = array(
            '',
            ''
        );

        $title = preg_replace($findthese, $replacewith, $title);
        return $title;
    }
    add_filter('the_title', 'applicator_func_the_title_trim');
}