<?php
/**
 * Car Repair Mechanic Theme Customizer
 * @package Car Repair Mechanic
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function car_repair_mechanic_customize_register( $wp_customize ) {	

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-selector.php' );

	class Car_Repair_Mechanic_WP_Customize_Range_Control extends WP_Customize_Control{
	    public $type = 'custom_range';
	    public function enqueue(){
	        wp_enqueue_script(
	            'cs-range-control',
	            false,
	            true
	        );
	    }
	    public function render_content(){?>
	        <label>
	            <?php if ( ! empty( $this->label )) : ?>
	                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	            <?php endif; ?>
	            <div class="cs-range-value"><?php echo esc_html($this->value()); ?></div>
	            <input data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
	            <?php if ( ! empty( $this->description )) : ?>
	                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
	            <?php endif; ?>
	        </label>
        <?php }
	}

	//add home page setting pannel
	$wp_customize->add_panel( 'car_repair_mechanic_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'car-repair-mechanic' ),
		'description' => __( 'Description of what this panel does.', 'car-repair-mechanic' ),
	) );

	// font array
	$car_repair_mechanic_font_array = array(
		'' => 'No Fonts',
		'Abril Fatface' => 'Abril Fatface',
		'Acme' => 'Acme',
		'Anton' => 'Anton',
		'Architects Daughter' => 'Architects Daughter',
		'Arimo' => 'Arimo',
		'Arsenal' => 'Arsenal', 
		'Arvo' => 'Arvo',
		'Alegreya' => 'Alegreya',
		'Alfa Slab One' => 'Alfa Slab One',
		'Averia Serif Libre' => 'Averia Serif Libre',
		'Bangers' => 'Bangers', 
		'Boogaloo' => 'Boogaloo',
		'Bad Script' => 'Bad Script',
		'Bitter' => 'Bitter',
		'Bree Serif' => 'Bree Serif',
		'BenchNine' => 'BenchNine', 
		'Cabin' => 'Cabin', 
		'Cardo' => 'Cardo',
		'Courgette' => 'Courgette',
		'Cherry Swash' => 'Cherry Swash',
		'Cormorant Garamond' => 'Cormorant Garamond',
		'Crimson Text' => 'Crimson Text',
		'Cuprum' => 'Cuprum', 
		'Cookie' => 'Cookie', 
		'Chewy' => 'Chewy', 
		'Days One' => 'Days One', 
		'Dosis' => 'Dosis',
		'Droid Sans' => 'Droid Sans',
		'Economica' => 'Economica',
		'Fredoka One' => 'Fredoka One',
		'Fjalla One' => 'Fjalla One',
		'Francois One' => 'Francois One',
		'Frank Ruhl Libre' => 'Frank Ruhl Libre',
		'Gloria Hallelujah' => 'Gloria Hallelujah',
		'Great Vibes' => 'Great Vibes',
		'Handlee' => 'Handlee', 
		'Hammersmith One' => 'Hammersmith One',
		'Inconsolata' => 'Inconsolata', 
		'Indie Flower' => 'Indie Flower', 
		'IM Fell English SC' => 'IM Fell English SC', 
		'Julius Sans One' => 'Julius Sans One',
		'Josefin Slab' => 'Josefin Slab', 
		'Josefin Sans' => 'Josefin Sans', 
		'Kanit' => 'Kanit', 
		'Lobster' => 'Lobster', 
		'Lato' => 'Lato',
		'Lora' => 'Lora', 
		'Libre Baskerville' =>'Libre Baskerville',
		'Lobster Two' => 'Lobster Two',
		'Merriweather' =>'Merriweather', 
		'Monda' => 'Monda',
		'Montserrat' => 'Montserrat',
		'Muli' => 'Muli', 
		'Marck Script' => 'Marck Script',
		'Noto Serif' => 'Noto Serif',
		'Open Sans' => 'Open Sans', 
		'Overpass' => 'Overpass',
		'Overpass Mono' => 'Overpass Mono',
		'Oxygen' => 'Oxygen', 
		'Orbitron' => 'Orbitron', 
		'Patua One' => 'Patua One', 
		'Pacifico' => 'Pacifico',
		'Padauk' => 'Padauk', 
		'Playball' => 'Playball',
		'Playfair Display' => 'Playfair Display', 
		'PT Sans' => 'PT Sans',
		'Philosopher' => 'Philosopher',
		'Permanent Marker' => 'Permanent Marker',
		'Poiret One' => 'Poiret One', 
		'Quicksand' => 'Quicksand', 
		'Quattrocento Sans' => 'Quattrocento Sans', 
		'Raleway' => 'Raleway', 
		'Rubik' => 'Rubik', 
		'Rokkitt' => 'Rokkitt', 
		'Russo One' => 'Russo One', 
		'Righteous' => 'Righteous', 
		'Slabo' => 'Slabo', 
		'Source Sans Pro' => 'Source Sans Pro', 
		'Shadows Into Light Two' =>'Shadows Into Light Two', 
		'Shadows Into Light' => 'Shadows Into Light', 
		'Sacramento' => 'Sacramento', 
		'Shrikhand' => 'Shrikhand', 
		'Tangerine' => 'Tangerine',
		'Ubuntu' => 'Ubuntu', 
		'VT323' => 'VT323', 
		'Varela Round' => 'Varela Round', 
		'Vampiro One' => 'Vampiro One',
		'Vollkorn' => 'Vollkorn',
		'Volkhov' => 'Volkhov', 
		'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
   );

	//Typography
	$wp_customize->add_section( 'car_repair_mechanic_typography', array(
    	'title' => __( 'Typography', 'car-repair-mechanic' ),
		'priority'   => 30,
		'panel' => 'car_repair_mechanic_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'car_repair_mechanic_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_mechanic_paragraph_color', array(
		'label' => __('Paragraph Color', 'car-repair-mechanic'),
		'section' => 'car_repair_mechanic_typography',
		'settings' => 'car_repair_mechanic_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('car_repair_mechanic_paragraph_font_family',array(
	  	'default' => '',
	  	'capability' => 'edit_theme_options',
	  	'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control(
	   'car_repair_mechanic_paragraph_font_family', array(
	   'section'  => 'car_repair_mechanic_typography',
	   'label'    => __( 'Paragraph Fonts','car-repair-mechanic'),
	   'type'     => 'select',
	   'choices'  => $car_repair_mechanic_font_array,
	));

	$wp_customize->add_setting('car_repair_mechanic_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('car_repair_mechanic_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','car-repair-mechanic'),
		'section'	=> 'car_repair_mechanic_typography',
		'setting'	=> 'car_repair_mechanic_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'car_repair_mechanic_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_mechanic_atag_color', array(
		'label' => __('"a" Tag Color', 'car-repair-mechanic'),
		'section' => 'car_repair_mechanic_typography',
		'settings' => 'car_repair_mechanic_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('car_repair_mechanic_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control(
	   'car_repair_mechanic_atag_font_family', array(
	   'section'  => 'car_repair_mechanic_typography',
	   'label'    => __( '"a" Tag Fonts','car-repair-mechanic'),
	   'type'     => 'select',
	   'choices'  => $car_repair_mechanic_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'car_repair_mechanic_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_mechanic_li_color', array(
		'label' => __('"li" Tag Color', 'car-repair-mechanic'),
		'section' => 'car_repair_mechanic_typography',
		'settings' => 'car_repair_mechanic_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('car_repair_mechanic_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control(
	   'car_repair_mechanic_li_font_family', array(
	   'section'  => 'car_repair_mechanic_typography',
	   'label'    => __( '"li" Tag Fonts','car-repair-mechanic'),
	   'type'     => 'select',
	   'choices'  => $car_repair_mechanic_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'car_repair_mechanic_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_mechanic_h1_color', array(
		'label' => __('H1 Color', 'car-repair-mechanic'),
		'section' => 'car_repair_mechanic_typography',
		'settings' => 'car_repair_mechanic_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('car_repair_mechanic_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control(
	   'car_repair_mechanic_h1_font_family', array(
	   'section'  => 'car_repair_mechanic_typography',
	   'label'    => __( 'H1 Fonts','car-repair-mechanic'),
	   'type'     => 'select',
	   'choices'  => $car_repair_mechanic_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('car_repair_mechanic_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('car_repair_mechanic_h1_font_size',array(
		'label'	=> __('H1 Font Size','car-repair-mechanic'),
		'section'	=> 'car_repair_mechanic_typography',
		'setting'	=> 'car_repair_mechanic_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'car_repair_mechanic_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_mechanic_h2_color', array(
		'label' => __('h2 Color', 'car-repair-mechanic'),
		'section' => 'car_repair_mechanic_typography',
		'settings' => 'car_repair_mechanic_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('car_repair_mechanic_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control(
	   'car_repair_mechanic_h2_font_family', array(
	   'section'  => 'car_repair_mechanic_typography',
	   'label'    => __( 'h2 Fonts','car-repair-mechanic'),
	   'type'     => 'select',
	   'choices'  => $car_repair_mechanic_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('car_repair_mechanic_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('car_repair_mechanic_h2_font_size',array(
		'label'	=> __('h2 Font Size','car-repair-mechanic'),
		'section'	=> 'car_repair_mechanic_typography',
		'setting'	=> 'car_repair_mechanic_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'car_repair_mechanic_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_mechanic_h3_color', array(
		'label' => __('h3 Color', 'car-repair-mechanic'),
		'section' => 'car_repair_mechanic_typography',
		'settings' => 'car_repair_mechanic_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('car_repair_mechanic_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control(
	   'car_repair_mechanic_h3_font_family', array(
	   'section'  => 'car_repair_mechanic_typography',
	   'label'    => __( 'h3 Fonts','car-repair-mechanic'),
	   'type'     => 'select',
	   'choices'  => $car_repair_mechanic_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('car_repair_mechanic_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('car_repair_mechanic_h3_font_size',array(
		'label'	=> __('h3 Font Size','car-repair-mechanic'),
		'section'	=> 'car_repair_mechanic_typography',
		'setting'	=> 'car_repair_mechanic_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'car_repair_mechanic_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_mechanic_h4_color', array(
		'label' => __('h4 Color', 'car-repair-mechanic'),
		'section' => 'car_repair_mechanic_typography',
		'settings' => 'car_repair_mechanic_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('car_repair_mechanic_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control(
	   'car_repair_mechanic_h4_font_family', array(
	   'section'  => 'car_repair_mechanic_typography',
	   'label'    => __( 'h4 Fonts','car-repair-mechanic'),
	   'type'     => 'select',
	   'choices'  => $car_repair_mechanic_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('car_repair_mechanic_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('car_repair_mechanic_h4_font_size',array(
		'label'	=> __('h4 Font Size','car-repair-mechanic'),
		'section'	=> 'car_repair_mechanic_typography',
		'setting'	=> 'car_repair_mechanic_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'car_repair_mechanic_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_mechanic_h5_color', array(
		'label' => __('h5 Color', 'car-repair-mechanic'),
		'section' => 'car_repair_mechanic_typography',
		'settings' => 'car_repair_mechanic_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('car_repair_mechanic_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control(
	   'car_repair_mechanic_h5_font_family', array(
	   'section'  => 'car_repair_mechanic_typography',
	   'label'    => __( 'h5 Fonts','car-repair-mechanic'),
	   'type'     => 'select',
	   'choices'  => $car_repair_mechanic_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('car_repair_mechanic_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('car_repair_mechanic_h5_font_size',array(
		'label'	=> __('h5 Font Size','car-repair-mechanic'),
		'section'	=> 'car_repair_mechanic_typography',
		'setting'	=> 'car_repair_mechanic_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'car_repair_mechanic_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_mechanic_h6_color', array(
		'label' => __('h6 Color', 'car-repair-mechanic'),
		'section' => 'car_repair_mechanic_typography',
		'settings' => 'car_repair_mechanic_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('car_repair_mechanic_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control(
	   'car_repair_mechanic_h6_font_family', array(
	   'section'  => 'car_repair_mechanic_typography',
	   'label'    => __( 'h6 Fonts','car-repair-mechanic'),
	   'type'     => 'select',
	   'choices'  => $car_repair_mechanic_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('car_repair_mechanic_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('car_repair_mechanic_h6_font_size',array(
		'label'	=> __('h6 Font Size','car-repair-mechanic'),
		'section'	=> 'car_repair_mechanic_typography',
		'setting'	=> 'car_repair_mechanic_h6_font_size',
		'type'	=> 'text'
	));

	//Topbar section
	$wp_customize->add_section('car_repair_mechanic_topbar_icon',array(
		'title'	=> __('Topbar Section','car-repair-mechanic'),
		'description'	=> __('Add Header Content here','car-repair-mechanic'),
		'priority'	=> null,
		'panel' => 'car_repair_mechanic_panel_id',
	));

	$wp_customize->add_setting('car_repair_mechanic_top_header',array(
      'default' => false,
      'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
   ));
   $wp_customize->add_control('car_repair_mechanic_top_header',array(
      'type' => 'checkbox',
      'label' => __('Enable Top Header','car-repair-mechanic'),
      'section' => 'car_repair_mechanic_topbar_icon'
   ));

   $wp_customize->add_setting('car_repair_mechanic_topbar_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('car_repair_mechanic_topbar_padding',array(
		'label'	=> esc_html__('Topbar Padding','car-repair-mechanic'),
		'section'=> 'car_repair_mechanic_topbar_icon',
	));

   $wp_customize->add_setting('car_repair_mechanic_top_topbar_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_top_topbar_padding',array(
		'description'	=> __('Top','car-repair-mechanic'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
      ),
		'section'=> 'car_repair_mechanic_topbar_icon',
		'type'=> 'number',
	));

	$wp_customize->add_setting('car_repair_mechanic_bottom_topbar_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_bottom_topbar_padding',array(
		'description'	=> __('Bottom','car-repair-mechanic'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
      ),
		'section'=> 'car_repair_mechanic_topbar_icon',
		'type'=> 'number',
	));

   $wp_customize->add_setting('car_repair_mechanic_sticky_header',array(
      'default' => '',
      'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
  	));
	$wp_customize->add_control('car_repair_mechanic_sticky_header',array(
		'type' => 'checkbox',
		'label' => __('Stick header on Desktop','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_topbar_icon'
	));

 	$wp_customize->add_setting('car_repair_mechanic_sticky_header_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('car_repair_mechanic_sticky_header_padding',array(
		'label'	=> esc_html__('Sticky Header Padding','car-repair-mechanic'),
		'section'=> 'car_repair_mechanic_topbar_icon',
		'type' => 'hidden',
	));

 	$wp_customize->add_setting('car_repair_mechanic_top_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_top_sticky_header_padding',array(
		'description'	=> __('Top','car-repair-mechanic'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
     	),
		'section'=> 'car_repair_mechanic_topbar_icon',
		'type'=> 'number'
	));

	$wp_customize->add_setting('car_repair_mechanic_bottom_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_bottom_sticky_header_padding',array(
		'description'	=> __('Bottom','car-repair-mechanic'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
     	),
		'section'=> 'car_repair_mechanic_topbar_icon',
		'type'=> 'number'
	));

	$wp_customize->add_setting('car_repair_mechanic_location',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('car_repair_mechanic_location',array(
		'label'	=> __('Add Location','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_topbar_icon',
		'setting' => 'car_repair_mechanic_location',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('car_repair_mechanic_mail_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('car_repair_mechanic_mail_address',array(
		'label'	=> __('Add Email Address','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_topbar_icon',
		'setting' => 'car_repair_mechanic_mail_address',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('car_repair_mechanic_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_phone_number'
	));
	$wp_customize->add_control('car_repair_mechanic_call',array(
		'label'	=> __('Add Phone No.','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_topbar_icon',
		'setting' => 'car_repair_mechanic_call',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('car_repair_mechanic_header_button_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('car_repair_mechanic_header_button_text',array(
		'label'	=> __('Add Button Text','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_topbar_icon',
		'setting' => 'car_repair_mechanic_header_button_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('car_repair_mechanic_header_button_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('car_repair_mechanic_header_button_link',array(
		'label'	=> __('Add Button Link','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_topbar_icon',
		'setting' => 'car_repair_mechanic_topbar_button_link',
		'type'	=> 'url'
	));

	// Header
	$wp_customize->add_section('car_repair_mechanic_header',array(
		'title'	=> __('Header','car-repair-mechanic'),
		'priority' => null,
		'panel' => 'car_repair_mechanic_panel_id',
	));

	$wp_customize->add_setting( 'car_repair_mechanic_menu_font_size', array(
		'default'=> '13',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Car_Repair_Mechanic_WP_Customize_Range_Control( $wp_customize, 'car_repair_mechanic_menu_font_size', array(
		'label'  => __('Menu Font Size','car-repair-mechanic'),
		'section'  => 'car_repair_mechanic_header',
		'description' => __('Measurement is in pixel.','car-repair-mechanic'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
    )));

 	$wp_customize->add_setting('car_repair_mechanic_menu_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control('car_repair_mechanic_menu_font_weight',array(
		'type' => 'select',
		'label' => __('Menu Font Weight','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_header',
		'choices' => array(
		   '100' => __('100','car-repair-mechanic'),
		   '200' => __('200','car-repair-mechanic'),
		   '300' => __('300','car-repair-mechanic'),
		   '400' => __('400','car-repair-mechanic'),
		   '500' => __('500','car-repair-mechanic'),
		   '600' => __('600','car-repair-mechanic'),
		   '700' => __('700','car-repair-mechanic'),
		   '800' => __('800','car-repair-mechanic'),
		   '900' => __('900','car-repair-mechanic'),
		),
	) );

	$wp_customize->add_setting('car_repair_mechanic_menu_padding',array(
		'default'=> 20,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new car_repair_mechanic_WP_Customize_Range_Control( $wp_customize,'car_repair_mechanic_menu_padding',array(
		'label'	=> __('Menu Font Padding','car-repair-mechanic'),
		'section'=> 'car_repair_mechanic_header',
		'input_attrs' => array(
         'step'  => 1,
			'min'   => 0,
			'max'   => 50,
        ),
	)));

	$wp_customize->add_setting('car_repair_mechanic_menu_case',array(
        'default' => 'Capitalize',
        'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control('car_repair_mechanic_menu_case',array(
        'type' => 'select',
        'label' => __('Menu Case','car-repair-mechanic'),
        'section' => 'car_repair_mechanic_header',
        'choices' => array(
            'uppercase' => __('Uppercase','car-repair-mechanic'),
            'capitalize' => __('Capitalize','car-repair-mechanic'),
            'lowercase' => __('lowercase','car-repair-mechanic'),
        ),
	) );

	$wp_customize->add_setting('car_repair_mechanic_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'car_repair_mechanic_menu_color', array(
		'label'    => __('Menu Color', 'car-repair-mechanic'),
		'section'  => 'car_repair_mechanic_header',
		'settings' => 'car_repair_mechanic_menu_color',
	)));

	$wp_customize->add_setting('car_repair_mechanic_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'car_repair_mechanic_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'car-repair-mechanic'),
		'section'  => 'car_repair_mechanic_header',
		'settings' => 'car_repair_mechanic_menu_hover_color',
	)));

	$wp_customize->add_setting('car_repair_mechanic_submenu_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'car_repair_mechanic_submenu_menu_color', array(
		'label'    => __('Submenu Color', 'car-repair-mechanic'),
		'section'  => 'car_repair_mechanic_header',
		'settings' => 'car_repair_mechanic_submenu_menu_color',
	)));
	

	//Slider section
  	$wp_customize->add_section('car_repair_mechanic_slider',array(
		'title' => __('Slider Section','car-repair-mechanic'),
		'description' => '',
		'priority'  => null,
		'panel' => 'car_repair_mechanic_panel_id',
	)); 

	$wp_customize->add_setting('car_repair_mechanic_show_slider',array(
		'default' => false,
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_show_slider',array(
     	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','car-repair-mechanic'),
	   	'section' => 'car_repair_mechanic_slider'
	));

	$wp_customize->add_setting('car_repair_mechanic_slider_title',array(
     'default' => true,
     'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_slider_title',array(
     	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider Title','car-repair-mechanic'),
	   	'section' => 'car_repair_mechanic_slider'
	));

	$wp_customize->add_setting('car_repair_mechanic_slider_content',array(
		'default' => true,
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_slider_content',array(
     	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider Content','car-repair-mechanic'),
	   	'section' => 'car_repair_mechanic_slider'
	));

	$wp_customize->add_setting('car_repair_mechanic_slider_button',array(
		'default' => true,
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_slider_button',array(
     	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider Button','car-repair-mechanic'),
	   	'section' => 'car_repair_mechanic_slider'
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'car_repair_mechanic_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'car_repair_mechanic_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'car_repair_mechanic_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'car-repair-mechanic' ),
			'section'  => 'car_repair_mechanic_slider',
			'type'     => 'dropdown-pages'
		) 	);
	}

	$wp_customize->add_setting('car_repair_mechanic_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('car_repair_mechanic_facebook_url',array(
		'label'	=> __('Add Facebook URL','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_slider',
		'setting' => 'car_repair_mechanic_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('car_repair_mechanic_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('car_repair_mechanic_twitter_url',array(
		'label'	=> __('Add Twitter URL','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_slider',
		'setting' => 'car_repair_mechanic_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('car_repair_mechanic_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('car_repair_mechanic_instagram_url',array(
		'label'	=> __('Add Instagram URL','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_slider',
		'setting' => 'car_repair_mechanic_instagram_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('car_repair_mechanic_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('car_repair_mechanic_linkedin_url',array(
		'label'	=> __('Add Pinterest URL','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_slider',
		'setting' => 'car_repair_mechanic_linkedin_url',
		'type'	=> 'url'
	));

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$pst2[]='Select';  
	foreach($post_list as $post){
		$pst2[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('car_repair_mechanic_video_post',array(
		'sanitize_callback' => 'car_repair_mechanic_sanitize_choices',
	));
	$wp_customize->add_control('car_repair_mechanic_video_post',array(
		'type'    => 'select',
		'choices' => $pst2,
		'label' => __('Select video post','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_slider',
	));

	$wp_customize->add_setting('car_repair_mechanic_content_position',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('car_repair_mechanic_content_position',array(
		'label'	=> esc_html__('Slider Content Position','car-repair-mechanic'),
		'section'=> 'car_repair_mechanic_slider',
	));

	$wp_customize->add_setting( 'car_repair_mechanic_slider_top_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	) );
	$wp_customize->add_control( 'car_repair_mechanic_slider_top_position', array(
		'label' => esc_html__( 'Top','car-repair-mechanic' ),
		'section' => 'car_repair_mechanic_slider',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'car_repair_mechanic_slider_bottom_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	) );
	$wp_customize->add_control( 'car_repair_mechanic_slider_bottom_position', array(
		'label' => esc_html__( 'Bottom','car-repair-mechanic' ),
		'section' => 'car_repair_mechanic_slider',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'car_repair_mechanic_slider_left_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	) );
	$wp_customize->add_control( 'car_repair_mechanic_slider_left_position', array(
		'label' => esc_html__( 'Left','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_slider',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'car_repair_mechanic_slider_right_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	) );
	$wp_customize->add_control( 'car_repair_mechanic_slider_right_position', array(
		'label' => esc_html__('Right','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_slider',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	//Opacity
	$wp_customize->add_setting('car_repair_mechanic_slider_image_opacity',array(
      'default'              => 0.7,
      'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control( 'car_repair_mechanic_slider_image_opacity', array(
	'label'       => esc_html__( 'Slider Image Opacity','car-repair-mechanic' ),
	'section'     => 'car_repair_mechanic_slider',
	'type'        => 'select',
	'settings'    => 'car_repair_mechanic_slider_image_opacity',
	'choices' => array(
		'0' =>  esc_attr('0','car-repair-mechanic'),
		'0.1' =>  esc_attr('0.1','car-repair-mechanic'),
		'0.2' =>  esc_attr('0.2','car-repair-mechanic'),
		'0.3' =>  esc_attr('0.3','car-repair-mechanic'),
		'0.4' =>  esc_attr('0.4','car-repair-mechanic'),
		'0.5' =>  esc_attr('0.5','car-repair-mechanic'),
		'0.6' =>  esc_attr('0.6','car-repair-mechanic'),
		'0.7' =>  esc_attr('0.7','car-repair-mechanic'),
		'0.8' =>  esc_attr('0.8','car-repair-mechanic'),
		'0.9' =>  esc_attr('0.9','car-repair-mechanic')
	),
	));

	//Slider excerpt
	$wp_customize->add_setting( 'car_repair_mechanic_slider_excerpt_number', array(
		'default' => 25,
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	) );
	$wp_customize->add_control( 'car_repair_mechanic_slider_excerpt_number', array(
		'label' => esc_html__( 'Slider Excerpt length','car-repair-mechanic' ),
		'section' => 'car_repair_mechanic_slider',
		'type' => 'number',
		'settings' => 'car_repair_mechanic_slider_excerpt_number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

	$wp_customize->add_setting('car_repair_mechanic_slider_overlay',array(
       'default' => true,
       'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
    ));
    $wp_customize->add_control('car_repair_mechanic_slider_overlay',array(
       'type' => 'checkbox',
       'label' => __('Home Page Slider Overlay','car-repair-mechanic'),
       'section' => 'car_repair_mechanic_slider'
    ));

    $wp_customize->add_setting('car_repair_mechanic_slider_image_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'car_repair_mechanic_slider_image_overlay_color', array(
		'label'    => __('Home Page Slider Overlay Color', 'car-repair-mechanic'),
		'section'  => 'car_repair_mechanic_slider',
		'settings' => 'car_repair_mechanic_slider_image_overlay_color',
	)));

	$wp_customize->add_setting( 'car_repair_mechanic_slider_button_label', array(
		'default' => __('Read More','car-repair-mechanic'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'car_repair_mechanic_slider_button_label', array(
		'label' => esc_html__( 'Slider Button Label','car-repair-mechanic' ),
		'section' => 'car_repair_mechanic_slider',
		'type'    => 'text',
		'settings'    => 'car_repair_mechanic_slider_button_label'
	) );

	$wp_customize->add_setting( 'car_repair_mechanic_slider_height', array(
		'default'          => '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	) );
	$wp_customize->add_control( 'car_repair_mechanic_slider_height', array(
		'label' => esc_html__( 'Slider Height','car-repair-mechanic' ),
		'section' => 'car_repair_mechanic_slider',
		'type'    => 'number',
		'description' => __('Measurement is in pixel.','car-repair-mechanic'),
		'input_attrs' => array(
			'step' => 1,
			'min'  => 500,
			'max'  => 1000,
		),
	) );

	//Services Section
	$wp_customize->add_section('car_repair_mechanic_service_section',array(
		'title'	=> __('Service Section','car-repair-mechanic'),
		'description'	=> __('Add service section below.','car-repair-mechanic'),
		'panel' => 'car_repair_mechanic_panel_id',
	));

	$wp_customize->add_setting('car_repair_mechanic_section_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('car_repair_mechanic_section_title',array(
		'label'	=> __('Section Title','car-repair-mechanic'),
		'section'	=> 'car_repair_mechanic_service_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('car_repair_mechanic_section_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('car_repair_mechanic_section_text',array(
		'label'	=> __('Section Text','car-repair-mechanic'),
		'section'	=> 'car_repair_mechanic_service_section',
		'type'		=> 'text'
	));

	$categories = get_categories();
		$cat_posts = array();
		$i = 0;
		$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('car_repair_mechanic_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_choices',
	));
	$wp_customize->add_control('car_repair_mechanic_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display service posts','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_service_section',
	));

	//layout setting
	$wp_customize->add_section( 'car_repair_mechanic_theme_layout', array(
    	'title' => __( 'Blog Settings', 'car-repair-mechanic' ),   
		'priority' => null,
		'panel' => 'car_repair_mechanic_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('car_repair_mechanic_layout',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	) );
	$wp_customize->add_control(new Car_Repair_Mechanic_Image_Radio_Control($wp_customize, 'car_repair_mechanic_layout', array(
		'type' => 'radio',
		'label' => esc_html__('Select Sidebar layout', 'car-repair-mechanic'),
		'section' => 'car_repair_mechanic_theme_layout',
		'settings' => 'car_repair_mechanic_layout',
		'choices' => array(
		   'Right Sidebar' => esc_url(get_template_directory_uri()) . '/images/layout3.png',
		   'Left Sidebar' => esc_url(get_template_directory_uri()) . '/images/layout2.png',
		   'One Column' => esc_url(get_template_directory_uri()) . '/images/layout1.png',
		   'Three Columns' => esc_url(get_template_directory_uri()) . '/images/layout4.png',
		   'Four Columns' => esc_url(get_template_directory_uri()) . '/images/layout5.png',
		   'Grid Layout' => esc_url(get_template_directory_uri()) . '/images/layout6.png'
	))));

	$wp_customize->add_setting('car_repair_mechanic_blog_post_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
    ));
	$wp_customize->add_control('car_repair_mechanic_blog_post_alignment', array(
        'type' => 'select',
        'label' => __( 'Blog Post Alignment', 'car-repair-mechanic' ),
        'section' => 'car_repair_mechanic_theme_layout',
        'choices' => array(
            'left' => __('Left Align','car-repair-mechanic'),
            'right' => __('Right Align','car-repair-mechanic'),
            'center' => __('Center Align','car-repair-mechanic')
        ),
    ));

	$wp_customize->add_setting('car_repair_mechanic_blog_post_display_type',array(
		'default' => 'blocks',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control('car_repair_mechanic_blog_post_display_type', array(
		'type' => 'select',
		'label' => __( 'Blog Page Display Type', 'car-repair-mechanic' ),
		'section' => 'car_repair_mechanic_theme_layout',
		'choices' => array(
		   'blocks' => __('Blocks','car-repair-mechanic'),
		   'without blocks' => __('Without Blocks','car-repair-mechanic'),
		),
    ));

    $wp_customize->add_setting('car_repair_mechanic_featured_image',array(
       'default' => 'true',
       'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
    ));
    $wp_customize->add_control('car_repair_mechanic_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Featured Image','car-repair-mechanic'),
       'section' => 'car_repair_mechanic_theme_layout'
    ));

	$wp_customize->add_setting('car_repair_mechanic_metafields_date',array(
		'default' => 'true',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_metafields_date',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Date ','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_theme_layout'
	));

	$wp_customize->add_setting('car_repair_mechanic_metafields_author',array(
		'default' => 'true',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_metafields_author',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Author','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_theme_layout'
	));

	$wp_customize->add_setting('car_repair_mechanic_metafields_comment',array(
		'default' => 'true',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_metafields_comment',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Comments','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_theme_layout'
	));

	$wp_customize->add_setting('car_repair_mechanic_metafields_time',array(
		'default' => 'true',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_metafields_time',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Time','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_theme_layout'
	));

	$wp_customize->add_setting('car_repair_mechanic_post_navigation',array(
		'default' => 'true',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_post_navigation',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Post Navigation','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_theme_layout'
	));

	$wp_customize->add_setting('car_repair_mechanic_metabox_seperator',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('car_repair_mechanic_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','car-repair-mechanic'),
       'description' => __('Ex: "/", "|", "-", ...','car-repair-mechanic'),
       'section' => 'car_repair_mechanic_theme_layout'
    ));

 	$wp_customize->add_setting('car_repair_mechanic_blog_post_content',array(
    	'default' => 'Excerpt Content',
     	'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control('car_repair_mechanic_blog_post_content',array(
		'type' => 'radio',
		'label' => __('Blog Post Content Type','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_theme_layout',
		'choices' => array(
		   'No Content' => __('No Content','car-repair-mechanic'),
		   'Full Content' => __('Full Content','car-repair-mechanic'),
		   'Excerpt Content' => __('Excerpt Content','car-repair-mechanic'),
		),
	) );

 	$wp_customize->add_setting( 'car_repair_mechanic_post_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	) );
	$wp_customize->add_control( 'car_repair_mechanic_post_excerpt_number', array(
		'label' => esc_html__( 'Blog Post Excerpt Number (Max 50)','car-repair-mechanic' ),
		'section' => 'car_repair_mechanic_theme_layout',
		'type'    => 'number',
		'settings' => 'car_repair_mechanic_post_excerpt_number',
		'input_attrs' => array(
			'step'  => 1,
			'min'   => 0,
			'max'   => 50,
		),
		'active_callback' => 'car_repair_mechanic_excerpt_enabled'
	) );

	$wp_customize->add_setting( 'car_repair_mechanic_button_excerpt_suffix', array(
		'default'   => '...',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'car_repair_mechanic_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','car-repair-mechanic' ),
		'section'     => 'car_repair_mechanic_theme_layout',
		'type'        => 'text',
		'settings'    => 'car_repair_mechanic_button_excerpt_suffix',
		'active_callback' => 'car_repair_mechanic_excerpt_enabled'
	) );

	//Featured Image
	$wp_customize->add_setting('car_repair_mechanic_blog_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'car_repair_mechanic_sanitize_choices'
    ));
    $wp_customize->add_control('car_repair_mechanic_blog_image_dimension',array(
       'type' => 'radio',
       'label'	=> __('Blog Post Featured Image Dimension','car-repair-mechanic'),
       'choices' => array(
            'default' => __('Default','car-repair-mechanic'),
            'custom' => __('Custom Image Size','car-repair-mechanic'),
        ),
      	'section'	=> 'car_repair_mechanic_theme_layout',
    ) );

    $wp_customize->add_setting( 'car_repair_mechanic_feature_image_custom_width', array(
		'default'=> '250',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Car_Repair_Mechanic_WP_Customize_Range_Control( $wp_customize, 'car_repair_mechanic_feature_image_custom_width', array(
        'label'  => __('Featured Image Custom Width','car-repair-mechanic'),
        'section'  => 'car_repair_mechanic_theme_layout',
        'description' => __('Measurement is in pixel.','car-repair-mechanic'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 400,
        ),
		'active_callback' => 'car_repair_mechanic_blog_image_dimension'
    )));

    $wp_customize->add_setting( 'car_repair_mechanic_feature_image_custom_height', array(
		'default'=> '250',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Car_Repair_Mechanic_WP_Customize_Range_Control( $wp_customize, 'car_repair_mechanic_feature_image_custom_height', array(
        'label'  => __('Featured Image Custom Height','car-repair-mechanic'),
        'section'  => 'car_repair_mechanic_theme_layout',
        'description' => __('Measurement is in pixel.','car-repair-mechanic'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 400,
        ),
		'active_callback' => 'car_repair_mechanic_blog_image_dimension'
    )));

	$wp_customize->add_setting( 'car_repair_mechanic_feature_image_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Car_Repair_Mechanic_WP_Customize_Range_Control( $wp_customize, 'car_repair_mechanic_feature_image_border_radius', array(
        'label'  => __('Featured Image Border Radius','car-repair-mechanic'),
        'section'  => 'car_repair_mechanic_theme_layout',
        'description' => __('Measurement is in pixel.','car-repair-mechanic'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    )));

	$wp_customize->add_setting( 'car_repair_mechanic_feature_image_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Car_Repair_Mechanic_WP_Customize_Range_Control( $wp_customize, 'car_repair_mechanic_feature_image_border_radius', array(
     	'label'  => __('Featured Image Border Radius','car-repair-mechanic'),
     	'section'  => 'car_repair_mechanic_theme_layout',
     	'description' => __('Measurement is in pixel.','car-repair-mechanic'),
     	'input_attrs' => array(
         'min' => 0,
         'max' => 50,
     	),
 	)));

 	$wp_customize->add_setting( 'car_repair_mechanic_feature_image_shadow', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Car_Repair_Mechanic_WP_Customize_Range_Control( $wp_customize, 'car_repair_mechanic_feature_image_shadow', array(
		'label'  => __('Featured Image Shadow','car-repair-mechanic'),
		'section'  => 'car_repair_mechanic_theme_layout',
		'description' => __('Measurement is in pixel.','car-repair-mechanic'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		),
    )));

	$wp_customize->add_setting( 'car_repair_mechanic_pagination_type', array(
		'default'			=> 'page-numbers',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 'car_repair_mechanic_pagination_type', array(
		'section' => 'car_repair_mechanic_theme_layout',
		'type' => 'select',
		'label' => __( 'Blog Pagination Style', 'car-repair-mechanic' ),
		'choices' => array(
		   'page-numbers' => __('Number', 'car-repair-mechanic' ),
	   	'next-prev' => __('Next/Prev', 'car-repair-mechanic' ),
	)));

	$wp_customize->add_setting('car_repair_mechanic_blog_nav_position',array(
		'default' => 'bottom',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control('car_repair_mechanic_blog_nav_position', array(
		'type' => 'select',
		'label' => __( 'Blog Post Navigation Position', 'car-repair-mechanic' ),
		'section' => 'car_repair_mechanic_theme_layout',
		'choices' => array(
		   'top' => __('Top','car-repair-mechanic'),
		   'bottom' => __('Bottom','car-repair-mechanic'),
		   'both' => __('Both','car-repair-mechanic')
		),
 	));

	$wp_customize->add_section( 'car_repair_mechanic_single_post_settings', array(
		'title' => __( 'Single Post Options', 'car-repair-mechanic' ),
		'panel' => 'car_repair_mechanic_panel_id',
	));

	$wp_customize->add_setting('car_repair_mechanic_single_post_breadcrumb',array(
		'default' => 'true',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_single_post_breadcrumb',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Breadcrumb','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_single_post_settings'
	));

	$wp_customize->add_setting('car_repair_mechanic_single_post_date',array(
		'default' => 'true',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_single_post_date',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Date','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_single_post_settings'
	));

	$wp_customize->add_setting('car_repair_mechanic_single_post_author',array(
		'default' => 'true',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_single_post_author',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Author','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_single_post_settings'
	));

	$wp_customize->add_setting('car_repair_mechanic_single_post_comment_no',array(
		'default' => 'true',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_single_post_comment_no',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Comment Number','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_single_post_settings'
	));

	$wp_customize->add_setting('car_repair_mechanic_single_post_time',array(
       'default' => 'true',
       'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
    ));
    $wp_customize->add_control('car_repair_mechanic_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Time','car-repair-mechanic'),
       'section' => 'car_repair_mechanic_single_post_settings'
    ));

    $wp_customize->add_setting('car_repair_mechanic_single_post_image',array(
		'default' => 'true',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_single_post_image',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Featured Image','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_single_post_settings'
	));

    $wp_customize->add_setting('car_repair_mechanic_single_post_category',array(
       'default' => 'true',
       'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
    ));
    $wp_customize->add_control('car_repair_mechanic_single_post_category',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Category','car-repair-mechanic'),
       'section' => 'car_repair_mechanic_single_post_settings'
    ));

	$wp_customize->add_setting('car_repair_mechanic_metafields_tags',array(
		'default' => 'true',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_metafields_tags',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Tags','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_single_post_settings'
	));

	$wp_customize->add_setting( 'car_repair_mechanic_post_featured_image', array(
		'default' => 'in-content',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 'car_repair_mechanic_post_featured_image', array(
		'section' => 'car_repair_mechanic_single_post_settings',
		'type' => 'radio',
		'label' => __( 'Featured Image Display Type', 'car-repair-mechanic' ),
		'choices'		=> array(
		   'banner'  => __('as Banner Image', 'car-repair-mechanic'),
		   'in-content' => __( 'as Featured Image', 'car-repair-mechanic' ),
	)));

	$wp_customize->add_setting( 'car_repair_mechanic_single_post_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float',
	) );
	$wp_customize->add_control( 'car_repair_mechanic_single_post_img_border_radius', array(
		'label'       => esc_html__( 'Single Post Image Border Radius','car-repair-mechanic' ),
		'section'     => 'car_repair_mechanic_single_post_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'car_repair_mechanic_single_post_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'car_repair_mechanic_sanitize_float',
	));
	$wp_customize->add_control('car_repair_mechanic_single_post_img_box_shadow',array(
		'label' => esc_html__( 'Single Post Image Shadow','car-repair-mechanic' ),
		'section' => 'car_repair_mechanic_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

	$wp_customize->add_setting('car_repair_mechanic_single_post_nav',array(
		'default' => 'true',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_single_post_nav',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Navigation','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_single_post_settings'
	));

 	$wp_customize->add_setting( 'car_repair_mechanic_single_post_prev_nav_text', array(
		'default' => __('Previous','car-repair-mechanic' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'car_repair_mechanic_single_post_prev_nav_text', array(
		'label' => esc_html__( 'Single Post Previous Nav text','car-repair-mechanic' ),
		'section'     => 'car_repair_mechanic_single_post_settings',
		'type'        => 'text',
		'settings'    => 'car_repair_mechanic_single_post_prev_nav_text'
	) );

	$wp_customize->add_setting( 'car_repair_mechanic_single_post_next_nav_text', array(
		'default' => __('Next','car-repair-mechanic' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'car_repair_mechanic_single_post_next_nav_text', array(
		'label' => esc_html__( 'Single Post Next Nav text','car-repair-mechanic' ),
		'section'     => 'car_repair_mechanic_single_post_settings',
		'type'        => 'text',
		'settings'    => 'car_repair_mechanic_single_post_next_nav_text'
	) );

	$wp_customize->add_setting('car_repair_mechanic_single_post_comment',array(
		'default' => 'true',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_single_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post comment','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_single_post_settings'
	));

	$wp_customize->add_setting( 'car_repair_mechanic_comment_width', array(
		'default'=> '100',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Car_Repair_Mechanic_WP_Customize_Range_Control( $wp_customize, 'car_repair_mechanic_comment_width', array(
		'label'  => __('Comment textarea width','car-repair-mechanic'),
		'section'  => 'car_repair_mechanic_single_post_settings',
		'description' => __('Measurement is in %.','car-repair-mechanic'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 100,
		),
    )));

	$wp_customize->add_setting('car_repair_mechanic_comment_title',array(
		'default' => __('Leave a Reply','car-repair-mechanic' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('car_repair_mechanic_comment_title',array(
		'type' => 'text',
		'label' => __('Comment form Title','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_single_post_settings'
	));

	$wp_customize->add_setting('car_repair_mechanic_comment_submit_text',array(
		'default' => __('Post Comment','car-repair-mechanic' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('car_repair_mechanic_comment_submit_text',array(
		'type' => 'text',
		'label' => __('Comment Submit Button Label','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_single_post_settings'
	));

	$wp_customize->add_setting('car_repair_mechanic_related_posts',array(
		'default' => true,
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_related_posts',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Related Posts','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_single_post_settings'
	));

	$wp_customize->add_setting('car_repair_mechanic_related_posts_title',array(
		'default' => __('You May Also Like','car-repair-mechanic' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('car_repair_mechanic_related_posts_title',array(
		'type' => 'text',
		'label' => __('Related Posts Title','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_single_post_settings'
	));

 	$wp_customize->add_setting( 'car_repair_mechanic_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	) );
	$wp_customize->add_control( 'car_repair_mechanic_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','car-repair-mechanic' ),
		'section' => 'car_repair_mechanic_single_post_settings',
		'type' => 'number',
		'settings' => 'car_repair_mechanic_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

	$wp_customize->add_setting( 'car_repair_mechanic_post_shown_by', array(
		'default' => 'categories',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 'car_repair_mechanic_post_shown_by', array(
		'section' => 'car_repair_mechanic_single_post_settings',
		'type' => 'radio',
		'label' => __( 'Related Posts must be shown:', 'car-repair-mechanic' ),
		'choices'		=> array(
		   'categories'  => __('By Categories', 'car-repair-mechanic'),
		   'tags' => __( 'By Tags', 'car-repair-mechanic' ),
	)));

	// Button option
	$wp_customize->add_section( 'car_repair_mechanic_button_options', array(
		'title' =>  __( 'Button Options', 'car-repair-mechanic' ),
		'panel' => 'car_repair_mechanic_panel_id',
	));

 	$wp_customize->add_setting( 'car_repair_mechanic_blog_button_text', array(
		'default'   => __('Read Full','car-repair-mechanic' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'car_repair_mechanic_blog_button_text', array(
		'label'       => esc_html__( 'Blog Post Button Label','car-repair-mechanic' ),
		'section'     => 'car_repair_mechanic_button_options',
		'type'        => 'text',
		'settings'    => 'car_repair_mechanic_blog_button_text'
	) );

	$wp_customize->add_setting('car_repair_mechanic_button_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('car_repair_mechanic_button_padding',array(
		'label'	=> esc_html__('Button Padding','car-repair-mechanic'),
		'section'=> 'car_repair_mechanic_button_options',
		'active_callback' => 'car_repair_mechanic_button_enabled'
	));

	$wp_customize->add_setting('car_repair_mechanic_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_top_button_padding',array(
		'label'	=> __('Top','car-repair-mechanic'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'car_repair_mechanic_button_options',
		'type'=> 'number',
		'active_callback' => 'car_repair_mechanic_button_enabled'
	));

	$wp_customize->add_setting('car_repair_mechanic_bottom_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_bottom_button_padding',array(
		'label'	=> __('Bottom','car-repair-mechanic'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'car_repair_mechanic_button_options',
		'type'=> 'number',
		'active_callback' => 'car_repair_mechanic_button_enabled'
	));

	$wp_customize->add_setting('car_repair_mechanic_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_left_button_padding',array(
		'label'	=> __('Left','car-repair-mechanic'),
		'input_attrs' => array(
      	'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'car_repair_mechanic_button_options',
		'type'=> 'number',
		'active_callback' => 'car_repair_mechanic_button_enabled'
	));

	$wp_customize->add_setting('car_repair_mechanic_right_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_right_button_padding',array(
		'label'	=> __('Right','car-repair-mechanic'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
 	 	),
		'section'=> 'car_repair_mechanic_button_options',
		'type'=> 'number',
		'active_callback' => 'car_repair_mechanic_button_enabled'
	));

	$wp_customize->add_setting( 'car_repair_mechanic_button_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Car_Repair_Mechanic_WP_Customize_Range_Control( $wp_customize, 'car_repair_mechanic_button_border_radius', array(
      'label'  => __('Border Radius','car-repair-mechanic'),
      'section'  => 'car_repair_mechanic_button_options',
      'description' => __('Measurement is in pixel.','car-repair-mechanic'),
      'input_attrs' => array(
          'min' => 0,
          'max' => 50,
      ),
		'active_callback' => 'car_repair_mechanic_button_enabled'
 	)));

    //Sidebar setting
	$wp_customize->add_section( 'car_repair_mechanic_sidebar_options', array(
    	'title'   => __( 'Sidebar options', 'car-repair-mechanic'),
		'priority'   => null,
		'panel' => 'car_repair_mechanic_panel_id'
	) );

	$wp_customize->add_setting('car_repair_mechanic_single_page_layout',array(
		'default' => 'One Column',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
 	));
	$wp_customize->add_control('car_repair_mechanic_single_page_layout', array(
		'type' => 'select',
		'label' => __( 'Single Page Layout', 'car-repair-mechanic' ),
		'section' => 'car_repair_mechanic_sidebar_options',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','car-repair-mechanic'),
		   'Right Sidebar' => __('Right Sidebar','car-repair-mechanic'),
		   'One Column' => __('One Column','car-repair-mechanic')
		),
 	));

 	$wp_customize->add_setting('car_repair_mechanic_single_post_layout',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
 	));
	$wp_customize->add_control('car_repair_mechanic_single_post_layout', array(
		'type' => 'select',
		'label' => __( 'Single Post Layout', 'car-repair-mechanic' ),
		'section' => 'car_repair_mechanic_sidebar_options',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','car-repair-mechanic'),
		   'Right Sidebar' => __('Right Sidebar','car-repair-mechanic'),
		   'One Column' => __('One Column','car-repair-mechanic')
		),
 	));

    //Advance Options
	$wp_customize->add_section( 'car_repair_mechanic_advance_options', array(
    	'title' => __( 'Advance Options', 'car-repair-mechanic' ),
		'priority'   => null,
		'panel' => 'car_repair_mechanic_panel_id'
	) );

	$wp_customize->add_setting('car_repair_mechanic_preloader',array(
		'default' => false,
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_preloader',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Preloader','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_advance_options'
	));

 	$wp_customize->add_setting( 'car_repair_mechanic_preloader_color', array(
		'default' => '#333333',
		'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_mechanic_preloader_color', array(
  		'label' => __('Preloader Color', 'car-repair-mechanic'),
		'section' => 'car_repair_mechanic_advance_options',
		'settings' => 'car_repair_mechanic_preloader_color',
  	)));

  	$wp_customize->add_setting( 'car_repair_mechanic_preloader_bg_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_mechanic_preloader_bg_color', array(
  		'label' => __('Preloader Background Color', 'car-repair-mechanic'),
		'section' => 'car_repair_mechanic_advance_options',
		'settings' => 'car_repair_mechanic_preloader_bg_color',
  	)));

  	$wp_customize->add_setting('car_repair_mechanic_preloader_type',array(
		'default' => 'Square',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control('car_repair_mechanic_preloader_type',array(
		'type' => 'radio',
		'label' => __('Preloader Type','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_advance_options',
		'choices' => array(
		   'Square' => __('Square','car-repair-mechanic'),
		   'Circle' => __('Circle','car-repair-mechanic'),
		)
	) );

	$wp_customize->add_setting('car_repair_mechanic_theme_layout_options',array(
		'default' => 'Default Theme',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control('car_repair_mechanic_theme_layout_options',array(
		'type' => 'radio',
		'label' => __('Theme Layout','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_advance_options',
		'choices' => array(
		   'Default Theme' => __('Default Theme','car-repair-mechanic'),
		   'Container Theme' => __('Container Theme','car-repair-mechanic'),
		   'Box Container Theme' => __('Box Container Theme','car-repair-mechanic'),
		),
	) );

	$wp_customize->add_setting( 'car_repair_mechanic_single_page_breadcrumb',array(
		'default' => true,
      	'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
    ) );
    $wp_customize->add_control('car_repair_mechanic_single_page_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Page Breadcrumb','car-repair-mechanic' ),
        'section' => 'car_repair_mechanic_advance_options'
    ));

	//404 Page Option
	$wp_customize->add_section('car_repair_mechanic_404_settings',array(
		'title'	=> __('404 Page & Search Result Settings','car-repair-mechanic'),
		'priority'	=> null,
		'panel' => 'car_repair_mechanic_panel_id',
	));

	$wp_customize->add_setting('car_repair_mechanic_404_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('car_repair_mechanic_404_title',array(
		'label'	=> __('404 Title','car-repair-mechanic'),
		'section'	=> 'car_repair_mechanic_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('car_repair_mechanic_404_button_label',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('car_repair_mechanic_404_button_label',array(
		'label'	=> __('404 button Label','car-repair-mechanic'),
		'section'	=> 'car_repair_mechanic_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('car_repair_mechanic_search_result_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('car_repair_mechanic_search_result_title',array(
		'label'	=> __('No Search Result Title','car-repair-mechanic'),
		'section'	=> 'car_repair_mechanic_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('car_repair_mechanic_search_result_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('car_repair_mechanic_search_result_text',array(
		'label'	=> __('No Search Result Text','car-repair-mechanic'),
		'section'	=> 'car_repair_mechanic_404_settings',
		'type'		=> 'text'
	));	

	//Responsive Settings
	$wp_customize->add_section('car_repair_mechanic_responsive_options',array(
		'title'	=> __('Responsive Options','car-repair-mechanic'),
		'panel' => 'car_repair_mechanic_panel_id'
	));

	$wp_customize->add_setting('car_repair_mechanic_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Car_Repair_Mechanic_Icon_Selector(
     	$wp_customize,'car_repair_mechanic_menu_open_icon',array(
		'label'	=> __('Menu Open Icon','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_responsive_options',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('car_repair_mechanic_mobile_menu_label',array(
		'default' => __('Menu','car-repair-mechanic'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('car_repair_mechanic_mobile_menu_label',array(
		'type' => 'text',
		'label' => __('Mobile Menu Label','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_responsive_options'
	));

	$wp_customize->add_setting('car_repair_mechanic_menu_close_icon',array(
		'default'	=> 'fas fa-times-circle',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Car_Repair_Mechanic_Icon_Selector(
     	$wp_customize,'car_repair_mechanic_menu_close_icon',array(
		'label'	=> __('Menu Close Icon','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_responsive_options',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('car_repair_mechanic_close_menu_label',array(
		'default' => __('Close Menu','car-repair-mechanic'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('car_repair_mechanic_close_menu_label',array(
		'type' => 'text',
		'label' => __('Close Menu Label','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_responsive_options'
	));

	//toggle button bg-color
    $wp_customize->add_setting( 'car_repair_mechanic_toggle_button_bg_color_settings', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_mechanic_toggle_button_bg_color_settings', array(
  		'label' => __('Toggle Button Bg Color', 'car-repair-mechanic'),
	    'section' => 'car_repair_mechanic_responsive_options',
	    'settings' => 'car_repair_mechanic_toggle_button_bg_color_settings',
  	)));

	$wp_customize->add_setting('car_repair_mechanic_sticky_header_responsive',array(
        'default' => false,
        'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_sticky_header_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Sticky Header','car-repair-mechanic'),
      	'section' => 'car_repair_mechanic_responsive_options',
	));

	$wp_customize->add_setting('car_repair_mechanic_hide_topbar_responsive',array(
		'default' => true,
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_hide_topbar_responsive',array(
     	'type' => 'checkbox',
		'label' => __('Enable Top Header','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_responsive_options',
	));

	$wp_customize->add_setting('car_repair_mechanic_slider_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_slider_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Slider','car-repair-mechanic'),
      	'section' => 'car_repair_mechanic_responsive_options',
	));

	$wp_customize->add_setting('car_repair_mechanic_slider_button_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_slider_button_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Slider Button','car-repair-mechanic'),
      	'section' => 'car_repair_mechanic_responsive_options',
	));

	$wp_customize->add_setting('car_repair_mechanic_preloader_responsive',array(
        'default' => false,
        'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_preloader_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Preloader','car-repair-mechanic'),
      	'section' => 'car_repair_mechanic_responsive_options',
	));

	$wp_customize->add_setting('car_repair_mechanic_backtotop_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_backtotop_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Back to Top','car-repair-mechanic'),
      	'section' => 'car_repair_mechanic_responsive_options',
	));

	$wp_customize->add_setting( 'car_repair_mechanic_sidebar_hide_show',array(
      'default' => true,
      'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
    ));
    $wp_customize->add_control('car_repair_mechanic_sidebar_hide_show',array(
      'type' => 'checkbox',
      'label' => esc_html__( 'Enable Sidebar','car-repair-mechanic' ),
      'section' => 'car_repair_mechanic_responsive_options'
    ));

	//Woocommerce Options
	$wp_customize->add_section('car_repair_mechanic_woocommerce',array(
		'title'	=> __('WooCommerce Options','car-repair-mechanic'),
		'panel' => 'car_repair_mechanic_panel_id',
	));

	$wp_customize->add_setting('car_repair_mechanic_shop_page_sidebar',array(
		'default' => true,
		'sanitize_callback' => 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_shop_page_sidebar',array(
		'type' => 'checkbox',
		'label' => __('Enable Shop Page Sidebar','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_woocommerce'
	));

	// shop page sidebar alignment
    $wp_customize->add_setting('car_repair_mechanic_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_choices',
	));
	$wp_customize->add_control('car_repair_mechanic_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Layout', 'car-repair-mechanic'),
		'section'        => 'car_repair_mechanic_woocommerce',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'car-repair-mechanic'),
			'Right Sidebar' => __('Right Sidebar', 'car-repair-mechanic'),
		),
	));

	$wp_customize->add_setting('car_repair_mechanic_shop_page_navigation',array(
		'default' => true,
		'sanitize_callback' => 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_shop_page_navigation',array(
		'type' => 'checkbox',
		'label' => __('Enable Shop Page Pagination','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_woocommerce'
	));

	$wp_customize->add_setting('car_repair_mechanic_single_product_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_single_product_sidebar',array(
		'type' => 'checkbox',
		'label' => __('Enable Single Product Page Sidebar','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_woocommerce'
	));

	// Single product Page sidebar alignment
    $wp_customize->add_setting('car_repair_mechanic_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_choices',
	));
	$wp_customize->add_control('car_repair_mechanic_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Product Page Layout', 'car-repair-mechanic'),
		'section'        => 'car_repair_mechanic_woocommerce',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'car-repair-mechanic'),
			'Right Sidebar' => __('Right Sidebar', 'car-repair-mechanic'),
		),
	));

	$wp_customize->add_setting('car_repair_mechanic_single_related_products',array(
		'default' => true,
		'sanitize_callback' => 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_single_related_products',array(
		'type' => 'checkbox',
		'label' => __('Enable Related Products','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_woocommerce'
	));

 	$wp_customize->add_setting('car_repair_mechanic_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_products_per_page',array(
		'label'	=> __('Products Per Page','car-repair-mechanic'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'car_repair_mechanic_woocommerce',
		'type'=> 'number',
	));

	$wp_customize->add_setting('car_repair_mechanic_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control('car_repair_mechanic_products_per_row',array(
		'label'	=> __('Products Per Row','car-repair-mechanic'),
		'choices' => array(
         '2' => '2',
			'3' => '3',
			'4' => '4',
     	),
		'section'=> 'car_repair_mechanic_woocommerce',
		'type'=> 'select',
	));

	$wp_customize->add_setting('car_repair_mechanic_product_border',array(
		'default' => true,
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_product_border',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide product border','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_woocommerce',
	));

 	$wp_customize->add_setting('car_repair_mechanic_product_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('car_repair_mechanic_product_padding',array(
		'label'	=> esc_html__('Product Padding','car-repair-mechanic'),
		'section'=> 'car_repair_mechanic_woocommerce',
	));

	$wp_customize->add_setting( 'car_repair_mechanic_product_top_padding',array(
		'default' => 10,
		'sanitize_callback' => 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_product_top_padding', array(
		'label' => esc_html__( 'Top','car-repair-mechanic' ),
		'type' => 'number',
		'section' => 'car_repair_mechanic_woocommerce',
		'input_attrs' => array(
			'min' => -1,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('car_repair_mechanic_product_bottom_padding',array(
		'default' => 10,
		'sanitize_callback' => 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_product_bottom_padding', array(
		'label' => esc_html__( 'Bottom','car-repair-mechanic' ),
		'type' => 'number',
		'section' => 'car_repair_mechanic_woocommerce',
		'input_attrs' => array(
			'min' => -1,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('car_repair_mechanic_product_left_padding',array(
		'default' => 10,
		'sanitize_callback' => 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_product_left_padding', array(
		'label' => esc_html__( 'Left','car-repair-mechanic' ),
		'type' => 'number',
		'section' => 'car_repair_mechanic_woocommerce',
		'input_attrs' => array(
			'min' => -1,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'car_repair_mechanic_product_right_padding',array(
		'default' => 10,
		'sanitize_callback' => 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_product_right_padding', array(
		'label' => esc_html__( 'Right','car-repair-mechanic' ),
		'type' => 'number',
		'section' => 'car_repair_mechanic_woocommerce',
		'input_attrs' => array(
			'min' => -1,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'car_repair_mechanic_product_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Car_Repair_Mechanic_WP_Customize_Range_Control( $wp_customize, 'car_repair_mechanic_product_border_radius', array(
		'label'  => __('Product Border Radius','car-repair-mechanic'),
		'section'  => 'car_repair_mechanic_woocommerce',
		'description' => __('Measurement is in pixel.','car-repair-mechanic'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
    )));

	$wp_customize->add_setting('car_repair_mechanic_product_button_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('car_repair_mechanic_product_button_padding',array(
		'label'	=> esc_html__('Product Button Padding','car-repair-mechanic'),
		'section'=> 'car_repair_mechanic_woocommerce',
	));

	$wp_customize->add_setting( 'car_repair_mechanic_product_button_top_padding',array(
		'default' => 10,
		'sanitize_callback' => 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_product_button_top_padding', array(
		'label' => esc_html__( 'Top','car-repair-mechanic' ),
		'type' => 'number',
		'section' => 'car_repair_mechanic_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('car_repair_mechanic_product_button_bottom_padding',array(
		'default' => 10,
		'sanitize_callback' => 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_product_button_bottom_padding', array(
		'label' => esc_html__( 'Bottom','car-repair-mechanic' ),
		'type' => 'number',
		'section' => 'car_repair_mechanic_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('car_repair_mechanic_product_button_left_padding',array(
		'default' => 12,
		'sanitize_callback' => 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_product_button_left_padding', array(
		'label' => esc_html__( 'Left','car-repair-mechanic' ),
		'type' => 'number',
		'section' => 'car_repair_mechanic_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'car_repair_mechanic_product_button_right_padding',array(
		'default' => 12,
		'sanitize_callback' => 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_product_button_right_padding', array(
		'label' => esc_html__( 'Right','car-repair-mechanic' ),
		'type' => 'number',
		'section' => 'car_repair_mechanic_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'car_repair_mechanic_product_button_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Car_Repair_Mechanic_WP_Customize_Range_Control( $wp_customize, 'car_repair_mechanic_product_button_border_radius', array(
		'label'  => __('Product Button Border Radius','car-repair-mechanic'),
		'section'  => 'car_repair_mechanic_woocommerce',
		'description' => __('Measurement is in pixel.','car-repair-mechanic'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
 	)));

 	$wp_customize->add_setting('car_repair_mechanic_product_sale_position',array(
     'default' => 'Right',
     'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control('car_repair_mechanic_product_sale_position',array(
		'type' => 'radio',
		'label' => __('Product Sale Position','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_woocommerce',
		'choices' => array(
		   'Left' => __('Left','car-repair-mechanic'),
		   'Right' => __('Right','car-repair-mechanic'),
		),
	) );

	$wp_customize->add_setting( 'car_repair_mechanic_product_sale_font_size',array(
		'default' => '13',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Car_Repair_Mechanic_WP_Customize_Range_Control( $wp_customize, 'car_repair_mechanic_product_sale_font_size', array(
		'label'  => __('Product Sale Font Size','car-repair-mechanic'),
		'section'  => 'car_repair_mechanic_woocommerce',
		'description' => __('Measurement is in pixel.','car-repair-mechanic'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
 	)));

 	$wp_customize->add_setting('car_repair_mechanic_product_sale_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('car_repair_mechanic_product_sale_padding',array(
		'label'	=> esc_html__('Product Sale Padding','car-repair-mechanic'),
		'section'=> 'car_repair_mechanic_woocommerce',
	));

	$wp_customize->add_setting( 'car_repair_mechanic_product_sale_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_product_sale_top_padding', array(
		'label' => esc_html__( 'Top','car-repair-mechanic' ),
		'type' => 'number',
		'section' => 'car_repair_mechanic_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('car_repair_mechanic_product_sale_bottom_padding',array(
		'default' => 0,
		'sanitize_callback' => 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_product_sale_bottom_padding', array(
		'label' => esc_html__( 'Bottom','car-repair-mechanic' ),
		'type' => 'number',
		'section' => 'car_repair_mechanic_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('car_repair_mechanic_product_sale_left_padding',array(
		'default' => 0,
		'sanitize_callback' => 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_product_sale_left_padding', array(
		'label' => esc_html__( 'Left','car-repair-mechanic' ),
		'type' => 'number',
		'section' => 'car_repair_mechanic_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('car_repair_mechanic_product_sale_right_padding',array(
		'default' => 0,
		'sanitize_callback' => 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_product_sale_right_padding', array(
		'label' => esc_html__( 'Right','car-repair-mechanic' ),
		'type' => 'number',
		'section' => 'car_repair_mechanic_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'car_repair_mechanic_product_sale_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Car_Repair_Mechanic_WP_Customize_Range_Control( $wp_customize, 'car_repair_mechanic_product_sale_border_radius', array(
		'label'  => __('Product Sale Border Radius','car-repair-mechanic'),
		'section'  => 'car_repair_mechanic_woocommerce',
		'description' => __('Measurement is in pixel.','car-repair-mechanic'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
    )));

	//footer text
	$wp_customize->add_section('car_repair_mechanic_footer_section',array(
		'title'	=> __('Footer Section','car-repair-mechanic'),
		'panel' => 'car_repair_mechanic_panel_id'
	));

	$wp_customize->add_setting('car_repair_mechanic_hide_scroll',array(
		'default' => 'true',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('car_repair_mechanic_hide_scroll',array(
     	'type' => 'checkbox',
   	'label' => __('Show / Hide Back To Top','car-repair-mechanic'),
   	'section' => 'car_repair_mechanic_footer_section',
	));

	$wp_customize->add_setting('car_repair_mechanic_back_to_top',array(
		'default' => 'Right',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control('car_repair_mechanic_back_to_top',array(
		'type' => 'radio',
		'label' => __('Back to Top Alignment','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_footer_section',
		'choices' => array(
		   'Left' => __('Left','car-repair-mechanic'),
		   'Right' => __('Right','car-repair-mechanic'),
		   'Center' => __('Center','car-repair-mechanic'),
		),
	) );

	$wp_customize->add_setting('car_repair_mechanic_footer_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'car_repair_mechanic_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'car-repair-mechanic'),
		'section'  => 'car_repair_mechanic_footer_section',
	)));

	$wp_customize->add_setting('car_repair_mechanic_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'car_repair_mechanic_footer_bg_image',array(
		'label' => __('Footer Background Image','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_footer_section'
	)));

	$wp_customize->add_setting('car_repair_mechanic_footer_widget',array(
		'default'           => '4',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_choices',
	));
	$wp_customize->add_control('car_repair_mechanic_footer_widget',array(
		'type'        => 'radio',
		'label'       => __('No. of Footer columns', 'car-repair-mechanic'),
		'section'     => 'car_repair_mechanic_footer_section',
		'description' => __('Select the number of footer columns and add your widgets in the footer.', 'car-repair-mechanic'),
		'choices' => array(
		   '1'   => __('One column', 'car-repair-mechanic'),
		   '2'  => __('Two columns', 'car-repair-mechanic'),
		   '3' => __('Three columns', 'car-repair-mechanic'),
		   '4' => __('Four columns', 'car-repair-mechanic')
		),
	)); 

	$wp_customize->add_setting('car_repair_mechanic_copyright_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'car_repair_mechanic_copyright_bg_color', array(
		'label'    => __('Copyright Background Color', 'car-repair-mechanic'),
		'section'  => 'car_repair_mechanic_footer_section',
	)));

 	$wp_customize->add_setting('car_repair_mechanic_copyright_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('car_repair_mechanic_copyright_padding',array(
		'label'	=> esc_html__('Copyright Padding','car-repair-mechanic'),
		'section'=> 'car_repair_mechanic_footer_section',
	));

    $wp_customize->add_setting('car_repair_mechanic_top_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_top_copyright_padding',array(
		'description'	=> __('Top','car-repair-mechanic'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
     	),
		'section'=> 'car_repair_mechanic_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('car_repair_mechanic_bottom_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'car_repair_mechanic_sanitize_float'
	));
	$wp_customize->add_control('car_repair_mechanic_bottom_copyright_padding',array(
		'description'	=> __('Bottom','car-repair-mechanic'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
     	),
		'section'=> 'car_repair_mechanic_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('car_repair_mechanic_copyright_alignment',array(
		'default' => 'center',
		'sanitize_callback' => 'car_repair_mechanic_sanitize_choices'
	));
	$wp_customize->add_control('car_repair_mechanic_copyright_alignment',array(
		'type' => 'radio',
		'label' => __('Copyright Alignment','car-repair-mechanic'),
		'section' => 'car_repair_mechanic_footer_section',
		'choices' => array(
		   'left' => __('Left','car-repair-mechanic'),
		   'right' => __('Right','car-repair-mechanic'),
		   'center' => __('Center','car-repair-mechanic'),
		),
	) );

	$wp_customize->add_setting( 'car_repair_mechanic_copyright_font_size', array(
		'default'=> '15',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Car_Repair_Mechanic_WP_Customize_Range_Control( $wp_customize, 'car_repair_mechanic_copyright_font_size', array(
		'label'  => __('Copyright Font Size','car-repair-mechanic'),
		'section'  => 'car_repair_mechanic_footer_section',
		'description' => __('Measurement is in pixel.','car-repair-mechanic'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
 	)));
	
	$wp_customize->add_setting('car_repair_mechanic_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('car_repair_mechanic_text',array(
		'label'	=> __('Copyright Text','car-repair-mechanic'),
		'description'	=> __('Add some text for footer like copyright etc.','car-repair-mechanic'),
		'section'	=> 'car_repair_mechanic_footer_section',
		'type'		=> 'text'
	));	
}
add_action( 'customize_register', 'car_repair_mechanic_customize_register' );	

load_template( ABSPATH . 'wp-includes/class-wp-customize-control.php' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

class Car_Repair_Mechanic_Image_Radio_Control extends WP_Customize_Control {

    public function render_content() {
 
        if (empty($this->choices))
            return;
 
        $name = '_customize-radio-' . $this->id;
        ?>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <ul class="controls" id='car-repair-mechanic-img-container'>
            <?php
            foreach ($this->choices as $value => $label) :
                $class = ($this->value() == $value) ? 'car-repair-mechanic-radio-img-selected car-repair-mechanic-radio-img-img' : 'car-repair-mechanic-radio-img-img';
                ?>
                <li style="display: inline;">
                    <label>
                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
                          	$this->link();
                          	checked($this->value(), $value);
                          	?> />
                        <img role="img" src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
                    </label>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
        <?php
    } 
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Car_Repair_Mechanic_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Car_Repair_Mechanic_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Car_Repair_Mechanic_Customize_Section_Pro(
			$manager,
			'car_repair_mechanic_pro_link',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Car Mechanic Pro', 'car-repair-mechanic' ),
					'pro_text' => esc_html__( 'Go Pro', 'car-repair-mechanic' ),
					'pro_url'  => esc_url('https://www.themesglance.com/themes/car-repair-wordpress-theme/')
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'car-repair-mechanic-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'car-repair-mechanic-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Car_Repair_Mechanic_Customize::get_instance();