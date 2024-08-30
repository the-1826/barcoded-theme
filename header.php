<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,400;0,600;1,400;1,600&family=Fira+Sans:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">
	<title><?php wp_title(''); ?></title>
	<?php wp_head(); ?>
</head>
<body>
<div class="site">
<header>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-3 order-1 order-md-1">
				<div class="logo"><?php if( has_custom_logo() ): the_custom_logo(); ?><?php else: ?><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a><?php endif; ?></div>
			</div>
			<div class="col-12 col-md-9 order-3 order-md-2">
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<nav class="biggest-menu"><?php $args = array('theme_location' => 'primary', 'depth' => 1, 'container' => 'ul', 'menu_class' => 'menu', ); wp_nav_menu( $args);?></nav>
				<?php endif; ?>	
			</div>
		</div>
	</div>
	<div class="menu-container"><button class="menu-open" id="hamburger" type="button"></button></div>
</header>
<div class="mobile-menu" id="mobile">
    <nav><?php $args = array('theme_location' => 'primary', 'depth' => 1, 'container' => 'ul', 'menu_class' => 'menu', ); wp_nav_menu( $args);?></nav>
    <button type="button" class="close" id="close"></button>
</div>