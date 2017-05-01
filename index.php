<?php
if ( function_exists( 'get_header' ) ) {
    get_header();
} else {
    die();
}

$main_ct_hr_mu = '<div class="hr main-content---hr main-content--%2$s---hr" data-name="Main Content Header">';
    $main_ct_hr_mu .= '<div class="hr_cr main-ct---hr_cr">';
        $main_ct_hr_mu .= '<h2 class="h main-ct---h"><span class="h_l main-ct---h_l">%1$s</span></h2>';

if ( is_front_page() ) {
    printf ( $main_ct_hr_mu,
        esc_html__( 'Home', 'applicator' ),
        'home'
    );
} elseif ( is_home() ) {
    printf ( $main_ct_hr_mu,
        esc_html__( 'Entries', 'applicator' ),
        'entries'
    );
} elseif ( is_category() ) {
    printf ( $main_ct_hr_mu,
        '<span class="prop category---prop">' . esc_html__( 'Category', 'applicator' ) . '</span><span class="sep colon---sep">:</span> <span class="val category-name---val">' . single_cat_title( '', false ) . '</span>',
        'category'
    );
} elseif ( is_tag() ) {
    printf ( $main_ct_hr_mu,
        '<span class="prop tag---prop">' . esc_html__( 'Tag', 'applicator' ) . '</span><span class="sep colon---sep">:</span> <span class="val tag-name---val">' . single_tag_title( '', false ) . '</span>',
        'category'
    );
} elseif ( is_archive() && ! is_author() ) {
    if ( is_day() ) {
        printf ( $main_ct_hr_mu,
            '<span class="prop daily-archive---prop"><span class="word daily---word">' . esc_html__( 'Daily', 'applicator' ) . '</span> <span class="word archive---word">' . esc_html__( 'Archive', 'applicator' ) . '</span></span><span class="sep colon---sep">:</span> <span class="val timestamp-date---val">' . get_the_date( 'j M Y') . '</span>',
            'daily-archive'
        );
    } elseif ( is_month() ) {
        printf ( $main_ct_hr_mu,
            '<span class="prop monthly-archive---prop"><span class="word monthly---word">' . esc_html__( 'Monthly', 'applicator' ) . '</span> <span class="word archive---word">' . esc_html__( 'Archive', 'applicator' ) . '</span></span><span class="sep colon---sep">:</span> <span class="val timestamp-month-year---val">' . get_the_date( 'F Y') . '</span>',
            'monthly-archive'
        );
    } elseif ( is_year() ) {
        printf ( $main_ct_hr_mu,
            '<span class="prop yearly-archive---prop"><span class="word yearly---word">' . esc_html__( 'Yearly', 'applicator' ) . '</span> <span class="word archive---word">' . esc_html__( 'Archive', 'applicator' ) . '</span></span><span class="sep colon---sep">:</span> <span class="val timestamp-year---val">' . get_the_date( 'Y') . '</span>',
            'yearly-archive'
        );
    } else {
        printf ( $main_ct_hr_mu,
            esc_html__( 'Archive', 'applicator' ),
            'archive'
        );
    }
} elseif ( is_search() ) {

    $entrySearch = new WP_Query( array(
        's'         => $s,
        'showposts' => -1,
    ) );
    $entrySearchKey = get_search_query();
    $entrySearchCount = $entrySearch->post_count; ?>

    <div class="hr main-content---hr main-content--search-results---hr" data-name="Main Content Header">
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
            esc_html__( 'Entry', 'applicator' ),
            'entry'
        );
    } elseif ( is_page() ) {
        printf ( $main_ct_hr_mu,
            esc_html__( 'Page', 'applicator' ),
            'page'
        );
    } elseif ( is_attachment() ) {
        printf ( $main_ct_hr_mu,
            esc_html__( 'Attachment', 'applicator' ),
            'attachment'
        );
    } else {
        printf ( $main_ct_hr_mu,
            esc_html__( 'Other', 'applicator' ),
            'other'
        );
    }
} elseif ( is_author() ) {
    printf ( $main_ct_hr_mu,
        '<span class="prop all-entries-posted-by---prop">' . esc_html__( 'All Entries Posted by', 'applicator' ) . '</span><span class="sep colon---sep">:</span> <span class="val author-name---val">' . get_the_author() . '</span>',
        'category'
    );
                
} else {
    echo esc_html__( 'Other', 'applicator' );
} ?>
        
        <?php // Main Content Header Aside
        if ( is_active_sidebar( 'main-content-header-aside' )  ) { ?>
        <aside id="main-content-header-aside" class="cn aside main-content-header-aside" data-name="Main Content Header Aside" role="complementary">
            <div class="cr main-ct-hr-as---cr">
                <h3 class="h main-ct-hr-as---h"><span class="h_l main-ct-hr-as---h_l">Main Content Header Aside</span></h3>
                <div class="ct main-ct-hr-as---ct">
                    <div class="ct_cr main-ct-hr-as---ct_cr">
                        <?php dynamic_sidebar( 'main-content-header-aside' ); ?>
                    </div>
                </div><!-- main-ct-hr-as---ct -->
            </div>
        </aside><!-- main-content-header-aside -->
        <?php } ?>

    </div>
</div><!-- main-content---hr -->

<div class="cn main-content---ct" data-name="Main Content - Content">
    <div class="cr main-content---ct_cr">
        
        <main id="main" class="cn pri-content site-main" role="main" data-name="Primary Content">
            <div class="cr pri-content---cr">
                
                <?php // single.php
                if ( is_singular() ) {
                    while ( have_posts() ) {
                        the_post();

                        // template-parts > entry-content.php
                        applicator_entry_content();

                        // inc > tags > entries-nav.php
                        applicator_entries_nav();
                
                        // comments.php
                        comments_template();
                    }
                } else {
                    if ( have_posts() ) { ?>
                        
                        <div class="cp entries" data-name="Entries">
                            <div class="cr entries--cr">
                
                        <?php while ( have_posts() ) {
                            the_post();
                        
                            // template-parts > entry-content.php
                            applicator_entry_content();
                        } ?>
                                
                            </div>
                        </div><!-- entries -->

                        <?php // inc > template-parts > page-nav.php
                        applicator_page_nav();
                    
                    } else {
                        get_template_part( 'content', 'none' );
                    }

                } ?>
                
            </div>
        </main><!-- pri-content -->
        
        <?php get_sidebar(); ?>

    </div>
</div><!-- main-content--ct -->

<?php get_footer();