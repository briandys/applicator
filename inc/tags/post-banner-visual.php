<?php // Entry Banner Image

if ( ! function_exists( 'apl_func_post_banner_visual' ) ) {
    function apl_func_post_banner_visual() {
        
        if ( '' !== get_the_post_thumbnail() ) {
            $post_banner_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'applicator-entry-banner-image-large' ); ?>

            <div class="obj post-banner-visual post-thumbnail" data-name="Post Banner Visual">
                <a class="a post-bnr-vis---a" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style="background-image: url('<?php echo esc_url( $post_banner_image[0] ); ?>');">
                    <span class="a_l post-bnr-vis---a_l"><span class="ee--img post-bnr-vis---ee--img"><?php the_post_thumbnail( 'applicator-entry-banner-image-thumbnail', array( 'class' => 'img post-bnr-vis---img' ) ); ?></span></span>
                </a>
            </div>
        
        <?php }
    
    }
}