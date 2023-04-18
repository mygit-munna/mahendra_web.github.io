<?php
//about theme info
add_action( 'admin_menu', 'car_repair_mechanic_gettingstarted' );
function car_repair_mechanic_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'car-repair-mechanic'), esc_html__('Get Started', 'car-repair-mechanic'), 'edit_theme_options', 'car_repair_mechanic_guide', 'car_repair_mechanic_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function car_repair_mechanic_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'car_repair_mechanic_admin_theme_style');

//guidline for about theme
function car_repair_mechanic_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'car-repair-mechanic' );
?>
<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Car Repair Mechanic WordPress Theme', 'car-repair-mechanic' ); ?></h3>
		</div>
		<div class="color_bg_blue">
			<p>Version: <?php echo esc_html($theme['Version']);?></p>
				<p class="intro_version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and felxible WordPress theme.', 'car-repair-mechanic' ); ?></p>
				<div class="blink">
					<h4><?php esc_html_e( 'Theme Created By Themesglance', 'car-repair-mechanic' ); ?></h4>
				</div>
			<div class="intro-text"><img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/themesglance-logo.png" alt="" /></div>
			<div class="coupon-code"><?php esc_html_e( 'Get', 'car-repair-mechanic' ); ?> <span><?php esc_html_e( '20% off', 'car-repair-mechanic' ); ?></span> <?php esc_html_e( 'on Premium Theme with the discount code: ', 'car-repair-mechanic' ); ?> <span><?php esc_html_e( '" Get20 "', 'car-repair-mechanic' ); ?></span></div>
		</div>
		<div class="started">
			<h3><?php esc_html_e( 'Lite Theme Info', 'car-repair-mechanic' ); ?></h3>
			<p><?php esc_html_e( 'Car Repair Mechanic Is a theme for Auto Mechanic, Car Repair Shops, Car Wash, Garages, Automobile Mechanicals, Mechanic Workshops, Auto Painting, Auto Centers and other Auto and Car related services and it is suitable for any kind of small business activity – Car Service Mot, Tyres, Brakes Hire, Car Rental, Auto Care, Maintenance, Vehicle Diagnostics, Auto Glass, Body Shops, Auto Inspections, Handyman, Serviceman . It has purpose oriented design and comes with opening hours, Free Consultation for car repairing. It is a user-friendly theme with multiple features like personalization option, testimonial section, styling option, quick page loader, header, slider, interactive demo, etc. Car Repair Mechanic is very easy to install and comes with guild. The theme is compatible with SEO and woocommerce. Also, it comes with popular plugins and responsive features. Amazing theme with easily 24/7 professional support. This theme is ideally made for not only Auto Mechanic, automobile, business, car repair, car wash, garage but also for handyman, local, motor mechanic, repair shop, retail, serviceman. The theme is secure and clean with code. So any beginner can start their online business without any coding knowledge. Also, users do not have to worry for ranking as the theme is SEO optimized. ', 'car-repair-mechanic')?></p>
			<hr>
			<h3><?php esc_html_e( 'Help Docs', 'car-repair-mechanic' ); ?></h3>
			<ul>
				<p><?php esc_html_e( 'Car Repair Mechanic', 'car-repair-mechanic' ); ?> <a href="<?php echo esc_url( CAR_REPAIR_MECHANIC_THEMESGLANCE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'car-repair-mechanic' ); ?></a></p>
			</ul>
			<hr>
			<h3><?php esc_html_e( 'Get started with Car Repair Mechanic Theme', 'car-repair-mechanic' ); ?></h3>
			<div class="col-left-inner"> 
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/free-screenshot.png" alt="" />
			</div>		
			<div class="col-right-inner">
				<p><?php esc_html_e( 'Go to', 'car-repair-mechanic' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'car-repair-mechanic' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'car-repair-mechanic' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Easily customizable ', 'car-repair-mechanic' ); ?> </li>
					<li><?php esc_html_e( 'Absolutely free', 'car-repair-mechanic' ); ?> </li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'car-repair-mechanic'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/responsive.png" alt="" />
			<hr class="firsthr">
			<a href="<?php echo esc_url( CAR_REPAIR_MECHANIC_THEMESGLANCE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'car-repair-mechanic'); ?></a>
			<a href="<?php echo esc_url( CAR_REPAIR_MECHANIC_THEMESGLANCE_PRO_THEME_URL ); ?>"><?php esc_html_e('Buy Pro', 'car-repair-mechanic'); ?></a>
			<a href="<?php echo esc_url( CAR_REPAIR_MECHANIC_THEMESGLANCE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'car-repair-mechanic'); ?></a>
			<hr class="secondhr">
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'car-repair-mechanic'); ?></h3>
		<ul>
		 	<li><?php esc_html_e( 'Slider with unlimited slides', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "courses" listing', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "Events" listing', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Video Section', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Search courses', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Courses categories listing', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Gallery Plugin with shortcode', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "Instructor" listing', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Social Icon widget', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Blog Post section on home', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Newsletter with contact form 7', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Woocommerce Product section on home', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Record Section', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Contact widget for footer', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Contact page Template', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Recent Post Widget with thumbnails', 'car-repair-mechanic'); ?></li>
		 	<li><?php esc_html_e( 'Blog full width, With Left and Right sidebar Template', 'car-repair-mechanic'); ?></li>
		</ul>
	</div>
	<div class="service">
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-media-document"></span> <?php esc_html_e('Get Support', 'car-repair-mechanic'); ?></h3>
			<ol>
				<li>
					<a href="<?php echo esc_url( CAR_REPAIR_MECHANIC_THEMESGLANCE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'car-repair-mechanic'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-welcome-widgets-menus"></span> <?php esc_html_e('Getting Started', 'car-repair-mechanic'); ?></h3>
			<ol>
				<li> <?php esc_html_e('Start', 'car-repair-mechanic'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'car-repair-mechanic'); ?></a> <?php esc_html_e('your website.', 'car-repair-mechanic'); ?></li>
			</ol>
		</div>
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e('Rate This Theme', 'car-repair-mechanic'); ?></h3>
			<ol>
				<li>
					<a href="<?php echo esc_url( CAR_REPAIR_MECHANIC_THEMESGLANCE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Rate it here', 'car-repair-mechanic'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-editor-help"></span> <?php esc_html_e( 'Help Docs', 'car-repair-mechanic' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'Car Repair Mechanic Lite', 'car-repair-mechanic' ); ?> <a href="<?php echo esc_url( CAR_REPAIR_MECHANIC_THEMESGLANCE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'car-repair-mechanic' ); ?></a></li>
			</ol>
		</div>
	</div>
</div>
<?php } ?>