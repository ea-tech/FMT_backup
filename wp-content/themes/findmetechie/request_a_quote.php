<?php
/**
 * Template Name: Request A Quote
 */
if(!empty($_POST)){
	    global $wpdb;
		
        $formdata = $_POST;
		$upload_dir = wp_upload_dir();
		$upload_path = $upload_dir['basedir'].'/request_doc/';
        $name = $formdata['request_name'];
		$request_email = $formdata['request_email'];      
        $website = esc_attr($formdata['website']);	
		$phone = $formdata['phone'];
		$company_name = $formdata['company_name'];
		$project_budget = $formdata['project_budget'];
		$skills_required = $formdata['skills_required'];
		$brief_project_info = $formdata['brief_project_info'];
		$project_attached_file = ""; 
		$attached_file_url = "";
		if(!empty($_FILES['project_attached_file']['name'])) {			if(!is_dir($upload_path))
				mkdir($upload_path, 0777);
			move_uploaded_file($_FILES["project_attached_file"]["tmp_name"], $upload_path.$_FILES['project_attached_file']['name']);			
		    $project_attached_file = $_FILES['project_attached_file']['name'];
			$upload_url = $upload_dir['baseurl'].'/request_doc/';	
			$attached_file_url =$upload_url.$project_attached_file; 
		}
		
		$Subject = 'FMT - Request for quote';	
		$Body = 'New request for quote has been received.<br /><br />';
		$Body .= '<strong>Name:</strong> '.$name.'<br />';
		$Body .= '<strong>Email:</strong> '.$request_email.'<br />';
		$Body .= '<strong>Phone:</strong> '.$phone.'<br />';
		$Body .= '<strong>Company Name:</strong> '.$company_name.'<br />';
		$Body .= '<strong>Project Budget:</strong> '.$project_budget.'<br />';
		$Body .= '<strong>Skills Required:</strong> '.$skills_required.' <br />';
		$Body .= '<strong>Brief Project Info:</strong> '.$brief_project_info.'<br />';
		if($attached_file_url != "")
		{	
		$Body .= '<strong>Dcoument:</strong><a href="'.$attached_file_url.'">'.$project_attached_file.'</a><br />';
		}
		
		
		$wpdb->insert( 
			'fmt_request_quote', 
			array( 
				'name' => $name,
				'request_email' => $request_email,
				'phone' => $phone,
				'company_name' => $company_name,
				'website' => $website,
				'project_budget' => $project_budget,
				'skills_required' => $skills_required,
				'brief_project_info' => $brief_project_info,
				'project_attached_file' => $project_attached_file,				
				'created' => date('Y-m-d H:i:s'),
			)
		);
		
		$to = get_option( 'admin_email' );
		$headers = array();
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		$headers[] = 'From: '.get_option( 'blogname' ).' <'.get_option( 'admin_email' ).'>';
		
		$sent = wp_mail( $to, $Subject, $Body, $headers );
		$sent = wp_mail( $request_email, $Subject, $Body, $headers );
		wp_redirect(get_permalink(498).'?success=request_quote_yes');		
		exit;
		
}
get_header(); 	
?>
<div class="get-quote">
  <div class="container get-quote">
    <h2>Thank you for reaching out. <i>Let’s Talk!</i></h2>
    <form id="request_a_quote" action="<?php echo get_permalink(844); ?>" method="post" enctype="multipart/form-data">
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-12 mgb-quote position-relative">
            <span class="pvt_form-2"><i class="fa fa-lock" aria-hidden="true"></i> Private</span>
              <input name="request_name" type="text" class="form-control"  placeholder="Name*">
            </div>
            <div class="col-sm-12 mgb-quote position-relative">
            <span class="pvt_form-2"><i class="fa fa-lock" aria-hidden="true"></i> Private</span>
              <input name="request_email" type="email" class="form-control" placeholder="Email*">
            </div>
            <div class="col-sm-12 mgb-quote position-relative">
            <span class="pvt_form-2"><i class="fa fa-lock" aria-hidden="true"></i> Private</span>
              <input name="phone" type="text" class="form-control" placeholder="Phone*(E.g. +1-408-850-0236)">
            </div>
            <div class="col-sm-12 mgb-quote position-relative">
            <span class="pvt_form-2"><i class="fa fa-lock" aria-hidden="true"></i> Private</span>
              <input name="company_name" type="text" class="form-control" placeholder="Company Name*">
            </div>
			<div class="col-sm-12 mgb-quote">
              <input name="website" type="text" class="form-control" placeholder="Website">
            </div>
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
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-12 mgb-quote">
              <input name="skills_required" type="text" class="form-control" placeholder="What skills are required*">
            </div>
            <div class="col-sm-12 mgb-quote">
              <textarea name="brief_project_info" rows="7" class="form-control" placeholder="Brief Project Information"></textarea>
            </div>
            <div class="col-sm-12 mgb-quote">
              <div class='file-input'>
                <input name="project_attached_file" type='file'>
                <span class='button'>Attach</span> <span class='label' data-js-label> Attach file (if any)
               
                </span> </div>
            </div>
          </div>
        </div>
  
      <div class="form-group">
        <div class="col-sm-12 text-center">
		 <?php            $location = getLocationInfoByIp();			 			?>
		 
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
</script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.validate.min.js"></script>
<script type="text/javascript">


       $('document').ready(function(e)
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
                }
            });  

});




</script>
<?php get_footer(); ?>