<?php
/**
 * @package zacklive
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<?php if ('' != get_the_post_thumbnail() && !is_search() ) { ?>
        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( the_title_attribute( 'echo=0' ) ) ); ?>">
                <?php the_post_thumbnail( 'post_feature_full_width', array(
                    'itemprop'=>'image'
                    ) ); ?>
        </a>
    <?php } ?>
	<header class="page-header">
		<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php zacklive_posted_on(); ?>
		</div><!-- .entry-meta -->
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
