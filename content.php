<article <?php post_class( 'cp' ); ?>>
    <div class="cr post---cr">

        <header class="hr post---hr entry-header">
            <div class="hr_cr post---hr_cr">
                
                <?php
                the_title( '<div class="obj post-title" data-name="Post Title"><h1 class="h post-title---h entry-title"><span class="h_l post-title---h_l"><a class="a post-title---a" href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="' . get_the_title() . '"><span class="a_l post-title---a_l">', '</span></a></span></h1></div>' );
                
                // Hook: After Entry Heading | inc > hooks.php
                applicator_hook_after_entry_heading();
                
                // Entry Actions | inc > tags > entry-actions.php
                applicator_entry_actions();

                // Breadcrumbs Navigation | inc > tags > breadcumbs-nav.php
                applicator_breadcrumbs_nav();
                ?>
                
                <aside class="aside post-header-aside" data-name="Post Header Aside">
                    <div class="cr post-hr-as---cr">
                        <?php
                        // Post Banner Visual | inc > tags > post-banner-visual.php
                        apl_post_banner_visual();

                        // Comments Actions Snippet | inc > tags > comments-actions-snippet.php
                        applicator_comments_actions_snippet();
                        ?>
                        <div class="cp post-meta entry-meta" data-name="Post Meta">
                            <div class="cr post-meta---cr">
                                <div class="h post-meta---h"><span class="h_l post-meta---h_l">Post Meta</span></div>
                                <div class="ct">
                                    <div class="ct_cr">
                                        <?php
                                        // Published Timestamp
                                        applicator_pub_timestamp();

                                        // Modified Timestamp
                                        applicator_mod_timestamp();

                                        // Author
                                        applicator_entry_author();

                                        // Categories
                                        applicator_entry_categories();
                                        ?>
                                    </div>
                                </div><!-- ct -->
                            </div>
                        </div><!-- post-meta -->
                    </div>
                </aside><!-- post-header-aside -->


                

                <?php // Hook: After Entry Meta
                applicator_hook_after_entry_meta(); ?>

            </div>
        </header><!-- post---hr -->

        <div class="ct entry--ct entry-content">
            <div class="ct_cr entry---ct_cr">
                
                
                <?php if ( is_home() || is_singular() ) {
                    the_content();
                } else {
                   the_excerpt();
                }; ?>


                <?php // Entry Page Navigation
                // inc > tags > entry-page-nav.php
                applicator_entry_nav();
                
                // Sub-Entry
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

                        <div class="cp sub-entry" data-name="Sub-Entry">
                            <div class="cr sub-post---cr">

                                <?php while ( $the_query->have_posts() ) :
                                    $the_query->the_post();
                                    get_template_part( 'content', get_post_format() );
                                endwhile; ?>

                            </div>
                        </div><!-- sub-entry -->

                    <?php endif;
                    wp_reset_postdata();
                endif; ?>

            </div>
        </div><!-- entry--ct -->

        <?php if ( 'post' === get_post_type() ) {
            if ( get_the_tag_list('', '', '') ) { ?>

        <div class="ft entry---ft">
            <div class="ft_cr entry---ft_cr">

                <div class="entry-meta">
                    <div class="cr entry-meta---cr">


                        <?php // Tags
                        applicator_entry_tags(); ?>

                    </div>
                </div><!-- entry-meta -->

            </div>
        </div><!-- entry---ft -->

        <?php }
        } ?>  

    </div>
</article><!-- entry -->