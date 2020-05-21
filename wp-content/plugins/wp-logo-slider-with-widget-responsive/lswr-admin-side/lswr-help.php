<?php
/**
 * Designs and Plugins Feed
 *
 * @package wp logo slider with widget responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
// Action to add menu
add_action('admin_menu', 'lswr_add_menu_page');
/**
 * Register plugin design page in admin menu
 * 
 * @package wp logo slider with widget responsive
 * @since 1.0.0
 */
function lswr_add_menu_page() {
	add_submenu_page( 'edit.php?post_type='.lSWR_POST_TYPE, __('plugin Help, our plugins and offers', 'wp-logo-slider-and-widget'), __('Help and use', 'wp-logo-slider-and-widget'), 'manage_options', 'lswr-designs', 'lswr_menu_page' );
}
/**
 * Function to display plugin design HTML
 * 
 * @package wp logo slider with widget responsive
 * @since 1.0.0
 */
function lswr_menu_page() {
	$lswr_feed_tabs = help_tabs();
	$active_tab 	= isset($_GET['tab']) ? lswr_sanitize_clean($_GET['tab']) : 'general-help';
?>		
	<div class="wrap lswr-wrap">
		<h2 class="nav-tab-wrapper">
			<?php
			foreach ($lswr_feed_tabs as $tab_key => $tab_val) {
				$tab_name	= $tab_val['name'];
				$active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
				$tab_link 	= add_query_arg( array( 'post_type' => lSWR_POST_TYPE, 'page' => 'lswr-designs', 'tab' => $tab_key), admin_url('edit.php') );
			?>
			<a class="nav-tab <?php echo $active_cls; ?>" href="<?php echo $tab_link; ?>"><?php echo $tab_name; ?></a>
			<?php } ?>
		</h2>
		<div class="lswr-tab-cnt-wrp">
		<?php
			if( isset($active_tab) && $active_tab == 'general-help' ) {
				lswr_help_page();
			}
			if( isset($active_tab) && $active_tab == 'grid-shortcode' ) {
				grid_shortcode_page();
			}
			if( isset($active_tab) && $active_tab == 'slider-shortcode' ) {
				slider_shortcode_page();
			}	
			if( isset($active_tab) && $active_tab == 'portfolio-shortcode' ) {
				portfolio_shortcode_page();
			}
			if( isset($active_tab) && $active_tab == 'hire-wpexpert' ) {
				echo  lswr_get_plugin_design('hire-wpexpert');
			}				
		?>
		</div>
	</div>
<?php
}
/**
 * to get plugin feed tabs
 *
 * @package wp logo slider with widget responsive
 * @since 1.0
 */
function help_tabs() {
	$jd_feed_tabs = array('general-help' 	=> array('name' => __('General Help ', 'wp-logo-slider-and-widget'),),
		                  'grid-shortcode' 	=> array('name' => __('Grid shortcode', 'wp-logo-slider-and-widget'),),
		                  'slider-shortcode' => array('name' => __('Slider shortcode', 'wp-logo-slider-and-widget'),),
		                  'portfolio-shortcode' => array('name' => __('Portfolio shortcode', 'wp-logo-slider-and-widget'),),
		                   'hire-wpexpert' 	=> array(
													'name'				=> __('For Quick Help ', 'wp-responsive-testimonials-slider'),
													'url'				=> 'https://wponlinehelp.com/wordpress-help/help-offers.php',
													'offer_key'		=> 'wpoh_offers_feed',
													'offer_time'	=> 98400,
												)
		              );
	return $jd_feed_tabs;
}
/**
 * 'plugin Help' HTML
 *
 * @package wp logo slider with widget responsive
 * @since 1.0
 */
