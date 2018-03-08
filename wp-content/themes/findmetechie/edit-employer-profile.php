<?php
/**
 * Template Name: Edit Employer Profile
 */
if (!is_user_logged_in()) {
    wp_redirect(wp_login_url());
}
global $current_user;
 
$profileid = $current_user->ID;
$msg = '';
if(!empty($profileid)){	
	$countries = getCountries();
	if(!empty($_POST)){
		$formdata = $_POST;
        $name = $formdata['your_name'];
		$description = $formdata['other-information'];
        $name_parts = explode(' ',$name);
        $website_address = esc_attr($formdata['website-address']);
		$userdata = array(
			'ID' => $profileid,
			'nickname' => reset($name_parts),
			'display_name' => $name,
			'first_name' => reset($name_parts),
			'last_name' => end($name_parts),
			'user_url' => $website_address,
			'description' => $description
		);
		wp_update_user( $userdata );

		$phone = esc_attr($formdata['your_phone']);	
		$address = esc_attr($formdata['your-address']);
		$city = esc_attr($formdata['your-city']);
		$country = esc_attr($formdata['country_name']);	
		$state = esc_attr($formdata['your_state']);
		$pincode = esc_attr($formdata['your-pin']);
		$company_name = esc_attr($formdata['company-name']);		
		
		
		

			//print_r($_FILES);die;
		
		update_user_meta($profileid, 'phone', $phone);
		update_user_meta($profileid, 'city', $city);
		update_user_meta($profileid, 'state', $state);
		update_user_meta($profileid, 'country', $country);		
		update_user_meta($profileid, 'address', $address);
		update_user_meta($profileid, 'pin', $pincode);
		update_user_meta($profileid, 'company', $company_name);		
		wp_cache_delete($profileid, 'users');
		wp_redirect(get_permalink(444).'?success=yes');
		exit;
	}
	
	        $phone = get_user_meta( $profileid, 'phone', true );
			$city = get_user_meta( $profileid, 'city', true );
			$state = get_user_meta( $profileid, 'state', true );
			$countryid = get_user_meta( $profileid, 'country', true );
            $country = get_user_meta( $profileid, 'country', true );			
			//$country = getCountryByID($countryid);
			$user_info = get_userdata( $profileid);	
			//print_r($user_info);
			$user_email = $user_info->user_email;
			$current_user_email = $current_user->user_email;
			$address  = get_user_meta( $profileid, 'address', true );
			$pincode  = get_user_meta( $profileid, 'pin', true );			
			$company_name = get_user_meta( $profileid, 'company', true );
			$website_address = $user_info->user_url;
			$other_information = get_user_meta( $profileid, 'description', true );


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
#update_employer .form-group label.error {
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
			
			jQuery("#update_employer").validate({
				  onfocusout: function(element) {
                  this.element(element);
                    },				
                rules: {
                    your_name: "required",
                    your_phone: "required",
                    your_state: "required",  
                    company_name: "required",  					
                },
                messages: {
                    your_name: "Please enter your name",
                    your_phone: "Please enter your phone",
                    your_state: "Please enter your state",
                    company_name: "Please enter your company", 					
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });  

});
</script>
<div class="profile-bg">
  <div class="container">
    <div class="about-me">
      <div class="profile-header">
        <h2>(<span><?php echo 'FMT ID: '.$profileid; ?></span>)</h2>
      </div>
      <div class="row">
        <form id="update_employer" action="" method="post" enctype="multipart/form-data">         
          <div class="col-sm-12 col-md-12 col-xs-12 pad-r-10 heading_set">
            <div class="panel border0">
              <div class="panel-body">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 no-padding">
                  
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right pull-right no-padding">
                  <label id="homeRow2-detail-label ">
                  <h5 class="text-orange">* Mandatory Fields</h5>
                  </label>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group form-inline text-capitalize"><span class="wpcf7-form-control-wrap your_name">
               <input type="text" name="your_name" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" value="<?php echo $user_info->display_name; ?>" aria-invalid="false" placeholder="FULL NAME *" />
                </span></div>
                </div>
                 <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group form-inline text-capitalize  "><span class="wpcf7-form-control-wrap your_phone">
               <input type="tel" name="your_phone" size="40" maxlength="20" minlength="9" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel form-control" id="phone_contact" aria-required="true" aria-invalid="false" placeholder="PHONE *" value="<?php echo $phone; ?>" />
                </span></div>
                </div>
                 <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group form-inline text-capitalize "><span class="wpcf7-form-control-wrap your-position">
                <input type="text" name="your-address"  size="40" class="wpcf7-form-control wpcf7-text form-control" aria-invalid="false" placeholder="ADDRESS" value="<?php echo $address; ?>" />
                </span></div>
                 </div>
                 <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group form-inline text-capitalize">
                <div class="dropdown" style="width:100%;"><span class="wpcf7-form-control-wrap experience">
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
              <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 no-padding form-group">
                <div class="dropdown fieldgroup"><span class="wpcf7-form-control-wrap country_name">
                  <input type="text" name="your_state" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control mobile-width" aria-required="true" aria-invalid="false" placeholder="STATE *" value="<?php echo $state; ?>" />
                  </span></div>
                
              </div>
               </div>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class="form-group form-inline text-capitalize">
<span class="wpcf7-form-control-wrap city">
                <input type="text" name="your-city" size="40" class="wpcf7-form-control wpcf7-text form-control employer-margin-bottom mobile-width" aria-invalid="false" placeholder="CITY" value="<?php echo $city; ?>" />
                </span></div>
				 
                </div>
				
              </div>
              <div class="row">
             <div class="col-md-6 col-sm-6 col-xs-12">
                 
              
                  <div class="dropdown" id="dropdown-menu-relative"><span class="wpcf7-form-control-wrap expertise">
                   <input type="text" name="your-pin" size="40" maxlength="6" minlength="5" class="wpcf7-form-control wpcf7-text form-control mobile-width" aria-invalid="false" placeholder="PIN CODE" value="<?php echo $pincode; ?>" />
                    </span></div>
					 <p></p>
                 </div>
             
             <div class="col-md-6 col-sm-6 col-xs-12 fieldgroup">
                <div class="form-group form-inline text-capitalize">      
              <span class="wpcf7-form-control-wrap domain-knowledge">
                <input type="text" name="company-name" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control employer-margin-bottom mobile-width" aria-required="true" aria-invalid="false" placeholder="COMPANY NAME *" value="<?php echo $company_name; ?>" />
                </span></div>	
                 </div>				
                </div>
			  <div class="row">
             <div class="col-md-6 col-sm-6 col-xs-12">
                
              
                  <div class="dropdown" id="dropdown-menu-relative"><span class="wpcf7-form-control-wrap expertise">
                   <input type="text" name="website-address" size="40" class="wpcf7-form-control wpcf7-text form-control mobile-width" aria-invalid="false" placeholder="WEBSITE ADDRESS" value="<?php echo $website_address; ?>" />
                    </span></div>
					<p></p>
                 </div>
             
             <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group form-inline text-capitalize">
              <span class="wpcf7-form-control-wrap domain-knowledge">
                <input type="text" name="other-information" size="40" class="wpcf7-form-control wpcf7-text form-control" aria-invalid="false" placeholder="ANY OTHER INFORMATION" value="<?php echo $other_information; ?>" />
                </span></div>
				<p></p>
				</div>
				
				
                </div>	
				
                <br />
              
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
<?php } ?>

<?php get_footer(); ?>