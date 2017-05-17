                    </div>
                </section><!-- Main Content -->

                <footer id="colophon" class="cn main-footer site-footer" data-name="Main Footer" role="contentinfo">
                    <div class="cr main-footer---cr">
                        
                        <?php // Main Footer Aside
                        applicator_func_main_footer_aside(); ?>
                        
                        <div class="obj wbp-copyright site-info" data-name="Web Product Copyright">
                            <div class="g wbp-copyright---g">
                                <div class="g_l wbp-copyright---g_l">
                                    
                                    <?php // Web Product Copyright Markup
                                    $wbp_copyright_mu = '<span class="line wbp-copyright--name---line"><a class="a wbp-copyright--name---a" href="%5$s" rel="home" title="%1$s"><span class="a_l wbp-copyright--name---a_l"><span class="word wbp-name---word">%1$s</span></span></a> <span class="word copyright-symbol---word">%2$s</span> <span class="word copyright-year---word">%3$s</span>.</span> <span class="line wbp-copyright--tm---line">%4$s</span>';
                                    
                                    printf( $wbp_copyright_mu,
                                        get_bloginfo( 'name' ),
                                        esc_html__( '&copy;', $GLOBALS['apl_textdomain'] ),
                                        date( 'Y' ),
                                        esc_html__( 'Olrayt reserved&trade;.', $GLOBALS['apl_textdomain'] ),
                                        esc_url( home_url( '/' ) )
                                    );
                                    ?>
                                </div>
                            </div>
                        </div><!-- Web Product Copyright -->

                    </div>
                </footer><!-- Main Footer -->

                <div class="cn wbp-end" data-name="Web Product End">
                    <div class="cr wbp-end---cr">

                        <div id="go-start-nav" class="nav go-start-nav" role="navigation" data-name="Go to Start Nav">
                            <div class="cr go-start-nav---cr">
                                <div class="h go-start-nav---h"><span class="h_l go-ct-nav---h_l"><?php esc_html_e( 'Go to Start Navigation', $GLOBALS['apl_textdomain'] ); ?></span></div>
                                <div class="ct go-start-nav---ct">
                                    <div class="ct_cr go-start-nav---ct_cr">

                                        <?php // Go to Start Nav Item Markup
                                        $go_start_navi_mu = '<div class="obj navi go-start-navi" data-name="Go to Start Nav Item">';
                                            $go_start_navi_mu .= '<a id="go-start-navi---a" class="a go-start-navi---a" href="#start" title="%1$s"><span class="a_l go-start-navi---a_l"><span class="word go-to-start---word">%2$s</span></span></a>';
                                        $go_start_navi_mu .= '</div>';

                                        printf( $go_start_navi_mu,
                                            esc_attr__( 'Go to Start', 'applicator'),
                                            esc_html__( 'Go to Start', 'applicator')
                                        ); ?>

                                    </div>
                                </div><!-- ct -->
                            </div>
                        </div><!-- Go to Start Nav -->

                    </div>
                </div><!-- Web Product End -->
            
            </div>
        </div><!-- Web Product -->

        <?php wp_footer(); ?>
    
    </body>
</html>