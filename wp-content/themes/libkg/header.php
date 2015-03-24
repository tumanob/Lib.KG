<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package iPanelThemes Knowledgebase
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar navbar-default navbar-static-top main-navigation" role="navigation" id="site_navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only"><?php _e( 'Toggle navigation', 'ipt_kb' ); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>


				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<?php
					wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 2,
						'container'         => '',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker())
					);
					?>
				</div>


			</div>
		</nav>
	</header><!-- #masthead -->


	<div id="content" class="site-content container">


		<div id="sub_header">
		<?php if ( get_header_image() ) : ?>
			<div class="row">
				<div id="logoblock" class="col-md-2">
					<a class="site-anchor" href="<?php echo home_url( '/' ); ?>">
						<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
					</a>
				</div>
				<?php else : ?>
				<h1 class="site-title"><a class="site-anchor" href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<?php endif; // End header image check. ?>

				<div id="langswitch" class="col-md-8">
					<?php if ( is_active_sidebar( 'sidebar-10' ) ) : ?>
						<div id="sidebar-10" class="primary-sidebar-10 widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-10' ); ?>
					</div><!-- #primary-sidebar -->
				<?php endif; ?>
				</div>
				<div class="col-md-2">
					<div class="btn btn-success addbutton btn-lg">
					<?php  _e("Add a book",'ipt_kb');  //добавить материал ?>
					</div>
				</div>
			</div>
		</div>

	<?php ipt_kb_breadcrumb(); ?>
