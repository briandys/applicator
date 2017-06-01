                    </div>
                </section><!-- Main Content -->

                <footer id="main-footer" class="cn main-footer site-footer" data-name="Main Footer" role="contentinfo">
                    <div class="cr main-footer---cr">
                        
                        <?php
                        // inc > tags > aside.php
                        echo applicator_func_main_footer_aside();
                        
                        // inc > tags > web-product-copyright-obj.php
                        echo applicator_func_web_product_copyright_obj();
                        ?>
                    
                    </div>
                </footer><!-- Main Footer -->

                <?php
                // template-parts > web-product-end-cn.php
                echo applicator_func_web_product_end_cn();
                ?>
            
            </div>
        </div><!-- Web Product -->

        <?php wp_footer(); ?>
    
    </body>
</html>