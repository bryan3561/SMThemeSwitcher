<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SM_Theme_Switcher_Options {

	/**
	 * Admin
	 * Opciones del plugin
	 */
	static function get_themes() {

		static $list_themes = null;

		if (is_null($list_themes)) {
			$themes = wp_get_themes();

			foreach ($themes as $theme_key => $theme) {
				$list_themes[$theme->template] = $theme->get('Name');
			}
		}

		return $list_themes;
	}

	static public function get_themes_options($value = '') {
		$options = '';
		foreach (self::get_themes() as $theme_slug => $theme_name) {
			if ($theme_name == "")
				$theme_name = $theme_slug;
			$selected = selected( $theme_slug, $value, false);
			$options .= "<option value=\"{$theme_slug}\" $selected>{$theme_name}</option>";
		}
		return $options;
	}

	static public function current_theme() {
		$current_theme = wp_get_theme();
		return $current_theme->template;
	}


	
}
