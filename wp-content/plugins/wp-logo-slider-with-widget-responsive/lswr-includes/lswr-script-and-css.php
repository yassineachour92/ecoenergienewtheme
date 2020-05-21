<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package wp logo slider with widget responsive
 * @since 1.2.8
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
	class lswr_Script {
		function __construct() {
			// Action to add style at front side
			add_action( 'wp_enqueue_scripts', array($this, 'lswr_logo_slider_css' ));
		
			// Action to add script at front side
			add_action( 'wp_enqueue_scripts', array($this, 'lswr_logo_slider_script') );
			// Action to add style in backend
		    add_action( 'admin_enqueue_scripts', array($this, 'lswr_logo_slider_script') );
		}
	function lswr_logo_slider_css() {
		// Registring and enqueing slick slider css
		if( !wp_style_is( 'wpoh-slick-css', 'registered' ) ) {
			wp_register_style( 'wpoh-slick-css', lSWR_URL.'lswr-assets/css/slick.css', array(), lSWR_VERSION );
			wp_enqueue_style( 'wpoh-slick-css' );
		}
        if( !wp_style_is( 'wpoh-fontawesome-css', 'registered' ) ) {
			wp_register_style( 'wpoh-fontawesome-css', lSWR_URL.'lswr-assets/css/font-awesome.min.css', array(), lSWR_VERSION  );
			wp_enqueue_style( 'wpoh-fontawesome-css');	
		} 
		if( !wp_style_is( 'wpoh-animate-css', 'registered' ) ) {
			wp_register_style( 'wpoh-animate-css', lSWR_URL.'lswr-assets/css/animate.min.css', array(), lSWR_VERSION  );
			wp_enqueue_style( 'wpoh-animate-css');	
		} 
		wp_register_style( 'lswr_style', lSWR_URL.'lswr-assets/css/lswr-logo-slider.css', array(), lSWR_VERSION );
		wp_enqueue_style( 'lswr_style');
		
    	
	}
	function lswr_logo_slider_script(){		
		// Registring slick slider js
		if( !wp_script_is( 'wpoh-slick-js', 'registered' ) ) {
			wp_register_script( 'wpoh-slick-js', lSWR_URL.'lswr-assets/js/slick.min.js', array('jquery'), lSWR_VERSION, true );
		}
			if( !wp_script_is( 'wpoh-catfilter-js', 'registered' ) ) {
			wp_register_script( 'wpoh-catfilter-js', lSWR_URL.'lswr-assets/js/catfilte.js', array('jquery'), lSWR_VERSION, true );
			wp_localize_script( 'wpoh-catfilter-js', 'Wpls', array());
			
		}  
        
        wp_register_script( 'lswr-shortcode', lSWR_URL.'lswr-assets/js/lswr-admin.js', array('jquery'), lSWR_VERSION, true );
	    wp_enqueue_script('lswr-shortcode');
		wp_register_script( 'lswr-costum-js', lSWR_URL.'lswr-assets/js/lswr-costum.js', array('jquery'), lSWR_VERSION, true );		
		wp_localize_script( 'lswr-costum-js', 'Wpls', array());
		wp_enqueue_script('lswr-costum-js');
	}
}
$wpls_script = new lswr_Script();