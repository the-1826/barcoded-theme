<?php
/*
Template Name: Single
*/
?>
<?php get_header(); ?>
<main>
<div class="container">
	<article class="singular">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<div class="post-content"><?php the_content(); ?></div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</article>
</main>
<?php get_footer();