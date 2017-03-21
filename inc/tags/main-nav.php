<?php
//------------------------- Register Main Navigation
register_nav_menu( 'main-nav', __( 'Main Navigation', 'applicator' ) );


//------------------------- Primary Navigation
if ( ! function_exists( 'applicator_func_main_nav' ) ) :
    function applicator_func_main_nav() {?>
        
        
        <?php //------------------------- Sub-Constructor: Main Navigation ------------------------- ?>
        <nav id="main-nav" class="main-nav">
            <div class="main-nav--cr">
                    
                <h2 class="h main-nav--h">
                    <span class="h-l"><?php esc_html_e( 'Main Navigation', 'applicator' ); ?></span>
                </h2>

                <?php if ( ! has_nav_menu( 'main-nav' ) ) {
                    
                    //------------------------- Default Menu
                    // Nav Item <li class="page_item">
                    // Current Nav Item <li class="current_page_item">
                    // Sub Navigation <ul class="children">
                    wp_page_menu( array(
                        'menu_class'        => 'main-nav--ct', // <div> class
                        'link_before'       => '<span class="l">',
                        'link_after'        => '</span>',
                        'show_home'         => true
                    ) );
                
                } else {
                    
                    //------------------------- Apperance > Menus (Custom Menu)
                    // Nav Item <li class="menu-item">
                    // Current Nav Item <li class="current-menu-item">
                    // Sub Navigation <ul class="sub-menu">
                    wp_nav_menu( array(
                        'theme_location'    => 'main-nav',
                        'container'         => 'div',
                        'container_class'   => 'main-nav--ct', // <div> class
                        'link_before'       => '<span class="l">',
                        'link_after'        => '</span>'
                    ) );
                } ?>
            
            </div>
        </nav><!-- main-nav -->
                        
    <?php
    }
endif;


//------------------------- Function: Display Navigation Item Description for Primary Navigation Menu
if ( ! function_exists( 'applicator_custom_menu_markup' ) ) :
    function applicator_custom_menu_markup( $item_output, $item, $depth, $args ) {
        if ( 'primary-navigation' == $args->theme_location ) {

            $attributes = ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
            $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
            $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
            $attributes .= ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';

            $item_output = $args->before;
            $item_output .= '<a class="a nav_a pri-nav_a"'. $attributes .'>';
            $item_output .= '<span class="l">';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</span>';

            if ( $item->description ) {
                $item_output .= '<div class="pri-nav-desc">' . $item->description . '</div>';
            }

            $item_output .= '</a>';

            $item_output .= $args->after;

        }

        return $item_output;
    }
    add_filter( 'walker_nav_menu_start_el', 'applicator_custom_menu_markup', 10, 4 );
endif;