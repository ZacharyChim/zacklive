<?php
/**
 * The template used for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content" itemprop="text">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'zacklive' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php zacklive_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->