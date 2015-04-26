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

<link rel="apple-touch-icon" sizes="57x57" href="/ficon/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/ficon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/ficon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/ficon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/ficon/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/ficon/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/ficon/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/ficon/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/ficon/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/ficon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/ficon/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="/ficon/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/ficon/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/ficon/manifest.json">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="/ficon/mstile-144x144.png">
<meta name="theme-color" content="#ffffff">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">





		<nav class="navbar navbar-default navbar-static-top main-navigation" role="navigation" id="site_navigation">
			<div class="container">

				<a class="headerlogo" href="<?php echo home_url( '/' ); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/headerlogo.png" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
				</a>
				<div id="langswitch_logo">
					<?php if ( is_active_sidebar( 'sidebar-10' ) ) : ?>
						<div id="sidebar-10" class="primary-sidebar-10 widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-10' ); ?>
					</div><!-- #primary-sidebar -->
				<?php endif; ?>
				</div>

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

		</div>


		<?php
		if ( is_front_page() ) {
		    // This is the home page

		} else {
		    // This is not the home page
				ipt_kb_breadcrumb();
		}
		?>
