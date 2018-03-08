<?php

/**
 * Default Styles and Scripts
 *
 * @package WordPress\Applicator\PHP
 */




/**
 * Default Styles and Scripts
 */
function applicator_default_styles_scripts()
{
    add_editor_style( array( 'assets/css/editor-style.css' ) );
    wp_enqueue_style( 'applicator-style', get_stylesheet_uri() );
    wp_enqueue_style( 'applicator-style--h5bp', get_template_directory_uri(). '/assets/css/h5bp.css' );
    wp_enqueue_style( 'applicator-defaults--style', get_template_directory_uri(). '/assets/css/default.css' );


    wp_enqueue_script( 'applicator-modernizr--script', get_template_directory_uri(). '/assets/js/modernizr.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'applicator-plugins--script', get_template_directory_uri(). '/assets/js/plugins.js', array( 'applicator-modernizr--script' ), '1.0', true );
    wp_enqueue_script( 'applicator-globals--script', get_template_directory_uri(). '/assets/js/global.js', array( 'jquery', 'applicator-plugins--script' ), '1.0', true );


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'applicator_default_styles_scripts', 0);




/**
 * Default Inline Scripts
 */
function applicator_inline_scripts()
{
?>
    <script>

        /*
         * Debounce
         *
         * @link https://davidwalsh.name/javascript-debounce-function
         */
        function debounce( func, wait, immediate )
        {
            var timeout;

            return function()
            {
                var context = this,
                    args = arguments;

                var later = function()
                {
                    timeout = null;
                    if ( !immediate )
                    {
                        func.apply( context, args );
                    }
                }

                var callNow = immediate && !timeout;

                clearTimeout( timeout );

                timeout = setTimeout( later, wait );

                if ( callNow )
                {
                    func.apply( context, args );
                }
            }
        }
        var applicatorDebounceTimeout = 640;
        
        
        /*
         * CSS Variables Feature Detection
         *
         * @link https://stackoverflow.com/a/26633844
         */
        function supportCSSVariables()
        {
            return window.CSS && window.CSS.supports && window.CSS.supports( '--var', 0 );
        }
        
        
        /*
         * HTMl CSS Classes
         */
        ( function( html ) {

            // Replace no-js with js if JavaScript is supported
            html.className = html.className.replace( /\bno-js\b/,'js' );

            // DOM Unready (will be removed on document.ready)
            html.classList.add( 'dom--unready' );

            // Window Unloaded (will be removed on window.load)
            html.classList.add( 'window--unloaded' );

            // CSS Variables
            if ( supportCSSVariables() )
            {
                html.classList.add( 'cssvariables' );
            }
            else
            {
                html.classList.add( 'no-cssvariables' );
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

                if ( mqWide.matches )
                {
                    html.classList.add( vpNarrowUpCss, vpMediumUpCss, vpWideCss, vpWideUpCss );
                    html.classList.remove( vpNarrowCss, vpMediumCss );
                }

                else if ( mqMedium.matches )
                {
                    html.classList.add( vpNarrowUpCss, vpMediumCss, vpMediumUpCss );
                    html.classList.remove( vpNarrowCss, vpWideCss, vpWideUpCss );
                }

                else
                {
                    html.classList.add( vpNarrowCss, vpNarrowUpCss );
                    html.classList.remove( vpMediumCss, vpMediumUpCss, vpWideCss, vpWideUpCss );
                }

                if ( mqWPAdminBarNarrow.matches )
                {
                    html.classList.add( vpWPAdminBarNarrowCss );
                    html.classList.remove( vpWPAdminBarWideCss );
                }

                else
                {
                    html.classList.add( vpWPAdminBarWideCss );
                    html.classList.remove( vpWPAdminBarNarrowCss );
                }
            }
            vpWidth();

            // Viewport Width Debounce
            var vpWidthDebounce = debounce( function() {
                vpWidth();
            }, applicatorDebounceTimeout );

            window.addEventListener( 'resize', vpWidthDebounce );

        } ) ( document.documentElement );
    </script>

<?php }
add_action( 'wp_head', 'applicator_inline_scripts', 0 );