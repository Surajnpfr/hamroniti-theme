<?php
/**
 * Fallback template.
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
				<?php esc_html_e('Latest', 'hamroniti'); ?>
			</h1>
		</div>

		<div class="hn-list">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('template-parts/post-row'); ?>
				<?php endwhile; ?>
			<?php else : ?>
				<p style="padding:0 16px; color:var(--hn-muted);"><?php esc_html_e('No posts found.', 'hamroniti'); ?></p>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();

