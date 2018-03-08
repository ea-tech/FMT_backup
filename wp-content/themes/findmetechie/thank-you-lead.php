<?php
/**
 * Template Name: Lead Thanks
 */

get_header(); 
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<!-- Google Code for Website_Lead Conversion Page -->
    <script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 936610770;
    var google_conversion_label = "ZAF4CLaSp30Q0pfOvgM";
    var google_remarketing_only = false;
    /* ]]> */
    </script>
    <script type="text/javascript"  
    src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
    <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt=""  
    src="//www.googleadservices.com/pagead/conversion/936610770/?label=ZAF4CLaSp30Q0pfOvgM&amp;guid=ON&amp;script=0"/>
    </div>
    </noscript>

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
		  <div class="container">            
			<div id="lead-techie-thank-you-msg" class="thanks-box" style="display: block;"> <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thanks-tick.png"></span>
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
			?>
			<?php the_title('<h4>', '</h4>'); ?>
			<?php the_content(); ?>
			<?php
				// End of the loop.
			endwhile;
			?>
            
            <div id="dvCountDown" style="display:none;">
            You will be redirected after <span id="lblCount"></span>&nbsp;seconds.
             </div>
			  
			</div>
		  </div>
		</div>
    </div>
	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->
<script>
var seconds = 5;
        //jQuery("#dvCountDown").show();
        //jQuery("#lblCount").html(seconds);
        setInterval(function () {
            seconds--;
            //jQuery("#lblCount").html(seconds);
            if (seconds == 0) {
                jQuery("#dvCountDown").hide();
                window.location = "<?php echo home_url();?>";
            }
        }, 1000);
</script>

<?php get_footer(); ?>