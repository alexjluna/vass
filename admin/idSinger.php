<?php
if (! current_user_can('manage_options')) wp_die(__ ('No Tienes Permiso'));
?>
    <div class='wrap'>
        <h2><?php _e('Daft Punk Albums', 'daft-punk-wp'); ?></h2>
        <p>Bienvenidos a la configuracion</p>

        <form action="<?php DAFTPUNKLUNWP_ADMIN_PATH.'idSinger.php' ?>" method="POST">
            <?php
                settings_fields('daft-punk-lunawp-setting-id');
                do_settings_sections('daft-punk-lunawp-setting-id');
            ?>
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
