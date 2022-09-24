<?php wp_footer(); ?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 col-lg-3 order-2 order-lg-1">
				<div class="ending">
					<p>© Barcode Studia, 2021-2022</p>
					<a class="mail" href="https://discord.gg/qwtjARy2">Discord Server</a>
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
<script type="text/javascript"> 
(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
   ym(87138481, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/87138481" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0FHHVRNGTQ"></script>
<script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-0FHHVRNGTQ');
</script>
</body>
</html>
