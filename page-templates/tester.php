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
    .cp
    {
        margin: .5rem;
        padding: .5rem;
        border: 2px solid black;
    }
    
    .cn
    {
        border-color: red;
    }
    
    .cp
    {
        border-color: green;
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
    
    .obj
    {
        display: inline-block;
        margin: .5rem;
        padding: .5rem;
        border: 2px solid blue;
        
    }
    
</style>

<?php

//------------------------ Web Product Main Name OBJ
$web_product_main_name_obj = htmlok( array(
    'name'      => 'Web Product Main Name',
    'structure' => array(
        'type'      => 'object',
        'subtype'   => 'heading',
        'elem'      => 'heading',
        'attr'      => array(
            'h_level'   => 'h1',
            'linked'    => true,
            'href'      => 'index.html',
            'title'     => get_bloginfo( 'name' ),
        ),
    ),
    'css'           => 'wbp-main-name',
    'obj_content'   => array(
        array(
            'txt'   => get_bloginfo( 'name' ),
            'css'   => 'wbp-name',
        ),
    ),
) );

//------------------------ Web Product Main Logo OBJ | inc > settings.php | Customizer > Site Identity
$web_product_main_logo_obj = '';

if ( has_custom_logo() ) {
    $web_product_main_logo_obj = htmlok( array(
        'name'      => 'Web Product Main Logo',
        'structure' => array(
            'type'      => 'object',
            'subtype'   => 'wordpress generated content',
            'attr'      => array(
                'title'     => get_bloginfo( 'name' ),
            ),
        ),
        'css'           => 'wbp-main-logo',
        'obj_content'   => get_custom_logo(),
    ) );
}

//------------------------ Web Product Main Description OBJ
$web_product_main_desc_obj = '';
$description = get_bloginfo( 'description', 'display' );

if ( $description || is_customize_preview() ) {
    $web_product_main_desc_obj = htmlok( array(
        'name'      => 'Web Product Main Description',
        'structure' => array(
            'type'      => 'object',
            'attr'      => array(
                'linked'    => true,
                'href'      => esc_url( home_url( '/' ) ),
                'title'     => $description,
            ),
        ),
        'css'           => 'wbp-main-desc',
        'obj_content'   => array(
            array(
                'txt'   => $description,
                'css'   => 'wbp-desc',
            ),
        ),
    ) );
}


//------------------------ Web Product Main Media Banner OBJ | Custom Header | Customizer > Custom Header | inc > functions > custom-header.php
$web_product_main_media_banner_obj = '';

if ( has_header_image() ) {
    $web_product_main_media_banner_obj = htmlok( array(
        'name'          => 'Web Product Main Media Banner',
        'structure'     => array(
            'type'      => 'object',
            'subtype'   => 'wordpress generated content',
        ),
        'css'           => 'wbp-main-media-banner',
        'obj_content'   => get_custom_header_markup(),
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
        $web_product_main_name_obj,
        $web_product_main_logo_obj,
        $web_product_main_desc_obj,
    ),
) );

//------------------------ Main Header CN
$main_header_cn = htmlok( array(
    'name'             => 'Main Header',
    'structure'        => array(
        'type'          => 'constructor',
        'elem'          => 'header',
        'attr'          => array(
            'role'      => 'banner',
        ),
    ),
    'id'           => 'main-header',
    'root_css'      => 'site-header',
    'content'       => array(
        $main_product_main_info_cp,
        applicator_func_main_navx(),
        applicator_hook_after_main_nav(),
        get_search_form(),
        $web_product_main_media_banner_obj,
        applicator_func_main_header_aside(),
    ),
    'echo'          => true,
) );