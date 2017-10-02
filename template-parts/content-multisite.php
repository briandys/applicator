<?php

// Post Classes

// Variables
$on = '--enabled';
$off = '--disabled';
$post_thumbnail_term = 'post-banner-visual';
$post_excerpt_term = 'post-excerpt';

// Post Thumbnail Class
if ( '' !== get_the_post_thumbnail() ) {
    $post_thumbnail_class = ' '. $post_thumbnail_term. $on;
}
else {
    $post_thumbnail_class = ' '. $post_thumbnail_term. $off;
}


// Excerpt Class
if ( has_excerpt() ) {
    $excerpt_class = ' '. $post_excerpt_term. $on;
}
else {
    $excerpt_class = ' '. $post_excerpt_term. $off;
}

// Post Classes Array
$post_classes = array(
    'cp',
    'article',
    'post',
    'post--site-preview',
    $post_thumbnail_class,
    $excerpt_class,
);

// Array Implode
$post_classes = implode( ' ', $post_classes );
?>

<article <?php post_class( $post_classes ); ?> data-name="Post CP">
    <div class="cr post---cr">
        <header class="hr post---hr entry-header">
            <div class="hr_cr post---hr_cr">

                <?php

                // E: Main Post Title
                $main_post_title_obj = '';
                $main_post_title = get_the_title();
                
                if ( $main_post_title ) {
                    $main_post_title_obj = applicator_htmlok( array(
                        'name'      => 'Main Post Title',
                        'structure' => array(
                            'type'      => 'object',
                            'elem'      => 'h1',
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
                }
                
                
                echo applicator_post_banner_visual();

                ?>

            </div>
        </header>

        <?php
        if ( has_excerpt() ) {
        ?>

        <div class="ct post---ct entry-content">
            <div class="ct_cr post---ct_cr">

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
                get_the_title( get_the_ID() ),
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
            $excerpt_ob_content = ob_get_contents();
            ob_end_clean();

            $excerpt_link_content = sprintf( $excerpt_link_mu,
                $excerpt_ob_content,
                'excerpt-link',
                esc_url( get_permalink( get_the_ID() ) ),
                esc_attr__( 'Show More of', 'applicator' ).' '.get_the_title( get_the_ID() )
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
</article><!-- Post CP -->