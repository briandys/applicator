<?php
// Template Name: Multisite

get_template_part( 'index' );

if ( function_exists( 'get_sites' ) && class_exists( 'WP_Site_Query' ) ) {
    $sites = get_sites();
    foreach ( $sites as $site ) {
        switch_to_blog( $site->blog_id );
        
        $subsite_id = get_object_vars($site)["blog_id"];
        $subsite_name = get_blog_details($subsite_id)->blogname;
        
        $blog_details = get_blog_details( $subsite_id );
        
        echo 'Site ID/Name: ' . $subsite_id . ' / ' . $subsite_name . '\n';
        
        echo $blog_details->path;
        
        query_posts( 'showposts=5' );
            if ( have_posts() ) {
                while( have_posts() ) {
                    the_post();
                    ?>
                    <div class="blog_post">
                        <div class="post_title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                        <div class="post_excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } 
        
        restore_current_blog();
    }
    return;
}


/*
?>

<ul class='postlist no-mp'>

<?php 
    
    $subsites = get_sites();
foreach( $subsites as $subsite ) {
  $subsite_id = get_object_vars($subsite)["blog_id"];
  $subsite_name = get_blog_details($subsite_id)->blogname;
  echo 'Site ID/Name: ' . $subsite_id . ' / ' . $subsite_name . '\n';
}

// get all blogs
$blogs = get_sites();

if ( 0 < count( $blogs ) ) {
    foreach( $blogs as $blog ) {
        
        $subsite_id = get_object_vars($blog)["blog_id"];
        $subsite_name = get_blog_details($subsite_id)->blogname;
        
    $blog_id = get_object_vars($blog)["blog_id"];
    
    switch_to_blog( $blog_id );

        if ( get_theme_mod( 'show_in_home', 'on' ) !== 'on' ) {
            continue;
        }
        
        $blog_id = get_object_vars($blog)["blog_id"];

        $description  = get_bloginfo( 'description' );
        $blog_details = get_blog_details( $blog_id );
        ?>
        <li class="no-mp">

            <h2 class="no-mp blog_title">
                <a href="<?php echo $blog_details->path ?>">
                    <?php echo  $subsite_name ?>
                </a>
            </h2>

            <div class="blog_description">
                <?php echo $description; ?>
            </div>

            <?php 
            query_posts( 'showposts=5' );
            if ( have_posts() ) {
                while( have_posts() ) {
                    the_post();
                    ?>
                    <div class="blog_post">
                        <div class="post_title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                        <div class="post_excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } 
        
        
        
        
        
            restore_current_blog();
            ?>
        </li>
<?php }
} ?>
</ul>
*/