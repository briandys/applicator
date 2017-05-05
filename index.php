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
        } elseif ( is_home() ) {
            printf ( $main_ct_hr_mu,
                esc_html__( 'Home', 'applicator' )
            );
        } elseif ( is_category() ) {
            printf ( $main_ct_hr_mu,
                '<span class="prop category---prop"><span class="word category---word">' . esc_html__( 'Category', 'applicator' ) . '</span><span class="sep colon---sep">:</span></span> <span class="val category-name---val"><span class="word category-name---word">' . single_cat_title( '', false ) . '</span></span>'
            );
        } elseif ( is_tag() ) {
            printf ( $main_ct_hr_mu,
                '<span class="prop tag---prop"><span class="word tag---word">' . esc_html__( 'Tag', 'applicator' ) . '</span><span class="sep colon---sep">:</span></span> <span class="val tag-name---val"><span class="word tag-name---word">' . single_tag_title( '', false ) . '</span></span>'
            );
        } elseif ( is_archive() && ! is_author() ) {
            if ( is_day() ) {
                printf ( $main_ct_hr_mu,
                    '<span class="prop daily-archive---prop"><span class="word daily---word">' . esc_html__( 'Daily', 'applicator' ) . '</span> <span class="word archive---word">' . esc_html__( 'Archive', 'applicator' ) . '</span></span><span class="sep colon---sep">:</span> <span class="val date---val">' . get_the_date( 'j M Y') . '</span>'
                );
            } elseif ( is_month() ) {
                printf ( $main_ct_hr_mu,
                    '<span class="prop monthly-archive---prop"><span class="word monthly---word">' . esc_html__( 'Monthly', 'applicator' ) . '</span> <span class="word archive---word">' . esc_html__( 'Archive', 'applicator' ) . '</span></span><span class="sep colon---sep">:</span> <span class="val month-year---val">' . get_the_date( 'F Y') . '</span>'
                );
            } elseif ( is_year() ) {
                printf ( $main_ct_hr_mu,
                    '<span class="prop yearly-archive---prop"><span class="word yearly---word">' . esc_html__( 'Yearly', 'applicator' ) . '</span> <span class="word archive---word">' . esc_html__( 'Archive', 'applicator' ) . '</span></span><span class="sep colon---sep">:</span> <span class="val year---val">' . get_the_date( 'Y') . '</span>'
                );
            } else {
                printf ( $main_ct_hr_mu,
                    esc_html__( 'Archive', 'applicator' )
                );
            }
        } elseif ( is_search() ) {

            $entrySearch = new WP_Query( array(
                's'         => $s,
                'showposts' => -1,
            ) );
            $entrySearchKey = get_search_query();
            $entrySearchCount = $entrySearch->post_count; ?>

            <div class="hr main-content---hr" data-name="Main Content Header">
                <div class="hr_cr main-content---hr_cr">
                    <h2 class="h main-content---h"><span class="h_l main-content---h_l">
                    <?php
                    if ( ! $entrySearchCount == 0 ) {
                        echo '<span class="num search-results-count---num">' . $entrySearchCount . '</span> ';
                    }

                    if ( $entrySearchCount == 0 ) {
                        echo '<span class="word no-search-result---word">' . esc_html__( 'No Search Results', 'applicator' ) . '</span> ';
                    } elseif ( $entrySearchCount == 1 ) {
                        echo '<span class="word search-result---word">' . esc_html__( 'Search Result', 'applicator' ) . '</span> ';
                    } else {
                        echo '<span class="word search-results---word">' . esc_html__( 'Search Results', 'applicator' ) . '</span> ';
                    }

                    echo '<span class="word for---word">' . esc_html__( 'for', 'applicator' ) . '</span> <span class="word search-term---word">' . $entrySearchKey . '</span>';
                    ?>
                    </span></h2>
                </div>
            </div>

            <?php wp_reset_postdata();

        } elseif ( is_singular() ) {
            if ( is_single() ) {
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
        } elseif ( is_author() ) {
            printf ( $main_ct_hr_mu,
                '<span class="prop all-entries-posted-by---prop">' . esc_html__( 'All Entries Posted by', 'applicator' ) . '</span><span class="sep colon---sep">:</span> <span class="val author-name---val">' . get_the_author() . '</span>'
            );

        } else {
            printf ( $main_ct_hr_mu,
                esc_html__( 'Other', 'applicator' )
            );
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