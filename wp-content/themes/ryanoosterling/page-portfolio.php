<?php get_header(); ?>
<?php require_once('templates/navigation.php'); ?>
<div class="header">
    <div class="header-img">
        <h2><?php the_title(); ?></h2>
    </div>
</div>
<div class="container portfolio">
    <div id="portfolio-filter">
        <ul id="filter">
            <?php 
            $cats = get_categories();
            foreach ($cats as $cat) {
                echo '<li><a href="#" data-filter=".'. $cat->category_nicename .'" title data="'.$cat->cat_name.'">'. $cat->cat_name .'</a></li>';
            }?>
            <li>
                <a href="#" class="current" data-filter="*" title data="All Photo's">All Photo's</a>
            </li>
            <div class="clear"></div>
        </ul>
    </div>
</div>
<div id="projects-grid">
    <?php portfolio() ?>
</div>
<?php get_footer(); ?>