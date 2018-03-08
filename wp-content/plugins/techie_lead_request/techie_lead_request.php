<?php
/*
Plugin Name: Techie Lead Request
*/
error_reporting(0);
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Techie_Lead_Request_List_Table extends WP_List_Table {
	
    function __construct(){
    global $status, $page;

        parent::__construct( array(
            'singular'  => __( 'techie_lead_request', 'techie_lead_request' ),     //singular name of the listed records
            'plural'    => __( 'techie_lead_request', 'techie_lead_request' ),   //plural name of the listed records
            'ajax'      => false        //does this table support ajax?

    ) );

    add_action( 'admin_head', array( &$this, 'admin_header' ) );            

    }

  function admin_header() {
    $page = ( isset($_GET['page'] ) ) ? esc_attr( $_GET['page'] ) : false;
    if( 'request_quote' != $page )
    return;
    echo '<style type="text/css">';
    echo '.wp-list-table .column-ID { width: 5%; }';
    echo '.wp-list-table .column-display_name { width: 15%; }';
    echo '.wp-list-table .column-user_email { width: 20%; }';
    echo '.wp-list-table .column-educational { width: 20%;}';	
	echo '.wp-list-table .column-city { width: 10%; }';
	//echo '.wp-list-table .column-preferences { width: 10%; }';
	echo '.wp-list-table .column-email_sent_count { width: 15%; }';	
	echo '.wp-list-table .column-user_registered { width: 15%; }';
    echo '</style>';
  }

  function no_items() {
    _e( 'No Techie Lead Request Found.' );
  }

  function column_default( $item, $column_name ) {
    switch( $column_name ) { 
        case 'display_name':
		echo $item[$column_name ];
		break;
        case 'user_email':
		echo $item[$column_name ];
		break;
		case 'educational':
		echo $education = get_user_meta( $item['ID'], 'educational', true );
		break;
		case 'city':
		echo $city = get_user_meta( $item['ID'], 'city', true );
		break;
		//case 'preferences':		
		//$pre = get_user_meta( $item['ID'], 'preferences', true );
		//echo implode(",",$pre);
		//break;
		case 'email_sent_count':		
		echo $item[$column_name ];
		break;
		case 'last_email':
		echo $item[$column_name ];
		break;      	
           
         
    }
  }

function get_sortable_columns() {
  $sortable_columns = array(
    'display_name'  => array('display_name',false),
	'user_email' => array('user_email',false),   
    //'user_registered'   => array('user_registered',false),
		
	//'skills_required'   => array('skills_required',false)
  );
  return $sortable_columns;
}

function get_columns(){
        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'display_name' => __( 'Name', 'requestquotelisttable' ),
            'user_email'  => __( 'Email', 'requestquotelisttable' ),
            'educational'     => __( 'Education', 'requestquotelisttable' ),
			'city'   => __( 'City', 'requestquotelisttable' ),
			//'preferences'   => __( 'Preferences', 'requestquotelisttable' ),
			'email_sent_count'   => __( 'Email Sent', 'requestquotelisttable' ),
			'last_email'   => __( 'Last Mail Sent Date', 'requestquotelisttable' ),
			
        );
         return $columns;
    }
	
	function get_bulk_actions() {
	  $actions = array(
		'delete'    => 'Delete',
		'sendmail'    => 'Send Mail'
	  );
	  return $actions;
	}
	
	function column_cb($item) {
			return sprintf(
				'<input type="checkbox" name="techieleadrequest[]" value="%s" />', $item['ID']
			);    
	}
	
	function process_bulk_action() { 
		// If the delete bulk action is triggered
		if ( (isset( $_POST['action'] ) && ($_POST['action'] == 'delete')) || (isset( $_POST['action2'] ) && ($_POST['action2'] == 'delete')) ) {
			
			global $wpdb;
			$ids = isset($_REQUEST['techieleadrequest']) ? $_REQUEST['techieleadrequest'] : array();
			
			//echo "yyyyyyyyyyyyyyyyyyyyyyy";
			//die;
			
            if (is_array($ids)) $ids = implode(',', $ids);
            if (!empty($ids)) {
                $wpdb->query("DELETE FROM fmt_users WHERE ID IN($ids)");
				$wpdb->query("DELETE FROM fmt_usermeta WHERE user_id IN($ids)");
            }
			
			
		}
		
				if ( (isset( $_POST['action'] ) && ($_POST['action'] == 'sendmail')) || (isset( $_POST['action2'] ) && ($_POST['action2'] == 'sendmail')) ) {
		
			global $wpdb;
			$ids = isset($_REQUEST['techieleadrequest']) ? $_REQUEST['techieleadrequest'] : array();
			
		
			
		
            if (!empty($ids)) {
              
			  ################ start send to user mail for profile complete
			    $subject = "FMT - Request for profile complete";
				$headers = array();
	            $headers[] = 'Content-Type: text/html; charset=UTF-8';
	            $headers[] = 'From: '.get_option( 'blogname' ).' <'.get_option( 'admin_email' ).'>';
			    foreach ($ids as $user_id) {
				
				$user_info = get_userdata($user_id); 
				$user_email = $user_info->user_email;               
                $first_name = $user_info->first_name;
				$code_id = base64_encode($user_id);
				$verfyLink = get_the_permalink(1632)."?hashverify=".$code_id;
				$site_url = home_url();
				
				
				
				/*$message = "Dear ".$first_name."\r<br /><br />";				
				$message .= "Please note that we publish techie profiles only based on their prior consent, do not publish any personal details such as name, email or contact numbers and ensure that Techies are paid as per mutually agreed terms."."\r<br /><br />";               
				$message .= "For complete your profile please click the link below:<br/>".$verfyLink."\r<br/><br/>";				
				$message .= "If you have any questions, you can contact us on admin@findmetechie.com." . "\r<br /><br />";
				$message .= "We look forward to a mutually rewarding relationship. Thank you." . "\r<br /><br />";
				$message .= "Regards," . "\r<br /><br />";
				$message .= "FMT Team" . "\r<br />";
				$message .= home_url();*/
				
				//$message = do_shortcode('[text-blocks id="lead-request-mail"]');	
				
				//$mymessagepage_id = 1666;
               // $post_id_mymessagepage_id = get_post($mymessagepage_id);
               // echo $message = $post_id_mymessagepage_id->post_content;
				//die('as');
				
			   $id=1638;
			   
               $post = get_post($id);
               $title = apply_filters('the_title', $post->post_title);
               $message = apply_filters('the_content', $post->post_content);
             
							
                $namecode = "##FIRSTNAME##";
			    $verifylinkcode = "##VERIFYLINK##";
			    $siteurlcode = "##SITEURL##";               
				$message = str_replace($namecode,$first_name,$message);
				$message = str_replace($verifylinkcode,$verfyLink,$message);
				$message = str_replace($siteurlcode,$site_url,$message);
				
				
				$title = str_replace($namecode,$first_name,$title);
				
				 
				
				
				
				
				//$user_email = "amitarya83@gmail.com";
				//$mail_subject = $first_name.", ".$title;
				###start for update the mail sent status and date
				
				    $mailsent_date =  date('Y-m-d H:i:s');				
				    $tablename = $wpdb->prefix."users";
					$wpdb->query($wpdb->prepare("UPDATE $tablename SET email_sent_count=email_sent_count+1,last_email='$mailsent_date' WHERE ID=$user_id"));	
					
					
			    ###### end for update the mail sent status and date	
					
				
                wp_mail($user_email, $title, $message, $headers);	
				
				 $adminnew_mail = "neeraj@eatechnologies.com";    
    wp_mail($adminnew_mail,$title, $message, $headers);
    $to = get_option( 'admin_email' );
    wp_mail($to,$title, $message, $headers);
				
				
				
				
				
				
                //echo $user_id; 
				 
				 
                }
				
			  
			  ################ end send to user mail for profile complete
			  
			  
			  
            }
			
			
		}
		
	}
	
	function prepare_items() {
	  $this->process_bulk_action();
	  
	  
	  global $wpdb;
	  $per_page = 50;
	  $where = "";
	  // If no sort, default to title
	  $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'user_registered';
	  // If no order, default to asc
	  $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'desc';
	  $where = (!empty($_REQUEST['s'])) ? "WHERE profile_status=1 and  display_name LIKE '".$_REQUEST['s']."%' OR user_email LIKE '".$_REQUEST['s']."%'" : "WHERE profile_status=1";  
	  $current_page = $this->get_pagenum();
	  $start = ( $current_page-1 )* $per_page;
	  $row = $wpdb->get_results("SELECT COUNT(ID) as total FROM fmt_users where profile_status=1");	 
	  $found_data = $wpdb->get_results("SELECT * FROM fmt_users $where  ORDER BY $orderby $order LIMIT $start, $per_page ", ARRAY_A);
	  
	  $total_items = $row[0]->total;
	  $columns  = $this->get_columns();
	  $hidden   = array();
	  $sortable = $this->get_sortable_columns();
	  $this->_column_headers = array( $columns, $hidden, $sortable );
	  
	
	  $this->set_pagination_args( array(
		'total_items' => $total_items,                  //WE have to calculate the total number of items
		'per_page' => $per_page                     //WE have to determine how many items to show on a page
	  ) );
	  $this->items = $found_data;
	}

} //class



