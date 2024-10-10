<?php

/*Theme colors settings*/
new \Kirki\Panel(
	'dizishore_panel_id',
	[
		'priority'    => 10,
		'title'       => esc_html__( 'Dizishore Settings', 'matico-child' ),
		'description' => esc_html__( 'Dizishore Settings.', 'matico-child' ),
	]
);
new \Kirki\Section(
	'dizishore_section_id',
	[
		'title'       => esc_html__( 'Color Settings', 'matico-child' ),
		'panel'       => 'dizishore_panel_id',
		'priority'    => 160,
	]
);
new \Kirki\Field\Color(
	[
		'settings'    => 'dizishore_primary_color',
		'label'       => __( 'Primary Color', 'matico-child' ),
		'section'     => 'dizishore_section_id',
		'default'     => '#E57C41',
	]
);
new \Kirki\Field\Color(
	[
		'settings'    => 'dizishore_primary_color_hover',
		'label'       => __( 'Primary Hover Color', 'matico-child' ),
		'section'     => 'dizishore_section_id',
		'default'     => '#e16a27',
	]
);
new \Kirki\Field\Color(
	[
		'settings'    => 'dizishore_secondary_color',
		'label'       => __( 'Secondary Color', 'matico-child' ),
		'section'     => 'dizishore_section_id',
		'default'     => '#143086',
	]
);
new \Kirki\Field\Color(
	[
		'settings'    => 'dizishore_secondary_color_hover',
		'label'       => __( 'Secondary Hover Color', 'matico-child' ),
		'section'     => 'dizishore_section_id',
		'default'     => '#122b78',
	]
);
new \Kirki\Field\Color(
	[
		'settings'    => 'dizishore_text_color',
		'label'       => __( 'Text Color', 'matico-child' ),
		'section'     => 'dizishore_section_id',
		'default'     => '#444444',
	]
);
new \Kirki\Field\Color(
	[
		'settings'    => 'dizishore_accent_color',
		'label'       => __( 'Accent Color', 'matico-child' ),
		'section'     => 'dizishore_section_id',
		'default'     => '#000000',
	]
);
new \Kirki\Field\Color(
	[
		'settings'    => 'dizishore_lighter_color',
		'label'       => __( 'Lighter Color', 'matico-child' ),
		'section'     => 'dizishore_section_id',
		'default'     => '#999999',
	]
);
new \Kirki\Field\Color(
	[
		'settings'    => 'dizishore_highlight_color',
		'label'       => __( 'Highlight Color', 'matico-child' ),
		'section'     => 'dizishore_section_id',
		'default'     => '#E56D6D',
	]
);
new \Kirki\Field\Color(
	[
		'settings'    => 'dizishore_border_color',
		'label'       => __( 'Border Color', 'matico-child' ),
		'section'     => 'dizishore_section_id',
		'default'     => '#E6E6E6',
	]
);

/*Social settings*/
new \Kirki\Section(
	'dizishore_social_section_id',
	[
		'title'       => esc_html__( 'Social Settings', 'matico-child' ),
		'panel'       => 'dizishore_panel_id',
		'priority'    => 160,
	]
);
new \Kirki\Field\Text(
	[
		'settings' => 'dizishore_social_title',
		'label'    => esc_html__( 'Title', 'matico-child' ),
		'section'  => 'dizishore_social_section_id',
		'priority' => 10,
	]
);
new \Kirki\Field\Text(
	[
		'settings' => 'dizishore_social_twitter',
		'label'    => esc_html__( 'Twitter Profile Link', 'matico-child' ),
		'section'  => 'dizishore_social_section_id',
		'priority' => 10,
	]
);
new \Kirki\Field\Text(
	[
		'settings' => 'dizishore_social_youtube',
		'label'    => esc_html__( 'Youtube Channel Link', 'matico-child' ),
		'section'  => 'dizishore_social_section_id',
		'priority' => 10,
	]
);
new \Kirki\Field\Text(
	[
		'settings' => 'dizishore_social_faceboook',
		'label'    => esc_html__( 'Facebook Profile Link', 'matico-child' ),
		'section'  => 'dizishore_social_section_id',
		'priority' => 10,
	]
);
new \Kirki\Field\Text(
	[
		'settings' => 'dizishore_social_insta',
		'label'    => esc_html__( 'Instagram Profile Link', 'matico-child' ),
		'section'  => 'dizishore_social_section_id',
		'priority' => 10,
	]
);


