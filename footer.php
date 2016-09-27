<?php
/**
 * The template for displaying the footer.
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
            			<?php printf( __( 'Proudly powered by %s', 'zacklive' ), 'WordPress' ); ?>
            			<span class="sep"> | </span>
            			<?php printf( __( 'Theme: %1$s by %2$s.', 'zacklive' ), 'ZackLive', '<a href="http://zacklive.com/" rel="designer">Zack</a>' ); ?>
            		</div><!-- .site-info -->
            	</div><!-- .site-footer-inner -->
            </div><!-- .row -->
        </div><!-- .container -->
    </footer><!-- #colophon -->

</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>