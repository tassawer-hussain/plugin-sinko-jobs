<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://tassawer.com
 * @since      1.0.0
 *
 * @package    Sinko_Jobs
 * @subpackage Sinko_Jobs/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Sinko_Jobs
 * @subpackage Sinko_Jobs/public
 * @author     Tassawer Hussain <support@tassawer.com>
 */
class Sinko_Jobs_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		add_shortcode( 'show_job_list', array( $this, 'render_job_list_html' ) );
		add_shortcode( 'show_apply_form', array( $this, 'render_apply_form_html' ) );
		add_filter( 'single_template', array( $this, 'load_single_jobs_template' ) );
		add_filter( 'page_template', array( $this, 'load_downloads_page_template' ) );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sinko_Jobs_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sinko_Jobs_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sinko-jobs-public.css', array(), time(), 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sinko_Jobs_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sinko_Jobs_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sinko-jobs-public.js', array( 'jquery' ), time(), false );

	}


	/**
	 * Render job list html
	 *
	 * @param array $atts Shortcode attributes.
	 * @return HTML
	 */
	public function render_job_list_html() {
		$args = array(
			'post_type'      => 'jobs',
			'posts_per_page' => -1,
		);

		$jobs = new WP_Query( $args );

		ob_start();

		if ( $jobs->have_posts() ) :
			?>
		<div class="sinko_jobs_list_wrapper">
			<div class="sinko_jobs_list_container">
				<div class="sinko_jobs_list_row sinko_jobs_list_heading">
					<p class="sinko_jobs_job_title">Positie</p>
					<p class="sinko_jobs_job_status">Status</p>
					<p class="sinko_jobs_job_location">Locatie</p>
				</div>
				<?php
				while ( $jobs->have_posts() ) :
					$jobs->the_post();
					?>
				<div class="sinko_jobs_list_row">
					<a href="<?php the_permalink(); ?>" class="sinko_jobs_job_title"><?php the_title(); ?></a>
					<p class="sinko_jobs_job_status"><?php the_field( 'job_status' ); ?></p>
					<p class="sinko_jobs_job_location"><?php the_field( 'job_location' ); ?></p>
				</div>
				<?php endwhile ?>
			</div>
		</div>
			<?php

		endif;
		wp_reset_postdata();

		return ob_get_clean();
	}


	/**
	 * Load single jobs template
	 *
	 * @param string $template Template path.
	 * @return string
	 */
	public function load_single_jobs_template( $template ) {
		global $post;

		if ( 'jobs' === $post->post_type && locate_template( array( 'single-jobs.php' ) ) !== $template ) {
			/*
			 * This is a 'jobs' post
			 * AND a 'single movie template' is not found on theme or child theme directories, so load it from our plugin directory.
			 */
			return plugin_dir_path( __FILE__ ) . '/partials/single-jobs.php';
		}

		return $template;
	}


	/**
	 * Load download page template.
	 *
	 * @param string $page_template Page template.
	 * @return string
	 */
	public function load_downloads_page_template( $page_template ) {
		if ( is_page( 'download' ) ) {
			$page_template = plugin_dir_path( __FILE__ ) . 'partials/download-entry.php';
		}

		return $page_template;
	}



	/**
	 * Render Apply from html
	 *
	 * @param array $atts Shortcode attributes.
	 * @return HTML
	 */
	public function render_apply_form_html() {
		add_action( 'wp_head', acf_form_head() );
		ob_start();
		?>
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
		<?php
		return ob_get_clean();
	}
}