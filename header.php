<!doctype html>
<html class="html no-js<?php applicator_hook_html_css(); ?>" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
        
        <?php wp_head(); ?>
    </head>
    <body id="start" <?php body_class(); ?>>

        <?php
        
        $wildcard_cn = applicator_htmlok( array(
            'name'          => 'Applicator Wildcard',
            'description'   => 'Contains any type of UI like Overlays.',
            'purpose'       => 'Enables the extension of the UI into a separate structure.',
            'structure'     => array(
                'type'          => 'constructor',
            ),
            'id'            => 'applicator-wildcard',
            'content'       => array(
                'constructor'       => '',
            ),
            'echo'          => true,
        ) );
        
        ?>
                        
        <div id="web-product" class="cn web-product site" data-name="Web Product CN">
            <div class="cr web-product---cr">
                
                <?php
        
                $go_to_content_navi_obj = applicator_htmlok( array(
                    'name'          => 'Go to Content',
                    'description'   => 'Takes the user to the content.',
                    'purpose'       => 'Enables the user to go to the content immediately.',
                    'structure'     => array(
                        'type'          => 'object',
                        'subtype'       => 'navigation item',
                        'attr'          => array(
                            'a'             => array(
                                'href'          => esc_url( '#content' ),
                            ),
                        ),
                        'id'            => 'go-ct-navi---a',
                        'title'         => 'Go to Content',
                        'root_css'      => 'skip-link',
                    ),
                    'css'           => 'go-ct',
                    'content'       => array(
                        'object'        => array(
                            array(
                                'txt'       => esc_html__( 'Go to Content', 'applicator' ),
                            ),
                        ),
                    ),
                ) );

                
                $go_to_content_nav_cp = applicator_htmlok( array(
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


                $web_product_start_cn = applicator_htmlok( array(
                    'name'      => 'Web Product Start',
                    'structure' => array(
                        'type'      => 'constructor',
                    ),
                    'id'        => 'web-product-start',
                    'content'   => array(
                        'constructor'   => array(
                            $go_to_content_nav_cp,
                        ),
                    ),
                    'echo'      => true,
                ) );
                
                
                $main_name_obj = '';
                $main_name = get_bloginfo( 'name', 'display' );
                
                if ( $main_name || is_customize_preview() )
                {
                    $main_name_obj = applicator_htmlok( array(
                        'name'      => 'Main Name',
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
                        'root_css'  => 'site-title',
                        'title'     => $main_name,
                        'content'   => array(
                            'object'        => $main_name,
                        ),
                    ) );
                }

                
                $main_logo_obj = ''; // inc > settings.php | Customizer > Site Identity

                if ( has_custom_logo() )
                {
                    $main_logo_obj = applicator_htmlok( array(
                        'name'      => 'Main Logo',
                        'structure' => array(
                            'type'          => 'object',
                            'subtype'       => 'wordpress generated content',
                        ),
                        'id'        => 'main-logo',
                        'title'     => get_bloginfo( 'name', 'display' ),
                        'content'   => array(
                            'object'        => get_custom_logo(),
                        ),
                    ) );
                }

                
                $main_description_obj = '';
                $main_description = get_bloginfo( 'description', 'display' );

                if ( $main_description || is_customize_preview() )
                {
                    $main_description_obj = applicator_htmlok( array(
                        'name'      => 'Main Description',
                        'structure' => array(
                            'type'      => 'object',
                            'linked'    => true,
                            'attr'      => array(
                                'a'     => array(
                                    'href'      => esc_url( home_url( '/' ) ),
                                ),
                            ),
                        ),
                        'root_css'  => 'site-description',
                        'title'     => $main_description,
                        'content'   => array(
                            'object'    => $main_description,
                        ),
                    ) );
                }

                
                $main_info_cp = applicator_htmlok( array(
                    'name'      => 'Main Info',
                    'structure' => array(
                        'type'  => 'component',
                        'hr_structure'  => true,
                    ),
                    'content'   => array(
                        'component' => array(
                            
                            // Main Name
                            $main_name_obj,
                            
                            // Main Logo
                            $main_logo_obj,
                            
                            // Main Description
                            $main_description_obj,
                        ),
                    ),
                ) );
                
                
                $main_media_banner_obj = ''; // Custom Header | Customizer > Custom Header | inc > functions > custom-visuals.php
                
                if ( has_header_image() )
                {
                    $main_media_banner_obj = applicator_htmlok( array(
                        'name'      => 'Main Media Banner',
                        'structure' => array(
                            'type'      => 'object',
                            'attr'      => array(
                                'elem_label'         => array(
                                    'style'      => 'background-image: url('. esc_url( get_header_image() ). ')',
                                ),
                            ),
                        ),
                        'content'   => array(
                            'object'    => get_custom_header_markup(),
                        ),
                    ) );
                
                }

                
                $main_banner_cp = '';
                
                if ( has_header_image() || is_active_sidebar( 'main-banner-aside' ) )
                {
                    $main_banner_cp = applicator_htmlok( array(
                        'name'      => 'Main Banner',
                        'structure' => array(
                            'type'  => 'component',
                        ),
                        'id'        => 'main-banner',
                        'content'   => array(
                            'component' => array(
                                
                                applicator_main_banner(),
                                $main_media_banner_obj,
                            
                            ),
                        ),
                    ) );
                }
                
                
                ob_start();
                applicator_hook_after_main_nav();
                $hook_after_main_nav_ob_content = ob_get_clean();
                
                
                $main_header_cn = applicator_htmlok( array(
                    'name'      => 'Main Header',
                    'structure' => array(
                        'type'          => 'constructor',
                        'subtype'       => 'main header',
                    ),
                    'id'        => 'main-header',
                    'root_css'  => 'site-header',
                    'content'   => array(
                        'constructor'   => array(
                            
                            $main_info_cp,
                            applicator_main_nav(),
                            $hook_after_main_nav_ob_content,
                            applicator_main_actions(),
                            $main_banner_cp,
                            applicator_main_header_aside(),
                        ),
                    ),
                    'echo'      => true,
                ) );
                
                ?>
                
                <section id="main-content" class="section cn main-content site-content" data-name="Main Content CN">
                    <div id="content" class="cr main-content---cr">