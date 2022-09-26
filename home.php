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
<?php echo do_shortcode('[smartslider3 slider="2"]');?>
<section class="mods">
	<div class="container">
		<h2>Our mods</h2>
		<div class="row">
			<div class="col-12 col-lg-6">
				<a href="https://barcode-studia.ru/mods/forelli-redemption/" class="mod-block">
					<figure class="main-mod-pic"><img src="<?php echo get_template_directory_uri() ?>/images/FR.png" alt=""></figure>
					<h3>Grand Theft Auto: Forelli Redemption</h3>
				</a>
			</div>
			<div class="col-12 col-lg-6">
				<a href="https://barcode-studia.ru/mods/sindacco-chronicles/" class="mod-block">
					<figure class="main-mod-pic"><img src="<?php echo get_template_directory_uri() ?>/images/SC.png" alt=""></figure>
					<h3>Grand Theft Auto: Sindacco Chronicles</h3>
				</a>
			</div>
		</div>
	</div>
</section>	
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