<?php // Main Content Aside
if ( is_active_sidebar( 'main-content-aside' )  ) {
    
    $secondary_content_aside_cn = htmlok( array(
        'name'      => 'Secondary Content',
        'structure' => array(
            'type'      => 'constructor',
        ),
        'content'       => array(
            'constructor'   => applicator_func_main_content_aside(),
        ),
        'echo'      => true,
    ) );

}