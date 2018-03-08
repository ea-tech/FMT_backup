<?php
/*
Plugin Name: Build your team requests
*/

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Build_Team_List_Table extends WP_List_Table {
	
    function __construct(){
    global $status, $page;

        parent::__construct( array(
            'singular'  => __( 'team', 'mylisttable' ),     //singular name of the listed records
            'plural'    => __( 'teams', 'mylisttable' ),   //plural name of the listed records
            'ajax'      => false        //does this table support ajax?

    ) );

    add_action( 'admin_head', array( &$this, 'admin_header' ) );            

    }

  function admin_header() {
    $page = ( isset($_GET['page'] ) ) ? esc_attr( $_GET['page'] ) : false;
    if( 'my_list_team' != $page )
    return;
    echo '<style type="text/css">';
    echo '.wp-list-table .column-id { width: 5%; }';
    echo '.wp-list-table .column-firstname { width: 15%; }';
    echo '.wp-list-table .column-lastname { width: 15%; }';
    echo '.wp-list-table .column-email { width: 20%;}';
	echo '.wp-list-table .column-created { width: 10%;}';
    echo '</style>';
  }

  function no_items() {
    _e( 'No team requests found.' );
  }

  function column_default( $item, $column_name ) {
    switch( $column_name ) { 
        case 'firstname':
        case 'lastname':
		case 'created':
        case 'email':
            return $item[ $column_name ];
        case 'members':
            return unserialize($item[ $column_name ]);
        default:
            return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
    }
  }

function get_sortable_columns() {
  $sortable_columns = array(
    'firstname'  => array('firstname',false),
    'lastname' => array('lastname',false),
    'email'   => array('email',false),
	'created'   => array('created',false)
  );
  return $sortable_columns;
}

function get_columns(){
        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'firstname' => __( 'First name', 'mylisttable' ),
            'lastname'  => __( 'Last name', 'mylisttable' ),
            'email'     => __( 'Email', 'mylisttable' ),
			'members'   => __( 'Member Details', 'mylisttable' ),
			'created'   => __( 'Date', 'mylisttable' ),
        );
         return $columns;
    }

	function column_members($item){
		$members = '';
		$arrmem = unserialize($item['members']);
		foreach($arrmem as $key=>$value){
			if(is_array($value)){
				foreach($value as $k=>$v){
					$members .= $k.': '.$v.'<br />';
				}
				$members .= '------------------------------<br />';
			}else{
				$members .= $key.': '.$value.'<br />';
			}
		}
		return $members;
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
				$wpdb->query(" DELETE FROM fmt_buildteam WHERE id='".$did."' ");
			}
		}
	}
	
	function prepare_items() {
	  $this->process_bulk_action();
	  global $wpdb;
	  $per_page = 20;
	  // If no sort, default to title
	  $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'created';
	  // If no order, default to asc
	  $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'desc';
	  $current_page = $this->get_pagenum();
	  $start = ( $current_page-1 )* $per_page;
	  $row = $wpdb->get_results(" SELECT COUNT(id) as total FROM fmt_buildteam WHERE status='1' ");
	  $found_data = $wpdb->get_results(" SELECT * FROM fmt_buildteam WHERE status='1' ORDER BY $orderby $order LIMIT $start, $per_page ", ARRAY_A);
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



function my_add_menu_items(){
  $hook = add_menu_page( 'Build your team data', 'Build your team request', 'activate_plugins', 'my_list_team', 'my_render_list_page' );
  add_action( "load-$hook", 'add_options' );
}

function add_options() {
  global $myListTable;
  $option = 'per_page';
  $args = array(
         'label' => 'Build your team',
         'default' => 10,
         'option' => 'teams_per_page'
         );
  add_screen_option( $option, $args );
  $myListTable = new Build_Team_List_Table();
}
add_action( 'admin_menu', 'my_add_menu_items' );



function my_render_list_page(){
  global $myListTable;
  echo '</pre><div class="wrap"><h2>Build your team requests</h2>'; 
  $myListTable->prepare_items(); 
  ?>
  <form method="post">
    <input type="hidden" name="page" value="my_list_team">
    <?php
    $myListTable->search_box( 'search', 'search_id' );

  $myListTable->display(); 
  echo '</form></div>'; 
}