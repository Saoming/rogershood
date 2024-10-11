<?php
/**
 * The template for displaying the search form.
 *
 * @package TenUpTheme
 */

?>

<div class="search-form-container" itemscope itemtype="http://schema.org/WebSite">
	<form role="search" id="searchform" class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<meta itemprop="target" content="<?php echo esc_url( home_url() ); ?>/?s={s}" />
		<label class="screen-reader-text" for="search-field">
			<?php echo esc_html_x( 'Search for:', 'label', 'tenup-theme' ); ?>
		</label>
		<input itemprop="query-input" type="search" id="search-field" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'tenup-theme' ); ?>" name="s" />
		<button class="rh-button-not-min" type="submit">
			<span>Submit</span>
		</button>
	</form>
</div>
