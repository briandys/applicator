<?php // Edit Post Action | content.php

if ( ! function_exists( 'applicator_func_post_actions' ) ) {
    function applicator_func_post_actions() {
        
        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
            
            // Markup Template
            $edit_post_action_mu = '';
            $edit_post_action_mu .= '<span class="a_l %5$s---a_l" title="%6$s">';
            $edit_post_action_mu .= '<span class="txt %3$s---txt">%1$s</span>';
            $edit_post_action_mu .= ' <span class="txt %4$s---txt">%2$s</span>';
            $edit_post_action_mu .= '</span>';
            
            // Variables
            $edit_term = 'Edit';
            $post_title_term = get_the_title();
            $edit_post_title_term = $edit_term.' '.$post_title_term;
            
            // R: Edit Post Action Content
            $edit_post_action_content = sprintf( $edit_post_action_mu,
                /* 1 */ $edit_term,
                /* 2 */ $post_title_term,
                /* 3 */ sanitize_title( $edit_term ),
                /* 4 */ sanitize_title( $post_title_term ),
                /* 5 */ 'edit-post-axn',
                /* 6 */ $edit_post_title_term
            );
            
            // OB: Edit Post Link
            ob_start();
            edit_post_link( $edit_post_action_content, '', '' );
            $edit_post_link_ob_content = ob_get_contents();
            ob_end_clean();
            
            // Edit Post Action
            $edit_post_action_obj = htmlok( array(
                'name'      => 'Edit Post Action',
                'structure' => array(
                    'type'      => 'object',
                    'subtype'   => 'wordpress generated content',
                ),
                'root_css'  => 'axn',
                'css'       => 'edit-post-axn',
                'content'   => array(
                    'object' => $edit_post_link_ob_content,
                ),
                'echo'      => true,
            ) );
        }
    }
}