<?php
//start session
session_start();

//include configuration file
include_once("config.php");

//include google api files
require_once 'src/Google_Client.php';
require_once 'src/contrib/Google_AnalyticsService.php';

if(!empty($_POST)){
$_SESSION["startdate"] = $_POST['startdate'];
$_SESSION["enddate"] = $_POST['enddate'];	
}	

$gClient = new Google_Client();
$gClient->setApplicationName('analyticscre');
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setScopes(array('https://www.googleapis.com/auth/analytics.readonly'));
$gClient->setUseObjects(true);


//check for session variable
if (isset($_SESSION["token"])) { 

	//set start date to previous month
	//$start_date = date("Y-m-d", strtotime("-12 month") ); 
	
	//end date as today
	//$end_date = date("Y-m-d");
	
	$start_date = $_SESSION["startdate"];
	$end_date = $_SESSION["enddate"];
	
	try{
		//set access token
		$gClient->setAccessToken($_SESSION["token"]); 
		
		//create analytics services object
		$analyticsService = new Google_AnalyticsService($gClient); 
		
		//analytics parameters (check configuration file)
		$params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,'filters' => 'ga:medium==organic','max-results' => $google_analytics_max_results);
		
		//get results from google analytics
		$results = $analyticsService->data_ga->get($google_analytics_profile_id,$start_date,$end_date, $google_analytics_metrics, $params);
		
		//print_r($results);
	}
	catch(Exception $e){ //do we have an error?
		echo $e->getMessage(); //display error
	}
	
	$pages = array();
	$rows = $results->rows;
	
	if($rows)
	{  
        echo "<div class='wrapper'>";
		echo "<h4>Google Analytics Reports</h4>";
        echo "<h3>Date Range (".date("Y/m/d", strtotime($start_date))." - ".date("Y/m/d", strtotime($end_date)).") </h3>"; 		
		echo '<table><tr>
		<th>Page Name</th>
		<th>Total Views</th>
		</tr>';
		
		foreach($rows as $row)
		{
			//prepare values for db insert
			$pages[] = '("'.$row[0].'","'.$row[1].'",'.$row[2].')';
			
			//output top page link
			echo '<tr><td><a class="website-name" href="'.$page_url_prefix.$row[0].'">'.$row[1].'</a></td><td>'.$row[2].'</td></tr>';
		}
		echo '</table>';
		
		//empty table
		$mysqli->query("TRUNCATE TABLE fmt_google_top_pages");
		
		//insert all new top pages in the table
		if($mysqli->query("INSERT INTO fmt_google_top_pages (page_uri, page_title, total_views) VALUES ".implode(',', $pages).""))
		{
			//echo '<br />Records updated...';
		}else{
			echo $mysqli->error;
		}
		echo "</div>";
	}else{
		
	echo '<br /><div class="norecord">No Records found.</div>';	
	
	}
	
	echo '<div class="update_back-button"><a href="index.php">Go Back</a></div>';
	
}else{
	//authenticate user
	if (isset($_GET['code'])) {		
		$gClient->authenticate();
		$token = $gClient->getAccessToken();
		$_SESSION["token"] = $token;
		header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
	}else{
		$gClient->authenticate();
	}
} ?>
<style>
@import url('https://fonts.googleapis.com/css?family=Raleway:400,600,700');
body{
	margin 0;
	padding 0;
	font-family: 'Raleway', sans-serif;
	background-color: #fdfdfd;
}
.update_back-button a{
	width : 130px;
	border-radius: 2px;
	text-align: center;
	margin: 10px auto;
	border: 1px solid #777;
	cursor: pointer;
	text-decoration: none;
	padding: 9px;
	display: block;

}
.wrapper h4{
	font-size: 24px;
	margin: 10px 0;
}
.wrapper h3{
	font-size: 18px;
}
.wrapper td {
    padding-left: 40px;
}
.wrapper table{
	margin: 0 auto;
}
.website-name{
	color: #000;
	text-decoration: none;
}
.website-name:hover{
	color: #333;
}
.wrapper{
	margin: 0 auto;
	border: 1px solid #777;
	padding: 20px;
	background-color: #ddd;
	max-width: 400px;
	margin-top: 50px;
}
.norecord{
	text-align: center;
	margin: 50px auto;
}

</style>