<?php
/**
 * 'logo_portfolio' Shortcode
 * 
 * @package wp logo slider with widget responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Function to handle the `logo_portfolio` shortcode
 * 
 * @package wp logo slider with widget responsive
 * @since 1.0.0
 */
function lswr_logo_portfolio( $atts, $content ) {
	// Shortcode Parameters
	extract(shortcode_atts(array(
		'design_template'		=> 'template-1',
		'cat_id' 				=> '',
		'cat_name' 				=> '',
		'logo_cell' 			=> 4,
		'order'					=> 'DESC',
		'orderby'				=> 'date',
		'click_target'			=> 'same-tab',
		'show_title' 			=> 'true',		
		'image_size' 			=> 'full',		
		'hover_effect'			=> '',
		'cat_limit'				=> 0,
		'cat_order'				=> 'ASC',
		'cat_orderby'			=> 'name',
		'exclude_cat'           => array(),
		'all_text'		        => '',
		'content_words_limit' 	=> 20,		
		'content_tail'			=> '...',
		'extra_class'			=> '',
		
		), $atts, 'logo_filter' ));
	$shortcode_designs	= lswr_logo_filter_template();
	$unique 			= lswr_get_fixvalue();
	$design_template 	= array_key_exists( trim($design_template), $shortcode_designs ) ? $design_template 	: 'template-1';
	$cat_id				= (!empty($cat_id))					? explode(',',$cat_id) 			: '';
	$grid				= (!empty($logo_cell) && $logo_cell <= 12) 	? $logo_cell 			: '4';
	$grid_class			= ($grid <= 12 ) 					? ('wpls-col-'.($grid)) 		: 'wpls-col-4';
	$order 				= ( strtolower($order) == 'asc' ) 	? 'ASC' 						: 'DESC';
	$orderby			= !empty($orderby) 					? $orderby 						: 'date';
	$link_target 		= ($click_target == 'new-tab') 		? '_blank' 	: '_self';
	$cat_limit			= !empty($cat_limit) 					? $cat_limit 				: 0;
	$cat_order 			= ( strtolower($cat_order) == 'asc' ) 	? 'ASC' 					: 'DESC';
	$cat_orderby		= !empty($cat_orderby) 					? $cat_orderby 				: 'name';
	$exclude_cat 		= !empty($exclude_cat)				? explode(',', $exclude_cat) 	: array();
	$tooltip 			= ($tooltip == "true") 				? 'true' 						: 'false';
	$all_text 	= !empty($all_text) ? $all_text : __('All', 'wp-logo-slider-and-widget');
	$words_limit 		= !empty( $content_words_limit ) 	? $content_words_limit : 30;
	$extra_class		= !empty($extra_class) 				? sanitize_html_class($extra_class)	: '';
	$content_tail 		= html_entity_decode($content_tail);
	$animation_cls 		= ($hover_effect == "") 				? 'no_effect'			: '';
	// Shortcode file
	$design_file_path 	= lSWR_DIR . '/lswr-design-templates/filter/template-1.php';	
	wp_enqueue_script( 'wpoh-slick-js' );
	wp_enqueue_script( 'wpoh-catfilter-js' );
	wp_enqueue_script( 'lswr-costum-js' );
	// Taking some globals
	global $post;
	// Getting Terms
	$lswrterms = get_terms( array(
							'taxonomy' 		=> lSWR_CAT_TYPE,
							'hide_empty' 	=> true,
							'fields'		=> 'id=>name',
							'number'		=> $cat_limit,
							'order'			=> $cat_order,
							'orderby'		=> $cat_orderby,
							'include'       => $cat_id,
							'exclude'       => $exclude_cat,
				));
	ob_start();
	// If category is there
	if( !is_wp_error($lswrterms) && !empty($lswrterms) ) {
		// Getting ids 
		$logo_cats = array_keys( $lswrterms );
		// WP Query Parameters
		$count = 1;
		$query_args = array(
				'post_type' 			=> lSWR_POST_TYPE,
				'post_status' 			=> array( 'publish' ),
				'posts_per_page'		=> -1,
				'order'          		=> $order,
				'orderby'        		=> $orderby,
				'ignore_sticky_posts'	=> true,
			);
		// Category Parameter
		if( !empty($logo_cats) ) {
			$query_args['tax_query'] = array( 
											array(
												'taxonomy' 			=> lSWR_CAT_TYPE, 
												'field' 			=> 'term_id',
												'terms' 			=> $logo_cats,
												
											));
		}
		// Simple WP Query
		$logo_query = new WP_Query($query_args);
		$post_count = $logo_query->post_count;
		if( $logo_query->have_posts() ) {
	?>
		<div class=" <?php echo $extra_class; ?>">
			<?php if( !empty($cat_name) ) { ?>
				<h2 class="lswr-logo-heading"><?php echo $cat_name; ?></h2>
			<?php } ?>
			<ul class="lswr-tabs-outter">
				<li class="lswr-tab lswr-tab-current" data-filter="all"><a href="javascript:void(0);"><?php echo $all_text; ?></a></li>
				<?php foreach ($lswrterms as $term_id => $term_name) { ?>
					<li class="lswr-tab" data-filter="<?php echo $term_id; ?>"><a href="javascript:void(0);"><?php echo $term_name; ?></a></li>
				<?php } ?>
			</ul>
			<div class="lswr-filtr-row" id="lswr-logo-filtr-<?php echo $unique; ?>">
				<div class=" lswr-logo-outter lswr-logo-filter lswr-logo-filter <?php echo 'lswr-'.$design_template;  echo ' '.$animation_cls; ?>  " data-animation="<?php echo $hover_effect; ?>">
				<?php while ($logo_query->have_posts()) : $logo_query->the_post();
					$first_last_cls = '';
					$usedcat		= array();
					$logo_image 	= lswr_get_logo_image($post->ID,$image_size);
					$postcats 	    = get_the_terms($post->ID, lSWR_CAT_TYPE);
				    $logo_url       = get_post_meta( get_the_ID(), 'logo_url', true );
				    $logo_title     = get_the_title();
					if( !is_wp_error($postcats) && !empty($postcats) ) {
						foreach ($postcats as $postcat) {
							$usedcat[] = $postcat->term_id;
						}
					}
					$data_category = !empty($usedcat) ? implode(', ',$usedcat) : '-1';
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
				
               $cnt_wrp_cls = "cell-md-{$lswr_cell} cells {$first_last_cls}";
					// Skip if image not found & Include shortcode html file
					if( !empty($logo_image) && $design_file_path) { ?>						
						<div class="<?php echo $cnt_wrp_cls; ?> filtr-item" data-category="<?php echo $data_category; ?>">
							<?php include( $design_file_path ); ?>
						</div>
					<?php }  ?>
				<?php $count++; endwhile; ?>
				</div>
			</div>
		</div>
		<?php
		} // End of have post
		wp_reset_postdata(); // Reset WP Query
		$content .= ob_get_clean();
		return $content;
	} 
}
add_shortcode('logo_portfolio', 'lswr_logo_portfolio');