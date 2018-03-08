<?php
/**
 * Template Name: Lead Complete Profile
 */
error_reporting(0);
$lead_code = $_REQUEST['hashverify'];
$user_id = base64_decode($lead_code);

$user = get_userdata($user_id);
if( $user === false ){ 
$redirecturl = home_url();
echo "<script>
            alert('Sorry! Your profile does not exists in our database.');
            window.location.href='$redirecturl';
            </script>";
			exit;
    
}else{

}


$user_info_data = get_userdata($user_id); 
$profileid = $user_info_data->ID;

if(!empty($_POST)){ 
        global $wpdb;
		
		$formdata = $_POST;
		$profileid = $_POST['profileid'];
        $name = $formdata['your_name'];
		$description = $formdata['project_detail'];
		$password = $formdata['your_password'];
        $name_parts = explode(' ',$name);
		
		##### start add custom technology if not exists
			$expertisetaxonomydata = $formdata['expertise'];
			$expertiseArray = array();
			foreach ($expertisetaxonomydata as $value) {			  
				
				
               $post_exists = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE id = '" . $value . "'", 'ARRAY_A');
                if ($post_exists)
			    {
			     $expertiseArray[] = $value;
			     }else{
                
				  if(!get_page_by_title($value, OBJECT, 'technology')){
				  
						$new_tech_id = wp_insert_post(array (
						'post_type' => 'technology',
						'post_title' => $value,
						'post_content' => '',
						'post_status' => 'pending',						 
						));

                       $expertiseArray[] = $new_tech_id;

                    }
				
	             }
			
			
				  
				  
              }
			  
			
			
			 $technologies = getRawTechnologiesTree(); 		
           
			 ##### end add custom technology if not exists

		$userdata = array(
			'ID' => $profileid,
			'user_pass' => $password,
			'nickname' => reset($name_parts),
			'display_name' => $name,
			'first_name' => reset($name_parts),
			'last_name' => end($name_parts),
			'description' => $description
		);
		wp_update_user( $userdata );
		
		
		  ### start for change the user status
		 $tablename = $wpdb->prefix."users";
		 $profile_status = 0;
		 $wpdb->query($wpdb->prepare("UPDATE $tablename SET profile_status=$profile_status WHERE ID=$profileid"));
		  ### end for change the user status	

		$educational = esc_attr($formdata['educational']);
		$yourgoal = esc_attr($formdata['yourgoal']);
		$challenging_project = esc_attr($formdata['challenging-project']);
		$position = esc_attr($formdata['your_position']);
		$experience = $formdata['experience'];
		$city = esc_attr($formdata['city']);
		$country = esc_attr($formdata['country_name']);
		//$expertise = $formdata['expertise'];
		$expertise = $expertiseArray;
		$skills = $formdata['skills'];
		$domain = $formdata['domain_knowledge'];
		$preferencespost = $formdata['strictly'];

		$phone = esc_attr($formdata['your_phone']);		//print_r($_FILES);die;
		if(!empty($_FILES['upload-photo']['name'])) {			if(!is_dir($upload_path))
				mkdir($upload_path, 0777);
			move_uploaded_file($_FILES["upload-photo"]["tmp_name"], $upload_path.$_FILES['upload-photo']['name']);
			update_user_meta($profileid, 'userphoto_thumb_file', $_FILES['upload-photo']['name']);
		}
		update_user_meta($profileid, 'educational', $educational);
		update_user_meta($profileid, 'yourgoal', $yourgoal);
		update_user_meta($profileid, 'challenging_project', $challenging_project);
		update_user_meta($profileid, 'position', $position);
		update_user_meta($profileid, 'experience', $experience);
		update_user_meta($profileid, 'city', $city);
		update_user_meta($profileid, 'skills', $skills);
		update_user_meta($profileid, 'domain', $domain);
		update_user_meta($profileid, 'phone', $phone);
		update_user_meta($profileid, 'country', $country);
		update_user_meta($profileid, 'expertise', $expertise);
		update_user_meta($profileid, 'preferences', $preferencespost);
		wp_cache_delete($profileid, 'users');
		############## start mail to login details to users
		        $headers = array();
	            $headers[] = 'Content-Type: text/html; charset=UTF-8';
	            $headers[] = 'From: '.get_option( 'blogname' ).' <'.get_option( 'admin_email' ).'>';
		        $current_user_email = $user_info_data->user_email;
                $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
				$site_url = home_url();
				
             /*   $message = "Dear ".reset($name_parts)."\r<br /><br />";
				$message .= "Thank you for complete profile on FindMeTechie(FMT)." . "\r<br />";
				$message .= "Welcome to our wide network of highly accomplished Techies." . "\r<br /><br />";
				$message .= "Your login details are as follows:" . "\r<br /><br />";
                $message .= sprintf(__('Username: %s'), $current_user_email) . "\r<br />";
                $message .= sprintf(__('Password: %s'), $password) . "\r<br /><br />";
				$message .= "Please note that we publish techie profiles only based on their prior consent, do not publish any personal details such as name, email or contact numbers and ensure that Techies are paid as per mutually agreed terms." . "\r<br /><br />";
                $message .= "Please ensure that you have carefully filled all the fields highlighting your key skills, along with your photo, as this information is the only basis for our clients to make an opinion about engaging you." . "\r<br /><br />";
				$message .= "We encourage you to review your profile from time to time and keep it updated." . "\r<br />";
				$message .= home_url() . "\r<br /><br />";
				$message .= "If you have any questions, you can contact us on admin@findmetechie.com." . "\r<br /><br />";
				$message .= "We look forward to a mutually rewarding relationship. Thank you." . "\r<br /><br />";
				$message .= "Regards," . "\r<br /><br />";
				$message .= "FMT Team" . "\r<br />";
				$message .= home_url();*/
				
				//$message = do_shortcode('[text-blocks id="lead-complete-profile-mail"]');	
				
				$id=1635;
			   
               $post = get_post($id);
               $title = apply_filters('the_title', $post->post_title);
               $message = apply_filters('the_content', $post->post_content);
				
							
                $namecode = "##FIRSTNAME##";
			    $current_user_email_code = "##USERNAME##";
				$password_code = "##PASSWORD##";
			    $siteurlcode = "##SITEURL##";               
				$message = str_replace($namecode,reset($name_parts),$message);
				$message = str_replace($current_user_email_code,$current_user_email,$message);
				$message = str_replace($password_code,$password,$message);
				$message = str_replace($siteurlcode,$site_url,$message);
				
				
				### for test mail need to comment
				//$current_user_email = "praveen@eatechnologies.com";
				
                wp_mail($current_user_email,$title, $message, $headers);				
				$adminnew_mail = "neeraj@eatechnologies.com";				
				wp_mail($adminnew_mail,$title, $message, $headers);
				$to = get_option( 'admin_email' );
				wp_mail($to,$title, $message, $headers);
			############## end mail to login details to users	
		
		wp_redirect(get_permalink(1629).'?success=yes');
		exit;
	}

