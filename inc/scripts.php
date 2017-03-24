<?php

//------------------------- Default Classes

if ( ! function_exists( 'applicator_default_classes' ) ) :
    function applicator_default_classes() { ?>
        
        <script type="text/javascript">

            //------------------------- JavaScript Debounce Function
            // https://davidwalsh.name/javascript-debounce-function
            function debounce(func, wait, immediate) {
                var timeout;
                return function () {
                    var context = this, args = arguments;
                    var later = function () {
                        timeout = null;
                        if (!immediate) func.apply(context, args);
                    };
                    var callNow = immediate && !timeout;
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                    if (callNow) func.apply(context, args);
                };
            };
            var applicatorDebounceTimeout = 250;


            ( function( html ) {

                //------------------------- Initial Classes

                // Replace no-js with js if JavaScript is supported
                html.className = html.className.replace( /\bno-js\b/,'js' );

                // DOM Unready class name inserted via JS
                html.classList.add( 'dom--unready' );


                //------------------------- Detect Viewport Width
                function detectViewportWidth() {
                    var viewportNarrowClass = 'vp--narrow',
                        viewportNarrowUpClass = 'vp--narrow-up',
                        viewportMediumClass = 'vp--medium',
                        viewportMediumUpClass = 'vp--medium-up',
                        viewportWideClass = 'vp--wide',
                        viewportWideUpClass = 'vp--wide-up',

                        mqWide = window.matchMedia( "( min-width: 1024px )" ),
                        mqMedium = window.matchMedia( "( min-width: 560px )" );

                    if ( mqWide.matches ) {
                        html.classList.remove( viewportNarrowClass, viewportMediumClass );
                        html.classList.add( viewportNarrowUpClass, viewportMediumUpClass, viewportWideClass, viewportWideUpClass );
                    } else if ( mqMedium.matches ) {
                        html.classList.remove( viewportNarrowClass, viewportWideClass, viewportWideUpClass );
                        html.classList.add( viewportNarrowUpClass, viewportMediumClass, viewportMediumUpClass );
                    } else {
                        html.classList.remove( viewportMediumClass, viewportMediumUpClass, viewportWideClass, viewportWideUpClass );
                        html.classList.add( viewportNarrowClass, viewportNarrowUpClass );
                    }
                }

                detectViewportWidth();

                // Viewport Width Debounce
                var detectViewportWidthDebounce = debounce( function () {
                    detectViewportWidth();
                }, applicatorDebounceTimeout );

                window.addEventListener( 'resize', detectViewportWidthDebounce );

            } ) ( document.documentElement );

        </script>
    
    <?php }
    add_action( 'wp_head', 'applicator_default_classes', 0 );
endif;


//------------------------- Enqueue Scripts
if ( ! function_exists( 'applicator_enqueue_scripts' ) ) :
    function applicator_enqueue_scripts() {
        
        // HTML5 Shiv
        wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
        wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
        
        // Skip Link Focus Fix
        wp_enqueue_script( 'applicator-script-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );
        
        
        // Navigation
        wp_enqueue_script( 'applicator-script-navigation', get_theme_file_uri( '/assets/js/nav.js' ), array(), '1.6', true );
        
        // Localization
        $applicator_l10n['subnavShowLabel']    = __( 'Show Sub-Nav', 'applicator' );
		$applicator_l10n['subnavHideLabel']    = __( 'Hide Sub-Nav', 'applicator' );
        
        wp_localize_script( 'applicator-script-navigation', 'applicatorSubnavLabel', $applicator_l10n );
        
        
        // Plugins
        wp_enqueue_script( 'applicator-script-plugins', get_theme_file_uri( '/assets/js/plugins.js' ), array( 'jquery' ), '1.0', true );
        
        // Global
        wp_enqueue_script( 'applicator-script-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery', 'applicator-script-plugins' ), '1.9', true );
        
        
        // Comment Reply
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
            
    }
    add_action( 'wp_enqueue_scripts', 'applicator_enqueue_scripts' );
endif;