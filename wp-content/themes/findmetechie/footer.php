<?php
/**
 * The template for displaying the footer
 */
?>
<!-- Model Box Start  -->

<div class="modal fade hireTechie" id="myModal0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <div id="hire_a_techie_pop_up" class="pop_up_techie">
    <div class="back_trance_bg">
      <div class="container">
        <?php 
		if (is_user_logged_in()) {
		$employer_info=get_userdata($user->ID);
		$employer_name = $employer_info->first_name." ".$employer_info->last_name;
		$employer_email = $user->user_email;
		$employer_phone = get_user_meta($user->ID, 'phone', true );
		}else{
		$employer_name = "";
		$employer_email = "";
		$employer_phone = "";
		}
		?>
        <form id="hire_a_techie" name="hire_a_techie" method="post">
          <div class="text-center position">
            <h3 class="title_heading">Hire Techie</h3>
            <div class="mandatoryText">* Mandatory Fields</div>
          </div>
          <div class="col-3 positionIn">
            <div class="pad-right-tech pop-up-holder insight"> <span class="number">1</span>
              <h5>Your Techie Requirement</h5>
              <div class="colHalf first">
                <label>Role Title? <span>*</span> </label>
                <input type="text" name="technology" class="form-control hire_developer" placeholder="Role title? E.g. Front End Developer" maxlength="100"   />
                <label>Desired experience? <span>*</span></label>
                <input type="text"  name="experience" class="form-control hire_developer" placeholder="E.g. 4"  maxlength="30"  />
                <label>Preferences </label>
                <div class="col-sm-12 positionIn no-padding preferences">
                  <div class=" radio-default custom_checkbox first">
                    <input class="strictly_preferences" id="inputHorizontal1" type="checkbox" name="strictly[]" value="FullTime" />
                    <label for="inputHorizontal1">Full Time</label>
                  </div>
                  <div class=" radio-default custom_checkbox">
                    <input class="strictly_preferences" id="inputHorizontal2" type="checkbox" name="strictly[]" value="PartTime" />
                    <label for="inputHorizontal2">Part Time</label>
                  </div>
                  <div class=" radio-default custom_checkbox">
                    <input class="strictly_preferences" type="checkbox" id="inputHorizontal3" name="strictly[]" value="ProjectBased" />
                    <label for="inputHorizontal3">Project Based</label>
                    <a href="<?php echo get_the_permalink(259); ?>" style="display:none;">Build Your Team</a> </div>
                  <div class="cl"></div>
                </div>
              </div>
              <div class="cl"></div>
            </div>
          </div>
          <div class="col-3 positionIn">
            <div class="colHalf insight"> <span class="number">2</span>
              <h5>Your Job or Technology Requirement</h5>
              <div class="expected">
                <label>Job Description <span>*</span></label>
                <textarea rows="6"  name="job_description" class="form-control hire_developer" placeholder="Briefly describe your requirement" ></textarea>
                <label>Technology Requirement <span>*</span></label>
                <input type="text"  maxlength="200" name="technology_requirement" class="form-control hire_developer ex-service-leve" placeholder="Indicate any particular technology you are looking for" />
              </div>
            </div>
            <div class="cl"></div>
          </div>
          <div class="col-3 positionIn">
            <div class="colHalf insight"> <span class="number">3</span>
              <h5>Your Contact Details</h5>
              <div class="expected">
                <div class="position-relative">
                  <label>Name<span>*</span> <span class="pvt_form"><i class="fa fa-lock" aria-hidden="true"></i> Private</span> </label>
                  <input type="text" name="fname" class="form-control hire_developer" placeholder="" maxlength="30" value="<?php echo $employer_name  ?>"  />
                </div>
                <div class="position-relative">
                  <label>Email<span>*</span> <span class="pvt_form"><i class="fa fa-lock" aria-hidden="true"></i> Private</span> </label>
                  <input type="email" name="email" class="form-control hire_developer" placeholder=""  maxlength="60" value="<?php echo $employer_email;  ?>" />
                </div>
                <div class="position-relative">
                  <label>Phone <span class="pvt_form"><i class="fa fa-lock" aria-hidden="true"></i> Private</span> </label>
                  <input type="tel" name="phone" class="form-control hire_developer"  placeholder="(E.g. +1-408-850-0236)"  maxlength="20" value="<?php echo $employer_phone; ?>" />
                </div>
              </div>
              <div class="cl"></div>
            </div>
          </div>
          <div class="cl"></div>
          <div class="col-12 positionIn">
            <div class="submitPannel">
              <div class="BuildTeamDiv"><a href="http://www.findmetechie.com/build-developement-team/">Need to hire more than one Techie</a></div>
              <div class="checkbox-custom checkbox-default custom_checkbox needReusme">
                <input type="checkbox" id="inputBasicRemember" name="Checkbox_Need_Resumes" value="Yes" autocomplete="off" checked="checked"   />
                <label for="inputBasicRemember">NEED RESUMES</label>
              </div>
              <?php $location = getLocationInfoByIp(); ?>
              <?php if($location['country'] != 'IN'){ ?>
              <input id="hire_tech_button" type="submit" class="form-control submit_developer" value="Submit" />
              <?php }else{ ?>
              <button type="button" class="form-control submit_developer" data-toggle="modal" data-target="#useremployer_restrict">Submit</button>
              <?php } ?>
              <div class="cl"></div>
            </div>
          </div>
        </form>
        <div id="thank-you-msg" class="thanks-box"> <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thanks-tick.png" alt="thanks-tick"></span>
          <h4>Thank You for reaching out!</h4>
          <p>You'll hear from us soon. Stay awesome!</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Model Box Close  -->
