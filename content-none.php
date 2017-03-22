<article <?php post_class( 'entry entry--none' ); ?>>
    <div class="entry--cr">

        <div class="entry--hr">
            <div class="entry--hr--cr">

                <h1 class="h entry--h"><span class="entry--h-l"><?php esc_html_e( 'Nothing Found', 'applicator' ); ?></span></h1>


                <?php
                // Hook: After Entry Heading
                // inc > hooks.php
                applicator_hook_after_entry_heading(); ?>

            </div>
        </div><!-- entry--hr -->

        <div class="entry--ct">
            <div class="entry--ct-cr">
                
                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'applicator' ); ?></p>

            </div>
        </div><!-- entry--ct -->

    </div>
</article><!-- entry -->