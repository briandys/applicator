<?php

//------------------------- Register Main Navigation
register_nav_menu( 'main-nav', __( 'Main Navigation', 'applicator' ) );


//------------------------- Primary Navigation
if ( ! function_exists( 'applicator_func_main_nav' ) ) :
    function applicator_func_main_nav() {
        
        $main_nav = 'main-nav';
        
        if ( wp_nav_menu( array( 'theme_location' => $main_nav, 'echo' => false ) ) !== false) { ?>
        
            <?php //------------------------- Sub-Constructor: Main Navigation ------------------------- ?>
            <nav id="main-nav" class="nav main-nav" role="navigation" aria-label="Main Navigation">
                <div class="main-nav--cr">

                    <h2 class="h main-nav--h">
                        <span class="main-nav--h-l"><?php esc_html_e( 'Main Navigation', 'applicator' ); ?></span>
                    </h2>
                    
                    <?php if ( ! has_nav_menu( 'main-nav' ) ) {

                        //------------------------- Default Menu
                        // Nav Item <li class="page_item">
                        // Current Nav Item <li class="current_page_item">
                        // Sub Navigation <ul class="children">
                        wp_page_menu( array(
                            'menu_class'        => 'main-nav--ct', // <div> class
                            'link_before'       => '<span class="main-nav--a-l">',
                            'link_after'        => '</span>',
                            'show_home'         => true,
                        ) );

                    } else {

                        //------------------------- Apperance > Menus (Custom Menu)
                        // Nav Item <li class="menu-item">
                        // Current Nav Item <li class="current-menu-item">
                        // Sub Navigation <ul class="sub-menu">
                        wp_nav_menu( array(
                            'theme_location'    => $main_nav,
                            'container'         => 'div',
                            'container_class'   => 'main-nav--ct', // <div> class
                            'link_before'       => '<span class="main-nav--a-l">',
                            'link_after'        => '</span>',
                        ) );

                    } ?>

                </div>
            </nav><!-- main-nav -->
        
        <?php }
        }
endif;