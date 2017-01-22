<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SM_Theme_Switcher_Devices {

	static $theme_active;

	static function load_mobile_detect() {

		static $detect = null;

		if ( is_null( $detect ) ) {

			/**
			 * Mobile Detect
			 * Detecta la version de los dispositivos
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class/Mobile_Detect.php';

			$detect = new Mobile_Detect();
		}

		return $detect;
	}

	static function init_mobile_detect() {

		$detect = self::load_mobile_detect();

		$options = get_option( 'sm_theme_switcher_settings' );
		$sm_ts = new SM_Theme_Switcher_Options();
		$current_theme = $sm_ts::current_theme();

		if ( $detect->isMobile() ) {
			$sm_tc_theme = $options['sm_theme_switcher_settings_phone'];
			if ($sm_tc_theme == "") {
				$sm_tc_theme = $current_theme;
			}
		}
		elseif ($detect->isTablet() ) {
			$sm_tc_theme = $options['sm_theme_switcher_settings_tablet'];
			if ($sm_tc_theme == "") {
				$sm_tc_theme = $current_theme;
			}
		}
		else {
			$sm_tc_theme = $options['sm_theme_switcher_settings_desktop'];
			if ($sm_tc_theme == "") {
				$sm_tc_theme = $current_theme;
			}
		}

		self::set_teme_active($sm_tc_theme);
		self::sm_change_theme();
	}

	static function sm_change_theme($theme_name = null) {



		add_filter( 'template', array('SM_Theme_Switcher_Devices', 'sm_select_theme') );

		add_filter( 'stylesheet', array('SM_Theme_Switcher_Devices', 'sm_select_theme') );
		
	}

	static function sm_select_theme() {
		return self::get_teme_active();
	}




	
	/**
	 * Admin
	 * Opciones del plugin
	 */
	static function sm_get_themes() {

		$list_themes = wp_get_themes();
		
		return $list_themes;
		
	}


	
	static public function set_teme_active($theme_slug='') {
		self::$theme_active = $theme_slug;
	}	
	
	static public function get_teme_active() {
		return self::$theme_active;
	}	
	
	
}
