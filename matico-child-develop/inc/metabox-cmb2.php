<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'matico_child_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 $cmb CMB2 object.
 *
 * @return bool      True if metabox should show
 */
function matico_child_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template.
	if ( get_option( 'page_on_front' ) !== $cmb->object_id ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field $field Field object.
 *
 * @return bool              True if metabox should show
 */
function matico_child_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category.
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Manually render a field.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function matico_child_render_row_cb( $field_args, $field ) {
	$classes     = $field->row_classes();
	$id          = $field->args( 'id' );
	$label       = $field->args( 'name' );
	$name        = $field->args( '_name' );
	$value       = $field->escaped_value();
	$description = $field->args( 'description' );
	?>
	<div class="custom-field-row <?php echo esc_attr( $classes ); ?>">
		<p><label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></label></p>
		<p><input id="<?php echo esc_attr( $id ); ?>" type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo $value; ?>"/></p>
		<p class="description"><?php echo esc_html( $description ); ?></p>
	</div>
	<?php
}

/**
 * Manually render a field column display.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function matico_child_display_text_small_column( $field_args, $field ) {
	?>
	<div class="custom-column-display <?php echo esc_attr( $field->row_classes() ); ?>">
		<p><?php echo $field->escaped_value(); ?></p>
		<p class="description"><?php echo esc_html( $field->args( 'description' ) ); ?></p>
	</div>
	<?php
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array      $field_args Array of field parameters.
 * @param  CMB2_Field $field      Field object.
 */
function matico_child_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

/**
 * Hook in and add a metabox to the home page for banner section
 */
add_action( 'cmb2_admin_init', 'matico_child_top_banner_section' );
function matico_child_top_banner_section() {
	$cmb_banner_section = new_cmb2_box( array(
		'id'           => 'home_banner_section',
		'title'        => esc_html__( 'Banner Section', 'matico-child' ),
		'object_types' => array( 'page' ), // Post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'template-home-page.php' ),
	) );
	$cmb_banner_section-> add_field( array(
		'name' => esc_html__( 'Banner Image (Seft side)', 'matico-child' ),
		'id'   => 'left_banner_image',
		'type' => 'file',
		'description'    => esc_html__( 'Recommended Size: Width: 740px Height: 690px', 'matico-child' ),
	) );
	$cmb_banner_section->add_field( array(
		'name' => esc_html__( 'Banner Small Title', 'matico-child' ),
		'id'   => 'left_banner_title_sm',
		'type' => 'text',
	) );
	$cmb_banner_section->add_field( array(
		'name' => esc_html__( 'Banner Main Title', 'matico-child' ),
		'id'   => 'left_banner_title_lg',
		'type' => 'text',
	) );
	$cmb_banner_section->add_field( array(
		'name' => esc_html__( 'Price Text', 'matico-child' ),
		'id'   => 'left_banner_price_text',
		'type' => 'text',
	) );
	$cmb_banner_section->add_field( array(
		'name' => esc_html__( 'Price', 'matico-child' ),
		'id'   => 'left_banner_price',
		'type' => 'text',
	) );
	$cmb_banner_section->add_field( array(
		'name' => esc_html__( 'Button Text', 'matico-child' ),
		'id'   => 'left_banner_btn_txt',
		'type' => 'text',
	) );
	$cmb_banner_section->add_field( array(
		'name' => esc_html__( 'Button Link', 'matico-child' ),
		'id'   => 'left_banner_btn_link',
		'type' => 'text',
		'default' => function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : ''
	) );
}

add_action( 'cmb2_admin_init', 'matico_child_top_banner_right_section' );
function matico_child_top_banner_right_section() {
	$cmb_banner_cat_section = new_cmb2_box( array(
		'id'           => 'home_banner_category_section',
		'title'        => esc_html__( 'Top Banner Right Side Category', 'matico-child' ),
		'object_types' => array( 'page' ), // Post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'template-home-page.php' ),
	) );
	$cmb_banner_cat_section->add_field( array(
		'name'           => 'Product Categories Manually',
		'description'    => esc_html__( 'Selected categories will show on banner right side', 'matico-child' ),
		'id'             => 'popular_categories',
		'type'           => 'multicheck',
		'options_cb' 	=> 'cmb2_get_product_parent_categories',
	) );
}

/**
 * Hook in and add a metabox to the home page for tab list section
 */
add_action( 'cmb2_admin_init', 'matico_child_top_tabs_section' );
function matico_child_top_tabs_section() {
	$cmb_tabs_section = new_cmb2_box( array(
		'id'           => 'home_tabs_section',
		'title'        => esc_html__( 'Tabs Section', 'matico-child' ),
		'object_types' => array( 'page' ), // Post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'template-home-page.php' ),
	) );
	$cmb_tabs_section-> add_field( array(
		'name' => esc_html__( 'Tab Title One', 'matico-child' ),
		'id'   => 'tab_title_one',
		'type' => 'text',
		'default' => 'New Arrivals'
	) );
	$cmb_tabs_section-> add_field( array(
		'name' => esc_html__( 'Tab Title Two', 'matico-child' ),
		'id'   => 'tab_title_two',
		'type' => 'text',
		'default' => 'Featured'
	) );
	$cmb_tabs_section-> add_field( array(
		'name' => esc_html__( 'Tab Title Three', 'matico-child' ),
		'id'   => 'tab_title_three',
		'type' => 'text',
		'default' => 'Special Offer'
	) );
	$cmb_tabs_section-> add_field( array(
		'name' => esc_html__( 'View All Button Text', 'matico-child' ),
		'id'   => 'tab_view_all_text',
		'type' => 'text',
		'default' => function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : ''
	) );
}


/**
 * Hook in and add a metabox to the home page for popular category section
 */
add_action( 'cmb2_admin_init', 'matico_child_popular_cat_section' );
function matico_child_popular_cat_section() {
	$popular_cat_section = new_cmb2_box( array(
		'id'           => 'home_popular_cat_section',
		'title'        => esc_html__( 'Popular Category Section', 'matico-child' ),
		'object_types' => array( 'page' ), // Post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'template-home-page.php' ),
	) );
	$popular_cat_section->add_field( array(
		'name' => esc_html__( 'Title', 'matico-child' ),
		'id'   => 'popular_category_title',
		'type' => 'text',
		'default' => esc_html__('Popular category section title', 'matico-child')
	) );
	$popular_cat_section->add_field( array(
		'name'           => 'Product Categories',
		'description'    => 'Only parent categories which has sub categories will shown here',
		'id'             => 'popular_category_ids',
		'type'           => 'multicheck',
		'options_cb' 	=> 'cmb2_get_product_parent_categories_which_have_sub_cats',
	) );
	$popular_cat_section->add_field( array(
		'name' => esc_html__( 'View More Button Text', 'matico-child' ),
		'id'   => 'popular_cat_view_more_btn_text',
		'type' => 'text',
	) );
}


/**
 * Hook in and add a metabox to the home page template
 */
add_action( 'cmb2_admin_init', 'matico_child_top_selling_vendors' );
function matico_child_top_selling_vendors() {
	$cmb_about_page = new_cmb2_box( array(
		'id'           => 'home_top_selling_vendors',
		'title'        => esc_html__( 'Top Selling Vendor Section', 'matico-child' ),
		'object_types' => array( 'page' ), // Post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'template-home-page.php' ),
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Section Title', 'matico-child' ),
		'id'   => 'top_selling_vendor_sec_title',
		'type' => 'text',
		'default' => esc_html__('Top Selling Vendor', 'matico-child')
	) );
	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'View All Button Text', 'matico-child' ),
		'id'   => 'top_selling_view_all_text',
		'type' => 'text',
	) );
}

