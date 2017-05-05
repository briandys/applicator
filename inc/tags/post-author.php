<?php // Post Author | content.php

if ( ! function_exists( 'apl_func_post_author' ) ) {
    function apl_func_post_author() {
        
        $post_author_mu = '<div class="cp %2$s" data-name="Post Author">';
            $post_author_mu .= '<div class="cr %3$s---cr">';
                $post_author_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%1$s</span></div>';
                $post_author_mu .= '<div class="ct %3$s---ct">';
                        $post_author_mu .= '<div class="ct_cr %3$s---ct_cr">%4$s %5$s %6$s</div>';
                $post_author_mu .= '</div><!-- ct -->';
            $post_author_mu .= '</div>';
        $post_author_mu .= '</div><!-- Post Author -->';
        
        $pub_lbl_mu = '<span class="obj %2$s" data-name="Published by Label">';
            $pub_lbl_mu .= '<span class="g %3$s---g"><span class="g_l %3$s---g_l">%1$s</span></span>';
        $pub_lbl_mu .= '</span>';
        
        $post_auth_name_mu = '<span class="obj %2$s" title="%1$s" data-name="Post Author Name">';
            $post_auth_name_mu .= '<span class="g %3$s---g"><span class="g_l %3$s---g_l"><a class="a %3$s---a" href="%4$s">';
            $post_auth_name_mu .= '<span class="a_l %3$s---a_l">%1$s</span></a></span></span>';
        $post_auth_name_mu .= '</span>';
        
        $post_auth_avatar_mu = '<span class="obj %2$s" title="%1$s" data-name="Post Author Avatar">';
            $post_auth_avatar_mu .= '<a class="a %3$s---a" href="%4$"><span class="a_l %3$s---a_l"><span class="ee--img %3$s---ee--img">%5$s</span></span></a>';
        $post_auth_avatar_mu .= '</span>';
        
        $pub_lbl = sprintf( $pub_lbl_mu,
            esc_html__( 'Published by', 'applicator' ),
            'published-by-label',
            'pub-lbl'
        );
        
        $post_auth_name = sprintf( $post_auth_name_mu,
            get_the_author(),
            'post-author-name',
            'post-auth-name',
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
        );
        
        $post_auth_avatar = sprintf( $post_auth_avatar_mu,
            get_the_author(),
            'post-author-avatar',
            'post-auth-av',
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            get_avatar(
                get_the_author_meta( 'ID' ),
                $size = '48',
                $default = '',
                $alt = get_the_author_meta( 'display_name' ) . ' ' . esc_attr__( 'Avatar', 'applicator' )
            )
        );
        
        printf( $post_author_mu,
            esc_html__( 'Post Author', 'applicator' ),
            'post-author',
            'post-auth',
            $pub_lbl,
            $post_auth_name,
            $post_auth_avatar
        );
        
    }
}