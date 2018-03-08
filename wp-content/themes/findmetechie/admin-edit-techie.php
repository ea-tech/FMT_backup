<?php
/**
 * Template Name: Admin Edit Techie Profile
 */
if (!is_user_logged_in()) {
    wp_redirect(wp_login_url());
}
if(!empty($_GET['urlkeycode']))
{
$profileid = base64_decode($_GET['urlkeycode']);	
}else{
 wp_redirect(home_url());
 exit; 
	
}	
//global $current_user;
 
//$profileid = $current_user->ID;
$technologies = getRawTechnologiesTree();
$msg = '';
if(!empty($profileid)){  
	$upload_dir = wp_upload_dir();
	$upload_url = $upload_dir['baseurl'].'/thumbs/'.$profileid.'/';	$upload_path = $upload_dir['basedir'].'/thumbs/'.$profileid.'/';
	$countries = getCountries();
	if(!empty($_POST)){
		$formdata = $_POST;
        $name = $formdata['your_name'];
		$description = $formdata['project-detail'];
        $name_parts = explode(' ',$name);
		
			##### start add custom technology if not exists
			$expertisetaxonomydata = $formdata['expertise'];
			$expertiseArray = array();
			foreach ($expertisetaxonomydata as $value) {			  
				
				global $wpdb;
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
			'nickname' => reset($name_parts),
			'display_name' => $name,
			'first_name' => reset($name_parts),
			'last_name' => end($name_parts),
			'description' => $description
		);
		wp_update_user( $userdata );

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
		$domain = $formdata['domain-knowledge'];
		$status = $formdata['statusradio'];

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
		update_user_meta($profileid, 'status', $expertise);
		wp_cache_delete($profileid, 'users');
		wp_redirect(get_permalink(803).'?urlkeycode='.base64_encode($profileid).'&success=yes');
		exit;
	}
	
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
	//$user_email = $user_info->user_email;
	//$current_user_email = $current_user->user_email;
	$domain_knowledge = domain_knowledge_Tree();	
	
	$technologies = getRawTechnologiesTree();
	$arrdomains = array("Banking and Finance" => "Banking and Finance", "e-marketing" => "e-marketing", "HealthCare" => "HealthCare", "Insurance" => "Insurance", "Supply Chain" => "Supply Chain", "Travel and Hospitality" => "Travel and Hospitality", "Other" => "Other");
	$experiences = array('Fresher', '1 Year', '2 Years', '3 Years', '4 Years', '5 Years', '6 Years', '7 Years', '8 Years', '9 Years', '10 Years', '11 Years', '12 Years', '13 Years', '14 Years','15 Years', '16 Yrs&amp;above');

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
                rules: {
                    your_name: "required",                   
                    your_position: "required",  
                    experience: "required",
                    country_name: "required",
                    city: "required",
                    				
                },
                messages: {
                    your_name: "Please enter your name",                   
                    your_position: "Please enter your position",
                    experience: "Select your experience",
                    country_name: "Select your country",
                    city: "Please enter your city", 					
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });  

});
</script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<div class="profile-bg">
  <div class="container-fluid">
    <div class="about-me">
      <div class="profile-header">
        <h2>Techie Profile - (<span><?php echo 'FMT ID: '.$profileid; ?></span>)</h2>
		<input action="action" onclick="window.history.go(-1); return false;" type="button" value="Back" />
		<!--<a class="btn btn-default admin_back_btn" href="<?php echo admin_url(); ?>" >Back</a>-->
		 <?php if(!empty($_GET['success'])){ ?>
        <font color="green">User profile has been updated!</font>
        <?php } ?>
      </div>
      <div class="row">
        <form id="update_techie" action="" method="post" enctype="multipart/form-data">
          <div class="my-pic text-center col-sm-4 col-md-3 col-xs-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-offset="200" style="visibility: visible; animation-duration: 0.5s; animation-name: fadeInUp;">
            <div class="panel border0">
              <div class="panel-body">
                <div class="avatar-pic">
                  <?php if(!empty($userphoto_thumb_file)){ ?>
                  <img id="photoupload_img" src="<?php echo $upload_url.$userphoto_thumb_file; ?>" alt="my profile"/>
                  <?php }else{ ?>
                  <!--<img id="photoupload_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/techiprofile.png"/> -->
				  <img id="photoupload_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/6.jpg">
                  <?php } ?>
                </div>
                <div class="mar-top">
                  <div class=" upload-btn push-20-t">
                    <h6 class="uplod_photo">Upload Photo </h6>
                    <p><span class="btn btn-default btn-file"><span class="wpcf7-form-control-wrap upload-photo">
                      <input name="upload-photo" size="40" class="wpcf7-form-control wpcf7-file photoupload" id="fileuploadfield" aria-invalid="false" type="file">
                      </span>
                  </div>
                </div>
                 <div class=" upload-btn push-20-t">
                <h6  class="uplod_photo">Educational Details</h6>
                <span class="wpcf7-form-control-wrap educational">
                  <textarea name="educational" cols="40" rows="12" class="wpcf7-form-control wpcf7-textarea form-control" aria-invalid="false" placeholder="e.g. BE/B Tech/ MCA OR ANY OTHER"><?php echo (get_the_author_meta('educational', $profileid)); ?></textarea>
                  </span>
                </div>
				<div>
				<h6  class="uplod_photo">Status</h6>
                <input type="radio" name="statusradio" value="published"> Published<br>
				<input type="radio" name="statusradio" value="unpublished"> Unpublished
              </div>
			  </div>
               
            </div>
          </div>
          <div class="col-sm-8 col-md-9 col-xs-12 pad-r-10 heading_set">
            <div class="panel border0">
              <div class="panel-body">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 no-padding">
                  <h4 class="font-s16 push-30-t">Personal Details</h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right pull-right no-padding">
                  <label id="homeRow2-detail-label ">
                  <h5 class="text-orange">* Mandatory Fields</h5>
                  </label>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group form-inline text-capitalize "><span class="wpcf7-form-control-wrap your_name">
                <input name="your_name" value="<?php echo $user_info->display_name; ?>" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" placeholder="FULL NAME *" type="text">
                </span></div>
                </div>
                 <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group form-inline text-capitalize "><span class="wpcf7-form-control-wrap your_phone">
                <input name="your_phone" value="<?php echo $phone; ?>" size="40" class="wpcf7-form-control wpcf7-text form-control" aria-invalid="false" placeholder="PHONE" type="text">
                </span></div>
                </div>
                 <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group form-inline text-capitalize "><span class="wpcf7-form-control-wrap your_position">
                <input name="your_position" value="<?php echo $position; ?>" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" placeholder="POSITION *" type="text">
                </span></div>
                 </div>
                 <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group form-inline text-capitalize">
                <div class="dropdown" style="width:100%;"><span class="wpcf7-form-control-wrap experience">
                  <select name="experience" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required style-select " id="select-dropdown-experience" >
                    <option value="">EXPERIENCE (YEARS)*</option>
                    <?php foreach($experiences as $k => $v){ ?>
                    <option value="<?php echo $k; ?>" <?php if($experience != '' && $experience == $k){echo 'selected';} ?>><?php echo $v; ?></option>
                    <?php } ?>
                  </select>
                  </span></div>
                <p></p>
              </div>
               </div>
                 <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 no-padding form-group">
                <div class="dropdown"><span class="wpcf7-form-control-wrap country_name">
                  <select name="country_name" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required style-select " id="select-dropdown-country" >
                    <option value="">COUNTRY *</option>
                    <?php foreach($countries as $k => $v){ ?>

                    <option value="<?php echo $k; ?>" <?php if($country != '' && $country == $k){echo 'selected';} ?>><?php echo $v; ?></option>

                    <?php } ?>
                  </select>
                  </span></div>
                <p></p>
              </div>
               </div>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class="form-group form-inline text-capitalize">
