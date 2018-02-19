<?php

// Excerpt





// <!--more-->
function applicator_show_more( $show_more_action_obj )
{
    $show_more_action_obj = applicator_htmlok( array(
        'name'      => 'Show More',
        'structure' => array(
            'type'      => 'object',
            'subtype'   => 'action item',
            'linked'    => true,
            'attr'      => array(
                'a'         => array(
                    'href'      => esc_url( get_permalink( get_the_ID() ) ),
                    'title'     => esc_attr__( 'Show More of', 'applicator' ). ' '. get_the_title( get_the_ID() ),
                ),
            ),
        ),
        'content'   => array(
            'object'    => array(
                array(
                    'line'      => array(
                        array(
                            'css'   => 'property---line',
                            array(
                                'txt'       => esc_html__( 'Show', 'applicator' ),
                            ),
                            array(
                                'sep'       => $GLOBALS['applicator_space_sep'],
                                'txt'       => esc_html__( 'More', 'applicator' ),
                            ),
                            array(
                                'sep'       => $GLOBALS['applicator_space_sep'],
                                'txt'       => esc_html__( 'of', 'applicator' ),
                            ),
                        ),
                        array(
                            'css'   => 'value---line',
                            array(
                                'sep'       => $GLOBALS['applicator_space_sep'],
                                'txt'       => esc_html( get_the_title( get_the_ID() ) ),
                                'css'       => 'post-title---txt',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ) );
    
    if ( is_home() || is_archive() )
    {   
        return $show_more_action_obj;
    }
}
add_filter( 'the_content_more_link', 'applicator_show_more' );





// Auto-Excerpt
function applicator_excerpt_ellipsis( $more ) {
    return $GLOBALS['applicator_ellipsis_sep'];
}
add_filter( 'excerpt_more', 'applicator_excerpt_ellipsis' );





// Excerpt Box
function applicator_the_excerpt( $excerpt )
{
    $excerpt_snippet_obj = applicator_htmlok( array(
        'name'      => 'Excerpt Snippet',
        'structure' => array(
            'type'      => 'object',
            'linked'    => true,
            'attr'      => array(
                'a'         => array(
                    'href'      => esc_url( get_permalink( get_the_ID() ) ),
                    'title'     => esc_attr__( 'Show More of', 'applicator' ). ' '. get_the_title( get_the_ID() ),
                ),
            ),
        ),
        'content'   => array(
            'object'        => wp_strip_all_tags( $excerpt ),
        ),
    ) );
    
    $show_more_action_obj = applicator_htmlok( array(
        'name'      => 'Show More',
        'structure' => array(
            'type'      => 'object',
            'subtype'   => 'action item',
            'linked'    => true,
            'attr'      => array(
                'a'         => array(
                    'href'      => esc_url( get_permalink( get_the_ID() ) ),
                    'title'     => esc_attr__( 'Show More of', 'applicator' ). ' '. get_the_title( get_the_ID() ),
                ),
            ),
        ),
        'content'   => array(
            'object'    => array(
                array(
                    'line'      => array(
                        array(
                            'css'   => 'property---line',
                            array(
                                'txt'       => esc_html__( 'Show', 'applicator' ),
                            ),
                            array(
                                'sep'       => $GLOBALS['applicator_space_sep'],
                                'txt'       => esc_html__( 'More', 'applicator' ),
                            ),
                            array(
                                'sep'       => $GLOBALS['applicator_space_sep'],
                                'txt'       => esc_html__( 'of', 'applicator' ),
                            ),
                        ),
                        array(
                            'css'   => 'value---line',
                            array(
                                'sep'       => $GLOBALS['applicator_space_sep'],
                                'txt'       => esc_html( get_the_title( get_the_ID() ) ),
                                'css'       => 'post-title---txt',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ) );

    
    if ( is_search() )
    {
        echo $excerpt_snippet_obj. $show_more_action_obj;
    }
    else
    {
        return $excerpt;
    }
}
add_filter( 'get_the_excerpt', 'applicator_the_excerpt' );