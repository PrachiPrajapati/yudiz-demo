<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Public Class
 *
 * Manage Frontend
 *
 * @package Yudiz iSmart Recruit
 * @since 1.0.0
 */

class Ydz_Isr_Public {

	//class constructor
	function __construct() {
	}

	public function ydz_isr_after_email_send_ismart_requiest( $contact_form  ){	

		$posted_data = array();

		if( !in_array( $contact_form->id, YDZ_ISR_ISMART_API_CF7_IDS  ) ){
			return;
		}

		$submission = WPCF7_Submission::get_instance();  
	    if ( $submission ) {
	        $posted_data = $submission->get_posted_data();
	    }

	    // Variable Declaration
	    $name = $email = $mobile = $designation = $experience = $company_name = $current_ctc = $expected_ctc = $notice_period = $message = '';
	    $uploaded_file_path = '';
	    $resume = '';

	    $file_data = $submission->uploaded_files();

	   	if( $contact_form->id == YDZ_ISR_ISMART_CARRIER_FORM_ID ){
	   		$name 			= isset($posted_data['text-1']) ? $posted_data['text-1'] : '';
		    $email 			= isset($posted_data['email-2']) ? $posted_data['email-2'] : '';
		    $mobile 		= isset($posted_data['tel-653']) ? $posted_data['tel-653'] : '';
		    $designation	= isset($posted_data['menu-966'][0]) ? $posted_data['menu-966'][0] : '';
		    $experience 	= isset($_POST['menu-974']) ? $_POST['menu-974'] : '';
		    $company_name 	= isset($posted_data['text-6']) ? $posted_data['text-6'] : '';
		    $current_ctc 	= isset($posted_data['number-502']) ? $posted_data['number-502'] : '';
		    $expected_ctc 	= isset($posted_data['number-374']) ? $posted_data['number-374'] : '';
		    $notice_period 	= isset($posted_data['menu-670'][0]) ? $posted_data['menu-670'][0] : '';
		    $message 		= isset($posted_data['textarea-10']) ? $posted_data['textarea-10'] : '';
		    $uploaded_file_path = isset( $file_data['file-5'][0]) ?  $file_data['file-5'][0] : '';
		    $file_name 		= isset($_FILES['file-170']['name']) ? $_FILES['file-170']['name'] : '';
	   	}
	   	else{
	   		$name 			= isset($posted_data['text-96']) ? $posted_data['text-96'] : '';
		    $email 			= isset($posted_data['email-526']) ? $posted_data['email-526'] : '';
		    $mobile 		= isset($posted_data['tel-622']) ? $posted_data['tel-622'] : '';
		    $company_name 	= isset($posted_data['text-190']) ? $posted_data['text-190'] : '';
		    $current_ctc 	= isset($posted_data['number-419']) ? $posted_data['number-419'] : '';
		    $expected_ctc 	= isset($posted_data['number-582']) ? $posted_data['number-582'] : '';

		    $notice_period 	= isset($posted_data['menu-670'][0]) ? $posted_data['menu-670'][0] : '';
		    $message 		= isset($posted_data['hiring-manager-message']) ? $posted_data['hiring-manager-message'] : '';
		    $uploaded_file_path = isset($file_data['file-170'][0]) ? $file_data['file-170'][0] : '';
		    $file_name 		= isset($_FILES['file-5']['name']) ? $_FILES['file-5']['name'] : '';
	   	}	   	

	    // Convert file data to base64
	    if( !empty($uploaded_file_path)){
		    $fp = fopen($uploaded_file_path, "rb");
			$binary = fread($fp, filesize($uploaded_file_path));
			$resume =  base64_encode($binary);
		}  

	    $post_data = array();	    
	    if( !empty( $name ) ){
	    	$post_data['cndName'] = $name;
	    }
	    if( !empty( $email ) ){
	    	$post_data['email'] = $email;
	    }
	    if( !empty( $mobile ) ){
	    	$post_data['mobile'] = $mobile;
	    }
	    if( !empty( $designation ) ){
	    	$post_data['designation'] = $designation;
	    }
	    if( !empty( $experience ) ){
	    	$post_data['totalExperience'] = $experience;
	    }
	    if( !empty( $company_name ) ){
	    	$post_data['currentEmployer'] = $company_name;
	    }
	    if( !empty( $current_ctc ) ){
	    	$post_data['currentCtc'] = $current_ctc;
	    }
	    if( !empty( $expected_ctc ) ){
	    	$post_data['expectedCtc'] = $expected_ctc;
	    }
	    if( !empty( $notice_period ) ){
	    	$post_data['noticePeriod'] = $notice_period;
	    }
	    if( !empty( $message ) ){
	    	$post_data['custField3'] = $message;
	    }
	    if( !empty( $resume ) ){
	    	$post_data['resume'] = $resume;
	    }
	    if( !empty( $file_name ) ){
	    	$post_data['fileName'] = $file_name;
	    } 	


	    $response = wp_remote_post( YDZ_ISR_ISMART_API_ENDPOINT, array(
		    'body'    => json_encode($post_data),
		    'headers' => array(
		        'apiKey' 			=> YDZ_ISR_ISMART_API_KEY,
		        'updateDuplicate' 	=> YDZ_ISR_ISMART_API_UPDATE_DUBLICATE,
		        'Content-Type' 		=> 'application/json',
		    ),
		));

		if ( is_wp_error( $response ) ) {
		    $error_message = $response->get_error_message();
		    $errors = array(
		    	'code' => 400,
		    	'message' => $error_message
		    );
		    $this->ydz_isr_write_log($response);
		}
		else {
			$this->ydz_isr_write_log($response);			
		}
		
	}

	public function ydz_isr_experience_field_modification( $tag ){
		if ($tag['basetype'] != 'select'){
		    return $tag;
		}

	  	if( $tag['raw_name'] != 'menu-974' ){
	    	return $tag;
	  	}

  		$values = [];
  		$labels = [];

	  	foreach ($tag['raw_values'] as $raw_value) {

	    	$raw_value_parts = explode('|', $raw_value);

		    if (count($raw_value_parts) >= 2){

		      $values[] = $raw_value_parts[1];
		      $labels[] = $raw_value_parts[0];
		    }
		    else{
		      $values[] = $raw_value;
		      $labels[] = $raw_value;
		    }
	 	}

  		$tag['values'] = $values;$tag['labels'] = $labels;
  
  		$reversed_raw_values = array_map(function($raw_value){
	    	$raw_value_parts = explode('|', $raw_value);
	    	return implode('|', array_reverse($raw_value_parts));
	  	}, $tag['raw_values']);
	  		$tag['pipes'] = new \WPCF7_Pipes($reversed_raw_values);
	  		return $tag;
	}

	public function ydz_isr_write_log( $log ){
		$file = fopen(YDZ_ISR_INC_DIR .'/logs/log.txt','a');		
		fwrite($file, PHP_EOL);
		$wit = fwrite($file,'________________________________________________________________________________________________________________________________________________________________________________________');
		fwrite($file, PHP_EOL);
		$wit = fwrite($file,'Log Date: '.date('Y-m-d H:i:s'));
		fwrite($file, PHP_EOL);
		$wit = fwrite($file,print_r($log, true) );		
		fclose($file);
	}

	/**
	 * Adding Hooks
	 *
	 * @package Yudiz iSmart Recruit
	 * @since 1.0.0
	 */
	function add_hooks(){
		add_action('wpcf7_mail_sent',array($this,'ydz_isr_after_email_send_ismart_requiest'));
		add_filter('wpcf7_form_tag', array($this,'ydz_isr_experience_field_modification'), 10);		
	}
}