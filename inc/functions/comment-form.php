<?php
// Comment Form Fields

if ( ! function_exists( 'applicator_comment_form_fields' ) ) :
    function applicator_comment_form_fields( $fields ){
        
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " required" : '' );    
        
        // Commenter Name
        $fields['author'] = '<div class="fs-item commenter-name--fs-item">';
            $fields['author'] .= '<div class="commenter-name--fs-item--cr">';
                $fields['author'] .= '<label class="label commenter-name--label" for="commenter-name--input--text">';
                    $fields['author'] .= '<span class="label-l">%1$s</span>';
                $fields['author'] .= '</label>';
                $fields['author'] .= ( $req ? '' : '' );
                $fields['author'] .= '<div class="input-text commenter-name--input-text">';
                    $fields['author'] .= '<input id="commenter-name--input--text" class="input input--text commenter-name--input--text" type="text" placeholder="%2$s" name="author" title="%2$s" value="%3$s" size="32" %4$s>';
                $fields['author'] .= '</div>';
            $fields['author'] .= '</div>';
        $fields['author'] .= '</div>';
        
        $fields['author'] = sprintf( $fields['author'],
            esc_html( 'Name', 'applicator' ),
            esc_attr( 'Name', 'applicator' ),
            esc_attr( $commenter['comment_author'] ),
            $aria_req
        );
        
        // Commenter Email
        $fields['email'] = '<div class="fs-item commenter-email--fs-item">';
            $fields['email'] .= '<div class="commenter-email--fs-item--cr">';
                $fields['email'] .= '<label class="label commenter-email--label" for="commenter-email--input--text">';
                    $fields['email'] .= '<span class="label-l">%1$s</span>';
                $fields['email'] .= '</label>';
                $fields['email'] .= ( $req ? '' : '' );
                $fields['email'] .= '<div class="input-text commenter-email--input-text">';
                    $fields['email'] .= '<input id="commenter-email--input--text" class="input input--text commenter-email--input--text" type="email" placeholder="%2$s" name="email" title="%2$s" value="%3$s" size="32" %4$s>';
                $fields['email'] .= '</div>';
            $fields['email'] .= '</div>';
        $fields['email'] .= '</div>';
        
        $fields['email'] = sprintf( $fields['email'],
            esc_html( 'Email Address', 'applicator' ),
            esc_attr( 'Email Address', 'applicator' ),
            esc_attr( $commenter['comment_author_email'] ),
            $aria_req
        );
        
        // Commenter URL
        $fields['url'] = '<div class="fs-item commenter-url--fs-item">';
            $fields['url'] .= '<div class="commenter-url--fs-item--cr">';
                $fields['url'] .= '<label class="label commenter-url--label" for="commenter-url--input--text">';
                    $fields['url'] .= '<span class="commenter-url--label--subj-l">%1$s</span>';
                    $fields['url'] .= ' <span class="commenter-url--label--note-l">%2$s</span>';
                $fields['url'] .= '</label>';
                $fields['url'] .= '<div class="input-text commenter-url--input-text">';
                    $fields['url'] .= '<input id="commenter-url--input--text" class="input input--text commenter-url--input--text" type="url" placeholder="%3$s" name="url" title="%4$s" value="%4$s" size="64">';
                $fields['url'] .= '</div>';
            $fields['url'] .= '</div>';
        $fields['url'] .= '</div>';
        
        $fields['url'] = sprintf( $fields['url'],
            esc_html( 'Website', 'applicator' ),
            esc_html( '(optional)', 'applicator' ),
            esc_attr( 'Website', 'applicator' ),
            esc_url( $commenter['comment_author_url'] )
        );
        
        return $fields;
    }
    add_filter( 'comment_form_default_fields', 'applicator_comment_form_fields' );

endif;