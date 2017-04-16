<?php


require_once( get_template_directory() . '/inc/settings.php');

require_once( get_template_directory() . '/inc/hooks.php');


// Styles and Scripts
require_once( get_template_directory() . '/inc/styles.php');
require_once( get_template_directory() . '/inc/scripts.php');


// Navigations
require_once( get_template_directory() . '/inc/tags/main-nav.php');
require_once( get_template_directory() . '/inc/tags/page-nav.php');
require_once( get_template_directory() . '/inc/tags/entries-nav.php');
require_once( get_template_directory() . '/inc/tags/entry-nav.php');
require_once( get_template_directory() . '/inc/tags/breadcrumbs-nav.php');


// Entry
require_once( get_template_directory() . '/inc/tags/entry-actions.php');
require_once( get_template_directory() . '/inc/tags/entry-timestamp.php');
require_once( get_template_directory() . '/inc/tags/entry-author.php');
require_once( get_template_directory() . '/inc/tags/entry-classification.php');
require_once( get_template_directory() . '/inc/tags/entry-banner-image.php');

// Comments
require_once( get_template_directory() . '/inc/tags/comments-actions-snippet.php');
require_once( get_template_directory() . '/inc/tags/comments-nav.php');
require_once( get_template_directory() . '/inc/tags/comment.php');
require_once( get_template_directory() . '/inc/functions/comment-form.php');


// Template Parts
require_once( get_template_directory() . '/template-parts/entry-content.php');


// Functions
require_once( get_template_directory() . '/inc/functions/html-body-class.php');
require_once( get_template_directory() . '/inc/functions/custom-fonts.php');
require_once( get_template_directory() . '/inc/functions/custom-visuals.php');
require_once( get_template_directory() . '/inc/functions/aside.php');
require_once( get_template_directory() . '/inc/functions/auto-copyright-year.php');
require_once( get_template_directory() . '/inc/functions/show-more.php');
require_once( get_template_directory() . '/inc/functions/pingback-header.php');
require_once( get_template_directory() . '/inc/functions/icons.php');


// Snap-ons
require_once( get_template_directory() . '/snapons.php');