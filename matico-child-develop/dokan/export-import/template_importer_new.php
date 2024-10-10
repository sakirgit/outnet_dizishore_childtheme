<?php
$permalink = get_permalink();
$parser = new Dokan_WXR_Parser();

?>

<?php do_action( 'dokan_dashboard_wrap_start' ); ?>

<div class="dokan-dashboard-wrap">
	<?php

        /**
         *  dokan_dashboard_content_before hook
         *  dokan_tools_content_before hook
         *
         *  @hooked get_dashboard_side_navigation
         *
         *  @since 2.4
         */
        do_action( 'dokan_dashboard_content_before' );
        do_action( 'dokan_tools_content_before' );
    ?>

	<div class="dokan-dashboard-content dokan-import-export-content">
		<?php

            /**
             *  dokan_tools_content_inside_before hook
             *
             *  @since 2.4
             */
            do_action( 'dokan_tools_content_inside_before' );
        ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="dokan-dashboard-header">
			    <h1 class="entry-title"><?php _e( 'Bulk', 'dokan' ); ?></h1>
			</header><!-- .-->

			<div id="tab-container">
				<ul class="dokan_tabs">
                    <?php if ( current_user_can( 'dokan_import_product' ) ): ?>
                    <li class="active">
                        <a href="#import" data-toggle="tab">
                            <?php _e( 'Import', 'dokan' ); ?>
                        </a>
                    </li>
                    <?php endif ?>

                    <?php if ( current_user_can( 'dokan_export_product' ) ): ?>
                    <li>
                        <a href="#export" data-toggle="tab">
                            <?php _e( 'Export', 'dokan' ); ?>
                        </a>
                    </li>
                    <?php endif ?>
				</ul>

				<!-- Tab panes -->
				<div class="tabs_container">
                    <?php if ( current_user_can( 'dokan_import_product' ) ): ?>
                    <div class="import_div import-export-panel tab-pane active" id="import">
                        <div class="import-block import-left">
                            <header class="dokan-import-export-header">
                                <h1 class="entry-title"><?php _e( 'Import XML', 'dokan' ); ?></h1>
                            </header>
                            <?php
                            if( isset( $_POST['import_xml'] ) ) {
                                if( empty( $_FILES['import'] ) ) {
                                    echo __( "Please select a xml file", 'dokan' );
                                }else {
                                    dokan_pro()->module->export_import->import( $_FILES['import']['tmp_name'] );
                                }
                            }

                            ?>
                            <p><?php _e( 'Click Choose file button and choose a XML file that you want to import.', 'dokan' ); ?></p>
                            <form method='post' enctype='multipart/form-data' action="">
                                <p><input type='file' name='import' /></p>
                                <input type='submit' name='import_xml' value='<?php _e( 'Import XML', 'dokan' ); ?>' class="btn btn-danger" />
                            </form>
                        </div>
                        <div class="import-block import-right">
                            <header class="dokan-import-export-header">
                                <h1 class="entry-title"><?php _e( 'Import CSV', 'dokan' ); ?></h1>
                            </header>
                            <p><?php _e( 'Click Import button to import CSV file.', 'dokan' ); ?></p>
                            <a href="<?php echo dokan_get_navigation_url( 'tools/csv-import' ) ?>" class="dokan-btn">
                                <?php _e( 'Import CSV', 'dokan' ) ?>
                            </a>
                        </div>
                    </div>
                    <?php endif ?>

                    <?php if ( current_user_can( 'dokan_export_product' ) ): ?>
                    <div class="export_div import-export-panel tab-pane" id="export">
                        <div class="import-block import-left">
                            <header class="dokan-import-export-header">
                                <h1 class="entry-title"><?php _e( 'Export XML', 'dokan' ); ?></h1>
                            </header>
                            <p><?php _e( 'Choose your type of product and click export button to export all data in XML form', 'dokan' ); ?></p>
                            <form action="" method="POST">
                                <div><input type="radio" name="content" value="all" id="export_all" checked="checked"> <label for="export_all"><?php _e( 'All', 'dokan' ); ?></label></div>
                                <div><input type="radio" name="content" value="product" id="export_product"> <label for="export_product"><?php _e( 'Product', 'dokan' ); ?></label></div>
                                <div><input type="radio" name="content" value="product_variation" id="export_variation_product"> <label for="export_variation_product"><?php _e( 'Variation', 'dokan' ); ?></label></div>
                                <input type="submit" name="export_xml" value="Export XML" class="btn btn-danger">
                            </form>
                        </div>
                        <div class="import-block import-right">
                            <header class="dokan-import-export-header">
                                <h1 class="entry-title"><?php _e( 'Export CSV', 'dokan' ); ?></h1>
                            </header>
                            <p><?php _e( 'Click export button to export all data in CSV form', 'dokan' ); ?></p>
                            <a href="<?php echo dokan_get_navigation_url( 'tools/csv-export' ) ?>" class="dokan-btn">
                                <?php _e( 'Export CSV', 'dokan' ) ?>
                            </a>
                        </div>
                    </div>
                    <?php endif ?>
				</div>
			</div>
		</article>

		<?php

            /**
             *  dokan_tools_content_inside_after hook
             *
             *  @since 2.4
             */
            do_action( 'dokan_tools_content_inside_after' );
        ?>

    </div><!-- .dokan-dashboard-content -->

	 <?php
        /**
         *  dokan_dashboard_content_after hook
         *  dokan_tools_content_after hook
         *
         *  @since 2.4
         */
        do_action( 'dokan_dashboard_content_after' );
        do_action( 'dokan_tools_content_after' );
    ?>

</div><!-- .dokan-dashboard-wrap -->

<?php do_action( 'dokan_dashboard_wrap_end' ); ?>

<script>
    (function($){
        $(document).ready(function(){
            // $('#tab-container').easytabs();
            // Initialize EasyTabs
            $('#tab-container').easytabs({
                updateHash: false
            });

            // Disable scroll to top on tab click
            $('#tab-container .etabs a').on('click', function(event) {
                // Prevent default anchor behavior
                event.preventDefault();

                // Switch tab manually
                var tabId = $(this).attr('href');
                $('#tab-container').easytabs('select', tabId);
            });
        });
    })(jQuery)
</script>