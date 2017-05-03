<?php

//------------------------- Entry Actions
// content.php

if ( ! function_exists( 'apl_post_actions' ) ) :
    function apl_post_actions() {
        
        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) : ?>
        
            <div class="axns entry--axns">
                <div class="entry--axns--cr">
                    
                    <div class="h axns--h entry--axns--h"><span class="entry--axns--h-l">Actions</span></div>
                    <?php echo edit_post_link(
                        __( '<span class="entry-edit--a-l"><span class="entry-edit--a--edit--word-l">Edit</span> <span class="entry-edit--a--entry--word-l">Entry</span></span>', 'applicator' ), '', ''); ?>

                </div>
            </div><!-- entry--axns -->
        
        <?php endif;
    
    }
endif;