<?php // Excerpt





// Show More
if ( ! function_exists( 'applicator_show_more' ) )
{
    function applicator_show_more( $show_more_axn )
    {
        
        if ( is_admin() )
        {
            return $show_more_axn;
        }
        
        // Action Item Markup
        $show_more_axn_mu = '<div class="obj axn %9$s %2$s" data-name="%8$s Action Item OBJ">';
            $show_more_axn_mu .= '<a class="a %2$s---a more-link" href="%6$s#content" title="%7$s %10$s">';
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
        $show_more_term = 'Show More';
        
        // R: Show More Action
        $show_more_axn = sprintf( $show_more_axn_mu,
            esc_html( $post_title ),
            $show_more_css.'-axn',
            $show_term,
            $more_term,
            $of_term,
            esc_url( get_permalink( get_the_ID() ) ),
            $show_more_of_term,
            $show_more_term,
            $show_more_css.'-action',
            esc_attr( $post_title )
        );
        
        if ( is_home() || is_singular() || ( is_front_page() && ! is_page() ) )
        {   
            return $show_more_axn;
        }
    
    }
    
    // <!--more-->
    // https://developer.wordpress.org/reference/hooks/the_content_more_link/
    add_filter( 'the_content_more_link', 'applicator_show_more' );
}





// Remove the ellipsis from auto-trimmed excerpt
if ( ! function_exists( 'applicator_excerpt_ellipsis' ) )
{
    function applicator_excerpt_ellipsis( $more ) {
        return '';
    }
    add_filter( 'excerpt_more', 'applicator_excerpt_ellipsis' );
}





// Excerpt
// For Category and Post Detail, display Excerpt created via meta box
// For Archive and Search Pages, display Show More Action
if ( ! function_exists( 'applicator_the_excerpt' ) )
{
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
        
        if ( is_home() || is_singular() || ( is_front_page() && ! is_page() ) )
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
}