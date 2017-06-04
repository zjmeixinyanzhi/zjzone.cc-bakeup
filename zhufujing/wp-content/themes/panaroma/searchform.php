<?php
/**
 * The template for displaying search forms in SKT Panaroma
 *
 * @package SKT Panaroma
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="search-label"><?php _ex( 'Search for:', 'label', 'panaroma' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'panaroma' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'panaroma' ); ?>">
</form>
