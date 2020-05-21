<?php 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit; ?>
<?php
/**
 * Function Custom meta box for slider link
 * 
 * @package wp logo slider with widget responsive
 * @since 1.0
 */
function lswr_add_meta_box() {
		add_meta_box('custom-metabox',__( 'Add Link URL for Logo', 'link_textdomain' ),'lswr_box_callback','easy-logoslider');
}
add_action( 'add_meta_boxes', 'lswr_add_meta_box' );
function lswr_box_callback( $post ) {
	wp_nonce_field( 'lswr_save_meta_box_data', 'lswr_meta_box_nonce' );
	$value = get_post_meta( $post->ID, 'logo_url', true );
	echo '<input type="url" id="lswr_slider_url_id" name="logo_url" value="' . esc_url( $value ) . '" size="60" /><br />';
	echo 'ie:-  http://www.yahoo.com';
}
function lswr_save_meta_box_data( $post_id ) {
	if ( ! isset( $_POST['lswr_meta_box_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['lswr_meta_box_nonce'], 'lswr_save_meta_box_data' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( isset( $_POST['post_type'] ) && 'easy-logoslider' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}
	if ( ! isset( $_POST['logo_url'] ) ) {
		return;
	}
	$link_data = stripslashes_deep( $_POST['logo_url'] );
	update_post_meta( $post_id, 'logo_url', $link_data );
}
add_action( 'save_post', 'lswr_save_meta_box_data' );