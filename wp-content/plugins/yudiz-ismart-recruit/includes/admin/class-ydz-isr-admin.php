<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Admin Class
 *
 * Manage Admin Panel Class
 *
 * @package Yudiz iSmart Recruit
 * @since 1.0.0
 */

class Ydz_Isr_Admin {

	//class constructor
	function __construct() {
	}


	public function ydz_isr_register_admin_setting_page(){
		

		add_menu_page(
			__( 'iSmart Recruit', 'textdomain' ),
			'iSmart Recruit',
			'manage_options',
			'ismartrecruit-settings',
			array($this,'ydz_isr_setting_form')					
		);		

		add_submenu_page(
			'ismartrecruit-settings',
			esc_html__('Settings', 'wpems'),
			esc_html__('Settings', 'wpems'),
			'manage_options',
			'ismartrecruit-settings',
			array($this, 'ydz_isr_setting_form')
		);
		
		add_submenu_page(
			'ismartrecruit-settings',
			esc_html__('API Logs', 'wpems'),
			esc_html__('API Logs', 'wpems'),
			'manage_options',
			'ismartrecruit-api-logs',
			array($this, 'ydz_isr_api_logs')
		);
	}


	public function ydz_isr_setting_form(){

		ob_start();    

	    $posts = get_posts(array(
	        'post_type'     => 'wpcf7_contact_form',
	        'numberposts'   => -1
	    ));    

		$ismart_endpoint = get_option('ismart_endpoint');
		$ismart_api_key = get_option('ismart_api_key');
		$ismart_carrier_form = get_option('ismart_carrier_form');
		$ismart_carrier_individual_form = get_option('ismart_carrier_individual_form');
		?>
		<div class="wrap">
			<h1>General Settings</h1>
			<form method="post">
				<table class="form-table" role="presentation">
					<tbody>
						<tr>
							<th>Endpoint</th>
							<td>
								<input type="text" name="ismart_endpoint" value="<?php echo $ismart_endpoint ?>" class="regular-text">
							</td>
						</tr>
						<tr>
							<th>API Key</th>
							<td>
								<input type="text" name="ismart_api_key" value="<?php echo $ismart_api_key ?>"  class="regular-text">
							</td>
						</tr>
						<tr>
							<th>Carrier Form</th>
							<td>
								<select name="ismart_carrier_form">
									<option value="">--Select--</option>
									<?php 
									foreach ( $posts as $p ) {
									    echo '<option value="'.$p->ID.'"'.selected($p->ID,$ismart_carrier_form,false).'>'.$p->post_title.' ('.$p->ID.')</option>';
									} 
									?>									
								</select>
							</td>
						</tr>
						<tr>
							<th>Carrier Individual Form</th>
							<td>
								<select name="ismart_carrier_individual_form">
									 <option value="">--Select--</option>
									<?php 
									foreach ( $posts as $p ) {
									    echo '<option value="'.$p->ID.'"'.selected($p->ID,$ismart_carrier_individual_form,false).'>'.$p->post_title.' ('.$p->ID.')</option>';
									} 
									?>
								</select>
							</td>
						</tr>

						<tr>
							<td><input type="submit" name="save_ismart_recuite_settings" value="Save Changes" class="button button-primary"></td>							
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<?php
		echo ob_get_clean();
	}

	public function ydz_isr_api_logs(){

		$file_name = YDZ_ISR_INC_DIR .'/logs/log.txt';
		$fp = fopen(YDZ_ISR_INC_DIR .'/logs/log.txt', 'r');

		if( !empty(filesize($file_name))){
			$contents = fread($fp, filesize($file_name));//read file
		}
		else{
			$contents = 'No logs available';
		}
		
		?>
		 <div style="background:#fff; padding:15px;overflow: auto;height: auto; max-height:790px">
		 	<div style="display:flex; align-items:center;">
				<h2>iSmart Recruit API Logs</h2>
				<a style="margin-left:15px" class="button button-primary" href="<?php echo admin_url('admin.php?page=ismartrecruit-settings&action=clear-logs') ?>">Clear Logs </a>
			</div>
			<?php echo "<pre>$contents</pre>";//printing data of file   ?>
		</div>
		<?php
	}

	public function ydz_isr_clear_api_logs(){
		if( isset($_GET['action']) && $_GET['action']  == 'clear-logs'){
			file_put_contents( YDZ_ISR_INC_DIR .'/logs/log.txt', "" );
			wp_redirect(admin_url('admin.php?page=ismartrecruit-settings'));
			die();
		}
	}

	public function ydz_isr_save_ismart_recuite_settings(){

		if( isset( $_POST['save_ismart_recuite_settings']) ){

			foreach ($_POST as $option_name => $option_value) {

				if( $option_name == 'save_ismart_recuite_settings'){
					continue;
				}

				update_option($option_name,$option_value);
			}
		}
	}

	/**
	 * Adding Hooks
	 *
	 * @package Yudiz iSmart Recruit
	 * @since 1.0.0
	 */
	function add_hooks(){
		add_action( 'admin_menu', array($this,'ydz_isr_register_admin_setting_page'));
		add_action('admin_init',array($this,'ydz_isr_clear_api_logs'));
		add_action('admin_init',array($this,'ydz_isr_save_ismart_recuite_settings'));
	}
}