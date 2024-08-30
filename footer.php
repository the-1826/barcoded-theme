<?php wp_footer(); ?>
<footer>
	<div class="container">
		<div class="row"> 
			<div class="col-12 col-md-6 col-lg-3 order-2 order-lg-1">
				<div class="ending">
					<?php echo get_bloginfo();
						echo ', ';
						echo date("Y");
						$pageID = get_option('page_on_front');
						$footerl1 = get_field('footerl1', $pageID);
						if ($footerl1) {
							$footerl1_url = $footerl1['url'];
							$footerl1_title = $footerl1['title'];
							echo "<p><a class=\"mail\" href=\"$footerl1_url\">$footerl1_title</a></p>";
						}
						$footerl2 = get_field('footerl2', $pageID);
						if ($footerl2) {
							$footerl2_url = $footerl2['url'];
							$footerl2_title = $footerl2['title'];
							echo "<p><a class=\"mail\" href=\"$footerl2_url\">$footerl2_title</a></p>";
						} 
					?>
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