<?php
function setup_theme_admin_menus() {
    add_submenu_page('options-general.php', 
        'Theme Settings', 'Theme Settings', 'manage_options', 
        'findmetechie_theme_settings', 'theme_front_page_settings'); 
}

function theme_front_page_settings() {
	// Check that the user is allowed to update options
	if (!current_user_can('manage_options')) {
		wp_die('You do not have sufficient permissions to access this page.');
	}
	$home_logo = get_option( 'findmetechie_home_logo' );
	$copyright_text = get_option( 'findmetechie_copyright_text' );
	$phone_number = get_option( 'findmetechie_phone_number' );
	$login_link = get_option( 'findmetechie_login_link' );
	$try_free_link = get_option( 'findmetechie_try_free_link' );
	wp_enqueue_media();
	wp_enqueue_script( 'add_logo_to_home', get_stylesheet_directory_uri() . '/js/add-logo-select-image.js', array( 'jquery', 'media-upload', 'media-views' ), ADD_LOGO_VERSION, true );
	if ( $image = $home_logo ) { ?>
<style>
body.login div#login h1 a {
background-image: url(<?php echo esc_url( $image ); ?>);
background-size: inherit;
width: 100%;
}
</style> 
	<?php
	}
?>
    <div class="wrap">
        <?php screen_icon('settings'); ?> <h2>Theme Settings - FindMeTechie.com </h2>
 
        <form method="POST" action="">
            <table id="add-logo-table" class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e( 'Upload Home Logo', 'add-logo-to-home' ); ?></th>
					<td>
						<input type="hidden" id="add-logo-image" name="home_logo" value="<?php echo esc_url( $home_logo ); ?>" />
						<div id="add-logo-image-container"><img src="<?php echo $image; ?>" alt="" /></div>
						<a href="#" class="select-image"><?php _e( 'Select image', 'add-logo-to-home' ); ?></a>&nbsp;&nbsp;&nbsp;<a href="#" class="delete-image" <?php echo $display; ?>><?php _e( 'Delete image', 'add-logo-to-home' ); ?></a>
						<br />
						<p class="description"><?php _e( 'This logo will display on the home header area.', 'add-logo-to-home' ); ?></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="copyright_text">
							Copyright Text
						</label>
					</th>
					<td>
						<input type="text" name="copyright_text" size="50" value="<?php echo $copyright_text; ?>" />
					</td>
				</tr> 
				<tr valign="top">
					<th scope="row">
						<label for="phone_number">
							Phone Number
						</label>
					</th>
					<td>
						<input type="text" name="phone_number" size="50" value="<?php echo $phone_number; ?>" />
					</td>
				</tr> 
				<tr valign="top">
					<th scope="row">
						<label for="phone_number">
							Login Link
						</label>
					</th>
					<td>
						<input type="text" name="login_link" size="50" value="<?php echo $login_link; ?>" />
					</td>
				</tr> 
				<tr valign="top">
					<th scope="row">
						<label for="phone_number">
							Try it for free URL
						</label>
					</th>
					<td>
						<input type="text" name="try_free_link" size="50" value="<?php echo $try_free_link; ?>" />
					</td>
				</tr> 
            </table>
			<p>
				<input type="submit" value="Save Settings" name="update_settings" class="button-primary"/>
			</p>
        </form>
    </div>
<?php
}

if (isset($_POST["update_settings"])) {
	$home_logo = esc_attr($_POST["home_logo"]);
	$copyright_text = esc_attr($_POST["copyright_text"]);
	$phone_number = esc_attr($_POST["phone_number"]);
	$login_link = esc_attr($_POST["login_link"]);
	$try_free_link = esc_attr($_POST["try_free_link"]);
	update_option("findmetechie_home_logo", $home_logo);
	update_option("findmetechie_copyright_text", $copyright_text);
	update_option("findmetechie_phone_number", $phone_number);
	update_option("findmetechie_login_link", $login_link);
	update_option("findmetechie_try_free_link", $try_free_link);
}
 
// This tells WordPress to call the function named "setup_theme_admin_menus"
// when it's time to create the menu pages.
add_action("admin_menu", "setup_theme_admin_menus");
?>