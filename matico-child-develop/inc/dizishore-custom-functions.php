<?php
/**
 * Check theme option key exist on option global variable
 */
function is_option_key_exists($key){
    global $opt_dizishore_;

    if(array_key_exists($key, $opt_dizishore_)){
        return true;
    }
    return false;
}

/**
 * get product parent categories options for cmb2 dropdown
 */
function cmb2_get_product_parent_categories(){
    $product_categories = get_terms('product_cat', array('hide_empty' => false, 'parent' => 0));
    $product_cats = [];
    if(!empty($product_categories)){
        foreach($product_categories as $category) {
            $product_cats[$category->slug] = $category->name;
        }
    }
    return $product_cats;
}


/**
 * get product parent categories options for cmb2 dropdown
 */
function cmb2_get_product_parent_categories_which_have_sub_cats(){
    $product_categories = get_terms('product_cat', array('hide_empty' => false, 'parent' => 0));
    $product_cats = [];
    if(!empty($product_categories)){
        foreach($product_categories as $category) {
            $product_cats[$category->slug] = $category->name;
        }
    }

    $parents_cats = array_filter(
        $product_cats, function ( $top_category_slug ) {
            $category_obj = get_term_by( 'slug', $top_category_slug, 'product_cat' );
            return has_sub_category_by_parent_category_id( $category_obj->term_id );
        }
    );
    return $parents_cats;
}

function get_product_ids(){
    $args = array('fields' => 'ids', 'post_type' => 'product', 'post_status' => 'publish', 'numberposts' => '-1');
    $products = get_posts($args);
    $product_ids = [
        '' => __('Select product', 'matico-child')
    ];
    if(!empty($products)){
        foreach($products as $id) {
            $product_ids[$id] = get_the_title($id);
        }
    }
    return $product_ids;
}

/**
 * get product category options for redux dropdown
 */
function cmb2_get_product_categories(){
    $product_categories = get_terms('product_cat', array('hide_empty' => false));
    $product_cats = [];
    if(!empty($product_categories)){
        foreach($product_categories as $category) {
            $product_cats[$category->slug] = $category->name;
        }
    }
    return $product_cats;
}

/**
 * Getting top rated products
 * 
*/
function get_woocommerce_top_rated_products_list($limit = 8, $columns = 4) {
    $type = 'products';
    $class = '';
    $atts = [
        'limit'          => $limit,
        'columns'        => $columns,
        'order'          => 'desc',
        'product_layout' => 'list',
        'orderby'        => 'date',
    ];

    $atts['style'] = 'list-2';
    $class .= ' woocommerce-product-list-2';

    $type = 'top_rated_products';
    $atts['class'] = $class;

    return (new WC_Shortcode_Products($atts, $type))->get_content(); // WPCS: XSS ok
}


/**
 * Add footer widget
 * **/
add_action('matico_footer', 'dizishore_footer_widgets');
function dizishore_footer_widgets(){
    get_template_part('template-parts/footer-widget');
}

/***
 * Modify footer copyright
*/
add_filter('matico_copyright_text', 'override_dizishore_footer_copyright');
function override_dizishore_footer_copyright($content){
    ob_start();
    dynamic_sidebar('footer-copyright');
    $sidebar_content = ob_get_clean();
    return $sidebar_content;
}

/**
 * CSS Variables from customizer
 * **/
