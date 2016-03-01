<?php 
function recentPosts() {
	$rPosts = new WP_Query();
	$rPosts->query('showposts=2');
		while ($rPosts->have_posts()) : $rPosts->the_post(); 
        $idd = get_the_ID();?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $idd ), 'featured-thumb' ); ?>
		<?php $image_url = $image[0]; ?>
		<div class="col-md-6 nopadding recent"style="background-image: url(<?php echo $image_url; ?>)">
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