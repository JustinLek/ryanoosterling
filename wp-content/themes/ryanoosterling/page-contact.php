<?php get_header(); ?>
<?php require_once('partials/navigation.php'); ?>
<div class="header">
    <div class="header-img">
        <h2><?php the_title(); ?></h2>
    </div>
</div>
<div class="container">
    <div class="row contact">
        <div class="col-md-5 left">
            <h1>Ryan Oosterling</h1>
            <div class="social">
                <a href="<?php echo get_option('instagram_url'); ?>"> <i class="ro-instagram"></i></a>
                <a href="<?php echo get_option('facebook_url'); ?>"> <i class="ro-facebook"></i></a>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-1 form">
            <?php if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 1 ); } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>