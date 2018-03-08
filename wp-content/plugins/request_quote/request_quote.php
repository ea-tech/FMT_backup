<?php
/*
Plugin Name: Request Quote
*/

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Request_Quote_List_Table extends WP_List_Table {
	
    function __construct(){
    global $status, $page;

        parent::__construct( array(
            'singular'  => __( 'request_quote', 'request_quote' ),     //singular name of the listed records
            'plural'    => __( 'request_quote', 'request_quote' ),   //plural name of the listed records
            'ajax'      => false        //does this table support ajax?

    ) );

    add_action( 'admin_head', array( &$this, 'admin_header' ) );            

    }

  function admin_header() {
    $page = ( isset($_GET['page'] ) ) ? esc_attr( $_GET['page'] ) : false;
    if( 'request_quote' != $page )
    return;
    echo '<style type="text/css">';
    echo '.wp-list-table .column-id { width: 5%; }';
    echo '.wp-list-table .column-name { width: 10%; }';
    echo '.wp-list-table .column-request_email { width: 15%; }';
    echo '.wp-list-table .column-phone { width: 10%;}';
	echo '.wp-list-table .column-created { width: 10%; }';
	echo '.wp-list-table .column-company_name { width: 10%; }';
	echo '.wp-list-table .column-website { width: 10%; }';	
	echo '.wp-list-table .column-project_budget { width: 15%; }';
	echo '.wp-list-table .column-skills_required { width: 15%; }';
    echo '</style>';
  }

  function no_items() {
    _e( 'No get data found.' );
  }

  function column_default( $item, $column_name ) {
    switch( $column_name ) { 
        case 'name':
        case 'request_email':
		case 'phone':
		case 'created':
		case 'company_name':
		case 'website':
		case 'project_budget':
        case 'skills_required':		
            return $item[ $column_name ];
        default:
            return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
    }
  }

function get_sortable_columns() {
  $sortable_columns = array(
    'name'  => array('name',false),
	'request_email' => array('request_email',false),
    'phone' => array('phone',false),
    'created'   => array('created',false),
	'company_name'   => array('company_name',false),
	'website'   => array('website',false),
	'project_budget'   => array('project_budget',false),	
	//'skills_required'   => array('skills_required',false)
  );
  return $sortable_columns;
}

function get_columns(){
        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'name' => __( 'Name', 'requestquotelisttable' ),
            'request_email'  => __( 'Email', 'requestquotelisttable' ),
            'phone'     => __( 'Phone', 'requestquotelisttable' ),
			'created'   => __( 'Request Date', 'requestquotelisttable' ),
			'company_name'   => __( 'Company Name', 'requestquotelisttable' ),
			'website'   => __( 'Website', 'requestquotelisttable' ),
			'project_budget'   => __( 'Project Budget', 'requestquotelisttable' ),
			'skills_required'   => __( 'Skills Required', 'requestquotelisttable' ),
			
        );
         return $columns;
    }
	
	function get_bulk_actions() {
	  $actions = array(
		'delete'    => 'Delete'
	  );
	  return $actions;
	}
	
	function column_cb($item) {
			return sprintf(
				'<input type="checkbox" name="requestquote[]" value="%s" />', $item['id']
			);    
	}
	
	function process_bulk_action() { 
		// If the delete bulk action is triggered
		if ( (isset( $_POST['action'] ) && ($_POST['action'] == 'delete')) || (isset( $_POST['action2'] ) && ($_POST['action2'] == 'delete')) ) {
			//$delete_ids = esc_sql( $_POST['requestquote'] );
			//global $wpdb;
			// loop over the array of record IDs and delete them
			//print_r($delete_ids);
			//die('as');
			//foreach ( $delete_ids as $did ) {
			//	$wpdb->query(" DELETE FROM fmt_request_quote WHERE id='".$did."' ");
			//}
			global $wpdb;
			$ids = isset($_REQUEST['requestquote']) ? $_REQUEST['requestquote'] : array();
			
			
			
            if (is_array($ids)) $ids = implode(',', $ids);
            if (!empty($ids)) {
                $wpdb->query("DELETE FROM fmt_request_quote WHERE id IN($ids)");
            }
			
			
		}
	}
	
	function prepare_items() {
	  $this->process_bulk_action();
	  
	  
	  global $wpdb;
	  $per_page = 50;
	  $where = "";
	  // If no sort, default to title
	  $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'created';
	  // If no order, default to asc
	  $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'desc';
	  $where = (!empty($_REQUEST['s'])) ? "WHERE name LIKE '".$_REQUEST['s']."%' OR request_email LIKE '".$_REQUEST['s']."%' OR company_name LIKE '".$_REQUEST['s']."%' OR phone LIKE '".$_REQUEST['s']."%' OR project_budget LIKE '".$_REQUEST['s']."%' OR skills_required LIKE '".$_REQUEST['s']."%'" : "";  
	  $current_page = $this->get_pagenum();
	  $start = ( $current_page-1 )* $per_page;
	  $row = $wpdb->get_results(" SELECT COUNT(id) as total FROM fmt_request_quote");
	  $found_data = $wpdb->get_results("SELECT * FROM fmt_request_quote $where ORDER BY $orderby $order LIMIT $start, $per_page ", ARRAY_A);
	  
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



function requestquote_add_menu_items(){
  $hook = add_menu_page( 'Get Quote Data', 'Get Quote Data', 'activate_plugins', 'request_quote', 'requestquote_render_list_page' );
  add_action( "load-$hook", 'add_request_quote_options' );
}

function add_request_quote_options() {
  global $requestquotelisttable;
  $option = 'per_page';
  $args = array(
         'label' => 'Request Quote',
         'default' => 50,
         'option' => 'request_per_page'
         );
  add_screen_option( $option, $args );
  $requestquotelisttable = new Request_Quote_List_Table();
}
add_action( 'admin_menu', 'requestquote_add_menu_items' );



function requestquote_render_list_page(){
  global $requestquotelisttable;
  echo '</pre><div class="wrap"><h2>Get Quote Data</h2>'; 
  $requestquotelisttable->prepare_items(); 
  ?>
  <form method="post">
    <input type="hidden" name="page" value="request_quote">
    <?php
    $requestquotelisttable->search_box( 'search', 'search_id' );

  $requestquotelisttable->display(); 
  echo '</form></div>'; 
}