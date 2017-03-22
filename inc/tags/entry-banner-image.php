<?php

// Entry Banner Image

if ( ! function_exists( 'applicator_entry_banner_image' ) ) :
    function applicator_entry_banner_image() {
        
        if ( '' !== get_the_post_thumbnail() ) :
        
        $banner_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'applicator-entry-banner-image-large' ); ?>
        
        <div class="cp entry-banner-image" data-name="Entry Banner Image">
            <div class="entry-banner-image--cr">
                <a class="a entry-banner-image--a" href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>" style="background-image: url('<?php echo esc_url( $banner_bg_image[0] ); ?>');">
                    <span class="a-i"><?php the_post_thumbnail( 'applicator-entry-banner-image-thumbnail', array( 'class' => 'img entry-banner-image--img' ) ); ?></span>
                </a>
            </div>
        </div><!-- entry-banner-image -->
        
        <?php endif;
    
    }
endif;