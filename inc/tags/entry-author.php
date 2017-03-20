<?php

//------------------------- Author
// content.php

if ( ! function_exists( 'applicator_entry_author' ) ) :
    function applicator_entry_author() {
        
        $entry_author = '<div class="entry-author">';
            $entry_author .= '<div class="entry-author--cr">';
                $entry_author .= '<span class="entry-author--l">';
                    $entry_author .= '<span class="entry-author--pred-l">' . esc_html__( '%2$s', 'applicator' ) . '</span>';
                    $entry_author .= '<span class="entry-author--subj-l">%1$s</span>';
                $entry_author .= '</span>';
            $entry_author .= '</div>';
        $entry_author .= '</div>';
        
        $author_name_avatar = '<span class="author-name--avatar">';
            $author_name_avatar .= '<a class="a author-name--avatar--a url fn n" href="%2$s" title="%1$s">';
                $author_name_avatar .= '<span class="author-name--avatar--l">';
                    $author_name_avatar .= '<span class="author-name--l">%1$s</span>';
                    $author_name_avatar .= '<span class="author-avatar--img">%3$s</span>';
                $author_name_avatar .= '</span>';
            $author_name_avatar .= '</a>';
        $author_name_avatar .= '</span>';
        
        $author_name_avatar = sprintf( $author_name_avatar,
            get_the_author(),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            get_avatar(
                get_the_author_meta( 'ID' ),
                $size = '48',
                $default = '',
                $alt = get_the_author_meta( 'display_name' ) . ' ' . __( 'Avatar', 'applicator' )
            )
        );
        
        printf( $entry_author,
            $author_name_avatar,
            __( 'Published by ', 'applicator')
        );
        
}
endif;