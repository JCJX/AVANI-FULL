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

     <?php wp_head(); ?>
	 <?php
     if (is_home()){
        $description = get_option('fullblog_description');
        
        $keywords = get_option('fullblog_keywords');
    } elseif (is_single()){
        if ($post->post_excerpt) {
            $description  = $post->post_excerpt;
    } else {
   if(preg_match('/<p>(.*)<\/p>/iU',trim(strip_tags($post->post_content,"<p>")),$result)){
        $post_content = $result['1'];
       } else {
        $post_content_r = explode("\n",trim(strip_tags($post->post_content)));
        $post_content = $post_content_r['0'];
       }
             $description = substr($post_content,0,220); 
      }
        $keywords = "";
        $tags = wp_get_post_tags($post->ID);
        foreach ($tags as $tag ) {
           $keywords = $keywords . $tag->name . ",";
        }
    }
?>
    <meta content="<?php echo trim($description); ?>" name="description"/>
    <meta content="<?php echo rtrim($keywords,','); ?>" name="keywords"/>
	<meta name="google" value="notranslate">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/<?php echo get_option('mytheme_colour'); ?>.css" type="text/css">
	<link href="<?php bloginfo('template_url'); ?>/pace/pace-theme-barber-shop.css" rel="stylesheet" />
	<link href="<?php bloginfo('template_url'); ?>/pace/animate.min.css" rel="stylesheet" />
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script type='text/javascript' src='//code.jquery.com/jquery-1.10.2.min.js?ver=3.3'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/backtop.js'></script>
	<script type='text/javascript' src='//code.jquery.com/jquery-migrate-1.2.1.js?ver=1.2.1'></script>
	<script src="<?php bloginfo('template_url'); ?>/pace/pace.js"></script>    
    
</head>

<body <?php body_class(); ?>>
  <div class="infinite animated pulse jbl"><img src="<?php bloginfo('template_url'); ?>/images/kabli.png" /></div>
 <div id="back-to-top" class="red" data-scroll="body" style="top:-46px;color:red;">回到顶部 </div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'avani' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="animated bounceIn banner">
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
						<div class="social-media-icons">
						<ul class="itimicon">
                 <li class="iconmini">
                          <a class="twitter" target="_blank" href="<?php echo get_option('mytheme_ad1url'); ?>">
                            <i class="fa fa-twitter-square fa-2x" title="twitter"></i>
                            <span class="screen-reader-text">twitter</span>
                          </a>
                        </li>
                                  <li class="iconmini">
                          <a class="facebook" target="_blank" href="<?php echo get_option('mytheme_ad2url'); ?>">
                            <i class="fa fa-facebook-square fa-2x" title="facebook"></i>
                            <span class="screen-reader-text">facebook</span>
                          </a>
                        </li>
                                    <li class="iconmini">
                          <a class="google-plus" target="_blank" href="<?php echo get_option('mytheme_ad3url'); ?>">
                            <i class="fa fa-google-plus-square fa-2x" title="google-plus"></i>
                            <span class="screen-reader-text">google-plus</span>
                          </a>
                        </li>
                                    <li class="iconmini">
                          <a class="tumblr" target="_blank" href="<?php echo get_option('mytheme_ad4url'); ?>">
                            <i class="fa fa-tumblr-square fa-2x" title="tumblr"></i>
                            <span class="screen-reader-text">tumblr</span>
                          </a>
                        </li>
                                    <li class="iconmini">
                          <a class="github" target="_blank" href="<?php echo get_option('mytheme_ad5url'); ?>">
                            <i class="fa fa-github-square fa-2x" title="github"></i>
                            <span class="screen-reader-text">github</span>
                          </a>
                        </li>
                                    <li class="iconmini">
                          <a class="weibo" target="_blank" href="<?php echo get_option('mytheme_ad6url'); ?>">
                            <i class="fa fa-weibo fa-2x" title="weibo"></i>
                            <span class="screen-reader-text">weibo</span>
                          </a>
                        </li>
                                    <li class="iconmini">
                          <a class="email" target="_blank" href="<?php echo get_option('mytheme_ad7url'); ?>">
                            <i class="fa fa-envelope fa-2x" title="email"></i>
                            <span class="screen-reader-text">email</span>
                          </a>
                        </li>
                      </ul></div>
					<?php endif; ?>
				</div><!-- .title-area -->
			</div><!-- .site-branding -->
      <div><!--banner end-->
		</div><!-- .header-items -->

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="main-navigation" class="animated lightSpeedIn main-navigation" aria-label="Primary Menu">
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
	<script type="text/javascript">
	   $(".nav-menu").hover( function() { 
	   $(".site-content").css("z-index", "-1"); 
	   }, function() { 
	   $(".site-content").css("z-index", "0"); 
	   }); 
	</script>
	<div id="content" class="site-content">