/**
 * Hook in and add a metabox to the home page template speical offer section
 */
add_action( 'cmb2_admin_init', 'matico_child_special_offer_products' );
function matico_child_special_offer_products() {
	$cmb_about_page = new_cmb2_box( array(
		'id'           => 'home_special_offer_products',
		'title'        => esc_html__( 'Special Offer Products Section', 'matico-child' ),
		'object_types' => array( 'page' ), // Post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'template-home-page.php' ),
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Section Title', 'matico-child' ),
		'id'   => 'special_offer_section_title',
		'type' => 'text',
		'default' => esc_html__('Special Offer', 'matico-child')
	) );
	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Number of Products', 'matico-child' ),
		'id'   => 'special_offer_no_of_products',
		'type' => 'text',
		'default' => 8
	) );
}

/**
 * Hook in and add a metabox to the home page template top rated section
 */
add_action( 'cmb2_admin_init', 'matico_child_top_rated_products' );
function matico_child_top_rated_products() {
	$cmb_about_page = new_cmb2_box( array(
		'id'           => 'home_top_rated_products',
		'title'        => esc_html__( 'Top Rated Products Section', 'matico-child' ),
		'object_types' => array( 'page' ), // Post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'template-home-page.php' ),
	) );

	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Section Title', 'matico-child' ),
		'id'   => 'top_rated_products_title',
		'type' => 'text',
		'default' => esc_html__('Top Rated', 'matico-child')
	) );
	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Number of Products', 'matico-child' ),
		'id'   => 'top_rated_no_of_products',
		'type' => 'text',
		'default' => 8
	) );
	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Columns', 'matico-child' ),
		'id'   => 'top_rated_prod_columns',
		'type' => 'text',
		'default' => 4
	) );
	$cmb_about_page->add_field( array(
		'name' => esc_html__( 'Minimun Rating Limit', 'matico-child' ),
		'id'   => 'min_rate_limit',
		'type' => 'text',
		'default' => 3
	) );
}


