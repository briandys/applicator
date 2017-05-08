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