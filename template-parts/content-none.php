<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Avani
 */

?>
 
<section class="no-results not-found">
	<header class="page-header">
		
		<h1 class="page-title"><?php _e( '咦，不见了！', 'avani' ); ?></h1>
	</header><!-- .page-header -->
<div class="found">
   <style type=text/css>
   .found{
	height: 300px;
    background-image:url(<?php bloginfo('template_url'); ?>/images/found.png);
	background-repeat:no-repeat;
    background-position:left top;
	background-size:300px 300px
   }
   </style>
	 </div><!-- found -->
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( '准备好发布你的第一篇文章了吗? <a href="%1$s">Get started here</a>.', 'avani' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( '对不起,没有找到匹配您的搜索条件，你可以请再次尝试一些不同的关键词~', 'avani' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php _e( '不知道你在寻找什么呢，尝试自己搜索下吧~', 'avani' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
		
	</div><!-- .page-content -->
</section><!-- .no-results -->