add_action('wp_head', 'dizishore_override_css', 100);
function dizishore_override_css(){
    ?>
    <style>
        body, .elementor-kit-10{
            --primary: <?php echo get_theme_mod( 'dizishore_primary_color', '#E57C41' ); ?>!important;
            --secondary: <?php echo get_theme_mod( 'dizishore_secondary_color', '#143086' ); ?>!important;
            --text: <?php echo get_theme_mod( 'dizishore_text_color', '#444444' ); ?>!important;
            --accent: <?php echo get_theme_mod( 'dizishore_accent_color', '#000000' ); ?>!important;
            --e-global-color-primary: <?php echo get_theme_mod( 'dizishore_primary_color', '#E57C41' ); ?>!important;
            --e-global-color-primary_hover: <?php echo get_theme_mod( 'dizishore_primary_color_hover', '#e16a27' ); ?>!important;
            --primary_hover: <?php echo get_theme_mod( 'dizishore_primary_color_hover', '#e16a27' ); ?>!important;
            --e-global-color-secondary: <?php echo get_theme_mod( 'dizishore_secondary_color', '#143086' ); ?>!important;
            --e-global-color-secondary_hover: <?php echo get_theme_mod( 'dizishore_secondary_color_hover', '#122b78' ); ?>!important;
            --secondary_hover: <?php echo get_theme_mod( 'dizishore_secondary_color_hover', '#122b78' ); ?>!important;
            --e-global-color-text: <?php echo get_theme_mod( 'dizishore_text_color', '#444444' ); ?>!important;
            --e-global-color-accent: <?php echo get_theme_mod( 'dizishore_accent_color', '#000000' ); ?>!important;
            --e-global-color-lighter: <?php echo get_theme_mod( 'dizishore_lighter_color', '#999999' ); ?>!important;
            --e-global-color-highlight: <?php echo get_theme_mod( 'dizishore_highlight_color', '#E56D6D' ); ?>!important;
            --e-global-color-border: <?php echo get_theme_mod( 'dizishore_border_color', '#E6E6E6' ); ?>!important;
			--e-global-typography-heading_title-font-size: 24px!important;
			--e-global-typography-heading_title-font-weight: 600!important;
			--e-global-typography-heading_title-text-transform: capitalize!important;
			--e-global-typography-heading_title-line-height: 28px!important;
			--e-global-typography-heading_footer-font-size: 14px!important;
			--e-global-typography-heading_footer-font-weight: 700!important;
			--e-global-typography-heading_footer-text-transform: uppercase!important;
			--e-global-typography-heading_footer-line-height: 18px!important;
        }
    </style>
    <?php
}

/*Category Menu*/
function category_beside_primary_menu(){
    ?>
    <div class="vertical-menu-wrapper">
        <nav class="vertical-navigation" aria-label="<?php esc_attr_e('Vertiacl Navigation', 'matico-child'); ?>">
            <div class="vertical-navigation-header">
                <div class="vertical-navigation-title">
                    <div class="title-icon">
                        <span class="icon-1"></span>
                        <span class="icon-2"></span>
                        <span class="icon-3"></span>
                    </div>
                    <div class="title">
                        <?php
                        echo wp_get_nav_menu_name( 'vertical' );
                        ?>
                    </div>
                </div>
                <div class="matico-icon">
                </div>
            </div>
            <?php
            wp_nav_menu([
                'menu' => 'vertical',
                'theme_location'  => 'vertical',
                'fallback_cb' => '__return_empty_string',
                'container_class' => 'vertical-menu',
            ]);
            ?>
        </nav>
    </div>
    <?php
}


// check has sub category
function has_sub_category_by_parent_category_id($category_id){
    $args = array(
        'taxonomy' => 'product_cat',
        'orderby' => 'name',
        'parent' => $category_id,
        'show_count' => 0,
        'pad_counts' => 0,
        'hierarchical' => 1,
        'title_li' => '',
        'hide_empty' => false
    );

    $categories = get_categories($args);
    if(!empty($categories)){
        return true;
    }
    return false;
}

/*Woocommerce single page*/


//stock status removed from single product page
add_filter( 'woocommerce_get_stock_html', 'override_woocommerce_get_stock_html', 10, 2);

function override_woocommerce_get_stock_html($html, $product ){
    if(is_singular('product')){
        return '';
    }
    return $html;
}

