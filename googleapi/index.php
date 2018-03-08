<?php 
// Include the Google API PHP client.
require_once( 'autoload.php' );
 
// Initialize the Google API.
$client = new Google_Client();
$client->setApplicationName( 'analyticsapipro' );
 
$client->setAssertionCredentials(
  new Google_Auth_AssertionCredentials(
 
    // Google client ID email address
    'servicepaccount@findmetechie-171306.iam.gserviceaccount.com',
    array('https://www.googleapis.com/auth/analytics.readonly'),
 
    // Downloaded client ID certificate file
    file_get_contents( 'findmetechie-909c95f7049d.p12' )
  )
);
 
// Google client ID
$client->setClientId( '1053774333778-lp402j33d81vrdoecshu9tecgoo94vff.apps.googleusercontent.com' );
$client->setAccessType( 'offline_access' );
 
$analytics = new Google_Service_Analytics( $client );
 
// Google Analytics account view ID
$analytics_id = 'ga:54388420';

// Get unique pageviews and average time on page.
try {
  $optParams = array();
 
  // Required parameter
  $metrics    = 'ga:uniquePageviews,ga:avgTimeOnPage';
  $start_date = '2017-04-01';
  $end_date   = '2017-06-26';
 
  // Optional parameters
  // optParams['filters']      = 'ga:pagePath==/';
  // $optParams['dimensions']  = 'ga:pagePath';
  // $optParams['sort']        = '-ga:pageviews';
  // $optParams['max-results'] = '10';
 
  $result = $analytics->data_ga->get( $analytics_id,
            $start_date,
            $end_date, $metrics, $optParams);
 
  if( $result->getRows() ) {
    print_r( $result->getRows() );
  }
} catch(Exception $e) {
  echo 'There was an error : - ' . $e->getMessage();
}