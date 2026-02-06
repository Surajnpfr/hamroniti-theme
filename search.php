<?php
/**
 * Search results template.
 *
 * @package HamroNiti
 */

if (!defined('ABSPATH')) {
	exit;
}

get_header();
?>

<main>
	<section class="hn-section">
		<div class="hn-section-head">
			<h1 class="hn-section-title hn-serif" style="font-size:20px;">
				<?php
				printf(
					/* translators: %s: search query */
					esc_html__('Search: %s', 'hamroniti'),
					'<span style="color:var(--hn-accent);">' . esc_html(get_search_query()) . '</span>'
				);
				?>
			</h1>
		</div>

		<div class="hn-list">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('template-parts/post-row'); ?>
				<?php endwhile; ?>

				<div class="hn-pagination-wrap">
					<?php
					the_posts_pagination(
						[
							'mid_size' => 1,
							'prev_text' => __('Prev', 'hamroniti'),
							'next_text' => __('Next', 'hamroniti'),
						]
					);
					?>
				</div>
			<?php else : ?>
				<p style="padding:0 16px; color:var(--hn-muted);"><?php esc_html_e('No results found.', 'hamroniti'); ?></p>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();

