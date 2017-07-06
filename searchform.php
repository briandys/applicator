<?php
$unique_id = esc_attr( uniqid( 'search-term-creation-input--' ) );
?>

<div class="cp search-cp" data-name="Search">
    <div class="cr search---cr">
        <div class="hr search---hr">
            <div class="hr_cr search---hr_cr">
                <h2 class="h search---h"><span class="h_l search---h_l"><?php esc_html_e( 'Search', $GLOBALS['applicator_td'] ); ?></span></h2>
            </div>
        </div>
        <div class="ct search---ct">
            <div class="ct_cr search---ct_cr">
                <form class="form search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search" data-name="Search Form">
                    <div class="fieldsets search-form---fieldsets">
                        <div class="fieldsets-cr search-form---fieldsets-cr">

                            <div class="cp fs-item search-term-creation" data-name="Search Term Creation">
                                <div class="cr search-term-crt---cr">
                                    <div class="hr search-term-crt---hr">
                                        <div class="hr_cr search-term-crt---hr_cr">
                                            <div class="h search-term-crt---h"><span class="h_l search-term-crt---h_l"><?php esc_html_e( 'Search Term Creation', $GLOBALS['applicator_td'] ); ?></span></div>
                                        </div>
                                    </div>
                                    <div class="ct search-term-crt---ct">
                                        <div class="ct_cr search-term-crt---ct_cr">
                                            <span class="obj search-term-creation-label---obj" data-name="Search Term Creation Label">
                                                <label class="label search-term-crt-lbl---label" for="<?php echo $unique_id; ?>"><span class="label_l search-term-crt-lbl---label_l"><span class="txt search-term---txt"><?php esc_html_e( 'Search Term', $GLOBALS['applicator_td'] ); ?></span></span></label>
                                            </span>
                                            <span class="obj search-term-creation-input---obj" data-name="Search Term Creation Input">
                                                <span class="ee--input-text search-term-crt-inp---ee--input-text"><input id="<?php echo $unique_id; ?>" class="input-text search-term-crt-inp--input-text" name="s" type="text" placeholder="<?php esc_attr_e( 'Enter search term', $GLOBALS['applicator_td'] ); ?>" value="<?php echo get_search_query(); ?>" required></span>
                                            </span>
                                        </div>
                                    </div><!-- ct -->
                                </div>
                            </div><!-- Search Term Creation -->

                        </div>
                    </div><!-- Fieldsets -->
                    <div class="axns search-form-axns" data-name="Search Form Actions">
                        <div class="cr search-form-axns---cr">
                            <div class="hr search-form-axns---hr">
                                <div class="hr_cr search-form-axns---hr_cr">
                                    <div class="h search-form-axns---h"><span class="h_l search-form-axns---h_l"><?php esc_html_e( 'Search Form Actions', $GLOBALS['applicator_td'] ); ?></span></div>
                                </div>
                            </div>
                            <div class="ct search-form-axns---ct">
                                <div class="ct_cr search-form-axns---ct_cr">
                                    <div class="obj axn search-submit-axn" data-name="Search Submit Action">
                                        <button class="b search-submit-axn---b" type="submit" title="<?php esc_attr_e( 'Submit Search Term', $GLOBALS['applicator_td'] ); ?>"><span class="b_l search-submit-axn---b_l"><span class="txt search---txt"><?php esc_html_e( 'Search', $GLOBALS['applicator_td'] ); ?></span></span></button>
                                    </div><!-- Search Submit Action -->
                                    <div class="obj axn search-reset-axn" data-name="Search Reset Action">
                                        <button class="b search-reset-axn---b" type="reset" title="<?php esc_attr_e( 'Reset Search Term', $GLOBALS['applicator_td'] ); ?>"><span class="b_l search-reset-axn---b_l"><span class="txt reset---txt"><?php esc_html_e( 'Reset', $GLOBALS['applicator_td'] ); ?></span></span></button>
                                    </div><!-- Search Reset Action -->
                                </div>
                            </div><!-- ct -->
                        </div>
                    </div><!-- Search Form Actions -->
                </form><!-- Search Form -->
            </div>
        </div><!-- ct -->
    </div>
</div><!-- Search -->


<?php

