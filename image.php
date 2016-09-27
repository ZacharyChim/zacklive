<?php
/**
 * The template for displaying image attachments.
 */

get_header(); ?>
	<div id="primary" class="content-area col-sm-12 col-md-8">
    <main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
			// Add the class "panel" below here to wrap the content-padder in Bootstrap style ;)
			// Simply replace post_class() with post_class('panel') below here ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

					<div class="entry-meta">
						<?php
							$metadata = wp_get_attachment_metadata();
							printf( __( 'Published on <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>', 'zacklive' ),
								esc_attr( get_the_date( 'c' ) ),
								esc_html( get_the_date() ),
								esc_url( wp_get_attachment_url() ),
								$metadata['width'],
								$metadata['height'],
								esc_url( get_permalink( $post->post_parent ) ),
								esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
								get_the_title( $post->post_parent )
							);

							edit_post_link( __( 'Edit', 'zacklive' ), '<span class="edit-link">', '</span>' );
						?>
					</div><!-- .entry-meta -->
				</header><!-- .entry-header -->

				<div class="entry-content">
					<div class="entry-attachment">
						<div class="attachment">
							<?php zacklive_attached_image(); ?>
						</div><!-- .attachment -->

						<?php if ( has_excerpt() ) : ?>
						<div class="entry-caption">
							<?php the_excerpt(); ?>
						</div><!-- .entry-caption -->
						<?php endif; ?>
					</div><!-- .entry-attachment -->

					<?php
						the_content();
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'zacklive' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->

			<footer class="entry-footer">
				<nav role="navigation" id="image-navigation" class="image-navigation">
					<div class="nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'zacklive' ) ); ?></div>
					<div class="nav-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'zacklive' ) ); ?></div>
				</nav><!-- #image-navigation -->
			</footer><!-- .entry-footer -->
			</article><!-- #post-## -->

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>