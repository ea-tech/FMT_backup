<?php
/**
 * The main template file
 */

get_header(); ?>

	<div id="primary" class="content-area SinglePage">
		<content>
			<div class="aboutUsRow2" style="margin-top:40px;">
				<div class="container">
                    <div class="row">
					<div class="col-md-8 col-xs-12 col-sm-12 blog_post">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ',
				) );
			}

			// End of the loop.
		endwhile;
		?>				</div>
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
