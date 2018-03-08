<?php

/**

 * The template for displaying the header

 *

 * Displays all of the head element and everything up until the "site-content" div.

 */
$user = wp_get_current_user();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon-1.ico" type="image/x-icon">
<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon-1.ico" type="image/x-icon">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-54388420-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-54388420-2');
  
  var trackOutboundLink = function(url) {
  gtag('event', 'click', {
    'event_category': 'inbound',
    'event_label': url,
    'transport_type': 'beacon',
    'event_callback': function(){document.location = url;}
  });
  }

</script>
<!--google anaytics end-->
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('.nav li.dropdown').hover(function() {
		jQuery(this).addClass('open');
	}, function() {
		jQuery(this).removeClass('open');
	});
	
	jQuery(".aboutlink").click(function(){     
	 var aboutlink = jQuery(".aboutlink").attr("href");
	 window.location.href = aboutlink ;	
    }); 
	
	jQuery(".faqlink").click(function(){     
	 var faqlink = jQuery(".faqlink").attr("href");
	 window.location.href = faqlink ;	
    });
	
	jQuery(".contactuslink").click(function(){     
	 var contactuslink = jQuery(".contactuslink").attr("href");
	 window.location.href = contactuslink ;	
    });		jQuery(".ourglobalspreadlink").click(function(){     	 var ourglobalspreadlink = jQuery(".ourglobalspreadlink").attr("href");	 window.location.href = ourglobalspreadlink ;	    });
	
	
});
var site_url = '<?php echo home_url();?>';	
</script>
<!-- DO NOT MODIFY -->
<!-- Quora Pixel Code (JS Helper) -->
<script>
!function(q,e,v,n,t,s){if(q.qp) return; n=q.qp=function(){n.qp?n.qp.apply(n,arguments):n.queue.push(arguments);}; n.queue=[];t=document.createElement(e);t.async=!0;t.src=v; s=document.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s);}(window, 'script', 'https://a.quora.com/qevents.js');
qp('init', '1879638ed08a49618b84b3a47c056397');
qp('track', 'ViewContent');
</script>
<noscript>
<img height="1" width="1" style="display:none" src="https://q.quora.com/_/ad/1879638ed08a49618b84b3a47c056397/pixel?tag=ViewContent&noscript=1"/>
</noscript>
<!-- End of Quora Pixel Code -->
<?php
if((get_the_ID() == 502) || (get_the_ID() == 504) ){ 
?>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1699355473705408'); 
fbq('track', 'CompleteRegistration');
</script>
<noscript>
<img height="1" width="1" 
src="https://www.facebook.com/tr?id=1699355473705408&ev=CompleteRegistration
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
<?php }else{ ?>
<!-- Facebook Pixel Code -->
<!-- End Facebook Pixel Code -->
<?php } ?>

<script language="JavaScript">
    function deviceType() {
      userAgent=navigator.userAgent.toLowerCase();
      if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(userAgent)) {
        return true
      } else {
        return false
      }
    }
