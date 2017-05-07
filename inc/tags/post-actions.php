<?php // Post Actions | content.php

if ( ! function_exists( 'apl_func_post_admin_actions' ) ) {
    function apl_func_post_admin_actions() {
        
        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
            
            $edit_post_axn_a_l_mu = '<span class="a_l edit-post-axn---a_l" title="%5$s"><span class="word %2$s---word">%1$s</span> <span class="word %4$s---word">%3$s</span></span>';
        
            $edit_post_axn_a_l = sprintf( $edit_post_axn_a_l_mu,
                esc_html__( 'Edit', 'applicator' ),
                'edit',
                get_the_title(),
                'post-title',
                esc_attr__( 'Edit', 'applicator' ) . ' ' . get_the_title()
            ); ?>
            
            <div class="axns post-admin-axns" data-name="Post Admin Actions">
                <div class="cr post-admin-axns---cr">
                    <div class="h post-admin-axns---h"><span class="h_l post-admin-axns---h_l"><?php esc_html_e( 'Post Admin Actions', 'applicator' ); ?></span></div>
                    <div class="ct post-admin-axns---ct">
                        <div class="ct_cr post-admin-axns---ct_cr">
                            <span class="obj axn edit-post-axn" data-name="Edit Post Action">
                                <?php echo edit_post_link( $edit_post_axn_a_l, '', '' ); ?>
                            </span>
                        </div>
                    </div><!-- ct -->
                </div>
            </div><!-- Post Admin Actions -->
        <?php }
    
    }
}