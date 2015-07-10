<?php
/**
 * The "Press" page template file.
 *
 * @package WordPress
 * @subpackage rhd
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">
			<div class="page-title">Press</div>

			<?php $press_q = new WP_Query( 'category_name=press&post_status=publish' ); ?>

			<?php if ( $press_q->have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( $press_q->have_posts() ) : $press_q->the_post(); ?>

					<?php get_template_part( 'content' ); ?>

				<?php endwhile; ?>

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>