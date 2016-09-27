<?php
/**
 * The Header for our theme.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php zacklive_schema(); ?>>
	<div id="page" class="hfeed site">
		<?php do_action( 'before' ); ?>
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'zacklive' ); ?></a>

		<header id="masthead" class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
			<div class="container">
				<div class="row">
					<div class="site-header-inner col-sm-12">
						<?php if ( get_header_image() ) : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
							</a>
						<?php endif; // End header image check. ?>
						<div class="site-branding">
							<h1 class="site-title" itemprop="headline"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h2 class="site-description clear" itemprop="description"><?php bloginfo( 'description' ); ?></h2>
						</div><!-- .site-branding -->
					</div><!-- .site-header-inner -->
				</div><!-- .row -->
			</div><!-- .container -->
		</header><!-- #masthead -->

		<nav class="site-navigation" class="main-navigation" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
			<div class="container">
				<div class="row">
					<div class="site-navigation-inner col-sm-12">
						<div class="navbar navbar-default">
							<div class="navbar-header">
								<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
									<span class="screen-reader-text"><?php __('Toggle navigation', 'zacklive'); ?></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div><!-- .navbar-header -->

							<div class="navbar-collapse collapse navbar-responsive-collapse">
				            	<?php zacklive_main_nav(); ?>
				          	</div><!-- .navbar-collapse -->
						</div><!-- .navbar -->
					</div><!-- .site-navigation-inner -->
				</div><!-- .row -->
			</div><!-- .container -->
		</nav><!-- .site-navigation -->

		<div id="content" class="site-content">
			<div class="container">
				<div class="row">
