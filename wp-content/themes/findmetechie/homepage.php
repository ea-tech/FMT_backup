<?php
/**
 * Template Name: Home
 */
get_header(); 
$user = wp_get_current_user();
?>

<div class="site-inner" id="scroll_down">
  <div id="primary" class="content-area">
    <content>
    <?php $Our_Services_Page_id = 1021; $Our_Services_Page = get_page($Our_Services_Page_id);?>
    <?php if(!empty($Our_Services_Page)) : ?>
    <div class="homeRow0">
      <div class="container"> <?php echo apply_filters('the_content', $Our_Services_Page->post_content); ?>
        <div class="row">
          <?php $our_services_blocks = new Attachments( 'content_blocks',$Our_Services_Page_id ); /* pass the instance name */ ?>
          <?php if( $our_services_blocks->exist() ) : ?>
          <?php 



					$count = 0;



					while( $our_services_blocks->get() ) : 
					if($count%2 == 0)
	     {
		 $layoutboxclass = "leftpanelbox";
		 }else
		 {
		  $layoutboxclass = "rightpanelbox";
		 }


            if(($our_services_blocks->field( 'title' )==  'Box2') || ($our_services_blocks->field( 'title' )==  'Box4')){
			?>
          <div class="top_header <?php echo $layoutboxclass; ?>"> <a href="<?php echo ($our_services_blocks->field( 'title' )==  'Box2')?'#hdiw-em':'#fmtg-em'; ?>"> <?php echo $our_services_blocks->field( 'description' ); ?>
            <?php if($our_services_blocks->field( 'buttonlink' ) != ""){ ?>
            <img src=" <?php echo $our_services_blocks->field( 'buttonlink' ); ?>" alt="<?php echo $layoutboxclass; ?>" >
            <?php } ?>
            </a> </div>
          <?php }else { ?>
          <div class="top_header <?php echo $layoutboxclass; ?>"> <?php echo $our_services_blocks->field( 'description' ); ?>
            <?php if($our_services_blocks->field( 'buttonlink' ) != ""){ ?>
            <img src=" <?php echo $our_services_blocks->field( 'buttonlink' ); ?>" alt="<?php echo $layoutboxclass; ?>" >
            <?php } ?>
          </div>
          <?php } ?>
          <?php if($count%2 != 0) 
		{?>
          <div class="cl"></div>
          <?php } ?>
          <?php $count ++;



					endwhile; 



					endif;



					?>
        </div>
        <div class="subtitles-text"> </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <?php endif; ?>
  <div id="HireaTechie">
    <div class="employerServices">
      <div class="container">
        <div class="leftBlock">
          <div class="emCaraousel">
            <h2>Typical project requests</h2>
            <div id="myCarouseEM" class="carousel slide" data-ride="carousel">
              <div class="heightBlock">
                <ol class="carousel-indicators" style="z-index:1 !important">
                  <li data-target="#myCarouseEM" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarouseEM" data-slide-to="1"></li>
                  <li data-target="#myCarouseEM" data-slide-to="2"></li>
                  <li data-target="#myCarouseEM" data-slide-to="3"></li>
                  <li data-target="#myCarouseEM" data-slide-to="4"></li>
                  <li data-target="#myCarouseEM" data-slide-to="5"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <div class="itemText">
                      <p>"Do you have open source Technical architect/specialist to do due-diligence on the platform for our Fin-tech start up?"</p>
                    </div>
                    <span class="homeRow3-span">
                    <bdo>CEO-</bdo>
                    Singapore </span> </div>
                  <div class="item">
                    <div class="itemText">
                      <p>"We are looking for Magento specialist to build E-Commerce site."</p>
                    </div>
                    <span class="homeRow3-span">
                    <bdo>IT Project manager-</bdo>
                    Germany</span> </div>
                  <div class="item">
                    <div class="itemText">
                      <p>"Do you have .NET and SharePoint skills, and if so what is your rate?"</p>
                    </div>
                    <span class="homeRow3-span">
                    <bdo>Dan - Project Director-</bdo>
                    UK</span> </div>
                  <div class="item">
                    <div class="itemText">
                      <p>"Hey Hi. Thanks a lot for getting in touch with us. We are looking for a freelance Web Designer / Developer to complete our existing website. This is a temporary assignment ( for aweek or two ), for someone who can work with us from our office. Your contact details for me to connect with you."</p>
                    </div>
                    <span class="homeRow3-span">
                    <bdo>Paul - CEO-</bdo>
                    USA</span><br/>
                  </div>
                  <div class="item">
                    <div class="itemText">
                      <p>"Can you tell me:</p>
                      <ul>
                        <li>What is your hourly rate.</li>
                        <li>What process do you take to complete a project (as much detail as possible)</li>
                        <li>Tell me about how you build back ends? Which plugins do you mostly use?"</li>
                      </ul>
                    </div>
                    <span class="homeRow3-span">
                    <bdo>Ron-</bdo>
                    Australia</span> </div>
                  <div class="item">
                    <div class="itemText">
                      <p>"Do you have Sitecore 8 certified devs available?"</p>
                    </div>
                    <span class="homeRow3-span">
                    <bdo>Jeff-</bdo>
                    Singapore</span> </div>
                </div>
                <!--<img src="<?php // echo get_stylesheet_directory_uri()?>/images/invertEnd.png" id="invertedComma" alt="" /><br/>-->
              </div>
            </div>
          </div>
        </div>
        <div class="rightBlock">
          <h1>Employers</h1>
          <h2>Start accelerating your business today</h2>
          <p>"I love the idea of Managed Freelancing by FindMeTechie who are doing excellent work to ensure customer delight. It allows you to have agile project management and quality assurance packaged with development at the cost comparable to a typical freelancing assignment."</p>
          <div class="linkSerivice">
            <ul>
              <li><a href="#em-em">Learn our engagement modals</a></li>
              <li><a href="#hdiw-em">Would like to learn how FMT works?</a></li>
              <li><a href="#fmtg-em">General questions about IP protection, payment terms, resource availability </a></li>
              <li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal0">I am in need to hire a Techie</a></li>
              <li><a href="http://www.findmetechie.com/request-a-quote/">I have firmed up requirements and am looking for a quote</a></li>
              <li><a href="http://www.findmetechie.com/build-developement-team/">I would like to build a team with specific skills and experience level</a></li>
              <li><a href="http://www.findmetechie.com/contact-us/">I would like to speak with someone at Team FMT first...</a></li>
            </ul>
            <div class="cl"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			the_title('<div class="text-center" id="em-em"><h3 class="title_heading">', '</h3></div>');
		endwhile;
		?>
      <?php $content_blocks = new Attachments( 'content_blocks' ); 
		 $count=0;
		?>
      <?php if( $content_blocks->exist() ) : ?>
      <div class="row">
        <?php while( $content_blocks->get() ) : ?>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 emBlock">
          <div class="thumbBlock"><?php echo $content_blocks->image( 'fullsize' ); ?>
            <h3 class="text-primary text-capitalize"><?php echo $content_blocks->field( 'title' ); ?></h3>
          </div>
          <div class="insideBlock"> <?php echo $content_blocks->field( 'description' ); ?>
            <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#myModal0"><?php echo $content_blocks->field( 'buttontext' ); ?></button>
            <!-- <a href="<?php echo $content_blocks->field( 'buttonlink' ); ?>" class="btn btn-lg"><?php echo $content_blocks->field( 'buttontext' ); ?></a>-->
          </div>
        </div>
        <?php $count++;
		   endwhile; ?>
      </div>
      <?php endif; ?>
      <?php $how_work_Page_id = 1028; $how_work_Page = get_page($how_work_Page_id);?>
      <?php if(!empty($how_work_Page)) : ?>
      <div class="cl"></div>
      <section class="emp_work" id="hdiw-em">
        <div class="container">
          <div class="text-center">
            <h3 class="title_heading"><?php echo apply_filters('post_title', $how_work_Page->post_title);?></h3>
          </div>
          <?php echo apply_filters('the_content', $how_work_Page->post_content); ?>
          <div class="row-cusrtom">
            <?php $how_work_blocks = new Attachments( 'content_blocks',$how_work_Page_id ); /* pass the instance name */ ?>
            <?php if( $how_work_blocks->exist() ) : ?>
            <?php 
		while( $how_work_blocks->get() ) : 
			
	    ?>
            <div class="col-md-3 col-sm-6 col-xs-12 custom_pad">
              <div class="inner_content">
                <div class="icon_container"> <?php echo $how_work_blocks->image( 'full' );?> </div>
                <?php echo $how_work_blocks->field( 'description' ); ?> </div>
            </div>
            <?php 



					endwhile; 



					endif;



					?>
          </div>
        </div>
      </section>
      <?php endif; ?>
      <?php $gurantee_Page_id = 1034; $gurantee_Page = get_page($gurantee_Page_id);?>
      <?php if(!empty($gurantee_Page)) : ?>
      <section class="guarantee" id="fmtg-em">
        <div class="container">
          <div class="text-center">
            <h3 class="title_heading"><?php echo apply_filters('post_title', $gurantee_Page->post_title);?></h3>
          </div>
          <?php echo apply_filters('the_content', $gurantee_Page->post_content); ?>
          <?php $gurantee_blocks = new Attachments( 'content_blocks',$gurantee_Page_id ); /* pass the instance name */ ?>
          <?php if( $gurantee_blocks->exist() ) : ?>
          <?php 
		 $garanteecount=1;
		while( $gurantee_blocks->get() ) : 
			
	    ?>
          <div class="col-md-3 col-sm-6 col-xs-12 custom_pad_0 bor_<?php echo $garanteecount;  ?>">
            <h5><?php echo $gurantee_blocks->field( 'title' );?></h5>
            <?php echo $gurantee_blocks->field( 'description' ); ?> </div>
          <?php 


                     $garanteecount++;
					endwhile; 



					endif;



					?>
        </div>
      </section>
      <?php endif; ?>
    </div>
    <!--div class="subtitles-text">




          <h3></h3>



        </div-->
    <!--<a href="<?php //echo home_url();?>/sign-up-employer" class="build-your-team">Register</a>-->
  </div>
  <div class="clearfix"></div>
