<?php if ( post_password_required() ) {
	return;
} ?>

<div class="md comment-md comments-area" data-name="Comment Module">
    <div class="cr comment-md_cr">
        <div class="h comment-md---h"><span class="h_l comment-md---h_l"><?php esc_html_e( 'Comment Module', 'applicator' ); ?></span></div>
        <div class="ct comment-md---ct">
            <div class="ct_cr comment-md---ct_cr">
                
                <div id="comments" class="cp comments" data-name="Comments">
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
                
                // Markup: Commenter Comment Creation
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
                
                
                comment_form( array(
                    
                    'id_form'                   => 'commentform',
                    
                    // Initial
                    'title_reply_before'        => '',
                    'title_reply_after'         => '',
                    
                    // Heading
                    'title_reply'               => sprintf(
                                                    '<div class="h comment-respond--h">'
                                                        .'<span class="h-l comment-respond--h-l">%s</span>'
                                                    .'</div>',
                                                    esc_html__( 'Write Comment', 'applicator' )
                                                ),
                    
                    // Settings > Discussion
                    'must_log_in'               => sprintf(
                                                    '<div class="note comment--sign-in-required--note">'
                                                        .'<div class="comment--sign-in-required--note--cr">'
                                                            .'<div class="comment--sign-in-required--note--l">'
                                                                .'<span class="comment--sign-in-required--note--subj-l">'
                                                                    .'<a class="a comment--sign-in-required--sign-in--a" href="%3$s">'
                                                                        .'<span class="a-l">%1$s</span>'
                                                                    .'</a>'
                                                                .' <span class="comment--sign-in-required--note--pred-l">%2$s</span>'
                                                            .'</div>'
                                                        .'</div>'
                                                    .'</div><!-- comment--sign-in-required--note -->',
                                                    esc_html__( 'Sign In', 'applicator' ),
                                                    esc_html__( 'to comment', 'applicator' ),
                                                    wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
                                                ),
                    
                    // Signed in as "Account Name"
                    'logged_in_as'              => sprintf(
                                                    '<div class="account-signed-in">'
                                                        .'<div class="account-signed-in--cr">'
                                                            .'<div class="account-signed-in--l">'
                                                                .'<span class="account-signed-in--pred-l">%1$s</span>'
                                                                .' <span class="account-signed-in-account--l">'
                                                                    .'<a class="a account-signed-in--account--a" href="%3$s">'
                                                                        .'<span class="a-l">%2$s</span>'
                                                                    .'</a>'
                                                                .'</span>'
                                                            .'</div>'
                                                            .'<div class="axns account-signed-in--axns">'
                                                                .'<div class="axns--cr account-signed-in--axns--cr">'
                                                                    .'<div class="h axns--h"><span class="h-l">Actions</span></div>'
                                                                    .'<a class="a account-signed-in--sign-out--a" href="%4$s">'
                                                                        .'<span class="a-l">%5$s</span>'
                                                                    .'</a>'
                                                                .'</div>'
                                                            .'</div>'
                                                        .'</div>'
                                                    .'</div><!-- account-signed-in -->',
                                                    esc_html__( 'Signed in as', 'applicator' ),
                                                    $user_identity,
                                                    admin_url( 'profile.php' ),
                                                    wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ),
                                                    esc_html__( 'Sign Out', 'applicator' )
                                                ), 
                    
                    // Textarea
                    'comment_field'             => sprintf( $commenter_comment_creation_mu,
                                                    esc_attr__( 'Comment', 'applicator' ),
                                                    esc_html__( 'Comment', 'applicator' )
                                                ),
                    
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
                    
                    'cancel_reply_link'         => sprintf(
                                                    '<span class="a-l comment-reply--cancel--a-l">'
                                                        .'<span class="comment-reply--cancel--a--pred-l">%1$s</span>'
                                                        .' <span class="comment-reply--cancel--a--subj-l">%2$s</span>'
                                                    .'</span>',
                                                    esc_html__( 'Cancel', 'applicator' ),
                                                    esc_html__( 'Reply', 'applicator' )
                                                ),
                    
                    // Notes
                    'comment_notes_before'      => '',
                    'comment_notes_after'       => ''
                    
                ) ); ?>
                
            </div>
        </div>
    </div>
</div><!-- comment-md -->