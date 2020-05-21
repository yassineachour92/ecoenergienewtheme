<?php 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit; ?>
<?php
/**
 * Function to get plugin image sizes array
 * 
 * @package wp logo slider and responsive
 * @since 1.0
 */
function lswr_get_fixvalue() {
	static $unique = 0;
	$unique++;	
	return $unique;
}
/**
 * Function to get post featured image
 * 
 * @package wp logo slider and responsive
 * @since 1.0
 */
function lswr_get_logo_image( $post_id = '', $size = 'full' ) {	
	// If external image is blank then take featured image	
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );	
	if( !empty($image) ) {
		$image = isset($image[0]) ? $image[0] : '';
		}	
	return $image;
}
/**
 * Array for logo Grid template
 * 
 * @package wp logo Grid and  widget responsive
 * @since 1.0
 */
function lswr_logo_grid_template() {
	$designs = array( 
		'template-1'	=> __('template-1', 'wp-logo-slider-and-widget'),
		'template-2'	=> __('template-2', 'wp-logo-slider-and-widget'),
		'template-3'	=> __('template-3', 'wp-logo-slider-and-widget'),
		'template-4'	=> __('template-4', 'wp-logo-slider-and-widget'),
		'template-5'	=> __('template-5', 'wp-logo-slider-and-widget'),
		'template-6'	=> __('template-6', 'wp-logo-slider-and-widget'),
		'template-7'	=> __('template-7', 'wp-logo-slider-and-widget'),
		'template-8'	=> __('template-8', 'wp-logo-slider-and-widget'),
		'template-9'	=> __('template-9', 'wp-logo-slider-and-widget'),
		'template-10'	=> __('template-10', 'wp-logo-slider-and-widget')		
		);	
	return apply_filters('lswr_logo_grid_template', $designs);
}
/**
 * Array for logo slider template
 * 
 * @package wp logo slider and  widget responsive
 * @since 1.0
 */
function lswr_logo_slider_template() {
	$designs = array(
		'template-1'	=> __('template-1', 'wp-logo-slider-and-widget'),
		'template-2'	=> __('template-2', 'wp-logo-slider-and-widget'),
		'template-3'	=> __('template-3', 'wp-logo-slider-and-widget'),
		'template-4'	=> __('template-4', 'wp-logo-slider-and-widget'),
		'template-5'	=> __('template-5', 'wp-logo-slider-and-widget'),
		'template-6'	=> __('template-6', 'wp-logo-slider-and-widget'),
		'template-7'	=> __('template-7', 'wp-logo-slider-and-widget'),
		'template-8'	=> __('template-8', 'wp-logo-slider-and-widget'),
		'template-9'	=> __('template-9', 'wp-logo-slider-and-widget'),
		'template-10'	=> __('template-10', 'wp-logo-slider-and-widget')		
		);	
	return apply_filters('lswr_logo_slider_template', $designs);
}
/**
 * Array for logo slider template
 * 
 * @package wp logo slider and  widget responsive
 * @since 1.0
 */
function lswr_logo_filter_template() {
	$designs = array(
		'template-1'	=> __('template-1', 'wp-logo-slider-and-widget'),
		'template-2'	=> __('template-2', 'wp-logo-slider-and-widget'),
		'template-3'	=> __('template-3', 'wp-logo-slider-and-widget'),
		'template-4'	=> __('template-4', 'wp-logo-slider-and-widget'),
		'template-5'	=> __('template-5', 'wp-logo-slider-and-widget'),
		'template-6'	=> __('template-6', 'wp-logo-slider-and-widget'),
		'template-7'	=> __('template-7', 'wp-logo-slider-and-widget'),
		'template-8'	=> __('template-8', 'wp-logo-slider-and-widget'),
		'template-9'	=> __('template-9', 'wp-logo-slider-and-widget'),
		'template-10'	=> __('template-10', 'wp-logo-slider-and-widget')		
		);	
	return apply_filters('lswr_logo_filter_template', $designs);
}
/**
 * Array for logo slider template
 * 
 * @package wp logo slider and  widget responsive
 * @since 1.0
 */
function lswr_logo_ticker_template() {
	$designs = array(
		'template-1'	=> __('template-1', 'wp-logo-slider-and-widget'),
		'template-2'	=> __('template-2', 'wp-logo-slider-and-widget'),
		'template-3'	=> __('template-3', 'wp-logo-slider-and-widget'),
		'template-4'	=> __('template-4', 'wp-logo-slider-and-widget'),
		'template-5'	=> __('template-5', 'wp-logo-slider-and-widget'),
		'template-6'	=> __('template-6', 'wp-logo-slider-and-widget'),
		'template-7'	=> __('template-7', 'wp-logo-slider-and-widget'),
		'template-8'	=> __('template-8', 'wp-logo-slider-and-widget')		
		);	
	return apply_filters('lswr_logo_ticker_template', $designs);
}
function lswr_logo_img_size() {	
	$img_sizes = array(
					'original' 	=> __('original', 'wp-logo-slider-and-widget'),
					'large'		=> __('large', 'wp-logo-slider-and-widget'),
					'medium' 	=> __('medium', 'wp-logo-slider-and-widget'),
					'thumbnail' => __('thumbnail', 'wp-logo-slider-and-widget')
				);
	return $img_sizes;
}
function lswr_logo_animation_effect() {
	$animations = array(
			'flash' 		=> __('flash', 'wp-logo-slider-and-widget'),
			'pulse'			=> __('pulse', 'wp-logo-slider-and-widget'),
			'headShake'		=> __('headShake', 'wp-logo-slider-and-widget'),
			'rubberBand' 	=> __('rubberBand', 'wp-logo-slider-and-widget'),
			'bounceIn'		=> __('bounceIn', 'wp-logo-slider-and-widget'),
			'wobble'		=> __('wobble', 'wp-logo-slider-and-widget'),
			'jello'			=> __('jello', 'wp-logo-slider-and-widget'),
			'swing'			=> __('swing', 'wp-logo-slider-and-widget'),			
			'fadeIn'		=> __('fadeIn', 'wp-logo-slider-and-widget'),
			'fadeOut'		=> __('fadeOut', 'wp-logo-slider-and-widget'),
			'lightSpeedOut'	=> __('lightSpeedOut', 'wp-logo-slider-and-widget'),
			'rotateIn'		=> __('rotateIn', 'wp-logo-slider-and-widget'),
		);
	return apply_filters('lswr_logo_animation_effect', $animations );
}
/**
 * Function to get `Grid cell values` shortcode generator
 * 
 * @package wp logo slider and  widget responsive
 * @since 1.0
 */
