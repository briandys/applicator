<article <?php post_class( 'cp article post post-site-preview' ); ?> data-name="Post CP">
    <div class="cr post---cr">
        <header class="hr post---hr entry-header">
            <div class="hr_cr post---hr_cr">

                <?php

                // E: Main Post Title
                $post_title_obj = applicator_htmlok( array(
                    'name'      => 'Main Post Title',
                    'structure' => array(
                        'type'      => 'object',
                        'elem'      => 'h2',
                        'linked'    => true,
                        'attr'      => array(
                            'a'         => array(
                                'href'      => esc_url( get_permalink() ),
                                'rel'       => 'bookmark',
                                'title'     => get_the_title(),
                            ),
                        ),
                    ),
                    'content'   => array(
                        'object'        => get_the_title(),
                    ),
                    'echo'      => true,
                ) );

                ?>

            </div>
        </header>

        <?php
        if ( has_excerpt() ) {
        ?>

        <div class="ct post---ct entry-content">
            <div class="ct_cr post---ct_cr">

                <?php
                // OB: Excerpt
                ob_start();
                the_excerpt();
                $excerpt_ob_content = ob_get_contents();
                ob_end_clean();


                // R: Post Excerpt
                $post_excerpt = applicator_htmlok( array(
                    'name'      => 'Post Excerpt',
                    'structure' => array(
                        'type'      => 'component',
                    ),
                    'content'   => array(
                        'component'     => $excerpt_ob_content,
                    ),
                ) );

                // E: Post Excerpt
                echo $post_excerpt;
                ?>

            </div>
        </div>

        <?php
        }
        ?>

    </div>
</article><!-- Post CP -->