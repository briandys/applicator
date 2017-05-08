<!doctype html>
<html id="start" class="html<?php apl_hook_html_class(); ?> view no-js no-svg" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
        
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        
        <div id="page" class="cn wbp site" data-name="Web Product">
            <div class="cr wbp---cr">
                
                <div class="cn wbp-start" data-name="Web Product Start">
                    <div class="cr wbp-start---cr">

                        <div id="go-content-nav" class="nav go-content-nav" role="navigation" data-name="Go to Content Nav">
                            <div class="h go-ct-nav---h"><?php esc_html_e( 'Go to Content Navigation', 'applicator'); ?></div>
                            <div class="ct go-ct-nav---ct">

                                    <?php // Markup
                                    $go_content_navi_mu = '<div class="obj navi go-content-navi" data-name="Go to Content Nav Item">';
                                        $go_content_navi_mu .= '<a id="go-ct-navi---a" class="a go-ct-navi---a skip-link" href="#content" title="%1$s"><span class="a_l go-ct-navi---a_l"><span class="word go---word">%2$s</span> <span class="word to---word">%3$s</span> <span class="word content---word">%4$s</span></span></a>';
                                    $go_content_navi_mu .= '</div>';

                                    printf( $go_content_navi_mu,
                                        esc_attr__( 'Go to Content', 'applicator'),
                                        esc_html__( 'Go', 'applicator'),
                                        esc_html__( 'to', 'applicator'),
                                        esc_html__( 'Content', 'applicator')
                                    ); ?>
                                
                            </div>
                        </div><!-- Go to Content Nav -->

                        <!--[if lt IE 8]>
                        <div class="obj note browser-upgrade-note---obj" data-name="Browser Upgrade">
                            <div class="g browser-upg---g">
                                <?php printf ( '<p>%1$s <a href="%2$s">%3$s</a></p>',
                                    esc_html__( 'You are using an outdated browser. Please upgrade your browser to improve your experience.', 'applicator' ),
                                    esc_url( 'http://browsehappy.com/' ),
                                    esc_html__( 'Upgrade Browser', 'applicator' )
                                ); ?>
                            </div>
                        </div>
                        <![endif]-->

                    </div>
                </div><!-- wbp-start -->
        
                <header id="masthead" class="cn header main-header site-header" data-name="Main Header" role="banner">
                    <div class="cr main-header---cr">
                        
                        <div class="cp wbp-main-info" data-name="Web Product Main Info">
                            <?php

                            // Web Product Main Name
                            // Markup
                            $wbp_main_name_obj_mu = '<div class="%2$s" data-name="%1$s">';
                                $wbp_main_name_obj_mu .= '<h1 class="h %3$s---h site-title">';
                                    $wbp_main_name_obj_mu .= '<a class="a %3$s---a" href="%6$s" rel="home" title="%4$s"><span class="a_l %3$s---a_l"><span class="txt %5$s---txt">';
                                        $wbp_main_name_obj_mu .= '%4$s';
                                    $wbp_main_name_obj_mu .= '</span></span></a>';
                                $wbp_main_name_obj_mu .= '</h1>';
                            $wbp_main_name_obj_mu .= '</div>';

                            // Content
                            $wbp_main_name_obj = sprintf( $wbp_main_name_obj_mu,
                                'Web Product Main Name Object',
                                    'obj wbp-main-name-obj',
                                    'wbp-main-name-obj',
                                get_bloginfo( 'name' ),
                                    'wbp-name',
                                esc_url( home_url( '/' ) )
                            );
                            
                            // Display
                            printf( $wbp_main_name_obj );

                            // Web Product Custom Logo | inc > settings.php | Customizer > Site Identity
                            if ( has_custom_logo() ) {
                                
                                // Markup
                                $wbp_main_logo_obj_mu = '<div class="%2$s" title="%4$s" data-name="%1$s">';
                                    $wbp_main_logo_obj_mu .= '%3$s';
                                $wbp_main_logo_obj_mu .= '</div>';

                                // Content
                                $wbp_main_logo_obj = sprintf( $wbp_main_logo_obj_mu,
                                    'Web Product Main Logo Object',
                                        'obj wbp-logo-obj',
                                    get_custom_logo(),
                                    get_bloginfo( 'name' )
                                );
                            
                                // Display
                                printf( $wbp_main_logo_obj );
                            }
                            
                            // Web Product Main Description
                            $description = get_bloginfo( 'description', 'display' );
                            
                            if ( $description || is_customize_preview() ) {

                                // Markup
                                $wbp_main_desc_obj_mu = '<div class="obj %2$s" data-name="%1$s">';
                                    $wbp_main_desc_obj_mu .= '<div class="g %3$s---g">';
                                        $wbp_main_desc_obj_mu .= '<a class="a %3$s---a" href="%6$s" rel="home" title="%4$s"><span class="a_l %3$s---a_l"><span class="txt %5$s---txt">';
                                            $wbp_main_desc_obj_mu .= '%4$s';
                                        $wbp_main_desc_obj_mu .= '</span></span></a>';
                                    $wbp_main_desc_obj_mu .= '</div>';
                                $wbp_main_desc_obj_mu .= '</div>';

                                // Content
                                $wbp_main_desc_obj = sprintf( $wbp_main_desc_obj_mu,
                                    'Web Product Main Description Object',
                                        'obj wbp-main-desc-obj',
                                        'wbp-main-desc-obj',
                                    $description,
                                        'wbp-desc',
                                    esc_url( home_url( '/' ) )
                                );
                            
                                // Display
                                printf( $wbp_main_desc_obj );
                            }
                            ?>
                        </div><!-- Web Product Main Info -->
                        
                        <?php
                        // Main Navigation | inc > tags > main-navigation.php
                        apl_func_main_nav();

                        // After Main Navigation Hook
                        apl_hook_after_main_nav();
                        
                        // Search | searchform.php
                        get_search_form();
                        
                        // Custom Header | Customizer > Custom Header | inc > functions > custom-header.php
                        if ( has_header_image() ) { ?>
                        <div class="cp wbp-media-banner" data-name="Web Product Media Banner">
                            <div class="cr wbp-media-banner--cr">
                                <?php the_custom_header_markup(); ?>
                            </div>
                        </div>
                        <?php }
                        
                        // Aside | inc > aside.php
                        apl_func_main_header_aside();
                        ?>
                    
                    </div>
                </header><!-- main-header -->
                
                <section id="content" class="cn main-content site-content" data-name="Main Content">
                    <div class="cr main-content---cr">