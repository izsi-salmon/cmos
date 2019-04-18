<?php

function custom_widgets_init() {

	register_sidebar( array(
		'name'          => 'Custom homepage links',
		'id'            => 'home_link_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'custom_widgets_init' );

class custom_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'homepage_links_widget',
            __('Homepage links', 'cmosTheme'),
            array( 'description' => __( 'Create your own custom links on the homepage.', 'cmosTheme' ), )
        );
    }
    
    
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
        //if title is present
        if ( ! empty( $title ) )
        echo $args['before_title'] . $title . $args['after_title'];
        //output
        echo __( 'This is your custom link.', 'cmosTheme' );
        echo $args['after_widget'];
    }
    
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) )
        $title = $instance[ 'title' ];
        else
        $title = __( 'Default Title', 'cmosTheme' );
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }
    
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }

}
