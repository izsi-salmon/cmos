<?php
// Custom scripts & styles
function addCustomThemeStyles(){
  // Style
  wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Nunito:400,700', array(), '0.0.1', 'all');
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', array(), '5.7.2', 'all');
  wp_enqueue_style('swipercss', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css', array(), '4.5.0', 'all');
  wp_enqueue_style('maincss', get_template_directory_uri().'/assets/theme-styles.css', array(), '0.0.1', 'all');
  // Scripts
  wp_enqueue_script('swiperscript', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js', array(), '4.5.0', true);
  wp_enqueue_script('themescripts', get_template_directory_uri().'/assets/theme-script.js', array(), '0.0.1', true);
  global $wp_query;
}
add_action('wp_enqueue_scripts', 'addCustomThemeStyles');

// ------ THEME SUPPORTS ------

// Post thumbnails
add_theme_support('post-thumbnails');

// Custom logo
function addCustomLogo() {
	add_theme_support('custom-logo', array(
        'width' => 95,
		'flex-height' => true,
		'flex-width' => false
	));
}
add_action('init', 'addCustomLogo');

// MENUS
function addCustomMenus(){
  add_theme_support('menus');
  register_nav_menu('header_nav', 'Navigation Bar');
  register_nav_menu('header_cta', 'Header CTA');
}
add_action('init', 'addCustomMenus');

// ----- POST TYPES -----


// SLIDESHOW

function add_slideshow_post_type(){
    $labels = array(
        'name' => _x('Add slide', 'post type name', 'cmosTheme'),
        'singular_name' => _x('Add slide', 'post type singular name', 'cmosTheme'),
        'add_new_item' => _x('Add slide', 'adding new slide', 'cmosTheme')
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'a post type that creates slides for the homepage',
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 5,
        'menu-icon' => 'dashicons-images-alt2',
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        ),
        'query_var' => true
    );
    register_post_type('slides', $args);
}

// ----- ADD POST TYPES ------

add_action('init','add_slideshow_post_type');

// ----- REQUIREMENTS -----

require get_parent_theme_file_path('/addons/custom-customizer.php');














// END