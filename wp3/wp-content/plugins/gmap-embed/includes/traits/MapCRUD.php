<?php

trait MapCRUD
{
    /**
     * To save New Map Data
     */

    public function save_wpgmapembed_data()
    {
        $error = '';
        // Getting ajax fileds value
        $meta_data = array(
            'wpgmap_title' => sanitize_text_field(esc_html($_POST['map_data']['wpgmap_title'])),
            'wpgmap_heading_class' => sanitize_text_field(esc_html($_POST['map_data']['wpgmap_heading_class'])),
            'wpgmap_show_heading' => sanitize_text_field(esc_html($_POST['map_data']['wpgmap_show_heading'])),
            // current marker lat lng
            'wpgmap_latlng' => sanitize_text_field(esc_html($_POST['map_data']['wpgmap_latlng'])),
            'wpgmap_map_zoom' => sanitize_text_field(esc_html($_POST['map_data']['wpgmap_map_zoom'])),
            'wpgmap_disable_zoom_scroll' => sanitize_text_field(esc_html($_POST['map_data']['wpgmap_disable_zoom_scroll'])),
            'wpgmap_map_width' => sanitize_text_field(esc_html($_POST['map_data']['wpgmap_map_width'])),
            'wpgmap_map_height' => sanitize_text_field(esc_html($_POST['map_data']['wpgmap_map_height'])),
            'wpgmap_map_type' => sanitize_text_field(esc_html($_POST['map_data']['wpgmap_map_type'])),
            'wpgmap_map_address' => sanitize_text_field(esc_html($_POST['map_data']['wpgmap_map_address'])),
            'wpgmap_show_infowindow' => sanitize_text_field($_POST['map_data']['wpgmap_show_infowindow']),
            'wpgmap_enable_direction' => sanitize_text_field($_POST['map_data']['wpgmap_enable_direction']),
            'wpgmap_marker_icon' => sanitize_text_field($_POST['map_data']['wpgmap_marker_icon']),
            // map center lat lng
            'wpgmap_center_lat_lng' => sanitize_text_field($_POST['map_data']['wpgmap_center_lat_lng'])
        );
        $action_type = sanitize_text_field(esc_html($_POST['map_data']['action_type']));
        if ($meta_data['wpgmap_latlng'] == '') {
            $error = "Please input Latitude and Longitude";
        }
        if (strlen($error) > 0) {
            echo json_encode(array(
                'responseCode' => 0,
                'message' => $error
            ));
            exit;
        } else {

            if ($action_type == 'save') {
                // saving post array
                $post_array = array(
                    'post_type' => 'wpgmapembed'
                );
                $post_id = wp_insert_post($post_array);

            } elseif ($action_type == 'update') {
                $post_id = intval($_POST['map_data']['post_id']);
            }

            // Updating post meta
            foreach ($meta_data as $key => $value) {
                $this->__update_post_meta($post_id, $key, $value);
            }
            $returnArray = array(
                'responseCode' => 1,
                'post_id' => $post_id
            );
            if ($action_type == 'save') {
                $returnArray['message'] = 'Created Successfully.';
            } elseif ($action_type == 'update') {
                $returnArray['message'] = 'Updated Successfully.';
            }
            echo json_encode($returnArray);
            exit;
        }
    }

    public function load_wpgmapembed_list()
    {
        $content = '';
        $args = array(
            'post_type' => 'wpgmapembed',
            'posts_per_page' => -1
        );
        $mapsList = new WP_Query($args);

        if ($mapsList->have_posts()) {
            while ($mapsList->have_posts()) {
                $mapsList->the_post();
                $title = get_post_meta(get_the_ID(), 'wpgmap_title', true);
                $content .= '<div class="wp-gmap-single">
                                        <div class="wp-gmap-single-left">
                                            <div class="wp-gmap-single-title">
                                                ' . $title . '
                                            </div>
                                            <div class="wp-gmap-single-shortcode">
                                                <input class="wpgmap-shortcode regular-text" type="text" value="' . esc_attr('[gmap-embed id=&quot;' . get_the_ID() . '&quot;]') . '"
                                                       onclick="this.select()"/>
                                            </div>
                                        </div>
                                        <div class="wp-gmap-single-action">
                                            <a href="?page=wpgmapembed&tag=edit&id=' . get_the_ID() . '" class="button media-button button-primary button-large wpgmap-edit" data-id="' . get_the_ID() . '">
                                                ' . __('Change', 'gmap-embed') . '
                                            </a>
                                            <button type="button"
                                                    class="button media-button button-danger button-large wpgmap-insert-delete" data-id="' . get_the_ID() . '" style="background-color: red;color: white;opacity:0.7;">
                                                X
                                            </button>
                                        </div>
                                    </div>';
            }
        } else {
            ob_start();
            ?>
            <div class="gmap_embed_create_new_link_area">
                <a style=""
                   href="<?php echo esc_url(admin_url()) . 'admin.php?page=wpgmapembed&amp;tag=new'; ?>"
                   data-id="wp-gmap-new" class="media-menu-item">
                    <i class="dashicons dashicons-plus"></i>
                    <?php echo __("Create Your First Map", "gmap-embed"); ?>
                </a>
            </div>
            <div class="srm_gmap_instructions_outer_area">
                <div class="srm_gmap_instructions" style="width: 100%">
                    <h3>Frequently asked questions</h3>
            <?php
            require_once(plugin_dir_path(__FILE__) . '../../includes/wpgmap_faqs.php');
            echo '</div></div>';
            $content .= ob_get_clean();
        }

        echo $content;
    }

