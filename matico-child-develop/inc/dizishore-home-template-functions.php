<?php
/**
 * Load dizishore home page template parts [start]
 */
add_action('dizishore_home_page_template_part', 'dizishore_home_page_banner', 10);
add_action('dizishore_home_page_template_part', 'dizishore_home_page_ad_after_banner', 15);
add_action('dizishore_home_page_template_part', 'dizishore_home_page_product_tab_list', 20);
add_action('dizishore_home_page_template_part', 'dizishore_home_page_special_offer', 25);
add_action('dizishore_home_page_template_part', 'dizishore_home_page_ads_section', 30);
add_action('dizishore_home_page_template_part', 'dizishore_home_page_popular_categories', 40);
add_action('dizishore_home_page_template_part', 'dizishore_home_page_top_selling', 50);
add_action('dizishore_home_page_template_part', 'dizishore_home_page_ad_middle', 55);
add_action('dizishore_home_page_template_part', 'dizishore_home_page_top_rated', 70);
add_action('dizishore_home_page_template_part', 'dizishore_home_page_bottom_add_section', 80);
add_action('dizishore_home_page_template_part', 'dizishore_home_page_ad_before_newslatter', 90);
add_action('dizishore_home_page_template_part', 'dizishore_home_page_newslatter', 100);

function dizishore_home_page_banner(){
    return get_template_part( 'template-parts/home-page/banner' );
}

function dizishore_home_page_product_tab_list(){
    return get_template_part( 'template-parts/home-page/product-tab-list' );
}

function dizishore_home_page_popular_categories(){
    return get_template_part( 'template-parts/home-page/popular-categories' );
}

function dizishore_home_page_ads_section(){
    return get_template_part( 'template-parts/home-page/ads-section' );
}

function dizishore_home_page_top_selling(){
    return get_template_part( 'template-parts/home-page/top-selling' );
}

function dizishore_home_page_special_offer(){
    return get_template_part( 'template-parts/home-page/special-offer' );
}

function dizishore_home_page_top_rated(){
    return get_template_part( 'template-parts/home-page/top-rated' );
}

function dizishore_home_page_bottom_add_section(){
    return get_template_part( 'template-parts/home-page/bottom-addd-section' );
}

function dizishore_home_page_newslatter(){
    return get_template_part( 'template-parts/home-page/newslatter' );
}

function dizishore_home_page_ad_after_banner(){
    if ( !empty(get_theme_mod( 'dizishore_adsense_ad_one', '' )) ){
        return get_template_part( 'template-parts/home-page/ad-slot-one' ); 
    }
}

function dizishore_home_page_ad_middle(){
    if ( !empty(get_theme_mod( 'dizishore_adsense_ad_two', '' )) ){
        return get_template_part( 'template-parts/home-page/ad-slot-two' ); 
    }
}

function dizishore_home_page_ad_before_newslatter(){
    if ( !empty(get_theme_mod( 'dizishore_adsense_ad_three', '' )) ){
        return get_template_part( 'template-parts/home-page/ad-slot-three' ); 
    }
}
/**
 * Load dizishore home page template parts [end]
 */