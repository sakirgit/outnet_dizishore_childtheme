<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters('woocommerce_product_tabs', array());
$vendor = dokan_get_vendor_by_product( get_the_ID() );
if (!empty($product_tabs)) : ?>
    <div class="woocommerce-tabs-scroll wc-tabs-wrappers">
        <ul class="tabs wc-tabs<?php echo (is_user_logged_in() && ($vendor->get_id() == get_current_user_id())) ? ' vendor-own-product' : ''; ?>">
            <?php foreach ($product_tabs as $key => $product_tab) : 
			?>
                <li class="<?php echo esc_attr($key); ?>_tab" id="tab-title-<?php echo esc_attr($key); ?>">
                    <a class="woo-tab-action" href="#tab-<?php echo esc_attr($key); ?>">
                        <?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key)); ?>
                    </a>
                </li>
            <?php 
			endforeach; ?>
            <li>
                <a class="woo-tab-action" href="#related-products">
                    <?php echo esc_html__('Related Products', 'woocommerce'); ?>
                </a>
            </li>
            <li>
                <a class="woo-tab-action" href="#recently-viewed">
                    <?php echo esc_html__('Recently Viewed', 'woocommerce'); ?>
                </a>
            </li>
        </ul>
        <?php
        $i = 0;
        foreach ($product_tabs as $key => $product_tab) : ?>
            <div class="panel entry-content wc-tab<?php echo (is_user_logged_in() && ($vendor->get_id() == get_current_user_id())) ? ' vendor-own-product' : ''; ?>" id="tab-<?php echo esc_attr($key); ?>">
                <?php if('reviews' === $key){ ?>
                    <div class="tab-section-ads-before-review">
                        <div class="elementor-container elementor-column-gap-no">
                            <?php do_action('dizishore_vendors_ads_by_non_subscribed_package'); ?>
                        </div>
                    </div>
                <?php }

                if (isset($product_tab['callback'])) {
					call_user_func($product_tab['callback'], $key, $product_tab);
                }
                ?>
            </div>
            <?php if('reviews' === $key){ ?>
                <div class="single-product-adsence-ads adssense_ad_one">
                    <?php echo get_theme_mod( 'dizishore_adsense_ad_one', '' ); ?>
                </div>
            <?php } ?>
            <?php if('seller_enquiry_form' === $key){ ?>
                <div class="single-product-adsence-ads adssense_ad_two">
                    <?php echo get_theme_mod( 'dizishore_adsense_ad_two', '' ); ?>
                </div>
            <?php } ?>
            <?php $i++;
        endforeach; ?>

        <?php do_action('woocommerce_product_after_tabs'); ?>
    </div>

<?php endif; ?>
