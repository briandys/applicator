<?php



$comment_reply_axn_a_l_mu = '';
$comment_reply_axn_a_l_mu .= '<span class="a_l comment-reply-axn---a_l">%1$s</span>';

$reply_to_comment_line_mu = '';
$reply_to_comment_line_mu .= '<span class="line reply-to-comment---line">';
    $reply_to_comment_line_mu .= '<span class="txt reply---txt">';
        $reply_to_comment_line_mu .= esc_html__( 'Reply', 'applicator' );
    $reply_to_comment_line_mu .= '</span>';
    $reply_to_comment_line_mu .= ' <span class="txt to---txt">';
        $reply_to_comment_line_mu .= esc_html__( 'to', 'applicator' );
    $reply_to_comment_line_mu .= '</span>';
    $reply_to_comment_line_mu .= ' <span class="txt comment---txt">';
        $reply_to_comment_line_mu .= esc_html__( 'Comment', 'applicator' );
    $reply_to_comment_line_mu .= '</span>';
$reply_to_comment_line_mu .= '</span>';

$sign_in_required_line_mu = '';
$sign_in_required_line_mu .= '<span class="line sign-in-required---line">';
    $sign_in_required_line_mu .= '<span class="txt requires---txt">';
        $sign_in_required_line_mu .= esc_html__( 'requires', 'applicator' );
    $sign_in_required_line_mu .= '</span>';
    $sign_in_required_line_mu .= ' <span class="txt sign---txt">';
        $sign_in_required_line_mu .= esc_html__( 'Sign', 'applicator' );
    $sign_in_required_line_mu .= '</span>';
    $sign_in_required_line_mu .= ' <span class="txt in---txt">';
        $sign_in_required_line_mu .= esc_html__( 'In', 'applicator' );
    $sign_in_required_line_mu .= '</span>';
$sign_in_required_line_mu .= '</span>';

$reply_text_content = sprintf( $comment_reply_axn_a_l_mu,
    $reply_to_comment_line_mu
);

$login_text_content = sprintf( $comment_reply_axn_a_l_mu,
    $reply_to_comment_line_mu.' '.$sign_in_required_line_mu
);

        
        
        // Commenter Email
        $website_term = esc_attr( 'Website', 'applicator' );
        $url_term = esc_attr( 'URL', 'applicator' );
        $website_url_term = esc_attr( 'Website URL', 'applicator' );
        $commenter_url_creation_term = 'Commenter URL Creation';
        $commenter_url_creation_css = 'commenter-url-crt';
        $commenter_url_creation_input_text_css = $commenter_url_creation_css.'-input-text';
        
        $commenter_url_creation_flabel_obj = htmlok( array(
            'name'      => $commenter_url_creation_term,
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'form label',
                'attr'      => array(
                    'elem'      => array(
                        'for'       => $commenter_url_creation_input_text_css,
                    ),
                ),
            ),
            'content'   => array(
                'object'    => array(
                    array(
                        'txt'   => $website_term,
                    ),
                    array(
                        'sep'   => $GLOBALS['space_sep'],
                        'txt'   => $url_term,
                    ),
                ),
            ),
        ) );

        $commenter_url_creation_text_input_content = sprintf( $text_input_mu,
            $commenter_url_creation_input_text_css,
            $commenter_url_creation_input_text_css,
            'url',
            'url',
            esc_attr( $commenter['comment_author_url'] ),
            '64',
            $website_url_term,
            $website_url_term,
            $aria_req
        );

        $commenter_name_creation_text_input_obj = htmlok( array(
            'name'      => $commenter_url_creation_term.' '.'Text Input',
            'structure' => array(
                'type'      => 'object',
                'ce'        => true,
            ),
            'content'   => array(
                'object'    => $commenter_url_creation_text_input_content,
            ),
        ) );
        
        $fields['url'] = htmlok( array(
            'name'      => $commenter_url_creation_term,
            'structure' => array(
                'type'      => 'component',
                'cn_structure'  => true,
            ),
            'root_css'  => 'felems',
            'css'       => $commenter_url_creation_css,
            'content'   => array(
                'component' => array(
                    $commenter_url_creation_flabel_obj,
                    $commenter_name_creation_text_input_obj,
                ),
            ),
        ) );