<?php // Comment Form | comments.php

if ( ! function_exists( 'apl_func_comment_form' ) ) {
    function apl_func_comment_form( $fields ) {
        
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
            esc_html( 'Name', 'applicator' ),
            esc_attr( 'Name', 'applicator' )
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
            esc_html( 'Email Address', 'applicator' ),
            esc_attr( 'Email Address', 'applicator' )
        );
        
        
        // Comment Author Website URL Creation
        $fields['url'] = '<div class="cp fs-item comment-author-url-creation" data-name="Comment Author Website URL Creation">';
            $fields['url'] .= '<div class="cr com-author-url-crt---cr">';
                $fields['url'] .= '<div class="h com-author-url-crt---h"><span class="h_l com-author-url-crt---h_l">Comment Author Website URL Creation</span></div>';
                $fields['url'] .= '<div class="ct com-author-url-crt---ct">';
                    $fields['url'] .= '<div class="ct_cr com-author-url-crt---ct_cr">';

                        $fields['url'] .= '<span class="obj com-author-url-creation-label---obj" data-name="Comment Author Website URL Creation Label">';
                            $fields['url'] .= '<label class="label com-author-url-crt-lbl---label" for="com-author-url-crt-inp--input-text"><span class="label_l com-author-url-crt-lbl---label_l">%2$s</span></label>';
                        $fields['url'] .= '</span>';

                        $fields['url'] .= '<span class="obj com-author-url-creation-input---obj" data-name="Comment Author Website URL Creation Input">';
                            $fields['url'] .= '<span class="ee--input-text com-author-url-crt-inp---ee--input-text"><input id="com-author-url-crt-inp--input-text" class="input-text com-author-url-crt-inp--input-text" type="url" placeholder="%3$s" name="url" value="%1$s" size="64"></span>';
                        $fields['url'] .= '</span>';

                    $fields['url'] .= '</div>';
                $fields['url'] .= '</div>';
            $fields['url'] .= '</div>';
        $fields['url'] .= '</div>';

        $fields['url'] = sprintf( $fields['url'],
            esc_attr( $commenter['comment_author_url'] ),
            esc_html( 'Website URL', 'applicator' ),
            esc_attr( 'Website URL', 'applicator' )
        );
        
        return $fields;
    
    }
    add_filter( 'comment_form_default_fields', 'apl_func_comment_form' );
}