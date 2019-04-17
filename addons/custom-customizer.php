<?php

function custom_theme_customizer( $wp_customize ){
    
    $wp_customize->add_section('custom_homepage_content', array(
        'title'=> __('Homepage Content', 'cmosTheme'),
        'priority' => 100
    ));
    
    $wp_customize->add_setting('site_blurb_title_setting', array(
        'default' => '',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_setting('site_blurb_setting', array(
        'default' => '',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'site_blurb_title_control',
            array(
                'label' => __('Site Blurb Title', 'cmosTheme'),
                'section' => 'custom_homepage_content',
                'settings' => 'site_blurb_title_setting',
                'type' => 'text'
            )
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'site_blurb_control',
            array(
                'label' => __('Site Blurb', 'cmosTheme'),
                'section' => 'custom_homepage_content',
                'settings' => 'site_blurb_setting',
                'type' => 'textarea'
            )
        )
    );
}

add_action('customize_register', 'custom_theme_customizer');