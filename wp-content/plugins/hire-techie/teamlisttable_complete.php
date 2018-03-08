<?php
/*
Plugin Name: Hire techie requests
*/

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Hire_Techie_List_Table extends WP_List_Table {
	
    function __construct(){
    global $status, $page;

        parent::__construct( array(
            'singular'  => __( 'team', 'techielisttable' ),     //singular name of the listed records
            'plural'    => __( 'techies', 'techielisttable' ),   //plural name of the listed records
            'ajax'      => false        //does this table support ajax?

    ) );

    add_action( 'admin_head', array( &$this, 'admin_header' ) );            

    }

  function admin_header() {
    $page = ( isset($_GET['page'] ) ) ? esc_attr( $_GET['page'] ) : false;
    if( 'hire_list_team' != $page )
    return;
    echo '<style type="text/css">';
    echo '.wp-list-table .column-id { width: 5%; }';
    echo '.wp-list-table .column-name { width: 8%; }';
    echo '.wp-list-table .column-phone { width: 8%; }';
    echo '.wp-list-table .column-email { width: 12%;}';
	echo '.wp-list-table .column-technology { width: 10%; }';
	echo '.wp-list-table .column-experience { width: 7%; }';
	echo '.wp-list-table .column-strictly { width: 7%; }';
	echo '.wp-list-table .column-need_resume { width: 6%; }';
	echo '.wp-list-table .column-technology_requirement { width: 10%; }';
	echo '.wp-list-table .column-created { width: 8%;}';
    echo '</style>';
  }

  function no_items() {
    _e( 'No hire techie requests found.' );
  }

  function column_default( $item, $column_name ) {
    switch( $column_name ) { 
        case 'name':
        case 'phone':
		case 'created':
		case 'technology':
		case 'experience':
		case 'job_description':
		case 'strictly':
		case 'technology_requirement':
		case 'need_resume':
        case 'email':
            return $item[ $column_name ];
        default:
            return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
    }
  }

function get_sortable_columns() {
  $sortable_columns = array(
    'name'  => array('name',false),
    'phone' => array('phone',false),
    'email'   => array('email',false),
	'technology'   => array('technology',false),
	'experience'   => array('experience',false),
	'need_resume'   => array('need_resume',false),
	'created'   => array('created',false)
  );
  return $sortable_columns;
}

function get_columns(){
        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'name' => __( 'Name', 'techielisttable' ),
            'phone'  => __( 'Phone', 'techielisttable' ),
            'email'     => __( 'Email', 'techielisttable' ),
			'technology'   => __( 'Role title', 'techielisttable' ),
			'experience'   => __( 'Desired exp', 'techielisttable' ),
			'strictly'   => __( 'Preferences', 'techielisttable' ),
			'job_description'   => __( 'Job description', 'techielisttable' ),
			'technology_requirement'   => __( 'Technology requirement', 'techielisttable' ),
			'need_resume'   => __( 'Need resumes', 'techielisttable' ),
			'created'   => __( 'Date', 'techielisttable' ),
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
				'<input type="checkbox" name="team[]" value="%s" />', $item['id']
			);    
	}
	
	function process_bulk_action() { 
		// If the delete bulk action is triggered
		if ( (isset( $_POST['action'] ) && ($_POST['action'] == 'delete')) || (isset( $_POST['action2'] ) && ($_POST['action2'] == 'delete')) ) {
			$delete_ids = esc_sql( $_POST['team'] );
			global $wpdb;
			// loop over the array of record IDs and delete them
			foreach ( $delete_ids as $did ) {
				$wpdb->query(" DELETE FROM fmt_hiretechie WHERE id='".$did."' ");
			}
		}
	}
	
	function prepare_items() {
	  $this->process_bulk_action();
	  global $wpdb;
	  $per_page = 50;
	  // If no sort, default to title
	  $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'created';
	  // If no order, default to asc
	  $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'desc';
	  $current_page = $this->get_pagenum();
	  $start = ( $current_page-1 )* $per_page;
	  $row = $wpdb->get_results(" SELECT COUNT(id) as total FROM fmt_hiretechie WHERE status='1' ");
	  $found_data = $wpdb->get_results(" SELECT * FROM fmt_hiretechie WHERE status='1' ORDER BY $orderby $order LIMIT $start, $per_page ", ARRAY_A);
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



function hire_add_menu_items(){
  $hook = add_menu_page( 'Hire From Our Techie Pool', 'Hire From Our Techie Pool', 'activate_plugins', 'hire_list_team', 'hire_render_list_page' );
  add_action( "load-$hook", 'add_hire_options' );
}

function add_hire_options() {
  global $techielisttable;
  $option = 'per_page';
  $args = array(
         'label' => 'Hire techie',
         'default' => 50,
         'option' => 'techie_per_page'
         );
  add_screen_option( $option, $args );
  $techielisttable = new Hire_Techie_List_Table();
}
add_action( 'admin_menu', 'hire_add_menu_items' );



function hire_render_list_page(){
  global $techielisttable;
  echo '</pre><div class="wrap"><h2>Hire From Our Techie Pool</h2>'; 
  $techielisttable->prepare_items(); 
  ?>
  <form method="post">
    <input type="hidden" name="page" value="hire_list_team">
    <?php
    $techielisttable->search_box( 'search', 'search_id' );

  $techielisttable->display(); 
  echo '</form></div>'; 
}