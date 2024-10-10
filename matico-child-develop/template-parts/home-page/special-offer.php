<?php 
    do_action('before_dizishore_special_offer_section');

    $special_offer_section_title = get_post_meta( get_the_ID(), 'special_offer_section_title', true );
    $special_offer_no_of_products = get_post_meta( get_the_ID(), 'special_offer_no_of_products', true );
    $special_offer_no_of_products = !empty($special_offer_no_of_products) ? $special_offer_no_of_products : 8;
?>

<div class="elementor-section pt-60 pb-60 elementor-top-section elementor-element elementor-element-6d7d8e0 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6d7d8e0" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}" style="width: 1680px; left: 0px;">
    <div class="elementor-container elementor-column-gap-no">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3dd4b1a" data-id="3dd4b1a" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-section elementor-inner-section elementor-element elementor-element-cb27bd2 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="cb27bd2" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-bb2bc04" data-id="bb2bc04" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-b9dc271 elementor-mobile-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="b9dc271" data-element_type="widget" data-widget_type="icon-list.default">
                                <div class="elementor-widget-container">
                                <ul class="elementor-icon-list-items">
                                    <li class="elementor-icon-list-item">
                                        <span class="elementor-icon-list-icon">
                                            <svg aria-hidden="true" class="e-font-icon-svg e-fas-circle" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                            </svg>
                                        </span>
                                        <span class="elementor-icon-list-text"><?php echo !empty($special_offer_section_title) ? esc_html($special_offer_section_title) : ''; ?></span>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-95d8328 arrow-style-1 elementor-widget elementor-widget-matico-products" data-id="95d8328" data-element_type="widget" data-widget_type="matico-products.default">
                    <div class="elementor-widget-container">
                        <div id="special-offers-products">
                            <div class="woocommerce-carousel">
                                <?php 
                                    $special_offer_shortcode = do_shortcode( '[products limit="'.$special_offer_no_of_products.'" columns="1" on_sale="true" ]');
                                    echo apply_filters( 'dizishore_special_offer_products', $special_offer_shortcode, $special_offer_no_of_products );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php do_action('after_dizishore_special_offer_section'); ?>