<!-- Modal box for request a quote popup-->
<div class="modal fade" id="myModal-get-quote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="">
      <div class="get-quote">
        <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class=" get-quote">
        <form id="request_a_quote" action="request-a-quote" method="post" enctype="multipart/form-data" >
          <h2>Thank you for reaching out. <i>Let’s Talk!</i></h2>
          <div class="col-sm-6 col-xs-12">
            <div class="row">
              <div class="col-sm-12 mgb-quote position-relative"> <span class="pvt_form-2"><i class="fa fa-lock" aria-hidden="true"></i> Private</span>
                <input name="request_name" type="text" class="form-control error" placeholder="Name*">
              </div>
              <div class="col-sm-12 mgb-quote position-relative"> <span class="pvt_form-2"><i class="fa fa-lock" aria-hidden="true"></i> Private</span>
                <input name="request_email" type="email" class="form-control" placeholder="Email*">
              </div>
              <div class="col-sm-12 mgb-quote position-relative"> <span class="pvt_form-2"><i class="fa fa-lock" aria-hidden="true"></i> Private</span>
                <input name="request_phone" type="text" class="form-control" placeholder="Phone*(E.g. +1-408-850-0236)">
              </div>
              <div class="col-sm-12 mgb-quote position-relative"> <span class="pvt_form-2"><i class="fa fa-lock" aria-hidden="true"></i> Private</span>
                <input name="request_company_name" type="text" class="form-control" placeholder="Company Name*">
              </div>
              <div class="col-sm-12 mgb-quote">
                <input name="request_website" type="text" class="form-control" placeholder="Website">
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xs-12">
            <div class="row">
              <div class="col-sm-12 mgb-quote">
                <div class="select-style">
                  <select name="project_budget" class="form-control">
                    <option> Select Your Budget</option>
                    <option> Below - $5K</option>
                    <option> $5K - $15K</option>
                    <option> $15K - $25K</option>
                    <option> $25K - $35K</option>
                    <option> $45K - $55K</option>
                    <option> $60K-And Above</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xs-12">
            <div class="row">
              <div class="col-sm-12 mgb-quote">
                <input name="skills_required" type="text" class="form-control" placeholder="What skills are required*">
              </div>
              <div class="col-sm-12 mgb-quote">
                <textarea name="brief_project_info" rows="5" class="form-control" placeholder="Brief Project Information"></textarea>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xs-12">
            <div class="row">
              <div class="col-sm-12 mgb-quote">
                <div class="file-input">
                  <input name="project_attached_file" type="file">
                  <span class="button">Attach</span> <span class="label" data-js-label=""> Attach file (if any) </span> </div>
              </div>
            </div>
          </div>
          </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12 text-center">
			<?php $location = getLocationInfoByIp(); ?>
              <?php if($location['country'] != 'IN'){ ?>
              <button type="submit" class="btn request_quote">Request a Quote</button>
              <?php }else{ ?>
              <button type="button" class="btn request_quote" data-toggle="modal" data-target="#useremployer_restrict">Request a Quote</button>
              <?php } ?>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal box for request a quote popup close-->
<!-- javascript for reguest a quote-->
<script>
var inputs = document.querySelectorAll('.file-input')
for (var i = 0, len = inputs.length; i < len; i++) {
  customInput(inputs[i])
}

