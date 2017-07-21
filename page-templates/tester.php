<?php
// Template Name: Tester

?>

<style>
    
    *
    {
        box-sizing: border-box;
        max-width: 100%;
        height: auto;
    }
    
    body
    {
        margin: 0;
        font-family: sans-serif;
    }

    .cn,
    .cp,
    .obj
    {
        margin: .5rem;
        padding: .5rem;
        border: 2px solid black;
        border-radius: .25rem;
        background-color: white;
    }
    
    .cp,
    .obj
    {
        margin-left: -1rem;
    }
    
    .cn
    {
        border-color: red;
    }
    
    .cp
    {
        border-color: green;
    }
    
    .obj
    {
        border-color: blue;
    }
    
    .cn::before,
    .cp::before,
    .obj::before
    {
        content: attr( data-name );
        display: inline-block;
        margin-left: -.5rem;
        margin-top: -.5rem;
        padding: .25rem;
        width: calc( 100% + .5rem );
        background-color: black;
        color: white;
    }
    
    .cn::before
    {
        background-color: red;
    }
    
    .cp::before
    {
        background-color: green;
    }
    
    .obj::before
    {
        background-color: blue;
    }
    
</style>

<?php

// Web Product Main Name OBJ
$web_product_main_name_obj = htmlok( array(
    'name'      => 'Web Product Main Name',
    'structure' => array(
        'type'      => 'object',
        'elem'      => 'h1',
        'linked'    => true,
        'attr'      => array(
            'a'     => array(
                'href'      => esc_url( home_url( '/' ) ),
            ),
        ),
    ),
    'css'           => 'wbp-main-name',
    'root_css'      => 'site-title',
    'title'         => get_bloginfo( 'name' ),
    'content'       => array(
        'object'        => array(
            array(
                'txt'           => get_bloginfo( 'name' ),
                'css'           => 'wbp-name',
            ),
        ),
    ),
) );

// Web Product Main Logo OBJ | inc > settings.php | Customizer > Site Identity
$web_product_main_logo_obj = '';

if ( has_custom_logo() ) {
    $web_product_main_logo_obj = htmlok( array(
        'name'      => 'Web Product Main Logo',
        'structure' => array(
            'type'          => 'object',
            'subtype'       => 'wordpress generated content',
        ),
        'css'       => 'wbp-main-logo',
        'title'     => get_bloginfo( 'name' ),
        'content'   => array(
            'object'        => get_custom_logo(),
        ),
    ) );
}

// Web Product Main Description OBJ
$web_product_main_desc_obj = '';
$description = get_bloginfo( 'description', 'display' );

if ( $description || is_customize_preview() ) {
    $web_product_main_desc_obj = htmlok( array(
        'name'      => 'Web Product Main Description',
        'structure' => array(
            'type'      => 'object',
            'linked'    => true,
            'attr'      => array(
                'a'     => array(
                    'href'      => esc_url( home_url( '/' ) ),
                ),
            ),
        ),
        'css'       => 'wbp-main-desc',
        'title'     => $description,
        'content'   => array(
            'object'    => array(
                array(
                    'txt'   => $description,
                    'css'   => 'wbp-desc',
                ),
            ),
        ),
    ) );
}


// Web Product Main Media Banner OBJ | Custom Header | Customizer > Custom Header | inc > functions > custom-header.php
$web_product_main_media_banner_obj = '';

if ( has_header_image() ) {
    $web_product_main_media_banner_obj = htmlok( array(
        'name'          => 'Web Product Main Media Banner',
        'structure'     => array(
            'type'          => 'object',
            'subtype'       => 'wordpress generated content',
        ),
        'css'           => 'wbp-main-media-banner',
        'content'       => array(
            'object'        => get_custom_header_markup(),
        ),
    ) );
}



//------------------------ Web Product Main Info CP
$main_product_main_info_cp = htmlok( array(
    'name'              => 'Web Product Main Info',
    'structure'         => array(
        'type'          => 'component',
        'hr_structure'  => true,
    ),
    'css'               => 'wbp-main-info',
    'content'           => array(
        'component'     => array(
            $web_product_main_name_obj,
            $web_product_main_logo_obj,
            $web_product_main_desc_obj,
        ),
    ),
) );

//------------------------ Main Header CN
$main_header_cn = htmlok( array(
    'name'              => 'Main Header',
    'structure'         => array(
        'type'          => 'constructor',
        'subtype'       => 'main header',
    ),
    'id'                => 'main-header',
    'root_css'          => 'site-header',
    'content'           => array(
        'constructor'   => array(
            $main_product_main_info_cp,
            applicator_func_main_nav(),
            applicator_hook_after_main_nav(),
            // get_search_form(),
            $web_product_main_media_banner_obj,
            applicator_func_main_header_aside(),
        ),
    ),
) );

/*
$main_content_header_sub_heading_obj = htmlok( array(
    'name'              => 'Main Header Sub-Heading',
    'structure'         => array(
        'type'          => 'object',
        'subtype'       => 'wordpress generated content',
        'layout'        => 'inline',
    ),
    'obj_content'       => array(
        array(
            'txt'       => 'Entries: Post',
        ),
    ),
) );

$main_content_header_meta_cp = htmlok( array(
    'name'              => 'Main Header Meta',
    'structure'         => array(
        'type'          => 'component',
        'subtype'       => 'meta data',
    ),
    'content'           =>  array(

        'component'     => '$main_content_header_sub_heading_obj',



    ),
) );
*/