$form_test = htmlok( array(
    'name'      => 'Profile',
    'structure' => array(
        'type'      => 'component',
        'subtype'   => 'form',
    ),
    'content'   => array(
        'compound'  => array(
            array(
                'name'      => 'Birthday',
                'group'     => array(
                    array(
                        'name'      => 'Day',
                        'structure' => array(
                            'type'      => 'textbox',
                            'label'     => 'Day',
                            'attr'      => array(
                                'type'          => 'email',
                                'value'         => 'Email',
                                'placeholder'   => 'Input your email',
                                'name'          => '',
                            ),
                            'id'        => 'day-tb',
                            'css'       => '',
                            'title'     => 'Title',
                        ),
                    ),
                    array(
                        'name'      => 'Month',
                        'structure' => array(
                            'type'      => 'textarea',
                            'label'     => 'Month',
                            'attr'      => array(
                                'type'          => 'text',
                                'value'         => '',
                                'placeholder'   => '',
                                'name'          => '',
                            ),
                            'id'        => 'ID',
                            'css'       => '',
                            'title'     => 'Title',
                        ),
                    ),
                    array(
                        'name'      => 'Marital Status',
                        'structure' => array(
                            'type'      => 'checkbox',
                            'label'     => 'Married?',
                            'attr'      => array(
                                'checked'       => '',
                                'name'          => 'marital-status-checkbox',
                            ),
                            'id'        => 'marital-status-checkbox',
                            'css'       => '',
                            'title'     => 'Title',
                        ),
                    ),
                ),
            ),
            array(
                'name'      => 'Search',
                'group'     => array(
                    array(
                        'name'      => 'Search Term Creation',
                        'structure' => array(
                            'type'      => 'textbox',
                            'label'     => 'Search',
                            'attr'      => array(
                                'placeholder'   => 'Enter search terms',
                            ),
                            'id'        => 'super-search',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'echo'      => true,
) );



$test_form_label_obj = htmlok( array(
    'name'      => 'Test Search Form Label',
    'structure' => array(
        'type'      => 'object',
        'subtype'   => 'form label',
        'attr'      => array(
            'elem'      => array(
                'for'       => 'ID',
            ),
        ),
    ),
    'content'       => array(
        'object'     => array(
            array(
                'txt'   => 'Search Term',
            ),
        ),
    ),
) );

$test_form_element_obj = htmlok( array(
    'name'      => 'Test Search Form Element',
    'structure' => array(
        'type'      => 'object',
        'subtype'   => 'form element',
        'id'    => 'ID',
        'attr'      => array(
            'elem'      => array(
                'for'       => 'ID',
            ),
        ),
    ),
    'content'       => array(
        'object'     => array(
            array(
                'txt'   => 'Search Term',
            ),
        ),
    ),
) );

$search_term_creation_cp = htmlok( array(
    'name'      => 'Search Term Creation',
    'structure' => array(
        'type'      => 'component',
        'subtype'   => 'fieldset item',
    ),
    'content'   => array(
        'component' => array(
            $test_form_label_obj,
            $test_form_element_obj,
        ),
    ),
) );

$test_search_form_cp = htmlok( array(
    'name'      => 'Test Search',
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
    'content'       => array(
        'component'     => $search_term_creation_cp,
    ),
    'echo'      => true,
) );





/*

// Variables
$search_term_creation_name = 'Search Term Creation';
$search_term_creation_css = 'search-term-crt';

$search_term_creation_label_obj = htmlok( array(
    'name'          => $search_term_creation_name,
    'structure'     => array(
        'type'      => 'object',
        'subtype'   => 'form label',
        'layout'    => 'inline',
        'attr'      => array(
            'for'   => $unique_id,
        ),
    ),
    'css'           => $search_term_creation_css,
    'obj_content'   => array(
        array(
            'txt'   => 'Search Term',
        ),
    ),
) );

$search_term_creation_input_obj = htmlok( array(
    'name'                      => $search_term_creation_name,
    'structure'                 => array(
        'type'                  => 'object',
        'subtype'               => 'form element',
    ),
    'css'                       => 'search-term-crt',
    'obj_content'               => array(
        array(
            'form_elem'         => 'input',
            'id'                => $unique_id,
            'css'               => $search_term_creation_css,
            'attr'              => array(
                'type'          => 'text',
                'name'          => 's',
                'placeholder'   => 'Enter Search Term',
                'value'         => get_search_query(),
            ),
        ),
    ),
) );

$search_term_creation_cp = htmlok( array(
    'name'              => $search_term_creation_name,
    'structure'         => array(
        'type'          => 'component',
        'subtype'       => 'fieldset item',
    ),
    'css'               => $search_term_creation_css,
    'content'           => array(
        $search_term_creation_label_obj,
        $search_term_creation_input_obj,
    ),
) );

$search_term_creation_fieldsets_cn = htmlok( array(
    'name'          => $search_term_creation_name,
    'structure'     => array(
        'type'      => 'component',
        'subtype'   => 'fieldsets',
    ),
    'css'           => $search_term_creation_css,
    'content'       => $search_term_creation_cp,
) );


$search_form_cp = htmlok( array(
    'name'                  => 'Search',
    'structure'             => array(
        'type'              => 'component',
        'subtype'           => 'form',
        'attr'              => array(
            'custom'        => array(
                'role'      => 'search',
                'method'    => 'get',
                'action'    => esc_url( home_url( '/' ) ),
            ),
        ),
    ),
    'content'               => $search_term_creation_cp,
) );

$search_cp = htmlok( array(
    'name'          => 'Search',
    'structure'     => array(
        'type'      => 'component',
    ),
    'content'       => $search_form_cp,
    'echo'          => true,
) );

*/