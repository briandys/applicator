<?php // Post Categories | content.php

$GLOBALS['post_classification_mu'] = '<div class="cp %3$s">';
    $GLOBALS['post_classification_mu'] .= '<div class="cr %4$s---cr">';
        $GLOBALS['post_classification_mu'] .= '<div class="h %4$s---h"><span class="h-l %4$s---h_l">%1$s</span></div>';
        $GLOBALS['post_classification_mu'] .= '<div class="ct %4$s---ct">';
            $GLOBALS['post_classification_mu'] .= '<div class="ct_cr %4$s---ct_cr">%5$s %2$s</div>';
        $GLOBALS['post_classification_mu'] .= '</div>';
    $GLOBALS['post_classification_mu'] .= '</div>';
$GLOBALS['post_classification_mu'] .= '</div>';

$GLOBALS['post_classification_lbl_mu'] = '<span class="obj %2$s" data-name="Post %1$s Label">';
    $GLOBALS['post_classification_lbl_mu'] .= '<span class="g %3$s---g"><span class="g_l %3$s---g_l"><span class="word %5$s---word">%4$s</span><span class="sep colon---sep">:</span></span></span>';
$GLOBALS['post_classification_lbl_mu'] .= '</span>';

if ( ! function_exists( 'applicator_func_post_categories' ) ) {
    
    function applicator_func_post_categories() {        
        
        $categories_list = get_the_category_list();
        
        if ( 'post' === get_post_type() ) {
            if ( $categories_list && applicator_func_categorized_blog() ) {
                
                $post_cat_lbl = sprintf( $GLOBALS['post_classification_lbl_mu'],
                    'Category',
                    'post-category-label',
                    'post-cat-lbl',
                    esc_html__( 'Categories', 'applicator' ),
                    'categories'
                );
                
                printf( $GLOBALS['post_classification_mu'],
                    esc_html__( 'Post Category Classification', 'applicator' ),
                    $categories_list,
                    'post-category-classification',
                    'post-cat-class',
                    $post_cat_lbl
                );
            
            }
        }
    }
}

// Post Tags | content.php
if ( ! function_exists( 'applicator_func_post_tags' ) ) {
    
    function applicator_func_post_tags() {        
        
        $tags_list = get_the_tag_list('<ul class="grp post-tag---grp"><li class="item obj post-tag">', '</li><li class="item obj post-tag">', '</li></ul>');
        
        if ( 'post' === get_post_type() ) {
            if ( $tags_list ) {
                
                $post_tag_lbl = sprintf( $GLOBALS['post_classification_lbl_mu'],
                    'Tag',
                    'post-tag-label',
                    'post-tag-lbl',
                    esc_html__( 'Tags', 'applicator' ),
                    'tags'
                );
                
                printf( $GLOBALS['post_classification_mu'],
                    esc_html__( 'Post Tag Classification', 'applicator' ),
                    $tags_list,
                    'post-tag-classification',
                    'post-tag-class',
                    $post_tag_lbl
                );
            
            }
        }  
    }
}

// Determine whether site has more than one category.
function applicator_func_categorized_blog() {
	
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


function applicator_func_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	delete_transient( 'applicator_categories' );
}
add_action( 'edit_category', 'applicator_func_category_transient_flusher' );
add_action( 'save_post',     'applicator_func_category_transient_flusher' );