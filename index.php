<?php
if ( function_exists( 'get_header' ) ) {
    get_header();
} else {
    die();
}
        $main_ct_hr_mu = '<div class="hr main-content---hr" data-name="Main Content Header">';
            $main_ct_hr_mu .= '<div class="hr_cr main-ct---hr_cr">';
                $main_ct_hr_mu .= '<h2 class="h main-ct---h"><span class="h_l main-ct---h_l">%1$s</span></h2>';

        if ( is_front_page() ) {
            printf ( $main_ct_hr_mu,
                esc_html__( 'Home', 'applicator' )
            );
        } elseif ( is_singular() ) {
            if ( is_single() && ! is_attachment() ) {
                printf ( $main_ct_hr_mu,
                    esc_html__( 'Single', 'applicator' )
                );
            } elseif ( is_page() ) {
                printf ( $main_ct_hr_mu,
                    esc_html__( 'Page', 'applicator' )
                );
            } elseif ( is_attachment() ) {
                printf ( $main_ct_hr_mu,
                    esc_html__( 'Attachment', 'applicator' )
                );
            } else {
                printf ( $main_ct_hr_mu,
                    esc_html__( 'Other', 'applicator' )
                );
            }
        } else {
            printf ( $main_ct_hr_mu,
                esc_html__( 'Other', 'applicator' )
            );
        }

        // Post
        if ( is_single() || ( is_home() && ! is_front_page() ) || ( is_page() && ! is_front_page() ) ) {
            
            $title = '';
            $prop = 'Entry';
            $label = $prop;
            $val = 'Single';
            
            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $val_content = sprintf( $val_mu,
                $val,
                sanitize_title( $val )
            );
            
            // Markup
            $prop_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $prop_content = sprintf( $prop_mu,
                esc_html__( $label, 'applicator' ),
                sanitize_title( $label )
            );
            
            // Markup
            $main_ct_h_l_mu = '<span class="prop %2$s---prop" title="%5$s">';
                $main_ct_h_l_mu .= '%4$s';
                $main_ct_h_l_mu .= '%6$s';
            $main_ct_h_l_mu .= '</span>';
            $main_ct_h_l_mu .= ' <span class="val %2$s---val" title="%3$s">';
                $main_ct_h_l_mu .= '%1$s';
            $main_ct_h_l_mu .= '</span>';
            
            // Content
            $title = sprintf( $main_ct_h_l_mu,
                $val_content,
                sanitize_title( $prop ),
                esc_attr__( $val, 'applicator' ),
                $prop_content,
                esc_attr__( $prop, 'applicator' ),
                $GLOBALS['colon_sep_mu']
            );
            
            // Display
            printf ( $main_ct_hr_mu,
                $title
            );
        }

        // Post Type Archive
        if ( is_post_type_archive() ) {
            
            $title = '';
            $prop = 'Post Type Archive';
            $label = $prop;
            
            $post_type = get_query_var( 'post_type' );
            if ( is_array( $post_type ) ) {
                $post_type = reset( $post_type );
            }
            
            $post_type_object = get_post_type_object( $post_type );
            if ( ! $post_type_object->has_archive ) {
                $val = post_type_archive_title( '', false );
            }
            
            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $val_content = sprintf( $val_mu,
                $val,
                sanitize_title( $val )
            );
            
            // Markup
            $prop_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $prop_content = sprintf( $prop_mu,
                esc_html__( $label, 'applicator' ),
                sanitize_title( $label )
            );
            
            // Markup
            $main_ct_h_l_mu = '<span class="prop %2$s---prop" title="%5$s">';
                $main_ct_h_l_mu .= '%4$s';
                $main_ct_h_l_mu .= '%6$s';
            $main_ct_h_l_mu .= '</span>';
            $main_ct_h_l_mu .= ' <span class="val %2$s---val" title="%3$s">';
                $main_ct_h_l_mu .= '%1$s';
            $main_ct_h_l_mu .= '</span>';
            
            // Content
            $title = sprintf( $main_ct_h_l_mu,
                $val_content,
                sanitize_title( $prop ),
                esc_attr__( $val, 'applicator' ),
                $prop_content,
                esc_attr__( $prop, 'applicator' ),
                $GLOBALS['colon_sep_mu']
            );
            
            // Display
            printf ( $main_ct_hr_mu,
                $title
            );
        }

        // Category or Tag
        if ( is_category() || is_tag() ) {
            
            $title = '';
            
            $prop = '';
            if ( is_category() ) {
                $prop = 'Category';
            }
            if ( is_tag() ) {
                $prop = 'Tag';
            }
            
            $label = $prop;
            $val = single_term_title( '', false );
            
            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $val_content = sprintf( $val_mu,
                $val,
                sanitize_title( $val )
            );
            
            // Markup
            $prop_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $prop_content = sprintf( $prop_mu,
                esc_html__( $label, 'applicator' ),
                sanitize_title( $label )
            );
            
            // Markup
            $main_ct_h_l_mu = '<span class="prop %2$s---prop" title="%5$s">';
                $main_ct_h_l_mu .= '%4$s';
                $main_ct_h_l_mu .= '%6$s';
            $main_ct_h_l_mu .= '</span>';
            $main_ct_h_l_mu .= ' <span class="val %2$s---val" title="%3$s">';
                $main_ct_h_l_mu .= '%1$s';
            $main_ct_h_l_mu .= '</span>';
            
            // Content
            $title = sprintf( $main_ct_h_l_mu,
                $val_content,
                sanitize_title( $prop ),
                esc_attr__( $val, 'applicator' ),
                $prop_content,
                esc_attr__( $prop, 'applicator' ),
                $GLOBALS['colon_sep_mu']
            );
            
            // Display
            printf ( $main_ct_hr_mu,
                $title
            );
        }

        // Taxonomy
        if ( is_tax() ) {
            
            $title = '';
            $prop = 'Taxonomy';
            $label = $prop;
            $sep = ', ';
            
            $term = get_queried_object();
            if ( $term ) {
                $tax   = get_taxonomy( $term->taxonomy );
                $val = single_term_title( $tax->labels->name . $sep, false );
            }
            
            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $val_content = sprintf( $val_mu,
                $val,
                sanitize_title( $val )
            );
            
            // Markup
            $prop_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $prop_content = sprintf( $prop_mu,
                esc_html__( $label, 'applicator' ),
                sanitize_title( $label )
            );
            
            // Markup
            $main_ct_h_l_mu = '<span class="prop %2$s---prop" title="%5$s">';
                $main_ct_h_l_mu .= '%4$s';
                $main_ct_h_l_mu .= '%6$s';
            $main_ct_h_l_mu .= '</span>';
            $main_ct_h_l_mu .= ' <span class="val %2$s---val" title="%3$s">';
                $main_ct_h_l_mu .= '%1$s';
            $main_ct_h_l_mu .= '</span>';
            
            // Content
            $title = sprintf( $main_ct_h_l_mu,
                $val_content,
                sanitize_title( $prop ),
                esc_attr__( $val, 'applicator' ),
                $prop_content,
                esc_attr__( $prop, 'applicator' ),
                $GLOBALS['colon_sep_mu']
            );
            
            // Display
            printf ( $main_ct_hr_mu,
                $title
            );
        }

        // Author
        if ( is_author() && ! is_post_type_archive() ) {
            
            $title = '';
            $prop = 'Author';
            $label = 'All Entries Published by';
            
            $author = get_queried_object();
            if ( $author ) {
                $val = $author->display_name;
            }
            
            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $val_content = sprintf( $val_mu,
                $val,
                sanitize_title( $val )
            );
            
            // Markup
            $prop_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $prop_content = sprintf( $prop_mu,
                esc_html__( $label, 'applicator' ),
                sanitize_title( $label )
            );
            
            // Markup
            $main_ct_h_l_mu = '<span class="prop %2$s---prop" title="%5$s">';
                $main_ct_h_l_mu .= '%4$s';
                $main_ct_h_l_mu .= '%6$s';
            $main_ct_h_l_mu .= '</span>';
            $main_ct_h_l_mu .= ' <span class="val %2$s---val" title="%3$s">';
                $main_ct_h_l_mu .= '%1$s';
            $main_ct_h_l_mu .= '</span>';
            
            // Content
            $title = sprintf( $main_ct_h_l_mu,
                $val_content,
                sanitize_title( $prop ),
                esc_attr__( $val, 'applicator' ),
                $prop_content,
                esc_attr__( $prop, 'applicator' ),
                $GLOBALS['colon_sep_mu']
            );
            
            // Display
            printf ( $main_ct_hr_mu,
                $title
            );
        }

        // Post Type Archive with has_archive should override terms.
        if ( is_post_type_archive() && $post_type_object->has_archive ) {
            
            $title = '';
            $prop = 'Post Type Archive';
            $label = $prop;
            $val = post_type_archive_title( '', false );
            
            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $val_content = sprintf( $val_mu,
                $val,
                sanitize_title( $val )
            );
            
            // Markup
            $prop_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $prop_content = sprintf( $prop_mu,
                esc_html__( $label, 'applicator' ),
                sanitize_title( $label )
            );
            
            // Markup
            $main_ct_h_l_mu = '<span class="prop %2$s---prop" title="%5$s">';
                $main_ct_h_l_mu .= '%4$s';
                $main_ct_h_l_mu .= '%6$s';
            $main_ct_h_l_mu .= '</span>';
            $main_ct_h_l_mu .= ' <span class="val %2$s---val" title="%3$s">';
                $main_ct_h_l_mu .= '%1$s';
            $main_ct_h_l_mu .= '</span>';
            
            // Content
            $title = sprintf( $main_ct_h_l_mu,
                $val_content,
                sanitize_title( $prop ),
                esc_attr__( $val, 'applicator' ),
                $prop_content,
                esc_attr__( $prop, 'applicator' ),
                $GLOBALS['colon_sep_mu']
            );
            
            // Display
            printf ( $main_ct_hr_mu,
                $title
            );
        }

        // Daily Archive
        if ( is_archive() && is_day() ) {
            
            $title = '';
            $prop = 'Daily Archive';
            $label = $prop;
            $val = get_the_date( 'j F Y' );
            $val_d = get_the_date( 'j' );
            $val_d_prefix = 'day';
            $val_m = get_the_date( 'F' );
            $val_m_prefix = 'month';
            $val_y = get_the_date( 'Y' );
            $val_y_prefix = 'year';
            $val_txt_suffix = '---txt';
            
            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';
            $val_mu .= ' <span class="txt %4$s---txt">%3$s</span>';
            $val_mu .= ' <span class="txt %6$s---txt">%5$s</span>';
            
            // Content
            $val_content = sprintf( $val_mu,
                $val_d,
                $val_d_prefix . $val_txt_suffix . ' ' . $val_d_prefix . '-' . sanitize_title( $val_d ),
                $val_m,
                $val_m_prefix . $val_txt_suffix . ' ' . sanitize_title( $val_m ),
                $val_y,
                $val_y_prefix . $val_txt_suffix . ' ' . $val_y_prefix . '-' . sanitize_title( $val_y )
            );
            
            // Markup
            $prop_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $prop_content = sprintf( $prop_mu,
                esc_html__( $label, 'applicator' ),
                sanitize_title( $label )
            );
            
            // Markup
            $main_ct_h_l_mu = '<span class="prop %2$s---prop" title="%5$s">';
                $main_ct_h_l_mu .= '%4$s';
                $main_ct_h_l_mu .= '%6$s';
            $main_ct_h_l_mu .= '</span>';
            $main_ct_h_l_mu .= ' <span class="val %2$s---val" title="%3$s">';
                $main_ct_h_l_mu .= '%1$s';
            $main_ct_h_l_mu .= '</span>';
            
            // Content
            $title = sprintf( $main_ct_h_l_mu,
                $val_content,
                sanitize_title( $prop ),
                esc_attr__( $val, 'applicator' ),
                $prop_content,
                esc_attr__( $prop, 'applicator' ),
                $GLOBALS['colon_sep_mu']
            );
            
            // Display
            printf ( $main_ct_hr_mu,
                $title
            );
        }

        // Monthly Archive
        if ( is_archive() && is_month() ) {
            
            $title = '';
            $prop = 'Monthly Archive';
            $label = $prop;
            $val = get_the_date( 'F Y' );
            $val_m = get_the_date( 'F' );
            $val_m_prefix = 'month';
            $val_y = get_the_date( 'Y' );
            $val_y_prefix = 'year';
            $val_txt_suffix = '---txt';
            
            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';
            $val_mu .= ' <span class="txt %4$s---txt">%3$s</span>';
            
            // Content
            $val_content = sprintf( $val_mu,
                $val_m,
                $val_m_prefix . $val_txt_suffix . ' ' . sanitize_title( $val_m ),
                $val_y,
                $val_y_prefix . $val_txt_suffix . ' ' . $val_y_prefix . '-' . sanitize_title( $val_y )
            );
            
            // Markup
            $prop_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $prop_content = sprintf( $prop_mu,
                esc_html__( $label, 'applicator' ),
                sanitize_title( $label )
            );
            
            // Markup
            $main_ct_h_l_mu = '<span class="prop %2$s---prop" title="%5$s">';
                $main_ct_h_l_mu .= '%4$s';
                $main_ct_h_l_mu .= '%6$s';
            $main_ct_h_l_mu .= '</span>';
            $main_ct_h_l_mu .= ' <span class="val %2$s---val" title="%3$s">';
                $main_ct_h_l_mu .= '%1$s';
            $main_ct_h_l_mu .= '</span>';
            
            // Content
            $title = sprintf( $main_ct_h_l_mu,
                $val_content,
                sanitize_title( $prop ),
                esc_attr__( $val, 'applicator' ),
                $prop_content,
                esc_attr__( $prop, 'applicator' ),
                $GLOBALS['colon_sep_mu']
            );
            
            // Display
            printf ( $main_ct_hr_mu,
                $title
            );
        }

        // Yearly Archive
        if ( is_archive() && is_year() ) {
            
            $title = '';
            $prop = 'Yearly Archive';
            $label = $prop;
            $val = get_the_date( 'Y' );
            $val_y_prefix = 'year';
            $val_txt_suffix = '---txt';
            
            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $val_content = sprintf( $val_mu,
                $val,
                $val_y_prefix . $val_txt_suffix . ' ' . $val_y_prefix . '-' . sanitize_title( $val )
            );
            
            // Markup
            $prop_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $prop_content = sprintf( $prop_mu,
                esc_html__( $label, 'applicator' ),
                sanitize_title( $label )
            );
            
            // Markup
            $main_ct_h_l_mu = '<span class="prop %2$s---prop" title="%5$s">';
                $main_ct_h_l_mu .= '%4$s';
                $main_ct_h_l_mu .= '%6$s';
            $main_ct_h_l_mu .= '</span>';
            $main_ct_h_l_mu .= ' <span class="val %2$s---val" title="%3$s">';
                $main_ct_h_l_mu .= '%1$s';
            $main_ct_h_l_mu .= '</span>';
            
            // Content
            $title = sprintf( $main_ct_h_l_mu,
                $val_content,
                sanitize_title( $prop ),
                esc_attr__( $val, 'applicator' ),
                $prop_content,
                esc_attr__( $prop, 'applicator' ),
                $GLOBALS['colon_sep_mu']
            );
            
            // Display
            printf ( $main_ct_hr_mu,
                $title
            );
        }

        // Search
        if ( is_search() ) {
            
            $title = '';
            $prop = 'Search Results';
            $label = $prop;
            $label_for = 'for';
            
            $entry_search = new WP_Query( array(
                's'         => $s,
                'showposts' => -1,
            ) );
            
            $val = get_search_query();
            $entry_search_count = $entry_search->post_count;
            $entry_search_count_prefix = 'count';
            
            // Markup
            $val_mu = '<span class="txt %2$s---txt">%1$s</span>';
            
            // Content
            $val_content = sprintf( $val_mu,
                strip_tags( $val ),
                sanitize_title( $val )
            );
            
            // Markup
            $prop_mu = '<span class="txt %2$s---txt">%1$s</span>';
            $prop_mu .= ' <span class="txt %4$s---txt">%3$s</span>';
            $prop_mu .= ' <span class="txt %6$s---txt">%5$s</span>';
            
            // Content
            $prop_content = sprintf( $prop_mu,
                $entry_search_count,
                $entry_search_count_prefix . '---txt' . $entry_search_count_prefix . '-' . sanitize_title( $entry_search_count ),
                esc_html__( $label, 'applicator' ),
                sanitize_title( $label ),
                esc_html__( $label_for, 'applicator' ),
                sanitize_title( $label_for )
            );
            
            // Markup
            $main_ct_h_l_mu = '<span class="prop %2$s---prop" title="%5$s">';
                $main_ct_h_l_mu .= '%4$s';
                $main_ct_h_l_mu .= '%6$s';
            $main_ct_h_l_mu .= '</span>';
            $main_ct_h_l_mu .= ' <span class="val %2$s---val" title="%3$s">';
                $main_ct_h_l_mu .= '%1$s';
            $main_ct_h_l_mu .= '</span>';
            
            // Content
            $title = sprintf( $main_ct_h_l_mu,
                $val_content,
                sanitize_title( $prop ),
                esc_attr__( $val, 'applicator' ),
                $prop_content,
                esc_attr__( $prop, 'applicator' ),
                $GLOBALS['colon_sep_mu']
            );
            
            // Display
            printf ( $main_ct_hr_mu,
                $title
            );
            
            wp_reset_postdata();
        }

        // Main Content Header Aside
        apl_func_main_content_header_aside(); ?>

    </div>
