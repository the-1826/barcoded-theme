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
	<?php $maps = get_field('maps');
	if($maps)
	{
		echo '<div class="row">';
		foreach($maps as $map)
		{
			echo '<div class="col-12 col-lg-6"><div class="map-block"><h2>', $map['map-title'], '</h2><figure class="main-map-pic"><a href="', $map['map-pic'], '"', wp_get_attachment_image($map['map-pic'], 'mytheme-mini'), '</a></div></div>';
		}
		echo '</div>';
	}
?>	
	</div>
</div>
</main>		
<?php get_footer();