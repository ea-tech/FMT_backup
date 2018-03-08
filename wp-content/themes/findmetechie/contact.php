<?php
/**
  Template Name: Contact 
 */
get_header();
?>

<div id="primary" class="content-area">
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="signup-banner">
    <?php the_title('<h1>','</h1>');?>
  </div>
  <div class="createAccountRow1">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="media-box">
            <?php the_content(); ?>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="contactFormPannel">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="">
            <!-- Nav tabs -->
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane bg-white active">
                <div class="submit-form"> <?php echo str_replace('rows="10"', 'rows="0"', do_shortcode('[contact-form-7 id="13" title="Contact form"]')); ?> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <content>
</div>
<!-- .content-area -->
<?php get_footer(); ?>
