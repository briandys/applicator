<article <?php post_class( 'cp post--empty' ); ?> data-name="Post">
    <div class="cr post---cr">
        <header class="hr post---hr entry-header">
            <div class="hr_cr post---hr_cr">
                <?php
                
                // Markup
                $post_title_obj_start_mu = '<div class="obj %2$s" data-name="%1$s">';
                    $post_title_obj_start_mu .= '<h1 class="h %3$s---h entry-title"><span class="h_l %3$s---h_l">';
                        $post_title_obj_start_mu .= '%4$s';
                    $post_title_obj_end_mu = '</span></h1>';
                $post_title_obj_end_mu .= '</div>';
                
                // Content
                $post_title_obj_start = sprintf( $post_title_obj_start_mu,
                    'Post Title Object',
                    'post-title-obj',
                    'post-title-obj',
                    esc_html__( 'Nothing Found', 'applicator' )
                );
                
                // Content
                $post_title_obj_end = sprintf( $post_title_obj_end_mu );
                
                // Display
                printf( $post_title_obj_start . $post_title_obj_end );
                
                 // Hook: After Entry Heading | inc > hooks.php
                apl_hook_after_post_heading(); ?>
            </div>
        </header>
        <div class="ct post---ct entry-content">
            <div class="ct_cr post---ct_cr">
                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', $GLOBALS['apl_textdomain'] ); ?></p>
            </div>
        </div><!-- ct -->
    </div>
</article><!-- Post -->