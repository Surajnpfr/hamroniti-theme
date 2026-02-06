<?php
/**
 * Front page template (homepage).
 *
 * @package HamroNiti
 */

if (!defined('ABSPATH')) {
	exit;
}

get_header();

$featured = function_exists('hamroniti_get_featured_post') ? hamroniti_get_featured_post() : null;
$featured_id = $featured ? (int) $featured->ID : 0;

// Additional featured posts (to make 4 cards in the row section).
$featured_more_query = new WP_Query(
	[
		'posts_per_page' => $featured_id ? 3 : 4,
		'post__not_in' => $featured_id ? [$featured_id] : [],
		'ignore_sticky_posts' => 1,
	]
);

// Latest posts excluding featured (and sticky handling is already inside featured resolution).
$latest_query = new WP_Query(
	[
		'posts_per_page' => 12,
		'post__not_in' => $featured_id ? [$featured_id] : [],
		'ignore_sticky_posts' => 1,
	]
);
?>

<main>
	<section class="hn-hero">
		<div style="text-align:center; max-width:380px; margin:0 auto;">
			<div class="hn-hero-badge">
				<span class="material-symbols-outlined" aria-hidden="true" style="color:var(--hn-accent);font-size:16px;">auto_awesome</span>
				<span style="font-size:13px;font-weight:800;"><?php esc_html_e('Welcome to HamroNiti', 'hamroniti'); ?></span>
			</div>

			<h2 class="hn-serif"><?php esc_html_e('Explore Stories, Ideas & Insights', 'hamroniti'); ?></h2>
			<p><?php esc_html_e('Thought-provoking articles on politics, culture, technology, and society', 'hamroniti'); ?></p>
		</div>
	</section>

	<section class="hn-section" aria-label="<?php esc_attr_e('Trending topics', 'hamroniti'); ?>">
		<?php get_template_part('template-parts/trending-topics'); ?>
	</section>

	<section class="hn-section" aria-label="<?php esc_attr_e('Featured story', 'hamroniti'); ?>">
		<div class="hn-section-head">
			<h3 class="hn-section-title hn-serif">
				<span class="material-symbols-outlined" aria-hidden="true" style="color:var(--hn-accent);">star</span>
				<?php esc_html_e('Featured Story', 'hamroniti'); ?>
			</h3>
		</div>

		<div class="hn-featured-grid">
			<?php if ($featured) : ?>
				<?php get_template_part('template-parts/featured-card', null, ['post' => $featured]); ?>
			<?php endif; ?>

			<?php if ($featured_more_query->have_posts()) : ?>
				<?php while ($featured_more_query->have_posts()) : $featured_more_query->the_post(); ?>
					<?php get_template_part('template-parts/featured-card', null, ['post' => get_post()]); ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php elseif (!$featured) : ?>
				<div class="hn-card" style="padding:16px; box-shadow:0 10px 25px rgba(17,24,39,.06);">
					<p style="margin:0;color:var(--hn-muted);"><?php esc_html_e('No posts yet. Publish your first story to see it here.', 'hamroniti'); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="hn-section" aria-label="<?php esc_attr_e('Latest articles', 'hamroniti'); ?>">
		<div class="hn-section-head">
			<h3 class="hn-section-title hn-serif">
				<span class="material-symbols-outlined" aria-hidden="true" style="color:var(--hn-accent);">article</span>
				<?php esc_html_e('Latest Articles', 'hamroniti'); ?>
			</h3>
			<a class="hn-link" href="<?php echo esc_url(get_post_type_archive_link('post')); ?>"><?php esc_html_e('View all', 'hamroniti'); ?></a>
		</div>

		<div class="hn-list">
			<?php if ($latest_query->have_posts()) : ?>
				<?php while ($latest_query->have_posts()) : $latest_query->the_post(); ?>
					<?php get_template_part('template-parts/post-row'); ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<p style="padding:0 16px;color:var(--hn-muted);margin:0;"><?php esc_html_e('No posts found.', 'hamroniti'); ?></p>
			<?php endif; ?>
		</div>

		<div class="hn-latest-footer">
			<a class="hn-btn" href="<?php echo esc_url(get_post_type_archive_link('post')); ?>">
				<?php esc_html_e('View all articles', 'hamroniti'); ?>
			</a>
		</div>
	</section>
</main>

<?php
get_footer();

