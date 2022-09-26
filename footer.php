<?php wp_footer(); ?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 col-lg-3 order-2 order-lg-1">
				<div class="ending">
					<p><?php echo devise_copyright(); ?></p>
					<a class="mail" href="mailto:mail@barcode-studia.ru">mail@barcode-studia.ru</a>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-9 order-3 order-lg-2">
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<nav class="biggest-menu"><?php $args = array('theme_location' => 'primary', 'depth' => 1, 'container' => 'ul', 'menu_class' => 'menu', ); wp_nav_menu( $args);?></nav>
				<?php endif; ?>
			</div>
		</div>
	</div>
</footer>	
</div>
</body>
</html>
