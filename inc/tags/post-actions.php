<?php // Edit Post Action | content.php

if ( ! function_exists( 'applicator_post_actions' ) ) {
    function applicator_post_actions() {
        
        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
            
            // Markup Template
            $edit_post_action_mu = '';
            $edit_post_action_mu .= '<span class="a_l %5$s---a_l" title="%6$s">';
            $edit_post_action_mu .= '<span class="l %5$s---l">';
            $edit_post_action_mu .= '<span class="txt %3$s---txt">%1$s</span>';
            $edit_post_action_mu .= ' <span class="txt post-title---txt %4$s---txt">%2$s</span>';
            $edit_post_action_mu .= '</span>';
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
            $edit_post_action_obj = applicator_htmlok( array(
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
            ) );
            
            return $edit_post_action_obj;
        }
    }
}


// Edit Comment Action | comment.php

if ( ! function_exists( 'applicator_comment_actions' ) ) {
    function applicator_comment_actions() {
        
        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
            
            // Markup Template
            $edit_comment_action_mu = '';
            $edit_comment_action_mu .= '<span class="a_l %5$s---a_l" title="%6$s">';
            $edit_comment_action_mu .= '<span class="l %5$s---l">';
            $edit_comment_action_mu .= '<span class="txt %3$s---txt">%1$s</span>';
            $edit_comment_action_mu .= ' <span class="txt comment-title---txt %4$s---txt">%2$s</span>';
            $edit_comment_action_mu .= '</span>';
            $edit_comment_action_mu .= '</span>';
            
            // Variables
            $comment_term = esc_html__( 'Edit', 'applicator' );
            $comment_title_term = esc_html__( 'Comment', 'applicator' ).' '.get_comment_ID();
            $edit_comment_title_term = $comment_term.' '.$comment_title_term;
            
            // R: Edit Post Action Content
            $edit_comment_action_content = sprintf( $edit_comment_action_mu,
                /* 1 */ $comment_term,
                /* 2 */ $comment_title_term,
                /* 3 */ sanitize_title( $comment_term ),
                /* 4 */ sanitize_title( $comment_title_term ),
                /* 5 */ 'edit-com-axn',
                /* 6 */ $edit_comment_title_term
            );
            
            // OB: Edit Comment Link
            ob_start();
            edit_comment_link( $edit_comment_action_content, '', '' );
            $edit_comment_link_ob_content = ob_get_contents();
            ob_end_clean();
            
            // Edit Post Action
            $edit_comment_action_obj = applicator_htmlok( array(
                'name'      => 'Edit Comment Action',
                'structure' => array(
                    'type'      => 'object',
                    'subtype'   => 'wordpress generated content',
                ),
                'root_css'  => 'axn',
                'css'       => 'edit-comment-axn',
                'content'   => array(
                    'object' => $edit_comment_link_ob_content,
                ),
                'echo'      => true,
            ) );
        }
    }
}