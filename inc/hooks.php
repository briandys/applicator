<?php

//------------------------- Hooks

// header.php
function apl_hook_html_class() {
    do_action( 'apl_hook_html_class' );
}

//  header.php
function applicator_hook_after_main_nav() {
    do_action( 'applicator_hook_after_main_nav' );
}

// content.php
function applicator_hook_after_entry_heading() {
    do_action( 'applicator_hook_after_entry_heading' );
}

// content.php
function applicator_hook_after_entry_meta() {
    do_action( 'applicator_hook_after_entry_meta' );
}