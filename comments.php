<?php if ( post_password_required() ) {
	return;
} ?>

<div class="md comment-md" data-name="Comment Module">
    <div class="cr comment-md_cr">
        <div class="h comment-md---h"><span class="h_l comment-md---h_l"><?php esc_html_e( 'Comment Module', $GLOBALS['apl_textdomain'] ); ?></span></div>
        <div class="ct comment-md---ct">
            <div class="ct_cr comment-md---ct_cr">
                
                <?php
                
                if ( have_comments() ) {
                
                    $comments_content = '<ul class="grp comments---grp">';
                    $comments_content .= wp_list_comments( array(
                        'style'       => 'ul',
                        'avatar_size' => 48,
                        'callback' => 'applicator_func_comment'
                    ) );
                    $comments_content .= '</ul>';
                    $comments_content .= applicator_func_comments_nav();
                    
                } else {
                    
                    $comments_content = applicator_html_ok_obj( array(
                        'name' => 'Comments Empty Note',
                        'elem' => 'n',
                        'css' => 'com-empty-note',
                        'content' => '<p>' . esc_html__( 'There are no comments.', $GLOBALS['apl_textdomain'] ) . '</p>',
                    ) );
                    
                }
                
                $comments_header_aside_mu = '<div class="aside comments-hr-aside" role="complementary" data-name="Comments Header Aside">';
                $comments_header_aside_mu .= '<div class="cr coms-hr-as---cr">';
                $comments_header_aside_mu .=  applicator_func_comments_actions_snippet();
                $comments_header_aside_mu .= '</div>';
                $comments_header_aside_mu .= '</div><!-- Comments Header Aside -->';
                
                $comments = applicator_html_ok_cp( array(
                    'name'          => 'Comments',
                    'cp_css'        => 'comments-area',
                    'css'           => 'comments',
                    'hr_content'    => $comments_header_aside_mu,
                    'attr'          => array(
                        'id'        => 'comments',
                    ),
                    'content'       => $comments_content,
                    'echo'          => true,
                ) );
                
                ?>
                
                <?php // echo applicator_func_comments_actions_snippet(); ?>
                <?php // applicator_func_comments_actions_snippet(); ?>
                
                <?php // Comment Form | inc > functions > comment-form.php
                
                // title_reply - Component Header
                $comment_creation_header = applicator_html_ok_cp( array(
                    'name'      => 'Comment Creation',
                    'cn_type'   => 'hr',
                    'css'       => 'com-crt-hr',
                ) );
                
                // must_log_in - Text
                $sign_in_required_note_txt = applicator_html_ok_txt( array(
                    'content' => array(
                        array(
                            'txt' => esc_html__( 'Sign In', $GLOBALS['apl_textdomain'] ),
                        ),
                        array(
                            'sep' => $GLOBALS['space_sep'],
                            'txt' => esc_html__( 'to comment.', $GLOBALS['apl_textdomain'] ),
                        ),
                    ),
                ) );
                
                // must_log_in - Object
                $sign_in_req_note_obj = applicator_html_ok_obj( array(
                    'name'      => 'Sign In Required Note',
                    'elem'      => 'n',
                    'obj_css'   => 'note',
                    'css'       => 'sign-in-req-note',
                    'content'   => $sign_in_required_note_txt,
                ) );
                
                // logged_in_as - Text
                $signed_in_as_label_txt = applicator_html_ok_txt( array(
                    'content' => array(
                        array(
                            'txt'   => esc_html__( 'Signed in as', $GLOBALS['apl_textdomain'] ),
                        ),
                    ),
                ) );
                
                // logged_in_as - Object
                $signed_in_as_label_obj = applicator_html_ok_obj( array(
                    'name'      => 'Signed In As Label',
                    'layout'    => 'i',
                    'elem'      => 'g',
                    'css'       => 'signed-in-as-lbl',
                    'content'   => $signed_in_as_label_txt,
                ) );
                
                // logged_in_as - Text
                $signed_in_account_name_txt = applicator_html_ok_txt( array(
                    'content' => array(
                        array(
                            'txt'   => $user_identity,
                            'css'   => 'author-name',
                        ),
                    ),
                ) );
                
                // logged_in_as - Object
                $signed_in_account_name_obj = applicator_html_ok_obj( array(
                    'name'      => 'Sign In Account Name',
                    'layout'    => 'i',
                    'elem'      => 'a',
                    'attr'      => array(
                        'href'  => admin_url( 'profile.php' ),
                    ),
                    'content'   => $signed_in_account_name_txt,
                ) );
                
                // logged_in_as - Component
                $signed_in_acct = applicator_html_ok_cp( array(
                    'name'      => 'Signed In Account',
                    'css'       => 'signed-in-acct',
                    'content'   => $signed_in_as_label_obj . $signed_in_account_name_obj,
                ) );
                
                $comment_author_comment_creation_input_label_obj = applicator_html_ok_obj( array(
                    'name'      => 'Comment Author Comment Creation Input Label',
                    'elem'      => 'l',
                    'css'       => 'com-author-com-crt-input',
                    'content'   => '<label class="label com-author-com-crt-lbl-obj---label" for="comment"><span class="label_l com-author-name-crt-lbl-obj---label_l">Commentx</span></label>',
                ) );
                
                $comment_author_comment_creation_input_obj = applicator_html_ok_obj( array(
                    'name'      => 'Comment Author Comment Creation Input',
                    'elem'      => 'l',
                    'css'       => 'com-author-com-crt-input',
                    'content'   => '<textarea id="comment" class="textarea input-text com-author-com-crt-inp-obj--input-text" name="comment" placeholder="Commentx" title="Comment" maxlength="65525" required></textarea>',
                ) );
                
                $comment_author_comment_creation = applicator_html_ok_cp( array(
                    'name'      => 'Comment Author Comment Creation',
                    'css'       => 'com-auth-com-crt',
                    'content'   => $comment_author_comment_creation_input_label_obj . $comment_author_comment_creation_input_obj,
                ) );
                
                // cancel_reply_link - Text
                $cancel_reply_comment_action_txt = applicator_html_ok_txt( array(
                    'content' => array(
                        array(
                            'txt' => esc_html__( 'Cancel', $GLOBALS['apl_textdomain'] ),
                        ),
                        array(
                            'txt' => esc_html__( 'Reply', $GLOBALS['apl_textdomain'] ),
                            'sep' => $GLOBALS['space_sep'],
                        ),
                        array(
                            'txt' => esc_html__( 'to', $GLOBALS['apl_textdomain'] ),
                            'sep' => $GLOBALS['space_sep'],
                        ),
                        array(
                            'txt' => esc_html__( 'Comment', $GLOBALS['apl_textdomain'] ),
                            'sep' => $GLOBALS['space_sep'],
                        ),
                    ),
                ) );
                
                // title_reply_to - Text
                $comment_recipient_note_txt = applicator_html_ok_txt( array(
                    'content' => array(
                        array(
                            'txt' => esc_html__( 'Reply to', $GLOBALS['apl_textdomain'] ),
                        ),
                        array(
                            'txt' => '%s',
                        ),
                    ),
                ) );
                
                // title_reply_to - Object
                $comment_recipient_note_obj = applicator_html_ok_obj( array(
                    'name'      => 'Comment Recipient Note',
                    'elem'      => 'n',
                    'css'       => 'com-recipient-note',
                    'content'   => $comment_recipient_note_txt,
                ) );
                
                // cancel_reply_link - Object
                $cancel_reply_comment_action_label_obj = applicator_html_ok_obj( array(
                    'elem' => 'al',
                    'css' => 'cancel-reply-com-axn',
                    'content' => $cancel_reply_comment_action_txt,
                ) );
                
                comment_form( array(
                    
                    'id_form'                   => 'commentform',
                    
                    // Initial
                    'title_reply_before'        => '',
                    'title_reply_after'         => '',
                    
                    // Heading
                    'title_reply'               => $comment_creation_header,
                    
                    // Settings > Discussion
                    'must_log_in'               => $sign_in_req_note_obj,
                    
                    // Signed in as "Account Name"
                    'logged_in_as'              => $signed_in_acct, 
                    
                    // Textarea
                    'comment_field'             => $comment_author_comment_creation,
                    
                    // Submit Comment Action
                    'id_submit'                 => 'com-sub-axn---b',
                    'class_submit'              => 'b com-sub-axn---b',
                    'label_submit'              => esc_attr__( 'Submit', $GLOBALS['apl_textdomain'] ),
                    
                    
                    // Reply
                    'title_reply_to'            =>  $comment_recipient_note_obj,
                                                    
                    
                    // Cancel Reply Action
                    'cancel_reply_before'       => '',
                    'cancel_reply_after'        => '',
                    
                    'cancel_reply_link'         => $cancel_reply_comment_action_label_obj,
                    
                    // Notes
                    'comment_notes_before'      => '',
                    'comment_notes_after'       => ''
                    
                ) ); ?>
                
            </div>
        </div>
    </div>
</div><!-- comment-md -->