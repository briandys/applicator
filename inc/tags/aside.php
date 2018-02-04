<?php // Asides


// Main Header Aside
function applicator_main_header_aside()
{

    $main_header_aside_term = 'main-header-aside';

    if ( is_active_sidebar( $main_header_aside_term )  ) {

        ob_start();
        dynamic_sidebar( $main_header_aside_term );
        $aside = ob_get_clean();

        $main_header_aside = applicator_htmlok( array(
            'name'      => 'Main Header',
            'structure' => array(
                'type'          => 'constructor',
                'subtype'       => 'aside',
                'elem'          => 'aside',
                'hr_structure'  => true,
                'h_elem'        => 'h2',
                'attr'          => array(
                    'elem'          => array(
                        'role'          => 'complementary',
                    ),
                ),
            ),
            'id'        => $main_header_aside_term,
            'css'       => 'main-hr',
            'content'   => array(
                'constructor'   => $aside,
            ),
        ) );

        return $main_header_aside;
    }
}


// Main Actions
function applicator_main_actions()
{

    $main_actions_term = 'main-actions-aside';

    if ( is_active_sidebar( $main_actions_term )  ) {

        ob_start();
        dynamic_sidebar( $main_actions_term );
        $aside = ob_get_clean();

        // E: Main Actions
        $main_actions_cp = applicator_htmlok( array(
            'name'      => 'Main Actions',
            'structure' => array(
                'type'          => 'constructor',
                'subtype'       => 'aside',
                'elem'          => 'aside',
                'hr_structure'  => true,
                'h_elem'        => 'h3',
            ),
            'id'        => 'main-actions',
            'content'   => array(
                'constructor'   => $aside,
            ),
        ) );

        return $main_actions_cp;
    }
}


// Main Banner
function applicator_main_banner()
{

    $main_banner_term = 'main-banner-aside';

    if ( is_active_sidebar( $main_banner_term )  ) {

        ob_start();
        dynamic_sidebar( $main_banner_term );
        $aside = ob_get_clean();


        // E: Main Banner
        $main_banner_cp = applicator_htmlok( array(
            'name'      => 'Main Banner',
            'structure' => array(
                'type'          => 'constructor',
                'subtype'       => 'aside',
                'elem'          => 'aside',
                'hr_structure'  => true,
                'h_elem'        => 'h3',
            ),
            'id'        => 'main-banner',
            'content'   => array(
                'constructor'   => $aside,
            ),
        ) );

        return $main_banner_cp;
    }
}


// Main Content Header Aside
function applicator_main_content_header_aside()
{

    $main_content_header_aside_term = 'main-content-header-aside';

    if ( is_active_sidebar( $main_content_header_aside_term )  ) {

        ob_start();
        dynamic_sidebar( $main_content_header_aside_term );
        $aside = ob_get_clean();

        $main_content_header_aside = applicator_htmlok( array(
            'name'      => 'Main Content Header',
            'structure' => array(
                'type'          => 'constructor',
                'subtype'       => 'aside',
                'elem'          => 'aside',
                'hr_structure'  => true,
                'h_elem'        => 'h3',
            ),
            'id'        => $main_content_header_aside_term,
            'css'       => 'main-ct-hr',
            'content'   => array(
                'constructor'   => $aside,
            ),
        ) );

        return $main_content_header_aside;
    }
}


// Main Content Aside
function applicator_main_content_aside()
{

    $main_content_aside_term = 'main-content-aside';

    if ( is_active_sidebar( $main_content_aside_term )  ) {

        ob_start();
        dynamic_sidebar( $main_content_aside_term );
        $aside = ob_get_clean();

        $main_content_aside = applicator_htmlok( array(
            'name'      => 'Main Content',
            'structure' => array(
                'type'          => 'constructor',
                'subtype'       => 'aside',
                'elem'          => 'aside',
                'hr_structure'  => true,
                'h_elem'        => 'h2',
                'attr'          => array(
                    'elem'          => array(
                        'role'          => 'complementary',
                    ),
                ),
            ),
            'id'        => $main_content_aside_term,
            'css'       => 'main-ct',
            'content'   => array(
                'constructor'   => $aside,
            ),
        ) );

        return $main_content_aside;
    }
}


// Main Footer Aside
function applicator_main_footer_aside()
{

    $main_footer_aside_term = 'main-footer-aside';

    if ( is_active_sidebar( $main_footer_aside_term )  ) {

        ob_start();
        dynamic_sidebar( $main_footer_aside_term );
        $aside = ob_get_clean();

        $main_footer_aside = applicator_htmlok( array(
            'name'      => 'Main Footer',
            'structure' => array(
                'type'          => 'constructor',
                'subtype'       => 'aside',
                'elem'          => 'aside',
                'hr_structure'  => true,
                'h_elem'        => 'h3',
            ),
            'id'        => $main_footer_aside_term,
            'css'       => 'main-fr',
            'content'   => array(
                'constructor'   => $aside,
            ),
        ) );

        return $main_footer_aside;
    }
}