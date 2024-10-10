<?php do_action('before_dizishore_vendor_selling_section'); ?>
<div class="pb-60 pt-0 elementor-section elementor-top-section elementor-element elementor-element-06f5e0f elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="06f5e0f" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}" style="width: 1680px; left: 0px;">
    <div class="elementor-container elementor-column-gap-no">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-dc1f62f" data-id="dc1f62f" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-f3af8a5 elementor-mobile-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="f3af8a5" data-element_type="widget" data-widget_type="icon-list.default">
                    <div class="elementor-widget-container">
                    <ul class="elementor-icon-list-items">
                        <li class="elementor-icon-list-item">
                            <span class="elementor-icon-list-icon">
                                <svg aria-hidden="true" class="e-font-icon-svg e-fas-circle" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                </svg>
                            </span>
                            <?php
                                $top_selling_vendor_sec_title = get_post_meta( get_the_ID(), 'top_selling_vendor_sec_title', true );
                            ?>
                            <span class="elementor-icon-list-text"><?php echo !empty($top_selling_vendor_sec_title) ? esc_html($top_selling_vendor_sec_title) : ''; ?></span>
                        </li>
                    </ul>
                    </div>
                </div>
                <div class="elementor-element elementor-element-bcec0e3 elementor-align-left elementor-widget__width-auto elementor-absolute elementor-hidden-mobile elementor-widget elementor-widget-button" data-id="bcec0e3" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <?php
                            $view_all_txt = get_post_meta(get_the_ID(), 'top_selling_view_all_text', true);
                            if(!empty($view_all_txt)):
                            ?>
                            <a href="<?php echo function_exists('dokan_get_permalink') ? dokan_get_permalink('store_listing') : '#'; ?>" class="elementor-button-link elementor-button" role="button">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-icon elementor-align-icon-before">
                                        <i aria-hidden="true" class="matico-icon- matico-icon-long-arrow-right"></i>
                                    </span>
                                    <span class="elementor-button-text"><?php echo esc_html($view_all_txt); ?></span>
                                    <span class="elementor-button-icon elementor-align-icon-after">
                                        <i aria-hidden="true" class="matico-icon- matico-icon-long-arrow-right"></i>
                                    </span>
                                </span>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-6fad4ba elementor-store-style-1 arrow-style-1 elementor-widget elementor-widget-matico-dokan-stores" data-id="6fad4ba" data-element_type="widget" data-widget_type="matico-dokan-stores.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-store-wrapper">
                            <div id="top-selling-vendors" class="<?php do_action('home_top_selling_vendors_wrapper_class'); ?>">
                                <?php do_action('dizishore_dokan_top_selling_vendors'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php do_action('after_dizishore_vendor_selling_section'); ?>