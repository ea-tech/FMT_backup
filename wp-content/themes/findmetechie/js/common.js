jQuery(document).ready(function($){
	$(".style-select").select2();
	
	$('#uploadbrowsebutton').click(function(){
		$('#fileuploadfield').trigger("click");
	});
	
	$('.restrict_employer_button').click(function(e) {
	   
		e.preventDefault();
		$('.login-box').hide();
		
		
	});
	
	$('#login-hover').click(function(e) {		
		e.preventDefault();
		$(this).toggleClass('active');
		$('.login-box').slideToggle(300);
			});		
		
		$('.hamburgerMenu').hover(function(e) {
			//alert('hamburgerMenu');
        $('.login-box').hide();
		$( "#useremployer_restrict" ).removeClass( "in" ).addClass( "out" );
		//$('#useremployer_restrict').hide();
		//$('.browse-tech-menu').hide();        		
		e.preventDefault();		$(this).toggleClass('active');		$('.dropdown-menu').slideToggle(300);																																					   		});
	
	$('#login-hover-d').click(function(e) {
		//alert('login');
		$('.dropdown-menu').hide();
		
		//$('#useremployer_restrict').hide();
		$( "#useremployer_restrict" ).removeClass( "in" ).addClass( "out" );
		//$('.browse-tech-menu').hide(); 
		e.preventDefault();
		$(this).toggleClass('active');
		$('.login-box').slideToggle(300);
	});
	
	$('.login-box .fa-close').click(function(e) {
		e.preventDefault();
		$('#login-hover, #login-hover-d').removeClass('active');
		$('.login-box').slideUp(300);
	});

	$('.buildButton').click(function() {
		$('.homeRow2').hide();
		$('.homeRow2-detail').show();
	});
	
	$('#development-next').click(function() {
		setSkills(1);
		$('#development-tab').removeClass('active');
		$('#ui-tab').addClass('active');
		$('#development').removeClass('active');
		$('#ui').addClass('active');
	});
	$('#ui-next').click(function() {
		setSkills(2);
		$('#ui-tab').removeClass('active');
		$('#qa-tab').addClass('active');
		$('#ui').removeClass('active');
		$('#qa').addClass('active');
	});
	$('#qa-next').click(function() {
		setSkills(3);
		$('.tabbable').hide();
		$('.submit-form').show();
	});
	$('#link-to-submit1').click(function(e) {
		e.preventDefault();
		setSkills(1);
		$('.tabbable').hide();
		$('.submit-form').show();
	});
	$('#link-to-submit2').click(function(e) {
		e.preventDefault();
		setSkills(2);
		$('.tabbable').hide();
		$('.submit-form').show();
	});
	$('#link-to-submit3').click(function(e) {
		e.preventDefault();
		setSkills(3);
		$('.tabbable').hide();
		$('.submit-form').show();
	});
	
	$('.tap-to-close').click(function(e) {
		e.preventDefault();
		$(".navbar-collapse").removeClass("in");
	});
	
	
	
	$('#menu-main-navigation a[href*="#"]:not([href="#"]), #mobileMenu a[href*="#"]:not([href="#"]), .scroll_down a[href*="#"]:not([href="#"]),  a.onpage[href*="#"]:not([href="#"])').click(function() {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		if (target.length) {
			$('#mobileMenu').hide();					
			$('#mobileMenu').removeClass('collapse in');
					$('html, body').animate({
							scrollTop: target.offset().top-50
					}, 1000);
				}
			return false;
		}
	});
	
	
	
	
	$('.col-1 a[href*="#"]:not([href="#"])').click(function() {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {		
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		if (target.length) {
			//$('#mobileMenu').hide();					
			//$('#mobileMenu').removeClass('collapse in');
					$('html, body').animate({
							scrollTop: target.offset().top-70
					}, 1000);
				}
			return false;
		}
	});
	$('.linkSerivice a[href*="#"]:not([href="#"])').click(function() {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {		
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		if (target.length) {
			//$('#mobileMenu').hide();					
			//$('#mobileMenu').removeClass('collapse in');
					$('html, body').animate({
							scrollTop: target.offset().top-70
					}, 1000);
				}
			return false;
		}
	});
	
	
	$('.rightpanelbox a[href*="#"]:not([href="#"])').click(function() {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {		
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		if (target.length) {
			//$('#mobileMenu').hide();					
			//$('#mobileMenu').removeClass('collapse in');
					$('html, body').animate({
							scrollTop: target.offset().top-70
					}, 1000);
				}
			return false;
		}
	});
	
	jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.scrollup').fadeIn();
        } else {
            jQuery('.scrollup').fadeOut();
        }
    });

    jQuery('.scrollup').click(function () {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

});

 jQuery(document).ready(function() {
        if (deviceType()) {
            jQuery(".tech-list > li").on("click", function(event){
                if (event.target.classList.contains("close-btn")) {
                     jQuery(".tech-list li").removeClass("active");
					 jQuery(".layer").css("display", "none");
                } else {
                     jQuery(".tech-list li").removeClass("active");
                     jQuery(this).addClass("active");
					 jQuery(".layer").css("display", "block");
					 var populated_tech = jQuery(".tech-list li.active .populated_tech");
                    if (populated_tech && ((jQuery(window).height() + jQuery(document).scrollTop()) - populated_tech.offset().top) < populated_tech.height()) {
                        jQuery('html, body').animate({scrollTop: (jQuery(".tech-list li.active").offset().top - 55)}, 'slow');
                    }
                }
            }); 
        } else { 
            jQuery(document).on({
                mouseenter:function(event){ 
                    jQuery(".tech-list li").removeClass("active");
                    jQuery(this).addClass("active");
                    jQuery(".layer").css("display", "block");
					var populated_tech = jQuery(".tech-list li.active .populated_tech");
                    if (populated_tech && ((jQuery(window).height() + jQuery(document).scrollTop()) - populated_tech.offset().top) < populated_tech.height()) {
                        jQuery('html,body').animate({
                            scrollTop: jQuery(window).scrollTop() + (populated_tech.height() - ((jQuery(window).height() + jQuery(document).scrollTop()) - populated_tech.offset().top))
                        });
                    }
                },
                mouseleave:function(){ 
                    jQuery(".tech-list li").removeClass("active");
                    jQuery(".layer").css("display", "none");
                },
            }, 
           '.tech-list > li'
            );
        } 
    }); 
 
