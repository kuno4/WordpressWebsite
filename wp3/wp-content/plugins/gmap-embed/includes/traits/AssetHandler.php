<?php

trait AssetHandler
{
    /**
     * To enqueue scripts for front-end
     */
    public function gmap_enqueue_scripts()
    {
        //including map library
        $srm_gmap_lng = get_option('srm_gmap_lng', 'en');
        $srm_gmap_region = get_option('srm_gmap_region', 'US');
        wp_enqueue_script('srm_gmap_api', 'https://maps.googleapis.com/maps/api/js?key=' . $this->wpgmap_api_key . '&libraries=places&language=' . $srm_gmap_lng . '&region=' . $srm_gmap_region, array('jquery'));
        $custom_js_scripts = get_option('wpgmap_s_custom_js');
        if (strlen($custom_js_scripts) != 0) {
            wp_add_inline_script('srm_gmap_api', "$custom_js_scripts");
        }
        wp_enqueue_style('wp-gmap-embed-front-css', plugins_url('../../assets/css/front_custom_style.css', __FILE__), array(), filemtime(__DIR__ . '/../../assets/css/front_custom_style.css'));
        $custom_css_styles = get_option('wpgmap_s_custom_css');
        if (strlen($custom_css_styles) != 0) {
            wp_add_inline_style('wp-gmap-embed-front-css', "$custom_css_styles");
        }
    }

    function enqueue_admin_gmap_scripts()
    {
        global $pagenow;
        if ($pagenow == 'post.php' || $pagenow == 'post-new.php' || (isset($_GET['page']) and $_GET['page'] == 'wpgmapembed')) {
            $srm_gmap_lng = get_option('srm_gmap_lng', 'en');
            $srm_gmap_region = get_option('srm_gmap_region', 'US');
            wp_enqueue_script('wp-gmap-api', 'https://maps.google.com/maps/api/js?key=' . $this->wpgmap_api_key . '&libraries=places&language=' . $srm_gmap_lng . '&region=' . $srm_gmap_region, array('jquery'), '20200506', true);
            wp_enqueue_script('wp-gmap-custom-js', plugins_url('../../assets/js/custom.js', __FILE__), array('wp-gmap-api'), filemtime(__DIR__ . '/../../assets/js/custom.js'), false);
            wp_enqueue_style('wp-gmap-embed-css', plugins_url('../../assets/css/wp-gmap-style.css', __FILE__), array(), filemtime(__DIR__ . '/../../assets/css/wp-gmap-style.css'));

            // For media upload
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
            wp_enqueue_script('wpgmap-media-upload');
            wp_enqueue_style('thickbox');
            if (isset($_GET['tag']) and $_GET['tag'] == 'edit') {
                // enqueue scripts for localization
                wp_register_script('wp-gmap-lz-script', plugins_url('../../assets/js/localized_script.js', __FILE__), array('wp-gmap-custom-js'), filemtime(__DIR__ . '/../../assets/js/localized_script.js'), true);
                // Localize the script with new data
                $current_map_marker_lat_lng = explode(',', get_post_meta($_GET['id'], 'wpgmap_latlng', true));
                $current_map_marker_lat = isset($current_map_marker_lat_lng[0]) ? $current_map_marker_lat_lng[0] : 40.73359922990751;
                $current_map_marker_lng = isset($current_map_marker_lat_lng[1]) ? $current_map_marker_lat_lng[1] : -74.02791395625002;
                $translation_array = array(
                    'current_map_marker_lat' => $current_map_marker_lat,
                    'current_map_marker_lng' => $current_map_marker_lng
                );
                wp_localize_script('wp-gmap-lz-script', 'gmap_object', $translation_array);

                // Enqueued script with localized data.
                wp_enqueue_script('wp-gmap-lz-script');
            }
        }
    }
}