<?php
if ( function_exists( 'get_header' ) ) {
    get_header();
} else {
    die();
}
?>

<div class="hr main-content---hr" data-name="Main Content Header">
    <div class="hr_cr main-ct---hr_cr">
        <h2 class="h main-ct---h"><span class="h_l main-ct---h_l">
            <?php
            
            // Main Content Headings
            applicator_func_main_content_headings();

            // Search
            if ( is_search() ) {
                
                $title = '';

                $entry_search = new WP_Query( array(
                    's'         => $s,
                    'showposts' => -1,
                ) );
                
                $entry_search_count = $entry_search->post_count;
                
                $search_result_label = 'Search Result';
                $search_results_label = 'Search Results';
                
                $prop = '';
                if ( $entry_search_count == 0 ) {
                    $prop = $search_result_label;
                } elseif ( $entry_search_count == 1 ) {
                    $prop = $search_result_label;
                } else {
                    $prop = $search_results_label;
                }
                
                $label = $prop;
                $label_for = 'for';
                $val = get_search_query();
                $entry_search_count_prefix = 'count';
                $colon_sep = '';

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
                $main_ct_h_l_mu .= '</span>';
                $main_ct_h_l_mu .= ' <span class="val %2$s---val" title="%3$s">';
                    $main_ct_h_l_mu .= '%1$s';
                $main_ct_h_l_mu .= '</span>';

                // Content
                $title = sprintf( $main_ct_h_l_mu,
                    $val_content,
                    sanitize_title( $prop ),
                    esc_attr__( $val, 'applicator' ),
                    $prop_content . $colon_sep,
                    esc_attr__( $prop, 'applicator' )
                );

                // Display
                echo $title;

                wp_reset_postdata();
            }
            
            ?>
        </span></h2>

        <?php // Main Content Header Aside
        applicator_func_main_content_header_aside(); ?> 
        
    </div>
</div><!-- Main Content Header -->

<div class="ct main-content---ct">
    <div class="ct_cr main-content---ct_cr">
        
        <main id="main" class="cn pri-content site-main" role="main" data-name="Primary Content">
            <div class="cr pri-content---cr">
                
                <div class="md entry-md" data-name="Entry Module">
                    <div class="cr entry-md---cr">
                        <div class="hr entry-md---hr">
                            <div class="hr_cr entry-md---hr_cr">
                                <div class="h entry-md---h"><span class="h_l entry-md---h_l"><?php esc_html_e( 'Entry Module', $GLOBALS['apl_textdomain'] ); ?></span></div>
                            </div>
                        </div>
                        <div class="ct entry-md---ct">
                            <div class="ct_cr entry-md---ct_cr">
                
                <?php // single.php
                if ( is_singular() ) {
                    while ( have_posts() ) { ?>
                        
                        <div id="entry" class="cp entry" data-name="Entry">
                            <div class="cr entry---cr">
                                <div class="hr entry---hr">
                                    <div class="hr_cr entry---hr_cr">
                                        <div class="h entry---h"><span class="h_l entry---h_l"><?php esc_html_e( 'Entry', $GLOBALS['apl_textdomain'] ); ?></span></div>
                                        <?php // inc > tags > entry-nav.php
                                        apl_entry_nav(); ?>
                                    </div>
                                </div>
                                <div class="ct entry---ct">
                                    <div class="ct_cr entry---ct_cr">
                                
                                        <?php
                                        the_post();

                                        // template-parts > post-content.php
                                        applicator_func_post_content();

                                        // comments.php
                                        comments_template();
                                        ?>
                                        
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
                                                <div class="h entries---h"><span class="h_l entries---h_l"><?php esc_html_e( 'Entries', $GLOBALS['apl_textdomain'] ); ?></span></div>
                                                <?php // inc > template-parts > page-nav.php
                                                applicator_func_page_nav(); ?>
                                            </div>
                                        </div>
                                        <div class="ct entries---ct">
                                            <div class="ct_cr entries---ct_cr">
                
                        <?php while ( have_posts() ) {
                            the_post();
                        
                            // template-parts > post-content.php
                            applicator_func_post_content();
                        } ?>

                                            </div>
                                        </div><!-- ct -->
                                        <div class="fr entries---fr">
                                            <div class="fr_cr entries---fr_cr">
                                                <?php // inc > template-parts > page-nav.php
                                                applicator_func_page_nav(); ?>
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
</div><!-- Main Content Content -->

<?php get_footer();