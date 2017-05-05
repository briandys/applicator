<?php // Post Categories | content.php

$GLOBALS['post_cat_tag_mu'] = '<div class="cp %3$s">';
    $GLOBALS['post_cat_tag_mu'] .= '<div class="cr %4$s---cr">';
        $GLOBALS['post_cat_tag_mu'] .= '<div class="h %4$s---h"><span class="h-l %4$s---h_l">%1$s</span></div>';
        $GLOBALS['post_cat_tag_mu'] .= '<div class="ct %4$s---ct">';
            $GLOBALS['post_cat_tag_mu'] .= '<div class="ct_cr %4$s---ct_cr">%2$s</div>';
        $GLOBALS['post_cat_tag_mu'] .= '</div>';
    $GLOBALS['post_cat_tag_mu'] .= '</div>';
$GLOBALS['post_cat_tag_mu'] .= '</div>';

if ( ! function_exists( 'apl_func_post_categories' ) ) {
    
    function apl_func_post_categories() {        
        
        $categories_list = get_the_category_list();
        
        if ( 'post' === get_post_type() ) {
            if ( $categories_list && apl_func_categorized_blog() ) {
                
                printf( $GLOBALS['post_cat_tag_mu'],
                    esc_html__( 'Post Categories', 'applicator' ),
                    $categories_list,
                    'post-category',
                    'post-cat'
                );
            
            }
        }
    }
}

// Post Tags | content.php
if ( ! function_exists( 'apl_func_post_tags' ) ) {
    
    function apl_func_post_tags() {        
        
        $tags_list = get_the_tag_list('<ul class="grp post-tag---grp"><li class="item obj post-tag-item">', '</li><li class="item obj post-tag-item">', '</li></ul>');
        
        if ( 'post' === get_post_type() ) {
            if ( $tags_list ) {
                
                printf( $GLOBALS['post_cat_tag_mu'],
                    esc_html__( 'Post Tags', 'applicator' ),
                    $tags_list,
                    'post-tag',
                    'post-tag'
                );
            
            }
        }  
    }
}

// Determine whether site has more than one category.
function apl_func_categorized_blog() {
	
    $category_count = get_transient( 'applicator_categories' );
    
    if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'applicator_categories', $category_count );
	}

	return $category_count > 1;
}


function apl_func_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	delete_transient( 'applicator_categories' );
}
add_action( 'edit_category', 'apl_func_category_transient_flusher' );
add_action( 'save_post',     'apl_func_category_transient_flusher' );