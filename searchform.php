<?php
$unique_id = esc_attr( uniqid( 'search-term-creation-input-text-' ) );


$search_form_cp = htmlok( array(
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
                                'placeholder'   => esc_html__( 'Enter search term', 'applicator' ),
                            ),
                            'id'        => esc_attr( uniqid( 'search-term-crt-search-text-input---input-text-' ) ),
                        ),
                    ),
                ),
                'actions'   => array(
                    array(
                        'name'  => 'Search',
                        'txt'   => array(
                            esc_html__( 'Search', 'applicator' ),
                        ),
                        'structure' => array(
                            'type'      => 'submit',
                        ),
                    ),
                    array(
                        'name'  => 'Reset',
                        'txt'   => array(
                            esc_html__( 'Reset', 'applicator' ),
                        ),
                        'structure' => array(
                            'type'      => 'reset',
                        ),
                    ),
                ),
            ),
        ),
    ),
) );


$search_cp = htmlok( array(
    'name'      => 'Search',
    'structure' => array(
        'type'      => 'component',
        'h_elem'    => 'h2',
    ),
    'root_css'      => 'search-cp',
    'content'       => array(
        'component'     => $search_form_cp,
    ),
    'echo'      => true,
) );