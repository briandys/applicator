<article <?php post_class( 'entry' ); ?>>
    <div class="entry--cr">

        <header class="entry--hr entry-header">
            <div class="entry--hr--cr">

                <?php the_title( '<h1 class="h entry--h entry-title"><a class="a entry--a" href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="' . get_the_title() . '"><span class="a-l">', '</span></a></h1>' ); ?>


                <?php
                // Hook: After Entry Heading
                // inc > hooks.php
                applicator_hook_after_entry_heading(); ?>
                
                
                <?php
                // Entry Actions
                // inc > tags > entry-actions.php
                applicator_entry_actions();
                
                // Entry Banner Image
                // inc > tags > entry-banner-image.php
                applicator_entry_banner_image();

                // Comments Actions Snippet
                // inc > tags > comments-actions-snippet.php
                applicator_comments_actions_snippet();

                // Breadcrumbs Navigation
                // inc > tags > breadcumbs-nav.php
                applicator_breadcrumbs_nav();
                ?>


                <div class="entry-meta">
                    <div class="entry-meta--cr">


                        <?php //------------------------- Published Timestamp ------------------------- ?>
                        <?php applicator_pub_timestamp(); ?>


                        <?php //------------------------- Modified Timestamp ------------------------- ?>
                        <?php applicator_mod_timestamp(); ?>


                        <?php //------------------------- Author ------------------------- ?>
                        <?php applicator_entry_author(); ?>


                        <?php //------------------------- Categories ------------------------- ?>
                        <?php applicator_entry_categories(); ?>

                    </div>
                </div><!-- entry-meta -->

                <?php //------------------------- Hook: After Entry Meta ------------------------- ?>
                <?php applicator_hook_after_entry_meta(); ?>

            </div>
        </header><!-- entry--hr -->

        <div class="entry--ct entry-content">
            <div class="entry--ct-cr">
                
                
                <?php if ( is_home() || is_single() ) {
                    the_content();
                } else {
                   the_excerpt();
                }; ?>


                <?php //------------------------- Entry Page Navigation ------------------------- ?>
                <?php applicator_entry_page_nav(); ?>


                <?php //------------------------- Sub-Entry ------------------------- ?>
                <?php if ( is_page_template( 'page-templates/sub-pages.php' ) ) :
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
                            <div class="sub-entry--cr">

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

        <div class="entry--ft">
            <div class="entry--ft-cr">

                <div class="entry-meta">
                    <div class="entry-meta--cr">


                        <?php //------------------------- Tags ------------------------- ?>
                        <?php applicator_entry_tags(); ?>

                    </div>
                </div><!-- entry-meta -->

            </div>
        </div><!-- entry--ft -->

        <?php }
        } ?>  

    </div>
</article><!-- entry -->