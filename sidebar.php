<?php // Main Content Aside
if ( is_active_sidebar( 'main-content-aside' )  ) { ?>
<div class="cn sec-content" data-name="Secondary Content">
    <div class="cr sec-content---cr">

        <aside id="main-content-aside" class="cn aside main-content-aside" data-name="Main Content Aside" role="complementary">
            <div class="cr main-ct-as---cr">
                <div class="h main-ct-as---h"><span class="h_l main-ct-as---h_l">Main Content Aside</span></div>
                <div class="ct main-ct-as---ct">
                    <div class="ct_cr main-ct-as---ct_cr">
                        <?php dynamic_sidebar( 'main-content-aside' ); ?>
                    </div>
                </div><!-- main-ct-as---ct -->
            </div>
        </aside><!-- main-content-aside -->
        
    </div>
</div><!-- sec-content -->
<?php } ?>
        
    