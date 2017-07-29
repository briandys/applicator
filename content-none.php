<article class="cp article post post--empty" data-name="Post CP">
    <div class="cr post---cr">
        <header class="hr post---hr entry-header">
            <div class="hr_cr post---hr_cr">
                
                <?php
                
                // E: Main Post Title
                $post_title_obj = htmlok( array(
                    'name'      => 'Main Post Title',
                    'structure' => array(
                        'type'      => 'object',
                        'elem'      => 'h1',
                    ),
                    'root_css'  => 'apl-main-post-title',
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
                
                // OB: Search
                ob_start();
                get_search_form();
                $search_ob_content = ob_get_contents();
                ob_end_clean();
                    
                // E: Post Content
                $post_content = htmlok( array(
                    'name'      => 'Post Content',
                    'structure' => array(
                        'type'      => 'component',
                    ),
                    'content'   => array(
                        'component'     => array(
                            '<p>'.esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'applicator' ).'</p>',
                            '<p>'.esc_html__( 'Please try another search term.', 'applicator' ).'</p>',
                            $search_ob_content,
                        ),
                    ),
                    'echo'      => true,
                ) );
                
                ?>
            </div>
        </div>
    </div>
</article><!-- Post CP -->