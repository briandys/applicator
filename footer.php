                    </div>
                </section><!-- Main Content -->

                <?php

                //------------------------------------------------ Main Footer

                // Web Product Copyright
                $web_product_copyright_obj = applicator_htmlok( array(
                    'name'      => 'Web Product Copyright',
                    'structure' => array(
                        'type'          => 'object',
                    ),
                    'css'       => 'wbp-copyright',
                    'root_css'  => 'site-info',
                    'content'   => array(
                        'object'        => array(
                            array(
                                'line'      => array(
                                    array(
                                        'css'   => 'copyright---line',
                                        array(
                                            'txt'       => get_bloginfo( 'name' ),
                                            'css'       => 'wbp-name---txt',
                                            'linked'    => true,
                                            'attr'      => array(
                                                'a'         => array(
                                                    'href'      => esc_url( home_url( '/' ) ),
                                                    'rel'       => 'home',
                                                    'title'     => get_bloginfo( 'name' ),
                                                ),
                                            ),
                                        ),
                                        array(
                                            'sep'       => $GLOBALS['space_sep'],
                                            'txt'       => esc_html__( '&copy;', 'applicator' ),
                                            'css'       => 'copyright-symbol---txt',
                                        ),
                                        array(
                                            'sep'       => $GLOBALS['space_sep'],
                                            'txt'       => esc_html__( '2017', 'applicator' ),
                                            'css'       => 'year---txt',
                                        ),
                                        array(
                                            'txt'       => esc_html__( '.', 'applicator' ),
                                            'css'       => 'delimiter---txt',
                                        ),
                                    ),
                                    array(
                                        'css'   => 'reserved-rights---line',
                                        array(
                                            'sep'       => $GLOBALS['space_sep'],
                                            'txt'       => esc_html__( 'Olrayt reserved.', 'applicator' ),
                                        ),
                                        array(
                                            'txt'       => esc_html__( '&trade;', 'applicator' ),
                                            'css'       => 'trademark-symbol---txt',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ) );

                $main_footer_cn = applicator_htmlok( array(
                    'name'      => 'Main Footer',
                    'structure' => array(
                        'type'      => 'constructor',
                        'subtype'   => 'main footer',
                    ),
                    'id'        => 'main-footer',
                    'root_css'  => 'site-footer',
                    'content'   => array(
                        'constructor'   => array(
                            applicator_func_main_footer_aside(),
                            $web_product_copyright_obj,
                        ),
                    ),
                    'echo'      => true,
                ) );

                //------------------------------------------------ End: Main Footer


                //------------------------------------------------ Web Product End

                // Go to Start Navi
                $go_to_start_navi_obj = applicator_htmlok( array(
                    'name'      => 'Go to Start',
                    'structure' => array(
                        'type'      => 'object',
                        'subtype'   => 'navigation item',
                        'attr'      => array(
                            'a'         => array(
                                'href'      => esc_url( '#start' ),
                            ),
                        ),
                        'id'        => 'go-start-navi---a',
                        'title'     => 'Go to Start',
                    ),
                    'css'       => 'go-start',
                    'content'   => array(
                        'object'        => array(
                            array(
                                'txt'       => esc_html__( 'Go to Start', 'applicator' ),
                            ),
                        ),
                    ),
                ) );

                // Go to Start Nav
                $go_to_start_nav_cp = applicator_htmlok( array(
                    'name'      => 'Go to Start',
                    'structure' => array(
                        'type'      => 'component',
                        'subtype'   => 'navigation',
                    ),
                    'id'        => 'go-start-nav',
                    'css'       => 'go-start',
                    'content'   => array(
                        'component'     => $go_to_start_navi_obj,
                    ),
                ) );

                // Web Product End
                $web_product_end_cn = applicator_htmlok( array(
                    'name'      => 'Web Product End',
                    'structure' => array(
                        'type'      => 'constructor',
                    ),
                    'id'        => 'web-product-end',
                    'css'       => 'wbp-end',
                    'content'   => array(
                        'constructor'       => $go_to_start_nav_cp,
                    ),
                    'echo'      => true,
                ) );

                //------------------------------------------------ End: Web Product End

                ?>
            
            </div>
        </div><!-- Web Product -->

        <?php wp_footer(); ?>
    
    </body>
</html>