<article <?php post_class( 'cp' ); ?> data-name="Post">
    <div class="cr post---cr">

        <header class="hr post---hr entry-header">
            <div class="hr_cr post---hr_cr">
                
                <?php
                
                // Markup
                $post_title_obj_start_mu = '<div class="obj %2$s" data-name="%1$s">';
                    $post_title_obj_start_mu .= '<h1 class="h %3$s---h entry-title"><span class="h_l %3$s---h_l">';
                        $post_title_obj_start_mu .= '<a class="a %3$s---a" href="%4$s" rel="bookmark" title="%5$s"><span class="a_l %3$s---a_l">';
                        $post_title_obj_end_mu = '</span></a>';
                    $post_title_obj_end_mu .= '</span></h1>';
                $post_title_obj_end_mu .= '</div>';
                
                // Content
                $post_title_obj_start = sprintf( $post_title_obj_start_mu,
                    'Post Title Object',
                    'post-title-obj',
                    'post-title-obj',
                    esc_url( get_permalink() ),
                    get_the_title()
                );
                
                // Content
                $post_title_obj_end = sprintf( $post_title_obj_end_mu );
                
                the_title( $post_title_obj_start, $post_title_obj_end );
                
                // Hook: After Entry Heading | inc > hooks.php
                apl_hook_after_post_heading();
                
                // Entry Actions | inc > tags > entry-actions.php
                apl_func_post_admin_actions();

                // Breadcrumbs Navigation | inc > tags > breadcumbs-nav.php
                apl_func_breadcrumbs_nav();
                ?>
                
                <div class="aside post-header-aside" data-name="Post Header Aside">
                    <div class="cr post-hr-as---cr">
                        <?php // Post Banner Visual | inc > tags > post-banner-visual.php
                        apl_func_post_banner_visual(); ?>
                        
                        <div class="cp post-meta entry-meta" data-name="Post Meta">
                            <div class="cr post-meta---cr">
                                <div class="h post-meta---h"><span class="h_l post-meta---h_l"><?php esc_html_e( 'Post Meta', 'applicator' ); ?></span></div>
                                <div class="ct post-meta---ct">
                                    <div class="ct_cr post-meta---ct_cr">
                                        <?php
                                        // Published / Modified Timestamp
                                        apl_post_pub_mod_ts();

                                        // Author
                                        apl_func_post_author();

                                        // Categories
                                        apl_func_post_categories();
                                        ?>
                                    </div>
                                </div><!-- ct -->
                            </div>
                        </div><!-- Post Meta -->

                        <?php // Comments Actions Snippet | inc > tags > comments-actions-snippet.php
                        apl_func_comments_actions_snippet();
                        ?>
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
                apl_func_post_nav();
                
                // sub-post
                if ( is_page_template( 'page-templates/sub-pages.php' ) ) {
                    $parent = $post->ID;
                    $args = array(
                        'post_type'     => 'page',
                        'post_status'   => 'publish',
                        'post_parent'   => $parent,
                        'order'         => 'ASC'
                    );

                    $the_query = new WP_Query( $args );

                    if ( $the_query->have_posts() ) { ?>

                        <div class="cp sub-post" data-name="Sub-Post">
                            <div class="cr sub-post---cr">

                        <?php while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            get_template_part( 'content', get_post_format() );
                        } ?>

                            </div>
                        </div><!-- Sub-Post -->

                    <?php }
                    wp_reset_postdata();
                } ?>

            </div>
        </div><!-- ct -->

        <?php if ( 'post' === get_post_type() ) {
            if ( get_the_tag_list('', '', '') ) { ?>

        <footer class="fr post---fr">
            <div class="fr_cr post---fr_cr">
                
                <div class="cp post-meta entry-meta" data-name="Post Meta">
                    <div class="cr post-meta---cr">
                        <div class="h post-meta---h"><span class="h_l post-meta---h_l"><?php esc_html_e( 'Post Meta', 'applicator' ); ?></span></div>
                        <div class="ct post-meta---ct">
                            <div class="ct_cr post-meta---ct_cr">
                                <?php // Tags
                                apl_func_post_tags(); ?>
                            </div>
                        </div><!-- ct -->
                    </div>
                </div><!-- Post Meta -->

            </div>
        </footer><!-- Post Footer -->

        <?php }
        } ?>  

    </div>
</article><!-- Post -->