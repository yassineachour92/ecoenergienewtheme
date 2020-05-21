lswr_grid();
lswr_slider();
lswr_portfolio();
function lswr_grid() {   
    var sg_main = "[logo_grid ";
    var logo_title = jQuery('#logo_title').val();   
    var logo_cat = jQuery('#logo_cat').val();
    var logo_cat_name = jQuery('#logo_cat_name').val();
    var logo_cell = jQuery('#logo_cell').val();
    var logo_img = jQuery('#logo_img').val();
    var logo_limit = jQuery('#lswr_logo_limit').val();
    var grid_design = jQuery('#grid_design').val();
    var lswr_link_target = jQuery('#lswr_link_target').val();
    var logo_order = jQuery('#logo_order').val();
    var logo_orderby = jQuery('#logo_orderby').val(); 
    var lswr_grid_hover_annimation = jQuery('#lswr_grid_hover_annimation').val();    
    if (grid_design == 'default-template') {} else { sg_main = sg_main + ' design_template="' + grid_design + '"';} 
    if (logo_cat == 'nocat') {} else { sg_main = sg_main + ' cat_id="' + logo_cat + '"';}
    if (logo_cat_name == 'nocat') {} else { sg_main = sg_main + ' cat_name="' + logo_cat_name + '"';} 
    if (logo_limit == '-1') {} else {sg_main = sg_main + ' logo_limit="' + logo_limit + '"';}
    if (logo_cell == 'default-cell') {} else { sg_main = sg_main + ' logo_cell="' + logo_cell + '"' ;}
    if (logo_order == 'default-value') {} else { sg_main = sg_main + ' order="' + logo_order + '"' ;}
    if (logo_orderby == 'default-value') {} else { sg_main = sg_main + ' orderby="' + logo_orderby + '"' ;}
    if (lswr_link_target == 'default-value') {} else { sg_main = sg_main + ' click_target="' + lswr_link_target + '"' ;} 
    if (logo_title == 'default-value') {} else { sg_main = sg_main + ' show_title="' + logo_title + '"';}
    if (logo_img == 'original') {} else {sg_main = sg_main + ' image_size="' + logo_img + '"';}  
    if (lswr_grid_hover_annimation == 'default-value') {} else { sg_main = sg_main + ' hover_effect="' + lswr_grid_hover_annimation + '"' ;}  
    sg_main = sg_main + ']';
    jQuery("#lswr-shortcode").text(sg_main);
    jQuery("#lswr-grid_shortcode_php").text("'"+sg_main+"'");
}
function lswr_slider() {
    var sg_main = "[logo_slider ";
    var design_template = jQuery('#design_template').val();
    var logo_cat = jQuery('#logo_cat').val();
    var logo_cat_name = jQuery('#logo_cat_name').val();
    var logo_limit = jQuery('#lswr_logo_limit').val();
    var logo_cell = jQuery('#logo_cell').val();
    var logo_order = jQuery('#logo_order').val();
    var logo_orderby = jQuery('#logo_orderby').val(); 
    var lswr_link_target = jQuery('#lswr_link_target').val();
    var logo_title = jQuery('#logo_title').val();
    var logo_img_size = jQuery('#logo_img_size').val();
    var lswr_slider_hover_annimation = jQuery('#lswr_slider_hover_annimation').val();
    var lswr_slider_scroll = jQuery('#lswr_slider_scroll').val();  
    var lswr_pagination_dots = jQuery('#lswr_pagination_dots').val();
    var lswr_slider_arror = jQuery('#lswr_slider_arror').val();
    var lswr_slider_rows = jQuery('#lswr_slider_rows').val(); 
    var lswr_slide_autoplay = jQuery('#lswr_slide_autoplay').val();
    var lswr_slider_interval = jQuery('#lswr_slider_interval').val(); 
    var lswr_slider_speed = jQuery('#lswr_slider_speed').val();
    var slide_center_mode = jQuery('#slide_center_mode').val();
    var lswr_pagination_dots = jQuery('#lswr_pagination_dots').val();
    var lswr_slider_loop = jQuery('#lswr_slider_loop').val();
    var lswr_slider_ticker = jQuery('#lswr_slider_ticker').val();
    if (design_template == 'default-template') {} else { sg_main = sg_main + ' design_template="' + design_template + '"';}
    if (logo_cat == 'nocat') {} else { sg_main = sg_main + ' cat_id="' + logo_cat + '"';}
    if (logo_cat_name == 'nocat') {} else { sg_main = sg_main + ' cat_name="' + logo_cat_name + '"';} 
    if (logo_limit == '-1') {} else {sg_main = sg_main + ' logo_limit="' + logo_limit + '"';}  
    if (logo_cell == 'default-cell') {} else { sg_main = sg_main + ' logo_cell="' + logo_cell + '"' ;}
    if (logo_order == 'default-value') {} else { sg_main = sg_main + ' order="' + logo_order + '"' ;}
    if (logo_orderby == 'default-value') {} else { sg_main = sg_main + ' orderby="' + logo_orderby + '"' ;}
    if (lswr_link_target == 'default-value') {} else { sg_main = sg_main + ' click_target="' + lswr_link_target + '"' ;}
    if (logo_title == 'default-value') {} else { sg_main = sg_main + ' show_title="' + logo_title + '"';}
    if (logo_img_size == 'default-value') {} else {sg_main = sg_main + ' image_size="' + logo_img_size + '"';}
    if (lswr_slider_hover_annimation == 'default-value') {} else { sg_main = sg_main + ' hover_effect="' + lswr_slider_hover_annimation + '"' ;}
    if (lswr_slider_scroll == '1') {} else { sg_main = sg_main + ' slides_scroll="' + lswr_slider_scroll + '"';}
    if (lswr_pagination_dots == 'true') {} else { sg_main = sg_main + ' pagination_dots="' + lswr_pagination_dots + '"';}
    if (lswr_slider_arror == 'true') {} else { sg_main = sg_main + ' arrows="' + lswr_slider_arror + '"';} 
    if (lswr_slider_rows == '1') {} else { sg_main = sg_main + ' slider_rows="' + lswr_slider_rows + '"';}
    if (lswr_slide_autoplay == 'true') {} else { sg_main = sg_main + ' autoplay="' + lswr_slide_autoplay + '"';}
    if (lswr_slider_interval == '2000' || lswr_slider_interval == '') {} else { sg_main = sg_main + ' autoplay_interval="' + lswr_slider_interval + '"';}
    if (lswr_slider_speed == '1000'    || lswr_slider_speed == '') {} else { sg_main = sg_main + ' speed="' + lswr_slider_speed + '"';} 
    if (slide_center_mode == 'default-value') {} else { sg_main = sg_main + ' center_mode="' + slide_center_mode + '"' ;}
    if (lswr_slider_loop == 'true') {} else { sg_main = sg_main + ' loop="' + lswr_slider_loop + '"';}
    if (lswr_slider_ticker == 'default-value') {} else { sg_main = sg_main + ' ticker="' + lswr_slider_ticker + '"';}
    sg_main = sg_main + ']';
    jQuery("#lswr-slider_shortcode").text(sg_main);
    jQuery("#lswr-slider_shortcode_php").text("'"+sg_main+"'");
}
function lswr_portfolio() {   
    var sg_main = "[logo_portfolio ";
    var logo_title = jQuery('#logo_title').val();
    var child_cat = jQuery('#child_cat').val();
    var logo_cat = jQuery('#logo_cat').val();
    var logo_cat_name = jQuery('#logo_cat_name').val();
    var logo_cell = jQuery('#logo_cell').val();
    var logo_img = jQuery('#logo_img').val();
    var grid_design = jQuery('#grid_design').val();
    var lswr_link_target = jQuery('#lswr_link_target').val();
    var logo_order = jQuery('#logo_order').val();
    var logo_orderby = jQuery('#logo_orderby').val();
    var lswr_cat_limit = jQuery('#lswr_cat_limit').val();
    var lswr_text_words = jQuery('#lswr_text_words').val();
    var lswr_text_tails = jQuery('#lswr_text_tails').val();
    var lswr_extra_class = jQuery('#lswr_extra_class').val(); 
    var lswr_all_text = jQuery('#lswr_all_text').val(); 
    var logo_cat_order = jQuery('#logo_cat_order').val();
    var logo_cat_orderby = jQuery('#logo_cat_orderby').val();
    var lswr_exclude_cat = jQuery('#lswr_exclude_cat').val();
    var lswr_grid_hover_annimation = jQuery('#lswr_grid_hover_annimation').val();  
    if (grid_design == 'default-template') {} else { sg_main = sg_main + ' design_template="' + grid_design + '"';}
    if (logo_cat == 'nocat') {} else { sg_main = sg_main + ' cat_id="' + logo_cat + '"';}
    if (logo_cat_name == 'nocat') {} else { sg_main = sg_main + ' cat_name="' + logo_cat_name + '"';} 
    if (logo_cell == 'default-cell') {} else { sg_main = sg_main + ' logo_cell="' + logo_cell + '"' ;}
    if (logo_order == 'default-value') {} else { sg_main = sg_main + ' order="' + logo_order + '"' ;}
    if (logo_orderby == 'default-value') {} else { sg_main = sg_main + ' orderby="' + logo_orderby + '"' ;}
    if (lswr_link_target == 'default-value') {} else { sg_main = sg_main + ' click_target="' + lswr_link_target + '"' ;} 
    if (logo_title == 'default-value') {} else { sg_main = sg_main + ' show_title="' + logo_title + '"';}
    if (logo_img == 'original') {} else {sg_main = sg_main + ' image_size="' + logo_img + '"';}
    if (lswr_grid_hover_annimation == 'default-value') {} else { sg_main = sg_main + ' hover_effect="' + lswr_grid_hover_annimation + '"' ;} 
    if (lswr_cat_limit == '0'    || lswr_cat_limit == '') {} else { sg_main = sg_main + ' cat_limit="' + lswr_cat_limit + '"';}
    if (logo_cat_order == 'default-value') {} else { sg_main = sg_main + ' order="' + logo_cat_order + '"' ;}
    if (logo_cat_orderby == 'default-value') {} else { sg_main = sg_main + ' orderby="' + logo_cat_orderby + '"' ;}
    if (lswr_exclude_cat == ' ') {} else { sg_main = sg_main + ' exclude_cat="' + lswr_exclude_cat + '"' ;}
    if (lswr_all_text == 'ALL'    || lswr_all_text == '') {} else { sg_main = sg_main + ' all_text="' + lswr_all_text + '"';}
    if (lswr_text_words == '20'    || lswr_text_words == '') {} else { sg_main = sg_main + ' content_words_limit="' + lswr_text_words + '"';}
    if (lswr_text_tails == '...'    || lswr_text_tails == '') {} else { sg_main = sg_main + ' content_tail="' + lswr_text_tails + '"';}
    if (lswr_extra_class == ' '    || lswr_extra_class == '') {} else { sg_main = sg_main + ' extra_class="' + lswr_extra_class + '"';}
    sg_main = sg_main + ']';
    jQuery("#lswr-portfolio_shortcode").text(sg_main);
    jQuery("#lswr-portfolio_shortcode_php").text("'"+sg_main+"'");
}