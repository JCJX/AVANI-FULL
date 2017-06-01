<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Avani
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
         
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( '页面不见啦~.', 'avani' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( '你应该确保拼写正确的URL,或者如果你提供一个链接在这里请让我们知道，我们会尝试搜索到你想要的目标.
', 'avani' ); ?></p>

					<?php
					get_search_form();
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
       
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
