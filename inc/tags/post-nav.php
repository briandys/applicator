<?php // Post Navigation | index.php
// Created via <!--nextpage-->
// For Attachment Page, show which Post it belongs

if ( ! function_exists('applicator_func_post_nav' ) ) {
    function applicator_func_post_nav( $args = '' ) {
        
        $GLOBALS['post_nav_start_mu'] = '<div class="nav %3$s" role="navigation" aria-label="%1$s" data-name="Post Navigation">';
            $GLOBALS['post_nav_start_mu'] .= '<div class="cr %3$s---cr">';
                $GLOBALS['post_nav_start_mu'] .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%2$s</span></div>';
                $GLOBALS['post_nav_start_mu'] .= '<div class="ct %3$s---ct">';
                    $GLOBALS['post_nav_start_mu'] .= '<div class="ct_cr %3$s---ct_cr">';
                    $GLOBALS['post_nav_end_mu'] = '</div>';
                $GLOBALS['post_nav_end_mu'] .= '</div>';
            $GLOBALS['post_nav_end_mu'] .= '</div>';
        $GLOBALS['post_nav_end_mu'] .= '</div>';
        
        $GLOBALS['post_nav_start'] = sprintf( $GLOBALS['post_nav_start_mu'],
            esc_attr__( 'Post Navigation', $GLOBALS['applicator_td'] ),
            esc_html__( 'Post Navigation', $GLOBALS['applicator_td'] ),
            'post-nav'
        );
        
        if ( ! is_singular( 'attachment' ) ) {
            
            $post_pagi_navi_a_l_mu = '<span class="a_l post-pagi-navi---a_l"><span class="word page---word">%2$s</span> <span class="num page-num---num">%1$s</span></span></span>';
            
            $post_pagi_navi_a_l = sprintf( $post_pagi_navi_a_l_mu,
                '%',
                esc_html__( 'Page', $GLOBALS['applicator_td'] )
            );
            
            wp_link_pages( array(
                'before'    => $GLOBALS['post_nav_start'],
                'after'     => $GLOBALS['post_nav_end_mu'],
                'pagelink'  => $post_pagi_navi_a_l,
                'separator' => '<span class="sep comma---sep">, </span>'
            ) );
        
        } elseif ( is_singular( 'attachment' ) ) {
            
            if ( get_previous_post_link() ) {
                
                // Markup
                $parent_post_mu = '<div class="cp %2$s" data-name="Parent Post">';
                    $parent_post_mu .= '<div class="cr %3$s---cr">';
                        $parent_post_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%1$s</span></div>';
                        $parent_post_mu .= '<div class="ct %3$s---ct">';
                            $parent_post_mu .= '<div class="ct_cr %3$s---ct_cr">%4$s %5$s</div>';
                        $parent_post_mu .= '</div>';
                    $parent_post_mu .= '</div>';
                $parent_post_mu .= '</div>';

                // Markup
                $posted_in_lbl_mu = '<span class="obj %2$s" data-name="%1$s">';
                    $posted_in_lbl_mu .= '<span class="g %3$s---g"><span class="g_l posted-in-lbl---g_l">%4$s</span></span>';
                $posted_in_lbl_mu .= '</span>';

                // Markup
                $parent_post_navi_mu = '<span class="obj navi %2$s" data-name="%1$s">%4$s</span>';

                // Content
                $posted_in_lbl = sprintf( $posted_in_lbl_mu,
                    'Posted In Label',
                    'posted-in-label',
                    'posted-in-lbl',
                    esc_html__( 'Posted in', $GLOBALS['applicator_td'] )
                );

                // Content
                $parent_post_navi = sprintf( $parent_post_navi_mu,
                    'Parent Post Nav Item',
                    'parent-post-navi',
                    'parent-post-navi',
                    get_previous_post_link( '%link', '%title' )
                );

                // Content
                $parent_post = sprintf( $parent_post_mu,
                    esc_html__( 'Parent Post', $GLOBALS['applicator_td'] ),
                    'parent-post',
                    'parent-post',
                    $posted_in_lbl,
                    $parent_post_navi
                );
                
                printf( $GLOBALS['post_nav_start'] );
                printf( $parent_post );
                printf( $GLOBALS['post_nav_end_mu'] );
            }
        }
    }
}