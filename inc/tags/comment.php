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

        <<?php echo $tag ?> id="comment-<?php comment_ID() ?>" <?php comment_class( 'item cp comment' . ' ' . $comment_has_children_class ) ?> data-name="Comment">
            
        <?php if ( 'div' != $args['style'] ) { ?>
            <article class="cr comment---cr">
        <?php } ?>
                
                <div class="hr comment---hr">
                    <div class="hr_cr comment---hr_cr">
                        <div class="obj comment-title-obj" data-name="Comment Title Object">
                            <h2 class="h comment---h">
                                <span class="h_l comment---h_l">
                                    <a class="a comment---a" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                                        <span class="a_l comment---a_l"><span class="word comment-title---word"><?php esc_html_e( 'Comment', 'applicator' ); ?> <?php comment_ID() ?></span></span>
                                    </a>
                                </span>
                            </h2>
                        </div><!-- Comment Title Object -->
                        
                        <?php if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) { ?>
                        <div class="axns comment-admin-axns" data-name="Comment Admin Actions">
                            <div class="cr com-admin-axns---cr">
                                <div class="h com-admin-axns---h"><span class="h_l com-admin-axns---h_l"><?php esc_html_e( 'Comment Admin Actions', 'applicator' ); ?></span></div>
                                <div class="ct com-admin-axns---ct">
                                    <div class="ct_cr com-admin-axns---ct_cr">
                                        <span class="obj axn edit-comment-axn" data-name="Edit Comment Action">
                                            <?php
                                            // Markup
                                            $edit_comment_axn_a_l_mu = '<span class="a_l edit-com-axn---a_l" title="%5$s"><span class="word %2$s---word">%1$s</span> <span class="word %4$s---word">%3$s</span></span>';

                                            // Content
                                            $edit_comment_axn_a_l = sprintf( $edit_comment_axn_a_l_mu,
                                                esc_html__( 'Edit', 'applicator' ),
                                                'edit',
                                                esc_html__( 'Comment', 'applicator' ) . ' ' . $comment->comment_ID,
                                                'comment-title',
                                                esc_attr__( 'Edit Comment', 'applicator' )
                                            );

                                            edit_comment_link( $edit_comment_axn_a_l, '', '' );                  
                                            ?>
                                        </span><!-- Edit Comment Action -->
                                    </div>
                                </div><!-- ct -->
                            </div>
                        </div><!-- Comment Admin Actions -->
                        <?php } ?>
                        
                        <div class="aside comment-header-aside" data-name="Comment Header Aside">
                            <div class="cr com-hr-as---cr">
                                <div class="h com-hr-as---h"><span class="h_l com-hr-as---h_l"><?php esc_html_e( 'Comment Header Aside', 'applicator' ); ?></span></div>
                                <div class="ct com-hr-as---ct">
                                    <div class="ct_cr com-hr-as---ct_cr">
                                        <div class="cp comment-published-info" data-name="Comment Published Info">
                                            <div class="cr com-pub-info---cr">
                                                <div class="h com-pub-info---h"><span class="h_l com-pub-info---h_l"><?php esc_html_e( 'Comment Published Info', 'applicator' ); ?></span></div>
                                                <div class="ct com-pub-info---ct">
                                                    <div class="ct_cr com-pub-info---ct_cr">
          
                                                        
                                                        <?php
        
        $com_pub_mu = '<div class="%2$s" data-name="%1$s">';
            $com_pub_mu .= '<div class="cr %3$s---cr">';
                $com_pub_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%4$s</span></div>';
                $com_pub_mu .= '<div class="ct %3$s---ct">';
                    $com_pub_mu .= '<div class="ct_cr %3$s---ct_cr">';
                        $com_pub_mu .= '%5$s %6$s';
                    $com_pub_mu .= '</div>';
                $com_pub_mu .= '</div><!-- ct -->';
            $com_pub_mu .= '</div>';
        $com_pub_mu .= '</div><!-- %1$s -->';
        
        $com_pub_lbl_mu = '<span class="%2$s" data-name="%1$s">';
            $com_pub_lbl_mu .= '<span class="g %3$s---g"><span class="g_l %3$s---g_l"><span class="word %5$s---word">%4$s</span> <span class="word %7$s---word">%6$s</span></span></span>';
        $com_pub_lbl_mu .= '</span><!-- %1$s -->';
        
        $com_pub_ts_mu = '<span class="%2$s" data-name="%1$s">';
            $com_pub_ts_mu .= '<time class="time %3$s---time" datetime="%11$s">';
                $com_pub_ts_mu .= '<span class="time_l %3$s---time_l">';
                    $com_pub_ts_mu .= '<a class="a %3$s---a" href="%10$s" title="%12$s"><span class="a_l %3$s---a_l"><span class="word %5$s---word">%4$s</span> <span class="word %7$s---word">%6$s</span> <span class="word %9$s---word">%8$s</span></span></a>';
                $com_pub_ts_mu .= '</span>';
            $com_pub_ts_mu .= '</time>';
        $com_pub_ts_mu .= '</span><!-- %1$s -->';
        
        $com_pub_ts = sprintf( $com_pub_ts_mu,
            'Comment Published Timestamp',
            'obj comment-published-timestamp',
            'com-pub-ts',
            get_the_date( 'j' ), // Day (d)
            'day',
            get_the_date( 'M' ), // Month (mmm)
            'month',
            get_the_date( 'Y' ), // Year (yyyy)
            'year',
            esc_url( get_permalink() ),
            get_the_date( DATE_W3C ),
            get_the_date( 'j F Y')
        );
        
        $com_pub_lbl = sprintf( $com_pub_lbl_mu,
            'Comment Published Timestamp Label',
            'obj comment-published-timestamp-label',
            'comment-pub-ts-lbl',
            esc_html__( 'Commented', 'applicator' ),
            'published',
            esc_html__( 'on', 'applicator' ),
            'on'
        );
        
        printf( $com_pub_mu,
            'Comment Published',
            'cp comment-published',
            'com-pub',
            esc_html__( 'Comment Published', 'applicator' ),
            $com_pub_lbl,
            $com_pub_ts
        );
        
        ?>
                                                            
                                                    <?php
        
                                                    // Markup: Comment Published Date
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
        
                                                    // Markup: Comment Published Time
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
                                        </div><!-- Comment Published Timestamp -->
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
                                        </div><!-- Commenter -->
                                    </div>
                                </div>
                            </div>
                        </div><!-- Comment Header Aside -->
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
                </div><!-- ct -->
                
                <?php if ( is_singular() && comments_open() && get_option( 'thread_comments' ) && $depth < $args['max_depth'] ) { ?>
                <div class="fr comment---fr">
                    <div class="fr_cr comment---fr_cr">
                        <div class="axns comment-axns" data-name="Comment Actions">
                            <div class="cr com-axns---cr">
                                <div class="h com-axns---h">
                                    <span class="h_l com-axns---h_l"><?php esc_html_e( 'Comment Actions', 'applicator' ); ?></span>
                                </div>
                                <div class="obj axn reply-comment-axn" title="Reply to Comment" data-name="Reply To Comment Action">
                                    
                                    <?php
                                                                                                                                 
                                    // Markup
                                    $reply_com_axn_a_l_mu = '<span class="a_l reply-com-axn---a_l">%1$s</span>';
                                    
                                    // Markup
                                    $reply_com_axn_a_l_reply_mu = '<span class="word reply---word">%1$s</span>';
                                    $reply_com_axn_a_l_reply_mu .= ' <span class="word to---word">%2$s</span>';
                                    $reply_com_axn_a_l_reply_mu .= ' <span class="word comment---word">%3$s</span>';    
                                    
                                    // Markup
                                    $reply_com_axn_a_l_login_mu = '<span class="word reply---word">%1$s</span>';
                                    $reply_com_axn_a_l_login_mu .= ' <span class="word to---word">%2$s</span>';
                                    $reply_com_axn_a_l_login_mu .= ' <span class="word comment---word">%3$s</span>';
                                    $reply_com_axn_a_l_login_mu .= ' <span class="line requires-sign-in---line">%4$s</span>';                                                                      
                                    // Content 
                                    $reply_com_axn_a_l_reply = sprintf( $reply_com_axn_a_l_reply_mu,
                                        esc_html__( 'Reply', 'applicator' ),
                                        esc_html__( 'to', 'applicator' ),
                                        esc_html__( 'Comment', 'applicator' )
                                    );
                                                                                                                                 
                                    // Content 
                                    $reply_com_axn_a_l_login = sprintf( $reply_com_axn_a_l_login_mu,
                                        esc_html__( 'Reply', 'applicator' ),
                                        esc_html__( 'to', 'applicator' ),
                                        esc_html__( 'Comment', 'applicator' ),
                                        esc_html__( '(requires Sign In)', 'applicator' )
                                    );       
                                                                                                                                 
                                    $reply_com_axn_a_l_reply_text = sprintf( $reply_com_axn_a_l_mu,
                                        $reply_com_axn_a_l_reply
                                    );     
                                                                                                                                 
                                    $reply_com_axn_a_l_login_text = sprintf( $reply_com_axn_a_l_mu,
                                        $reply_com_axn_a_l_login
                                    );
                                    ?>
                                    
                                    <?php comment_reply_link( array_merge(
                                        $args,
                                        array(
                                            'add_below'     => $add_below,
                                            'depth'         => $depth,
                                            'max_depth'     => $args['max_depth'],

                                            'reply_text'    => $reply_com_axn_a_l_reply_text,

                                            'login_text'    => $reply_com_axn_a_l_login_text
                                        )
                                    ) ); ?>

                                </div><!-- Reply To Comment Action -->
                            </div>
                        </div><!-- Comment Actions -->
                    </div>
                </div>
                <?php  } ?>
                    
            <?php if ( 'div' != $args['style'] ) { ?>
            </article>
            <?php } ?>
            
    <?php }
}