if(!empty($profileid)){
    $technologies = getRawTechnologiesTree();
    $msg = '';
    $preferences = array();   
	$upload_dir = wp_upload_dir();
	$upload_url = $upload_dir['baseurl'].'/thumbs/'.$profileid.'/';	
	$upload_path = $upload_dir['basedir'].'/thumbs/'.$profileid.'/';
	$countries = getCountries();	
	$phone = get_user_meta( $profileid, 'phone', true );
	$userphoto_thumb_file = get_user_meta( $profileid, 'userphoto_thumb_file', true );
	$experience = get_user_meta( $profileid, 'experience', true ); 
	$expertise = get_user_meta( $profileid, 'expertise', true );
	$position = get_user_meta( $profileid, 'position', true );
	$domains = get_user_meta( $profileid, 'domain', true );
	$city = get_user_meta( $profileid, 'city', true );
	$state = get_user_meta( $profileid, 'state', true );
	$country = get_user_meta( $profileid, 'country', true );
	$user_info = get_userdata( $profileid);
	$user_email = $user_info->user_email;
	$current_user_email = $user_info_data->user_email;
	$domain_knowledge = domain_knowledge_Tree();
	$preferences = get_user_meta( $profileid, 'preferences', true );
	
	
	//$technologies = getTechnologiesTree();
	$technologies = getRawTechnologiesTree();
	
	
	$arrdomains = array("Banking and Finance" => "Banking and Finance", "e-marketing" => "e-marketing", "HealthCare" => "HealthCare", "Insurance" => "Insurance", "Supply Chain" => "Supply Chain", "Travel and Hospitality" => "Travel and Hospitality", "Other" => "Other");
	$experiences = array('Fresher', '1 Year', '2 Years', '3 Years', '4 Years', '5 Years', '6 Years', '7 Years', '8 Years', '9 Years', '10 Yrs&amp;above');

	get_header();
?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.validate.min.js"></script>
<style type="text/css">
.modal-backdrop {
	background:#333;
	opacity:.5;
}
.modal-backdrop.in {
	background:#333;
	opacity:.5;
}
#update_techie .form-group label.error {
    color: #FB3A3A;
    display: inline-block;
    font-weight:500;
    padding: 0;
    text-align: left;
}
</style>
<script type="text/javascript">
       jQuery('document').ready(function(e)
	   { 
            //e.getPreventDefault();
			
			jQuery("#update_techie").validate({
			    ignore: [],
                rules: {
				    your_password: "required",
					your_confirm_password: {
                    required: true,            
                    equalTo:"#your_password",
                   },
                    your_name: "required",                   
                    your_position: "required",  
                    experience: "required",
                    country_name: "required",
                    city: "required",					
					project_detail: "required",
					educational: "required",
					//'expertise[]': {
                  //  required: true,             
                  //  }, 					
					//'domain_knowledge[]': {
                 //   required: true,             
                   // },            				
                },
                messages: {
				    your_password: "Please enter password", 
					your_confirm_password: "Confirm password should be same as Password", 
                    your_name: "Please enter your name",                   
                    your_position: "Please enter your position",
                    experience: "Select your experience",
                    country_name: "Select your country",
                    city: "Please enter your city",						
					project_detail: "Please enter your project details",
					educational: "Please enter your education details",
					//'expertise[]': "Please enter your skills",
					//'domain_knowledge[]': "Please enter your domain",					   		
                },
                submitHandler: function(form) {
				
				 
                   
					    jQuery("label.domain-error, label.expertise-error").remove();
						
						if(!jQuery("#select-dropdown-domain option").is(":selected"))
						{
						jQuery("span.domain-knowledge").append("<label class='domain-error error'>Please enter your domain</label>");
						} 
						else if(!jQuery("#select-dropdown-expertise option").is(":selected"))
						{
						jQuery("span.expertise").append("<label class='expertise-error error'>Please enter your skills</label>");
						}
						else
						{
						 form.submit();
						}
					
					
					
                }
            });  
			
			jQuery("#update_techie").on("submit", function() {
			
			
				jQuery("label.domain-error, label.expertise-error").remove();
				if (!jQuery("#select-dropdown-domain option").is(":selected")) {
					jQuery("span.domain-knowledge").append("<label class='domain-error error'>Please enter your domain</label>");
				}
				if (!jQuery("#select-dropdown-expertise option").is(":selected")) {
					jQuery("span.expertise").append("<label class='expertise-error error'>Please enter your skills</label>");
				}
				
				
			});

});
</script>
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
   <div id="primary" class="content-area">
