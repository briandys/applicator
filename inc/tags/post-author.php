<?php // Post Author | content.php
/*
Structure:

Published Post Author
• Published Post Label
• Post Author
•• Author Name
•• Author Avatar

Output: Published by Author Name [Author Avatar]
*/

if ( ! function_exists( 'applicator_func_post_author' ) ) {
    function applicator_func_post_author() {
        
        
        // Variables Definitions
        $published_by_term = esc_html__ ( 'Published by', 'applicator' );
        $published_term = esc_html__ ( 'Published', 'applicator' );
        $by_term = esc_html__ ( 'by', 'applicator' );
        $author_content = get_the_author();
        $published_by_author_content = $published_by_term. ' '. $author_content;
        
        
        // R: Post Published by Label
        $post_published_label_obj = applicator_htmlok( array(
            'name'      => 'Post Published by',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'generic label',
            ),
            'css'       => 'post-pub',
            'content'   => array(
                'object' => array(
                    array(
                        'txt'   => $published_term,
                    ),
                    array(
                        'sep'   => $GLOBALS['space_sep'],
                        'txt'   => $by_term,
                    ),
                ),
                'after'     => $GLOBALS['space_sep'],
            ),
        ) );
        
        
        // R: Author Name
        $author_name_obj = applicator_htmlok( array(
            'name'      => 'Author Name',
            'structure' => array(
                'type'      => 'object',
                'linked'    => true,
                'attr'      => array(
                    'a'         => array(
                        'href'      => esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                    ),
                ),
                'layout'    => 'inline',
            ),
            'title'     => $published_by_author_content,
            'content'   => array(
                'object' => array(
                    array(
                        'txt'   => $author_content,
                    ),
                ),
            ),
        ) );
        
        
        // R: Author Avatar
        $author_avatar_obj = applicator_htmlok( array(
            'name'      => 'Author Avatar',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'wordpress generated object',
                'linked'    => true,
                'attr'      => array(
                    'a'         => array(
                        'href'      => esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                    ),
                ),
                'layout'    => 'inline',
            ),
            'title'     => $published_by_author_content,
            'content'   => array(
                'object' => get_avatar(
                    get_the_author_meta( 'ID' ),
                    $size = '48',
                    $default = '',
                    $alt = get_the_author_meta( 'display_name' ) . ' ' . esc_attr__( 'Author Avatar', 'applicator' )
                ),
                'before'    => $GLOBALS['space_sep'],
            ),
        ) );
        
        
        // R: Post Author
        $post_author_cp = applicator_htmlok( array(
            'name'      => 'Post Author',
            'structure' => array(
                'type'      => 'component',
            ),
            'content'   => array(
                'component' => array(
                    $author_name_obj,
                    $author_avatar_obj,
                ),
            ),
        ) );
        
        
        // Conditionals: Blank or Custom Avatar
        $author_avatar_prefix_css = 'author-avatar-default';
        
        if ( get_option( 'avatar_default' ) == 'blank' ) {
            $author_avatar_type_css = $author_avatar_prefix_css . '--blank';
        } else {
            $author_avatar_type_css = $author_avatar_prefix_css . '--custom';
        }
        
        
        // R: Published Post Author
        $published_post_author_cp = applicator_htmlok( array(
            'name'      => 'Published Post Author',
            'structure' => array(
                'type'      => 'component',
            ),
            'root_css'  => $author_avatar_type_css,
            'content'   => array(
                'component' => array(
                    $post_published_label_obj,
                    $post_author_cp,
                ),
            ),
        ) );
        
        return $published_post_author_cp;
    }
}