<article <?php post_class( 'cp entry entry--none' ); ?>>
    <div class="cr entry---cr">

        <div class="entry---hr">
            <div class="hr_cr entry---hr_cr">

                <h1 class="h entry---h"><span class="entry---h-l"><?php esc_html_e( 'Nothing Found', 'applicator' ); ?></span></h1>


                <?php
                // Hook: After Entry Heading
                // inc > hooks.php
                applicator_hook_after_entry_heading(); ?>

            </div>
        </div><!-- entry---hr -->

        <div class="ct entry--ct">
            <div class="ct_cr entry---ct_cr">
                
                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'applicator' ); ?></p>

            </div>
        </div><!-- entry--ct -->

    </div>
</article><!-- entry -->