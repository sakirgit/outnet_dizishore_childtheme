<?php
// Define the widget class
class DiziShore_Sidebar_Ads_Widget extends WP_Widget {

    // Setup the widget name and description
    public function __construct() {
        parent::__construct(
            'dizishore_sidebar_ads_widget', // Base ID
            esc_html__('DiziShore Sidebar Ads', 'matico-child'), // Name
            array('description' => esc_html__('A widget to display AdSense ads from the customizer', 'matico-child'),) // Args
        );
    }

    // Front-end display of the widget
    public function widget($args, $instance) {
        echo $args['before_widget'];

        // Get the AdSense code from the customizer
        $adsense_code = get_theme_mod('dizishore_adsense_ad_blog_sidebar', '');

        // Display the AdSense code
        if (!empty($adsense_code)) {
            echo $adsense_code;
        } else {
            echo esc_html__('No AdSense code set in the customizer.', 'matico-child');
        }

        echo $args['after_widget'];
    }

    // Back-end widget form
    public function form($instance) {
        // No need for form fields as the data comes from the customizer
        echo '<p>' . esc_html__('This widget displays AdSense code set in the: Customizer > Dizishore Settings > AdSense Settings > Blog Sidebar Ad.', 'matico-child') . '</p>';
    }

    // Updating widget settings
    public function update($new_instance, $old_instance) {
        $instance = array();
        return $instance;
    }
}


// Register the widget
function dizishore_register_sidebar_ads_widget() {
    register_widget('DiziShore_Sidebar_Ads_Widget');
}
add_action('widgets_init', 'dizishore_register_sidebar_ads_widget');