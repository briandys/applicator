<!--[if lt IE 8]>
                        <?php

                        // Text
                        $browser_upgrade_note_txt = sprintf( '<p>%1$s <a href="%3$s">%2$s</a></p>',
                            esc_html__( 'You are using an outdated browser. Please upgrade your browser to improve your experience.', 
                            esc_html__( 'Upgrade Browser', $GLOBALS['apl_textdomain'] ),
                            esc_url( 'http://browsehappy.com/' )
                        );
                                                            
                        // Object
                        $browser_upgrade_note_obj = applicator_html_ok_obj( array(
                            'elem'      => 'note',
                            'name'      => 'Browser Upgrade',
                            'css'       => 'browser-upgrade',
                            'content'   => $go_content_nav_item_txt,
                            'echo'      => true
                        ) ); ?>
                        <![endif]-->