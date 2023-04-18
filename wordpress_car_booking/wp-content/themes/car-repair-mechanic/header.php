<?php
/**
 * The Header for our theme.
 * @package Car Repair Mechanic
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}?>
	
	<?php if(get_theme_mod('car_repair_mechanic_preloader',false) || get_theme_mod('car_repair_mechanic_preloader_responsive',false)){ ?>
    <?php if(get_theme_mod( 'car_repair_mechanic_preloader_type','Square') == 'Square'){ ?>
      <div id="overlayer"></div>
      <span class="tg-loader">
      	<span class="tg-loader-inner"></span>
      </span>
    <?php }else if(get_theme_mod( 'car_repair_mechanic_preloader_type') == 'Circle') {?>    
      <div class="preloader text-center">
        <div class="preloader-container">
          <span class="animated-preloader"></span>
        </div>
      </div>
    <?php }?>
	<?php }?>
	<header role="banner" class="position-relative">
		<a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'car-repair-mechanic' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'car-repair-mechanic' ); ?></span></a>

		<div id="header">	
			<div class="row mx-0">
				<div class="col-lg-3 col-md-12 logo-outer ps-lg-5">
					<div class="logo text-lg-start text-center ms-lg-5">
          	<?php if ( has_custom_logo() ) : ?>
            	<div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
              <?php $car_repair_mechanic_blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $car_repair_mechanic_blog_info ) ) : ?>
              	<?php if( get_theme_mod('car_repair_mechanic_show_site_title',true) != ''){ ?>
	                <?php if ( is_front_page() && is_home() ) : ?>
	                	<h1 class="site-title p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	                <?php else : ?>
	                  <p class="site-title m-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	                <?php endif; ?>
	            <?php }?>
            <?php endif; ?>
            <?php if( get_theme_mod('car_repair_mechanic_show_tagline',true) != ''){ ?>
              <?php
              $car_repair_mechanic_description = get_bloginfo( 'description', 'display' );
              if ( $car_repair_mechanic_description || is_customize_preview() ) :
              ?>
              	<p class="site-description m-0">
                  <?php echo esc_html($car_repair_mechanic_description); ?>
              	</p>
              <?php endif; ?>
            <?php }?>
	        </div>
				</div>
				<div class="col-lg-9 col-md-12 px-0 align-self-center">
					<?php if(get_theme_mod('car_repair_mechanic_top_header',false) == true || get_theme_mod('car_repair_mechanic_hide_topbar_responsive',true) == true){ ?>
						<div class="top-bar text-center text-md-start ps-lg-3 pe-lg-5 px-3">
			    		<div class="row me-lg-5">
			    			<div class="<?php if(get_theme_mod('car_repair_mechanic_header_button_text') != '' || get_theme_mod('car_repair_mechanic_header_button_link') != '') {?>col-lg-9 col-md-8 pe-md-0<?php } else {?> col-lg-12 col-md-12 <?php }?> align-self-center contact-info text-lg-start text-center">
									<?php if ( get_theme_mod('car_repair_mechanic_location','') != "" ) {?>
										<span><i class="fas fa-map-marker-alt me-2"></i><?php echo esc_html(get_theme_mod('car_repair_mechanic_location')); ?></span>
									<?php }?>
									<?php if ( get_theme_mod('car_repair_mechanic_mail_address','') != "" ) {?>
										<span><i class="fas fa-envelope me-2"></i><a href="mailto:<?php echo esc_attr(get_theme_mod('car_repair_mechanic_mail_address')); ?>"><?php echo esc_html(get_theme_mod('car_repair_mechanic_mail_address')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('car_repair_mechanic_mail_address')); ?></span></a></span>
									<?php }?>
			    				<?php if ( get_theme_mod('car_repair_mechanic_call','') != "" ) {?>
										<span><i class="fas fa-phone me-2"></i><a href="tel:<?php echo esc_attr(get_theme_mod('car_repair_mechanic_call')); ?>"><?php echo esc_html(get_theme_mod('car_repair_mechanic_call')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('car_repair_mechanic_call')); ?></span></a></span>
									<?php }?>
			    			</div>
			    			<?php if(get_theme_mod('car_repair_mechanic_header_button_text') != '' || get_theme_mod('car_repair_mechanic_header_button_link') != '') {?>
									<div class="col-lg-3 col-md-4 text-md-end text-center quote-btn align-self-center">
										<a href="<?php echo esc_url(get_theme_mod('car_repair_mechanic_header_button_link')); ?>"><i class="fas fa-calendar me-2"></i><?php echo esc_html(get_theme_mod('car_repair_mechanic_header_button_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('car_repair_mechanic_header_button_text')); ?></span></a>
									</div>
								<?php }?>
			    		</div>
						</div>
					<?php }?>
					<div class="middle-header pe-md-5 me-lg-5">
						<div class="row">
							<div class="col-lg-11 col-md-10 col-9 align-self-center">
								<?php if (has_nav_menu('primary')){ ?>
									<div class="toggle-menu responsive-menu">
						        <button role="tab" class="mobiletoggle"><i class="<?php echo esc_attr(get_theme_mod('car_repair_mechanic_menu_open_icon','fas fa-bars')); ?> me-2"></i><?php echo esc_html( get_theme_mod('car_repair_mechanic_mobile_menu_label', __('Menu','car-repair-mechanic'))); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('car_repair_mechanic_mobile_menu_label', __('Menu','car-repair-mechanic'))); ?></span></button>
						      </div>
						    <?php }?>
								<div class="<?php if( get_theme_mod( 'car_repair_mechanic_sticky_header') != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
			            <div id="sidelong-menu" class="nav side-nav">
			              <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'car-repair-mechanic' ); ?>">
			              	<?php if (has_nav_menu('primary')){
			                  wp_nav_menu( array( 
			                    'theme_location' => 'primary',
			                    'container_class' => 'main-menu-navigation clearfix' ,
			                    'menu_class' => 'clearfix',
			                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
			                    'fallback_cb' => 'wp_page_menu',
			                  ) ); 
			              	}?>
			                <a href="javascript:void(0)" class="closebtn responsive-menu"><?php echo esc_html( get_theme_mod('car_repair_mechanic_close_menu_label', __('Close Menu','car-repair-mechanic'))); ?><i class="<?php echo esc_attr(get_theme_mod('car_repair_mechanic_menu_close_icon','fas fa-times-circle')); ?> m-3"></i><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('car_repair_mechanic_close_menu_label', __('Close Menu','car-repair-mechanic'))); ?></span></a>
			              </nav>
			            </div>
								</div>
							</div>
							<div class="col-lg-1 col-md-2 col-3 align-self-center">
								<div class="search-box position-relative">
			            <div class="wrap p-2"><?php get_search_form(); ?></div>
				        </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<?php if(get_theme_mod('car_repair_mechanic_post_featured_image') == 'banner' ){
    if( is_singular() ) {?>
    	<div id="page-site-header">
        <div class='page-header'> 
        	<?php the_title( '<h1>', '</h1>' ); ?>
        </div>
    	</div>
    <?php }
	}?>