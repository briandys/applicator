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

// title_reply - Component Header
$comment_creation_header = htmlok_cp( array(
    'name'      => 'Comment Creation',
    'sub_type'  => 'hr',
    'css'       => 'com-crt-hr',
) );

// must_log_in - Text
$sign_in_required_note_txt = htmlok_txt( array(
    'content' => array(
        array(
            'txt' => esc_html__( 'Sign In', 'applicator' ),
        ),
        array(
            'sep' => $GLOBALS['space_sep'],
            'txt' => esc_html__( 'to comment.', 'applicator' ),
        ),
    ),
) );

// must_log_in - Object
$sign_in_req_note_obj = htmlok_obj( array(
    'name'      => 'Sign In Required Note',
    'elem'      => 'n',
    'obj_css'   => 'note',
    'css'       => 'sign-in-req-note',
    'content'   => $sign_in_required_note_txt,
) );

// logged_in_as - Text
$signed_in_as_label_txt = htmlok_txt( array(
    'content' => array(
        array(
            'txt'   => esc_html__( 'Signed in as', 'applicator' ),
        ),
    ),
) );

// logged_in_as - Object
$signed_in_as_label_obj = htmlok_obj( array(
    'name'      => 'Signed In As Label',
    'layout'    => 'i',
    'elem'      => 'g',
    'css'       => 'signed-in-as-lbl',
    'content'   => $signed_in_as_label_txt,
) );

// logged_in_as - Text
$signed_in_account_name_txt = htmlok_txt( array(
    'content' => array(
        array(
            'txt'   => $user_identity,
            'css'   => 'author-name',
        ),
    ),
) );

// logged_in_as - Object
$signed_in_account_name_obj = htmlok_obj( array(
    'name'      => 'Sign In Account Name',
    'layout'    => 'i',
    'elem'      => 'a',
    'attr'      => array(
        'href'  => admin_url( 'profile.php' ),
    ),
    'content'   => $signed_in_account_name_txt,
) );

// logged_in_as - Component
$signed_in_acct = htmlok_cp( array(
    'name'      => 'Signed In Account',
    'css'       => 'signed-in-acct',
    'content'   => $signed_in_as_label_obj . $signed_in_account_name_obj,
) );


//------------ Comment Author > Comment Creation

// Object
$comment_author_comment_creation_input_label_obj = htmlok_obj( array(
    'name'      => 'Comment Author Comment Creation Input Label',
    'elem'      => 'l',
    'css'       => 'com-author-com-crt-input',
    'content'   => '<label class="label com-author-com-crt-lbl-obj---label" for="comment"><span class="label_l com-author-name-crt-lbl-obj---label_l">Commentx</span></label>',
) );

// Object
$comment_author_comment_creation_input_obj = htmlok_obj( array(
    'name'      => 'Comment Author Comment Creation Input',
    'elem'      => 'l',
    'css'       => 'com-author-com-crt-input',
    'content'   => '<textarea id="comment" class="textarea input-text com-author-com-crt-inp-obj--input-text" name="comment" placeholder="Commentx" title="Comment" maxlength="65525" required></textarea>',
) );

// Component
$comment_author_comment_creation = htmlok_cp( array(
    'name'      => 'Comment Author Comment Creation',
    'cp_css'    => 'fs-item',
    'css'       => 'com-auth-com-crt',
    'content'   => $comment_author_comment_creation_input_label_obj . $comment_author_comment_creation_input_obj,
) );


// cancel_reply_link - Text
$cancel_reply_comment_action_txt = htmlok_txt( array(
    'content' => array(
        array(
            'txt' => esc_html__( 'Cancel', 'applicator' ),
        ),
        array(
            'txt' => esc_html__( 'Reply', 'applicator' ),
            'sep' => $GLOBALS['space_sep'],
        ),
        array(
            'txt' => esc_html__( 'to', 'applicator' ),
            'sep' => $GLOBALS['space_sep'],
        ),
        array(
            'txt' => esc_html__( 'Comment', 'applicator' ),
            'sep' => $GLOBALS['space_sep'],
        ),
    ),
) );

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

// cancel_reply_link - Object
$cancel_reply_comment_action_label_obj = htmlok_obj( array(
    'elem' => 'al',
    'css' => 'cancel-reply-com-axn',
    'content' => $cancel_reply_comment_action_txt,
) );

// Output Buffering for comment_form() because it only echoes
ob_start();
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
    'label_submit'              => esc_attr__( 'Submit', 'applicator' ),


    // Reply
    'title_reply_to'            =>  $comment_recipient_note_obj,


    // Cancel Reply Action
    'cancel_reply_before'       => '',
    'cancel_reply_after'        => '',

    'cancel_reply_link'         => $cancel_reply_comment_action_label_obj,

    // Notes
    'comment_notes_before'      => '',
    'comment_notes_after'       => '',

) );
$comment_form = ob_get_contents();
ob_end_clean();

$comment_md = htmlok_cp( array(
    'name'      => 'Comment',
    'type'      => 'module',
    'content'   => $comments . $comment_form,
) );

echo $comment_md;