<div class="techie-banner"><?php the_title('<h1>','</h1>');?></div>
		<div class="createAccountRow1 signUpLeft">
            <div class="container-fluid">
				<div class="row ">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 no-padding rightDiv">
					
						<div class="">
						  
						  <!-- Nav tabs -->
						  

						  <!-- Tab panes -->
						  <div class="tab-content">
						    
                            <div role="tabpanel" class="tab-pane bg-white active" id="workseeker">
								<div class="form-group">
								

                               <form id="update_techie" action="" method="post" class="wpcf7-form" enctype="multipart/form-data" 
>
<div style="display: none;">

</div>
<div class="techiProfileRow1">
<div class="row remove-margin workseeker submit-form push-50">
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 no-padding">
    <lable class="title-signup"><?php echo 'FMT ID: '.$profileid; ?></lable>
  </div>
<div class="">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 no-padding">
<h4 class="font-s16 push-30-t">Personal Details</h4>
<p></p></div>
<div class="mandatoryText">* Mandatory Fields</div>
<p></p></div>
<div class="row privateOuter">
<div class="rightBlock">
<div class="arrow-left"></div>
<p> Details in box are private and won't be shared to outside world.</p></div>
<div class="leftBlock">
<div class="form-group form-inline postion_relative"> <span class="wpcf7-form-control-wrap your-name"><input name="your_name" value="<?php echo $user_info->display_name; ?>" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="FULL NAME *" type="text"></span><p></p>
<div class="lock-pvt">
          <i class="fa fa-lock" aria-hidden="true"></i> Private          </div>
