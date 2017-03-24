<?php get_header(); ?>


<?php //------------------------- Main Content Header ------------------------- ?>
<div class="cn main-content--hr" data-name="Main Content Header">
    <div class="main-content--hr--cr">
        
        
        <h2 class="h main-content--h">
            <span class="main-content--h-l">
                
                <span class="main-content--h--pred-l"><?php esc_html_e( 'Main Content:', 'applicator' ); ?></span>
                <span class="main-content--h--subj-l">

    
                    <?php
                    //------------------------- Front Page (posts page is set at default)
                    
                    if ( is_front_page() ) :
                        esc_html_e( 'Home', 'applicator' );
                    
                    //------------------------- Home (posts page is customized)
                    elseif ( is_home() ) :
                        esc_html_e( 'Entries', 'applicator' );
                    
                    //------------------------- Category
                    elseif ( is_category() ) :
                        printf( __( '<span class="pred-l">%s</span><span class="colon-l">:</span> <span class="subj-l">%s</span>', 'applicator' ), esc_html_e( 'Category', 'applicator'), single_cat_title( '', false ) );
                    
                    //------------------------- Tag
                    elseif ( is_tag() ) :
                        printf( __( '<span class="pred-l">%s</span><span class="colon-l">:</span> <span class="subj-l">%s</span>', 'applicator' ), esc_html_e( 'Tag', 'applicator'), single_tag_title( '', false ) );
                    
                    //------------------------- Archive
                    elseif ( is_archive() && ! is_author() ) :
                        echo '<span class="pred-l">';
                        if ( is_day() ) :
                            printf( __( '%s</span><span class="colon-l">:</span> <span class="subj-l">%s</span>', 'applicator' ), esc_html_e( 'Daily Archive', 'applicator'), get_the_date() );
                        elseif ( is_month() ) :
                            printf( __( '%s</span><span class="colon-l">:</span> <span class="subj-l">%s</span>', 'applicator' ), esc_html_e( 'Monthly Archive', 'applicator'), get_the_date( _x( 'F Y', 'Monthly archives date format', 'applicator' ) ) );
                        elseif ( is_year() ) :
                            printf( __( '%s</span><span class="colon-l">:</span> <span class="subj-l">%s</span>', 'applicator' ), esc_html_e( 'Yearly Archive', 'applicator'), get_the_date( _x( 'Y', 'Yearly archives date format', 'applicator' ) ) );
                        else :
                            esc_html_e( 'Archive', 'applicator' );
                        echo '</span>';
                        endif;
                    
                    
                    //------------------------- Search Results
                    elseif ( is_search() ) :

                        $entrySearch = new WP_Query( array(
                            's'         => $s,
                            'showposts' => -1,
                        ) );
                        $key = get_search_query();
                        $count = $entrySearch->post_count;

                        if ( ! $count == 0 )
                            echo '<span class="count-l">' . $count . '</span> ';

                        echo '<span class="pred-l">';

                        if ( $count == 0 )
                            esc_html_e( 'No Search Results', 'applicator' );

                        elseif ( $count == 1 )
                            esc_html_e( 'Search Result', 'applicator' );

                        else
                            esc_html_e( 'Search Results', 'applicator' );

                        echo '</span> ';

                        echo '<span class="prep--l">';
                        esc_html_e( 'for', 'applicator' );
                        echo '</span> ';

                        echo '<span class="subj-l">' . $key . '</span>';

                        wp_reset_postdata();
                    
                    
                    //------------------------- Singular (is_single, is_page, is_attachment)
                    elseif ( is_singular() ) :
                    
                        if ( is_single() )
                            esc_html_e( 'Entry', 'applicator' );
                    
                        elseif ( is_page() )
                            esc_html_e( 'Page', 'applicator' );
                    
                        elseif ( is_attachment() )
                            esc_html_e( 'Attachment', 'applicator' );
                    
                        else
                            esc_html_e( 'Other', 'applicator' );
                    
                    
                    //------------------------- Author
                    elseif ( is_author() ) :
                        printf( __( '<span class="pred-l">%s</span> <span class="subj-l">%s</span>', 'applicator' ), esc_html_e( 'All Entries Posted by', 'applicator'), get_the_author() );
                    
                    
                    //------------------------- Other
                    else :
                        esc_html_e( 'Other', 'applicator' );
                    
                    endif; ?>
                    
                </span>
                
            </span>
        </h2><!-- main-content--h -->
        
        
        <?php //------------------------- Sub-Constructor: Main Content Header Aside ------------------------- ?>
        <?php if ( is_active_sidebar( 'main-content-header-aside' )  ) : ?>
        <aside id="main-content-header-aside" class="aside cn main-content-header-aside" data-name="Main Content Header Aside" role="complementary">
            <div class="main-content-header-aside--cr">
                <h3 class="h main-content-header-aside--h"><span class="h-l"><?php esc_html_e( 'Aside: Main Content Header', 'applicator' ); ?></span></h3>
                <?php dynamic_sidebar( 'main-content-header-aside' ); ?>
            </div>
        </aside><!-- main-content-header-aside -->
        <?php endif; ?>

    </div>
</div><!-- main-content--hr -->


<?php //------------------------- Main Content - Content ------------------------- ?>
<div class="cn main-content--ct" data-name="Main Content - Content">
    <div class="main-content--ct--cr">
        
        
        <?php //------------------------- Primary Content ------------------------- ?>
        <main id="main" class="cn pri-content site-main" data-name="Primary Content" role="main">
            <div class="pri-content--cr">
                
                <?php //------------------------- single.php ------------------------- ?>
                <?php if ( is_singular() ) :
                    while ( have_posts() ) : the_post();

                        // template-parts > entry-content.php
                        applicator_entry_content();

                        // inc > tags > entries-nav.php
                        applicator_entries_nav();
                
                        // comments.php
                        comments_template();

                    endwhile; ?>

                <?php //------------------------- index.php ------------------------- ?>
                <?php else :
                    if ( have_posts() ) : ?>
                        
                        <div class="cp entries" data-name="Entries">
                            <div class="entries--cr">
                
                            <?php while ( have_posts() ) : the_post(); ?>
                                
                                <?php // template-parts > entry-content.php
                                applicator_entry_content(); ?>

                            <?php endwhile; ?>
                                
                            </div>
                        </div><!-- entries -->

                        <?php // inc > template-parts > page-nav.php
                        applicator_page_nav();
                    
                    else :
                
                        // No Entry: content-none.php
                        get_template_part( 'content', 'none' );
                    endif;

                endif; ?>
                
            </div>
        </main><!-- pri-content -->
        
        <?php get_sidebar(); ?>

    </div>
</div><!-- main-content--ct -->

<?php get_footer();