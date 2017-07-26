<article class="cp article post post--empty" data-name="Post CP">
    <div class="cr post---cr">
        <header class="hr post---hr entry-header">
            <div class="hr_cr post---hr_cr">
                
                <?php
                
                // E: Post Title
                $post_title_obj = htmlok( array(
                    'name'      => 'Post Title',
                    'structure' => array(
                        'type'      => 'object',
                        'elem'      => 'h1',
                    ),
                    'content'   => array(
                        'object'        => array(
                            array(
                                'txt'       => esc_html__( 'Nothing Found', 'applicator' ),
                            ),
                        ),
                    ),
                    'echo'      => true,
                ) );
                
                
                // Hook After Post Heading
                applicator_hook_after_post_heading();
                
                ?>
                
            </div>
        </header>
        <div class="ct post---ct entry-content">
            <div class="ct_cr post---ct_cr">
                
                <?php
                esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'applicator' );
                ?>
                
            </div>
        </div>
    </div>
</article><!-- Post CP -->