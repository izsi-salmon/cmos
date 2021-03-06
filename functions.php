<?php
// Custom scripts & styles
function addCustomThemeStyles(){
  // Style
  wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Nunito:400,700', array(), '0.0.1', 'all');
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', array(), '5.7.2', 'all');
  wp_enqueue_style('swipercss', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css', array(), '4.5.0', 'all');
  wp_enqueue_style('maincss', get_template_directory_uri().'/assets/theme-styles.css', array(), '0.0.9', 'all');
  wp_enqueue_style('CustomFieldStyle', get_template_directory_uri() . '/assets/custom-fields-styles.css', array(), '1.0.0', 'all');
  wp_enqueue_style('commentstyles', get_template_directory_uri() . '/assets/comments-styles.css', array(), '1.0.0', 'all');
  // Scripts
  wp_enqueue_script('jquery');
  wp_enqueue_script('swiperscript', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js', array(), '4.5.0', true);
  wp_enqueue_script('themescripts', get_template_directory_uri().'/assets/theme-script.js', array(), '0.0.7', true);
  global $wp_query;
}
add_action('wp_enqueue_scripts', 'addCustomThemeStyles');

// ------ THEME SUPPORTS ------

// Post thumbnails
add_theme_support('post-thumbnails');
add_image_size( 'avatar', 300, 300, true );

// Custom logo
function addCustomLogo() {
	add_theme_support('custom-logo', array(
        'width' => 190,
		'flex-height' => true,
		'flex-width' => false
	));
}
add_action('init', 'addCustomLogo');

// ----- MENUS -----

function addCustomMenus(){
    add_theme_support('menus');
    register_nav_menu('header_nav', 'Navigation Bar');
    register_nav_menu('header_cta', 'Header CTA');
    register_nav_menu('footer_cta', 'Footer CTA');
    register_nav_menu('adtnl_footer_links', 'Additional Footer Links');
    register_nav_menu('social_media_links', 'Social Media Links');
}
add_action('init', 'addCustomMenus');

add_filter('nav_menu_css_class' , 'active_nav_class' , 10 , 2);

class child_wrap extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"sub-menu-container\"><ul class=\"sub-menu\">\n";
    }
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}

function active_nav_class ($classes, $item) {
    if (in_array('current-menu-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args ) {
    if ( in_array('menu-item-has-children', $item->classes) ) { // change 1161 to the ID of your menu item.
        $atts['id'] = 'dropdownButton';
    }

    return $atts;
}, 10, 3 );

// ----- POST TYPES -----

//// EXAMPLE
//
//function add_post_type(){
//    $labels = array(
//        'name' => _x('', 'post type name', 'cmosTheme'),
//        'singular_name' => _x('', 'post type singular name', 'cmosTheme'),
//        'add_new_item' => _x('Add ', 'Adding ', 'cmosTheme')
//    );
//    
//    $args = array(
//        'labels' => $labels,
//        'description' => '',
//        'public' => true,
//        'hierarchical' => true,
//        'show_ui' => true,
//        'show_in_menu' => true,
//        'show_in_nav_menus' => false,
//        'menu_position' => ,
//        'menu_icon' => 'dashicons-',
//        'supports' => array(
//            'title',
//            'editor',
//            'thumbnail'
//        ),
//        'query_var' => true
//    );
//    register_post_type('', $args);
//}

// Don't forget to add action! :)


// SLIDESHOW

function add_slideshow_post_type(){
    $labels = array(
        'name' => _x('Slideshow slides', 'post type name', 'cmosTheme'),
        'singular_name' => _x('Add slide', 'post type singular name', 'cmosTheme'),
        'add_new_item' => _x('Add slide', 'adding new slide', 'cmosTheme')
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'a post type that creates slides for the homepage',
        'public' => true,
        'hierarchical' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 15,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'page-attributes'
        ),
        'query_var' => true
    );
    register_post_type('slides', $args);
}

// TESTIMONIALS

function add_testimonials_post_type(){
    $labels = array(
        'name' => _x('Testimonials', 'post type name', 'cmosTheme'),
        'singular_name' => _x('Testimonial', 'post type singular name', 'cmosTheme'),
        'add_new_item' => _x('Add testimonial', 'Adding testimonial', 'cmosTheme')
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'a post type that adds testimonials to the home page.',
        'public' => true,
        'hierarchical' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'page-attributes'
        ),
        'query_var' => true
    );
    register_post_type('testimonials', $args);
}

// LOCATIONS

function add_locations_post_type(){
    $labels = array(
        'name' => _x('Locations', 'post type name', 'cmosTheme'),
        'singular_name' => _x('Location', 'post type singular name', 'cmosTheme'),
        'add_new_item' => _x('Add location', 'Adding location', 'cmosTheme')
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'A post type that creates the location addresses',
        'public' => true,
        'hierarchical' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 21,
        'menu_icon' => 'dashicons-location',
        'supports' => array(
            'title',
            'editor',
            'page-attributes'
        ),
        'query_var' => true
    );
    register_post_type('locations', $args);
}

