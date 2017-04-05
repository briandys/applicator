<?php

// Comments Actions Snippet
// content.php

if ( !function_exists( 'applicator_comments_actions_snippet' ) ) {
    function applicator_comments_actions_snippet() {
        
        $number = (int) get_comments_number( get_the_ID() ); ?>

        <?php // Comments State Class
        if ( comments_open() ) {
            $comments_state_class = 'comments--enabled';
        } else {
            $comments_state_class = 'comments--disabled';
        }
        
        // Comments Count
        if ( 0 === $number ) {
            $comments_count_class = 'comments-count--zero comments-count--empty';
        } elseif ( 1 === $number ) {
            $comments_count_class = 'comments-count--single comments-count--populated';
        } elseif ( 1 < $number ) {
            $comments_count_class = 'comments-count--multiple comments-count--populated';
        } ?>


        <div class="comments-snippet <?php echo $comments_state_class . ' ' . $comments_count_class ?>">
            <div class="comments-snippet--cr">
                
                <div class="note <?php echo $comments_count_class ?>--note">
                    <div class="<?php echo $comments_count_class ?>--note--cr">
            
                    <?php // With Comments
                    
                    $go_comments_markup = '<span class="a_l go-comments---a_l">';
                        $go_comments_markup .= '<span class="count go-comments---count">';
                            $go_comments_markup .= '%1$s';
                        $go_comments_markup .= '</span>';
                        $go_comments_markup .= ' <span class="go-comments---comments_word_l">';
                            $go_comments_markup .= '%2$s';
                        $go_comments_markup .= '</span>';
                    $go_comments_markup .= '</span>';
            
                    if( (int) get_comments_number( get_the_ID() ) >= 1 ) {
        
                        comments_popup_link(
                        // Zero Comment
                        '',

                        // Single Comment
                        sprintf( $go_comments_markup,
                            __( '1', 'applicator' ),
                            __( 'Comment', 'applicator' )
                        ),

                        // Multiple Comments
                        sprintf( $go_comments_markup,
                            __( '%', 'applicator' ),
                            __( 'Comments', 'applicator' )
                        ),

                        // CSS Class
                        'a go-comments--a',

                        // Comments Disabled
                        '' );
        
                    // No Comments
                    } else { ?>
                        
                        <a href="<?php echo esc_url( get_permalink() ); ?>#comments" class="a go-comments--a">
                            <?php echo sprintf( $go_comments_markup,
                                __( '0', 'applicator' ),
                                __( 'Comment', 'applicator' )
                            ); ?>
                        </a>
        
                    <?php } ?>
                        
                    </div>
                </div>
                
                <?php // Open Comments ?>
                <?php if ( comments_open() ) { ?>

                    <a class="a write-comment--a" href="<?php echo esc_url( get_permalink() ); ?>#respond" title="Write Comment">
                        <span class="a-l write-comment--a-l">
                            <?php esc_html_e( 'Write Comment', 'applicator' ); ?>
                        </span>
                    </a>

                <?php // Closed Comments ?>
                <?php  } else { ?>

                    <div class="note comments-closed--note">
                        <div class="comments-closed--note--cr">
                            <div class="note-l">
                                <?php esc_html_e( 'Comments are closed.', 'applicator' ); ?>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            
            </div>
        </div><!-- comments-snippet -->
            
    <?php }
}