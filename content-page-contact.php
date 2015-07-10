<?php
/**
 * The template for displaying "Contact" page content.
 *
 * @package WordPress
 * @subpackage rhd
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h2 class="page-title <?php echo (is_front_page()) ? 'invisible' : ''; ?>"><?php the_title(); ?></h2>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				// MailChimp
				$instance = array(
					'title' => 'SUBSCRIBE',
					'text' => __("Sign our email list to almost never get an email from us! Send us a message if you'd might like to host a show in your home. We are going everywhere."),
					'button' => 'Submit',
					'fname' => true,
					'lname' => true
				);

				$args = array(
					'before_title' => '<h3 class="widgettitle">',
					'after_title' => '</h3>'
				);

				the_widget( 'RHD_Mailchimp_Widget_GH', $instance, $args );
			?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'rhd' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'rhd' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