// SUB SERVICES

function add_subservices_post_type(){
    $labels = array(
        'name' => _x('Sub Services', 'post type name', 'cmosTheme'),
        'singular_name' => _x('Sub Service', 'post type singular name', 'cmosTheme'),
        'add_new_item' => _x('Add sub service to service page', 'Adding sub service', 'cmosTheme')
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'Post type that adds sub service to service page',
        'public' => true,
        'hierarchical' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 21,
        'menu_icon' => 'dashicons-editor-ul',
        'supports' => array(
            'title',
            'thumbnail',
            'page-attributes'
        ),
        'query_var' => true
    );
    register_post_type('subservices', $args);
}

// ABOUT US: VALUES

function add_aboutValues_post_type(){
    $labels = array(
        'name' => _x('About us: values', 'post type name', 'cmosTheme'),
        'singular_name' => _x('About us: value', 'post type singular name', 'cmosTheme'),
        'add_new_item' => _x('Add value to about page', 'Adding ', 'cmosTheme')
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'A post type that adds value sections to the about page',
        'public' => true,
        'hierarchical' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-heart',
        'supports' => array(
            'title',
            'editor',
            'page-attributes'
        ),
        'query_var' => true
    );
    register_post_type('aboutvalues', $args);
}

// ABOUT US: SUB VALUES

function add_subValues_post_type(){
    $labels = array(
        'name' => _x('About us: Sub Values', 'post type name', 'cmosTheme'),
        'singular_name' => _x('Sub Value', 'post type singular name', 'cmosTheme'),
        'add_new_item' => _x('Add sub value to the about page', 'Adding sub value to value section', 'cmosTheme')
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'A post type that adds sub values under an About Us value.',
        'public' => true,
        'hierarchical' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-excerpt-view',
        'supports' => array(
            'title',
            'editor',
            'page-attributes'
        ),
        'query_var' => true
    );
    register_post_type('subvalues', $args);
}

// PEOPLE

function add_people_post_type(){
    $labels = array(
        'name' => _x('People', 'post type name', 'cmosTheme'),
        'singular_name' => _x('Person', 'post type singular name', 'cmosTheme'),
        'add_new_item' => _x('Add person to People page', 'Adding person', 'cmosTheme')
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'A post type that adds staff members to the people page',
        'public' => true,
        'hierarchical' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 22,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => array(
            'title',
            'thumbnail',
            'page-attributes'
            
        ),
        'query_var' => true
    );
    register_post_type('people', $args);
}

// CAREER VALUES

function add_careervalues_post_type(){
    $labels = array(
        'name' => _x('Careers: Values', 'post type name', 'cmosTheme'),
        'singular_name' => _x('Career Value', 'post type singular name', 'cmosTheme'),
        'add_new_item' => _x('Add value to career page', 'Adding career value', 'cmosTheme')
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'A post type that adds values to the careers page.',
        'public' => true,
        'hierarchical' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 23,
        'menu_icon' => 'dashicons-heart',
        'supports' => array(
            'title',
            'editor',
            'page-attributes'
        ),
        'query_var' => true
    );
    register_post_type('careervalues', $args);
}

// BLOGS

function add_blogposts_post_type(){
    $labels = array(
        'name' => _x('Blog Posts', 'post type name', 'cmosTheme'),
        'singular_name' => _x('Blog Post', 'post type singular name', 'cmosTheme'),
        'add_new_item' => _x('Add blog post', 'Adding blog post', 'cmosTheme')
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'A post type that adds a blog post to the blog page',
        'public' => true,
        'hierarchical' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 24,
        'menu_icon' => 'dashicons-format-aside',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'author',
            'comments'
        ),
        'query_var' => true
    );
    register_post_type('blogposts', $args);
}

// ----- ADD POST TYPES ------

add_action('init','add_slideshow_post_type');
add_action('init','add_testimonials_post_type');
add_action('init','add_locations_post_type');
add_action('init','add_aboutValues_post_type');
add_action('init','add_subValues_post_type');
add_action('init','add_people_post_type');
add_action('init','add_subservices_post_type');
add_action('init','add_careervalues_post_type');
add_action('init','add_blogposts_post_type');

// ----- REMOVE ACTIONS -----

// Stop wordpress from rendering two meta descriptions
remove_action('wp_head', 'description');

// ----- FILTRES -----

// Stops Yoast Seo from breaking replytocom (Reply to comment link functionality)
add_filter( 'wpseo_remove_reply_to_com', '__return_false' );
// Changes the_excerpt() more text
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

// ----- REQUIREMENTS -----

require get_parent_theme_file_path('/addons/custom-customizer.php');
require get_parent_theme_file_path('/addons/custom-fields.php');









// END