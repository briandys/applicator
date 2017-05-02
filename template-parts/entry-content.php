<?php

//------------------------- Entry Content
// To enable Child Themes to hook up conditionals in displaying single content without duplicating index.php

if ( ! function_exists( 'apl_entry_content' ) ) :	
    
    function apl_entry_content() {
        get_template_part( 'content', get_post_format() );
    }

endif;