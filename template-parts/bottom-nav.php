<?php
/**
 * Bottom navigation (UI only for v1).
 *
 * @package HamroNiti
 */

if (!defined('ABSPATH')) {
	exit;
}
?>
<nav class="hn-bottom-nav hn-glass" aria-label="<?php esc_attr_e('Bottom navigation', 'hamroniti'); ?>">
	<a class="hn-nav-item is-active" href="<?php echo esc_url(home_url('/')); ?>">
		<span class="material-symbols-outlined" aria-hidden="true" style="font-variation-settings:'FILL' 1">home</span>
		<span><?php esc_html_e('Home', 'hamroniti'); ?></span>
	</a>
	<a class="hn-nav-item" href="<?php echo esc_url(get_post_type_archive_link('post')); ?>">
		<span class="material-symbols-outlined" aria-hidden="true">explore</span>
		<span><?php esc_html_e('Discover', 'hamroniti'); ?></span>
	</a>
	<a class="hn-nav-item" href="<?php echo esc_url(home_url('/')); ?>">
		<span class="material-symbols-outlined" aria-hidden="true">bookmark</span>
		<span><?php esc_html_e('Saved', 'hamroniti'); ?></span>
	</a>
	<a class="hn-nav-item" href="<?php echo esc_url(wp_login_url()); ?>">
		<span class="material-symbols-outlined" aria-hidden="true">person</span>
		<span><?php esc_html_e('Profile', 'hamroniti'); ?></span>
	</a>
</nav>

