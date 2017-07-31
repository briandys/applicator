<?php // Main Content Aside
if ( is_active_sidebar( 'main-content-aside' )  ) {
    
    // Secondary Content
    $secondary_content = applicator_htmlok( array(
        'name'      => 'Secondary Content',
        'structure' => array(
            'type'      => 'constructor',
        ),
        'css'       => 'sec-content',
        'content'   => array(
            'constructor'   => applicator_func_main_content_aside(),
        ),
        'echo'      => true,
    ) );
}