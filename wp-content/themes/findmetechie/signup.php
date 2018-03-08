<?php
/**
 * Template Name: Sign Up
 */

get_header(); 
$type = 'techie';
if(!empty($_REQUEST['type']) && ($_REQUEST['type'] == 'employer'))
	$type = 'employer';
?>

<div id="primary" class="content-area">
		<div class="createAccountRow1">
			<div class="container">
				<div class="row ">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="text-uppercase text-center">create <span class="orange-dark">account</span></h2>
						<div class="push-50-t">
						  <?php the_content(); ?>
						  <!-- Nav tabs -->
						  <ul class="nav nav-tabs nav-justified" role="tablist">
						    <li role="presentation" <?php if($type == 'techie'){ ?>class="active"<?php } ?>><a href="#workseeker" aria-controls="workseeker" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-user  push-15-r"></span>I'M A WORKSEEKER</a></li>
						    
						  </ul>

						  <!-- Tab panes -->
						  <div class="tab-content">
						    <div role="tabpanel" class="tab-pane bg-white <?php if($type == 'techie'){ ?>active<?php } ?>" id="workseeker">
								<div class="form-group">
									<?php echo do_shortcode('[contact-form-7 id="76" title="Techie Registration form"]');?>
								</div>
						    </div>
						    
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<content>

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_footer(); ?>