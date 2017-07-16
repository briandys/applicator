<!doctype html>
<html id="start" class="html<?php applicator_hook_html_class(); ?> view no-js no-svg" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
        
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
                        
        <div id="page" class="cn web-product wbp site" data-name="Web Product CN">
            <div class="cr wbp---cr">
                
                <?php
                
                //------------------------------------------------ Web Product Start
                
                // Go to Content Navi
                $go_to_content_navi_obj = htmlok( array(
                    'name'      => 'Go to Content',
                    'structure' => array(
                        'type'      => 'object',
                        'subtype'   => 'navigation item',
                        'attr'      => array(
                            'a'         => array(
                                'href'      => esc_url( '#content' ),
                            ),
                        ),
                        'id'        => 'go-ct-navi---a',
                        'title'     => 'Go to Content',
                        'root_css'  => 'skip-link',
                    ),
                    'css'       => 'go-ct',
                    'content'   => array(
                        'object'        => array(
                            array(
                                'txt'       => esc_html__( 'Go to Content', 'applicator' ),
                            ),
                        ),
                    ),
                ) );
                
                // Go to Content Nav
                $go_to_content_nav_cp = htmlok( array(
                    'name'      => 'Go to Content',
                    'structure' => array(
                        'type'      => 'component',
                        'subtype'   => 'navigation',
                    ),
                    'id'        => 'go-content-nav',
                    'root_css'  => 'go-content-nav',
                    'css'       => 'go-ct',
                    'content'   => array(
                        'component'     => $go_to_content_navi_obj,
                    ),
                ) );
                
                // Browser Upgrade Note Text
                $browser_upgrade_note_txt = sprintf( '<p>%1$s <a href="%3$s">%2$s</a></p>',
                    esc_html__( 'You are using an outdated browser. Please upgrade your browser to improve your experience.', 'applicator' ),
                    esc_html__( 'Upgrade Browser', 'applicator' ),
                    esc_url( 'http://browsehappy.com/' )
                );
                
                // Browser Upgrade Note
                $browser_upgrade_obj = htmlok( array(
                    'name'      => 'Browser Upgrade',
                    'structure' => array(
                        'type'      => 'object',
                        'subtype'   => 'note',
                        'layout'    => 'inline',
                    ),
                    'content'       => array(
                        'object'        => array(
                            array(
                                'txt'       => $browser_upgrade_note_txt,
                            ),
                        ),
                        'before'    => '<!--[if lt IE 8]>',
                        'after'    => '<![endif]-->',
                    ),
                ) );
                
                // Web Product Start
                $web_product_start_cn = htmlok( array(
                    'name'      => 'Web Product Start',
                    'structure' => array(
                        'type'      => 'constructor',
                    ),
                    'id'        => 'web-product-start',
                    'css'       => 'wbp-start',
                    'content'   => array(
                        'constructor'       => array(
                            $go_to_content_nav_cp,
                            //$go_content_nav,
                            $browser_upgrade_obj,
                        ),
                    ),
                    'echo'      => true,
                ) );
                
                //------------------------------------------------ End: Web Product Start
                
                
                //------------------------------------------------ Main Header
                
                //------------------------ Web Product Main Info
                        
                // Web Product Main Name
                $web_product_main_name_obj = htmlok( array(
                    'name'      => 'Web Product Main Name',
                    'structure' => array(
                        'type'      => 'object',
                        'elem'      => 'h1',
                        'linked'    => true,
                        'attr'      => array(
                            'a'     => array(
                                'href'      => esc_url( home_url( '/' ) ),
                            ),
                        ),
                    ),
                    'css'       => 'wbp-main-name',
                    'root_css'  => 'site-title',
                    'title'     => get_bloginfo( 'name' ),
                    'content'   => array(
                        'object'        => array(
                            array(
                                'txt'           => get_bloginfo( 'name' ),
                                'css'           => 'wbp-name',
                            ),
                        ),
                    ),
                ) );

                // Web Product Main Logo | inc > settings.php | Customizer > Site Identity
                $web_product_main_logo_obj = '';

                if ( has_custom_logo() ) {
                    $web_product_main_logo_obj = htmlok( array(
                        'name'      => 'Web Product Main Logo',
                        'structure' => array(
                            'type'          => 'object',
                            'subtype'       => 'wordpress generated content',
                        ),
                        'css'       => 'wbp-main-logo',
                        'title'     => get_bloginfo( 'name' ),
                        'content'   => array(
                            'object'        => get_custom_logo(),
                        ),
                    ) );
                }

                // Web Product Main Description
                $web_product_main_description_obj = '';
                $description = get_bloginfo( 'description', 'display' );

                if ( $description || is_customize_preview() ) {
                    $web_product_main_description_obj = htmlok( array(
                        'name'      => 'Web Product Main Description',
                        'structure' => array(
                            'type'      => 'object',
                            'linked'    => true,
                            'attr'      => array(
                                'a'     => array(
                                    'href'      => esc_url( home_url( '/' ) ),
                                ),
                            ),
                        ),
                        'css'       => 'wbp-main-desc',
                        'title'     => $description,
                        'content'   => array(
                            'object'    => array(
                                array(
                                    'txt'   => $description,
                                    'css'   => 'wbp-desc',
                                ),
                            ),
                        ),
                    ) );
                }

                // Web Product Main Info
                $web_product_main_info_cp = htmlok( array(
                    'name'      => 'Web Product Main Info',
                    'structure' => array(
                        'type'  => 'component',
                        'hr_structure'  => true,
                    ),
                    'css'       => 'wbp-main-info',
                    'content'   => array(
                        'component' => array(
                            $web_product_main_name_obj,
                            $web_product_main_logo_obj,
                            $web_product_main_description_obj,
                        ),
                    ),
                ) );

                //------------------------ End: Web Product Main Info
                
                
                // Web Product Main Media Banner | Custom Header | Customizer > Custom Header | inc > functions > custom-header.php
                $web_product_main_media_banner_obj = '';

                if ( has_header_image() ) {
                    $web_product_main_media_banner_obj = htmlok( array(
                        'name'      => 'Web Product Main Media Banner',
                        'structure' => array(
                            'type'      => 'object',
                            'subtype'   => 'wordpress generated content',
                        ),
                        'css'       => 'wbp-main-media-banner',
                        'content'   => array(
                            'object'    => get_custom_header_markup(),
                        ),
                    ) );
                }
                
                // Search
                ob_start();
                get_search_form();
                $search_form = ob_get_contents();
                ob_end_clean();
                
                
                // Main Header
                $main_header_cn = htmlok( array(
                    'name'      => 'Main Header',
                    'structure' => array(
                        'type'          => 'constructor',
                        'subtype'       => 'main header',
                    ),
                    'id'        => 'main-header',
                    'root_css'  => 'site-header',
                    'content'   => array(
                        'constructor'   => array(
                            $web_product_main_info_cp,
                            applicator_func_main_nav(),
                            applicator_hook_after_main_nav(),
                            $search_form,
                            $web_product_main_media_banner_obj,
                            applicator_func_main_header_aside(),
                        ),
                    ),
                    'echo'      => true,
                ) );
                
                //------------------------------------------------ End: Main Header
                
                ?>
                
                <section id="content" class="cn main-content site-content" data-name="Main Content">
                    <div class="cr main-content---cr">