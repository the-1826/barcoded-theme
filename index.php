<?php get_header(); ?>
<main>
<?php $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>6)); ?>
<div class="post-section">
	<div class="container">
		<h1><?php the_title(); ?></h1>
		<div class="row">
		<?php if ( $wpb_all_query->have_posts() ) : ?>
			<?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
				<div class="col-6 col-md-12">
					<article class="post-ind">
						<div class="row">
							<div class="col-12 col-md-4">
								<?php if ( has_post_thumbnail() ) : ?><a href="<?php the_permalink(); ?>" class="image"><?php the_post_thumbnail( 'full' ); ?></a><?php endif; ?>
							</div>
							<div class="col-12 col-md-8">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="excerpt d-none d-md-block"><?php the_excerpt(); ?></div>
								<a class="read-more" href="<?php the_permalink(); ?>">Read more</a>
							</div>
						</div>
					</article>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		</div>
	</div>
</div>
</main>		
<?php get_footer();

