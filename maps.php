<?php
/*
Template Name: Maps
*/
?>
<?php get_header(); ?>
<main>
<div class="maps-block">
	<div class="container">
	<h1>Maps</h1>
	<p>Welcome to the map gallery. Left click on any of the maps to make it size bigger.</p>
	<div class="row">
		<div class="col-lg-6 col-12">
			<div class="map-block">
				<h2>Properties</h2>
				<figure class="main-map-pic"><a href="<?php echo get_template_directory_uri() ?>/images/map1.png"><img src="<?php echo get_template_directory_uri() ?>/images/map1.png" alt=""></a></figure>
			</div>
			<div class="map-block">
				<h2>Snapshots</h2>
				<figure class="main-map-pic"><a href="<?php echo get_template_directory_uri() ?>/images/map2.png"><img src="<?php echo get_template_directory_uri() ?>/images/map2.png" alt=""></a></figure>
			</div>
		</div>
		<div class="col-lg-6 col-12">
			<div class="map-block">
				<h2>Contracts</h2>
				<figure class="main-map-pic"><a href="<?php echo get_template_directory_uri() ?>/images/map3.png"><img src="<?php echo get_template_directory_uri() ?>/images/map3.png" alt=""></a></figure>
			</div>
			<div class="map-block">
				<h2>Myths</h2>
				<figure class="main-map-pic"><a href="<?php echo get_template_directory_uri() ?>/images/map4.png"><img src="<?php echo get_template_directory_uri() ?>/images/map4.png" alt=""></a></figure>
			</div>
		</div>
	</div>
	</div>
</div>
</main>		
<?php get_footer();

