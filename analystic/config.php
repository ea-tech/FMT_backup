<?php
########## Google Settings.. Client ID, Client Secret #############
$google_client_id 				= '1053774333778-lp402j33d81vrdoecshu9tecgoo94vff.apps.googleusercontent.com';
$google_client_secret 			= 'atK2mERZG_CcPryt37RhfMJL';
$google_redirect_url 			= 'http://www.findmetechie.com/analystic/update_pages.php';
$page_url_prefix				= 'http://www.findmetechie.com';

########## Google analytics Settings.. #############
$google_analytics_profile_id 	= 'ga:90627035'; //find the site profile id in google analystic
$google_analytics_dimensions 	= 'ga:landingPagePath,ga:pageTitle'; //no change needed (optional)
$google_analytics_metrics 		= 'ga:pageviews'; //no change needed (optional)
$google_analytics_sort_by 		= '-ga:pageviews'; //no change needed (optional)
$google_analytics_max_results 	= '100'; //no change needed (optional)

########## MySql details #############
$db_username 					= "FMT2016"; //Database Username
$db_password 					= "Welcome@123"; //Database Password
$hostname 						= "FMT2016.db.8937522.hostedresource.com"; //Mysql Hostname
$db_name 						= 'FMT2016'; //Database Name
###################################################################

$mysqli = new mysqli($hostname,$db_username,$db_password,$db_name);