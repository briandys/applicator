<?php // Main Content Header

if ( ! function_exists( 'applicator_main_content_header' ) )
{
    function applicator_main_content_header()
    {
        echo applicator_page_nav();

        echo applicator_entry_nav();

        echo applicator_main_content_header_aside(); // Main Content Header Aside | inc > tags > aside.php
    }
}