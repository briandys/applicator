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
require_once( get_template_directory() . '/inc/tags/post-nav.php');
require_once( get_template_directory() . '/inc/tags/breadcrumbs-nav.php');

// Aside
require_once( get_template_directory() . '/inc/tags/aside.php');

// Entry
require_once( get_template_directory() . '/inc/tags/post-actions.php');
require_once( get_template_directory() . '/inc/tags/post-timestamp.php');
require_once( get_template_directory() . '/inc/tags/post-author.php');
require_once( get_template_directory() . '/inc/tags/post-classification.php');
require_once( get_template_directory() . '/inc/tags/post-banner-visual.php');

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
require_once( get_template_directory() . '/inc/functions/widgets-init.php');
require_once( get_template_directory() . '/inc/functions/auto-copyright-year.php');
require_once( get_template_directory() . '/inc/functions/show-more.php');
require_once( get_template_directory() . '/inc/functions/pingback-header.php');
require_once( get_template_directory() . '/inc/functions/icons.php');


// Snap-ons
require_once( get_template_directory() . '/snapons.php');