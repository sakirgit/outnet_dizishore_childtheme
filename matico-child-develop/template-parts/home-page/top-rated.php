<?php
do_action('before_dizishore_top_rated_section');

$top_rated_products_title = get_post_meta( get_the_ID(), 'top_rated_products_title', true );

$top_rated_no_of_products = get_post_meta( get_the_ID(), 'top_rated_no_of_products', true );
$min_rate_limit = get_post_meta( get_the_ID(), 'min_rate_limit', true );
$top_rated_no_of_products = !empty($top_rated_no_of_products) ? $top_rated_no_of_products : 8;

$top_rated_prod_columns = get_post_meta( get_the_ID(), 'top_rated_prod_columns', true );
$top_rated_prod_columns = !empty($top_rated_prod_columns) ? $top_rated_prod_columns : 4;
$min_rate_limit = !empty($min_rate_limit) ? $min_rate_limit : 3;
?>
<div class="pt-0 pb-60 home-top-rated elementor-section elementor-top-section elementor-element elementor-element-9327f02 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="9327f02" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}" style="width: 1680px; left: 0px;">
    <div class="elementor-container elementor-column-gap-no">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-0524914" data-id="0524914" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-59e58f4 elementor-mobile-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="59e58f4" data-element_type="widget" data-widget_type="icon-list.default">
                    <div class="elementor-widget-container">
                    <ul class="elementor-icon-list-items">
                        <li class="elementor-icon-list-item">
                            <span class="elementor-icon-list-icon">
                                <svg aria-hidden="true" class="e-font-icon-svg e-fas-circle" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                </svg>
                            </span>
                            <span class="elementor-icon-list-text"><?php echo !empty($top_rated_products_title) ? esc_html($top_rated_products_title) : ''; ?></span>
                        </li>
                    </ul>
                    </div>
                </div>
                <div class="elementor-element elementor-element-d86b4bf arrow-style-1 elementor-widget elementor-widget-matico-products" data-id="d86b4bf" data-element_type="widget" data-widget_type="matico-products.default">
                    <div class="elementor-widget-container">
                        <?php
                            $default_top_rated_products = get_woocommerce_top_rated_products_list($top_rated_no_of_products, $top_rated_prod_columns);
                            echo apply_filters('dizishore_top_rated_products', $default_top_rated_products, $top_rated_no_of_products, $top_rated_prod_columns, $min_rate_limit);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php do_action('after_dizishore_top_rated_section');?>