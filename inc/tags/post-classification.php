<?php

//------------------------- Entry Categories
// content.php
if ( ! function_exists( 'apl_post_categories' ) ) :
    
    function apl_post_categories() {        
        
        $categories_list = get_the_category_list();
        
        if ( 'post' === get_post_type() ) {
            if ( $categories_list && applicator_categorized_blog() ) {
                
                $categories = '<div class="entry-classification categories">';
                    $categories .= '<div class="entry-classification--cr categories--cr">';
                        $categories .= '<div class="h entry-classification--h categories--h" title="%2$s"><span class="h-l">%2$s</span></div>';
                        $categories .= '%1$s';
                    $categories .= '</div>';
                $categories .= '</div>';
                
                printf( $categories,
                    $categories_list,
                    __( 'Categories', 'applicator')
                );
            
            }
        }
    }

endif;


//------------------------- Entry Tags
// content.php
if ( ! function_exists( 'apl_post_tags' ) ) :
    
    function apl_post_tags() {        
        
        $tags_list = get_the_tag_list('<ul class="grp entry-classification--grp tags--grp"><li class="item tags--item">', '</li><li class="item tags--item">', '</li></ul>');
        
        if ( 'post' === get_post_type() ) {
            if ( $tags_list ) {
                
                $tags = '<div class="entry-classification tags">';
                    $tags .= '<div class="entry-classification--cr tags--cr">';
                        $tags .= '<div class="h entry-classification--h tags--h" title="%2$s"><span class="h-l">%2$s</span></div>';
                        $tags .= '%1$s';
                    $tags .= '</div>';
                $tags .= '</div>';
                
                printf( $tags,
                    $tags_list,
                    __( 'Tags', 'applicator')
                );
            
            }
        }  
    }

endif;


// Determine whether site has more than one category.
function applicator_categorized_blog() {
	
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


function applicator_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	delete_transient( 'applicator_categories' );
}
add_action( 'edit_category', 'applicator_category_transient_flusher' );
add_action( 'save_post',     'applicator_category_transient_flusher' );