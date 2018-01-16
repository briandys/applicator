<?php // Default Styles and Scripts


/* ------------------------ Default Applicator Styles ------------------------ */
if ( ! function_exists( 'applicator_default_styles_scripts' ) )
{
    
    function applicator_default_styles_scripts()
    {
        
        
        /* ------------ Styles ------------ */
        
        // Editor Style
        add_editor_style( array( 'assets/css/editor-style.css' ) );
        
        
        // style.css
        wp_enqueue_style( 'applicator-style', get_stylesheet_uri() );
        
        
        // HTML5 Boilerplate
        wp_enqueue_style( 'applicator-style--h5bp', get_theme_file_uri( '/assets/css/h5bp.css' )  );
        
        
        // Default Style
        wp_enqueue_style( 'applicator-style--default', get_theme_file_uri( '/assets/css/default.css' ) );
        
        
        /* ------------ Scripts ------------ */
        
        // Modernizr
        wp_enqueue_script( 'applicator-script--modernizr', get_theme_file_uri( '/assets/js/modernizr.min.js' ), array(), '1.0.0', true );
        
        
        // Plugins
        wp_enqueue_script( 'applicator-script--plugins', get_theme_file_uri( '/assets/js/plugins.js' ), array( 'jquery' ), '1.0.0', true );
        
        
        // Global
        wp_enqueue_script( 'applicator-script--global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery', 'applicator-script--plugins' ), '3.8.3', true );
        
        
        // Comment Reply
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
        {
            wp_enqueue_script( 'comment-reply' );
        }
        
    }
    add_action('wp_enqueue_scripts', 'applicator_default_styles_scripts', 0);
}





/* ------------------------ Default Applicator Inline Scripts ------------------------ */
if ( ! function_exists( 'applicator_inline_scripts' ) )
{
    
    function applicator_inline_scripts()
    { ?>
        
        <script type="text/javascript">
            
            
            /* ------------------------ Debounce ------------------------ */
            // https://davidwalsh.name/javascript-debounce-function
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
            var applicatorDebounceTimeout = 250;
            
            
            /* ------------------------ CSS Variables Feature Detection ------------------------ */
            // https://stackoverflow.com/a/26633844
            function supportCssVariables()
            {
                return window.CSS && window.CSS.supports && window.CSS.supports( '--var', 0 );
            }


            /* ------------------------ HTMl CSS Classes ------------------------ */
            ( function( html ) {
             
                
                // Replace no-js with js if JavaScript is supported
                html.className = html.className.replace( /\bfeature--js--none\b/,'feature--js' );

                // DOM Unready (will be removed on document.ready)
                html.classList.add( 'dom--unready' );

                // Window Unloaded (will be removed on window.load)
                html.classList.add( 'window--unloaded' );

                // CSS Variables CSS inserted via JS
                if ( supportCssVariables() ) {
                    html.classList.add( 'feature--css-variables--supported' );
                }
                else {
                    html.classList.add( 'feature--css-variables--unsupported' );
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
                var vpWidthDebounce = debounce( function() { vpWidth(); }, applicatorDebounceTimeout );

                window.addEventListener( 'resize', vpWidthDebounce );

            } ) ( document.documentElement );
        </script>
    
    <?php }
    add_action( 'wp_head', 'applicator_inline_scripts', 0 );
}