function customInput (el) {
  const fileInput = el.querySelector('[type="file"]')
  const label = el.querySelector('[data-js-label]')
  
  fileInput.onchange =
  fileInput.onmouseout = function () {
    if (!fileInput.value) return

    var value = fileInput.value.replace(/^.*[\\\/]/, '')
    el.className += ' -chosen'
    label.innerText = value
  }
}

jQuery('document').ready(function(e)
	   { 
            //e.getPreventDefault();
			
					jQuery.validator.addMethod("phonevalidation",
					function(value, element) {
					return /^[0-9-+]+$/.test(value);
					},
					"Please enter a valid phone number."
					);

			
			jQuery("#request_a_quote").validate({
				  onfocusout: function(element) {
                  this.element(element);
                    },				
                rules: {
                   request_name: "required",
                   request_email:{
                   required: true,
                   email: true,
                   },
				   phone: {
                       required: true,
                       phonevalidation: true,
                   },
				   company_name: "required",
				   skills_required: "required",
                },
                messages: {
                    request_name: "Please enter your name",
                    request_email: "Please enter valid email",
					phone: "Please enter valid phone",
					company_name: "Please enter company name",
					skills_required: "Please enter the required skills",
                    			
                },
                submitHandler: function(form) {
					//alert('fff');
                    form.submit();
					/*var request_name = jQuery('#request_a_quote input[name="request_name"]').val();
			var request_email = jQuery('#request_a_quote input[name="request_email"]').val();
			var request_phone = jQuery('#request_a_quote input[name="request_phone"]').val();
            var request_company_name = jQuery('#request_a_quote input[name="request_company_name"]').val();
			var request_website = jQuery('#request_a_quote input[name="request_website"]').val();
			var project_budget = jQuery('#request_a_quote select[name="project_budget"]').val();
            var skills_required = jQuery('#request_a_quote input[name="skills_required"]').val();    
			var brief_project_info = jQuery('#request_a_quote textarea[name="brief_project_info"]').val();	
			*/
				}
            });  

});

</script>
<!-- javascript for reguest a quote close-->
<!-- JS START FOR POP UP HIRE TECHIE  -->
<script type="text/javascript">
jQuery(document).ready(function(){
	//jQuery('#thank-you-msg').hide();
	//jQuery("#hire_a_techie").submit(function(){		

	//});
});
</script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.validate.min.js"></script>
<script type="text/javascript">
jQuery('document').ready(function(e){ 
	jQuery("#hire_a_techie").validate({
		rules: {
			technology: "required",                 
			experience: {
				required: true,	
				exp_year: true,	              
			},
			job_description: "required",
			technology_requirement: "required",
			fname: "required",
			email: {
				 required: true,
				 email: true          
			},
						
		},
		messages: {
			 technology: "Please enter role title",                   
			 experience: {
				required: "Please enter experience",			
			 },
			job_description: "Please enter job description",
			technology_requirement: "Please enter technology requirement",
			fname: "Please enter your name",
			email: {
				required: "Please enter email",
				email: "Please enter valid email"
			},
								
		},
		submitHandler: function(form) {
			//form.submit();
			var technology = jQuery('#hire_a_techie input[name="technology"]').val();
			var experience = jQuery('#hire_a_techie input[name="experience"]').val();
			var job_description = jQuery('#hire_a_techie textarea[name="job_description"]').val();
			//var strictly = jQuery('#hire_a_techie input[name="strictly"]').val();
			var strictly_arr = [];
			var i = 0;
			jQuery('.strictly_preferences:checked').each(function () {
			   strictly_arr[i++] = jQuery(this).val();
			});
			var strictly =  strictly_arr.join(','); ; 
			var technology_requirement = jQuery('#hire_a_techie input[name="technology_requirement"]').val();
			var fname = jQuery('#hire_a_techie input[name="fname"]').val();
			var email = jQuery('#hire_a_techie input[name="email"]').val();
			var phone = jQuery('#hire_a_techie input[name="phone"]').val();
			var Checkbox_Need_Resumes = jQuery('#hire_a_techie input[name="Checkbox_Need_Resumes"]').val();
			if( fname == '' || email == '' ){
				alert("Please fill all required fields!");
				return false;
			}else{
				var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
				jQuery.ajax({
					type: "POST",
					url : ajaxurl,
					data : { 
						action :'hiretechie',
						technology: technology,
						experience: experience,
						job_description: job_description,
						strictly: strictly,
						technology_requirement: technology_requirement,
						Checkbox_Need_Resumes: Checkbox_Need_Resumes,
						fname: fname,
						email: email,
						phone: phone
					},
					success:function(data){
						console.log(data);
						jQuery('#hire_a_techie').hide();
						jQuery('#thank-you-msg').show();
					}
				});
			}					
		}
	}); 			
	jQuery.validator.addMethod('exp_year', function (value) { 
		return /[a-zA-Z0-9]$/.test(value); 
	}, 'Please enter valid experience.');		 
});
</script>
<!-- JS END FOR POP UP HIRE TECHIE  -->
<!-- <div class="query-fix-btn"><a href="#" data-toggle="modal" data-target="#query-form" class="query-btn">Query?</a></div>
        
        Model Express Interest Start  
        
        <div id="query-form" class="modal fade" role="dialog">
          <div class="modal-dialog"> 
           
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body"> <?php echo str_replace('rows="10"', 'rows="0"', do_shortcode('[contact-form-7 id="13" title="Contact form"]')); ?> </div>
            </div>
          </div>
        </div>-->