function lswr_help_page() { ?>	
	<style type="text/css">
		.shortcode-bg{background-color: #f0f0f0;padding: 10px 5px;display: inline-block;margin: 0 0 5px 0;font-size: 16px;border-radius: 5px;}
	</style>
	<div class="post-box-container">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-1">			
				<!--How it workd HTML -->
				<div id="post-body-content">
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">								
								<h3 class="hndle">
									<span><?php _e( 'plugin All shortcode', 'wp-logo-slider-and-widget' ); ?></span>
								</h3>								
								<div class="inside">
									<table class="form-table">
										<tbody>
											<tr>
												<th>
													<label><?php _e('How to use plugin', 'wp-logo-slider-and-widget'); ?>:</label>
												</th>
												<td>
													<ul>
														<li><?php _e('Step-1. Go to Logo Slider  --> Click Add New.', 'wp-logo-slider-and-widget'); ?></li>
														<li><?php _e('Step-2. Add Logo title, logo link to redirect(if need) and logo image right side.','wp-logo-slider-and-widget'); ?></li>
														<li><?php _e('Step-3. Display multiple logo Slider view and Logo Grid view, create categories under "Logo Slider --> category" and create category.', 'wp-logo-slider-and-widget'); ?></li>
														<li><?php _e('Step-4. Assign logo Slider post to respective categories and use the category shortcode under "Logo Slider --> category"', 'wp-logo-slider-and-widget'); ?></li>
													</ul>
												</td>
											</tr>
											<tr>
												<th>
													<label><?php _e('All Shortcodes', 'wp-logo-slider-and-widget'); ?>:</label>
												</th>
												<td>
													<code class="shortcode-bg">[logo_slider]</code> – <?php _e('for logo Slider', 'wp-logo-slider-and-widget'); ?> <br />
													<code class="shortcode-bg">[logo_grid]</code> – <?php _e('for logo Grid', 'wp-logo-slider-and-widget'); ?><br/>
													<code class="shortcode-bg">[logo_portfolio]</code> – <?php _e('for logo portfolio Filter', 'wp-logo-slider-and-widget'); ?><br/>
                                                </td>
											</tr>
											<tr>
												<th>
													<label><?php _e('Need Any Help?', 'wp-logo-slider-and-widget'); ?></label>
												</th>
												<td>
													<p><?php _e('Any sort of WordPress requirement. In other words, you can avail our WordPress expertise by hiring us. We will serve our expertise for any sort of WordPress work and we will back to you within 24 hours. for quick Help just go to our website and live chat with us.', 'wp-logo-slider-and-widget'); ?></p> <br/>	
												</td>
											</tr>
											<tr>
												<th>
													<label><?php _e('Please Mail On:', 'wp-logo-slider-and-widget'); ?></label>
												</th>
												<td>
													<a  href="mailto:help@wponlinehelp.com">help@wponlinehelp.com</a><br/> <br/>
													<a class="button button-primary" href="http://demo.wponlinehelp.com/wp-logo-slider-and-widget-responsive/" target="_blank"><?php _e('Live Demo', 'wp-logo-slider-and-widget'); ?></a>
													<a class="button button-primary" href="http://docs.wponlinehelp.com/docs-project/wp-logo-slider-and-widget-responsive/" target="_blank"><?php _e('Documentation', 'wp-logo-slider-and-widget'); ?></a>
													
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }
/**
 * 'plugin Grid Short code
 *
 * @package wp logo slider with widget responsive
 * @since 1.0
 */
function grid_shortcode_page() { ?>	
	<style type="text/css">
		.shortcode-bg{background-color: #f0f0f0;padding: 10px 5px;display: inline-block;margin: 0 0 5px 0;font-size: 16px;border-radius: 5px;	
		}
		.lswr_shortcode_generator label{font-weight: 700; width: 100%;}
		.lswr_shortcode_generator select{ width: 100%;margin: 5px 0;}
	</style>
	<div id="post-body-content">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">
					<h3 style="font-size: 18px;">
						<?php _e('Create Logo Grid Shortcode :-', 'wp-logo-slider-and-widget') ?>
					</h3>
					<div class="inside">
						<table cellpadding="10" cellspacing="10">
							<tbody><tr><td valign="top">
								<div class="postbox" style="width:300px;">
									<form id="shortcode_generator" style="padding:20px;" class="lswr_shortcode_generator">
										 <p><label for="grid_design"><?php _e('1). Select Design Template:', 'wp-logo-slider-and-widget'); ?></label>
										  	<?php $sg_tempalte = lswr_logo_grid_template() ?>
										  	<select id="grid_design" name="grid_design" onchange="lswr_grid()">
										  		<option value="default-template">Default Template</option>
										  		<?php foreach ($sg_tempalte as $k => $v): ?>
										  			<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
										  				<?php _e($v, 'wp-logo-slider-and-widget') ?>
										  			</option>
										  		<?php endforeach; ?>
										  	</select>
										  </p>
										<p>
											<label for="logo_cat">
												<?php _e('2). Select Category:', 'wp-logo-slider-and-widget') ?></label>
												<?php
												$args = array("post_type"=> "post", "post_status"=> "publish");
												$terms = get_terms(['taxonomy' => lSWR_CAT_TYPE,$args]);
   	      						
												 ?>
												<select id="logo_cat" name="logo_cat" onchange="lswr_grid()">
												   <option value="nocat">No cat</option>
													<?php if ($terms!='') {
													foreach ($terms as $key => $value) { ?>
														<option value="<?php echo $value->term_id; ?>">
															<?php echo $value->name;  ?>
														</option>													
													<?php  } } ?>
												</select>
											</p>
											<p>
											<label for="logo_cat_name">
												<?php _e('3). If display Category Name:', 'wp-logo-slider-and-widget') ?></label>
												<?php
												$args = array("post_type"=> "post", "post_status"=> "publish");
												$terms = get_terms(['taxonomy' => lSWR_CAT_TYPE,$args]);
												 ?>
												<select id="logo_cat_name" name="logo_cat_name" onchange="lswr_grid()">
												   <option value="nocat">No Need</option>
													<?php
													 if ($terms!='') {
													foreach ($terms as $key => $value) { ?>
														<option value="<?php echo $value->name; ?>">
															<?php echo $value->name;  ?>
														</option>
													
													<?php  } }?>
												</select>
											</p>
											
											<p><label for="lswr_logo_limit"><?php _e('4). How Many Logo:', 'wp-logo-slider-and-widget'); ?></label>
						                    <input id="lswr_logo_limit" name="lswr_logo_limit" type="text" value="-1"
										      onchange="lswr_grid()">
										      <span class="howto"> <?php _e('(Default value is "-1" for all).', 'wp-logo-slider-and-widget'); ?></span>
										  </p>
							   <p>			<label for="logo_cell"><?php _e('5). Logo Cell:', 'wp-logo-slider-and-widget') ?></label>
												<?php $logo_cell = lswr_grid_arr() ?>
												<select id="logo_cell" name="logo_cell" onchange="lswr_grid()">
													<option value="default-cell">Default cell</option>
													<?php foreach ($logo_cell as $k => $v): ?>
													<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									<p>
												<label for="logo_order"><?php _e('6). Select Order:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $logo_order = lswr_asc_desc() ?>
												<select id="logo_order" name="logo_order" onchange="lswr_grid()">
													<option value="default-value">No Need</option>
													<?php foreach ($logo_order as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>
											<p>
												<label for="logo_orderby"><?php _e('7). Select Order By:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $logo_orderby = lswr_orderby() ?>
												<select id="logo_orderby" name="logo_orderby" onchange="lswr_grid()">
													<option value="default-value">No Need</option>
													<?php foreach ($logo_orderby as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>
											<p>
												<label for="lswr_link_target"><?php _e('8). Click on Logo open window:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $lswr_link_target = lswr_link_target() ?>
												<select id="lswr_link_target" name="lswr_link_target" onchange="lswr_grid()">
													<option value="default-value">No Need</option>
													<?php foreach ($lswr_link_target as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>
									<p>
										<label for="logo_title"><?php _e('9). Display Logo Title:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $logo_title = lswr_true_false() ?>
												<select id="logo_title" name="logo_title" onchange="lswr_grid()">
													<option value="default-value">No Need</option>
													<?php foreach ($logo_title as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>
											<p>
												<label for="logo_img"><?php _e('10). Logo Image Size:', 'wp-logo-slider-and-widget'); ?>
												</label>
												<?php $logo_img = lswr_logo_img_size() ?>
												<select id="logo_img" name="logo_img" onchange="lswr_grid()">
													<?php foreach ($logo_img as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>
											
											<p>
												<label for="lswr_grid_hover_annimation"><?php _e('11). Logo Hover Annimation:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $lswr_grid_hover_annimation = lswr_logo_animation_effect() ?>
										    <select id="lswr_grid_hover_annimation" name="lswr_grid_hover_annimation" onchange="lswr_grid()">
										     <option value="default-value">No Need</option>
													<?php foreach ($lswr_grid_hover_annimation as $k => $v): ?>
													<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>"><?php _e($v, 'wp-logo-slider-and-widget') ?>
													</option>
													<?php endforeach; ?>
											</select>
									    </p>
									    
										</form>
									</div>
								</td>
								<td valign="top"><h3><?php _e('Shortcode:', 'wp-logo-slider-and-widget'); ?></h3> 
									<p style="font-size: 16px;"><?php _e('select option and create shortcode to display Logo in Grid view in your posts or pages! Just select your option and copy this piece of text and place it where you want it to display.', 'wp-logo-slider-and-widget'); ?> </p>
									<div id="lswr-shortcode" style="margin:20px 0; padding: 10px;
									background: #e7e7e7;font-size: 16px;border-left: 4px solid #13B0C5;" >
								</div>
								<div style="margin:20px 0; padding: 10px;
								background: #e7e7e7;font-size: 16px;border-left: 4px solid #156198;" >
								&lt;?php echo do_shortcode(<span id="lswr-grid_shortcode_php"></span>); ?&gt;
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!-- .inside -->
		<hr>
		</div>
		</div>
	</div>
	</div>			
<?php } 
/**
 * 'plugin Slider Short code Generater
 *
 * @package wp logo slider with widget responsive
 * @since 1.0
 */
function slider_shortcode_page() { ?>	
	<style type="text/css">
		.shortcode-bg{background-color: #f0f0f0;padding: 10px 5px;display: inline-block;margin: 0 0 5px 0;font-size: 16px;border-radius: 5px;}
		#shortcode_generator label{font-weight: 700; float: left; width: 100%;}
		#shortcode_generator select{width: 100%;}
	</style>
	<div id="post-body-content">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">
					<h3 style="font-size: 18px;">
						<?php _e('Create Logo Slider Shortcode :-', 'wp-logo-slider-and-widget') ?>
					</h3>
					<div class="inside">
						<table cellpadding="10" cellspacing="10">
							<tbody><tr><td valign="top">
								<div class="postbox" style="width:300px;">
									<form id="shortcode_generator" style="padding:20px;">
										<p><label for="design_template"><?php _e('1). Select Template:', 'wp-logo-slider-and-widget'); ?></label>
										  	<?php $sg_template = lswr_logo_slider_template() ?>
										  	<select id="design_template" name="design_template" onchange="lswr_slider()">
										  		<option value="default-template">Default Template</option>
										  		<?php foreach ($sg_template as $k => $v): ?>
										  			<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
										  				<?php _e($v, 'wp-logo-slider-and-widget') ?>
										  			</option>
										  		<?php endforeach; ?>
										  	</select>
										  </p>
										<p>
											<label for="logo_cat">
												<?php _e('2). Select Category:', 'wp-logo-slider-and-widget') ?></label>
												<?php
												$args = array("post_type"=> "post", "post_status"=> "publish");
												$terms = get_terms(['taxonomy' => lSWR_CAT_TYPE, $args]);
   	      						
												 ?>
												<select id="logo_cat" name="logo_cat" onchange="lswr_slider()">
												   <option value="nocat">No cat</option>
													<?php if ($terms!='') {
													foreach ($terms as $key => $value) { ?>
														<option value="<?php echo $value->term_id; ?>">
															<?php echo $value->name;  ?>
														</option>
													
													<?php  } } ?>
												</select>
											</p>
											<p>
											<label for="logo_cat_name">
												<?php _e('3). If display Category Name:', 'wp-logo-slider-and-widget') ?></label>
												<?php
												$args = array("post_type"=> "post", "post_status"=> "publish");
												$terms = get_terms(['taxonomy' => lSWR_CAT_TYPE,$args]);	
												 ?>
												<select id="logo_cat_name" name="logo_cat_name" onchange="lswr_slider()">
												   <option value="nocat">No Need</option>
													<?php
													 if ($terms!='') {
													foreach ($terms as $key => $value) { ?>
														<option value="<?php echo $value->name; ?>">
															<?php echo $value->name;  ?>
														</option>
													
													<?php  } }?>
												</select>
											</p>
											
											<p><label for="lswr_logo_limit"><?php _e('4). Show Logo Limit:', 'wp-logo-slider-and-widget'); ?></label>
						                    <input id="lswr_logo_limit" name="lswr_logo_limit" type="text" value="-1"
										      onchange="lswr_slider()">
										      <span class="howto"> <?php _e('(default value is "-1" for all).', 'wp-logo-slider-and-widget'); ?></span>
										  </p>
							    <p>
												<label for="logo_cell"><?php _e('5). Logo Cell:', 'wp-logo-slider-and-widget') ?></label>
												<?php $logo_cell = lswr_grid_arr() ?>
												<select id="logo_cell" name="logo_cell" onchange="lswr_slider()">
													<option value="default-cell">Default cell</option>
													<?php foreach ($logo_cell as $k => $v): ?>
													<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
													</option>
													<?php endforeach; ?>
												</select>
									</p>
									<p>
												<label for="logo_order"><?php _e('6). Select Order:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $logo_order = lswr_asc_desc() ?>
												<select id="logo_order" name="logo_order" onchange="lswr_slider()">
													<option value="default-value">No Need</option>
													<?php foreach ($logo_order as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>
											<p>
												<label for="logo_orderby"><?php _e('7). Select Order By:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $logo_orderby = lswr_orderby() ?>
												<select id="logo_orderby" name="logo_orderby" onchange="lswr_slider()">
													<option value="default-value">No Need</option>
													<?php foreach ($logo_orderby as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>
											<p>
												<label for="lswr_link_target"><?php _e('8).Click on Logo open window:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $lswr_link_target = lswr_link_target() ?>
											<select id="lswr_link_target" name="lswr_link_target" onchange="lswr_slider()">
													<option value="default-value">No Need</option>
													<?php foreach ($lswr_link_target as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>
											<p>
												<label for="logo_title"><?php _e('9). Display Logo Title:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $logo_title = lswr_true_false() ?>
												<select id="logo_title" name="logo_title" onchange="lswr_slider()">
													 <option value="default-value">No Need</option>
													<?php foreach ($logo_title as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
									</p>
									<p>
												<label for="logo_img_size"><?php _e('10). Logo Image Size:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $logo_img = lswr_logo_img_size() ?>
												<select id="logo_img_size" name="logo_img_size" onchange="lswr_slider()">
													 <option value="default-value">No Need</option>
													<?php foreach ($logo_img as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>
											  <p>
												<label for="lswr_slider_hover_annimation"><?php _e('11). Logo Hover Annimation:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $lswr_slider_hover_annimation = lswr_logo_animation_effect() ?>
										    <select id="lswr_slider_hover_annimation" name="lswr_slider_hover_annimation" onchange="lswr_slider()">
										     <option value="default-value">No Need</option>
													<?php foreach ($lswr_slider_hover_annimation as $k => $v): ?>
													<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>"><?php _e($v, 'wp-logo-slider-and-widget') ?>
													</option>
													<?php endforeach; ?>
											</select>
									    </p >
											<p><label for="lswr_cat_limit"><?php _e('12). Move(Scroll) logo for each slide:', 'wp-logo-slider-and-widget'); ?></label>
						                    <input id="lswr_slider_scroll" name="lswr_slider_scroll" type="text" value="1"
										      onchange="lswr_slider()">
										      <span class="howto"> <?php _e('(Default value is "1" ).', 'wp-logo-slider-and-widget'); ?></span>
										  </p>
										  <p>
												<label for="lswr_pagination_dots"><?php _e('13). Slider Pagination Dots:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $lswr_pagination_dots = lswr_true_false() ?>
											<select id="lswr_pagination_dots" name="lswr_pagination_dots" onchange="lswr_slider()">													 
													<?php foreach ($lswr_pagination_dots as $k => $v): ?>
													<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>"><?php _e($v, 'wp-logo-slider-and-widget') ?>
													</option>
													<?php endforeach; ?>
											</select>
									    </p>
									    <p>
												<label for="lswr_slider_arror"><?php _e('14). Show Slider Arrows:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $lswr_slider_arror = lswr_true_false() ?>
											<select id="lswr_slider_arror" name="lswr_slider_arror" onchange="lswr_slider()">													 
													<?php foreach ($lswr_slider_arror as $k => $v): ?>
													<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>"><?php _e($v, 'wp-logo-slider-and-widget') ?>
													</option>
													<?php endforeach; ?>
											</select>
									    </p>
									    <p><label for="lswr_slider_rows"><?php _e('15). Slider Slide Row:', 'wp-logo-slider-and-widget'); ?></label>
						                    <input id="lswr_slider_rows" name="lswr_slider_rows" type="text" value="1"
										      onchange="lswr_slider()">
										      <span class="howto"> <?php _e('(default value is "1" ).', 'wp-logo-slider-and-widget'); ?></span>
										</p>
										
									    <p>
												<label for="lswr_slide_autoplay"><?php _e('16). Slide Autoplay:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $lswr_slide_autoplay = lswr_true_false() ?>
											<select id="lswr_slide_autoplay" name="lswr_slide_autoplay" onchange="lswr_slider()">													 
													<?php foreach ($lswr_slide_autoplay as $k => $v): ?>
													<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>"><?php _e($v, 'wp-logo-slider-and-widget') ?>
													</option>
													<?php endforeach; ?>												
											</select>
											<span class="howto"> <?php _e('(Set logo Automatic Move.).', 'wp-logo-slider-and-widget'); ?></span>
									    </p>
									    <p><label for="lswr_slider_interval"><?php _e('17). interval Between two logo:', 'wp-logo-slider-and-widget'); ?></label>
						                    <input id="lswr_slider_interval" name="lswr_slider_interval" type="text" value="2000"
										      onchange="lswr_slider()">
										      <span class="howto"> <?php _e('(set logo Moving Speed value in Milliseconds. Default value is 2000 ).', 'wp-logo-slider-and-widget'); ?></span>
										</p>
										<p><label for="lswr_slider_speed"><?php _e('18).Logo Moving Speed:', 'wp-logo-slider-and-widget'); ?></label>
						                    <input id="lswr_slider_speed" name="lswr_slider_speed" type="text" value="1000"
										      onchange="lswr_slider()">
										      <span class="howto"> <?php _e('(set logo Moving Speed value in Milliseconds. Default value is 1000 ).', 'wp-logo-slider-and-widget'); ?></span>
										</p>
										<p>
												<label for="slide_center_mode"><?php _e('19). Slide Center Mode:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $slide_center_mode = lswr_true_false() ?>
											<select id="slide_center_mode" name="slide_center_mode" onchange="lswr_slider()">			<option value="default-value">No Need</option>										 
													<?php foreach ($slide_center_mode as $k => $v): ?>
													<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>"><?php _e($v, 'wp-logo-slider-and-widget') ?>
													</option>
													<?php endforeach; ?>												
											</select>
											<span class="howto"> <?php _e('(Set logo Automatic Move.).', 'wp-logo-slider-and-widget'); ?></span>
									    </p>
										
									    <p>
												<label for="lswr_slider_loop"><?php _e('20). loop:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $lswr_slider_loop = lswr_true_false() ?>
											<select id="lswr_slider_loop" name="lswr_slider_loop" onchange="lswr_slider()">													 
													<?php foreach ($lswr_slider_loop as $k => $v): ?>
													<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>"><?php _e($v, 'wp-logo-slider-and-widget') ?>
													</option>
													<?php endforeach; ?>
											</select>
											<span class="howto"> <?php _e('(use for move slide infinite automatically.).', 'wp-logo-slider-and-widget'); ?></span>
									    </p>
									  
									    <p>
												<label for="lswr_slider_ticker"><?php _e('21). Slider Ticker:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $lswr_slider_ticker = lswr_true_false() ?>
											<select id="lswr_slider_ticker" name="lswr_slider_ticker" onchange="lswr_slider()">	
											   <option value="default-value">No Need</option>												 
													<?php foreach ($lswr_slider_ticker as $k => $v): ?>
													<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
														<?php _e($v, 'wp-logo-slider-and-widget') ?>
													</option>
													<?php endforeach; ?>
											</select>
									    </p>
									</form>
									</div>
								</td>
								<td valign="top"><h3><?php _e('Shortcode:', 'wp-logo-slider-and-widget'); ?></h3> 
									<p style="font-size: 16px;"><?php _e('select option and create shortcode to display Logo in Slider view in your posts or pages! Just select your option and copy this piece of text and place it where you want it to display.', 'wp-logo-slider-and-widget'); ?> </p>
									<div id="lswr-slider_shortcode" style="margin:20px 0; padding: 10px;
									background: #e7e7e7;font-size: 16px;border-left: 4px solid #13B0C5;" >
								</div>
								<div style="margin:20px 0; padding: 10px;
								background: #e7e7e7;font-size: 16px;border-left: 4px solid #156198;" >
								&lt;?php echo do_shortcode(<span id="lswr-slider_shortcode_php"></span>); ?&gt;
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!-- .inside -->
		<hr>
			</div>
			</div>
		</div>
	</div>			
<?php }
/**
 * 'plugin Portfolio Short code
 *
 * @package wp logo slider with widget responsive
 * @since 1.0
 */
function portfolio_shortcode_page() { ?>	
	<style type="text/css">
		.shortcode-bg{background-color: #f0f0f0;padding: 10px 5px;display: inline-block;margin: 0 0 5px 0;font-size: 16px;border-radius: 5px;	
		}
		.lswr_shortcode_generator label{font-weight: 700; width: 100%; float: left;}
		.lswr_shortcode_generator select{width: 100%;} 
	</style>
	<div id="post-body-content">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">
					<h3 style="font-size: 18px;">
						<?php _e('Create Portfolio Filter Shortcode :-', 'wp-logo-slider-and-widget') ?>
					</h3>
					<div class="inside">
						<table cellpadding="10" cellspacing="10">
							<tbody><tr><td valign="top">
								<div class="postbox" style="width:300px;">
									<form id="shortcode_generator" style="padding:20px;" class="lswr_shortcode_generator">
											<p><label for="grid_design"><?php _e('1). Select Template:', 'wp-logo-slider-and-widget'); ?></label>
												<?php $sg_tempalte = lswr_logo_grid_template() ?>
												<select id="grid_design" name="grid_design" onchange="lswr_portfolio()">
													<option value="default-template">Default Template</option>
													<?php foreach ($sg_tempalte as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>
										<p>
											<label for="logo_cat">
												<?php _e('2).Select Category:', 'wp-logo-slider-and-widget') ?></label>
												<?php
												$args = array("post_type"=> "post", "post_status"=> "publish");
												$terms = get_terms(['taxonomy' => lSWR_CAT_TYPE,$args]);
												 ?>
												<select id="logo_cat" name="logo_cat" onchange="lswr_portfolio()">
												   <option value="nocat">No cat</option>
													<?php if ($terms!='') {
													foreach ($terms as $key => $value) { ?>
														<option value="<?php echo $value->term_id; ?>">
															<?php echo $value->name;  ?>
														</option>													
													<?php  } } ?>
												</select>
											</p>
											<p>
											<label for="logo_cat_name">
												<?php _e('3). If display Category Name:', 'wp-logo-slider-and-widget') ?></label>
												<?php
												$args = array("post_type"=> "post", "post_status"=> "publish");
												$terms = get_terms(['taxonomy' => lSWR_CAT_TYPE,$args]);
												 ?>
												<select id="logo_cat_name" name="logo_cat_name" onchange="lswr_portfolio()">
												   <option value="nocat">No Need</option>
													<?php
													 if ($terms!='') {
													foreach ($terms as $key => $value) { ?>
														<option value="<?php echo $value->name; ?>">
															<?php echo $value->name;  ?>
														</option>
													
													<?php  } }?>
												</select>
											</p>
										
							   <p>
							   	<label for="logo_cell"><?php _e('4). Logo Cell:', 'wp-logo-slider-and-widget') ?></label>
							   	<?php $logo_cell = lswr_grid_arr() ?>
							   	<select id="logo_cell" name="logo_cell" onchange="lswr_portfolio()">
							   		<option value="default-cell">Default cell</option>
							   		<?php foreach ($logo_cell as $k => $v): ?>
							   			<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
							   				<?php _e($v, 'wp-logo-slider-and-widget') ?>
							   			</option>
							   		<?php endforeach; ?>
							   	</select>
							   </p>
							   <p>
												<label for="logo_order"><?php _e('5). Select Order:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $logo_order = lswr_asc_desc() ?>
												<select id="logo_order" name="logo_order" onchange="lswr_portfolio()">
													<option value="default-value">No Need</option>
													<?php foreach ($logo_order as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>
											<p>
												<label for="logo_orderby"><?php _e('6). Select Order By:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $logo_orderby = lswr_orderby() ?>
												<select id="logo_orderby" name="logo_orderby" onchange="lswr_portfolio()">
													<option value="default-value">No Need</option>
													<?php foreach ($logo_orderby as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>
											<p>
												<label for="lswr_link_target"><?php _e('7). Click on Logo open window:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $lswr_link_target = lswr_link_target() ?>
												<select id="lswr_link_target" name="lswr_link_target" 
												onchange="lswr_portfolio()"> 
													<option value="default-value">No Need</option>
													<?php foreach ($lswr_link_target as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>
							   <p>
							   	<label for="logo_title"><?php _e('8). Display Title:', 'wp-logo-slider-and-widget'); ?> 
							   </label>
								   <?php $logo_title = lswr_true_false() ?>
								   <select id="logo_title" name="logo_title" onchange="lswr_portfolio()">
								   	<option value="default-value">No Need</option>
								   	<?php foreach ($logo_title as $k => $v): ?>
								   		<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
								   			<?php _e($v, 'wp-logo-slider-and-widget') ?>
								   		</option>
								   	<?php endforeach; ?>
								   </select>
							    </p>
							    <p>
							    	<label for="logo_img"><?php _e('9). Logo Image Size:', 'wp-logo-slider-and-widget'); ?> 
							    </label>
							    <?php $logo_img = lswr_logo_img_size() ?>
							    <select id="logo_img" name="logo_img" onchange="lswr_portfolio()">
							    	<?php foreach ($logo_img as $k => $v): ?>
							    		<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
							    			<?php _e($v, 'wp-logo-slider-and-widget') ?>
							    		</option>
							    	<?php endforeach; ?>
							    </select>
							</p>
							            	
											 <p>
												<label for="lswr_grid_hover_annimation"><?php _e('10). Logo Hover Annimation:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $lswr_grid_hover_annimation = lswr_logo_animation_effect() ?>
										    <select id="lswr_grid_hover_annimation" name="lswr_grid_hover_annimation"
										     onchange="lswr_portfolio()">
										     <option value="default-value">No Need</option>
													<?php foreach ($lswr_grid_hover_annimation as $k => $v): ?>
													<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>"><?php _e($v, 'wp-logo-slider-and-widget') ?>
													</option>
													<?php endforeach; ?>
											</select>
									    </p>
											
											<p><label for="lswr_cat_limit"><?php _e('11). How Many Category Show:', 'wp-logo-slider-and-widget'); ?></label>
						                    <input id="lswr_cat_limit" name="lswr_cat_limit" type="text" value="0"
										      onchange="lswr_portfolio()">
										      <span class="howto"> <?php _e('(Default value is "0"  for all Category).', 'wp-logo-slider-and-widget'); ?></span>
										  </p>
										  <p>
												<label for="logo_cat_order"><?php _e('12).Select Category Order:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $logo_cat_order = lswr_asc_desc() ?>
												<select id="logo_cat_order" name="logo_cat_order" onchange="lswr_portfolio()">
													<option value="default-value">No Need</option>
													<?php foreach ($logo_cat_order as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>
											<p>
												<label for="logo_cat_orderby"><?php _e('13). Select Category Order By:', 'wp-logo-slider-and-widget'); ?> 
												</label>
												<?php $logo_cat_orderby = lswr_orderby() ?>
												<select id="logo_cat_orderby" name="logo_cat_orderby" onchange="lswr_portfolio()">
													<option value="default-value">No Need</option>
													<?php foreach ($logo_cat_orderby as $k => $v): ?>
														<option value="<?php _e($v, 'wp-logo-slider-and-widget') ?>">
															<?php _e($v, 'wp-logo-slider-and-widget') ?>
														</option>
													<?php endforeach; ?>
												</select>
											</p>
											 <p><label for="lswr_exclude_cat"><?php _e('14). Set your Exclude Category:', 'wp-logo-slider-and-widget'); ?></label>
						                    <input id="lswr_exclude_cat" name="lswr_exclude_cat" type="text" value=" "
										      onchange="lswr_portfolio()">
										      <span class="howto"> <?php _e('(Set your Exclude Category with category id like: 12,15,14 ).', 'wp-logo-slider-and-widget'); ?></span>
										  </p>
											<p><label for="lswr_all_text"><?php _e('15). Set your text on "ALL":', 'wp-logo-slider-and-widget'); ?></label>
						                    <input id="lswr_all_text" name="lswr_all_text" type="text" value="ALL"
										      onchange="lswr_portfolio()">
										      <span class="howto"> <?php _e('(Default value is "ALL").', 'wp-logo-slider-and-widget'); ?></span>
										  </p>
										  <p><label for="lswr_text_words"><?php _e('16). Set your Words Limit:', 'wp-logo-slider-and-widget'); ?></label>
						                    <input id="lswr_text_words" name="lswr_text_words" type="text" value="20"
										      onchange="lswr_portfolio()">
										      <span class="howto"> <?php _e('(Default value is "20" Words).', 'wp-logo-slider-and-widget'); ?></span>
										  </p>
										  <p><label for="lswr_text_tails"><?php _e('17). Set Content Tails:', 'wp-logo-slider-and-widget'); ?></label>
						                    <input id="lswr_text_tails" name="lswr_text_tails" type="text" value=""
										      onchange="lswr_portfolio()">
										      <span class="howto"> <?php _e('(set End of the Content like "..." ).', 'wp-logo-slider-and-widget'); ?></span>
										  </p>
										   <p><label for="lswr_extra_class"><?php _e('18). Set your Extra Class:', 'wp-logo-slider-and-widget'); ?></label>
						                    <input id="lswr_extra_class" name="lswr_extra_class" type="text" value=""
										      onchange="lswr_portfolio()">
										      <span class="howto"> <?php _e('(Set your class Name ).', 'wp-logo-slider-and-widget'); ?></span>
										  </p>
										 
										</form>
									</div>
								</td>
								<td valign="top"><h3><?php _e('Shortcode:', 'wp-logo-slider-and-widget'); ?></h3> 
									<p style="font-size: 16px;"><?php _e('Select option and Create shortcode to display Logo in Portfolio Filter view in your posts or pages! Just select your option and copy this piece of text and place it where you want it to display.<br><b>Note:</b> You create categories and select post to make portfolio shortcode work.', 'wp-logo-slider-and-widget'); ?> </p>
									<div id="lswr-portfolio_shortcode" style="margin:20px 0; padding: 10px;
									background: #e7e7e7;font-size: 16px;border-left: 4px solid #13B0C5;" >
								</div>
								<div style="margin:20px 0; padding: 10px;
								background: #e7e7e7;font-size: 16px;border-left: 4px solid #156198;" >
								&lt;?php echo do_shortcode(<span id="lswr-portfolio_shortcode_php"></span>); ?&gt;
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!-- .inside -->
		<hr>
				</div>
			</div>
		</div>
	</div>			
<?php } 
/**
 * Gets the plugin design part feed
 *
 * @package Video gallery and Player
 * @since 1.0.0
 */
function lswr_get_plugin_design( $feed_type = '' ) {
	$active_tab = lswr_sanitize_clean( isset($_GET['tab'])) ? $_GET['tab'] : '';
	// If tab is not set then return
	if( empty($active_tab) ) {
		return false;
	}
	// Taking some variables
	$wpoh_admin_tabs = help_tabs();
	$offer_key 	= isset($wpoh_admin_tabs[$active_tab]['offer_key']) 	? $wpoh_admin_tabs[$active_tab]['offer_key'] 	: 'wppf_' . $active_tab;
	$url 			= isset($wpoh_admin_tabs[$active_tab]['url']) 			? $wpoh_admin_tabs[$active_tab]['url'] 				: '';
	$offer_time = isset($wpoh_admin_tabs[$active_tab]['offer_time']) ? $wpoh_admin_tabs[$active_tab]['offer_time'] 	: 172800;
    $offercache 			= get_transient( $offer_key );	
	if ($offercache !=" ") {		
		$feed 			= wp_remote_get( lswr_clean_url($url));
		$response_code 	= wp_remote_retrieve_response_code( $feed );
		if ( ! is_wp_error( $feed ) && $response_code == 200 ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$offercache = wp_remote_retrieve_body( $feed );
				set_transient( $offer_key, $offercache, $offer_time );
			}
		} else {
			$offercache = '<div class="error"><p>' . __( 'There was an error retrieving the data from the server. Please try again later.', 'html5-videogallery-plus-player' ) . '</div>';
		}
	}
	return $offercache;	
}