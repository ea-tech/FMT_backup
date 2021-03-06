<?php
/**
 * FMT functions and definitions
 */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'jquery-ui-style', get_stylesheet_directory_uri() . '/css/jquery-ui.css' );
	wp_enqueue_style( 'select2-style', get_stylesheet_directory_uri() . '/css/select2.min.css' );
	wp_enqueue_style( 'font-awesome-style', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
	wp_register_script('common-script', get_stylesheet_directory_uri() . '/js/common.js', array('jquery'), true );
	wp_enqueue_script('common-script');
	wp_register_script('select2-script', get_stylesheet_directory_uri() . '/js/select2.min.js', array('jquery'), true );
	wp_enqueue_script('select2-script');
	wp_register_script('bootstrap-script', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), true );
	wp_enqueue_script('bootstrap-script');
}


add_filter('show_admin_bar', '__return_false');
function annointed_admin_bar_remove() {
        global $wp_admin_bar;
        /* Remove their stuff */
        $wp_admin_bar->remove_menu('wp-logo');
        $wp_admin_bar->remove_menu('comments');
        $wp_admin_bar->remove_menu('new-content');		
}
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

// This theme uses wp_nav_menu() in three locations.
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'findmetechie' ),
	'social'  => __( 'Social Links Menu', 'findmetechie' ),
	'footer'  => __( 'Footer Menu', 'findmetechie' ),
) );


add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login
function my_front_end_login_fail( $username ) {
   $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
   // if there's a valid referrer, and it's not the default log-in screen
   if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
      wp_redirect( $referrer . '?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
      exit;
   }
}



function findmetechie_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'findmetechie' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'findmetechie' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header Area', 'findmetechie' ),
		'id'            => 'header-area',
		'description'   => __( 'Appears at the header of all pages.', 'findmetechie' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Blog Header Area', 'findmetechie' ),
		'id'            => 'blog-header-area',
		'description'   => __( 'Appears at the header of blog pages.', 'findmetechie' ),
		'before_widget' => '<div id="%1$s" class="heroPannelBlog widget %2$s"><div class="inner">',
		'after_widget'  => '<div class="cl"></div></div></div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Blog Footer Area', 'findmetechie' ),
		'id'            => 'blog-footer',
		'description'   => __( 'Appears at the footer of blog pages.', 'findmetechie' ),
		'before_widget' => '<div id="%1$s" class="tryFreePannel blogText widget %2$s"><div class="inner">',
		'after_widget'  => '<div class="cl"></div></div></div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'About Footer Area', 'findmetechie' ),
		'id'            => 'about-footer',
		'description'   => __( 'Appears at the footer of about page.', 'findmetechie' ),
		'before_widget' => '<div class="about-row3"><div id="%1$s" class="tryFreePannel widget %2$s"><div class="inner">',
		'after_widget'  => '<div class="cl"></div></div></div></div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Home Content Area', 'findmetechie' ),
		'id'            => 'middle-area',
		'description'   => __( 'Appears at the content of home page.', 'findmetechie' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Pricing Content Area', 'findmetechie' ),
		'id'            => 'pricing-area',
		'description'   => __( 'Appears at the content of pricing page.', 'findmetechie' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'findmetechie' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'findmetechie' ),
		'before_widget' => '<div id="%1$s" class="widget %1$s %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'findmetechie' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'findmetechie' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s %1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Area', 'findmetechie' ),
		'id'            => 'footer-area',
		'description'   => __( 'Appears at the bottom of all pages.', 'findmetechie' ),
		'before_widget' => '<div id="%1$s" class="newsletter widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Links', 'findmetechie' ),
		'id'            => 'footer-links',
		'description'   => __( 'Appears at the bottom of all pages.', 'findmetechie' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'News Letter Subscribe', 'findmetechie' ),
		'id'            => 'news-letter-subscribe',
		'description'   => __( 'Appears at the bottom of all pages.', 'findmetechie' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'findmetechie_widgets_init' );

add_filter( 'attachments_settings_screen', '__return_false' ); 
add_filter( 'attachments_default_instance', '__return_false' ); // disable the default instance

function content_blocks( $attachments ){
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'attachments' ),    // label to display
      'default'   => '',                         // default value upon selection
    ),
    array(
      'name'      => 'description',                       // unique field name
      'type'      => 'wysiwyg',                      // registered field type
      'label'     => __( 'Description', 'attachments' ),  // label to display
      'default'   => '',                       // default value upon selection
    ),
    array(
      'name'      => 'buttontext',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Button Text', 'attachments' ),    // label to display
      'default'   => '',                         // default value upon selection
    ),
    array(
      'name'      => 'buttonlink',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Button Link', 'attachments' ),    // label to display
      'default'   => '',                         // default value upon selection
    ),
  );

  $args = array(
    // title of the meta box (string)
    'label'         => 'Content Blocks',
    // all post types to utilize (string|array)
    'post_type'     => array( 'page' ),
    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',
    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',
    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => array('image'),  // no filetype limit
    // include a note within the meta box (string)
    'note'          => 'Attach main image of content block here!',
    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,
    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Image', 'attachments' ),
    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),
    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',
    // whether Attachments should set 'Uploaded to' (if not already set)
	'post_parent'   => false,
    // fields array
    'fields'        => $fields,
  );

  $attachments->register( 'content_blocks', $args ); // unique instance name
}




function our_services_blocks( $attachments ){
  $fields         = array(
    array(
      'name'      => 'description',                       // unique field name
      'type'      => 'wysiwyg',                      // registered field type
      'label'     => __( 'Description', 'attachments' ),  // label to display
      'default'   => '',                       // default value upon selection
    ),
  );

  $args = array(
    // title of the meta box (string)
    'label'         => 'Our Services & Assurances  Blocks',
    // all post types to utilize (string|array)
    'post_type'     => array( 'page' ),
    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',
    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',
    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => array('image'),  // no filetype limit
    // include a note within the meta box (string)
    'note'          => 'Attach main image of content block here!',
    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,
    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Image', 'attachments' ),
    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),
    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',
    // whether Attachments should set 'Uploaded to' (if not already set)
	'post_parent'   => false,
    // fields array
    'fields'        => $fields,
  );

  $attachments->register( 'our_services_blocks', $args ); // unique instance name
}



function sign_up_customer_blocks( $attachments ){
  $fields         = array(
    array(
      'name'      => 'description',                       // unique field name
      'type'      => 'wysiwyg',                      // registered field type
      'label'     => __( 'Description', 'attachments' ),  // label to display
      'default'   => '',                       // default value upon selection
    ),
  );

  $args = array(
    // title of the meta box (string)
    'label'         => 'Benefits of signing up for FindMeTechie  Blocks',
    // all post types to utilize (string|array)
    'post_type'     => array( 'page' ),
    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',
    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',
    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => array('image'),  // no filetype limit
    // include a note within the meta box (string)
    'note'          => 'Attach main image of content block here!',
    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,
    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Image', 'attachments' ),
    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),
    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',
    // whether Attachments should set 'Uploaded to' (if not already set)
	'post_parent'   => false,
    // fields array
    'fields'        => $fields,
  );

  $attachments->register( 'sign_up_customer_blocks', $args ); // unique instance name
}





function sign_up_techie_blocks( $attachments ){
  $fields         = array(
    array(
      'name'      => 'description',                       // unique field name
      'type'      => 'wysiwyg',                      // registered field type
      'label'     => __( 'Description', 'attachments' ),  // label to display
      'default'   => '',                       // default value upon selection
    ),
  );

  $args = array(
    // title of the meta box (string)
    'label'         => 'Benefits of signing up for FindMeTechie  Blocks',
    // all post types to utilize (string|array)
    'post_type'     => array( 'page' ),
    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',
    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',
    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => array('image'),  // no filetype limit
    // include a note within the meta box (string)
    'note'          => 'Attach main image of content block here!',
    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,
    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Image', 'attachments' ),
    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),
    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',
    // whether Attachments should set 'Uploaded to' (if not already set)
	'post_parent'   => false,
    // fields array
    'fields'        => $fields,
  );

  $attachments->register( 'sign_up_techie_blocks', $args ); // unique instance name
}




function about_us_blocks( $attachments ){
  $fields         = array(
   array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'attachments' ),    // label to display
      'default'   => '',                         // default value upon selection
    ),
    array(
      'name'      => 'description',                       // unique field name
      'type'      => 'wysiwyg',                      // registered field type
      'label'     => __( 'Description', 'attachments' ),  // label to display
      'default'   => '',                       // default value upon selection
    ),
  );

  $args = array(
    // title of the meta box (string)
    'label'         => 'About us FindMeTechie  Blocks',
    // all post types to utilize (string|array)
    'post_type'     => array( 'page' ),
    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',
    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',
    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => array('image'),  // no filetype limit
    // include a note within the meta box (string)
    'note'          => 'Attach main image of content block here!',
    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,
    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Image', 'attachments' ),
    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),
    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',
    // whether Attachments should set 'Uploaded to' (if not already set)
	'post_parent'   => false,
    // fields array
    'fields'        => $fields,
  );

  $attachments->register( 'about_us_blocks', $args ); // unique instance name
}

