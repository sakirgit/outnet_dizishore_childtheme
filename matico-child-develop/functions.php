<?php
/**
 * Theme functions and definitions.
 */
@ini_set( 'upload_max_size' , '1024M' );
@ini_set( 'post_max_size', '1024M');
@ini_set( 'max_execution_time', '300' );

/**
 * Enqueue dizishore style & scripts
 */
add_action( 'wp_enqueue_scripts', 'home_page_elementor_css', 100 );
function home_page_elementor_css(){
    global $matico_version;

	$woosc_settings = (array) get_option( 'woosc_settings', [] );
	$compare_page_link = '#';
	if(!empty($woosc_settings) && isset($woosc_settings['page_id'])){
		$compare_page_link = get_permalink( $woosc_settings['page_id'] );
	}

	wp_enqueue_style( 'dokan-select2-css' );
	wp_enqueue_script( 'dokan-select2-js' );
    
    wp_enqueue_script('scrollfix-script', get_stylesheet_directory_uri() . '/assets/js/scrollfix.js', array( 'jquery' ),  $matico_version, true);
    wp_enqueue_script('matico-child-script', get_stylesheet_directory_uri() . '/assets/js/script.js', array( 'jquery', 'scrollfix-script' ),  '1.0.2', true);
	wp_localize_script( 'matico-child-script', 'matico_child_script_obj',
		array( 
			'compare_page_link' => $compare_page_link,
			'checkout_page_url' => function_exists( 'wc_get_checkout_url' ) ? wc_get_checkout_url() : '#',
		)
	);

	wp_enqueue_style('dizishore-dokan-dashboard', get_stylesheet_directory_uri() . '/assets/css/dokan-dashboard.css', '');
	wp_enqueue_style('dizishore-front', get_stylesheet_directory_uri() . '/assets/css/dizishore-front.css', '');

    if(is_front_page()){
        //home page specefic css & js
        wp_enqueue_style('dizishore-home-page', get_stylesheet_directory_uri() . '/assets/css/home-page-css/dizishore-home-page.css', '');
        wp_enqueue_style('gf-lato', '//fonts.googleapis.com/css?family=Lato:regular,italic,700,900,900italic', '');
        wp_enqueue_script('dizishore-home-page-script', get_stylesheet_directory_uri() . '/assets/js/dizishore.js', array( 'jquery', 'wp-util', 'slick' ),  $matico_version, true);

        /*Remove elementor home page default css*/
        wp_dequeue_style( 'elementor-frontend' );
        wp_deregister_style( 'elementor-frontend' );
    }
}

add_action('dokan_setup_wizard_enqueue_scripts', 'enqueue_dokan_setup_wizard_enqueue_scripts');
function enqueue_dokan_setup_wizard_enqueue_scripts(){
	wp_enqueue_style( 'dokan-wc-setup', get_stylesheet_directory_uri() . '/assets/css/dokan-setup.css', [ 'wc-setup' ], '' );
}


/**
 * Require cmb2
 */
if ( file_exists( dirname( __FILE__ ) . '/inc/cmb2/init.php' ) ) {
    require ('inc/metabox-cmb2.php');
}

/**
 * Customizer Options
 * **/
require ('inc/customizer/kirki/kirki.php'); // Require kirki framework
require ('inc/customizer/dizishore-customizer.php'); // customizer settings
add_filter('kirki_settings_page', '__return_false'); //disable notices & settings page.

/**
 * Custom widget
*/
require ('inc/widgets/social-widget.php');
require ('inc/widgets/sidebar-ads-widget.php');

/**
 * Dizishore specific functions
*/
require ('inc/dizishore-custom-functions.php');
require ('inc/dizishore-home-template-functions.php');

/**
 * Variable empty check
 */
function check_empty( $value, $fallback = '' ){
    echo !empty($value) ? $value : $fallback;
}

/**
 * Register widgets
 *
 * @return void
 */
