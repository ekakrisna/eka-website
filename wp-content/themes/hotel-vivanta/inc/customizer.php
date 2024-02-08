<?php
/**
 * Hotel Vivanta Theme Customizer
 *
 * @package Hotel_Vivanta
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hotel_vivanta_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$hotel_vivanta_options = hotel_vivanta_theme_options();

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'hotel_vivanta_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'hotel_vivanta_customize_partial_blogdescription',
			)
		);
	}


    $wp_customize->add_panel(
        'theme_options',
        array(
            'title' => esc_html__('Theme Options', 'hotel-vivanta'),
            'priority' => 2,
        )
    );


    /* Banner Section */

    $wp_customize->add_section(
        'banner_section',
        array(
            'title' => esc_html__( 'Banner Section','hotel-vivanta' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );




	$wp_customize->add_setting('hotel_vivanta_theme_options[banner_title]',
	    array(
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control('banner_title',
	    array(
	        'label' => esc_html__('Title', 'hotel-vivanta'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'hotel_vivanta_theme_options[banner_title]',
	    )
	);




	$wp_customize->add_setting('hotel_vivanta_theme_options[banner_button_txt]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_vivanta_options['banner_button_txt'],
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control('hotel_vivanta_theme_options[banner_button_txt]',
	    array(
	        'label' => esc_html__('Button Text', 'hotel-vivanta'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'hotel_vivanta_theme_options[banner_button_txt]',
	    )
	);
	$wp_customize->add_setting('hotel_vivanta_theme_options[banner_button_url]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_vivanta_options['banner_button_url'],
	        'sanitize_callback' => 'hotel_vivanta_sanitize_url',
	    )
	);
	$wp_customize->add_control('hotel_vivanta_theme_options[banner_button_url]',
	    array(
	        'label' => esc_html__('Button Link', 'hotel-vivanta'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'hotel_vivanta_theme_options[banner_button_url]',
	    )
	);


	$wp_customize->add_setting('hotel_vivanta_theme_options[banner_bg_image]',
	    array(
	        'type' => 'option',
	        'sanitize_callback' => 'esc_url_raw',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'hotel_vivanta_theme_options[banner_bg_image]',
	        array(
	            'label' => esc_html__('Add Background Image', 'hotel-vivanta'),
	            'section' => 'banner_section',
	            'settings' => 'hotel_vivanta_theme_options[banner_bg_image]',
	        ))
	);

	$wp_customize->add_setting('hotel_vivanta_theme_options[facebook]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_vivanta_options['facebook'],
	        'sanitize_callback' => 'hotel_vivanta_sanitize_url',
	    )
	);
	$wp_customize->add_control('hotel_vivanta_theme_options[facebook]',
	    array(
	        'label' => esc_html__('Facebook Link', 'hotel-vivanta'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'hotel_vivanta_theme_options[facebook]',
	    )
	);


	$wp_customize->add_setting('hotel_vivanta_theme_options[twitter]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_vivanta_options['twitter'],
	        'sanitize_callback' => 'hotel_vivanta_sanitize_url',
	    )
	);
	$wp_customize->add_control('hotel_vivanta_theme_options[twitter]',
	    array(
	        'label' => esc_html__('Twitter Link', 'hotel-vivanta'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'hotel_vivanta_theme_options[twitter]',
	    )
	);


	$wp_customize->add_setting('hotel_vivanta_theme_options[instagram]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_vivanta_options['instagram'],
	        'sanitize_callback' => 'hotel_vivanta_sanitize_url',
	    )
	);
	$wp_customize->add_control('hotel_vivanta_theme_options[instagram]',
	    array(
	        'label' => esc_html__('Instagram Link', 'hotel-vivanta'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'hotel_vivanta_theme_options[instagram]',
	    )
	);

	$wp_customize->add_setting(
	    'hotel_vivanta_theme_options[header_phone]',
	    array(
	        'default' => $hotel_vivanta_options['header_phone'],
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field',
	        'capability' => 'edit_theme_options'
	    )
	);
	$wp_customize->add_control('hotel_vivanta_theme_options[header_phone]', array(
	    'label' => esc_html__('Phone Number', 'hotel-vivanta'),
	    'type' => 'text',
	    'section' => 'banner_section',
	    'settings' => 'hotel_vivanta_theme_options[header_phone]'
	));


	/* About Section*/


    $wp_customize->add_section(
        'about_section',
        array(
            'title' => esc_html__( 'About Options ','hotel-vivanta' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

     function hotel_vivanta_sanitize_checkbox( $input ) {
        if ( true === $input ) {
            return 1;
         } else {
            return 0;
         }
    }
    $wp_customize->add_setting('hotel_vivanta_theme_options[about_show]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $hotel_vivanta_options['about_show'],
            'sanitize_callback' => 'hotel_vivanta_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('hotel_vivanta_theme_options[about_show]',
        array(
            'label' => esc_html__('Show About Section', 'hotel-vivanta'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'about_section',

        )
    );
	$wp_customize->add_setting(
	    'hotel_vivanta_theme_options[choose_about_page]',
	    array(
	        'default' => $hotel_vivanta_options['choose_about_page'],
	        'type' => 'option',
	        'sanitize_callback' => 'absint',
	        'capability' => 'edit_theme_options'
	    )
	);
	$wp_customize->add_control('choose_about_page', array(
	    'label' => esc_html__('Choose About Page :', 'hotel-vivanta'),
	    'type' => 'dropdown-pages',
	    'section' => 'about_section',
	    'settings' => 'hotel_vivanta_theme_options[choose_about_page]'
	));

	$wp_customize->add_setting('hotel_vivanta_theme_options[about_title]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_vivanta_options['about_title'],
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control('hotel_vivanta_theme_options[about_title]',
	    array(
	        'label' => esc_html__('Title', 'hotel-vivanta'),
	        'type' => 'text',
	        'section' => 'about_section',
	        'settings' => 'hotel_vivanta_theme_options[about_title]',
	    )
	);

	$wp_customize->add_setting('hotel_vivanta_theme_options[about_additional_image]',
	    array(
	        'type' => 'option',
	        'sanitize_callback' => 'esc_url_raw',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'hotel_vivanta_theme_options[about_additional_image]',
	        array(
	            'label' => esc_html__('Add Additional Image', 'hotel-vivanta'),
	            'section' => 'about_section',
	            'settings' => 'hotel_vivanta_theme_options[about_additional_image]',
	        ))
	);






	/* Explore Section*/


    $wp_customize->add_section(
        'explore_section',
        array(
            'title' => esc_html__( 'Explore Options ','hotel-vivanta' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

    $wp_customize->add_setting('hotel_vivanta_theme_options[explore_show]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $hotel_vivanta_options['explore_show'],
            'sanitize_callback' => 'hotel_vivanta_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('hotel_vivanta_theme_options[explore_show]',
        array(
            'label' => esc_html__('Show Explore Section', 'hotel-vivanta'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'explore_section',

        )
    );

	$wp_customize->add_setting('hotel_vivanta_theme_options[explore_title]',
	    array(
	        'default' => $hotel_vivanta_options['explore_title'],
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field'
	    )
	);

	$wp_customize->add_control('hotel_vivanta_theme_options[explore_title]',
	    array(
	        'label' => esc_html__('Explore Section Title', 'hotel-vivanta'),
	        'type' => 'text',
	        'section' => 'explore_section',
	        'settings' => 'hotel_vivanta_theme_options[explore_title]',
	    )
	);
	$wp_customize->add_setting('hotel_vivanta_theme_options[explore_desc]',
	    array(
	        'default' => $hotel_vivanta_options['explore_desc'],
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field'
	    )
	);

	$wp_customize->add_control('hotel_vivanta_theme_options[explore_desc]',
	    array(
	        'label' => esc_html__('Explore Section Description', 'hotel-vivanta'),
	        'type' => 'text',
	        'section' => 'explore_section',
	        'settings' => 'hotel_vivanta_theme_options[explore_desc]',
	    )
	);
	$wp_customize->add_setting('hotel_vivanta_theme_options[explore_category]', array(
	    'default' => $hotel_vivanta_options['explore_category'],
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability' => 'edit_theme_options',

	));

	$wp_customize->add_control(new hotel_vivanta_explore_Dropdown_Customize_Control(
	    $wp_customize, 'hotel_vivanta_theme_options[explore_category]',
	    array(
	        'label' => esc_html__('Select Explore Posts Category', 'hotel-vivanta'),
	        'section' => 'explore_section',
	        'settings' => 'hotel_vivanta_theme_options[explore_category]',
	    )
	));





    /* CTA Section */

    $wp_customize->add_section(
        'cta_section',
        array(
            'title' => esc_html__( 'Call to Action Section','hotel-vivanta' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );


    $wp_customize->add_setting('hotel_vivanta_theme_options[cta_show]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $hotel_vivanta_options['cta_show'],
            'sanitize_callback' => 'hotel_vivanta_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('hotel_vivanta_theme_options[cta_show]',
        array(
            'label' => esc_html__('Show CTA Section', 'hotel-vivanta'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'cta_section',

        )
    );
	$wp_customize->add_setting('hotel_vivanta_theme_options[cta_title]',
	    array(
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control('cta_title',
	    array(
	        'label' => esc_html__('Title', 'hotel-vivanta'),
	        'type' => 'text',
	        'section' => 'cta_section',
	        'settings' => 'hotel_vivanta_theme_options[cta_title]',
	    )
	);


	$wp_customize->add_setting('hotel_vivanta_theme_options[cta_button_txt]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_vivanta_options['cta_button_txt'],
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control('hotel_vivanta_theme_options[cta_button_txt]',
	    array(
	        'label' => esc_html__('CTA Button Text', 'hotel-vivanta'),
	        'type' => 'text',
	        'section' => 'cta_section',
	        'settings' => 'hotel_vivanta_theme_options[cta_button_txt]',
	    )
	);
	$wp_customize->add_setting('hotel_vivanta_theme_options[cta_button_url]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_vivanta_options['cta_button_url'],
	        'sanitize_callback' => 'hotel_vivanta_sanitize_url',
	    )
	);
	$wp_customize->add_control('hotel_vivanta_theme_options[cta_button_url]',
	    array(
	        'label' => esc_html__('CTA Button Link', 'hotel-vivanta'),
	        'type' => 'text',
	        'section' => 'cta_section',
	        'settings' => 'hotel_vivanta_theme_options[cta_button_url]',
	    )
	);


	$wp_customize->add_setting('hotel_vivanta_theme_options[cta_bg_image]',
	    array(
	        'type' => 'option',
	        'sanitize_callback' => 'esc_url_raw',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'hotel_vivanta_theme_options[cta_bg_image]',
	        array(
	            'label' => esc_html__('Add Background Image', 'hotel-vivanta'),
	            'section' => 'cta_section',
	            'settings' => 'hotel_vivanta_theme_options[cta_bg_image]',
	        ))
	);




    /* Room Section */

    $wp_customize->add_section(
        'room_section',
        array(
            'title' => esc_html__( 'Room Section','hotel-vivanta' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );


    $wp_customize->add_setting('hotel_vivanta_theme_options[room_show]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $hotel_vivanta_options['room_show'],
            'sanitize_callback' => 'hotel_vivanta_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('hotel_vivanta_theme_options[room_show]',
        array(
            'label' => esc_html__('Show Room Section', 'hotel-vivanta'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'room_section',

        )
    );

	$wp_customize->add_setting('hotel_vivanta_theme_options[room_title]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $hotel_vivanta_options['room_title'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('hotel_vivanta_theme_options[room_title]',
	    array(
	        'label' => esc_html__('Section Title', 'hotel-vivanta'),
	        'priority' => 1,
	        'section' => 'room_section',
	        'type' => 'text',
	    )
	);

	$wp_customize->add_setting('hotel_vivanta_theme_options[room_desc]',
	    array(
	        'default' => $hotel_vivanta_options['room_desc'],
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field'
	    )
	);

	$wp_customize->add_control('hotel_vivanta_theme_options[room_desc]',
	    array(
	        'label' => esc_html__('Room Section Description', 'hotel-vivanta'),
	        'type' => 'text',
	        'section' => 'room_section',
	        'settings' => 'hotel_vivanta_theme_options[room_desc]',
	    )
	);

	$wp_customize->add_setting('hotel_vivanta_theme_options[room_category]', array(
	    'default' => $hotel_vivanta_options['room_category'],
	    'type' => 'option',
	    'sanitize_callback' => 'hotel_vivanta_sanitize_select',
	    'capability' => 'edit_theme_options',

	));

	$wp_customize->add_control(new hotel_vivanta_room_Dropdown_Customize_Control(
	    $wp_customize, 'hotel_vivanta_theme_options[room_category]',
	    array(
	        'label' => esc_html__('Select Room Category', 'hotel-vivanta'),
	        'section' => 'room_section',
	        'choices' => hotel_vivanta_get_categories_select(),
	        'settings' => 'hotel_vivanta_theme_options[room_category]',
	    )
	));



    /* Blog Section */

    $wp_customize->add_section(
        'blog_section',
        array(
            'title' => esc_html__( 'Blog Section','hotel-vivanta' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

    $wp_customize->add_setting('hotel_vivanta_theme_options[blog_show]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $hotel_vivanta_options['blog_show'],
            'sanitize_callback' => 'hotel_vivanta_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('hotel_vivanta_theme_options[blog_show]',
        array(
            'label' => esc_html__('Show Blog Section', 'hotel-vivanta'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'blog_section',

        )
    );
	$wp_customize->add_setting('hotel_vivanta_theme_options[blog_title]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $hotel_vivanta_options['blog_title'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('hotel_vivanta_theme_options[blog_title]',
	    array(
	        'label' => esc_html__('Section Title', 'hotel-vivanta'),
	        'priority' => 1,
	        'section' => 'blog_section',
	        'type' => 'text',
	    )
	);

	$wp_customize->add_setting('hotel_vivanta_theme_options[blog_desc]',
	    array(
	        'default' => $hotel_vivanta_options['blog_desc'],
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field'
	    )
	);

	$wp_customize->add_control('hotel_vivanta_theme_options[blog_desc]',
	    array(
	        'label' => esc_html__('Blog Section Description', 'hotel-vivanta'),
	        'type' => 'text',
	        'section' => 'blog_section',
	        'settings' => 'hotel_vivanta_theme_options[blog_desc]',
	    )
	);

	$wp_customize->add_setting('hotel_vivanta_theme_options[blog_category]', array(
	    'default' => $hotel_vivanta_options['blog_category'],
	    'type' => 'option',
	    'sanitize_callback' => 'hotel_vivanta_sanitize_select',
	    'capability' => 'edit_theme_options',

	));

	$wp_customize->add_control(new hotel_vivanta_Dropdown_Customize_Control(
	    $wp_customize, 'hotel_vivanta_theme_options[blog_category]',
	    array(
	        'label' => esc_html__('Select Blog Category', 'hotel-vivanta'),
	        'section' => 'blog_section',
	        'choices' => hotel_vivanta_get_categories_select(),
	        'settings' => 'hotel_vivanta_theme_options[blog_category]',
	    )
	));



    /* Blog Section */

    $wp_customize->add_section(
        'prefooter_section',
        array(
            'title' => esc_html__( 'Prefooter Section','hotel-vivanta' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

    $wp_customize->add_setting('hotel_vivanta_theme_options[show_prefooter]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $hotel_vivanta_options['show_prefooter'],
            'sanitize_callback' => 'hotel_vivanta_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('hotel_vivanta_theme_options[show_prefooter]',
        array(
            'label' => esc_html__('Show Prefooter Section', 'hotel-vivanta'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'prefooter_section',

        )
    );
}
add_action( 'customize_register', 'hotel_vivanta_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function hotel_vivanta_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function hotel_vivanta_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hotel_vivanta_customize_preview_js() {
	wp_enqueue_script( 'hotel-vivanta-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hotel_vivanta_customize_preview_js' );
