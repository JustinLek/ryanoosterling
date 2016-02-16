<?php if (is_home()) {
    $class = 'home';
} else { 
    $class = 'page';
}?>

    <nav class="<?php echo $class; ?> navbar navbar-default">
        <div class="container">
            <div class="navbar-header"></div>
            <div class="menu-logo">
            <?php if($class == 'page'){ ?>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img class="big-logo" src="<?php bloginfo('template_url'); ?>/img/logo.svg">
                </a>
            <?php } ?>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img class="small-logo" src="<?php bloginfo('template_url'); ?>/img/logo-icon.svg">
                </a>
            </div>
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <?php
                $args = array(
                    'theme_location' => '',
                    'menu' => '',
                    'container' => 'div',
                    'container_class' => 'navbar-collapse collapse',
                    'container_id' => 'navbar',
                    'menu_class' => 'menu',
                    'menu_id' => '',
                    'echo' => true,
                    'fallback_cb' => 'wp_page_menu',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'items_wrap' => '<ul class="navigation">%3$s</ul>',
                    'depth' => 0,
                    'walker' => new Custom_Walker_Nav_Menu
                );
                wp_nav_menu( $args );
            ?>
        </div>
    </nav>