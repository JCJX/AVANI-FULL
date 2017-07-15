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
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/<?php echo get_option('mytheme_colour'); ?>.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/activate-power-mode.js "></script>
	<script>
	POWERMODE.colorful = true; 
	POWERMODE.shake = true; 
	document.body.addEventListener('input', POWERMODE);
	</script>
		<div class="site-info">
		<?php bloginfo(’name’); ?> Is <?php avani_footer_info(); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