<p></p></div>
<div class="form-group form-inline postion_relative"> <span class="wpcf7-form-control-wrap your-email"><input name="your-email" value="<?php echo $user_email ?>" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="EMAIL *" type="email" readonly="readonly"></span><p></p>
<div class="lock-pvt">
          <i class="fa fa-lock" aria-hidden="true"></i> Private          </div>
<p></p></div>
<div class="form-group form-inline postion_relative"><span class="wpcf7-form-control-wrap your-phone"><input name="your_phone" value="<?php echo $phone; ?>" size="40" maxlength="20"  class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel form-control" id="phone_contact" aria-invalid="false" placeholder="PHONE (E.g. +1-408-850-0236)" type="tel"></span><p></p>
<div class="lock-pvt">
          <i class="fa fa-lock" aria-hidden="true"></i> Private</div>
<p></p></div>
<div class="form-group form-inline postion_relative"> <span class="wpcf7-form-control-wrap your-name"><input id="your_password" name="your_password" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Password *" type="password"></span><p></p>
<div class="lock-pvt">
          <i class="fa fa-lock" aria-hidden="true"></i> Private          </div>
<p></p></div>
<div class="form-group form-inline postion_relative"> <span class="wpcf7-form-control-wrap your-name"><input name="your_confirm_password" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Confirm Password *" type="password"></span><p></p>
<div class="lock-pvt">
          <i class="fa fa-lock" aria-hidden="true"></i> Private          </div>
<p></p></div>
<p></p></div>
<div class="cl"></div>
<p></p></div>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h4 class="font-s16">Work Profile</h4>
</div>
<div class="cl"></div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="form-group form-inline"><span class="wpcf7-form-control-wrap your-position"><input name="your_position" value="<?php echo $position; ?>" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="ROLE*: like Sr. PHP developer" type="text"></span></div>
<p></p></div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="form-group form-inline">
<div class="dropdown" style="width:100%;">
<span class="wpcf7-form-control-wrap experience">
<select name="experience" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required style-select " id="select-dropdown-experience" >
                    <option value="">EXPERIENCE (YEARS)*</option>
                    <?php foreach($experiences as $k => $v){ ?>
                    <option value="<?php echo $k; ?>" <?php if($experience != '' && $experience == $k){echo 'selected';} ?>><?php echo $v; ?></option>
                    <?php } ?>
                  </select>

</div>
<p></p></div>
<p></p></div>
<p></p>

</div>


<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 no-padding"> <span class="wpcf7-form-control-wrap educational"><textarea name="educational" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="EDUCATION*: like B. Tech (Computer science)"><?php echo (get_the_author_meta('educational', $profileid)); ?></textarea></span> </div>
<p></p></div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="form-group form-inline">
         <span class="wpcf7-form-control-wrap city"><input name="city" value="<?php echo $city; ?>" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="CITY *" type="text"></span>
      </div>
