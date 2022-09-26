<?php
/*
Template Name: Single Mod
*/
?>
<?php get_header(); ?>
<main>
<div class="mod-ind">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<section class="mod-info">
					<div class="row">
						<div class="col-12 col-md-6">
							<figure class="modding-thumb">
								<?php the_post_thumbnail( 'full' ); ?>
							</figure>
						</div>
						<div class="col-12 col-md-6">
							<div class="modding-info">
								<div class="mods-desc"><?php the_content(); ?></div>
								<p class="modding-perk">Mod type: <?php the_terms( $post->ID, 'type' ,  '' ) ?></p>
								<p class="modding-perk">Mod for: <?php the_terms( $post->ID, 'game' ,  '' ) ?></p>
								<p class="modding-perk">Platforms: <?php the_terms( $post->ID, 'platform' ,  '' ) ?></p>
							</div>
						</div>
					</div>
					<div class="video-container">
						<div class="video"><iframe src="https://www.youtube.com/embed/<?php the_field('youtube-trailer') ?>?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
					</div>
				</section>
				<?php $features = get_field('features');
					if($features)
					{
						echo ('<section class="features"><h2>Features</h2><ul class="marker-list">');
						foreach($features as $feature)
						{
							echo '<li>', $feature['features-text'], '</li>';
						}
						echo ('</ul></section>');
					}
				?>	
				<section class="screenshots">	
					<h2>Screenshots</h2>
					<?php $mod_slider_id = get_field('mod-slider-id');
					if ($mod_slider_id == 3) {
						echo do_shortcode('[smartslider3 slider="3"]');
					} 
					elseif ($mod_slider_id == 4) {
						echo do_shortcode('[smartslider3 slider="4"]');
					} 
					elseif ($mod_slider_id == 5) {
						echo do_shortcode('[smartslider3 slider="5"]');
					} 
					elseif ($mod_slider_id == 6) {
						echo do_shortcode('[smartslider3 slider="6"]');
					} 
					elseif ($mod_slider_id == 7) {
						echo do_shortcode('[smartslider3 slider="7"]');
					} 
					elseif ($mod_slider_id == 8) {
						echo do_shortcode('[smartslider3 slider="8"]');
					} 
					elseif ($mod_slider_id == 9) {
						echo do_shortcode('[smartslider3 slider="9"]');
					} 
					elseif ($mod_slider_id == 10) {
						echo do_shortcode('[smartslider3 slider="10"]');
					}  ?>
				</section>
				<?php $developers = get_field('developers');
					if($developers)
					{
						echo ('<section class="developers"><h2>Developers</h2><ul class="marker-list">');
						foreach($developers as $developer)
						{
							echo '<li>', $developer['developers-text'], '</li>';
						}
						echo ('</ul></section>');
					}
				?>	
				<?php $downloads = get_field('downloads');
					if($downloads)
					{
						echo ('<section class="download"><h2>Download links</h2><div class="row">');
						foreach($downloads as $download)
						{
							echo '<div class="col-4 col-md-3"><div class="download-block"><p>', $download['download-desc'], '</p><a class="read-more" href="', $download['download-link'], '">Download</a></div></div>';
						}
						echo ('</div></section>');
					}				
					else {
						echo ('<section class="download"><h2>Coming soon</h2><p>Stay tuned for news about the release date!</p></section>');
					}
				?>	
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>
</main>		
<?php get_footer();

