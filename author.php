<?php
/**
 * Author archive template.
 *
 * @package HamroNiti
 */

if (!defined('ABSPATH')) {
	exit;
}

get_header();

$author = get_queried_object();
?>

<main>
	<section class="hn-section">
		<div class="hn-section-head">
			<h1 class="hn-section-title hn-serif" style="font-size:20px;">
				<?php
				printf(
					/* translators: %s: author display name */
					esc_html__('Author: %s', 'hamroniti'),
					'<span style="color:var(--hn-accent);">' . esc_html($author->display_name ?? '') . '</span>'
				);
				?>
			</h1>
		</div>

		<?php if (!empty($author->description)) : ?>
			<div style="padding:0 16px 10px; color:var(--hn-muted); font-size:13px;">
				<?php echo wp_kses_post(wpautop($author->description)); ?>
			</div>
		<?php endif; ?>

		<div class="hn-list">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('template-parts/post-row'); ?>
				<?php endwhile; ?>

				<div style="padding:14px 16px;">
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
				<p style="padding:0 16px; color:var(--hn-muted);"><?php esc_html_e('No posts found.', 'hamroniti'); ?></p>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();

