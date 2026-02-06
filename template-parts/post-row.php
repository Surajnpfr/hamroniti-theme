<?php
/**
 * Post row card (used in lists).
 *
 * Expects: global $post.
 *
 * @package HamroNiti
 */

if (!defined('ABSPATH')) {
	exit;
}

$post_id = get_the_ID();
$cats = get_the_category($post_id);
$primary_cat = !empty($cats) ? $cats[0] : null;
$author_id = (int) get_post_field('post_author', $post_id);
$author_name = get_the_author_meta('display_name', $author_id);
$minutes = function_exists('hamroniti_reading_time_minutes') ? hamroniti_reading_time_minutes($post_id) : null;
$show_author = !is_front_page();
?>
<a class="hn-post-row" href="<?php the_permalink(); ?>">
	<div class="hn-post-main">
		<div>
			<?php if ($primary_cat) : ?>
				<div class="hn-kicker">
					<span class="hn-dot" aria-hidden="true"></span>
					<?php echo esc_html($primary_cat->name); ?>
				</div>
			<?php endif; ?>

			<h3 class="hn-post-title hn-serif"><?php the_title(); ?></h3>
		</div>

		<div class="hn-post-submeta">
			<span>
				<?php if ($show_author) : ?>
					<span class="material-symbols-outlined" aria-hidden="true" style="font-size:14px;vertical-align:-2px;">person</span>
					<?php echo esc_html($author_name); ?>
					<?php if ($minutes) : ?>
						• <?php echo esc_html($minutes); ?> min
					<?php endif; ?>
				<?php elseif ($minutes) : ?>
					<span class="material-symbols-outlined" aria-hidden="true" style="font-size:14px;vertical-align:-2px;">schedule</span>
					<?php echo esc_html($minutes); ?> min
				<?php endif; ?>
			</span>
		</div>
	</div>

	<div class="hn-thumb" aria-hidden="true">
		<?php if (has_post_thumbnail($post_id)) : ?>
			<?php echo get_the_post_thumbnail($post_id, 'thumbnail'); ?>
		<?php else : ?>
			<span style="font-size:28px;">📰</span>
		<?php endif; ?>
	</div>
</a>

