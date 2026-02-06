<?php
/**
 * Single post template.
 *
 * @package HamroNiti
 */

if (!defined('ABSPATH')) {
	exit;
}

get_header();

if (have_posts()) :
	while (have_posts()) :
		the_post();
		$post_id = get_the_ID();
		$author_id = (int) get_post_field('post_author', $post_id);
		$author_name = get_the_author_meta('display_name', $author_id);
		$minutes = function_exists('hamroniti_reading_time_minutes') ? hamroniti_reading_time_minutes($post_id) : null;
		$cats = get_the_category($post_id);
		$primary_cat = !empty($cats) ? $cats[0] : null;

		$related_query = new WP_Query(
			[
				'posts_per_page' => 2,
				'post__not_in' => [$post_id],
				'ignore_sticky_posts' => 1,
			]
		);
		?>

		<main class="hn-article">
			<section class="hn-article-hero">
				<div class="hn-article-body">
					<div class="hn-article-meta">
						<div class="hn-article-author-avatar" aria-hidden="true">
							<?php
							$initials = '';
							foreach (preg_split('/\s+/', trim($author_name)) as $part) {
								if ($part !== '') {
									$initials .= strtoupper(substr($part, 0, 1));
								}
								if (strlen($initials) >= 2) {
									break;
								}
							}
							echo esc_html($initials ?: 'HN');
							?>
						</div>
						<div class="hn-article-meta-text">
							<a class="hn-article-author" href="<?php echo esc_url(get_author_posts_url($author_id)); ?>">
								<?php echo esc_html($author_name); ?>
							</a>
							<p class="hn-article-meta-sub">
								<?php echo esc_html(get_the_date('M j, Y')); ?>
								<?php if ($minutes) : ?>
									• <?php echo esc_html($minutes); ?> min read
								<?php endif; ?>
							</p>
						</div>
						<button class="hn-article-meta-actions" type="button" aria-label="<?php esc_attr_e('Share this article', 'hamroniti'); ?>">
							<span class="material-symbols-outlined" aria-hidden="true">share</span>
						</button>
					</div>
				</div>

				<div class="hn-article-media">
					<?php if (has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('large', ['class' => 'hn-article-img']); ?>
					<?php else : ?>
						<div class="hn-article-img hn-article-img--placeholder">🏛️</div>
					<?php endif; ?>

					<?php if ($primary_cat) : ?>
						<a class="hn-article-badge" href="<?php echo esc_url(get_category_link($primary_cat)); ?>">
							<?php echo esc_html($primary_cat->name); ?>
						</a>
					<?php endif; ?>
				</div>

				<div class="hn-article-body">
					<h1 class="hn-article-title hn-serif"><?php the_title(); ?></h1>
				</div>
			</section>

			<article class="hn-article-body">
				<div class="hn-article-content hn-content">
					<?php the_content(); ?>
				</div>
			</article>

			<?php if ($related_query->have_posts()) : ?>
				<section class="hn-related-section" aria-label="<?php esc_attr_e('Suggested articles', 'hamroniti'); ?>">
					<div class="hn-related-head">
						<h2 class="hn-related-title hn-serif"><?php esc_html_e('Suggested for you', 'hamroniti'); ?></h2>
						<a class="hn-link" href="<?php echo esc_url(get_post_type_archive_link('post')); ?>">
							<?php esc_html_e('View all', 'hamroniti'); ?>
						</a>
					</div>

					<div class="hn-related-grid">
						<?php
						while ($related_query->have_posts()) :
							$related_query->the_post();
							get_template_part('template-parts/post-row');
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</section>
			<?php endif; ?>

			<?php if (comments_open() || get_comments_number()) : ?>
				<section class="hn-comments" aria-label="<?php esc_attr_e('Comments', 'hamroniti'); ?>">
					<div class="hn-comments-inner">
						<?php comments_template(); ?>
					</div>
				</section>
			<?php endif; ?>
		</main>

		<?php
	endwhile;
endif;

get_footer();

