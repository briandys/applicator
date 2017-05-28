                    </div>
                </section><!-- Main Content -->

                <footer id="colophon" class="cn main-footer site-footer" data-name="Main Footer" role="contentinfo">
                    <div class="cr main-footer---cr">
                        
                        <?php // Main Footer Aside
                        applicator_func_main_footer_aside(); ?>
                        
                        <?php
                        
                        $web_product_fineprint = applicator_html_ok_txt( array(
                            'content'   => array(
                                array(
                                    'txt'   => ''
                                ),
                            ),
                        ) );
                        
                        ?>
                        
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

                <?php
                        
                // Go to Start Nav
                // Text
                $go_start_nav_item_txt = applicator_html_ok_txt( array(
                    'content'       => array(
                        array(
                            'txt'   => 'Go to Start',
                        ),
                    ),
                ) );

                // Object
                $go_start_nav_item_obj = applicator_html_ok_obj( array(
                    'elem'      => 'navi',
                    'name'      => 'Go to Start',
                    'css'       => 'go-start',
                    'attr'      => array(
                        'id'    => 'go-start-navi---a',
                        'href'  => '#start',
                        'title' => 'Go to Start',
                    ),
                    'content'   => $go_start_nav_item_txt,
                ) );

                // Component
                $go_start_nav = applicator_html_ok_cp( array(
                    'type'      => 'nav',
                    'name'      => 'Go to Start',
                    'cp_css'    => 'go-start-nav',
                    'css'       => 'go-start',
                    'attr'      => array(
                        'id'    => 'go-start-nav',
                    ),
                    'content'   => $go_start_nav_item_obj,
                ) );

                // Web Product End
                // Constructor
                $web_product_end = htmlok_cn( array(
                    'name'      => 'Web Product End',
                    'css'       => 'wbp-end',
                    'content'   => $go_start_nav,
                    'echo'      => true,
                ) );

                ?>
            
            </div>
        </div><!-- Web Product -->

        <?php wp_footer(); ?>
    
    </body>
</html>