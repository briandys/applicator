<div id="comments" class="cp comments comments-area" data-name="Comments">
                    <div class="cr comments---cr">
                        <div class="hr comments---hr">
                            <div class="hr_cr comments---hr_cr">
                                <div class="h comments---h"><span class="h_l comments---h_l"><?php esc_html_e( 'Comments', $GLOBALS['apl_textdomain'] ); ?></span></div>
                                <div class="aside comments-hr-aside" role="complementary" data-name="Comments Header Aside">
                                    <div class="cr coms-hr-as---cr">
                                    
                                        <?php // inc > tags > comments-actions-snippet.php
                                        applicator_func_comments_actions_snippet(); ?>
                                    
                                    </div>
                                </div><!-- Comments Header Aside -->
                            </div>
                        </div>
                        <div class="ct comments---ct">
                            <div class="ct_cr comments---ct_cr">
                                
                            <?php if ( have_comments() ) { ?>
                                
                                <ul class="grp comments---grp">
                                    <?php wp_list_comments( array(
                                        'style'       => 'ul',
                                        'avatar_size' => 48,
                                        'callback' => 'applicator_func_comment'
                                    ) ); ?>
                                </ul>
                                
                                <?php // Comments Navigation | inc > tags > comments-nav.php
                                applicator_func_comments_nav();
                                                         
                            } else {
                                
                                $comments_empty_note_obj = applicator_html_ok_obj( array(
                                    'name' => 'Comments Empty Note',
                                    'elem' => 'n',
                                    'css' => 'com-empty-note',
                                    'content' => '<p>' . esc_html__( 'There are no comments.', $GLOBALS['apl_textdomain'] ) . '</p>',
                                    'echo' => true,
                                ) );

                            } ?>
                            
                            </div>
                        </div><!-- comments---ct -->
                    </div>
                </div><!-- comments -->