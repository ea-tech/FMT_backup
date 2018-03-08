<?php
/**
 * Template Name: test Sign Up techie
 */

get_header(); 
$type = 'techie';
if(!empty($_REQUEST['type']) && ($_REQUEST['type'] == 'employer'))
	$type = 'employer';
?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
  <style>
  .multi-steps > li.is-active:before, .multi-steps > li.is-active ~ li:before {
 content: counter(stepNum);
 font-family: inherit;
 font-weight: 700;
}
.multi-steps > li.is-active:after, .multi-steps > li.is-active ~ li:after {
 background-color: #ededed;
}
.multi-steps {
	display: table;
	table-layout: fixed;
	width: 100%;
}
.multi-steps > li {
	counter-increment: stepNum;
	text-align: center;
	display: table-cell;
	position: relative;
	color: tomato;
}
.multi-steps > li:before {
	content: '\f00c';
	display: block;
	margin: 0 auto 4px;
	background-color: #fff;
	width: 36px;
	height: 36px;
	line-height: 32px;
	text-align: center;
	font-family: 'FontAwesome';
	border-width: 2px;
	border-style: solid;
	border-color: tomato;
	border-radius: 50%;
	z-index: 2;
    position: relative;
}
.multi-steps > li:after {
	content: '';
	height: 2px;
	width: 100%;
	background-color: tomato;
	position: absolute;
	top: 16px;
	left: 50%;
	z-index: 1;
}
.multi-steps > li:last-child:after {
	display: none;
}
.multi-steps > li.is-active:before {
	background-color: #fff;
	border-color: tomato;
}
.multi-steps > li.is-active ~ li {
 color: #808080;
}
.multi-steps > li.is-active ~ li:before {
 background-color: #ededed;
 border-color: #ededed;
}
  </style> 
<div id="primary" class="content-area">
<div class="techie-banner"><?php the_title('<h1>','</h1>');?></div>
		<div class="createAccountRow1 signUpLeft">
            <div class="container-fluid">
				<div class="row ">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 no-padding rightDiv">
					
						<div class="">
						  
						  <!-- Nav tabs -->
						  

						  <!-- Tab panes -->
						  <div class="tab-content">
						    <div role="tabpanel" class="tab-pane bg-white <?php if($type == 'techie'){ ?>active<?php } ?>" id="workseeker">
								<div class="form-group">
									<?php echo do_shortcode('[contact-form-7 id="3124" title="multipart techie form"]');?>
								</div>
                                
                                
						    </div>
						    
						  </div>
						</div>
					</div>
                <div class="col-sm-5">
                <div class="signUpbgImage" id="form-image"></div>
                <div class="signup-profile">
				 <?php the_content(); ?>
				
                <ul class="">
                <!--<h3>Points to Note</h3>-->
                <?php $sign_up_techie_blocks = new Attachments( 'sign_up_techie_blocks'); ?>
				<?php if( $sign_up_techie_blocks->exist() ) : 
					while( $sign_up_techie_blocks->get() ) : 
					?>
				
				<li class="list-group-box">
                <div class="media-box">
				
                <div class="media-left-box"><?php echo $sign_up_techie_blocks->image( 'full' );?></div>
                <div class="media-body-box"><?php echo $sign_up_techie_blocks->field( 'description' ); ?></div>
                </div>
                </li>
				<?php endwhile;
					      endif;
					?>
				
				
                </ul>
                </div>
              
                </div>
					
				</div>
			</div>

		</div>
		
		
	<!-- Model Box Start  -->
    
    
   <!-- <div class="modal fade hireTechie" id="thank-you-techie-Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <div id="hire_a_techie_pop_up" class="pop_up_techie">
        <div class="back_trance_bg">
         <div class="container">
		<div id="thank-you-msg" class="thanks-box">
		<span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thanks-tick.png"></span>
			<h4>Thank You</h4>
			<p>Thank you for applying as a service provider on FindMeTechie.</br></br>
			 Once your details are verified and approved, you profile will be displayed on Techies Page on<br> FindMeTechie.</p>
				<div class="row">
				<div class="col-sm-12 build-box">
				<div class="col-sm-6 left-bild"><div class="see-build-your"> 
				<h5>Have any question in mind?</h5>
				<a href="<?php echo get_the_permalink(53); ?>" class="build-your-team">Jump to FAQs</a></div></div>
				<div class="col-sm-6 right-bild"><div class="see-build-your"> 
				<h5>Need to get in toucah?</h5>
				<a href="<?php echo get_the_permalink(11); ?>" class="build-your-team">Contact Us</a></div></div>
				</div>
				</div>
			</div>
          </div>
        </div>
      </div>
    </div>-->
    
    <!-- Model Box Close  -->
			
<content>

