<?php get_header(); ?>
<?php require_once('templates/navigation.php'); ?>
<div id="single">
    <div class="container">

     <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="col-md-3 text-box" id="post-<?php the_ID(); ?>">
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
<?php get_footer(); ?>