</div><!-- Main Content Header -->

<div class="ct main-content---ct">
    <div class="ct_cr main-content---ct_cr">
        
        <main id="main" class="cn pri-content site-main" role="main" data-name="Primary Content">
            <div class="cr pri-content---cr">
                
                <div class="md entry-md" data-name="Entry Module">
                    <div class="cr entry-md---cr">
                        <div class="h entry-md---h"><span class="h_l entry-md---h_l"><?php esc_html_e( 'Entry Module', 'applicator' ); ?></span></div>
                        <div class="ct entry-md---ct">
                            <div class="ct_cr entry-md---ct_cr">
                
                <?php // single.php
                if ( is_singular() ) {
                    while ( have_posts() ) { ?>
                        
                        <div id="entry" class="cp entry" data-name="Entry">
                            <div class="cr entry---cr">
                                <div class="hr entry---hr">
                                    <div class="hr_cr entry---hr_cr">
                                        <div class="h entry---h"><span class="h_l entry---h_l"><?php esc_html_e( 'Entry', 'applicator' ); ?></span></div>
                                        <?php // inc > tags > entry-nav.php
                                        apl_entry_nav(); ?>
                                    </div>
                                </div>
                                <div class="ct entry---ct">
                                    <div class="ct_cr entry---ct_cr">
                                
                        <?php the_post();

                        // template-parts > post-content.php
                        apl_func_post_content();
                
                        // comments.php
                        comments_template(); ?>
                                        
                                    </div>
                                </div><!-- ct -->
                                <div class="fr entry---fr">
                                    <div class="fr_cr entry---fr_cr">
                                        <?php // inc > tags > entry-nav.php
                                        apl_entry_nav(); ?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Entry -->
                    
                    <?php }
                } else {
                    if ( have_posts() ) { ?>
                                        
                                <div class="cp entries" data-name="Entries">
                                    <div class="cr entries---cr">
                                        <div class="hr entries---hr">
                                            <div class="hr_cr entries---hr_cr">
                                                <div class="h entries---h"><span class="h_l entries---h_l"><?php esc_html_e( 'Entries', 'applicator' ); ?></span></div>
                                                <?php // inc > template-parts > page-nav.php
                                                applicator_page_nav(); ?>
                                            </div>
                                        </div>
                                        <div class="ct entries---ct">
                                            <div class="ct_cr entries---ct_cr">
                
                        <?php while ( have_posts() ) {
                            the_post();
                        
                            // template-parts > post-content.php
                            apl_func_post_content();
                        } ?>

                                            </div>
                                        </div><!-- ct -->
                                        <div class="fr entries---fr">
                                            <div class="fr_cr entries---fr_cr">
                                                <?php // inc > template-parts > page-nav.php
                                                applicator_page_nav(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Entries -->
                    
                    <?php } else {
                        get_template_part( 'content', 'none' );
                    }

                } ?>
                                
                        </div>
                        </div><!-- ct -->
                    </div>
                </div><!-- Entry Module -->
                
            </div>
        </main><!-- Primary Content -->
        
        <?php get_sidebar(); ?>

    </div>
</div><!-- ct -->

<?php get_footer();