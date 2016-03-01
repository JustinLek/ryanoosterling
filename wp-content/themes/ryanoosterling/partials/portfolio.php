<?php 
function portfolio() {
    $count  = 1;
    $rPosts = new WP_Query();
    $rPosts->query('showposts');
        while ($rPosts->have_posts()) : $rPosts->the_post(); 
        $idd = get_the_ID();
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $idd ), 'large' );
        list($width, $height) = getimagesize($image[0]);
        if ($width > $height) {
            $orrientation = 'landscape';
        } else {
            $orrientation = 'portrait';
        }
        $image_url = $image[0]; 
        $categories = get_the_category( $idd );
        $cat = $categories[0]->slug;?>
        <div class="portfolio-box-1 <?php echo $cat; ?>">
            <img class="<?php echo $orrientation; ?>" src="<?php echo $image[0]; ?>">
            <div class="text">
                <h2><?php the_title() ?></h2>
                <a class="button dark desktop" href="<?php echo get_permalink(); ?>"> view album <i class="ro-arrow"></i></a>
                <a class="mobile" href="<?php echo get_permalink(); ?>"><i class="ro-arrow"></i></a>
            </div>
        </div>
        <?php endwhile;
    wp_reset_query();
}
?>