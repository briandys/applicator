<?php // Main Content Footer

if ( ! function_exists( 'applicator_main_content_footer' ) )
{
    function applicator_main_content_footer()
    {
        echo applicator_entry_nav();
        
        echo applicator_page_nav();
    }
}