<?php

trait Settings
{
    function gmap_embed_settings_section_callback()
    {
        // code...
    }


    function gmap_embed_s_custom_css_markup()
    {
        ?>
        <textarea rows="10" cols="100" name="wpgmap_s_custom_css"
                  id="wpgmap_custom_css"><?php echo get_option('wpgmap_s_custom_css'); ?></textarea>
        <p class="description" id="tagline-description" style="font-style: italic;">
            <?php _e('Add your custom CSS code if needed.', 'gmap-embed'); ?>
        </p>
        <?php
    }

    function wpgmap_s_custom_js_markup()
    {
        ?>
        <textarea rows="10" cols="100" name="wpgmap_s_custom_js"
                  id="wpgmap_custom_js"><?php echo get_option('wpgmap_s_custom_js'); ?></textarea>
        <p class="description" id="tagline-description" style="font-style: italic;">
            <?php _e('Add your custom JS code if needed.', 'gmap-embed'); ?>
        </p>
        <?php
    }

    function gmap_embed_s_map_language_markup()
    {
        ?>
        <select id="srm_gmap_lng" name="srm_gmap_lng" class="regular-text" style="width: 100%;max-width:100%;">
            <?php
            $wpgmap_languages = gmap_embed_get_languages();
            if (count($wpgmap_languages) > 0) {
                foreach ($wpgmap_languages as $lng_key => $language) {
                    $selected = '';
                    if (get_option('srm_gmap_lng', 'en') == $lng_key) {
                        $selected = 'selected';
                    }
                    echo "<option value='$lng_key' $selected>$language</option>";
                }
            }
            ?>
        </select>
        <p class="description" id="tagline-description" style="font-style: italic;">
            <?php _e('Chose your desired map language', 'gmap-embed'); ?>
        </p>
        <?php
    }

    function gmap_embed_s_map_region_markup()
    {
        ?>
        <select id="region" name="srm_gmap_region" class="regular-text" style="width: 100%;max-width: 100%;">
            <?php
            $wpgmap_regions = gmap_embed_get_regions();
            if (count($wpgmap_regions) > 0) {
                foreach ($wpgmap_regions as $region_key => $region) {
                    $selected = '';
                    if (get_option('srm_gmap_region', 'US') == $region_key) {
                        $selected = 'selected';
                    }
                    echo "<option value='$region_key' $selected>$region</option>";
                }
            }
            ?>

        </select>
        <p class="description" id="tagline-description" style="font-style: italic;">
            <?php _e('Chose your regional area', 'gmap-embed'); ?>
        </p>
        <?php
    }

    public function gmapsrm_settings()
    {
        add_submenu_page('wpgmapembed', 'Settings', 'Settings', 'administrator', '?page=wpgmapembed&tag=settings', '', 11);

        add_settings_section(
            'gmap_embed_language_settings_section',
            __('Map Language and Regional Settings<hr/>', 'gmap-embed'),
            array($this, 'gmap_embed_settings_section_callback'),
            'gmap-embed-settings-page-ls'
        );

        // language settings related fields
        add_settings_field(
            'srm_gmap_lng',
            __('Map Language:', 'gmap-embed'),
            array($this, 'gmap_embed_s_map_language_markup'),
            'gmap-embed-settings-page-ls',
            'gmap_embed_language_settings_section'
        );

        add_settings_field(
            'srm_gmap_region',
            __('Map Region:', 'gmap-embed'),
            array($this, 'gmap_embed_s_map_region_markup'),
            'gmap-embed-settings-page-ls',
            'gmap_embed_language_settings_section'
        );


        add_settings_section(
            'gmap_embed_custom_scripts_section',
            __('Custom Scripts<hr/>', 'gmap-embed'),
            array($this, 'gmap_embed_settings_section_callback'),
            'gmap-embed-settings-page-cs'
        );


        // custom scripts related fields
        add_settings_field(
            'wpgmap_s_custom_css',
            __('Custom CSS:', 'gmap-embed'),
            array($this, 'gmap_embed_s_custom_css_markup'),
            'gmap-embed-settings-page-cs',
            'gmap_embed_custom_scripts_section'
        );

        add_settings_field(
            'wpgmap_s_custom_js',
            __('Custom JS:', 'gmap-embed'),
            array($this, 'wpgmap_s_custom_js_markup'),
            'gmap-embed-settings-page-cs',
            'gmap_embed_custom_scripts_section'
        );

        register_setting('wpgmap_script_settings', 'srm_gmap_lng');
        register_setting('wpgmap_script_settings', 'srm_gmap_region');
        register_setting('wpgmap_script_settings', 'wpgmap_s_custom_css');
        register_setting('wpgmap_script_settings', 'wpgmap_s_custom_js');
    }
}