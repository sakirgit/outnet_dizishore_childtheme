<?php
do_action('before_dizishore_popular_category_section');

$popular_category_title = get_post_meta( get_the_ID(), 'popular_category_title', true );
$matico_popular_cats_manually = get_post_meta( get_the_ID(), 'popular_category_ids', true );
$popular_cat_view_more_btn_text = get_post_meta( get_the_ID(), 'popular_cat_view_more_btn_text', true );

$automated_categories = apply_filters('dizishore_popular_categories', $matico_popular_cats_manually);

if(!empty($automated_categories) && count($automated_categories) > 0){
?>
<div id="popular-categories" class="pt-0 pb-60 elementor-section elementor-top-section elementor-element elementor-element-43a972f elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="43a972f" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}" style="width: 1680px; left: 0px;">
    <div class="elementor-container elementor-column-gap-no">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2f1c8f4" data-id="2f1c8f4" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-f042873 elementor-mobile-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="f042873" data-element_type="widget" data-widget_type="icon-list.default">
                    <div class="elementor-widget-container">
                    <ul class="elementor-icon-list-items">
                        <li class="elementor-icon-list-item">
                            <span class="elementor-icon-list-icon">
                                <svg aria-hidden="true" class="e-font-icon-svg e-fas-circle" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                </svg>
                            </span>
                            <span class="elementor-icon-list-text"><?php echo esc_html( $popular_category_title ); ?></span>
                        </li>
                    </ul>
                    </div>
                </div>
                <div class="elementor-section elementor-inner-section elementor-element elementor-element-fbfc124 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="fbfc124" data-element_type="section">
                    <div id="popular-category-slider" class="elementor-container elementor-column-gap-no <?php echo count($automated_categories) > 4 ? 'enabled' : ''; ?>">
                        
                        <?php
                        $categories_obj = [];
                        
                        //get categories data by array of slugs
                        $categories_obj = get_terms(array(
                            'taxonomy' => 'product_cat',
                            'slug'     => $automated_categories,
                            'hide_empty' => false
                        ));

                        foreach($categories_obj as $category_obj){
                            if( !empty($category_obj) ){
                                $image_src = get_term_meta( $category_obj->term_id, 'cat_box_trans_img', true );
                            ?>
                        <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-afb9c01" data-id="afb9c01" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-widget-wrap elementor-element-populated" style="background-image: url(<?php echo isset($image_src) ? $image_src : wc_placeholder_img_src(); ?>);">
                                <div class="elementor-element elementor-element-7b98c22 elementor-widget elementor-widget-heading" data-id="7b98c22" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h2 class="elementor-heading-title elementor-size-default"><?php echo $category_obj->name; ?></h2>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-32d7224 icon-list-style-matico-yes elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="32d7224" data-element_type="widget" data-widget_type="icon-list.default">
                                    <div class="elementor-widget-container category-list-wrapper">
                                        <ul class="elementor-icon-list-items">
                                            <?php
                                            $args = array(
                                                'taxonomy' => 'product_cat',
                                                'orderby' => 'name',
                                                'parent' => $category_obj->term_id,
                                                'show_count' => 0,
                                                'pad_counts' => 0,
                                                'hierarchical' => 1,
                                                'title_li' => '',
                                                'hide_empty' => false,
                                            );
                                    
                                            $sub_categories = get_categories( $args );


                                            if( $sub_categories ){
                                                $count = 0;
                                                foreach( $sub_categories as $sub_category ){
                                                $count++;
                                            ?>
                                            <li class="elementor-icon-list-item">
                                                <a href="<?php echo esc_url(get_category_link($sub_category->term_id)); ?>">
                                                    <span class="elementor-icon-list-text" title="<?php echo esc_attr($sub_category->name); ?>"><?php echo esc_html($sub_category->name); ?></span>
                                                </a>
                                            </li>
                                            <?php
                                                if($count == 5){
                                                    break;
                                                }
                                                    }
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-64d3679 elementor-widget elementor-widget-button" data-id="64d3679" data-element_type="widget" data-widget_type="button.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a href="<?php echo esc_url(get_category_link($category_obj->term_id)); ?>" class="elementor-button-link elementor-button" role="button">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-icon elementor-align-icon-before">
                                                        <i aria-hidden="true" class="matico-icon- matico-icon-long-arrow-right"></i>
                                                    </span>
                                                    <span class="elementor-button-text"><?php echo esc_html( $popular_cat_view_more_btn_text ); ?></span>
                                                    <span class="elementor-button-icon elementor-align-icon-after">
                                                        <i aria-hidden="true" class="matico-icon- matico-icon-long-arrow-right"></i>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                        } 
                    } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }

do_action('after_dizishore_popular_category_section');