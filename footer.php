                    </div>
                </section><!-- Main Content -->

                <footer id="colophon" class="cn main-footer site-footer" data-name="Main Footer" role="contentinfo">
                    <div class="cr main-footer---cr">
                        
                        <?php
                        
                        // Main Footer Aside
                        applicator_func_main_footer_aside();
                        
                        // Web Product Copyright
                        // Markup
                        $web_product_name_mu = sprintf( '<a href="%2$s" rel="home" title="%1$s">%1$s</a>',
                            get_bloginfo( 'name' ),
                            esc_url( home_url( '/' ) )
                        );
                        
                        // Text
                        $web_product_copyright_txt = htmlok_txt( array(
                            'content'   => array(
                                array(
                                    'line'      => array(
                                        // Line 1
                                        array(
                                            array(
                                                'txt' => $web_product_name_mu,
                                                'css' => 'wbp-name',
                                                'esc' => false,
                                            ),
                                            array(
                                                'sep' => $GLOBALS['space_sep'],
                                                'txt' => '&copy;',
                                                'css' => 'copyright-symbol',
                                            ),
                                            array(
                                                'sep' => $GLOBALS['space_sep'],
                                                'txt' => date( 'Y' ),
                                                'css' => 'year',
                                            ),
                                            array(
                                                'txt' => '.',
                                                'css' => 'period-symbol',
                                            ),
                                        ),
                                        // Line 2
                                        array(
                                            array(
                                                'sep' => $GLOBALS['space_sep'],
                                                'txt' => 'Olrayt reserved.',
                                            ),
                                            array(
                                                'sep' => $GLOBALS['space_sep'],
                                                'txt' => '&trade;',
                                                'css' => 'trademark-symbol',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ) );
                        
                        // Object
                        $web_product_copyright_obj = applicator_html_ok_obj( array(
                            'name'      => 'Web Product Copyright',
                            'elem'      => 'g',
                            'obj_css'   => 'site-info',
                            'css'       => 'wbp-copyright',
                            'content'   => $web_product_copyright_txt,
                            'echo'      => true,
                        ) );
                        
                        ?>
                    
                    </div>
                </footer><!-- Main Footer -->

                <?php
                        
                // Go to Start Nav
                // Text
                $go_start_nav_item_txt = htmlok_txt( array(
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