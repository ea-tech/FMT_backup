<?php
/*
Plugin Name: Hire Me
*/

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Hire_Me_List_Table extends WP_List_Table {
	
    function __construct(){
    global $status, $page;

        parent::__construct( array(
            'singular'  => __( 'hireme', 'hirelisttable' ),     //singular name of the listed records
            'plural'    => __( 'hireme', 'hirelisttable' ),   //plural name of the listed records
            'ajax'      => false        //does this table support ajax?

    ) );

    add_action( 'admin_head', array( &$this, 'admin_header' ) );            

    }

  function admin_header() {
    $page = ( isset($_GET['page'] ) ) ? esc_attr( $_GET['page'] ) : false;
    if( 'hire_list_me' != $page )
    return;
    echo '<style type="text/css">';
    echo '.wp-list-table .column-id { width: 5%; }';
    echo '.wp-list-table .column-employer_name { width: 15%; }';
    echo '.wp-list-table .column-employer_email { width: 15%; }';
    echo '.wp-list-table .column-employer_phone { width: 15%;}';
	echo '.wp-list-table .column-hire_request_date { width: 10%; }';
	echo '.wp-list-table .column-techie_name { width: 15%; }';
	echo '.wp-list-table .column-techie_phone { width: 10%; }';	
	echo '.wp-list-table .column-techie_email { width: 15%; }';
    echo '</style>';
  }

  function no_items() {
    _e( 'No data found.' );
  }

  function column_default( $item, $column_name ) {
    switch( $column_name ) { 
        case 'employer_name':
        case 'employer_email':
		case 'employer_phone':
		case 'hire_request_date':
		case 'techie_name':
		case 'techie_phone':
		case 'techie_email':		
            return $item[ $column_name ];
        default:
            return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
    }
  }

function get_sortable_columns() {
  $sortable_columns = array(
    'employer_name'  => array('employer_name',false),
	'employer_email' => array('employer_email',false),
    'employer_phone' => array('employer_phone',false),
    'hire_request_date'   => array('hire_request_date',false),
	'techie_name'   => array('techie_name',false),
	'techie_phone'   => array('techie_phone',false),
	'techie_email'   => array('techie_email',false)	
  );
  return $sortable_columns;
}

function get_columns(){
        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'employer_name' => __( 'Employer Name', 'hirelisttable' ),
            'employer_email'  => __( 'Employer Email', 'hirelisttable' ),
            'employer_phone'     => __( 'Employer Phone', 'hirelisttable' ),
			'hire_request_date'   => __( 'Request Date', 'hirelisttable' ),
			'techie_name'   => __( 'Techie Name', 'hirelisttable' ),
			'techie_phone'   => __( 'Techie Phone', 'hirelisttable' ),
			'techie_email'   => __( 'Techie Email', 'hirelisttable' ),
			
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
				'<input type="checkbox" name="hire[]" value="%s" />', $item['id']
			);    
	}
	
	function process_bulk_action() { 
		// If the delete bulk action is triggered
		if ( (isset( $_POST['action'] ) && ($_POST['action'] == 'delete')) || (isset( $_POST['action2'] ) && ($_POST['action2'] == 'delete')) ) {
			$delete_ids = esc_sql( $_POST['hire'] );
			global $wpdb;
			// loop over the array of record IDs and delete them
			foreach ( $delete_ids as $did ) {
				$wpdb->query(" DELETE FROM fmt_hire_me WHERE id='".$did."' ");
			}
		}
	}
	
	function prepare_items() {
	  $this->process_bulk_action();
	  
	  
	  global $wpdb;
	  $per_page = 50;
	  $where = "";
	  // If no sort, default to title
	  $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'hire_request_date';
	  // If no order, default to asc
	  $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'desc';
	  $where = (!empty($_REQUEST['s'])) ? "WHERE employer_name LIKE '".$_REQUEST['s']."%' OR employer_email LIKE '".$_REQUEST['s']."%' OR techie_name LIKE '".$_REQUEST['s']."%' OR techie_email LIKE '".$_REQUEST['s']."%' OR employer_phone LIKE '".$_REQUEST['s']."%' OR techie_phone LIKE '".$_REQUEST['s']."%'" : "";  
	  $current_page = $this->get_pagenum();
	  $start = ( $current_page-1 )* $per_page;
	  $row = $wpdb->get_results(" SELECT COUNT(id) as total FROM fmt_hire_me WHERE status='1' ");
	  $found_data = $wpdb->get_results("SELECT * FROM fmt_hire_me $where ORDER BY $orderby $order LIMIT $start, $per_page ", ARRAY_A);
	  //echo $sql = "SELECT * FROM fmt_hire_me WHERE status='1' ORDER BY $orderby $order LIMIT $start, $per_page ";
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



function hireme_add_menu_items(){
  $hook = add_menu_page( 'Express interest', 'Express interest', 'activate_plugins', 'hire_list_me', 'hireme_render_list_page' );
  add_action( "load-$hook", 'add_hire_me_options' );
}

function add_hire_me_options() {
  global $hirelisttable;
  $option = 'per_page';
  $args = array(
         'label' => 'Hire Me',
         'default' => 50,
         'option' => 'hire_per_page'
         );
  add_screen_option( $option, $args );
  $hirelisttable = new Hire_Me_List_Table();
}
add_action( 'admin_menu', 'hireme_add_menu_items' );



function hireme_render_list_page(){
  global $hirelisttable;
  echo '</pre><div class="wrap"><h2>Express interest Data</h2>'; 
  $hirelisttable->prepare_items(); 
  ?>
  <form method="post">
    <input type="hidden" name="page" value="hire_list_me">
    <?php
    $hirelisttable->search_box( 'search', 'search_id' );

  $hirelisttable->display(); 
  echo '</form></div>'; 
}