function techie_lead_request_add_menu_items(){
  $hook = add_menu_page( 'Techie Lead Request', 'Techie Lead Request', 'activate_plugins', 'techie_lead_request', 'techie_lead_request_render_list_page' );
  add_action( "load-$hook", 'add_techie_lead_request_options' );
}

function add_techie_lead_request_options() {
  global $techieleadrequestlisttable;
  $option = 'per_page';
  $args = array(
         'label' => 'Techie Lead Request',
         'default' => 50,
         'option' => 'request_per_page'
         );
  add_screen_option( $option, $args );
  $techieleadrequestlisttable = new Techie_Lead_Request_List_Table();
}
add_action( 'admin_menu', 'techie_lead_request_add_menu_items' );



function techie_lead_request_render_list_page(){
  global $techieleadrequestlisttable;
  
 
  
  echo '</pre><div class="wrap"><h2>Techie Lead Request</h2>'; 
  $techieleadrequestlisttable->prepare_items(); 
  
   $message = '';
    if ('delete' === $techieleadrequestlisttable->current_action()) {
        $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Items delete successfully: %d', 'techieleadrequestlisttable'), count($_REQUEST['techieleadrequest'])) . '</p></div>';
    }
	 if ('sendmail' === $techieleadrequestlisttable->current_action()) {
        $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Items mail sent successfully: %d', 'techieleadrequestlisttable'), count($_REQUEST['techieleadrequest'])) . '</p></div>';
    }
  ?>
  <?php echo $message; ?>
  <form method="post">
    <input type="hidden" name="page" value="techie_lead_request">
    <?php
    $techieleadrequestlisttable->search_box( 'search', 'search_id' );

  $techieleadrequestlisttable->display(); 
  echo '</form></div>'; 
}