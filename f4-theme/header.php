<?php
/**
 * Global header.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">Skip to content</a>
<div class="scroll-progress" aria-hidden="true"><span></span></div>

<header class="site-header" data-header>
	<div class="topbar">
		<div class="container topbar__inner">
			<p class="topbar__tag">One team. One standard. <i>|</i> Free quotes nationwide</p>
			<ul class="topbar__links">
				<li><a href="mailto:<?php echo esc_attr( f4_email() ); ?>"><?php echo f4_icon( 'mail' ); // phpcs:ignore ?><span><?php echo esc_html( f4_email() ); ?></span></a></li>
				<li><span><?php echo f4_icon( 'pin' ); // phpcs:ignore ?><?php echo esc_html( f4_opt( 'f4_location' ) ); ?> wide</span></li>
				<li><a class="topbar__franchise" href="<?php echo esc_url( f4_url( 'franchise-opportunity' ) ); ?>">Franchise opportunities available <?php echo f4_icon( 'arrow-right' ); // phpcs:ignore ?></a></li>
			</ul>
		</div>
	</div>

	<div class="container header-main">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> home">
			<?php
			if ( has_custom_logo() ) {
				$logo_id = get_theme_mod( 'custom_logo' );
				echo wp_get_attachment_image( $logo_id, 'medium', false, array( 'class' => 'brand__logo', 'alt' => get_bloginfo( 'name' ) ) );
			} else {
				printf( '<img class="brand__logo" src="%s" alt="F4 Group Holdings Limited" width="120" height="116">', esc_url( f4_img( 'logo.png' ) ) );
			}
			?>
			<span class="brand__text"><strong>F4 Group</strong><small>Holdings Limited</small></span>
		</a>

		<nav class="primary-nav" id="primary-nav" aria-label="Primary" data-nav>
			<div class="primary-nav__head">
				<span class="eyebrow eyebrow--gold">Menu</span>
				<button class="nav-close" type="button" aria-label="Close menu" data-nav-close><?php echo f4_icon( 'close' ); // phpcs:ignore ?></button>
			</div>
			<?php f4_primary_menu(); ?>
			<div class="primary-nav__foot">
				<?php f4_button( 'Get a free quote', f4_quote_url(), 'red' ); ?>
				<a class="nav-contact" href="<?php echo esc_attr( f4_phone_href() ); ?>"><?php echo f4_icon( 'phone' ); // phpcs:ignore ?><span><?php echo esc_html( f4_phone() ); ?></span></a>
				<a class="nav-contact" href="mailto:<?php echo esc_attr( f4_email() ); ?>"><?php echo f4_icon( 'mail' ); // phpcs:ignore ?><span><?php echo esc_html( f4_email() ); ?></span></a>
			</div>
		</nav>

		<div class="header-actions">
			<a class="header-call" href="<?php echo esc_attr( f4_phone_href() ); ?>" aria-label="Call <?php echo esc_attr( f4_phone() ); ?>">
				<span class="call-circle"><?php echo f4_icon( 'phone' ); // phpcs:ignore ?></span>
				<span class="header-call__text"><small>Call us free</small><strong><?php echo esc_html( f4_phone() ); ?></strong></span>
			</a>
			<?php f4_button( 'Get a free quote', f4_quote_url(), 'red', 'arrow-right', 'data-cta="header"' ); ?>
			<button class="nav-toggle" type="button" aria-controls="primary-nav" aria-expanded="false" aria-label="Open menu" data-nav-toggle>
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>
</header>
<div class="nav-overlay" data-nav-close aria-hidden="true"></div>

<main id="main" class="site-main">
