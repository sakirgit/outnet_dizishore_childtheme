<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="profile" href="//gmpg.org/xfn/11">
	<?php
	/**
	 * Functions hooked in to wp_head action
	 *
	 * @see matico_pingback_header - 1
	 */
	wp_head();

	?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php do_action('matico_before_site'); ?>

<div id="page" class="hfeed site">
	<?php
	/**
	 * Functions hooked in to matico_before_header action
	 *
	 */
	do_action('matico_before_header');
    get_template_part('template-parts/header/header-1');

	/**
	 * Functions hooked in to matico_before_content action
	 *
	 */
	do_action('matico_before_content');
	?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

<?php
/**
 * Functions hooked in to matico_content_top action
 *
 * @see matico_shop_messages - 10 - woo
 *
 */
do_action('matico_content_top');

