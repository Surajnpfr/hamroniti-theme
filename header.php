<?php
/**
 * Header template.
 *
 * @package HamroNiti
 */

if (!defined('ABSPATH')) {
	exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="hnProgressBar" class="hn-progress" aria-hidden="true"></div>

<div class="hn-container">
	<header class="hn-header hn-glass">
		<div class="hn-header-inner">
			<button class="hn-icon-btn hn-menu-btn" type="button" data-hn-toggle-menu aria-controls="hnMenuPanel" aria-expanded="false" aria-label="<?php esc_attr_e('Open menu', 'hamroniti'); ?>">
				<span class="material-symbols-outlined" aria-hidden="true">menu</span>
			</button>

			<div class="hn-title hn-serif">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="hn-title" style="text-decoration:none;">
					Hamro<span>Niti</span>
				</a>
			</div>

			<button class="hn-icon-btn" type="button" data-hn-toggle-search aria-controls="hnSearchPanel" aria-label="<?php esc_attr_e('Search', 'hamroniti'); ?>">
				<span class="material-symbols-outlined" aria-hidden="true">search</span>
			</button>
		</div>

		<nav class="hn-top-nav" aria-label="<?php esc_attr_e('Primary navigation', 'hamroniti'); ?>">
			<?php
			wp_nav_menu(
				[
					'theme_location' => 'primary',
					'container' => false,
					'menu_class' => 'hn-menu hn-menu--desktop',
					'fallback_cb' => false,
					'depth' => 1,
				]
			);
			?>
		</nav>

		<div id="hnSearchPanel" hidden style="padding:0 16px 14px;">
			<div style="position:relative;">
				<?php get_search_form(); ?>
				<button class="hn-icon-btn" type="button" data-hn-close-search aria-label="<?php esc_attr_e('Close search', 'hamroniti'); ?>" style="position:absolute; right:0; top:50%; transform:translateY(-50%);">
					<span class="material-symbols-outlined" aria-hidden="true">close</span>
				</button>
			</div>
		</div>

		<div id="hnMenuPanel" class="hn-drawer" hidden>
			<div class="hn-drawer__backdrop" data-hn-close-menu aria-hidden="true"></div>
			<div class="hn-drawer__panel" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e('Menu', 'hamroniti'); ?>">
				<div class="hn-drawer__head">
					<div class="hn-drawer__title hn-serif"><?php esc_html_e('Menu', 'hamroniti'); ?></div>
					<button class="hn-icon-btn" type="button" data-hn-close-menu aria-label="<?php esc_attr_e('Close menu', 'hamroniti'); ?>">
						<span class="material-symbols-outlined" aria-hidden="true">close</span>
					</button>
				</div>

				<div class="hn-drawer__body">
					<?php
					wp_nav_menu(
						[
							'theme_location' => 'primary',
							'container' => false,
							'menu_class' => 'hn-menu hn-menu--drawer',
							'fallback_cb' => false,
							'depth' => 2,
						]
					);
					?>
				</div>
			</div>
		</div>
	</header>

