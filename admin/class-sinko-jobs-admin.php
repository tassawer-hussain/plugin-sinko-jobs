<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://tassawer.com
 * @since      1.0.0
 *
 * @package    Sinko_Jobs
 * @subpackage Sinko_Jobs/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sinko_Jobs
 * @subpackage Sinko_Jobs/admin
 * @author     Tassawer Hussain <support@tassawer.com>
 */
class Sinko_Jobs_Admin {

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
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		add_action( 'init', array( $this, 'register_jobs_cpts' ) );
		add_filter( 'acf/load_field/name=position', array( $this, 'update_job_apply_form_position_field' ) );
		add_action( 'acf/save_post', array( $this, 'send_job_entry_admin_notification' ) );
		add_action( 'acf/validate_save_post', array( $this, 'sinko_acf_validate_save_post' ), 10, 0 );
		add_filter( 'post_row_actions', array( $this, 'add_download_link_to_row_actions' ), 10, 2 );
	}

	/**
	 * Register the stylesheets for the admin area.
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

		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sinko-jobs-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
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

		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sinko-jobs-admin.js', array( 'jquery' ), $this->version, false );
	}


	/**
	 * Register the custom post type for jobs.
	 *
	 * @return void
	 */
	public function register_jobs_cpts() {
		/**
		 * Post Type: Jobs.
		 */

		$labels = array(
			'name'          => esc_html__( 'Vacatures', 'sinko-jobs' ),
			'singular_name' => esc_html__( 'Vacature', 'sinko-jobs' ),
		);

		$args = array(
			'label'                 => esc_html__( 'Vacatures', 'sinko-jobs' ),
			'labels'                => $labels,
			'description'           => '',
			'public'                => true,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_rest'          => true,
			'rest_base'             => '',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'rest_namespace'        => 'wp/v2',
			'has_archive'           => false,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'delete_with_user'      => false,
			'exclude_from_search'   => false,
			'capability_type'       => 'post',
			'map_meta_cap'          => true,
			'hierarchical'          => false,
			'can_export'            => false,
			'rewrite'               => array(
				'slug'       => 'jobs',
				'with_front' => true,
			),
			'query_var'             => true,
			'menu_icon'             => 'dashicons-portfolio',
			'supports'              => array( 'title', 'thumbnail' ),
			'show_in_graphql'       => false,
		);

		register_post_type( 'jobs', $args );

		/**
		* Post Type: Job Entries.
		*/

		$labels = array(
			'name'          => esc_html__( 'Aanmeldingen', 'sinko-jobs' ),
			'singular_name' => esc_html__( 'Aanmelden', 'sinko-jobs' ),
		);

		$args = array(
			'label'                 => esc_html__( 'Aanmeldingen', 'sinko-jobs' ),
			'labels'                => $labels,
			'description'           => '',
			'public'                => true,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_rest'          => true,
			'rest_base'             => '',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'rest_namespace'        => 'wp/v2',
			'has_archive'           => false,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'delete_with_user'      => false,
			'exclude_from_search'   => false,
			'capability_type'       => 'post',
			'map_meta_cap'          => true,
			'hierarchical'          => false,
			'can_export'            => false,
			'rewrite'               => array(
				'slug'       => 'job-entries',
				'with_front' => true,
			),
			'query_var'             => true,
			'menu_icon'             => 'dashicons-id-alt',
			'supports'              => array( 'title' ),
			'show_in_graphql'       => false,
		);

		register_post_type( 'job-entries', $args );
	}



	/**
	 * Auto fill the position field from the post title.
	 *
	 * @param mixed $field Field array.
	 * @return $field Field array.
	 */
	public function update_job_apply_form_position_field( $field ) {
		if ( is_admin() ) {
			return $field;
		}

		global $post;

		if ( get_post_type( $post->ID ) === 'jobs' ) {
			$field['default_value'] = get_the_title( $post->ID );
			$field['readonly']      = 1;
		}
		// if field should be disabled.

		return $field;
	}

	/**
	 * Validate the job apply form date.
	 *
	 * @return void
	 */
	public function sinko_acf_validate_save_post() {

		$experience_from = $_POST['acf']['field_63cb73bd7101e']['row-0']['field_63cb81bec0343'];
		$experience_to   = $_POST['acf']['field_63cb73bd7101e']['row-0']['field_63cb81cfc0344'];

		if ( $experience_from > $experience_to ) {
			acf_add_validation_error( 'acf[field_63cb73bd7101e][row-0][field_63cb81cfc0344]', 'To date should be greater than from date.' );
		}

		$education_from = $_POST['acf']['field_63cb8226bd57a']['row-0']['field_63cb8226bd57e'];
		$education_to   = $_POST['acf']['field_63cb8226bd57a']['row-0']['field_63cb8226bd57f'];

		if ( $education_from > $education_to ) {
			acf_add_validation_error( 'acf[field_63cb8226bd57a][row-0][field_63cb8226bd57f]', 'To date should be greater than from date.' );
		}
	}


	/**
	 * Handle Job apply form submit.
	 *
	 * @param string $post_id Job Entry ID.
	 * @return void
	 */
	public function send_job_entry_admin_notification( $post_id ) {

		// bail early if not a contact_form post.
		if ( get_post_type( $post_id ) !== 'job-entries' ) {
			return;
		}

		// bail early if editing in admin.
		if ( is_admin() ) {
			return;
		}

		$first_name = get_field( 'first_name', $post_id );
		$last_name  = get_field( 'last_name', $post_id );
		$position   = get_field( 'position', $post_id );

		wp_update_post(
			array(
				'ID'         => $post_id,
				'post_title' => $first_name . ' ' . $last_name . ' - ' . $position,
			)
		);

		$to = 'info@sinko-consultants.com';

		$headers[] = 'Content-type: text/html; charset=utf-8';
		$headers[] = 'From: ' . get_bloginfo( 'name' ) . ' <info@sinko-consultants.com>' . "\r\n";

		$subject = 'Nieuwe aanmelding op vacatuur	- ' . $position;

		$content  = '<p>Beste administrator,</p>';
		$content .= '<p>Er is zojuist een sollicitatieformulier ingevuld voor vacature ' . $position . '.</p>';
		$content .= '<p>De gegevens van de kandidaat zijn te downloaden via de volgende link:</p>';
		$content .= '<p><a href="' . get_site_url() . '/download?entry=' . $post_id . '" target="_blank">Bijlage downloaden</a></p>';
		$content .= '<p>Groeten,</p>';
		$content .= '<p><a href="' . get_site_url() . '" target="_blank">Sinkoconsultants.nl</a></p>';

		wp_mail( $to, $subject, $content, $headers );
	}


	/**
	 * Add download link to row actions.
	 *
	 * @param array   $actions Actions.
	 * @param WP_Post $post Post.
	 * @return array
	 */
	public function add_download_link_to_row_actions( $actions, WP_Post $post ) {
		if ( 'job-entries' !== $post->post_type ) {
			return $actions;
		}

		$actions['job-entry-download'] = '<a href="' . get_site_url() . '/download?entry=' . $post->ID . '" target="_blank">Download Entry Doc</a>';
		return $actions;
	}

}
