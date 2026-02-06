<?php
/**
 * Featured post card.
 *
 * Expects: $args['post'] as WP_Post.
 *
 * @package HamroNiti
 */

if (!defined('ABSPATH')) {
	exit;
}

$featured = isset($args['post']) ? $args['post'] : null;
if (!$featured instanceof WP_Post) {
	return;
}

$post_id = $featured->ID;
$author_id = (int) get_post_field('post_author', $post_id);
$author_name = get_the_author_meta('display_name', $author_id);
$minutes = function_exists('hamroniti_reading_time_minutes') ? hamroniti_reading_time_minutes($post_id) : null;
$show_author = !is_front_page();
$initials = '';
foreach (preg_split('/\s+/', trim($author_name)) as $part) {
	if ($part !== '') {
		// Avoid mbstring dependency (not enabled on all local stacks by default).
		$initials .= strtoupper(substr($part, 0, 1));
	}
	if (strlen($initials) >= 2) {
		break;
	}
}
?>
<a class="hn-card" href="<?php echo esc_url(get_permalink($post_id)); ?>">
	<div class="hn-featured-media">
		<?php if (has_post_thumbnail($post_id)) : ?>
			<?php echo get_the_post_thumbnail($post_id, 'large', ['style' => 'width:100%;height:100%;object-fit:cover;display:block;']); ?>
		<?php else : ?>
			<span style="font-size:56px;">🏛️</span>
		<?php endif; ?>
		<span class="hn-featured-badge"><?php esc_html_e('Featured', 'hamroniti'); ?></span>
	</div>

	<div class="hn-featured-body">
		<h2 class="hn-featured-title hn-serif"><?php echo esc_html(get_the_title($post_id)); ?></h2>
		<p class="hn-featured-excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt($post_id), 26)); ?></p>

		<div class="hn-meta-row">
			<div class="hn-meta">
				<div class="hn-avatar" aria-hidden="true"><?php echo esc_html($initials ?: 'HN'); ?></div>
				<div>
					<?php if ($show_author) : ?>
						<div style="font-weight:800;font-size:12px;"><?php echo esc_html($author_name); ?></div>
					<?php endif; ?>
					<small>
						<?php echo esc_html(get_the_date('M j', $post_id)); ?>
						<?php if ($minutes) : ?>
							• <?php echo esc_html($minutes); ?> min read
						<?php endif; ?>
					</small>
				</div>
			</div>

			<span class="hn-btn"><?php esc_html_e('Read Now', 'hamroniti'); ?></span>
		</div>
	</div>
</a>

