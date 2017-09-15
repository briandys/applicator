<?php // Scripts


// Default Classes
if ( ! function_exists( 'applicator_scripts_inline' ) ) {
    function applicator_scripts_inline() { ?>
        
        <script type="text/javascript">
            
            
            // JavaScript Debounce Function
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
            
            
            // Test if inline SVGs are supported
            // https://github.com/Modernizr/Modernizr/
            function supportsInlineSVG() {
                var div = document.createElement( 'div' );
                div.innerHTML = '<svg/>';
                return 'http://www.w3.org/2000/svg' === ( 'undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI );
            }


            ( function( html ) {
                
                // Replace no-js with js if JavaScript is supported
                html.className = html.className.replace( /\bno-js\b/,'js' );

                // DOM Unready class name inserted via JS
                html.classList.add( 'dom--unready' );
                
                // Replace no-svg with svg if supported
                if ( true === supportsInlineSVG() ) {
                    html.className = html.className.replace( /(\s*)no-svg(\s*)/, '$1svg$2' );
                }

                // Detect Viewport Width
                function vpWidth() {
                    
                    var vpNarrowCss = 'vp--narrow',
                        vpNarrowUpCss = 'vp--narrow-up',
                        vpMediumCss = 'vp--medium',
                        vpMediumUpCss = 'vp--medium-up',
                        vpWideCss = 'vp--wide',
                        vpWideUpCss = 'vp--wide-up',
                        mqMedium = window.matchMedia( "( min-width: 560px )" ),
                        mqWide = window.matchMedia( "( min-width: 1024px )" ),
                        
                        vpWPAdminBarNarrowCss = 'vp--wp-admin-bar--narrow',
                        vpWPAdminBarWideCss = 'vp--wp-admin-bar--wide',
                        mqWPAdminBarNarrow = window.matchMedia( "( max-width: 782px )" );

                    if ( mqWide.matches ) {
                        html.classList.add( vpNarrowUpCss, vpMediumUpCss, vpWideCss, vpWideUpCss );
                        html.classList.remove( vpNarrowCss, vpMediumCss );
                    } else if ( mqMedium.matches ) {
                        html.classList.add( vpNarrowUpCss, vpMediumCss, vpMediumUpCss );
                        html.classList.remove( vpNarrowCss, vpWideCss, vpWideUpCss );
                    } else {
                        html.classList.add( vpNarrowCss, vpNarrowUpCss );
                        html.classList.remove( vpMediumCss, vpMediumUpCss, vpWideCss, vpWideUpCss );
                    }
                    
                    if ( mqWPAdminBarNarrow.matches ) {
                        html.classList.add( vpWPAdminBarNarrowCss );
                        html.classList.remove( vpWPAdminBarWideCss );
                    } else {
                        html.classList.add( vpWPAdminBarWideCss );
                        html.classList.remove( vpWPAdminBarNarrowCss );
                    }
                }
                vpWidth();

                // Viewport Width Debounce
                var vpWidthDebounce = debounce( function () {
                    vpWidth();
                }, applicatorDebounceTimeout );

                window.addEventListener( 'resize', vpWidthDebounce );

            } ) ( document.documentElement );
        </script>
    
    <?php }
    add_action( 'wp_head', 'applicator_scripts_inline', 0 );
}


// Enqueue Scripts
if ( ! function_exists( 'applicator_scripts_enqueue' ) ) {
    function applicator_scripts_enqueue() {
        
        
        // Modernizr
        wp_enqueue_script( 'applicator-script--modernizr', get_theme_file_uri( '/assets/js/modernizr.min.js' ), array(), '1.0.0', true );
        
        
        // HTML5 Shiv
        wp_enqueue_script( 'applicator-script--html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
        wp_script_add_data( 'applicator-script--html5', 'conditional', 'lt IE 9' );
        
        
        // Skip Link Focus Fix
        wp_enqueue_script( 'applicator-script--skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0.1', true );
        
        
        // Plugins
        wp_enqueue_script( 'applicator-script--plugins', get_theme_file_uri( '/assets/js/plugins.js' ), array( 'jquery' ), '1.0.0', true );
        
        
        // Global
        wp_enqueue_script( 'applicator-script--global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery', 'applicator-script--plugins' ), '3.8.0', true );
        
        
        // Comment Reply
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
            
    }
    add_action( 'wp_enqueue_scripts', 'applicator_scripts_enqueue' );
}