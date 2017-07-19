<?php // Entries Navigation | index.php

if ( ! function_exists('apl_entry_nav' ) ) {
    function apl_entry_nav() {
        
        
        if ( ! is_attachment() ) {
        
        
            // Variables
            $previous = get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous ) {
                return;
            }
            
            
            // MU: Entry Navigation Item Anchor Label Template Markup
            $entry_navi_a_l_mu = '';
            $entry_navi_a_l_mu .= '<span class="a_l">';
                $entry_navi_a_l_mu .= '<span class="line">';
                    $entry_navi_a_l_mu .= '<span class="txt">';
                        $entry_navi_a_l_mu .= '%1$s';
                    $entry_navi_a_l_mu .= '</span>';
                    $entry_navi_a_l_mu .= ' <span class="txt">';
                        $entry_navi_a_l_mu .= '%2$s';
                    $entry_navi_a_l_mu .= '</span>';
                    $entry_navi_a_l_mu .= '%3$s';
                $entry_navi_a_l_mu .= '</span>';
                $entry_navi_a_l_mu .= ' <span class="line">';
                    $entry_navi_a_l_mu .= '<span class="txt">';
                        $entry_navi_a_l_mu .= '%4$s';
                    $entry_navi_a_l_mu .= '</span>';
                $entry_navi_a_l_mu .= '</span>';
            $entry_navi_a_l_mu .= '</span>';
            
            
            // Next Entry Navigation Item
            $next_entry_navi = sprintf( $entry_navi_a_l_mu,
                'Next',
                'Entry',
                $GLOBALS['colon_sep'],
                '%title'
            );
            
            
            // MU: Entry Navigation Group Template Markup
            $entry_nav_group_mu = '';
            $entry_nav_group_mu .= '<ul class="grp entry-nav---grp">';
            if ( get_next_post_link() ) {
                $entry_nav_group_mu .= '<li>';
                    ob_start();
                    next_post_link( '%link', $next_entry_navi );
                    $next_post_link_ob_content = ob_get_contents();
                    ob_end_clean();
                    
                $entry_nav_group_mu .= '</li>';
            }
            $entry_nav_group_mu .= '</ul>';


            // R: Entry Navigation
            $entry_navigation_cp = htmlok( array(
                'name'      => 'Entry',
                'structure' => array(
                    'type'      => 'component',
                    'subtype'   => 'navigation',
                    'linked'    => true,
                    'attr'      => array(
                        'a'         => array(
                            'href'      => 'link',
                        ),
                    ),
                ),
                'css'       => 'entry-nav',
                'content'   => array(
                    'component' => $entry_nav_group_mu,
                ),
            ) );

            return $entry_navigation_cp;
        }
        
        
        
        
        
        
        $adjacent_navi_mu = '<span class="a_l %4$s-navi---a_l" rel="%5$s" title="%1$s"><span class="prop adjacent-navi---prop"><span class="word %5$s---word">%2$s</span> <span class="word entry---word">%3$s</span></span><span class="sep colon-sep">:</span> <span class="val post-title---val">%6$s</span></span>';
        
        $next_entry_navi = sprintf( $adjacent_navi_mu,
            esc_attr__( 'Next Entry', 'applicator' ),
            esc_html__( 'Next', 'applicator' ),
            esc_html__( 'Entry', 'applicator' ),
            'next-entry',
            'next',
            '%title'
        );
        
        $prev_entry_navi = sprintf( $adjacent_navi_mu,
            esc_attr__( 'Previous Entry', 'applicator' ),
            esc_html__( 'Previous', 'applicator' ),
            esc_html__( 'Entry', 'applicator' ),
            'prev-entry',
            'prev',
            '%title'
        );
        
        if ( ! is_attachment() ) { ?>

            <div class="nav entry-nav" role="navigation" aria-label="<?php esc_html_e( 'Entry Navigation', 'applicator' ); ?>" data-name="Entry Navigation">
                <div class="cr entry-nav---cr">
                    <div class="h entry-nav---h"><span class="h_l entry-nav---h_l"><?php esc_html_e( 'Entry Navigation', 'applicator' ); ?></span></div>
                    <div class="ct entry-nav---ct">
                        <div class="ct_cr entry-nav---ct_cr">
                            <ul class="grp entry-nav--grp">
                                <?php if ( get_next_post_link() ) { ?>
                                <li class="item obj navi next-entry-navi" data-name="Next Entry Nav Item">
                                    <?php next_post_link( '%link', $next_entry_navi ); ?>
                                </li>
                                <?php }
                                if ( get_previous_post_link() ) { ?>
                                <li class="item obj navi prev-entry-navi" data-name="Previous Entry Nav Item">
                                    <?php previous_post_link( '%link', $prev_entry_navi ); ?>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div><!-- ct -->
                </div>
            </div><!-- Entry Navigation -->
        
        <?php }
    }
}