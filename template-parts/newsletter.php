<?php
/**
 * Newsletter CTA (UI-only v1).
 *
 * @package HamroNiti
 */

if (!defined('ABSPATH')) {
	exit;
}
?>
<section class="hn-newsletter" aria-label="<?php esc_attr_e('Newsletter', 'hamroniti'); ?>">
	<div style="text-align:center;">
		<div style="display:inline-flex;align-items:center;justify-content:center;width:56px;height:56px;border-radius:999px;background:rgba(255,255,255,.20);">
			<span class="material-symbols-outlined" aria-hidden="true" style="font-size:30px;">mail</span>
		</div>

		<h3 class="hn-serif"><?php esc_html_e('Stay Informed', 'hamroniti'); ?></h3>
		<p><?php esc_html_e('Get weekly insights delivered to your inbox', 'hamroniti'); ?></p>

		<form class="hn-newsletter-form" action="#" method="post" onsubmit="return false;">
			<label class="hn-sr-only" for="hn-newsletter-email"><?php esc_html_e('Email address', 'hamroniti'); ?></label>
			<input id="hn-newsletter-email" class="hn-input" type="email" placeholder="<?php echo esc_attr__('Enter your email', 'hamroniti'); ?>" autocomplete="email" />
			<button class="hn-btn" type="button" style="background:var(--hn-accent);"><?php esc_html_e('Subscribe', 'hamroniti'); ?></button>
		</form>

		<small><?php esc_html_e('No spam. Unsubscribe anytime.', 'hamroniti'); ?></small>
	</div>
</section>

