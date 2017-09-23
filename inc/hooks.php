<?php // Hooks


// header.php
function applicator_hook_html_class() {
    do_action( 'applicator_hook_html_class' );
}


//  header.php
function applicator_hook_after_main_search() {
    do_action( 'applicator_hook_after_main_search' );
}


// content.php
function applicator_hook_after_main_post_title() {
    do_action( 'applicator_hook_after_main_post_title' );
}


// content.php
function applicator_hook_after_post_header_aside() {
    do_action( 'applicator_hook_after_post_header_aside' );
}