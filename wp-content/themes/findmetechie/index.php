<?php
/**
 * The main template file
 */

get_header(); ?>

	<div id="primary" class="content-area indexPage">
		<content>
		<?php if ( have_posts() ) : ?>
			<?php if ( is_home() && ! is_front_page() ) : ?>
			<div class="aboutUsRow1">
				<div class="container">
					<h6 class="text-uppercase"><?php single_post_title(); ?></h6>
					<h1 class="text-uppercase">find me techie</h1>
				</div>
			</div>
			<?php endif; ?>
			<div class="aboutUsRow2">
				<div class="container">
                    <div class="row">
					<div class="col-md-8 col-xs-12 col-sm-12 blog_post">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-12 blog_side_bar">
				<?php get_sidebar('blog'); ?>
				</div>
                    </div>
			</div>
			<div class="clearfix"></div>
		</div>
		</content><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>
