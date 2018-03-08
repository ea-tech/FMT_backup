<?php
/**
 * Template Name: Sign Up Customer
 */

get_header(); 
$type = 'employer';
if(!empty($_REQUEST['type']) && ($_REQUEST['type'] == 'employer'))
	$type = 'employer';
?>

<style>
.new-list-add{margin: 15px 0px 30px 0px !important;}
.new-list-add li{ display: block; color: #444444;
    padding-bottom: 15px;
    font-size: 16px;
    padding-left: 25px;}
new-list-add li::before {
  content: "• ";
  color: red; /* or whatever color you prefer */
}
.signup-profile ul {
    margin: 11px 0px 0px 0px;
}
#employer{ min-height:450px;}
</style>
<div id="primary" class="content-area">
<?php while ( have_posts() ) : the_post(); ?>
<div class="signup-banner"><?php the_title('<h1>','</h1>');?></div>
		<div class="createAccountRow1">
			<div class="container-fluid">
				<div class="row ">
                <div class="col-sm-5 col-md-5 col-xs-12">
                <div class="signup-profile">
                <div class="media-box">
                 <?php the_content(); ?>
                </div>
				
				<?php $sign_up_customer_blocks = new Attachments( 'sign_up_customer_blocks'); ?>
				
                <ul class="">
				<?php if( $sign_up_customer_blocks->exist() ) : 
					while( $sign_up_customer_blocks->get() ) : 
					?>
					<li class="list-group-box">
					<div class="media-box">
					<div class="media-left-box">
					<?php echo $sign_up_customer_blocks->image( 'full' );?>
					</div>
					<div class="media-body-box"><?php echo $sign_up_customer_blocks->field( 'description' ); ?></div>
					</div>
					</li>
					<?php endwhile;
					      endif;
					?>
				
                </ul>
                </div>
              
                </div>
			<?php endwhile; ?>
				
				
					<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 no-padding">
						<div class="">
						  <!-- Nav tabs -->
						 

						  <!-- Tab panes -->
						  <div class="tab-content">
						  
						    <div role="tabpanel" class="tab-pane bg-white <?php if($type == 'employer'){ ?>active<?php } ?>" id="employer">
						    	<div class="submit-form">
								<?php echo do_shortcode('[contact-form-7 id="86" title="Employer Registration form"]');?>
								</div>
						    </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<content>

	

</div><!-- .content-area -->

<!-- START Model Box for user restrict Start  -->
<div id="useremployer_restrict_con" class="modal fade userrestrict_cont teches-pop" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <div class="clearfix"></div>
            <div class="clearfix"></div>            
            <button type="button" class="close" data-dismiss="modal" onclick="goBack();">&times;</button>
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
<!-- END Model Box for user restrict Start  -->    
    
   <?php 

	$location = getLocationInfoByIp();
	if($location['country'] == 'IN'){
	?>
    <script type="text/javascript">
	jQuery('.wpcf7-submit').attr('disabled','disabled');
    jQuery(document).ready(function(){
		//alert('jjj');
        jQuery('.userrestrict_cont').modal('show');
    });
	
	
    </script>	
    <?php	
	}	
   ?>
<script type="text/javascript">
 jQuery(document).ready(function(){
 jQuery(".first").click(function(){
  jQuery('.userrestrict_cont').modal('hide');   
  });
  jQuery("#login-hover-d").click(function(){
  jQuery('.userrestrict_cont').modal('hide');  
  });
});

function goBack(){ 
    window.location = "<?php echo home_url();?>";
}

</script>

<?php get_footer(); ?>