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
        
        <div id="page" class="cn wbp site" data-name="Web Product">
            <div class="cr wbp---cr">
                
                <div class="cn wbp-start" data-name="Web Product Start">
                    <div class="cr wbp-start---cr">

                        <div id="go-content-nav" class="nav go-content-nav" role="navigation" data-name="Go to Content Nav">
                            <div class="h go-ct-nav---h"><?php esc_html_e( 'Go to Content Navigation', $GLOBALS['apl_textdomain'] ); ?></div>
                            <div class="ct go-ct-nav---ct">
                                <?php
                                // Markup
                                $go_ct_navi_mu = '<div class="navi %2$s" data-name="%1$s">';
                                    $go_ct_navi_mu .= '<a id="%3$s---a" class="a %3$s---a skip-link" href="%6$s" title="%7$s"><span class="a_l %3$s---a_l"><span class="txt %5$s---txt">';
                                        $go_ct_navi_mu .= '%4$s';
                                    $go_ct_navi_mu .= '</span></a>';
                                $go_ct_navi_mu .= '</div><!-- %1$s -->';
                                
                                // Content
                                $go_ct_navi = sprintf( $go_ct_navi_mu,
                                    'Go to Content Nav Item',
                                        'navi go-content-navi',
                                        'go-ct-navi',
                                    esc_html__( 'Go to Content', 'applicator'),
                                        'go-to-content',
                                    '#content',
                                    esc_attr__( 'Go to Content', 'applicator')
                                );
                                
                                // Display
                                printf( $go_ct_navi );
                                ?>
                                
                            </div>
                        </div><!-- Go to Content Nav -->

                        <!--[if lt IE 8]>
                        <?php
                        // Markup
                        $browser_upg_note_mu = '<div class="%2$s" data-name="%1$s">';
                            $browser_upg_note_mu .= '<div class="g %3$s---g">';
                                $browser_upg_note_mu .= '<p>%4$s <a href="%6$s">%5$s</a></p>';
                            $browser_upg_note_mu .= '</div>';
                        $browser_upg_note_mu .= '</div><!-- %1$s -->';

                        // Content
                        $browser_upg_note = sprintf( $browser_upg_note_mu,
                            'Browser Upgrade Note Object',
                                'note browser-upgrade-note',
                                'browser-up-note',
                            esc_html__( 'You are using an outdated browser. Please upgrade your browser to improve your experience.', $GLOBALS['apl_textdomain'] ),
                            esc_html__( 'Upgrade Browser', $GLOBALS['apl_textdomain'] ),
                            esc_url( 'http://browsehappy.com/' )
                        );

                        // Display
                        printf( $browser_upg_note );
                        ?>
                        <![endif]-->

                    </div>
                </div><!-- Web Product Start -->
        
                <header id="masthead" class="cn main-header site-header" data-name="Main Header" role="banner">
                    <div class="cr main-header---cr">
                        
                        <div class="cp wbp-main-info" data-name="Web Product Main Info">
                            <div class="cr wbp-main-info---cr">
                                <div class="hr wbp-main-info---hr">
                                    <div class="hr_cr wbp-main-info---hr_cr">
                                        <div class="h wbp-main-info---h"><span class="h_l wbp-main-info---h_l"><?php esc_html_e( 'Web Product Main Info', $GLOBALS['apl_textdomain'] ); ?></span></div>
                                    </div>
                                </div>
                                <div class="ct wbp-main-info---ct">
                                    <div class="ct_cr wbp-main-info---ct_cr">
                                        <?php
                                        // Web Product Main Name
                                        // Markup
                                        $wbp_main_name_obj_mu = '<div class="%2$s" data-name="%1$s">';
                                            $wbp_main_name_obj_mu .= '<h1 class="h %3$s---h site-title">';
                                                $wbp_main_name_obj_mu .= '<a class="a %3$s---a" href="%6$s" rel="home" title="%4$s"><span class="a_l %3$s---a_l"><span class="txt %5$s---txt">';
                                                    $wbp_main_name_obj_mu .= '%4$s';
                                                $wbp_main_name_obj_mu .= '</span></span></a>';
                                            $wbp_main_name_obj_mu .= '</h1>';
                                        $wbp_main_name_obj_mu .= '</div><!-- %1$s -->';

                                        // Content
                                        $wbp_main_name_obj = sprintf( $wbp_main_name_obj_mu,
                                            'Web Product Main Name Object',
                                                'obj wbp-main-name-obj',
                                                'wbp-main-name-obj',
                                            get_bloginfo( 'name' ),
                                                'wbp-main-name',
                                            esc_url( home_url( '/' ) )
                                        );

                                        // Display
                                        printf( $wbp_main_name_obj );
                                        
                                        $test = applicator_html_ok_mco_test( array(
                                            'type'      => 'c',
                                            'name'      => 'Web Product Main Name',
                                            'css'       => 'manual-css',
                                            'sec_css'   => 'tst',
                                            'content'   => 'Hello',
                                        ) );

                                        // Web Product Custom Logo | inc > settings.php | Customizer > Site Identity
                                        if ( has_custom_logo() ) {

                                            // Markup
                                            $wbp_main_logo_obj_mu = '<div class="%2$s" title="%4$s" data-name="%1$s">';
                                                $wbp_main_logo_obj_mu .= '%3$s';
                                            $wbp_main_logo_obj_mu .= '</div>';

                                            // Content
                                            $wbp_main_logo_obj = sprintf( $wbp_main_logo_obj_mu,
                                                'Web Product Main Logo Object',
                                                    'obj wbp-main-logo-obj',
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
                                            $wbp_main_desc_obj_mu = '<div class="%2$s" data-name="%1$s">';
                                                $wbp_main_desc_obj_mu .= '<div class="g %3$s---g">';
                                                    $wbp_main_desc_obj_mu .= '<a class="a %3$s---a" href="%6$s" rel="home" title="%4$s"><span class="a_l %3$s---a_l"><span class="txt %5$s---txt">';
                                                        $wbp_main_desc_obj_mu .= '%4$s';
                                                    $wbp_main_desc_obj_mu .= '</span></span></a>';
                                                $wbp_main_desc_obj_mu .= '</div>';
                                            $wbp_main_desc_obj_mu .= '</div><!-- %1$s -->';

                                            // Content
                                            $wbp_main_desc_obj = sprintf( $wbp_main_desc_obj_mu,
                                                'Web Product Main Description Object',
                                                    'obj wbp-main-desc-obj',
                                                    'wbp-main-desc-obj',
                                                $description,
                                                    'wbp-main-desc',
                                                esc_url( home_url( '/' ) )
                                            );

                                            // Display
                                            printf( $wbp_main_desc_obj );
                                        }
                                        ?>
                                    </div>
                                </div><!-- ct -->
                            </div>
                        </div><!-- Web Product Main Info -->
                        
                        <?php
                        // Main Navigation | inc > tags > main-navigation.php
                        applicator_func_main_nav();

                        // After Main Navigation Hook
                        applicator_hook_after_main_nav();
                        
                        // Search | searchform.php
                        get_search_form();
                        
                        // Custom Header | Customizer > Custom Header | inc > functions > custom-header.php
                        if ( has_header_image() ) {
                            
                            // Markup
                            $wbp_media_banner_mu = '<div class="%2$s" data-name="%1$s">';
                                $wbp_media_banner_mu .= '%3$s';
                            $wbp_media_banner_mu .= '</div>';
                            
                            // Content
                            $wbp_media_banner = sprintf( $wbp_media_banner_mu,
                                'Web Product Media Banner',
                                'cp wbp-media-banner',
                                get_custom_header_markup()
                            );
                            
                            // Display
                            printf( $wbp_media_banner );
                        }
                        
                        // Aside | inc > aside.php
                        applicator_func_main_header_aside();
                        ?>
                    
                    </div>
                </header><!-- Main Header -->
                
                <section id="content" class="cn main-content site-content" data-name="Main Content">
                    <div class="cr main-content---cr">