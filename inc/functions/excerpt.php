<?php

// Excerpt





// <!--more-->
function applicator_show_more( $show_more_axn )
{
    // Action Item Markup
    $show_more_axn_mu = '<div class="obj axn %2$s" data-name="%8$s Action Item OBJ">';
        $show_more_axn_mu .= '<a class="a %2$s---a more-link" href="%6$s#content" title="%7$s %9$s">';
            $show_more_axn_mu .= '<span class="a_l %2$s---a_l">';
                $show_more_axn_mu .= '<span class="l %2$s---l">';
                    $show_more_axn_mu .= '<span class="line property---line"><span class="txt show---txt">%3$s</span> <span class="txt more---txt">%4$s</span> <span class="txt of---txt">%5$s</span></span>';
                    $show_more_axn_mu .= ' <span class="line value---line"><span class="txt post-title---txt">%1$s</span></span>';
                $show_more_axn_mu .= '</span>';
            $show_more_axn_mu .= '</span>';
        $show_more_axn_mu .= '</a>';
    $show_more_axn_mu .= '</div>';

    
    // Variables
    $show_more_css = 'show-more';
    $post_title = get_the_title( get_the_ID() );
    $show_term = esc_html__( 'Show', 'applicator' );
    $more_term =  esc_html__( 'More', 'applicator' );
    $of_term = esc_html__( 'of', 'applicator' );
    $show_more_of_term = esc_attr__( 'Show More of', 'applicator' );
    $show_more_term = esc_attr__( 'Show More', 'applicator' );

    
    // R: Show More Action
    $show_more_axn = sprintf( $show_more_axn_mu,
        esc_html( $post_title ),
        esc_attr( $show_more_css.'-action' ),
        $show_term,
        $more_term,
        $of_term,
            esc_url( get_permalink( get_the_ID() ) ),
        $show_more_of_term,
        $show_more_term,
        esc_attr( $post_title )
    );
    
    $show_more_action_obj = applicator_htmlok( array(
        'name'      => 'Show More',
        'structure' => array(
            'type'      => 'object',
            'subtype'   => 'action item',
            'linked'    => true,
            'attr'      => array(
                'a'         => array(
                    'href'      => esc_url( get_permalink( get_the_ID() ) ),
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
                                'txt'       => $show_term,
                            ),
                            array(
                                'sep'       => $GLOBALS['applicator_space_sep'],
                                'txt'       => $more_term,
                            ),
                            array(
                                'sep'       => $GLOBALS['applicator_space_sep'],
                                'txt'       => $of_term,
                            ),
                        ),
                        array(
                            'css'   => 'value---line',
                            array(
                                'sep'       => $GLOBALS['applicator_space_sep'],
                                'txt'       => esc_html( $post_title ),
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
    return '';
}
add_filter( 'excerpt_more', 'applicator_excerpt_ellipsis' );





// Excerpt Box
function applicator_the_excerpt( $excerpt )
{
    // Generic Label Markup
    $show_more_label_mu = '<div class="obj %8$s %2$s" data-name="%7$s Generic Label OBJ">';
        $show_more_label_mu .= '<span class="g %2$s---g" title="%6$s %9$s">';
            $show_more_label_mu .= '<span class="g_l %2$s---g_l">';
                $show_more_label_mu .= '<span class="l %2$s---l">';
                    $show_more_label_mu .= '<span class="line property---line"><span class="txt show---txt">%3$s</span> <span class="txt more---txt">%4$s</span> <span class="txt of---txt">%5$s</span></span>';
                    $show_more_label_mu .= ' <span class="line value---line"><span class="txt post-title---txt">%1$s</span></span>';
                $show_more_label_mu .= '</span>';
            $show_more_label_mu .= '</span>';
        $show_more_label_mu .= '</span>';
    $show_more_label_mu .= '</div>';

    // Variables
    $show_more_css = 'show-more';
    $post_title = get_the_title( get_the_ID() );
    $show_term = esc_html__( 'Show', 'applicator' );
    $more_term =  esc_html__( 'More', 'applicator' );
    $of_term = esc_html__( 'of', 'applicator' );
    $show_more_of_term = esc_attr__( 'Show More of', 'applicator' );
    $show_more_term = 'Show More';

    // R: Show More Label
    $show_more_label = sprintf( $show_more_label_mu,
        esc_html( $post_title ),
        $show_more_css.'-glabel',
        $show_term,
        $more_term,
        $of_term,
        $show_more_of_term,
        $show_more_term,
        $show_more_css.'-action',
        esc_attr( $post_title )
    );

    if ( is_home() || is_singular() || is_archive() )
    {
        return $excerpt;
    }
    else
    {
        // Make the excerpt a link to the entry's detail page
        $excerpt_link_mu = '';
        $excerpt_link_mu .= '<a class="a %2$s" href="%3$s#content" title="%4$s">';
        $excerpt_link_mu .= '%1$s';
        $excerpt_link_mu .= '</a>';

        $excerpt_link_content = sprintf( $excerpt_link_mu,
            $excerpt. $GLOBALS['applicator_ellipsis_sep']. $show_more_label,
            'excerpt-link',
            esc_url( get_permalink( get_the_ID() ) ),
            esc_attr__( 'Show More of', 'applicator' ). ' '. get_the_title( get_the_ID() )
        );

        echo $excerpt_link_content;
    }
}
add_filter( 'get_the_excerpt', 'applicator_the_excerpt' );