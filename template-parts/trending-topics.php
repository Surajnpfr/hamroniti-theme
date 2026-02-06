<?php
/**
 * Trending topics chips (categories).
 *
 * @package HamroNiti
 */

if (!defined('ABSPATH')) {
	exit;
}

$categories = get_categories(
	[
		'orderby' => 'count',
		'order' => 'DESC',
		'hide_empty' => true,
		'number' => 8,
	]
);

$categories = array_values(
	array_filter(
		$categories,
		static function ($cat) {
			return isset($cat->slug) && $cat->slug !== 'uncategorized';
		}
	)
);

if (empty($categories)) {
	return;
}
?>
<div class="hn-section-head">
	<h3 class="hn-section-title hn-serif">
		<span class="material-symbols-outlined" aria-hidden="true" style="color:var(--hn-accent);">trending_up</span>
		<?php esc_html_e('Trending Topics', 'hamroniti'); ?>
	</h3>
	<a class="hn-link" href="<?php echo esc_url(get_post_type_archive_link('post')); ?>"><?php esc_html_e('See all', 'hamroniti'); ?></a>
</div>

<div class="hn-chips" role="list">
	<?php foreach ($categories as $index => $cat) : ?>
		<a class="hn-chip <?php echo $index === 0 ? 'is-active' : ''; ?>" href="<?php echo esc_url(get_category_link($cat)); ?>" role="listitem">
			<?php echo esc_html($cat->name); ?>
		</a>
	<?php endforeach; ?>
</div>

