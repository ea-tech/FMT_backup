<?php
/**
 * Template Name: Profile
 */
 
if (!is_user_logged_in()) {
    wp_redirect(wp_login_url());
}
get_header(); 
preg_match_all('!\d+!', $_SERVER['REQUEST_URI'], $matches);
if(!empty($matches)){
	$profileid = (integer)$matches[0][0];
}else{
	echo 'No such profile exists!';
}
$technologies = getRawTechnologiesTree();
global $current_user;
if(!empty($profileid) && ((in_array('employer', $current_user->roles)) || (in_array('administrator', $current_user->roles)) || ($current_user->ID == $profileid))){
	$upload_dir = wp_upload_dir();
	$upload_path = $upload_dir['baseurl'].'/thumbs/'.$profileid.'/';
	$userphoto_thumb_file = get_user_meta( $profileid, 'userphoto_thumb_file', true );
	$experience = get_user_meta( $profileid, 'experience', true ); 
	$expertise = get_user_meta( $profileid, 'expertise', true );
	$position = get_user_meta( $profileid, 'position', true );
	$domains = get_user_meta( $profileid, 'domain', true );
	$city = get_user_meta( $profileid, 'city', true );
	$state = get_user_meta( $profileid, 'state', true );
	$countryid = get_user_meta( $profileid, 'country', true );
	$country = getCountryByID($countryid);
	$user_info=get_userdata( $profileid);
	$user_email = $user_info->user_email;
	$current_user_email = $current_user->user_email;
	
	$domain_knowledge = domain_knowledge_Tree();
	$domain_li = '';
	if(is_array($domains)){
	    
		$i=1;
		foreach($domains as $domain){
		     if(count($domains) == $i){
			 $domain_li .= '<li>'.str_replace(' - ', '', $domain).'</li>';
			 }else{
			 $domain_li .= '<li>'.str_replace(' - ', '', $domain).', </li>';
			 }
			 $i++;
		}
	}

	$skills = '';
	if(is_array($expertise)){
		foreach($expertise as $expert){
			if(!empty($technologies[$expert])){
				$skills .= '<li><span>'.str_replace(' - ', '', $technologies[$expert]).'</span></li>';
				}
			else{
			     if(!empty($expert)){
				$skills .= '<li><span>'.str_replace(' - ', '', $expert).'</span></li>';
				}
				}
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
<style rel="stylesheet" media="print" type="text/css" >

@media print {
	aside#sidebar,
	header[role="banner"],
	footer,#comments,#respond,
	.fix-btn-get-quote,
	.query-fix-btn,
	.show_intest,
	.btn-block{
	   display: none;
	}
	.container {
		width: 90%;
		margin: 0px;
		padding: 0px;
	}
	* {
		color: #000;    
		background-color: #fff;
		border-color: #000;
		@include box-shadow(none);
		@include text-shadow(none);
		font-family:Arial, Helvetica, sans-serif;
		
	}
	a:after {
		content: "( "attr(href)" )";
	}
	.profile-bg:before {
		content: url(http://www.findmetechie.com/wp-content/uploads/2017/03/logo_transparent.png);
		left: 0;
		top: 1px;
		padding: 10px;
		margin-bottom: 20px !important;
		background: #fff;
		width: 100%;
	}
	.page-template #content {
    	margin-top: 0px;
	}
	.panel-body {
    	padding: 0px;
	}
	.techie_details{
		width: 100%;
		margin: 0;
		padding: 0;
	}
	.avatar-pic {
    	margin: 0;
	}
	body{
		margin: 0;
		padding: 0;
	}
	.tech ul li {
    display: inline-block;
	}
	.col-md-3{
	width: 100%;
	}
	.col-sm-4{
	width: 100%;
	}
	.avatar-pic {
    width: 150px;
    text-align: center;
    height: 150px;
    overflow: hidden;
    float: left;
	}
	.techie_details {
		text-align: left;
		margin: 0;
		max-width: 400px !important;
		float: left;
		width: 400px !important;
		padding-left: 20px;
		font-weight: 400 !important;
	font-size: 16px !important;
	}
	.back-btn, .scrollup, .profile-header h2{
		display: none !important;
	}
	.workexpriace h3 {
		font-size: 25px;
		color: #105fa4 !important;
		margin-bottom: 20px;
	}
	.techie_details h2{
	 	display: block!important;
		margin: 0;
		color: #105fa4 !important;
	 }
	 .logo_print{
	 	display: block!important;
		margin: 0;
		text-align: center;
	 }
	 .logo_print img{
	 width: 130px;
	 display: inline-block;
	 }
	 .workexpriace ul li, .tech ul li span {
	 font-size: 16px;
	 font-family: Arial, Helvetica, sans-serif;
	 line-height: 25px;
	 }
	 .tech ul li span {
	 border: 1px solid #000;
	 }
	 .techie_details p, .techie_details p span, span.uer_head{
		font-weight: 400 !important;
		font-size: 16px !important;

}

}

</style>
<style>
.tech ul {
	margin-top: 5px;
}
.workexpriace h3 {
	margin-bottom: 7px;
	line-height: 1em;

}
.develop-Exp{
	color: #444444 !important;
	font-size: 16px;
	margin: 0px;
	padding: 0px;
	margin-top: 0px;
}
.techie_details{
	text-align: left;
	margin: 0 auto;
	max-width: 150px;
	}
.techie_details .workexpriace{
	padding: 0;
}
.techie_details .workexpriace ul li{
	display: inline;
}

span.uer_head{
	font-size: 13px;
	margin-bottom: 0;
	text-transform: none;
	font-weight: inherit;
	color: #4a5f6f;
	font-weight: bold !important;
}
.profile-header h2 {
	border-bottom: 0px;
	color: #4a5f6f;
}
.profile-header {
    padding: 5px 0px;
}

.workexpriace ul li span {
    margin-right: 0px;
}
.back-btn{
   display: inline-block;
    margin: 15px 0 0;
    border-radius: 2px;
    border: none;
    color: #fff;
    background: #0f4d76;
    padding: 4px 15px;
}
.techie_details h2,.logo_print{
	 display: none;
	 }
@media (min-width: 768px){
	.navbar-default .navbar-brand {
		padding: 20px 15px 15px 0;
	}
}
@media (min-width: 768px) and (max-width: 1023px){
	.profile li a {
		padding: 18px 9px 19px;
	}
}

</style>

<div class="profile-bg">
  <div class="container-fluid techie-detials">
    <!--  <ol class="breadcrumb">
    <li><a href="<?php //echo home_url();?>">Home</a></li>
    <li><a href="<?php //echo home_url();?>/search-resumes">Search Resumes</a></li>
    <li class="active">User profile</li>
  </ol>-->
  <div class="container">
  <div class="logo_print">
  <img src="https://www.findmetechie.com/wp-content/uploads/2017/03/logo.png" alt="logo"/>
  </div>
    <div class="about-me">
    <button action="action" class="back-btn" onclick="window.history.go(-1); return false;" type="button" value="Back" /><i class="fa fa-angle-left"></i> Back</button>
     <div class="printButton"><a href="<?php echo get_permalink(1426)."?resume=".$profileid; ?>">Print</a></div>
      <div class="profile-header ">
	  
        <h2><?php echo 'FMT ID: '.$profileid; ?>  <?php echo $cflag; ?></h2>
       
      </div>
      <div class="row">
        <div class="my-pic text-center col-sm-4 col-md-3 col-xs-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-offset="200" style="visibility: visible; animation-duration: 0.5s; animation-name: fadeInUp;">
          <div class="panel border0">
            <div class="panel-body">
              <div class="avatar-pic">
                <?php if(!empty($userphoto_thumb_file)){ ?>
                <img src="<?php echo $upload_path.$userphoto_thumb_file; ?>" alt="my profile"/>
                <?php }else{ ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/techie.jpg"/>
                <?php } ?>
              </div>
              <div class="techie_details">
              <h2><?php echo 'FMT ID: '.$profileid; ?>  <?php echo $cflag; ?></h2>
              <p class="develop-id"><span class="uer_head"> Role: </span> <?php echo $position;?> </p>
              <p class="develop-Exp"> <span class="uer_head"> Experience:</span> <?php echo $experience. " years"?></p>
              <div class="workexpriace">
              
                <ul>
                <li><span class="uer_head">Domain:</span></li>
                  <?php echo $domain_li; ?>
                </ul>
              </div>
              </div>
            </div>
          </div>
          <div class="panel-body no-padding"> <a onclick="hire_me('<?php echo $profileid;  ?>');" class="btn btn-success btn-green btn-block" href="#" data-toggle="modal" data-target="#myModal"> Hire Me</a></div>
        </div>
        <div class="col-sm-8 col-md-9 col-xs-12 no-padding">
          <div class="col-sm-12 col-xs-12 wow fadeInUp " data-wow-duration="0.5s" data-wow-offset="200" style="visibility: visible; animation-duration: 0.5s; animation-name: fadeInUp;">
            <?php /*?><div class="panel border0">
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
            </div><?php */?>
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
            <?php /*?><div class="panel border0">
              <div class="panel-body">
                <div class="workexpriace">
                  <h3> Domain</h3>
                  <ul>
                    <?php echo $domain_li; ?>
                  </ul>
                </div>
              </div>
            </div><?php */?>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel border0">
              <div class="panel-body">
                <div class="workexpriace">
                  <h3> Project Details</h3>
                  <ul>
                    <li><?php echo nl2br(get_the_author_meta('description', $profileid)); ?></li>
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
          <?php /*?><div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel border0">
              <div class="panel-body">
                <div class="workexpriace">
                  <h3> Country</h3>
                  <ul>
                    <li><?php echo $city.', '.$state. ', '.$country->name; ?></li>
                  </ul>
                </div>
              </div>
            </div>
          </div><?php */?>
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
          <button type="button" class="close close2" data-dismiss="modal" onclick="goBack()">&times;</button>
        </div>
        <div class="modal-body">
          <div id="hire_me_loader" style="display:none;"><img src="<?php echo get_stylesheet_directory_uri()?>/images/loading.gif" alt="" ></div>
          <div id="thank-you-msg" class="thank-you"> <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thanks-tick.png"/></span>
            <h4>Thank You</h4>
            <p>Thank you for expressing interest in the techie with <strong>FMT ID
              <bdo><span id="techie_msg"></span> </bdo>
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
<script type="text/javascript">

function hire_me(techieid)
{
//alert(techieid);
    jQuery('#thank-you-msg').hide();
	jQuery('#hire_me_loader').show();
    jQuery("#techie_msg").html(techieid);	
    var techie_id = techieid; 	
	var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
	
			jQuery.ajax({
				type: "POST",
				url : ajaxurl,
				data : { 
					action :'hire_me',					
                    techie_id: techie_id, 					
				},
				success:function(data){
					//alert(data);
					//console.log(data);
					
					if(data == 'sessionout')
					{
					  alert('your session time out. Please login and try again.');
					  window.location.href='<?php echo site_url();?>';
					}else{
					
					jQuery('#hire_me_loader').hide();
					jQuery('#thank-you-msg').show();
					}
					//window.setTimeout(function(){
					//var curPageURL = window.location.href;
                    //document.location.href = curPageURL;
					//}, 3000);
				}
			});
			
		
	
	
} 
</script>
<script>
function goBack() {
    window.history.back();
}
</script>
<?php }else{
	echo '<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p style="text-align:center;">You are not allowed to access this area!</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>';
} ?>
<?php get_footer(); ?>

