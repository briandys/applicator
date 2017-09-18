<?php // Starter Content

if ( ! function_exists( 'applicator_starter_content' ) ) {
    function applicator_starter_content() {
        add_action('after_setup_theme', function () {
            add_theme_support('starter-content', [
                // Static front page set to Home, posts page set to Blog
                'options' => [
                    'show_on_front' => 'page',
                    'page_on_front' => '{{home}}',
                    'page_for_posts' => '{{blog}}',
                ],
                // Starter pages to include
                'posts' => [
                    'home',
                    'about',
                    'contact',
                    'blog'
                ],
                // Add pages to primary navigation menu
                'nav_menus' => [
                    'primary_navigation' => [
                        'name' => __('Primary Navigation', 'id'),
                        'items' => [
                            'home_link',
                            'page_about',
                            'page_blog',
                            'page_contact',
                        ],
                    ]
                ],
                // Add test widgets to footer sidebar
                'widgets' => [
                    'sidebar-footer' => [
                        'text_business_info',
                        'search'
                    ]
                ]
            ]);
        });
    }
}