<ul class="chat_icons">
  <li class="chat_line query-fix-btn">
    <p class="chat_msg_head"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/chat.png" alt="chat /"> Chat with us </p>
  </li>
</ul>
<ul class="chat_icons two">
  <li class="quote_line"> <a data-toggle="modal" data-target="#myModal-get-quote" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/quote.png" alt="chat /"> Get a quote</a> </li>
</ul>
</div>
<!-- .site-content -->
<div class="cl"></div>
<footer>
  <div class="footer-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 mgb-20">
          <h2><a href="<?php echo home_url(); ?>" class="logo_footer" rel="home" itemprop="url"><img src="<?php echo get_stylesheet_directory_uri()."/images/footer-logo.png"; ?>" alt="logo_fmt" /></a> </h2>
          <?php if ( has_nav_menu( 'footer' ) ) : ?>
          <?php
				wp_nav_menu( array(

					'theme_location' => 'footer',

					'container_class'     => 'qiuck_links',

					'menu_class'   => '',

					'depth'          => 1,

				) );

			?>
          <?php endif; ?>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 mgb-20 mobileBlock">
          <h2>&nbsp;</h2>
          <div class="qiuck_links">
            <?php 
                 $menu_items = wp_get_nav_menu_items(12);
				 $i = 0;
                 $count = count($menu_items);
				 echo '<ul class="width_footer_links">';
				  foreach ( (array) $menu_items as $key => $menu_item ) {
				  $i++;
				   $title = $menu_item->title;
                   $url = $menu_item->url;
				   
				    echo '<li><a href="'.$url.'">'.$title.'</a></li>';
					 if($i % 9 == 0 && $i < $count){
                     echo '</ul><ul class="width_footer_links">';
                     }
				   
				   
				  }
				  echo '</ul>';
                ?>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 mgb-20">
          <div class="social_links">
            <?php if ( has_nav_menu( 'social' ) ) : ?>
            <ul>
              <?php
            // Social links navigation menu.
            $locations = get_nav_menu_locations();
            $menu_items = wp_get_nav_menu_items($locations[ 'social' ]);
            $menu_list = '';
            
            foreach ( (array) $menu_items as $key => $menu_item ) {
                $title = $menu_item->title;
                $url = $menu_item->url;
                $classes = $menu_item->classes;
                $target = ($menu_item->target) ? 'target="_blank"' : '';
                $menu_list .= ' <li><a href="' . $url . '" '.$target.'>'.$title.'</a> </li>';
            }
            echo $menu_list;
            ?>
            </ul>
            <?php endif; ?>
          </div>
          <div class="cl"></div>
          <?php dynamic_sidebar('news-letter-subscribe'); ?>
          <div class="cl"></div>
          <div class="copyright_2017">
            <p><?php echo get_option( 'findmetechie_copyright_text' );; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a href="#" class="scrollup"><i class="fa fa-angle-up scrolltop"></i></a> </footer>
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
<!-- .site -->
<?php wp_footer(); ?>
<script>
var country = '';
jQuery(document).ready(function(){
	jQuery.getJSON("https://freegeoip.net/json/", function (data) {
		country = data.country_name;
		console.log(country);
		
	});
jQuery("#build_team_req").click(function(e) { 
			if(country == 'India'){
				jQuery("#very_unique").click();
				return false;
			}
		});
	});
