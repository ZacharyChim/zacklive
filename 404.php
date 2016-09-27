<?php
/**
 * The template for displaying 404 pages (not found).
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-8" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
		<main id="main" class="site-main" role="main">

			<?php get_template_part( 'content', 'none' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
