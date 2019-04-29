<?php

function custom_theme_customizer( $wp_customize ){
    
    $wp_customize->add_panel( 'custom_homepage_content', array(
      'title' => __( 'Home Page Content' ),
      'description' => $description,
      'priority' => 150
    ) );
    
    $wp_customize->add_panel( 'adtnl_ctas', array(
      'title' => __( 'Additioinal CTA\'s' ),
      'description' => $description,
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
    
    $wp_customize->add_section('about_cta', array(
        'title' => __('About CTA', 'cmosTheme'),
        'panel' => 'adtnl_ctas'
    ));
    
    $wp_customize->add_section('career_cta', array(
        'title' => __('Career CTA', 'cmosTheme'),
        'panel' => 'adtnl_ctas'
    ));
    
    $wp_customize->add_section('contact_cta', array(
        'title' => __('Contact CTA', 'cmosTheme'),
        'panel' => 'adtnl_ctas'
    ));
    
    $wp_customize->add_section('footer_content', array(
        'title' => __('Footer Content', 'cmosTheme')
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
    
    // ----- CTA'S -----
    
    // ABOUT CTA
    
    // About CTA Text
    $wp_customize->add_setting('about_cta_text_setting', array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_aboutCTAText'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'about_cta_text_control',
            array(
                'label' => __('CTA text', 'cmosTheme'),
                'section' => 'about_cta',
                'settings' => 'about_cta_text_setting',
                'type' => 'text'
            )
        )
    );
    
    // About CTA Link
    $wp_customize->add_setting('about_cta_link_setting', array(
            'default' => '',
            'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'about_cta_link_control',
            array(
                'label' => __('CTA Link', 'cmosTheme'),
                'description' => 'Add the full url to a page, eg: '.get_site_url().'/contact',
                'section' => 'about_cta',
                'settings' => 'about_cta_link_setting',
                'type' => 'text'
            )
        )
    );
    
    // About CTA Tagline
    $wp_customize->add_setting('about_cta_tagline_setting', array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_aboutCTATagline'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'about_cta_tagline_control',
            array(
                'label' => __('CTA Tagline', 'cmosTheme'),
                'description' => 'Add a tagline to this CTA.',
                'section' => 'about_cta',
                'settings' => 'about_cta_tagline_setting',
                'type' => 'textarea'
            )
        )
    );
    
    // CAREERS CTA
    
    // Career CTA Text
    $wp_customize->add_setting('career_cta_text_setting', array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_careerCTAText'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'career_cta_text_control',
            array(
                'label' => __('CTA text', 'cmosTheme'),
                'section' => 'career_cta',
                'settings' => 'career_cta_text_setting',
                'type' => 'text'
            )
        )
    );
    
    // Career CTA Link
    $wp_customize->add_setting('career_cta_link_setting', array(
            'default' => '',
            'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'career_cta_link_control',
            array(
                'label' => __('CTA Link', 'cmosTheme'),
                'description' => 'Add the full url to a page, eg: '.get_site_url().'/contact',
                'section' => 'career_cta',
                'settings' => 'career_cta_link_setting',
                'type' => 'text'
            )
        )
    );
    
    // CONTACT CTA
    
    // Contact CTA Text
    $wp_customize->add_setting('contact_cta_text_setting', array(
            'default' => '',
            'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'contact_cta_text_control',
            array(
                'label' => __('CTA text', 'cmosTheme'),
                'description' => 'Add an icon to the text with <a href="https://fontawesome.com/icons" target="_blank"> Font Awesome </a> by copying an icon\'s HTML.',
                'section' => 'contact_cta',
                'settings' => 'contact_cta_text_setting',
                'type' => 'text'
            )
        )
    );
    
    // Contact CTA Link
    $wp_customize->add_setting('contact_cta_link_setting', array(
            'default' => '',
            'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'contact_cta_link_control',
            array(
                'label' => __('CTA Link', 'cmosTheme'),
                'description' => 'Add the full url to a page, eg: '.get_site_url().'/contact',
                'section' => 'contact_cta',
                'settings' => 'contact_cta_link_setting',
                'type' => 'text'
            )
        )
    );
    
    // ----- FOOTER CONTENT -----
    
    // Phone button text
    $wp_customize->add_setting('phone_button_text_setting', array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_footerText'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'phone_button_text_control',
            array(
                'label' => __('Phone number', 'cmosTheme'),
                'description' => 'Add a phone number to the footer: ',
                'section' => 'footer_content',
                'settings' => 'phone_button_text_setting',
                'type' => 'text'
            )
        )
    );
    
    // Phone button icon
    $wp_customize->add_setting('phone_button_icon_setting', array(
            'default' => '<i class="fas fa-phone"></i>',
            'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'phone_button_icon_control',
            array(
                'label' => __('Phone icon', 'cmosTheme'),
                'description' => 'Add an icon with <a href="https://fontawesome.com/icons" target="_blank"> Font Awesome </a> by copying an icon\'s HTML.',
                'section' => 'footer_content',
                'settings' => 'phone_button_icon_setting',
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
    
    // 2
    function sanitize_title2( $title2 ) {
	    return sanitize_text_field( $title2 );
	}
    
    function sanitize_link2( $link2 ) {
	    return sanitize_text_field( $link2 );
	}
    
    // Footer text
    function sanitize_footerText( $footerText ) {
	    return esc_textarea( $footerText );
	}
    
    // About CTA text
    function sanitize_aboutCTAText($aboutCTAText){
        return sanitize_text_field( $aboutCTAText );
    }
    
    // About CTA tagline
    function sanitize_aboutCTATagline($aboutCTATagline){
        return sanitize_text_field( $aboutCTATagline);
    }
    
    // Career CTA text
    function sanitize_careerCTAText($careerCTAText){
        return sanitize_text_field( $careerCTAText );
    }
    
}

add_action('customize_register', 'custom_theme_customizer');