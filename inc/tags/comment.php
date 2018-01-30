<?php // Comment Item
// comments.php

if ( ! function_exists( 'applicator_comment' ) ) {
    
    function applicator_comment( $comment, $args, $depth ) {
        
        $commenter = wp_get_current_commenter();
        
        if ( 'div' === $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'comment';
        }
        
        if ( true === $args['has_children'] ) {
            $comment_has_children_css = 'comment--parent';
        } else {
            $comment_has_children_css = 'comment--solo';
        }

        ?>

        <<?php echo $tag ?> id="comment-<?php comment_ID() ?>" <?php comment_class( 'item cp comment' . ' ' . $comment_has_children_css ) ?> data-name="Comment">
            
        <?php if ( 'div' != $args['style'] ) { ?>
            <article class="article cr comment---cr">
        <?php } ?>
                
                <div class="hr comment---hr">
                    <div class="hr_cr comment---hr_cr">
                        
        <?php

        // E: Comment Title
        $comment_title_obj = applicator_htmlok( array(
            'name'      => 'Comment Title',
            'structure' => array(
                'type'      => 'object',
                'elem'      => 'h2',
                'linked'    => true,
                'attr'      => array(
                    'a'         => array(
                        'href'      => get_comment_link( $comment->comment_ID ),
                        'rel'       => 'bookmark',
                        'title'     => esc_html__( 'Comment', 'applicator' ).' '.get_comment_ID(),
                    ),
                ),
            ),
            'content'   => array(
                'object'        => array(
                    array(
                        'txt'       => esc_html__( 'Comment', 'applicator' ),
                    ),
                    array(
                        'sep'       => $GLOBALS['applicator_space_sep'],
                        'txt'       => get_comment_ID(),
                    ),
                ),
            ),
            'echo'      => true,
        ) );

        // Comment Actions
        // tags > entry-actions.php
        applicator_comment_actions();
        
        
        // Comment Published
        $comment_published_term = esc_html__( 'Comment Published', 'applicator' );
        $on_term = esc_html__( 'on', 'applicator' );
        $comment_date_content = get_comment_date( 'j F Y');
        $comment_time_content = get_comment_time( 'H:i:s');
        $comment_published_on_content = $comment_published_term.' '.$on_term.' '.$comment_date_content.', '.$comment_time_content;
        
        
        // R: Comment Published Label
        $comment_published_label_obj = applicator_htmlok( array(
            'name'      => 'Published Comment',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'generic label',
            ),
            'css'       => 'comment-pub',
            'content'   => array(
                'object' => array(
                    array(
                        'txt'   => $comment_published_term,
                    ),
                    array(
                        'sep' => $GLOBALS['applicator_space_sep'],
                        'txt'   => $on_term,
                    ),
                ),
            ),
        ) );
        
        
        // R: Comment Published Date Stamp
        $comment_published_date_stamp_obj = applicator_htmlok( array(
            'name'      => 'Comment Published Date Stamp',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'time',
                'attr'      => array(
                    'elem'      => array(
                        'datetime'  => get_comment_date( DATE_W3C ),
                    ),
                    'a'         => array(
                        'href'      => get_comment_link( $comment->comment_ID ),
                    ),
                ),
                'linked'    => true,
                'layout'    => 'inline',
            ),
            'css'       => 'comment-pub-d-stamp',
            'title'     => $comment_published_on_content,
            'content'   => array(
                'object' => array(
                    array(
                        'txt' => get_comment_date( 'j' ),
                        'css' => 'day',
                    ),
                    array(
                        'sep' => $GLOBALS['applicator_space_sep'],
                        'txt' => get_comment_date( 'M' ),
                        'css' => 'month',
                    ),
                    array(
                        'sep' => $GLOBALS['applicator_space_sep'],
                        'txt' => get_comment_date( 'Y' ),
                        'css' => 'year',
                    ),
                ),
            ),
        ) );
        
        
        // R: Comment Published Time Stamp
        $comment_published_time_stamp_obj = applicator_htmlok( array(
            'name'      => 'Comment Published Time Stamp',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'time',
                'attr'      => array(
                    'elem'      => array(
                        'datetime'  => get_comment_time( DATE_W3C ),
                    ),
                    'a'         => array(
                        'href'      => get_comment_link( $comment->comment_ID ),
                    ),
                ),
                'linked'    => true,
                'layout'    => 'inline',
            ),
            'css'       => 'comment-pub-t-stamp',
            'title'     => $comment_published_on_content,
            'content'   => array(
                'object' => array(
                    array(
                        'txt' => get_comment_time( 'H' ),
                        'css' => 'hours',
                    ),
                    array(
                        'sep' => $GLOBALS['applicator_colon_sep'],
                        'txt' => get_comment_time( 'i' ),
                        'css' => 'minutes',
                    ),
                    array(
                        'sep' => $GLOBALS['applicator_colon_sep'],
                        'txt' => get_comment_time( 's' ),
                        'css' => 'seconds',
                    ),
                ),
                'before'    => $GLOBALS['applicator_comma_sep'],
            ),
        ) );
        
        
        // R: Comment Published Date and Time Stamp
        $comment_published_date_time_stamp_cp = applicator_htmlok( array(
            'name'      => 'Comment Published Date and Time Stamp',
            'structure' => array(
                'type'      => 'component',
            ),
            'css'       => 'comment-pub-d-t-stamp',
            'content'   => array(
                'component' => array(
                    $comment_published_date_stamp_obj,
                    $comment_published_time_stamp_obj,
                ),
            ),
        ) );
        
        
        // R: Comment Published
        $comment_published_cp = applicator_htmlok( array(
            'name'      => 'Comment Published',
            'structure' => array(
                'type'      => 'component',
            ),
            'css'       => 'comment-pub',
            'content'   => array(
                'component' => array(
                    $comment_published_label_obj,
                    $comment_published_date_time_stamp_cp,
                ),
            ),
        ) );
        
        
        // Commenter
        $comment_by_term = esc_html__( 'Comment by', 'applicator' );
        $comment_term = esc_html__( 'Comment', 'applicator' );
        $by_term = esc_html__( 'by', 'applicator' );
        $comment_author = get_comment_author();
        $commented_by_content = $comment_by_term.' '.$comment_author;
        
        // Conditionals: Blank or Custom Avatar
        $commenter_avatar_prefix_css = 'commenter-avatar-default';
        
        if ( get_option( 'avatar_default' ) == 'blank' ) {
            $commenter_avatar_type_css = $commenter_avatar_prefix_css . '--blank';
        } else {
            $commenter_avatar_type_css = $commenter_avatar_prefix_css . '--custom';
        }

        // Commenter
        $commenter_published_label_obj = applicator_htmlok( array(
            'name'      => 'Published Commenter',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'generic label',
            ),
            'content'   => array(
                'object'    => array(
                    array(
                        'txt'   => $comment_term,
                    ),
                    array(
                        'sep'   => $GLOBALS['applicator_space_sep'],
                        'txt'   => $by_term,
                    ),
                ),
                'after'     => $GLOBALS['applicator_space_sep'],
            ),
        ) );

        ob_start();
        get_comment_author_url();
        $get_comment_author_url_ob_content = ob_get_clean();

        // Commenter URL
        if ( get_comment_author_url() ) {
            $commenter_url = get_comment_author_url();
        } else {
            $commenter_url = get_comment_link( $comment->comment_ID );
        }
        
        // Commenter Name
        $commenter_name_cp = applicator_htmlok( array(
            'name'      => 'Commenter Name',
            'structure' => array(
                'type'      => 'object',
                'linked'    => true,
                'attr'      => array(
                    'a'         => array(
                        'href'      => $commenter_url,
                    ),
                ),
                'layout'    => 'inline',
            ),
            'title'     => $commented_by_content,
            'content'   => array(
                'object' => $comment_author,
            ),
        ) );
        
        // Commenter Avatar
        $commenter_avatar_cp = applicator_htmlok( array(
            'name'      => 'Commenter Avatar',
            'structure' => array(
                'type'      => 'object',
                'linked'    => true,
                'attr'      => array(
                    'a'         => array(
                        'href'      => $commenter_url,
                    ),
                ),
                'layout'    => 'inline',
            ),
            'title'     => $commented_by_content,
            'content'   => array(
                'object'    => get_avatar( $comment, $args['avatar_size'], '', $comment_author ),
                'before'    => $GLOBALS['applicator_space_sep'],
            ),
        ) );
        
        
        // Commenter
        $commenter_cp = applicator_htmlok( array(
            'name'      => 'Commenter',
            'structure' => array(
                'type'      => 'component',
            ),
            'content'   => array(
                'component' => array(
                    $commenter_name_cp,
                    $commenter_avatar_cp,
                ),
            ),
        ) );

        // R: Published Comment Commenter
        $published_comment_commenter_cp = applicator_htmlok( array(
            'name'      => 'Published Comment Commenter',
            'structure' => array(
                'type'      => 'component',
            ),
            'root_css'  => $commenter_avatar_type_css,
            'css'       => 'published-com-commenter',
            'content'   => array(
                'component' => array(
                    $commenter_published_label_obj,
                    $commenter_cp,
                ),
            ),
        ) );

        // E: Post Meta
        $comment_meta = applicator_htmlok( array(
            'name'      => 'Comment Meta',
            'structure' => array(
                'type'      => 'component'
            ),
            'content'   => array(
                'component'     => array(

                    $comment_published_cp,

                    $published_comment_commenter_cp,
                ),
            ),
        ) );


        // E: Post Header Aside
        $comment_header_aside = applicator_htmlok( array(
            'name'      => 'Comment Header',
            'structure' => array(
                'type'          => 'constructor',
                'subtype'       => 'aside',
                'hr_structure'  => true,
            ),
            'css'       => 'comment-hr',
            'content'   => array(
                'constructor'   => array(

                    // Post Meta
                    $comment_meta,
                ),
            ),
            'echo'      => true,
        ) );

        ?>           
                        
                    </div>
                </div>
                <div class="ct comment---ct">
                    <div class="ct_cr comment---ct_cr">
                        
                        <?php

                        if ( $comment->comment_approved == '0' ) {

                            $comment_unapproved_note_obj = applicator_htmlok( array(
                                'name'      => 'Comment Unapproved',
                                'structure' => array(
                                    'type'      => 'object',
                                    'subtype'   => 'note',
                                ),
                                'content'   => array(
                                    'object'    => '<p>'.esc_html__( 'Your comment is awaiting moderation.', 'applicator' ).'</p>',
                                ),
                                'echo'      => true,
                            ) );

                        }
        
                        // OB: Content
                        ob_start();
                        comment_text();
                        $content_ob_content = ob_get_clean();
        
                        // E: Comment Content
                        $comment_content = applicator_htmlok( array(
                            'name'      => 'Comment Content',
                            'structure' => array(
                                'type'      => 'component',
                            ),
                            'content'   => array(
                                'component'     => $content_ob_content,
                            ),
                            'echo'      => true,
                        ) );

                        ?>
                    
                    </div>
                </div>
                
                <?php if ( is_singular() && comments_open() && get_option( 'thread_comments' ) && $depth < $args['max_depth'] ) { ?>
                <div class="fr comment---fr">
                    <div class="fr_cr comment---fr_cr">
                        
            <?php
            
            // Reply to Comment                                                                                                  
            $comment_reply_axn_a_l_mu = '';
            $comment_reply_axn_a_l_mu .= '<span class="a_l comment-reply-axn---a_l">';
                $comment_reply_axn_a_l_mu .= '<span class="l comment-reply-axn---l">';
                    $comment_reply_axn_a_l_mu .= '%1$s';
                $comment_reply_axn_a_l_mu .= '</span>';
            $comment_reply_axn_a_l_mu .= '</span>';

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
                $sign_in_required_line_mu .= '<span class="txt open-parenthesis---txt">';
                    $sign_in_required_line_mu .= '(';
                $sign_in_required_line_mu .= '</span>';
                $sign_in_required_line_mu .= '<span class="txt requires---txt">';
                    $sign_in_required_line_mu .= esc_html__( 'requires', 'applicator' );
                $sign_in_required_line_mu .= '</span>';
                $sign_in_required_line_mu .= ' <span class="txt sign---txt">';
                    $sign_in_required_line_mu .= esc_html__( 'Sign', 'applicator' );
                $sign_in_required_line_mu .= '</span>';
                $sign_in_required_line_mu .= ' <span class="txt in---txt">';
                    $sign_in_required_line_mu .= esc_html__( 'In', 'applicator' );
                $sign_in_required_line_mu .= '</span>';
                $sign_in_required_line_mu .= '<span class="txt close-parenthesis---txt">';
                    $sign_in_required_line_mu .= ')';
                $sign_in_required_line_mu .= '</span>';
            $sign_in_required_line_mu .= '</span>';

            $reply_text_content = sprintf( $comment_reply_axn_a_l_mu,
                $reply_to_comment_line_mu
            );

            $login_text_content = sprintf( $comment_reply_axn_a_l_mu,
                $reply_to_comment_line_mu.' '.$sign_in_required_line_mu
            );

            ob_start();
            comment_reply_link( array_merge(
                $args,
                array(
                    'add_below'     => $add_below,
                    'depth'         => $depth,
                    'max_depth'     => $args['max_depth'],
                    'reply_text'    => $reply_text_content,
                    'login_text'    => $login_text_content
                )
            ) );
            $comment_reply_axn_content = ob_get_clean();

            $comment_reply_axn_obj = applicator_htmlok( array(
                'name'      => 'Comment Reply',
                'structure' => array(
                    'type'      => 'object',
                    'subtype'   => 'action item',
                    'wpg'       => true,
                ),
                'content'   => array(
                    'object'    => $comment_reply_axn_content,
                ),
                'echo'      => true,
            ) );
            ?>
                    
                    </div>
                </div>
        <?php
        }
        if ( 'div' != $args['style'] ) {
        ?>
            </article>
        <?php
        }
    }
}