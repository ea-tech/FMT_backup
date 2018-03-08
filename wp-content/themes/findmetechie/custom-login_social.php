<?php
/**
 * Template Name: Custom Social Login
 */
if (!is_user_logged_in()) {
    wp_redirect(wp_login_url());
}
global $current_user;
$user_roles = $current_user->roles;
$user_role = array_shift($user_roles);

if($user_role == 'subscriber')
//if($user_role == 'employer')	
{
get_header(); 
?>	


<div id="primary" class="content-area">
	<div class="BannerInpage">
		<?php if(!empty($feat_image)){ ?>
		<img src="<?php echo $feat_image?>" alt="" />
		<?php } ?>
		<div class="breadcrumb container">
		  <ul>
			<li><a href="#">Home</a> / </li>
			<li class="active"><?php the_title(); ?></li>
		  </ul>
		</div>
	</div>
	
    <div id="hire_a_techie_pop_up" class="pop_up_techie">
		<div class="back_trance_bg">

		</div>
    </div>
	  <!-- Modal content-->
	<div class="modal fade bs-example-modal-sm-userrole user_role_check_pop teches-pop" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-dialog2 modal-sm" role="document">
    <div class="modal-content modal-content2">
      <div class="modal-header modal-header1">
	 
		
      </div>
      <div class="modal-body login-modal-body">
	      <h3>Choose your role</h3>
			 <div id="user_role_loader" style="display:none;"><img src="<?php echo get_stylesheet_directory_uri()?>/images/loading.gif" alt="" ></div>
			  <a href="javascript:void(0);" onclick="selectFindRole('<?php echo$current_user->ID; ?>','techie');" class="build-your-team first">Techie</a>
			 
			  <a href="javascript:void(0);"  onclick="selectFindRole('<?php echo$current_user->ID; ?>','employer');" class="build-your-team">Employer</a>
      
      </div>
    </div>
  </div>
</div>
	

</div><!-- .content-area -->
<script type="text/javascript">

    jQuery(window).on('load',function(){
		//alert('jjj');
        jQuery('.bs-example-modal-sm-userrole').modal('show');
    });
	

function selectFindRole(userid,role){ 	
		jQuery('#user_role_loader').show();
		var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
			jQuery.ajax({
				type: "POST",
				url : ajaxurl,
				data : { 
					action :'change_social_login_role',
					user_id: userid,					
					user_role: role,					
				},
				success:function(data){
					jQuery('#user_role_loader').hide();
					var data_array = data.split('~');
					if(data_array[1] == 'techie'){
					window.location.href = site_url+"/edit-techie-profile";						
					}
					else if(data_array[1] == 'employer')
					{
					window.location.href = site_url+"/edit-employer-profile";		
						
					}	
					
				}
			});
		
}	
</script>

<?php get_footer(); ?>


<?php }else
{
wp_redirect(home_url());
exit;	
	
}	