/*
$main_content_cn = htmlok( array(
    'name'              => 'Main Content',
    'structure'         => array(
        'type'          => 'constructor',
        'subtype'       => 'main content',
        'h_elem'        => 'h2',
    ),
    'id'                => 'content',
    'root_css'          => 'site-content',
    'hr_content'        => $main_content_header_meta_cp,
    'content'           =>  array(
        'constructor'   => 'Super Main Content',
    ),
) );
*/

$web_product_copyright_obj = htmlok( array(
    'name'          => 'Web Product Copyright',
    'structure'     => array(
        'type'          => 'object',
    ),
    'css'           => 'wbp-copyright',
    'root_css'      => 'site-info',
    'content'       => array(
        'object'        => array(
            array(
                'line'      => array(
                    array(
                        'css'   => 'copyright---line',
                        array(
                            'txt'       => get_bloginfo( 'name' ),
                            'css'       => 'wbp-name---txt',
                            'linked'    => true,
                            'attr'      => array(
                                'a'         => array(
                                    'href'      => esc_url( home_url( '/' ) ),
                                    'rel'       => 'home',
                                    'title'     => get_bloginfo( 'name' ),
                                ),
                            ),
                        ),
                        array(
                            'sep'       => $GLOBALS['space_sep'],
                            'txt'       => esc_html__( '&copy;', 'applicator' ),
                            'css'       => 'copyright-symbol---txt',
                        ),
                        array(
                            'sep'       => $GLOBALS['space_sep'],
                            'txt'       => esc_html__( '2017', 'applicator' ),
                            'css'       => 'year---txt',
                        ),
                        array(
                            'txt'       => esc_html__( '.', 'applicator' ),
                            'css'       => 'delimiter---txt',
                        ),
                    ),
                    array(
                        'css'   => 'rights---line',
                        array(
                            'sep'       => $GLOBALS['space_sep'],
                            'txt'       => esc_html__( 'All rights reserved.', 'applicator' ),
                        ),
                        array(
                            'txt'       => esc_html__( '&trade;', 'applicator' ),
                            'css'       => 'trademark-symbol---txt',
                        ),
                    ),
                ),
            ),
        ),
    ),
) );

$main_footer_cn = htmlok( array(
    'name'          => 'Main Footer',
    'structure'     => array(
        'type'      => 'constructor',
        'subtype'   => 'main footer',
    ),
    'id'            => 'main-footer',
    'root_css'      => 'site-footer',
    'content'       => array(
        'constructor'   => $web_product_copyright_obj,
    ),
) );

//------------------------ Web Product Start

$go_to_content_navi_obj = htmlok( array(
    'name'      => 'Go to Content',
    'structure' => array(
        'type'      => 'object',
        'subtype'   => 'navigation item',
        'attr'      => array(
            'a'         => array(
                'href'      => esc_url( '#content' ),
            ),
        ),
        'title'     => 'Go to Content',
        'root_css'  => 'skip-link',
    ),
    'css'       => 'go-ct',
    'content'   => array(
        'object'        => array(
            array(
                'txt'       => esc_html__( 'Go to Content', 'applicator' ),
            ),
        ),
    ),
) );

$go_to_content_nav_cp = htmlok( array(
    'name'      => 'Go to Content',
    'structure' => array(
        'type'      => 'component',
        'subtype'   => 'navigation',
    ),
    'id'        => 'go-content-nav',
    'css'       => 'go-ct',
    'content'   => array(
        'component'     => $go_to_content_navi_obj,
    ),
) );

$web_product_start_cn = htmlok( array(
    'name'      => 'Web Product Start',
    'structure' => array(
        'type'      => 'constructor',
    ),
    'id'        => 'web-product-start',
    'css'       => 'wbp-start',
    'content'   => array(
        'constructor'       => $go_to_content_nav_cp,
    ),
) );


//------------------------ Web Product End

$go_to_start_navi_obj = htmlok( array(
    'name'      => 'Go to Start',
    'structure' => array(
        'type'      => 'object',
        'subtype'   => 'navigation item',
        'attr'      => array(
            'a'         => array(
                'href'      => esc_url( '#' ),
            ),
        ),
        'title'     => 'Go to Start',
    ),
    'css'       => 'go-start',
    'content'   => array(
        'object'        => array(
            array(
                'txt'       => esc_html__( 'Go to Start', 'applicator' ),
            ),
        ),
    ),
) );

$go_to_start_nav_cp = htmlok( array(
    'name'      => 'Go to Start',
    'structure' => array(
        'type'      => 'component',
        'subtype'   => 'navigation',
    ),
    'id'        => 'go-start-nav',
    'css'       => 'go-start',
    'content'   => array(
        'component'     => $go_to_start_navi_obj,
    ),
) );

$web_product_end_cn = htmlok( array(
    'name'      => 'Web Product End',
    'structure' => array(
        'type'      => 'constructor',
    ),
    'id'        => 'web-product-end',
    'css'       => 'wbp-end',
    'content'   => array(
        'constructor'       => $go_to_start_nav_cp,
    ),
) );


//------------------------ Web Product

$web_product = htmlok( array(
    'name'      => 'Web Product',
    'structure' => array(
        'type'          => 'constructor',
    ),
    'id'        => 'page',
    'css'       => 'wbp',
    'root_css'  => 'site',
    'content'   => array(
        'constructor'   => array(
            $web_product_start_cn,
            $main_header_cn,
            // $main_content_cn,
            $main_footer_cn,
            $web_product_end_cn,
        ),
    ),
    'echo'      => true,
) );