<?php if ( post_password_required() ) {
	return;
} ?>

<div class="md comment-md" data-name="Comment Module">
    <div class="cr comment-md_cr">
        <div class="h comment-md---h"><span class="h_l comment-md---h_l"><?php esc_html_e( 'Comment Module', 'applicator' ); ?></span></div>
        <div class="ct comment-md---ct">
            <div class="ct_cr comment-md---ct_cr">
                
                <div id="comments" class="cp comments comments-area" data-name="Comments">
                    <div class="cr comments---cr">
                        <div class="hr comments---hr">
                            <div class="hr_cr comments---hr_cr">
                                <div class="h comments---h"><span class="h_l comments---h_l">Comments</span></div>
                                <aside class="cn aside comments-hr-aside" data-name="Comments Header Aside" role="complementary">
                                    <div class="cr comments-hr-aside---cr">
                                    
                                        <?php // inc > tags > comments-actions-snippet.php
                                        applicator_comments_actions_snippet(); ?>
                                    
                                    </div>
                                </aside><!-- comments-hr-aside -->
                            </div><!-- comments---hr_cr -->
                        </div>
                        <div class="ct comments---ct">
                            <div class="ct_cr comments---ct_cr">
                                
                            <?php if ( have_comments() ) { ?>
                                
                                <?php // Component: Comment ?>
                                <ul class="grp comments---grp">
                                    <?php wp_list_comments( array(
                                        'style'       => 'ul',
                                        'avatar_size' => 48,
                                        'callback' => 'applicator_comment'
                                    ) ); ?>
                                </ul>
                                
                                <?php // Comments Navigation | inc > tags > comments-nav.php
                                applicator_comments_nav(); ?>
                            
                            <?php } else { ?>
                                
                                <div class="obj note comments-empty-note---obj" data-name="Comments Empty Note">
                                    <div class="g comments-empty-note---g">
                                        <p><?php esc_html_e( 'There are no comments.', 'applicator' ); ?></p>
                                    </div>
                                </div><!-- comments-empty-note---obj -->
                                
                            <?php } ?>
                            
                            </div>
                        </div><!-- comments---ct -->
                    </div>
                </div><!-- comments -->
                
                <?php // Comment Form | inc > functions > comment-form.php
                
                // Markup
                $commenter_comment_creation_mu = '<div class="cp fs-item commenter-comment-creation" data-name="Commenter Comment Creation">';
                    $commenter_comment_creation_mu .= '<div class="cr commenter-com-crt---cr">';
                        $commenter_comment_creation_mu .= '<div class="h commenter-com-crt---h"><span class="h_l commenter-com-crt---h_l">Commenter Comment Creation</span></div>';
                        $commenter_comment_creation_mu .= '<div class="ct commenter-com-crt---ct">';
                            $commenter_comment_creation_mu .= '<div class="ct_cr commenter-com-crt---ct_cr">';
                                
                                $commenter_comment_creation_mu .= '<span class="obj commenter-com-creation-label---obj" data-name="Commenter Comment Creation Label">';
                                    $commenter_comment_creation_mu .= '<label class="label commenter-com-crt-lbl---label" for="comment"><span class="label_l commenter-name-crt-lbl---label_l">%2$s</span></label>';
                                $commenter_comment_creation_mu .= '</span>';
                                
                                $commenter_comment_creation_mu .= '<span class="obj commenter-com-creation-input---obj" data-name="Commenter Comment Creation Input">';
                                    $commenter_comment_creation_mu .= '<textarea id="comment" class="textarea input-text commenter-com-crt-inp--input-text" name="comment" placeholder="%1$s" title="%1$s" maxlength="65525" required></textarea>';
                                $commenter_comment_creation_mu .= '</span>';
                            
                            $commenter_comment_creation_mu .= '</div>';
                        $commenter_comment_creation_mu .= '</div>';
                    $commenter_comment_creation_mu .= '</div>';
                $commenter_comment_creation_mu .= '</div>';
                
                $commenter_comment_creation = sprintf( $commenter_comment_creation_mu,
                    esc_attr__( 'Comment', 'applicator' ),
                    esc_html__( 'Comment', 'applicator' )
                );
                
                // Markup
                $com_crt_h_mu = '<div class="h %1$s---h"><span class="h_l %1$s---h_l">%2$s</span></div>';
                
                // Content
                $com_crt_h_ = sprintf( $com_crt_h_mu,
                    'com-crt',
                    esc_html__( 'Comment Creation', 'applicator' )
                );
                
                // Markup
                $sign_in_req_note_mu = '<div class="obj note %2$s" data-name="%1$s">';
                    $sign_in_req_note_mu .= '<div class="g %3$s---g">';
                        $sign_in_req_note_mu .= '<div class="g_l %3$s---g_l">';
                            $sign_in_req_note_mu .= '<p><a class="a %3$s---a" href="%6$s"><span class="a_l %3$s---a_l"><span class="word sign-in---word">%4$s</span></span></a> <span class="line to-comment---line">%5$s</span></p>';
                        $sign_in_req_note_mu .= '</div>';
                    $sign_in_req_note_mu .= '</div>';
                $sign_in_req_note_mu .= '</div><!-- Sign In Required Note -->';
                
                // Content
                $sign_in_req_note = sprintf( $sign_in_req_note_mu,
                    'Sign In Required Note',
                    'sign-in-required-note',
                    'sign-in-req-note',
                    esc_html__( 'Sign In', 'applicator' ),
                    esc_html__( 'to comment.', 'applicator' ),
                    wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
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
                
                // Markup
                $signed_in_as_label_obj_mu = '<span class="obj %2$s" data-name="%1$s">';
                    $signed_in_as_label_obj_mu .= '<span class="g %3$s---g"><span class="g_l %3$s---g_l"><span class="line signed-in-as---line">%4$s</span></span></span>';
                $signed_in_as_label_obj_mu .= '</span>';
                
                // Content
                $signed_in_as_label_obj = sprintf( $signed_in_as_label_obj_mu,
                    'Signed In As Label Object',
                    'signed-in-as-label-obj',
                    'signed-in-as-lbl-obj',
                    esc_html__( 'Signed in as', 'applicator' )
                );
                
                // Markup
                $acct_name_obj_mu = '<span class="obj %2$s" title="%4$s" data-name="%1$s">';
                    $acct_name_obj_mu .= '<span class="g %3$s---g"><span class="g_l %3$s---g_l">';
                        $acct_name_obj_mu .= '<a class="a %3$s---a" href="%5$s"><span class="a_l %3$s---a_l"><span class="line account-name---line">%4$s</span></span></a>';
                    $acct_name_obj_mu .= '</span></span>';
                $acct_name_obj_mu .= '</span>';
                
                // Content
                $acct_name_obj = sprintf( $acct_name_obj_mu,
                    'Account Name Object',
                    'account-name-obj',
                    'acct-name-obj',
                    $user_identity,
                    admin_url( 'profile.php' )
                );
                
                // Markup
                $signed_in_acct_axns_mu = '<div class="axns %2$s" data-name="%1$s">';
                    $signed_in_acct_axns_mu .= '<div class="cr %3$s---cr">';
                        $signed_in_acct_axns_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%4$s</span></div>';
                        $signed_in_acct_axns_mu .= '%5$s';
                    $signed_in_acct_axns_mu .= '</div>';
                $signed_in_acct_axns_mu .= '</div>';
                
                // Markup
                $sign_out_axn_mu = '<div class="obj axn %2$s" title="%6$s" data-name="%1$s">';
                    $sign_out_axn_mu .= '<a class="a %3$s---a" href="%5$s"><span class="a_l %3$s---a_l">%4$s</span></a>';
                $sign_out_axn_mu .= '</div>';
                
                // Content
                $sign_out_axn = sprintf( $sign_out_axn_mu,
                    'Sign Out Action',
                    'sign-out-axn',
                    'sign-out-axn',
                    esc_html__( 'Sign Out', 'applicator' ),
                    wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ),
                    esc_attr__( 'Sign Out', 'applicator' )
                );
                
                // Content
                $signed_in_acct_axns = sprintf( $signed_in_acct_axns_mu,
                    'Signed In Account Actions',
                    'signed-in-account-axns',
                    'signed-in-acct-axns',
                    esc_html__( 'Signed In Account Actions', 'applicator' ),
                    $sign_out_axn
                );
                
                // Content
                $signed_in_acct = sprintf( $signed_in_acct_mu,
                    'Signed In Account',
                    'signed-in-account',
                    'signed-in-acct',
                    esc_html__( 'Signed In Account', 'applicator' ),
                    $signed_in_as_label_obj,
                    $acct_name_obj,
                    $signed_in_acct_axns
                );
                
                comment_form( array(
                    
                    'id_form'                   => 'commentform',
                    
                    // Initial
                    'title_reply_before'        => '',
                    'title_reply_after'         => '',
                    
                    // Heading
                    'title_reply'               => $com_crt_h_,
                    
                    // Settings > Discussion
                    'must_log_in'               => $sign_in_req_note,
                    
                    // Signed in as "Account Name"
                    'logged_in_as'              => $signed_in_acct, 
                    
                    // Textarea
                    'comment_field'             => $commenter_comment_creation,
                    
                    // Submit Comment Action
                    'id_submit'                 => 'comment-submit--a',
                    'class_submit'              => 'a form--a comment-submit--a',
                    'label_submit'              => esc_attr__( 'Submit', 'applicator' ),
                    
                    
                    // Reply
                    'title_reply_to'            =>  '<div class="note comment-recipient--note">'
                                                        .'<div class="comment-recipient--note-cr">'
                                                            .'<div class="comment-recipient--note--l">'
                                                                .'<span class="comment-recipient--pred-l">' . esc_html__( 'Reply to', 'applicator' ) . '</span>'
                                                                .' <span class="comment-recipient--subj-l">%s</span>'
                                                            .'</div>'
                                                        .'</div>'
                                                    .'</div><!-- comment-recipient--note -->',
                                                    
                    
                    // Cancel Reply Action
                    'cancel_reply_before'       => '',
                    'cancel_reply_after'       => '',
                    
                    'cancel_reply_link'         => sprintf( $cancel_reply_com_axn_a_l_mu,
                                                           esc_html__( 'Cancel', 'applicator' ),
                                                           esc_html__( 'Reply', 'applicator' ),
                                                           esc_html__( 'to', 'applicator' ),
                                                           esc_html__( 'Comment', 'applicator' ),
                                                           esc_attr__( 'Cancel Reply to Comment', 'applicator' )
                                                ),
                    
                    // Notes
                    'comment_notes_before'      => '',
                    'comment_notes_after'       => ''
                    
                ) ); ?>
                
            </div>
        </div>
    </div>
</div><!-- comment-md -->