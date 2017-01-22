<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.facebook.com/bryan3561
 * @since      1.0.0
 *
 * @package    Sm_Theme_Switcher
 * @subpackage Sm_Theme_Switcher/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sm_Theme_Switcher
 * @subpackage Sm_Theme_Switcher/admin
 * @author     Bryan Contreras <bryan3561@gmail.com>
 */
class Sm_Theme_Switcher_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sm_Theme_Switcher_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sm_Theme_Switcher_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sm-theme-switcher-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sm_Theme_Switcher_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sm_Theme_Switcher_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sm-theme-switcher-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function sm_theme_switcher_settings() {

		register_setting( 'sm_theme_switcher_settings_page', 'sm_theme_switcher_settings' );

		sm_theme_switcher_settings_render();

	}

	/**
	 * Registra en el menu de WordPress el enlace para conigurar el plugin
	 * @return void
	 */
	function sm_theme_switcher_menu() {

		# $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function

		add_submenu_page( 'themes.php', 'SM Theme Switcher', 'SM Theme Switcher', 'manage_options', 'sm_theme_switcher_admin', 'callback_sm_theme_switcher_admin' );

	}





}



	/**
	 * Panel de administracion 
	 */
	function callback_sm_theme_switcher_admin() {
		require_once dirname(__FILE__) . '/setting-frontend.php';
	}




function sm_theme_switcher_settings_render() { 
	# version phone
	add_settings_section(
		'sm_theme_switcher_settings_phone_section',
		__( 'Select a theme for each device type.', 'sm-theme-switcher' ),
		'callback_sm_theme_switcher_settings_phone_section',
		'sm_theme_switcher_settings_page'
	);

	add_settings_field(
		'sm_theme_switcher_settings_phone',
		__( 'Phone', 'sm-theme-switcher' ),
		'callback_sm_theme_switcher_settings_phone',
		'sm_theme_switcher_settings_page',
		'sm_theme_switcher_settings_phone_section'
	);

	add_settings_field(
		'sm_theme_switcher_settings_tablet',
		__( 'Tablet', 'sm-theme-switcher' ),
		'callback_sm_theme_switcher_settings_tablet',
		'sm_theme_switcher_settings_page',
		'sm_theme_switcher_settings_phone_section'
	);

	add_settings_field(
		'sm_theme_switcher_settings_desktop',
		__( 'Desktop', 'sm-theme-switcher' ),
		'callback_sm_theme_switcher_settings_desktop',
		'sm_theme_switcher_settings_page',
		'sm_theme_switcher_settings_phone_section'
	);
}


function callback_sm_theme_switcher_settings_phone_section() {}

function callback_sm_theme_switcher_settings_phone() {
	$options = get_option( 'sm_theme_switcher_settings' );
	
	$sm_ts = new SM_Theme_Switcher_Options();
	$options_html = $sm_ts::get_themes_options($options['sm_theme_switcher_settings_phone']);
	echo <<<INPUT
	<select id="sm_theme_switcher_settings_phone" name="sm_theme_switcher_settings[sm_theme_switcher_settings_phone]">
		{$options_html}
	</select>
INPUT;
}
function callback_sm_theme_switcher_settings_tablet() {
	$options = get_option( 'sm_theme_switcher_settings' );
	
	$sm_ts = new SM_Theme_Switcher_Options();
	$options_html = $sm_ts::get_themes_options($options['sm_theme_switcher_settings_tablet']);
	echo <<<INPUT
	<select id="sm_theme_switcher_settings_tablet" name="sm_theme_switcher_settings[sm_theme_switcher_settings_tablet]">
		{$options_html}
	</select>
INPUT;
}
function callback_sm_theme_switcher_settings_desktop() {
	$options = get_option( 'sm_theme_switcher_settings' );
	
	$sm_ts = new SM_Theme_Switcher_Options();
	$options_html = $sm_ts::get_themes_options($options['sm_theme_switcher_settings_desktop']);
	echo <<<INPUT
	<select id="sm_theme_switcher_settings_desktop" name="sm_theme_switcher_settings[sm_theme_switcher_settings_desktop]">
		{$options_html}
	</select>
INPUT;
}