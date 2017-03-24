<!DOCTYPE html>
<html id="start" class="html <?php applicator_hook_html_class(); ?> view no-js no-svg" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
        
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        
        
        <?php //------------------------- Web Product Start ------------------------- ?>
        <div class="cn wbp-start" data-name="Web Product Start">
            <div class="wbp-start--cr">
                
                <div id="go-content" class="cp go-content" data-name="Go to Content">
                    <div class="go-content--cr">
                        
                        <a id="go-content--a" class="a go-content--a skip-link" href="#content" title="<?php esc_attr_e( 'Go to Content', 'applicator'); ?>">
                            <span class="a-l"><?php esc_html_e( 'Go to Content', 'applicator'); ?></span>
                        </a>
                    
                    </div>
                </div><!-- go-content -->
        
        
                <?php //------------------------- Browser Upgrade ------------------------- ?>
                <!--[if lt IE 8]>
                    <div class="cp browser-upgrade" data-name="Browser Upgrade">
                        <div class="browser-upgrade--cr">
                            <div class="browser-upgrade--l">
                                <?php $url = 'http://browsehappy.com/';
                                echo sprintf( __( 'You are using an <strong>outdated</strong> browser. Please <a href="%s" title="">upgrade your browser</a> to improve your experience.', 'applicator' ), esc_url( $url ) ); ?>
                            </div>
                        </div>
                    </div>
                <![endif]-->
                
            </div>
        </div><!-- wbp-start -->
        
        
        <?php //------------------------- Container ------------------------- ?>
        <div id="page" class="cn container site" data-name="Container">
            <div class="container--cr">
        
                
                <?php //------------------------- Constructor: Main Header ------------------------- ?>
                <header id="masthead" class="header cn main-header site-header" data-name="Main Header" role="banner">
                    <div class="main-header--cr">
                        
                        
                        <?php //------------------------- Web Product Info ------------------------- ?>
                        <div class="cp wbp-info" data-name="Web Product Info">
                            <div class="wbp-info--cr">
                                
                                
                                <?php //------------------------- Web Product Name ------------------------- ?>
                                <div class="cp wbp-name" data-name="Web Product Name">
                                    <div class="wbp-name--cr">
                                        
                                        <h1 class="h wbp-name--h site-title">
                                            <a class="a wbp-name--a" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
                                                <span class="a-l"><?php bloginfo( 'name' ); ?></span>
                                            </a>
                                        </h1>
                                    
                                    </div>
                                </div><!-- wbp-name -->
                                        
                                <?php
                                //------------------------- Customizer: Custom Logo
                                // inc settings.php
                                if ( has_custom_logo() ) { ?>
                                
                                <div class="cp wbp-logo" data-name="Web Product Logo">
                                    <div class="wbp-logo--cr">
                                        <?php the_custom_logo(); ?>
                                    </div>
                                </div>
                                
                                <?php } ?>
                                
                                
                                <?php //------------------------- Web Product Description ------------------------- ?>
                                <div class="cp wbp-desc" data-name="Web Product Description">
                                    <div class="wbp-desc--cr">
                                        
                                        <?php $description = get_bloginfo( 'description', 'display' );
                                        if ( $description || is_customize_preview() ) : ?>
                                            <div class="wbp-desc--l site-description"><?php echo $description; ?></div>
                                        <?php endif; ?>
                                        
                                    </div>
                                </div><!-- wbp-desc -->
                                
                            </div>
                        </div><!-- wbp-info -->
                        
                        
                        <?php //------------------------- Main Nav | Main Header Aside ------------------------- ?>
                        <div class="cp main-nav--main-header-aside" data-name="Main Nav | Main Header Aside">
                            <div class="main-nav--main-header-aside--cr">
                                
                                
                                <?php //------------------------- Main Navigation ------------------------- ?>
                                <?php // inc > tags > main-navigation.php ?>
                                <?php applicator_func_main_nav(); ?>


                                <?php //------------------------- Hook: After Main Navigation ------------------------- ?>
                                <?php applicator_hook_after_main_nav(); ?>
                                
                                
                                <?php //------------------------- Search ------------------------- ?>
                                <?php // searchform.php ?>
                                <?php get_search_form(); ?>
                                
                                
                                <?php //------------------------- Sub-Constructor: Main Header Aside ------------------------- ?>
                                <?php if ( is_active_sidebar( 'main-header-aside' )  ) : ?>
                                <aside id="main-header-aside" class="aside cn main-header-aside" data-name="Main Header Aside" role="complementary">
                                    <div class="main-header-aside--cr">
                                        <h3 class="h main-header-aside--h">
                                            <span class="h-l"><?php esc_html_e( 'Aside: Main Header', 'applicator' ); ?></span>
                                        </h3>
                                        <?php dynamic_sidebar( 'main-header-aside' ); ?>
                                    </div>
                                </aside><!-- main-header-aside -->
                                <?php endif; ?>
                                
                            </div>
                        </div><!-- main-nav--main-header-aside -->
                        
                  
                        <?php //------------------------- Customizer: Custom Header ------------------------- ?>
                        <?php // inc > functions > custom-header.php ?>
                        <?php if ( has_header_image() ) { ?>
                        <div class="cp wbp-media-banner" data-name="Web Product Media Banner">
                            <div class="wbp-media-banner--cr">
                                <?php the_custom_header_markup(); ?>
                            </div>
                        </div>
                        <?php } ?>
                    
                    </div>
                </header><!-- main-header -->

                
                <?php //------------------------- Constructor: Main Content ------------------------- ?>
                <div id="content" class="cn main-content site-content" data-name="Main Content">
                    <section class="main-content--cr">