<?php
/**
 * The "Writing" page template file.
 *
 * @package WordPress
 * @subpackage rhd
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">
			<div class="page-title">Writing</div>

			<?php $writing_q = new WP_Query( 'category_name=writing&post_status=publish' ); ?>

			<?php if ( $writing_q->have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( $writing_q->have_posts() ) : $writing_q->the_post(); ?>

					<?php get_template_part( 'content' ); ?>

				<?php endwhile; ?>

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>