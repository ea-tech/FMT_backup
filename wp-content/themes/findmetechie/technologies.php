<?php
/**
 * Template Name: Technologies
 */get_header(); $feat_image = wp_get_attachment_url( get_post_thumbnail_id() );?><?php while ( have_posts() ) : the_post(); ?><div id="primary" class="content-area">  <content>    <div class="about-banner"><?php the_title('<h1>','</h1>');?>  <?php the_content(); ?>    </div>
<content>
	<div class="search-resumeRow1">
		<div class="container">
			<div class="row push-30-t remove-margin-l remove-margin-r resume-container" style="position:relative;">			
			 <?php $our_technology_stack_args = array('post_type' => 'technology','orderby' => 'post_title', 'order'=>'ASC', 'posts_per_page'=>-1);
			 $our_technology_stack = new WP_Query( $our_technology_stack_args );if($our_technology_stack->have_posts()): ?>
				<?php while($our_technology_stack->have_posts() ) : $our_technology_stack->the_post();				  $feat_image = wp_get_attachment_url( get_post_thumbnail_id() );
				?>
					<div class="col-md-2 col-sm-3 col-xs-6 resume-box">
						<div class="insideDiv">
							<div class="profileImage">
								<?php if(!empty($feat_image)){ ?>
								<a href="<?php echo get_permalink( $post->ID ); ?>"><img src="<?php echo $feat_image; ?>"/></a>
								<?php }else{ ?>
								<a href="<?php echo get_permalink( $post->ID ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/placeholder.jpg"></a>
								<?php } ?>
							</div>												
						</div>
                  </div>				  
					<?php
					endwhile;
					endif;
					wp_reset_postdata();
				?>
			
		</div>
	</div>
</content></div><?php endwhile; ?>
<?php get_footer(); ?>