<?php // Functions


// Applicator HTML_OK
$applicator_htmlok = get_parent_theme_file_path( '/inc/functions/applicator-htmlok.php' );
if ( file_exists( $applicator_htmlok ) ) { require( $applicator_htmlok ); }


// Globals
$globals = get_parent_theme_file_path( '/inc/globals.php' );
if ( file_exists( $globals ) ) { require( $globals ); }


// Settings
$settings = get_parent_theme_file_path( '/inc/settings.php' );
if ( file_exists( $settings ) ) { require( $settings ); }


// Hooks
$hooks = get_parent_theme_file_path( '/inc/hooks.php' );
if ( file_exists( $hooks ) ) { require( $hooks ); }


// Default Styles and Scripts
$default_styles_scripts = get_parent_theme_file_path( '/inc/styles-scripts--default.php' );
if ( file_exists( $default_styles_scripts ) ) { require( $default_styles_scripts ); }


// Enhancements Styles and Scripts
$enhancements_styles_scripts = get_parent_theme_file_path( '/inc/styles-scripts--enhancements.php' );
if ( file_exists( $enhancements_styles_scripts ) ) { require( $enhancements_styles_scripts ); }


// Snap-On
$snap_on = get_parent_theme_file_path( '/snap-on/index.php' );
if ( file_exists( $snap_on ) ) { require( $snap_on ); }


// Main Nav
$main_nav = get_parent_theme_file_path( '/inc/tags/main-nav.php' );
if ( file_exists( $main_nav ) ) { require( $main_nav ); }


// Page Nav
$page_nav = get_parent_theme_file_path( '/inc/tags/page-nav.php' );
if ( file_exists( $page_nav ) ) { require( $page_nav ); }


// Entry Nav
$entry_nav = get_parent_theme_file_path( '/inc/tags/entry-nav.php' );
if ( file_exists( $entry_nav ) ) { require( $entry_nav ); }


// Post Nav
$post_nav = get_parent_theme_file_path( '/inc/tags/post-nav.php' );
if ( file_exists( $post_nav ) ) { require( $post_nav ); }


// Breadcrumbs Nav
$breadcrumbs_nav = get_parent_theme_file_path( '/inc/tags/breadcrumbs-nav.php' );
if ( file_exists( $breadcrumbs_nav ) ) { require( $breadcrumbs_nav ); }


// Aside
$aside = get_parent_theme_file_path( '/inc/tags/aside.php' );
if ( file_exists( $aside ) ) { require( $aside ); }


// Post Actions
$post_actions = get_parent_theme_file_path( '/inc/tags/post-actions.php' );
if ( file_exists( $post_actions ) ) { require( $post_actions ); }


// Post Published, Modified
$post_published_modified = get_parent_theme_file_path( '/inc/tags/post-published-modified.php' );
if ( file_exists( $post_published_modified ) ) { require( $post_published_modified ); }


// Post Author
$post_author = get_parent_theme_file_path( '/inc/tags/post-author.php' );
if ( file_exists( $post_author ) ) { require( $post_author ); }


// Post Classifications (Categories, Tags)
$post_classification = get_parent_theme_file_path( '/inc/tags/post-classification.php' );
if ( file_exists( $post_classification ) ) { require( $post_classification ); }


// Post Banner Visual
$post_banner_visual = get_parent_theme_file_path( '/inc/tags/post-banner-visual.php' );
if ( file_exists( $post_banner_visual ) ) { require( $post_banner_visual ); }


// Main Content Headings
$main_content_headings = get_parent_theme_file_path( '/inc/tags/main-content-headings.php' );
if ( file_exists( $main_content_headings ) ) { require( $main_content_headings ); }


// Comments Actions Snippet
$comments_actions_snippet = get_parent_theme_file_path( '/inc/tags/comments-actions-snippet.php' );
if ( file_exists( $comments_actions_snippet ) ) { require( $comments_actions_snippet ); }


// Comments Nav
$comments_nav = get_parent_theme_file_path( '/inc/tags/comments-nav.php' );
if ( file_exists( $comments_nav ) ) { require( $comments_nav ); }


// Comment
$comment = get_parent_theme_file_path( '/inc/tags/comment.php' );
if ( file_exists( $comment ) ) { require( $comment ); }


// Comment Form
$comment_form = get_parent_theme_file_path( '/inc/functions/comment-form.php' );
if ( file_exists( $comment_form ) ) { require( $comment_form ); }


// Entry Content
$post_content = get_parent_theme_file_path( '/inc/functions/entry-content.php' );
if ( file_exists( $post_content ) ) { require( $post_content ); }


// HTML, Body CSS
$html_body_class = get_parent_theme_file_path( '/inc/functions/html-body-class.php' );
if ( file_exists( $html_body_class ) ) { require( $html_body_class ); }


// Custom Visuals
$custom_visuals = get_parent_theme_file_path( '/inc/functions/custom-visuals.php' );
if ( file_exists( $custom_visuals ) ) { require( $custom_visuals ); }


// Widgets
$widgets = get_parent_theme_file_path( '/inc/functions/widgets.php' );
if ( file_exists( $widgets ) ) { require( $widgets ); }


// Excerpt
$excerpt = get_parent_theme_file_path( '/inc/functions/excerpt.php' );
if ( file_exists( $excerpt ) ) { require( $excerpt ); }


// Pingback Header
$pingback_header = get_parent_theme_file_path( '/inc/functions/pingback-header.php' );
if ( file_exists( $pingback_header ) ) { require( $pingback_header ); }


// Icons
$icons = get_parent_theme_file_path( '/inc/functions/icons.php' );
if ( file_exists( $icons ) ) { require( $icons ); }


// Custom Fonts
$custom_fonts = get_parent_theme_file_path( '/inc/functions/custom-fonts.php' );
if ( file_exists( $custom_fonts ) ) { require( $custom_fonts ); }


// Customizer
$customizer = get_parent_theme_file_path( '/inc/functions/customizer.php' );
if ( file_exists( $customizer ) ) { require( $customizer ); }


// Customizer Custom Colors
$customizer_custom_colors = get_parent_theme_file_path( '/inc/functions/customizer-custom-colors.php' );
if ( file_exists( $customizer_custom_colors ) ) { require( $customizer_custom_colors ); }


// Meta Description
$meta_description = get_parent_theme_file_path( '/inc/functions/meta-description.php' );
if ( file_exists( $meta_description ) ) { require( $meta_description ); }


// Main Content Header
$main_content_header = get_parent_theme_file_path( '/inc/functions/main-content-header.php' );
if ( file_exists( $main_content_header ) ) { require( $main_content_header ); }


// Main Content Footer
$main_content_footer = get_parent_theme_file_path( '/inc/functions/main-content-footer.php' );
if ( file_exists( $main_content_footer ) ) { require( $main_content_footer ); }