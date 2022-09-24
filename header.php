<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="yandex-verification" content="6ef3d6e3df1c44c2" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>Barcode Studia</title>
	<?php wp_head(); ?>
</head>
<body>
<div class="site">
<header>
	<div class="container">
		<button class="menu-open" type=button"></button>
		<div class="row">
			<button class="menu-open" type=button"></button>
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
</header>
<div class="mobile-menu">
    <nav><?php $args = array('theme_location' => 'primary', 'depth' => 1, 'container' => 'ul', 'menu_class' => 'menu', ); wp_nav_menu( $args);?></nav>
    <button type="button" class="close"></button>
</div>