</script>
</head>
<body <?php body_class(); ?>>
<?php 
if((get_the_ID() == 498) || (get_the_ID() == 502) || (get_the_ID() == 504) ){ 
?>
<!-- Google Code for FMT Web Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1017608463;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "PbuKCM-tuXMQj_Kd5QM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;"> <img height="1" width="1" alt="pagead" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1017608463/?label=PbuKCM-tuXMQj_Kd5QM&amp;guid=ON&amp;script=0"/> </div>
</noscript>
<?php } ?>
<div id="page" class="site">
  <header class="main-header">
  <div class="position-fixed">
    <div class="row header-top navbar-fixed-top">
      <div class="container">
        <div class="">
          <nav class="navbar navbar-default">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobileMenu" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <div id="mobileMenu" class="collapse navbar-collapse">
                <ul>
                  <li><a class="dropdown-item" href="<?php echo esc_url(get_permalink(5)); ?>" onClick="trackOutboundLink('<?php echo esc_url(get_permalink(5)); ?>'); return false;">About</a></li>
                  <li><a class="dropdown-item" href="<?php echo home_url();?>/#HireaTechie" onClick="trackOutboundLink('<?php echo home_url();?>/#HireaTechie'); return false;">Employers</a></li>
                  <li><a class="dropdown-item" href="<?php echo home_url();?>/#featured-techie" onClick="trackOutboundLink('<?php echo home_url();?>/#featured-techie'); return false;">Techies</a></li>
                  <li><a class="dropdown-item" href="<?php echo home_url();?>/#technologies" onClick="trackOutboundLink('<?php echo home_url();?>/#technologies'); return false;">Tech Stack</a></li>
                  <li>
                    <?php
				if(!empty($_REQUEST['expertise'])){
				$browseSearchValue = get_field( 'heading', $_REQUEST['expertise'] );
				}else{
				$browseSearchValue = "";
				} 
				 
				 ?>
                    <input value="<?php echo $browseSearchValue;  ?>" type="text" id="mobilemybrowseSearchInput" onKeyUp="mobilebrowseSearchFunction()" name="browse"  class="mobilesearchInput" placeholder="Search Profiles" />
                    <ul id="mobile-browse-menu-technology" style="display:none;">
                      <?php 
			     $our_technology_arg = array('post_type' => 'technology','orderby' => 'post_title', 'order'=>'ASC', 'posts_per_page'=>-1);	
	             $our_technology = new WP_Query( $our_technology_arg );
	             if($our_technology->have_posts()): 
				   while($our_technology->have_posts() ) : $our_technology->the_post();
				   $heading = get_field('heading');
				 ?>
                      <li><a href="<?php echo esc_url(home_url('/')."search-resumes/?expertise=".$post->ID); ?>" class=""><?php echo $heading; ?></a></li>
                      <?php
				    endwhile;  
				 endif;
		         wp_reset_postdata(); 		 
		         ?>
                    </ul>
                  </li>
                </ul>
                <div class="otherInfo">
                  <?php if (is_user_logged_in()) { ?>
                  <span class="userName">Hi <?php echo $user->display_name;?></span> &nbsp; &nbsp; <span class="devider"></span> <a class="buttonGrey" href="<?php echo wp_logout_url(home_url()); ?>">Logout</a> | <a href="<?php echo esc_url(get_permalink(444)); ?>">Profile</a>
                  <?php }else{ ?>
                  <a href="#" id="login-hover">Log In</a>
                  <?php } ?>
                  <div class="phoneText"> <a href="tel:+1-408-850-0236" class="phone">+1-408-850-0236</a> </div>
                  <div class="cl"></div>
                  <div class="buttonDiv"><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal0" class="first">Hire Techies</a><a href="<?php echo get_permalink(77); ?>" onClick="trackOutboundLink('<?php echo get_permalink(77); ?>'); return false;">Join as a Techie</a></div>
                  <div class="cl"></div>
                </div>
              </div>
              <?php 					

                    $home_logo = get_option( 'findmetechie_home_logo' ); 					

                    if(!empty($home_logo)){						

                        echo sprintf( '<a href="%1$s" class="navbar-brand col-lg-12 col-xs-6 col-sm-12" rel="home" itemprop="url"><img src="%2$s" alt="home" /></a>',							esc_url( home_url( '/' ) ), $home_logo);					}					

                        $phone_number = get_option( 'findmetechie_phone_number' );					

                 ?>
            </div>
            <div class="col-xs-6 visible-xs-block text-uppercase">
              <div class="nav-search1">
                <form action="<?php echo get_the_permalink(38); ?>" method="get">
                  <div class="dropdown">
                    <select name="expertise" class="style-select searchInput">
                      <option value="">Find resources</option>
                      <?php foreach($technologies as $k => $v){ ?>
                      <option value="<?php echo $k; ?>" <?php if($expertise == $k){echo 'selected';} ?>><?php echo $v; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <input value="send" class="submit-button" type="submit">
                </form>
              </div>
              <?php if (is_user_logged_in()) { ?>
              Hi <?php echo $user->display_name;?> &nbsp; &nbsp; <span class="devider"></span> <a class="buttonGrey" href="<?php echo wp_logout_url(home_url()); ?>">Logout</a> <a href="<?php echo esc_url(get_permalink(444)); ?>">Profile</a>
              <?php }else{ ?>
              <a href="#" id="login-hover">Log In</a>
              <?php } ?>
            </div>
            <div class=" col-xs-6 hidden-sm hidden-md hidden-lg"> <a href="tel:<?php echo $phone_number; ?>" class="push-5-r pull-right" id="phoneNo"><?php echo $phone_number; ?></a> </div>
            <?php 
	   $menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
                                           // This returns an array of menu locations ([LOCATION_NAME] = MENU_ID);

$menuID = $menuLocations['primary']; // Get the *primary* menu ID

$primaryNav = wp_get_nav_menu_items($menuID); // Get the array of wp objects, the nav items for our queried location.
//print_r($primaryNav);
	   ?>
            <div id="main-menu-id" class="collapse navbar-collapse">
              <ul id="menu-main-navigation" class="nav navbar-nav">
                <?php foreach ( $primaryNav as $navItem ) {
			  
			  //print_r($navItem->classes);

               //echo '<li><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></li>';
			   if ((in_array("dropdown-toggle", $navItem->classes)) && (in_array("browsehover", $navItem->classes)))
                {
               /*echo '<li class="dropdown-toggle browsehover"><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></li>'; 
     */
				echo '<li class="dropdown-toggle browsehover"><a href="'.$navItem->url.'" title="'.$navItem->title.'" onclick="trackOutboundLink(\''.$navItem->url.'\'); return false;">'.$navItem->title.'</a></li>';	
					}else{
			 echo '<li><a href="'.$navItem->url.'" title="'.$navItem->title.'" onclick="trackOutboundLink(\''.$navItem->url.'\'); return false;">'.$navItem->title.'</a></li>';	
            }				

          } ?>
              </ul>
              <div class="nav-search">
                <?php
				if(!empty($_REQUEST['expertise'])){
				$browseSearchValue = get_field( 'heading', $_REQUEST['expertise'] );
				}else{
				$browseSearchValue = "";
				} 
				 
				 ?>
                <input value="<?php echo $browseSearchValue;  ?>" type="text" id="mybrowseSearchInput" onKeyUp="browseSearchFunction()" name="browse"  class="searchInput" placeholder="Search Profiles" />
                <ul id="browse-menu-technology" style="display:none;">
                  <?php 
			     $our_technology_arg = array('post_type' => 'technology','orderby' => 'post_title', 'order'=>'ASC', 'posts_per_page'=>-1);	
	             $our_technology = new WP_Query( $our_technology_arg );
	             if($our_technology->have_posts()): 
				   while($our_technology->have_posts() ) : $our_technology->the_post();
				   $heading = get_field('heading');
				 ?>
                  <li><a href="<?php echo esc_url(home_url('/')."search-resumes/?expertise=".$post->ID); ?>" class=""><?php echo $heading; ?></a></li>
                  <?php
				    endwhile;  
				 endif;
		         wp_reset_postdata(); 		 
		         ?>
                </ul>
              </div>
            </div>
            <div class=" hidden-xs pull-right">
              <div class="buttonDiv"><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal0" class="first" >Hire Techies</a><a href="<?php echo get_permalink(77); ?>" onClick="trackOutboundLink('<?php echo get_permalink(77); ?>'); return false;">Join as a Techie</a></div>
              <ul class="profile">
                <li class="">
                  <?php if (is_user_logged_in()) { ?>
                  Hi <?php echo $user->display_name;?> &nbsp; &nbsp; <span class="devider"></span> </li>
                <li class="profile"><a href="<?php echo esc_url(get_permalink(444)); ?>">Profile</a></li>
                <li><a class="buttonGrey" href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></li>
                <?php }else{ ?>
                <li><a href="#" id="login-hover-d" <?php if($_GET['login']=='failed'){echo 'class="active"';} ?>>Log In</a> </li>
                <?php } ?>
                <!--<li class="telNumber"><a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></li>-->
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <?php if (!is_user_logged_in()) { ?>
    <!-- Top header End-->
    <div class="login-box" <?php if($_GET['login']=='failed'){echo 'style="display: block;"';} ?>>
      <div class="login-contaner"> <span class="fa fa-close1 fa-close "><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close.png" alt="login-box"></span>
        <div class="col-lg-4 col-md-4 col-sm-4 loginBox">
          <form method="post" action="<?php echo esc_url(home_url('/')); ?>securelogin" id="loginform" name="loginform" class="form-group">
            <h3>Log In</h3>
            <?php if($_GET['login']=='failed'){echo '<p class="status" style="display: block;">Wrong username or password.</p>';} ?>
            <input type="text" size="20" value="" class="form-control" id="user_login" name="log" placeholder="EMAIL*" required/>
            <input type="password" size="20" value="" class="form-control" id="user_pass" name="pwd" placeholder="PASSWORD*" required/>
            <label><a href="<?php echo wp_lostpassword_url(); ?>">Forgot your password?</a></label>
            <br>
            <input type="submit" value="Sign In" class="btn loginBtn btn-defoult" id="wp-submit" name="wp-submit">
            <input type="hidden" value="<?php echo esc_url(get_permalink()); ?>" name="redirect_to" />
          </form>
          <?php do_action( 'wordpress_social_login' ); ?>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 quick-box">
          <div class="col-lg-12 col-md-12 col-sm-12" >
            <h3>New to FindMeTechie?</h3>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 no-padding">
            <div class="techie-login">
              <form class="form-group" method="post" action="<?php echo get_permalink(77); ?>">
                <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/techie-user.png" alt="login-box"></span>
                <h4>Techie</h4>
                <p>Create an account to join our Techie Pool to avail international opportunities. </p>
                <input type="submit" name="login-button" value="Register" class="btn register-btn btn-defoult">
              </form>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 no-padding">
            <div class="customer-login">
              <?php             $location = getLocationInfoByIp();			 			?>
              <form class="form-group" method="post" action="<?php echo get_permalink(286); ?>">
                <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/customer-user.png" alt="login-box"></span>
                <h4>Employer</h4>
                <p>Create an account to access our Techie Pool and avail other services we provide.</p>
                <?php if($location['country'] != 'IN'){ ?>
                <input type="submit" name="login-button" value="Register" class="btn register-btn btn-defoult">
                <?php }else{ ?>
                <button type="button" class="btn register-btn btn-defoult restrict_employer_button" data-toggle="modal" data-target="#useremployer_restrict">Register</button>
                <?php } ?>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <?php if($location['country'] == 'IN'){ ?>
    <div id="useremployer_restrict" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <div class="clearfix"></div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="clearfix"></div>
            <h4 class="modal-title">Sorry!</h4>
          </div>
          <div class="modal-body">
            <p>We are not serving in your country.</p>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php } ?>
  </div>
  <?php 

    if(is_front_page()){

        $sargs = array( 'post_type' => 'slide', 'posts_per_page' => 100, 'order' => 'ASC' );

        $sloop = new WP_Query( $sargs );

        $i = 0;

        $slides = '';

        $slidenav = '';

    

        while ( $sloop->have_posts() ) : $sloop->the_post();

            $feat_image_l = wp_get_attachment_url( get_post_thumbnail_id($sloop->ID) ); 

            $caption_title = get_the_content();
			$bannersubtitle = get_field( 'banner_subtitle', $sloop->ID );
			$bannerlink1 = get_field( 'banner_link_1', $sloop->ID );
			$bannerlink2 = get_field( 'banner_link_2', $sloop->ID );

            $activeclass = ($i)?'':'active';

            $slides .= '<div class="item '.$activeclass.'"><img src="'.$feat_image_l.'" alt="login-box" />';

            if(!empty($caption_title))

                $slides .= '<div class="carousel-caption text-center">

                                <h2 class="">'.$caption_title.'</h2>
								<p class="banner-subtitle">'.$bannersubtitle.'</p>';
				      if((!empty($bannerlink1)) || (!empty($bannerlink1)))
                      {
					    $slides .= '<div class="banner-button">';
						 if(!empty($bannerlink1)){
						 $slides .=  '<span class="banner-link1-1">'.html_entity_decode($bannerlink1).'</span>';
						 }
						  if(!empty($bannerlink2)){
						 $slides .=  '<span class="banner-link-2">'.html_entity_decode($bannerlink2).'</span>';
						  }
                        $slides .= '</div>';					   
						  
					  }						  

                  $slides .= '</div>';

            $slides .= '</div>';

            $slidenav .= '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="'.$activeclass.'"></li>';

            $i++;

        endwhile;
		
		////// get  video data
		
		$video_id = 897;//This is page id or post id
        $video_post = get_post($video_id);
        $video_content = $video_post->post_content;       
		$video_bannerlink1 = get_field( 'banner_link_1', $video_id );
		$video_bannerlink2 = get_field( 'banner_link_2', $video_id );
		$mp4_video_link = get_field( 'mp4_video_link', $video_id );
		$ogv_video_link = get_field( 'ogv_video_link', $video_id );
		$webm_video_link = get_field( 'webm_video_link', $video_id );
		$video_featured_image = wp_get_attachment_url( get_post_thumbnail_id($video_id) );
      
      
    ?>
  <?php if((!empty($slides)) || (!empty($video_id))){ 
          $frontpage_id = get_option( 'page_on_front' ); 
          $banner_video_option = get_field( 'video_banner_check', $frontpage_id,true );
          if ($banner_video_option == 'Yes')
          { ?>
  <div class="header-carousel videoBlock">
    <!-- Start Video -->
    <video class="section-video" poster="<?php echo $video_featured_image ?>" autoplay loop preload="none">
      <!-- MP4 source must come first for iOS -->
      <source type="video/mp4" src="<?php echo $mp4_video_link ?>" />
      <!-- WebM for Firefox 4 and Opera -->
      <source type="video/webm" src="<?php echo $webm_video_link ?>" />
      <!-- OGG for Firefox 3 -->
      <source type="video/ogg" src="<?php echo $ogv_video_link ?>" />
      <!-- Fallback flash player for no-HTML5 browsers with JavaScript turned off -->
      <object type="application/x-shockwave-flash" data="images/video/flashmediaelement.swf">
        <!-- Image fall back for non-HTML5 browser with JavaScript turned off and no Flash player installed -->
        <img src="<?php echo $video_featured_image ?>" alt="No Video Image" title="Video" />
      </object>
    </video>
    <div class="section-overlay"></div>
    <script>$('.section-video').mediaelementplayer({ loop:true });</script>
    <!-- End Video -->
    <div class="container section-video-content">
      <h2><?php echo html_entity_decode($video_content); ?></h2>
      <div class="banner-button">
        <?php  if(!empty($video_bannerlink1)){ ?>
        <span class="banner-link1-1"><?php echo html_entity_decode($video_bannerlink1);  ?></span>
        <?php } ?>
        <?php  if(!empty($video_bannerlink2)){ ?>
        <span class="banner-link-2"><?php echo html_entity_decode($video_bannerlink2);  ?></span>
        <?php } ?>
      </div>
      <div class="subtitles-text"> </div>
    </div>
  </div>
  <?php }
        else
          { ?>
  <div class="header-carousel">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <?php if(!empty($slidenav)){ ?>
      <ol class="carousel-indicators hidden-xs">
        <?php echo $slidenav; ?>
      </ol>
      <?php } ?>
      <!-- <div id="carouselFade carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">-->
      <div id="carouselFade" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox"> <?php echo $slides; ?> </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carouselFade" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carouselFade" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
    </div>
  </div>
  <div class="scroll_down"><a class="page-scroll-1" href="#content-1"><i class="fa fa-angle-down"></i></a></div>
</div>
<?php }
          ?>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
</header>
</div>

<div class="site-inner" id="content-1">
<div id="content" class="site-content">
