<?php
/*
Template Name: Type
*/
?>
<?php get_header(); ?>
<main>
<div class="container">
	<div class="modding-section">
		<h1>Mods</h1>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<section class="mod-info">
						<div class="row">
							<div class="col-12 col-md-6"><a href="<?php the_permalink(); ?>" class="modding-pic"><figure><?php the_post_thumbnail( 'full' ); ?></figure></a></div>
							<div class="col-12 col-md-6">
								<h2 class="modding-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="mods-desc"><?php the_content(); ?></div>
								<p class="modding-perk">Mod type: <?php the_terms( $post->ID, 'type' ,  '' ) ?></p>
								<p class="modding-perk">Mod for: <?php the_terms( $post->ID, 'game' ,  '' ) ?></p>
								<p class="modding-perk">Platforms: <?php the_terms( $post->ID, 'platform' ,  '' ) ?></p>
								<a href="<?php the_permalink(); ?>" class="read-more">Read more</a>
							</div>
						</div>
					</section>		
				<?php endwhile; ?>
			<?php endif; ?>				
	</div>
</div>
</main>		
<?php get_footer();