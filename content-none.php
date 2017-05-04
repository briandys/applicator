<article <?php post_class( 'cp post post--empty' ); ?>>
    <div class="cr post---cr">
        <div class="hr post---hr">
            <div class="hr_cr post---hr_cr">
                <h1 class="h post---h"><span class="post---h-l"><?php esc_html_e( 'Nothing Found', 'applicator' ); ?></span></h1>
                <?php // Hook: After Post Heading
                // inc > hooks.php
                apl_hook_after_post_heading(); ?>
            </div>
        </div>
        <div class="ct post---ct">
            <div class="ct_cr post---ct_cr">
                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'applicator' ); ?></p>
            </div>
        </div><!-- ct -->

    </div>
</article><!-- Entry -->