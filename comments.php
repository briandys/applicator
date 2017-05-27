<?php if ( post_password_required() ) {
	return;
} ?>

<div class="md comment-md" data-name="Comment Module">
    <div class="cr comment-md_cr">
        <div class="h comment-md---h"><span class="h_l comment-md---h_l"><?php esc_html_e( 'Comment Module', $GLOBALS['apl_textdomain'] ); ?></span></div>
        <div class="ct comment-md---ct">
            <div class="ct_cr comment-md---ct_cr">
                
                <div id="comments" class="cp comments comments-area" data-name="Comments">
                    <div class="cr comments---cr">
                        <div class="hr comments---hr">
                            <div class="hr_cr comments---hr_cr">
                                <div class="h comments---h"><span class="h_l comments---h_l"><?php esc_html_e( 'Comments', $GLOBALS['apl_textdomain'] ); ?></span></div>
                                <div class="aside comments-hr-aside" role="complementary" data-name="Comments Header Aside">
                                    <div class="cr coms-hr-as---cr">
                                    
                                        <?php // inc > tags > comments-actions-snippet.php
                                        applicator_func_comments_actions_snippet(); ?>
                                    
                                    </div>
                                </div><!-- Comments Header Aside -->
                            </div>
                        </div>
                        <div class="ct comments---ct">
                            <div class="ct_cr comments---ct_cr">
                                
                            <?php if ( have_comments() ) { ?>
                                
                                <ul class="grp comments---grp">
                                    <?php wp_list_comments( array(
                                        'style'       => 'ul',
                                        'avatar_size' => 48,
                                        'callback' => 'applicator_func_comment'
                                    ) ); ?>
                                </ul>
                                
                                <?php // Comments Navigation | inc > tags > comments-nav.php
                                applicator_func_comments_nav();
                                                         
                            } else {
                                
                                $comments_empty_note_obj = applicator_html_ok_obj( array(
                                    'name' => 'Comments Empty Note',
                                    'elem' => 'n',
                                    'css' => 'com-empty-note',
                                    'content' => '<p>' . esc_html__( 'There are no comments.', $GLOBALS['apl_textdomain'] ) . '</p>',
                                    'echo' => true,
                                ) );

                            } ?>
                            
                            </div>
                        </div><!-- comments---ct -->
                    </div>
                </div><!-- comments -->
                
                <?php // Comment Form | inc > functions > comment-form.php
                
                // Markup
                $com_author_comment_creation_mu = '<div class="cp fs-item comment-author-comment-creation" data-name="Comment Author Comment Creation">';
                    $com_author_comment_creation_mu .= '<div class="cr com-author-com-crt---cr">';
                        $com_author_comment_creation_mu .= '<div class="h com-author-com-crt---h"><span class="h_l com-author-com-crt---h_l">Commenter Comment Creation</span></div>';
                        $com_author_comment_creation_mu .= '<div class="ct com-author-com-crt---ct">';
                            $com_author_comment_creation_mu .= '<div class="ct_cr com-author-com-crt---ct_cr">';
                                
                                $com_author_comment_creation_mu .= '<span class="obj com-author-com-creation-label-obj" data-name="Commenter Comment Creation Label">';
                                    $com_author_comment_creation_mu .= '<label class="label com-author-com-crt-lbl-obj---label" for="comment"><span class="label_l com-author-name-crt-lbl-obj---label_l">%2$s</span></label>';
                                $com_author_comment_creation_mu .= '</span>';
                                
                                $com_author_comment_creation_mu .= '<span class="obj com-author-com-creation-input-obj" data-name="Commenter Comment Creation Input">';
                                    $com_author_comment_creation_mu .= '<span class="ee--textarea com-author-com-creation-input-obj---ee--textarea">';
                                        $com_author_comment_creation_mu .= '<textarea id="comment" class="textarea input-text com-author-com-crt-inp-obj--input-text" name="comment" placeholder="%1$s" title="%1$s" maxlength="65525" required></textarea>';
                                    $com_author_comment_creation_mu .= '</span>';
                                $com_author_comment_creation_mu .= '</span>';
                            
                            $com_author_comment_creation_mu .= '</div>';
                        $com_author_comment_creation_mu .= '</div>';
                    $com_author_comment_creation_mu .= '</div>';
                $com_author_comment_creation_mu .= '</div>';
                
                $com_author_comment_creation = sprintf( $com_author_comment_creation_mu,
                    esc_attr__( 'Comment', $GLOBALS['apl_textdomain'] ),
                    esc_html__( 'Comment', $GLOBALS['apl_textdomain'] )
                );
                
                
                
                // Markup
                $cancel_reply_com_axn_a_l_mu = '<span class="a_l cancel-reply-com-axn---a_l" title="%5$s">';
                    $cancel_reply_com_axn_a_l_mu .= '<span class="word cancel---word">%1$s</span>';
                    $cancel_reply_com_axn_a_l_mu .= ' <span class="word reply---word">%2$s</span>';
                    $cancel_reply_com_axn_a_l_mu .= ' <span class="word to---word">%3$s</span>';
                    $cancel_reply_com_axn_a_l_mu .= ' <span class="word comment---word">%4$s</span>';
                $cancel_reply_com_axn_a_l_mu .= '</span>';
                
                // Markup
                $signed_in_acct_mu = '<div class="cp %2$s" data-name="%1$s">';
                    $signed_in_acct_mu .= '<div class="cr %3$s---cr">';
                        $signed_in_acct_mu .= '<div class="hr %3$s---hr">';
                            $signed_in_acct_mu .= '<div class="hr_cr %3$s---hr_cr">';
                                $signed_in_acct_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h">%4$s</span></div>';
                                $signed_in_acct_mu .= '%7$s';
                            $signed_in_acct_mu .= '</div>';
                        $signed_in_acct_mu .= '</div>';
                        $signed_in_acct_mu .= '<div class="ct %3$s---ct">';
                            $signed_in_acct_mu .= '<div class="ct_cr %3$s---ct_cr">%5$s %6$s</div>';
                        $signed_in_acct_mu .= '</div>';
                    $signed_in_acct_mu .= '</div>';
                $signed_in_acct_mu .= '</div>';
                
                /*
                // Markup
                $signed_in_as_label_obj_mu = '<span class="obj %2$s" data-name="%1$s">';
                    $signed_in_as_label_obj_mu .= '<span class="g %3$s---g"><span class="g_l %3$s---g_l"><span class="line signed-in-as---line">%4$s</span></span></span>';
                $signed_in_as_label_obj_mu .= '</span>';
                
                // Content
                $signed_in_as_label_obj = sprintf( $signed_in_as_label_obj_mu,
                    'Signed In As Label Object',
                    'signed-in-as-label-obj',
                    'signed-in-as-lbl-obj',
                    esc_html__( 'Signed in as', $GLOBALS['apl_textdomain'] )
                );
                */
                
                // Markup
                $acct_name_obj_mu = '<span class="obj %2$s" title="%4$s" data-name="%1$s">';
                    $acct_name_obj_mu .= '<span class="g %3$s---g"><span class="g_l %3$s---g_l">';
                        $acct_name_obj_mu .= '<a class="a %3$s---a" href="%5$s"><span class="a_l %3$s---a_l"><span class="line account-name---line">%4$s</span></span></a>';
                    $acct_name_obj_mu .= '</span></span>';
                $acct_name_obj_mu .= '</span>';
                
                /*
                // Content
                $acct_name_obj = sprintf( $acct_name_obj_mu,
                    'Account Name Object',
                    'account-name-obj',
                    'acct-name-obj',
                    $user_identity,
                    admin_url( 'profile.php' )
                );
                */
                
                // Markup
                $signed_in_acct_axns_mu = '<div class="axns %2$s" data-name="%1$s">';
                    $signed_in_acct_axns_mu .= '<div class="cr %3$s---cr">';
                        $signed_in_acct_axns_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%4$s</span></div>';
                        $signed_in_acct_axns_mu .= '%5$s';
                    $signed_in_acct_axns_mu .= '</div>';
                $signed_in_acct_axns_mu .= '</div>';
                
                // Markup
                $sign_out_axn_mu = '<span class="obj axn %2$s" title="%6$s" data-name="%1$s">';
                    $sign_out_axn_mu .= '<a class="a %3$s---a" href="%5$s"><span class="a_l %3$s---a_l">%4$s</span></a>';
                $sign_out_axn_mu .= '</span>';
                
                // Content
                $sign_out_axn = sprintf( $sign_out_axn_mu,
                    'Sign Out Action',
                    'sign-out-axn',
                    'sign-out-axn',
                    esc_html__( 'Sign Out', $GLOBALS['apl_textdomain'] ),
                    wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ),
                    esc_attr__( 'Sign Out', $GLOBALS['apl_textdomain'] )
                );
                
                // Content
                $signed_in_acct_axns = sprintf( $signed_in_acct_axns_mu,
                    'Signed In Account Actions',
                    'signed-in-account-axns',
                    'signed-in-acct-axns',
                    esc_html__( 'Signed In Account Actions', $GLOBALS['apl_textdomain'] ),
                    $sign_out_axn
                );
                
                
                
                
                
                
                
                
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
                
                // cancel_reply_link - Object
                $cancel_reply_comment_action_label = applicator_html_ok_obj( array(
                    'elem' => 'al',
                    'css' => 'cancel-reply-com-axn',
                    'content' => $cancel_reply_comment_action_txt,
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
                    'comment_field'             => $com_author_comment_creation,
                    
                    // Submit Comment Action
                    'id_submit'                 => 'com-sub-axn---b',
                    'class_submit'              => 'b com-sub-axn---b',
                    'label_submit'              => esc_attr__( 'Submit', $GLOBALS['apl_textdomain'] ),
                    
                    
                    // Reply
                    'title_reply_to'            =>  $comment_recipient_note_obj,
                                                    
                    
                    // Cancel Reply Action
                    'cancel_reply_before'       => '',
                    'cancel_reply_after'       => '',
                    
                    'cancel_reply_link'         => $cancel_reply_comment_action_label,
                    
                    // Notes
                    'comment_notes_before'      => '',
                    'comment_notes_after'       => ''
                    
                ) ); ?>
                
            </div>
        </div>
    </div>
</div><!-- comment-md -->