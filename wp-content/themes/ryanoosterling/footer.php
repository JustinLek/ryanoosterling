<footer>
	<div class="container">
		<p>
			© Ryan Oosterling 2015. All rights Reserved | 
			<img src="<?php bloginfo('template_url'); ?>/img/logo-footer.svg">
			<span class="social">
                <a href=""><img src="<?php bloginfo('template_url'); ?>/img/socialmedia-instagram.svg"></a>
                <a href=""><img src="<?php bloginfo('template_url'); ?>/img/socialmedia-facebook.svg"></a>
            </span>
		</p>
	</div>
</footer>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/libs/superslides/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/libs/superslides/jquery.animate-enhanced.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/libs/superslides/jquery.superslides.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/libs/parallax/parallax.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/libs/masonry-master/dist/masonry.pkgd.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/libs/isotope-master/dist/isotope.pkgd.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/libs/imagesloaded/imagesloaded.pkgd.min.js"></script>
<?php if (!is_home()) {?>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/libs/app.js"></script>
    <script type='text/javascript' src="<?php bloginfo('template_url'); ?>/libs/portfolio.js"></script> 
<?php }else{ ?>
    <script type='text/javascript' src="<?php bloginfo('template_url'); ?>/libs/home.js"></script>  
<?php }; ?>
<script type='text/javascript' src="<?php bloginfo('template_url'); ?>/libs/classie.js"></script>
</body>
</html>