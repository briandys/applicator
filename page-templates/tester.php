<?php
// Template Name: Tester

/*
$main_header_content = array(
    $web_product_main_name_obj,
    $web_product_main_logo_obj,
    $web_product_main_description_obj,
);

$main_header_content = implode( '', $main_header_content );
*/

$web_product_main_name_obj = htmlok( array(
    'name'          => 'Web Product Main Name',
    'structure'     => 'Object',
    'layout'        => 'inline',
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
    'parent_css'    => 'site-header',
    'content'       => $web_product_main_info_cp,
    'echo'          => true,
) );