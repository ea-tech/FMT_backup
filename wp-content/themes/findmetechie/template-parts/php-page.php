<?php $user = wp_get_current_user(); ?>
<style>

@import url('https://fonts.googleapis.com/css?family=Lato:300,400,700,900');
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
.header-img{
position:absolute;
top: 0;
}
.banner-drupal {
	background: url(<?php echo get_stylesheet_directory_uri();?>/images/drupal-banner.jpg) no-repeat center;
	background-size: cover;
	font-family: 'Lato', sans-serif;
	margin-top: 55px;
}
.banner-drupal.php{
background: url(<?php echo get_stylesheet_directory_uri();?>/images/php-banner-main.jpg) no-repeat left;
background-size: cover;
}
.drupal {
	padding: 65px 0px 0 0px;
}
.drupal h1 {
	color: #136592;
    font-size: 45px;
    margin-top: 0px;
    font-weight: bold;
    line-height: 1em;
}
.drupal h1 span{
	display: block;
    font-size: 23px;
}

.drupal h2{
	color: #595959;
	font-size: 17px;
	margin-top: 0;
}
.drupal h2 span{
color: #000000;
}
.drupal a {
	display: inline-block;
	color: #fff;
	font-size: 18px;
	padding: 7px 63px;
	border-radius: 3px;
	margin: 35px 0 20px 0;
	font-weight: 400;
    background: #096bac;
    -webkit-background: linear-gradient(to right, #096bac , #0f4d76);
    -moz-background: linear-gradient(to right, #096bac , #0f4d76);
    -o-background: linear-gradient(to right, #096bac , #0f4d76);
    -ms-background: linear-gradient(to right, #096bac , #0f4d76);
    background: linear-gradient(to right, #096bac , #0f4d76);
}
.drupal a:hover, .drupal a:focus {
	color: #fff;
	text-decoration: none;
    background: #0f4d76;
    -webkit-background: linear-gradient(to right, #0f4d76 , #096bac);
    -moz-background: linear-gradient(to right, #0f4d76 , #096bac);
    -o-background: linear-gradient(to right, #0f4d76 , #096bac);
    -ms-background: linear-gradient(to right, #0f4d76 , #096bac);
    background: linear-gradient(to right, #0f4d76 , #096bac);
}

.quick_form {
	width: 270px;
    float: right;
	background-color: #fff;
	padding: 5px 15px;
	margin: 20px 0;
	box-shadow: 0 0 4px rgba(0,0,0,.3)
}
.php .quick_form{
	background-color: rgba( 255,255,255,.85);
}
.visual_design{
	padding: 60px 0 40px;
}

.quick_form h2 {
	font-size: 20px;
	line-height: 1.4em;
	margin-top: 0px;
	font-weight: 600;
	color: #0f4d76;
	margin-bottom: 5px;
}
.quick_form .form-group {
	margin-bottom: 8px;
	text-align: center;
}
.quick_form .form-control {
	border: 1px solid #b0b0b0;
	font-size: 14px;
	background: transparent;
	color: #909090;
	border-radius: 0;
	height: 33px;
}
.quick_form .form-control::-webkit-input-placeholder { /* Chrome/Opera/Safari */
 color: #909090;
}
.quick_form .form-control::-moz-placeholder { /* Firefox 19+ */
 color: #909090;
}
.quick_form .form-control:-ms-input-placeholder { /* IE 10+ */
 color: #909090;
}
.quick_form .form-control:-moz-placeholder { /* Firefox 18- */
 color: #909090;
}
placeholder { /* Firefox 18- */
	color: #fff;
}
.quick_form textarea.form-control {
	height: 60px;
}
.quick_form .google-verify {
	text-align: center;
}
.quick_form .google-verify img {
	max-width: 180px;
	margin: 0 auto;
}


.quick_form .btn-get-quate-ror {
	display: inline-block;
	color: #fff;
	background: #5bace1;
	border: 1px solid #5bace1;
	font-size: 13px;
	padding: 10px 20px;
	border-radius: 3px;
	margin: 0px auto;
	font-weight: 400;
}
.quick_form .btn-get-quate-ror:hover {
	display: inline-block;
	color: #fff;
	border: 1px solid #fff;
	background: #096bac;
}
.hire_perfect_ux {
	font-family: 'Lato', sans-serif;
	background-color: #f2f2f2;
	float: left;
	width: 100%;
	background-image: url("<?php echo get_stylesheet_directory_uri();?>/images/ux-tech-banner.jpg");
	background-position: right top;
	background-repeat: no-repeat;
	background-size: 47%;
}
.hire_perfect_ux.php{
background-image: url("<?php echo get_stylesheet_directory_uri();?>/images/php-servise.jpg");
}
.hire_perfect_ux .do_more {
	width: 50%;
	vertical-align: middle;
	position: relative;
	z-index: 99;
	justify-content: center;
	align-items: center;
	float: left;
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
	font-family: 'Lato', sans-serif;
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
	margin-bottom: 5px;
	font-size: 25px;
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

.get_touch {
	padding: 40px 0;
}
.get_touch h2 {
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
	z-index: 9999;
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
    padding: 9px 8px;
    font-size: 17px;
    color: #fff;
    height: 43px;
    border: 1px solid #0f4d76;
    width: 148px;
}
.techie_butns a {
    display: block;
    margin: 10px auto;
    max-width: 65%;
    min-width: 160px;
}
.featured_techei .featured_techei_img {
	overflow: hidden;
	height: 178px;
	border-radius: 50%;
	width: 178px;
	margin: 10px auto;
}
.psd_drupal{
	height: 640px;
	background: url(<?php echo get_stylesheet_directory_uri();?>/images/drupal-psd.jpg) no-repeat top left;
	padding: 25px;
}

.background_proces-first{
	width: 100%;
    float: left;
    font-family: 'Lato', sans-serif;
    font-weight: 600;
}
.psd_drupal h2{
	font-size: 25px;
	color: #fff;
}
.psd_drupal p{
	color: #3e7f7a;
	font-size: 18px;
	margin-top: 25px;
}
.shopping-cart{
	background: url(<?php echo get_stylesheet_directory_uri();?>/images/shopping-cart.jpg) no-repeat top left;
	height: 310px;
	padding: 25px;
	margin-bottom: 20px
}
.shopping-cart h2{
	font-size: 25px;
	color: #fff;
}
.shopping-cart p{
	color: #b4827c;
	font-size: 18px;
	max-width: 300px;
	margin-top: 25px;
}
.theme-development{
	background: url(<?php echo get_stylesheet_directory_uri();?>/images/drupal-theme.jpg) no-repeat top left;
	height: 310px;
	padding: 25px;
}
.theme-development h2{
	font-size: 25px;
	color: #fff;
}
.theme-development p{
	color: #c37759;
	font-size: 18px;
	max-width: 250px;
	margin-top: 25px;
}
.cms-development{
	background: url(<?php echo get_stylesheet_directory_uri();?>/images/drupal-cms.jpg) no-repeat top left;
	height: 310px;
	padding: 25px;
}
.cms-development h2{
	font-size: 25px;
	color: #181a21;
}
.cms-development p{
	color: #968a8a;
	font-size: 18px;
	max-width: 250px;
	margin-top: 25px;
}
.dru-pad-10{
	padding: 0 10px;
}
.row-1{
	margin-right: -10px;
    margin-left: -10px;
}
.drupal-work-process{
	background: url(<?php echo get_stylesheet_directory_uri();?>/images/drupal-work-process.jpg) no-repeat top center;
	width: 100%;
	float: left;
	margin: 0px 0 40px 0;
	font-family: 'Lato', sans-serif;
}
.drupal-work-process h2{
	text-align: center;
	margin: 75px 0 50px 0;
	color: #fff;
	font-size: 40px;
}
.drup-step-block {
	min-height: 300px;
	margin-bottom: 20px;
	box-shadow: 0 0 6px rgba(0,0,0,.2)
}
/*.drup-step-block img{
	height: 155px;
	object-fit: cover;
	object-position: center;

}*/
.drup-step-block h3{
	color: #0f4d76;
	font-size: 20px;
	text-align: center;
	font-weight: 600;
	padding: 25px 20px 0 20px;
	margin: 0;
}
.drup-step-block p{
	color: #959595;
	font-size: 16px;
	text-align: center;
	font-weight: 400;
	padding: 14px 15px 20px 14px;
	margin: 0;
}
.hire-drupal h2{
	color: #0f4d76;
    padding: 0;
    margin: 0 0 20px 0;
    font-size: 28px;
    font-weight: 600;
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
 .drupal {
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
.banner-drupal.php {
 background-position: right;
}

}
 @media (max-width: 991px) {
.psd_drupal, .shopping-cart{
	height: auto;
	background-image: none;
	background-color: #94dad5;
	margin-bottom: 20px;
}

.theme-development{
	background-color: #ffcab8;
}
.cms-development {
	background-color: #ebe8e8;
}
.shopping-cart{
	background:#f0dbd8;
}
.theme-development, .cms-development, .shopping-cart{
	margin-bottom: 20px;
	height: auto;
	background-image: none;
}
.theme-development p, .cms-development p, .shopping-cart p{
	width: 100%;
	max-width: 100%;
}
}
 @media (max-width: 767px) {
 .quick_form {
    float: none;
    margin: 20px auto;
}
.drupal h2 {
    font-size: 16px;
   }
   .background_proces-first h2{
   		font-size: 20px;
   		margin-top: 0px;
   }
   .background_proces-first p{
   		font-size: 16px;
   		font-weight: 400;
   }
   .get_touch h2, .hire-drupal h2{
   	font-size: 19px;
   }
 .drupal {
 padding: 30px;
}
 .banner-drupal {
 background-position: right;
}
.banner-drupal.php {
 background-position: center;
}

 .width_get_touch {
 width: 100%;
}
 .inner_width_shadow {
 min-height: auto;
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
.drupal h1 {
 font-size: 30px;
}
.btn-send-ror{
float:left;
}
}


</style>
<section>
    <div class="banner-drupal php">
      <div class="container">
        <div class="row">
          <div class="col-lg-offset-5 col-md-offset-2 col-lg-3 col-md-6 col-sm-8 col-xs-12">
            <div class="drupal">
              <h1>PHP <span> Development Services</span></h1>
              <h2>Experienced in developing fully customizable web applications in <span>PHP</span>.</h2>
              <a style="cursor: pointer;" data-toggle="modal" data-target="#myModal0" class="hire_ux">Hire</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
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
          <img src="<?php echo get_stylesheet_directory_uri();?>/images/php-circle.jpg" alt="ux">
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12 content_lft">
        <div class="content_text">
          <h3>PHP frameworks</h3>
          <p>Adopting the latest technology frameworks like CodeIgniter, CakePHP, Zend, Kohana, ATK 4, Symfony, Agavi, Yii, Fuel PHP, Silex, Laravel</p>
          <div class="show_case-left"></div>
        </div>
        <div class="content_text">
          <h3>Content management system</h3>
          <p>Customizing CMS systems like Wordpress, MODX, Drupal, Joomla and similar.</p>
          <div class="show_case-left"></div>
        </div>
        <div class="content_text">
          <h3>Custom PHP Programming</h3>
          <p>Online Hotel Booking and Comparison system, Online Booking & Quote Engine systems, Online multi-player games, Adwords-based and banner exchange systems, Statistics collection systems.</p>
          <div class="show_case-left"></div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs">
       <div class="ux-image">
          <img src="<?php echo get_stylesheet_directory_uri();?>/images/php-circle.jpg" alt="ux">
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12 content_rigt">
        <div class="content_text">
          <h3>E-commerce solutions</h3>
          <p>Magento, ZenCart, osCommerce, CS-Cart, Custom Shopping Carts, Online Store Front (e-shop), Payment systems and payment gateways.</p>
          <div class="show_case-right"></div>
        </div>
        <div class="content_text">
          <h3>Advanced PHP programming </h3>
          <p>Web 2.0 systems and blogging systems, Auctions, Classified, Forum, Blog, Discussion Board.</p>
          <div class="show_case-right"></div>
        </div>
        <div class="content_text">
          <h3>Online Business application </h3>
          <p>Sales Automation and CRM Solution, Custom B2B, B2C, C2C, C2B Solutions, QuickBooks integration, Webmail, Web Calendar, Scheduling and Calendaring Applications.</p>
          <div class="show_case-right"></div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<section class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="200ms" >
  <div class="drupal-work-process">
    <h2>Steps to work</h2>
    <div class="container">
      <div class="row-1">
        <div class="col-md-4 col-sm-6 col-sm-12 dru-pad-10">
          <div class="drup-step-block">
              <img src="<?php echo get_stylesheet_directory_uri();?>/images/drupal-step-1.jpg" alt="step">
              <h3>Planning</h3>
              <p>Understanding what you want out of your site and how do you plan to implement it.</p>
            </div>
          </div>
         <div class="col-md-4 col-sm-6 col-sm-12 dru-pad-10">
          <div class="drup-step-block">
            <img src="<?php echo get_stylesheet_directory_uri();?>/images/drupal-step-2.jpg" alt="step">
            <h3>Frontend integration</h3>
            <p>We integrate design as per aproved from the client (PSD or final design) on Drupal.</p>
          </div>
        </div>
         <div class="col-md-4 col-sm-6 col-sm-12 dru-pad-10">
          <div class="drup-step-block">
            <img src="<?php echo get_stylesheet_directory_uri();?>/images/drupal-step-3.jpg" alt="step">
            <h3>Development</h3>
            <p>We develop content management systems for clients who need more than just the basics.</p>
          </div>
        </div>
         <div class="col-md-4 col-sm-6 col-sm-12 dru-pad-10">
          <div class="drup-step-block">
            <img src="<?php echo get_stylesheet_directory_uri();?>/images/drupal-step-4.jpg" alt="step">
            <h3>Review &amp; Test</h3>
            <p>Once the site is ready, it should be checked and tested to ensure an error-free working.</p>
          </div>
        </div>
         <div class="col-md-4 col-sm-6 col-sm-12 dru-pad-10">
          <div class="drup-step-block">
            <img src="<?php echo get_stylesheet_directory_uri();?>/images/drupal-step-5.jpg" alt="step">
            <h3>Launch</h3>
            <p>After successful testing, the product is delivered/ deployed to the customer for their use</p>
          </div>
        </div>
         <div class="col-md-4 col-sm-6 col-sm-12 dru-pad-10">
          <div class="drup-step-block">
            <img src="<?php echo get_stylesheet_directory_uri();?>/images/drupal-step-6.jpg" alt="step">
            <h3>Maintenance</h3>
            <p>It is an important step which makes sure that your site works with efficiency all the time</p>
          </div>
        </div>
      </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="200ms">
  <div class="search-resumeRow1">
    <div class="container">
      <div class="row">
       <div class="col-md-12">
       <div class="hire-drupal">
        <h2>Hire the best PHP freelancers</h2>
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
                <div class="featured_techei_img"> <img src="https://www.findmetechie.com/wp-content/uploads/thumbs/399/1475169512.jpg"> </div>
                <div class="featured_techei_title">
                  <p class="featured-title">Software Engineer</p>
                  <span class="featured_techei_id"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/flag/de.png" alt="" title="India"> FMT ID: 399 </span> <span class="featured_techei_exp"> 10+ Years </span> </div>
                <div class="featured_techei_added"> <span class="featured_techei_added_tech">Php</span> </div>
                </a>
                <div class="techie_join_section">
                  <div class="techie_butns"> <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/399";?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?> class="build-your-team">View my profile</a> <a onclick="hire_me(399)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a> </div>
                </div>
              </div>
            </div>
            <div class="serchtechie_width techie_width">
              <div class="tech-all-details"> <a type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm">
                <div class="featured_techei_img"> <img src="https://www.findmetechie.com/wp-content/uploads/thumbs/762/en.jpg"> </div>
                <div class="featured_techei_title">
                  <p class="featured-title">Sr. PHP Developer</p>
                  <span class="featured_techei_id"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/flag/ar.png" alt="" title="Pakistan"> FMT ID: 762 </span> <span class="featured_techei_exp"> 8 Years </span> </div>
                <div class="featured_techei_added"> <span class="featured_techei_added_tech">PHP</span> </div>
                </a>
                <div class="techie_join_section">
                  <div class="techie_butns"> <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/762";?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?> class="build-your-team">View my profile</a> <a onclick="hire_me(762)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a> </div>
                </div>
              </div>
            </div>
            <div class="serchtechie_width techie_width">
              <div class="tech-all-details"> <a type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm">
                <div class="featured_techei_img"> <img src="https://www.findmetechie.com/wp-content/uploads/thumbs/894/IMG_20170724_205540.jpg" alt="techie"> </div>
                <div class="featured_techei_title">
                  <p class="featured-title">Web developer and Designer</p>
                  <span class="featured_techei_id"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/flag/in.png" alt="" title="India"> FMT ID: 894 </span> <span class="featured_techei_exp"> 3 Years </span> </div>
                <div class="featured_techei_added"> <span class="featured_techei_added_tech">Drupal</span> </div>
                </a>
                <div class="techie_join_section">
                  <div class="techie_butns"> <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/894";?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?> class="build-your-team">View my profile</a> <a onclick="hire_me(894)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a> </div>
                </div>
              </div>
            </div>
            <div class="serchtechie_width techie_width">
              <div class="tech-all-details"> <a type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm">
                <div class="featured_techei_img"> <img src="https://www.findmetechie.com/wp-content/uploads/thumbs/965/IMG_20170822_002640.jpg" alt="techie"> </div>
                <div class="featured_techei_title">
                  <p class="featured-title">PHP Web Developer</p>
                  <span class="featured_techei_id"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/flag/in.png" alt="" title="India"> FMT ID: 965 </span> <span class="featured_techei_exp"> 5 Years </span> </div>
                <div class="featured_techei_added"> <span class="featured_techei_added_tech">PHP</span> </div>
                </a>
                <div class="techie_join_section">
                  <div class="techie_butns"> <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/965";?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?> class="build-your-team">View my profile</a> <a onclick="hire_me(965)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a> </div>
                </div>
              </div>
            </div>
            <div class="serchtechie_width techie_width">
              <div class="tech-all-details"> <a type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm">
                <div class="featured_techei_img"> <img src="https://www.findmetechie.com/wp-content/uploads/thumbs/1912/DSCN1500.JPG"> </div>
                <div class="featured_techei_title">
                  <p class="featured-title">Sr. PHP Developer</p>
                  <span class="featured_techei_id"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/flag/ar.png" alt="" title="Pakistan"> FMT ID: 1912 </span> <span class="featured_techei_exp"> 5 Years </span> </div>
                <div class="featured_techei_added"> <span class="featured_techei_added_tech">WordPress</span> </div>
                </a>
                <div class="techie_join_section">
                  <div class="techie_butns"> <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/1912";?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?> class="build-your-team">View my profile</a> <a onclick="hire_me(1912)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="cl"></div>
          <?php             $location = getLocationInfoByIp();			 			?>
          <div class="mgt-30"> <a href="javascript:void(0);" class="build-your-team restrict_employer_button" data-toggle="modal" data-target="#myModal0">Hire a Techie</a> <?php if($location['country'] != 'IN'){ ?><a href="https://www.findmetechie.com/build-developement-team/" class="build-your-team">Build your team</a><?php }else{ ?><button type="button" class="build-your-team" data-toggle="modal" data-target="#useremployer_restrict">Build your team</button><?php } ?></div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="200ms">
  <div class="get_touch">
   
    <div class="container"> 
      <h2>Why PHP development from FindMeTechie?</h2>
      <div class="row-custom">
        <div class="width_get_touch">
          <div class="inner_width_shadow">
            <span class="get_touch_icon first_icon"></span>
            <p>Our expertise is in seamless delivery using AGILE project methodology. You may <a style="cursor: pointer;" data-toggle="modal" data-target="#myModal0">Hire Techies</a> or opt to <?php if($location['country'] != 'IN'){ ?><a href="https://www.findmetechie.com/build-developement-team/">Build your team</a><?php }else{ ?><a data-toggle="modal" data-target="#useremployer_restrict">Build your team</a><?php } ?></p>
          </div>
        </div>
        <div class="width_get_touch">
          <div class="inner_width_shadow">
            <span class="get_touch_icon second_icon"></span>
            <p>Our Project management team will attend to your requirements and try replying back with in 12 hours.</p>
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
<div class="clearfix"></div>

<section  class="wow fadeInDown " data-wow-duration="1000ms" data-wow-delay="200ms">
  <div class="hire_perfect_ux php">
  <div class="container">
    <div class="do_more">
      <div class="domore_content">
        <h2>Hire the perfect expertise</h2>
        <h3>Save 40 to 60 percent annually!</h3>
        <p>With a freelancer, you don’t worry about the payment of benefits</p>
        <h3>Reduce the need for office space.</h3>
        <p>Let us handle everything else!</p>
        <h3>More and more businesses are preferring to hire freelancers.</h3>
      </div>
    </div>
    <div class="do_more bg_red">
     
    </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
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
          <button type="submit" class="btn btn-warning orange-btn btn-block" onclick="window.location='<?php echo get_permalink(286); ?>';">REGISTER</button>
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
