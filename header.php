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
        <div class="cn wp-start" data-name="Web Product Start">
            <div class="wp-start--cr">
                
                <div class="cp go-content" data-name="Go to Content">
                    <div class="go-content--cr">
                        
                        <a id="go-content--a" class="a go-content--a" href="#content" title="<?php esc_attr_e( 'Go to Content', 'applicator'); ?>">
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
        </div><!-- wp-start -->
        
        
        <?php //------------------------- Container ------------------------- ?>
        <div class="cn container" data-name="Container">
            <div class="container--cr">
        
                
                <?php //------------------------- Constructor: Main Header ------------------------- ?>
                <header class="header cn main-header" data-name="Main Header">
                    <div class="main-header--cr">
                        
                        
                        <?php //------------------------- Web Product Info ------------------------- ?>
                        <div class="cp wp-info" data-name="Web Product Info">
                            <div class="wp-info--cr">
                                
                                
                                <?php //------------------------- Web Product Name ------------------------- ?>
                                <div class="cp wp-name" data-name="Web Product Name">
                                    <div class="wp-name--cr">
                                        
                                        <h1 class="h wp-name--h">
                                            <a class="a wp-name--a" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
                                                <span class="a-l"><?php bloginfo( 'name' ); ?></span>
                                            </a>
                                        </h1>
                                    
                                    </div>
                                </div><!-- wp-name -->
                                        
                                <?php //------------------------- Customizer: Custom Logo ------------------------- ?>
                                <?php // inc settings.php ?>
                                <?php if ( has_custom_logo() ) { ?>
                                <div class="cp wp-logo" data-name="Web Product Logo">
                                    <div class="wp-logo--cr">
                                        <?php the_custom_logo(); ?>
                                    </div>
                                </div>
                                <?php } ?>
                                
                                
                                <?php //------------------------- Web Product Description ------------------------- ?>
                                <div class="cp wp-desc" data-name="Web Product Description">
                                    <div class="wp-desc--cr">
                                        
                                        <?php $description = get_bloginfo( 'description', 'display' );
                                        if ( $description || is_customize_preview() ) : ?>
                                            <div class="wp-desc--l"><?php echo $description; ?></div>
                                        <?php endif; ?>
                                        
                                    </div>
                                </div><!-- wp-desc -->
                                
                            </div>
                        </div><!-- wp-info -->
                        
                        
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
                        <div class="cp wp-media-banner" data-name="Web Product Media Banner">
                            <div class="wp-media-banner--cr">
                                <?php the_custom_header_markup(); ?>
                            </div>
                        </div>
                        <?php } ?>
                    
                    </div>
                </header><!-- main-header -->

                
                <?php //------------------------- Constructor: Main Content ------------------------- ?>
                <div class="cn main-content" data-name="Main Content">
                    <section class="main-content--cr">