(function ($) {
    // 'use strict'; 

    $('.matico-single-product-extra').scrollFix();

    //Home page tab section
    if($(".elementor-product-tab-section .elementor-tab-title").length > 0){
        $(".elementor-product-tab-section .elementor-tab-title").on("click", function(e){
            var tabId = $(this).attr('id');
            $(".elementor-product-tab-section .elementor-tab-title").removeClass('elementor-active');
            $(this).addClass('elementor-active');

            $(`.elementor-product-tab-section .elementor-tab-content`).hide();
            $(`.elementor-product-tab-section [aria-labelledby="${tabId}"]`).show();
            
            //show hide view all button
            $(`.tab-view-all-link`).hide();
            $(`.tab-view-all-link[data-id="${tabId}"]`).show();
        });
    }

    //Home page category slider
    if($("#popular-category-slider").length){
        $('#popular-category-slider').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                    }
                },
                {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                    }
                },
                {
                breakpoint: 786,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                    }
                },
                {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                    }
                }
            ]
        });
    }

    //Home page top selling sellers
    if($("#top-selling-vendors").length){
        $('#top-selling-vendors').slick({
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 6,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                        }
                    },
                {
                breakpoint: 1024,
                settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                    }
                },
                {
                breakpoint: 786,
                settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                breakpoint: 480,
                settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }

    //Home page special offers
    if($("#special-offers-products ul.products").length){
        $('#special-offers-products ul.products').slick({
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 6,
            responsive: [
                {
                breakpoint: 1200,
                settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                breakpoint: 786,
                settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                breakpoint: 480,
                settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
})(jQuery);