/**
 * Hook in and add a metabox to the home page template newsletter section
 */
add_action( 'cmb2_admin_init', 'matico_child_newsletter_section' );
function matico_child_newsletter_section() {
	$cmb_newsletter = new_cmb2_box( array(
		'id'           => 'home_newsletter_section',
		'title'        => esc_html__( 'Newsletter Section', 'matico-child' ),
		'object_types' => array( 'page' ), // Post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'template-home-page.php' ),
	) );

	$cmb_newsletter->add_field( array(
		'name' => esc_html__( 'Top Title', 'matico-child' ),
		'id'   => 'newsletter_top_title',
		'type' => 'text',
		'default' => esc_html__('Join Now', 'matico-child')
	) );

	$cmb_newsletter->add_field( array(
		'name' => esc_html__( 'Section Title', 'matico-child' ),
		'id'   => 'newsletter_section_title',
		'type' => 'wysiwyg',
		'default' => esc_html__('Join Our Newsletter And Get Discount For Your First Order', 'matico-child'),
		'options' => array(
			'wpautop' => true, // use wpautop?
			'textarea_rows' => 4, // rows="..."
			'teeny' => true, // output the minimal editor config used in Press This
		),
	) );
	$cmb_newsletter->add_field( array(
		'name' => esc_html__( 'Subtitle', 'matico-child' ),
		'id'   => 'newsletter_sub_title',
		'type' => 'text',
		'default' => esc_html__('Subscribe To Get The Latest Updates And Discount', 'matico-child')
	) );
	$cmb_newsletter->add_field( array(
		'name' => esc_html__( 'Mailchimp Form Shortcode', 'matico-child' ),
		'id'   => 'mailchimp_form_shortcode',
		'type' => 'textarea_small',
		'default' => ''
	) );
}


add_action( 'cmb2_admin_init', 'matico_child_register_taxonomy_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function matico_child_register_taxonomy_metabox() {

	/**
	 * Metabox to add fields to categories and tags
	 */
	$cmb_term = new_cmb2_box( array(
		'id'               => 'product_cat_extra_meta',
		'title'            => esc_html__( 'Extra Information', 'matico-child' ), // Doesn't output for term boxes
		'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
		'taxonomies'       => array( 'product_cat' ), // Tells CMB2 which taxonomies should have these fields
		'new_term_section' => true, // Will display in the "Add New Category" section
	) );
	$cmb_term->add_field( array(
		'name' => esc_html__( 'Category Box Transparent Image', 'matico-child' ),
		'desc' => esc_html__( 'This image will show on home page popular category section. (Recommended Size: Width: 145px Height: 145px)', 'matico-child' ),
		'id'   => 'cat_box_trans_img',
		'type' => 'file',
	) );
}



/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
add_action( 'cmb2_admin_init', 'matico_child_product_ad_image' );
function matico_child_product_ad_image() {

	/**
	 * Metabox to add fields to categories and tags
	 */
	$cmb_ads_img = new_cmb2_box( array(
		'id'               => 'product_ads_image',
		'title'            => esc_html__( 'Advertisement Images', 'matico-child' ), // Doesn't output for term boxes
		'object_types' => array( 'product' ), // Tells CMB2 which taxonomies should have these fields
	) );
	$cmb_ads_img->add_field( array(
		'name' => esc_html__( 'Advertisement Portrait Image', 'matico-child' ),
		'desc' => esc_html__( 'Upload advertisements portrait image', 'matico-child' ),
		'id'   => 'ad_portrait_image_url',
		'type' => 'file',
	) );
	$cmb_ads_img->add_field( array(
		'name' => esc_html__( 'Advertisement Landscape Image', 'matico-child' ),
		'desc' => esc_html__( 'Upload advertisements landscape image', 'matico-child' ),
		'id'   => 'ad_landscape_image_url',
		'type' => 'file',
	) );
}