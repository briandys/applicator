<?php // Asides


// Main Header Aside
if ( ! function_exists( 'applicator_main_header_aside' ) ) {
    function applicator_main_header_aside() {
        
        $main_header_aside_term = 'main-header-aside';
        
        if ( is_active_sidebar( $main_header_aside_term )  ) {
            
            ob_start();
            dynamic_sidebar( $main_header_aside_term );
            $aside = ob_get_contents();
            ob_end_clean();
            
            $main_header_aside = applicator_htmlok( array(
                'name'      => 'Main Header',
                'structure' => array(
                    'type'          => 'constructor',
                    'subtype'       => 'aside',
                    'elem'          => 'aside',
                    'hr_structure'  => true,
                    'h_elem'        => 'h2',
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
}


// Main Content Header Aside
if ( ! function_exists( 'applicator_main_content_header_aside' ) ) {
    function applicator_main_content_header_aside() {
        
        $main_content_header_aside_term = 'main-content-header-aside';
        
        if ( is_active_sidebar( $main_content_header_aside_term )  ) {
            
            ob_start();
            dynamic_sidebar( $main_content_header_aside_term );
            $aside = ob_get_contents();
            ob_end_clean();
            
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
}


// Main Content Aside
if ( ! function_exists( 'applicator_main_content_aside' ) ) {
    function applicator_main_content_aside() {
        
        $main_content_aside_term = 'main-content-aside';
        
        if ( is_active_sidebar( $main_content_aside_term )  ) {
            
            ob_start();
            dynamic_sidebar( $main_content_aside_term );
            $aside = ob_get_contents();
            ob_end_clean();
            
            $main_content_aside = applicator_htmlok( array(
                'name'      => 'Main Content',
                'structure' => array(
                    'type'          => 'constructor',
                    'subtype'       => 'aside',
                    'elem'          => 'aside',
                    'hr_structure'  => true,
                    'h_elem'        => 'h2',
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
}


// Main Footer Aside
if ( ! function_exists( 'applicator_main_footer_aside' ) ) {
    function applicator_main_footer_aside() {
        
        $main_footer_aside_term = 'main-footer-aside';
        
        if ( is_active_sidebar( $main_footer_aside_term )  ) {
            
            ob_start();
            dynamic_sidebar( $main_footer_aside_term );
            $aside = ob_get_contents();
            ob_end_clean();
            
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
}


// Main Actions
if ( ! function_exists( 'applicator_main_actions' ) ) {
    function applicator_main_actions() {
        
        $main_actions_term = 'main-actions-aside';
        
        if ( is_active_sidebar( $main_actions_term )  ) {
            
            ob_start();
            dynamic_sidebar( $main_actions_term );
            $aside = ob_get_contents();
            ob_end_clean();
            
        }
        else {
            
            // OB: Search
            ob_start();
            get_search_form();
            $search_ob_content = ob_get_contents();
            ob_end_clean();
            
            $aside = $search_ob_content;
            
        }
        
        // E: Main Actions
        $main_actions_cp = applicator_htmlok( array(
            'name'      => 'Main Actions',
            'structure' => array(
                'type'          => 'component',
            ),
            'id'        => 'main-actions',
            'content'   => array(
                'component'   => $aside,
            ),
        ) );
        
        return $main_actions_cp;
    }
}