/*AdSense Ads settings*/
new \Kirki\Section(
	'dizishore_adsense_section_id',
	[
		'title'       => esc_html__( 'AdSense Settings', 'matico-child' ),
		'panel'       => 'dizishore_panel_id',
		'priority'    => 160,
	]
);
new \Kirki\Field\Code(
	[
		'settings' => 'dizishore_adsense_ad_one',
		'label'    => esc_html__( 'Ad One', 'matico-child' ),
		'section'  => 'dizishore_adsense_section_id',
		'priority' => 10,
		'description' => esc_html__( 'This advertisement will be displayed on the home page beneath the banner section and will also appear below the product review section on a single product page.', 'matico-child' ),
		'choices'     => [
			'language' => 'html',
		],
	]
);
new \Kirki\Field\Code(
	[
		'settings' => 'dizishore_adsense_ad_two',
		'label'    => esc_html__( 'Ad Two', 'matico-child' ),
		'section'  => 'dizishore_adsense_section_id',
		'priority' => 10,
		'description' => esc_html__( 'This advertisement will be displayed on the home page beneath the top selling vendor section and will also appear below the product inquiry section on a single product page.', 'matico-child' ),
		'choices'     => [
			'language' => 'html',
		],
	]
);
new \Kirki\Field\Code(
	[
		'settings' => 'dizishore_adsense_ad_three',
		'label'    => esc_html__( 'Ad Three', 'matico-child' ),
		'section'  => 'dizishore_adsense_section_id',
		'priority' => 10,
		'description' => esc_html__( 'This advertisement will be displayed on the home page beneath the top top rated section and will also appear before the recently product section on a single product page.', 'matico-child' ),
		'choices'     => [
			'language' => 'html',
		],
	]
);
new \Kirki\Field\Code(
	[
		'settings' => 'dizishore_adsense_ad_blog_sidebar',
		'label'    => esc_html__( 'Blog Sidebar Ad', 'matico-child' ),
		'section'  => 'dizishore_adsense_section_id',
		'priority' => 10,
		'description' => esc_html__( 'This advertisement will be displayed on the Blog list page sidebar. Shortcode: [blog_list_sidebar_ads]', 'matico-child' ),
		'choices'     => [
			'language' => 'html',
		],
	]
);
new \Kirki\Field\Code(
	[
		'settings' => 'dizishore_adsense_ad_blog_single_sidebar',
		'label'    => esc_html__( 'Blog Details Page Sidebar Ad', 'matico-child' ),
		'section'  => 'dizishore_adsense_section_id',
		'priority' => 10,
		'description' => esc_html__( 'This advertisement will be displayed on the blog details page sidebar. Shortcode: [blog_details_sidebar_ads]', 'matico-child' ),
		'choices'     => [
			'language' => 'html',
		],
	]
);
new \Kirki\Field\Code(
	[
		'settings' => 'dizishore_adsense_ad_blog_after_p1',
		'label'    => esc_html__( 'Blog Ad After 1st Para', 'matico-child' ),
		'section'  => 'dizishore_adsense_section_id',
		'priority' => 10,
		'description' => esc_html__( 'This advertisement will be displayed on the blog details page after first para. Shortcode: [blog_ads_after_first_para]', 'matico-child' ),
		'choices'     => [
			'language' => 'html',
		],
	]
);
new \Kirki\Field\Code(
	[
		'settings' => 'dizishore_adsense_ad_blog_after_p4',
		'label'    => esc_html__( 'Blog Ad After 4th Para', 'matico-child' ),
		'section'  => 'dizishore_adsense_section_id',
		'priority' => 10,
		'description' => esc_html__( 'This advertisement will be displayed on the blog details page after the fourth paragraph. Shortcode: [blog_ads_after_fourth_para]', 'matico-child' ),
		'choices'     => [
			'language' => 'html',
		],
	]
);

