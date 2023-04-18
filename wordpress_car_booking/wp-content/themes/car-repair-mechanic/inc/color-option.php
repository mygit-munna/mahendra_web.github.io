<?php

	$car_repair_mechanic_custom_css = '';

	// Layout Options
	$car_repair_mechanic_theme_layout = get_theme_mod( 'car_repair_mechanic_theme_layout_options','Default Theme');
    if($car_repair_mechanic_theme_layout == 'Default Theme'){
		$car_repair_mechanic_custom_css .='body{';
			$car_repair_mechanic_custom_css .='max-width: 100%;';
		$car_repair_mechanic_custom_css .='}';
	}else if($car_repair_mechanic_theme_layout == 'Container Theme'){
		$car_repair_mechanic_custom_css .='body{';
			$car_repair_mechanic_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$car_repair_mechanic_custom_css .='}';
	}else if($car_repair_mechanic_theme_layout == 'Box Container Theme'){
		$car_repair_mechanic_custom_css .='body{';
			$car_repair_mechanic_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$car_repair_mechanic_custom_css .='}';
	}
	
	/*--------- Preloader Color Option -------*/
	$car_repair_mechanic_preloader_color = get_theme_mod('car_repair_mechanic_preloader_color');

	if($car_repair_mechanic_preloader_color != false){
		$car_repair_mechanic_custom_css .=' .tg-loader{';
			$car_repair_mechanic_custom_css .='border-color: '.esc_attr($car_repair_mechanic_preloader_color).';';
		$car_repair_mechanic_custom_css .='} ';
		$car_repair_mechanic_custom_css .=' .tg-loader-inner, .preloader .preloader-container .animated-preloader, .preloader .preloader-container .animated-preloader:before{';
			$car_repair_mechanic_custom_css .='background-color: '.esc_attr($car_repair_mechanic_preloader_color).';';
		$car_repair_mechanic_custom_css .='} ';
	}

	$car_repair_mechanic_preloader_bg_color = get_theme_mod('car_repair_mechanic_preloader_bg_color');

	if($car_repair_mechanic_preloader_bg_color != false){
		$car_repair_mechanic_custom_css .=' #overlayer, .preloader{';
			$car_repair_mechanic_custom_css .='background-color: '.esc_attr($car_repair_mechanic_preloader_bg_color).';';
		$car_repair_mechanic_custom_css .='} ';
	}

	/*------------ Button Settings option-----------------*/

	$car_repair_mechanic_top_button_padding = get_theme_mod('car_repair_mechanic_top_button_padding');
	$car_repair_mechanic_bottom_button_padding = get_theme_mod('car_repair_mechanic_bottom_button_padding');
	$car_repair_mechanic_left_button_padding = get_theme_mod('car_repair_mechanic_left_button_padding');
	$car_repair_mechanic_right_button_padding = get_theme_mod('car_repair_mechanic_right_button_padding');
	if($car_repair_mechanic_top_button_padding != false || $car_repair_mechanic_bottom_button_padding != false || $car_repair_mechanic_left_button_padding != false || $car_repair_mechanic_right_button_padding != false){
		$car_repair_mechanic_custom_css .='.blogbtn a, .read-more a, #comments input[type="submit"].submit{';
			$car_repair_mechanic_custom_css .='padding-top: '.esc_attr($car_repair_mechanic_top_button_padding).'px; padding-bottom: '.esc_attr($car_repair_mechanic_bottom_button_padding).'px; padding-left: '.esc_attr($car_repair_mechanic_left_button_padding).'px; padding-right: '.esc_attr($car_repair_mechanic_right_button_padding).'px; display:inline-block;';
		$car_repair_mechanic_custom_css .='}';
	}

	$car_repair_mechanic_button_border_radius = get_theme_mod('car_repair_mechanic_button_border_radius');
	$car_repair_mechanic_custom_css .='.blogbtn a, .read-more a, #comments input[type="submit"].submit{';
		$car_repair_mechanic_custom_css .='border-radius: '.esc_attr($car_repair_mechanic_button_border_radius).'px;';
	$car_repair_mechanic_custom_css .='}';

	/*----------- Copyright css -----*/
	$car_repair_mechanic_copyright_top_padding = get_theme_mod('car_repair_mechanic_top_copyright_padding');
	$car_repair_mechanic_copyright_bottom_padding = get_theme_mod('car_repair_mechanic_bottom_copyright_padding');
	if($car_repair_mechanic_copyright_top_padding != '' || $car_repair_mechanic_copyright_bottom_padding != ''){
		$car_repair_mechanic_custom_css .='.inner{';
			$car_repair_mechanic_custom_css .='padding-top: '.esc_attr($car_repair_mechanic_copyright_top_padding).'px; padding-bottom: '.esc_attr($car_repair_mechanic_copyright_bottom_padding).'px; ';
		$car_repair_mechanic_custom_css .='}';
	}

	$car_repair_mechanic_copyright_alignment = get_theme_mod('car_repair_mechanic_copyright_alignment', 'center');
	if($car_repair_mechanic_copyright_alignment == 'center' ){
		$car_repair_mechanic_custom_css .='#footer .copyright p{';
			$car_repair_mechanic_custom_css .='text-align: '. $car_repair_mechanic_copyright_alignment .';';
		$car_repair_mechanic_custom_css .='}';
	}elseif($car_repair_mechanic_copyright_alignment == 'left' ){
		$car_repair_mechanic_custom_css .='#footer .copyright p{';
			$car_repair_mechanic_custom_css .=' text-align: '. $car_repair_mechanic_copyright_alignment .';';
		$car_repair_mechanic_custom_css .='}';
	}elseif($car_repair_mechanic_copyright_alignment == 'right' ){
		$car_repair_mechanic_custom_css .='#footer .copyright p{';
			$car_repair_mechanic_custom_css .='text-align: '. $car_repair_mechanic_copyright_alignment .';';
		$car_repair_mechanic_custom_css .='}';
	}

	$car_repair_mechanic_copyright_font_size = get_theme_mod('car_repair_mechanic_copyright_font_size');
	$car_repair_mechanic_custom_css .='#footer .copyright p{';
		$car_repair_mechanic_custom_css .='font-size: '.esc_attr($car_repair_mechanic_copyright_font_size).'px;';
	$car_repair_mechanic_custom_css .='}';

	/*------ Topbar padding ------*/
	$car_repair_mechanic_top_topbar_padding = get_theme_mod('car_repair_mechanic_top_topbar_padding');
	$car_repair_mechanic_bottom_topbar_padding = get_theme_mod('car_repair_mechanic_bottom_topbar_padding');
	if($car_repair_mechanic_top_topbar_padding != false || $car_repair_mechanic_bottom_topbar_padding != false){
		$car_repair_mechanic_custom_css .='.top-bar, .page-template-custom-front-page .top-bar{';
			$car_repair_mechanic_custom_css .='padding-top: '.esc_attr($car_repair_mechanic_top_topbar_padding).'px !important; padding-bottom: '.esc_attr($car_repair_mechanic_bottom_topbar_padding).'px !important; ';
		$car_repair_mechanic_custom_css .='}';
	}

	/*------ Woocommerce ----*/
	$car_repair_mechanic_product_border = get_theme_mod('car_repair_mechanic_product_border',true);

	if($car_repair_mechanic_product_border == false){
		$car_repair_mechanic_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$car_repair_mechanic_custom_css .='border: 0;';
		$car_repair_mechanic_custom_css .='}';
	}

	$car_repair_mechanic_product_top = get_theme_mod('car_repair_mechanic_product_top_padding',10);
	$car_repair_mechanic_product_bottom = get_theme_mod('car_repair_mechanic_product_bottom_padding',10);
	$car_repair_mechanic_product_left = get_theme_mod('car_repair_mechanic_product_left_padding',10);
	$car_repair_mechanic_product_right = get_theme_mod('car_repair_mechanic_product_right_padding',10);
	if($car_repair_mechanic_product_top != false || $car_repair_mechanic_product_bottom != false || $car_repair_mechanic_product_left != false || $car_repair_mechanic_product_right != false){
		$car_repair_mechanic_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$car_repair_mechanic_custom_css .='padding-top: '.esc_attr($car_repair_mechanic_product_top).'px; padding-bottom: '.esc_attr($car_repair_mechanic_product_bottom).'px; padding-left: '.esc_attr($car_repair_mechanic_product_left).'px; padding-right: '.esc_attr($car_repair_mechanic_product_right).'px;';
		$car_repair_mechanic_custom_css .='}';
	}

	$car_repair_mechanic_product_border_radius = get_theme_mod('car_repair_mechanic_product_border_radius');
	if($car_repair_mechanic_product_border_radius != false){
		$car_repair_mechanic_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$car_repair_mechanic_custom_css .='border-radius: '.esc_attr($car_repair_mechanic_product_border_radius).'px;';
		$car_repair_mechanic_custom_css .='}';
	}

	/*----- WooCommerce button css --------*/
	$car_repair_mechanic_product_button_top = get_theme_mod('car_repair_mechanic_product_button_top_padding',10);
	$car_repair_mechanic_product_button_bottom = get_theme_mod('car_repair_mechanic_product_button_bottom_padding',10);
	$car_repair_mechanic_product_button_left = get_theme_mod('car_repair_mechanic_product_button_left_padding',12);
	$car_repair_mechanic_product_button_right = get_theme_mod('car_repair_mechanic_product_button_right_padding',12);
	if($car_repair_mechanic_product_button_top != false || $car_repair_mechanic_product_button_bottom != false || $car_repair_mechanic_product_button_left != false || $car_repair_mechanic_product_button_right != false){
		$car_repair_mechanic_custom_css .='.woocommerce ul.products li.product .button, .woocommerce div.product form.cart .button, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order, button.woocommerce-button.button.woocommerce-form-login__submit, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$car_repair_mechanic_custom_css .='padding-top: '.esc_attr($car_repair_mechanic_product_button_top).'px; padding-bottom: '.esc_attr($car_repair_mechanic_product_button_bottom).'px; padding-left: '.esc_attr($car_repair_mechanic_product_button_left).'px; padding-right: '.esc_attr($car_repair_mechanic_product_button_right).'px;';
		$car_repair_mechanic_custom_css .='}';
	}

	$car_repair_mechanic_product_button_border_radius = get_theme_mod('car_repair_mechanic_product_button_border_radius');
	if($car_repair_mechanic_product_button_border_radius != false){
		$car_repair_mechanic_custom_css .='.woocommerce ul.products li.product .button, .woocommerce div.product form.cart .button, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, a.checkout-button.button.alt.wc-forward, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order, button.woocommerce-button.button.woocommerce-form-login__submit{';
			$car_repair_mechanic_custom_css .='border-radius: '.esc_attr($car_repair_mechanic_product_button_border_radius).'px;';
		$car_repair_mechanic_custom_css .='}';
	}

	/*----- WooCommerce product sale css --------*/
	$car_repair_mechanic_product_sale_top = get_theme_mod('car_repair_mechanic_product_sale_top_padding');
	$car_repair_mechanic_product_sale_bottom = get_theme_mod('car_repair_mechanic_product_sale_bottom_padding');
	$car_repair_mechanic_product_sale_left = get_theme_mod('car_repair_mechanic_product_sale_left_padding');
	$car_repair_mechanic_product_sale_right = get_theme_mod('car_repair_mechanic_product_sale_right_padding');
	if($car_repair_mechanic_product_sale_top != false || $car_repair_mechanic_product_sale_bottom != false || $car_repair_mechanic_product_sale_left != false || $car_repair_mechanic_product_sale_right != false){
		$car_repair_mechanic_custom_css .='.woocommerce span.onsale {';
			$car_repair_mechanic_custom_css .='padding-top: '.esc_attr($car_repair_mechanic_product_sale_top).'px; padding-bottom: '.esc_attr($car_repair_mechanic_product_sale_bottom).'px; padding-left: '.esc_attr($car_repair_mechanic_product_sale_left).'px; padding-right: '.esc_attr($car_repair_mechanic_product_sale_right).'px;';
		$car_repair_mechanic_custom_css .='}';
	}

	$car_repair_mechanic_product_sale_border_radius = get_theme_mod('car_repair_mechanic_product_sale_border_radius',0);
	if($car_repair_mechanic_product_sale_border_radius != false){
		$car_repair_mechanic_custom_css .='.woocommerce span.onsale {';
			$car_repair_mechanic_custom_css .='border-radius: '.esc_attr($car_repair_mechanic_product_sale_border_radius).'px;';
		$car_repair_mechanic_custom_css .='}';
	}

	$car_repair_mechanic_menu_case = get_theme_mod('car_repair_mechanic_product_sale_position', 'Right');
	if($car_repair_mechanic_menu_case == 'Right' ){
		$car_repair_mechanic_custom_css .='.woocommerce ul.products li.product .onsale{';
			$car_repair_mechanic_custom_css .=' left:auto; right:0;';
		$car_repair_mechanic_custom_css .='}';
	}elseif($car_repair_mechanic_menu_case == 'Left' ){
		$car_repair_mechanic_custom_css .='.woocommerce ul.products li.product .onsale{';
			$car_repair_mechanic_custom_css .=' left:-10px; right:auto;';
		$car_repair_mechanic_custom_css .='}';
	}

	$car_repair_mechanic_product_sale_font_size = get_theme_mod('car_repair_mechanic_product_sale_font_size',13);
	$car_repair_mechanic_custom_css .='.woocommerce span.onsale {';
		$car_repair_mechanic_custom_css .='font-size: '.esc_attr($car_repair_mechanic_product_sale_font_size).'px;';
	$car_repair_mechanic_custom_css .='}';


	/*---- Comment form ----*/
	$car_repair_mechanic_comment_width = get_theme_mod('car_repair_mechanic_comment_width', '100');
	$car_repair_mechanic_custom_css .='#comments textarea{';
		$car_repair_mechanic_custom_css .=' width:'.esc_attr($car_repair_mechanic_comment_width).'%;';
	$car_repair_mechanic_custom_css .='}';

	$car_repair_mechanic_comment_submit_text = get_theme_mod('car_repair_mechanic_comment_submit_text', 'Post Comment');
	if($car_repair_mechanic_comment_submit_text == ''){
		$car_repair_mechanic_custom_css .='#comments p.form-submit {';
			$car_repair_mechanic_custom_css .='display: none;';
		$car_repair_mechanic_custom_css .='}';
	}

	$car_repair_mechanic_comment_title = get_theme_mod('car_repair_mechanic_comment_title', 'Leave a Reply');
	if($car_repair_mechanic_comment_title == ''){
		$car_repair_mechanic_custom_css .='#comments h2#reply-title {';
			$car_repair_mechanic_custom_css .='display: none;';
		$car_repair_mechanic_custom_css .='}';
	}

	/*------ Footer background css -------*/
	$car_repair_mechanic_footer_bg_color = get_theme_mod('car_repair_mechanic_footer_bg_color');
	if($car_repair_mechanic_footer_bg_color != false){
		$car_repair_mechanic_custom_css .='.footerinner{';
			$car_repair_mechanic_custom_css .='background-color: '.esc_attr($car_repair_mechanic_footer_bg_color).';';
		$car_repair_mechanic_custom_css .='}';
	}

	$car_repair_mechanic_footer_bg_image = get_theme_mod('car_repair_mechanic_footer_bg_image');
	if($car_repair_mechanic_footer_bg_image != false){
		$car_repair_mechanic_custom_css .='.footerinner{';
			$car_repair_mechanic_custom_css .='background: url('.esc_attr($car_repair_mechanic_footer_bg_image).');';
		$car_repair_mechanic_custom_css .='}';
	}

	/*----- Featured image css -----*/
	$car_repair_mechanic_feature_image_border_radius = get_theme_mod('car_repair_mechanic_feature_image_border_radius');
	if($car_repair_mechanic_feature_image_border_radius != false){
		$car_repair_mechanic_custom_css .='.blog-sec img{';
			$car_repair_mechanic_custom_css .='border-radius: '.esc_attr($car_repair_mechanic_feature_image_border_radius).'px;';
		$car_repair_mechanic_custom_css .='}';
	}

	$car_repair_mechanic_feature_image_shadow = get_theme_mod('car_repair_mechanic_feature_image_shadow');
	if($car_repair_mechanic_feature_image_shadow != false){
		$car_repair_mechanic_custom_css .='.blog-sec img{';
			$car_repair_mechanic_custom_css .='box-shadow: '.esc_attr($car_repair_mechanic_feature_image_shadow).'px '.esc_attr($car_repair_mechanic_feature_image_shadow).'px '.esc_attr($car_repair_mechanic_feature_image_shadow).'px #aaa;';
		$car_repair_mechanic_custom_css .='}';
	}

	/*------ Sticky header padding ------------*/
	$car_repair_mechanic_top_sticky_header_padding = get_theme_mod('car_repair_mechanic_top_sticky_header_padding');
	$car_repair_mechanic_bottom_sticky_header_padding = get_theme_mod('car_repair_mechanic_bottom_sticky_header_padding');
	$car_repair_mechanic_custom_css .=' .fixed-header{';
		$car_repair_mechanic_custom_css .=' padding-top: '.esc_attr($car_repair_mechanic_top_sticky_header_padding).'px; padding-bottom: '.esc_attr($car_repair_mechanic_bottom_sticky_header_padding).'px';
	$car_repair_mechanic_custom_css .='}';

		// featured image dimention
	$car_repair_mechanic_blog_image_dimension = get_theme_mod('car_repair_mechanic_blog_image_dimension', 'default');
	$car_repair_mechanic_feature_image_custom_width = get_theme_mod('car_repair_mechanic_feature_image_custom_width',250);
	$car_repair_mechanic_feature_image_custom_height = get_theme_mod('car_repair_mechanic_feature_image_custom_height',250);
	if($car_repair_mechanic_blog_image_dimension == 'custom'){
		$car_repair_mechanic_custom_css .='.blog-sec img{';
			$car_repair_mechanic_custom_css .='width: '.esc_attr($car_repair_mechanic_feature_image_custom_width).'px; height: '.esc_attr($car_repair_mechanic_feature_image_custom_height).'px;';
		$car_repair_mechanic_custom_css .='}';
	}

	/*------ Related products ---------*/
	$car_repair_mechanic_related_products = get_theme_mod('car_repair_mechanic_single_related_products',true);
	if($car_repair_mechanic_related_products == false){
		$car_repair_mechanic_custom_css .=' .related.products{';
			$car_repair_mechanic_custom_css .='display: none;';
		$car_repair_mechanic_custom_css .='}';
	}

	/*-------- Menu Font Size --------*/
	$car_repair_mechanic_menu_font_size = get_theme_mod('car_repair_mechanic_menu_font_size',13);
	if($car_repair_mechanic_menu_font_size != false){
		$car_repair_mechanic_custom_css .='.nav-menu ul li a{';
			$car_repair_mechanic_custom_css .='font-size: '.esc_attr($car_repair_mechanic_menu_font_size).'px;';
		$car_repair_mechanic_custom_css .='}';
	}

	$car_repair_mechanic_menu_font_weight = get_theme_mod('car_repair_mechanic_menu_font_weight');
	$car_repair_mechanic_custom_css .='.nav-menu ul li a{';
		$car_repair_mechanic_custom_css .='font-weight: '.esc_attr($car_repair_mechanic_menu_font_weight).';';
	$car_repair_mechanic_custom_css .='}';

	// menu padding
	$car_repair_mechanic_menu_padding = get_theme_mod('car_repair_mechanic_menu_padding',20);
	$car_repair_mechanic_custom_css .='.nav-menu ul li a, .sf-arrows ul .sf-with-ul, .sf-arrows .sf-with-ul{';
		$car_repair_mechanic_custom_css .='padding: '.esc_attr($car_repair_mechanic_menu_padding).'px;';
	$car_repair_mechanic_custom_css .='}';

	// menu color
	$car_repair_mechanic_menu_color = get_theme_mod('car_repair_mechanic_menu_color');

	$car_repair_mechanic_custom_css .='.nav-menu a,.nav-menu .current_page_item > a, .nav-menu .current-menu-item > a, .nav-menu .current_page_ancestor > a{';
			$car_repair_mechanic_custom_css .='color: '.esc_attr($car_repair_mechanic_menu_color).' !important;';
	$car_repair_mechanic_custom_css .='}';

	// menu hover color
	$car_repair_mechanic_menu_hover_color = get_theme_mod('car_repair_mechanic_menu_hover_color');
	$car_repair_mechanic_custom_css .='.nav-menu a:hover, .nav-menu ul li a:hover, .nav-menu ul.sub-menu a:hover, .nav-menu ul.sub-menu li a:hover{';
			$car_repair_mechanic_custom_css .='color: '.esc_attr($car_repair_mechanic_menu_hover_color).' !important;';
	$car_repair_mechanic_custom_css .='}';

	// Submenu color
	$car_repair_mechanic_submenu_menu_color = get_theme_mod('car_repair_mechanic_submenu_menu_color');
	$car_repair_mechanic_custom_css .='.nav-menu ul.sub-menu a, .nav-menu ul.sub-menu li a{';
			$car_repair_mechanic_custom_css .='color: '.esc_attr($car_repair_mechanic_submenu_menu_color).' !important;';
	$car_repair_mechanic_custom_css .='}';


	// Featured image header
	$header_image_url = car_repair_mechanic_banner_image( $image_url = '' );
	$car_repair_mechanic_custom_css .='#page-site-header{';
		$car_repair_mechanic_custom_css .='background-image: url('. esc_url( $header_image_url ).'); background-size: cover;';
	$car_repair_mechanic_custom_css .='}';

	$car_repair_mechanic_post_featured_image = get_theme_mod('car_repair_mechanic_post_featured_image', 'in-content');
	if($car_repair_mechanic_post_featured_image == 'banner' ){
		$car_repair_mechanic_custom_css .='.single #wrapper h1, .page #wrapper h1, .page #wrapper img{';
			$car_repair_mechanic_custom_css .=' display: none;';
		$car_repair_mechanic_custom_css .='}';
		$car_repair_mechanic_custom_css .='.page-template-custom-front-page #page-site-header{';
			$car_repair_mechanic_custom_css .=' display: none;';
		$car_repair_mechanic_custom_css .='}';
	}

	// Woocommerce Shop page pagination
	$car_repair_mechanic_shop_page_navigation = get_theme_mod('car_repair_mechanic_shop_page_navigation',true);
	if ($car_repair_mechanic_shop_page_navigation == false) {
		$car_repair_mechanic_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$car_repair_mechanic_custom_css .='display: none;';
		$car_repair_mechanic_custom_css .='}';
	}

	/*----- Blog Post display type css ------*/
	$car_repair_mechanic_blog_post_display_type = get_theme_mod('car_repair_mechanic_blog_post_display_type', 'blocks');
	if($car_repair_mechanic_blog_post_display_type == 'without blocks' ){
		$car_repair_mechanic_custom_css .='.blog .blog-sec, .blog #sidebar .widget{';
			$car_repair_mechanic_custom_css .='border: 0;';
		$car_repair_mechanic_custom_css .='}';
	}

	/*---------- Responsive style ---------*/
	$car_repair_mechanic_toggle_button_bg_color_settings = get_theme_mod('car_repair_mechanic_toggle_button_bg_color_settings');
	$car_repair_mechanic_custom_css .='@media screen and (max-width: 575px){
		.middle-header{';
	$car_repair_mechanic_custom_css .='background-color: '.esc_attr($car_repair_mechanic_toggle_button_bg_color_settings).';';
	$car_repair_mechanic_custom_css .='} }';
	
	if (get_theme_mod('car_repair_mechanic_hide_topbar_responsive',true) == true && get_theme_mod('car_repair_mechanic_top_header',false) == false) {
		$car_repair_mechanic_custom_css .='.top-bar{';
			$car_repair_mechanic_custom_css .=' display: none;';
		$car_repair_mechanic_custom_css .='} ';
	}

	if (get_theme_mod('car_repair_mechanic_sticky_header_responsive') == false) {
		$car_repair_mechanic_custom_css .='@media screen and (max-width: 575px){
			.sticky{';
			$car_repair_mechanic_custom_css .=' position: static;';
		$car_repair_mechanic_custom_css .='} }';
	}

	if (get_theme_mod('car_repair_mechanic_hide_topbar_responsive',true) == false) {
		$car_repair_mechanic_custom_css .='@media screen and (max-width: 575px){
			.top-bar{';
			$car_repair_mechanic_custom_css .=' display: none;';
		$car_repair_mechanic_custom_css .='} }';
	} else if(get_theme_mod('car_repair_mechanic_hide_topbar_responsive',true) == true){
		$car_repair_mechanic_custom_css .='@media screen and (max-width: 575px){
			.top-bar{';
			$car_repair_mechanic_custom_css .=' display: block;';
		$car_repair_mechanic_custom_css .='} }';
	}

	// Site title Font Size
	$car_repair_mechanic_site_title_font_size = get_theme_mod('car_repair_mechanic_site_title_font_size', '25');
	$car_repair_mechanic_custom_css .='.logo h1, .logo p.site-title{';
		$car_repair_mechanic_custom_css .='font-size: '.esc_attr($car_repair_mechanic_site_title_font_size).'px;';
	$car_repair_mechanic_custom_css .='}';

	// Site tagline Font Size
	$car_repair_mechanic_site_tagline_font_size = get_theme_mod('car_repair_mechanic_site_tagline_font_size', '14');
	$car_repair_mechanic_custom_css .='.logo p.site-description{';
		$car_repair_mechanic_custom_css .='font-size: '.esc_attr($car_repair_mechanic_site_tagline_font_size).'px;';
	$car_repair_mechanic_custom_css .='}';

	/*---- Slider Content Position -----*/
	$car_repair_mechanic_top_position = get_theme_mod('car_repair_mechanic_slider_top_position');
	$car_repair_mechanic_bottom_position = get_theme_mod('car_repair_mechanic_slider_bottom_position');
	$car_repair_mechanic_left_position = get_theme_mod('car_repair_mechanic_slider_left_position');
	$car_repair_mechanic_right_position = get_theme_mod('car_repair_mechanic_slider_right_position');
	if($car_repair_mechanic_top_position != false || $car_repair_mechanic_bottom_position != false || $car_repair_mechanic_left_position != false || $car_repair_mechanic_right_position != false){
		$car_repair_mechanic_custom_css .='#slider .carousel-caption{';
			$car_repair_mechanic_custom_css .='top: '.esc_attr($car_repair_mechanic_top_position).'%; bottom: '.esc_attr($car_repair_mechanic_bottom_position).'%; left: '.esc_attr($car_repair_mechanic_left_position).'%; right: '.esc_attr($car_repair_mechanic_right_position).'%;';
		$car_repair_mechanic_custom_css .='}';
	}

	/*---- Slider Height ------*/
	$car_repair_mechanic_slider_height = get_theme_mod('car_repair_mechanic_slider_height');
	$car_repair_mechanic_custom_css .='#slider img{';
		$car_repair_mechanic_custom_css .='height: '.esc_attr($car_repair_mechanic_slider_height).'px;';
	$car_repair_mechanic_custom_css .='}';
	$car_repair_mechanic_custom_css .='@media screen and (max-width: 768px){
		#slider img{';
		$car_repair_mechanic_custom_css .='height: auto;';
	$car_repair_mechanic_custom_css .='} }';

	/*--------------------------- Slider Opacity -------------------*/
	$car_repair_mechanic_theme_lay = get_theme_mod( 'car_repair_mechanic_slider_image_opacity','0.7');
	if($car_repair_mechanic_theme_lay == '0'){
		$car_repair_mechanic_custom_css .='#slider img{';
			$car_repair_mechanic_custom_css .='opacity:0';
		$car_repair_mechanic_custom_css .='}';
		}else if($car_repair_mechanic_theme_lay == '0.1'){
		$car_repair_mechanic_custom_css .='#slider img{';
			$car_repair_mechanic_custom_css .='opacity:0.1';
		$car_repair_mechanic_custom_css .='}';
		}else if($car_repair_mechanic_theme_lay == '0.2'){
		$car_repair_mechanic_custom_css .='#slider img{';
			$car_repair_mechanic_custom_css .='opacity:0.2';
		$car_repair_mechanic_custom_css .='}';
		}else if($car_repair_mechanic_theme_lay == '0.3'){
		$car_repair_mechanic_custom_css .='#slider img{';
			$car_repair_mechanic_custom_css .='opacity:0.3';
		$car_repair_mechanic_custom_css .='}';
		}else if($car_repair_mechanic_theme_lay == '0.4'){
		$car_repair_mechanic_custom_css .='#slider img{';
			$car_repair_mechanic_custom_css .='opacity:0.4';
		$car_repair_mechanic_custom_css .='}';
		}else if($car_repair_mechanic_theme_lay == '0.5'){
		$car_repair_mechanic_custom_css .='#slider img{';
			$car_repair_mechanic_custom_css .='opacity:0.5';
		$car_repair_mechanic_custom_css .='}';
		}else if($car_repair_mechanic_theme_lay == '0.6'){
		$car_repair_mechanic_custom_css .='#slider img{';
			$car_repair_mechanic_custom_css .='opacity:0.6';
		$car_repair_mechanic_custom_css .='}';
		}else if($car_repair_mechanic_theme_lay == '0.7'){
		$car_repair_mechanic_custom_css .='#slider img{';
			$car_repair_mechanic_custom_css .='opacity:0.7';
		$car_repair_mechanic_custom_css .='}';
		}else if($car_repair_mechanic_theme_lay == '0.8'){
		$car_repair_mechanic_custom_css .='#slider img{';
			$car_repair_mechanic_custom_css .='opacity:0.8';
		$car_repair_mechanic_custom_css .='}';
		}else if($car_repair_mechanic_theme_lay == '0.9'){
		$car_repair_mechanic_custom_css .='#slider img{';
			$car_repair_mechanic_custom_css .='opacity:0.9';
		$car_repair_mechanic_custom_css .='}';
		}

	// slider overlay
	$car_repair_mechanic_slider_overlay = get_theme_mod('car_repair_mechanic_slider_overlay', true);
	if($car_repair_mechanic_slider_overlay == false){
		$car_repair_mechanic_custom_css .='#slider img{';
			$car_repair_mechanic_custom_css .='opacity:1;';
		$car_repair_mechanic_custom_css .='}';
	} 
	$car_repair_mechanic_slider_image_overlay_color = get_theme_mod('car_repair_mechanic_slider_image_overlay_color', true);
	if($car_repair_mechanic_slider_overlay != false){
		$car_repair_mechanic_custom_css .='#slider{';
			$car_repair_mechanic_custom_css .='background-color: '.esc_attr($car_repair_mechanic_slider_image_overlay_color).'!important;';
		$car_repair_mechanic_custom_css .='}';
	}		

	// Metabox Seperator
	$car_repair_mechanic_metabox_seperator = get_theme_mod('car_repair_mechanic_metabox_seperator');
	if($car_repair_mechanic_metabox_seperator != '' ){
		$car_repair_mechanic_custom_css .='.post-info span:after{';
			$car_repair_mechanic_custom_css .=' content: "'.esc_attr($car_repair_mechanic_metabox_seperator).'"; padding-left:10px;';
		$car_repair_mechanic_custom_css .='}';
		$car_repair_mechanic_custom_css .='.post-info span:last-child:after{';
			$car_repair_mechanic_custom_css .=' content: none;';
		$car_repair_mechanic_custom_css .='}';
	}	

	/*-------- Blog Post Alignment ------*/
	$car_repair_mechanic_post_alignment = get_theme_mod('car_repair_mechanic_blog_post_alignment', 'center');
	if($car_repair_mechanic_post_alignment == 'left' ){
		$car_repair_mechanic_custom_css .='.blog-sec, .blog-sec h2, .post-info, .blogbtn{';
			$car_repair_mechanic_custom_css .=' text-align: '. $car_repair_mechanic_post_alignment .'!important;';
		$car_repair_mechanic_custom_css .='}';
	}elseif($car_repair_mechanic_post_alignment == 'right' ){
		$car_repair_mechanic_custom_css .='.blog-sec, .blog-sec h2, .post-info, .blogbtn{';
			$car_repair_mechanic_custom_css .='text-align: '. $car_repair_mechanic_post_alignment .'!important;';
		$car_repair_mechanic_custom_css .='}';
	}	

	// responsive settings
	if (get_theme_mod('car_repair_mechanic_preloader_responsive',false) == true && get_theme_mod('car_repair_mechanic_preloader',false) == false) {
		$car_repair_mechanic_custom_css .='@media screen and (min-width: 575px){
			.preloader, #overlayer, .tg-loader{';
			$car_repair_mechanic_custom_css .=' visibility: hidden;';
		$car_repair_mechanic_custom_css .='} }';
	}
	if (get_theme_mod('car_repair_mechanic_preloader_responsive',false) == false) {
		$car_repair_mechanic_custom_css .='@media screen and (max-width: 575px){
			.preloader, #overlayer, .tg-loader{';
			$car_repair_mechanic_custom_css .=' visibility: hidden;';
		$car_repair_mechanic_custom_css .='} }';
	}

	// scroll to top
	$car_repair_mechanic_scroll = get_theme_mod( 'car_repair_mechanic_backtotop_responsive',true);
	if (get_theme_mod('car_repair_mechanic_backtotop_responsive',true) == true && get_theme_mod('car_repair_mechanic_hide_scroll',true) == false) {
    	$car_repair_mechanic_custom_css .='.show-back-to-top{';
			$car_repair_mechanic_custom_css .='visibility: hidden !important;';
		$car_repair_mechanic_custom_css .='} ';
	}
    if($car_repair_mechanic_scroll == true){
    	$car_repair_mechanic_custom_css .='@media screen and (max-width:575px) {';
		$car_repair_mechanic_custom_css .='.show-back-to-top{';
			$car_repair_mechanic_custom_css .='visibility: visible !important;';
		$car_repair_mechanic_custom_css .='} }';
	}else if($car_repair_mechanic_scroll == false){
		$car_repair_mechanic_custom_css .='@media screen and (max-width:575px) {';
		$car_repair_mechanic_custom_css .='.show-back-to-top{';
			$car_repair_mechanic_custom_css .='visibility: hidden !important;';
		$car_repair_mechanic_custom_css .='} }';
	}

	$car_repair_mechanic_resp_sidebar = get_theme_mod( 'car_repair_mechanic_sidebar_hide_show',true);
    if($car_repair_mechanic_resp_sidebar == true){
    	$car_repair_mechanic_custom_css .='@media screen and (max-width:575px) {';
		$car_repair_mechanic_custom_css .='#sidebar{';
			$car_repair_mechanic_custom_css .='display:block;';
		$car_repair_mechanic_custom_css .='} }';
	}else if($car_repair_mechanic_resp_sidebar == false){
		$car_repair_mechanic_custom_css .='@media screen and (max-width:575px) {';
		$car_repair_mechanic_custom_css .='#sidebar{';
			$car_repair_mechanic_custom_css .='display:none;';
		$car_repair_mechanic_custom_css .='} }';
	}

	/*------ Footer background css -------*/
	$car_repair_mechanic_copyright_bg_color = get_theme_mod('car_repair_mechanic_copyright_bg_color');
	if($car_repair_mechanic_copyright_bg_color != false){
		$car_repair_mechanic_custom_css .='.inner{';
			$car_repair_mechanic_custom_css .='background-color: '.esc_attr($car_repair_mechanic_copyright_bg_color).';';
		$car_repair_mechanic_custom_css .='}';
	}

	/*------Slider css -------*/
	$car_repair_mechanic_show_slider = get_theme_mod('car_repair_mechanic_show_slider',false);
	if($car_repair_mechanic_show_slider == false){
		$car_repair_mechanic_custom_css .='.page-template-custom-front-page #header {';
			$car_repair_mechanic_custom_css .='position: static; background:#000;';
		$car_repair_mechanic_custom_css .='}';
	}

	// responsive slider
	if (get_theme_mod('car_repair_mechanic_slider_responsive',true) == true && get_theme_mod('car_repair_mechanic_show_slider',false) == false) {
		$car_repair_mechanic_custom_css .='@media screen and (min-width: 575px){
			#slider{';
			$car_repair_mechanic_custom_css .=' display: none;';
		$car_repair_mechanic_custom_css .='} }';
	}
	if (get_theme_mod('car_repair_mechanic_slider_responsive',true) == false) {
		$car_repair_mechanic_custom_css .='@media screen and (max-width: 575px){
			#slider{';
			$car_repair_mechanic_custom_css .=' display: none;';
		$car_repair_mechanic_custom_css .='} }';
	}

	// slider button
	if (get_theme_mod('car_repair_mechanic_slider_button_responsive',true) == true && get_theme_mod('car_repair_mechanic_slider_button',true) == false) {
		$car_repair_mechanic_custom_css .='@media screen and (min-width: 575px){
			.read-more{';
			$car_repair_mechanic_custom_css .=' display: none;';
		$car_repair_mechanic_custom_css .='} }';
	}
	if (get_theme_mod('car_repair_mechanic_slider_button_responsive',true) == false) {
		$car_repair_mechanic_custom_css .='@media screen and (max-width: 575px){
			.read-more{';
			$car_repair_mechanic_custom_css .=' display: none;';
		$car_repair_mechanic_custom_css .='} }';
		$car_repair_mechanic_custom_css .='@media screen and (max-width: 575px){
			#slider .carousel-caption{';
			$car_repair_mechanic_custom_css .=' padding: 0px;';
		$car_repair_mechanic_custom_css .='} }';
	}

	// menu padding

	$car_repair_mechanic_menu_case = get_theme_mod('car_repair_mechanic_menu_case', 'Capitalize');
	if($car_repair_mechanic_menu_case == 'uppercase' ){
		$car_repair_mechanic_custom_css .='.nav-menu ul li a{';
			$car_repair_mechanic_custom_css .=' text-transform: uppercase;';
		$car_repair_mechanic_custom_css .='}';
	}elseif($car_repair_mechanic_menu_case == 'lowercase' ){
		$car_repair_mechanic_custom_css .='.nav-menu ul li a{';
			$car_repair_mechanic_custom_css .=' text-transform: lowercase;';
		$car_repair_mechanic_custom_css .='}';
	}

	// Single post image border radious
	$car_repair_mechanic_single_post_img_border_radius = get_theme_mod('car_repair_mechanic_single_post_img_border_radius', 0);
	$car_repair_mechanic_custom_css .='.feature-box img{';
		$car_repair_mechanic_custom_css .='border-radius: '.esc_attr($car_repair_mechanic_single_post_img_border_radius).'px;';
	$car_repair_mechanic_custom_css .='}';

	// Single post image box shadow
	$car_repair_mechanic_single_post_img_box_shadow = get_theme_mod('car_repair_mechanic_single_post_img_box_shadow',0);
	$car_repair_mechanic_custom_css .='.feature-box img{';
		$car_repair_mechanic_custom_css .='box-shadow: '.esc_attr($car_repair_mechanic_single_post_img_box_shadow).'px '.esc_attr($car_repair_mechanic_single_post_img_box_shadow).'px '.esc_attr($car_repair_mechanic_single_post_img_box_shadow).'px #ccc;';
	$car_repair_mechanic_custom_css .='}';