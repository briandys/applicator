<div class="ct main-content---ct">
    <div class="ct_cr main-content---ct_cr">
        
        <?php
        
        // Entry
        if ( is_singular() )
        {
            while ( have_posts() )
            {
                the_post();

                ob_start();
                applicator_entry_content(); // template-parts > entry-content.php
                comments_template(); // comments.php
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
                ) );
            }
        }

        // Entries
        else
        {
            if ( have_posts() )
            {
                // OB: Entries Content
                ob_start();
                while ( have_posts() )
                {
                    the_post();

                    applicator_entry_content(); // template-parts > entry-content.php
                }
                $entries_ob_content = ob_get_clean();


                // Entries (for posts page)
                $entry_entries_cp = applicator_htmlok( array(
                    'name'      => 'Entries',
                    'structure' => array(
                        'type'      => 'component',
                    ),
                    'id'        => 'entries',
                    'content'   => array(
                        'component'     => array(
                            $entries_ob_content,
                        ),
                    ),
                ) );
            }

            // content-none.php
            else
            {
                ob_start();
                get_template_part( 'template-parts/content', 'none' );
                $content_none_content = ob_get_clean();

                $entry_entries_cp = $content_none_content;
            }
        }
        
        
        // Entry Module
        $entry_module_cp = applicator_htmlok( array(
            'name'      => 'Entry',
            'structure' => array(
                'type'      => 'component',
                'subtype'   => 'module',
            ),
            'content'   => array(
                'component'     => $entry_entries_cp,
            ),
        ) );
        
        
        // Primary Content
        $primary_content = applicator_htmlok( array(
            'name'      => 'Primary Content',
            'structure' => array(
                'type'      => 'constructor',
                'elem'      => 'main',
            ),
            'id'        => 'main',
            'css'       => 'pri-content',
            'root_css'  => 'site-main',
            'content'   => array(
                'constructor'   => $entry_module_cp,
            ),
            'echo'      => true,
        ) );
        
        
        get_sidebar(); // Secondary Content
        
        ?>

    </div>
</div>