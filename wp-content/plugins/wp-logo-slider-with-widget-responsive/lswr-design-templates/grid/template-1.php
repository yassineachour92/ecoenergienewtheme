<?php
/**
 * 'logo_grid' Template-1
 *
 * @package WP Logo Slider and widget Responsive
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit; ?>
<div class=" lswr-logo-inner cell-md-<?php echo $lswr_cell; ?> cells <?php echo $css_class; echo $first_last_cls; ?>">	
	<div class="lswr-post-grid">
		    <?php if ($logo_url != '') { ?>
		    <div class="logo-img-outter ">			
			<a href="<?php echo esc_url($logo_url); ?>" target="<?php echo $link_target; ?>">
				<img class="lswr-logo-image" src="<?php echo $logo_img; ?>" alt="<?php the_title(); ?>" />				
   			</a>
			</div>
		<?php } else { ?>
			<img class="lswr-logo-image" src="<?php echo $logo_img; ?>" alt="<?php the_title(); ?>" />
		<?php } ?>
           <?php if($show_title == 'true') { ?>
						<div class="lswr-logo-title"><?php the_title(); ?></div>
           <?php } ?>
           <div class="lswr-logo-description">
						<?php echo lswr_excerpt( $post->ID, get_the_content(), $words_limit, $content_tail ); ?>
		   </div>
	</div>
</div>