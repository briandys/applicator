<?php // Comment Item | comments.php

if ( ! function_exists( 'applicator_comment' ) ) {
    function applicator_comment( $comment, $args, $depth ) {
        
        if ( 'div' === $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'comment';
        }
        
        if ( true === $args['has_children'] ) {
            $comment_has_children_class = 'comment--parent';
        } else {
            $comment_has_children_class = 'comment--solo';
        }

        ?>

        <<?php echo $tag ?> id="comment-<?php comment_ID() ?>" <?php comment_class( 'item cp comment' .  $comment_has_children_class ) ?> data-name="Comment">
            
        <?php if ( 'div' != $args['style'] ) : ?>
            <article class="cr comment---cr">
        <?php endif; ?>
                
                <div class="hr comment---hr">
                    <div class="hr_cr comment---hr_cr">
                        <div class="h comment---h">
                            <span class="h_l comment---h_l">
                                <a class="a comment---h_a" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                                    <span class="a_l comment---h_a_l"><?php esc_html_e( 'Comment', 'applicator' ); ?> <?php comment_ID() ?></span>
                                </a>
                            </span>
                        </div><!-- comment---h -->
                        
                        <?php if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) { ?>
                        <div class="axns comment---axns">
                            <div class="axns_cr comment---axns_cr">
                                <div class="axns_h comment---axns_h"><span class="axns_h_l comment---axns_h_l"><?php esc_html_e( 'Actions', 'applicator' ); ?></span></div>
                                <div class="obj axn edit-comment-axn" data-name="Edit Comment Action">
                                    
                                    <?php // Markup
                                    $edit_comment_axn_mu = '<span class="a_l edit-com-axn---a_l">';
                                        $edit_comment_axn_mu .= '<span class="word edit-com-axn--edit---word">%1$s</span> <span class="word edit-com-axn--comment---word">%2$s</span>';
                                    $edit_comment_axn_mu .= '</span>';
                                    ?>
                                    
                                    <?php edit_comment_link( sprintf( $edit_comment_axn_mu, esc_html__( 'Edit', 'applicator' ), esc_html__( 'Comment', 'applicator' ) ), '', '' ); ?>
                                </div><!-- edit-comment-axn -->
                            </div>
                        </div><!-- comment---axns -->
                        <?php } ?>
                        
                        <aside class="aside comment--hr---aside" data-name="Comment Header Aside">
                            <div class="aside_cr comment--hr---aside_cr">
                                <div class="aside_h comment--hr---aside_h">
                                    <span class="aside_h_l comment--hr---aside_h_l"><?php esc_html_e( 'Comment Header Aside', 'applicator' ); ?></span>
                                </div>
                                <div class="aside_ct comment--hr---aside_ct">
                                    <div class="aside_ct_cr comment--hr---aside_ct_cr">
                                        <div class="cp comment-published-timestamp" data-name="Comment Published Timestamp">
                                            <div class="cr com-pub-ts---cr">
                                                <div class="h com-pub-ts---h"><span class="h_l com-pub-ts---h_l"><?php esc_html_e( 'Comment Published Timestamp', 'applicator' ); ?></span></div>
                                                <div class="ct com-pub-ts---ct">
                                                    <div class="ct_cr com-pub-ts---ct_cr">
                                                            
                                                    <?php
        
                                                    // Comment Published Date

                                                    // Markup
                                                    $comment_pub_date_mu = '<span class="obj comment-published-date---obj" data-name="Comment Published Date">';
                                                        $comment_pub_date_mu .= '<time class="time com-pub-date---time" datetime="%1$s">';
                                                            $comment_pub_date_mu .= '<span class="time_l com-pub-date---time_l">';
                                                                $comment_pub_date_mu .= '<a class="a com-pub-date---time_a" href="%2$s"><span class="a_l com-pub-date---time_a_l"><span class="word com-pub-date--day---word">%3$s</span> <span class="word com-pub-date--month---word">%4$s</span> <span class="word com-pub-date--year---word">%5$s</span></span></a>';
                                                            $comment_pub_date_mu .= '</span>';
                                                        $comment_pub_date_mu .= '</time>';
                                                    $comment_pub_date_mu .= '</span>';

                                                    printf( $comment_pub_date_mu,
                                                        get_comment_date( DATE_W3C ),
                                                        htmlspecialchars( get_comment_link( $comment->comment_ID ) ),
                                                        get_comment_date( 'j' ), // Day (d)
                                                        get_comment_date( 'M' ), // Month (mmm)
                                                        get_comment_date( 'Y' ) // Year (yyyy)
                                                    );
                                                    
        
                                                    // Comment Published Time
                                                    
                                                    // Markup    
                                                    $comment_pub_time_mu = ' ' . '<span class="obj comment-published-time---obj" data-name="Comment Published Time">';
                                                        $comment_pub_time_mu .= '<time class="time com-pub-time---time" datetime="%1$s">';
                                                            $comment_pub_time_mu .= '<span class="time_l com-pub-time---time_l">';
                                                                $comment_pub_time_mu .= '<a class="a com-pub-time---time_a" href="%2$s"><span class="a_l com-pub-time---time_a_l">%3$s</span></a>';
                                                            $comment_pub_time_mu .= '</span>';
                                                        $comment_pub_time_mu .= '</time>';
                                                    $comment_pub_time_mu .= '</span>';
                                                        
                                                    printf( $comment_pub_time_mu,
                                                        get_comment_date( DATE_W3C ),
                                                        htmlspecialchars( get_comment_link( $comment->comment_ID ) ),
                                                        get_comment_time( 'H:i' ) // Time (24:00)
                                                    );
                                                    ?>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- com-pub-ts -->
                                        <div class="cp commenter" data-name="Commenter">
                                            <div class="cr commenter---cr">
                                                <div class="h commenter---h">
                                                    <span class="h_l commenter---h_l"><?php esc_html_e( 'Commenter ', 'applicator' ); ?></span>
                                                </div>
                                                <div class="ct commenter---ct">
                                                    <div class="ct_cr commenter---ct_cr">
                                                        <span class="obj commenter-name---obj" data-name="Commenter Name">
                                                            <span class="g commenter-name---g">
                                                                <span class="g_l commenter-name---g_l">
                                                                    
                                                                    <?php
        
                                                                    $commenter_name_a_mu = '<a class="a commenter-name---a" href="%1$s"><span class="a_l commenter-name---a_l">%2$s</span></a>';
        
                                                                    printf( $commenter_name_a_mu,
                                                                        get_comment_author_url(),
                                                                        get_comment_author()
                                                                    );
                                                                    
                                                                    ?>
                                                                
                                                                </span>
                                                            </span>
                                                        </span><!-- commenter-avatar---obj -->
                                                        <span class="obj commenter-avatar---obj" data-name="Commenter Avatar">
                                                            
                                                            <?php
                                                            
                                                            $commenter_avatar_a_mu = '<a class="a commenter-avatar---a" href="%1$s"><span class="a_l commenter-avatar---a_l"><span class="ee--img commenter-avatar---ee--img">%2$s</span></span></a>';
        
                                                            printf( $commenter_avatar_a_mu,
                                                                get_comment_author_url(),
                                                                get_avatar(
                                                                    $comment,
                                                                    $args['avatar_size']
                                                                )
                                                            );
                                                            
                                                            ?>
                                                        
                                                        </span><!-- commenter-avatar---obj -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- commenter -->
                                    </div>
                                </div>
                            </div>
                        </aside><!-- comment--hr---aside -->
                    </div>
                </div><!-- comment--hr -->
                <div class="ct comment---ct">
                    <div class="ct_cr comment---ct_cr">
                        
                        <?php if ( $comment->comment_approved == '0' ) { ?>
                        <div class="obj note comment-unapproved-note---obj" data-name="Comment Unapproved Note">
                            <div class="g comment-unapproved-note---g">
                                <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'applicator' ); ?></p>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <?php comment_text(); ?>
                    
                    </div>
                </div><!-- comment---ct -->
                
                <?php if ( is_singular() && comments_open() && get_option( 'thread_comments' ) && $depth < $args['max_depth'] ) { ?>
                <div class="fr comment---fr">
                    <div class="fr_cr comment---fr_cr">
                        <div class="axns comment---axns">
                            <div class="axns_cr comment---axns_cr">
                                <div class="axns_h comment---axns_h">
                                    <span class="axns_h_l comment---axns_h_l"><?php esc_html_e( 'Actions', 'applicator' ); ?></span>
                                </div>
                                <div class="obj axn reply-comment-axn" data-name="Reply to Comment Action">
                                    
                                    <?php comment_reply_link( array_merge(
                                        $args,
                                        array(
                                            'add_below'     => $add_below,
                                            'depth'         => $depth,
                                            'max_depth'     => $args['max_depth'],

                                            'reply_text'    => sprintf(
                                                                '<span class="a_l reply-com-axn---a_l">'
                                                                    .'<span class="word reply-com-axn--reply---word">%1$s</span> <span class="word reply-com-axn--to---word">%2$s</span> <span class="word reply-com-axn--comment---word">%3$s</span>'
                                                                .'</span>',
                                                                esc_html__( 'Reply', 'applicator' ),
                                                                esc_html__( 'to', 'applicator' ),
                                                                esc_html__( 'Comment', 'applicator' )
                                                            ),

                                            'login_text'    => sprintf(
                                                                '<span class="a_l reply-com-axn---a_l">%1$s</span>',
                                                                esc_html__( 'Reply (requires Sign In)', 'applicator' )
                                                            )
                                        )
                                    ) ); ?>

                                </div><!-- reply-comment-axn -->
                            </div>
                        </div><!-- comment---axns -->
                    </div>
                </div><!-- comment---fr -->
                <?php  } ?>
                    
            <?php if ( 'div' != $args['style'] ) : ?>
            </article>
            <?php endif; ?>
            
    <?php }
}