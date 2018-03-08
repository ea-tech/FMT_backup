<?php
/**
 * Template Name: Excel Import
 */
error_reporting(0);
function parse_csv_file($csvfile) {
    $csv = Array();
    $rowcount = 0;
    if (($handle = fopen($csvfile, "r")) !== FALSE) {
        $max_line_length = defined('MAX_LINE_LENGTH') ? MAX_LINE_LENGTH : 10000;
        $header = fgetcsv($handle, $max_line_length);
		//print_r($header);
		//die('as');
        $header_colcount = count($header);
        while (($row = fgetcsv($handle, $max_line_length)) !== FALSE) {
            $row_colcount = count($row);
            if ($row_colcount == $header_colcount) {
                $entry = array_combine($header, $row);
                $csv[] = $entry;
            }
            else {
                error_log("csvreader: Invalid number of columns at line " . ($rowcount + 2) . " (row " . ($rowcount + 1) . "). Expected=$header_colcount Got=$row_colcount");
                return null;
            }
            $rowcount++;
        }
        //echo "Totally $rowcount rows found\n";
        fclose($handle);
    }
    else {
        error_log("csvreader: Could not read CSV \"$csvfile\"");
        return null;
    }
    return $csv;
}
if (!is_user_logged_in()) {
    wp_redirect(wp_login_url());
}
global $current_user;

	
	
	require 'PHPExcel/Classes/PHPExcel.php';
    require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';

	 $message = "";
	 // Check valid spreadsheet has been uploaded
	set_time_limit(0);
	 
    if(isset($_FILES['spreadsheet'])) {
        if ($_FILES['spreadsheet']['tmp_name']) {
            if (!$_FILES['spreadsheet']['error']) {
                $inputFile = $_FILES['spreadsheet']['tmp_name'];
				$upload_dir = wp_upload_dir();
				$upload_path = $upload_dir['basedir'].'/excelimport/';				 
				 if (move_uploaded_file($_FILES['spreadsheet']['tmp_name'], $upload_path. $_FILES["spreadsheet"]['name'])) {
                 $inputFile =  $upload_path. $_FILES["spreadsheet"]['name'];
                 } else {
                   $inputFile = "";
				   $message = "Sorry! Please try again server down.";
                 }
				$extension = strtoupper(pathinfo($inputFile, PATHINFO_EXTENSION));
				
				     $userData = array();
					 $already_registered_user_array = array();
					  $invalid_email_array = array();
					 
/*					 $csv_file = $inputFile; // Name of your CSV file
$csvfile = fopen($csv_file, 'r');
$theData = fgets($csvfile);
$i = 0;
while (!feof($csvfile))
{
   $csv_data[] = fgets($csvfile, 10000);
   $csv_array = explode(",", $csv_data[$i]);
   print_r($csv_array);
   die('dddddddddddddddddddd');
   $insert_csv = array();
  
   $insert_csv['areas_of_specialisation'] = $csv_array[11];
   $insert_csv['years_of_experience'] = $csv_array[12];
   $insert_csv['educational_qualification'] = $csv_array[13];
   $insert_csv['availability'] = $csv_array[14];
   $insert_csv['location(_city/town)'] = $csv_array[15];
   $insert_csv['email'] = $csv_array[16];
   $insert_csv['full_name'] = $csv_array[17];
   $userData[] = $insert_csv;
  
   $i++;
}
fclose($csvfile);
echo "<pre>";

print_r($userData);
die('s');*/
					 
					 
				     if ($extension == 'CSV') {				 
				      $userData = parse_csv_file($inputFile);
				 
				 
				
		
						
						########### unlink the excelfile from server
						if($inputFile != ""){
						if (unlink($inputFile)){ 						
						}
						} 
						########### end unlink the excelfile from server
						
						$countdata = 0;						
						if(!empty($userData))
						{
						  global $wpdb;
						  
						  foreach($userData as $userrow){
						  
						   $name_parts = array();
						   $first_name = "";
						   $last_name = "";
						   $email = "";
						   $areas_of_specialisation = "";
						   $years_of_experience = "";
						   $availability = "";
						   $location = "";
						   $educational_qualification = "";
						   $country = "India";
						   
						   $name_parts = explode(' ',$userrow['full_name']);
						   $first_name = $name_parts[0];
						   $last_name = $name_parts[1]." ".$name_parts[2];
						   $email = $userrow['email'];
						   $areas_of_specialisation = $userrow['areas_of_specialisation'];
						   $years_of_experience = $userrow['years_of_experience'];
						   $educational_qualification = $userrow['educational_qualification'];						   
						   $availability = $userrow['availability'];
						   $location = $userrow['location(_city/town)'];
						   
						   $preferences = "";
						   if($availability == "full_time")
						   {
						    $preferences = "Full Time";
						   }else if($availability == "part_time")
						   {
						    $preferences = "Part Time";
						   }else if($availability == "project_based")
						   {
						    $preferences = "Project Based";
						   }
						   else if($availability == "all_of_above")
						   {
						    $preferences = array('Project Based','Part Time','Full Time');
						   }
						   $preferencesArray = array();
						   $preferencesArray[] =  $preferences;
						   
						   $experience = (int)$years_of_experience;
						   
						   if(($email != "") &&  (filter_var($email, FILTER_VALIDATE_EMAIL))){
						   
						   ############## start need to change for teachie data users
						   
						  
						   
						 // $tablename = $wpdb->prefix."lead_export_data";
						  // $datum = $wpdb->get_results("SELECT * FROM $tablename WHERE email = '".$email."'");

                            //Print the $datum object to see how the count is stored in it.
                            //I'm assuming the key is 'count'
							
							 if ((username_exists( $email )) || (email_exists( $email ))){
							 
							 $already_registered_user_array[] = $email; 
							 
							 }
							 else{

                         	   
						   
						  
							/*$wpdb->insert( 
							'fmt_lead_export_data', 
							array( 
							'first_name' => $first_name,
							'last_name' => $last_name,
							'email' => $email,
							'areas_of_specialisation' => $areas_of_specialisation,
							'years_experience' => $experience,
							'educational_qualification' => $educational_qualification,
							'preferences' => $preferences,
							'location' => $location,
							'country' => $country,
							'full_name' => $userrow['full_name'],				
							'created' => date('Y-m-d H:i:s'),
							)
							);*/
							
							$username = strtolower($email);
							$password = wp_generate_password( 12, false );
							$description = "";
							$profile_status = 1;
							
							$userdata = array(
							'user_login' => $username,							
							'user_pass' => $password,
							'user_email' => $email,
							'nickname' => $first_name,
							'display_name' => $userrow['full_name'],
							'first_name' => $first_name,
							'last_name' => $last_name,
							'description' => $description,							
							'role' => 'techie'
							);
							
							
							##### start add custom technology if not exists
							$expertisetaxonomydata = explode(',',$areas_of_specialisation);
							//$expertisetaxonomydata = $areas_of_specialisation;
							$expertisTtrimArray = array();
							foreach ($expertisetaxonomydata as $value) {
							$expertisTtrimArray[] = str_replace(' ', '',$value);
							}
							
									
							foreach ($expertisTtrimArray as $value) {
							if(!get_page_by_title($value, OBJECT, 'technology')){
							
							$post_id = wp_insert_post(array (
							'post_type' => 'technology',
							'post_title' => $value,
							'post_content' => '',
							'post_status' => 'pending',						 
							));
							
							
							
							}
							
							
							}
							
					$technologies = getRawTechnologiesTree();							
					$expertise = $expertisTtrimArray;					
					$expertiseArray = array();				
					foreach ($expertise as $value) {
					$expertiseArray[] = array_search ($value, $technologies);
					}
					$expertise = $expertiseArray;	
					$countries = getCountries();
					$country = array_search ($country, $countries);
					
					$user_id = wp_insert_user($userdata);
				    $tablename = $wpdb->prefix."users";
					$wpdb->query($wpdb->prepare("UPDATE $tablename SET profile_status=$profile_status WHERE ID=$user_id"));
					$wpdb->query($wpdb->prepare("UPDATE $tablename SET csv_user=1 WHERE ID=$user_id"));						
                    if(!is_wp_error($user_id)) {					
			          add_user_meta($user_id, 'educational', $educational_qualification);				
				      add_user_meta($user_id, 'experience', $experience);
				      add_user_meta($user_id, 'city', $location);			
				      add_user_meta($user_id, 'country', $country);
				      add_user_meta($user_id, 'expertise', $expertise);
				      add_user_meta($user_id, 'preferences', $preferencesArray);
				      wp_cache_delete($user_id, 'users');	
				     }
					 
					  error_log("csvreader: This $email inserted in database of CSV $inputFile ");
					 
					 ### code for insert the users
           
			        ##### end add custom technology if not exists
							
							
							
							
							 $countdata++;
							
							
							}// end for duplicates records
							
							 //$countdata++;
							 
							 
							 ############## need need to change for teachie data users
							 
							
							}########## if user email not null
							else
							{
							 $invalid_email_array[] = $email; 
							}
						  
						  
						  }//end for loop for all user row data 
						  
						  
						  /**/
						   
						  if($countdata >= 1){ 
						  $message = "Data saved successfully.";
						  }else{
						  $message = "Relevant data not matched in file.";
						  }
						  
						  
						}else{
						$message = "Relevant data not matched in file.";
						}
						
						//$message = "Data save successfully.";
				    ///////////////
				 
				
				
				}else{
				
				 $message = "Sorry! File not supported.";
				
				}
			}else
			{
			   $message = "Sorry! File error.";
			}
		}
	  }			
	


	get_header();
