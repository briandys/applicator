<?php // Comment Form | comments.php

if ( ! function_exists( 'applicator_func_comment_form' ) ) {
    function applicator_func_comment_form( $fields ) {
        
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " required" : '' );    
        
        
        // Comment Author Name Creation
        $fields['author'] = '<div class="cp fs-item comment-author-name-creation" data-name="Comment Author Name Creation">';
            $fields['author'] .= '<div class="cr com-author-name-crt---cr">';
                $fields['author'] .= '<div class="h com-author-name-crt---h"><span class="h_l com-author-name-crt---h_l">Comment Author Name Creation</span></div>';
                $fields['author'] .= '<div class="ct com-author-name-crt---ct">';
                    $fields['author'] .= '<div class="ct_cr com-author-name-crt---ct_cr">';

                        $fields['author'] .= '<span class="obj com-author-name-creation-label---obj" data-name="Comment Author Name Creation Label">';
                            $fields['author'] .= '<label class="label com-author-name-crt-lbl---label" for="com-author-name-crt-inp--input-text"><span class="label_l com-author-name-crt-lbl---label_l">%3$s</span></label>';
                        $fields['author'] .= '</span>';

                        $fields['author'] .= ( $req ? '' : '' );

                        $fields['author'] .= '<span class="obj com-author-name-creation-input---obj" data-name="Comment Author Name Creation Input">';
                            $fields['author'] .= '<span class="ee--input-text com-author-name-crt-inp---ee--input-text"><input id="com-author-name-crt-inp--input-text" class="input-text com-author-name-crt-inp--input-text" type="text" placeholder="%4$s" name="author" value="%1$s" size="64" %2$s></span>';
                        $fields['author'] .= '</span>';

                    $fields['author'] .= '</div>';
                $fields['author'] .= '</div>';
            $fields['author'] .= '</div>';
        $fields['author'] .= '</div>';

        $fields['author'] = sprintf( $fields['author'],
            esc_attr( $commenter['comment_author'] ),
            $aria_req,
            esc_html( 'Name', $GLOBALS['applicator_td'] ),
            esc_attr( 'Name', $GLOBALS['applicator_td'] )
        );
        
        
        // Comment Author Email Creation
        $fields['email'] = '<div class="cp fs-item comment-author-email-creation" data-name="Comment Author Email Creation">';
            $fields['email'] .= '<div class="cr com-author-email-crt---cr">';
                $fields['email'] .= '<div class="h com-author-email-crt---h"><span class="h_l com-author-email-crt---h_l">Comment Author Email Creation</span></div>';
                $fields['email'] .= '<div class="ct com-author-email-crt---ct">';
                    $fields['email'] .= '<div class="ct_cr com-author-email-crt---ct_cr">';

                        $fields['email'] .= '<span class="obj com-author-email-creation-label---obj" data-name="Comment Author Email Creation Label">';
                            $fields['email'] .= '<label class="label com-author-email-crt-lbl---label" for="com-author-email-crt-inp--input-text"><span class="label_l com-author-email-crt-lbl---label_l">%3$s</span></label>';
                        $fields['email'] .= '</span>';

                        $fields['email'] .= ( $req ? '' : '' );

                        $fields['email'] .= '<span class="obj com-author-email-creation-input---obj" data-name="Comment Author Email Creation Input">';
                            $fields['email'] .= '<span class="ee--input-text com-author-email-crt-inp---ee--input-text"><input id="com-author-email-crt-inp--input-text" class="input-text com-author-email-crt-inp--input-text" type="email" placeholder="%4$s" name="email" value="%1$s" size="64" %2$s></span>';
                        $fields['email'] .= '</span>';

                    $fields['email'] .= '</div>';
                $fields['email'] .= '</div>';
            $fields['email'] .= '</div>';
        $fields['email'] .= '</div>';

        $fields['email'] = sprintf( $fields['email'],
            esc_attr( $commenter['comment_author_email'] ),
            $aria_req,
            esc_html( 'Email Address', $GLOBALS['applicator_td'] ),
            esc_attr( 'Email Address', $GLOBALS['applicator_td'] )
        );
        
        
        //------------ URL
        
        // Variables
        $form_element_input_text = 'input-text';
        $comment_author_url_input_text_id_css = 'com-author-url-crt-' . $form_element_input_text;
        $comment_author_url_input_text_label = esc_attr__( 'Website URL', $GLOBALS['applicator_td'] );
        
        // Text
        $comment_author_url_label_txt = htmlok_txt( array(
            'content'       => array(
                array(
                    'txt'   => $comment_author_url_input_text_label,
                ),
            ),
        ) );
        
        // Markup
        $comment_author_url_label_input_txt_mu = '<input id="%2$s" class="' . $form_element_input_text . ' %2$s" type="url" name="url" placeholder="%3$s" value="%1$s" size="64">';
        
        // Form Element
        $comment_author_url_label_input_txt = sprintf( $comment_author_url_label_input_txt_mu,
            esc_attr( $commenter['comment_author_url'] ), // value
            $comment_author_url_input_text_id_css, // id
            $comment_author_url_input_text_label // placeholder
        );
        
        // Label - Object
        $comment_author_url_label_obj = htmlok_obj_test( array(
            'name'      => 'Comment Author URL Creation',
            'type'      => 'form label',
            'css'       => 'com-author-url-crt',
            'attr'      => array(
                'for'   => $comment_author_url_input_text_id_css,
            ),
            'content'   => $comment_author_url_label_txt,
        ) );
        
        // Input - Object
        $comment_author_url_input_obj = htmlok_obj_test( array(
            'name'      => 'Comment Author URL Creation Input Text',
            'type'      => 'form element',
            'css'       => $comment_author_url_input_text_id_css,
            'content'   => $comment_author_url_label_input_txt,
        ) );
        
        // Component
        $fields['url'] = htmlok_cp( array(
            'name'      => 'Comment Author URL Creation',
            'type'      => 'fieldset item',
            'css'       => 'com-author-url-crt',
            'content'   => $comment_author_url_label_obj . $comment_author_url_input_obj,
        ) );
        
        return $fields;
    
    }
    add_filter( 'comment_form_default_fields', 'applicator_func_comment_form' );
}