<?php
/**
 * WP Theme constants and setup functions
 *
 * @package TenUpTheme
 */

/**
 * Custom logging in /log
 *
 * @param object $message message to be logged
 * @param object $data data to file
 */
function custom_theme_error_log( $message, $data = '' ) {

	$log = trailingslashit( get_stylesheet_directory() ) . 'log/';
	if ( ! is_dir( $log ) ) {
		mkdir( $log );
	}

	$file = $log . gmdate( 'Y-m-d' ) . '.log';
	if ( ! is_file( $file ) ) {
		file_put_contents( $file, '' );
	}
	if ( ! empty( $data ) ) {
		$message = array( $message => $data );
	}
	$data_string = print_r( $message, true ) . "\n";
	file_put_contents( $file, $data_string, FILE_APPEND );
}

// Useful global constants.
define( 'TENUP_THEME_VERSION', '0.1.0' );
define( 'TENUP_THEME_TEMPLATE_URL', get_template_directory_uri() );
define( 'TENUP_THEME_PATH', get_template_directory() . '/' );
define( 'TENUP_THEME_DIST_PATH', TENUP_THEME_PATH . 'dist/' );
define( 'TENUP_THEME_DIST_URL', TENUP_THEME_TEMPLATE_URL . '/dist/' );
define( 'TENUP_THEME_INC', TENUP_THEME_PATH . 'includes/' );
define( 'TENUP_THEME_BLOCK_DIR', TENUP_THEME_INC . 'blocks/' );
define( 'TENUP_THEME_BLOCK_DIST_DIR', TENUP_THEME_PATH . 'dist/blocks/' );

$is_local_env = in_array( wp_get_environment_type(), array( 'local', 'development' ), true );
$is_local_url = strpos( home_url(), '.test' ) || strpos( home_url(), '.local' );
$is_local     = $is_local_env || $is_local_url;

if ( $is_local && file_exists( __DIR__ . '/dist/fast-refresh.php' ) ) {
	require_once __DIR__ . '/dist/fast-refresh.php';
	TenUpToolkit\set_dist_url_path( basename( __DIR__ ), TENUP_THEME_DIST_URL, TENUP_THEME_DIST_PATH );
}


// Require Composer autoloader if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}



/**
 * Get all the include files for the theme.
 *
 * @author stcode
 */
function include_inc_files() {
	$files        = array(
		'includes/', // Load core functions.
		'includes/classes/', // Load classes.
		'includes/classes/acf-blocks/', // Load additional classes acf blocks..
		'includes/classes/theme/', // Load additional classes theme.
	);
	$template_dir = trailingslashit( get_template_directory() );

	foreach ( $files as $include ) {
		$include = $template_dir . $include;

		// Allows inclusion of individual files or all .php files in a directory.
		if ( is_dir( $include ) ) {
			foreach ( glob( $include . '*.php' ) as $file ) {
				require $file;
			}
		} else {
			require $include;
		}
	}
}


include_inc_files();

// Run the setup functions.
TenUpTheme\Core\setup();
TenUpTheme\Blocks\setup();

// run the additonal core theme
$core = new TenUpTheme\Additional();
$core->init_hooks();


if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for the new wp_body_open() function that was added in 5.2
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 *  Disable Site Visibility in the Admin Bar
 */
add_action(
	'admin_bar_menu',
	function ( $wp_admin_bar ) {
		$wp_admin_bar->remove_node( 'woocommerce-site-visibility-badge' );
	},
	100,
);

/**
 *  Disable Default Header Store Notice
 */
function modify_woocommerce_demo_store() {
	return null;
}

add_filter( 'woocommerce_demo_store', 'modify_woocommerce_demo_store', 10, 2 );

/**
 *  Remove Ebook and Any Uncategorized in the default Shop Query
 */
function custom_pre_get_posts_query( $q ) {

	$tax_query = (array) $q->get( 'tax_query' );

	$tax_query[] = array(
		'taxonomy' => 'product_cat',
		'field'    => 'slug',
		'terms'    => array( 'ebooks', 'uncategorized' ),
		'operator' => 'NOT IN',
	);

	$q->set( 'tax_query', $tax_query );
}

add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );

/**
 * Change the breadcrumb separator
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' &gt; ';
	return $defaults;
}