function technology_details_blocks( $attachments ){
  $fields         = array(
    array(
      'name'      => 'description',                       // unique field name
      'type'      => 'wysiwyg',                      // registered field type
      'label'     => __( 'Description', 'attachments' ),  // label to display
      'default'   => '',                       // default value upon selection
    ),
  );

  $args = array(
    // title of the meta box (string)
    'label'         => 'FindMeTechie  Blocks',
    // all post types to utilize (string|array)
    'post_type'     => array( 'technology' ),
    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',
    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',
    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => array('image'),  // no filetype limit
    // include a note within the meta box (string)
    'note'          => 'Attach main image of content block here!',
    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,
    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Image', 'attachments' ),
    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),
    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',
    // whether Attachments should set 'Uploaded to' (if not already set)
	'post_parent'   => false,
    // fields array
    'fields'        => $fields,
  );

  $attachments->register( 'technology_details_blocks', $args ); // unique instance name
}


if($_REQUEST['post'] == 299){
	add_action( 'attachments_register', 'our_services_blocks' );
}

if($_REQUEST['post'] == 286){
	add_action( 'attachments_register', 'sign_up_customer_blocks' );
}
if($_REQUEST['post'] == 77){
	add_action( 'attachments_register', 'sign_up_techie_blocks' );
}

if($_REQUEST['post'] == 5){
	add_action( 'attachments_register', 'about_us_blocks' );
}


add_action( 'attachments_register', 'content_blocks' );
add_action( 'attachments_register', 'technology_details_blocks' );

require get_stylesheet_directory() . '/inc/settings.php';

/**
 * Modify some elements for the menu
 */
if ( ! class_exists( 'FMT_Walker' ) ):

    class FMT_Walker extends Walker_Nav_Menu {

        /**
         * @see Walker::start_lvl()
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int $depth Depth of page. Used for padding.
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat( "\t", $depth );
            $output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu sub-menu".($depth ===0?" pull-left":"")."\">\n";
        }

        /**
         * @see Walker::start_el()
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item Menu item data object.
         * @param int $depth Depth of menu item. Used for padding.
         * @param int $current_page Menu item ID.
         * @param object $args
         */
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

            /**
             * Dividers, Headers or Disabled
             * =============================
             * Determine whether the item is a Divider, Header, Disabled or regular
             * menu item. To prevent errors we use the strcasecmp() function to so a
             * comparison that is not case sensitive. The strcasecmp() function returns
             * a 0 if the strings are equal.
             */
            if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
                $output .= $indent . '<li role="presentation" class="divider">';
            } else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
                $output .= $indent . '<li role="presentation" class="divider">';
            } else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
                $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
            } else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
                $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
            } else {

                $class_names = $value = '';

                $classes = empty( $item->classes ) ? array() : (array) $item->classes;
                $classes[] = 'menu-item-' . $item->ID;

                $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

                if ( $args->has_children && $depth === 1 ) {
                    $class_names .= ' dropdown-submenu';
                }
                elseif($args->has_children) {
                    $class_names .= ' dropdown';
                    if ($item->mega == 'yes') {
                        $class_names .= ' kleo-megamenu';
                    }
                    $submenus = $depth == 0 ? get_posts( array( 'post_type' => 'nav_menu_item', 'numberposts' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'meta_query' => array( array( 'key' => '_menu_item_menu_item_parent', 'value' => $item->ID ) ) ) ) : false;
                    $count = $submenus ? count( $submenus ) : 'no';

                    $class_names .= ' mega-' . $count . '-cols';
                }

                if ( in_array( 'current-menu-item', $classes ) )
                    $class_names .= ' active';

                $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

                $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
                $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

                $data_li = $indent . '<li' . $id . $value . $class_names .'>';

                $atts = array();
                if (strpos($item->attr_title,'class=') !== false) {
                    $atts['class'] = (isset($atts['class']) ? $atts['class']." " : '') . str_replace('class=', '', $item->attr_title);
                }else {
                    $atts['title'] = ! empty( $item->attr_title ) ? $item->attr_title : ( ! empty( $item->title ) ? esc_attr(wp_strip_all_tags($item->title)) : '' );
                }
                $atts['target'] = ! empty( $item->target )        ? $item->target        : '';
                $atts['rel'] = ! empty( $item->xfn )                ? $item->xfn        : '';

                // If item has_children add atts to a.
                if ( $args->has_children && $depth === 0 ) {
                    //$atts['href']				= '#';
                    $atts['href']					= ! empty( $item->url ) ? $item->url : '';
                    //$atts['data-toggle']	= 'dropdown';
                    $atts['class']				= 'dropdown-toggle';
					$atts['data-toggle'] = 'dropdown';
					$atts['role'] = 'button';
					$atts['aria-haspopup'] = 'true';
					$atts['aria-expanded'] = 'false';
                } else {
                    $atts['href'] = ! empty( $item->url ) ? $item->url : '';
                }

                $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

                $attributes = '';
                foreach ( $atts as $attr => $value ) {
                    if ( ! empty( $value ) ) {
                        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                        $attributes .= ' ' . $attr . '="' . $value . '"';
                    }
                }

                $item_output = $args->before;
                $item_output .= '<a'. $attributes .'>';

                /* allow shortcodes in item title */
                $item->title = do_shortcode( $item->title );

                /* Menu icons */
                if (isset( $item->icon ) && $item->icon != '') {
                    $title_icon = '<i class="icon-' . $item->icon . '"></i>';

                    if ( $item->iconpos == 'after' ) {
                        $title = $item->title . ' ' . $title_icon;
                    }
                    elseif ( $item->iconpos == 'icon' ) {
                        $title = $title_icon;
                    }
                    else {
                        $title = $title_icon . ' ' . $item->title;
                    }
                }
                else {
                    $title = $item->title;
                }

                $item_output .= $args->link_before . apply_filters( 'the_title', $title, $item->ID ) . $args->link_after;
                $item_output .= ( $args->has_children && in_array($depth, array(0,1))) ? ' <span class="glyphicon glyphicon-chevron-down0" aria-hidden="true"></span></a>' : '</a>';
                $item_output .= $args->after;

                //custom filters
                $css_target = preg_match( '/\skleo-(.*)-nav/', implode( ' ', $item->classes), $matches );
                // If this isn't a KLEO menu item, we can stop here
                if ( ! empty( $matches[1] ) ) {
                    $item_output = apply_filters( 'walker_nav_menu_start_el_' . $matches[1], $item_output, $item, $depth, $args );
                    $data_li = apply_filters( 'walker_nav_menu_start_el_li_' . $matches[1], $data_li, $item, $depth, $args);
                }

                $output .= $data_li;

                $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
        }

        public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
            if ( ! $element )
                return;

            $id_field = $this->db_fields['id'];

            // Display this element.
            if ( is_object( $args[0] ) )
                $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

            parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
        }

        public static function fallback( $args ) {
            if ( current_user_can( 'manage_options' ) ) {

                extract( $args );

                $fb_output = null;

                if ( $container ) {
                    $fb_output = '<' . $container;

                    if ( $container_id )
                        $fb_output .= ' id="' . $container_id . '"';

                    if ( $container_class )
                        $fb_output .= ' class="' . $container_class . '"';

                    $fb_output .= '>';
                }

                $fb_output .= '<ul';

                if ( $menu_id )
                    $fb_output .= ' id="' . $menu_id . '"';

                if ( $menu_class )
                    $fb_output .= ' class="' . $menu_class . '"';

                $fb_output .= '>';
                $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
                $fb_output .= '</ul>';

                if ( $container )
                    $fb_output .= '</' . $container . '>';

                echo $fb_output;
            }
        }
    }

endif;

/*SPAM VALIDATION FOR NAME FIELD IN CF7*/
add_filter('wpcf7_validate_text*', 'name_validation_filter', 20, 2);

function name_validation_filter($result, $tag) {
    //Get The Tag
    $tag = new WPCF7_FormTag($tag);
    //Check if the text field is the name
    if ('your-name' == $tag->name || 'name' == $tag->name || 'first-name' == $tag->name ||  'last-name' == $tag->name ||  'your-state' == $tag->name ||  'your-city' == $tag->name ||  'your-position' == $tag->name)
    {   
        //Set the possible name variables
        $your_name = isset($_POST['your-name']) ? trim($_POST['your-name']) : '';
        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
        $first_name = isset($_POST['first-name']) ? trim($_POST['first-name']) : '';
        $last_name = isset($_POST['last-name']) ? trim($_POST['last-name']) : '';
		$state = isset($_POST['your-state']) ? trim($_POST['your-state']) : '';
		$city = isset($_POST['your-city']) ? trim($_POST['your-city']) : '';
		$position = isset($_POST['your-position']) ? trim($_POST['your-position']) : '';
        //Check if any of the name variables have numbers
        if (!empty($your_name) && !preg_match("~[0-9a-z]~i", $your_name))
          $result->invalidate($tag, "Please enter a valid input format.");
        elseif (!empty($name) && !preg_match("~[0-9a-z]~i", $name))
          $result->invalidate($tag, "Please enter a valid input format.");
        else if (!empty($first_name) && !preg_match("~[0-9a-z]~i", $first_name))
          $result->invalidate($tag, "Please enter a valid input format.");
        else if (!empty($last_name) && !preg_match("~[0-9a-z]~i", $last_name))
          $result->invalidate($tag, "Please enter a valid input format.");
        else if (!empty($state) && !preg_match("~[0-9a-z]~i", $state))
          $result->invalidate($tag, "Please enter a valid input format.");
        else if (!empty($city) && !preg_match("~[0-9a-z]~i", $city))
          $result->invalidate($tag, "Please enter a valid input format.");
        else  if (!empty($position) && !preg_match("~[0-9a-z]~i", $position))
          $result->invalidate($tag, "Please enter a valid input format.");
    }
    return $result;
}

