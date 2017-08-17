<?php // Functions

$applicator_htmlok = get_parent_theme_file_path( '/inc/functions/applicator-htmlok.php' );

// Applicator HTML_OK
if ( file_exists( $applicator_htmlok ) ) { require_once( $applicator_htmlok ); }


$globals = get_parent_theme_file_path( '/inc/globals.php' );
if ( file_exists( $globals ) ) { require_once( $globals ); }

$customizer = get_parent_theme_file_path( '/inc/customizer.php' );
if ( file_exists( $customizer ) ) { require_once( $customizer ); }

$settings = get_parent_theme_file_path( '/inc/settings.php' );
if ( file_exists( $settings ) ) { require_once( $settings ); }

$hooks = get_parent_theme_file_path( '/inc/hooks.php' );
if ( file_exists( $hooks ) ) { require_once( $hooks ); }


// Styles and Scripts
$styles = get_parent_theme_file_path( '/inc/styles.php' );
if ( file_exists( $styles ) ) { require_once( $styles ); }

$scripts = get_parent_theme_file_path( '/inc/scripts.php' );
if ( file_exists( $scripts ) ) { require_once( $scripts ); }


// Navigations
$main_nav = get_parent_theme_file_path( '/inc/tags/main-nav.php' );
if ( file_exists( $main_nav ) ) { require_once( $main_nav ); }

$page_nav = get_parent_theme_file_path( '/inc/tags/page-nav.php' );
if ( file_exists( $page_nav ) ) { require_once( $page_nav ); }

$entry_nav = get_parent_theme_file_path( '/inc/tags/entry-nav.php' );
if ( file_exists( $entry_nav ) ) { require_once( $entry_nav ); }

$post_nav = get_parent_theme_file_path( '/inc/tags/post-nav.php' );
if ( file_exists( $post_nav ) ) { require_once( $post_nav ); }

$breadcrumbs_nav = get_parent_theme_file_path( '/inc/tags/breadcrumbs-nav.php' );
if ( file_exists( $breadcrumbs_nav ) ) { require_once( $breadcrumbs_nav ); }


// Aside
$aside = get_parent_theme_file_path( '/inc/tags/aside.php' );
if ( file_exists( $aside ) ) { require_once( $aside ); }


// Entry
$post_actions = get_parent_theme_file_path( '/inc/tags/entry-actions.php' );
if ( file_exists( $post_actions ) ) { require_once( $post_actions ); }

$post_published_modified_cp = get_parent_theme_file_path( '/inc/tags/post-published-modified-cp.php' );
if ( file_exists( $post_published_modified_cp ) ) {
    require_once( $post_published_modified_cp );
}

$post_author = get_parent_theme_file_path( '/inc/tags/post-author.php' );
if ( file_exists( $post_author ) ) { require_once( $post_author ); }

$post_classification = get_parent_theme_file_path( '/inc/tags/post-classification.php' );
if ( file_exists( $post_classification ) ) { require_once( $post_classification ); }

$post_banner_visual = get_parent_theme_file_path( '/inc/tags/post-banner-visual.php' );
if ( file_exists( $post_banner_visual ) ) { require_once( $post_banner_visual ); }

$main_content_headings = get_parent_theme_file_path( '/inc/tags/main-content-headings.php' );
if ( file_exists( $main_content_headings ) ) { require_once( $main_content_headings ); }

$post_title = get_parent_theme_file_path( '/inc/functions/post-title.php' );
if ( file_exists( $post_title ) ) { require_once( $post_title ); }


// Comments
$comments = get_parent_theme_file_path( '/inc/functions/get-comments.php' );
if ( file_exists( $comments ) ) { require_once( $comments ); }




$comments_actions_snippet = get_parent_theme_file_path( '/inc/tags/comments-actions-snippet-cp.php' );
if ( file_exists( $comments_actions_snippet ) ) {
    require_once( $comments_actions_snippet );
}




$comments_nav = get_parent_theme_file_path( '/inc/tags/comments-nav.php' );
if ( file_exists( $comments_nav ) ) { require_once( $comments_nav ); }

$comment = get_parent_theme_file_path( '/inc/tags/comment.php' );
if ( file_exists( $comment ) ) { require_once( $comment ); }

$comment_form = get_parent_theme_file_path( '/inc/functions/comment-form.php' );
if ( file_exists( $comment_form ) ) { require_once( $comment_form ); }

// Template Parts
$post_content = get_parent_theme_file_path( '/template-parts/post-content.php' );
if ( file_exists( $post_content ) ) { require_once( $post_content ); }

// Constructor
$web_product_end_cn = get_parent_theme_file_path( '/template-parts/web-product-end-cn.php' );
if ( file_exists( $web_product_end_cn ) ) {
    require_once( $web_product_end_cn );
}


// Functions
$html_body_class = get_parent_theme_file_path( '/inc/functions/html-body-class.php' );
if ( file_exists( $html_body_class ) ) { require_once( $html_body_class ); }

$custom_fonts = get_parent_theme_file_path( '/inc/functions/custom-fonts.php' );
if ( file_exists( $custom_fonts ) ) { require_once( $custom_fonts ); }

$custom_visuals = get_parent_theme_file_path( '/inc/functions/custom-visuals.php' );
if ( file_exists( $custom_visuals ) ) { require_once( $custom_visuals ); }

$widgets_init = get_parent_theme_file_path( '/inc/functions/widgets-init.php' );
if ( file_exists( $widgets_init ) ) { require_once( $widgets_init ); }

$excerpt = get_parent_theme_file_path( '/inc/functions/excerpt.php' );
if ( file_exists( $excerpt ) ) { require_once( $excerpt ); }

$pingback_header = get_parent_theme_file_path( '/inc/functions/pingback-header.php' );
if ( file_exists( $pingback_header ) ) { require_once( $pingback_header ); }

$icons = get_parent_theme_file_path( '/inc/functions/icons.php' );
if ( file_exists( $icons ) ) { require_once( $icons ); }


// Snap-ons
$snapons = get_parent_theme_file_path( '/snapons.php' );
if ( file_exists( $snapons ) ) { require_once( $snapons ); }







/**
 * Display custom color CSS.
 */
function applicator_func_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/functions/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo applicator_func_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'applicator_func_colors_css_wrap' );





add_action( 'wp_enqueue_scripts', function () {
    $js = 'wp.customize.selectiveRefresh.Partial.prototype.createEditShortcutForPlacement = function() {};';
    wp_add_inline_script( 'customize-selective-refresh', $js );
} );
