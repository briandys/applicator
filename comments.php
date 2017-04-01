<?php if ( post_password_required() ) {
	return;
} ?>

<div id="comments" class="comments comments-area">
    <section class="comments--cr">
        
        <div class="comments--hr">
            <div class="comments--hr--cr">
                
                <h2 class="h comments--h">
                    <span class="h-l comments--h-l"><?php esc_html_e( 'Comments', 'applicator' ); ?></span>
                </h2>
                
                <?php // inc > tags > comments-actions-snippet.php
                applicator_comments_actions_snippet(); ?>
                
            </div>
        </div><!-- comments--hr -->
        
        <div class="comments--ct">
            <div class="comments--ct-cr">
                
                
                <?php // With Comments
                if ( have_comments() ) : ?>
        
                    <div class="cp comment-items">
                        <div class="comment-items--cr">
                            <ol class="grp comments--grp">
                            <?php wp_list_comments( array(
                                'avatar_size' => 48,
                                'style'       => 'ol',
                                'reply_text'  => __( 'Reply', 'applicator' ),
                                'callback' => 'applicator_comment_item'
                            ) ); ?>
                            </ol>
                        </div>
                    </div><!-- comment-items -->

                    <?php
                    // Comments Navigation
                    // inc > tags > comments-nav.php
                    application_comments_nav();
                    ?>

                <?php endif; ?>
                
                
                <?php
                // Comment Form
                // inc > functions > comment-form.php
                
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
                                                    esc_html__( 'Comment', 'applicator' )
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
        </div><!-- comments--ct -->
    
    </section>
</div><!-- comments -->