function lswr_grid_arr() {
    $design_arr[0] = __(1, 'wp-logo-slider-and-widget');
    $design_arr[1] = __(2, 'wp-logo-slider-and-widget');
    $design_arr[3] = __(3, 'wp-logo-slider-and-widget');
    $design_arr[4] = __(4, 'wp-logo-slider-and-widget');
    $design_arr[6] = __(6, 'wp-logo-slider-and-widget');
    return apply_filters('lswr_grid_arr', $design_arr);
}
function lswr_link_target() {
    $target_arr = array(
        __('same-tab', 'wp-logo-slider-and-widget'),
        __('new-tab', 'wp-logo-slider-and-widget')
    );
    return apply_filters('lswr_designs', $target_arr);
}
function lswr_true_false() {
    $disp_title_arr = array(
        __('true', 'wp-logo-slider-and-widget'),
        __('false', 'wp-logo-slider-and-widget')
    );
    return apply_filters('lswr_designs', $disp_title_arr);
}
function lswr_asc_desc() {
    $disp_title_arr = array(
        __('ASC', 'wp-logo-slider-and-widget'),
        __('DESC', 'wp-logo-slider-and-widget')
    );
    return apply_filters('lswr_designs', $disp_title_arr);
}
function lswr_orderby() {
    $disp_title_arr = array(
        __('ID', 'wp-logo-slider-and-widget'),
        __('author', 'wp-logo-slider-and-widget'),
        __('title', 'wp-logo-slider-and-widget'),
        __('name', 'wp-logo-slider-and-widget'),
        __('rand', 'wp-logo-slider-and-widget'),
        __('date', 'wp-logo-slider-and-widget'),
    );
    return apply_filters('lswr_designs', $disp_title_arr);
}
/**
 * Function to add array after specific key
 * 
 * @package wp logo slider and responsive 
 * @since 1.0
 */
function lswr_logo_join_array(&$array, $value, $index, $from_last = false) {    
    if( is_array($array) && is_array($value) ) {
        if( $from_last ) {
            $total_count    = count($array);
            $index          = (!empty($total_count) && ($total_count > $index)) ? ($total_count-$index): $index;
        }        
        $split_arr  = array_splice($array, max(0, $index));
     echo   $array      = array_merge( $array, $value, $split_arr);
    }    
    return $array;
}
// Manage Category Shortcode Columns
function my_custom_taxonomy_columns( $columns )
{
	$columns['my_term_id'] = __('Term ID');
	return $columns;
}
add_filter('manage_edit-category_columns' , 'my_custom_taxonomy_columns');
function my_custom_taxonomy_columns_content( $content, $column_name, $term_id )
{
    if ( 'my_term_id' == $column_name ) {
        $content = $term_id;
    }
	return $content;
}
add_filter( 'manage_category_custom_column', 'my_custom_taxonomy_columns_content', 10, 3 );
/**
 * Function to get post excerpt
 * 
 * @package wp logo slider with widget responsive
 * @since 1.0.0
 */
function lswr_excerpt( $post_id = null, $content = '', $word_length = '40', $more = '...' ) {
	$has_excerpt 	= false;
	$word_length 	= !empty($word_length) ? $word_length : '40';
	// If post id is passed
	if( !empty($post_id) ) {
		if (has_excerpt($post_id)) {
			$has_excerpt 	= true;
			$content 		= get_the_excerpt();
		} else {
			$content = !empty($content) ? $content : get_the_content();
		}
	}
	if( !empty($content) && (!$has_excerpt) ) {
		$content = strip_shortcodes( $content ); // Strip shortcodes
		$content = wp_trim_words( $content, $word_length, $more );
	}
	return $content;
}
/**
 * create Sanitize URL.
 * 
 * @package video player gallery
 * @since 1.0
 */
function lswr_clean_url( $url ) {
    return esc_url_raw( trim($url) );
}

/**
 * Clean variables using sanitize text field. Arrays are cleaned recursively.
 * Non-scalar values are ignored.
 * 
 * @package Modern Team Showcase with Widget
 * @since 1.0
 */
function lswr_sanitize_clean( $var ) {
    if ( is_array( $var ) ) {
        return array_map( 'lswr_sanitize_clean', $var );
    } else {
        $data = is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
        return wp_unslash($data);
    }
}