<p></p></div>
<p></p></div>
<div class="row">
<div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
<div class="dropdown">
<span class="wpcf7-form-control-wrap country-name">
<select name="country_name" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required style-select " id="select-dropdown-country" >
                    <option value="">COUNTRY *</option>
                    <?php foreach($countries as $k => $v){ ?>

                    <option value="<?php echo $k; ?>" <?php if($country != '' && $country == $k){echo 'selected';} ?>><?php echo $v; ?></option>

                    <?php } ?>
                  </select>

</div>
<p></p></div>
<p></p></div>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 no-padding">
<h4 class="font-s16">Skills*</h4>
<div class="dropdown" id="dropdown-menu-relative">
<span class="wpcf7-form-control-wrap expertise">
 <select name="expertise[]" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required style-select-new " id="select-dropdown-expertise" multiple="">
                      <option value="">MENTIONS YOUR SKILLS</option>
                      <?php foreach($technologies as $k => $v){ ?>
                      <option value="<?php echo $k; ?>" <?php if(is_array($expertise) && (in_array($k, $expertise)||in_array($v, $expertise))){echo 'selected';} else if($expertise == $k){echo 'selected';} ?>><?php echo $v; ?></option>
                      <?php } ?>
                    </select>


</span>



</div>
<p></p></div>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 no-padding">
<h4 class="font-s16">Industry Domain*</h4>
<p>    <span class="wpcf7-form-control-wrap domain-knowledge">
 <select name="domain_knowledge[]" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required style-select " id="select-dropdown-domain" multiple="multiple">
                  <option value="">Mentions Domains you have worked in</option>
                  <?php foreach($arrdomains as $k => $v){ ?>
                  <option value="<?php echo $k; ?>" <?php if(is_array($domains) && in_array($k, $domains)){echo 'selected';} else if($domains == $k){echo 'selected';} ?>><?php echo $v; ?></option>
                  <?php } ?>
                </select>

</span></p>


</div>





<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
<h4 class="font-s16">Project Details*</h4>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding"><span class="wpcf7-form-control-wrap project-detail"><textarea name="project_detail" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control heightAuto-1" aria-required="true" aria-invalid="false" placeholder="Please mention not more then last five most recent projects 
 For example: 

 Project 1. 
 Client: US Healthcare Major 
 Description: Web App development to design hospital resource allocation system using XXX, XX. 
 Duration: 18 Months 
 Role: Lead Developer, Full-time 
 Technology Stack: Dot.Net 
 Team Size: 5 

 Project 2: 
 Client: US E-Commerce 
 Description: Web App 
 Duration: 24 Months 
 Role: Lead Software Developer, Full-time 
 Technology Stack: Dot.Net 
 Team Size: 4 

.
.
"><?php echo (get_the_author_meta('description', $profileid)); ?></textarea></span><p></p></div>
<h4 class="font-s16"></h4>
<p></p></div>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 no-padding">
<h4 class="font-s16">Preferences</h4>
<p><span class="wpcf7-form-control-wrap strictly"><span class="wpcf7-form-control wpcf7-checkbox">
<span class="wpcf7-list-item first"><label><input name="strictly[]" value="Full Time" type="checkbox" <?php if (in_array('Full Time', $preferences)) { echo "checked='checked'"; } ?>><span class="wpcf7-list-item-label">Full Time</span></label></span>
<span class="wpcf7-list-item"><label><input name="strictly[]" value="Part Time" type="checkbox" <?php if (in_array('Part Time', $preferences)) { echo "checked='checked'"; } ?>><span class="wpcf7-list-item-label">Part Time</span></label></span>
<span class="wpcf7-list-item last"><label><input name="strictly[]" value="Project Based" type="checkbox" <?php if (in_array('Project Based', $preferences)) { echo "checked='checked'"; } ?>>
<span class="wpcf7-list-item-label">Project Based</span></label></span></span></span>
</p></div>
<div class="TechieColoLeft">
<h4 class="font-s16">Please Upload Your Photo <span>(Optional)</span></h4>
<div class="clearfix"></div>
<div class="techiProfile-left">
         <img id="photoupload_img" src="http://eatechnologies.com/fmttest/wp-content/themes/findmetechie/images/download-upload.png">
        </div>
