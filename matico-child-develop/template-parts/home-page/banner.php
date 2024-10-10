<?php
do_action('before_dizishore_banner_section');

$left_banner_image = get_post_meta( get_the_ID(), 'left_banner_image', true );
$left_banner_title_sm = get_post_meta( get_the_ID(), 'left_banner_title_sm', true );
$left_banner_title_lg = get_post_meta( get_the_ID(), 'left_banner_title_lg', true );
$left_banner_price_text = get_post_meta( get_the_ID(), 'left_banner_price_text', true );
$left_banner_price = get_post_meta( get_the_ID(), 'left_banner_price', true );
$left_banner_btn_txt = get_post_meta( get_the_ID(), 'left_banner_btn_txt', true );
$left_banner_btn_link = get_post_meta( get_the_ID(), 'left_banner_btn_link', true );
$popular_categories = get_post_meta( get_the_ID(), 'popular_categories', true );

global $opt_dizishore_;


//Top categories slug
$top_product_categories = !empty($popular_categories) ? $popular_categories : [];
$top_product_categories_slug = apply_filters('dizishore_top_product_categories', $top_product_categories, get_the_ID());
?>
<div id="hero-area" class="elementor-section pb-60 mb-0 elementor-top-section elementor-element elementor-element-9558e36 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="9558e36" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}" style="width: 1680px; left: 0px;">
    <div class="elementor-container elementor-column-gap-no banner-area-main-container">
        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-976160b banner-big-image" data-id="976160b" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-eb8503d elementor-cta--valign-top button-banner-style-matico-default elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-matico-banner" data-id="eb8503d" data-element_type="widget" data-widget_type="matico-banner.default">
                    <div class="elementor-widget-container">
                    <a href="<?php echo !empty($left_banner_btn_link) ? $left_banner_btn_link : wc_get_page_permalink( 'shop' ); ?>" class="elementor-cta--skin-cover elementor-cta elementor-matico-banner hero-big-image">
                        <?php if(!empty($left_banner_image)): ?>
                        <img src="<?php echo esc_attr( $left_banner_image ); ?>" width="345" height="405" alt="<?php echo esc_attr( $left_banner_title_sm ); ?>">
                        <?php endif; ?>
                        <div class="elementor-cta__content home-lg-banner-text">
                            <div class="elementor-cta__content_inner">
                                <?php if(!empty($left_banner_title_sm)): ?>
                                <div class="elementor-cta__subtitle elementor-cta__content-item elementor-content-item">
                                    <span class="banner-sub-title"><?php echo esc_html($left_banner_title_sm); ?></span>
                                </div>
                                <?php endif; ?>

                                <?php if(!empty($left_banner_title_lg)): ?>
                                <h3 class="elementor-cta__title elementor-cta__content-item elementor-content-item">
                                    <?php echo esc_html($left_banner_title_lg); ?>                      
                                </h3>
                                <?php endif; ?>

                                <?php if(!empty($left_banner_price_text) && !empty($left_banner_price)): ?>
                                <div class="elementor-cta__description elementor-cta__content-item elementor-content-item">
                                    <?php echo $left_banner_price_text; ?> <span class="banner-or-price"><?php echo get_woocommerce_currency_symbol() . $left_banner_price; ?></span>                        
                                </div>
                                <?php endif; ?>

                                <?php if(!empty($left_banner_btn_link)): ?>
                                <div class="elementor-cta__button-wrapper elementor-cta__content-item elementor-content-item banner-area-btn">
                                    <span class="elementor-cta__button elementor-button">
                                        <i class="matico-icon-long-arrow-right left"></i>
                                        <span><?php echo esc_html($left_banner_btn_txt) ?? esc_html__('Shop Now', 'matico-child'); ?></span>
                                            <i class="matico-icon-long-arrow-right right"></i>
                                    </span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-0f9a16e banner-area-category-wrapper" data-id="0f9a16e" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated banner-area-category-row">
                <?php
                    $total_categories = count($top_product_categories_slug);
                    
                    $categories_obj = [];
                    
                    //get categories data by array of slugs
                    if($total_categories > 0){
                        $categories_obj = get_terms(array(
                            'taxonomy' => 'product_cat',
                            'slug'     => $top_product_categories_slug,
                            'hide_empty' => false
                        ));
                    }

                    
                    // var_dump($total_categories);
                    if($total_categories > 2){
                        for( $i = 0; $i <= 2; $i++ ){
                            $category_obj = $categories_obj[$i];
                            if(!empty($category_obj)){
                                $image_id = get_term_meta( $category_obj->term_id, 'thumbnail_id', true );
                                $category_thumbnail_img = wp_get_attachment_image_src( $image_id, 'large' );
                            ?>
                            <div class="elementor-element elementor-element-13c0d09 elementor-cta--valign-top elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-matico-banner" data-id="54e6616" data-element_type="widget" data-widget_type="matico-banner.default">
                                <div class="elementor-widget-container">
                                    <a href="<?php echo get_category_link($category_obj->term_id); ?>" class="elementor-cta--skin-cover elementor-cta elementor-matico-banner hero-top-category-box">
                                        <div class="elementor-cta__bg-wrappers">
                                            <div class="elementor-cta__bgs elementor-bgs">
                                                <img src="<?php echo isset( $category_thumbnail_img ) && is_array( $category_thumbnail_img ) ? esc_attr( $category_thumbnail_img[0] ) : wc_placeholder_img_src(); ?>" width="326" height="190" alt="<?php echo esc_attr( $category_obj->name ); ?>">
                                            </div>
                                            <div class="elementor-cta__bg-overlay"></div>
                                        </div>
                                        <div class="elementor-cta__content hero-top-category-box-content">
                                            <div class="elementor-cta__content_inner">
                                                <div class="elementor-cta__subtitle elementor-cta__content-item elementor-content-item">
                                                <span><?php echo esc_html($category_obj->name); ?></span>
                                                </div>
                                                <div class="elementor-cta__description elementor-cta__content-item elementor-content-item"><?php echo esc_html($category_obj->description); ?></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                            }
                        }
                    }
                ?>
            </div>
        </div>
        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-0f9a16e banner-area-category-wrapper" data-id="f005fa1" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated banner-area-category-row">
                <?php
                if($total_categories > 3){
                    for( $i = 3; $i <= 5; $i++ ){
                        $category_obj = $categories_obj[$i];
                        if(!empty($category_obj)){
                            $image_id = get_term_meta( $category_obj->term_id, 'thumbnail_id', true );
                            $category_thumbnail_img = wp_get_attachment_image_src( $image_id, 'large' );
                ?>
                <div class="elementor-element elementor-element-13c0d09 elementor-cta--valign-top elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-matico-banner" data-id="54e6616" data-element_type="widget" data-widget_type="matico-banner.default">
                    <div class="elementor-widget-container">
                        <a href="<?php echo get_category_link($category_obj->term_id); ?>" class="elementor-cta--skin-cover elementor-cta elementor-matico-banner hero-top-category-box">
                            <div class="elementor-cta__bg-wrappers">
                                <div class="elementor-cta__bgs elementor-bgs">
                                    <img src="<?php echo isset( $category_thumbnail_img ) && is_array( $category_thumbnail_img ) ? esc_attr( $category_thumbnail_img[0] ) : wc_placeholder_img_src(); ?>" width="326" height="190" alt="<?php echo esc_attr( $category_obj->name ); ?>">
                                </div>
                                <div class="elementor-cta__bg-overlay"></div>
                            </div>
                            <div class="elementor-cta__content hero-top-category-box-content">
                                <div class="elementor-cta__content_inner">
                                    <div class="elementor-cta__subtitle elementor-cta__content-item elementor-content-item">
                                    <span><?php echo esc_html($category_obj->name); ?></span>
                                    </div>
                                    <div class="elementor-cta__description elementor-cta__content-item elementor-content-item"><?php echo esc_html($category_obj->description); ?></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php do_action('after_dizishore_banner_section'); ?>