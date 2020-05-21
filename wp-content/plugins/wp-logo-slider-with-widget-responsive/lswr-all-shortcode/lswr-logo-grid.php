<?php
/**
 * 'logo_grid' Shortcode
 * 
 * @package wp logo slider with widget responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Function to handle the `logo_grid` shortcode
 * 
 * @package wp logo slider with widget responsive
 * @since 1.0.0
 */
function lswr_logo_grid( $atts, $content ) {
	// Shortcode Parameters
	extract(shortcode_atts(array(
		'design_template'		=> '',
		'cat_id' 				=> '', 
		'cat_name' 				=> '',
		'logo_limit' 			=> '',
		'logo_cell' 			=> '',
		'order'					=> 'DESC',
		'orderby'				=> 'date',		
		'click_target'			=> 'same-tab',
		'show_title'            => 'true',
		'image_size' 			=> 'full',
		'hover_effect'			=> '',
		
		), $atts, 'logo_grid'));
	$shortcode_designs_template	= lswr_logo_grid_template();
	$design_template = array_key_exists( trim($design_template), $shortcode_designs_template ) ? $design_template 	: 'template-1';
	$fixvalue 			= lswr_get_fixvalue();
	$logo_limit				= !empty($logo_limit) 			? $logo_limit 					: '15';
	$order 				= ( strtolower($order) == 'asc' ) 	? 'ASC' 						: 'DESC';
	$show_title 		= ($show_title == 'false') 			? 'false'	                    : 'true';
	$orderby			= !empty($orderby) 					? $orderby 						: 'date';
	$grid				= (!empty($logo_cell) && $logo_cell <= 12) 	? $logo_cell			: '4';
	$template 			= array_key_exists( trim($template), $shortcode_designs_template ) ? $template 	: 'template-1';
	$grid_class			= ($grid <= 12 ) 					? ('cell-md-'.($grid)) 		: 'cell-md-4';
	$link_target 		= ($click_target == 'new-tab') 		? '_blank' 	: '_self';
	$cat_id				= (!empty($cat_id))					? explode(',',$cat_id) 			: '';
	$include_cat_child	= ( $include_cat_child == 'false' ) ? false 						: true;
	$hover_effect 			= !empty($hover_effect) 				? $hover_effect 					: '';
	$animation_cls 		= ($hover_effect == "") 				? 'no_effect'			: '';
	$design_file_path 	= lSWR_DIR . '/lswr-design-templates/grid/template-1.php';
    wp_enqueue_script( 'wpoh-slick-js' );
	wp_enqueue_script( 'lswr-costum-js' );
	global $post;	
	// Taking some variables
	$count = 1;	
	// WP Query Parameters
	$lswr_query_args = array(
			'post_type' 			=> lSWR_POST_TYPE,
			'post_status' 			=> array( 'publish' ),
			'posts_per_page'		=> $logo_limit,
			'order'          		=> $order,
			'orderby'        		=> $orderby,
			'post__not_in'			=> $exclude_post,
			'post__in'				=> $posts,
			'ignore_sticky_posts'	=> true,
		);	
	if( !empty($cat_id) ) {
		$lswr_query_args['tax_query'] = array( 
										array(
											'taxonomy' 			=> lSWR_CAT_TYPE, 
											'field' 			=> 'term_id',
											'terms' 			=> $cat_id,
											
										));
	} 	
	$lswr_query = new WP_Query($lswr_query_args);
	$post_count = $lswr_query->post_count;
	ob_start();
		// If post is there
	if( $lswr_query->have_posts() ) { ?>
	<div class="lswr-logo-outter lswr-logo-grid-<?php echo $fixvalue .' lswr-'.$design_template.' '.$animation_cls; ?>" data-animation="<?php echo $hover_effect; ?>">
		<?php if( !empty($cat_name) ) { ?>
			<h2 class="lswr-logocat-title"><?php echo $cat_name; ?></h2>
		<?php }
			while ($lswr_query->have_posts()) : $lswr_query->the_post();
				$first_last_cls = '';
				$logo_img 	= lswr_get_logo_image($post->ID,$image_size);
				$logo_url   = get_post_meta( get_the_ID(), 'logo_url', true );
				$logo_title = get_the_title();
						if($grid == '2') {
							$lswr_cell = "6";
						} else if($grid == '3') {
							$lswr_cell = "4";
						}  else if($grid == '4') {
							$lswr_cell = "3";
						} else if ($grid == '1') {
							$lswr_cell = "12";
						} else {
							$lswr_cell = "12";
						}
				if( $count == 1 ){
					$first_last_cls = 'lswr-first';
				} elseif ( $count == $grid ) {
					$count = 0;
					$first_last_cls = 'lswr-last';
				}
				// Skip if image not found & Include shortcode html file
				if( !empty($logo_img) && $design_file_path ) { 
					include( $design_file_path );
				}
				$count++;
			endwhile;
			wp_reset_postdata(); // Reset WP Query
	    ?>
	</div>
	<?php $content .= ob_get_clean();
		  return $content;
	}
}
add_shortcode('logo_grid', 'lswr_logo_grid');