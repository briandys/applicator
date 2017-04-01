<?php

// Comments Actions Snippet
// content.php

if ( !function_exists( 'applicator_comments_actions_snippet' ) ) :
    function applicator_comments_actions_snippet() {
        
        $number = (int) get_comments_number( get_the_ID() ); ?>

        <?php
        // Comments State Class
        if ( comments_open() )
            $comments_state_class = 'comments--enabled';
        else
            $comments_state_class = 'comments--disabled';
        
        // Comments Count
        if ( 0 === $number )
            $comments_count_class = 'comments-count--zero';
        elseif ( 1 === $number )
            $comments_count_class = 'comments-count--single';
        elseif ( 1 < $number )
            $comments_count_class = 'comments-count--multiple';
        ?>


        <div class="comments-snippet <?php echo $comments_state_class . ' ' . $comments_count_class ?>">
            <div class="comments-snippet--cr">
                
                <div class="note <?php echo $comments_count_class ?>--note">
                    <div class="<?php echo $comments_count_class ?>--note--cr">
            
                    <?php // With Comments
                    
                    $go_comments_label_markup_start = '<span class="a-l go-comments--a-l">';
                    $go_comments_label_markup_end = '</span>';
            
                    if( (int) get_comments_number( get_the_ID() ) >= 1 ) :
        
                        comments_popup_link(
                        // Zero Comment
                        '',

                        // Single Comment
                        $go_comments_label_markup_start . __( '1 Comment', 'applicator' ) . $go_comments_label_markup_end,

                        // Multiple Comments
                        $go_comments_label_markup_start . __( '% Comments', 'applicator' ) . $go_comments_label_markup_end,

                        // CSS Class
                        'a go-comments--a',

                        // Comments Disabled
                        '' );
        
                    // No Comments
                    else :
        
                        echo $go_comments_label_markup_start . __( 'No Comments', 'applicator' ) . $go_comments_label_markup_end;
        
                    endif; ?>
                        
                    </div>
                </div>
                
                <?php // Open Comments ?>
                <?php if ( comments_open() ) : ?>

                    <a class="a write-comment--a" href="<?php echo esc_url( get_permalink() ); ?>#respond" title="Write Comment">
                        <span class="a-l write-comment--a-l">
                            <?php esc_html_e( 'Write Comment', 'applicator' ); ?>
                        </span>
                    </a>

                <?php // Closed Comments ?>
                <?php else : ?>

                    <div class="note comments-closed--note">
                        <div class="comments-closed--note--cr">
                            <div class="note-l">
                                <?php esc_html_e( 'Comments are closed.', 'applicator' ); ?>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>
            
            </div>
        </div><!-- comments-snippet -->
            
    <?php }
endif;