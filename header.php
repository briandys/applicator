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
        
        <div id="page" class="wbp site" data-name="Web Product">
            <div class="cr wbp---cr">
                
                <div class="cn wbp-start" data-name="Web Product Start">
                    <div class="cr wbp-start---cr">

                        <div id="go-content-nav" class="nav go-content-nav" role="navigation" data-name="Go to Content Navigation">
                            <div class="cr go-ct-nav---cr">
                                <div class="h go-ct-nav---h"><span class="h_l go-ct-nav---h_l"><?php esc_html_e( 'Go to Content Navigation', 'applicator'); ?></span></div>
                                <div class="ct go-ct-nav---ct">
                                    <div class="ct_cr go-ct-nav---ct_cr">
                                        
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
                                </div><!-- ct -->
                            </div>
                        </div><!-- go-content-nav -->

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
                        
                        <div class="cp wbp-info" data-name="Web Product Info">
                            <div class="cr wbp-info---cr">
                                
                                <?php
                                
                                // Web Product Name Markup
                                $wbp_heading_obj_mu = '<div class="obj wbp-name" data-name="Web Product Name">';
                                    $wbp_heading_obj_mu .= '<h1 class="h wbp-name--h site-title">';
                                        $wbp_heading_obj_mu .= '<span class="h_l wbp-name---h_l">';
                                            $wbp_heading_obj_mu .= '<a class="a wbp-name---a" href="%2$s" rel="home" title="%1$s"><span class="a_l wbp-name---a_l"><span class="word wbp-name---word">%1$s</span></span></a>';
                                        $wbp_heading_obj_mu .= '</span>';
                                    $wbp_heading_obj_mu .= '</h1>';
                                $wbp_heading_obj_mu .= '</div>';
                                
                                printf( $wbp_heading_obj_mu,
                                    get_bloginfo( 'name' ),
                                    esc_url( home_url( '/' ) )
                                );
                                
                                // Web Product Custom Logo | Customizer > Site Identity | inc > settings.php
                                if ( has_custom_logo() ) { ?>
                                    <div class="obj wbp-logo" data-name="Web Product Logo" title="<?php bloginfo( 'name' ); ?>">
                                        <?php the_custom_logo(); ?>
                                    </div>
                                <?php }
                                
                                // Web Product Description Markup
                                $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) {
                                    
                                    $wbp_desc_obj_mu = '<div class="obj wbp-desc" data-name="Web Product Description">';
                                        $wbp_desc_obj_mu .= '<div class="g wbp-desc---g">';
                                            $wbp_desc_obj_mu .= '<span class="g_l wbp-desc---g_l">';
                                                $wbp_desc_obj_mu .= '<a class="a wbp-desc---a" href="%2$s" rel="home" title="%1$s"><span class="a_l wbp-desc---a_l"><span class="word wbp-desc---word">%1$s</span></span></a>';
                                            $wbp_desc_obj_mu .= '</span>';
                                        $wbp_desc_obj_mu .= '</div>';
                                    $wbp_desc_obj_mu .= '</div>';

                                    printf( $wbp_desc_obj_mu,
                                        $description,
                                        esc_url( home_url( '/' ) )
                                    );
                                
                                } ?>
                                
                            </div>
                        </div><!-- wbp-info -->
                        
                        <div id="main-nav--main-header-aside" class="main-nav--main-header-aside" data-name="Main Nav - Main Header Aside">
                            <div class="cr mn-mha---cr">
                                <div class="hr mn-mha---hr">
                                    <div class="hr_cr mn-mha---hr_cr">
                                        <div class="h mn-mha---h"><span class="h_l mn-mha---h_l"><?php esc_html_e( 'Main Nav - Main Header Aside', 'applicator' ); ?></span></div>
                                    </div>
                                </div>
                                <div class="ct mn-mha---ct">
                                    <div class="ct_cr mn-mha---ct_cr">

                                        <?php // Main Navigation | inc > tags > main-navigation.php
                                        apl_func_main_nav();
                                        
                                        // Hook: After Main Navigation
                                        apl_hook_after_main_nav();
                                        
                                        // Aside | inc > aside.php
                                        apl_func_main_header_aside(); ?>
                                        
                                        

                                    </div>
                                </div>
                            </div>
                        </div><!-- main-nav-/-main-header-aside -->

                        <?php // Search | searchform.php
                        get_search_form();
                        
                        // Custom Header | Customizer > Custom Header | inc > functions > custom-header.php
                        if ( has_header_image() ) { ?>
                        <div class="cp wbp-media-banner" data-name="Web Product Media Banner">
                            <div class="wbp-media-banner--cr">
                                <?php the_custom_header_markup(); ?>
                            </div>
                        </div>
                        <?php } ?>
                    
                    </div>
                </header><!-- main-header -->
                
                <div id="content" class="cn main-content site-content" data-name="Main Content">
                    <section class="cr main-content---cr">