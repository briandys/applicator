<?php


require_once( get_template_directory() . '/inc/settings.php');

require_once( get_template_directory() . '/inc/hooks.php');
require_once( get_template_directory() . '/inc/aside.php');


// Styles and Scripts
require_once( get_template_directory() . '/inc/functions/html-body-class.php');
require_once( get_template_directory() . '/inc/functions/custom-fonts.php');

require_once( get_template_directory() . '/inc/styles.php');
require_once( get_template_directory() . '/inc/scripts.php');


// Navigations
require_once( get_template_directory() . '/inc/tags/main-nav.php');
require_once( get_template_directory() . '/inc/tags/entry-page-nav.php');
require_once( get_template_directory() . '/inc/tags/breadcrumbs-nav.php');
require_once( get_template_directory() . '/inc/tags/entries-nav.php');
require_once( get_template_directory() . '/inc/tags/page-nav.php');


// Entry Tags
require_once( get_template_directory() . '/inc/tags/entry-actions.php');
require_once( get_template_directory() . '/inc/tags/entry-timestamp.php');
require_once( get_template_directory() . '/inc/tags/entry-author.php');
require_once( get_template_directory() . '/inc/tags/entry-classification.php');

require_once( get_template_directory() . '/inc/tags/comments-actions-snippet.php');
require_once( get_template_directory() . '/inc/tags/comments-nav.php');
require_once( get_template_directory() . '/inc/tags/comment-item.php');
require_once( get_template_directory() . '/inc/functions/comment-form.php');


// Template Parts
require_once( get_template_directory() . '/template-parts/entry-content.php');


// Snap-ons
require_once( get_template_directory() . '/applicator-snapons.php');


// Functions
require_once( get_template_directory() . '/inc/functions/auto-copyright-year.php');