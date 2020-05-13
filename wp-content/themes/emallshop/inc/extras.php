<?php 
/**
 * EmallShop Extras Functions
 *
 * @package PressLayouts
 * @subpackage EmallShop
 * @since EmallShop 1.0
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* 	Get activated theme
/* --------------------------------------------------------------------- */
if(!function_exists('emallshop_activated_theme')) {
    function emallshop_activated_theme() {
        $activated_data = get_option( 'emallshop_activated_data' );
        $theme = ( isset( $activated_data['theme'] ) && ! empty( $activated_data['theme'] ) ) ? $activated_data['theme'] : false ;
        return $theme;
    }

}

/* 	Is theme activatd
/* --------------------------------------------------------------------- */
if(!function_exists('emallshop_is_activated')) {
    function emallshop_is_activated() {
        if ( emallshop_activated_theme() != EMALLSHOP_PREFIX ) return false;
		if ( ! get_option( 'emallshop_is_activated' ) ) update_option( 'emallshop_is_activated', true );        
        return get_option( 'emallshop_is_activated', false );
    }
}

/* 	Check WooCommerce is activated
/* --------------------------------------------------------------------- */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/* 	Check Dokan is activated
/* --------------------------------------------------------------------- */
if ( ! function_exists( 'is_dokan_activated' ) ) {
	function is_dokan_activated() {
		return class_exists( 'WeDevs_Dokan' ) ? true : false;
	}
}

/* 	Check WC Marketplace is activated
/* --------------------------------------------------------------------- */
if ( ! function_exists( 'is_WC_Marketplace_activated' ) ) {
	function is_WC_Marketplace_activated() {
		return class_exists( 'WCMp' ) ? true : false;
	}
}

/*Check WC Vendors is activated
/* --------------------------------------------------------------------- */
if( ! function_exists( 'is_wc_vendors_activated' ) ) {
	function is_wc_vendors_activated() {
		return class_exists( 'WC_Vendors' ) ? true : false;
	}
}

/*Check Visual Composer is activated
/* --------------------------------------------------------------------- */
if( ! function_exists( 'is_vc_activated' ) ) {
	function is_vc_activated() {
		return class_exists( 'WPBakeryVisualComposerAbstract' ) ? true : false;
	}
}

/**
 * Get options
 */
if ( ! function_exists( 'emallshop_get_option' ) ) {
	function emallshop_get_option( $name, $default = '' ) {
		global $emallshop_options;
		if ( isset( $emallshop_options[$name]  ) ) {
			if(  is_array( $emallshop_options[$name] ) && isset($emallshop_options[$name]['url']) && empty ( $emallshop_options[$name]['url'] ) ){
				return $default;
			}
			return $emallshop_options[$name];
		}
		return $default;
	}
}

/**
 * Check is plugin active
 */
if ( ! function_exists( 'emallshop_check_plugin_active' ) ) {
	function emallshop_check_plugin_active( $plugin ) {
		if( empty($plugin) ) return false;
		return in_array( $plugin, (array) get_option( 'active_plugins', array() ) ) || is_plugin_active_for_network( $plugin );
	}
}

if ( ! function_exists( 'emallshop_allowed_html' ) ) {
	/**
	 * Allowed html
	 */
	function emallshop_allowed_html( $allowed_els = '' ){

		// bail early if parameter is empty
		if( empty($allowed_els) ) return array();

		if( is_string($allowed_els) ){
			$allowed_els = explode(',', $allowed_els);
		}

		$allowed_html = array();

		$allowed_tags = wp_kses_allowed_html('post');

		foreach( $allowed_els as $el ){
			$el = trim($el);
			if( array_key_exists($el, $allowed_tags) ){
				$allowed_html[$el] = $allowed_tags[$el];
			}
		}

		return $allowed_html;
	}
}

/**
 * Convert HEX to RGB.
 *
 * @since EmallShop 1.0
 */
function emallshop_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) == 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) == 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

function emallshop_new_excerpt_length($length) {
	return 20;
}