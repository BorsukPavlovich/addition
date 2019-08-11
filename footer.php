<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package addition
 */

?>

	<footer id="colophon" class="site-footer">
		<p><?php echo get_option('copyright'); ?></p>
		<a href="#main" class="footer-logo" style="background-image: url(<?php echo get_option('footer_logo'); ?>)"></a>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
