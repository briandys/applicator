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

                        <?php /*
                        <div id="go-content-nav" class="nav go-content-nav" role="navigation" data-name="Go to Content Nav">
                            <div class="h go-ct-nav---h"><?php esc_html_e( 'Go to Content Navigation', $GLOBALS['apl_textdomain'] ); ?></div>
                            <div class="ct go-ct-nav---ct">
                            */?>
                                
                                <?php
                                $go_content_nav_item_txt = applicator_html_ok_txt( array(
                                    'content'       => array(
                                        array(
                                            'txt'   => 'Go to Content',
                                        ),
                                    ),
                                ) );
                                
                                $go_content_nav_item_obj = applicator_html_ok_obj( array(
                                    'elem'      => 'navi',
                                    'name'      => 'Go to Content',
                                    'css'       => 'go-ct',
                                    'elem_css'  => 'skip-link',
                                    'attr'      => array(
                                        'id'    => 'go-ct-navi---a',
                                        'href'  => '#content',
                                        'title' => 'Go to Content',
                                    ),
                                    'content'   => $go_content_nav_item_txt,
                                ) );
                                
                                $go_content_nav = applicator_html_ok_cp( array(
                                    'type'      => 'n',
                                    'name'      => 'Go to Content',
                                    'cp_css'    => 'go-content-nav',
                                    'css'       => 'go-ct',
                                    'attr'      => [
                                        'id'    => 'go-content-nav',
                                    ],
                                    'content'   => $go_content_nav_item_obj,
                                    'echo'      => true,
                                ) );
                                ?>
                                
                            <?php /*</div>
                        </div><!-- Go to Content Nav -->*/?>

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
                        
                        <?php
                        // Web Product Main Name
                        // Text
                        $web_product_main_name_txt = applicator_html_ok_txt( array(
                            'content' => array(
                                array(
                                    'txt'   => get_bloginfo( 'name' ),
                                    'css'   => 'wbp-name',
                                ),
                            ),
                        ) );

                        // Object
                        $web_product_main_name_obj = applicator_html_ok_obj( array(
                            'name'      => 'Web Product Main Name',
                            'elem'      => 'h',
                            'elem_css'  => 'site-title',
                            'css'       => 'wbp-main-name',
                            'linked'    => true,
                            'attr'      => array(
                                'href'      => esc_url( home_url( '/' ) ),
                                'htag'      => 'h1',
                                'title'     => get_bloginfo( 'name' ),
                            ),
                            'content'   => $web_product_main_name_txt,
                        ) );

                        // Web Product Custom Logo | inc > settings.php | Customizer > Site Identity
                        if ( has_custom_logo() ) {
                            // Object
                            $web_product_main_logo_obj = applicator_html_ok_obj( array(
                                'name'      => 'Web Product Main Logo',
                                'elem'      => 'wp',
                                'css'       => 'wbp-main-logo',
                                'attr'      => array(
                                    'title'     => get_bloginfo( 'name' ),
                                ),
                                'content'   => get_custom_logo(),
                            ) );
                        } else {
                            $web_product_main_logo_obj = '';
                        }

                        // Web Product Main Description
                        $description = get_bloginfo( 'description', 'display' );
                        if ( $description || is_customize_preview() ) {

                            // Text
                            $web_product_main_description_txt = applicator_html_ok_txt( array(
                                'content' => array(
                                    array(
                                        'txt'   => $description,
                                        'css'   => 'wbp-desc',
                                    ),
                                ),
                            ) );

                            // Object
                            $web_product_main_description_obj = applicator_html_ok_obj( array(
                                'name'      => 'Web Product Main Description',
                                'elem'      => 'g',
                                'css'       => 'wbp-main-desc',
                                'linked'    => true,
                                'attr'      => array(
                                    'href'      => esc_url( home_url( '/' ) ),
                                    'title'     => $description,
                                ),
                                'content'   => $web_product_main_description_txt,
                            ) );
                        } else {
                            $web_product_main_description_obj = '';
                        }
                        
                        // Web Product Main Info - Component
                        $web_product_main_info = applicator_html_ok_cp( array(
                            'name'      => 'Web Product Main Info',
                            'css'       => 'wbp-main-info',
                            'content'   => $web_product_main_name_obj . $web_product_main_logo_obj . $web_product_main_description_obj,
                            'echo'      => true,
                        ) );
                        
                        // Main Navigation | inc > tags > main-navigation.php
                        applicator_func_main_nav();

                        // After Main Navigation Hook
                        applicator_hook_after_main_nav();
                        
                        // Search | searchform.php
                        get_search_form();
                        
                        // Custom Header | Customizer > Custom Header | inc > functions > custom-header.php
                        if ( has_header_image() ) {
                            
                            // Object
                            $web_product_main_media_banner_obj = applicator_html_ok_obj( array(
                                'name'      => 'Web Product Main Media Banner',
                                'elem'      => 'wp',
                                'css'       => 'wbp-main-media-banner',
                                'content'   => get_custom_header_markup(),
                                'echo'      => true,
                            ) );
                        }
                        
                        // Aside | inc > aside.php
                        applicator_func_main_header_aside();
                        ?>
                    
                    </div>
                </header><!-- Main Header -->
                
                <section id="content" class="cn main-content site-content" data-name="Main Content">
                    <div class="cr main-content---cr">