/*Dokan Vendor Product Ads settings*/
new \Kirki\Section(
	'dizishore_dokan_vendor_ads_section_id',
	[
		'title'       => esc_html__( 'Dokan Vendor Ads Settings', 'matico-child' ),
		'panel'       => 'dizishore_panel_id',
		'priority'    => 160,
	]
);
// new \Kirki\Field\Select(
// 	[
// 		'settings' => 'dizishore_vendor_ad_one',
// 		'label'    => esc_html__( 'Ad One', 'matico-child' ),
// 		'section'  => 'dizishore_dokan_vendor_ads_section_id',
// 		'priority' => 10,
// 		'description' => esc_html__( 'This advertisement will be displayed on the home page left side of tab section products and will also appear below the sidebar add to cart box on a single product page.', 'matico-child' ),
// 		'choices'     => Kirki\Util\Helper::get_posts(
// 			array(
// 				'posts_per_page' => -1,
// 				'post_type'      => 'product'
// 			) ,
// 		),
// 	]
// );
// new \Kirki\Field\Select(
// 	[
// 		'settings' => 'dizishore_vendor_ad_two',
// 		'label'    => esc_html__( 'Ad Two', 'matico-child' ),
// 		'section'  => 'dizishore_dokan_vendor_ads_section_id',
// 		'priority' => 10,
// 		'description' => esc_html__( 'This advertisement will be displayed on the home page left side of tab section products and will also appear below the sidebar add to cart box on a single product page.', 'matico-child' ),
// 		'choices'     => Kirki\Util\Helper::get_posts(
// 			array(
// 				'posts_per_page' => -1,
// 				'post_type'      => 'product'
// 			) ,
// 		),
// 	]
// );

// new \Kirki\Field\Select(
// 	[
// 		'settings' => 'dizishore_vendor_ad_three',
// 		'label'    => esc_html__( 'Ad Three', 'matico-child' ),
// 		'section'  => 'dizishore_dokan_vendor_ads_section_id',
// 		'priority' => 10,
// 		'description' => esc_html__( 'This advertisement will be displayed on the home page below the special offer section and will also appear below the description section on a single product page.', 'matico-child' ),
// 		'choices'     => Kirki\Util\Helper::get_posts(
// 			array(
// 				'posts_per_page' => -1,
// 				'post_type'      => 'product'
// 			) ,
// 		),
// 	]
// );
// new \Kirki\Field\Select(
// 	[
// 		'settings' => 'dizishore_vendor_ad_four',
// 		'label'    => esc_html__( 'Ad Four', 'matico-child' ),
// 		'section'  => 'dizishore_dokan_vendor_ads_section_id',
// 		'priority' => 10,
// 		'description' => esc_html__( 'This advertisement will be displayed on the home page below the special offer section and will also appear below the description section on a single product page.', 'matico-child' ),
// 		'choices'     => Kirki\Util\Helper::get_posts(
// 			array(
// 				'posts_per_page' => -1,
// 				'post_type'      => 'product'
// 			) ,
// 		),
// 	]
// );
// new \Kirki\Field\Select(
// 	[
// 		'settings' => 'dizishore_vendor_ad_five',
// 		'label'    => esc_html__( 'Ad Five', 'matico-child' ),
// 		'section'  => 'dizishore_dokan_vendor_ads_section_id',
// 		'priority' => 10,
// 		'description' => esc_html__( 'This advertisement will be displayed on the home page below the special offer section and will also appear below the description section on a single product page.', 'matico-child' ),
// 		'choices'     => Kirki\Util\Helper::get_posts(
// 			array(
// 				'posts_per_page' => -1,
// 				'post_type'      => 'product'
// 			) ,
// 		),
// 	]
// );


