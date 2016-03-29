<?php get_header(); ?>
<?php require_once('partials/navigation.php'); ?>
<div class="biography-header">
    <div class="header-img">
        <h2><?php the_title(); ?></h2>
    </div>
</div>
<div class="container">
    <div class="row nopadding biography">
        <div class="col-md-5 left">
            <h1>Ryan Oosterling</h1>
            <div class="social">
                <a href="<?php echo get_option('instagram_url'); ?>"> <i class="ro-instagram"></i></a>
                <a href="<?php echo get_option('facebook_url'); ?>"> <i class="ro-facebook"></i></a>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-1">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content();
            endwhile; else: ?>
            <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="grey">
    <div class="container">
        <?php 

            $next_post = get_posts(array('posts_per_page' => 1, 'post_type' => 'post', 'orderby' => 'date','order' => 'ASC'));
            $next_img_url           = wp_get_attachment_image_src( get_post_thumbnail_id( $next_post[0]->ID ), 'large' );
            $next_full_post         = $next_post[0];
            $next_permalink         = get_permalink($next_post[0]->ID);

            $previous_post = get_posts(array('posts_per_page' => 1, 'post_type' => 'post', 'orderby' => 'date','order' => 'DESC'));
            $previous_img_url       = wp_get_attachment_image_src( get_post_thumbnail_id( $previous_post[0]->ID ), 'large' );
            $previous_full_post     = $previous_post[0];
            $previous_permalink     = get_permalink($previous_post[0]->ID);
        ?>

        <h1 class="other-projects">Take a look at my work</h1>
        <div class="container">
            <div class="col-md-6 nopadding recent" style="background-image: url(<?php echo $previous_img_url[0] ?>)">
                <div class="text">
                    <h2><?php print_r($previous_full_post->post_title); ?></h2>
                    <a class="button dark desktop" href="<?php echo $previous_permalink; ?>"> view album <i class="ro-arrow"></i></a>
                    <a class="mobile" href="<?php echo $previous_permalink; ?>"><i class="ro-arrow"></i></a>
                </div>
            </div>
            <div class="col-md-6 nopadding recent" style="background-image: url(<?php echo $next_img_url[0] ?>)">
                <div class="text">
                    <h2><?php print_r($next_full_post->post_title); ?></h2>
                    <a class="button dark desktop" href="<?php echo $next_permalink; ?>"> view album <i class="ro-arrow"></i></a>
                    <a class="mobile" href="<?php echo $next_permalink; ?>"><i class="ro-arrow"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row home-contact">
        <h1>Contact me</h1>
    </div>
</div>
<?php get_footer(); ?>