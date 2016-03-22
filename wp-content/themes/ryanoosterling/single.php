<?php get_header(); ?>
<?php require_once('partials/navigation.php'); ?>
<div id="single">
    <div class="background">
        <div class="container">

         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="col-md-3 text-box" id="post-<?php the_ID();  ?>">
                <h1 class="title"><?php the_title(); ?></h1>

                <div class="description">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-1 images">
                <?php $images = get_field('album');
                if ($images) {
                    foreach ($images as $image) {?>
                        <img src="<?php echo $image['sizes']['large'] ?>">
                    <?php };
                }?>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>

    <?php 
        $next_post = get_next_post(); 
        $previous_post = get_previous_post();

    if (!empty( $next_post )){
        $next_img_url           = wp_get_attachment_image_src( get_post_thumbnail_id( $next_post->ID ), 'large' );
        $next_full_post         = $next_post;
        $next_permalink         = get_permalink($next_post->ID);
    }else{
        $next_post = get_posts(array('posts_per_page' => 1,'orderby' => 'date','order' => 'ASC'));
        $next_img_url           = wp_get_attachment_image_src( get_post_thumbnail_id( $next_post[0]->ID ), 'large' );
        $next_full_post         = $next_post[0];
        $next_permalink         = get_permalink($next_post[0]->ID);
    }
    if (!empty( $previous_post )){
        $previous_img_url       = wp_get_attachment_image_src( get_post_thumbnail_id( $previous_post->ID ), 'large' );
        $previous_full_post     = $previous_post;
        $previous_permalink     = get_permalink($previous_post->ID);
    }else{
        $previous_post = get_posts(array('posts_per_page' => 1,'orderby' => 'date','order' => 'DESC'));
        $previous_img_url       = wp_get_attachment_image_src( get_post_thumbnail_id( $previous_post[0]->ID ), 'large' );
        $previous_full_post     = $previous_post[0];
        $previous_permalink     = get_permalink($previous_post[0]->ID);

    }?>

    <h1 class="other-projects">Other projects</h1>
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
<?php get_footer(); ?>