add_filter( 'wpcf7_validate_email*', 'custom_email_validation_filter', 20, 2 );
 
function custom_email_validation_filter( $result, $tag ) {
    $tag = new WPCF7_FormTag( $tag );
	$email = isset($_POST['your-email']) ? trim($_POST['your-email']) : '';
    if ( 'your-email' == $tag->name ) {
        if ( email_exists( $email ) ) {
            $result->invalidate( $tag, "An account already exists using this email address?" );
        }
    }
 
    return $result;
}

function create_user_from_registration($cfdata) {
	$headers = array();
	$headers[] = 'Content-Type: text/html; charset=UTF-8';
	$headers[] = 'From: '.get_option( 'blogname' ).' <'.get_option( 'admin_email' ).'>';
    if (!isset($cfdata->posted_data) && class_exists('WPCF7_Submission')) {
        // Contact Form 7 version 3.9 removed $cfdata->posted_data and now
        // we have to retrieve it from an API
        $submission = WPCF7_Submission::get_instance();
        if ($submission) {
            $formdata = $submission->get_posted_data();
        }
    } elseif (isset($cfdata->posted_data)) {
        // For pre-3.9 versions of Contact Form 7
        $formdata = $cfdata->posted_data;
    } else {
        // We can't retrieve the form data
        return $cfdata;
    }
	
	$countries = getCountries();
	
    // Check this is the user registration form
    if ( $cfdata->title() == 'multipart techie form') {		
        $password = wp_generate_password( 12, false );
        $email = $formdata['your-email'];
        $name = $formdata['your-name'];
		$description = $formdata['project-detail'];
		$preferences = $formdata['strictly'];
		 

        // Construct a username from the user's name
        $username = strtolower($email);
        $name_parts = explode(' ',$name);
        if ( !email_exists( $email ) ) {
            // Create the user
            $userdata = array(
                'user_login' => $username,
                'user_pass' => $password,
                'user_email' => $email,
                'nickname' => reset($name_parts),
                'display_name' => $name,
                'first_name' => reset($name_parts),
                'last_name' => end($name_parts),
				'description' => $description,
                'role' => 'techie'
            );
			
			##### start add custom technology if not exists
			$expertisetaxonomydata = $formdata['expertise'];
			foreach ($expertisetaxonomydata as $value) {
			   if(!get_page_by_title($value, OBJECT, 'technology')){
				  
						$post_id = wp_insert_post(array (
						'post_type' => 'technology',
						'post_title' => $value,
						'post_content' => '',
						'post_status' => 'pending',						 
						));

    

                    }
				  
				  
              }
			
			 $technologies = getRawTechnologiesTree('publish'); 	
			 $technologies2 = getRawTechnologiesTree('draft');
           
			 ##### end add custom technology if not exists
		   
            $user_id = wp_insert_user( $userdata );
            if ( !is_wp_error($user_id) ) {
				$educational = esc_attr($formdata['educational']);
				$yourgoal = esc_attr($formdata['yourgoal']);
				$challenging_project = esc_attr($formdata['challenging-project']);
				$position = esc_attr($formdata['your-position']);
				$experience = $formdata['experience'];
				$city = esc_attr($formdata['city']);
				$country = array_search ($formdata['country-name'], $countries);
				$expertise = $formdata['expertise'];
				
				$expertiseArray = array();				
				foreach ($expertise as $value) {
                 $var = array_search ($value, $technologies);
				 if(empty($var))
					 $var = array_search ($value, $technologies2);
				 $expertiseArray[] = $var;
                }
				$expertise = $expertiseArray;
				$preferences = $formdata['strictly'];
				
				
				
							
				$skills = $formdata['skills'];
				$domain = $formdata['domain-knowledge'];
				$phone = esc_attr($formdata['your-phone']);
				if(!empty($_FILES['upload-photo']['name'])) {
					$upload_dir = wp_upload_dir();
					$upload_path = $upload_dir['basedir'].'/thumbs/'.$user_id.'/';
					if ( $submission = WPCF7_Submission::get_instance() ) {
						$uploads = $submission->uploaded_files();
						mkdir($upload_path, 0777); 
						copy($uploads['upload-photo'], $upload_path.$_FILES['upload-photo']['name']);
						add_user_meta($user_id, 'userphoto_thumb_file', $_FILES['upload-photo']['name']);
						
						    //move_uploaded_file($userfile_tmp, $large_image_location);
							//echo $upload_path.$_FILES['upload-photo']['name'];
							//die('dddddddd');
							/*
                            chmod ($upload_path.$_FILES['upload-photo']['name'], 0777); 
                            $width = getWidth($upload_path.$_FILES['upload-photo']['name']);
                            $height = getHeight($upload_path.$_FILES['upload-photo']['name']);
							$max_width = 122;
							//$max_width = 122;
                            //Scale the image if it is greater than the width set above
                            if ($width > $max_width){
                            $scale = $max_width/$width;
                            $uploaded = resizeImage($upload_path.$_FILES['upload-photo']['name'],$width,$height,$scale);
                            }else{
                            $scale = 1;
                            $uploaded = resizeImage($upload_path.$_FILES['upload-photo']['name'],$width,$height,$scale);
                            }
							*/
						
						
						
					}
				}
				add_user_meta($user_id, 'educational', $educational);
				add_user_meta($user_id, 'yourgoal', $yourgoal);
				add_user_meta($user_id, 'challenging_project', $challenging_project);
				add_user_meta($user_id, 'position', $position);
				add_user_meta($user_id, 'experience', $experience);
				add_user_meta($user_id, 'city', $city);
				add_user_meta($user_id, 'skills', $skills);
				add_user_meta($user_id, 'domain', $domain);
				add_user_meta($user_id, 'phone', $phone);
				add_user_meta($user_id, 'country', $country);
				add_user_meta($user_id, 'expertise', $expertise);
				add_user_meta($user_id, 'preferences', $preferences);
				wp_cache_delete($user_id, 'users');
                // Email login details to user
                $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
                $message = "Dear ".reset($name_parts)."\r<br /><br />";
				$message .= "Thank you for signing up for FindMeTechie(FMT) and submitting your resume." . "\r<br />";
				$message .= "Welcome to our wide network of highly accomplished Techies." . "\r<br /><br />";
				$message .= "Your login details are as follows:" . "\r<br /><br />";
                $message .= sprintf(__('Username: %s'), $username) . "\r<br />";
                $message .= sprintf(__('Password: %s'), $password) . "\r<br /><br />";
				$message .= "Please note that we publish techie profiles only based on their prior consent, do not publish any personal details such as name, email or contact numbers and ensure that Techies are paid as per mutually agreed terms." . "\r<br /><br />";
                $message .= "Please ensure that you have carefully filled all the fields highlighting your key skills, along with your photo, as this information is the only basis for our clients to make an opinion about engaging you." . "\r<br /><br />";
				$message .= "We encourage you to review your profile from time to time and keep it updated." . "\r<br />";
				$message .= home_url() . "\r<br /><br />";
				$message .= "If you have any questions, you can contact us on admin@findmetechie.com." . "\r<br /><br />";
				$message .= "We look forward to a mutually rewarding relationship. Thank you." . "\r<br /><br />";
				$message .= "Regards," . "\r<br /><br />";
				$message .= "FMT Team" . "\r<br />";
				$message .= home_url();
				
               $fmtid_code = "##TECHIEID##";
			   $admin_techie_subject = do_shortcode('[text-blocks id="techie-registration-mail-subject" plain="1"]');	
			   $admin_techie_subject = str_replace($fmtid_code,$user_id,$admin_techie_subject);
				
                wp_mail($email,$admin_techie_subject, $message, $headers);				
				$adminnew_mail = "neeraj@eatechnologies.com";				
				//$admin_techie_subject = "New techie registration confirmation - FMT";
				wp_mail($adminnew_mail,$admin_techie_subject, $message, $headers);
				$to = get_option( 'admin_email' );
				wp_mail($to,$admin_techie_subject, $message, $headers);
            }
        }
    }else if ( $cfdata->title() == 'Employer Registration form') {
        $password = wp_generate_password( 12, false );
        $email = $formdata['your-email'];
        $name = $formdata['your-name'];
		//$description = $formdata['other-information'];
		//$website = $formdata['website-address'];
		//$other_information = $formdata['other-information'];
		
        // Construct a username from the user's name
        $username = strtolower($email);
        $name_parts = explode(' ',$name);
        if ( !email_exists( $email ) ) {
            // Create the user
            $userdata = array(
                'user_login' => $username,
                'user_pass' => $password,
                'user_email' => $email,
                'nickname' => reset($name_parts),
                'display_name' => $name,
                'first_name' => reset($name_parts),
                'last_name' => end($name_parts),
				//'description' => $description,
				'user_url' => $website,
                'role' => 'employer'
            );
            $user_id = wp_insert_user( $userdata );
            if ( !is_wp_error($user_id) ) {
				/*$address = esc_attr($formdata['your-address']);
				$city = esc_attr($formdata['your-city']);
				$state = esc_attr($formdata['your-state']);
				$country = array_search ($formdata['your-country'], $countries);
				$pin = esc_attr($formdata['your-pin']);
				$company = esc_attr($formdata['company-name']);
				$company_type = esc_attr($formdata['company-type']);
				$phone = esc_attr($formdata['your-phone']);*/
				$address = "";
				$city = "";
				$state = "";
				$country = "";
				$pin = "";
				$company = "";
				$company_type = "";
				$phone = "";
				
				if(!empty($_FILES['upload-photo']['name'])) {
					$upload_dir = wp_upload_dir();
					$upload_path = $upload_dir['basedir'].'/thumbs/'.$user_id.'/';
					if ( $submission = WPCF7_Submission::get_instance() ) {
						$uploads = $submission->uploaded_files();
						mkdir($upload_path, 0777);
						copy($uploads['upload-photo'], $upload_path.$_FILES['upload-photo']['name']);
						add_user_meta($user_id, 'userphoto_thumb_file', $_FILES['upload-photo']['name']);
					}
				}
				add_user_meta($user_id, 'address', $address);
				add_user_meta($user_id, 'state', $state);
				add_user_meta($user_id, 'city', $city);
				add_user_meta($user_id, 'pin', $pin);
				add_user_meta($user_id, 'company', $company);
				add_user_meta($user_id, 'phone', $phone);
				add_user_meta($user_id, 'country', $country);
				add_user_meta($user_id, 'company_type', $company_type);
				wp_cache_delete($user_id, 'users');
                // Email login details to user
                $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
                $message = "Dear ".reset($name_parts)."\r<br /><br />";
				$message .= "Thank you for registering forFindMeTechie(FMT). We are delighted to have you as part of our network." . "\r<br /><br />";
				$message .= "Your login details are as follows:" . "\r<br /><br />";
                $message .= sprintf(__('Username: %s'), $username) . "\r<br />";
                $message .= sprintf(__('Password: %s'), $password) . "\r<br /><br />";
				$message .= "As a registered member, you are entitled to access our comprehensive Techie Database and also avail our subsidized services that we offer to our members from time to time." . "\r<br /><br />";
				$message .= "Please take out time to review the FMT Database and let us know if you have any specific requirements using any of our website features or just by dropping a message to admin@findmetechie.com."."\r<br /><br />";
				$message .= "We encourage you to review your profile from time to time and keep it updated." . "\r<br />";
				$message .= home_url() . "\r<br /><br />";
				$message .= "We assure you of the best of our services and look forward to a mutually rewarding relationship. Thank you." . "\r<br /><br />";
				$message .= "Regards," . "\r<br /><br />";
				$message .= "FMT Team" . "\r<br />";
				$message .= home_url();
                wp_mail($email, sprintf(__('[%s] Your username and password'), $blogname), $message, $headers);				
				$adminnew_mail = "neeraj@eatechnologies.com";	
				$admin_employer_subject = "New employer registration confirmation - FMT";
				wp_mail($adminnew_mail,$admin_employer_subject, $message, $headers);
				$to = get_option( 'admin_email' );
				wp_mail($to,$admin_employer_subject, $message, $headers);
				
            }
        }
    }
    return $cfdata;
}
add_action('wpcf7_before_send_mail', 'create_user_from_registration', 1);