</div>
<!-- homeRow1 End-->
<!-- Model Box End  -->
<div id="featured-techie">
  <div class="techieServices">
    <div class="container">
      <div class="fullBlock">
        <h2 class="techie_headings_seo">Techies</h2>
        <h2>Discover the new way to work. Let's start..</h2>
        <p>"I liked the idea of getting consistent work based on my availability and skills. Freedom to work comes with commitment and responsibility and you enjoy more when you work without office politics. Moreover, your deliverables are first internally tested by FMT QA team and the process is so seamless that it is fun working."</p>
        <div class="linkSerivice">
          <ul>
            <li><a href="http://www.findmetechie.com/sign-up-techie/">I want to work</a></li>
            <li><a href="#hdiw-tech">I would like to know how it works</a></li>
            <li><a href="#wot-tech">Who are normally FMT techies</a></li>
            <li><a href="#afmt-tech">What's an advantage to work with FMT</a></li>
            <li><a href="http://www.findmetechie.com/faq/">How will I be paid?</a></li>
          </ul>
          <div class="cl"></div>
        </div>
      </div>
      <div class="cl"></div>
      <div class="leftBlock">
        <div class="emCaraousel">
          <h2>Skills that FMT is currently looking for</h2>
          <div id="myCarouseTEChie1" class="carousel slide" data-ride="carousel">
            <div class="heightBlock">
              <ol class="carousel-indicators" style="z-index:1 !important">
                <li data-target="#myCarouseTEChie1" data-slide-to="0" class="active"></li>
                <li data-target="#myCarouseTEChie1" data-slide-to="1"></li>
                <li data-target="#myCarouseTEChie1" data-slide-to="2"></li>
                <li data-target="#myCarouseTEChie1" data-slide-to="3"></li>
                <li data-target="#myCarouseTEChie1" data-slide-to="4"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <div class="itemText">
                    <p>Certified SiteCore CMS developers with 4 plus years of experience.
                      <bdo>Location anywhere ..</bdo>
                    </p>
                  </div>
                </div>
                <div class="item">
                  <div class="itemText">
                    <p>E-Commerce architect to provide consultancy for migration of older technology stack to emerging technologies -
                      <bdo>Remote - Anywhere</bdo>
                    </p>
                  </div>
                </div>
                <div class="item">
                  <div class="itemText">
                    <p>Sharepoint developers in
                      <bdo>USA</bdo>
                    </p>
                  </div>
                </div>
                <div class="item">
                  <div class="itemText">
                    <p>ReactJS developers -
                      <bdo>Singapore</bdo>
                    </p>
                  </div>
                </div>
                <div class="item">
                  <div class="itemText">
                    <p>Front end developer in
                      <bdo>Germany</bdo>
                    </p>
                  </div>
                </div>
              </div>
              <!--<img src="<?php // echo get_stylesheet_directory_uri()?>/images/invertEnd.png" id="invertedComma" alt="" /><br/>-->
            </div>
          </div>
        </div>
      </div>
      <div class="rightBlock">
        <div class="emCaraousel">
          <h2>Resources available worldwide</h2>
          <div id="myCarouseTEChie2" class="carousel slide" data-ride="carousel">
            <div class="heightBlock">
              <ol class="carousel-indicators" style="z-index:1 !important">
                <li data-target="#myCarouseTEChie2" data-slide-to="0" class="active"></li>
                <li data-target="#myCarouseTEChie2" data-slide-to="1"></li>
                <li data-target="#myCarouseTEChie2" data-slide-to="2"></li>
                <li data-target="#myCarouseTEChie2" data-slide-to="3"></li>
                <li data-target="#myCarouseTEChie2" data-slide-to="4"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <div class="itemText">
                    <p>Twelve years experienced PHP developer available in UK for onsite work as contractor</p>
                  </div>
                </div>
                <div class="item">
                  <div class="itemText">
                    <p>UX resources available in USA on project consultancy basis</p>
                  </div>
                </div>
                <div class="item">
                  <div class="itemText">
                    <p>Ruby on Rails - Remote resource with experience of nine years is available</p>
                  </div>
                </div>
                <div class="item">
                  <div class="itemText">
                    <p>iOS and Android developers - remote available on project basis</p>
                  </div>
                </div>
                <div class="item">
                  <div class="itemText">
                    <p>Drupal CMS developer available on project basis - Remote</p>
                  </div>
                </div>
              </div>
              <!--<img src="<?php // echo get_stylesheet_directory_uri()?>/images/invertEnd.png" id="invertedComma" alt="" /><br/>-->
            </div>
          </div>
        </div>
      </div>
      <div class="cl"></div>
    </div>
  </div>
  <?php $who_are_Page_id = 1076; $who_are_Page = get_page($who_are_Page_id);?>
  <?php if(!empty($who_are_Page)) : ?>
  <section class="whoTechies" id="wot-tech">
    <div class="container">
      <div class="text-center">
        <h3 class="title_heading"><?php echo apply_filters('post_title', $who_are_Page->post_title);?></h3>
      </div>
      <div class="techiesPoints"> <?php echo apply_filters('the_content', $who_are_Page->post_content); ?> </div>
    </div>
  </section>
  <?php endif; ?>
  <?php $techie_how_work_Page_id = 1078; $techie_how_work_Page = get_page($techie_how_work_Page_id);?>
  <?php if(!empty($techie_how_work_Page)) : ?>
  <div class="cl"></div>
  <section class="emp_work employerSide" id="hdiw-tech">
    <div class="container">
      <div class="text-center">
        <h3 class="title_heading"><?php echo apply_filters('post_title', $techie_how_work_Page->post_title);?></h3>
      </div>
      <?php echo apply_filters('the_content', $techie_how_work_Page->post_content); ?>
      <div class="row-cusrtom">
        <?php $techie_how_work_blocks = new Attachments( 'content_blocks',$techie_how_work_Page_id ); /* pass the instance name */ ?>
        <?php if( $techie_how_work_blocks->exist() ) : ?>
        <?php 
		while( $techie_how_work_blocks->get() ) : 
			
	    ?>
        <div class="col-md-3 col-sm-6 col-xs-12 custom_pad">
          <div class="inner_content">
            <div class="icon_container"> <?php echo $techie_how_work_blocks->image( 'full' );?> </div>
            <?php echo $techie_how_work_blocks->field( 'description' ); ?> </div>
        </div>
        <?php 



					endwhile; 



					endif;



					?>
      </div>
    </div>
  </section>
  <?php endif; ?>
  <?php $advantage_fmt_Page_id = 1086; $advantage_fmt_Page = get_page($advantage_fmt_Page_id);?>
  <?php if(!empty($advantage_fmt_Page)) : ?>
  <section class="advantage-fmt" id="afmt-tech">
    <div class="container">
      <div class="text-center">
        <h3 class="title_heading"><?php echo apply_filters('post_title', $advantage_fmt_Page->post_title);?></h3>
      </div>
      <div class="techiesPoints"><?php echo apply_filters('the_content', $advantage_fmt_Page->post_content); ?></div>
    </div>
  </section>
  <?php endif; ?>
  <div class="container text-center buttonContainer">
    <div class="join_techie"> <a href="<?php echo home_url();?>/sign-up-techie" class="build-your-team ">Join as a techie</a>
      <div class="seeme"> <a  href="<?php echo get_permalink(38); ?>">See All Profiles</a></div>
    </div>
  </div>
