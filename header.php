<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>Barcode Studia</title>
	<?php wp_head(); ?>
</head>
<body>
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(87138481, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/87138481" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RLQMJ064Y0"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-RLQMJ064Y0');
</script>
<div class="site">
<header>
	<div class="container">
		<button class="menu-open" type="button"></button>
		<div class="row">
			<button class="menu-open" type="button"></button>
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
