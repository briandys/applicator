<?php
// Template Name: Tester

$generic_heading = htmlok( array(
    'namex'         => 'Text Content',
    'structurex'    => array(
        'type'      => 'object',
        'subtype'   => 'generic label',
    ),
    'content'       => array(
        array(
            'txt'   => 'Hello',
        ),
    ),
    'version'       => '0.1',
    'echo'          => true
) );

$generic_heading = htmlok( array(
    'namex'         => 'Generic Heading',
    'structurex'    => array(
        'type'      => 'object',
        'subtype'   => 'heading',
    ),
    'content'       => 'Hehe',
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
    'content'       => $super_content,
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