function setSkills(n){
	var technology = jQuery("#team_form"+n+" select[name=technology]").val();
	var experience = jQuery("#team_form"+n+" select[name=experience]").val();
	var onsite = jQuery("#team_form"+n+" input[name=onsite]:checked").val();
	var part_time = jQuery("#team_form"+n+" input[name=part_time]:checked").val();
	var duration = jQuery("#team_form"+n+" select[name=duration]").val();
	var budget = jQuery("#team_form"+n+" select[name=budget]").val();
	jQuery('#skill_desc_'+n).html(technology+', '+experience+', '+onsite);
	var skill = '';
	if(n == 1){
		skill = 'Development';
	}else if(n == 2){
		skill = 'UI';
	}else if(n == 3){
		skill = 'QA';
	}
	jQuery("#team_form4 input[name=skill_"+n+"]").val(skill);
	jQuery("#team_form4 input[name=technology_"+n+"]").val(technology);
	jQuery("#team_form4 input[name=experience_"+n+"]").val(experience);
	jQuery("#team_form4 input[name=osos_"+n+"]").val(onsite);
	jQuery("#team_form4 input[name=ptft_"+n+"]").val(part_time);
	jQuery("#team_form4 input[name=duration_"+n+"]").val(duration);
	jQuery("#team_form4 input[name=budget_"+n+"]").val(budget);
	
	
}

//jQuery('#carouselFade').carousel();