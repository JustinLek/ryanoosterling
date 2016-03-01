<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tutorial theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- bower:css -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/build/css/bower/bootstrap-d83f12b1a1.css" />
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/build/css/style-600a2b65b8.css" />
    <!-- endinject -->
</head>
<body>
<?php if(is_front_page() ) { ?>
<div class="container">
    <div class="logo">
        <a href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/img/logo-white.png"></a>
    </div>
</div>

<?php } ?>
