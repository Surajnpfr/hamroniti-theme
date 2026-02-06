<?php
/**
 * Search form template.
 *
 * @package HamroNiti
 */

if (!defined('ABSPATH')) {
	exit;
}

$unique_id = wp_unique_id('search-form-');
?>
<form role="search" method="get" class="hn-search" action="<?php echo esc_url(home_url('/')); ?>" style="display:block;">
	<label class="hn-sr-only" for="<?php echo esc_attr($unique_id); ?>"><?php esc_html_e('Search for:', 'hamroniti'); ?></label>
	<input
		id="<?php echo esc_attr($unique_id); ?>"
		type="search"
		class="hn-input"
		style="width:100%; background:#fff; color:var(--hn-text); border:1px solid var(--hn-border); padding-right:48px;"
		placeholder="<?php echo esc_attr_x('Search articles, topics…', 'placeholder', 'hamroniti'); ?>"
		value="<?php echo get_search_query(); ?>"
		name="s"
	/>
</form>

