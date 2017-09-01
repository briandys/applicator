<?php
$unique_id = esc_attr( uniqid( 'search-term-creation-input-text-' ) );


$search_form_cp = applicator_htmlok( array(
    'name'      => 'Search',
    'structure' => array(
        'type'      => 'component',
        'subtype'   => 'form',
        'attr'      => array(
            'elem'      => array(
                'role'      => 'search',
                'method'    => 'get',
                'action'    => esc_url( home_url( '/' ) ),
            ),
        ),
    ),
    'content'   => array(
        'compound'  => array(
            array(
                'name'      => esc_html__( 'Search Term Creation', 'applicator' ),
                'css'       => 'search-term-crt',
                'group'     => array(
                    array(
                        'name'      => 'Search',
                        'structure' => array(
                            'type'      => 'textbox',
                            'label'     => esc_html__( 'Search', 'applicator' ),
                            'attr'      => array(
                                'name'          => 's',
                                'value'         => get_search_query(),
                                'required'      => '',
                                'placeholder'   => esc_html__( 'Search', 'applicator' ),
                            ),
                            'id'        => esc_attr( uniqid( 'search-term-crt-search-text-input---input-text-' ) ),
                        ),
                    ),
                ),
                'actions'   => array(
                    array(
                        'name'  => 'Search',
                        'txt'   => array(
                            esc_html__( 'Go', 'applicator' ),
                        ),
                        'root_css'  => 'primary-axn',
                        'structure' => array(
                            'type'      => 'submit',
                        ),
                    ),
                    array(
                        'name'  => 'Reset',
                        'txt'   => array(
                            esc_html__( 'Reset', 'applicator' ),
                        ),
                        'root_css'  => 'secondary-axn',
                        'structure' => array(
                            'type'      => 'reset',
                        ),
                    ),
                ),
            ),
        ),
    ),
) );


$search_cp = applicator_htmlok( array(
    'name'      => 'Search',
    'structure' => array(
        'type'      => 'component',
        'h_elem'    => 'h3',
    ),
    'root_css'      => 'apl-search',
    'content'       => array(
        'component'     => $search_form_cp,
    ),
    'echo'      => true,
) );