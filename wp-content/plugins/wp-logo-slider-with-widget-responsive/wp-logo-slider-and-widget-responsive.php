<?php
/**
 * Plugin Name: wp logo slider with widget responsive
 * Plugin URI:https://wponlinehelp.com/plugins/
 * Version: 1.5
* Description: Easy to add and display Logo, and Best Responsive Logo slider and widget to display partners, clients or sponsors Logo on  all Wordpress site. call any where at your website using shortcode.
 * Text Domain: wp-logo-slider-and-widget
 * Domain Path: /languages/
 * Author: pareshpachani007
 * Author URI: https://wponlinehelp.com/
*/
   define( 'lSWR_VERSION', '1.5' );// plugin version
   define( 'lSWR_DIR', dirname( __FILE__ ) ); // Plugin folder
   define( 'lSWR_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
   define( 'lSWR_POST_TYPE', 'easy-logoslider' ); // Plugin Post Type
   define( 'lSWR_CAT_TYPE', 'easy_logo_cat' ); // Plugin Post cat
   define( 'lSWR_META_PREFIX', '_lswr_' );
/**
  * Load Text Domain
 **/
function lswr_textdomain() {
	load_plugin_textdomain( 'wp-logo-slider-and-widget', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}
add_action('plugins_loaded', 'lswr_textdomain');
/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package wp logo slider with widget responsive
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'lswr_install' );
/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @package wp logo slider with widget responsive
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'lswr_uninstall');
/**
 * Plugin Activation Function
 * Does the initial setup, sets the default values for the plugin options
 * 
 * @package wp logo slider with widget responsive
 * @since 1.0.0
 */
function lswr_install() {
    //need to flush rules for custom registered post type
    flush_rewrite_rules();
    // deactivate free version
    if( is_plugin_active('wp-logo-slider-with-widget-responsive-pro/wp-logo-slider-and-widget-responsive-pro.php') ){
        add_action('update_option_active_plugins', 'lswr_deactivate_pro_version');
    }
}
/**
 * Deactivate free plugin
 * 
 * @package wp logo slider with widget responsive
 * @since 1.3
 */
function lswr_deactivate_pro_version() {
    deactivate_plugins('wp-logo-slider-with-widget-responsive-pro/wp-logo-slider-and-widget-responsive-pro.php', true);
}
/**
 * Plugin Deactivation Function
 * Delete  plugin options
 * 
 * @package wp logo slider with widget responsive
 * @since 1.0.0
 */
function lswr_uninstall() {    
    // IMP need to flush rules for custom registered post type
    flush_rewrite_rules();
}
/* Script file */
require_once( lSWR_DIR . '/lswr-includes/lswr-script-and-css.php' );
/*functions file*/
require_once( lSWR_DIR . '/lswr-includes/lswr-functions.php' );
/*post types file*/
require_once( lSWR_DIR . '/lswr-includes/lswr-cpt.php' );
/*post metabox file*/
require_once( lSWR_DIR . '/lswr-admin-side/lswr-metabox/lsawr-metabox.php' );
/*post slider shortcode file*/
require_once( lSWR_DIR . '/lswr-all-shortcode/lswr-logo-slider.php' );
/*post Grid shortcode file */
require_once( lSWR_DIR . '/lswr-all-shortcode/lswr-logo-grid.php' );
/*post Grid shortcode file */
require_once( lSWR_DIR . '/lswr-all-shortcode/lswr-logo-filter.php');
// Widget Class
require_once( lSWR_DIR . '/lswr-widgets/logo-slider-widget.php' );
if ( is_admin()) {
	require_once( lSWR_DIR . '/lswr-admin-side/lswr-help.php' );	
}
// Manage Category Shortcode Columns
add_filter("manage_easy_logo_cat_custom_column", 'easy_logo_cat_columns', 10, 3);
add_filter("manage_edit-easy_logo_cat_columns", 'easy_logo_cat_manage_columns'); 
function easy_logo_cat_manage_columns($theme_columns) {
    $new_columns = array(
            'cb' => '<input type="checkbox" />',
            'name' => __('Name'),
            'logo_category_shortcode' => __( 'Logo Category Shortcode', 'wp-logo-slider-and-widget' ),
            'slug' => __('Slug'),
            'posts' => __('Posts')
        );
    return $new_columns;
}
function easy_logo_cat_columns($out, $column_name, $theme_id) {
    $theme = get_term($theme_id, 'easy_logo_cat');
    switch ($column_name) {
        
        case 'title':
            echo get_the_title();
        break;
        case 'logo_category_shortcode':             
             echo '[logo_slider cat_id="' . $theme_id. '"]'; echo '<br/>';
             echo '[logo_grid cat_id="' . $theme_id. '"]';
        break;
 
        default:
            break;
    }
    return $out;    
}
add_filter( 'manage_edit-easy-logoslider_columns', 'logo_screen_columns' );
function logo_screen_columns( $columns ) {
  unset( $columns['date'] );
    $columns['logo_image'] = 'Client Logo';
    $columns['logo_url_field'] = 'Client URL';
    $columns['date'] = 'Date';
    return $columns;
}
// GET FEATURED IMAGE
function gs_logo_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id);
        return $post_thumbnail_img[0];
    }
}
add_action('manage_posts_custom_column', 'logo_columns_content', 10, 2);
// SHOW THE FEATURED IMAGE
function logo_columns_content($column_name, $post_ID) {
    if ($column_name == 'logo_image') {
        $post_featured_image = gs_logo_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img src="' . $post_featured_image . '" width="50"/>';
        }
    }
}
//Populating the Columns
add_action( 'manage_posts_custom_column', 'populate_columns' );
function populate_columns( $column ) {
    if ( 'logo_url_field' == $column ) {
        $lswr_slider_url = get_post_meta( get_the_ID(), 'logo_url', true );
        echo $lswr_slider_url;
    }
}
// Columns as Sortable
add_filter( 'manage_edit-easy-logoslider_sortable_columns', 'logo_sortcode' );
function logo_sortcode( $columns ) {
    $columns['logo_url_field'] = 'logo_url_field'; 
    return $columns;
}