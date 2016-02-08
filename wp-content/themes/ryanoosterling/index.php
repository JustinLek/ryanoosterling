<?php get_header(); ?>
<?php require_once ('templates/slider.php'); ?>
<?php require_once ('templates/navigation.php'); ?>
<div class="container">
    <div class="row propose">
        <div class="col-md-5 left">
            <h1>Ryan Oosterling Test</h1>
            <div class="social">
                <a href="<?php echo get_option('instagram_url'); ?>"> <i class="ro-instagram"></i></a>
                <a href="<?php echo get_option('facebook_url'); ?>"> <i class="ro-facebook"></i></a>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-1">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare, nisi nec malesuada placerat, augue libero fringilla velit, ac rutrum neque sem sit amet felis. Vivamus scelerisque sollicitudin magna, sed tristique enim mollis ut. In nec diam in metus sollicitudin interdum quis in nibh. Sed iaculis varius mauris, id hendrerit dui sagittis in. Aenean ut leo commodo, egestas quam sit amet, cursus metus. Morbi nec eros elementum, laoreet ligula sit amet, commodo lorem. Quisque in nibh euismod risus molestie dapibus eget nec tortor. Donec porta velit in egestas faucibus. Aenean rutrum vitae enim nec pulvinar. Aenean ornare urna eu elit bibendum, vel congue lectus dapibus. Quisque quis tortor vitae ligula placerat pellentesque et vitae libero. Nullam ut odio diam. Sed sodales nibh in luctus elementum. Aliquam pharetra fermentum nulla, nec sollicitudin mi lobortis vitae.</p>
            <a class="button dark" href="">Biography <i class="ro-arrow"></i></a>
        </div>
    </div>
</div>
<?php parallax('steven.jpg', false); ?>
<div class="container">
    <div class="row recent-work">
        <h1 class="title">Recent work</h1>
        <?php recentPosts() ?>
    </div>
</div>
<?php parallax('cyrano.jpg', 'Inspiring people by letting them see how others are dedicated to their dreams'); ?>
<div class="container">
    <div class="row home-contact">
        <h1>Contact me</h1>
    </div>
</div>
<?php get_footer(); ?>