<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package _s
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area col-sm-12 col-md-4" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->