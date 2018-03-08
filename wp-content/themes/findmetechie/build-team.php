<?php
/**
 * Template Name: buildteam
 */

wp_dequeue_script( 'jquery-ui-mouse' );
wp_deregister_script( 'jquery-ui-mouse' );

get_header(); ?>

<div id="primary" class="content-area">
  <content>
  <div id="buildteamform">
    <div class="back_trance_bg">
      <div class="container">
        <div id="step-1" class="steps_techi">
          <div class="step_bar">
            <ul>
              <li class="active"> Step 1 </li>
              <li> Step 2 </li>
            </ul>
          </div>
          <div class="title">
            <h3>build your own developement team</h3>
          </div>
          <div class="row"></div>
          <div class="col-md-3 col-xs-6 pad-0 leftDiv">
            <div class="background_gray">
              <h3>KINDLY SELECT SKILLS AND DRAG AND DROP TO BUILD YOUR TEAM</h3>
              <ul class="techi-list list-of-techi">
                <li class="Business-Analyst" data-team="Business Analyst" data-img="analyst">
                  <p>Business Analyst</p>
                </li>
                <li class="Project-Manager" data-team="Project Manager" data-img="manager">
                  <p>Project Manager</p>
                </li>
                <li class="Technical-Architect" data-team="Technical Architect" data-img="architech">
                  <p>Technical Architect</p>
                </li>
                <li class="QA" data-team="QA" data-img="qa">
                  <p>QA</p>
                </li>
                <li class="Developer" data-team="Developer" data-img="developer">
                  <p>Developer</p>
                </li>
                <li class="UX-Designer" data-team="UX Designer" data-img="designer">
                  <p>UX Designer</p>
                </li>
                <li class="UI-Designer" data-team="UI Designer" data-img="uidesigner">
                  <p>UI Designer</p>
                </li>
                <li class="Tech-Lead" data-team="Tech Lead" data-img="t_lead">
                  <p>Tech Lead</p>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-9 col-xs-6 pad-0 rightDiv">
            <div class="guide-line">
              <h2>You have not added any team member yet</h2>
              <h5>Drag and drop a team member from left panel</h5>
              <img class="guide-img" src="<?php echo get_stylesheet_directory_uri()?>/images/drag-drop.png" alt="drop">
              <div class="step-tips-bg">
                <h4><img src="<?php echo get_stylesheet_directory_uri()?>/images/bulb.png" alt="curl"> Useful Tips</h4>
                <ul style="min-height: 200px;">
                  <li> Get a quote in no time </li>
                  <li>Highly experienced professional developers </li>
                  <li>Creative UI Designers and  UX Designers </li>
                </ul>
              </div>
            </div>
            <div class="banner_techie">
              <div class="step-tips-bg">
                <div class="curl"><img src="<?php echo get_stylesheet_directory_uri()?>/images/curly-2.png" alt="curl"></div>
                <h4><img src="<?php echo get_stylesheet_directory_uri()?>/images/bulb.png" alt="curl"> Useful Tips</h4>
                <ul style="min-height: 200px;">
                  <li>Get a quote in no time </li>
                  <li>Highly experienced professional developers </li>
                  <li>Creative UI Designers and  UX Designers </li>
                </ul>
              </div>
            </div>
            <div class="selected_techie">
              <ul class="selected-techi-list list-of-techi bor-dotted" style="min-height:340px;">
                <h5>Drag and drop a team member from left panel</h5>
              </ul>
            </div>
            <a href="#step-2" id="next_step_btn" class="form-control submit_developer mgt-40">CONTINUE AND FILL DETAILS</a>
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
          <div class="step-tips-bg mobile_only">
            <div class="curl"><img src="<?php echo get_stylesheet_directory_uri()?>/images/curly-2.png" alt="curl"></div>
            <h4><img src="<?php echo get_stylesheet_directory_uri()?>/images/bulb.png" alt="curl"> Useful Tips</h4>
            <ul>
              <li>Get a quote in seconds rather than hours or days through tepfin’s </li>
              <li>Highly experienced professional developers </li>
              <li>Creative UI Designers and  UX Designers </li>
              <li>Get a quote in seconds rather than hours or days through </li>
            </ul>
          </div>
        </div>
        <div id="step-2" class="steps_techi">
          <div class="step_bar">
            <ul>
              <li> Step 1 </li>
              <li class="active"> Step 2 </li>
            </ul>
          </div>
          <div class="title">
            <h3>build your own developement team</h3>
          </div>
          <div class="row"></div>
          <div class="col-md-12 col-xs-12 pad-0">
            <div class="background_gray techie_tab">
              <div class="">
                <!-- Nav tabs -->
                <ul id="list-team" class="nav nav-tabs step-two-tile" role="tablist">
                </ul>
                <!-- Tab panes -->
                <form id="dform" name="dform" method="post">
                  <!-- Model Box Start  -->
                  <div class="modal fade hireTechie" id="buildteam-Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div id="hire_a_techie_pop_up" class="pop_up_techie">
                      <div class="back_trance_bg">
                        <div class="pop_up_techie">
                          <div class="back_trance_bg">
                            <div class="container">
                              <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12 col-sm-offset-4 col-md-offset-4">
                                  <div class="pad-right-tech sign-up-padding">
                                    <h4>Get Started</h4>
                                    <input type="text" name="firstname" class="form-control hire_developer" placeholder="First Name" required="required" />
                                    <input type="text" name="lastname" class="form-control hire_developer" placeholder="Last Name" required="required" />
                                    <input type="email" name="email" class="form-control hire_developer" placeholder="E-mail"  required="required" />
                                    <input type="submit" class="form-control submit_developer" value="Submit">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Model Box Close  -->
                  <div class="tab-content step-two-content teamList-form-container">
                    <div id="step-2-thank-you-msg" class="thanks-box">
                      <span><img src="<?php echo get_stylesheet_directory_uri()?>/images/thanks-tick.png"></span>
                      <h4>Thanks</h4>
                      <p>Thank you for sending your request. One of our representative will get in touch back to you soon.</p>
                    </div>
                    
                    
                  </div>
                 	 <div class="clearfix"></div>
                  	 <div class="button3-outer">
                     <a href="#step3" id="submit-step-2-form" class="form-control submit_developer mgt-40">CONTINUE</a>
                     <a href="#step2" id="back_step_btn" class="backButton">&laquo; Go Back</a></div>
                </form>
                
                     <div class="clearfix"></div>
                <div class=" step-tow-tips">
                  <div class="curl"><img src="<?php echo get_stylesheet_directory_uri()?>/images/curly-2.png" alt="curl"></div>
                  <h4><img src="<?php echo get_stylesheet_directory_uri()?>/images/bulb.png" alt="curl"> Useful Tips</h4>
                  <ul>
                    <li> Get a quote in seconds rather than hours or days through tepfin’s </li>
                    <li>Highly experienced professional developers </li>
                    <li>Creative UI Designers and  UX Designers </li>
                    <li>Get a quote in seconds rather than hours or days through </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</content>
