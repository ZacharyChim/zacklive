<?php
/**
 * The template for displaying all pages.
 */

get_header(); ?>

    <div id="primary" class="content-area col-sm-12 col-md-8">
        <main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'content', 'page' ); ?>

                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                ?>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>