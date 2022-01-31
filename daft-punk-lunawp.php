<?php

/**
 * Plugin Name:       Daft Punk Albums
 * Plugin URI:        https://lunawp.com/
 * Description:       Information About Daft Punk Albums
 * Version:           1.0.0
 * Author:            Alex J. Luna
 * Author URI:        https://lunawp.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       daft-punk-wp
 * Domain Path:       /languages
 */

if(!defined('ABSPATH'))
    exit();

//constantes
define('DAFTPUNKLUNWP_NAME','Daft Punk LunaWP');
define('DAFTPUNKLUNWP_PREFIX','daft_punk_lunawp_');
define('DAFTPUNKLUNWP_PATH', plugin_dir_path(__FILE__));
define('DAFTPUNKLUNWP_ADMIN_PATH', plugin_dir_path(__FILE__).'/admin/');

function daft_punk_lunawp_activate(){
    $opciones = array(
        'id_singer' => '',
    );

    foreach( $opciones as $key => $value )
        add_option( DAFTPUNKLUNWP_PREFIX . $key, $value, '', false );
}
register_activation_hook( __FILE__, ' daft_punk_lunawp_activate' );

function daft_punk_lunawp_deactivate(){
}
register_deactivation_hook( __FILE__, ' daft_punk_lunawp_deactivate' );

//menu admin
function daft_punk_lunawp_menu(){
    add_menu_page(DAFTPUNKLUNWP_NAME, DAFTPUNKLUNWP_NAME, 'manage_options', 'daft_punk_lunawp_admin', 'daft_punk_lunawp_admin_gui');
}
add_action('admin_menu', 'daft_punk_lunawp_menu');

function daft_punk_lunawp_admin_gui(){
    if( isset( $_POST ) && !empty( $_POST ) ){
        if( !current_user_can( 'manage_options' ) )
            wp_die();

        update_option( 'daft_punk_lunawp_id_singer', sanitize_text_field( $_POST['daft_punk_lunawp_id_singer'] ), false );
    }
    ?>
    <div class='wrap'>
        <h2><?php _e('Daft Punk Albums', 'daft-punk-wp'); ?></h2>
        <p>Bienvenidos a la configuracion</p>

        <form action="" method="POST">
             <table class="form-table">
                <tr>
                    <td>
                        <label><?php _e('Introduce ID del Artista', 'daft-punk-wp'); ?>:</label>
                        <input type="text" name="daft_punk_lunawp_id_singer" id="daft_punk_lunawp_id_singer" value="<?php echo get_option('daft_punk_lunawp_id_singer'); ?>" />
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

//short code [daft_punk_sc] para mostrar los datos en cualquier pagina
function show_daft_punk_lunawp(){
    ob_start();
    
    include( DAFTPUNKLUNWP_PATH . "daft-punk-lunawp-show.php" );

    $output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode( 'daft_punk_sc', 'show_daft_punk_lunawp' );