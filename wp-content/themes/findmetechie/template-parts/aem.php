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
.banner-ror {
 background-image: url(<?php echo get_stylesheet_directory_uri();
?>/images/ror-banner.jpg);
	background-size: cover;
	background-repeat: no-repeat;
	height: 100vh;
	min-height: 600px;
	background-position: center bottom;
	position: relative;
	margin-top: 55px;
}
.scroll_down {
	height: 60px;
	width: 60px;
	position: absolute;
	border-bottom: 100px;
	left: 50%;
	-webkit-border-radius:50%;
	-moz-border-radius:50%;
	-ms-border-radius:50%;
	border-radius:50%;
	animation: bounce 2s infinite;
	-webkit-animation: bounce 2s infinite;
	-moz-animation: bounce 2s infinite;
	-o-animation: bounce 2s infinite;
}
.scroll_down .fa {
	width: 60px;
	display: block;
	color: #0f4d76;
	text-align: center;
	font:normal 45px 'FontAwesome';
	line-height:60px;
	text-rendering: auto;
	-webkit-font-smoothing: antialiased;
}
.scroll_down a:hover, a:focus, button:focus {
	text-decoration: none;
	outline: none;
}
.ror-banner-caption {
	font-family: 'Lato', sans-serif;
}
.text_banner {
	width: 70%;
	float: left;
	padding-top:130px;
}
.text_banner h1 {
	color: #0f4d76;
	font-weight: 700;
	margin-bottom: 30px;
	font-size: 40px;
}
.text_banner p {
	color: #080807;
	margin-bottom: 10px;
	font-size: 18px;
	max-width: 550px;
}
.ror_btn {
	background-color: #0f4d76;
	border: none;
	box-shadow: 0;
	border-radius: 0;
	padding: 10px 30px;
	font-size: 18px;
	color: #fff;
	margin-top: 20px;
}
.form_ror {
	background-color: rgba(254, 254, 254, .5);
	border: 1px solid rgba(254, 254, 254, .3);
	width: 30%;
	min-width:  250px;
	float: left;
	padding: 15px;
	margin-top: 80px;
	box-sizing: border-box;
	box-shadow: 0 0 8px rgba(5, 5, 5, .3);
}
.form_ror h2 {
	color: #0f4d76;
	font-weight: 700;
	margin-bottom: 10px;
	font-size: 20px;
	margin-top: 0;
}
.form_ror .form-control {
	border-radius: 0px;
	box-shadow: none;
}
.form_ror img {
	max-width: 200px;
}
.form_ror .btn-get-quate-ror {
	margin-top: 20px;
	background-color: #0f4d76;
	border-radius: 0px;
	color: #fff;
	border: none;
	height: auto;
	padding: 10px 30px;
	font-size: 18px;
	font-family: 'Lato', sans-serif;
}
.bg_ror_gray {
	background-color: #fff;
	padding: 50px 0 50px;
	position: relative;
}
.layer-2 {
	background-color: rgba(254, 254, 254, 0.6);
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	z-index: 1;
}
.featured_techei {
	padding: 0;
}
.search-resumeRow1 {
	padding: 50px 0 50px;
}
.ror_block_headings {
	text-align: center;
	font-family: 'Lato', sans-serif;
	padding: 0px 0 30px;
}
.ror_block_headings p {
	color: #080807;
	margin-bottom: 10px;
	font-size: 18px;
}
.ror_block_headings h2 {
	color: #0f4d76;
	font-weight: 700;
	margin-bottom: 20px;
	font-size: 40px;
	margin-top: 0;
}
.section_backcolor_ror {
	padding: 0;
	background-color:  #fff;
	box-shadow: inset 0 0 5px rgba(5, 5, 5, .1)
}
.section_backcolor_ror:nth-child(2n+1) {
background-color: #f8f8f9;
}
.block_ror {
	font-family: 'Lato', sans-serif;
	padding: 20px;
	min-height: 530px;
}
.block_ror h3 {
	color: #0f4d76;
	font-size: 20px;
	margin-bottom:  20px;
}
.block_ror ul {
	padding:0 0 0 10px;
}
.block_ror p, .block_ror ul li {
	color: #080807;
	margin-bottom: 10px;
	font-size: 16px;
	line-height: 1.6em;
}
.block_ror ul li {
	margin-bottom: 0;
	list-style: disc;
}
.icon_change {
	width: 64px;
	height: 60px;
 background-image: url(<?php echo get_stylesheet_directory_uri();
?>/images/background.png);
	background-repeat: no-repeat;
	margin-bottom: 19px;
}
.main-block .section_backcolor_ror:nth-child(3) .icon_change {
 background-position: -18px -20px
}
.main-block .section_backcolor_ror:nth-child(2) .icon_change {
 background-position: -165px -20px;
}
.main-block .section_backcolor_ror:nth-child(1) .icon_change {
 background-position: -333px -20px;
}
.main-block .section_backcolor_ror:nth-child(4) .icon_change {
 background-position: -500px -20px;
}
.main-block .section_backcolor_ror:hover {
 background-image: url(<?php echo get_stylesheet_directory_uri();
?>/images/ror-hover.jpg);
	background-size: cover;
}
.section_backcolor_ror:hover .block_ror p, .section_backcolor_ror:hover .block_ror h3, .section_backcolor_ror:hover .icon_change, .section_backcolor_ror:hover .block_ror ul li {
	color: #fff;
}
.main-block .section_backcolor_ror:nth-child(3):hover .icon_change {
 background-position: -18px -118px;
}
.main-block .section_backcolor_ror:nth-child(2):hover .icon_change {
 background-position: -165px -118px;
}
.main-block .section_backcolor_ror:nth-child(1):hover .icon_change {
 background-position: -333px -118px;
}
.main-block .section_backcolor_ror:nth-child(4):hover .icon_change {
 background-position: -500px -118px;
}
.featured_technology {
	padding: 40px 0;
}
.bg_black {
	color: #080807;
	/*background: #0f4d76; 
    background: linear-gradient(to right, #72d9e9 , #f2fafd); */
    background-image: url(<?php echo get_stylesheet_directory_uri();
?>/images/form_bg.jpg);
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
	/* background: linear-gradient(to right, #72d9e9 , #f2fafd); */
   
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
.featured_techei .featured_techei_img {
	overflow: hidden;
	height: 178px;
	border-radius: 50%;
	width: 178px;
	margin: 10px auto;
}
.hire_perfect {
	font-family: 'Lato', sans-serif;
	background-color: #f2f2f2;
	float: left;
	width: 100%;
}
	.hire_perfect_ux .domore_content {
    padding: 39px 0;
	width: 50%;
}
.hire_perfect_ux .domore_content h2 {
    color: #0f4d76;
    font-weight: 400;
    margin-bottom: 20px;
    font-size: 30px;
    margin-top: 0;
}
.hire_perfect_ux {
    font-family: 'Lato', sans-serif;
    background-color: #f2f2f2;
    float: left;
    width: 100%;
    background-image: url(<?php echo get_stylesheet_directory_uri();?>/images/aem-tech-banner.jpg);
    background-position: right center;
    background-repeat: no-repeat;
    background-size: 47%;
    min-height: 320px;
}
.bg_red p {
	color: #fff;
	font-size: 65px;
	line-height: 1em;
}
.domore_content h2 {
	color: #080807;
	font-weight: 700;
	margin-bottom: 20px;
	font-size: 40px;
}
.domore_content h3 {
	color: #080807;
	font-weight: 700;
	margin-bottom: 10px;
	font-size: 20px;
	margin-top: 0;
}
.domore_content p {
	color: #080807;
}
.featured_technology h3, .search-resumeRow1 h3.techie-list {
	color: #0f4d76;
	font-weight: 700;
	margin-bottom: 15px;
	font-size: 30px;
	text-align: center;
	margin-top:  0px;
	border: none;
	display: block;
	font-family: 'Lato', sans-serif;
}
.resume-box {
	padding: 0;
}
.resume-box .profileImage img {
	display: block;
	left: 50%;
	max-height: 50%;
	max-width: 80%;
	position: absolute;
	top: 50%;
	transform: translate(-50%, -50%);
	width: auto;
	-webkit-filter: grayscale(00);
	filter: grayscale(0%);
	opacity: 0.8;
	-webkit-transition: all 0.2s ease 0s;
	transition: all 0.2s ease 0s;
}
.title_service {
	font-size: 16px;
	color: #080807;
}
.ror_btn, .form_ror .btn-get-quate-ror, .build-your-team, .btn-send-ror {
	-webkit-transition: all 0.2s ease 0s;
	transition: all 0.2s ease 0s;
	margin:  0px 10px 10px 0;
}
.techie_butns .build-your-team {
	font-size: 16px;
	padding: 10px 0;
}
.mgt-10 {
	margin-top: 15px;
}
.ror_btn:hover, .form_ror .btn-get-quate-ror:hover, .build-your-team:hover, .btn-send-ror:hover {
	background: #f78650;
	color: #fff;
	border-color: #f78650;
	text-decoration: none;
}
 @media(max-width: 1199px) {

.hire_perfect_ux{
background-position: right center;
}
}
@media (max-width:1024px) {
.bg_red {
 background-size: 100%;
 background-position: center;
}
}
@media (max-width: 991px) {
.text_banner {
 width: 64%;
 float: left;
 padding-top: 125px;
}
.form_ror {
 width: 36%;
 margin-top: 25px;
}
.ror_block_headings h2 {
 font-size: 28px;
}
.ror_block_headings p {
 font-size: 16px;
}

.btn-send-ror {
padding: 8px 19px;
}
.bg_red p {
 font-size: 46px;
}
}
@media (max-width: 767px) {
 .text_banner {
 width: 100%;
 float: left;
 padding-top: 25px;
}
 .domore_content {
 padding: 15px;
}
 .form_ror {
 width: 100%;
 margin-top: 25px;
}
 .banner-ror {
 min-height: 882px;
}

 .bg_red {
 background-size: auto 200px;
 background-position: bottom;
}
 .domore_content h2 {
 font-size: 30px;
}
 .width_3 {
 width:100%;
}
 .width_2 {
 width: 50%;
}
 .btn-send-ror {
 padding: 8px 29px;
 padding: 5px 29px;
 font-size: 14px;
}
 .width_3 .form-control {
 height: 38px;
 font-size: 14px;
}
 .footer-form-technology .wpcf7-form .wpcf7-response-output.wpcf7-mail-sent-ok {
 color: #fff;
 background-color: #DFF2BF;
 border: 0;
 padding: 10px;
}
.text_banner h1 {
 font-size: 30px;
}
.block_ror{
min-height: auto;
}
.btn-send-ror{
float:left;
}
.hire_perfect_ux {
    background-position: top center;
    background-size: auto 220px;
	padding-top: 220px;
}
.btn-send-ror{
float:left;
}
.hire_perfect_ux .domore_content {
    width: 100%;
}
}
.text_banner h1 span{color:#2881bb;}
.text_banner ul { padding-left:20px;}
.text_banner ul li{
	color: #080807;
	margin-bottom: 10px;
	font-size: 16px;
	max-width: 550px; list-style-type: disc;
}
.techieButton {margin: 10px 0 10px 25px;
    display: inline-block;
    background:#0f4d76;
    border-color: #11719e;
    font-family: 'Lato', sans-serif;
    padding: 9px 38px;
    border-radius:0px;
    box-shadow: 9px 4px 21px rgba(46,45,45,.4); color:#FFFFFF;}
a.techieButton:hover, a.techieButton:focus {background:#0f4d76;color:#FFFFFF; box-shadow: 9px 4px 21px rgba(46,45,45,.3);}
@media (max-width: 991px) {
.text_banner ul li{max-width: 425px;}
}
@media (max-width: 767px) {
.text_banner ul li{ font-size:14px;}
}
</style>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/animate.css">
<section>
<div class="banner-ror">
  <div class="container">
    <div class="ror-banner-caption">
      <div class="text_banner">
      <h1>Certified <span>AEM</span> developers available</h1>
        <ul>
          <li>FMT guarantees code quality and ensures effective project management</li>
          <li>Experienced techies available on immediate basis</li>
          <li>Video / Audio based interview to have complete transparency</li>
          <li>Service Stack of 40 Plus technologies</li>
          <li>Complete Intellectual property rights (IPR) protection and data security</li>
        </ul>
        <a class="techieButton" href="javascript:void(0);" data-toggle="modal" data-target="#myModal0">Hire Techies</a>
      </div>
      <div class="form_ror"> <?php echo do_shortcode('[contact-form-7 id="3191" title="ror-headerform"]');?> </div>
    </div>
  </div>
  <div class="scroll_down bounce linkSerivice-1"><a class="page-scroll" href="#scroll_down_ror"><i class="fa fa-angle-down"></i></a></div>
</div>
</section>
<div class="clearfix"></div>
<section id="scroll_down_ror" class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="200ms" >
  <div class="search-resumeRow1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="techie-list remove-margin">Hire the best certified AEM freelancers</h3>
          <h4 style="text-align:center;">Go digital and connect with the ultra-smart millenials</h4>
        </div>
      </div>
    </div>
    <div class="featured_techei single-tech">
      <div class="container text-center">
        <div class="text-info">
          <div id="techie_container">
            <div class="serchtechie_width techie_width">
              <div class="tech-all-details"> <a  type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm" >
                <div class="featured_techei_img"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/techie-1.png"> </div>
                <div class="featured_techei_title">
                  <p class="featured-title">AEM Developer and Lead</p>
                  <span class="featured_techei_id"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/flag/in.png" alt="" title="India" /> FMT ID: 2012 </span> <span class="featured_techei_exp"> 5 Years </span> </div>
                <div class="featured_techei_added"> <span class="featured_techei_added_tech">AEM</span> </div>
                </a>
                <div class="techie_join_section">
                  <div class="techie_butns"> <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/2012";?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?> class="build-your-team">View my profile</a> <a onclick="hire_me(2012)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a> </div>
                </div>
              </div>
            </div>
            <div class="serchtechie_width techie_width">
              <div class="tech-all-details"> <a  type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm" >
                <div class="featured_techei_img"> <img src="https://www.findmetechie.com/wp-content/uploads/thumbs/2016/Campbuzz id.jpg"> </div>
                <div class="featured_techei_title">
                  <p class="featured-title">AEM Developer</p>
                  <span class="featured_techei_id"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/flag/in.png" alt="" title="Pakistan" /> FMT ID: 2016 </span> <span class="featured_techei_exp"> 1 Years </span> </div>
                <div class="featured_techei_added"> <span class="featured_techei_added_tech">AEM</span> </div>
                </a>
                <div class="techie_join_section">
                  <div class="techie_butns"> <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/2016";?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?> class="build-your-team">View my profile</a> <a onclick="hire_me(2016)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a> </div>
                </div>
              </div>
            </div>
            <div class="serchtechie_width techie_width">
              <div class="tech-all-details"> <a  type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm" >
                <div class="featured_techei_img"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/techie-1.png" alt="techie"/> </div>
                <div class="featured_techei_title">
                  <p class="featured-title">Adobe AEM Lead Developer</p>
                  <span class="featured_techei_id"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/flag/in.png" alt="" title="India" /> FMT ID: 2018 </span> <span class="featured_techei_exp"> 6 Years </span> </div>
                <div class="featured_techei_added"> <span class="featured_techei_added_tech">AEM</span> </div>
                </a>
                <div class="techie_join_section">
                  <div class="techie_butns"> <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/2018";?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?> class="build-your-team">View my profile</a> <a onclick="hire_me(2018)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a> </div>
                </div>
              </div>
            </div>
            <div class="serchtechie_width techie_width">
              <div class="tech-all-details"> <a  type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm" >
                <div class="featured_techei_img"> <img src="https://www.findmetechie.com/wp-content/uploads/thumbs/2023/download.png" alt="techie"/> </div>
                <div class="featured_techei_title">
                  <p class="featured-title">AEM Developer</p>
                  <span class="featured_techei_id"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/flag/in.png" alt="" title="India" /> FMT ID: 2023 </span> <span class="featured_techei_exp"> 4 Years </span> </div>
                <div class="featured_techei_added"> <span class="featured_techei_added_tech">AEM</span> </div>
                </a>
                <div class="techie_join_section">
                  <div class="techie_butns"> <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/2023";?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?> class="build-your-team">View my profile</a> <a onclick="hire_me(2023)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a> </div>
                </div>
              </div>
            </div>
            <div class="serchtechie_width techie_width">
              <div class="tech-all-details"> <a  type="button" class="" data-toggle="modal" data-target=".bs-example-modal-sm" >
                <div class="featured_techei_img"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/techie-1.png"> </div>
                <div class="featured_techei_title">
                  <p class="featured-title">AEM Developer</p>
                  <span class="featured_techei_id"> <img src="https://www.findmetechie.com/wp-content/themes/findmetechie/images/flag/in.png" alt="" title="India" /> FMT ID: 2025 </span> <span class="featured_techei_exp"> 3 Years </span> </div>
                <div class="featured_techei_added"> <span class="featured_techei_added_tech">AEM</span> </div>
                </a>
                <div class="techie_join_section">
                  <div class="techie_butns"> <a <?php if((in_array('employer', $user->roles)) || (in_array('administrator', $user->roles)) ){ ?> href="<?php echo site_url()."/profile/2025";?>" <?php } else { ?> type="button" data-toggle="modal" data-target=".bs-example-modal-sm" <?php } ?> class="build-your-team">View my profile</a> <a onclick="hire_me(2025)" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="build-your-team">Hire me</a> </div>
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
<section class="wow fadeInDown bg_ror_gray" data-wow-duration="1000ms" data-wow-delay="200ms" >
  <div class="layer-2"></div>
  <div class="container">
    <div class="z-index">
      <div class="ror_block_headings">
        <h2>Redefine your hiring process and be future-ready !</h2>
        <p>With years of expertise, we design and develop experiences that make people's lives simpler. </p>
      </div>
      <div class="clearfix"></div>
      <div class="main-block">
        <div class="col-md-3 col-sm-6 col-xs-12 section_backcolor_ror">
          <div class="block_ror">
            <div class="icon_change"></div>
            <h3>Our AEM Services</h3>
            <ul>
              <li>AEM Consulting and Implementation</li>
              <li>AEM CMS web development</li>
              <li>Maintenance and Support services for AEM</li>
              <li>Migrate other CMS to AEM</li>
              <li>Integration of AEM with Digital Marketing Tools</li>
              <li>Marketing Cloud integration with AEM</li>
              <li>AEM integration with 3rd party tool</li>
			  <li>Social Media Integration</li>
			  <li>AEM Team Augmentation</li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 section_backcolor_ror">
          <div class="block_ror">
            <div class="icon_change"></div>
            <h3>Assemble your own team</h3>
            <p>We offer first of a kind service to our clients by allowing them to customize their own team based on their specific needs. So instead of hiring a single techie, you can build your own expert team consisting of project managers, QA, Developer, Analyst etc.</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 section_backcolor_ror">
          <div class="block_ror">
            <div class="icon_change"></div>
            <h3>Why managed freelancing ?</h3>
            <ul>
              <li>With freelancing, you can save upto 40 – 60 percent annually.</li>
              <li>Easily expand your workforce and save office space.</li>
              <li>Get dedicated techies as per your need on full time/ part time or even hourly basis.</li>
              <li>With freelancers, businesses can quickly adjust to the fluctuating supply and demands.</li>
              <li>No need to provide extra training and skills and directly hire the work ready talents.</li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 section_backcolor_ror">
          <div class="block_ror">
            <div class="icon_change"></div>
            <h3>How it works?</h3>
            <ul>
              <li>You first share the details about your work/project.</li>
              <li>We acknowledge your requirement and designate a dedicated account manager.</li>
              <li>After rigorous filtering, we share the best matched techies with you.</li>
              <li>We share master service agreement and individual SLAs</li>
              <li>You get full involvement with the day to day projects and reports.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<section  class="wow fadeInDown " data-wow-duration="1000ms" data-wow-delay="200ms">
  <div class="hire_perfect_ux">
  <div class="container">
    <div class="do_more">
      <div class="domore_content">
        <h2>Hire the perfect expertise</h2>
        <p> Certified Adobe AEM Developers</p>
        <p> Create a consistent customer experience</p>
        <p> Expert assistance in integrating AEM with Adobe Marketing Cloud solutions and other digital marketing tools</p>
        <p> An experienced and knowledgeable resource for clients, with a growing, well-trained, certified team</p>
        <p> A collaborative partner that learns from and values each business relationship</p>
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
<!--<section>
  <div class="hire_perfect">
    <div class="do_more wow fadeInDown " data-wow-duration="1000ms" data-wow-delay="200ms">
      <div class="domore_content">
        <h2>Hire the perfect expertise</h2>
        <p> Certified Adobe AEM Developers</p>
        <p> Create a consistent customer experience</p>
        <p> Expert assistance in integrating AEM with Adobe Marketing Cloud solutions and other digital marketing tools</p>
        <p> An experienced and knowledgeable resource for clients, with a growing, well-trained, certified team</p>
        <p> A collaborative partner that learns from and values each business relationship</p>
      </div>
    </div>
    <div class="do_more bg_red wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="500ms"> </div>
  </div>
</section>-->
<div class="clearfix"></div>
<section class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="200ms" >
  <div class="bg_black">
    <div class="layer"></div>
    <div class="container">
      <div class="z-index footer-form-technology">
        <h2>Still not convinced ?</h2>
        <p>Reach out to us !</p>
        <?php echo do_shortcode('[contact-form-7 id="3238" title="ror footer form"]');?> </div>
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
<script src="<?php echo get_stylesheet_directory_uri();?>/js/wow.js"></script>
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

// smooth scroll
	
</script>
