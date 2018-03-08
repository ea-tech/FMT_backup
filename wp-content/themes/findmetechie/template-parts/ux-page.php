<?php $user = wp_get_current_user(); ?>
<style>
@import url('https://fonts.googleapis.com/css?family=Lato:300,400,700,900');
@import url(http://weloveiconfonts.com/api/?family=fontawesome);
 @-webkit-keyframes bounce {
 0%, 20%, 50%, 80%, 100% {
-webkit-transform: translateY(0);
}
 40% {
-webkit-transform: translateY(-30px);
}
 60% {
-webkit-transform: translateY(-15px);
}
}
 @-moz-keyframes bounce {
 0%, 20%, 50%, 80%, 100% {
-moz-transform: translateY(0);
}
 40% {
-moz-transform: translateY(-30px);
}
 60% {
-moz-transform: translateY(-15px);
}
}
 @-o-keyframes bounce {
 0%, 20%, 50%, 80%, 100% {
-o-transform: translateY(0);
}
 40% {
-o-transform: translateY(-30px);
}
 60% {
-o-transform: translateY(-15px);
}
}
@keyframes bounce {
 0%, 20%, 50%, 80%, 100% {
transform: translateY(0);
}
 40% {
transform: translateY(-30px);
}
 60% {
transform: translateY(-15px);
}
}

/*------------------------ux-page--------------------------*/
.banner-ux {
	background: url(<?php echo get_stylesheet_directory_uri();?>/images/ux-banner.jpg) no-repeat center;
	background-size: cover;
	font-family: 'Lato', sans-serif;
	margin-top: 55px;
}
.ux_heading {
	padding: 98px 0px 0 125px;
	
}
.ux_heading h1 {
	color: #81c1ec;
	font-size: 40px;
	line-height: 1.4em;
	margin-top: 0px;
	font-weight: bold;
}
.ux_heading h1 span {
	display: block;
	color: #fff;
}
.ux_heading p{color:#fff; font-size:17px;}
.ux_heading a {
	display: inline-block;
	color: #fff;
	border: 1px solid #fff;
	font-size: 18px;
	padding: 7px 45px;
	border-radius: 3px;
	margin: 15px 0 20px 0;
	font-weight: 400;
}
.ux_heading a:hover {
	color: #fff;
	border: 1px solid #81c1ec;
	background: #81c1ec;
	text-decoration: none;
}
.quick_form {
	padding: 30px 0 15px 100px;
	background: url(<?php echo get_stylesheet_directory_uri();?>/images/ux-shadow.png) no-repeat center left;
	background-position: 80px;
}
.visual_design{
padding: 60px 0 40px;
}

.quick_form h2 {
	font-size: 20px;
	line-height: 1.4em;
	margin-top: 0px;
	font-weight: 600;
	color: #fff;
}
.quick_form .form-group {
	margin-bottom: 8px;
	text-align: center;
}
.quick_form .form-control {
	border: 1px solid #fff;
	font-size: 14px;
	background: transparent;
	color: #fff;
	border-radius: 0;
	height: 34px;
}
.quick_form .form-control::-webkit-input-placeholder { /* Chrome/Opera/Safari */
 color: #fff;
}
.quick_form .form-control::-moz-placeholder { /* Firefox 19+ */
 color: #fff;
}
.quick_form .form-control:-ms-input-placeholder { /* IE 10+ */
 color: #fff;
}
.quick_form .form-control:-moz-placeholder { /* Firefox 18- */
 color: #fff;
}
placeholder { /* Firefox 18- */
	color: #fff;
}
.quick_form textarea.form-control {
	height: auto;
}
.quick_form .google-verify {
	text-align: center;
}
.quick_form .google-verify img {
	max-width: 180px;
	margin: 0 auto;
}
.content_text {
	position: relative;
	color: #636363;
	font-family: 'Lato', sans-serif;
	margin-bottom: 40px;
}
.content_text h3 {
	font-size: 22px;
	margin: 0;
	line-height: 1.4em;
	font-weight:600;
}
.content_text p {
	font-size: 14px;
	margin: 0;
	line-height: 1.4em;
}
.quick_form .btn-get-quate-ror {
	display: inline-block;
	color: #fff;
	background: #5bace1;
	border: 1px solid #5bace1;
	font-size: 13px;
	padding: 10px 20px;
	border-radius: 3px;
	margin: 8px auto;
	font-weight: 400;
}
.quick_form .btn-get-quate-ror:hover {
	display: inline-block;
	color: #fff;
	border: 1px solid #fff;
	background: transparent;
}

.hire_perfect_ux {
	font-family: 'Lato', sans-serif;
	background-color: #f2f2f2;
	float: left;
	width: 100%;
	background-image: url("<?php echo get_stylesheet_directory_uri();?>/images/ux-tech-banner.jpg");
	background-position: right center;
	background-repeat: no-repeat;
	background-size: 47%;
	min-height: 340px;
}
@media(min-width: 1370px){
.hire_perfect_ux {
min-height: 340px;
background-size: contain;
}
}
.hire_perfect_ux .do_more {
	width: 50%;
	vertical-align: middle;
	position: relative;
	z-index: 99;
	justify-content: center;
	align-items: center;
	float: left;
	padding-right: 15px;
}
.hire_perfect_ux .bg_red img{
	object-fit: cover;
    height: 353px;
}
.hire_perfect_ux .bg_red p {
	color: #fff;
	font-size: 65px;
	line-height: 1em;
}
.hire_perfect_ux .domore_content {
	padding: 40px 0;
}
.hire_perfect_ux .domore_content h2 {
	color: #0f4d76;
	font-weight: 400;
	margin-bottom: 20px;
	font-size: 30px;
	margin-top: 0;
}
.hire_perfect_ux .domore_content h3 {
	color: #636363;
	font-weight: 400;
	margin-bottom:20px;
	font-size: 16px;
	margin-top: 0;
	padding-left: 40px;
	background: url(<?php echo get_stylesheet_directory_uri();?>/images/check_ux.png) no-repeat;
}
.hire_perfect_ux .domore_content p {
	color: #636363;
	padding-left: 40px;
	margin-bottom: 20px;
	font-size: 16px;
}
.ux-image {
	text-align: center;
	padding: 20px 0;
}
.ux-image img {
	max-width: 300px;
}
.ux_tips {
	background: url(<?php echo get_stylesheet_directory_uri();?>/images/ux-tips-bg.jpg) no-repeat center;
	padding: 40px 0;
	background-size: cover;
}
.ux_tips h3 {
	color: #0f4d76;
	font-size: 28px;
	margin: 0;
	font-weight: 600;
}
.ux_tips ul {
	margin: 20px 0 0;
	padding: 0;
	columns: 2;
	-webkit-columns: 2;
	-moz-columns: 2;
}
.ux_tips ul li {
	list-style:  none;
	font-size: 14px;
	color: #666666;
	background: url(<?php echo get_stylesheet_directory_uri();?>/images/tick-ux.png) no-repeat left top;
	padding-left: 25px;
	margin-bottom: 10px;
}
.get_touch {
	padding: 40px 0;
}
.get_touch h2, .hire-drupal h2 {
	color: #0f4d76;
	padding: 0;
	margin: 0 0 20px 0;
	font-size: 28px;
	font-weight: 600;
}
.get_touch p {
	font-size: 14px;
	color: #585858;
	line-height: 1.7em;
}
.get_touch p a {
	color: #000000;
	text-decoration: underline;
}
.width_get_touch {
	width: 20%;
	float: left;
	padding: 0 10px;
	margin-bottom: 20px;
}
.inner_width_shadow {
	box-shadow: 0px 0 8px rgba(4, 4, 4, .1);
	width: 100%;
	float: left;
	padding: 10px;
	min-height: 333px;
}
.get_touch_icon {
	display: block;
	background: url(<?php echo get_stylesheet_directory_uri();?>/images/icon-ux-info.png);
	background-repeat: no-repeat;
	height: 78px;
	width: 78px;
	margin: 8px auto;
}
.get_touch .row-custom {
	margin-right: -10px;
	margin-left: -10px;
}
.get_touch_icon.first_icon {
	background-position: top left;
}
.get_touch_icon.second_icon {
	background-position: top 0 left -100px;
	width: 92px;
}
.get_touch_icon.third_icon {
	background-position: top 0 left -208px;
}
.get_touch_icon.fourth_icon {
	background-position: top 0 left -314px;
	width: 89px;
}
.get_touch_icon.fifth_icon {
	background-position: top 0 left -426px;
}
.bg_black {
	color: #080807;
	background: #0f4d76;
	background: linear-gradient(to right, #72d9e9, #f2fafd);
	background-image: url(<?php echo get_stylesheet_directory_uri();?>/images/form_bg.jpg);
	background-position: center;
	background-attachment: fixed;
	background-size: cover;
	padding: 50px 0;
	position: relative;
	font-family: 'Lato', sans-serif;
	text-align: center;
}
.bg_red_1 {
	color: #080807;
	background: #0f4d76;
	padding: 40px 0;
	position: relative;
	font-family: 'Lato', sans-serif;
}
.bg_red_1 h2 {
	color: #fff;
	font-weight: 700;
	margin-bottom: 20px;
	font-size: 30px;
	margin-top: 0;
}
.z-index {
	position: relative;
	z-index: 9;
}
.layer {
	background-color: rgba(0, 0, 0, 0.6);
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
.hire_perfect_ux .domore_content h2{
	font-size: 25px;
}
.bg_black h2 {
	color: #fff;
	font-weight: 700;
	margin-bottom: 20px;
	font-size: 30px;
	margin-top: 0;
}
.bg_black p {
	color: #fff !important;
	font-size: 18px;
}
.bg_black form {
	margin-top: 50px;
}
.width_3 {
	width: 22%;
	padding-right: 10px;
	float: left;
	box-sizing: border-box;
}
.width_2 {
	width: 12%;
	padding-right: 10px;
	float: left;
	box-sizing: border-box;
}
.send_requirement {
	border-radius: 0;
	border: 1px solid #fff;
 -webkit-transition: all .5s ease-in;
 transition: all .5s ease-in;
	box-shadow: none;
	font-size: 18px;
	color: #000;
}
.send_requirement:focus {
	box-shadow: none;
}
.btn-send-ror, .build-your-team {
	background-color: #0f4d76;
    box-shadow: none;
    border-radius: 0;
    padding: 8px 30px;
    font-size: 18px;
    color: #fff;
    height: 43px;
    border: 1px solid #0f4d76;
}
.techie_butns .build-your-team {
    font-size: 16px;
    padding: 10px 0;
}
.featured_techei .featured_techei_img {
	overflow: hidden;
	height: 178px;
	border-radius: 50%;
	width: 178px;
	margin: 10px auto;
}
@media(min-width: 767px) {
 .show_case-right {
 border: 1px solid #a8a8a8;
 border-right: none;
 position: absolute;
 height: 77%;
 top: 15%;
 left: 0;
 width: 18px;
}
 .show_case-left {
 border: 1px solid #a8a8a8;
 border-left: none;
 position: absolute;
 height: 77%;
 top: 15%;
 right: 0;
 width: 18px;
}
 .content_lft {
 text-align: right;
}
 .content_rigt {
 text-align: left;
}
 .content_lft .content_text {
 padding-right: 40px;
}
 .content_rigt .content_text {
 padding-left: 40px;
}
}
 @media(max-width: 1199px) {
.quick_form {
 padding: 30px 20px;
 background-position: 0;
}
 .ux_heading {
 padding: 96px 32px;
}
 .width_get_touch {
 width: 33%;
}
.hire_perfect_ux .domore_content h3 {
 font-size: 20px;
}
.hire_perfect_ux .domore_content p {
 font-size: 14px;
}
.hire_perfect_ux{
background-position: right center;
}
}
 @media (max-width: 991px) {
 	.banner-ux{
	background-position: right;
 }
 }
 @media (max-width: 767px) {
 .ux_heading {
 padding: 30px;
}
 .banner-ux {
 background-position: right;
}
 .width_get_touch {
 width: 100%;
}
 .inner_width_shadow {
 min-height: auto;
}
 .ux_tips ul {
 columns: 1;
 -webkit-columns: 1;
 -moz-columns: 1;
}
.width_3 {
 width:100%;
}
 .width_2 {
 width: 50%;
}
 .btn-send-ror {
 padding: 5px 29px;
 font-size: 14px;
}
 .width_3 .form-control {
 height: 38px;
 font-size: 14px;
}
.hire_perfect_ux .do_more {
 width: 100%;
}
.hire_perfect_ux .bg_red img {
    object-fit: contain;
    height: auto;
}
.hire_perfect_ux {
    background-position: top center;
    background-size: auto 220px;
	padding-top: 220px;
}
.btn-send-ror{
float:left;
}
}

</style>
<section>
    <div class="banner-ux">
      <div class="container">
        <div class="row">
          
          <div class="col-md-offset-4  col-md-4 col-sm-7 col-xs-12">
            <div class="ux_heading">
              <h1>UX/UI <span>DEVELOPMENT</span></h1>
              <p>We deliver experiences that enhance your digital presence</p>
              <a style="cursor: pointer;" data-toggle="modal" data-target="#myModal0" class="hire_ux">Hire UX</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-5 col-xs-12">
            <div class="quick_form">
              <?php echo do_shortcode('[contact-form-7 id="3191" title="ror-headerform"]');?>
          </div>
          </div>

        </div>
      </div>
    </div>
</section>
<div class="clearfix"></div>
<section class="wow fadeInDown visual_design" data-wow-duration="1000ms" data-wow-delay="200ms" >
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12 hidden-md hidden-sm hidden-lg ">
        <div class="ux-image">
          <img src="<?php echo get_stylesheet_directory_uri();?>/images/ux_circle.jpg" alt="ux">
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12 content_lft">
        <div class="content_text">
          <h3>Visual design</h3>
          <p>We craft intuitive design and build brand assets and make sure they are consistent with web and mobile app by creating thoughtful wireframes. We create beautiful interfaces for all devices and screens.
</p>
          <div class="show_case-left"></div>
        </div>
        <div class="content_text">
          <h3>Interaction design</h3>
          <p>Interaction design manifests in controls, components and, feedback and defines the usability and relevance of an interface. We enable the users to conveniently flow through series of interactions to achieve their objective.</p>
          <div class="show_case-left"></div>
        </div>
        <div class="content_text">
          <h3>Front-end development</h3>
          <p>A unique blend of design & smart coding merged together to form integrated digital applications which are creative, well executed & efficiently implemented.</p>
          <div class="show_case-left"></div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs">
       <div class="ux-image">
          <img src="<?php echo get_stylesheet_directory_uri();?>/images/ux_circle.jpg" alt="ux">
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12 content_rigt">
        <div class="content_text">
          <h3>Information architecture</h3>
          <p>Information Architecture addresses the placeholders for various pieces of information or modules. The IA is architected to let the users understand their surroundings and find what they are looking in for in the online world. </p>
          <div class="show_case-right"></div>
        </div>
        <div class="content_text">
          <h3>Content strategy</h3>
          <p>Proper planning, development, and management of content are carried out.We focus on actual creation, curation, and editing of content that's specifically created for the purposes of marketing as well. </p>
          <div class="show_case-right"></div>
        </div>
        <div class="content_text">
          <h3>User research & usability</h3>
          <p>We kick start the UX process by observing and analyzing user behavior to understand user goals & emotions and translate them into value-added Usability solutions </p>
          <div class="show_case-right"></div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<section class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="200ms" >
  <div class="ux_tips">
    <div class="container">
      <div class="row">
        <div class="col-sm-offset-5 col-md-offset-5 col-md-7 col-sm-7 col-xs-12">
          <h3>Our Services</h3>
          <ul>
            <li>UX/UI Design Consultancy</li>
            <li>UX/UI Research and Design</li>
            <li>Brand Identity Design</li>
            <li>Web Application design and development</li>
            <li>Enterprise Application Development</li>
            <li>Game Development</li>
            <li>Mobile App development</li>
            <li>Web Sites design and development</li>
            <li>Wire Frames & Prototype</li>
            <li>User Interface Development</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
     $related_services = get_field('relative_technology');
    if(!empty($related_services)){     
    ?>
    <div class="featured_technology">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-lg-3 col-sm-12 col-xs-12">
              <h3 class="techie-list remove-margin">Related Services</h3>
            </div>
          </div>
          <div class="resume-container">
            <div class="row">
              <?php
			  $i=1; 
			   foreach ($related_services as $service) {
			     $service_thumbnail_id = get_post_thumbnail_id($service->ID);
				 if($i> 6)
				 {
				 break;
				 }	
			  ?>
              <div class="col-md-2 col-sm-3 col-xs-6 resume-box">
                  <div class="profileImage">
                  <a href="<?php echo get_permalink( $service->ID ); ?>">
                  <img src="<?php echo $feat_image = wp_get_attachment_url($service_thumbnail_id); ?>">
                  <p class="title_service"> <?php echo get_the_title( $service->ID ); ?> </p>
                  </a> </div>
              </div>
              <?php 
			  $i++;			  
			  } ?>
              
            </div>
          </div>
        </div>
	<?php } ?>
	
	</div>

<div class="clearfix"></div>
<section class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="200ms">
  <div class="search-resumeRow1">
    <div class="container">
      <div class="row">
       <div class="col-md-12">
       <div class="hire-drupal">
        <h2>Hire the best UI/UX freelancers</h2>
		<h4>Go digital and connect with the ultra-smart millennials</h4>
        </div>
      </div>
      </div>
    </div>
    <div class="featured_techei single-tech">
      <div class="container text-center">
        <div class="text-info">
          <div id="techie_container">
            <div class="serchtechie_width techie_width">
              <div class="tech-all-details"> <a type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm">
                <div class="featured_techei_img"> <img src="https://www.findmetechie.com/wp-content/uploads/thumbs/448/1494315333.jpg"> </div>
                <div class="featured_techei_title">
                  <p class="featured-title">FrontEnd Developer</p>
                  <span class="featured_techei_id"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/flag/il.png" alt="" title="India"> FMT ID: 448 </span> <span class="featured_techei_exp"> 10+ Years </span> </div>
                <div class="featured_techei_added"> <span class="featured_techei_added_tech">FrontEnd</span> </div>
                </a>
                <div class="techie_join_section">
                  <div class="techie_butns"> <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/448";?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?> class="build-your-team">View my profile</a> <a onclick="hire_me(448)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a> </div>
                </div>
              </div>
            </div>
            <div class="serchtechie_width techie_width">
              <div class="tech-all-details"> <a type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm">
                <div class="featured_techei_img"> <img src="https://www.findmetechie.com/wp-content/uploads/thumbs/755/profic.jpg"> </div>
                <div class="featured_techei_title">
                  <p class="featured-title">Full Stack Developer</p>
                  <span class="featured_techei_id"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/flag/ph.png" alt="" title="Pakistan"> FMT ID: 755 </span> <span class="featured_techei_exp"> 7 Years </span> </div>
                <div class="featured_techei_added"> <span class="featured_techei_added_tech">FrontEnd</span> </div>
                </a>
                <div class="techie_join_section">
                  <div class="techie_butns"> <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/755";?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?> class="build-your-team">View my profile</a> <a onclick="hire_me(755)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a> </div>
                </div>
              </div>
            </div>
            <div class="serchtechie_width techie_width">
              <div class="tech-all-details"> <a type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm">
                <div class="featured_techei_img"> <img src="https://www.findmetechie.com/wp-content/uploads/thumbs/738/IMG_20170714_120605.jpg" alt="techie"> </div>
                <div class="featured_techei_title">
                  <p class="featured-title">HTML Developer</p>
                  <span class="featured_techei_id"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/flag/in.png" alt="" title="India"> FMT ID: 738 </span> <span class="featured_techei_exp"> 3 Years </span> </div>
                <div class="featured_techei_added"> <span class="featured_techei_added_tech">FrontEnd</span> </div>
                </a>
                <div class="techie_join_section">
                  <div class="techie_butns"> <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/738";?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?> class="build-your-team">View my profile</a> <a onclick="hire_me(738)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a> </div>
                </div>
              </div>
            </div>
            <div class="serchtechie_width techie_width">
              <div class="tech-all-details"> <a type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm">
                <div class="featured_techei_img"> <img src="https://www.findmetechie.com/wp-content/uploads/thumbs/283/1410798518.jpg" alt="techie"> </div>
                <div class="featured_techei_title">
                  <p class="featured-title">UI Website Design</p>
                  <span class="featured_techei_id"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/flag/id.png" alt="" title="India"> FMT ID: 283 </span> <span class="featured_techei_exp"> 5 Years </span> </div>
                <div class="featured_techei_added"> <span class="featured_techei_added_tech">FrontEnd</span> </div>
                </a>
                <div class="techie_join_section">
                  <div class="techie_butns"> <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/283";?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?> class="build-your-team">View my profile</a> <a onclick="hire_me(283)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a> </div>
                </div>
              </div>
            </div>
            <div class="serchtechie_width techie_width">
              <div class="tech-all-details"> <a type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm">
                <div class="featured_techei_img"> <img src="https://www.findmetechie.com/wp-content/uploads/thumbs/110/1342504707.jpg"> </div>
                <div class="featured_techei_title">
                  <p class="featured-title">User Experience Design Lead</p>
                  <span class="featured_techei_id"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/flag/in.png" alt="" title="India"> FMT ID: 110  </span> <span class="featured_techei_exp"> 10 Years </span> </div>
                <div class="featured_techei_added"> <span class="featured_techei_added_tech">FrontEnd</span> </div>
                </a>
                <div class="techie_join_section">
                  <div class="techie_butns"> <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/110";?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?> class="build-your-team">View my profile</a> <a onclick="hire_me(110)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="cl"></div>
         <?php             $location = getLocationInfoByIp();			 			?>
          <div class="mgt-30"> <a href="javascript:void(0);" class="build-your-team restrict_employer_button" data-toggle="modal" data-target="#myModal0">Hire a Techie</a> <?php if($location['country'] != 'IN'){ ?><a href="https://www.findmetechie.com/build-developement-team/" class="build-your-team">Build your team</a><?php }else{ ?><button type="button" class="build-your-team" data-toggle="modal" data-target="#useremployer_restrict">Build your team</button><?php } ?></div>
          <div class="cl"></div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<section class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="200ms">
  <div class="get_touch">
   
    <div class="container"> 
      <h2>Why UI/UX development from FindMeTechie?</h2>
      <div class="row-custom">
        <div class="width_get_touch">
          <div class="inner_width_shadow">
            <span class="get_touch_icon first_icon"></span>
            <p>Our expertise is in seamless delivery using AGILE project methodology. You may <a style="cursor: pointer;" data-toggle="modal" data-target="#myModal0">Hire Techies</a> or opt to <a href="http://www.findmetechie.com/build-developement-team/">build your team.</a></p>
          </div>
        </div>
        <div class="width_get_touch">
          <div class="inner_width_shadow">
            <span class="get_touch_icon second_icon"></span>
            <p>Our Project management team will attend to your requirements and try replying back within 12 hours.</p>
          </div>
        </div>
        <div class="width_get_touch">
          <div class="inner_width_shadow">
            <span class="get_touch_icon third_icon"></span>
            <p>You can always <a href="http://www.findmetechie.com/contact-us/"> contact us</a> or ask for a <a href="http://www.findmetechie.com/request-a-quote/">quote</a> in case you have firmed up requirements. We also encourage you to <a href="http://www.findmetechie.com/sign-up-employer/">register yourself in case you are an employer</a> and if you are a techie and willing to work with us then feel free to <a href="http://www.findmetechie.com/sign-up-techie">share your profile</a> with us.</a></p>
          </div>
        </div>
        <div class="width_get_touch">
          <div class="inner_width_shadow">
            <span class="get_touch_icon fourth_icon"></span>
            <p>We encourage specialize skills to be associated with us. We are proud to serve our customers in 10 different countries around the world.</p>
          </div>
        </div>
        <div class="width_get_touch">
          <div class="inner_width_shadow">
            <span class="get_touch_icon fifth_icon"></span>
            <p>For general FAQ’s please <a href="http://www.findmetechie.com/faq/">click here</a>. In case your question is not being addressed in FAQ then please drop a line at <a href="mailto:support@findmetechie.com">support@findmetechie.com</a></a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
     $related_services = get_field('relative_technology');
    if(!empty($related_services)){     
    ?>
    <div class="featured_technology">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-lg-3 col-sm-12 col-xs-12">
              <h3 class="techie-list remove-margin">Related Services</h3>
            </div>
          </div>
          <div class="resume-container">
            <div class="row">
              <?php
			  $i=1; 
			   foreach ($related_services as $service) {
			     $service_thumbnail_id = get_post_thumbnail_id($service->ID);
				 if($i> 6)
				 {
				 break;
				 }	
			  ?>
              <div class="col-md-2 col-sm-3 col-xs-6 resume-box">
                  <div class="profileImage">
                  <a href="<?php echo get_permalink( $service->ID ); ?>">
                  <img src="<?php echo $feat_image = wp_get_attachment_url($service_thumbnail_id); ?>">
                  <p class="title_service"> <?php echo get_the_title( $service->ID ); ?> </p>
                  </a> </div>
              </div>
              <?php 
			  $i++;			  
			  } ?>
              
            </div>
          </div>
        </div>
	<?php } ?>
	
	</div>
<div class="clearfix"></div>
<section  class="wow fadeInDown " data-wow-duration="1000ms" data-wow-delay="200ms">
  <div class="hire_perfect_ux">
  <div class="container">
    <div class="do_more">
      <div class="domore_content">
        <h2>Hire the perfect expertise</h2>
        <h3>We partnered with digital agencies to captivate Web UI/UX and mobile App design that enhance user engagement for their products</h3>        
        <h3>An excellent user experience means your digital product is easy and intuitive. When your customers use your product, we want them to have the best experience possible so that they continue using it.</h3>        
        <h3>We place the user at the heart of every design decision, every little detail aimed at providing a delightful experience.</h3>
      </div>
    </div>
    <div class="do_more bg_red">
     
    </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<section class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="200ms" >
  <div class="bg_black">
    <div class="layer"></div>
    <div class="container"> 
      <div class="z-index">
        <h2>Still not convinced ?</h2>
        <p>Reach out to us !</p>
        <?php echo do_shortcode('[contact-form-7 id="3238" title="ror footer form"]');?>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<section>
<div class="homeRow3">
  <div class="container">
    <div class="text-center">
      <h3 class="testimonial title_heading">Testimonials</h3>
    </div>
    <?php
			$ctestimonials = get_posts(array(
				  'post_type' => 'testimonial',
				  'numberposts' => -1,
				  'tax_query' => array(
					array(
					  'taxonomy' => 'tcategory',
					  'field' => 'id',
					  'terms' => 3,
					  'include_children' => false
					)
				  )
				));
				if(!empty($ctestimonials)){ $i=1;
				?>
    <div class="col-md-6 col-lg-6 col-sm-6">
      <div class="subtitles-text text-center">
        <h3 class="text-center ">Employers</h3>
      </div>
      <div id="myCarousel2" class="carousel slide" data-ride="carousel">
        <div style="min-height:200px;"> <img src="<?php echo get_stylesheet_directory_uri()?>/images/invertStart.png" alt="" />
          <div class="carousel-inner" role="listbox">
            <?php foreach($ctestimonials as $ctestimonial){ ?>
            <div class="item <?php if($i == 1){ echo 'active';}?>">
              <p><?php echo $ctestimonial->post_content; ?></p>
              <span class="homeRow3-span">
              <bdo>-<?php echo get_field('designation', $ctestimonial); ?>, </bdo>
              <?php echo $ctestimonial->post_title; ?> </span><br/>
            </div>
            <?php $i++; } ?>
          </div>
          <!--<img src="<?php // echo get_stylesheet_directory_uri()?>/images/invertEnd.png" id="invertedComma" alt="" /><br/>-->
        </div>
        <div class="text-center homeRow3-glyphicon"> <a data-slide="prev" role="button" href="#myCarousel2"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a> <a data-slide="next" role="button" href="#myCarousel2"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a> </div>
      </div>
    </div>
    <?php } ?>
    <?php
				$ttestimonials = get_posts(array(
					'post_type' => 'testimonial',
					'numberposts' => -1,
					'tax_query' => array(
					array(
							'taxonomy' => 'tcategory',
							'field' => 'id',
							'terms' => 4,
							'include_children' => false
						)
					)
					));
				if(!empty($ttestimonials)){ $i=1;
				?>
    <div class="col-md-6 col-lg-6 col-sm-6 border-top">
      <div class="subtitles-text text-center">
        <h3 class="text-center"> Techies</h3>
      </div>
      <div id="myCarousel3" class="carousel slide" data-ride="carousel">
        <div style="min-height:200px;"> <img src="<?php echo get_stylesheet_directory_uri()?>/images/invertStart.png" alt="" />
          <div class="carousel-inner" role="listbox">
            <?php foreach($ttestimonials as $ttestimonial){ ?>
            <div class="item <?php if($i == 1){ echo 'active';}?>">
              <p class="homeRow3-text"><?php echo $ttestimonial->post_content; ?></p>
              <span class="homeRow3-span">
              <bdo><?php echo $ttestimonial->post_title; ?></bdo>
              <?php echo get_field('designation', $ttestimonial); ?></span><br/>
            </div>
            <?php $i++; } ?>
          </div>
          <!--<img src="<?php //echo get_stylesheet_directory_uri()?>/images/invertEnd.png" id="invertedComma" alt="" /><br/>-->
        </div>
        <div class="text-center"> <a href="#myCarousel3" role="button" data-slide="prev"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a> <a href="#myCarousel3" role="button" data-slide="next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a> </div>
      </div>
    </div>
    <?php } ?>
  </div>
  <div class="clearfix"></div>
</div>

</section>
<div class="clearfix"></div>

<!-- Model Express Interest Start  -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog1 ">
    <!-- Modal content-->
    <div class="modal-content modal-content1">
      <div class="modal-header1">
        <button type="button" class="close close2" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div id="hire_me_loader" style="display:none;"><img src="<?php echo get_stylesheet_directory_uri()?>/images/loading.gif" alt="" ></div>
        <div id="thank-you-msg-employer" class="thank-you"> <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thanks-tick.png"/></span>
          <h4>Thank You</h4>
          <p>Thank you for expressing interest in the techie with <strong>FMT ID
            <bdo><span id="techie_msg"></span> </bdo>
            </strong></p>
          <p>We shall contact you shortly</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-dialog2 modal-sm" role="document">
    <div class="modal-content modal-content2">
      <div class="modal-header modal-header1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body login-modal-body">
        <div class="page-login-main">
          <p>Only registered clients are given access to detailed CVs. </p>
          <h3 class="font-size-24">Log In</h3>
          <form method="post" action="<?php echo esc_url(home_url('/')); ?>wp-login.php">
            <div class="form-group">
              <label class="sr-only" for="inputEmail">Email</label>
              <input type="email" value="" class="form-control" id="user_login" name="log" placeholder="EMAIL*" required />
            </div>
            <div class="form-group">
              <label class="sr-only" for="inputPassword">Password</label>
              <input type="password" value="" class="form-control" id="user_pass" name="pwd" placeholder="PASSWORD*" required />
            </div>
            <div class="form-group clearfix"> <a class="pull-left" href="<?php echo wp_lostpassword_url(); ?>">FORGOT YOUR PASSWORD?</a> </div>
            <button type="submit" class="btn btn-success btn-green btn-block">SIGN IN</button>
            <div class="borderTop"></div>
            <p class="textSmall">Don't have account, Please consider registering for FindMeTechie</p>
            <input type="hidden" value="<?php echo esc_url(get_permalink()); ?>" name="redirect_to" />
          </form>
          <button type="submit" class="btn btn-warning orange-btn btn-block" onClick="window.location='<?php echo get_permalink(286); ?>';">REGISTER</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-sm-techie teches-pop" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-dialog2 modal-sm" role="document">
    <div class="modal-content modal-content2">
      <div class="modal-header modal-header1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body login-modal-body">
        <div class="page-login-main">
          <p>Only registered Employer are given access to detailed CVs. </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="useremployer_restrict" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
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
<button style="display:none" id="very_unique" type="hidden" data-toggle="modal" data-target="#useremployer_restrict"></button>
<script type="text/javascript">
var country = '';
jQuery(document).ready(function(){
	jQuery.getJSON("https://freegeoip.net/json/", function (data) {
		country = data.country_name;
		console.log(country);
		
	});
jQuery("#formGroupExampleSubmit").click(function(e) { 
			if(country == 'India'){
				jQuery("#very_unique").click();
				return false;
			}
		});
jQuery("#formGroupExampleSubmitFoot").click(function(e) { 
			if(country == 'India'){
				jQuery("#very_unique").trigger("click");
				return false;
			}
		});		
	});





	
function hire_me(techieid)
{
//alert(techieid);
    jQuery('#thank-you-msg-employer').hide();
	jQuery('#hire_me_loader').show();
    jQuery("#techie_msg").html(techieid);
	var employer_email = '<?php echo $current_user->user_email; ?>' 
	var employer_id = '<?php echo $current_user->ID; ?>' 
    var techie_id = techieid; 	
	var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
	
			jQuery.ajax({
				type: "POST",
				url : ajaxurl,
				data : { 
					action :'hire_me',
					employer_id: employer_id,
					employer_email: employer_email,
                    techie_id: techie_id, 					
				},
				success:function(data){
					//alert(data);
					//console.log(data);
					
					jQuery('#hire_me_loader').hide();
					jQuery('#thank-you-msg-employer').show();
					//window.setTimeout(function(){
					//var curPageURL = window.location.href;
                    //document.location.href = curPageURL;
					//}, 3000);
				}
			});
			
		
	
	
}
		// wow effect
		  new WOW().init();	

	
	</script>
