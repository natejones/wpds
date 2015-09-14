<?php
/**
 * Header
 *
 * Setup the header for our theme
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php language_attributes(); ?>" > <!--<![endif]-->




<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php bloginfo('name'); ?></title>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,900' rel='stylesheet' type='text/css'>  
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/normalize.css">
	
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/app.css">

	<script src="<?php bloginfo('template_url'); ?>/javascripts/vendor/custom.modernizr.js"></script>

<title><?php wp_title(); ?></title>

        <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<div class="content"

		