?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.validate.min.js"></script>
<script type="text/javascript">
       jQuery('document').ready(function(e)
	   { 
            //e.getPreventDefault();
			
			jQuery("#excel_import_data").validate({
                rules: {
                    spreadsheet: "required",                   
                  
                    				
                },
                messages: {
                    spreadsheet: "Please upload file.",                 
            					
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });  

});
</script>


<div class="profile-bg">
  <div class="container-fluid ">
    <div class="about-me">
      <div class="profile-header">
        <h2>Excel Import Lead Data</h2>
        <a style="float:right;" class="btn btn-default admin_back_btn" href="<?php echo admin_url(); ?>" >Back to admin dashboard</a>
      </div>
      <?php if($message != ""){ ?>
       <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                <?php echo $message;  ?>
                <?php if(!empty($userData)){
				echo "<br />Total Records :".count($userData);
				if($countdata >= 1){
				echo "<br />Inserted Records :".$countdata;
				}
				?>
				
				<?php } ?>
                <?php 
				if (!empty($already_registered_user_array)) {				
				echo "<br />Following Techies are already registered.<br />";
				$countalready = 1;
				foreach ($already_registered_user_array as $key => $value) {
				echo $countalready.". ".$value."<br/>"; 
				
				$countalready++;
				}
  
                }
				
				if(!empty($invalid_email_array))
				{
				echo "<br />Following Techies email are in-valid.<br />";				
                $countinvalid = 1;
				foreach ($invalid_email_array as $key => $invalid_email_value) {
				echo $countinvalid.". ".$invalid_email_value."<br/>"; 				
				$countinvalid++;
				}				
				}
				
				?>
                </div>
        </div>
        <?php } ?>        
      <div class="row">
        <form id="excel_import_data" action="" method="post" enctype="multipart/form-data">
          
          
            <div class="panel border0">
              <div class="panel-body">           
               
              
                <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group form-inline text-capitalize text-center "><span class="wpcf7-form-control-wrap your_name">
               <input type="file" name="spreadsheet"/>
                </span></div>
                </div>
               
              </div>
            
              <h5 class="text-center1">
                <input value="SUBMIT" class="wpcf7-form-control wpcf7-submit btn btn-primary submit-btn submit-build text-uppercase" type="submit">
              </h5>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php get_footer(); ?>