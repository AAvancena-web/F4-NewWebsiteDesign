<?php
/**
 * Blog index, archives and search results.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

get_header();

if ( is_search() ) {
	/* translators: %s: search query. */
	$title = sprintf( 'Results for "%s"', get_search_query() );
	$lead  = 'Search results across the F4 Group Holdings Limited website.';
} elseif ( is_archive() ) {
	$title = get_the_archive_title();
	$lead  = wp_strip_all_tags( get_the_archive_description() );
} else {
	$blog  = get_option( 'page_for_posts' );
	$title = $blog ? get_the_title( $blog ) : 'News and insights';
	$lead  = 'Updates, tips, and news from the F4 Group Holdings Limited team.';
}

get_template_part( 'template-parts/page-hero', null, array( 'eyebrow' => 'F4 Group Holdings Limited', 'title' => $title, 'lead' => $lead, 'aside' => false ) );
?>

<section class="section section--paper">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="post-grid">
				<?php
				$i = 0;
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/post-card', null, array( 'delay' => $i++ % 3 ) );
				endwhile;
				?>
			</div>
			<?php
			the_posts_pagination(
				array(
					'mid_size'  => 1,
					'prev_text' => 'Prev',
					'next_text' => 'Next',
				)
			);
			?>
		<?php else : ?>
			<div class="section-head section-head--center">
				<h2 class="h2">Nothing found</h2>
				<p class="lead">Try a different search, or get in touch and we will point you in the right direction.</p>
				<?php get_search_form(); ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
