<?php

function admin_my_enqueue() {
    wp_enqueue_media();
    wp_enqueue_style('CustomFieldStyle', get_template_directory_uri() . './assets/css/custom-fields-styles.css', array(), '1.0.0', 'all');
    wp_enqueue_script('CustomFieldScript', get_template_directory_uri() . './assets/js/custom-fields-script.js', array(), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'admin_my_enqueue');

$metaboxes = array(
    'testimonial_heading' => array(
      'title' => __('Testimonial heading', 'cmosTheme'),
      'applicableto' => 'testimonials',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'testimonial_heading' => array(
              'title' => __('Add a stand out heading to the top of the testimonial: ', 'cmosTheme'),
              'type' => 'header_text'
          )
      )
    ),
    'testimonial_association' => array(
      'title' => __('Client Association', 'cmosTheme'),
      'applicableto' => 'testimonials',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'client_association' => array(
              'title' => __('Add the client\'s association: ', 'cmosTheme'),
              'type' => 'association_text'
          )
      )
    ),
    'aboutValue_cta' => array(
      'title' => __('Value CTA', 'cmosTheme'),
      'applicableto' => 'aboutValues',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'aboutValue_cta_link' => array(
              'title' => __('Add the CTA link: ', 'cmosTheme'),
              'type' => 'cta_link_text'
          ),
          'aboutValue_cta_text' => array(
              'title' => __('CTA Text: ', 'cmosTheme'),
              'type' => 'cta_text_text'
          )
      )
    )
);

function add_post_format_metabox() {
    global $metaboxes;
    if ( ! empty( $metaboxes ) ) {
        foreach ( $metaboxes as $id => $metabox ) {
            add_meta_box( $id, $metabox['title'], 'show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
        }
    }
}
add_action( 'admin_init', 'add_post_format_metabox' );

function show_metaboxes( $post, $args ) {
    global $metaboxes;
    $custom = get_post_custom( $post->ID );
    $fields = $tabs = $metaboxes[$args['id']]['fields'];
    $output = '<input type="hidden" name="post_format_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';
    if ( sizeof( $fields ) ) {
        foreach ( $fields as $id => $field ) {
            switch ( $field['type'] ) {
                case 'header_text':
                    $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" /></div>';
                break;
                case 'association_text':
                $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" /></div>';
                break;
                case 'cta_link_text':
                $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" /></div>';
                break;
                case 'cta_text_text':
                $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" /></div>';
                break;
                default:
                $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" /></div>';
                break;
            }
        }
    }
    echo $output;
}
function save_metaboxes( $post_id ) {
    global $metaboxes;
    if ( ! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename( __FILE__ ) ) )
        return $post_id;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;
    if ( 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }
    $post_type = get_post_type();
    foreach ( $metaboxes as $id => $metabox ) {
        if ( $metabox['applicableto'] == $post_type ) {
            $fields = $metaboxes[$id]['fields'];
            foreach ( $fields as $id => $field ) {
                $old = get_post_meta( $post_id, $id, true );
                $new = $_POST[$id];
                if ( $new && $new != $old ) {
                    update_post_meta( $post_id, $id, $new );
                }
                elseif ( '' == $new && $old || ! isset( $_POST[$id] ) ) {
                    delete_post_meta( $post_id, $id, $old );
                }
            }
        }
    }
}
add_action( 'save_post', 'save_metaboxes' );