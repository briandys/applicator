<?php

/**
 * HTML Class
 *
 * @package WordPress
 * @subpackage Applicator
 * @since 1.0
 */





function applicator_html_class()
{   
    global $is_lynx, $is_gecko, $is_IE, $is_macIE, $is_winIE, $is_edge, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    $useragent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) : "";
    $is_ipad = preg_match('/ipad/i',$useragent);


    // Browser
    if ( $is_chrome )
    {
        echo ' '. 'browser--chrome';
    }
    elseif ( $is_gecko )
    {
        echo ' '. 'browser--gecko';
    }
    elseif ( $is_safari )
    {
        echo ' '. 'browser--safari';
    }
    elseif ( $is_opera )
    {
        echo ' '. 'browser--opera';
    }
    elseif ( $is_lynx ) {
        echo ' '. 'browser--lynx';
    }
    elseif ( $is_NS4 )
    {
        echo ' '. 'browser--ns4';
    }
    elseif ( $is_IE )
    {
        echo ' '. 'browser--ie';
    }
    elseif ( $is_macIE )
    {
        echo ' '. 'browser--mac-ie';
    }
    elseif ( $is_winIE )
    {
        echo ' '. 'browser--win-ie';
    }
    elseif ( $is_edge )
    {
        echo ' '. 'browser--edge';
    }
    else {
        echo ' '. 'browser--other';
    }


    // Device
    if ( $is_iphone )
    {
        echo ' '. 'device--iphone';
    }
    elseif ( $is_ipad )
    {
        echo ' '. 'device--ipad';
    }


    // Form Factor
    if ( wp_is_mobile() )
    {
        echo ' '. 'form-factor--mobile';
    }
    else
    {
        echo ' '. 'form-factor--non-mobile';
    }
    
    
    
    // WordPress Admin Bar
    if ( is_admin_bar_showing() )
    {
        echo ' '. 'wp-admin-bar--enabled';
    }
    else
    {
        echo ' '. 'wp-admin-bar--disabled';
    }
}
add_action( 'applicator_hook_html_css', 'applicator_html_class');