<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title(''); ?></title>
	
	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<!-- Force a page reload every hour & don't cache anything -->
	<meta http-equiv="refresh" content="3600">
    <meta http-equiv="pragma" content="nocache">
	
	<!-- Included Foundation CSS Files -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/foundation.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/app.css">
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css">
	<![endif]-->
	
	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
	
	<!--  iPhone Web App Home Screen Icon -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/devices/reverie-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/devices/reverie-icon-retina.png" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/devices/reverie-icon.png" />
	

	<!-- Google Web Fonts
 		 Find one you like at http://www.google.com/webfonts
		 Change line 74 in /css/foundation.css to include the updated font name	-->
	<link href='http://fonts.googleapis.com/css?family=Magra:700,400' rel='stylesheet' type='text/css'>

	<link href="<?php echo get_template_directory_uri(); ?>/css/fontawesome.css" rel="stylesheet" media="screen and (min-width: 767px)" type='text/css'>
	<link href="<?php echo get_template_directory_uri(); ?>/css/climacons.css" rel="stylesheet" media="screen and (min-width: 767px)" type='text/css'>  


	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.foundation.js"></script>
	

	<?php wp_head(); ?>
</head>

<body id="body">
	
	<!-- Start the main container -->
	<div id="container" class="container" role="document">
		<div id="branding"></div>
		<div id="location"><?php echo home_url(); ?></div>	
		<!-- Row for main content area -->
		<div id="main" class="row">