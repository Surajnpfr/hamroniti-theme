<?php
/**
 * 404 template.
 *
 * @package HamroNiti
 */

if (!defined('ABSPATH')) {
	exit;
}

get_header();
?>

<main class="hn-content">
	<div class="hn-card" style="padding:16px; box-shadow:0 10px 25px rgba(17,24,39,.06);">
		<h1 class="hn-serif" style="margin-top:0;"><?php esc_html_e('Page not found', 'hamroniti'); ?></h1>
		<p style="color:var(--hn-muted);">
			<?php esc_html_e('The page you are looking for does not exist or was moved.', 'hamroniti'); ?>
		</p>
		<p style="margin:14px 0 0;">
			<a class="hn-btn" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to Home', 'hamroniti'); ?></a>
		</p>
	</div>
</main>

<?php
get_footer();

