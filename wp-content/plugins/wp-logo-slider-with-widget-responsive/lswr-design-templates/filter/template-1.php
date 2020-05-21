<?php
/**
 * 'logo_portfolio' Template-1
 *
 * @package WP Logo Slider and widget Responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit; ?>
<div  class="lswr-logo-inner">				
				<div class="logo-img-outter">
					 <?php if($logo_url!='') { ?>
					<a href="<?php echo esc_url($logo_url); ?>" target="<?php echo $link_target; ?>">
						<img class="lswr-logo-image" src="<?php echo esc_url($logo_image); ?>" alt="<?php echo $logo_title; ?>" />
					</a>
				<?php } else {  ?>
					<img class="lswr-logo-image" src="<?php echo esc_url($logo_image); ?>" alt="<?php echo $logo_title; ?>" />

				<?php } ?>
					<?php if( $show_title == "true" ) { ?> 	
							<div class="lswr-logo-title"><?php echo $logo_title; ?></div>
					<?php } ?>
					<div class="lswr-logo-description">
						<?php echo lswr_excerpt( $post->ID, get_the_content(), $words_limit, $content_tail ); ?>
					</div>
	</div>
</div>