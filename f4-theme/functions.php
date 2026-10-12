<?php
/**
 * F4 Group theme bootstrap.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

define( 'F4_VERSION', '1.0.0' );
define( 'F4_DIR', get_template_directory() );
define( 'F4_URI', get_template_directory_uri() );

require F4_DIR . '/inc/data.php';
require F4_DIR . '/inc/helpers.php';
require F4_DIR . '/inc/icons.php';
require F4_DIR . '/inc/setup.php';
require F4_DIR . '/inc/customizer.php';
require F4_DIR . '/inc/forms.php';
require F4_DIR . '/inc/menus.php';
require F4_DIR . '/inc/activation.php';
