                    </section>
                </div><!-- main-content -->

                <footer id="colophon" class="cn footer main-footer site-footer" data-name="Main Footer" role="contentinfo">
                    <div class="main-footer--cr">
                        
                        <?php // Main Footer Aside
                        if ( is_active_sidebar( 'main-footer-aside' )  ) { ?>
                        <aside id="main-footer-aside" class="cn aside main-footer-aside" data-name="Main Footer Aside" role="complementary">
                            <div class="cr main-fr-as---cr">
                                <h3 class="h main-fr-as---h"><span class="h_l main-fr-as---h_l">Main Footer Aside</span></h3>
                                <div class="ct main-fr-as---ct">
                                    <div class="ct_cr main-fr-as---ct_cr">
                                        <?php dynamic_sidebar( 'main-footer-aside' ); ?>
                                    </div>
                                </div><!-- main-fr-as---ct -->
                            </div>
                        </aside><!-- main-footer-aside -->
                        <?php } ?>
                        
                        <div class="obj wbp-copyright site-info" data-name="Web Product Copyright">
                            <div class="g wbp-copyright---g">
                                <div class="g_l wbp-copyright---g_l">
                                    
                                    <?php // Web Product Copyright Markup
                                    $wbp_copyright_mu = '<span class="line wbp-copyright--name---line"><span class="word wbp-copyright--name---word">%1$s</span> <span class="word wbp-copyright--symbol---word">%2$s</span> <span class="word wbp-copyright--year---word">%3$s</span>.</span> <span class="line wbp-copyright--tm---line">%4$s</span>';
                                    
                                    printf( $wbp_copyright_mu,
                                        get_bloginfo( 'name' ),
                                        esc_html__( '&copy;', 'applicator' ),
                                        date( 'Y' ),
                                        esc_html__( 'Olrayt reserved&trade;.', 'applicator' )
                                    );
                                    ?>
                                </div>
                            </div>
                        </div><!-- wbp-copyright -->

                    </div>
                </footer><!-- main-footer -->

                <div class="cn wbp-end" data-name="Web Product End">
                    <div class="cr wbp-end---cr">

                        <div id="go-start-nav" class="nav go-start-nav" role="navigation" data-name="Go to Start Navigation">
                            <div class="cr go-start-nav---cr">
                                <div class="h go-start-nav---h"><span class="h_l go-ct-nav---h_l"><?php esc_html_e( 'Go to Start Navigation', 'applicator'); ?></span></div>
                                <div class="ct go-start-nav---ct">
                                    <div class="ct_cr go-start-nav---ct_cr">

                                        <?php // Go to Start Nav Item Markup
                                        $go_start_navi_mu = '<div class="obj navi go-start-navi" data-name="Go to Start Nav Item">';
                                            $go_start_navi_mu .= '<a id="go-start-navi---a" class="a go-start-navi---a" href="#start" title="%1$s"><span class="a_l go-start-navi---a_l"><span class="word go---word">%2$s</span> <span class="word to---word">%3$s</span> <span class="word start---word">%4$s</span> %5$s</span></a>';
                                        $go_start_navi_mu .= '</div>';

                                        printf( $go_start_navi_mu,
                                            esc_attr__( 'Go to Start', 'applicator'),
                                            esc_html__( 'Go', 'applicator'),
                                            esc_html__( 'to', 'applicator'),
                                            esc_html__( 'Start', 'applicator'),
                                            applicator_get_svg( array( 'icon' => 'arrow-up-2-icon' ) )
                                        ); ?>

                                    </div>
                                </div><!-- go-start-nav---ct -->
                            </div>
                        </div><!-- go-start-nav -->

                    </div>
                </div><!-- wbp-end -->
            
            </div>
        </div><!-- wbp -->

        <?php wp_footer(); ?>
    
    </body>
</html>