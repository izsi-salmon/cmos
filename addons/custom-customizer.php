<?php

function custom_theme_customizer( $wp_customize ){
    
    $wp_customize->add_panel( 'custom_homepage_content', array(
      'title' => __( 'Home Page Content' ),
      'description' => $description, // Include html tags such as <p>.
      'priority' => 160
    ) );
    
    $wp_customize->add_section('homepage_text', array(
        'title' => __('Home Page Text', 'cmosTheme'),
        'panel' => 'custom_homepage_content'
    ));
    
    $wp_customize->add_section('homepage_links', array(
        'title' => __('Services menu', 'cmosTheme'),
        'panel' => 'custom_homepage_content'
    ));
    
    // SITE BLURB TITLE
    
    $wp_customize->add_setting('site_blurb_title_setting', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'site_blurb_title_control',
            array(
                'label' => __('Site Blurb Title', 'cmosTheme'),
                'section' => 'homepage_text',
                'settings' => 'site_blurb_title_setting',
                'type' => 'text'
            )
        )
    );
    
    // SITE BLURB
    
    $wp_customize->add_setting('site_blurb_setting', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_area'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'site_blurb_control',
            array(
                'label' => __('Site Blurb', 'cmosTheme'),
                'section' => 'homepage_text',
                'settings' => 'site_blurb_setting',
                'type' => 'textarea'
            )
        )
    );
    
    // ----- SERVICE MENU -----
    
    // SERVICE 1 TITLE
    
    $wp_customize->add_setting('service_1_title_setting', array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_title1'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'service_1_title_control',
            array(
                'label' => __('Service title', 'cmosTheme'),
                'section' => 'homepage_links',
                'settings' => 'service_1_title_setting',
                'type' => 'text'
            )
        )
    );
    
    // SERVICE 1 LINK
    $wp_customize->add_setting('service_1_link_setting', array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_link1'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'service_1_link_control',
            array(
                'label' => __('Service link', 'cmosTheme'),
                'description' => 'Add the URL to one of your service pages.<br>This can be found in pages > edit page > document > permalink.',
                'section' => 'homepage_links',
                'settings' => 'service_1_link_setting',
                'type' => 'text'
            )
        )
    );
    
    // SERVICE 1 ICON
    $wp_customize->add_setting('service_1_icon_setting', array(
            'default' => '',
            'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'service_1_icon_control',
            array(
                'label' => __('Service icon', 'cmosTheme'),
                'description' => 'Add an icon to this service with <a href="https://fontawesome.com/icons" target="_blank"> Font Awesome </a> by copying an icon\'s HTML.',
                'section' => 'homepage_links',
                'settings' => 'service_1_icon_setting',
                'type' => 'text'
            )
        )
    );
    
    // SERVICE 2 TITLE
    
    $wp_customize->add_setting('service_2_title_setting', array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_title2'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'service_2_title_control',
            array(
                'label' => __('Service title', 'cmosTheme'),
                'section' => 'homepage_links',
                'settings' => 'service_2_title_setting',
                'type' => 'text'
            )
        )
    );
    
    // SERVICE 2 LINK
    $wp_customize->add_setting('service_2_link_setting', array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_link2'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'service_2_link_control',
            array(
                'label' => __('Service link', 'cmosTheme'),
                'description' => 'Add the URL to one of your service pages.<br>This can be found in pages > edit page > document > permalink.',
                'section' => 'homepage_links',
                'settings' => 'service_2_link_setting',
                'type' => 'text'
            )
        )
    );
    
    // SERVICE 2 ICON
    $wp_customize->add_setting('service_2_icon_setting', array(
            'default' => '',
            'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'service_2_icon_control',
            array(
                'label' => __('Service icon', 'cmosTheme'),
                'description' => 'Add an icon to this service with <a href="https://fontawesome.com/icons" target="_blank"> Font Awesome </a> by copying an icon\'s HTML.',
                'section' => 'homepage_links',
                'settings' => 'service_2_icon_setting',
                'type' => 'text'
            )
        )
    );
    
    // SANITIZE TEXT
    
    // Homepage text
	function sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}
    
    function sanitize_text_area( $textarea ) {
	    return esc_textarea( $textarea );
	}
    
    // Service menu    
    // 1
    function sanitize_title1( $title1 ) {
	    return sanitize_text_field( $title1 );
	}
    
    function sanitize_link1( $link1 ) {
	    return sanitize_text_field( $link1 );
	}
    
//    function sanitize_icon1( $icon1 ) {
//	    return sanitize_text_field( $icon1 );
//	}
    
    // 2
    function sanitize_title2( $title2 ) {
	    return sanitize_text_field( $title2 );
	}
    
    function sanitize_link2( $link2 ) {
	    return sanitize_text_field( $link2 );
	}
    
//    function sanitize_icon2( $icon2 ) {
//	    return sanitize_text_field( $icon2 );
//	}
    
}

add_action('customize_register', 'custom_theme_customizer');