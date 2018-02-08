<?php

// Post Banner Visual





function applicator_post_banner_visual()
{

    $post_banner_visual_obj = '';

    if ( '' !== get_the_post_thumbnail() )
    {
        $post_banner_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'applicator-image-size--post-banner-visual--large' );


        // OB: Post Thumbnail
        ob_start();
        the_post_thumbnail( 'applicator-image-size--post-banner-visual--thumbnail', array( 'class' => 'img post-banner-vis---img' ) );
        $post_thumbnail_ob_content = ob_get_clean();


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
                    'elem_label'  => array(
                        'style'     => esc_attr( $style_attr_content ),
                    ),
                ),
            ),
            'css'       => 'post-banner-vis',
            'title'     => esc_html( get_the_title() ),
            'content'   => array(
                'object'    => $post_thumbnail_ob_content,
            ),
        ) );
    }

    return $post_banner_visual_obj;
}





function applicator_post_banner_visual_hooked()
{
    echo applicator_post_banner_visual();
}
add_action( 'applicator_hook_after_post_meta_header_aside', 'applicator_post_banner_visual_hooked' );