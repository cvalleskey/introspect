<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="lt-ie7 en" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="lt-ie8 en" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="lt-ie9 en" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="lt-ie10 en" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
<meta name="description" content="<?php bloginfo('description'); ?>" />
<title><?php wp_title(' &laquo; ', true, 'right'); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<!--[if lt IE 10]><link href="ie.css" rel="stylesheet" type="text/css" media="screen" /><![endif]-->
<!--[if lt IE 9]><script type="text/javascript" language="JavaScript" src="js/html5shiv.js"></script><![endif]-->
<?php

	$logo = get_stylesheet_directory_uri() . "/images/logo.jpg";

	$color = get_post_custom_values('color');
	if(isset($color[0])) {
		echo 	"<style>" .
				"body { border-color: " . $color[0] . " } " .
				"a { border-color: " . $color[0] . " }" .
				"</style>";
	}

	$customCSS = get_post_custom_values('custom-css');
	if(isset($customCSS[0])) {
		echo "<style>" . $customCSS[0] . "</style>";
	}

	// Custom logo
	$path = get_post_custom_values('logo');
	if(isset($path[0])) {
		$logo = $path[0];
	}
	wp_head();
?>
</head>
<body <?php body_class(); ?><?php echo isset($post)? (' id="' . $post->post_name) : ''; ?>">
	<header role="banner">
	<div class="container">
		<nav role="navigation">
			<ul>
				<li class="logo">
					<? /*<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" rel="home">
						<img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" />
					</a>*/ ?>
					<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
				</li>
				<?php 

					$options_wp_list = 'sort_column=menu_order&title_li=&depth=1';
					if(get_option('show_on_front')=='page') {
    					$options_wp_list .= '&exclude=' . get_option('page_on_front');
					}
					wp_list_pages($options_wp_list);

				?>
			</ul>
		</nav>
		<? /*<aside class="search-box input">
			<form role="search" method="get" id="searchform" action="<?php echo home_url(); ?>">
				<input type="text" value="" name="s" id="s" placeholder="Search&hellip;" />
			</form>
		</aside>*/ ?>
	</div>
</header>
