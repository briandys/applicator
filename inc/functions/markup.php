<?php // Applicator HTML Markup

/* References:
https://developer.wordpress.org/reference/functions/wp_list_categories/
https://codex.wordpress.org/Function_Reference/wp_parse_args
https://developer.wordpress.org/reference/functions/apply_filters/
https://nacin.com/2010/05/11/in-wordpress-prefix-everything/
https://codex.wordpress.org/Function_Reference/sanitize_title

*/

function applicator_html( $args = '' ) {
    $defaults = array(
        'type'      => '', // component | object
        'name'      => '', // Name of Element
        'pri_css'   => '', // Full Name of CSS
        'sec_css'   => '', // Short Name of CSS
        'content'   => '', // HTML or Text Content
        'echo'      => FALSE, // Return by Default
    );
    
    $r = wp_parse_args( $args, $defaults );
    
    // Type
    if ( 'component' == $r['type'] ) {
        $type_name = '';
        $type_css = 'cp';
    } else if ( 'object' == $r['type'] ) {
        $type_name = 'Object';
        $type_css = 'obj';
    } else {
        $type_css = '';
    }
    
    $sanitized_name = sanitize_title( $r['name'] );
    
    // Markup
    $output = '';
    $output .= '<div class="' . $type_css . ' ' . esc_attr( $sanitized_name ) . '-' . $type_css . ' ' . esc_attr( $r['pri_css'] ) . '" data-name="' . esc_attr( $r['name'] ) . ' ' . $type_name . '">';
    
    if ( 'component' == $r['type'] ) {
        $output .= '<div class="h ' . esc_attr( $r['sec_css'] ) . '---h">' . esc_html( $r['name'] ) . '</div>';
        $output .= '<div class="ct ' . esc_attr( $r['sec_css'] ) . '---ct">' . $r['content'] . '</div>';
    } else {
        $output .= $r['content'];
    }
    
    $output .= '</div><!-- ' . esc_html( $r['name'] ) . ' -->';
    
    $html = apply_filters( 'applicator_html', $output, $args );
    
    if ( ! $r['echo'] ) {
        return $html;
    } else {
        echo $html;
    }
}

<?php
//----- Content
$wbp_title_sec_css = 'wbp-title';

$wbp_title_ct = '<h1>Site Title</h1>';
$wbp_title_ct .= '<span>Sooper Content</span>';

// Info
$wbp_title_html = applicator_html( array(
    'type'      => 'component',
    'name'      => 'Web Product Title',
    'pri_css'   => 'site-title',
    'sec_css'   => $wbp_title_sec_css,
    'content'   => $wbp_title_ct,
) );


// Content
$wbp_desc_sec_css = 'wbp-desc';

$wbp_desc_mu = '<a class="%4$s---a" href="%3$s" title="%5$s">';
    $wbp_desc_mu .= '<span class="%4$s---a_l">';
        $wbp_desc_mu .= '<span class="txt %2$s---txt">';
            $wbp_desc_mu .= '%1$s';
        $wbp_desc_mu .= '</span>';
    $wbp_desc_mu .= '</span>';
$wbp_desc_mu .= '</a>';

$wbp_desc_ct = sprintf( $wbp_desc_mu,
    esc_html__( 'This is the description.', 'applicator' ),
        'desc',
    esc_url( '#' ),
    $wbp_desc_sec_css,
    esc_attr__( 'This is the Title.', 'applicator' )
);

// Info
$wbp_desc_html = applicator_html( array(
    'type'      => 'object',
    'name'      => 'Web Product Description',
    'pri_css'   => '',
    'sec_css'   => $wbp_desc_sec_css,
    'content'   => $wbp_desc_ct,
) );
?>

<?php echo $wbp_title_html; ?>
<?php echo $wbp_desc_html; ?>

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