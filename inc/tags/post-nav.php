<?php // Post Navigation | index.php
// Created via <!--nextpage-->
// For Attachment Page, show which Post it belongs

if ( ! function_exists('apl_post_nav' ) ) {
    function apl_post_nav( $args = '' ) {
        
        if ( is_singular() && ! is_singular( 'attachment' ) ) {
            
            $entry_page_nav_start = '<div class="nav entry-page-nav" role="navigation" aria-label="' . esc_html__( 'Entry Page Navigation', 'applicator' ) . '">';
                $entry_page_nav_start .= '<div class="entry-page-nav--cr">';
                    $entry_page_nav_start .= '<div class="h nav--h entry-page-nav--h">';
                        $entry_page_nav_start .= '<span class="entry-page-nav--h-l">';
                            $entry_page_nav_start .= esc_html__( 'Entry Page Navigation', 'applicator' );
                        $entry_page_nav_start .= '</span>';
                    $entry_page_nav_start .= '</div>';

                $entry_page_nav_end = '</div>';
            $entry_page_nav_end .= '</div>';

            wp_link_pages( array(
                'before'          => $entry_page_nav_start,
                'after'          => $entry_page_nav_end,
                'pagelink'       => '<span class="pred-l">Page</span> <span class="subj-l">' . esc_html__( '%', 'applicator' ) . '</span></span>',
                'separator'      => '<span class="comma-sep">' . esc_html__( ', ', 'applicator' ) . '</span>',
                'link_before'   => '<span class="a-l">',
                'link_after'    => '</span>'
            ) );
        
        } elseif ( is_singular( 'attachment' ) ) {
            
            $entry_pub_in = '<span class="entry-published-in--a-l">';
                $entry_pub_in .= '<span class="entry-published-in--pred-l">' . esc_html__( 'Published in', 'applicator' ) . '</span> ';
                $entry_pub_in .= '<span class="entry-published-in--subj-l">%title</span>';
            $entry_pub_in .= '</span>';
            
            the_post_navigation( array(
                'prev_text' => $entry_pub_in,
            ) );
        
        }

    }
}