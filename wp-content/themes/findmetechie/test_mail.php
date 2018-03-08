<?php
/**
 * Template Name: Test Mail
 */
 
 
 	/*$to = get_option( 'admin_email' );
	$Subject = 'FMT - test mail';
	$Body = 'This is test mail.<br /><br />';	
    $headers = array();
	$headers[] = 'Content-Type: text/html; charset=UTF-8';
	$headers[] = 'From: '.get_option( 'blogname' ).' <'.get_option( 'admin_email' ).'>';	
    $sent = wp_mail( $to, $Subject, $Body, $headers );
	$sent = wp_mail( $to, $Subject, $Body, $headers );
		
		if(!$sent){
			echo "Unable to send your request, please try again.";
		}else{
			echo "Mail sent successfully.";   
		}*/
		
		
		
		echo do_action( 'wordpress_social_login' );
