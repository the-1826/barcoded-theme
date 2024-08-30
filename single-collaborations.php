<?php
/*
Template Name: Single Collaboration
*/
?>
<?php get_header(); ?>
<main>
<div class="mod-ind">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<h1 style="margin-top: 25px"><?php the_title(); ?></h1>
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
								<p class="modding-perk">Mod type: <?php the_terms( $post->ID, 'type_collab' ,  '' ) ?></p>
								<p class="modding-perk">Mod for: <?php the_terms( $post->ID, 'game_collab' ,  '' ) ?></p>
								<p class="modding-perk">Platforms: <?php the_terms( $post->ID, 'platform_collab' ,  '' ) ?></p>
							</div>
						</div>
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
							echo '<div class="col-6 col-md-4 col-lg-3"><div class="download-block"><p>', $download['download-desc'], '</p><a class="read-more" href="', $download['download-link'], '">Download</a></div></div>';
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

