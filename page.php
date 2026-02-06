<?php
/**
 * Page template.
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
		?>
		<main class="hn-content">
			<h1 class="hn-serif"><?php the_title(); ?></h1>
			<article>
				<?php the_content(); ?>
			</article>
		</main>
		<?php
	endwhile;
endif;

get_footer();