function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}
add_action( 'init', 'disable_wp_emojicons' );

function getTechnologiesTree(){
	$technologies = array();
	$techarray = get_posts(array('post_type' => 'technology', 'orderby' => 'post_title', 'order'=>'ASC', 'posts_per_page'=>-1));
	foreach($techarray as $vt){
		if(!$vt->post_parent){
			$technologies[$vt->ID] = $vt->post_title;
			$children = get_page_children( $vt->ID, $techarray);
			if(!empty($children)){
				foreach($children as $vc){
					$technologies[$vc->ID] = ' - '.$vc->post_title;
				}
			}		
		}
	}
	return $technologies;
}

function getRawTechnologiesTree($status = 'any'){
	$technologies = array();
	$techarray = get_posts(array('post_type' => 'technology', 'orderby' => 'post_title', 'order'=>'ASC', 'posts_per_page'=>-1,'post_status' => $status));
	foreach($techarray as $vt){
		if(!$vt->post_parent){
			$technologies[$vt->ID] = $vt->post_title;
			$children = get_page_children( $vt->ID, $techarray);
			if(!empty($children)){
				foreach($children as $vc){
					$technologies[$vc->ID] = ' - '.$vc->post_title;
				}
			}		
		}
	}
	return $technologies;
}


function domain_knowledge_Tree(){	
$domain_knowledge_array = array('14' =>'Banking and Finance', '39' =>'e-marketing', '8' =>'HealthCare','31' =>'Insurance','10' =>'Supply Chain', '1' =>'Travel and Hospitality', '4' =>'Other');
return $domain_knowledge_array;
}


function dynamic_select_list($tag, $unused){ 
	$options = (array)$tag['options'];
	$countries = getCountries();
	if(in_array('id:select-dropdown-country', $options)){
		foreach($countries as $k=>$c){
			$tag['raw_values'][] = $k.'|'.$c;
			$tag['values'][] = $k;
			$tag['labels'][] = $k;
			$tag['pipes']->add_pipe($k.'|'.$c);
		}
	}else if(in_array('id:select-dropdown-expertise', $options)){
		$technologies = getRawTechnologiesTree('publish');
		foreach($technologies as $k=>$t){
			$tag['raw_values'][] = $k.'|'.$t;
			$tag['values'][] = $k;
			$tag['labels'][] = $k;
			$tag['pipes']->add_pipe($k.'|'.$t);
		}	
		//print_r($tag);die;
	}
	return $tag; 
}
add_filter( 'wpcf7_form_tag', 'dynamic_select_list', 10, 2);




add_action('wp_ajax_nopriv_hiretechie','hiretechie');
add_action('wp_ajax_hiretechie','hiretechie');

