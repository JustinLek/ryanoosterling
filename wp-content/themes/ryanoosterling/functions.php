<?php

require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/enqueue.php';

register_nav_menu( 'nav', 'Primary' );
add_theme_support( 'post-thumbnails' ); 

// Make sure featured images are enabled
add_theme_support( 'post-thumbnails' );

// Add featured image sizes
add_image_size( 'featured-large', 640, 294, true ); // width, height, crop
add_image_size( 'featured-small', 320, 147, true );

// Add other useful image sizes for use through Add Media modal
add_image_size( 'medium-width', 480 );
add_image_size( 'medium-height', 9999, 480 );
add_image_size( 'medium-something', 480, 480 );

// Register the three useful image sizes for use in Add Media modal
add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
function wpshout_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'medium-width' => __( 'Medium Width' ),
        'medium-height' => __( 'Medium Height' ),
        'medium-something' => __( 'Medium Something' ),
    ) );
}

add_filter('the_content','my_strip_tags');
function my_strip_tags($content='') {
   return strip_tags($content, '<p><a><i><div>');
}

add_image_size( 'featured-thumb', 500, 500, true ); // (cropped)

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

function parallax($path, $quote) {
	$url = get_bloginfo('template_url').'/img/'.$path;
    if ($quote) {
        echo '<div class="parallax-window hidden-xs" data-parallax="scroll" data-image-src="'.$url.'"><div class="col-md-6"></div><div class="col-md-6"><p class="parallax-quote">"'.$quote.'"</p></div></div>';
    }else{
	    echo '<div class="parallax-window" data-parallax="scroll" data-image-src="'.$url.'"></div>';
    }
}

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu { 
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0){
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ! empty( $item->title )      ? ' data="'   . esc_attr( $item->title        ) .'"' : '';


        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '<br /><span class="sub">' . $item->description . '</span>';
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id);
    }
}

?>