<article <?php post_class( 'entry' ); ?>>
    <div class="entry--cr">

        <div class="entry--hr">
            <div class="entry--hr--cr">

                <?php the_title( '<h1 class="h entry--h"><a class="a entry--a" href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="' . get_the_title() . '"><span class="a-l">', '</span></a></h1>' ); ?>


                <?php
                // Hook: After Entry Heading
                // inc > hooks.php
                applicator_hook_after_entry_heading(); ?>
                
                
                <?php //------------------------- Entry Banner Image ------------------------- ?>
                <?php if ( '' !== get_the_post_thumbnail() ) : ?>
                <div class="cp entry-banner-image" data-name="Entry Banner Image">
                    <div class="entry-banner-image--cr">
                        <a class="a entry-banner-image--a" href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>">
                            <span class="a-i"><?php the_post_thumbnail( 'applicator-entry-banner-image' ); ?></span>
                        </a>
                    </div>
                </div><!-- entry-banner-image -->
                <?php endif; ?>
                
                
                <?php
                // Entry Actions
                // inc > tags > entry-actions.php
                applicator_entry_actions();

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
        </div><!-- entry--hr -->

        <div class="entry--ct">
            <div class="entry--ct-cr">

                <?php
                if ( ! is_search() || ! is_author() || ! is_archive() ) :
                    the_content();
                else :
                    the_excerpt();
                endif;
                ?>


                <?php //------------------------- Entry Page Navigation ------------------------- ?>
                <?php applicator_entry_page_nav(); ?>


                <?php //------------------------- Sub-Entry ------------------------- ?>
                <?php // Use Page Template: Applicator Page to display the page and all of its sub-pages. ?>

                <?php if ( is_page_template( 'applicator-page.php' ) ) :
                    $parent = $post->ID;
                    $args = array(
                        'post_type'     => 'page',
                        'post_status'   => 'publish',
                        'post_parent'   => $parent,
                        'order'         => 'ASC'
                    );

                    $the_query = new WP_Query( $args );

                    if ( $the_query->have_posts() ) : ?>

                        <div class="sub-entry">
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