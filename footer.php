                    </section>
                </div><!-- main-content -->


                <?php //------------------------- Constructor: Main Footer ------------------------- ?>
                <footer class="footer cn main-footer" data-name="Main Footer">
                    <div class="main-footer--cr">
                        
                        
                        <?php //------------------------- Sub-Constructor: Main Footer Aside ------------------------- ?>
                        <?php if ( is_active_sidebar( 'main-footer-aside' )  ) : ?>
                        <aside id="main-footer-aside" class="aside cn main-footer-aside" data-name="Main Footer Aside" role="complementary">
                            <div class="main-footer-aside--cr">
                                <h3 class="h main-footer-aside--h"><?php _e( 'Aside: Main Footer', 'applicator' ); ?></h3>
                                <?php dynamic_sidebar( 'main-footer-aside' ); ?>
                            </div>
                        </aside><!-- main-footer-aside -->
                        <?php endif; ?>
                        
                        
                        <?php //------------------------- Web Product Copyright ------------------------- ?>
                        <div class="cp wbp-copyright" data-name="Web Product Copyright">
                            <div class="wbp-copyright--cr">
                                
                                <div class="wbp-copyright--l">
                                    <span class="wbp-copyright-line">
                                        <span class="wbp-copyright--name--l"><?php bloginfo( 'name' ); ?></span>
                                        <span class="wbp-copyright--copy--l"><?php esc_html_e( '&copy;', 'applicator' ); ?></span>
                                        <span class="wbp-copyright--year--l"><?php do_action( 'applicator_auto_copyright_year' ) ?>.</span>
                                    </span>
                                    <span class="wbp-tm-line">
                                        <span class="wbp-copyright--olrayt--l"><?php esc_html_e( 'Olrayt reserved&trade;', 'applicator' ); ?>.</span>
                                    </span>
                                </div>

                            </div>
                        </div><!-- wbp-copyright -->

                    </div>
                </footer><!-- main-footer -->
            
            </div>
        </div><!-- container -->


        <?php //------------------------- Web Product End ------------------------- ?>
        <div class="cn wbp-end" data-name="Web Product End">
            <div class="wbp-end--cr">
                
                
                <?php //------------------------- Go to Start ------------------------- ?>
                <div class="cp go-start" data-name="Go to Start">
                    <div class="go-start--cr">
                        
                        <a id="go-start--a" class="a go-start--a" href="#start" title="<?php esc_attr_e( 'Go to Start', 'applicator'); ?>">
                            <span class="l"><?php esc_html_e( 'Go to Start', 'applicator'); ?></span>
                        </a>
                    
                    </div>
                </div><!-- go-start -->
                
            </div>
        </div><!-- wbp-start -->

        <?php wp_footer(); ?>
    
    </body>
</html>