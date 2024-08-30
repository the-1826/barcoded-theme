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
			<?php endwhile; ?>
		<div class="post-tags"><?php the_terms( $GLOBALS['post']->ID, 'category', 'Category: '); ?></div>
		<div class="post-tags"><?php the_terms( $GLOBALS['post']->ID, 'post_tag', 'Related to: '); ?></div>
		<div class="post-tags"><?php the_date( 'Y/m/d', '<p>', '</p>' ); ?></div>
		<?php endif; ?>
	</article>
	</div>
</main>
<?php get_footer();