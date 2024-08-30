<?php get_header(); 
$page_object = get_queried_object();
$current_page = !empty( $_GET['publications'] ) ? $_GET['publications'] : 1;
$query = new WP_Query( [
	'posts_per_page' => 6,
	'orderby'        => 'date',
	'paged' => $current_page,
	'tag'   => $page_object->slug,
] );
global $post; ?>
<main>
<div class="post-section">
	<div class="container">
		<h1>Posts</h1>
		<div class="row">
		<?php if ( $query->have_posts() ) { 
			while ( $query->have_posts() ) { 
			$query->the_post(); ?>
				<div class="col-6 col-md-12">
					<article class="post-ind">
						<div class="row">
							<div class="col-12 col-md-4">
								<?php if ( has_post_thumbnail() ) : ?><a href="<?php the_permalink(); ?>" class="image"><?php the_post_thumbnail( 'full' ); ?></a>	
		<?php endif; ?>
							</div>
							<div class="col-12 col-md-8">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="excerpt d-none d-md-block"><?php the_excerpt(); ?></div>
								<div class="post-tags short-tags"> 
									<?php the_terms( $GLOBALS['post']->ID, 'category', 'Category: '); ?>
								</div>
								<div class="post-tags short-tags"> 
									<?php the_terms( $GLOBALS['post']->ID, 'post_tag', 'Related to: '); ?>
								</div>
								<a class="read-more" href="<?php the_permalink(); ?>">Read more</a>
							</div>
						</div>
					</article>
				</div>
			<?php } } ?>
		</div>
		<div class="barcode-pagination">
			<?php
				echo paginate_links(array(
					'base' => site_url() . '/posts%_%',
					'format' => '?publications=%#%',
					'total' => $query->max_num_pages,
					'current' => $current_page,
				));
			?>
			<?php wp_reset_postdata() ?>
		</div>
	</div>
</div>
</main>		
<?php get_footer();