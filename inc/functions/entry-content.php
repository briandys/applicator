<?php

// Entry Content
// To enable Child Themes to hook up conditionals in displaying single content without duplicating index.php

function applicator_entry_content()
{
    get_template_part( 'content', get_post_format() );
}