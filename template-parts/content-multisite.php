<article <?php post_class(); ?> data-name="Post CP">
    <div class="cr post---cr">
        <header class="hr post---hr entry-header">
            <div class="hr_cr post---hr_cr">

                <?php
                
                // E: Post Title
                $post_title_obj = '';
                $post_title = get_the_title();
                
                if ( $post_title ) {
                    $post_title = get_the_title();
                }
                else {
                    $post_title = __( 'Post', 'applicator' ). ' '. get_the_ID();
                }
                
                
                // R: Post Title Object
                $post_title_obj = applicator_htmlok( array(
                    'name'      => 'Post Title',
                    'structure' => array(
                        'type'      => 'object',
                        'elem'      => 'h1',
                        'linked'    => true,
                        'attr'      => array(
                            'a'         => array(
                                'href'      => esc_url( get_permalink() ),
                                'rel'       => 'bookmark',
                                'title'     => esc_attr( $post_title ),
                            ),
                        ),
                    ),
                    'content'   => array(
                        'object'        => esc_html( $post_title ),
                    ),
                ) );
                
                
                // E: Main Post Title
                $main_post_title = applicator_htmlok( array(
                    'name'      => 'Main Post Title',
                    'structure' => array(
                        'type'      => 'component'
                    ),
                    'content'   => array(
                        'component'     => array(
                            
                            $post_title_obj,
                        ),
                    ),
                    'echo'      => true,
                ) );
                
                
                echo applicator_post_banner_visual();

                ?>

            </div>
        </header>

        <?php
        if ( has_excerpt() ) {
        ?>

        <div class="mn post---mn entry-content">
            <div class="mn_cr post---mn_cr">

            <?php
            
            $show_more_axn_mu = '<div class="obj axn %2$s" data-name="%8$s Action Item OBJ">';
                $show_more_axn_mu .= '<a class="a %2$s---a more-link" href="%6$s#content" title="%7$s %1$s">';
                    $show_more_axn_mu .= '<span class="a_l %2$s---a_l">';
                        $show_more_axn_mu .= '<span class="l %2$s---l">';
                            $show_more_axn_mu .= '<span class="line property---line"><span class="txt show---txt">%3$s</span> <span class="txt more---txt">%4$s</span> <span class="txt of---txt">%5$s</span></span>';
                            $show_more_axn_mu .= ' <span class="line value---line"><span class="txt post-title---txt">%1$s</span></span>';
                        $show_more_axn_mu .= '</span>';
                    $show_more_axn_mu .= '</span>';
                $show_more_axn_mu .= '</a>';
            $show_more_axn_mu .= '</div>';
            
            $show_more_css = 'show-more';
            $show_term = esc_html__( 'Show', 'applicator' );
            $more_term =  esc_html__( 'More', 'applicator' );
            $of_term = esc_html__( 'of', 'applicator' );
            $show_more_of_term = esc_attr__( 'Show More of', 'applicator' );
            $show_more_term = 'Show More';

            $show_more_axn = sprintf( $show_more_axn_mu,
                esc_html( get_the_title( get_the_ID() ) ),
                $show_more_css.'-axn',
                $show_term,
                $more_term,
                $of_term,
                esc_url( get_permalink( get_the_ID() ) ),
                $show_more_of_term,
                $show_more_term
            );


            // R: Post Excerpt Link
            $excerpt_link_mu = '';
            $excerpt_link_mu .= '<a class="a %2$s" href="%3$s#content" title="%4$s">';
            $excerpt_link_mu .= '%1$s';
            $excerpt_link_mu .= '</a>';
            
            // OB: Excerpt
            ob_start();
            the_excerpt();
            $excerpt_ob_content = ob_get_clean();

            $excerpt_link_content = sprintf( $excerpt_link_mu,
                $excerpt_ob_content,
                'excerpt-link',
                esc_url( get_permalink( get_the_ID() ) ),
                esc_attr__( 'Show More of', 'applicator' ). ' '. get_the_title( get_the_ID() )
            );


            // E: Post Excerpt
            $post_excerpt = applicator_htmlok( array(
                'name'      => 'Post Excerpt',
                'structure' => array(
                    'type'      => 'component',
                ),
                'content'   => array(
                    'component'     => array(
                        $excerpt_link_content,
                        $show_more_axn,
                    ),
                ),
                'echo'      => true,
            ) );
            ?>

            </div>
        </div>

        <?php
        }
        ?>

    </div>
</article>