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
define('DAFTPUNKLUNWP_PATH', plugin_dir_path(__FILE__));
define('DAFTPUNKLUNWP_ADMIN_PATH', plugin_dir_path(__FILE__).'/admin/');

//menu admin
function daft_punk_lunawp_menu()
{
    add_menu_page(DAFTPUNKLUNWP_NAME, DAFTPUNKLUNWP_NAME, 'manage_options', DAFTPUNKLUNWP_ADMIN_PATH.'idSinger.php');
}
add_action('admin_menu', 'daft_punk_lunawp_menu');

//funcion para registrar ID Artista
function daft_punk_lunawp_setting()
{
    register_setting('daft-punk-lunawp-setting-id', 'daft_punk_lunawp_id_singer');
}
add_action('admin_init', 'daft_punk_lunawp_setting');

//short code [daft_punk_sc] para mostrar los datos en cualquier pagina
function show_daft_punk_lunawp()
{
    return $options = wp_remote_retrieve_body( wp_remote_get( plugins_url() . '/daft-punk-lunawp/daft-punk-lunawp-show.php' ) );
}
add_shortcode('daft_punk_sc', 'show_daft_punk_lunawp');