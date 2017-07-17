<?php

// Post Title
$post_title_obj = htmlok( array(
    'name'      => 'Post Title',
    'structure' => array(
        'type'      => 'object',
        'elem'      => 'h1',
    ),
    'content'   => array(
        'object'        => array(
            array(
                'txt'       => esc_html__( 'Nothing Found', 'applicator' ),
            ),
        ),
    ),
) );


// Hook After Post Heading
ob_start();

applicator_hook_after_post_heading();

$hook_after_post_heading_content = ob_get_contents();
ob_end_clean();


// Post
$post_cp = htmlok( array(
    'name'      => 'Post',
    'structure' => array(
        'type'      => 'component',
        'elem'      => 'article',
    ),
    'root_css'  => 'post--empty',
    'hr_content'    => array(
        $post_title_obj,
        $hook_after_post_heading_content,
    ),
    'content'   => array(
        'component'     => array(
            '<p>'.esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'applicator' ).'</p>',
        ),
    ),
    'echo'      => true,
) );