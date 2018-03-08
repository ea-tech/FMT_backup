<?php
/**
 * Template Name: Techies
 */

get_header(); 

$user = wp_get_current_user();

$limit = 10; // ie. 20 users page page 

global $wpdb;

$query = "SELECT u.user_id as ID
FROM fmt_usermeta u LEFT JOIN fmt_usermeta um ON u.user_id = um.user_id LEFT JOIN fmt_usermeta tec ON u.user_id = tec.user_id
WHERE 1 = 1 AND tec.meta_key = 'fmt_capabilities' AND (tec.meta_value LIKE '%techie%') ";

if(!empty($_REQUEST['expertise'])){
	$expertise = $_REQUEST['expertise'];
	$comp1 = sprintf(':%s;', $expertise);
	$comp2 = sprintf(':"%s";', $expertise);
	$query .= " AND um.meta_key = 'expertise' AND (um.meta_value LIKE '%".$comp1."%' OR um.meta_value LIKE '%".$comp2."%')";
}


if($_GET['experience'] || $_GET['experience']=='0'){
	$experience = $_GET['experience'];
	$query .= " AND u.meta_key = 'experience' AND u.meta_value >= $experience ";
}

$query .= " GROUP BY u.user_id ";

$dquery = $query." LIMIT 0, $limit";

$techies = $wpdb->get_results($dquery);

$wpdb->get_results($query);

$total_users = $wpdb->num_rows;

$technologies = getTechnologiesTree();

$experiences = array('Fresher', '1+ Year', '2+ Years', '3+ Years', '4+ Years', '5+ Years', '6+ Years', '7+ Years', '8+ Years', '9+ Years', '10+ Yrs &amp; above');

