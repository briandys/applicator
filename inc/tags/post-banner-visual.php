<?php // Entry Banner Image

if ( ! function_exists( 'apl_func_post_banner_visual' ) ) {
    function apl_func_post_banner_visual() {
        
        if ( '' !== get_the_post_thumbnail() ) {
            $post_banner_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'applicator-entry-banner-image-large' ); ?>

            <div class="obj post-banner-visual-obj post-thumbnail" data-name="Post Banner Visual Object">
                <a class="a post-banner-vis-obj---a" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style="background-image: url('<?php echo esc_url( $post_banner_image[0] ); ?>');">
                    <span class="a_l post-banner-vis-obj---a_l"><span class="ee--img post-banner-vis-obj---ee--img"><?php the_post_thumbnail( 'applicator-entry-banner-image-thumbnail', array( 'class' => 'img post-banner-vis-obj---img' ) ); ?></span></span>
                </a>
            </div>
        
        <?php }
    
    }
}