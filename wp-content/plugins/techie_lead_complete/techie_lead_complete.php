<?php
/*
Plugin Name: Techie Lead Complete
*/

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Techie_Lead_Complete_List_Table extends WP_List_Table {
	
    function __construct(){
    global $status, $page;

        parent::__construct( array(
            'singular'  => __( 'techie_lead_complete', 'techie_lead_complete' ),     //singular name of the listed records
            'plural'    => __( 'techie_lead_complete', 'techie_lead_complete' ),   //plural name of the listed records
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
	
	echo '.wp-list-table .column-user_registered { width: 15%; }';
    echo '</style>';
  }

  function no_items() {
    _e( 'No Techie Lead Complete Found.' );
  }

  function column_default( $item, $column_name ) {        
    switch( $column_name ) {
	    case 'ID':
		$permalink = get_permalink(803);
        $key = base64_encode($item['ID']);
		echo "<a href='".$permalink."?urlkeycode=$key'>".$item[$column_name ]."</a>";
		break; 
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
		case 'user_registered':
		echo $item[$column_name ];
		break;      	
           
         
    }
  }

function get_sortable_columns() {
  $sortable_columns = array(
     'ID'  => array('ID',false),
    'display_name'  => array('display_name',false),
	'user_email' => array('user_email',false),   
    'user_registered'   => array('user_registered',false),
		
	//'skills_required'   => array('skills_required',false)
  );
  return $sortable_columns;
}

function get_columns(){
        $columns = array(
            'cb'        => '<input type="checkbox" />',
			 'ID' => __( 'FMT ID', 'requestquotelisttable' ),
            'display_name' => __( 'Name', 'requestquotelisttable' ),
            'user_email'  => __( 'Email', 'requestquotelisttable' ),
            'educational'     => __( 'Education', 'requestquotelisttable' ),
			'city'   => __( 'City', 'requestquotelisttable' ),
			//'preferences'   => __( 'Preferences', 'requestquotelisttable' ),
			
			'user_registered'   => __( 'Registered Date', 'requestquotelisttable' ),
			
        );
         return $columns;
    }
	
	function get_bulk_actions() {
	  $actions = array(
		//'delete'    => 'Delete',
		//'sendmail'    => 'Send Mail'
	  );
	  return $actions;
	}
	
	function column_cb($item) {
			return sprintf(
				'<input type="checkbox" name="techieleadcomplete[]" value="%s" />', $item['ID']
			);    
	}
	
	function process_bulk_action() { 
		// If the delete bulk action is triggered
		if ( (isset( $_POST['action'] ) && ($_POST['action'] == 'delete')) || (isset( $_POST['action2'] ) && ($_POST['action2'] == 'delete')) ) {
			
			global $wpdb;
			$ids = isset($_REQUEST['techieleadcomplete']) ? $_REQUEST['techieleadcomplete'] : array();
			
		
			
            if (is_array($ids)) $ids = implode(',', $ids);
            if (!empty($ids)) {
               /////delete code
            }
			
			
		}
		
				if ( (isset( $_POST['action'] ) && ($_POST['action'] == 'sendmail')) || (isset( $_POST['action2'] ) && ($_POST['action2'] == 'sendmail')) ) {
		
			global $wpdb;
			$ids = isset($_REQUEST['techieleadcomplete']) ? $_REQUEST['techieleadcomplete'] : array();
			
		
			
		
            if (!empty($ids)) {
              
			  ################ loop for start some action
			  
			   
				
			  
			  ################ loop for end some action
			  
			  
			  
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
	  $where = (!empty($_REQUEST['s'])) ? "WHERE profile_status=0 and csv_user=1 and  (display_name LIKE '".$_REQUEST['s']."%' OR user_email LIKE '".$_REQUEST['s']."%')" : "WHERE profile_status=0 and csv_user=1";  
	  $current_page = $this->get_pagenum();
	  $start = ( $current_page-1 )* $per_page;
	  $row = $wpdb->get_results("SELECT COUNT(ID) as total FROM fmt_users where profile_status=0 and csv_user=1");	 
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



function techie_lead_complete_add_menu_items(){
  $hook = add_menu_page( 'Techie Lead Complete', 'Techie Lead Complete', 'activate_plugins', 'techie_lead_complete', 'techie_lead_complete_render_list_page' );
  add_action( "load-$hook", 'add_techie_lead_complete_options' );
}

function add_techie_lead_complete_options() {
  global $techieleadcompletelisttable;
  $option = 'per_page';
  $args = array(
         'label' => 'Techie Lead Complete',
         'default' => 50,
         'option' => 'request_per_page'
         );
  add_screen_option( $option, $args );
  $techieleadcompletelisttable = new Techie_Lead_Complete_List_Table();
}
add_action( 'admin_menu', 'techie_lead_complete_add_menu_items' );



function techie_lead_complete_render_list_page(){
  global $techieleadcompletelisttable;
  
 
  
  echo '</pre><div class="wrap"><h2>Techie Lead Complete</h2>'; 
  $techieleadcompletelisttable->prepare_items(); 
  
   $message = '';
  
  ?>
  <?php echo $message; ?>
  <form method="post">
    <input type="hidden" name="page" value="techie_lead_complete">
    <?php
    $techieleadcompletelisttable->search_box( 'search', 'search_id' );

  $techieleadcompletelisttable->display(); 
  echo '</form></div>'; 
}