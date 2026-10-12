<?php
/**
 * FAQ accordion with FAQPage schema.
 *
 * Args: title, items (array of q/a).
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

$args = wp_parse_args( $args, array( 'title' => 'Frequently asked questions', 'items' => array() ) );
if ( ! $args['items'] ) {
	return;
}
$schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => array(),
);
?>
<section class="section">
	<div class="container split" style="align-items:start;">
		<div data-reveal="left">
			<?php f4_eyebrow( 'FAQ' ); ?>
			<h2 class="h2"><?php echo esc_html( $args['title'] ); ?></h2>
			<p class="lead">Still have a question? Call <a class="text-red" href="<?php echo esc_attr( f4_phone_href() ); ?>"><strong><?php echo esc_html( f4_phone() ); ?></strong></a> or send an enquiry and the team will help.</p>
		</div>
		<div class="accordion" data-reveal="right">
			<?php
			foreach ( $args['items'] as $index => $item ) :
				$schema['mainEntity'][] = array(
					'@type'          => 'Question',
					'name'           => $item['q'],
					'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $item['a'] ),
				);
				?>
				<details <?php echo 0 === $index ? 'open' : ''; ?>>
					<summary><span><?php echo esc_html( $item['q'] ); ?></span><span class="acc-icon"><?php echo f4_icon( 'plus' ); // phpcs:ignore ?></span></summary>
					<div class="acc-body"><p><?php echo esc_html( $item['a'] ); ?></p></div>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
	<script type="application/ld+json"><?php echo wp_json_encode( $schema ); ?></script>
</section>