</script>
<script>
jQuery(window).scroll(function() {    
    var scroll = jQuery(window).scrollTop();
	
    if (scroll >= 500) {
        jQuery(".header-top").addClass("darkHeader");
    } else {
        jQuery(".header-top").removeClass("darkHeader");
    }
});

jQuery(window).scroll(function() {    

    var scroll = jQuery(window).scrollTop();

    if (scroll >= 50) {
        jQuery(".login-box").addClass("darkHeader1");
    } else {
        jQuery(".login-box").removeClass("darkHeader1");
    }
});

//jQuery( ".browsehover" ).hover(
//  function() {	
//    jQuery(".browse-tech-menu").slideToggle(100);
//  }, function() {
 //   jQuery(".browse-tech-menu").slideToggle(100);
//  }
//);

     jQuery(".browsehover").click(function(){ 
	   if (jQuery('#browse-menu-search').css('display') == 'none') {          
			jQuery("#browse-menu-search").show();
			jQuery('#mybrowseSearchInput').focus();
            }else
			{
			jQuery("#browse-menu-search").hide();
			jQuery("#browse-menu-technology").hide();
			jQuery("#mybrowseSearchInput").val("");
			}
	     
	 
      });
	 jQuery(".browse-menu-search-close").click(function(){     
	    jQuery("#browse-menu-search").hide();
	    jQuery("#browse-menu-technology").hide();
	    jQuery("#mybrowseSearchInput").val("");
    });
	
	

//jQuery(".msg_head").click(function(){
   // jQuery(this).next(".msg_body").slideToggle(100);
//})
//.toggle( function() {
  //  jQuery(this).children("span").text("[-]");
//}, function() {
//    jQuery(this).children("span").text("[+]");
//});

function browseSearchFunction() {

    
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('mybrowseSearchInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("browse-menu-technology");
    li = ul.getElementsByTagName('li');
	jQuery("#browse-menu-technology").show();
	var liresult = 0;

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
		   var liresult = 1;
            li[i].style.display = "";
			jQuery('.no-results-found').remove();
        } else {		    
            li[i].style.display = "none";
			jQuery('.no-results-found').remove();
        }
    }
	
	if(liresult === 0)
	{
	   jQuery("#browse-menu-technology").append('<li class="no-results-found">No results found.</li>');
	}
}
jQuery(".searchInput").click(function(){ 
	   if (jQuery('#browse-menu-technology').css('display') == 'none') {          
			jQuery("#browse-menu-technology").show();
			jQuery('#mybrowseSearchInput').focus();
            }else
			{			
			jQuery("#browse-menu-technology").hide();
			jQuery("#mybrowseSearchInput").val("");
			}
	     
	 
});
jQuery(document).on('click', function(e) {
    if ( e.target.id != 'mybrowseSearchInput' ) {
      jQuery("#browse-menu-technology").hide();
    }
});

</script>
<script>
function mobilebrowseSearchFunction() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('mobilemybrowseSearchInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("mobile-browse-menu-technology");
    li = ul.getElementsByTagName('li');
	jQuery("#mobile-browse-menu-technology").show();

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
jQuery(".mobilesearchInput").click(function(){ 
	   if (jQuery('#mobile-browse-menu-technology').css('display') == 'none') {          
			jQuery("#mobile-browse-menu-technology").show();
			jQuery('#mobilemybrowseSearchInput').focus();
            }else
			{			
			jQuery("#mobile-browse-menu-technology").hide();
			jQuery("#mobilemybrowseSearchInput").val("");
			}
	     
	 
});
jQuery(document).on('click', function(e) {
    if ( e.target.id != 'mobilemybrowseSearchInput' ) {
      jQuery("#mobile-browse-menu-technology").hide();
    }
});

</script>
<script>
jQuery('#carouselFade').carousel();
</script>
<?php if(( isset ( $_GET["task"] ) && trim ( $_GET["task"] ) == 'hireme' )){?>
<script type="text/javascript">
    jQuery(window).on('load',function(){
		
        jQuery('.hireTechie').modal('show');
    });
	
	
    </script>
<?php } ?>
<!--- LinkedIn Insight Tag --->
<script type="text/javascript"> _linkedin_data_partner_id = "170491"; </script>
<script type="text/javascript"> (function(){var s = document.getElementsByTagName("script")[0]; var b = document.createElement("script"); b.type = "text/javascript";b.async = true; b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js"; s.parentNode.insertBefore(b, s);})(); </script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=170491&fmt=gif" />
</noscript>

<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 936610770;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/936610770/?guid=ON&amp;script=0"/>
</div>
</noscript>

</body></html>