//Remove or add action for single product page
add_action('init', 'remove_matico_theme_actions');
function remove_matico_theme_actions(){
    //remove hook
    remove_action('woocommerce_single_product_summary', 'matico_single_product_after_title', 6);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
    remove_action( 'woocommerce_single_product_summary', [ \WeDevs\DokanPro\Modules\ReportAbuse\SingleProduct::class, 'add_report_button' ], 100 );
    remove_action('woocommerce_single_product_summary', 'matico_woocommerce_time_sale', 25);
    remove_action('woocommerce_single_product_summary', 'matico_woocommerce_deal_progress', 26);
    remove_action('woocommerce_single_product_summary', 'matico_add_vendor_info_on_product_single_page', 63 );
    remove_action('woocommerce_single_product_summary', 'matico_single_product_extra', 70);
    
    //add hook
    add_action('woocommerce_single_product_summary', 'matico_child_single_product_after_title', 7);
    add_action('woocommerce_single_product_summary', 'matico_single_product_before_title', 4);
    add_action('woocommerce_single_product_summary', 'matico_woocommerce_time_sale', 2);
    add_action( 'woocommerce_after_add_to_cart_button', [ \WeDevs\DokanPro\Modules\ReportAbuse\SingleProduct::class, 'add_report_button' ], 32 );
    add_action('woocommerce_single_product_sidebar', 'matico_single_product_extra', 70);
    add_action('woocommerce_single_product_summary', 'matico_single_mobile_product_add_to_cart', 70);

    add_action('woocommerce_after_add_to_cart_button', function (){
        ?>
        <div class="clear"></div>
    <?php
    }, 33);
    add_filter('dokan_report_abuse_button_label', 'change_dokan_report_abuse_button_label');
}


function change_dokan_report_abuse_button_label($label){
    $label = esc_html__( 'Report', 'woocommerce' );
    return $label;
}

function matico_single_product_pagination_link(){
    ?>
    <div class="matico-single-product-pagination">
        <?php echo matico_single_product_pagination(); ?>
    </div>
    <?php
}


function matico_single_product_summary_top()
{
    ?>
    <div class="entry-summary-top">
        <?php
        woocommerce_template_single_price();
        // matico_single_product_pagination();
        ?>
    </div>
    <?php
}

function matico_single_product_before_title(){
    matico_stock_label();
}

//Add rating & sold count on single product page
if (!function_exists('matico_child_single_product_after_title')) {
    function matico_child_single_product_after_title()
    {
        global $product;
        ?>
        <div class="product_after_title">
            <?php
            matico_woocommerce_single_brand();
            woocommerce_template_single_rating();
            if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) :
                $sku = $product->get_sku() ? $product->get_sku() : esc_html__('N/A', 'matico-child');
                $units_sold = $product->get_total_sales();
                ?>
                <span class="sku_wrapper"><?php esc_html_e('Sold:', 'matico-child'); ?> <span
                            class="sku"><?php printf('%s', $units_sold); ?></span></span>
            <?php endif; ?>
        </div>
        <?php
    }
}