function hiretechie(){
	global $wpdb;
	if(!empty($_POST['email'])){
		$Subject = 'FMT - Hire a Techie request';	
		$technology = $_POST['technology'];
		$experience = $_POST['experience'];
		$job_description = $_POST['job_description'];
		$strictly = $_POST['strictly'];
		$technology_requirement = $_POST['technology_requirement'];
		$fname = $_POST['fname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$Checkbox_Need_Resumes = $_POST['Checkbox_Need_Resumes'];
	   
		$Body = 'New request for hire a techie has been received.<br /><br />';
		$Body .= '<strong>Technology:</strong> '.$technology.'<br />';
		$Body .= '<strong>Desired Experience:</strong> '.$experience.'<br />';
		$Body .= '<strong>Job Description:</strong> '.nl2br($job_description).'<br />';
		$Body .= '<strong>Preferences:</strong> '.$strictly.'<br />';
		$Body .= '<strong>Technology Requirement:</strong> '.$technology_requirement.'<br />';
		$Body .= '<strong>Name:</strong> '.$fname.' <br />';
		$Body .= '<strong>Email:</strong> '.$email.'<br />';
		$Body .= '<strong>Phone:</strong> '.$phone.'<br />';
		$Body .= '<strong>Need Resume?</strong> '. $Checkbox_Need_Resumes;
		
		$wpdb->insert( 
			'fmt_hiretechie', 
			array( 
				'name' => $fname,
				'phone' => $phone,
				'email' => $email,
				'created' => date('Y-m-d H:i:s'),
				'technology' => $technology,
				'experience' => $experience,
				'job_description' => $job_description,
				'strictly' => $strictly,
				'technology_requirement' => $technology_requirement,
				'need_resume' => $Checkbox_Need_Resumes
			)
		);

		$to = get_option( 'admin_email' );
		$headers = array();
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		$headers[] = 'From: '.get_option( 'blogname' ).' <'.get_option( 'admin_email' ).'>';
		 
		$sent = wp_mail( $to, $Subject, $Body, $headers );
		$toadmin = 'neeraj@eatechnologies.com';
		$sent_admin = wp_mail( $toadmin, $Subject, $Body, $headers );
		
		if(!$sent){
			echo "Unable to send your request, please try again.";
		}else{
			$Subject2 = 'FMT - Hire a Techie request confirmation';
			wp_mail( $email, $Subject2, $Body, $headers );
			echo "Your request has been received. We will get back to you shortly.";   
		}
	}
	die();
}

add_action('wp_ajax_nopriv_buildteam','buildteam');
add_action('wp_ajax_buildteam','buildteam');

function buildteam(){
	$firstname = ''; $lastname = ''; $email = ''; $skillset = '';
	global $wpdb;
	if(!empty($_POST['action']) && ($_POST['action'] == 'buildteam')){
		$Subject = 'FMT - Team building request';
		$members = array();
		$params = array();
		parse_str($_POST['querydata'], $params);
		$firstname = $params['firstname'];
		$lastname = $params['lastname'];
		$email = $params['email'];
		$position = $params['position'];
		foreach($position as $key => $value){
		   $skillset .= '<br />';
			$members[$key]['position'] = $value;
			$skillset .= '<span style="font-size: 14px; font-family: Verdana, Arial, Helvetica, sans-serif; border-bottom: 1px solid #d8d8d8; display: block; padding: 7px 0; line-height: 20px;">
  <strong style="display: inline-block; width: 150px;">Position:</strong><span> '.$value.'</span></span><br />';
			if(!empty($params['technology'])){
				$members[$key]['technology'] = $params['technology'][$key];
				$skillset .= ' <span style="font-size: 14px; font-family: Verdana, Arial, Helvetica, sans-serif; border-bottom: 1px solid #d8d8d8; display: block; padding: 7px 0; line-height: 20px;"><strong style="display: inline-block; width: 150px;"> Role Title:</strong><span> '.$params['technology'][$key].'</span> </span><br />';
			}
			if(!empty($params['experience'])){
				$members[$key]['experience'] = $params['experience'][$key];
				$skillset .= '<span style="font-size: 14px; font-family: Verdana, Arial, Helvetica, sans-serif; border-bottom: 1px solid #d8d8d8; display: block; padding: 7px 0; line-height: 20px;"><strong style="display: inline-block; width: 150px;">Desired Experience:</strong><span> '.$params['experience'][$key].' Years</span> </span><br />';
			}
			if(!empty($params['job_description'])){
				$members[$key]['job_description'] = $params['job_description'][$key];
				$skillset .= '<span style="font-size: 14px; font-family: Verdana, Arial, Helvetica, sans-serif; border-bottom: 1px solid #d8d8d8; display: block; padding: 7px 0; line-height: 20px;"><strong style="display: inline-block; width: 150px;">Job Description: </strong><span>'.$params['job_description'][$key].'</span> </span><br />';
			}
			if(!empty($params['jobsite'])){
				$members[$key]['jobsite'] = $params['jobsite'][$key];
				$skillset .= '<span style="font-size: 14px; font-family: Verdana, Arial, Helvetica, sans-serif; border-bottom: 1px solid #d8d8d8; display: block; padding: 7px 0; line-height: 20px;"><strong style="display: inline-block; width: 150px;"> Job Site:</strong><span> '.$params['jobsite'][$key].'</span></span><br />';
			}
			if(!empty($params['jobtype'])){
				$members[$key]['jobtype'] = $params['jobtype'][$key];
				$skillset .= '<span style="font-size: 14px; font-family: Verdana, Arial, Helvetica, sans-serif; display: block; padding: 7px 0; line-height: 20px;"><strong style="display: inline-block; width: 150px;"> Job Type:</strong><span> '.$params['jobtype'][$key].'</span> </span><br />';
			}
		}
		
		$wpdb->insert( 
			'fmt_buildteam', 
			array( 
				'firstname' => $firstname,
				'lastname' => $lastname,
				'email' => $email,
				'created' => date('Y-m-d H:i:s'),
				'members' => serialize($members)
			)
		);
	   
		$Body = '<h2 style="font-weight:600; font-size: 24px; font-family: Verdana, Arial, Helvetica, sans-serif;">A new team building request has been received.</h2>
		<div style="border: 1px solid #666; padding: 15px; width: 600px; margin-bottom: 30px;"> 
		<h2 style="font-weight:600; font-size: 20px; font-family: Verdana, Arial, Helvetica, sans-serif;">Team Details:-</h2>'.$skillset.'
		</div><div style="border: 1px solid #666; padding: 15px; width: 600px; margin-bottom: 30px;">
  <h2 style="font-weight:600; font-size: 20px; font-family: Verdana, Arial, Helvetica, sans-serif;">Sender details:-</h2><span style="font-size: 14px; font-family: Verdana, Arial, Helvetica, sans-serif; border-bottom: 1px solid #d8d8d8; display: block; padding: 7px 0; line-height: 20px;"><strong style="display: inline-block; width: 150px;">First name:</strong><span> '.$firstname.'</span> </span><br /><span style="font-size: 14px; font-family: Verdana, Arial, Helvetica, sans-serif; border-bottom: 1px solid #d8d8d8; display: block; padding: 7px 0; line-height: 20px;"><strong style="display: inline-block; width: 150px;">Last name:</strong><span> '.$lastname.'</span> </span><br /><span style="font-size: 14px; font-family: Verdana, Arial, Helvetica, sans-serif; display: block; padding: 7px 0; line-height: 20px;"><strong style="display: inline-block; width: 150px;">Email Address:</strong><span> '.$email.'</span> </span> </div>';
		$to = get_option( 'admin_email' );		
		$headers = array();
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		$headers[] = 'From: '.get_option( 'blogname' ).' <'.get_option( 'admin_email' ).'>';
		$sent = wp_mail( $to, $Subject, $Body, $headers );
		$toadmin = 'neeraj@eatechnologies.com';
        $sent_admin = wp_mail( $toadmin, $Subject, $Body, $headers );
		if(!$sent){
			echo '<script type="text/javascript">alert("Unable to send your request, please try again."); location.href="'.home_url().'";</script>';
		}else{
			$Subject2 = 'FMT - Team building request confirmation';
			wp_mail( $email, $Subject2, $Body, $headers );
			echo '<script type="text/javascript">alert("Your request has been received. We will get back to you shortly."); location.href="'.home_url().'";</script>';   
		}
	}
	die();
}

add_action('wp_ajax_nopriv_express_interest','express_interest');
add_action('wp_ajax_express_interest','express_interest');

function express_interest(){
	if($_POST['action']=="express_interest"){
		$Subject = 'FMT - Express interest request';	
		$current_user_email = $_POST['current_user_email'];
		$user_email = $_POST['user_email'];
		$role = $_POST['role'];
		$start_date = $_POST['start_date'];
		$duration = $_POST['duration'];
		$location = $_POST['location'];
		$job_description = $_POST['job_description'];
		
		 // Add the content of the form to $post as an array
		$new_post = array(
			'post_title'    => $role,
			'post_content'  => $job_description,
			'post_status'   => 'publish',           // Choose: publish, preview, future, draft, etc.
			'post_type' => 'express_interests'  //'post',page' or use a custom post type if you want to
		);
		//save the new post
		$pid = wp_insert_post($new_post); 

		update_field( 'field_58c0512bf4bd0', $role, $pid );
		update_field( 'field_58c0513df4bd1', $start_date, $pid );
		update_field( 'field_58c05150f4bd2', $duration, $pid );
		update_field( 'field_58c0515ef4bd3', $location, $pid ); 
 
	 
	 
		$Body = 'New request for Express intereste has been received.<br /><br />';
		$Body .= '<strong>Technology:</strong> '.$role.'<br />';
		$Body .= '<strong>Start Date:</strong> '.$start_date.'<br />';
		$Body .= '<strong>Desired:</strong> '.$duration.'<br />';
		$Body .= '<strong>Location:</strong> '.$location.'<br />';
		$Body .= '<strong>Job Description:</strong> '.nl2br($job_description).'<br />';
		
		$to = get_option( 'admin_email' );
		$headers = array();
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		$headers[] = 'From: '.get_option( 'blogname' ).' <'.get_option( 'admin_email' ).'>';
		 
		$sent = wp_mail( $to, $Subject, $Body, $headers );
		//$sent = wp_mail( $user_email, $Subject, $Body, $headers );
		$sent = wp_mail( $current_user_email, $Subject, $Body, $headers );
		if(!$sent){
			echo "Unable to send your request, please try again.";
		}else{
			echo "Your request has been received. We will get back to you shortly.";   
		}
	}
	die();
}


add_action('wp_ajax_nopriv_hire_me','hire_me');
add_action('wp_ajax_hire_me','hire_me');

function hire_me(){
	if($_POST['action']=="hire_me"){
	 if ( is_user_logged_in() ) {
	   global $current_user;
	   
		$Subject = 'FMT - Express interest request';
		
		$employer_user_email = $current_user->user_email;
		$employer_id= $current_user->ID;
		$employer_info=get_userdata($employer_id);
		$employer_name = $employer_info->first_name." ".$employer_info->last_name;
		$employer_phone = get_user_meta( $employer_id, 'phone', true );
		$created_date = date('Y-m-d H:i:s');
		
		$techie_id= $_POST['techie_id'];		
		$techie_info=get_userdata($techie_id);
	    $techie_email = $techie_info->user_email;
	    $techie_name = $techie_info->first_name." ".$techie_info->last_name;
		$techie_phone = get_user_meta( $techie_id, 'phone', true );
	    
        global $wpdb;	
        $wpdb->query("INSERT INTO fmt_hire_me 	(employer_id,employer_name,employer_email,employer_phone,hire_request_date,techie_id,techie_name,techie_phone,techie_email)                
					  VALUES ('$employer_id','$employer_name','$employer_user_email','$employer_phone','$created_date','$techie_id','$techie_name','$techie_phone','$techie_email')"); 		
	    
	 
		$Body = 'New request for Hire Me has been received.<br /><br />';
		$Body .= '<strong>Employer ID:</strong> '.$employer_id.'<br />';
		$Body .= '<strong>Employer Name:</strong> '.$employer_name.'<br />';
		$Body .= '<strong>Employer Email:</strong> '.$employer_user_email.'<br />';
		$Body .= '<strong>Employer Phone:</strong> '.$employer_phone.'<br />';
		$Body .= '<strong>Date:</strong> '.$created_date.'<br />';
		$Body .= '<strong>Techie ID:</strong> '.$techie_id.'<br />';
		$Body .= '<strong>Techie Name:</strong> '.$techie_name.'<br />';
		$Body .= '<strong>Techie Email:</strong> '.$techie_email.'<br />';
		$Body .= '<strong>Techie Phone:</strong> '.$techie_phone.'<br />';
		
		$to = get_option( 'admin_email' );
		//$to = 'priyanka@eatechnologies.com';
		$headers = array();
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		$headers[] = 'From: '.get_option( 'blogname' ).' <'.get_option( 'admin_email' ).'>';
		 
		$sent = wp_mail( $to, $Subject, $Body, $headers );
		$toadmin = 'neeraj@eatechnologies.com';
		$sentadmin = wp_mail( $toadmin, $Subject, $Body, $headers );
		//$sent = wp_mail( $user_email, $Subject, $Body, $headers );
		//$sent = wp_mail( $current_user_email, $Subject, $Body, $headers );
		if(!$sent){
			echo "Unable to send your request, please try again.";
		}else{
			echo "Your request has been received. We will get back to you shortly.";   
		}
	 }else{
	 
	 echo "sessionout";
	 
	 }	
	}
	die();
}  
 
add_action('admin_init','add_role_caps',999);
function add_role_caps() {

	// Add the roles you'd like to administer the custom post types
	$roles = array('employer','administrator');

	// Loop through each role and assign capabilities
	foreach($roles as $the_role) { 
	 $role = get_role($the_role);
		 $role->add_cap( 'read' );
		 $role->add_cap( 'read_express_interest');
		 $role->add_cap( 'read_private_express_interests' );
		 $role->add_cap( 'edit_express_interest' );
		 $role->add_cap( 'edit_express_interests' );
		 $role->add_cap( 'edit_others_express_interests' );
		 $role->add_cap( 'edit_published_express_interests' );
		 $role->add_cap( 'publish_express_interests' );
		 $role->add_cap( 'delete_others_express_interests' );
		 $role->add_cap( 'delete_private_express_interests' );
		 $role->add_cap( 'delete_published_express_interests' );

	}
}

function getCountryByID($id){
	global $wpdb;
	$query = " SELECT name, Iso2 FROM fmt_country WHERE country_id = '$id' ";
	return $wpdb->get_row($query);
}

function getCountries(){
	global $wpdb;
	$query = " SELECT country_id, name FROM fmt_country WHERE 1 = 1 ";
	$countries = $wpdb->get_results($query);
	$arrcountries = array(); 
	foreach ($countries as $country) {
		$arrcountries[$country->country_id] = $country->name;
	}
	return $arrcountries;
}

function getLocationInfoByIp(){

    $client  = @$_SERVER['HTTP_CLIENT_IP'];

    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];

    $remote  = @$_SERVER['REMOTE_ADDR'];

    $result  = array('country'=>'', 'city'=>'');

    if(filter_var($client, FILTER_VALIDATE_IP)){

        $ip = $client;

    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){

        $ip = $forward;

    }else{

        $ip = $remote;

    }

    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    

    if($ip_data && $ip_data->geoplugin_countryName != null){

        $result['country'] = $ip_data->geoplugin_countryCode;

        $result['city'] = $ip_data->geoplugin_city;

    }
	

    return $result;

}

/*
 * Create a column. And maybe remove some of the default ones
 * @param array $columns Array of all user table columns {column ID} => {column Name} 
 */
add_filter( 'manage_users_columns', 'rudr_modify_user_table' );
 
function rudr_modify_user_table( $columns ) {
 
	// unset( $columns['posts'] ); // maybe you would like to remove default columns
	$columns['registerdate'] = 'Registration date'; // add new
 
	return $columns;
 
}
 
/*
 * Fill our new column with the registration dates of the users
 * @param string $row_output text/HTML output of a table cell
 * @param string $column_id_attr column ID
 * @param int $user user ID (in fact - table row ID)
 */
add_filter( 'manage_users_custom_column', 'rudr_modify_user_table_row', 10, 3 );
 
function rudr_modify_user_table_row( $row_output, $column_id_attr, $user ) {
 
	$date_format = 'j M, Y H:i';
 
	switch ( $column_id_attr ) {
		case 'registerdate' :
			return date( $date_format, strtotime( get_the_author_meta( 'registered', $user ) ) );
			break;
		default:
	}
 
	return $row_output;
 
}
 
/*
 * Make our "Registration date" column sortable
 * @param array $columns Array of all user sortable columns {column ID} => {orderby GET-param} 
 */
add_filter( 'manage_users_sortable_columns', 'rudr_make_registered_column_sortable' );
 
function rudr_make_registered_column_sortable( $columns ) {
	return wp_parse_args( array( 'registerdate' => 'registered' ), $columns );
}

/****
function cgc_ub_action_links($actions, $user_object) {
	$actions['user_edit'] = "<a class='cgc_ub_edit_badges' href='" . admin_url( "users.php?page=cgc-badges") . "'>" . __( 'Edit Badges', 'cgc_ub' ) . "</a>";
	return $actions;
}
add_filter('user_row_actions', 'cgc_ub_action_links', 10, 2);
*/
add_action('edit_user_profile', 'changeAdminUserEdit');
function changeAdminUserEdit($user)
{
	//print_r($user);
	$user_roles = $user->roles;
    $user_role = array_shift($user_roles);
	if (is_admin()) {
       $user_roles = $user->roles;
       $user_role = array_shift($user_roles); 
	    if($user_role == "techie")
		{
		$permalink = get_permalink(803);
        $key = base64_encode($user->ID);		
		//header ("Location: ".$permalink."?url_code=".$user->ID);
        //ob_start();   		
		//wp_redirect($permalink."?url_code=".$user->ID); exit;
		?><script><?php echo("location.href = '".$permalink."?urlkeycode=$key';");?></script>
		<?php
		}else if($user_role == "employer")
        {
			
			
		}else
        {			
		return;		
		}			
	   
    }else
	{		
	return;	
	}	
	
	//echo "hello";
	//echo $user_role; 
	
//die('as');	
	
} 

add_action( 'pre_user_query', 'wpse209591_order_users_by_date_registered_by_default' );
function wpse209591_order_users_by_date_registered_by_default( $query ) {
   // global $pagenow;

  
   if( is_admin()){
	   
	   if(empty($_GET['orderby']) && empty($_GET['order'])){
		   
	    $query->query_orderby = 'ORDER BY user_registered desc';
	   
	   
	   }
	   
	   
   }
}

add_filter( 'manage_users_sortable_columns', 'rudr_make_name_column_sortable' );
 
function rudr_make_name_column_sortable( $columns ) {
	return wp_parse_args( array( 'display_name' => 'name' ), $columns );
}
add_action('wp_ajax_nopriv_change_social_login_role','change_social_login_role');
add_action('wp_ajax_change_social_login_role','change_social_login_role');

function change_social_login_role(){
	if($_POST['action']=="change_social_login_role"){
		
		$user_id = $_POST['user_id'];
		$user_role = $_POST['user_role'];	
        global $wpdb;
        
	$userdata = array(
	'ID' => $user_id,			
	'role' => $user_role
	);
	wp_update_user( $userdata );
    echo $user_id."~".$user_role;	
  
	}
	die();
}

add_action( 'wp_ajax_load_more_techie', 'load_more_techie' );
add_action( 'wp_ajax_nopriv_load_more_techie', 'load_more_techie' );

function load_more_techie(){
	header('Content-Type: text/html');
	$per_page = isset($_POST['per_page']) ? $_POST['per_page'] : 10;
	$page = isset($_POST['page_number']) ? $_POST['page_number'] : 1;
	$experience = isset($_POST['experience']) ? $_POST['experience'] : '';
	$expertise = isset($_POST['expertise']) ? $_POST['expertise'] : "";
	
	
	$opt = trim(getTechieHtml($per_page, $page, $experience, $expertise));	
	die($opt);
}

function getTechieHtml($per_page , $page , $experience , $expertise ){

	global $wpdb;
	
	$number = $per_page;
    $paged = $page;
    $offset = $number * ($paged-1); 
	
	$query = "SELECT u.user_id as ID
FROM fmt_usermeta u LEFT JOIN fmt_usermeta um ON u.user_id = um.user_id LEFT JOIN fmt_usermeta tec ON u.user_id = tec.user_id
WHERE 1 = 1 AND tec.meta_key = 'fmt_capabilities' AND (tec.meta_value LIKE '%techie%') ";

	if(!empty($expertise)){
		$comp1 = sprintf(':%s;', $expertise);
		$comp2 = sprintf(':"%s";', $expertise);
		$query .= " AND um.meta_key = 'expertise' AND (um.meta_value LIKE '%".$comp1."%' OR um.meta_value LIKE '%".$comp2."%')";
	}


	if($experience || $experience == '0'){
		$query .= " AND u.meta_key = 'experience' AND u.meta_value >= $experience ";
	}

	$query .= " GROUP BY u.user_id LIMIT $offset, $number";
	
	$techies = $wpdb->get_results($query);

	$technologies = getTechnologiesTree();

	$experiences = array('Fresher', '1 Year', '2 Years', '3 Years', '4 Years', '5 Years', '6 Years', '7 Years', '8 Years', '9 Years', '10 Yrs &amp; above');
   
	$output = '';
				
    if($techies){
		$upload_dir = wp_upload_dir();	
	      
	   
	   			$i = 0;

				foreach($techies as $techie){
				
				   $user_info = get_userdata($techie->ID);
				   $userdata_roles = $user_info->roles;
                   $userdata_role = array_shift($userdata_roles);
				   if($userdata_role == 'techie'){

					$upload_path = $upload_dir['baseurl'].'/thumbs/'.$techie->ID.'/';

					$userphoto_thumb_file = get_user_meta( $techie->ID, 'userphoto_thumb_file', true ); 

					$experience = get_user_meta( $techie->ID, 'experience', true ); 

					$expertise = get_user_meta( $techie->ID, 'expertise', true );

					$position = get_user_meta( $techie->ID, 'position', true );
					 $exp = "";
                    if($experience == '0'){
						$exp = "Fresher";
						}
						elseif($experience > 10){
							$exp = "10+ Years";
							}
							else if(!empty($experience))
							{ 
						$exp = $experience." Years";
						}

					$skills = '';

					if(is_array($expertise)){

						foreach($expertise as $expert){

							$expert = str_replace(' - ', '', $technologies[$expert]);

							if(!empty($expert)){							

								$skills .= '<span class="featured_techei_added_tech">'.$expert.'</span>';

							}

						}

					}
					
					$countryid = get_user_meta($techie->ID, 'country', true );
	                $country = getCountryByID($countryid);
				    $cflag = '';
	                if(!empty($country)){
		           $flag = strtolower($country->Iso2);
		          $cflag = '<img src="'.get_stylesheet_directory_uri().'/images/flag/'.$flag.'.png" alt="" title="'.$country->name.'" />';
	                }


					
                    $output .= "<div class='serchtechie_width techie_width'>";
                    $output .= " <div class='tech-all-details'>";
                    if(in_array('employer', $user->roles)){ 
                     $output .= "<a href='".get_permalink(241).$techie->ID."' class='link'>";
               }else{             
                    $output .= "<a type='button' class='' data-toggle='modal' data-target='.bs-example-modal-sm'>";
                     } 
             
                    $output .= " <div class='featured_techei_img'>";
                    if(!empty($userphoto_thumb_file)){
                      $output .= "<img src='".$upload_path.$userphoto_thumb_file."' alt='techie'/>";
                       }else{ 
                       $output .= "<img class='default_image' src='".get_stylesheet_directory_uri()."/images/techie-1.png'>";
                    }
                   $output .= "</div>";
                   $output .= "<div class='featured_techei_title'>";
                   $output .= "<p class='featured-title'>".substr($position, 0, 30)."</p>";
                   $output .= " <span class='featured_techei_id'>".$cflag."FMT ID:".$techie->ID."  </span> <span class='featured_techei_exp'>".$exp."</span> </div>";                  
                   $output .= "  <div class='featured_techei_added'>".$skills."</div>";
                   $output .= " <div class='techie_join_section'>";
                   $output .= " <div class='techie_butns'>  <a href='".site_url()."/profile/".$techie->ID."' class='build-your-team'>View my profile</a>"; 
					
					$output .= "<a onclick='hire_me(".$techie->ID.")' type='button' data-toggle='modal' data-target='.bs-example-modal-sm1' class='build-your-team'>Hire me</a>"; 
					
					$output .= "</div></div></div></div></a>";
              

					

				}	

				}
	
	  
	}
							
		
  return $output;
																
} 

// Creating the widget 
class wpb_widget_register_employer_link extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'wpb_widget_register_employer_link', 
		
		// Widget name will appear in UI
		__('Employer Register Link Widgets', 'wpb_widget_register_employer_link'), 
		
		// Widget description
		array( 'description' => __( 'Widget for employer register link', 'wpb_widget_register_employer_link' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		global $wpdb;  
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		
       $location = getLocationInfoByIp();
	   if($location['country'] != 'IN'){
	  ?>
	<h5>Register To Access Thousands Expert Techie Resumes</h5>
    <a class="build-your-team" href="<?php echo get_the_permalink(286); ?>">Register</a>
    <?php }else{ ?>
	<h5>Register To Access Thousands Expert Techie Resumes</h5>
     <a href="javascript:void(0);" class="build-your-team restrict_employer_button" data-toggle="modal" data-target="#useremployer_restrict">Register</a>
	<?php } ?>				
	<?php
	echo $args['after_widget'];
	}
		
	// Widget Backend 
	public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
	}
	else {
	$title = __( 'Employer Register Link Widgets', 'wpb_widget_register_employer_link' );
	}
	// Widget admin form
	?>
	<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget_register_employer_link' );

}

