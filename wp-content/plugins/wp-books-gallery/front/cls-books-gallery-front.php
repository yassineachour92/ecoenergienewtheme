<?php
/**
*	Front Parent Class
*/
class WBG_Front 
{	
	private $wbg_version;

	function __construct( $version ){
		$this->wbg_version = $version;
		$this->wbg_assets_prefix = substr(WBG_PRFX, 0, -1) . '-';
	}
	
	function wbg_front_assets(){
		
		wp_enqueue_style(	'wbg-front-style-w3',
							WBG_ASSETS . 'css/' . $this->wbg_assets_prefix . 'w3.css',
							array(),
							$this->wbg_version,
							FALSE );
		wp_enqueue_style(	'wbg-front-style',
							WBG_ASSETS . 'css/' . $this->wbg_assets_prefix . 'front-style.css',
							array(),
							$this->wbg_version,
							FALSE );
		if ( !wp_script_is( 'jquery' ) ) {
			wp_enqueue_script('jquery');
		}
		wp_enqueue_script(  'wbg-front-script',
							WBG_ASSETS . 'js/wbg-front-script.js',
							array('jquery'),
							$this->wbg_version,
							TRUE );
	}

	function wbg_load_shortcode(){
		add_shortcode( 'wp_books_gallery', array( $this, 'wbg_load_shortcode_view' ) );
	}
	
	function wbg_load_shortcode_view($attr){
		$output = '';
		ob_start();
		include WBG_PATH . 'front/view/' . $this->wbg_assets_prefix . 'front-view.php';
		$output .= ob_get_clean();
		return $output;
	}

	function wbg_load_single_template($template){
		global $post;
		
		if ( 'books' === $post->post_type && locate_template( array( 'wbg-single-book.php' ) ) !== $template ) {
			return WBG_PATH . 'front/view/' . $this->wbg_assets_prefix . 'single-book.php';
		}

		return $template;
	}
}
?>