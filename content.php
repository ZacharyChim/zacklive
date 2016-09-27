<?php
/**
 * The template used for displaying page content
 */
?>


<?php
// Use post_class('panel') to add a thin outline in Bootstrap style.
// Remember to do this for all content templates you want to have this,
// for example content-single.php for the post single view. ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<?php if ('' != get_the_post_thumbnail() && !is_search() ) { ?>
        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( the_title_attribute( 'echo=0' ) ) ); ?>">
                <?php the_post_thumbnail( 'post_feature_full_width', array(
                    'itemprop'=>'image',
                    'class' => 'aligncenter',
                    ) ); ?>
        </a>
	<?php } ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content" itemprop="text">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'zacklive' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

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