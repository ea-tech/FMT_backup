<?php
/**
 * The template for displaying all single technologies
 */

get_header(); 
$template = get_field('template');
if(!empty($template)){
	if( $template == 'layout1'){
		get_template_part( 'template-parts/'.$template, 'page' );
	}
	elseif($template == 'layout2'){
		get_template_part( 'template-parts/'.$template, 'page' );
	}
	elseif($template == 'layout3'){
		get_template_part( 'template-parts/'.$template, 'page' );
	}
	elseif($template == 'ux'){
		get_template_part( 'template-parts/'.$template, 'page' );
	}
	elseif($template == 'drupal'){
		get_template_part( 'template-parts/'.$template, 'page' );
	}
	elseif($template == 'wordpress'){
		get_template_part( 'template-parts/'.$template, 'page' );
	}
	elseif($template == 'android'){
		get_template_part( 'template-parts/'.$template, 'page' );
	}
	elseif($template == 'ios'){
		get_template_part( 'template-parts/'.$template, 'page' );
	}
	elseif($template == 'php'){
		get_template_part( 'template-parts/'.$template, 'page' );
	}
	elseif($template == 'blockchain'){
		get_template_part( 'template-parts/'.$template, 'page' );
	}
	elseif($template == 'python'){
		get_template_part( 'template-parts/'.$template, 'page' );
	}
	elseif($template == 'aem'){
		get_template_part( 'template-parts/'.$template, 'page' );
	}
	elseif($template == 'sitecore'){
		get_template_part( 'template-parts/'.$template, 'page' );
	}
	elseif($template == 'joomla'){
		get_template_part( 'template-parts/'.$template, 'page' );
	}
	elseif($template == 'angular'){
		get_template_part( 'template-parts/'.$template, 'page' );
	}
}else{
?>
<?php
$user = wp_get_current_user();
// Start the loop.
while ( have_posts() ) : the_post();
?>
<!--<div id="primary" class="content-area push-20">
  <div class="content_technology">

  <div class="tecnnology_two">
    <div class="tech-top">
       <?php the_content(); ?>
    </div>
    
  </div>
</div>

</div>-->

<div id="content" class="site-content">
  <div id="primary" class="content-area">
    <div class="content_technology">
      <div class="tecnnology_one">
      
      
        <div class="container">
         
          
             
              <h1 class="heading_main"><?php echo the_title(); ?></h1>
              <div class="cl"></div>
              <?php the_content(); ?>
            
          </div>
       
        
        
      </div>
    </div>
    <div class="cl"></div>
    
      <?php 
	    $number = 5; // ie. 20 users page page 
		$offset = 0;
		$expertise = get_the_ID();
	    $meta_query = array('relation' => 'OR');
		$meta_query[] = array('key' => 'expertise', 'value' => $expertise, 'compare' => 'LIKE');
		$args = array(
		'meta_query' => $meta_query,
		
		'orderby' => 'ID',
		
		'order' => 'DESC',
		
		'count_total' => true,
		
		'fields' => 'all',
		
		'role' => 'techie',
		
		'number' => $number,
		
		'offset' => $offset,
		
		);
      //print_r($args);

      $wp_user_query = new WP_User_Query($args);
	  $total_users = $wp_user_query->total_users;
	  $techies = array();
      if (!empty($wp_user_query->results)) {

	  foreach ($wp_user_query->results as $duser) {

		$techies[$duser->ID] = $duser;

	   }

       }

	 
	  if(count($techies) < 5)
	  {
	     ////Find Related Technology Techies 		
	     $related_tech = get_field('relative_technology');
		 if(!empty($related_tech)){
		   foreach ($related_tech as $techno) {		   
		          
				$related_number = 5; 
				$related_offset = 0;
				$related_expertise = $techno->ID;
				$meta_query = array('relation' => 'OR');
				$meta_query[] = array('key' => 'expertise', 'value' => $related_expertise, 'compare' => 'LIKE');
				$related_args = array(
				'meta_query' => $meta_query,
				
				'orderby' => 'ID',
				
				'order' => 'DESC',
				
				'count_total' => true,
				
				'fields' => 'all',
				
				'role' => 'techie',
				
				'number' => $related_number,
				
				'offset' => $related_offset,
				
				);
      

                $related_user_query = new WP_User_Query($related_args);		 
		       if (!empty($related_user_query->results)) {
	             foreach ($related_user_query->results as $tuser) {
		          $techies[$tuser->ID] = $tuser;				   
				    if (count($techies) == 5) {
                     break;    /* You could also write 'break 1;' here. */
                     }
	             }

               }
			   
			 if (count($techies) == 5) {
                     break;    /* You could also write 'break 1;' here. */
             }
		   
		   
		   //echo $techno->ID; 
		  }
		 }
	   //// End Find Related Technology Techies 			
	  }
	  
	  
	  
	  ?>
    
   <!-- <div class="search-resumeRow1">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="techie-list remove-margin">Related Techies</h3>
          </div>
        </div>
      </div>
      <div class="featured_techei single-tech">
        <div class="container text-center">
          <div class="text-info">
            <div id="techie_container">
            
                <?php if(!empty($techies)) :



				$upload_dir = wp_upload_dir();



				foreach($techies as $techie) :



				$upload_path = $upload_dir['baseurl'].'/thumbs/'.$techie->ID.'/';



				$userphoto_thumb_file = get_user_meta( $techie->ID, 'userphoto_thumb_file', true );



				$experience = get_user_meta( $techie->ID, 'experience', true );



				$expertise = get_user_meta( $techie->ID, 'expertise', true );



				$position = get_user_meta( $techie->ID, 'position', true );								
				$countryid = get_user_meta( $techie->ID, 'country', true );	           
				$country = getCountryByID($countryid);				$cflag = '';	           
				 if(!empty($country)){		        $flag = strtolower($country->Iso2);		         
				 $cflag = '<img src="'.get_stylesheet_directory_uri().'/images/flag/'.$flag.'.png" alt="" title="'.$country->name.'" />';	            }



				$technologies = getTechnologiesTree();



				$skills = '';



				if(is_array($expertise)){
					foreach($expertise as $expert){
						$expert = str_replace(' - ', '', $technologies[$expert]);
						if(!empty($expert)){
							$skills .= '<span class="featured_techei_added_tech">'.$expert.'</span>';
						}															
					}
				}	
				?>
            
                <div class="serchtechie_width techie_width">
                <div class="tech-all-details"> 
                <a <?php if(in_array('employer', $user->roles)){ ?> href="<?php echo site_url()."/profile/".$techie->ID;?>" <?php } else { ?> type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?>>
              <div class="featured_techei_img">
                <?php if(!empty($userphoto_thumb_file)){ ?>
                <img src="<?php echo $upload_path.$userphoto_thumb_file; ?>" alt="techie"/>
                <?php }else{ ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/techie.jpg">
                <?php } ?>
              </div>
              <div class="featured_techei_title">
                <p class="featured-title"><?php echo substr($position, 0, 30); ?></p>
                <span class="featured_techei_id"> <?php echo $cflag; ?> <?php echo 'FMT ID: '.$techie->ID; ?> </span> <span class="featured_techei_exp">
                <?php if($experience == '0'){echo "Fresher";}elseif($experience > 10){echo "10+ Years"; }elseif(!empty($experience)){ echo $experience." Years";}?>
                </span> </div>
              <div class="featured_techei_added"> <?php echo $skills; ?> </div>
              </a>
              <div class="techie_join_section">
                <div class="techie_butns">
                  <?php 


               if ( is_user_logged_in() ) {
	
	
	                if(in_array('employer', $user->roles)){ ?>
                  <a href="<?php echo site_url()."/profile/".$techie->ID;?>"  type="button" class="build-your-team">View my profile</a> <a onclick="hire_me('<?php echo $techie->ID;  ?>');" type="button" data-toggle="modal" data-target="#myModal" class="build-your-team">Hire me</a>
                  <?php }else{ ?>
                  <a type="button" data-toggle="modal" data-target=".bs-example-modal-sm-techie" class="build-your-team ">View my profile</a> <a type="button" data-toggle="modal" data-target=".bs-example-modal-sm-techie" class="build-your-team">Hire me</a>
                  <?php }      
	            } else { 
	                        ?>
                  <a type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">View my profile</a> 
                  <a type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a>
                  <?php }   ?>
                </div>
              </div>
            </div>
              </div>
              
              <?php 
			     endforeach;
			  endif;
			  ?>
              
          </div>
            <div class="cl"></div>
            <div class="mgt-30">             
            <a href="<?php echo get_permalink(77); ?>" class="build-your-team more_techie_button mgr_10">Join as a Techie</a>
            <?php 
			 $location = getLocationInfoByIp();
	          if($location['country'] != 'IN'){
			  ?>
            <a href="<?php echo get_permalink(286); ?>" class="build-your-team more_techie_button">Hire a Techie</a>
            <?php }else{ ?>
            <a href="javascript:void(0);" class="build-your-team restrict_employer_button" data-toggle="modal" data-target="#useremployer_restrict">Hire a Techie</a>
            <?php } ?>
            </div>
            <div class="cl"></div>
          </div>
        </div>
      </div>
    </div>-->
    
    
    <div class="cl"></div>
    <?php 
     $related_services = get_field('relative_technology');
    if(!empty($related_services)){     
    ?>
    <div class="featured_technology">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-lg-3 col-sm-12 col-xs-12">
              <h3 class="techie-list remove-margin">Related Services</h3>
            </div>
          </div>
          <div class="resume-container">
            <div class="row">
              <?php
			  $i=1; 
			   foreach ($related_services as $service) {
			     $service_thumbnail_id = get_post_thumbnail_id($service->ID);
				 if($i> 6)
				 {
				 break;
				 }	
			  ?>
              <div class="col-md-2 col-sm-3 col-xs-6 resume-box">
                  <div class="profileImage">
                  <a href="<?php echo get_permalink( $service->ID ); ?>">
                  <img src="<?php echo $feat_image = wp_get_attachment_url($service_thumbnail_id); ?>">
                  <p class="title_service"> <?php echo get_the_title( $service->ID ); ?> </p>
                  </a> </div>
              </div>
              <?php 
			  $i++;			  
			  } ?>
              
            </div>
          </div>
        </div>
	<?php } ?>
	
	</div>
  </div>
</div>
</div>
</div>
</div>
</div> 
<?php 
// End of the loop.
endwhile;
?>
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
        <div id="thank-you-msg-employer" class="thank-you"> <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thanks-tick.png"/></span>
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
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-dialog2 modal-sm" role="document">
    <div class="modal-content modal-content2">
      <div class="modal-header modal-header1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body login-modal-body">
        <div class="page-login-main">
          <p>Only registered clients are given access to detailed CVs. </p>
          <h3 class="font-size-24">Log In</h3>
          <form method="post" action="<?php echo esc_url(home_url('/')); ?>wp-login.php">
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
<div class="modal fade bs-example-modal-sm-techie teches-pop" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-dialog2 modal-sm" role="document">
    <div class="modal-content modal-content2">
      <div class="modal-header modal-header1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body login-modal-body">
        <div class="page-login-main">
          <p>Only registered Employer are given access to detailed CVs. </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="useremployer_restrict" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <div class="clearfix"></div>
            <div class="clearfix"></div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="clearfix"></div>
            <div class="clearfix"></div>
            <h4 class="modal-title">Sorry!</h4>
          </div>
          <div class="modal-body">
            <p>We are not serving in your country.</p>
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript">

function hire_me(techieid)
{
//alert(techieid);
    jQuery('#thank-you-msg-employer').hide();
	jQuery('#hire_me_loader').show();
    jQuery("#techie_msg").html(techieid);
	var employer_email = '<?php echo $current_user->user_email; ?>' 
	var employer_id = '<?php echo $current_user->ID; ?>' 
    var techie_id = techieid; 	
	var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
	
			jQuery.ajax({
				type: "POST",
				url : ajaxurl,
				data : { 
					action :'hire_me',
					employer_id: employer_id,
					employer_email: employer_email,
                    techie_id: techie_id, 					
				},
				success:function(data){
					//alert(data);
					//console.log(data);
					
					jQuery('#hire_me_loader').hide();
					jQuery('#thank-you-msg-employer').show();
					//window.setTimeout(function(){
					//var curPageURL = window.location.href;
                    //document.location.href = curPageURL;
					//}, 3000);
				}
			});
			
		
	
	
} 
</script>
<!-- .content-area -->
<?php 
}
get_footer(); 
?>