?>
<style type="text/css">
.page-template-techies {
	background-color: #f7f7f7;
}
.main-header {
	background-color: #ffffff;
}
.modal-backdrop {
	background:#333;
	opacity:.5;
}
.modal-backdrop.in {
	background:#333;
	opacity:.5;
}
</style>
<content>
<div class="search-resumeRow1">
  <div class="container">
    <?php

			// Start the loop.

			while ( have_posts() ) : the_post();

			?>
    <div class="row">
      <div class="col-md-4 col-lg-3 col-sm-12 col-xs-12">
        <?php the_content(); ?>
      </div>
           <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 mgt-10">
        <form action="<?php echo get_permalink(38); ?>" method="get">
        
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 pa-0 ">
            <bdo>Filter By</bdo>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 pa-0">
            <div class="dropdown ">
              <select id="expertise_drop" name="expertise" class="style-select" onchange="this.form.submit();">
                <option value="">Expertise</option>
                <?php foreach($technologies as $k => $v){ ?>
                <option value="<?php echo $k; ?>" <?php if($expertise == $k){echo 'selected';} ?>><?php echo $v; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 pa-0">
            <div class="dropdown">
              <select id="experience_drop" name="experience" class="style-select" onchange="this.form.submit();">
                <option value="">Experience</option>
                <?php foreach($experiences as $k => $v){ ?>
                <option value="<?php echo $k; ?>" <?php if($experience != '' && $experience == $k){echo 'selected';} ?>><?php echo $v; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
    <div>
    </div>
    </div>
      <div class="featured_techei">
        <div class="container text-center">
          <div class="text-info">
            <div id="techie_container" class="	">
              <?php

			endwhile;



			if(!empty($techies)){ 

				$upload_dir = wp_upload_dir();

				$i = 0;

				foreach($techies as $techie){
				
                    $user_info = get_userdata($techie->ID);
					$userdata_roles = $user_info->roles;
					if(is_array($userdata_roles)){
                    $userdata_role = array_shift($userdata_roles);
					if($userdata_role == 'techie'){
					
					$upload_path = $upload_dir['baseurl'].'/thumbs/'.$techie->ID.'/';

					$userphoto_thumb_file = get_user_meta( $techie->ID, 'userphoto_thumb_file', true ); 

					$experience = get_user_meta( $techie->ID, 'experience', true ); 

					$expertise = get_user_meta( $techie->ID, 'expertise', true );

					$position = get_user_meta( $techie->ID, 'position', true );

					$skills = '';

					if(is_array($expertise)){

						foreach($expertise as $expert){

							$expert = str_replace(' - ', '', $technologies[$expert]);

							if(!empty($expert)){							

								$skills .= '<span class="featured_techei_added_tech">'.$expert.'</span>';

							}

						}

					}
					
					$countryid = get_user_meta($techie->ID, 'country', true );
	                $country = getCountryByID($countryid);
				    $cflag = '';
	                if(!empty($country)){
		           $flag = strtolower($country->Iso2);
		           $cflag = '<img src="'.get_stylesheet_directory_uri().'/images/flag/'.$flag.'.png" alt="" title="'.$country->name.'" />';
	               }


					?>
                     <div class="serchtechie_width techie_width">
                <div class="tech-all-details">
              <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?>
              <a href="<?php echo get_permalink(241); ?><?php echo $techie->ID; ?>" class="link">
              <?php }else{ ?>
              <!--<a href="javascript:void(0)" class="link" onclick="jQuery('.overlay').removeClass('hide');">-->
              <a type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm">
              <?php } ?>
             
                  <div class="featured_techei_img">
                    <?php if(!empty($userphoto_thumb_file)){ ?>
                    <img src="<?php echo $upload_path.$userphoto_thumb_file; ?>" alt="techie"/>
                    <?php }else{ ?>
                    <img class="default_image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/techie-1.png">
                    <?php } ?>
                  </div>
                  <div class="featured_techei_title">
                    <p class="featured-title"><?php echo substr($position, 0, 30); ?></p>
                    <span class="featured_techei_id"><?php echo $cflag; ?> <?php echo 'FMT ID: '.$techie->ID; ?></span> <span class="featured_techei_exp">
                    <?php if($experience == '0'){echo "Fresher";}elseif($experience > 10){echo "10+ Years"; }else if(!empty($experience)){ echo $experience." Years";}?>
                    </span> </div>
                  <div class="featured_techei_added"><?php echo $skills; ?></div>
                  <div class="techie_join_section">
                    <div class="techie_butns">  <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/".$techie->ID;?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm1" <?php } ?> class="build-your-team ">View my profile</a> 
					
					<a onclick="hire_me('<?php echo $techie->ID;  ?>');" <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="" type="button" data-toggle="modal" data-target="#myModal" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm1" <?php } ?>class="build-your-team ">Hire me</a> 
					
					</div>
                  </div>
                </div>
              </div>
              </a>
              <?php

					

				}/// end of is array
				
				}		

				}

			}else{

				echo '<p>No resources avaiable.</p>'; 

			} 

			?>
            </div>
			  <div class="cl"></div>
			   <div class="loading-image" style="display:none;">
                 <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ajax-loader.gif" />
               </div>
             <!-- <div><a href="javascript:void(0);" class="build-your-team more_techie_button" id="load_more_techie">See More techies</a>
              </div> -->                   
		     <div class="cl"></div>
          </div>
        </div>
      </div>
    </div>
	
    <!-- <div class="">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <ul class="pagination">
          <li><?php echo paginate_links($pl_args); ?></li>
        </ul>
      </div>
    </div> -->
	
	
  </div>
</div>
</content>
<div class="overlay text-center hide">
  <div class="popcontent"><span class="login-icon"></span>Kindly login to view this section.</div>
