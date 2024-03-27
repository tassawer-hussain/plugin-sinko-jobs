<?php
/**
 * Template Name: Download Entry
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

get_header();

while ( have_posts() ) :
	the_post();

	if( ! isset( $_GET['entry'] ) ) {
		wp_redirect( home_url(), 301 );
		exit;
	}

	$entry_id    = $_GET['entry'];
	$experiences = get_field( 'experience', $entry_id );
	$education   = get_field( 'education', $entry_id );
	$languages   = get_field( 'languages', $entry_id );
	?>

<script
	  type="text/javascript"
	  src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"
	></script>
	<script
	  type="text/javascript"
	  src="<?php echo get_site_url(); ?>/wp-content/plugins/sinko-jobs/public/js/html-docx.js"
	></script>
	<script
	  type="text/javascript"
	  src="<?php echo get_site_url(); ?>/wp-content/plugins/sinko-jobs/public/js/generate.js"
	></script>


	<div class="download-page-wrapper">
			<div id="html-docx">
				<div class="WordSection1">
					<div class="Body doc-header" style="margin-bottom: 30pt;">
						<table 
						class="MsoNormalTable"
						border="0"
						cellspacing="0"
						cellpadding="0"
						width="642"
						style="border-collapse: collapse; border: none">
							<tr>
								<td width="240" style="width: 140pt">
									<img
										src="https://www.sinko-consultants.com/wp-content/uploads/2023/01/sinko-logo.png"
										width="140"
										height="110"
										alt="Sinko Logo"
									/>
								</td>
								<td style="width: 20pt">
									<p class="MsoNormal">&nbsp;</p>
								</td>
								<td>
									<div>
										<b><span style="font-size: 20pt">Resume</span></b>
										<p class="Body">
											<span style="font-size: 14pt"><?php echo esc_html( get_field( 'first_name', $entry_id ) ) . ' ' . esc_html( get_field( 'last_name', $entry_id ) ); ?></span>
										</p>
									</div>
								</td>
							</tr>
						</table>
					</div>

					<p class="Body"></p>

					<table
						class="MsoNormalTable"
						border="1"
						cellspacing="0"
						cellpadding="0"
						width="642"
						style="border-collapse: collapse; border: none"
					>
						<tr style="height: 15pt">
							<td
								width="642"
								colspan="6"
								valign="top"
								style="
									width: 481.5pt;
									border: solid black 1pt;
									padding: 4pt 4pt 4pt 4pt;
									height: 15pt;
								"
							>
								<p class="MsoNormal">&nbsp;</p>
							</td>
						</tr>
						<tr style="height: 15pt">
							<td
								width="99"
								valign="top"
								style="
									width: 74.45pt;
									border: solid black 1pt;
									border-top: none;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 15pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">Position</span></b>
								</p>
							</td>
							<td
								width="543"
								colspan="5"
								valign="top"
								style="
									width: 407.05pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 15pt;
								"
							>
								<p class="MsoNormal"><?php the_field( 'position', $entry_id ); ?></p>
							</td>
						</tr>
						<tr style="height: 30pt">
							<td
								width="99"
								valign="top"
								style="
									width: 74.45pt;
									border: solid black 1pt;
									border-top: none;
									padding: 4pt 4pt 4pt 4pt;
									height: 30pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">Current Location</span></b>
								</p>
							</td>
							<td
								width="543"
								colspan="5"
								valign="middle"
								style="
									width: 407.05pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									padding: 4pt 4pt 4pt 4pt;
									height: 30pt;
								"
							>
								<p class="MsoNormal"><?php the_field( 'current_location', $entry_id ); ?></p>
							</td>
						</tr>
						<tr style="height: 15pt">
							<td
								width="99"
								valign="top"
								style="
									width: 74.45pt;
									border: solid black 1pt;
									border-top: none;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 15pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">Nationality</span></b>
								</p>
							</td>
							<td
								width="543"
								colspan="5"
								valign="top"
								style="
									width: 407.05pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 15pt;
								"
							>
								<p class="MsoNormal"><?php the_field( 'nationality', $entry_id ); ?></p>
							</td>
						</tr>
						<tr style="height: 154pt">
							<td
								width="99"
								style="
									width: 74.45pt;
									border: solid black 1pt;
									border-top: none;
									padding: 4pt 4pt 4pt 4pt;
									height: 154pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">Summary</span></b>
								</p>
							</td>
							<td
								width="543"
								colspan="5"
								valign="middle"
								style="
									width: 407.05pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									padding: 4pt 4pt 4pt 4pt;
									height: 154pt;
								"
							>
								<div class="MsoNormal"><?php the_field( 'summary', $entry_id ); ?></div>
							</td>
						</tr>


						<tr style="height: 15pt">
							<td
								width="99"
								rowspan="<?php echo count( $experiences ) + 1; ?>"
								style="
									width: 74.45pt;
									border: solid black 1pt;
									border-top: none;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 15pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">Experience</span></b>
								</p>
							</td>
							<td
								width="161"
								valign="top"
								style="
									width: 120.9pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 15pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">Position</span></b>
								</p>
							</td>
							<td
								width="133"
								valign="top"
								style="
									width: 99.5pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 15pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">Company</span></b>
								</p>
							</td>
							<td
								width="134"
								valign="top"
								style="
									width: 100.65pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 15pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">Location</span></b>
								</p>
							</td>
							<td
								width="59"
								valign="top"
								style="
									width: 44.2pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 15pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">From</span></b>
								</p>
							</td>
							<td
								width="56"
								valign="top"
								style="
									width: 41.7pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 15pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">To</span></b>
								</p>
							</td>
						</tr>
						<?php foreach ( $experiences as $experience ) : ?>
						<tr style="height: 14.75pt">
							<td
								width="161"
								valign="top"
								style="
									width: 120.9pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="MsoNormal"><?php echo esc_html( $experience['experience_position'] ); ?></p>
							</td>
							<td
								width="133"
								valign="top"
								style="
									width: 99.5pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="MsoNormal"><?php echo esc_html( $experience['company'] ); ?></p>
							</td>
							<td
								width="134"
								valign="top"
								style="
									width: 100.65pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="MsoNormal"><?php echo esc_html( $experience['location'] ); ?></p>
							</td>
							<td
								width="59"
								valign="top"
								style="
									width: 44.2pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="MsoNormal"><?php echo esc_html( $experience['from'] ); ?></p>
							</td>
							<td
								width="56"
								valign="top"
								style="
									width: 41.7pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="MsoNormal"><?php echo esc_html( $experience['to'] ); ?></p>
							</td>
						</tr>
						<?php endforeach; ?>


						<tr style="height: 14.75pt">
							<td
								width="99"
								rowspan="<?php echo count( $education ) + 1; ?>"
								style="
									width: 74.45pt;
									border: solid black 1pt;
									border-top: none;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">Education</span></b>
								</p>
							</td>
							<td
								width="428"
								valign="top"
								colspan="2"
								style="
									width: 321.1pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">School / University</span></b>
								</p>
							</td>
							<td
								width="428"
								valign="top"
								style="
									width: 321.1pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">Degree</span></b>
								</p>
							</td>
							<td
								width="59"
								valign="top"
								style="
									width: 44.2pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">From</span></b>
								</p>
							</td>
							<td
								width="56"
								valign="top"
								style="
									width: 41.7pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">To</span></b>
								</p>
							</td>
						</tr>
						<?php foreach( $education as $edu ) : ?>
						<tr style="height: 14.75pt">
							<td
								width="428"
								valign="top"
								colspan="2"
								style="
									width: 321.1pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="MsoNormal"><?php echo esc_html( $edu['school_university'] ); ?></p>
							</td>
							<td
								width="428"
								valign="top"
								style="
									width: 321.1pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="MsoNormal"><?php echo esc_html( $edu['degree'] ); ?></p>
							</td>
							<td
								width="59"
								valign="top"
								style="
									width: 44.2pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="MsoNormal"><?php echo esc_html( $edu['from'] ); ?></p>
							</td>
							<td
								width="56"
								valign="top"
								style="
									width: 41.7pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="MsoNormal"><?php echo esc_html( $edu['to'] ); ?></p>
							</td>
						</tr>
						<?php endforeach; ?>


						<tr style="height: 14.75pt">
							<td
								width="99"
								rowspan="<?php echo count( $languages ); ?>"
								style="
									width: 74.45pt;
									border: solid black 1pt;
									border-top: none;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">Languages</span></b>
								</p>
							</td>
							<td
								width="543"
								colspan="5"
								valign="top"
								style="
									width: 407.05pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									background: whitesmoke;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
								"
							>
								<p class="MsoNormal"><?php echo $languages ? $languages[0] : '&nbsp;'; ?></p>
							</td>
						</tr>
						<?php
						foreach( $languages as $key => $lang ) :
							if( $key == 0 ) continue;
						?>
						<tr style="height: 14.75pt">
							<td
								width="543"
								colspan="5"
								valign="top"
								style="
									width: 407.05pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									padding: 4pt 4pt 4pt 4pt;
									height: 14.75pt;
									background: whitesmoke;
								"
							>
								<p class="MsoNormal"><?php echo esc_html( $lang ); ?></p>
							</td>
						</tr>
						<?php endforeach; ?>


						<tr style="height: 30pt">
							<td
								width="99"
								valign="top"
								style="
									width: 74.45pt;
									border: solid black 1pt;
									border-top: none;
									padding: 4pt 4pt 4pt 4pt;
									height: 30pt;
								"
							>
								<p class="TableStyle2" align="center" style="text-align: center">
									<b><span style="font-size: 12pt">Notice Period</span></b>
								</p>
							</td>
							<td
								width="543"
								colspan="5"
								valign="middle"
								style="
									width: 407.05pt;
									border-top: none;
									border-left: none;
									border-bottom: solid black 1pt;
									border-right: solid black 1pt;
									padding: 4pt 4pt 4pt 4pt;
									height: 30pt;
								"
							>
								<p class="MsoNormal"><?php the_field( 'notice_period', $entry_id ); ?></p>
							</td>
						</tr>
					</table>
				</div>
			</div>

			<div style="display: flex; gap: 0 10px">
				<button id="download-btn">Download as a Word Document</button>
					<?php if ( get_field( 'full_cv', $entry_id ) ) : ?>
					<a id="download-attached-file" href="<?php the_field( 'full_cv', $entry_id ); ?>">Download attached file</a>
					<?php endif; ?>
			</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function () {
			$('#download-btn').click(function() {
					HtmlToDocx({
						exportElement: '#html-docx',
						exportFileName: "<?php the_field( 'first_name', $entry_id ); ?>-entry.docx",
				});
			});
		});
	</script>

	<?php
endwhile;
get_footer();
