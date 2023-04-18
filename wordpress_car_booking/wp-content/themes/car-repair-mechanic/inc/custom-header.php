<?php
/**
 * @package Car Repair Mechanic
 * @subpackage car-repair-mechanic
 * Setup the WordPress core custom header feature.
 *
 * @uses car_repair_mechanic_header_style()
*/

function car_repair_mechanic_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'car_repair_mechanic_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1400,
		'height'                 => 95,
		'wp-head-callback'       => 'car_repair_mechanic_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'car_repair_mechanic_custom_header_setup' );

if ( ! function_exists( 'car_repair_mechanic_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see car_repair_mechanic_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'car_repair_mechanic_header_style' );
function car_repair_mechanic_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$car_repair_mechanic_custom_css = "
        #header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: left top;
			background-size: cover;
		}";
	   	wp_add_inline_style( 'car-repair-mechanic-basic-style', $car_repair_mechanic_custom_css );
	endif;
}
endif; //car_repair_mechanic_header_style