<?php

/**
 * Comments
 *
 * @package WordPress
 * @subpackage Applicator
 * @since 1.0
 */





if ( post_password_required() )
{
	return;
}
        

$comments_content = '';


if ( have_comments() )
{   
    $comments_nav_content = applicator_comments_nav();

    $comments_content = '<ul class="grp comments---grp">';
    $comments_content .= wp_list_comments( array(
        'style'         => 'ul',
        'avatar_size'   => 48,
        'callback'      => 'applicator_comment',
        'echo'          => false,
    ) );
    $comments_content .= '</ul>';
}

else
{   
    $comments_nav_content = '';
    
    $comments_empty_note_obj = applicator_htmlok( array(
        'name'      => 'Comments Empty',
        'structure' => array(
            'type'      => 'object',
            'subtype'   => 'note',
        ),
        'content'   => array(
            'object'    => '<p>' . esc_html__( 'There are no comments.', 'applicator' ) . '</p>',
        ),
    ) );

    $comments_content = $comments_empty_note_obj;
}


$comments_heading_obj = applicator_htmlok( array(
    'name'      => 'Comments',
    'structure' => array(
        'type'      => 'object',
        'subtype'   => 'heading',
    ),
    'content'   => array(
        'object'        => array(
            array(
                'txt'       => esc_html__( 'Comments', 'applicator' ),
            ),
        ),
    ),
) );


$comments_header_aside_cn = applicator_htmlok( array(
    'name'          => 'Comments Header',
    'structure'     => array(
        'type'          => 'constructor',
        'subtype'       => 'aside',
    ),
    'id'            => 'comments-header-aside',
    'content'           => array(
        'constructor'         => applicator_comments_actions_snippet(),
    ),
) );


$comments_cp = applicator_htmlok( array(
    'name'          => 'Comments',
    'structure'     => array(
        'type'          => 'component',
    ),
    'hr_content'    => array(
        $comments_heading_obj,
        $comments_nav_content,
        $comments_header_aside_cn,
    ),
    'id'            => 'comments',
    'root_css'      => 'comments-area',
    'content'           => array(
        'component'         => $comments_content,
    ),
    'fr_content'    => $comments_nav_content,
) );





/**
 * inc > functions > comment-form.php
 */


// title_reply
$comment_creation_header_mu = '';
$comment_creation_term = 'Comment Creation';

$comment_creation_header_mu .= '<div class="obj %2$s-heading" data-name="Comment Creation Heading OBJ">';
    $comment_creation_header_mu .= '<div class="h %3$s---h">';
        $comment_creation_header_mu .= '<span class="h_l %3$s---h_l">';
            $comment_creation_header_mu .= '<span class="l %3$s---l">';
                $comment_creation_header_mu .= '%1$s';
            $comment_creation_header_mu .= '</span>';
        $comment_creation_header_mu .= '</span>';
    $comment_creation_header_mu .= '</div>';
$comment_creation_header_mu .= '</div>';


$comment_creation_header = sprintf( $comment_creation_header_mu,
    esc_html__( $comment_creation_term, 'applicator' ),
    sanitize_title( $comment_creation_term ),
    'comment-creation-heading'
);


// Comment Creation Label
$comment_creation_label_obj = applicator_htmlok( array(
    'name'      => 'Comment Creation',
    'structure' => array(
        'type'      => 'object',
        'subtype'   => 'generic label',
    ),
    'content'   => array(
        'object'    => array(
            array(
                'txt'   => esc_html__( 'Compose', 'applicator' ),
            ),
            array(
                'sep'   => ' ',
                'txt'   => esc_html__( 'Comment', 'applicator' ),
            ),
        ),
    ),
) );


// logged_in_as
$signed_in_as_term = esc_html__( 'Signed in as', 'applicator' );
$signed_in_account_content = $user_identity;
$signed_in_as_account_content = $signed_in_as_term. ' '. $signed_in_account_content;

$signed_in_account_label_obj = applicator_htmlok( array(
    'name'      => 'Signed In Account',
    'structure' => array(
        'type'      => 'object',
        'subtype'   => 'generic label',
        'layout'    => 'inline',
    ),
    'content'   => array(
        'object'    => $signed_in_as_term,
        'after'     => ' ',
    ),
) );

$signed_in_account_name_obj = applicator_htmlok( array(
    'name'      => 'Signed In Account Name',
    'structure' => array(
        'type'      => 'object',
        'linked'    => true,
        'attr'      => array(
            'a'         => array(
                'href'      => admin_url( 'profile.php' ),
                'title'     => $signed_in_as_account_content,
            ),
        ),
        'layout'    => 'inline',
    ),
    'content'   => array(
        'object' => $signed_in_account_content,
    ),
) );

