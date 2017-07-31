<?php // Entry Banner Image

if ( ! function_exists( 'applicator_func_post_banner_visual' ) ) {
    function applicator_func_post_banner_visual() {
        
        if ( '' !== get_the_post_thumbnail() ) {
            $post_banner_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'applicator-entry-banner-image-large' );
            
            
            // OB: Post Thumbnail
            ob_start();
            the_post_thumbnail( 'applicator-entry-banner-image-thumbnail', array( 'class' => 'img post-banner-vis---img' ) );
            $post_thumbnail_ob_content = ob_get_contents();
            ob_end_clean();
            
            
            // Variables
            $style_attr_content = 'background-image: url('.esc_url( $post_banner_image[0] ).')';
            
            
            // R: Post Banner Visual
            $post_banner_visual_obj = applicator_htmlok( array(
                'name'      => 'Post Banner Visual',
                'structure' => array(
                    'type'      => 'object',
                    'linked'    => true,
                    'attr'      => array(
                        'a'         => array(
                            'href'      => get_the_permalink(),
                        ),
                        'elem'  => array(
                            'style'     => $style_attr_content,
                        ),
                    ),
                ),
                'css'       => 'post-banner-vis',
                'title'     => get_the_title(),
                'content'   => array(
                    'object'    => $post_thumbnail_ob_content,
                ),
            ) );
            
            return $post_banner_visual_obj;
        }
    }
}