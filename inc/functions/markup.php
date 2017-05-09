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
    
    $type_name = '';
    $type_css = '';
    $type_trailing_css = '';
    
    $name = '';
    $sanitized_name = '';
    $pri_css = '';
    $sec_css = '';
    
    $component_variations = array( 'component', 'cp', 'c' );
    $object_variations = array( 'object', 'obj', 'o' );
    
    
    // Type
    if ( in_array( $r['type'], $component_variations, true ) ) {
        $type_css = 'cp ';
    } else if ( in_array( $r['type'], $object_variations, true ) ) {
        $type_name = ' Object';
        $type_css = 'obj ';
        $type_trailing_css = '-obj';
    }
    
    if ( ! empty( $r['name'] ) ) {
        $name = preg_replace('/\s\s+/', ' ', trim( $r['name'] ) );
        $sanitized_name = sanitize_title( ' ' . $r['name'] );
    }
    
    if ( ! empty( $r['pri_css'] ) ) {
        $pri_css = ' ' . trim( $r['pri_css'] );
    }
    
    if ( ! empty( $r['sec_css'] ) ) {
        $sec_css = ' ' . trim( $r['sec_css'] );
    }
    
    // Markup
    $output = '';
    $output .= '<div class="' . $type_css . esc_attr( $sanitized_name ) . $type_trailing_css . esc_attr( $pri_css ) . '" data-name="' . esc_attr( $name ) . $type_name . '">';
    
    if ( in_array( $r['type'], $component_variations, true ) ) {
        $output .= '<div class="h ' . esc_attr( $sec_css ) . '---h">' . esc_html( $name ) . '</div>';
        $output .= '<div class="ct ' . esc_attr( $sec_css ) . '---ct">' . $r['content'] . '</div>';
    } else {
        $output .= $r['content'];
    }
    
    $output .= '</div><!-- ' . esc_html( $name ) . $type_name . ' -->';
    
    $html = apply_filters( 'applicator_html', $output, $args );
    
    if ( $r['echo'] ) {
        echo $html;
    } else {
        return $html;
    }
}

/*

$wbp_main_name_sec_css = 'wpb-main-name';
                            
$wbp_main_name_mu = '<h1 class="h %4$s---h site-title">';
    $wbp_main_name_mu .= '<a class="a %4$s---a" href="%3$s" rel="home" title="%1$s">';
        $wbp_main_name_mu .= '<span class="a_l %4$s---a_l">';
            $wbp_main_name_mu .= '<span class="txt %2$s---txt">';
                $wbp_main_name_mu .= '%1$s';
            $wbp_main_name_mu .= '</span>';
        $wbp_main_name_mu .= '</span>';
    $wbp_main_name_mu .= '</a>';
$wbp_main_name_mu .= '</h1>';

$wbp_main_name_ct = sprintf( $wbp_main_name_mu,
    get_bloginfo( 'name' ),
        'wbp-name',
    esc_url( home_url( '/' ) ),
    $wbp_main_name_sec_css
);

$wbp_main_name_html = applicator_html( array (
    'type'      => 'o',
    'name'      => 'Web Product Main Name',
    'sec_css'   => $wbp_main_name_sec_css,
    'content'   => $wbp_main_name_ct,
) );

echo $wbp_main_name_html;

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