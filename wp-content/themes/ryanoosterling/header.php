<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tutorial theme</title>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/libs/fonts/icon.css">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400|Hind:300,600,700' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/libs/superslides/stylesheets/superslides.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body>
<?php if(is_front_page() ) { ?>
<div class="container">
    <div class="logo">
        <a href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo-white.png"></a>
        <!-- <a href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/icon-slider-arrow.svg"></a> -->
    </div>
</div>

<?php } ?>
