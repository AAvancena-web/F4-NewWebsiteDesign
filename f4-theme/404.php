<?php
/**
 * 404 page.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

get_header();
get_template_part(
	'template-parts/page-hero',
	null,
	array(
		'eyebrow' => 'Error 404',
		'title'   => 'This page has moved on',
		'lead'    => 'The page you are looking for is not here. Let us get you back on track.',
		'aside'   => false,
		'buttons' => array(
			array( 'Back to home', home_url( '/' ), 'red' ),
			array( 'Get a free quote', f4_quote_url(), 'white' ),
		),
	)
);
?>
<section class="section section--paper not-found">
	<div class="container">
		<div class="not-found__code" aria-hidden="true">404</div>
		<h2 class="h2">Looking for one of our services?</h2>
		<?php get_search_form(); ?>
		<div style="margin-top:64px;text-align:left;">
			<?php get_template_part( 'template-parts/service-cards' ); ?>
		</div>
	</div>
</section>
<?php
get_footer();
