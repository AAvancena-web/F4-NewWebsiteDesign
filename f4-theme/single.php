<?php
/**
 * Single post.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	$cats = get_the_category();
	get_template_part(
		'template-parts/page-hero',
		null,
		array(
			'eyebrow' => $cats ? $cats[0]->name : 'News',
			'title'   => get_the_title(),
			'lead'    => get_the_date() . ' | ' . max( 1, (int) round( str_word_count( wp_strip_all_tags( get_the_content() ) ) / 220 ) ) . ' min read',
			'aside'   => false,
		)
	);
	?>
	<section class="section">
		<div class="container">
			<div class="prose prose--narrow">
				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="single-media"><?php the_post_thumbnail( 'f4-wide' ); ?></figure>
				<?php endif; ?>
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div>
			<div class="prose--narrow">
				<nav class="post-nav" aria-label="Post navigation">
					<div><?php previous_post_link( '%link', '<small>Previous</small>%title' ); ?></div>
					<div class="post-nav__next"><?php next_post_link( '%link', '<small>Next</small>%title' ); ?></div>
				</nav>
				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>
			</div>
		</div>
	</section>
	<?php
endwhile;

get_template_part( 'template-parts/cta-band' );
get_footer();
