<?php // Meta Description


if ( ! function_exists( 'applicator_meta_description' ) )
{
    function applicator_meta_description()
    {
        if ( is_single() )
        {
            global $post;

            if ( ! empty( $post->post_excerpt ) )
            {
                $content = $post->post_excerpt;
            }
            elseif ( ! empty( $post->post_content ) )
            {
                $content = wp_trim_words( $post->post_content, 55, '&hellip;' );
            }
            else
            {
                return;
            }
            ?>

            <meta name="description" content="<?php echo esc_attr( strip_tags( stripslashes( $content ) ) ); ?>">
        <?php
        }

    }
    add_action( 'wp_head', 'applicator_meta_description' );
}
