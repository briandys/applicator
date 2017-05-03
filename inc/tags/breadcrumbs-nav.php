<?php

//------------------------- Breadcrumbs Navigation
// content.php
// https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin

if ( ! function_exists( 'apl_breadcrumbs_nav' ) ) :
    function apl_breadcrumbs_nav() {    
        
        global $post;

        if ( ! is_front_page() ) {
            
            if ( is_page() ) {
            
                echo '<div class="nav crumbs-nav" role="navigation" aria-label="' . esc_html__( 'Breadcrumbs Navigation', 'applicator' ) . '">';
                echo '<div class="crumbs-nav--cr">';
                echo '<div class="crumbs-nav--h"><span class="h-l">' . esc_html__( 'Breadcrumbs Navigation', 'applicator' ) . '</span></div>';

                $crumbsgrp = '<ul class="grp crumbs-nav--grp">';

                echo $crumbsgrp;
                
                if( $post->post_parent ) {
                    
                    // If child page, get parents 
                    $anc = get_post_ancestors( $post->ID );
                    
                    // Get parents in the right order
                    $anc = array_reverse($anc);
                    
                    // Parent page loop
                    if ( !isset( $parents ) ) $parents = null;
                    foreach ( $anc as $ancestor ) {
                        $parents .= '<li class="item crumbs-nav-item crumbs-nav-item-' . $ancestor . '"><a class="a crumbs-nav--a" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '"><span class="l">' . get_the_title($ancestor) . '</span></a>' . $crumbsgrp;
                    }
                    
                    // Display parent pages
                    echo $parents;
                    
                    // Current page
                    echo '<li class="item crumbs-nav-item crumbs-nav-item-' . $post->ID . '">' . get_the_title() . '</li></ul>';
                    
                } else {
                    
                    // Just display current page if not parents
                    echo '<li class="item crumbs-nav-item crumbs-nav-item-' . $post->ID . '">' . get_the_title() . '</li></ul>';

                }
            
                echo '</ul>';
                echo '</div>';
                echo '</div>';
                
            }
        }
    }
endif;