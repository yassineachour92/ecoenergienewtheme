<?php
/**
 * 'logo_slider' Template-1
 *
 * @package WP Logo Slider and widget Responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
?>
<div class="lswr-logo-inner" title="<?php the_title(); ?>">		
		<?php if ($logo_url != '') { ?>
		<div class="logo-img-outter">			
			<a href="<?php echo esc_url($logo_url); ?>" target="<?php echo $link_target; ?>">
				<img class="lswr-logo-image" src="<?php echo $logo_image; ?>" alt="<?php echo $logo_image_alt; ?>" />
			</a>
		</div>
  			<?php } else { ?>
  				<div class="logo-img-outter">			
					<img class="lswr-logo-image" src="<?php echo $logo_image; ?>" alt="<?php echo $logo_image_alt; ?>" />
				</div>
  			<?php } ?>

		<?php if($show_title == "true") { ?>		
		<div class="lswr-logo-title"><?php the_title(); ?></div>	
	    <?php } ?>
</div>