    public function load_popup_wpgmapembed_list()
    {
        $content = '';
        $args = array(
            'post_type' => 'wpgmapembed'
        );
        $mapsList = new WP_Query($args);

        while ($mapsList->have_posts()) {
            $mapsList->the_post();
            $title = get_post_meta(get_the_ID(), 'wpgmap_title', true);
            $content .= '<div class="wp-gmap-single">
                                        <div class="wp-gmap-single-left">
                                            <div class="wp-gmap-single-title">
                                                ' . $title . '
                                            </div>
                                            <div class="wp-gmap-single-shortcode">
                                                <input class="wpgmap-shortcode regular-text" type="text" value="[gmap-embed id=&quot;' . get_the_ID() . '&quot;]"
                                                       onclick="this.select()"/>
                                            </div>
                                        </div>
                                        <div class="wp-gmap-single-action">
                                            <button type="button"
                                                    class="button media-button button-primary button-large wpgmap-insert-shortcode">
                                                Insert
                                            </button>                                            
                                        </div>
                                    </div>';
        }
        echo $content;
        exit;


    }

    public function get_wpgmapembed_data($gmap_id = '')
    {
        if ($gmap_id == '') {
            $gmap_id = intval($_POST['wpgmap_id']);
        }

        $gmap_data = array(
            'wpgmap_id' => $gmap_id,
            'wpgmap_title' => get_post_meta($gmap_id, 'wpgmap_title', true),
            'wpgmap_heading_class' => get_post_meta($gmap_id, 'wpgmap_heading_class', true),
            'wpgmap_show_heading' => get_post_meta($gmap_id, 'wpgmap_show_heading', true),
            'wpgmap_latlng' => get_post_meta($gmap_id, 'wpgmap_latlng', true),
            'wpgmap_map_zoom' => get_post_meta($gmap_id, 'wpgmap_map_zoom', true),
            'wpgmap_disable_zoom_scroll' => get_post_meta($gmap_id, 'wpgmap_disable_zoom_scroll', true),
            'wpgmap_map_width' => get_post_meta($gmap_id, 'wpgmap_map_width', true),
            'wpgmap_map_height' => get_post_meta($gmap_id, 'wpgmap_map_height', true),
            'wpgmap_map_type' => get_post_meta($gmap_id, 'wpgmap_map_type', true),
            'wpgmap_map_address' => get_post_meta($gmap_id, 'wpgmap_map_address', true),
            'wpgmap_show_infowindow' => get_post_meta($gmap_id, 'wpgmap_show_infowindow', true),
            'wpgmap_enable_direction' => get_post_meta($gmap_id, 'wpgmap_enable_direction', true),
            'wpgmap_marker_icon' => get_post_meta($gmap_id, 'wpgmap_marker_icon', true),
            'wpgmap_center_lat_lng' => get_center_lat_lng_by_map_id($gmap_id)
        );

        return json_encode($gmap_data);
    }

    public function remove_wpgmapembed_data()
    {

        $meta_data = array(
            'wpgmap_title',
            'wpgmap_heading_class',
            'wpgmap_show_heading',
            'wpgmap_latlng',
            'wpgmap_map_zoom',
            'wpgmap_disable_zoom_scroll',
            'wpgmap_map_width',
            'wpgmap_map_height',
            'wpgmap_map_type',
            'wpgmap_map_address',
            'wpgmap_show_infowindow',
            'wpgmap_enable_direction'
        );

        $post_id = intval($_POST['post_id']);
        wp_delete_post($post_id);
        foreach ($meta_data as $field_name => $value) {
            delete_post_meta($post_id, $field_name, $value);
        }
        $returnArray = array(
            'responseCode' => 1,
            'message' => "Deleted Successfully."
        );
        echo json_encode($returnArray);
        exit;
    }
}