<?php
    do_action('before_dizishore_product_tab_section');

    $tab_title_one = get_post_meta( get_the_ID(), 'tab_title_one', true );
    $tab_title_two = get_post_meta( get_the_ID(), 'tab_title_two', true );
    $tab_title_three = get_post_meta( get_the_ID(), 'tab_title_three', true );
    $tab_view_all_text = get_post_meta( get_the_ID(), 'tab_view_all_text', true );
    $matico_tabs_ads_group_metabox = get_post_meta( get_the_ID(), 'matico_tabs_ads_group_metabox', true );
    $matico_tabs_ads_group_metabox = !empty($matico_tabs_ads_group_metabox) ? $matico_tabs_ads_group_metabox : [];
    
    $tab_one_filtered_array = array_filter($matico_tabs_ads_group_metabox, function($item){
        return $item['display_one'] == '1';
    });

    $tab_two_filtered_array = array_filter($matico_tabs_ads_group_metabox, function($item){
        return $item['display_one'] == '2';
    });

    $tab_three_filtered_array = array_filter($matico_tabs_ads_group_metabox, function($item){
        return $item['display_one'] == '3';
    });
?>
<div class="elementor-product-tab-section pb-60 elementor-section elementor-top-section elementor-element elementor-element-824dafb elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="824dafb" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}" style="width: 1680px; left: 0px;">
    <div class="elementor-container elementor-column-gap-no">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f266081" data-id="f266081" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-dafac61 elementor-align-right elementor-widget__width-auto elementor-absolute elementor-widget elementor-widget-button" data-id="dafac61" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <?php if(!empty($tab_view_all_text)): ?>
                            <a data-id="elementor-tab-title-2611" href="<?php echo wc_get_page_permalink( 'shop' ) ?>?orderby=date" class="tab-view-all-link elementor-button-link elementor-button" role="button">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-icon elementor-align-icon-before">
                                        <i aria-hidden="true" class="matico-icon- matico-icon-long-arrow-right"></i>
                                    </span>
                                    <span class="elementor-button-text"><?php echo !empty( $tab_view_all_text ) ? esc_html( $tab_view_all_text ) : ''; ?></span>
                                    <span class="elementor-button-icon elementor-align-icon-after">
                                        <i aria-hidden="true" class="matico-icon- matico-icon-long-arrow-right"></i>
                                    </span>
                                </span>
                            </a>
                            <a data-id="elementor-tab-title-2612" href="<?php echo wc_get_page_permalink( 'shop' ) ?>?visibility_type=featured" class="tab-view-all-link elementor-button-link elementor-button" role="button" style="display: none;">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-icon elementor-align-icon-before">
                                        <i aria-hidden="true" class="matico-icon- matico-icon-long-arrow-right"></i>
                                    </span>
                                    <span class="elementor-button-text"><?php echo !empty( $tab_view_all_text ) ? esc_html( $tab_view_all_text ) : ''; ?></span>
                                    <span class="elementor-button-icon elementor-align-icon-after">
                                        <i aria-hidden="true" class="matico-icon- matico-icon-long-arrow-right"></i>
                                    </span>
                                </span>
                            </a>
                            <a data-id="elementor-tab-title-2613" href="<?php echo wc_get_page_permalink( 'shop' ) ?>?filter_by=recently_viewed" class="tab-view-all-link elementor-button-link elementor-button" role="button" style="display: none;">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-icon elementor-align-icon-before">
                                        <i aria-hidden="true" class="matico-icon- matico-icon-long-arrow-right"></i>
                                    </span>
                                    <span class="elementor-button-text"><?php echo !empty( $tab_view_all_text ) ? esc_html( $tab_view_all_text ) : ''; ?></span>
                                    <span class="elementor-button-icon elementor-align-icon-after">
                                        <i aria-hidden="true" class="matico-icon- matico-icon-long-arrow-right"></i>
                                    </span>
                                </span>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-18eafde elementor-tabs-view-horizontal elementor-widget elementor-widget-matico-tabs elementor-widget-tabs" data-id="18eafde" data-element_type="widget" data-widget_type="matico-tabs.default">
                    <div class="elementor-widget-container">
                    <style>/*! elementor - v3.18.0 - 20-12-2023 */
                        .elementor-widget-tabs.elementor-tabs-view-vertical .elementor-tabs-wrapper{width:25%;flex-shrink:0}.elementor-widget-tabs.elementor-tabs-view-vertical .elementor-tab-desktop-title.elementor-active{border-right-style:none}.elementor-widget-tabs.elementor-tabs-view-vertical .elementor-tab-desktop-title.elementor-active:after,.elementor-widget-tabs.elementor-tabs-view-vertical .elementor-tab-desktop-title.elementor-active:before{height:999em;width:0;right:0;border-right-style:solid}.elementor-widget-tabs.elementor-tabs-view-vertical .elementor-tab-desktop-title.elementor-active:before{top:0;transform:translateY(-100%)}.elementor-widget-tabs.elementor-tabs-view-vertical .elementor-tab-desktop-title.elementor-active:after{top:100%}.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-desktop-title{display:table-cell}.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-desktop-title.elementor-active{border-bottom-style:none}.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-desktop-title.elementor-active:after,.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-desktop-title.elementor-active:before{bottom:0;height:0;width:999em;border-bottom-style:solid}.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-desktop-title.elementor-active:before{right:100%}.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-desktop-title.elementor-active:after{left:100%}.elementor-widget-tabs .elementor-tab-content,.elementor-widget-tabs .elementor-tab-title,.elementor-widget-tabs .elementor-tab-title:after,.elementor-widget-tabs .elementor-tab-title:before,.elementor-widget-tabs .elementor-tabs-content-wrapper{border:1px #d5d8dc}.elementor-widget-tabs .elementor-tabs{text-align:left}.elementor-widget-tabs .elementor-tabs-wrapper{overflow:hidden}.elementor-widget-tabs .elementor-tab-title{cursor:pointer;outline:var(--focus-outline,none)}.elementor-widget-tabs .elementor-tab-desktop-title{position:relative;padding:20px 25px;font-weight:700;line-height:1;border:solid transparent}.elementor-widget-tabs .elementor-tab-desktop-title.elementor-active{border-color:#d5d8dc}.elementor-widget-tabs .elementor-tab-desktop-title.elementor-active:after,.elementor-widget-tabs .elementor-tab-desktop-title.elementor-active:before{display:block;content:"";position:absolute}.elementor-widget-tabs .elementor-tab-desktop-title:focus-visible{border:1px solid #000}.elementor-widget-tabs .elementor-tab-mobile-title{padding:10px;cursor:pointer}.elementor-widget-tabs .elementor-tab-content{padding:20px;display:none}@media (max-width:767px){.elementor-tabs .elementor-tab-content,.elementor-tabs .elementor-tab-title{border-style:solid solid none}.elementor-tabs .elementor-tabs-wrapper{display:none}.elementor-tabs .elementor-tabs-content-wrapper{border-bottom-style:solid}.elementor-tabs .elementor-tab-content{padding:10px}}@media (min-width:768px){.elementor-widget-tabs.elementor-tabs-view-vertical .elementor-tabs{display:flex}.elementor-widget-tabs.elementor-tabs-view-vertical .elementor-tabs-wrapper{flex-direction:column}.elementor-widget-tabs.elementor-tabs-view-vertical .elementor-tabs-content-wrapper{flex-grow:1;border-style:solid solid solid none}.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-content{border-style:none solid solid}.elementor-widget-tabs.elementor-tabs-alignment-center .elementor-tabs-wrapper,.elementor-widget-tabs.elementor-tabs-alignment-end .elementor-tabs-wrapper,.elementor-widget-tabs.elementor-tabs-alignment-stretch .elementor-tabs-wrapper{display:flex}.elementor-widget-tabs.elementor-tabs-alignment-center .elementor-tabs-wrapper{justify-content:center}.elementor-widget-tabs.elementor-tabs-alignment-end .elementor-tabs-wrapper{justify-content:flex-end}.elementor-widget-tabs.elementor-tabs-alignment-stretch.elementor-tabs-view-horizontal .elementor-tab-title{width:100%}.elementor-widget-tabs.elementor-tabs-alignment-stretch.elementor-tabs-view-vertical .elementor-tab-title{height:100%}.elementor-tabs .elementor-tab-mobile-title{display:none}}
                    </style>
                    <div class="elementor-tabs" role="tablist">
                        <div class="elementor-tabs-wrapper">
                            
                            <div id="elementor-tab-title-2611" class="elementor-tab-title elementor-active elementor-repeater-item-9c6c513" data-tab="1" role="tab" aria-controls="elementor-tab-content-2611">
                                <span class="title"><?php !empty($tab_title_one) ? esc_html_e($tab_title_one) : esc_html__('Tab Title One', 'matico-child'); ?></span>
                            </div>
                            <div id="elementor-tab-title-2612" class="elementor-tab-title  elementor-repeater-item-f3bd66e" data-tab="2" role="tab" aria-controls="elementor-tab-content-2612">
                                <span class="title"><?php !empty($tab_title_two) ? esc_html_e($tab_title_two) : esc_html__('Tab Title Two', 'matico-child'); ?></span>
                            </div>
                            <div id="elementor-tab-title-2613" class="elementor-tab-title  elementor-repeater-item-cfbd63f" data-tab="3" role="tab" aria-controls="elementor-tab-content-2613">
                                <span class="title"><?php !empty($tab_title_three) ? esc_html_e($tab_title_three) : esc_html__('Tab Title Three', 'matico-child'); ?></span>
                            </div>
                        </div>
                        <div class="elementor-tabs-content-wrapper">
                            <div id="elementor-tab-content-2611" class="pb-0 elementor-tab-content elementor-clearfix elementor-active elementor-repeater-item-9c6c513" data-tab="1" role="tabpanel" aria-labelledby="elementor-tab-title-2611" style="display: block;">
                                <div data-elementor-type="section" data-elementor-id="9450" class="elementor elementor-9450">
                                <div class="elementor-section elementor-top-section elementor-element elementor-element-15a0d16 elementor-section-full_width elementor-section-height-default elementor-section-height-default no-border-on-mobile no-border-on-tab" data-id="15a0d16" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-no home-page-product-container">
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-be2f3a5" data-id="be2f3a5" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated no-space-on-mobile product-tab-left-ad">
                                                <?php do_action( 'dizishore_vendors_ads_by_subscribed_package' );?>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-e353da4" data-id="e353da4" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated no-space-on-mobile no-space-on-tab">
                                            <div class="elementor-element elementor-element-fe25edd arrow-style-1 elementor-widget elementor-widget-matico-products" data-id="fe25edd" data-element_type="widget" data-widget_type="matico-products.default">
                                                <div class="elementor-widget-container home-product-tab-content">
                                                    <?php 
                                                        $recent_products_shortcode = do_shortcode('[recent_products class="columns-tablet-extra-3 columns-tablet-2 columns-mobile-2" limit="8"]');
                                                        echo apply_filters('dizishore_new_arrivals_tab_products', $recent_products_shortcode);
                                                    ?>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div id="elementor-tab-content-2612" class="pb-0 elementor-tab-content elementor-clearfix  elementor-repeater-item-f3bd66e" data-tab="2" role="tabpanel" aria-labelledby="elementor-tab-title-2612">
                                <div data-elementor-type="section" data-elementor-id="9459" class="elementor elementor-9459">
                                    <div class="elementor-section elementor-top-section elementor-element elementor-element-2b38eea elementor-section-full_width elementor-section-height-default elementor-section-height-default no-border-on-mobile no-border-on-tab" data-id="2b38eea" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-no home-page-product-container">
                                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-dbf5ae8" data-id="dbf5ae8" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated no-space-on-mobile product-tab-left-ad">
                                                    <?php do_action( 'dizishore_vendors_ads_by_subscribed_package' );?>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6d51c5a" data-id="6d51c5a" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated no-space-on-mobile no-space-on-tab">
                                                    <div class="elementor-element elementor-element-6370a0c arrow-style-1 elementor-widget elementor-widget-matico-products" data-id="6370a0c" data-element_type="widget" data-widget_type="matico-products.default">
                                                        <div class="elementor-widget-container home-product-tab-content">
                                                            <?php 
                                                                $featured_products_shortcode = do_shortcode('[featured_products class="columns-tablet-extra-3 columns-tablet-2 columns-mobile-2" limit="8"]');
                                                                echo apply_filters('dizishore_featured_tab_products', $featured_products_shortcode);
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="elementor-tab-content-2613" class="pb-0 elementor-tab-content elementor-clearfix  elementor-repeater-item-cfbd63f" data-tab="3" role="tabpanel" aria-labelledby="elementor-tab-title-2613">
                                <div data-elementor-type="section" data-elementor-id="9463" class="elementor elementor-9463">
                                <div class="elementor-section elementor-top-section elementor-element elementor-element-da0cc8a elementor-section-full_width elementor-section-height-default elementor-section-height-default no-border-on-mobile no-border-on-tab" data-id="da0cc8a" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-no home-page-product-container">
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-8ea57ec " data-id="8ea57ec" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated no-space-on-mobile product-tab-left-ad">
                                                <?php do_action( 'dizishore_vendors_ads_by_subscribed_package' );?>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-5f93c93" data-id="5f93c93" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated no-space-on-mobile no-space-on-tab">
                                                <div class="elementor-element elementor-element-8eda5fe arrow-style-1 elementor-widget elementor-widget-matico-products" data-id="8eda5fe" data-element_type="widget" data-widget_type="matico-products.default">
                                                    <div class="elementor-widget-container home-product-tab-content">
                                                        <?php 
                                                            $special_off_products_shortcode = do_shortcode('[products class="columns-tablet-extra-3 columns-tablet-2 columns-mobile-2" limit="8" on_sale="true"]');
                                                            echo apply_filters('dizishore_recently_viewed_products', $special_off_products_shortcode);
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php do_action('after_dizishore_product_tab_section'); ?>