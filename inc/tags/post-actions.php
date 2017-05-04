<?php // Post Actions | content.php

if ( ! function_exists( 'apl_func_post_actions' ) ) {
    function apl_func_post_actions() {
        
        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
            
            $edit_post_a_l_mu = '<span class="a_l edit-post---a_l" title="%1$s %2$s"><span class="word edit---word">%3$s</span> <span class="word post-title---word">%2$s</span></span>';
        
            $edit_post_a_l = sprintf( $edit_post_a_l_mu,
                esc_attr__( 'Edit', 'applicator' ),
                get_the_title(),
                esc_html__( 'Edit', 'applicator' )
            ); ?>
            
            <div class="axns post-admin-axns" data-name="Post Admin Actions">
                <div class="cr post-admin-axns---cr">
                    <div class="h post-admin-axns---h"><span class="h_l post-admin-axns---h_l"><?php esc_html_e( 'Post Admin Actions', 'applicator' ); ?></span></div>
                    <div class="obj navi edit-post-navi" data-name="Edit Post Navigation Item">
                        <?php echo edit_post_link( $edit_post_a_l, '', '' ); ?>
                    </div>
                </div>
            </div><!-- Post Actions -->
        <?php }
    
    }
}