<?php // Comments Actions Snippet | content.php

/*
Structure

* Comments Actions Snippet (cp) | $comments_actions_snippet

    ** Comments Population (cp) | $comments_population
    
        *** Comments Count (obj) | $comments_count_obj

            • Populated (status) | comments-population--populated
                
                • Single: 1 Comment | $comments_count_single_txt | comments-population--populated--single
                • Multiple: 2 Comments | $comments_count_multi_txt | comments-population--populated--multiple
        
            • Empty (status) | comments-population--empty
                
                • Zero: 0 Comment | $comments_count_zero_txt | comments-population--empty--zero

    
    ** Comment Creation Ability (cp) | $comment_creation_ability
    
        *** Enabled (status) | comment-creation-ability--enabled
        
            **** Add Comment Action (obj) | $add_comment_axn
                
                • Add Comment
        
        *** Disabled (status) | comment-creation-ability--disabled
        
            **** Comment Creation Disabled Note (obj) | $commenting_disabled_note_obj
                
                • Commenting is disabled.
*/

if ( ! function_exists( 'applicator_func_comments_actions_snippet_cp' ) ) {
    function applicator_func_comments_actions_snippet_cp() {
        
        $comments_population_pri_css = 'comments-population';
        $comment_creation_ability_pri_css = 'comment-creation-ability';
        
        $comments_count_axn_css = 'comments-count-axn';
        
        $comments_count_single_text = '1';
        $comments_count_multi_text = '%';
        $comments_count_zero_text = '&#48;';
        
        $comments_count_num_css = 'comments-count';
        
        $comment_singular_text = 'Comment';
        $comment_plural_text = 'Comments';
        
        
        // Comments Count Template Markup
        $comments_count_mu = '';
            $comments_count_mu .= '<span class="txt num %3$s---txt">';
                $comments_count_mu .= '%1$s';
            $comments_count_mu .= '</span>';
            $comments_count_mu .= ' <span class="txt %4$s---txt">';
                $comments_count_mu .= '%2$s';
            $comments_count_mu .= '</span>';
        
        
        // Comments Count Single Text
        $comments_count_single_txt = sprintf( $comments_count_mu,
            $comments_count_single_text,
            $comment_singular_text,
            $comments_count_num_css,
            sanitize_title( $comment_singular_text ),
            $comments_count_axn_css
        );
        
        // Comments Count Multiple Text
        $comments_count_multi_txt = sprintf( $comments_count_mu,
            $comments_count_multi_text,
            $comment_plural_text,
            $comments_count_num_css,
            sanitize_title( $comment_plural_text ),
            $comments_count_axn_css
        );
        
        // Comments Count Zero Text
        $comments_count_zero_txt = sprintf( $comments_count_mu,
            $comments_count_zero_text,
            $comment_singular_text,
            $comments_count_num_css,
            sanitize_title( $comment_singular_text ),
            $comments_count_axn_css
        );
        
        
        $comments_count_int = (int) get_comments_number( get_the_ID() );
        
        // Comments Populated
        if ( $comments_count_int >= 1 ) {
            
            $comments_count_obj_a_link = '';

            $comments_count_obj_a = sprintf( get_comments_popup_link(
                // Comments Count: Zero
                '',

                // Comments Count: Single
                $comments_count_single_txt,

                // Comments Count: Multiple
                $comments_count_multi_txt,

                // Class Name for <a> (WP-Generated or WPG)
                'a'.' '.$comments_count_axn_css.'---a',

                // Comment Creation Disabled
                ''
            ) );
            
            $wpg_setting = true;
            
            $a_attr_setting = '';

        // Comments Empty
        } else {
            
            /* If there are no Comments, make the text a link like get_comments_popup_link(). */
            
            /* If Comments Actions Snippet is in index, use permalink. */
            if ( ! is_singular() ) {
                $comments_count_obj_a_link = esc_url( get_permalink() );
            } else {
                $comments_count_obj_a_link = '';
            }
            
            $comments_count_obj_a = $comments_count_zero_txt;
            
            $wpg_setting = false;
            
            $a_attr_setting = array(
                'a' => array(
                    'href'  => $comments_count_obj_a_link . '#comments',
                ),
            );
        
        }
        
        // R: Comments Count
        $comments_count_obj = htmlok( array(
            'name'      => 'Comments Count',
            'structure' => array(
                'type'      => 'object',
                'subtype'   => 'action item',
                'linked'    => true,
                'wpg'       => $wpg_setting,
                'attr'      => $a_attr_setting,
            ),
            'css'       => $comments_count_axn_css,
            'content'   => array(
                'object'    => $comments_count_obj_a,

            ),
        ) );
        
        // R: Comments Population
        $comments_population_cp = htmlok( array(
            'name'      => 'Comments Population',
            'structure' => array(
                'type'      => 'component',
            ),
            'css'       => 'comments-population',
            'content'   => array(
                'component' => $comments_count_obj,
            ),
        ) );
        
        
        // Comment Creation Enabled
        if ( comments_open() ) {
            
            $respond_hash = '#respond';
            $comment_hash = '#comment';

            // Add Comment Action Anchor Href
            if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {
                if ( is_singular() ) {
                    $add_comment_axn_a_href = $respond_hash;
                } else {
                    $add_comment_axn_a_href = esc_url( get_permalink() ) . $respond_hash;
                }
            } else {
                if ( is_singular() ) {
                    $add_comment_axn_a_href = $comment_hash;
                } else {
                    $add_comment_axn_a_href = esc_url( get_permalink() ) . $comment_hash;
                }
            }
                
            // R: Add Comment
            $add_comment_axn_obj = htmlok( array(
                'name'      => 'Add Comment',
                'structure' => array(
                    'type'      => 'object',
                    'subtype'   => 'action item',
                    'linked'    => true,
                    'layout'    => 'inline',
                    'attr'      => array(
                        'a'         => array(
                            'href'      => $add_comment_axn_a_href,
                            'title'     => esc_html__( 'Add Comment', 'applicator' ),
                        ),
                    ),
                ),
                'css'       => 'add-com-axn',
                'content'   => array(
                    'object'    => array(
                        array(
                            'txt' => esc_html__( 'Add', 'applicator' ),
                        ),
                        array(
                            'sep' => $GLOBALS['space_sep'],
                            'txt' => esc_html__( 'Comment', 'applicator' ),
                        ),
                    ),
                    'before'    => $GLOBALS['space_sep'],
                ),
            ) );

            
            if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {
                
                // R: Sign In Required
                $sign_in_required_label_obj = htmlok( array(
                    'name'      => 'Sign In Required',
                    'structure' => array(
                        'type'      => 'object',
                        'subtype'   => 'note',
                        'layout'    => 'inline',
                    ),
                    'content'   => array(
                        'object'    => esc_html__( '(requires Sign In)', 'applicator' ),
                        'before'    => $GLOBALS['space_sep'],
                        
                    ),
                ) );
            
            } else {
                $sign_in_required_label_obj = '';
            }

            $comment_creation_ability_content = $add_comment_axn_obj. $sign_in_required_label_obj;

        // Comment Creation Disabled
        } else {
        
            // R: Commenting Disabled Note
            $commenting_disabled_note_obj = htmlok( array(
                'name'      => 'Commenting Disabled',
                'structure' => array(
                    'type'      => 'object',
                    'subtype'   => 'note',
                ),
                'content'   => array(
                    'object' => '<p>' . esc_html__( 'Commenting is disabled.', 'applicator' ) . '</p>',
                ),
            ) );
            
            $comment_creation_ability_content = $commenting_disabled_note_obj;
            
        }
        
        
        // R: Comment Creation Ability
        $comment_creation_ability_cp = htmlok( array(
            'name'      => 'Comment Creation Ability',
            'structure' => array(
                'type'      => 'component',
            ),
            'css'       => 'comment-crt-ability',
            'content'   => array(
                'component' => $comment_creation_ability_content,
            ),
        ) );
        
        
        /*
        We have two statuses of Comments Population: Populated and Empty.
        Under Populated: Single and Multi.
        Under Empty: Zero
        */
        // Comments Population Status Class Names
        $comments_population_populated_css = 'populated';
        $comments_population_populated_single_css = 'single';
        $comments_population_populated_multiple_css = 'multiple';
        
        $comments_population_empty_css = 'empty';
        $comments_population_empty_zero_css = 'zero';
        
        // Comment Creation Ability Status Class Names
        $comment_creation_ability_enabled_css = 'enabled';
        $comment_creation_ability_disabled_css = 'disabled';
        
        
        // Conditionals for Comments Population Class Names
        if ( $comments_count_int == 1 ) {
            
            $comments_population_status_css = $comments_population_pri_css . '--' . $comments_population_populated_css . ' ' . $comments_population_pri_css . '--' . $comments_population_populated_css . '--' . $comments_population_populated_single_css;
        
        } elseif ( $comments_count_int > 1 ) {
            
            $comments_population_status_css = $comments_population_pri_css . '--' . $comments_population_populated_css . ' ' . $comments_population_pri_css . '--' . $comments_population_populated_css . '--' . $comments_population_populated_multiple_css;
        
        } elseif ( $comments_count_int == 0 ) {
            
            $comments_population_status_css = $comments_population_pri_css . '--' . $comments_population_empty_css . ' ' . $comments_population_pri_css . '--' . $comments_population_empty_css . '--' . $comments_population_empty_zero_css;
        }
        
        /* Conditionals for Comment Creation Ability Class Names */
        if ( comments_open() ) {
            $comment_creation_ability_status_css = $comment_creation_ability_pri_css . '--' . $comment_creation_ability_enabled_css;
        } else {
            $comment_creation_ability_status_css = $comment_creation_ability_pri_css . '--' . $comment_creation_ability_disabled_css;
        }
        
        
        // R: Comments Actions Snippet
        $comments_actions_snippet_cp = htmlok( array(
            'name'      => 'Comments Actions Snippet',
            'structure' => array(
                'type'      => 'component',
            ),
            'root_css'  => $comments_population_status_css. ' '. $comment_creation_ability_status_css,
            'css'       => 'comments-axns-snip',
            'content'   => array(
                'component' => array(
                    $comments_population_cp,
                    $comment_creation_ability_cp,
                ),
            ),
        ) );
        
        return $comments_actions_snippet_cp;
        
    }
}