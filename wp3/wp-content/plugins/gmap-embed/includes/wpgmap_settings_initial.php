<?php
if (!defined('ABSPATH')) {
    exit;
}

// add settings saved message with the class of "updated"
add_settings_error('wpgmap_msg', 'wpgmap_msg_initial', __('Please click on <i style="color:green;">GET API KEY</i> button to get Google API key at first, 
it is mandatory to use Google Map. If you would like to get a <i style="color:green;">Lifetime License</i> key, please click on <i style="color:green;">GET LICENSE KEY</i> button.', 'gmap-embed'), 'info');
settings_errors('wpgmap_msg');
?>
<div data-columns="8">
    <div class="wpgmapembed_get_api_key" style="margin-bottom: 10px;">
        <h2><?php _e('API Key and License Information', 'gmap-embed'); ?></h2>
        <hr/>
        <table class="form-table" role="presentation">

            <tbody>
            <form method="post" action="<?php echo admin_url(); ?>admin.php?page=wpgmapembed&&message=3">
                <tr>
                    <th scope="row">
                        <label for="wpgmapembed_key">
                            <?php _e('Enter API Key: ', 'gmap-embed'); ?>
                        </label>
                    </th>
                    <td scope="row">
                        <input type="text" name="wpgmapembed_key"
                               value="<?php echo esc_html(get_option('wpgmap_api_key')); ?>"
                               size="45" class="regular-text" style="width:100%" id="wpgmapembed_key"/>
                        <p class="description" id="tagline-description"  style="font-style: italic;">
                            <?php _e('The API key may take up to 5 minutes to take effect', 'gmap-embed'); ?>
                        </p>
                    </td>
                    <td width="30%" style="vertical-align: top;">
                        <button class="wd-btn wd-btn-primary button media-button button-primary"><?php _e('Save', 'gmap-embed'); ?></button>
                        <a target="_blank" style="margin-left: 5px;" href="
					<?php echo esc_url('https://console.developers.google.com/flows/enableapi?apiid=maps_backend,places_backend,geolocation,geocoding_backend,directions_backend&amp;keyType=CLIENT_SIDE&amp;reusekey=true'); ?>"
                           class="button media-button button-default button-large">
                            <?php _e('GET API KEY', 'gmap-embed'); ?>
                        </a>
                    </td>
                </tr>
            </form>

            <form method="post" action="<?php echo admin_url(); ?>admin.php?page=wpgmapembed&&message=4">
                <tr>
                    <th scope="row">
                        <label for="wpgmapembed_license">
                            <?php _e('License Key: ', 'gmap-embed'); ?>
                        </label>
                    </th>
                    <td scope="row">
                        <input type="text" name="wpgmapembed_license"
                               value="<?php echo esc_html(get_option('wpgmapembed_license')); ?>"
                               size="45" class="regular-text" style="width:100%" id="wpgmapembed_license"/>
                        <p class="description" id="tagline-description"  style="font-style: italic;">
                            <?php _e('After payment you will get an email with license key', 'gmap-embed'); ?>
                        </p>
                    </td>
                    <td width="30%" style="vertical-align: top;">
                        <button class="wd-btn wd-btn-primary button media-button button-primary"><?php _e('Save', 'gmap-embed'); ?></button>

                        <?php
                        if (strlen(trim(get_option('wpgmapembed_license'))) !== 32) { ?>
                            <a target="_blank"
                               href="<?php echo esc_url('https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZBERRKARGNEYA'); ?>"
                               class="button media-button button-default button-large"><?php _e('GET LICENSE KEY', 'gmap-embed'); ?></a>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
            </form>
            </tbody>
        </table>
    </div>
</div>