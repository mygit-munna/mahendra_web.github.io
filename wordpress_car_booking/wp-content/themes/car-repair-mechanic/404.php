<?php
/**
 * The template for displaying 404 pages (Not Found).
 * @package Car Repair Mechanic
 */
get_header(); ?>

<div class="container">
	<main id="maincontent" role="main" class="notfound py-4 text-center">
		<?php if(get_theme_mod('car_repair_mechanic_404_title','404 Not Found')){ ?>
			<h1><?php echo esc_html( get_theme_mod('car_repair_mechanic_404_title',__('404 Not Found', 'car-repair-mechanic' )) ); ?></h1>
		<?php }?>
		<?php if(get_theme_mod('car_repair_mechanic_404_button_label','Return to the home page')){ ?>
			<div class="read-moresec mt-3">
        		<a href="<?php echo esc_url( home_url() ); ?>" class="button py-2 px-4"><?php echo esc_html( get_theme_mod('car_repair_mechanic_404_button_label',__('Return to the home page', 'car-repair-mechanic' )) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('car_repair_mechanic_404_button_label',__('Return to the home page', 'car-repair-mechanic' )) ); ?></span></a>
			</div>
		<?php }?>
	</main>
	<div class="clearfix"></div>
</div>
	
<?php get_footer(); ?>