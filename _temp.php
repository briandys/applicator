<?php // Status: Enabled
if ( comments_open() ) {

    // Add Comment Action Anchor
    if ( is_singular() ) {
        if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {
            $add_com_axn_anchor = '#respond';
        } else {
            $add_com_axn_anchor = '#comment';
        }
    } else {
        if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {
            $add_com_axn_anchor = esc_url( get_permalink() ) . '#respond';
        } else {
            $add_com_axn_anchor = esc_url( get_permalink() ) . '#comment';
        }
    }

    // Markup
    $add_com_axn_mu = '<div class="obj axn %2$s" title="%9$s" data-name="%1$s">';
        $add_com_axn_mu .= '<a class="a %3$s---a" href="%8$s"><span class="a_l %3$s---a_l">';
            $add_com_axn_mu .= '<span class="txt %5$s---txt">%4$s</span>';
            $add_com_axn_mu .= ' <span class="txt %7$s---txt">%6$s</span>';
        $add_com_axn_mu .= '</span></a>';
    $add_com_axn_mu .= '</div><!-- %1$s -->';

    // Markup
    $req_sign_in_lbl_obj_mu = ' <span class="obj note %2$s" data-name="%1$s">';
        $req_sign_in_lbl_obj_mu .= '<span class="g %3$s---g"><span class="g_l %3$s---g_l">';
            $req_sign_in_lbl_obj_mu .= '%4$s';
        $req_sign_in_lbl_obj_mu .= '</span></span>';
    $req_sign_in_lbl_obj_mu .= '</span><!-- %1$s -->';

    // Content
    $add_com_axn = sprintf( $add_com_axn_mu,
        'Add Comment Action',
        'add-comment-axn',
        'add-com-axn',
        esc_html__( 'Add', $GLOBALS['apl_textdomain'] ),
        'add',
        esc_html__( 'Comment', $GLOBALS['apl_textdomain'] ),
        'comment',
        $add_com_axn_anchor,
        esc_attr__( 'Add Comment', $GLOBALS['apl_textdomain'] )
    );

    if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {
        
        // Content
        $req_sign_in_lbl_obj = sprintf( $req_sign_in_lbl_obj_mu,
            'Requires Sign In Label Object',
            'requires-sign-in-label-obj',
            'req-sign-in-lbl-obj',
            esc_html__( '(requires Sign In)', $GLOBALS['apl_textdomain'] )
        );
    } else {
        $req_sign_in_lbl_obj = '';
    }
    
    printf( $add_com_axn . $req_sign_in_lbl_obj );

// Status: Disabled
} else {

    // Markup
    $commenting_disabled_note_mu = '<div class="obj note %2$s" data-name="%1$s">';
        $commenting_disabled_note_mu .= '<div class="g %3$s---g">';
            $commenting_disabled_note_mu .= '<div class="g_l %3$s---g_l">';
                $commenting_disabled_note_mu .= '%4$s';
            $commenting_disabled_note_mu .= '</div>';
        $commenting_disabled_note_mu .= '</div>';
    $commenting_disabled_note_mu .= '</div><!-- %1$s -->';

    // Display
    printf( $commenting_disabled_note_mu,
        'Commenting Disabled Note',
        'commenting-disabled-note',
        'commenting-disabled-note',
        '<p>' . esc_html__( 'Commenting is disabled.', $GLOBALS['apl_textdomain'] ) . '</p>'
    );
}