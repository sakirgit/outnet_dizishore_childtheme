<?php
class DiziShore_Social_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'dizishore_social_widget',
            'DiziShore Social Widget',
            array('description' => 'A widget for displaying social media links with a title.')
        );
    }

    public function widget($args, $instance) {
        // Output widget content on the front end
        echo $args['before_widget'];

        // Display widget title
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        // Display social media links
        echo '<ul>';
        foreach ($instance as $key => $value) {
            if (!in_array($key, array('title')) && !empty($value)) {

                $icon = '';
                if($key === 'facebook'){
                    $icon = '<i class="matico-icon-facebook-f"></i>';
                }else if($key === 'twitter'){
                    $icon = '<i class="matico-icon-twitter"></i>';
                }else if($key === 'youtube'){
                    $icon = '<i class="matico-icon-youtube"></i>';
                }else if($key === 'instagram'){
                    $icon = '<i class="matico-icon-instagram"></i>';
                }

                echo '<li><a href="' . esc_url($value) . '" target="_blank">' . $icon . ucfirst($key) . '</a></li>';
            }
        }
        echo '</ul>';

        echo $args['after_widget'];
    }

    public function form($instance) {
        // Output admin widget form
        $fields = array('title', 'twitter', 'youtube', 'facebook', 'instagram');

        foreach ($fields as $field) {
            $value = isset($instance[$field]) ? esc_attr($instance[$field]) : '';
            echo '<p>';
            echo '<label for="' . $this->get_field_id($field) . '">' . ucfirst($field) . ':</label>';
            echo '<input class="widefat" id="' . $this->get_field_id($field) . '" name="' . $this->get_field_name($field) . '" type="text" value="' . $value . '">';
            echo '</p>';
        }
    }

    public function update($new_instance, $old_instance) {
        // Save widget form data
        $instance = array();
        $fields = array('title', 'twitter', 'youtube', 'facebook', 'instagram');

        foreach ($fields as $field) {
            $instance[$field] = !empty($new_instance[$field]) ? sanitize_text_field($new_instance[$field]) : '';
        }

        return $instance;
    }
}

// Register the widget
function register_dizishore_social_widget() {
    register_widget('DiziShore_Social_Widget');
}
add_action('widgets_init', 'register_dizishore_social_widget');