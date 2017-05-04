<article <?php post_class( 'cp' ); ?> data-name="Post">
    <div class="cr post---cr">

        <header class="hr post---hr entry-header">
            <div class="hr_cr post---hr_cr">
                
                <?php
                the_title( '<div class="obj post-title" data-name="Post Title"><h1 class="h post-title---h entry-title"><span class="h_l post-title---h_l"><a class="a post-title---a" href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="' . get_the_title() . '"><span class="a_l post-title---a_l">', '</span></a></span></h1></div>' );
                
                // Hook: After Entry Heading | inc > hooks.php
                apl_hook_after_entry_heading();
                
                // Entry Actions | inc > tags > entry-actions.php
                apl_post_actions();

                // Breadcrumbs Navigation | inc > tags > breadcumbs-nav.php
                apl_breadcrumbs_nav();
                ?>
                
                <div class="aside post-header-aside" data-name="Post Header Aside">
                    <div class="cr post-hr-as---cr">
                        <?php
                        // Post Banner Visual | inc > tags > post-banner-visual.php
                        apl_post_banner_visual();

                        // Comments Actions Snippet | inc > tags > comments-actions-snippet.php
                        applicator_comments_actions_snippet();
                        ?>
                        <div class="cp post-meta entry-meta" data-name="Post Meta">
                            <div class="cr post-meta---cr">
                                <div class="h post-meta---h"><span class="h_l post-meta---h_l"><?php esc_html_e( 'Post Meta', 'applicator' ); ?></span></div>
                                <div class="ct post-meta---ct">
                                    <div class="ct_cr post-meta---ct_cr">
                                        <?php
                                        // Published / Modified Timestamp
                                        apl_post_pub_mod();

                                        // Author
                                        apl_post_author();

                                        // Categories
                                        apl_post_categories();
                                        ?>
                                    </div>
                                </div><!-- ct -->
                            </div>
                        </div><!-- Post Meta -->
                    </div>
                </div><!-- Post Header Aside -->

                <?php // Hook: After Entry Meta
                apl_hook_after_post_header_aside(); ?>

            </div>
        </header>
        <div class="ct post---ct entry-content">
            <div class="ct_cr post---ct_cr">
                
                <?php
                if ( is_home() || is_singular() ) {
                    the_content();
                } else {
                   the_excerpt();
                };
                
                // Entry Page Navigation
                // inc > tags > entry-page-nav.php
                apl_post_nav();
                
                // sub-post
                if ( is_page_template( 'page-templates/sub-pages.php' ) ) :
                    $parent = $post->ID;
                    $args = array(
                        'post_type'     => 'page',
                        'post_status'   => 'publish',
                        'post_parent'   => $parent,
                        'order'         => 'ASC'
                    );

                    $the_query = new WP_Query( $args );

                    if ( $the_query->have_posts() ) : ?>

                        <div class="cp sub-post" data-name="Sub-Post">
                            <div class="cr sub-post---cr">

                                <?php while ( $the_query->have_posts() ) :
                                    $the_query->the_post();
                                    get_template_part( 'content', get_post_format() );
                                endwhile; ?>

                            </div>
                        </div><!-- Sub-Post -->

                    <?php endif;
                    wp_reset_postdata();
                endif; ?>

            </div>
        </div><!-- ct -->

        <?php if ( 'post' === get_post_type() ) {
            if ( get_the_tag_list('', '', '') ) { ?>

        <footer class="fr post---fr">
            <div class="fr_cr post---fr_cr">

                <div class="entry-meta">
                    <div class="cr entry-meta---cr">


                        <?php // Tags
                        apl_post_tags(); ?>

                    </div>
                </div><!-- entry-meta -->

            </div>
        </footer><!-- post---fr -->

        <?php }
        } ?>  

    </div>
</article><!-- Post -->