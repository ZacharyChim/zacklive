<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package zacklive
 */
?>
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
        <div class="container">
            <div class="row">
            	<div class="site-footer-inner col-sm-12">
            		<div class="site-info">
            			<?php do_action( 'zacklive_credits' ); ?>
            			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'zacklive' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'zacklive' ), 'WordPress' ); ?></a>
            			<span class="sep"> | </span>
            			<?php printf( __( 'Theme: %1$s by %2$s.', 'zacklive' ), 'zacklive', '<a href="http://zacklive.com/" rel="designer">ZackLive.com</a>' ); ?>
            		</div><!-- .site-info -->
            	</div><!-- .site-footer-inner -->
            </div><!-- .row -->
        </div><!-- .container -->
    </footer><!-- #colophon -->

</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
