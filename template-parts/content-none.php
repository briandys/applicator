<?php

ob_start();

// Post Classes

// Post Classes Array
$post_classes = array(
    'cp',
    'article',
    'post',
    'post--empty',
);

// Array Implode
$post_classes = implode( ' ', $post_classes );

?>

<article class="<?php echo esc_attr( $post_classes ); ?>" data-name="Post CP">
    <div class="cr post---cr">
        <header class="hr post---hr entry-header">
            <div class="hr_cr post---hr_cr">
                
                <?php
                
                // E: Post Title
                $post_title = __( 'Content Not Found', 'applicator' );
                
                
                // R: Post Title Object
                $post_title_obj = applicator_htmlok( array(
                    'name'      => 'Post Title',
                    'structure' => array(
                        'type'      => 'object',
                        'elem'      => 'h1',
                    ),
                    'content'   => array(
                        'object'        => esc_html ( $post_title ),
                    ),
                ) );
                
                
                // E: Main Post Title
                $main_post_title = applicator_htmlok( array(
                    'name'      => 'Main Post Title',
                    'structure' => array(
                        'type'      => 'component'
                    ),
                    'content'   => array(
                        'component'     => array(
                            
                            $post_title_obj,
                        ),
                    ),
                    'echo'      => true,
                ) );
                
                
                // After Main Post Title Hook | inc > hooks.php
                applicator_hook_after_main_post_title();
                
                ?>
                
            </div>
        </header>
        <div class="ct post---ct entry-content">
            <div class="ct_cr post---ct_cr">
                <?php
                
                // OB: Search
                ob_start();
                get_search_form();
                $search_ob_content = ob_get_clean();
                
                $search_spiel = '';
                if ( is_404() ) {
                    $search_spiel = esc_html__( 'Please try searching:', 'applicator' );
                }
                else {
                    $search_spiel = esc_html__( 'Please try another search term:', 'applicator' );
                }
                    
                // E: Post Content
                $post_content = applicator_htmlok( array(
                    'name'      => 'Post Content',
                    'structure' => array(
                        'type'      => 'component',
                        'elem'      => 'section',
                        'h_elem'    => 'h1',
                    ),
                    'content'   => array(
                        'component'     => array(
                            '<p>'.esc_html__( 'It seems we can not find what you are looking for.', 'applicator' ).'</p>',
                            '<p>'. $search_spiel. '</p>',
                            $search_ob_content,
                        ),
                    ),
                    'echo'      => true,
                ) );
                
                ?>
            </div>
        </div>
    </div>
</article>

<?php
$entry_content = ob_get_clean();





// Entry (for single.php)
$entry_entries_cp = applicator_htmlok( array(
    'name'      => 'Entry',
    'structure' => array(
        'type'      => 'component',
    ),
    'content'   => array(
        'component'     => $entry_content,
    ),
    'echo'      => true,
) );