$account_log_out_axn_obj = applicator_htmlok( array(
    'name'      => 'Account Log Out',
    'structure' => array(
        'type'      => 'object',
        'subtype'   => 'action item',
        'linked'    => true,
        'attr'      => array(
            'a'         => array(
                'href'      => wp_logout_url( get_permalink() ),
            ),
        ),
    ),
    'content'   => array(
        'object'    => array(
            array(
                'txt'   => esc_html__( 'Log Out', 'applicator' ),
            ),
        ),
    ),
) );

$signed_in_account_cp = applicator_htmlok( array(
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
    'fr_content'=> $account_log_out_axn_obj,
) );


// must_log_in
$sign_in_req_note_content = '<p><a href="'. esc_url( wp_login_url( get_permalink() ) ). '">'. esc_html__( 'Sign in', 'applicator' ). '</a> '. esc_html__( 'to comment.', 'applicator' ). '</p>';

$sign_in_req_note_obj = applicator_htmlok( array(
    'name'      => 'Sign In Required',
    'structure' => array(
        'type'      => 'object',
        'subtype'   => 'note',
    ),
    'css'       => 'sign-in-req',
    'content'   => array(
        'object'    => $sign_in_req_note_content,
    ),
) );


/**
 * Comment Author > Comment Creation
 */

// comment_field
$commenter_comment_creation_term = 'Commenter Comment Creation';
$commenter_comment_creation_short_css = 'commenter-com-crt';
$commenter_comment_id_attr = 'comment';
$commenter_comment_term = esc_html__( 'Comment', 'applicator' );
$commenter_comment_submit_css = 'comment-form-submit-axn---b';
$commenter_comment_submit_term = esc_attr__( 'Submit', 'applicator' );

$commenter_comment_creation_flabel_obj = applicator_htmlok( array(
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
$commenter_comment_creation_text_input_mu .= '<div class="ce %1$s---ce">';
$commenter_comment_creation_text_input_mu .= '<textarea id="%2$s" class="textarea input-text input-text--textarea %1$s" name="%3$s" placeholder="%4$s" title="%5$s" maxlength="%7$s"%6$s></textarea>';
$commenter_comment_creation_text_input_mu .= '</div>';

$commenter_comment_creation_text_input_content = sprintf( $commenter_comment_creation_text_input_mu,
    $commenter_comment_creation_short_css.'-input-text',
    $commenter_comment_id_attr,
    'comment',
    $commenter_comment_term,
    $commenter_comment_term,
    ' '.'required',
    '65525'
);

$commenter_comment_creation_text_input_obj = applicator_htmlok( array(
    'name'      => $commenter_comment_creation_term.' '.'Text Input',
    'structure' => array(
        'type'      => 'object',
        'subtype'   => 'form element',
        'ce'        => true,
    ),
    'css'       => $commenter_comment_creation_short_css.'-text-input',
    'content'   => array(
        'object'    => $commenter_comment_creation_text_input_content,
    ),
) );

$commenter_comment_creation_cp = applicator_htmlok( array(
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
$comment_reply_cancel_action_mu .= '<span class="a_l %5$s---a_l">';
    $comment_reply_cancel_action_mu .= '<span class="l %5$s---l">';
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
$comment_reply_cancel_action_mu .= '</span>';

$comment_reply_cancel_action_content = sprintf( $comment_reply_cancel_action_mu,
    $comment_reply_cancel_term,
    $comment_reply_reply_term,
    $comment_reply_to_term,
    $comment_reply_comment_term,
    'comment-reply-cancel-axn'
);


// title_reply_to
$comment_recipient_note_obj = applicator_htmlok( array(
    'name'      => 'Comment Recipient',
    'structure' => array(
        'type'      => 'object',
        'subtype'   => 'note',
    ),
    'content'   => array(
        'object'    => array(
            array(
                'txt' => esc_html__( 'Reply to', 'applicator' ),
            ),
            array(
                'txt' => '%s',
            ),
        ),
    ),
) );


/**
 * Comment Form
 */

ob_start();
comment_form( array(

    'id_form'                   => 'commentform',

    // Initial
    'title_reply_before'        => '',
    'title_reply_after'         => '',

    // Comment Creation Header
    'title_reply'               => $comment_creation_header. $comment_creation_label_obj,

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
$comment_form_ob_content = ob_get_clean();


$comment_module_cp = applicator_htmlok( array(
    'name'      => 'Comment',
    'structure' => array(
        'type'      => 'component',
        'subtype'   => 'module',
    ),
    'id'        => 'comment-md',
    'content'   => array(
        'component'     => array(
            $comments_cp,
            $comment_form_ob_content,
        ),
    ),
    'echo'      => true,
) );