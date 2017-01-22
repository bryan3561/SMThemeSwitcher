<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.facebook.com/bryan3561
 * @since             1.0.0
 * @package           Sm_Theme_Switcher
 *
 * @wordpress-plugin
 * Plugin Name:       SM Theme Switcher
 * Plugin URI:        http://itsoft.org.ve/wordpress/plugins/sm-theme-switcher/
 * Description:       Assign a theme for each device type
 * Version:           1.0.0
 * Author:            Bryan Contreras
 * Author URI:        https://www.facebook.com/bryan3561
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sm-theme-switcher
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sm-theme-switcher-activator.php
 */
function activate_sm_theme_switcher() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sm-theme-switcher-activator.php';
	Sm_Theme_Switcher_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sm-theme-switcher-deactivator.php
 */
function deactivate_sm_theme_switcher() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sm-theme-switcher-deactivator.php';
	Sm_Theme_Switcher_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sm_theme_switcher' );
register_deactivation_hook( __FILE__, 'deactivate_sm_theme_switcher' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sm-theme-switcher.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sm_theme_switcher() {

	$plugin = new Sm_Theme_Switcher();
	$plugin->run();

}

#$qmas = new SM_Theme_Switcher_Devices();
#var_dump($qmas::load_mobile_detect());

run_sm_theme_switcher();
