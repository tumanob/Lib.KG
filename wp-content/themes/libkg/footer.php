<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package iPanelThemes Knowledgebase
 */
?>

	</div><!-- #content -->
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<?php
		wp_nav_menu( array(
			'menu'              => 'footer',
			'theme_location'    => 'footer',
			'depth'             => 4,
			'container'         => '',
			'menu_class'        => 'nav navbar-nav',
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			'walker'            => new wp_bootstrap_navwalker())
		);
		?>
	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="col-md-8" id="footer-widget-1">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
			<div class="col-md-4" id="footer-widget-2">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div>
		</div>
	</div>
		<div class="site-info">
			<p class="copyright text-muted">
				<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'all materials under CC license', 'ipt_kb' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
			<span><?php printf( __( 'copyright text on bottom', 'ipt_kb' ), 'WordPress' ); ?> </span>
			</p>
			<?php do_action( 'ipt_kb_credits' ); ?>
		</div><!-- .site-info -->
		<?php wp_footer(); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

</body>
</html>
