<?php if (is_home()) {?>
    <nav class="home">
        <div class="container">
            <div class="menu-logo">
                <img class="small-logo" src="<?php bloginfo('template_url'); ?>/img/logo-icon.svg">
            </div>
            <?php
                $args = array(
                    'theme_location' => '',
                    'menu' => '',
                    'container' => false,
                    'container_class' => false,
                    'container_id' => '',
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
<?php } else { ?>
    <nav class="page">
        <div class="container">
            <div class="menu-logo">
                <img class="big-logo" src="<?php bloginfo('template_url'); ?>/img/logo.svg">
                <img class="small-logo" src="<?php bloginfo('template_url'); ?>/img/logo-icon.svg">
            </div>
            <?php
                $args = array(
                    'theme_location' => '',
                    'menu' => '',
                    'container' => false,
                    'container_class' => false,
                    'container_id' => '',
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
<?php } ?>