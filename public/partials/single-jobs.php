<?php
/**
 * Template name: Job Application
 *
 * @link       https://tassawer.com
 * @since      1.0.0
 *
 * @package    Sinko_Jobs
 * @subpackage Sinko_Jobs/public/partials
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

acf_form_head();
get_header();

while ( have_posts() ) :
	the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
		<div class="sinko_job_single_page_wrapper">

			<div class="sinko_job_single_page_header">
				<div class="fusion-row">
					<div class="sinko_job_single_job_type"><?php the_field( 'job_type' ); ?></div>
					<div class="sinko_job_single_job_location"><?php the_field( 'job_location' ); ?></div>
					<div class="sinko_job_single_job_separator"></div>
					<h1 class="sinko_job_single_job_title"><?php the_title(); ?></h1>
					<a href="<?php home_url(); ?>" class="sinko_job_single_job_back">BACK TO CAREERS</a>
				</div>
			</div>

			<div class="sinko_job_single_page_nav">
				<div class="fusion-row">
					<div class="sinko_job_single_job_status">
						<div class="sinko_job_single_job_status_indicator <?php echo esc_html( sanitize_title( get_field( 'job_status' ) ) ); ?>"></div>
						<span><?php the_field( 'job_status' ); ?></span>
					</div>
					<div class="sinko_job_single_job_posted">
						Posted: <span><?php the_field( 'job_posted_on' ); ?></span>
					</div>
					<div class="sinko_job_single_job_posted">
						Closing date: <span><?php the_field( 'job_closing_on' ); ?></span>
					</div>
				</div>
			</div>

			<div class="sinko_job_single_job_content">
				<div class="fusion-row">
					<div class="sinko_job_single_job_description"><?php the_field( 'job_description' ); ?></div>
					<?php if ( isset( $_GET['updated'] ) ) : ?>
						<div class="sinko_job_single_job_form_success">Thank you for your application. We will be in touch soon.</div>
						<?php else : ?>
							<button type="button" class="sinko_job_single_job_form_trigger">Apply now</button>
					<?php endif; ?>
				</div>
			</div>

			<div class="sinko_job_single_job_form_wrapper">
				<div class="fusion-row">
					<div class="sinko_job_single_job_form">
						<?php
						acf_form(
							array(
								'field_groups' => array( 1849 ),
								'post_id'      => 'new_post',
								'post_title'   => false,
								'post_content' => false,
								'new_post'     => array(
									'post_type'   => 'job-entries',
									'post_status' => 'publish',
								),
								'return'       => get_site_url() . '/dank-je',
								'submit_value' => 'SUBMIT YOUR APPLICATION',
							)
						);
						?>
					</div>
				</div>
			</div>

		</div>
	</article>

	<?php
endwhile;
do_action( 'avada_after_content' );
get_footer();
