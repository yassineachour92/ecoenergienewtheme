<?php
/**
 * 'logo_slider' Shortcode
 * 
 * @package WP WP Logo Slider and widget responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Function to handle the `logo_slider` shortcode
 * 
 * @package WP Logo Slider and widget responsive
 * @since 1.0.0
 */
function lswr_logo_slider( $atts, $content ) {
	global $post;
	// Shortcode Parameter
	extract(shortcode_atts(array(
		'design_template'	 => '',
		'cat_id'			 => '',
		'cat_name' 			 => '',
		'logo_limit' 		 => '-1',
		'logo_cell'			 => '',
		'order'				 => 'DESC',
		'orderby'			 => 'date',		
		'click_target'		 => 'same-tab',
		'show_title'		 => 'true',
		'image_size' 		 => 'full',		
		'hover_effect'     	 =>'',
		'slides_scroll'		 => '1',
		'pagination_dots'	 => 'true',
		'arrows'			 => 'true',
		'slider_rows'        => '',
		'autoplay'			 => 'true',
		'autoplay_interval'	 => '2000',
		'speed'				 => '1000',
		'center_mode'		 => 'false',
		'loop'				 => 'true',
		'ticker'             =>'',
		
		), $atts));
       	$shortcode_designs_template	= lswr_logo_slider_template();
		$design_template 	= array_key_exists( trim($design_template), $shortcode_designs_template ) ?  $design_template 	: 'template-1';
		$cat 				= (!empty($cat_id))	? explode(',',$cat_id) 	: '';
		$limit				= !empty($logo_limit) ? $logo_limit : '-1';
		$logo_cell			= !empty($logo_cell) ? $logo_cell : '4';
		$order 				= ( strtolower($order) == 'asc' ) 	? 'ASC' : 'DESC';
		$orderby 			= !empty($orderby)	 				? $orderby 	: 'date';	
        $link_target 		= ($click_target == 'new-tab') 		? '_blank' 	: '_self';
        $show_title 		= ($show_title == 'false') 			? 'false'	: 'true';
		$image_size 		= (!empty($image_size)) 			? $image_size	: 'original';
		$hover_effect 		= !empty($hover_effect) 		    ? $hover_effect : '';
		$hover_effect_class	= ($hover_effect == '') 		    ? 'no_effect' : '';  
		$cat_name			= !empty($cat_name) ? $cat_name : '';
		$rows 					= !empty($slider_rows) 			? $slider_rows  : 1;
		$slides_scroll 		= !empty($slides_scroll) ? $slides_scroll : 1;
		$dots 				= ($pagination_dots == 'false') 	? 'false' 	: 'true';
		$center_mode 	    = ($center_mode == 'false')			? 'false' 	: 'true';
		$arrows 			= ($arrows == 'false') 				? 'false' 	: 'true';
		$autoplay 			= ($autoplay == 'false') 			? 'false' 	: 'true';
		$autoplay_interval 	= ($autoplay_interval !== '') 		? $autoplay_interval : '2000';
		$speed 				= (!empty($speed)) 					? $speed 	: '300';
		$loop 				= ($loop == 'false') 				? 'false'	: 'true';
		
		
		
		
	if( $ticker	== 'true' ) {
		$autoplay 			= 'true';
		$slides_scroll 		= 1;
		$autoplay_interval 	= 0;
		$dots 				= 'false';
		$arrows 			= 'false';
		$loop 				= 'true';
	}
		// Taking some globals
		$fixvalue	= lswr_get_fixvalue();		
		// Shortcode template
		     $design_template_url 	= lSWR_DIR . '/lswr-design-templates/slider/template-1.php';
		     $design_template_url 	= (file_exists($design_template_url)) ? $design_template_url : '';
		// WP Query Parameters
		$query_args = array(
						'post_type' 			=> lSWR_POST_TYPE,
						'post_status' 			=> array( 'publish' ),
						'posts_per_page'		=> $limit,
						'order'          		=> $order,
						'orderby'        		=> $orderby,
					);
		if($cat != "") {
            	$query_args['tax_query'] = array(
            	 		array( 
            	 			'taxonomy' => lSWR_CAT_TYPE, 
            	 			'field' => 'term_id', 
            	 			'terms' => $cat,
            	 		
            	 			));
        }
		// Enqueue required script
		wp_enqueue_script( 'wpoh-slick-js' );
		wp_enqueue_script( 'lswr-costum-js' );
		global $post;
		$logo_query = new WP_Query($query_args);
		$post_count = $logo_query->post_count;
		$slides_column 		= (!empty($logo_cell) && $logo_cell <= $post_count) ? $logo_cell : $post_count;
		$center_mode		= ($center_mode == 'true' && $logo_cell % 2 != 0 && $logo_cell != $post_count) ? 'true' : 'false';
		$center_mode_cls	= ($center_mode == 'true') ? 'center' : '';
		$slider_conf = compact('slides_column', 'slides_scroll', 'dots', 'arrows', 'rows',  'autoplay', 'autoplay_interval', 'loop' , 'ticker', 'speed', 'center_mode');
		ob_start();
		if( $logo_query->have_posts() ) { ?>
		<?php
			if($cat_name != '') { ?>
				<h3><?php echo $cat_name; ?> </h3>	
			<?php	} ?>
		<div class="logo-slider-outter lswr-logo-slider-clear">
			<div class="lswr-logo-slider  lswr-<?php echo $design_template ; ?> <?php echo $center_mode_cls; ?> <?php echo $hover_effect_class;?>" id="lswr-logo-slider-<?php echo $fixvalue; ?>" data-animation="<?php echo $hover_effect; ?>" >
				<?php while ($logo_query->have_posts()) : $logo_query->the_post();					
					$logo_image = lswr_get_logo_image( $post->ID, $image_size);
					$logo_url 	= get_post_meta( $post->ID, 'logo_url', true );
					$logo_image_alt = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);	
					// Include shortcode html file
					if( $design_template_url ) {
						include( $design_template_url );
					}					
					endwhile; ?>              
			</div>
			<div class="lswr-logo-slider-js-call" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>
		</div>
		<?php
			wp_reset_query(); // Reset WP Query
			$content .= ob_get_clean();
			return $content;
	}
}
add_shortcode( 'logo_slider', 'lswr_logo_slider' );