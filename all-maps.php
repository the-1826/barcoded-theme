<?php
/*
Template Name: All Maps
*/
?>
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
		<h1>Maps</h1>
		<p style="margin-bottom: 40px">Welcome to the map gallery. Choose a game and find any information you are interested in.</p>
			<article class="post-ind">
				<div class="row">
					<div class="col-6 col-md-4">
						<figure><a href="https://barcode-studia.ru/sc-maps/" class="image"><img src="https://barcode-studia.ru/wp-content/uploads/2023/06/gta-sindacco-chronicles-package-map.webp" alt=""></a></figure>
					</div>
					<div class="col-6 col-md-8">
						<h3><a href="https://barcode-studia.ru/sc-maps/">Sindacco Chronicles Maps</a></h3>
						<a class="read-more" href="https://barcode-studia.ru/sc-maps/">Read more</a>
					</div>
				</div>
			</article>
			<article class="post-ind">
				<div class="row">
					<div class="col-6 col-md-4">
						<figure><a href="https://barcode-studia.ru/fr-maps/" class="image"><img src="https://barcode-studia.ru/wp-content/uploads/2023/06/gta-forelli-redemption-hidden-packages-map.webp" alt=""></a></figure>
					</div>
					<div class="col-6 col-md-8">
						<h3><a href="https://barcode-studia.ru/fr-maps/">Forelli Redemption Maps</a></h3>
						<a class="read-more" href="https://barcode-studia.ru/fr-maps/">Read more</a>
					</div>
				</div>
			</article>
		</div>
</div>
</main>		
<?php get_footer();