<script type="text/javascript">
(function($) {
  /*Brought click function of fileupload button when text field is clicked*/
	$("#uploadtextfield").click(function() {
		$('#fileuploadfield').click()
	});

  /*Brought click function of fileupload button when browse button is clicked*/
	$("#uploadbrowsebutton").click(function() {
		$('#fileuploadfield').click()
	});

  /*To bring the selected file value in text field*/	
	$('#fileuploadfield').change(function() {
		var oFReader = new FileReader();
		var input = document.getElementById("fileuploadfield");
		var ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
		if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")){
			oFReader.readAsDataURL(input.files[0]);
			oFReader.onload = function (oFREvent) {
				document.getElementById("photoupload_img").src = oFREvent.target.result;
			};
		}else{
			alert('Please upload a valid image file!');
			return false;
		}
    });

})(jQuery);

</script>


 <script type="text/javascript" >
	$(document).ready(function(){
    $("#select-dropdown-expertise").select2({
        //placeholder: "other skills", //placeholder
        tags: true
    });
	
	// $( "#workseeker form input[name='your-name']" ).keypress(function(e) {
		// var key = e.keyCode;
		// if ((key < 64 && key > 91) || (key < 96 && key > 123)) {
			// e.preventDefault();
		// }
	// });
  $("#your-name").keydown(function(event){
   if(!((event.keyCode>=65 && event.keyCode<=90) || (event.keyCode>=97 && event.keyCode<=122) || (event.keyCode==32) || (event.keyCode==08) || (event.keyCode>=37 && event.keyCode<=40)))
   {
	event.preventDefault();
   }
  });
  
  $("#phone_contact").keydown(function(event){
   if(!((event.keyCode>=48 && event.keyCode<=57) || (event.keyCode >= 96 && event.keyCode <=105) || (event.keyCode==08)))
   {
  event.preventDefault();   
   }
  });
})

function multipart1(step)
{
	if(step=="next")
	{
		$("span.error").remove();
		if ($("#your-name").val() == "") {
			$( "<span class='error'>Your Name is Required</span>" ).insertAfter( "#your-name" );
			return false;
		}
		if ($("#your-email").val() == "") {
			$( "<span class='error'>Your E-Mail is Required</span>" ).insertAfter( "#your-email" );
			return false;
		}
		/*if ($("#phone_contact").val() == "") {
			$( "<span class='error'>Your Phone No. is Required</span>" ).insertAfter( "#phone_contact" );
			return false;
		}*/	
		$("#PersonalDetailText").hide();
		$("#multipart1").hide();
		$("#multipart2").show();	
		$("#form-image").hide();
		$("#leftfirstcol").hide();
		$("#leftsecondcol").show();
		$("#leftthirdcol").show();
		$(".list-unstyled li:eq(0)").removeClass('is-active').next().addClass('is-active');
	}
	else
	{
		$("span.error").remove();
		$("#PersonalDetailText").show();
		$("#multipart1").show();
		$("#multipart2").hide();	
		$("#form-image").show();
		$("#leftfirstcol").show();
		$("#leftsecondcol").hide();
		$("#leftthirdcol").hide();
		$(".list-unstyled li:eq(1)").removeClass('is-active').prev().addClass('is-active');
	}
}
function multipart2(step)
{
	if(step=="next")
	{
	//$("div.error").hide();
	$("span.error").remove();
	if ($("#your-position").val() == "") {
		$( "<span class='error'>Your Role is Required</span>" ).insertAfter( "#your-position" );
		return false;
	}
	if ($("#select-dropdown-experience").val() == "") {
		$( "<span class='error'>Please Enter your Experience</span>" ).insertAfter( "#experienceDD" );
		//$("div.error").show();
		return false;
	}
	if ($("#educational").val() == "") {
		$( "<span class='error'>Please Enter your Educational Qualifications</span>" ).insertAfter( "#educational" );
		return false;
	}
	if ($("#city").val() == "") {
		$( "<span class='error'>Please Enter your City</span>" ).insertAfter( "#city" );
		return false;
	}
	if ($("#country-name").val() == "") {
		$( "<span class='error'>Please Select your Country</span>" ).insertAfter( "#country-name" );
		return false;
	}
	if ($("#select-dropdown-expertise").val() == null) {
		$( "<span class='error'>Please Enter your Skills</span>" ).insertAfter( "#dropdown-menu-relative" );
		return false;
	}
	if ($("#select-dropdown-domain").val() == null) {
		$( "<span class='error'>Please Enter your Industry Domain</span>" ).insertAfter( "#DomainDD" );
		return false;
	}
	
	
	
	$("#multipart2").hide();
	$("#multipart3").show();
	$("#leftsecondcol").hide();
	$("#leftthirdcol").hide();
	$("#leftfourthcol").show();
	$(".list-unstyled li:eq(1)").removeClass('is-active').next().addClass('is-active');
	}
	else
	{
	$("#multipart2").show();
	$("#multipart3").hide();
	$("#leftsecondcol").show();
	$("#leftthirdcol").show();
	$("#leftfourthcol").hide();
	$(".list-unstyled li:eq(2)").removeClass('is-active').prev().addClass('is-active');
	}
}


	</script>


<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_footer(); ?>