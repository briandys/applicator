<?php

//------------------------- Entry Actions
// content.php

if ( ! function_exists( 'applicator_entry_actions' ) ) :
    function applicator_entry_actions() {
        
        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) : ?>
        
            <div class="axns entry--axns">
                <div class="entry--axns--cr">
                    
                    <div class="entry--axns-h"><span class="h-l">Actions</span></div>
                    <?php echo edit_post_link(
                        __( '<span class="entry--axns--a-l"><span class="entry--axns--pred-l">Edit</span> <span class="entry--axns--subj-l">Entry</span></span>', 'applicator' ), '', ''); ?>

                </div>
            </div><!-- entry-actions -->
        
        <?php endif;
    
    }
endif;