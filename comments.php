<?php if ( post_password_required() ) {
	return;
} ?>

<div id="comments" class="md comments---md comments-area" data-name="Comments Module">
    <section class="md_cr comments---md_cr">
        <h2 class="md_h comments---md_h"><span class="md_h_l comments---md_h_l"><?php esc_html_e( 'Comments Module', 'applicator' ); ?></span></h2>
        <div class="md_ct comments---md_ct">
            <div class="md_ct_cr comments---md_ct_cr">
                
                <?php // Component: Comments ?>
                <div class="cp comments" data-name="Comments">
                    <div class="cr comments---cr">
                        <div class="hr comments---hr">
                            <div class="hr_cr comments---hr_cr">
                                <div class="h comments---h">
                                    <span class="h_l comments---h_l">Comments</span>
                                </div>
                                <aside class="aside comments--hr---aside" data-name="Comments Header Aside">
                                    <div class="aside_cr comments--hr---aside_cr">
                                        <div class="aside_h comments--hr---aside_h">
                                            <span class="aside_h_l comments--hr---aside_h_l">Comments Header Aside</span>
                                        </div>
                                        <div class="aside_ct comments--hr---aside_ct">
                                            <div class="aside_ct_cr comments--hr---aside_ct_cr">
                                                
                                                <?php // inc > tags > comments-actions-snippet.php
                                                applicator_comments_actions_snippet(); ?>
                                                
                                            </div>
                                        </div><!-- comments--hr---aside_ct -->
                                    </div>
                                </aside><!-- comments--hr---aside -->
                            </div><!-- comments---hr_cr -->
                        </div>
                        <div class="ct comments---ct">
                            <div class="ct_cr comments---ct_cr">
                                
                            <?php if ( have_comments() ) { ?>
                                
                                <?php // Component: Comment ?>
                                <ol class="grp comments---grp">
                                    <?php wp_list_comments( array(
                                        'style'       => 'ol',
                                        'avatar_size' => 48,
                                        'reply_text'  => __( 'Reply', 'applicator' ),
                                        'callback' => 'applicator_comment'
                                    ) ); ?>
                                </ol>
                                
                                <?php // Comments Navigation | inc > tags > comments-nav.php
                                application_comments_nav(); ?>
                            
                            <?php } else { ?>
                                
                                Note: No comments.
                                
                            <?php } ?>
                            
                            </div>
                        </div><!-- comments---ct -->
                    </div>
                </div><!-- comments -->
                
                <?php // Comment Form | inc > functions > comment-form.php
                
                comment_form( array(
                    
                    // <form id="comment-form">
                    'id_form'                   => 'commentform',
                    
                    
                    // Initial
                    'title_reply_before'        => '',
                    'title_reply_after'         => '',
                    
                    'title_reply'               => sprintf(
                                                    '<div class="h comment-respond--h">'
                                                        .'<span class="h-l comment-respond--h-l">%s</span>'
                                                    .'</div>',
                                                    esc_html__( 'Write Comment', 'applicator' )
                                                ),
                    
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
                    'comment_field'             => sprintf(
                                                    '<div class="fs-item commenter-comment--fs-item">'
                                                        .'<div class="commenter-comment--fs-item--cr">'
                                                            .'<label class="label commenter-comment--label" for="commenter-comment--input--text">'
                                                                .'<span class="label-l">%2$s</span>'
                                                            .'</label>'
                                                            .'<div class="input-text commenter-comment--input-text">'
                                                                .'<textarea id="comment" class="textarea input--text input--textarea commenter-comment--input--text" placeholder="%1$s" name="comment" title="%1$s" maxlength="65525" required></textarea>'
                                                        .'</div>'
                                                    .'</div>',
                                                    esc_attr__( 'Comment', 'applicator' ),
                                                    esc_html__( 'Comment', 'applicator' )
                                                ),
                    
                    // Submit Action
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
    </section>
</div><!-- comments---md -->