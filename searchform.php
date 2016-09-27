<?php
/**
 * The template for displaying search forms in zacklive
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'zacklive' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'zacklive' ); ?>">
	</label>
	<input type="submit" class="search-submit btn btn-default" value="<?php echo esc_attr_x( 'Search', 'submit button', 'zacklive' ); ?>">
</form>