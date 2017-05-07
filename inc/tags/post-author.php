<?php // Post Author | content.php

if ( ! function_exists( 'apl_func_post_author' ) ) {
    function apl_func_post_author() {
        
        $post_author_avatar_default_pre_css = 'post-author-avatar-default';
        
        if ( get_option( 'avatar_default' ) == 'blank' ) {
            $post_author_avatar_default_css = $post_author_avatar_default_pre_css . '--blank';
        } else {
            $post_author_avatar_default_css = $post_author_avatar_default_pre_css . '--custom';
        }
        
        // Markup
        $post_pub_author_mu = '<div class="cp %2$s" data-name="%1$s">';
            $post_pub_author_mu .= '<div class="cr %3$s---cr">';
                $post_pub_author_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%4$s</span></div>';
                $post_pub_author_mu .= '<div class="ct %3$s---ct">';
                        $post_pub_author_mu .= '<div class="ct_cr %3$s---ct_cr">%5$s %6$s</div>';
                $post_pub_author_mu .= '</div><!-- ct -->';
            $post_pub_author_mu .= '</div>';
        $post_pub_author_mu .= '</div>';
        
        // Markup
        $post_author_mu = '<div class="cp %2$s' . ' ' . $post_author_avatar_default_css . '" data-name="%1$s">';
            $post_author_mu .= '<div class="cr %3$s---cr">';
                $post_author_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%4$s</span></div>';
                $post_author_mu .= '<div class="ct %3$s---ct">';
                        $post_author_mu .= '<div class="ct_cr %3$s---ct_cr">%5$s %6$s</div>';
                $post_author_mu .= '</div><!-- ct -->';
            $post_author_mu .= '</div>';
        $post_author_mu .= '</div>';
        
        // Markup
        $post_pub_lbl_mu = '<span class="obj %2$s" data-name="%1$s">';
            $post_pub_lbl_mu .= '<span class="g %3$s---g"><span class="g_l %3$s---g_l">%4$s</span></span>';
        $post_pub_lbl_mu .= '</span>';
        
        // Content
        $post_pub_lbl = sprintf( $post_pub_lbl_mu,
            'Published By Label Object',
            'published-by-label-obj',
            'pub-lbl-obj',
            esc_html__( 'Published by', 'applicator' )
        );
        
        // Markup
        $post_author_name_mu = '<span class="obj %2$s" title="%4$s" data-name="%1$s">';
            $post_author_name_mu .= '<span class="g %3$s---g"><span class="g_l %3$s---g_l"><a class="a %3$s---a" href="%6$s">';
            $post_author_name_mu .= '<span class="a_l %3$s---a_l"><span class="word %4$s---word">%5$s</span></span></a></span></span>';
        $post_author_name_mu .= '</span>';
        
        // Content
        $post_author_name = sprintf( $post_author_name_mu,
            'Post Author Name Object',
            'post-author-name-obj',
            'post-author-name-obj',
            'author-name',
            get_the_author(),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
        );
        
        // Markup
        $post_author_avatar_mu = '<span class="obj %2$s" title="%5$s" data-name="%1$s">';
            $post_author_avatar_mu .= '<a class="a %3$s---a" href="%6$s"><span class="a_l %3$s---a_l"><span class="ee--img %3$s---ee--img">%4$s</span></span></a>';
        $post_author_avatar_mu .= '</span>';
        
        // Content
        $post_author_avatar = sprintf( $post_author_avatar_mu,
            'Post Author Avatar Object',
            'post-author-avatar-obj',
            'post-author-avatar-obj',
            get_avatar(
                get_the_author_meta( 'ID' ),
                $size = '48',
                $default = '',
                $alt = get_the_author_meta( 'display_name' ) . ' ' . esc_attr__( 'Avatar', 'applicator' )
            ),
            get_the_author(),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
        );
        
        // Content
        $post_author = sprintf( $post_author_mu,
            'Post Author',
            'post-author',
            'post-author',
            esc_html__( 'Post Author', 'applicator' ),
            $post_author_name,
            $post_author_avatar
        );
        
        // Content
        printf( $post_pub_author_mu,
            'Post Published Author',
            'post-published-author',
            'post-pub-auth',
            esc_html__( 'Post Published Author', 'applicator' ),
            $post_pub_lbl,
            $post_author
        );
        
    }
}