<span class="wpcf7-form-control-wrap city">
                <input name="city" value="<?php echo $city; ?>" size="40" class="wpcf7-form-control wpcf7-text form-control" aria-invalid="false" placeholder="CITY *" type="text">
                </span></div>
                </div>
              </div>
              <div class="row">
             <div class="col-md-6 col-sm-6 col-xs-12">
                  <h4 class="font-s16">Expertise</h4>
              
                  <div class="dropdown" id="dropdown-menu-relative"><span class="wpcf7-form-control-wrap expertise">
                    <select name="expertise[]" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required style-select-new " id="select-dropdown-expertise" multiple="">
                      <option value="">MENTIONS YOUR SKILLS</option>
                      <?php foreach($technologies as $k => $v){ ?>
                      <option value="<?php echo $k; ?>" <?php if(is_array($expertise) && (in_array($k, $expertise)||in_array($v, $expertise))){echo 'selected';} else if($expertise == $k){echo 'selected';} ?>><?php echo $v; ?></option>
                      <?php } ?>
                    </select>
                    </span></div>
                 </div>
             
             <div class="col-md-6 col-sm-6 col-xs-12">
                <h4 class="font-s16">Domain</h4>
              <span class="wpcf7-form-control-wrap domain-knowledge">
                <select name="domain-knowledge[]" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required style-select " id="select-dropdown-domain" multiple="">
                  <option value="">Mentions Domains you have worked in</option>
                  <?php foreach($arrdomains as $k => $v){ ?>
                  <option value="<?php echo $k; ?>" <?php if(is_array($domains) && in_array($k, $domains)){echo 'selected';} else if($domains == $k){echo 'selected';} ?>><?php echo $v; ?></option>
                  <?php } ?>
                </select>
                </span></div>
                </div>
                <br />
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                <h4 class="font-s16">Project Detail
                  <bdo>(Not more than 5 most recent projects undertaken)</bdo>
                </h4>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding"><span class="wpcf7-form-control-wrap project-detail">
                  <textarea name="project-detail" cols="40" rows="12" class="form-control" aria-invalid="false" placeholder="MENTION NOT MORE THAN 5 MOST RECENT PROJECTS"><?php echo (get_the_author_meta('description', $profileid)); ?></textarea>
                  </span></div>
               
              
                <p></p>
              </div>
              <h5 class="text-center">
                <input value="SUBMIT" class="wpcf7-form-control wpcf7-submit btn btn-primary submit-btn submit-build text-uppercase" type="submit">
              </h5>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
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