<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
add_action( 'widgets_init', 'logo_slider_widget' );
/**
 * Register logo slider widget
 *
 * @package WP Logo Slider and widget Responsive
 * @since 1.0
 */
function logo_slider_widget() {
	register_widget( 'Logo_Slider' );
}
/**
 * Logo Slider Widget Class.
 *
 * @package WP Logo Slider and widget Responsive
 * @since 1.0
 */
class Logo_Slider extends WP_Widget {
		function __construct() {
		// Widget settings
		$widget_setting = array( 'classname' => 'logo-slider', 'description' => __( 'Display logos with slider view in sidebar.', 'wp-logo-slider-and-widget' ) );
		// Create the widget
		WP_Widget::__construct( 'logo-slider', __( 'Logo Slider View', 'wp-logo-slider-and-widget' ), $widget_setting );
	}
	/**
	 * Update the widget options
	 *
	 * @package WP Logo Slider and widget Responsive
 	 * @since 1.0
	 */
	function update( $new_value, $old_value ) {		
        $value = $old_value;		
		// Set the value to the new value
		$value = $new_value;		
		// Input fields
		$value['design_template'] 	= !empty($new_value['design_template']) ? $new_value['design_template'] : 'template-1';
		$value['cat_id'] 			= $new_value['cat_id'];
		$value['include_cat_child'] = isset($new_value['include_cat_child']) ? 1 : 0;
		$value['logo_limit'] 		= ( empty($new_value['logo_limit']) || ($new_value['logo_limit'] < -1) ) ? 5 : $new_value['logo_limit'];
		$value['order']              = ($new_value['order'] == 'asc') ? 'asc' : 'desc';
        $value['orderby']            = $new_value['orderby'];
		$value['link_target'] 		= $new_value['link_target'];
		$value['animation'] 		= $new_value['animation'];
		$value['logo_title'] 		= isset($new_value['logo_title']) 	? 1 : 0;
		$value['posts']             = $new_value['posts'];
        $value['exclude_posts']     = $new_value['exclude_posts'];
        $value['exclude_cat']      	= !empty($new_value['exclude_cat']) ? $new_value['exclude_cat'] : '';
		$value['slides_column'] 	= ($new_value['slides_column'] > 0) ? $new_value['slides_column'] : '1';
		$value['slides_scroll'] 	= ($new_value['slides_scroll'] > 0) ? $new_value['slides_scroll'] : '1';
		$value['dots'] 				= $new_value['dots'];
		$value['arrows'] 			= $new_value['arrows'];
		$value['autoplay'] 			= $new_value['autoplay'];
		$value['center_mode'] 		= $new_value['center_mode'];
		$value['autoplay_interval']	= $new_value['autoplay_interval'];
		$value['loop']				= $new_value['loop'];
		$value['speed']				= $new_value['speed'];
        return $value;
    }
    /**
	 * Displays the widget form in widget area
	 *
	 * @package WP Logo Slider and widget Responsive
 	 * @since 1.0
	 */
	function form( $value ) {
		$defaults = array( 
							'title' 			=> '',
							'logo_limit' 			=> 5,
							'cat_id' 			=> '',
							'include_cat_child'	=> 1,
							'order'             => 'desc',
           					'orderby'           => 'date',
							'link_target' 		=> '',
							'logo_title' 		=> 0,
							'design_template'   => 'template-1',
							'animation'			=> '',
							'logo_cell' 	    => '1',
							'slides_scroll' 	=> '1',
							'pagination_dots' 	=> 'true',
							'arrows' 			=> 'true',
							'autoplay' 			=> 'true',
							'autoplay_interval' => '3000',
							'speed' 			=> '600',
							'loop' 				=> 'true',
						);
        $value 	   = wp_parse_args( (array) $value, $defaults );
          $designs = lswr_logo_slider_template();
        $lswr_logo_animation_effect 	= lswr_logo_animation_effect();
        $logo_img_size 			= lswr_logo_img_size();
        $cat_id 			= !empty($value['cat_id']) 		? $value['cat_id'] 		: array();
         $cat_args = array(
						'taxonomy' 			=> lSWR_CAT_TYPE,
						'fields'			=> 'id=>name',
					);
        $lswr_cats = get_categories( $cat_args );
        ?>
         <p>
            <label for="<?php echo $this->get_field_id( 'design_template' ); ?>"><?php _e( 'Select Template:', 'wp-logo-slider-and-widget' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'design_template' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'design_template' ); ?>">
                <option value="template-1" <?php selected( $value['design_template'], 'template-1' ); ?>> 
                	<?php _e( 'template-1', 'wp-logo-slider-and-widget' ); ?></option>
                <option value="template-2" <?php selected( $value['design_template'], 'template-2' ); ?>>
                	<?php _e( 'template-2', 'wp-logo-slider-and-widget' ); ?></option>
                <option value="template-3" <?php selected( $value['design_template'], 'template-3' ); ?>>
                	<?php _e( 'template-3', 'wp-logo-slider-and-widget' ); ?></option>
                	<option value="template-4" <?php selected( $value['design_template'], 'template-4' ); ?>>
                	<?php _e( 'template-4', 'wp-logo-slider-and-widget' ); ?></option>
                	<option value="template-5" <?php selected( $value['design_template'], 'template-5' ); ?>>
                	<?php _e( 'template-5', 'wp-logo-slider-and-widget' ); ?></option>
                	<option value="template-6" <?php selected( $value['design_template'], 'template-6' ); ?>>
                	<?php _e( 'template-6', 'wp-logo-slider-and-widget' ); ?></option>
                	<option value="template-7" <?php selected( $value['design_template'], 'template-7' ); ?>>
                	<?php _e( 'template-7', 'wp-logo-slider-and-widget' ); ?></option>
                	<option value="template-8" <?php selected( $value['design_template'], 'template-8' ); ?>>
                	<?php _e( 'template-8', 'wp-logo-slider-and-widget' ); ?></option>
                	<option value="template-9" <?php selected( $value['design_template'], 'template-9' ); ?>>
                	<?php _e( 'template-9', 'wp-logo-slider-and-widget' ); ?></option>
                	<option value="template-10" <?php selected( $value['design_template'], 'template-10' ); ?>>
                	<?php _e( 'template-10', 'wp-logo-slider-and-widget' ); ?></option>                
            </select>
        </p>
		<!-- Title-->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'wp-logo-slider-and-widget'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $value['title']; ?>" />
		</p>
		<!-- Show Title Field -->
		<p>
			<input type="checkbox" value="1" id="<?php echo $this->get_field_id( 'logo_title' ); ?>" name="<?php echo $this->get_field_name( 'logo_title' ); ?>" <?php checked( $value['logo_title'], 1 ); ?>>
			<label for="<?php echo $this->get_field_id( 'logo_title' ); ?>"><?php _e( 'Show Logo Title', 'wp-logo-slider-and-widget'); ?></label>
		</p>
		<!-- Category Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'cat_id' ); ?>"><?php _e( 'Category:', 'wp-logo-slider-and-widget'); ?></label>
			<select name="<?php echo $this->get_field_name( 'cat_id[]' ) ?>" id="<?php echo $this->get_field_id( 'cat_id' ); ?>" class="widefat" multiple="multiple">
			<?php
                if( !is_wp_error($lswr_cats) && !empty($lswr_cats) ) {
					foreach ($lswr_cats as $category_id => $cat_name) { ?>
                		<option value="<?php echo $category_id; ?>" <?php selected( in_array($category_id, $cat_id), 1 ); ?>><?php echo $cat_name; ?></option>
           	<?php 	}
            	}
            ?>
            </select>
            <span><em><?php _e('Select Category.', 'wp-logo-slider-and-widget'); ?></em></span>
		</p>		
		<!-- Link behevier Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link_target' ); ?>"><?php _e( 'Click Target:', 'wp-logo-slider-and-widget'); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'link_target' ); ?>" name="<?php echo $this->get_field_name( 'link_target' ); ?>">
				<option value=""><?php _e('Open in Same Window Tab', 'wp-logo-slider-and-widget') ?></option>
				<option value="blank" <?php selected( $value['link_target'], 'blank' ); ?> ><?php _e('Open in New Window Tab', 'wp-logo-slider-and-widget') ?></option>
			</select>
		</p>		
		<!-- Order By -->
        <p>
            <label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e( 'Order By:', 'wp-logo-slider-and-widget' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'orderby' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'orderby' ); ?>">
                <option value="date" <?php selected( $value['orderby'], 'date' ); ?>><?php _e( 'Post Date', 'wp-logo-slider-and-widget' ); ?></option>
                <option value="modified" <?php selected( $value['orderby'], 'modified' ); ?>><?php _e( 'Post Updated Date', 'wp-logo-slider-and-widget' ); ?></option>
                <option value="ID" <?php selected( $value['orderby'], 'ID' ); ?>><?php _e( 'Post Id', 'wp-logo-slider-and-widget' ); ?></option>
                <option value="title" <?php selected( $value['orderby'], 'title' ); ?>><?php _e( 'Post Title', 'wp-logo-slider-and-widget' ); ?></option>
                <option value="rand" <?php selected( $value['orderby'], 'rand' ); ?>><?php _e( 'Random', 'wp-logo-slider-and-widget' ); ?></option>
                <option value="menu_order" <?php selected( $value['orderby'], 'menu_order' ); ?>><?php _e( 'Menu Order (Sort Order)', 'wp-logo-slider-and-widget' ); ?></option>
            </select>
        </p>
        <!-- Order -->
        <p>
            <label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'Order:', 'wp-logo-slider-and-widget' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'order' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'order' ); ?>">
                <option value="asc" <?php selected( $value['order'], 'asc' ); ?>><?php _e( 'Ascending', 'wp-logo-slider-and-widget' ); ?></option>
                <option value="desc" <?php selected( $value['order'], 'desc' ); ?>><?php _e( 'Descending', 'wp-logo-slider-and-widget' ); ?></option>
            </select>
        </p>
		<!-- Column of sliders -->
		<p>
			<label for="<?php echo $this->get_field_id( 'logo_cell' ); ?>"><?php _e( 'Slides Column:', 'wp-logo-slider-and-widget'); ?></label>
			<input class="widefat" min="1" id="<?php echo $this->get_field_id( 'logo_cell' ); ?>" name="<?php echo $this->get_field_name( 'logo_cell' ); ?>" type="number" value="<?php echo $value['logo_cell']; ?>" />
			<span><em><?php _e('Number of slides column.', 'wp-logo-slider-and-widget'); ?></em></span>
		</p>
		<!-- Scroll in Slides Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'slides_scroll' ); ?>"><?php _e( 'Slides Scroll:', 'wp-logo-slider-and-widget'); ?></label>
			<input class="widefat" min="1" id="<?php echo $this->get_field_id( 'slides_scroll' ); ?>" name="<?php echo $this->get_field_name( 'slides_scroll' ); ?>" type="number" value="<?php echo $value['slides_scroll']; ?>" />
			<span><em><?php _e('Number of slides to scroll at a time.', 'wp-logo-slider-and-widget'); ?></em></span>
		</p>
		<!-- Pagination dots Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'Pagination_dots' ); ?>"><?php _e( 'Pagination Bullet Dots:', 'wp-logo-slider-and-widget'); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'pagination_dots' ); ?>" name="<?php echo $this->get_field_name( 'pagination_dots' ); ?>">
				<option value="true" <?php selected( $value['pagination_dots'], 'true' ); ?>><?php _e('True', 'wp-logo-slider-and-widget') ?></option>
				<option value="false" <?php selected( $value['pagination_dots'], 'false' ); ?>><?php _e('False', 'wp-logo-slider-and-widget') ?></option>
			</select>
			<span><em><?php _e('Enable slider pagination pagination_dots.', 'wp-logo-slider-and-widget'); ?></em></span>
		</p>
		<!--  Slider Arrows-->
		<p>
			<label for="<?php echo $this->get_field_id( 'arrows' ); ?>"><?php _e( 'Arrows:', 'wp-logo-slider-and-widget'); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'arrows' ); ?>" name="<?php echo $this->get_field_name( 'arrows' ); ?>">
				<option value="true" <?php selected( $value['arrows'], 'true' ); ?>><?php _e('True', 'wp-logo-slider-and-widget') ?></option>
				<option value="false" <?php selected( $value['arrows'], 'false' ); ?>><?php _e('False', 'wp-logo-slider-and-widget') ?></option>
			</select>
			<span><em><?php _e('Enable slider navigation arrow.', 'wp-logo-slider-and-widget'); ?></em></span>
		</p>
		<!-- Slider Autoplay-->
		<p>
			<label for="<?php echo $this->get_field_id( 'autoplay' ); ?>"><?php _e( 'Autoplay:', 'wp-logo-slider-and-widget'); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'autoplay' ); ?>" name="<?php echo $this->get_field_name( 'autoplay' ); ?>">
				<option value="true" <?php selected( $value['autoplay'], 'true' ); ?>><?php _e('True', 'wp-logo-slider-and-widget') ?></option>
				<option value="false" <?php selected( $value['autoplay'], 'false' ); ?>><?php _e('False', 'wp-logo-slider-and-widget') ?></option>
			</select>
			<span><em><?php _e('Enable slider autoplay.', 'wp-logo-slider-and-widget'); ?></em></span>
		</p>
		<!-- Slider Loop-->
		<p>
			<label for="<?php echo $this->get_field_id( 'loop' ); ?>"><?php _e( 'Loop:', 'wp-logo-slider-and-widget'); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'loop' ); ?>" name="<?php echo $this->get_field_name( 'loop' ); ?>">
				<option value="true" <?php selected( $value['loop'], 'true' ); ?>><?php _e('True', 'wp-logo-slider-and-widget') ?></option>
				<option value="false" <?php selected( $value['loop'], 'false' ); ?>><?php _e('False', 'wp-logo-slider-and-widget') ?></option>
			</select>
			<span><em><?php _e('Runs the slider contineously.', 'wp-logo-slider-and-widget'); ?></em></span>
		</p>
		<!-- Slider Interval-->
		<p>
			<label for="<?php echo $this->get_field_id( 'autoplay_interval' ); ?>"><?php _e( 'Autoplay Next Slide Delay Interval:', 'wp-logo-slider-and-widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'autoplay_interval' ); ?>" name="<?php echo $this->get_field_name( 'autoplay_interval' ); ?>" type="text" value="<?php echo $value['autoplay_interval']; ?>" />
			<span><em><?php _e('Slider slides interval time ( Milliseconds. 0 to disable auto advance.)', 'wp-logo-slider-and-widget'); ?></em></span>
		</p>
		<!-- Speed Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'speed' ); ?>"><?php _e( 'Transition Effects Speed:', 'wp-logo-slider-and-widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'speed' ); ?>" name="<?php echo $this->get_field_name( 'speed' ); ?>" type="text" value="<?php echo $value['speed']; ?>" />
			<span><em><?php _e('Slider Transition Effects Speed ( Milliseconds. 0 to disable auto advance.)', 'wp-logo-slider-and-widget'); ?></em></span>
		</p>
		<!-- Animation Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'animation' ); ?>"><?php _e( 'Logo Animation Hover Effect:', 'wp-logo-slider-and-widget'); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'animation' ); ?>" name="<?php echo $this->get_field_name( 'animation' ); ?>">
				<option value=""><?php _e('Select Hover Animation Effect', 'wp-logo-slider-and-widget'); ?></option>	
				<?php if( !empty($lswr_logo_animation_effect) ) {
						foreach ($lswr_logo_animation_effect as $anim_key => $anim_name) {
				?>
							<option value="<?php echo $anim_key; ?>" <?php selected( $value['animation'], $anim_key ); ?> ><?php echo $anim_name; ?></option>
				<?php	}
					}
				?>
			</select>
		</p>
		<?php
    }
	/**
	 * 
	 * @package WP Logo Slider and widget Responsive
 	 * @since 1.0
	 */
	function widget( $args, $value ) {		
		extract( $args );		
		$title          	= apply_filters( 'widget_title', isset( $value['title'] ) ? $value['title'] : __( 'Logo Slider', 'wp-logo-slider-and-widget' ), $value, $this->id_base );
		$cat_name			= $value['title'];
		$cat_id				= $value['cat_id'];
		$include_cat_child 	= ($value['include_cat_child'] == 1) ? true : false;
		$limit				= $value['logo_limit'];
		$design_template 			= $value['design_template'];
		$link_target 		= ($value['link_target'] == 'blank') ? '_blank' : '_self';
		$image_size 		= $value['image_size'];
		$logo_title 		= !empty($value['logo_title']) 	? 'true' : 'false';
		$animation 			= !empty($value['animation']) 	? $value['animation'] 	: '';
		$animation_cls 		= empty($animation) 				? 'has-no-animation' 		: '';
		$order              = $value['order'];
        $orderby            = $value['orderby'];
		$logo_cell		    = $value['logo_cell'];
		$slides_scroll		= $value['slides_scroll'];
		$dots	            = $value['pagination_dots'];
		$arrows				= $value['arrows'];
		$autoplay			= $value['autoplay'];
		$speed				= $value['speed'];
		$loop				= $value['loop'];
		$autoplay_interval	= $value['autoplay_interval'];
		// Enqueus required script
		wp_enqueue_script( 'lswr-slick-jquery' );
		wp_enqueue_script( 'lswr-costum-js' );
		$shortcode_designs_template	= lswr_logo_slider_template();
		$design_template 			= array_key_exists( trim($design_template), $shortcode_designs_template ) ? 
		$design_template 	: 'template-1';
		$design_template_url 	= lSWR_DIR . '/lswr-design-templates/slider/template-1.php';
	     $design_template_url 	= (file_exists($design_template_url)) ? $design_template_url : '';
		// Taking some globals
		global $post;
		// Taking some variables
		$fix_value = lswr_get_fixvalue();
		// WP Query Parameters
		$query_args = array(
								'post_type' 			=> lSWR_POST_TYPE,
								'posts_per_page'		=> $logo_limit,
								'post_status' 			=> array( 'publish' ),
								'order'          		=> $order,
								'orderby'        		=> $orderby,
							);
		// If category is passed
		if( !empty($cat_id) ) {
			$query_args['tax_query'] = array( 
											array(
													'taxonomy' 			=> lSWR_CAT_TYPE, 
													'field' 			=> 'term_id',
													'terms' 			=> $cat_id,
													'include_children'	=> $include_cat_child,
										));
		} 
		// WP Query
		$logo_query = new WP_Query($query_args);
		$post_count = $logo_query->post_count;
		// Slider configuration and taken care of centermode
		$slides_column 		= (!empty($logo_cell) && $logo_cell <= $post_count) ? $logo_cell : $post_count;	     
		// Slider variable
		$logo_conf = compact('slides_column', 'slides_scroll', 'dots', 'arrows', 'autoplay', 'autoplay_interval', 'speed', 'loop');
		// Start Widget Output
		echo $before_widget;
		if ( $title ) {
            echo $before_title . $title . $after_title;
        }       
		if( $logo_query->have_posts() ) { ?>
		<div class=" logo-slider-outter">
			<div class="lswr-logo-slider  lswr-logo-widget-slider lswr-<?php echo $design_template.' '.$animation_cls;  ?>" id="lswr-logo-slider-<?php echo $fix_value; ?>" data-animation="<?php echo $animation; ?>">
	<?php 	while ($logo_query->have_posts()) : $logo_query->the_post();
				$logo_image = lswr_get_logo_image($post->ID, $image_size);
				$logourl 	= get_post_meta( $post->ID, 'logo_url', true );
				// Include template Design html file
				if( $design_template_url ) {
					include( $design_template_url );
				}
		 	endwhile;
	?>
			</div>
			<div class="lswr-logo-slider-js-call" data-conf="<?php echo htmlspecialchars(json_encode($logo_conf)); ?>"></div>
		</div>
	<?php
		}
		echo $after_widget;
	}
}