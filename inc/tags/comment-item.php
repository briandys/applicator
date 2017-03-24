<?php

// Comment Item
// comments.php

if ( ! function_exists( 'applicator_comment_item' ) ) :
    function applicator_comment_item( $comment, $args, $depth ) {
        
        if ( 'div' === $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'comment';
        } ?>

        <<?php echo $tag ?> id="comment-<?php comment_ID() ?>" <?php comment_class( empty( $args['has_children'] ) ? 'comment--single' : 'comment--parent' ) ?>>
            
        <?php if ( 'div' != $args['style'] ) : ?>
            <div class="comment-cr">
        <?php endif; ?>

                <div class="comment--hr">
                    <div class="comment--hr--cr">

                        <div class="h comment--h">
                            <a class="a comment--a" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" title="Comment ID: <?php comment_ID() ?>">
                                <span class="a-l"><?php esc_html_e( 'Comment ID', 'applicator' ); ?> <?php comment_ID() ?></span>
                            </a>
                        </div>

                        <?php if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) : ?>
                        <div class="axns comment--axns">
                            <div class="comment--axns--cr">

                                <div class="h comment--axns--h"><span class="h-l"><?php esc_html_e( 'Actions', 'applicator' ); ?></span></div>

                                <?php edit_comment_link( '<span class="a-l comment-edit--axn-l"><span class="comment-edit--axn--pred-l">' . esc_html__( 'Edit', 'applicator' ) . '</span> <span class="comment-edit--axn--subj-l">' . esc_html__( 'Comment', 'applicator' ) . '</span></span>', '', '' ); ?>

                            </div>
                        </div><!-- comment--axns -->
                        <?php endif; ?>

                        <div class="cn comment--meta" data-name="Comment Meta">
                            <div class="comment--meta--cr">

                                
                                <?php //------------------------- Comment Published Timestamp ------------------------- ?>
                                <?php $pub_timestamp = '<div class="cp comment-pub-timestamp" data-name="Comment Published Timestamp">';
                                    $pub_timestamp .= '<div class="comment-pub-timestamp--cr">';
                                        $pub_timestamp .= '<span class="comment-pub-timestamp--l">';
                                            $pub_timestamp .= '<span class="comment-pub-timestamp--pred-l">%4$s</span>';
                                            $pub_timestamp .= '<span class="comment-pub-timestamp--subj-l">';
                                                $pub_timestamp .= '<a class="a comment-pub-timestamp--a" href="%1$s" title="%2$s" rel="bookmark"><span class="a-l">%3$s</span></a>';
                                            $pub_timestamp .= '</span>';
                                        $pub_timestamp .= '</span>';
                                    $pub_timestamp .= '</div>';
                                $pub_timestamp .= '</div>';

                                $time_string = '<time class="time comment-pub-timestamp--time" datetime="%1$s">';
                                    $time_string .= '<span class="time-l comment-pub-timestamp--time-l">';
                                        $time_string .= '<span class="comment-pub-timestamp--date">';
                                            $time_string .= '<span class="comment-pub-timestamp--day--l">%2$s</span>';
                                            $time_string .= '&nbsp;<span class="comment-pub-timestamp--month--l">%3$s</span>';
                                            $time_string .= '&nbsp;<span class="comment-pub-timestamp--year--l">%4$s</span>';
                                        $time_string .= '</span>';
                                        $time_string .= '<span class="comment-pub-timestamp--time">';
                                            $time_string .= '&nbsp;<span class="comment-pub-timestamp--time--time--l">%5$s</span>';
                                        $time_string .= '</span>';
                                    $time_string .= '</span>';
                                $time_string .= '</time>';

                                $time_string = sprintf( $time_string,
                                    get_comment_date( DATE_W3C ),
                                    get_comment_date( 'j' ), // Day (d)
                                    get_comment_date( 'M' ), // Month (mmm)
                                    get_comment_date( 'Y' ), // Year (yyyy)
                                    get_comment_time( 'H:i' ) // Time (24:00)
                                );

                                printf( $pub_timestamp,
                                    htmlspecialchars( get_comment_link( $comment->comment_ID ) ),
                                    get_the_title() . esc_attr__( '&nbsp;|&nbsp;', 'applicator' ) . esc_attr__( 'Comment ID&nbsp;', 'applicator' ) . get_comment_ID(),
                                    $time_string,
                                    __( 'Commented on ', 'applicator')
                                ); ?>

                                
                                
                                <?php //------------------------- Comment Author ------------------------- ?>
                                <?php $comment_author = '<div class="cp comment-author" data-name="Comment Author">';
                                    $comment_author .= '<div class="comment-author--cr">';
                                        $comment_author .= '<span class="comment-author--l">';
                                            $comment_author .= '<span class="comment-author--pred-l">' . esc_html__( '%2$s', 'applicator' ) . '</span>';
                                            $comment_author .= '<span class="comment-author--subj-l">%1$s</span>';
                                        $comment_author .= '</span>';
                                    $comment_author .= '</div>';
                                $comment_author .= '</div>';

                                $author_name_avatar = '<span class="author-name--author-avatar">';
                                    $author_name_avatar .= '<a class="a author-name--author-avatar--a url fn n" href="%2$s" title="%1$s">';
                                        $author_name_avatar .= '<span class="author-name--author-avatar--l">';
                                            $author_name_avatar .= '<span class="author-name--l">%1$s</span>';
                                            if ( $args['avatar_size'] != 0 )
                                            $author_name_avatar .= '<span class="author-avatar--img">';
                                                $author_name_avatar .= '%3$s';
                                            $author_name_avatar .= '</span>';
                                        $author_name_avatar .= '</span>';
                                    $author_name_avatar .= '</a>';
                                $author_name_avatar .= '</span>';

                                $author_name_avatar = sprintf( $author_name_avatar,
                                    get_comment_author(),
                                    get_comment_author_url(),
                                    get_avatar(
                                        $comment,
                                        $args['avatar_size']
                                    )
                                );

                                printf( $comment_author,
                                    $author_name_avatar,
                                    __( 'Comment by ', 'applicator')
                                ); ?>

                            </div>
                        </div><!-- comment--meta -->

                    </div>
                </div><!-- comment--hr -->

                <div class="comment--ct">
                    <div class="comment--ct-cr">

                        <?php if ( $comment->comment_approved == '0' ) : ?>
                        <div class="note comment-unapproved--note">
                            <div class="comment-unapproved--note--cr">
                                <div class="comment-unapproved--note-l">
                                    <?php esc_html_e( 'Your comment is awaiting moderation.', 'applicator' ); ?>
                                </div>
                            </div>
                        </div><!-- comment-unapproved--note -->
                        <?php endif; ?>

                        <?php comment_text(); ?>

                    </div>
                </div><!-- comment--ct -->

                
                <?php if ( is_singular() && comments_open() && get_option( 'thread_comments' ) && $depth < $args['max_depth'] ) { ?>
                
                <div class="comment--fr">
                    <div class="comment--fr-cr">

                        <div class="axns comment--axns">
                            <div class="comment--axns--cr">

                                <div class="h comment--axns--h"><span class="h-l"><?php esc_html_e( 'Actions', 'applicator' ); ?></span></div>

                                <?php comment_reply_link( array_merge(
                                    $args,
                                    array(
                                        'add_below'     => $add_below,
                                        'depth'         => $depth,
                                        'max_depth'     => $args['max_depth'],
                                        
                                        'reply_text'    => sprintf(
                                                            '<span class="a-l comment-reply--axn-l">'
                                                                .'<span class="comment-reply--axn--subj-l">%1$s</span>'
                                                            .'</span>',
                                                            esc_html__( 'Reply', 'applicator' )
                                                        ),
                                        
                                        'login_text'    => sprintf(
                                                            '<span class="a-l comment-reply--axn-l">'
                                                                .'<span class="comment-reply--axn--subj-l">%1$s</span>'
                                                                .' <span class="comment-reply--axn--note-l">%2$s</span>'
                                                            .'</span>',
                                                            esc_html__( 'Reply', 'applicator' ),
                                                            esc_html__( '(requires Sign In)', 'applicator' )
                                                        )
                                    )
                                ) ); ?>

                            </div>
                        </div><!-- comment--axns -->

                    </div>
                </div><!-- comment--fr -->
                
                <?php  } ?>
                    
            <?php if ( 'div' != $args['style'] ) : ?>
            </div>
            <?php endif; ?>
            
    <?php }

endif;