//Modify matico sale counter for single product page
function matico_woocommerce_time_sale($is_not_single = false){
    /**
     * @var $product WC_Product
     */
    global $product;

    if (!$product->is_on_sale()) {
        return;
    }

    $time_sale = get_post_meta($product->get_id(), '_sale_price_dates_to', true);
    if ($time_sale) {
        wp_enqueue_script('matico-countdown');
        $deal_text = $is_not_single ? esc_html__('End in:', 'matico-child') : esc_html__('Hurry up! Sale ends in:', 'matico-child');
        ?>
        <div class="deal-wrapper">
            <div class="deal-text">
                <span><?php printf('%s', $deal_text); ?></span>
            </div>
            <div class="time-sale">
                <div class="matico-countdown" data-countdown="true" data-date="<?php echo esc_html($time_sale); ?>">
                    <div class="countdown-item">
                        <span class="countdown-digits countdown-days"></span>
                        <span class="countdown-label"><?php echo esc_html__('Days', 'matico-child') ?></span>
                    </div>
                    <div class="countdown-item">
                        <span class="countdown-digits countdown-hours"></span>
                        <span class="countdown-label"><?php echo esc_html__('Hrs', 'matico-child') ?></span>
                    </div>
                    <div class="countdown-item">
                        <span class="countdown-digits countdown-minutes"></span>
                        <span class="countdown-label"><?php echo esc_html__('Mins', 'matico-child') ?></span>
                    </div>
                    <div class="countdown-item">
                        <span class="countdown-digits countdown-seconds"></span>
                        <span class="countdown-label"><?php echo esc_html__('Secs', 'matico-child') ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

//override single product right side extra info box
function matico_single_product_extra(){
    ?>
    <div class="summary entry-summary ">
        <div class="matico-single-product-extra">
            <?php
            matico_add_vendor_info_on_product_single_page_sidebar();
            matico_woocommerce_deal_progress();
            woocommerce_template_single_add_to_cart();
            do_action( 'after_matico_single_product_extra' );
            woocommerce_template_single_sharing();
            ?>
        </div>
    </div>
    <?php
}

//override single product right side extra info box
function matico_single_mobile_product_add_to_cart(){
    ?>
    <div class="single-product-mobile-add-to-cart">
        <div class="matico-single-product-extra">
            <?php
                matico_woocommerce_deal_progress();
                woocommerce_template_single_add_to_cart();
                woocommerce_template_single_sharing();
            ?>
        </div>
        <div class="single-product-mobile-two-col-ads">
            <?php do_action( 'after_matico_single_product_extra' ); ?>
        </div>
    </div>
    <?php
}

//override deal title
function matico_woocommerce_deal_progress()
{
    global $product;

    $limit = get_post_meta($product->get_id(), '_deal_quantity', true);
    $sold = intval(get_post_meta($product->get_id(), '_deal_sales_counts', true));
    if (empty($limit)) {
        return;
    }

    ?>

    <div class="deal-sold">
        <div class="deal-sold-text">
            <span><?php echo esc_html__('Sale Quantity Available: ', 'matico-child'); ?></span><span
                    class="value"><?php echo esc_html(absint($limit - $sold)); ?>/<?php echo esc_html($limit); ?></span>
        </div>
        <div class="deal-progress">
            <div class="progress-bar">
                <div class="progress-value" style="width: <?php echo trim($sold / $limit * 100) ?>%"></div>
            </div>
        </div>
    </div>

    <?php
}


/*Direct Buy Now Button*/
add_action( 'woocommerce_after_add_to_cart_button', 'add_content_after_addtocart' );
function add_content_after_addtocart() {
    $current_product_id = get_the_ID();
    $product = wc_get_product( $current_product_id );

    if( $product->is_type( 'simple' ) ){
        echo '<button data-id="'.$current_product_id.'" class="buy-now button"><i class="matico-icon-toys"></i>'.__('Buy Now', 'woocommerce').'</button>';
    }
}


/*Change wishlist button text*/
add_filter('woosw_button_text', 'modify_woosw_button_text');
function modify_woosw_button_text($text){
    return esc_html__( 'wishlist', 'woocommerce' );
}

/*Get coupon on product single page*/
function get_coupon_list() {
    ?>
    <div class="product-summery-coupon">
        <h6><?php echo esc_html__('Coupon & Discount', 'matico-child'); ?></h6>
        <?php
            $coupon_posts = get_posts( array(
                'posts_per_page'   => -1,
                'orderby'          => 'name',
                'order'            => 'asc',
                'post_type'        => 'shop_coupon',
                'post_status'      => 'publish',
            ) );
        ?>
        <div id="<?php echo count($coupon_posts) > 2 ? 'single-coupon-slider' : ''; ?>" class="product-summery-coupon-wrapper">
            <?php
            foreach( $coupon_posts as $coupon_post) {
                ?>
                <div class="coupon-list">
                    <span><?php echo $coupon_post->post_name; ?></span>
                    <span><?php echo $coupon_post->post_excerpt; ?></span>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}


function matico_add_vendor_info_on_product_single_page_sidebar() {
    global $product;
    $vendor = dokan_get_vendor_by_product( $product );
    if(!$vendor->id){
        return;
    }
    $store_info   = $vendor->get_shop_info();
    $store_rating = $vendor->get_rating();
    ?>
        <div class="dokan-vendor-info-wrap">
            <div class="dokan-vendor-image">
                <img src="<?php echo esc_url( $vendor->get_avatar() ); ?>" alt="<?php echo esc_attr( $store_info['store_name'] ); ?>">
            </div>
            <div class="dokan-vendor-info">
                <div class="dokan-vendor-name">
                    <h5><a href="<?php echo $vendor->get_shop_url(); ?>"><?php echo esc_html( $store_info['store_name'] ); ?></a></h5>
                    <?php apply_filters( 'dokan_product_single_after_store_name', $vendor ); ?>
                </div>
                <div class="dokan-vendor-rating">
                    <?php echo wp_kses_post( dokan_generate_ratings( $store_rating['rating'], 5 ) ); ?>
                </div>
                <button data-store_id="<?php echo esc_attr( $vendor->id ); ?>" class="dokan-button-vendor dokan-store-support-btn-product dokan-store-support-btn button alt <?php echo is_user_logged_in() ? esc_attr( 'user_logged' ) : esc_attr( 'user_logged_out' ); ?>"><?php echo esc_html__( 'Contact Vendor', 'woocommerce' ); ?></button>
            </div>
        </div>
    <?php
}



//remove extra markup on single product summery section
function matico_woocommerce_single_product_summary_right_start(){
    echo '';
}

function matico_woocommerce_single_product_summary_right_end(){
    echo '';
}


/**
 * Add a footer widget.
 */
function matico_dizishore_theme_footer_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Elementor Shortcode Menu', 'matico-child' ),
		'id'            => 'footer-elementor-mobile-menu',
		'description'   => __( 'Widgets in this area will be shown on all footer section.', 'matico-child' ),
		'before_widget' => '<div id="%1$s" class="footer-mobile-bar widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
    register_sidebar( array(
		'name'          => __( 'Footer Copyright', 'matico-child' ),
		'id'            => 'footer-copyright',
		'description'   => __( 'Widgets in this area will be shown on all footer copyright section.', 'matico-child' ),
		'before_widget' => '<div id="%1$s" class="footer-copyright widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'matico_dizishore_theme_footer_widgets_init' );


/**
 * Add dizishore mobile menu shortcode
 */
add_action( 'matico_after_footer', 'add_dizishore_footer_mobile_menu' );
function add_dizishore_footer_mobile_menu(){
    if ( is_active_sidebar( 'footer-elementor-mobile-menu' ) ) {
        dynamic_sidebar('footer-elementor-mobile-menu');
    }
}

//override matico header language switcher
function matico_language_switcher_mobile(){
    $languages = apply_filters('wpml_active_languages', []);
    if (matico_is_wpml_activated() && count($languages) > 0) {
        echo do_shortcode('[wpml_language_selector_widget]');
    }
}

//Override matico header action link
function matico_header_account() {

    if (!matico_get_theme_option('show_header_account', true)) {
        return;
    }

    if (matico_is_woocommerce_activated()) {
        $account_link = get_home_url() . "/login\/";
    } else {
        $account_link = wp_login_url();
    }
    ?>
    <div class="<?php echo is_user_logged_in() ? 'site-header-account' : 'site-header-account-guest'; ?>">
        <a href="<?php echo esc_url($account_link); ?>">
            <i class="matico-icon-account"></i>
        </a>
        <div class="account-dropdown">

        </div>
    </div>
    <?php
}


/**
 * Add div before payment method table [Start]
 */
add_action('woocommerce_before_account_payment_methods', 'woocommerce_before_account_payment_methods_start');
function woocommerce_before_account_payment_methods_start(){
	echo '<div class="order-upper-div">';
}


add_action('woocommerce_after_account_payment_methods', 'woocommerce_before_account_payment_methods_end');
function woocommerce_before_account_payment_methods_end(){
	echo '</div>';
}

/**
 * Add close div before payment method table [End]
 */ 

 add_filter('woosw_item_name', 'crop_woosw_item_name');
 function crop_woosw_item_name($product_name){
 	return wp_trim_words($product_name, 5, '...');
 }


/**
 * Register blog para & sidebar ads shortcode [Start]
 */
add_shortcode('blog_list_sidebar_ads', 'dizishore_adsense_blog_list_sidebar_ads');
function dizishore_adsense_blog_list_sidebar_ads() {
    $adsense_code = get_theme_mod('dizishore_adsense_ad_blog_sidebar', '');
    return '<div class="dizishore-adsense-ad">' . $adsense_code . '</div>';
}
add_shortcode('blog_details_sidebar_ads', 'dizishore_adsense_blog_details_sidebar_ads');
function dizishore_adsense_blog_details_sidebar_ads() {
    $adsense_code = get_theme_mod('dizishore_adsense_ad_blog_single_sidebar', '');
    return '<div class="dizishore-adsense-ad">' . $adsense_code . '</div>';
}
add_shortcode('blog_ads_after_first_para', 'dizishore_adsense_blog_ads_after_first_para');
function dizishore_adsense_blog_ads_after_first_para() {
    $adsense_code = get_theme_mod('dizishore_adsense_ad_blog_after_p1', '');
    return '<div class="dizishore-adsense-ad-inside-content">' . $adsense_code . '</div>';
}

add_shortcode('blog_ads_after_fourth_para', 'dizishore_adsense_blog_ads_after_fourth_para');
function dizishore_adsense_blog_ads_after_fourth_para() {
    $adsense_code = get_theme_mod('dizishore_adsense_ad_blog_after_p4', '');
    return '<div class="dizishore-adsense-ad-inside-content">' . $adsense_code . '</div>';
}
/**
 * Register blog para ads shortcode [End]
 */


/**
 * Remove dokan privacy policy hooks
*/
add_action('init', 'remove_dokan_privacy_policy_hooks');
function remove_dokan_privacy_policy_hooks(){
    remove_action( 'dokan_contact_form', 'dokan_add_privacy_policy' );
    remove_action( 'dokan_product_enquiry_after_form', 'dokan_add_privacy_policy' );
}

/**
 * Replace Dokan privacy policy to contact form by woocommerce privacy policy
 *
 * @return string
 */
add_action( 'dokan_contact_form', 'replace_dokan_add_privacy_policy_by_woo' );
function replace_dokan_add_privacy_policy_by_woo() {
    echo '<div class="dokan-privacy-policy-text">';
    replace_dokan_privacy_policy_by_woo();
    echo '</div>';
}

/**
 * Replace Dokan privacy policy to single product page by woocommerce privacy policy
 */
add_action( 'dokan_product_enquiry_after_form', 'replace_dokan_privacy_policy_by_woo' );
function replace_dokan_privacy_policy_by_woo( $return = false ) {
    $is_enabled   = 'on' === dokan_get_option( 'enable_privacy', 'dokan_privacy' );
    $privacy_page = dokan_get_option( 'privacy_page', 'dokan_privacy' );

    if ( ! $is_enabled || ! $privacy_page ) {
        return '';
    }

    $text = get_option( 'woocommerce_registration_privacy_policy_text', sprintf( __( 'Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our %s.', 'woocommerce' ), '[privacy_policy]' ) );

    if ( $return ) {
        return '<p>' . trim( $text ) . '</p>';
    }

    echo '<p>' . trim( $text ) . '</p>';
}