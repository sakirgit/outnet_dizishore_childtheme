(function ($) {
  // 'use strict';
  var MaticoChildThemeConfig = {
    init: function () {
      this.bindEvents();
      this.stickySidebarCart();
      this.stickyMainMenu();
      // this.stickySingleProductTab();
      // this.couponSlider();
      // this.compareButtonText();
      //this.hideMenuOnClick();
      this.backMenuForMenu();
      this.hideBackMenuForDesktop();
      this.makeProductTableAccordion();
      this.makeOrderTableAccordion();
      this.crossSellsCarousel();
      this.addClassToSidebarAdsWidget();
      this.moveMoreCategoryToBottom();
      this.directBuyNow();
    },
    bindEvents: function () {
      var self = this;
      
        $(window).on('load', function() {
            $('#dummy_sidebar_cart').removeClass('active').removeAttr('style');
            $('#dummy_product_gallary').remove();
        });

      //Add support url for affiliate registration because it has no wp hook or template override feature on slicewp plugin.
      $('.slicewp-field-wrapper-terms-and-conditions a').attr('href', 'https://support.dizishore.com/support/solutions/articles/101000436262-affiliate-policy');

      //Active or deactive mobile search
      $('#mobileSearchTrigger').click(function (e) {
        e.preventDefault();
        $('.header-center.header-product-search').addClass('active');
        $('.cart-side-overlay').addClass('active');
      });

      $('.dokan-search-popup-close, .cart-side-overlay').click(function (e) {
        e.preventDefault();
        $('.header-center.header-product-search').removeClass('active');
        $('.cart-side-overlay').removeClass('active');
      });

      //tab click to scroll top
      $(".description_tab").addClass("active");
      $(".woo-tab-action").click(function () {
        $(this).closest(".wc-tabs").find("li").removeClass("active");
        var target = $(this).attr("href");
        self.singleTabClickToScroll(target);
      });

      //show hide dokan vendor dashboard menu
      $(".dokan-dashboard-menu-trigger").on("click", function () {
        $(this).toggleClass("active");
        $("ul.dokan-dashboard-menu").toggle();
      });

      if ($(window).width() <= 767) {
        $(
          ".dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.settings > a"
        ).on("click", function (e) {
          e.preventDefault();
          $(
            ".dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.settings"
          ).toggleClass("active");
        });
      }
      $(".dokan-dash-filter-menu").on("click", function (e) {
        e.preventDefault();
        $(this).toggleClass("active");
        $(
          ".dokan-product-listing .dokan-product-listing-area .product-listing-top, .dokan-product-listing .dokan-product-listing-area .dokan-w12, .dokan-dashboard .dokan-dashboard-content.dokan-orders-content .dokan-orders-area .order-statuses-filter, .dokan-dashboard .dokan-dashboard-content.dokan-orders-content .dokan-orders-area .dokan-order-filter-serach, .dokan-store-support-ticket-search-form, ul.dokan-support-topic-counts.subsubsub, .dokan-dashboard-content.dokan-reviews-content .dokan-comments-wrap div#dokan-comments_menu, .dokan-dashboard-content.dokan-reviews-content .dokan-comments-wrap .dokan-form-group, .dokan-withdraw-status-filter-container"
        ).toggle();
        $(
          ".dokan-product-listing .dokan-product-listing-area .product-listing-top, .dokan-product-listing .dokan-product-listing-area .dokan-w12, .dokan-dashboard .dokan-dashboard-content.dokan-orders-content .dokan-orders-area .order-statuses-filter, .dokan-dashboard .dokan-dashboard-content.dokan-orders-content .dokan-orders-area .dokan-order-filter-serach, .dokan-store-support-ticket-search-form, ul.dokan-support-topic-counts.subsubsub, .dokan-dashboard-content.dokan-reviews-content .dokan-comments-wrap div#dokan-comments_menu, .dokan-dashboard-content.dokan-reviews-content .dokan-comments-wrap .dokan-form-group, .dokan-withdraw-status-filter-container"
        ).toggleClass("active");
      });

      if (typeof $.fn.select2 !== 'undefined') {
        $( ".dokan-product-search #cat, #dokan_address_country, .dokan-dashboard-content #product_cat").select2();
      }

      //login register form show/hide handle on mobile screen
      $(".register-now-trigger button").on("click", function (e) {
        $(".woo-login-form, .register-now-trigger").removeClass("active");
        $(".woo-register-form, .login-now-trigger").addClass("active");
      });
      $(".login-now-trigger button").on("click", function (e) {
        $(".woo-login-form, .register-now-trigger").addClass("active");
        $(".woo-register-form, .login-now-trigger").removeClass("active");
      });
      $(".td-mobile-head").on("click", function (e) {
        // e.preventDefault();
        $(this).closest("tr").toggleClass("show-hidden-td");
      });
    },
    directBuyNow: function(){
      //Direct buy now
      $( '.buy-now' ).click( function( event ) {
        event.preventDefault();

        var quantityBox = $(this).parent().find('.qty'),
        currentQuantity = parseFloat(quantityBox.val()),
        productID = $(this).attr('data-id'),
        self = $(this);
    
        const data = {
            product_id: productID,
            quantity: currentQuantity,
        }

        $.ajax( {
            type: 'POST',
            url: wc_add_to_cart_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'add_to_cart' ),
            data: data,
            dataType: 'json',
            beforeSend: function( xhr ) {
              self.addClass('loading');
            },
            success: function( res ) {
              // $( document.body ).trigger( 'added_to_cart', [ res.fragments, res.cart_hash ] );
              if (res.error && res.product_url) {
                window.location = res.product_url;
                return;
              }
              // Redirect to checkout page after successful addition
              window.location.href = matico_child_script_obj.checkout_page_url;
            },
        });
      } );
    },
    moveMoreCategoryToBottom: function(){
      var moreCategory = $('li.cat-item.cat-item-318.cat-parent.opened');
  
      if (moreCategory.length) {
          moreCategory.detach();
          $('ul.product-categories').append(moreCategory);
      }
    },
    addClassToSidebarAdsWidget: function (){
        // Find the closest parent with the class .widget
        var closestWidget = $('.dizishore-adsense-ad').closest('.widget');
        
        // Optionally, do something with the closest widget
        if (closestWidget.length) {
            // Example: add a class or do something with the closest widget
            closestWidget.addClass('dizishore-sidebar-ad-widget');
        }
    },
    makeProductTableAccordion: function () {
      $(document).ready(function () {
        if ($(window).width() < 767) {
          $("#dokan-product-list-table tr td").hide();
          $("#dokan-product-list-table tr th").click(function () {
            var index = $(this).index();
            $(this).closest("tr").find("td").toggle();
            $(this).closest("tr").find("td").toggleClass("t-block");
          });

          // Iterate over each table row
          $("#dokan-product-list-table tr").each(function () {
            var $checkbox = $(this).find(
              "th.dokan-product-select.check-column input.dokan-checkbox"
            );
            var productTitle = $checkbox.attr("data-product-name");
            $('<span class="product-title">')
              .text(productTitle)
              .appendTo($checkbox.parent());
            $("<span>").addClass("matico-icon").appendTo($checkbox.parent());
          });
        }
      });
    },
    makeOrderTableAccordion: function () {
      $(document).ready(function () {
        if ($(window).width() < 767) {
          $("#order-filter table tr td").hide();
          $("#order-filter table tr th").click(function () {
            var index = $(this).index();
            $(this).closest("tr").find("td").toggle();
            $(this).closest("tr").find("td").toggleClass("t-block");
          });

          // Iterate over each table row
          $("#order-filter table tr").each(function () {
            var $checkbox = $(this).find(
              "th.dokan-order-select.check-column input.dokan-checkbox"
            );
            var $orderId = $(this).find(
              "td.dokan-order-id.column-primary a strong"
            );
            var ordertTitle = $orderId.text();
            $('<span class="product-title">')
              .text(ordertTitle)
              .appendTo($checkbox.parent());
            $("<span>").addClass("matico-icon").appendTo($checkbox.parent());
          });
        }
      });
    },
    singleTabClickToScroll: function (target) {
      $("html, body").animate(
        {
          scrollTop: $(target).offset().top - 100,
        },
        500
      );
    },
    stickySidebarCart: function () {
      var self = this;
      self.stickyProductExtra();

      $(window).resize(function () {
        self.stickyProductExtra();
      });
    },
    stickyProductExtra: function () {
      windowsize = $(window).width();
      if (windowsize > 1200) {
        $(".matico-single-product-extra").scrollFix({
          topPosition: 70,
        });
      } else if (windowsize < 1200 && windowsize >= 1025) {
        $(".matico-single-product-extra").scrollFix({
          topPosition: 10,
        });
      }
    },
    stickySingleProductTab: function () {
      $(".woocommerce-tabs-scroll.wc-tabs-wrappers ul.tabs.wc-tabs").scrollFix({
        topPosition: 20,
      });
    },
    stickyMainMenu: function () {
      $(".header-primary-wrapper").scrollFix({
        topPosition: 0,
      });
    },
    couponSlider: function () {
      if ($("#single-coupon-slider").length) {
        $("#single-coupon-slider").slick({
          infinite: false,
          slidesToShow: 2,
          slidesToScroll: 2,
          // centerMode: true,
          // centerPadding: '10px',
          responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              },
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              },
            },
          ],
        });
      }
    },
    crossSellsCarousel: function () {
      $(document).ready(function () {
        var csell_wrap = $("body.woocommerce-cart .cross-sells ul.products");
        if(csell_wrap.length){
          var item = csell_wrap.find("li.product");

          csell_wrap.slick("unslick"); // Destroy current slider.

          if (item.length > 5) {
            csell_wrap.slick({
              dots: true,
              arrows: false,
              infinite: false,
              speed: 300,
              slidesToShow: parseInt(5),
              autoplay: false,
              slidesToScroll: 1,
              lazyLoad: "ondemand",
              responsive: [
                {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: parseInt(4),
                  },
                },
                {
                  breakpoint: 991,
                  settings: {
                    slidesToShow: parseInt(3),
                  },
                },
                {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: parseInt(1),
                  },
                },
              ],
            });
          }
        }
      });
    },
    compareButtonText: function () {
      $(window).load(function () {
        if ($(".woosc-btn").hasClass("woosc-added")) {
          $(".woosc-btn").text("Added");
        }
      });
    },
    backMenuForMenu: function () {
      if ($(window).width() < 768) {
        $(".woocommerce-MyAccount-navigation").hide();

        // Show the navigation menu when the "Go Back" button is clicked
        $(".go-back-menu").click(function () {
          $(".woocommerce-MyAccount-navigation").toggle();

          var isVisible = $(".woocommerce-MyAccount-navigation").is(":visible");

          // Show/hide arrow icons based on visibility
          if (isVisible) {
            $(".down-icon-arrow").show();
            $(".up-icon-arrow").hide();
          } else {
            $(".down-icon-arrow").hide();
            $(".up-icon-arrow").show();
          }
        });
      }
    },
    hideBackMenuForDesktop: function () {
      if ($(window).width() > 768) {
        $(".menu-back-div").hide();
      }
    },
  };
  MaticoChildThemeConfig.init();

  $(document).on('woosq_loaded qv_loader_stop updated_wc_div matico-products-loaded',function () {
    MaticoChildThemeConfig.directBuyNow();
  });
})(jQuery);