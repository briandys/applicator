<?php // Comments
/*

Structure:

Comment Module
* Comments
* Comment Form

*/

if ( post_password_required() ) {
	return;
}
        
$comments_content = '';
if ( have_comments() ) {

    $comments_content = '<ul class="grp comments---grp">';
    $comments_content .= wp_list_comments( array(
        'style'         => 'ul',
        'avatar_size'   => 48,
        'callback'      => 'applicator_func_comment',
        'echo'          => false,
    ) );
    $comments_content .= '</ul>';
    $comments_content .= applicator_func_comments_nav();

} else {

    $comments_content = htmlok_obj( array(
        'name' => 'Comments Empty Note',
        'elem' => 'n',
        'css' => 'com-empty-note',
        'content' => '<p>' . esc_html__( 'There are no comments.', 'applicator' ) . '</p>',
    ) );

}

// Constructor
$comments_header_aside = htmlok_cn( array(
    'name'      => 'Comments Header',
    'type'      => 'aside',
    'css'       => 'coms-hr',
    'content'   => applicator_func_comments_actions_snippet_cp(),
) );

// Component
$comments = htmlok_cp( array(
    'name'          => 'Comments',
    'cp_css'        => 'comments-area',
    'css'           => 'comments',
    'hr_content'    => $comments_header_aside,
    'attr'          => array(
        'id'        => 'comments',
    ),
    'content'       => $comments_content,
) );


//------------ inc > functions > comment-form.php

// title_reply
$comment_creation_header_mu = '';

$comment_creation_header_mu .= '<div class="obj %2$s---h" data-name="Comment Creation Heading OBJ">';
    $comment_creation_header_mu .= '<div class="h %3$s---h">';
        $comment_creation_header_mu .= '<span class="h_l %3$s---h_l">';
            $comment_creation_header_mu .= '%1$s';
        $comment_creation_header_mu .= '</span>';
    $comment_creation_header_mu .= '</div>';
$comment_creation_header_mu .= '</div><!-- Comment Creation Heading OBJ -->';

$comment_creation_term = esc_html__( 'Comment Creation', 'applicator' );
$comment_creation_term_css = sanitize_title( $comment_creation_term );

$comment_creation_header = sprintf( $comment_creation_header_mu,
    $comment_creation_term,
    $comment_creation_term_css,
    'comment-crt'
);


// logged_in_as
$signed_in_as_term = esc_html__( 'Signed in as', 'applicator' );

$signed_in_account_label_obj = htmlok( array(
    'name'      => 'Signed In Account',
    'structure' => array(
        'type'      => 'object',
        'subtype'   => 'generic label',
        'layout'    => 'inline',
    ),
    'content'   => array(
        'object'    => $signed_in_as_term,
        'after'     => $GLOBALS['space_sep'],
    ),
) );

$signed_in_account_name_obj = htmlok( array(
    'name'      => 'Signed In Account Name',
    'structure' => array(
        'type'      => 'object',
        'linked'    => true,
        'attr'      => array(
            'a'         => array(
                'href'      => admin_url( 'profile.php' ),
                'title'     => $signed_in_as_term.' '.$user_identity,
            ),
        ),
        'layout'    => 'inline',
    ),
    'content'   => array(
        'object' => $user_identity,
    ),
) );

$signed_in_account_cp = htmlok( array(
    'name'      => 'Signed In Account',
    'structure' => array(
        'type'      => 'component',
    ),
    'css'       => 'signed-in-acct',
    'content'   => array(
        'component' => array(
            $signed_in_account_label_obj,
            $signed_in_account_name_obj,
        ),
    ),
) );


// must_log_in
$sign_in_req_note_content = '<p><a href="'.wp_login_url( get_permalink() ).'">'.esc_html__( 'Sign in', 'applicator' ).'</a> '.esc_html__( 'to comment.', 'applicator' ).'</p>';

$sign_in_req_note_obj = htmlok( array(
    'name'      => 'Sign In Required',
    'structure' => array(
        'type'      => 'object',
        'subtype'   => 'note',
    ),
    'css'       => 'sign-in-req',
    'content'   => array(
        'object'    => array(
            array(
                'txt' => $sign_in_req_note_content,
            ),
        ),
    ),
) );


//------------ Comment Author > Comment Creation

// comment_field

$commenter_comment_creation_term = 'Commenter Comment Creation';
$commenter_comment_creation_short_css = 'commenter-com-crt';
$commenter_comment_id_attr = 'comment';
$commenter_comment_term = esc_html__( 'Comment', 'applicator' );
$commenter_comment_submit_css = 'commenter-com-submit-axn---b';
$commenter_comment_submit_term = esc_attr__( 'Submit', 'applicator' );

$commenter_comment_creation_flabel_obj = htmlok( array(
    'name'      => $commenter_comment_creation_term,
    'structure' => array(
        'type'      => 'object',
        'subtype'   => 'form label',
        'attr'      => array(
            'elem'      => array(
                'for'       => $commenter_comment_id_attr,
            ),
        ),
    ),
    'content'   => array(
        'object'    => array(
            array(
                'txt'   => $commenter_comment_term,
            ),
        ),
    ),
) );

