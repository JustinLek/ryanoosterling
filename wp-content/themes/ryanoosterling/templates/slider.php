<div id="slides">
    <ul class="slides-container">
        <?php 
        $rPosts = new WP_Query();
        $rPosts->query('showposts');
        while ($rPosts->have_posts()) : $rPosts->the_post(); 
            $idd = get_the_ID();
            $src = wp_get_attachment_image_src( get_post_thumbnail_id($idd), false, '' );?>
            <li>
                <img src="<?php echo $src[0]?>" alt="">
                    <div class="container">
                        <div class="inner">
                            <h1><?php the_title()?></h1>
                            <?php the_content(); ?>
                            <a class="button light" href="<?php echo esc_url( get_permalink() ); ?>">View album <i class="ro-arrow"></i></a>
                        </div>
                    </div>
            </li>
        <?php endwhile;?>
    </ul>
    <!-- <nav class="slides-navigation">
        <a href="#" class="next">Next</a>
        <a href="#" class="prev">Previous</a>
    </nav> -->
</div>