<p>        <span class="btn btn-file"><span class="wpcf7-form-control-wrap upload-photo"><input name="upload-photo" size="40" class="wpcf7-form-control wpcf7-file photoupload" id="fileuploadfield" aria-invalid="false" type="file"></span><span class="wpcf7-form-control-wrap uploadtextfield"><input name="uploadtextfield" value="" size="40" class="wpcf7-form-control wpcf7-text uploadtextfield" id="uploadtextfield" aria-invalid="false" type="text"></span><input id="uploadbrowsebutton" value="Browse" type="button"><br>
        </span>
  </p></div>
<div class="TechieColoRight">
<h5 class="text-right">

<p>
 <input name="profileid" value="<?php echo $profileid; ?>" size="40" type="hidden">
 <input value="SUBMIT" class="wpcf7-form-control wpcf7-submit btn btn-primary submit-btn submit-build text-uppercase" type="submit"><span class="ajax-loader"></span></p></h5>
</div></div>
</div>
<div class="wpcf7-response-output wpcf7-display-none"></div></form>

                          
                            
                            	
                              </div>
                                
                                
						    </div>
                            
						    
						  </div>
						</div>
					</div>
                <div class="col-sm-5">
                <div class="signUpbgImage"></div>
                <div class="signup-profile">
				 <?php the_content(); ?>
				
                <ul class="">
                <!--<h3>Points to Note</h3>-->
                <?php $sign_up_techie_blocks = new Attachments( 'sign_up_techie_blocks'); ?>
				<?php if( $sign_up_techie_blocks->exist() ) : 
					while( $sign_up_techie_blocks->get() ) : 
					?>
				
				<li class="list-group-box">
                <div class="media-box">
				
                <div class="media-left-box"><?php echo $sign_up_techie_blocks->image( 'full' );?></div>
                <div class="media-body-box"><?php echo $sign_up_techie_blocks->field( 'description' ); ?></div>
                </div>
                </li>
				<?php endwhile;
					      endif;
					?>
				
				
                </ul>
                </div>
              
                </div>
					
				</div>
			</div>

		</div>

			
<content>

<script type="text/javascript">
(function($) {
  /*Brought click function of fileupload button when text field is clicked*/
	$("#uploadtextfield").click(function() {
		$('#fileuploadfield').click()
	});

  /*Brought click function of fileupload button when browse button is clicked*/
	$("#uploadbrowsebutton").click(function() {
		$('#fileuploadfield').click()
	});

  /*To bring the selected file value in text field*/	
	$('#fileuploadfield').change(function() {
		var oFReader = new FileReader();
		var input = document.getElementById("fileuploadfield");
		var ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
		if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")){
			oFReader.readAsDataURL(input.files[0]);
			oFReader.onload = function (oFREvent) {
				document.getElementById("photoupload_img").src = oFREvent.target.result;
			};
		}else{
			alert('Please upload a valid image file!');
			return false;
		}
    });

})(jQuery);

</script>


 <script type="text/javascript" >
	$(document).ready(function(){
    $("#select-dropdown-expertise").select2({
        //placeholder: "other skills", //placeholder
        tags: true
    });
})
	</script>


<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->
<?php } ?><script type="text/javascript">
(function($) {
  /*To bring the selected file value in text field*/  
	$('#fileuploadfield').change(function() {
		var oFReader = new FileReader();
		var input = document.getElementById("fileuploadfield");
		var ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
		if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")){
			oFReader.readAsDataURL(input.files[0]);
			oFReader.onload = function (oFREvent) {
				document.getElementById("photoupload_img").src = oFREvent.target.result;
			};
		}else{
			alert('Please upload a valid image file!');
			return false;
		}
    });

})(jQuery);

</script>
 <script type="text/javascript" >
	$(document).ready(function(){
    $("#select-dropdown-expertise").select2({
        //placeholder: "other skills", //placeholder
        tags: true
    });
})
	</script>
<?php get_footer(); ?>