/*
1: Class
2: ID
3: Name
4: Placeholder
5: Title
6: Required
*/
$commenter_comment_creation_text_input_mu = '';
$commenter_comment_creation_text_input_mu .= '<textarea id="%2$s" class="textarea input-text %1$s" name="%3$s" placeholder="%4$s" title="%5$s" maxlength="65525"%6$s></textarea>';

$commenter_comment_creation_text_input_content = sprintf( $commenter_comment_creation_text_input_mu,
    $commenter_comment_creation_short_css.'-input-text',
    $commenter_comment_id_attr,
    'comment',
    $commenter_comment_term,
    $commenter_comment_term,
    ' '.'required'
);

$commenter_comment_creation_text_input_obj = htmlok( array(
    'name'      => $commenter_comment_creation_term.' '.'Text Input',
    'structure' => array(
        'type'      => 'object',
    ),
    'content'   => array(
        'object'    => $commenter_comment_creation_text_input_content,
    ),
) );

$commenter_comment_creation_cp = htmlok( array(
    'name'      => $commenter_comment_creation_term,
    'structure' => array(
        'type'          => 'component',
        'cn_structure'  => true,
    ),
    'root_css'  => 'felems',
    'css'       => $commenter_comment_creation_short_css,
    'content'   => array(
        'component' => array(
            $commenter_comment_creation_flabel_obj,
            $commenter_comment_creation_text_input_obj,
        ),
    ),
) );


// cancel_reply_link

$comment_reply_cancel_term = esc_html__( 'Cancel', 'applicator' );
$comment_reply_reply_term = esc_html__( 'Reply', 'applicator' );
$comment_reply_to_term = esc_html__( 'to', 'applicator' );
$comment_reply_comment_term = esc_html__( 'Comment', 'applicator' );

$comment_reply_cancel_action_mu = '';
$comment_reply_cancel_action_mu .= '<span class="a_l %5$s">';
    $comment_reply_cancel_action_mu .= '<span class="txt cancel---txt">';
        $comment_reply_cancel_action_mu .= '%1$s';
    $comment_reply_cancel_action_mu .= '</span>';
    $comment_reply_cancel_action_mu .= ' <span class="txt reply---txt">';
        $comment_reply_cancel_action_mu .= '%2$s';
    $comment_reply_cancel_action_mu .= '</span>';
    $comment_reply_cancel_action_mu .= ' <span class="txt to---txt">';
        $comment_reply_cancel_action_mu .= '%3$s';
    $comment_reply_cancel_action_mu .= '</span>';
    $comment_reply_cancel_action_mu .= ' <span class="txt comment---txt">';
        $comment_reply_cancel_action_mu .= '%4$s';
    $comment_reply_cancel_action_mu .= '</span>';
$comment_reply_cancel_action_mu .= '</span>';

$comment_reply_cancel_action_content = sprintf( $comment_reply_cancel_action_mu,
    $comment_reply_cancel_term,
    $comment_reply_reply_term,
    $comment_reply_to_term,
    $comment_reply_comment_term,
    'comment-reply-cancel-axn---a_l'
);



// title_reply_to - Text
$comment_recipient_note_txt = htmlok_txt( array(
    'content' => array(
        array(
            'txt' => esc_html__( 'Reply to', 'applicator' ),
        ),
        array(
            'txt' => '%s',
        ),
    ),
) );

// title_reply_to - Object
$comment_recipient_note_obj = htmlok_obj( array(
    'name'      => 'Comment Recipient Note',
    'elem'      => 'n',
    'css'       => 'com-recipient-note',
    'content'   => $comment_recipient_note_txt,
) );


// OB: Comment Form
ob_start();
comment_form( array(

    'id_form'                   => 'commentform',

    // Initial
    'title_reply_before'        => '',
    'title_reply_after'         => '',

    // Comment Creation Header
    'title_reply'               => $comment_creation_header,

    // Signed in as "Account Name"
    'logged_in_as'              => $signed_in_account_cp, 

    // Settings > Discussion
    'must_log_in'               => $sign_in_req_note_obj,

    // Textarea
    'comment_field'             => $commenter_comment_creation_cp,

    // Submit Comment Action
    'id_submit'                 => $commenter_comment_submit_css,
    'class_submit'              => 'b'.' '.$commenter_comment_submit_css,
    'label_submit'              => $commenter_comment_submit_term,


    // Reply
    'title_reply_to'            =>  $comment_recipient_note_obj,


    // Cancel Reply Action
    'cancel_reply_before'       => '',
    'cancel_reply_after'        => '',

    'cancel_reply_link'         => $comment_reply_cancel_action_content,

    // Notes
    'comment_notes_before'      => '',
    'comment_notes_after'       => '',

) );
$comment_form_ob_content = ob_get_contents();
ob_end_clean();


// E: Entry Module
$comment_module_cp = htmlok( array(
    'name'      => 'Comment',
    'structure' => array(
        'type'      => 'component',
        'subtype'   => 'module',
    ),
    'content'   => array(
        'component'     => array(
            $comments,
            $comment_form_ob_content,
        ),
    ),
    'echo'      => true,
) );