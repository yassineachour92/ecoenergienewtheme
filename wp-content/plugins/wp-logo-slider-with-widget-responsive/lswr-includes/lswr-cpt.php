<?php 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit; ?>
<?php 
/**
 * register costum post type 
 * 
 * @package wp logo slider with widget responsive
 * @since 1.0
 */
function lswr_logo_slider_post_types() {
	$jd_slider_labels =  apply_filters( 'jd_logo_slider_labels', array(
		'name'                => 'Logo Slider',
		'singular_name'       => 'Logo Slider',
		'add_new'             => __('Add New', 'wp-logo-slider-and-widget'),
		'add_new_item'        => __('Add New Logo Slider', 'wp-logo-slider-and-widget'),
		'edit_item'           => __('Edit Logo Slider', 'wp-logo-slider-and-widget'),
		'new_item'            => __('New Logo Slider', 'wp-logo-slider-and-widget'),
		'all_items'           => __('All Logo Slider', 'wp-logo-slider-and-widget'),
		'view_item'           => __('View Logo Slider', 'wp-logo-slider-and-widget'),
		'search_items'        => __('Search Logo Slider', 'wp-logo-slider-and-widget'),
		'not_found'           => __('No Logo Slider found', 'wp-logo-slider-and-widget'),
		'not_found_in_trash'  => __('No Logo Slider found in Trash', 'wp-logo-slider-and-widget'),
		'featured_image' 		=> __('Set logo image', 'wp-logo-slider-and-widget'),
		'set_featured_image'	=> __( 'Set logo image' , 'wp-logo-slider-and-widget' ),
		'remove_featured_image' => __( 'Remove logo image', 'wp-logo-slider-and-widget' ),
		'parent_item_colon'   => '',
		'menu_name'           => __('Logo Slider', 'wp-logo-slider-and-widget'),
		'exclude_from_search' => true
	));
	$jd_slider_args = array(
		'labels' 				=> $jd_slider_labels,
		'public' 				=> false,
		'menu_icon'   			=> 'dashicons-screenoptions',
		'show_ui' 				=> true,
		'show_in_menu' 			=> true,
		'query_var' 			=> false,
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'supports' 				=> array('title','thumbnail', 'editor')
	);
	register_post_type( 'easy-logoslider', apply_filters( 'jd_slider_post_type_args', $jd_slider_args ) );
}
add_action('init', 'lswr_logo_slider_post_types');
/**
 * register taxonomies 
 * 
 * @package wp logo slider with widget responsive
 * @since 1.0
*/
add_action( 'init', 'lswr_logo_slider_taxonomies');
function lswr_logo_slider_taxonomies() {
    $labels = array(
        'name'              => _x( 'Category', 'wp-logo-slider-and-widget' ),
        'singular_name'     => _x( 'Category', 'wp-logo-slider-and-widget' ),
        'search_items'      => __( 'Search Category' ),
        'all_items'         => __( 'All Category' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Logo Category' ),
    );
    $args = array(
    	'public'			=> false,
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => false,
    );
    register_taxonomy( 'easy_logo_cat', array( 'easy-logoslider' ), $args );
}