<?php
/*
// Component
$GLOBALS['c_mu'] = '<div class="c p %2$s" data-name="%1$s"><div class="h"><span class="l">%1$s</span></div><div class="ct">%3$s</div></div><!-- %1$s -->';

// Object
$GLOBALS['o_mu'] = '<div class="o p %2$s-obj" data-name="%1$s">%3$s</div><!-- %1$s -->';

// Frame
$GLOBALS['f_mu'] = '<div class="f p %1$s-f">%2$s</div>';


// Text
$GLOBALS['t_mu'] = '<span class="t">%1$s</span>';


// Sample Constuctor        
$wbp_title_obj_a = sprintf( '<a class="a" href="%2$s">' . $GLOBALS['t_mu'] . '</a>',
    'The Title',
    '#url'
);

$wbp_title_obj_h = sprintf( '<h1 class="h">%1$s</h1>',
    $wbp_title_obj_a
);

$wbp_title_obj_NAME = 'Web Product Title';
$wbp_title_obj = sprintf( $GLOBALS['o_mu'],
    $wbp_title_obj_NAME,
    'wbp-title',
    $wbp_title_obj_h
);

// Web Product Description
// Hello, this is the description of WordPress.

$wbp_desc_obj_a = sprintf( '<a class="a" href="%2$s">' . $GLOBALS['t_mu'] . '</a>',
    'Hello, this is the description of WordPress.',
    '#url'
);

$wbp_desc_obj_h = sprintf( '<span class="g">%1$s</span>',
    $wbp_desc_obj_a
);

$wbp_desc_obj_NAME = 'Web Product Description';
$wbp_desc_obj = sprintf( $GLOBALS['o_mu'],
    $wbp_desc_obj_NAME,
    'wbp-desc',
    $wbp_desc_obj_h
);

$wbp_title_desc_f = sprintf( $GLOBALS['f_mu'],
    'wbp-title-desc',
    $wbp_title_obj . $wbp_desc_obj
);

printf( $wbp_title_desc_f );
*/