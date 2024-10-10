<header id="masthead" class="site-header header-1" role="banner">
    <div class="header-container">
        <div class="container header-main">
            <div class="header-left">
                <?php
                matico_site_branding();
                if (matico_is_woocommerce_activated()) {
                    ?>
                    <div class="site-header-cart header-cart-mobile">
                        <?php
                            matico_header_account();
                            matico_header_wishlist();
                            matico_cart_link(); 
                        ?>
                    </div>
                    <?php
                }
                ?>
                <?php matico_mobile_nav_button(); ?>
            </div>
            <div class="header-center header-product-search">
                <a href="#" class="dokan-search-popup-close"><i class="matico-icon-times-circle"></i></a>
                <?php 
                if(is_active_sidebar('header_dokan_search')){ 
                    dynamic_sidebar('header_dokan_search');  
                } 
                ?>
            </div>
            <div class="header-right desktop-hide-down">
                <div class="header-group-action">
                    <?php
                    matico_header_account();
                    if (matico_is_woocommerce_activated()) {
                        matico_header_wishlist();
                        matico_header_cart();
                    }
                    matico_language_switcher();
                    ?>
                </div>
            </div>
        </div>
        <div class="header-primary-wrapper">
            <div class="container header-primary-menu">
                <?php 
                category_beside_primary_menu();
                matico_primary_navigation(); ?>
            </div>
        </div>
    </div>
</header><!-- #masthead -->