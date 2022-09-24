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
		<p>Team of Grand Theft Auto modding enthusiasts. Since 2021 we are bringing GTA total conversions for PC, Android and even console players.</p>
		<p>Authentic music, attention to details and high-quality scripting - all of that brings great experience to players from all around the world.</p>
	</div>
</article>
<?php echo do_shortcode('[smartslider3 slider="2"]');?>
<section class="mods">
	<div class="container">
		<h2>Our mods</h2>
		<div class="row">
			<div class="col-12 col-lg-6">
				<a href="#" class="mod-block">
					<figure class="main-mod-pic"><img src="<?php echo get_template_directory_uri() ?>/images/FR.png" alt=""></figure>
					<h3>Grand Theft Auto: Forelli Redemption</h3>
				</a>
			</div>
			<div class="col-12 col-lg-6">
				<a href="#" class="mod-block">
					<figure class="main-mod-pic"><img src="<?php echo get_template_directory_uri() ?>/images/SC.png" alt=""></figure>
					<h3>Grand Theft Auto: Sindacco Chronicles</h3>
				</a>
			</div>
		</div>
	</div>
</section>
<section class="team">
	<div class="container">
		<h2>Barcode Team</h2>
		<div class="row">
			<div class="col-12 col-md-6">
				<ul>
					<li><span>1826</span> - Team leader, scripter, storywriter, sound engineer</li>
					<li><span>leshenka</span> - Community manager, tester</li>
					<li><span>willkozz</span> - Designer, tester</li>
				</ul>
			</div>
			<div class="col-12 col-md-6">
				<figure class="team-pic"><img src="<?php echo get_template_directory_uri() ?>/images/demo.jpg" alt=""></figure>
			</div>
		</div>
	</div>
</section>
<?php $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>3)); ?>
<section class="post-section">
	<div class="container">
		<h2>Latest Announces</h2>
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
</section>
<section class="contacts">
	<div class="container">
		<h2>Contacts</h2>
		<div class="row">
			<div class="col-12 col-md-6">
				<a class="contact-link ds" href="https://discord.gg/rsgDVbb9QF">Official Discord server</a>
				<a class="contact-link yt" href="https://www.youtube.com/channel/UC5YOS4SiTAnppEEMvKDf3jQ">Youtube channel</a>
			</div>
			<div class="col-12 col-md-6">
				<a class="contact-link vk" href="https://vk.com/barcodestudia">VKontakte group</a>
				<a class="contact-link bo" href="https://boosty.to/barcodestudia">Boosty</a>
			</div>
			<div class="col-12 col-md-6">
				<figure class="team-pic"><img src="<?php echo get_template_directory_uri() ?>/images/demo.jpg" alt=""></figure>
			</div>
		</div>
	</div>
</section>
</main>
<?php get_footer();