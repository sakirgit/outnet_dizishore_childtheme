<?php
do_action('before_dizishore_newsletter_section');

$newsletter_section_title = get_post_meta( get_the_ID(), 'newsletter_section_title', true );
$newsletter_sub_title = get_post_meta( get_the_ID(), 'newsletter_sub_title', true );
$mailchimp_form_shortcode = get_post_meta( get_the_ID(), 'mailchimp_form_shortcode', true );
$newsletter_top_title = get_post_meta( get_the_ID(), 'newsletter_top_title', true );
?>
<div class="pt-60 pb-60 newletter-section elementor-section elementor-section-stretched">
    <div class="container">
        <div class="row justify-content-center">
            <div class="column-desktop-10 column-tablet-12 column-12">
                <div class="row align-items-center">
                    <div class="newsletter-content column-desktop-5 column-tablet-6 column-12">
                        <p class="newletter-subitlte"><?php echo esc_html($newsletter_top_title); ?></p>
                        <h3 class="elementor-heading-title elementor-size-default">
                            <?php echo esc_html($newsletter_section_title); ?>
                        </h3>
                        <?php if(!empty($newsletter_sub_title)){ ?>
                            <p><?php echo esc_html($newsletter_sub_title); ?></p>
                        <?php } ?>
                    </div>
                    <div class="mailchimp-form column-desktop-7 column-tablet-6 column-12">
                        <?php if(isset($mailchimp_form_shortcode)){ ?>
                            <div class="form-newsletter-section form-style">
                                <?php echo do_shortcode($mailchimp_form_shortcode); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php do_action('after_dizishore_newsletter_section'); ?>