<?php
/**
 * The template for displaying search forms in Car Repair Mechanic
 * @package Car Repair Mechanic
 */
?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'car-repair-mechanic' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( get_theme_mod('car_repair_mechanic_search_placeholder', __('Search', 'car-repair-mechanic')) ); ?>" value="<?php the_search_query(); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'car-repair-mechanic' ); ?>">
</form>