new \Kirki\Field\Repeater(
	[
		'settings' => 'vendor_ads_from_admin',
		'label'    => esc_html__( 'Vendor Ads', 'matico-child' ),
		'section'  => 'dizishore_dokan_vendor_ads_section_id',
		'description' => esc_html__( 'This advertisements will be displayed on the home page and will also appear on the single product page.', 'matico-child' ),
		'priority' => 10,
		'row_label'    => [
			'type'  => 'field',
			'value' => esc_html__( 'Vendor Ad', 'matico-child' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__( 'Add New Ad', 'matico-child' ),
		'fields'   => [
			'product_id' => [
				'type'        => 'select',
				'label'       => esc_html__( 'Select Product', 'matico-child' ),
				'description' => esc_html__( 'Description', 'matico-child' ),
				'choices'     => Kirki\Util\Helper::get_posts(
					array(
						'posts_per_page' => -1,
						'post_type'      => 'product'
					) ,
				),
			],
		],
	]
);


/*Video settings*/
new \Kirki\Section(
	'dizishore_video_section_id',
	[
		'title'       => esc_html__( 'Video Settings', 'matico-child' ),
		'panel'       => 'dizishore_panel_id',
		'priority'    => 160,
	]
);
new \Kirki\Field\Text(
	[
		'settings' => 'dizishore_product_video_limit',
		'label'    => esc_html__( 'Video Size Limit (MB)', 'matico-child' ),
		'section'  => 'dizishore_video_section_id',
		'priority' => 10,
		'default'  => 10,
	]
);

new \Kirki\Field\Multicheck(
	[
		'settings' => 'dizishore_product_video_types',
		'label'    => esc_html__( 'Video Types', 'matico-child' ),
		'section'  => 'dizishore_video_section_id',
		'default'  => [ 'mp4', 'webm' ],
		'priority' => 10,
		'choices'  => [
			'mp4' => esc_html__( 'MP4', 'matico-child' ),
			'webm' => esc_html__( 'WEBM', 'matico-child' ),
			'quicktime' => esc_html__( 'MOV', 'matico-child' ),
		],
	]
);


/*Footer copyright settings*/
new \Kirki\Section(
	'dizishore_footer_copy_section_id',
	[
		'title'       => esc_html__( 'Footer Settings', 'matico-child' ),
		'panel'       => 'dizishore_panel_id',
		'priority'    => 160,
	]
);
new \Kirki\Field\Editor(
	[
		'settings' => 'dizishore_footer_copy_text',
		'label'    => esc_html__( 'Copyright Text', 'matico-child' ),
		'section'  => 'dizishore_footer_copy_section_id',
		'priority' => 10,
	]
);

/* === Product category meta description settings === */
new \Kirki\Section(
	'dizishore_product_category_meta_desc_section_id',
	[
		'title'       => esc_html__( 'Product category meta description', 'matico-child' ),
		'panel'       => 'dizishore_panel_id',
		'priority'    => 170,
	]
);
new \Kirki\Field\Textarea(
	[
		'settings' => 'dizishore_product_category_meta_desc_text',
		'label'    => esc_html__( 'Product category meta description: ', 'matico-child' ),
		'section'  => 'dizishore_product_category_meta_desc_section_id',
		'priority' => 10,
	]
);

new \Kirki\Field\Textarea(
	[
		'settings' => 'dizishore_product_category_meta_desc_subcat_text',
		'label'    => esc_html__( 'Product category meta description (If subcategory): ', 'matico-child' ),
		'section'  => 'dizishore_product_category_meta_desc_section_id',
		'priority' => 10,
	]
);