</div>       
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script>
<script type='text/javascript' src='http://www.findmetechie.com/wp-includes/js/jquery/jquery.ui.touch-punch.js?ver=0.2.2'></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.validate.min.js"></script>
<script type="text/javascript">

jQuery(document).ready(function(){
	jQuery('#step-2-thank-you-msg, #next_step_btn, #step-2').hide();	
	
	jQuery("#gideline").click(function(e){
		e.preventDefault();
		var selected_techies = jQuery('.selected-techi-list').html().indexOf("delm");
		console.log(selected_techies);
		if (selected_techies < 0){
			alert('Please drag and drop at least one team member from left panel.');
		}else{
			jQuery('#next_step_btn').show();
			jQuery('#gideline').hide();
		}
	});
	
	jQuery("#next_step_btn").click(function(e){
		e.preventDefault();
		var selected_techies = jQuery('.selected-techi-list').html().indexOf("delm");
		if (selected_techies < 0){
			alert('Please drag and drop at least one team member from left panel.');
			return false;
		}
		jQuery('#step-1').hide();
		jQuery('#step-2').show();
		
		jQuery(".selected-techi-list li" ).each(function(index, value) {
			//console.log('div' + index + ':' + jQuery(this).attr('data-team')); 
			var teamMember = jQuery(this).find('p').text();	
			var clsName = (index == 0) ? "active" : "";
		
			jQuery("#list-team").append('<li data-valid="data'+index+'" role="presentation" class='+ clsName +'><a href="#tab'+index+'" aria-controls="#tab'+index+'" role="tab" data-toggle="tab"><div class="icon_tech"><img src="<?php echo get_stylesheet_directory_uri()?>/images/'+jQuery(this).attr('data-img')+'.jpg"></div>' + teamMember + '</a><div class="active-pos"><img src="<?php echo get_stylesheet_directory_uri()?>/images/tab-acrtive.jpg"></div></li>');

			jQuery(".teamList-form-container").append('<div role="tabpanel" data-valid="data'+index+'" class="tab-pane '+ clsName +'" id="tab'+index+'"><div class="teche_details_form"><div class="step-two-form"><h4>' + teamMember + '</h4><p class="text-orange">* Mandatory Fields</p><input type="hidden" name="position['+index+']" value="'+ teamMember +'" /><input class="form-control hire_developer" data-valid="data'+index+'" name="technology['+index+']" placeholder="Role Title*" type="text" pattern="[a-zA-Z0-9 ]+[a-zA-Z0-9 ]" required="required"><select class="form-control hire_developer" data-valid="data'+index+'" name="experience['+index+']" required="required"><option value="">Experience*</option><option value="0">Fresher</option><option value="1">1 Year</option><option value="2">2 Years</option><option value="3">3 Years</option><option value="4">4 Years</option><option value="5">5 Years</option><option value="6">6 Years</option><option value="7">7 Years</option><option value="8">8 Years</option><option value="9">9 Years</option><option value="10">10 Yrs&amp;above</option></select><textarea rows="3" class="form-control hire_developer" data-valid="data'+index+'" name="job_description['+index+']" placeholder="Job Description*"  pattern="[a-zA-Z0-9 ]+[a-zA-Z0-9 ]" required="required"></textarea><ul class="onsiteLeft"><li><input type="radio" data-valid="data'+index+'" name="jobsite['+index+']" id="onsite'+index+'" value="On Site" checked><label for="onsite'+index+'">ON SITE</label></li><li><input type="radio" data-valid="data'+index+'" name="jobsite['+index+']" id="offsite'+index+'" value="Off Site"><label for="offsite'+index+'">OFF SITE</label></li><li><input type="radio" data-valid="data'+index+'" name="jobtype['+index+']" id="parttime'+index+'" value="Part Time" checked><label for="parttime'+index+'">PART TIME</label></li><li><input type="radio" data-valid="data'+index+'" name="jobtype['+index+']" id="fulltime'+index+'" value="Full Time"><label for="fulltime'+index+'">FULL TIME</label></li></ul><div class="cl"></div></div></div></div>');
		});
	});
	
	jQuery("#back_step_btn").click(function(e){
		e.preventDefault();
		jQuery('#step-2').hide();
		jQuery('#step-1').show();
		jQuery("#list-team").html('');
		jQuery(".selected-techi-list li" ).each(function(index, value) {
			jQuery('.teamList-form-container #tab'+index).remove();
		});
	});
	
	function validateTab(data) {
		jQuery("ul#list-team > li, #dform .tab-pane").removeClass("active")
		jQuery("ul#list-team > li, #dform .tab-pane").addClass("rolecompletedev")
		jQuery("ul#list-team > li[data-valid=" +data+"], #dform .tab-pane[data-valid=" +data+"]").addClass("active");
	}
	
	var dataValid = true; var cactive = false;
	jQuery("#submit-step-2-form").click(function(e){
		e.preventDefault();
		var checkTab = ''; dataValid = true;
		   // Remove previous error messages
            jQuery(".error").remove();
			
			//alert(checkTab);
           //////
		jQuery("#dform .tab-pane").each(function() {
		if(jQuery(this).hasClass('active'))
			cactive = true;
		else
			cactive = false;
		if((jQuery(this).find("input[type='text']").val() == '') || (jQuery(this).find("select").val() == '') || (jQuery(this).find("textarea").val() == '')){
			if(jQuery(this).find("input[type='text']").val() == '') {
				dataValid = false;
				checkTab = jQuery(this).find("input[type='text']").attr("data-valid");
				if(cactive == true)
					jQuery(this).find("input[type='text']").after( "<label for='technology' generated='true' class='error'>Please enter role title</label>" );
				validateTab(checkTab);
				//jQuery(this).find("input[type='text']").focus();
				//return false;
			}
			
			if(jQuery(this).find("select").val() == '') {
				dataValid = false;
				checkTab = jQuery(this).find("select").attr("data-valid");
				if(cactive == true)
					jQuery(this ).find("select").after( "<label for='technology' generated='true' class='error'>Please select experience</label>" );
				validateTab(checkTab);
				//jQuery(this).find("select").focus();
				//return false;
			}
			
			if(jQuery(this).find("textarea").val() == '') {
				dataValid = false;
				checkTab = jQuery(this).find("textarea").attr("data-valid");
				if(cactive == true)
					jQuery(this).find("textarea").after( "<label for='technology' generated='true' class='error'>Please enter job description</label>" );
				validateTab(checkTab);
				//jQuery(this).find("textarea").focus();
				//return false;
				
			}
			
			
			return false;
			
			}
			
			
			
			
		});

		if(dataValid == true)
			jQuery('#buildteam-Modal').modal('show');
	});
	
	
	 
	/*
	jQuery("#dform").submit(function(e){
		e.preventDefault();
		if (dataValid == false) {
			alert("Please fill all required fields!");
			return false;
		}else{
			var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
			jQuery.ajax({
				type: "POST",
				url : ajaxurl,
				data : { 
					action :'buildteam',
					querydata: jQuery('#dform').serialize()
				},
				success:function(data){
					//console.log(data);
					jQuery('.teche_details_form, #submit-step-2-form').hide();
					jQuery('.backButton').hide();					
					jQuery('#buildteam-Modal').modal('hide');
					jQuery('#step-2-thank-you-msg').show();
				}
			});
		}
	});
	*/
	
			jQuery("#dform").validate({
                rules: {
                    firstname: "required", 				
                    lastname: "required",
					email: {
                    required: true,
                    email: true          
                   },
								
                },
                messages: {
                    firstname: "Please enter first name",		
                    lastname: "Please enter last name",
					email: {
                    required: "Please enter email",
                    email: "Please enter valid email"
                    },
										
                },
                submitHandler: function(form) {
				//alert('formtest');
				
				
				
				var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
			jQuery.ajax({
				type: "POST",
				url : ajaxurl,
				data : { 
					action :'buildteam',
					querydata: jQuery('#dform').serialize()
				},
				success:function(data){
					//console.log(data);
					 jQuery('.teche_details_form, #submit-step-2-form').hide();
					jQuery('.backButton').hide();					
					jQuery('#buildteam-Modal').modal('hide');
					jQuery('#list-team').hide();
					jQuery('.button3-outer').hide();
					jQuery('#step-2-thank-you-msg').show();					
					jQuery('.step-two-content').addClass('intro');
				}
			   });
			   
			   
				   /* jQuery('.teche_details_form, #submit-step-2-form').hide();
					jQuery('.backButton').hide();					
					jQuery('#buildteam-Modal').modal('hide');
					jQuery('#list-team').hide();
					jQuery('.button3-outer').hide();
					jQuery('#step-2-thank-you-msg').show();					
					jQuery('.step-two-content').addClass('intro');*/
				
				
				}
            }); 
			
	
	
	
	
	
    jQuery('.techi-list li').draggable({				appendTo: 'ul.selected-techi-list',				containment: "window",				cursor: 'move',				revertDuration: 100,				revert: 'invalid',				helper: 'clone',        		drag: function( event, ui ) {						jQuery('.guide-line').css('display','none');						jQuery('#next_step_btn').show();						jQuery('#gideline').hide();        		}		});	
    jQuery( "ul.selected-techi-list" ).droppable({				accept: '.techi-list li',
        drop: function( event, ui ) { 
			ui.helper.clone().attr('style', '').append('<a class="delm">X</a>').appendTo('ul.selected-techi-list');
			jQuery('.delm').click(function(){
				jQuery(this).parent().remove();
			});
        }
    });
});
</script>
<?php get_footer(); ?>