</div>
<div class="modal fade bs-example-modal-sm1 teches-pop" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-dialog2 modal-sm" role="document">
    <div class="modal-content modal-content2">
      <div class="modal-header modal-header1">
	  <?php   if ( is_user_logged_in() ) { ?>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <?php } ?>
		
      </div>
      <div class="modal-body login-modal-body">
        <div class="page-login-main">

          <p>Only registered clients are given access to detailed CVs. </p>
          <h3 class="font-size-24">Log In</h3>
          <form method="post" action="<?php echo esc_url(home_url('/')); ?>securelogin">
            <div class="form-group">
              <label class="sr-only" for="inputEmail">Email</label>
              <input type="email" value="" class="form-control" id="user_login" name="log" placeholder="EMAIL*" required />
            </div>
            <div class="form-group">
              <label class="sr-only" for="inputPassword">Password</label>
              <input type="password" value="" class="form-control" id="user_pass" name="pwd" placeholder="PASSWORD*" required />
            </div>
            <div class="form-group clearfix"> <a class="pull-left" href="<?php echo wp_lostpassword_url(); ?>">FORGOT YOUR PASSWORD?</a> </div>
            <button type="submit" class="btn btn-success btn-green btn-block">SIGN IN</button>
            <div class="borderTop"></div>
            <p class="textSmall">Don't have account, Please consider registering for FindMeTechie</p>
            <input type="hidden" value="<?php echo esc_url(get_permalink()); ?>" name="redirect_to" />
          </form>
          <button type="submit" class="btn btn-warning orange-btn btn-block" onclick="window.location='<?php echo get_permalink(286); ?>';">REGISTER</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Model Express Interest Start  -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog1 ">

    <!-- Modal content-->
    <div class="modal-content modal-content1">
      <div class="modal-header1">
        <button type="button" class="close close2" data-dismiss="modal">&times;</button>
      
      </div>
      <div class="modal-body">
		<div id="hire_me_loader" style="display:none;"><img src="<?php echo get_stylesheet_directory_uri()?>/images/loading.gif" alt="" ></div>	
		<div id="thank-you-msg" class="thank-you">
        <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thanks-tick.png"/></span>
				<h4>Thank You</h4>
				<p>Thank you for expressing interest in the techie with <strong>FMT ID <bdo><span id="techie_msg"></span> </bdo></strong></p>

<p>We shall contact you shortly</p>
			  </div>
  
                   
	
					 

      </div>
     
    </div>

  </div>
</div>
<div class="modal fade bs-example-modal-sm-techie teches-pop" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-dialog2 modal-sm" role="document">
    <div class="modal-content modal-content2">
      <div class="modal-header modal-header1">
	  
      </div>
      <div class="modal-body login-modal-body">
        <div class="page-login-main">
          <p>Only registered Employer are given access to detailed CVs. </p>
          
         
        </div>
      </div>
    </div>
  </div>
</div>
<?php 


    if ( is_user_logged_in() ) {
	
	
	if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){
	
    }else{ ?>
		
	<script type="text/javascript">
    jQuery(window).on('load',function(){
		//alert('jjj');
        jQuery('.bs-example-modal-sm-techie').modal('show');
    });
	
	
    </script>	
	<?php }      
	} else if($total_users >0) {
	  
	  ?>
	  
    <script type="text/javascript">
    jQuery(window).on('load',function(){
		//alert('jjj');
        jQuery('.bs-example-modal-sm1').modal('show');
    });	
     </script>
 <?php }	
?>

<script type="text/javascript">

function hire_me(techieid)
{
//alert(techieid);
    jQuery('#thank-you-msg').hide();hire_me_loader
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
<script type="text/javascript">
 var isPreviousEventComplete = true;
 var firstCountRecord = <?php echo $total_users; ?>;
 var isDataAvailable = true;
 var page_number = 1;
 var per_page = <?php echo $limit; ?>;
 if(firstCountRecord <= per_page)
 {
   jQuery(".loading-image").css("display", "none");		
 }
 var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';	
 jQuery(window).scroll(function () {
 //if (jQuery(document).height() - 50 <= jQuery(window).scrollTop() + jQuery(window).height()) {
  if (isPreviousEventComplete && isDataAvailable) {
  
    page_number = page_number +1;
	var experience_drop = jQuery('#experience_drop').val();
	var expertise_drop = jQuery('#expertise_drop').val();
		
			
	var str = 'page_number=' + page_number + '&per_page=' + per_page +'&action=load_more_techie&experience='+experience_drop+'&expertise='+expertise_drop;
	isPreviousEventComplete = false;
	jQuery(".loading-image").css("display", "block");

	 /////////////////
		jQuery.ajax({
		type:'post',
		dataType: 'html',
		url: ajaxurl,
		data: str,
		success: function(data){				
			 isPreviousEventComplete = true;
			 if(data.length){											
			   jQuery("#techie_container").append(data);
			 }else{							
			   isDataAvailable = false;
			   jQuery(".loading-image").css("display", "none");							
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
				//$loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
		}				
	});
  }
 //}
 });
 </script>	
<?php get_footer(); ?>