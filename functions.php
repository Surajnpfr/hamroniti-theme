<?php
/**
 * HamroNiti theme functions.
 *
 * @package HamroNiti
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Theme setup.
 */
function hamroniti_theme_setup() {
	load_theme_textdomain('hamroniti', get_template_directory() . '/languages');

	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support(
		'html5',
		[
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		]
	);

	register_nav_menus(
		[
			'primary' => __('Primary Menu', 'hamroniti'),
			'footer' => __('Footer Menu', 'hamroniti'),
		]
	);
}
add_action('after_setup_theme', 'hamroniti_theme_setup');

/**
 * Enqueue theme assets.
 */
function hamroniti_enqueue_assets() {
	$theme_version = wp_get_theme()->get('Version');

	// Fonts (can be self-hosted later).
	wp_enqueue_style(
		'hamroniti-fonts',
		'https://fonts.googleapis.com/css2?family=Newsreader:opsz,wght@6..72,200..800&family=Inter:wght@400;500;600;700;800&display=swap',
		[],
		null
	);
	wp_enqueue_style(
		'hamroniti-material-symbols',
		'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap',
		[],
		null
	);

	wp_enqueue_style(
		'hamroniti-theme',
		get_template_directory_uri() . '/assets/css/theme.css',
		['hamroniti-fonts', 'hamroniti-material-symbols'],
		$theme_version
	);

	wp_enqueue_script(
		'hamroniti-theme',
		get_template_directory_uri() . '/assets/js/theme.js',
		[],
		$theme_version,
		true
	);

	wp_localize_script(
		'hamroniti-theme',
		'HamroNitiTheme',
		[
			'isSingle' => is_single(),
		]
	);
}
add_action('wp_enqueue_scripts', 'hamroniti_enqueue_assets');

/**
 * Estimate reading time in minutes.
 */
function hamroniti_reading_time_minutes($post_id = null) {
	$post_id = $post_id ?: get_the_ID();
	$content = (string) get_post_field('post_content', $post_id);
	$word_count = str_word_count(wp_strip_all_tags($content));

	$wpm = 200;
	$minutes = (int) ceil(max(1, $word_count / $wpm));

	return $minutes;
}

/**
 * Resolve featured post for homepage: prefer sticky, fallback to latest.
 *
 * @return WP_Post|null
 */
function hamroniti_get_featured_post() {
	$sticky_ids = get_option('sticky_posts');

	if (is_array($sticky_ids) && !empty($sticky_ids)) {
		$sticky_query = new WP_Query(
			[
				'post__in' => $sticky_ids,
				'posts_per_page' => 1,
				'ignore_sticky_posts' => 1,
				'orderby' => 'date',
				'order' => 'DESC',
			]
		);
		if ($sticky_query->have_posts()) {
			return $sticky_query->posts[0];
		}
	}

	$latest_query = new WP_Query(
		[
			'posts_per_page' => 1,
			'ignore_sticky_posts' => 1,
		]
	);
	if ($latest_query->have_posts()) {
		return $latest_query->posts[0];
	}

	return null;
}

