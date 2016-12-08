<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="p:domain_verify" content="bc29726e6da74b3c5c1cb1fa3b24050c"/>

	<title><?php wp_title( '-', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php if(get_theme_mod('sp_favicon')) : ?>
	<link rel="shortcut icon" href="<?php echo get_theme_mod('sp_favicon'); ?>" />
	<?php endif; ?>

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div class="wrapper">

		<header>

			<div id="top-bar">

				<div id="navigation">

					<div id="logo">
						<h1><a href="<?php echo home_url(); ?>">Home</a></h1>
					</div>

					<div id="main-menu">
						<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'main-menu', 'menu_class' => 'menu' ) ); ?>
					</div>

					<a id="mobile-menu-toggle">
						MENU
					</a>

					<div id="mobile-menu" class="hidden">
						<button type="button" class="overlay-close">Close</button>
						<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'main-menu', 'menu_class' => 'mobile-menu' ) ); ?>
					</div>

				</div>

			</div>

		</header>