add_action( 'widgets_init', 'wpb_load_widget' ); 



function getAllTechnologies(){
	$technologies = array();
	$techarray = get_posts(array('post_type' => 'technology', 'orderby' => 'post_title', 'order'=>'ASC', 'posts_per_page'=>-1));
	foreach($techarray as $vt){		
			$technologies[$vt->ID] = trim( strtolower($vt->post_title));
			
		
	}
	return $technologies;
}

function getAllCountries(){
	global $wpdb;
	$query = " SELECT country_id, name FROM fmt_country WHERE 1 = 1 ";
	$countries = $wpdb->get_results($query);
	$arrcountries = array(); 
	foreach ($countries as $country) {
		$arrcountries[$country->country_id] = trim( strtolower($country->name));
	}
	return $arrcountries;
}

add_action('pre_user_query','rudr_extend_user_search'); 
 
function rudr_extend_user_search( $u_query ){
	// make sure that this code will be applied only for user search
	if ( $u_query->query_vars['search'] ){
	  
		$search_query = trim( $u_query->query_vars['search'], '*' );
		if ( $_REQUEST['s'] == $search_query ){
			global $wpdb;
			
			  $technology_array = getAllTechnologies();
			
			  if(array_search(trim( strtolower($_REQUEST['s'])),$technology_array))
			  {
			    $expert_key = array_search(trim(strtolower($_REQUEST['s'])),$technology_array);
			   
			   $search = '';
      if ( isset( $u_query->query_vars['search'] ) )
        $search = trim( $u_query->query_vars['search'] );
 
    if ( $search ) {
        $search = trim($search, '*');
        $the_search = '%'.$search.'%';
		$expert_key = '%'.$expert_key.'%';
 
        $search_meta = $wpdb->prepare("
        ID IN ( SELECT user_id FROM {$wpdb->usermeta}
        WHERE ( (meta_key='expertise' )
            AND {$wpdb->usermeta}.meta_value LIKE '%s' )
        )", $expert_key);
 
        $u_query->query_where = str_replace(
            'WHERE 1=1 AND (',
            "WHERE 1=1 AND (" . $search_meta . " OR ",
            $u_query->query_where );
      }
			   
			   
			   
			   
			   
			  }
			  
			   $country_array = getAllCountries();
			
			   if(array_search(trim(strtolower($_REQUEST['s'])),$country_array))
			  {
			  
			   
		   $country_key = array_search(trim(strtolower($_REQUEST['s'])),$country_array);
				
			   
			$search = '';
			if ( isset( $u_query->query_vars['search'] ) )
			$search = trim( $u_query->query_vars['search'] );
			
			if ( $search ) {
			$search = trim($search, '*');
			$the_search = '%'.$search.'%';
			$country_key = '%'.$country_key.'%';
			
			$search_meta = $wpdb->prepare("
			ID IN ( SELECT user_id FROM {$wpdb->usermeta}
			WHERE ( (meta_key='country' )
			AND {$wpdb->usermeta}.meta_value LIKE '%s' )
			)", $country_key);
			
			$u_query->query_where = str_replace(
			'WHERE 1=1 AND (',
			"WHERE 1=1 AND (" . $search_meta . " OR ",
			$u_query->query_where );
			}
			
			
			   
			   
			   
			  }
		
 
 		
		}
	}
}

add_action('admin_menu', 'excel_admin_menu');
 
/**
* add external link to Tools area
*/
function excel_admin_menu() {
    global $submenu;
    $url = get_permalink(1627);
    $submenu['tools.php'][] = array('Excel Import Lead Data', 'manage_options', $url);
	//$submenu['plugins.php'][] = array( _x('Excel import', 'add_techie_lead_request_options'), 'add_techie_lead_request_options', $url );
}


/**
*  start admin filter techie users
*/

function add_custom_teche_search() {
   $experiences = array('Fresher', '1 Year', '2 Years', '3 Years', '4 Years', '5 Years', '6 Years', '7 Years', '8 Years', '9 Years', '10 Yrs &amp; above');
   $technologies = getTechnologiesTree();
   $countries = getCountries();	
   if($_GET['role'] == 'techie'){   
	?>
    <form action=""> 
    <div class="custom_admin_search">
     <div class="admin_fmt_id" style="float:left;"> 
     
    <input type="text" class="admin_fields" value="<?php echo (isset($_GET['fmt_id']))?$_GET['fmt_id']:''; ?>" placeholder="FMT ID" name="fmt_id"> 
     <input type="hidden" id="mytheme_custom_role" name="role" value="<?php echo (isset($_GET['role']))?$_GET['role']:''; ?>" />
    </div> 
    <div class="admintech_exp">  
    <select id="expertise_drop" name="fmt_tech" class="style-select">
                  <option value="">Expertise</option>
                  <?php foreach($technologies as $k => $v){ ?>
                  <option value="<?php echo $k; ?>" <?php if($_GET['fmt_tech'] == $k){echo 'selected';} ?>><?php echo $v; ?></option>
                  <?php } ?>

    </select>
    <input type="text" class="admin_fields" value="<?php echo (isset($_GET['fmt_exp']))?$_GET['fmt_exp']:''; ?>" placeholder="Experience" name="fmt_exp"> 
    </div> 
     <div class="admincountry_location">    
    <select name="fmt_country" class="style-select " id="select-dropdown-country" >
                    <option value="">Country</option>
                    <?php foreach($countries as $k => $v){ ?>
                    <option value="<?php echo $k; ?>" <?php if($_GET['fmt_country'] != '' && $_GET['fmt_country'] == $k){echo 'selected';} ?>><?php echo $v; ?></option>

                    <?php } ?>
                  </select>
    <input type="text" class="admin_fields" value="<?php echo (isset($_GET['fmt_location']))?$_GET['fmt_location']:''; ?>" placeholder="Location" name="fmt_location">
    </div>
   
    <input type="hidden" id="mytheme_custom" name="custom_search" value="<?php echo (isset($_GET['s']))?$_GET['s']:''; ?>" />
    <div>
    <a href="javascript:void(0);" class="techie_advance_filter">Advance Filter</a>
    <div class="project_filter" style="display:none;">
    <input type="text" class="admin_fields project_filter" value="<?php echo (isset($_GET['fmt_description']))?$_GET['fmt_description']:''; ?>" placeholder="Project Details" name="fmt_description">
    </div>
    </div>


 

    
    <input type="submit" class="button" value="Filter" name="admin_custom_user_button">
    </div>
    </form>

<?php
}
}
add_action( 'restrict_manage_users', 'add_custom_teche_search' );
add_action( 'admin_footer', 'wpusersadmin_this_screen' );
 
/**
 * Run code on the admin users page
 */
function wpusersadmin_this_screen() {
    $currentScreen = get_current_screen();
   if( $currentScreen->id === "users" ) {
       if($_GET['role'] == 'techie'){
        ?>
        <style>
.tablenav.top .alignleft.actions.bulkactions {float:none!important;}
#bulk-action-selector-top {width:100%;}
#new_role {width:100%;}
.custom_admin_search.admin_fields {width: 200px;}
.custom_admin_search {width:100%; display:block; float:left;}
.admin_fmt_id {float:none!important;}
.custom_admin_search .admin_fmt_id .admin_fields {
    width: 200px;
    margin-top: 5px;
    margin-bottom: 5px;
}
.tablenav .actions select {width:100%;}
.admin_fields {width:100%; max-width:200px;}
.admincountry_location {float: left;
    display: block;
    width: 100%; margin-bottom:5px;}
.custom_admin_search .admintech_exp {margin-bottom:5px;}
.custom_admin_search {padding:5px 0;}
.bulkactions {padding:5px 0;}
		</style>
        
		<script>
        jQuery(document).ready( function($)
        {
        $( ".techie_advance_filter" ).click(function() {
        $(this).siblings().toggle( "slow" );
        //$( ".project_filter" ).toggle( "slow" );
        });
        });
        </script>
    <?php 
	}   
    }
}

function admin_user_custom_search( $u_query ) {
    global $pagenow;
    if(isset($_GET['admin_custom_user_button'])) { 
    if ('users.php' == $pagenow) {
       $fmt_id = ($_GET[ 'fmt_id' ]) ? $_GET[ 'fmt_id' ] : "";
	   $fmt_tech = ($_GET[ 'fmt_tech' ]) ? $_GET[ 'fmt_tech' ] : "";
	   $fmt_exp = ($_GET[ 'fmt_exp' ]) ? $_GET[ 'fmt_exp' ] : "";
	   $fmt_country = ($_GET[ 'fmt_country' ]) ? $_GET[ 'fmt_country' ] : "";
	   $fmt_location = ($_GET[ 'fmt_location' ]) ? $_GET[ 'fmt_location' ] : "";
	   $fmt_description = ($_GET[ 'fmt_description' ]) ? $_GET[ 'fmt_description' ] : "";
	  
        global $wpdb;
		
		if(!empty($fmt_id)){		
			$u_query->query_where = str_replace('WHERE 1=1',"WHERE 1=1 AND {$wpdb->users}.ID IN (".$fmt_id.")",$u_query->query_where);
		}else{		
			if(!empty($fmt_tech)){
				$userids = $wpdb->get_results("SELECT user_id FROM fmt_usermeta WHERE meta_key = 'expertise' AND meta_value LIKE '%".$fmt_tech."%' ", ARRAY_N);
				$user_ids = '0';
				foreach($userids as $userid){
					$user_ids .= ','.$userid[0];
				}
			}	
			if(!empty($fmt_exp)){
				$subq = '';
				if(!empty($fmt_tech))
					$subq = " AND user_id IN ($user_ids) ";
				$userids = $wpdb->get_results("SELECT user_id FROM fmt_usermeta WHERE meta_key = 'experience' AND meta_value = '$fmt_exp' ".$subq, ARRAY_N);
				$user_ids = '0';
				foreach($userids as $userid){
					$user_ids .= ','.$userid[0];
				}
			}
			
			if(!empty($fmt_country)){
				$subq = '';
				if(!empty($fmt_tech) || !empty($fmt_exp))
					$subq = " AND user_id IN ($user_ids) ";
				$userids = $wpdb->get_results("SELECT user_id FROM fmt_usermeta WHERE meta_key = 'country' AND meta_value = '$fmt_country' ".$subq, ARRAY_N);
				$user_ids = '0';
				foreach($userids as $userid){
					$user_ids .= ','.$userid[0];
				}				
			}
			
			if(!empty($fmt_location)){
				$subq = '';
				if(!empty($fmt_tech) || !empty($fmt_exp) || !empty($fmt_country))
					$subq = " AND user_id IN ($user_ids) ";
				$userids = $wpdb->get_results("SELECT user_id FROM fmt_usermeta WHERE meta_key = 'city' AND meta_value LIKE '%$fmt_location%' ".$subq, ARRAY_N);
				$user_ids = '0';
				foreach($userids as $userid){
					$user_ids .= ','.$userid[0];
				}
			}
			
			if(!empty($fmt_description)){
				$subq = '';
				if(!empty($fmt_tech) || !empty($fmt_exp) || !empty($fmt_country) || !empty($fmt_location))
					$subq = " AND user_id IN ($user_ids) ";
				$userids = $wpdb->get_results("SELECT user_id FROM fmt_usermeta WHERE meta_key = 'description' AND meta_value LIKE '%$fmt_description%' ".$subq, ARRAY_N);
				$user_ids = '0';
				foreach($userids as $userid){
					$user_ids .= ','.$userid[0];
				}				
			}

	      $u_query->query_where = str_replace('WHERE 1=1',"WHERE 1=1 AND {$wpdb->users}.ID IN (".$user_ids.")",$u_query->query_where );
		  //echo $u_query->query_where; die;
	  }
    }
  }	
}
add_filter( 'pre_user_query', 'admin_user_custom_search' );



/*add_filter( 'manage_users_columns', 'gtp_users_table_columns' );
function gtp_users_table_columns( $defaults ) {
    $defaults['ID num'] = __( 'FMT ID', 'gtp_translate' );
	$defaults['domain'] = __( 'Domian', 'gtp_translate' );
	$defaults['experience'] = __( 'Experience', 'gtp_translate' );
    return $defaults;
}

// Add users table lead purchase column content
add_action( 'manage_users_custom_column', 'gtp_users_table_content', 10, 3 );
function gtp_users_table_content( $value, $column_name, $user_id ) {
    //$leads = gtp_get_leads_by_buyer( $user_id );
    switch( $column_name ) {
        case 'ID num' : 
            return $user_id;
            break;
		case 'domain' :
            return get_user_meta($user_id, 'domain', true );
            break;
		case 'experience' :
            return get_user_meta($user_id, 'experience', true ); 
            break;		
		default:	
    }
	 return $value;
}*/

function prefix_sortable_columns( $columns ) {
$columns['name'] = 'name';
$columns['column-user_id'] = 'ID';
$columns['591a0289cbddc'] = 'user_registered';
return $columns;
}

add_filter( 'manage_users_sortable_columns', 'prefix_sortable_columns' );
function prefix_sort_by_level( $query ) {
if ( 'login_level' == $query->get( 'orderby' ) ) {
    /* $query->set( 'orderby', 'meta_value' );
    $query->set( 'meta_key', 'level' ); */
    $query->set( 'orderby', 'meta_value' );
    $query->set( 'meta_key', 'first_name' );
}
if ( 'column-user_id' == $query->get( 'orderby' ) ) {
    /* $query->set( 'orderby', 'meta_value' );
    $query->set( 'meta_key', 'level' ); */
   // $query->set( 'orderby', 'ID' );
    //$query->set( 'meta_key', 'user_id' );
}
}
add_action( 'pre_get_users', 'prefix_sort_by_level' );

/**
*  END admin filter techie users
*/

 

