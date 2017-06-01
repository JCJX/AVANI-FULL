<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Avani
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<!--[if IE 7]>
<html class="ie ie7" lang="zh-CN">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="zh-CN">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<!--<![endif]-->
<head>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head profile="http://gmpg.org/xfn/11">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="google" value="notranslate">
     <link rel='dns-prefetch' href='//s.w.org' />
     <style type="text/css">
     .banner{
    max-width: 100%;
    height: 326px;
    background-image:url(<?php header_image(); ?>);
    background-size:100%;
    background-repeat:no-repeat;
    background-attachment:fixed;
    background-position:top;
    border:5px solid #000000;
    -moz-box-shadow:2px 1px 13px #000000; -webkit-box-shadow:2px 1px 13px #000000; box-shadow:2px 1px 13px #000000;
    }</style>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<script type='text/javascript' src='//code.jquery.com/jquery-1.10.2.min.js?ver=3.3'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/backtop.js'></script>
	<script type='text/javascript' src='//code.jquery.com/jquery-migrate-1.2.1.js?ver=1.2.1'></script>
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
  <div class="jbl"><img src="<?php bloginfo('template_url'); ?>/images/kabli.png" /></div>
 <div id="back-to-top" class="red" data-scroll="body" style="top:-46px;color:red;">回到顶部 </div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'avani' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="banner">
		<div class="header-items">
			<div class="site-branding">
				<?php avani_the_custom_logo();?>

				<div class="title-area">
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );?>
					<?php if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
				</div><!-- .title-area -->
			</div><!-- .site-branding -->
      <div><!--banner end-->
		</div><!-- .header-items -->

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="main-navigation" class="main-navigation" aria-label="Primary Menu">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<?php
					avani_svg( array( 'icon' => 'bars' ) );
					_e( 'Menu', 'avani' );
					?>
				</button>
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'menu_id'         => 'primary-menu',
						'menu_class'      => 'nav-menu',
						'container_class' => 'wrap',
					)
				);?>
			</nav><!-- #site-navigation -->
		<?php endif; ?>
	</header><!-- #masthead -->



	<div id="content" class="site-content">
