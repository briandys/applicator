                    </div>
                </section>

                <?php

                // ------------------------ Main Footer
                
                if ( ! function_exists( 'applicator_copyright_applicator_line_term' ) )
                {
                    function applicator_copyright_applicator_line_term()
                    {
                        $theme_name = 'Applicator';
                        return $theme_name;
                    }
                }
                
                if ( ! function_exists( 'applicator_copyright_applicator_line_url' ) )
                {
                    function applicator_copyright_applicator_line_url()
                    {
                        $theme_url = '';
                        return $theme_url;
                    }
                }

                $applicator_line_term = applicator_copyright_applicator_line_term();
                $applicator_line_url = '//applicator.dysinelab.com/'. applicator_copyright_applicator_line_url();
                $applicator_line_by_dysinelab_term ='by DysineLab';
                $applicator_line_text = $applicator_line_term. ' '. $applicator_line_by_dysinelab_term;


                // Copyright
                $copyright_obj = applicator_htmlok( array(
                    'name'      => 'Copyright',
                    'structure' => array(
                        'type'          => 'object',
                    ),
                    'id'        => 'copyright',
                    'root_css'  => 'site-info',
                    'content'   => array(
                        'object'        => array(
                            array(
                                'line'      => array(
                                    array(
                                        'css'   => 'copyright---line',
                                        array(
                                            'txt'       => get_bloginfo( 'name', 'display' ),
                                            'css'       => 'wbp-name---txt',
                                            'linked'    => true,
                                            'attr'      => array(
                                                'a'         => array(
                                                    'href'      => esc_url( home_url( '/' ) ),
                                                    'rel'       => 'home',
                                                    'title'     => get_bloginfo( 'name', 'display' ),
                                                ),
                                            ),
                                        ),
                                        array(
                                            'sep'       => $GLOBALS['applicator_space_sep'],
                                            'txt'       => esc_html( '&copy;' ),
                                            'css'       => 'copyright-symbol---txt',
                                        ),
                                        array(
                                            'sep'       => $GLOBALS['applicator_space_sep'],
                                            'txt'       => date_i18n( __( 'Y', 'applicator' ) ),
                                            'css'       => 'year---txt',
                                        ),
                                    ),
                                    array(
                                        'css'   => 'applicator---line',
                                        array(
                                            'sep'       => $GLOBALS['applicator_space_sep'],
                                            'txt'       => esc_html( $applicator_line_text ),
                                            'linked'    => true,
                                            'attr'      => array(
                                                'a'         => array(
                                                    'href'      => esc_url( $applicator_line_url ),
                                                    'target'    => '_blank',
                                                    'rel'       => 'noopener',
                                                    'title'     => esc_attr( $applicator_line_text ),
                                                ),
                                            ),
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
                            applicator_main_footer_aside(),
                            $copyright_obj,
                        ),
                    ),
                    'echo'      => true,
                ) );


                // ------------------------ Web Product End

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

                ?>
            
            </div>
        </div>

        <?php wp_footer(); ?>
    
    </body>
</html>