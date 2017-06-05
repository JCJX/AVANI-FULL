<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Avani
 */

?>
         <!--统计代码开始-->
<?php $analytics = get_option('fullblog_analytics');if ($analytics != "") : ?>
<?php echo stripslashes($analytics); ?>
<?php endif ?>
         <!--统计代码结束-->
	</div><!-- #content -->
	<?php avani_footer_widgets(); ?>
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<?php avani_footer_info(); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
