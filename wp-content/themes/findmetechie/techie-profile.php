<?php
/**
 * Template Name: My Profile
 */
if (!is_user_logged_in()) {
    wp_redirect(wp_login_url());
}
global $current_user;
get_header(); 
$profileid = $current_user->ID;
$technologies = getRawTechnologiesTree();
$user_roles = $current_user->roles;
$user_role = array_shift($user_roles);
if(!empty($profileid)){
	  if($user_role == 'employer')
	  {
			$phone = get_user_meta( $profileid, 'phone', true );
			$city = get_user_meta( $profileid, 'city', true );
			$state = get_user_meta( $profileid, 'state', true );
			$countryid = get_user_meta( $profileid, 'country', true );	
			$country = getCountryByID($countryid);
			$user_info = get_userdata( $profileid);	
			//print_r($user_info);
			$user_email = $user_info->user_email;
			$current_user_email = $current_user->user_email;
			$address  = get_user_meta( $profileid, 'address', true );
			$pincode  = get_user_meta( $profileid, 'pin', true );			
			$company_name = get_user_meta( $profileid, 'company', true );
			$website_address = $user_info->user_url;
			$other_information = get_user_meta( $profileid, 'description', true );
			
	
	  ?>
<style type="text/css">
.modal-backdrop {
	background:#333;
	opacity:.5;
}
.modal-backdrop.in {
	background:#333;
	opacity:.5;
}
</style>
<div class="profile-bg">
  <div class="container">
    <div class="about-me">
      <div class="profile-header">
        <h2>(<span><?php echo 'FMT ID: '.$profileid; ?></span> <?php echo $cflag; ?>)</h2>
        <a class="btn btn-default edit-btn pull-right" href="<?php echo esc_url(get_permalink(787)); ?>" ><i class="icon wb-check" aria-hidden="true"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/editIcon.png"/></i>Edit Profile</a>
        <?php if(!empty($_GET['success'])){ ?>
        <font color="green">Your profile details have been updated!</font>
        <?php } ?>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="panel border0">
            <div class="panel-body">
              <div class="workexpriace">
             <!--   <h3>Employer Details</h3>-->
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <h4 class="font-s16">Name:</h4>
                    <p class="form-control-static"><?php echo $user_info->display_name; ?></p>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <h4 class="font-s16">Email:</h4>
                    <p class="form-control-static"><?php echo $user_info->user_email; ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <h4 class="font-s16">Phone</h4>
                    <p class="form-control-static"><?php echo $phone; ?></p>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <h4 class="font-s16">Address:</h4>
                    <p class="form-control-static"><?php echo $address; ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <h4 class="font-s16">Country:</h4>
                    <p class="form-control-static"><?php echo $country->name; ?></p>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <h4 class="font-s16">State:</h4>
                    <p class="form-control-static"><?php echo $state; ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <h4 class="font-s16">City:</h4>
                    <p class="form-control-static"><?php echo $city; ?></p>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <h4 class="font-s16">Pincode:</h4>
                    <p class="form-control-static"><?php echo $pincode; ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <h4 class="font-s16">Company:</h4>
                    <p class="form-control-static"><?php echo $company_name; ?></p>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <h4 class="font-s16">Website:</h4>
                    <p class="form-control-static"><?php echo $website_address; ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <h4 class="font-s16">Other Information:</h4>
                    <p class="form-control-static"><?php echo $other_information; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="show_intest">
        <ul>
          <li><a href="#"> <i class="fa fa-share-alt" aria-hidden="true"></i> Share </a></li>
          <li><a href="#"> <i class="fa fa-print" aria-hidden="true"></i> Print </a></li>
          <li><a href="#"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Save </a></li>
          <li><a href="#"> <i class="fa fa-heart" aria-hidden="true"></i> Express Interest </a></li>
          <li><a href="#"> <i class="fa fa-share" aria-hidden="true"></i> Need More </a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php }  
      else
      { 		
	$upload_dir = wp_upload_dir();
	$upload_path = $upload_dir['baseurl'].'/thumbs/'.$profileid.'/';
	$phone = get_user_meta( $profileid, 'phone', true );
	$userphoto_thumb_file = get_user_meta( $profileid, 'userphoto_thumb_file', true );
	$experience = get_user_meta( $profileid, 'experience', true ); 
	$expertise = get_user_meta( $profileid, 'expertise', true );
	$position = get_user_meta( $profileid, 'position', true );
	$domains = get_user_meta( $profileid, 'domain', true );
	$city = get_user_meta( $profileid, 'city', true );
	$state = get_user_meta( $profileid, 'state', true );
	$countryid = get_user_meta( $profileid, 'country', true );
	$country = getCountryByID($countryid);
	$user_info = get_userdata( $profileid);
	$user_email = $user_info->user_email;
	$current_user_email = $current_user->user_email;
	$domain_knowledge = domain_knowledge_Tree();
	$domain_li = '';
	if(is_array($domains)){
		foreach($domains as $domain){
			 $domain_li .= '<li>'.str_replace(' - ', '', $domain).'</li>';
		}
	}

	$skills = '';
	if(is_array($expertise)){
		foreach($expertise as $expert){
			if(!empty($technologies[$expert]))
				$skills .= '<li><span>'.str_replace(' - ', '', $technologies[$expert]).'</span></li>';
			else
				$skills .= '<li><span>'.str_replace(' - ', '', $expert).'</span></li>';
		}
	}
	
	$cflag = '';
	if(!empty($country)){
		$flag = strtolower($country->Iso2);
		$cflag = '<img style="width:25px;" src="'.get_stylesheet_directory_uri().'/images/flag/'.$flag.'.png" alt="" title="'.$country->name.'" />';
	}
	$preferences = array();
	$preferences = get_user_meta( $profileid, 'preferences', true );
?>
<style type="text/css">

.modal-backdrop {
	background:#333;
	opacity:.5;
}
.modal-backdrop.in {
	background:#333;
	opacity:.5;
}
</style>
<div class="profile-bg">
  <div class="container-fluid">
    <!--  <ol class="breadcrumb">
    <li><a href="<?php //echo home_url();?>">Home</a></li>
    <li><a href="<?php //echo home_url();?>/search-resumes">Search Resumes</a></li>
    <li class="active">User profile</li>
  </ol>-->
    <div class="about-me techie-detials">
      <div class="profile-header">
        <h2>Techie Profile - (<span><?php echo 'FMT ID: '.$profileid; ?></span> <?php echo $cflag; ?>)</h2>
        <a class="btn btn-default edit-btn pull-right" href="<?php echo esc_url(get_permalink(446)); ?>" ><i class="icon wb-check" aria-hidden="true"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/editIcon.png"/></i>Edit Profile</a>
        <?php if(!empty($_GET['success'])){ ?>
        <font color="green">Your profile details have been updated!</font>
        <?php } ?>
      </div>
      <div class="row">
        <div class="my-pic text-center col-sm-4 col-md-3 col-xs-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-offset="200" style="visibility: visible; animation-duration: 0.5s; animation-name: fadeInUp;">
          <div class="panel border0">
            <div class="panel-body">
              <div class="avatar-pic">
                <?php if(!empty($userphoto_thumb_file)){ ?>
                <img src="<?php echo $upload_path.$userphoto_thumb_file; ?>" alt="my profile"/>
                <?php }else{ ?>
                <!--<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/techiprofile.png"/> -->
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/6.jpg">
                <?php } ?>
              </div>
              <p class="develop-id"><?php echo $position; ?></p>
              <p class="fmt-id">FMT ID: <?php echo $profileid;?> <?php echo $cflag; ?></p>
            </div>
          </div>
        </div>
        <div class="col-sm-8 col-md-9 col-xs-12 no-padding">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel border0">
              <div class="panel-body">
                <div class="workexpriace">
                  <h3>Personal Details</h3>
                  <div class="form-group-box">
                    <label class="col-sm-2 control-label text-right">Name:</label>
                    <div class="col-sm-10">
                      <p class="form-control-static"><?php echo $user_info->display_name; ?></p>
                    </div>
                  </div>
                  <div class="form-group-box">
                    <label class="col-sm-2 control-label text-right">Email:</label>
                    <div class="col-sm-10">
                      <p class="form-control-static"><?php echo $user_info->user_email; ?></p>
                    </div>
                  </div>
                  <div class="form-group-box">
                    <label class="col-sm-2 control-label text-right">Phone:</label>
                    <div class="col-sm-10">
                      <p class="form-control-static"><?php echo $phone; ?></p>
                    </div>
                  </div>
                  <div class="form-group-box">
                    <label class="col-sm-2 control-label text-right">Experience:</label>
                    <div class="col-sm-10">
                      <p class="form-control-static">
                        <?php 
												if($experience == 0){
													echo "Fresher";
												}else if($experience > 10){
													echo "10+ Years"; 
												}else{
													echo $experience." Years";
												} 
												?>
                      </p>
                    </div>
                  </div>
                  <div class="form-group-box">
                    <label class="col-sm-2 control-label text-right">Country:</label>
                    <div class="col-sm-10">
                      <p class="form-control-static"><?php echo $country->name; ?></p>
                    </div>
                  </div>
                  <div class="form-group-box no-border">
                    <label class="col-sm-2 control-label text-right">City:</label>
                    <div class="col-sm-10">
                      <p class="form-control-static"><?php echo $city; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-xs-12 wow fadeInUp " data-wow-duration="0.5s" data-wow-offset="200" style="visibility: visible; animation-duration: 0.5s; animation-name: fadeInUp;">
            <div class="panel border0">
              <div class="panel-body">
                <div class="workexpriace experi">
                  <h3>Experience</h3>
                  <ul>
                    <li><?php echo $position; ?></li>
                    <?php 
		if($experience == 0){
		echo "<li>fresher</li>";
		}else if($experience > 10){
		echo "<li>10+ years</li>"; 
		}else{ ?>
                    <li><?php echo $experience." years."?></li>
                  </ul>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="my-pic col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-offset="200" style="visibility: visible; animation-duration: 0.5s; animation-name: fadeInUp; ">
            <div class="panel border0">
              <div class="panel-body">
                <div class="workexpriace tech">
                  <h3> Expertise</h3>
                  <ul>
                    <?php echo $skills; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel border0">
              <div class="panel-body">
                <div class="workexpriace">
                  <h3> Domain</h3>
                  <ul>
                    <?php echo $domain_li; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel border0">
              <div class="panel-body">
                <div class="workexpriace">
                  <h3>Educational Details</h3>
                  <ul>
                    <li><?php echo nl2br(get_the_author_meta('educational', $profileid)); ?></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel border0">
              <div class="panel-body">
                <div class="workexpriace">
                  <h3> Work Experience</h3>
                  <ul>
                    <li><?php echo nl2br(get_the_author_meta('description', $profileid)); ?></li>
                    <!--li><span>Company :</span> EA Tech Pvt. Ltd.</li>
          <li><span>Role :</span> Software Engineer</li>
          <li><span>Project :</span> carsexits, Jet Nexus, Load Balancer, MedicoSA</li>
          <li><span>Duration :</span> April 2015 to Nov 2015</li-->
                  </ul>
                  <!--h4> Roles & Responsibilities </h4>
        <ul class="roleresponsibility">
          <li> Worked on System Development Lifecycle activities occurring within each project phase.</li>
          <li> Front end coding.</li>
          <li> Designing of user interface.</li>
          <li> Testing of software.</li>
          <li> Fixing of bugs reported.</li>
          <li> Able to demonstrate skills in creating clear, complete, and concise documentation.</li>
          <li> Understanding and experience of root cause analysis and corrective action process.</li>
          <li> Communicate fluently and effectively with all level of business users, technical teams, and management across the organization.</li>
          <li> Coordinated projects.</li>
          <li> Skills: - JavaScript, Jquery, Extjs 5.1, Sencha, MVC architecture, Wireshark, Linux, Ajax, Html, C++.</li>
        </ul-->
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel border0">
              <div class="panel-body">
                <div class="workexpriace">
                  <h3> Country</h3>
                  <ul>
                    <li> <?php echo $city; if(!empty($state)){ echo ', '.$state; } if(!empty($country->name)){echo ', '.$country->name;} ?> </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="col-md-12 col-sm-12 col-xs-12">
     <div class="panel border0">
    <div class="panel-body">
        <div class="workexpriace">
          <h3>My Challenging project</h3>
          <ul>
           <li><?php echo nl2br(get_the_author_meta('challenging_project', $profileid)); ?></li>
          </ul>
        </div>
        </div>
        </div>
        </div> -->
          <!-- <div class="col-md-12 col-sm-12 col-xs-12">
     <div class="panel border0">
    <div class="panel-body">
        <div class="workexpriace">
          <h3>My Short/medium Goal </h3>
          <ul>
            <li><?php echo nl2br(get_the_author_meta('yourgoal', $profileid)); ?></li>
          </ul>
        </div>
</div>
</div>
</div> -->
        <div class="col-md-12 col-sm-12 col-xs-12">
     <div class="panel border0">
    <div class="panel-body">
        <div class="workexpriace">
          <h3>Preferences</h3>
           <?php
				   $prefer_str = "";
				   if(!empty($preferences)){ 
				   $prefer_str = implode(", ", $preferences);
				   }
		           echo $prefer_str;
		           ?>
        </div>
        </div>
        </div>
        </div>
        </div>
      </div>
      <div class="show_intest">
        <ul>
          <li><a href="#"> <i class="fa fa-share-alt" aria-hidden="true"></i> Share </a></li>
          <li><a href="#"> <i class="fa fa-print" aria-hidden="true"></i> Print </a></li>
          <li><a href="#"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Save </a></li>
          <li><a href="#"> <i class="fa fa-heart" aria-hidden="true"></i> Express Interest </a></li>
          <li><a href="#"> <i class="fa fa-share" aria-hidden="true"></i> Need More </a></li>
        </ul>
      </div>
    </div>
  </div>
  <!--div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 border-r techiProfile-left">
<h3 class="text-uppercase remove-margin-t push-20"><?php echo 'FMT ID: '.$profileid; ?></h3>
<?php if(!empty($userphoto_thumb_file)){ ?>
<img src="<?php echo $upload_path.$userphoto_thumb_file; ?>" alt="" style="width:250px;" align="left" />
<?php }else{ ?>
<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/techiprofile.png">
<?php } ?>
<h4 class="text-uppercase font-s16 push-30-t">general</h4>	 
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 remove-padding gray-light">
<div class="col-md-3 col-xs-3 col-sm-4 col-lg-3 remove-padding">postition:</div>
<div class="col-md-9 col-xs-9 col-sm-8 col-lg-9 remove-padding"><?php echo $position; ?></div>
</div>
<div class="col-md-12 remove-padding gray-light">
<div class="col-md-3 col-xs-3 col-sm-4 col-lg-3 remove-padding">exp:</div>
<div class="col-md-9 col-xs-9 col-sm-8 col-lg-9 remove-padding">
<?php 
if($experience == 0){
echo "fresher";
}else if($experience > 10){
echo "10+ years"; 
}else{ 
echo $experience." years.";
}
?></div>
</div>
<div class="col-md-12 remove-padding push-30 gray-light">
<div class="col-md-3 col-xs-3 col-sm-4 col-lg-3 remove-padding">domain:</div>
<div class="col-md-9 col-xs-9 col-sm-8 col-lg-9 remove-padding">banking & finance, ecommerce.</div>
</div>
<div class="clearfix"></div>
<h4 class="text-uppercase font-s16">speciality</h4>
<div class="text-capitalize gray-light">
<?php echo $skills; ?>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-uppercase"> 
<div class="push-15 push-50-l mobile-border-t">
<input type="button" value="profile" class="btn blue-button remove-border text-white text-uppercase">
</div>
<div class="profileInfo border push-20 push-50-l">
<?php echo nl2br(get_the_author_meta('description', $profileid)); ?>
</div>	
</div>
</div>
<div class="row remove-margin">
<div class=" col-md-3 col-md-offset-3 text-center col-xs-12">
<input type="button" value="Express Internet" onclick="expressInterest();" class="btn btn-success remove-border text-capitalize push-50-t">
</div>
</div>

<div class="clearfix"></div-->
  <!-- Model Express Interest Start  -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog1 ">
      <!-- Modal content-->
      <div class="modal-content modal-content1">
        <div class="modal-header1">
          <button type="button" class="close close2" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div id="thank-you-msg" class="thank-you"> <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thanks-tick.png"/></span>
            <h4>Thank You</h4>
            <p>Thank you for expressing interest in the techie with <strong>FMT ID
              <bdo>329</bdo>
              </strong></p>
            <p>We shall contact you shortly</p>
          </div>
          <div id="thank-you-msg" class="thank-you"> <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thanks-tick.png"/></span>
            <h4>Thank You</h4>
            <p>Thank you for expressing interest in the techie with <strong>FMT ID
              <bdo>329</bdo>
              </strong></p>
            <p>We shall contact you shortly</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
	
jQuery('#thank-you-msg').hide();

jQuery("#express_interest").submit(function(e){	
	e.preventDefault();	
		var current_user_email = jQuery('#express_interest input[name="current_user_email"]').val();
		var user_email = jQuery('#express_interest input[name="user_email"]').val();
		var role = jQuery('#express_interest input[name="role"]').val();
		var start_date = jQuery('#express_interest input[name="start_date"]').val();
		var duration = jQuery('#express_interest input[name="duration"]').val();
		var location = jQuery('#express_interest input[name="location"]').val();
		var job_description = jQuery('#express_interest textarea[name="job_description"]').val();
		
		var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
			jQuery.ajax({
				type: "POST",
				url : ajaxurl,
				data : { 
					action :'express_interest',
					current_user_email: current_user_email,
					user_email: user_email,
					role: role,
					start_date: start_date,
					duration: duration,
					location: location,
					job_description: job_description
				},
				success:function(data){
					console.log(data);
					jQuery('#express_interest').hide();
					jQuery('#thank-you-msg').show();
					window.setTimeout(function(){
					var curPageURL = window.location.href;
                    document.location.href = curPageURL;
					}, 3000);
				}
			});
		
	});
});
</script>
<?php } ?>
<?php } ?>
<?php get_footer(); ?>
