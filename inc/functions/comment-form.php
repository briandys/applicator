<?php // Comment Form | comments.php

if ( ! function_exists( 'applicator_comment_form' ) ) {
    function applicator_comment_form( $fields ){
        
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " required" : '' );    
        
        
        // Commenter Name Creation
        $fields['author'] = '<div class="cp fs-item commenter-name-creation" data-name="Commenter Name Creation">';
            $fields['author'] .= '<div class="cr commenter-name-crt---cr">';
                $fields['author'] .= '<div class="h commenter-name-crt---h"><span class="h_l commenter-name-crt---h_l">Commenter Name Creation</span></div>';
                $fields['author'] .= '<div class="ct commenter-name-crt---ct">';
                    $fields['author'] .= '<div class="ct_cr commenter-name-crt---ct_cr">';

                        $fields['author'] .= '<span class="obj commenter-name-creation-label---obj" data-name="Commenter Name Creation Label">';
                            $fields['author'] .= '<label class="label commenter-name-crt-lbl---label" for="commenter-name-crt-inp--input-text"><span class="label_l commenter-name-crt-lbl---label_l">%3$s</span></label>';
                        $fields['author'] .= '</span>';

                        $fields['author'] .= ( $req ? '' : '' );

                        $fields['author'] .= '<span class="obj commenter-name-creation-input---obj" data-name="Commenter Name Creation Input">';
                            $fields['author'] .= '<span class="ee--input-text commenter-name-crt-inp---ee--input-text"><input id="commenter-name-crt-inp--input-text" class="input-text commenter-name-crt-inp--input-text" type="text" placeholder="%4$s" name="author" value="%1$s" size="64" %2$s></span>';
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
        
        
        // Commenter Email Creation
        $fields['email'] = '<div class="cp fs-item commenter-email-creation" data-name="Commenter Email Creation">';
            $fields['email'] .= '<div class="cr commenter-email-crt---cr">';
                $fields['email'] .= '<div class="h commenter-email-crt---h"><span class="h_l commenter-email-crt---h_l">Commenter Email Creation</span></div>';
                $fields['email'] .= '<div class="ct commenter-email-crt---ct">';
                    $fields['email'] .= '<div class="ct_cr commenter-email-crt---ct_cr">';

                        $fields['email'] .= '<span class="obj commenter-email-creation-label---obj" data-name="Commenter Email Creation Label">';
                            $fields['email'] .= '<label class="label commenter-email-crt-lbl---label" for="commenter-email-crt-inp--input-text"><span class="label_l commenter-email-crt-lbl---label_l">%3$s</span></label>';
                        $fields['email'] .= '</span>';

                        $fields['email'] .= ( $req ? '' : '' );

                        $fields['email'] .= '<span class="obj commenter-email-creation-input---obj" data-name="Commenter Email Creation Input">';
                            $fields['email'] .= '<span class="ee--input-text commenter-email-crt-inp---ee--input-text"><input id="commenter-email-crt-inp--input-text" class="input-text commenter-email-crt-inp--input-text" type="email" placeholder="%4$s" name="email" value="%1$s" size="64" %2$s></span>';
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
        
        
        // Commenter Website URL Creation
        $fields['url'] = '<div class="cp fs-item commenter-url-creation" data-name="Commenter Website URL Creation">';
            $fields['url'] .= '<div class="cr commenter-url-crt---cr">';
                $fields['url'] .= '<div class="h commenter-url-crt---h"><span class="h_l commenter-url-crt---h_l">Commenter Website URL Creation</span></div>';
                $fields['url'] .= '<div class="ct commenter-url-crt---ct">';
                    $fields['url'] .= '<div class="ct_cr commenter-url-crt---ct_cr">';

                        $fields['url'] .= '<span class="obj commenter-url-creation-label---obj" data-name="Commenter Website URL Creation Label">';
                            $fields['url'] .= '<label class="label commenter-url-crt-lbl---label" for="commenter-url-crt-inp--input-text"><span class="label_l commenter-url-crt-lbl---label_l">%2$s</span></label>';
                        $fields['url'] .= '</span>';

                        $fields['url'] .= '<span class="obj commenter-url-creation-input---obj" data-name="Commenter Website URL Creation Input">';
                            $fields['url'] .= '<span class="ee--input-text commenter-url-crt-inp---ee--input-text"><input id="commenter-url-crt-inp--input-text" class="input-text commenter-url-crt-inp--input-text" type="url" placeholder="%3$s" name="url" value="%1$s" size="64"></span>';
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
    add_filter( 'comment_form_default_fields', 'applicator_comment_form' );
}