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
        
        
        <div id="page" class="wbp site" data-name="Web Product">
            <div class="cr wbp_cr">
                
                <div class="cn wbp-start" data-name="Web Product Start">
                    <div class="cr wbp-start---cr">

                        <div id="go-content-nav" class="nav go-content-nav" data-name="Go to Content Navigation">
                            <div class="cr go-ct-nav---cr">
                                <div class="h go-ct-nav---h"><span class="h_l go-ct-nav---h_l"><?php esc_html_e( 'Go to Content Navigation', 'applicator'); ?></span></div>
                                <div class="ct go-ct-nav---ct">
                                    <div class="ct_cr go-ct-nav---ct_cr">
                                        
                                        <?php // Markup
                                        $go_content_navi_mu = '<div class="obj navi go-content-navi" data-name="Go to Content Nav Item">';
                                            $go_content_navi_mu .= '<a id="go-ct-navi---a" class="a go-ct-navi---a skip-link" href="#content" title="%1$s"><span class="a_l go-ct-navi---a_l"><span class="word go-ct-navi--show---word">%2$s</span> <span class="word go-ct-navi--to---word">%3$s</span> <span class="word go-ct-navi--content---word">%4$s</span></span></a>';
                                        $go_content_navi_mu .= '</div>';
                        
                                        printf( $go_content_navi_mu,
                                            esc_attr__( 'Go to Content', 'applicator'),
                                            esc_html__( 'Go', 'applicator'),
                                            esc_html__( 'to', 'applicator'),
                                            esc_html__( 'Content', 'applicator')
                                        ); ?>
                                    
                                    </div>
                                </div><!-- go-ct-nav---ct -->
                            </div>
                        </div><!-- go-content-nav -->

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
                                                <span class="a-l wbp-name--a-l"><?php bloginfo( 'name' ); ?></span>
                                            </a>
                                        </h1>
                                    
                                    </div>
                                </div><!-- wbp-name -->
                                        
                                <?php //------------------------- Customizer: Custom Logo
                                // inc settings.php
                                if ( has_custom_logo() ) { ?>
                                
                                <div class="cp wbp-logo" data-name="Web Product Logo">
                                    <div class="wbp-logo--cr">
                                        <?php the_custom_logo(); ?>
                                    </div>
                                </div>
                                
                                <?php }
                                
                                
                                //------------------------- Web Product Description
                                $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) { ?>
                                
                                <div class="cp wbp-desc" data-name="Web Product Description">
                                    <div class="wbp-desc--cr">
                                        <a class="a wbp-desc--a" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'description' ); ?>">
                                            <span class="a-l wbp-desc--a-l site-description"><?php echo $description; ?></span>
                                        </a>
                                    </div>
                                </div><!-- wbp-desc -->
                                
                                <?php } ?>
                                
                            </div>
                        </div><!-- wbp-info -->
                        
                        
                        <?php //------------------------- Main Nav | Main Header Aside ------------------------- ?>
                        <div class="cp main-nav--main-header-aside" data-name="Main Nav | Main Header Aside">
                            <div class="main-nav--main-header-aside--cr">
                                <div class="h main-nav--main-header-aside--h">
                                    <span class="h-l">Main Nav | Main Header Aside</span>
                                </div>
                                <div class="main-nav--main-header-aside--ct">
                                    <div class="main-nav--main-header-aside--ct-cr">

                                        <?php //------------------------- Main Navigation
                                        // inc > tags > main-navigation.php
                                        applicator_func_main_nav();
                                        
                                        
                                        //------------------------- Hook: After Main Navigation
                                        applicator_hook_after_main_nav();
                                        
                                        
                                        //------------------------- Sub-Constructor: Main Header Aside
                                        if ( is_active_sidebar( 'main-header-aside' )  ) { ?>

                                        <aside id="main-header-aside" class="aside cn main-header-aside" data-name="Main Header Aside" role="complementary">
                                            <div class="main-header-aside--cr">
                                                <h3 class="h main-header-aside--h">
                                                    <span class="h-l"><?php esc_html_e( 'Aside: Main Header', 'applicator' ); ?></span>
                                                </h3>
                                                <?php dynamic_sidebar( 'main-header-aside' ); ?>
                                            </div>
                                        </aside><!-- main-header-aside -->

                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div><!-- main-nav--main-header-aside -->


                        <?php //------------------------- Search
                        // searchform.php
                        get_search_form();
                        
                        
                        //------------------------- Customizer: Custom Header
                        // inc > functions > custom-header.php
                        if ( has_header_image() ) { ?>
                        
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