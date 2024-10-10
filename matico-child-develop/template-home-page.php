<?php
/*
Template Name: Dizishore Home Page
*/

get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
			while ( have_posts() ) :
				the_post();

				do_action( 'matico_page_before' );

				get_template_part( 'content', 'page' );

				/**
				 * Functions hooked in to matico_page_after action
				 *
				 * @see matico_display_comments - 10
				 */
				do_action( 'matico_page_after' );

			endwhile; // End of the loop.
		?>
        <div data-elementor-type="wp-page" data-elementor-id="798" class="elementor elementor-798">
        <?php
            /**
            * Functions hooked in to home_page sections
            *
            * @see dizishore_home_page_banner - 10
            * @see dizishore_home_page_ad_after_banner - 15
            * @see dizishore_home_page_product_tab_list - 20
            * @see dizishore_home_page_ads_section - 30
            * @see dizishore_home_page_popular_categories - 40
            * @see dizishore_home_page_top_selling - 50
            * @see dizishore_home_page_ad_middle - 55
            * @see dizishore_home_page_special_offer - 60
            * @see dizishore_home_page_top_rated - 70
            * @see dizishore_home_page_bottom_add_section - 80
            * @see dizishore_home_page_ad_before_newslatter - 90
            * @see dizishore_home_page_newslatter - 100
            */
            do_action('dizishore_home_page_template_part');
        ?>
        </div>
    </main>
<!-- #main -->
</div>
<!-- #primary -->
<?php
get_footer();