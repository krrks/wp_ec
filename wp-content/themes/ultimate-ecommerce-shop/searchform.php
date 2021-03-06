<?php
/**
 * Displaying search forms in Ultimate Ecommerce Shop
 * @package Ultimate Ecommerce Shop
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php echo esc_html_x( 'Search', 'placeholder', 'ultimate-ecommerce-shop' ); ?>" value="<?php echo esc_attr(get_search_query() ); ?>" name="s">
	</label> 
	<input type="submit" class="search-submit" value="<?php echo esc_html_x( 'Search', 'submit button', 'ultimate-ecommerce-shop' ); ?>">
</form>