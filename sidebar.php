<?php //------------------------- Sub-Constructor: Main Content Aside ------------------------- ?>
<?php if ( is_active_sidebar( 'main-content-aside' )  ) : ?>


<?php //------------------------- Secondary Content ------------------------- ?>
<div class="sec-content">
    <div class="sec-content--cr">

        <aside id="main-content-aside" class="aside main-content-aside" role="complementary">
            <div class="main-content-aside--cr">
                <h3 class="h main-content-aside--h"><span class="main-content-aside--h-l"><?php esc_html_e( 'Aside: Main Content', 'applicator' ); ?></span></h3>
                <?php dynamic_sidebar( 'main-content-aside' ); ?>
            </div>
        </aside><!-- main-content-aside -->

    </div>
</div><!-- sec-content -->

<?php endif; ?>
        
    