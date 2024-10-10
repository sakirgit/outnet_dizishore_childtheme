<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_DiziShore_Fourth_Para_Ads_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dizishore_blog_after_fourth_para_ads_widget';
    }

    public function get_title() {
        return esc_html__('DiziShore Blog Ads After 4th Para', 'matico-child');
    }

    public function get_icon() {
        return 'eicon-ad';
    }

    public function get_categories() {
        return ['basic'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'matico-child'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $adsense_code = get_theme_mod('dizishore_adsense_ad_blog_after_p4', '');

        if (!empty($adsense_code)) {
            echo $adsense_code;
        } else {
            echo esc_html__('No AdSense code set in the customizer section.', 'matico-child');
        }
    }

    protected function _content_template() {
        ?>
        <#
        var adsense_code = '<?php echo get_theme_mod('adsense_code', ''); ?>';

        if (adsense_code) {
            print( adsense_code );
        } else {
            print( '<?php echo esc_html__('No AdSense code set in the customizer section.', 'matico-child'); ?>' );
        }
        #>
        <?php
    }
}
