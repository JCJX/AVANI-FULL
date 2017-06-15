<?php
/**
 * Avani functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Avani
 */

if ( ! function_exists( 'avani_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function avani_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Avani, use a find and replace
		 * to change 'avani' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'avani' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 720, 9999 );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary', 'avani' ),
			'social'  => __( 'Social', 'avani' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'avani_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Set up the WordPress core custom logo feature.
		add_theme_support( 'custom-logo', apply_filters( 'avani_custom_logo_args', array(
			'flex-width'  => true,
			'flex-height' => true,
			'width'       => 100,
			'height'      => 100,
		) ) );

		add_editor_style( array( 'assets/css/editor-style.css', avani_fonts_url() ) );
	}
endif;
add_action( 'after_setup_theme', 'avani_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function avani_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'avani_content_width', 720 );
}
add_action( 'after_setup_theme', 'avani_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function avani_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'avani' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here.', 'avani' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'footer-widget-1', 'avani' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add footer widgets here.', 'avani' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'footer-widget-2', 'avani' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add footer widgets here.', 'avani' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'footer-widget-3', 'avani' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add footer widgets here.', 'avani' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
}
add_action( 'widgets_init', 'avani_widgets_init' );

if ( ! function_exists( 'avani_fonts_url' ) ) :
	/**
	 * Get Google fonts url to register and enqueue.
	 *
	 * This function incorporates code from Twenty Fifteen WordPress Theme,
	 * Copyright 2014-2016 WordPress.org & Automattic.com Twenty Fifteen is
	 * distributed under the terms of the GNU GPL.
	 *
	 * @since 1.0.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function avani_fonts_url() {

		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Roboto, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'avani' ) ) {
			$fonts[] = 'Roboto:400italic,700italic,400,700';
		}

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Oswald, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Oswald font: on or off', 'avani' ) ) {
			$fonts[] = 'Oswald:400italic,700italic,400,700';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		/**
		 * Filter google font url.
		 *
		 * @since 1.0.0
		 */
		return apply_filters( 'avani_font_url', $fonts_url );
	}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * This function incorporates code from Twenty Seventeen WordPress Theme,
 * Copyright 2016-2017 WordPress.org. Twenty Seventeen is distributed
 * under the terms of the GNU GPL.
 *
 * @since 1.0.0
 */
function avani_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'avani_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function avani_scripts() {
	wp_enqueue_style( 'avani-fonts', avani_fonts_url(), array(), null );

	wp_enqueue_style( 'avani-style', get_stylesheet_uri() );

	wp_enqueue_script( 'avani-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '1.0.0', true );

	wp_enqueue_script( 'avani-sidebar-toggle', get_template_directory_uri() . '/assets/js/sidebar-toggle.js', array( 'jquery' ), '1.0.0', true );

	if ( has_nav_menu( 'primary' ) ) {
		$avani_l10n = array(
			'expand'   => __( 'Expand child menu', 'avani' ),
			'collapse' => __( 'Collapse child menu', 'avani' ),
			'icon'     => avani_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) ),
		);
		wp_enqueue_script( 'avani-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), '1.0.0', true );
		wp_localize_script( 'avani-navigation', 'avaniScreenReaderText', $avani_l10n );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'avani_scripts' );

/**
 * Implement the Custom Header feature.
 *弃用
*require get_template_directory() . '/inc/custom-header.php';
*/
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load font icons functions file.
 */
require get_template_directory() . '/inc/icons.php';

/**
 * themes header images function file
 */
 if ( function_exists( 'get_custom_header' ) ) {
$header_image_width  = get_custom_header()->width;
$header_image_height = get_custom_header()->height;
} else {
$header_image_width  = HEADER_IMAGE_WIDTH;
$header_image_height = HEADER_IMAGE_HEIGHT;
}
//打开主题自定义顶部支持
add_theme_support( 'custom-header' );

