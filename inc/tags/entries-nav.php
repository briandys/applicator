<?php
//------------------------- Entries Navigation
// index.php

if ( ! function_exists('applicator_entries_nav' ) ) :
    function applicator_entries_nav() {
        
        $previous = get_adjacent_post( false, '', true );
        $next     = get_adjacent_post( false, '', false );

        if ( ! $next && ! $previous ) {
            return;
        }
        
        // Next Label
        $next_label = '<span class="a-l">';
            $next_label .= '<span class="pred-l">';
                $next_label .= __( 'Next', 'applicator' );
            $next_label .= '</span> ';
            $next_label .= '<span class="subj-l">';
                $next_label .= __( 'Entry', 'applicator' );
            $next_label .= '</span>';
            $next_label .= '<span class="colon-l">';
                $next_label .= __( ':', 'applicator' );
            $next_label .= '</span> ';
            $next_label .= '<span class="entry-title--l">';
                $next_label .= __( '%title', 'applicator' );
            $next_label .= '</span>';
        $next_label .= '</span>';
        
        // Previous Label
        $prev_label = '<span class="a-l">';
            $prev_label .= '<span class="pred-l">';
                $prev_label .= __( 'Previous', 'applicator' );
            $prev_label .= '</span> ';
            $prev_label .= '<span class="subj-l">';
                $prev_label .= __( 'Entry', 'applicator' );
            $prev_label .= '</span>';
            $prev_label .= '<span class="colon-l">';
                $prev_label .= __( ':', 'applicator' );
            $prev_label .= '</span> ';
            $prev_label .= '<span class="entry-title--l">';
                $prev_label .= __( '%title', 'applicator' );
            $prev_label .= '</span>';
        $prev_label .= '</span>';
        
        if ( ! is_attachment() ) : ?>

            <div class="nav entries-nav" role="navigation">
                <div class="entries-nav--cr">
                    <div class="entries-nav--h"><span class="h-l"><?php esc_html_e( 'Entries Navigation', 'applicator' ); ?></span></div>
                    <ul class="grp entries-nav--grp">
                        <?php if ( get_next_post_link() ) : ?>
                        <li class="item entries-nav--item next--entries-nav--item">
                            <?php next_post_link( '%link', $next_label ); ?>
                        </li>
                        <?php endif; ?>
                        <?php if ( get_previous_post_link() ) : ?>
                        <li class="item entries-nav--item prev--entries-nav--item">
                            <?php previous_post_link( '%link', $prev_label ); ?>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div><!-- entries-nav -->
        
        <?php endif;
    }
endif;