<?php // Post Navigation | index.php
// Created via <!--nextpage-->
// For Attachment Page, show which Post it belongs

if ( ! function_exists('apl_post_nav' ) ) {
    function apl_post_nav( $args = '' ) {
        
        if ( is_singular() && ! is_singular( 'attachment' ) ) {
            
            $post_nav_start_mu = '<div class="nav %3$s" role="navigation" aria-label="%1$s" data-name="Post Navigation">';
                $post_nav_start_mu .= '<div class="cr %3$s---cr">';
                    $post_nav_start_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%2$s</span></div>';
                $post_nav_end_mu = '</div>';
            $post_nav_end_mu .= '</div>';
            
            $post_nav_start = sprintf( $post_nav_start_mu,
                esc_attr__( 'Post Navigation', 'applicator' ),
                esc_html__( 'Post Navigation', 'applicator' ),
                'post-nav'
            );
            
            $post_pagi_navi_a_l_mu = '<span class="a_l post-pagi-navi---a_l"><span class="word page---word">%2$s</span> <span class="num page-num---num">%1$s</span></span></span>';
            
            $post_pagi_navi_a_l = sprintf( $post_pagi_navi_a_l_mu,
                '%',
                esc_html__( 'Page', 'applicator' )
            );
            
            wp_link_pages( array(
                'before'          => $post_nav_start,
                'after'          => $post_nav_end_mu,
                'pagelink'       => $post_pagi_navi_a_l,
                'separator'      => '<span class="sep comma---sep">, </span>'
            ) );
        
        } elseif ( is_singular( 'attachment' ) ) {
            
            $post_published_in_mu = '<span class="a_l post-published-in---a_l">';
                $post_published_in_mu .= '<span class="word post-title---word">%title</span>';
            $post_published_in_mu .= '</span>'; ?>
            
            <span class="line posted-in---line">Posted in</span>
            
            <?php the_post_navigation( array(
                'prev_text' => $post_published_in_mu,
                'screen_reader_text' => __( 'Post Navigation' )
            ) );
        
        }
    }
}