</div>
<section id="technologies" class="wow fadeInDown technologies-stack" data-wow-duration="1000ms" data-wow-delay="200ms" >
    <div class="container">
        <h3>Our Technology Stack</h3>
        <div class="layer"></div>
		<ul class="tech-list">
<?php $get_terms_default_attributes = array (
		'taxonomy' => 'technologycategory',
		'orderby' => 'date',
		'hide_empty' => false,
		'order' => 'ASC',
		'posts_per_page' => -1);
		
		$terms = get_terms($get_terms_default_attributes);
		?>
<?php foreach ($terms as $term) {
		$catIcon = get_field('technology_category_icon', $term);
?>       
	   
            <li class="<?php echo $term->name;?>">
			   <div class="tech_single">
				  <div class="tech-icon-holder">
                       <img src="<?php echo $catIcon['url'];?>" alt="<?php echo $term->name;?>">
                    </div> 
                    <h4><?php echo $term->name; ?></h4>
                </div>
                <div class="populated_tech">
                    <div class="technology-related">
                    <h5><?php echo $term->description; ?></h5>
                    <ul>
					<?php   $get_args = array (
							'post_type' => 'technology',
							'post_status' => 'publish',
							'tax_query' => array(
								array(
								'taxonomy' => 'technologycategory',
								'field' => 'term_id',
								'terms' => $term->term_id
								)
							),
							'posts_per_page' => -1); 
							 
							$multechnologies = get_posts($get_args);			
 		
				foreach ($multechnologies as $sintechnology) {
						?>
												
						<li><a href="<?php echo get_permalink($sintechnology->ID); ?>"><img src="<?php echo $featured_img_url = get_the_post_thumbnail_url($sintechnology->ID,''); ?>"/><?php echo $sintechnology->post_title; ?></a></li>
                       
						<?php }?>
                        <p class="newContent">FindMeTechie provides Adobe certified techies who have got the maximum knowledge of the product and have better understanding of project problems and structuring tools.</p>
                     </ul>
                   <button style="background-image: url(https://www.findmetechie.com/wp-content/themes/findmetechie/images/coss-tech.png);" class="close-btn">close</button>
                </div>
            </div>
            </li>
			
			<?php } ?>
			</ul>
			</div>
			</section>
<div class="clearfix"></div>
<div class="clearfix"></div>


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
</content>
</div>
<!-- Model Express Interest Start  -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog1 ">
    <!-- Modal content-->
    <div class="modal-content modal-content1">
      <div class="modal-header1">
        <button type="button" class="close close2" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div id="hire_me_loader" style="display:none;"><img src="<?php echo get_stylesheet_directory_uri()?>/images/loading.gif" alt="hire_me" ></div>
        <div id="thank-you-msg-employer" class="thank-you"> <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thanks-tick.png" alt="employer"/></span>
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
<script type="text/javascript">

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
jQuery('a.page-scroll').on('click', function(e){
	var anchor = jQuery(this);
	jQuery('html, body').stop().animate({
		scrollTop: jQuery(anchor.attr('href')).offset().top - 0
	}, 1000);
	e.preventDefault();
});				
</script>


<?php get_footer(); ?>