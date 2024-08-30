<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>
<main>
<article class="what-is">
	<div class="container">
		<h1>Welcome to the home of Barcode Studia</h1>
		<p><?php the_field('site-desc') ?></p>
	</div>
</article>
<?php $query = new WP_Query( [
	'posts_per_page' => 2,
	'orderby'        => 'date',
	'post_type'		=> 'mods'
] );
global $post; ?>
<section class="mods">
	<div class="container">
		<h2>Featured mods</h2>
		<div class="row">
		<?php if ( $query->have_posts() ) { 
			while ( $query->have_posts() ) { 
				$query->the_post(); ?>
				<div class="col-12 col-lg-6">
					<a href="<?php the_permalink(); ?>" class="mod-block">
						<?php if ( has_post_thumbnail() ) : ?><figure class="main-mod-pic"><?php the_post_thumbnail( 'full' ); ?></figure><?php endif; ?>
						<h3><?php the_title(); ?></h3>
					</a>
				</div>
			<?php } } ?>
		</div>
	</div>
</section>	
<?php wp_reset_postdata() ?>
<?php $query = new WP_Query( [
	'posts_per_page' => 4,
	'orderby'        => 'date'
] );
global $post; ?>
<section class="post-section">
	<div class="container">
		<h2>Recent posts</h2>
		<div class="row">
		<?php if ( $query->have_posts() ) { 
			while ( $query->have_posts() ) { 
			$query->the_post(); ?>
				<div class="col-6 col-md-12">
					<article class="post-ind">
						<div class="row">
							<div class="col-12 col-md-4">
								<?php if ( has_post_thumbnail() ) : ?><a href="<?php the_permalink(); ?>" class="image"><?php the_post_thumbnail( 'full' ); ?></a><?php endif; ?>
							</div>
							<div class="col-12 col-md-8">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="excerpt d-none d-md-block"><?php the_excerpt(); ?></div>
								<div class="post-tags short-tags"> <?php the_terms( $GLOBALS['post']->ID, 'category', 'Category: '); ?></div>
								<div class="post-tags short-tags"> <?php the_terms( $GLOBALS['post']->ID, 'post_tag', 'Related to: '); ?></div>
								<div class="post-tags short-tags"><?php the_date( 'Y/m/d', '<p>', '</p>' ); ?></div>
								<a class="read-more" href="<?php the_permalink(); ?>">Read more</a>
							</div>
						</div>
					</article>
				</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php wp_reset_postdata() ?>
<?php $teams = get_field('team');
	if($teams)
	{
		echo ('<section class="team"><div class="container"><h2>Barcode Team</h2><div class="row"><div class="col-12"><ul class="marker-list">');
		foreach($teams as $team)
		{
			echo '<li>', $team['team-member-name'], ' - ', $team['team-desc'], '</li>';
		}
		echo ('</ul></div></div></div></section>');
	}
?>					  
	<?php $contacts = get_field('contacts');
	if($contacts)
	{
		echo ('<section class="contacts"><div class="container"><h2>How to contact us</h2><div class="row"><div class="col-12 col-md-6"><ul class="marker-list">');
		foreach($contacts as $contact)
		{
			echo '<li><a href="', $contact['contact-link'], '" class="social-link">', $contact['contact-desc'], '</a></li>';
		}
		echo ('</ul></div></div></div></section>');
	}
?>		
</main>
<?php get_footer();