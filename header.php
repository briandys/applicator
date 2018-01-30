<!doctype html>
<html id="start" class="html view feature--js--none<?php applicator_hook_html_class(); ?>" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
        
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        
        <?php
                
        /* ------------------------ Web Product Start ------------------------ */

        // R: Go to Content Navi
        $go_to_content_navi_obj = applicator_htmlok( array(
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

        // R: Go to Content Nav
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


        // E: Web Product Start
        $web_product_start_cn = applicator_htmlok( array(
            'name'      => 'Web Product Start',
            'structure' => array(
                'type'      => 'constructor',
            ),
            'id'        => 'web-product-start',
            'css'       => 'wbp-start',
            'content'   => array(
                'constructor'   => array(
                    $go_to_content_nav_cp,
                ),
            ),
            'echo'      => true,
        ) );
        
        ?>
                        
        <div id="web-product" class="cn web-product wbp site" data-name="Web Product CN">
            <div class="cr wbp---cr">
                
                <?php
                
                
                /* ------------------------ Main Header ------------------------ */
                
                
                /* ------------------------ Main Info ------------------------ */
                
                // R: Main Name
                $main_name_obj = '';
                $main_name = get_bloginfo( 'name', 'display' );
                if ( $main_name || is_customize_preview() ) {
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

                
                // R: Main Logo
                // inc > settings.php | Customizer > Site Identity
                $main_logo_obj = '';

                if ( has_custom_logo() ) {
                    $main_logo_obj = applicator_htmlok( array(
                        'name'      => 'Main Logo',
                        'structure' => array(
                            'type'          => 'object',
                            'subtype'       => 'wordpress generated content',
                        ),
                        'id'        => 'main-logo',
                        'title'     => get_bloginfo( 'name' ),
                        'content'   => array(
                            'object'        => get_custom_logo(),
                        ),
                    ) );
                }

                
                // R: Main Description
                $main_description_obj = '';
                $main_description = get_bloginfo( 'description', 'display' );

                if ( $main_description || is_customize_preview() ) {
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
                        'css'       => 'main-desc',
                        'root_css'  => 'site-description',
                        'title'     => $main_description,
                        'content'   => array(
                            'object'    => $main_description,
                        ),
                    ) );
                }

                
                // R: Main Info
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
                
                
                
                // Custom Header | Customizer > Custom Header | inc > functions > custom-visuals.php
                
                $main_media_banner_obj = '';
                
                if ( has_header_image() ) {
                    
                    // R: Main Media Banner
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
                
                if ( has_header_image() || is_active_sidebar( 'main-banner-aside' ) ) {
                    
                    // R: Main Banner
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
                
                
                // OB: Hook After Main Nav
                ob_start();
                applicator_hook_after_main_nav();
                $hook_after_main_nav_ob_content = ob_get_clean();
                
                
                
                
                
                // E: Main Header
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
                            
                            // Main Info
                            $main_info_cp,
                            
                            // Main Nav
                            applicator_main_nav(),
                            
                            // Hook After Main Nav
                            // $hook_after_main_nav_ob_content,
                            
                            applicator_main_actions(),
                            
                            // Main Banner
                            $main_banner_cp,
                            
                            // Main Header Aside
                            applicator_main_header_aside(),
                        ),
                    ),
                    'echo'      => true,
                ) );
                
                ?>
                
                <section id="content" class="cn main-content site-content" data-name="Main Content CN">
                    <div class="cr main-content---cr">