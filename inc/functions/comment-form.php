<?php // Comment Form | comments.php


if ( ! function_exists( 'applicator_comment_form' ) ) {
    function applicator_comment_form( $fields ) {
        
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? ' required' : '' ); 
        
        /*
        1: Class
        2: ID
        3: Type
        4: Name
        5: Value
        6: Size
        7: Placeholder
        8: Title
        9: Required
        */
        $text_input_mu = '';
        $text_input_mu .= '<span class="ce %2$s---ce">';
        $text_input_mu .= '<input id="%1$s" class="input-text %2$s" type="%3$s" name="%4$s" value="%5$s" size="%6$s" placeholder="%7$s" title="%8$s"%9$s>';
        $text_input_mu .= '</span>';
        
        
        $optional_line_array = array(
            'line'  => array(
                array(
                    'css'   => 'note---line',
                    array(
                        'sep'   => $GLOBALS['space_sep'],
                        'txt'   => '(',
                        'css'   => 'open-parenthesis---txt',
                    ),
                    array(
                        'txt'   => esc_html__( 'optional', 'applicator' ),
                    ),
                    array(
                        'txt'   => ')',
                        'css'   => 'close-parenthesis---txt',
                    ),
                ),
            ),
        );
        
        $optional_line_content = ( $req ? '' : $optional_line_array );
        
        // Commenter Name
        $name_term = esc_attr( 'Name', 'applicator' );
        $commenter_name_creation_term = 'Commenter Name Creation';
        $commenter_name_creation_css = 'commenter-name-crt';
        $commenter_name_creation_input_text_css = $commenter_name_creation_css.'-input-text';
        
        $commenter_name_creation_flabel_obj = applicator_htmlok( array(
            'name'      => $commenter_name_creation_term,
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'form label',
                'attr'      => array(
                    'elem'      => array(
                        'for'       => $commenter_name_creation_input_text_css,
                    ),
                ),
            ),
            'content'   => array(
                'object'    => array(
                    array(
                        'line'  => array(
                            array(
                                'css'   => 'flabel---line',
                                array(
                                    'txt'   => $name_term,
                                ),
                            ),
                        ),
                    ),
                    $optional_line_content,
                ),
            ),
        ) );

        $commenter_name_creation_text_input_content = sprintf( $text_input_mu,
            $commenter_name_creation_input_text_css,
            $commenter_name_creation_input_text_css,
            'text',
            'author',
            $commenter['comment_author'],
            '64',
            $name_term,
            $name_term,
            $aria_req
        );

        $commenter_name_creation_text_input_obj = applicator_htmlok( array(
            'name'      => $commenter_name_creation_term.' '.'Text Input',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'form element',
                'ce'        => true,
            ),
            'content'   => array(
                'object'    => $commenter_name_creation_text_input_content,
            ),
        ) );
        
        $fields['author'] = applicator_htmlok( array(
            'name'      => $commenter_name_creation_term,
            'structure' => array(
                'type'      => 'component',
                'cn_structure'  => true,
            ),
            'root_css'  => 'felems',
            'css'       => $commenter_name_creation_css,
            'content'   => array(
                'component' => array(
                    $commenter_name_creation_flabel_obj,
                    $commenter_name_creation_text_input_obj,
                ),
            ),
        ) );
        
        
        // Commenter Email
        $email_term = esc_attr( 'Email', 'applicator' );
        $address_term = esc_attr( 'Address', 'applicator' );
        $email_address_term = esc_attr( 'Email Address', 'applicator' );
        $commenter_email_creation_term = 'Commenter Email Creation';
        $commenter_email_creation_css = 'commenter-email-crt';
        $commenter_email_creation_input_text_css = $commenter_email_creation_css.'-input-text';
        
        $commenter_email_creation_flabel_obj = applicator_htmlok( array(
            'name'      => $commenter_email_creation_term,
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'form label',
                'attr'      => array(
                    'elem'      => array(
                        'for'       => $commenter_email_creation_input_text_css,
                    ),
                ),
            ),
            'content'   => array(
                'object'    => array(
                    array(
                        'line'  => array(
                            array(
                                'css'   => 'flabel---line',
                                array(
                                    'txt'   => $email_term,
                                ),
                                array(
                                    'sep'   => $GLOBALS['space_sep'],
                                    'txt'   => $address_term,
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ) );

        $commenter_email_creation_text_input_content = sprintf( $text_input_mu,
            $commenter_email_creation_input_text_css,
            $commenter_email_creation_input_text_css,
            'email',
            'email',
            esc_attr( $commenter['comment_author_email'] ),
            '64',
            $email_address_term,
            $email_term,
            ' '.'required'
        );

        $commenter_name_creation_text_input_obj = applicator_htmlok( array(
            'name'      => $commenter_email_creation_term.' '.'Text Input',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'form element',
                'ce'        => true,
            ),
            'content'   => array(
                'object'    => $commenter_email_creation_text_input_content,
            ),
        ) );
        
        $fields['email'] = applicator_htmlok( array(
            'name'      => $commenter_email_creation_term,
            'structure' => array(
                'type'      => 'component',
                'cn_structure'  => true,
            ),
            'root_css'  => 'felems',
            'css'       => $commenter_email_creation_css,
            'content'   => array(
                'component' => array(
                    $commenter_email_creation_flabel_obj,
                    $commenter_name_creation_text_input_obj,
                ),
            ),
        ) );
        
        
        // Commenter URL
        $website_term = esc_attr( 'Website', 'applicator' );
        $url_term = esc_attr( 'URL', 'applicator' );
        $website_url_term = esc_attr( 'Website URL', 'applicator' );
        $commenter_url_creation_term = 'Commenter URL Creation';
        $commenter_url_creation_css = 'commenter-url-crt';
        $commenter_url_creation_input_text_css = $commenter_url_creation_css.'-input-text';
        
        $commenter_url_creation_flabel_obj = applicator_htmlok( array(
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
                        'line'  => array(
                            array(
                                'css'   => 'flabel---line',
                                array(
                                    'txt'   => $website_term,
                                ),
                                array(
                                    'sep'   => $GLOBALS['space_sep'],
                                    'txt'   => $url_term,
                                ),
                            ),
                        ),
                    ),
                    $optional_line_array,
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
            '',
            ''
        );

        $commenter_name_creation_text_input_obj = applicator_htmlok( array(
            'name'      => $commenter_url_creation_term.' '.'Text Input',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'form element',
                'ce'        => true,
            ),
            'content'   => array(
                'object'    => $commenter_url_creation_text_input_content,
            ),
        ) );
        
        $fields['url'] = applicator_htmlok( array(
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
        
        
        return $fields;
    
    }
    add_filter( 'comment_form_default_fields', 'applicator_comment_form' );
}