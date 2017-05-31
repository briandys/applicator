<?php // Main Content Aside
if ( is_active_sidebar( 'main-content-aside' )  ) { ?>
<div class="cn sec-content" data-name="Secondary Content">
    <div class="cr sec-content---cr">

        <?php // Main Content Aside | inc > tags > aside.php
        echo applicator_func_main_content_aside(); ?>
        
    </div>
</div><!-- sec-content -->
<?php } ?>