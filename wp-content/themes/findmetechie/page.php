<?php
/**
 * The template for displaying pages
 */

get_header(); ?>

<div id="primary" class="content-area pageFile">
<div class="BannerInpage">
    <?php the_title('<h6 class="text-uppercase">', '</h6>'); ?>
    <img src="<?php echo get_stylesheet_directory_uri()?>/images/banner_tech.jpg" />
    <div class="breadcrumb container">
      <ul>
        <li><a href="#">Home</a> / </li>
        <li class="active"><?php the_title(); ?></li>
      </ul>
    </div>
  </div>
  
	<content>
		
		<div class="aboutUsRow2">
			<div class="container">
				<div class="col-md-12 col-xs-12 col-sm-12 rightPaddNone leftPaddNone">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

					// End of the loop.
				endwhile;
				?>
				</div>	
			</div>
			<div class="clearfix"></div>
		</div>
	<content>

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_footer(); ?>