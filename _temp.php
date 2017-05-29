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