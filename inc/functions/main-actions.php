<?php // Main Actions

if ( ! function_exists( 'applicator_main_actions' ) ) {
    function applicator_main_actions() {
        
        // OB: Search
        ob_start();
        get_search_form();
        $search_ob_content = ob_get_contents();
        ob_end_clean();
        
        
        // E: Main Actions
        $main_actions_cp = applicator_htmlok( array(
            'name'      => 'Main Actions',
            'structure' => array(
                'type'          => 'component',
            ),
            'id'        => 'main-actions',
            'content'   => array(
                'component'   => array(

                    // Main Search
                    $search_ob_content,
                ),
            ),
            'echo'      => true,
        ) );
        
    }
    add_action( 'applicator_hook_after_main_nav', 'applicator_main_actions');
}