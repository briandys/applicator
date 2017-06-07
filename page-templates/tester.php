<?php
// Template Name: Tester

?>

<style>
    
    *
    {
        box-sizing: border-box;
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

// Web Product Main Name OBJ
$web_product_main_name_obj = htmlok( array(
    'namex'      => 'Web Product Main Name',
    'structurex' => array(
        'type'      => 'object',
        'subtype'   => 'heading',
        'elem'      => 'heading',
        'attr'      => array(
            'h_level'   => 'h1',
            'linked'    => true,
            'href'      => 'index.html',
            'title'     => 'Applicator',
        ),
    ),
    'css'           => 'wbp-main-name',
    'obj_content'   => array(
        array(
            'txt'   => 'Applicator',
            'css'   => 'wbp-name',
        ),
    ),
    'version'       => '0.1',
) );

// Web Product Main Logo OBJ
$web_product_main_logo_obj = htmlok( array(
    'namex'      => 'Web Product Main Logo',
    'structurex' => array(
        'type'      => 'object',
        'subtype'   => 'wordpress generated content',
        'attr'      => array(
            'title'     => 'Applicator',
        ),
    ),
    'css'           => 'wbp-main-logo',
    'obj_content'   => get_custom_logo(),
    'version'       => '0.1',
) );

// Web Product Main Description OBJ
$web_product_main_desc_obj = htmlok( array(
    'namex'      => 'Web Product Main Description',
    'structurex' => array(
        'type'      => 'object',
        'subtype'   => 'generic label',
        'attr'      => array(
            'linked'    => true,
            'href'      => 'index.html',
            'title'     => 'Description',
        ),
    ),
    'css'           => 'wbp-main-desc',
    'obj_content'   => array(
        array(
            'txt'   => esc_html__( 'This example highlights the major problem with this function in that it will take no notice of the words in a string. The solution is to create a new function that will avoid cutting words apart when cutting a string by a number of characters.', $GLOBALS['applicator_td'] ),
            'css'   => 'wbp-desc',
        ),
    ),
    'version'       => '0.1',
) );

// Web Product Main Info CP
$main_product_main_info_cp = htmlok( array(
    'namex'         => 'Web Product Main Info',
    'structurex'    => array(
        'type'          => 'component',
        'hr_structure'  => true,
    ),
    'css'           => 'wbp-main-info',
    'content'       => array(
        $web_product_main_name_obj,
        $web_product_main_logo_obj,
        $web_product_main_desc_obj,
    ),
    'version'       => '0.1',
) );

// Main Header CN
$main_header_cn = htmlok( array(
    'namex'             => 'Main Header',
    'structurex'        => array(
        'type'          => 'constructor',
        'elem'          => 'header',
        'attr'          => array(
            'role'      => 'banner',
        ),
    ),
    'idx'           => 'main-header',
    'root_css'      => 'site-header',
    'content'       => $main_product_main_info_cp,
    'version'       => '0.1',
    'echo'          => true,
) );

/*
$generic_heading = htmlok( array(
    'namex'         => 'Text Content',
    'structurex'    => array(
        'type'      => 'object',
        'subtype'   => 'generic label',
    ),
    'content'       => 'Text Hehe',
    'version'       => '0.1',
    'echo'          => true,
    'obj_content'   => array(
        array(
            'sep'   => '',
            'txt'   => 'Isa ito.',
            'css'   => '',
        ),
        array(
            'sep'   => '',
            'txt'   => 'Pangalawa ito.',
            'css'   => '',
        ),
    ),
) );

$generic_heading = htmlok( array(
    'namex'         => 'Generic Heading',
    'structurex'    => array(
        'type'      => 'object',
        'subtype'   => 'heading',
    ),
    'obj_content'   => array(
        array(
            'sep'   => '',
            'txt'   => 'Isa ito sa mga examples ko.',
            'css'   => '',
        ),
    ),
    'version'       => '0.1',
) );

$post_title = htmlok( array(
    'namex'         => 'Post Title with Link',
    'structurex'    => array(
        'type'      => 'object',
        'subtype'   => 'heading',
        'elem'      => 'heading',
        'attr'      => array(
            'linked'    => true,
            'href'      => 'http://www.google.com/',
        ),
    ),
    'content'       => 'Wow First Post',
    'version'       => '0.1',
) );

$google_url = htmlok( array(
    'namex'         => 'Google URL',
    'structurex'    => array(
        'type'      => 'object',
        'subtype'   => 'link',
        'layout'    => 'inline',
        'attr'      => array(
            'href'      => 'http://www.google.com/',
        ),
    ),
    'content'       => 'The site to Google.',
    'version'       => '0.1',
) );

$super_content = implode( '', array(
    $generic_heading,
    $post_title,
    $google_url,
) );

htmlok( array(
    'namex'         => 'Basic Text',
    'structurex'    => array(
        'type'      => 'constructor',
        'elem'      => 'header',
        'attr'      => array(
            'title' => 'AUTO',
        ),
    ),
    'content'       => array(
        $generic_heading,
        $post_title,
        $google_url,
    ),
    'version'       => '0.1',
    'echo'          => true,
) );

htmlok( array(
    'namex'         => 'Main Footer',
    'structurex'    => array(
        'type'      => 'constructor',
        'elem'      => 'footer',
        'role'      => 'contentinfo',
    ),
    'idx'           => 'AUTO',
    'content'       => 'CONSTRUCTOR MAIN FOOTER TEST',
    'version'       => '0.1',
    'echo'          => true,
) );

htmlok( array(
    'namex'         => 'Main Header',
    'structurex'    => array(
        'type'      => 'constructor',
        'elem'      => 'header',
        'role'      => 'banner',
    ),
    'idx'           => 'AUTO',
    'content'       => 'CONSTRUCTOR MAIN HEADER TEST',
    'version'       => '0.1',
    'echo'          => true,
) );

$web_product_main_name_obj = htmlok( array(
    'name'          => 'Web Product Main Name',
    'structure'     => 'Object',
    'layout'        => 'inline',
    'obj_elem'      => 'anchor',
    'content'       => 'Applicator',
) );

$web_product_main_info_cp = htmlok( array(
    'name'          => 'Web Product Main Info',
    'structure'     => 'Component',
    'content'       => $web_product_main_name_obj.' Logo, Description',
) );

$main_header_cn = htmlok( array(
    'name'          => 'Main Header',
    'structure'     => 'Constructor',
    'role'          => 'banner',
    'elem'          => 'header',
    'id'            => 'main-header',
    'root_css'      => 'site-header',
    'content'       => $web_product_main_info_cp,
    'echo'          => true,
) );

*/