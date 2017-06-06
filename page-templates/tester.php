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

    .cn
    {
        margin: .5rem;
        padding: .5rem;
        border: 2px solid red;
    }
    
    .cn::before
    {
        content: attr( data-name );
        display: inline-block;
        margin-left: -.5rem;
        margin-top: -.5rem;
        padding: .25rem;
        background-color: red;
        color: white;
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

// Web Product Main Info CP
$main_product_main_info_cp = htmlok( array(
    'namex'         => 'Web Product Main Info',
    'structurex'    => array(
        'type'      => 'component',
    ),
    'content'       => 'Web Product Main Info',
    'version'       => '0.1',
    'echo'          => true,
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
    'content'       => array(
        'Web Product Main Info',
        'Main Nav',
        'Search',
        'Aside',
    ),
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