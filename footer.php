<?php
/**
 * Footer template for HamroNiti theme.
 *
 * @package HamroNiti
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<footer id="colophon" class="hn-footer" role="contentinfo">
	<div class="hn-footer-inner">
		<div class="hn-footer-col">
			<div class="hn-footer-brand hn-serif"><?php bloginfo( 'name' ); ?></div>
			<div class="hn-footer-desc">
				<?php echo esc_html__( 'Hamro Niti is Nepal’s first youth-led weekly newsletter focused on improving civic understanding. We explain government policies, everyday economic decisions, and key social issues in a clear and accessible way so citizens, especially young people, can better understand how public decisions affect their lives. Hamro Niti is an independent, non-profit-oriented initiative with no political affiliation. Our work is driven by research, clarity, and a commitment to informed public discourse.', 'hamroniti' ); ?>
			</div>

			<div class="hn-social" aria-label="<?php esc_attr_e( 'Social links', 'hamroniti' ); ?>">
				<a href="https://www.facebook.com/share/1BKEJuzAGR/?mibextid=wwXIfr" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
					<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
						<path d="M22 12a10 10 0 1 0-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.49-3.88 3.77-3.88 1.1 0 2.25.2 2.25.2v2.46h-1.27c-1.25 0-1.64.78-1.64 1.57V12h2.79l-.45 2.89h-2.34v6.99A10 10 0 0 0 22 12z"/>
					</svg>
				</a>
				<a href="https://www.instagram.com/hamroniti" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
					<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
						<path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5zm10 2H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3z"/>
						<path d="M12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0 2a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/>
						<path d="M17.5 6.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
					</svg>
				</a>
				<a href="https://www.tiktok.com/@hamro.niti" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
					<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
						<path d="M16.5 3c.6 2.9 2.6 4.7 5.5 4.9v3.1c-2 0-3.8-.6-5.5-1.7v6.2c0 3.6-2.9 6.5-6.5 6.5S3.5 19.1 3.5 15.5 6.4 9 10 9c.4 0 .7 0 1.1.1v3.6c-.3-.1-.7-.2-1.1-.2-1.6 0-2.9 1.3-2.9 2.9s1.3 2.9 2.9 2.9 2.9-1.3 2.9-2.9V3h3.5z"/>
					</svg>
				</a>
				<a href="https://www.linkedin.com/company/hamro-niti/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
					<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
						<path d="M4.98 3.5A2.5 2.5 0 1 1 5 8.5a2.5 2.5 0 0 1-.02-5zM3.5 9h3v12h-3V9zM9 9h2.9v1.7h.1c.4-.8 1.5-1.9 3.2-1.9 3.4 0 4 2.1 4 5v7.2h-3v-6.4c0-1.5 0-3.4-2.1-3.4s-2.4 1.6-2.4 3.3V21H9V9z"/>
					</svg>
				</a>
			</div>
		</div>

		<div class="hn-footer-col">
			<div class="hn-footer-title"><?php esc_html_e( 'Subscribe to our Newsletter', 'hamroniti' ); ?></div>
			<?php
			// Newsletter Plugin Shortcode
			if ( function_exists( 'do_shortcode' ) && shortcode_exists( 'newsletter_form' ) ) {
				echo do_shortcode( '[newsletter_form]' );
			} else {
				echo '<div class="hn-footer-desc">' . esc_html__( 'Newsletter form unavailable. Please enable The Newsletter Plugin.', 'hamroniti' ) . '</div>';
			}
			?>
		</div>
	</div>

	<div class="hn-footer-bottom">
		<div>
			&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>
			<span style="font-size:90%">| <?php echo esc_html__( 'Developed by Suraj Nepal', 'hamroniti' ); ?></span>
		</div>
		<div class="hn-footer-links">
			<?php
			$privacy_url = get_privacy_policy_url();
			if ( empty( $privacy_url ) ) {
				$privacy_url = 'https://hamroniti.com/privacy-policy/';
			}
			?>
			<a href="<?php echo esc_url( $privacy_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Privacy Policy', 'hamroniti' ); ?></a>
			<a href="https://hamroniti.com/terms-and-conditions/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Terms of Use', 'hamroniti' ); ?></a>
		</div>
	</div>
</footer>

</div><!-- .hn-container -->

<?php wp_footer(); ?>
</body>
</html>
