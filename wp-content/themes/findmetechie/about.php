<?php

/* Template Name: About Page */



get_header(); 

$feat_image = wp_get_attachment_url( get_post_thumbnail_id() );

?>
<?php while ( have_posts() ) : the_post(); ?>

<div id="primary" class="content-area">
  <content>
    <div class="about-banner">
      <?php the_content(); ?>
    </div>
    <div class="about-us para_about page-home5 text-center featured_overview">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-lg-4 col-xs-12 img_height pull-right"> <img src="<?php echo $feat_image; ?>" alt=""/> </div>
          <div class="col-md-8 col-lg-8 col-xs-12 ">
            <div class="overview-box">
              <?php the_title('<h1 class="About_heading">','</h1>');?>
              <?php echo $company_overview = get_field('company_overview'); ?> 
              
            <?php  if (is_user_logged_in()) { ?>
            
			<a href="<?php echo home_url();?>/#technologies" class="build-your-team more_techie_button">See Our Tech Stack</a>
            
			<?php }else{ ?> 
                 
			  <?php 
			  $location = getLocationInfoByIp();
	          if($location['country'] != 'IN'){
			  ?>
         <a href="<?php echo get_permalink(286); ?>" class="build-your-team mgt-btn">Hire Techies</a> </div>
        <?php }else{ ?>
        <a href="javascript:void(0);" class="build-your-team mgt-btn restrict_employer_button" data-toggle="modal" data-target="#useremployer_restrict">Hire Techies</a>
        <?php } } ?>
             
          </div>
        </div>
        <div class="subtitles-text"> </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="homeRow5 text-center para_about" id="HireaTechie">
      <div class="container">
        <div class="row">
          <?php $about_us_blocks = new Attachments( 'about_us_blocks'); ?>
          <?php if( $about_us_blocks->exist() ) : 

			while( $about_us_blocks->get() ) : 

			?>
          <div class="col-md-4 col-lg-4 col-xs-12 top_header">
            <div class="ab-box">
              <h3 class="text-primary"><?php echo $about_us_blocks->field( 'title' ); ?></h3>
              <?php echo $about_us_blocks->image( 'full' );?>
              <p class="hidden-xs"><?php echo $about_us_blocks->field( 'description' ); ?></p>
            </div>
          </div>
          <?php endwhile;

		  endif;

		?>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="cl"></div>
      <div class="mgt-30"> <a href="<?php echo get_permalink(77); ?>" class="build-your-team more_techie_button mgr_10">Join as a Techie</a>
          
             <?php  if (is_user_logged_in()) { ?>
            
			<a href="<?php echo home_url();?>/#technologies" class="build-your-team more_techie_button">See Our Tech Stack</a>
            
			<?php }else{ ?> 
             <?php			  
			  $location = getLocationInfoByIp();
	          if($location['country'] != 'IN'){

			  ?>
        <a href="<?php echo get_permalink(286); ?>" class="build-your-team more_techie_button">Hire Techies</a>
        <?php }else{ ?>
        <a href="javascript:void(0);" class="build-your-team restrict_employer_button" data-toggle="modal" data-target="#useremployer_restrict">Hire Techies</a>
        <?php } } ?>
      </div>
      <div class="cl"></div>
    </div>
    <div class="para_about diffrence">
      <div class="container">
        <h3 class="testimonial About_heading"> <?php echo $title_heading2 = get_field('title_heading2'); ?></h3>
        <div class="onside-box"> <?php echo $the_content = get_field('the_content'); ?> </div>
      </div>
    </div>
  </content>
</div>
<?php endwhile; ?>
<div id="useremployer_restrict" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sorry!</h4>
      </div>
      <div class="modal-body">
        <p>We are not serving in your country.</p>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