add_action( 'widgets_init', 'dizishore_custom_widget' );
function dizishore_custom_widget() {
    register_sidebar( array(
		'id'            => 'header_dokan_search',
		'name'          => __( 'Header Dokan Search', 'matico-child' ),
		'description'   => __( 'Will show on header middle area beside logo.', 'matico-child' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'id'            => 'footer_col_1',
		'name'          => __( 'Footer Column 01', 'matico-child' ),
		'description'   => __( 'Will show on footer widget section.', 'matico-child' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'id'            => 'footer_col_2',
		'name'          => __( 'Footer Column 02', 'matico-child' ),
		'description'   => __( 'Will show on footer widget section.', 'matico-child' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'id'            => 'footer_col_3',
		'name'          => __( 'Footer Column 03', 'matico-child' ),
		'description'   => __( 'Will show on footer widget section.', 'matico-child' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'id'            => 'footer_col_4',
		'name'          => __( 'Footer Column 04', 'matico-child' ),
		'description'   => __( 'Will show on footer widget section.', 'matico-child' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

/*
Add css admin specific
*/
add_action('admin_head', 'admin_meta_box_styles');
function admin_meta_box_styles(){
    ?>
    <style>
        .edit-post-meta-boxes-area .postbox-header {
            background: #f3f3f3;
        }
    </style>
    <?php
}


/*
Add script to product list footer
*/
add_action('wp_footer', 'add_script_to_footer');
function add_script_to_footer(){
    ?>
    <script>
		(function ($) {
			$('.product-advertisement-td').attr('data-title', '<?php echo esc_html__('Product Advertisement', 'matico-child'); ?>');
			$('tbody#order_line_items .thumb').attr('data-title', '<?php echo esc_html__('Image', 'matico-child'); ?>');
			$('tbody#order_line_items .item_cost').attr('data-title', '<?php echo esc_html__('Cost', 'matico-child'); ?>');
			$('tbody#order_line_items .quantity').attr('data-title', '<?php echo esc_html__('Qty', 'matico-child'); ?>');
			$('tbody#order_line_items .line_cost').attr('data-title', '<?php echo esc_html__('Total', 'matico-child'); ?>');
			$('table.dokan-table.dokan-support-table tbody tr td:first-child').attr('data-title', '<?php echo esc_html__('Topic', 'matico-child'); ?>');
			$('table.dokan-table.dokan-support-table tbody tr td:nth-child(2)').attr('data-title', '<?php echo esc_html__('Title', 'matico-child'); ?>');
			$('.woocommerce-MyAccount-content table.dokan-support-table tbody tr td:nth-child(2)').attr('data-title', '<?php echo esc_html__('Store Name', 'matico-child'); ?>');
			$('.woocommerce-MyAccount-content table.dokan-support-table tbody tr td:nth-child(3)').attr('data-title', '<?php echo esc_html__('Title', 'matico-child'); ?>');
			$('.woocommerce-MyAccount-content table.dokan-support-table tbody tr td:nth-child(4)').attr('data-title', '<?php echo esc_html__('Status', 'matico-child'); ?>');
			$('.woocommerce-MyAccount-content table.dokan-support-table tbody tr td:nth-child(5)').attr('data-title', '<?php echo esc_html__('Date', 'matico-child'); ?>');
			
			$('.dokan-staffs-area .dokan-table.dokan-table-striped.vendor-staff-table td:nth-child(1)').attr('data-title', '<?php echo esc_html__('Name', 'matico-child'); ?>');
			$('.dokan-staffs-area .dokan-table.dokan-table-striped.vendor-staff-table td:nth-child(2)').attr('data-title', '<?php echo esc_html__('Email', 'matico-child'); ?>');
			$('.dokan-staffs-area .dokan-table.dokan-table-striped.vendor-staff-table td:nth-child(3)').attr('data-title', '<?php echo esc_html__('Phone', 'matico-child'); ?>');
			$('.dokan-staffs-area .dokan-table.dokan-table-striped.vendor-staff-table td:nth-child(4)').attr('data-title', '<?php echo esc_html__('Registered', 'matico-child'); ?>');
		})(jQuery);
    </script>
    <?php
}

/*
Replace wishlist add to basket button text to Add to Cart
*/
// add_filter( 'gettext', 'change_add_to_basket_text', 20, 3 );
// add_filter( 'woocommerce_product_add_to_cart_text', 'change_add_to_basket_button_text' );

function change_add_to_basket_text( $translated_text, $text, $domain ) {
    if ( $domain == 'matico-child' ) {
        switch ( $translated_text ) {
            case 'Add to basket' :
                $translated_text = __( 'Add to Cart', 'matico-child' );
                break;
        }
    }
    return $translated_text;
}

function change_add_to_basket_button_text( $text ) {
    if ( $text === 'Add to basket' ) {
        $text = __( 'Add to Cart', 'matico-child' );
    }
    return $text;
}


/**
 * Elementor widget
*/
function dizishore_register_elementor_widgets( $widgets_manager ) {
	require_once ('inc/elementor-widget/blog-para-widget-after-one.php');
	require_once ('inc/elementor-widget/blog-para-widget-after-four.php');

	//Register widget
    $widgets_manager->register( new \Elementor_DiziShore_First_Para_Ads_Widget() );
    $widgets_manager->register( new \Elementor_DiziShore_Fourth_Para_Ads_Widget() );
}
add_action( 'elementor/widgets/register', 'dizishore_register_elementor_widgets' );


// Remove woocommerce template file outdated admin notice
// add_filter('woocommerce_show_admin_notice', 'remove_theme_outdated_notice', 5, 2);
function remove_theme_outdated_notice($show, $notice){
	$core_templates = WC_Admin_Status::scan_template_files( WC()->plugin_path() . '/templates' );
	$outdated       = false;

	foreach ( $core_templates as $file ) {

		$theme_file = false;
		if ( file_exists( get_stylesheet_directory() . '/' . $file ) ) {
			$theme_file = get_stylesheet_directory() . '/' . $file;
		} elseif ( file_exists( get_stylesheet_directory() . '/' . WC()->template_path() . $file ) ) {
			$theme_file = get_stylesheet_directory() . '/' . WC()->template_path() . $file;
		} elseif ( file_exists( get_template_directory() . '/' . $file ) ) {
			$theme_file = get_template_directory() . '/' . $file;
		} elseif ( file_exists( get_template_directory() . '/' . WC()->template_path() . $file ) ) {
			$theme_file = get_template_directory() . '/' . WC()->template_path() . $file;
		}

		if ( false !== $theme_file ) {
			$core_version  = WC_Admin_Status::get_file_version( WC()->plugin_path() . '/templates/' . $file );
			$theme_version = WC_Admin_Status::get_file_version( $theme_file );

			if ( $core_version && $theme_version && version_compare( $theme_version, $core_version, '<' ) ) {
				$outdated = true;
				break;
			}
		}
	}
	if($outdated && 'template_files' === $notice){
		return false;
	}
	return $show;
}


/**
 * Disable messages about the mobile apps in WooCommerce emails.
 * https://wordpress.org/support/topic/remove-process-your-orders-on-the-go-get-the-app/
 */
function dizishore_disable_mobile_messaging( $mailer ) {
    remove_action( 'woocommerce_email_footer', array( $mailer->emails['WC_Email_New_Order'], 'mobile_messaging' ), 9 );
}
add_action( 'woocommerce_email', 'dizishore_disable_mobile_messaging' );

/**
 * Override matico_template_loop_product_thumbnail function 
 *
 * @param string $size
 * @param integer $deprecated1
 * @param integer $deprecated2
 * @return void
 */
function matico_template_loop_product_thumbnail($size = 'woocommerce_thumbnail', $deprecated1 = 0, $deprecated2 = 0) {
	global $product;
	if (!$product) {
		return '';
	}
	$gallery = $product->get_gallery_image_ids();
	$hover_skin = matico_get_theme_option('woocommerce_product_hover', 'none');
	if ($hover_skin == 'none' || count($gallery) <= 0) {
		echo '<div class="product-image">' . $product->get_image('woocommerce_thumbnail') . '</div>';

		return '';
	}
	$image_featured = '<div class="product-image">' . $product->get_image('shop_catalog') . '</div>';
	$image_featured .= '<div class="product-image second-image">' . wp_get_attachment_image($gallery[0], 'shop_catalog') . '</div>';

	echo <<<HTML
	<div class="product-img-wrap {$hover_skin}">
		<div class="inner">
			{$image_featured}
		</div>
	</div>
	HTML;
}

/**
 * Override header logo
 *
 * @return void
 */
function matico_site_title_or_logo(){
	$custom_logo_id   = get_theme_mod( 'custom_logo' );
	$custom_logo_attr = array(
		'class'   => 'custom-logo',
		'loading' => false,
		'alt' => get_bloginfo( 'name', 'display' ),
	);

	$custom_logo_attr = apply_filters( 'get_custom_logo_image_attributes', $custom_logo_attr, $custom_logo_id, get_current_blog_id() );
	$image = wp_get_attachment_image( $custom_logo_id, [200, 45], false, $custom_logo_attr );
	$aria_current = is_front_page() && ! is_paged() ? ' aria-current="page"' : '';

	$html = sprintf(
		'<a href="%1$s" class="custom-logo-link" rel="home"%2$s>%3$s</a>',
		esc_url( home_url( '/' ) ),
		$aria_current,
		$image
	);

	return apply_filters( 'dizishore_header_logo', $html );
}


/**
 * Register jquery minify version
 *
 * @return void
 */
function dizishore_enqueue_minified_jquery() {
    if (!is_admin()) {
        // Deregister the default jQuery
        wp_deregister_script('jquery');

        // Register and enqueue the minified version
        wp_register_script('jquery', includes_url('/js/jquery/jquery.min.js'), array(), null, true);
        wp_enqueue_script('jquery');

		if( is_page_template( 'template-register.php' ) ){
			wp_enqueue_script( 'dokan-vendor-registration' );
			wp_enqueue_script( 'dokan-vendor-address' );
			wp_enqueue_style( 'dps-custom-style' );
			wp_enqueue_script( 'dps-custom-js' );
		}
    }
}
add_action('wp_enqueue_scripts', 'dizishore_enqueue_minified_jquery');


function matico_header_wishlist(){
	if (function_exists('yith_wcwl_count_all_products')) {
		if (!matico_get_theme_option('show_header_wishlist', true)) {
			return;
		}
		?>
		<div class="site-header-wishlist">
			<a class="header-wishlist"
				href="<?php echo esc_url(get_permalink(get_option('yith_wcwl_wishlist_page_id'))); ?>">
				<i class="matico-icon-heart"></i>
				<span class="count"><?php echo esc_html(yith_wcwl_count_all_products()); ?></span>
			</a>
		</div>
		<?php
	} elseif (function_exists('woosw_init')) {
		if (!matico_get_theme_option('show_header_wishlist', true)) {
			return;
		}
		$key = WPCleverWoosw::get_key();
		$wishlist_page_id = get_option( 'woosw_settings' );
		
		if ( is_array( $wishlist_page_id ) && isset( $wishlist_page_id['page_id'] ) ) {
			$wishlist_page_link = get_permalink( $wishlist_page_id['page_id'] );
		} else {
			// Handle the case when page_id is not set or $wishlist_page_id is not an array
			$wishlist_page_link = ''; // or provide a default link or handle the error accordingly
		}
		?>
		<div class="site-header-wishlist">
			<a class="header-wishlist" href="<?php echo esc_url( $wishlist_page_link ); ?>">
				<i class="matico-icon-heart-1"></i>
				<span class="count"><?php echo esc_html(WPCleverWoosw::get_count($key)); ?></span>
			</a>
		</div>
		<?php
	}
}


/**
 * Exclude JS if current product has gallery images
 *
 * @param [type] $exclusions
 * @return void
 */
function exclude_from_delay( $exclusions ) {
    if ( function_exists( 'is_product' ) && is_product() ) {
        // Get the current product ID
        global $post;
        $product_id = $post->ID;
        
        if ( ! $product_id ) {
            return $exclusions; // If no product, return the original exclusions
        }
        $product = wc_get_product( $product_id );
        
        if ( ! $product ) {
            return $exclusions;
        }
        
        // Get gallery image IDs
        $gallery_image_ids = $product->get_gallery_image_ids();
        
        // Check if the product has gallery images
        if ( ! empty( $gallery_image_ids ) ) {
            $exclusions[] = '.js';
        }
    }
    
    return $exclusions;
}
add_filter( 'rocket_delay_js_exclusions', 'exclude_from_delay' );


/**
 * Redirect to /login page if the user is not logged in and is accessing the "my-account" page
 *
 * @return void
 */
function redirect_unauthenticated_users_to_dizishore_login() {
    if ( ! is_user_logged_in() && is_account_page() && ! is_wc_endpoint_url( 'lost-password' ) ) {
        wp_redirect( home_url( '/login' ) );
        exit;
    }
}
add_action( 'template_redirect', 'redirect_unauthenticated_users_to_dizishore_login' );





/**
 * Function to handle redirection from wp-login.php
 */
function redirect_wp_login() {
    if (isset($_GET['redirect_to']) && strpos($_SERVER['REQUEST_URI'], 'wp-login.php') !== false) {
        // Decode the redirect URL
        $redirect_url = urldecode($_GET['redirect_to']);
        // Validate the redirect URL
        if (filter_var($redirect_url, FILTER_VALIDATE_URL)) {
            wp_redirect($redirect_url, 301);
            exit;
        }
    }
}
add_action('init', 'redirect_wp_login');





add_filter('pre_get_document_title', 'custom_category_title_with_subcategory', 19);

function custom_category_title_with_subcategory($title) {
    if (is_product_category()) {
        // Get the current product category (either main or subcategory)
        $category = get_queried_object();
        $category_name = $category->name;

        // Get location (replace with dynamic logic if needed)
        $location = 'London'; // Modify this to dynamically fetch location

        // Check if it's a subcategory and get the parent category (main category)
        if ($category->parent) {
            $parent_category = get_term($category->parent, 'product_cat');
            $title = sprintf('Purchase Best %s %s in %s', $category_name, $parent_category->name, $location);
        } else {
            // No parent category, so it's a main category
            $title = sprintf('Purchase Best %s in %s', $category_name, $location);
        }
    }

    return $title;
}



add_action('wp_head', 'custom_meta_description', 5);

function custom_meta_description() {
    if (is_product_category()) {
        $category = get_queried_object(); // Get the current category (or subcategory)
        $category_name = $category->name;
        $location = 'London'; // Modify this to dynamically fetch location

        // Get category's own description from the WooCommerce dashboard
        $category_description = category_description($category->term_id);

        // Fetch custom meta descriptions from the Theme Customizer
        $main_category_meta_desc = get_theme_mod('dizishore_product_category_meta_desc_text', '');
        $subcategory_meta_desc = get_theme_mod('dizishore_product_category_meta_desc_subcat_text', '');

        // Replace placeholders in the custom meta descriptions
        $main_category_meta_desc = str_replace(
            ['%Main-Category%', '%Location%'],
            [$category_name, $location],
            $main_category_meta_desc
        );

        // If it's a subcategory, get the parent category (main category)
        if ($category->parent) {
            $parent_category = get_term($category->parent, 'product_cat');
            $subcategory_meta_desc = str_replace(
                ['%Sub-Category%', '%Main-Category%', '%Location%'],
                [$category_name, $parent_category->name, $location],
                $subcategory_meta_desc
            );
        }

        // Build the final meta description
        $final_meta_description = '';

        // Show the category's own description if it exists
        if ($category_description) {
            $final_meta_description .= $category_description . ' ';
        }

        // Append custom meta description based on whether it's a main or subcategory
        if ($category->parent) {
            // Subcategory description
            $final_meta_description .= $subcategory_meta_desc;
        } else {
            // Main category description
            $final_meta_description .= $main_category_meta_desc;
        }

        // Output the meta description tag
        echo '<meta name="description" content="' . esc_attr($final_meta_description) . '">';
    }
}
