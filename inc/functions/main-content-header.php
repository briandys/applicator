<?php

/**
 * Main Content Header
 *
 * @package WordPress
 * @subpackage Applicator
 * @since 1.0
 */





function applicator_main_content_header()
{
    echo applicator_page_nav();
    echo applicator_entry_nav();
    echo applicator_main_content_header_aside();
}