<?php
//------------------------- Entry Page Navigation
// index.php

if ( ! function_exists('applicator_entry_page_nav' ) ) :
    function applicator_entry_page_nav( $args = '' ) {
        
        $entry_page_nav_start = '<div class="nav entry-page-nav" role="navigation">';
            $entry_page_nav_start .= '<div class="entry-page-nav--cr">';
                $entry_page_nav_start .= '<div class="entry-page-nav--h">';
                    $entry_page_nav_start .= '<span class="h-l">';
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

    }
endif;