$headarg = array(//将设置打包成数组
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
//将数组中的设置添加到自定义顶部上
add_theme_support( 'custom-header', $headarg );
//自定义顶部图像的设置数组
$args = array(
	'width'         => 980,
	'height'        => 60,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
);
//添加设置
add_theme_support( 'custom-header', $args );

$args = array(
	'width'         => 980,
	'height'        => 60,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

$args = array(
	'flex-width'    => true,//自适应高度
	'width'         => 980,
	'flex-width'    => true,//自适应宽度
	'height'        => 200,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
);
add_theme_support( 'custom-header', $args );

/**
**  Tinymce button  
**/
// 短代码可视化插入按钮 
function my_add_mce_button() {
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return;
    }
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
        add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
        add_filter( 'mce_buttons', 'my_register_mce_button' );
    }
}
add_action('admin_head', 'my_add_mce_button');
function my_add_tinymce_plugin( $plugin_array ) {
    $plugin_array['my_mce_button'] = get_template_directory_uri() .'/js/mce-button.js';//引入js文件
    return $plugin_array;
}
function my_register_mce_button( $buttons ) {
    array_push( $buttons, 'my_mce_button' );
    return $buttons;
}

//独立下载面板
function xdltable($atts, $content = null) {
    extract(shortcode_atts(array("source" => "","uptime" => "","fileinfo" => "","magnet" => "","xitong" => "","downlink" => "", ) , $atts));                  //定义一串数组
    return '<table class="dltable"><tbody><tr><td style=" background-image:url(http://i1.piimg.com/595276/09f3088581ea0e94.png);background-repeat:no-repeat; opacity=0.2;" rowspan="7" width="200"></td><tr><td><p><i class="fa fa-th-large"></i>附件下载</p></td></tr><td><i class="fa fa-external-link"></i>  文件来源 :' . $source . '</td><tr><td><i class="fa fa-clock-o"></i>  上传时间 :' . $uptime . '</td></tr><tr><td><i class="fa fa-list-alt"></i>  文件详情 :' . $fileinfo . '</td><tr><td><i class="fa fa-magnet"></i>  磁力链接 :' . $magnet . '</td></tr><tr><td><i class="fa fa-download"></i>  下载地址 : ' . $content . '</td></tr></tbody></table>'; 
}
add_shortcode('dltable', 'xdltable');

/**
**  SEO button box
**/
require_once(TEMPLATEPATH . '/theme-options.php');

/**
** theme css appear
**/
require_once(TEMPLATEPATH . '/theme-appear.php');

/**
** theme post views
**/
function record_visitors()
{
	if (is_singular())
	{
	  global $post;
	  $post_ID = $post->ID;
	  if($post_ID)
	  {
		  $post_views = (int)get_post_meta($post_ID, 'views', true);
		  if(!update_post_meta($post_ID, 'views', ($post_views+1)))
		  {
			add_post_meta($post_ID, 'views', 1, true);
		  }
	  }
	}
}
add_action('wp_head', 'record_visitors');

//取得文章的阅读次数
function post_views($before = '(点击 ', $after = ' 次)', $echo = 1)
{
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
}

/**
** Hide the version information
**/
remove_action('wp_head', 'wp_generator');

/**
** Close the Pingback and trackbacks
**/
add_filter( 'wp_headers', 'pmg_pk_filter_headers', 10, 1 );
function pmg_pk_filter_headers( $headers )
{
if( isset( $headers['X-Pingback'] ) )
{
unset( $headers['X-Pingback'] );
}
return $headers;
}

add_filter( 'rewrite_rules_array', 'pmg_pk_filter_rewrites' );
function pmg_pk_filter_rewrites( $rules )
{
foreach( $rules as $rule => $rewrite )
{
if( preg_match( '/trackback\/\?\$$/i', $rule ) )
{
unset( $rules[$rule] );
}
}
return $rules;
}

add_filter( 'bloginfo_url', 'pmg_pk_kill_pingback_url', 10, 2 );
function pmg_pk_kill_pingback_url( $output, $show )
{
if( $show == 'pingback_url' )
{
$output = '';
}
return $output;
}

add_filter( 'pre_update_default_ping_status', '__return_false' );
add_filter( 'pre_option_default_ping_status', '__return_zero' );
add_filter( 'pre_update_default_pingback_flag', '__return_false' );
add_filter( 'pre_option_default_pingback_flag', '__return_zero' );

add_action( 'xmlrpc_call', 'pmg_pk_kill_xmlrpc' );
function pmg_pk_kill_xmlrpc( $action )
{
if( 'pingback.ping' === $action )
{
wp_die(
__( 'Pingbacks are not supported' ),
__( 'Not Allowed!' ),
array( 'response' => 403 )
);
}
}

register_activation_hook( __FILE__ , 'flush_rewrite_rules' );
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );

/**
** 移除wordpress版本信息
**/
remove_action( 'wp_head', 'wp_generator' ); 
