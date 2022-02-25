<?php
/*
  Plugin Name: WP Google Map
  Plugin URI: https://www.srmilon.info?utm_source=wp-plugins&utm_campaign=plugin-uri&utm_medium=wp-dash
  Description: WP Google Map plugin allows creating Google Map with marker or location with a responsive interface. Marker supports text, images, links, videos, and custom icons. Simply, Just put the shortcode on the page, post, or widget to display the map anywhere.
  Author: srmilon.info
  Text Domain: gmap-embed
  Domain Path: /languages
  Author URI: https://www.srmilon.info?utm_source=wp-plugins&utm_campaign=author-uri&utm_medium=wp-dash
  Version: 1.7.3
 */

if (!defined('ABSPATH')) {
    exit;
}
require_once plugin_dir_path(__FILE__) . '/includes/helper.php';
require_once plugin_dir_path(__FILE__) . '/includes/traits/Settings.php';
require_once plugin_dir_path(__FILE__) . '/includes/traits/MapCRUD.php';
require_once plugin_dir_path(__FILE__) . '/includes/traits/Notice.php';
require_once plugin_dir_path(__FILE__) . '/includes/traits/Menu.php';
require_once plugin_dir_path(__FILE__) . '/includes/traits/AssetHandler.php';
require_once plugin_dir_path(__FILE__) . '/includes/traits/CommonFunctions.php';
require_once plugin_dir_path(__FILE__) . '/includes/traits/ActionLinks.php';
require_once plugin_dir_path(__FILE__) . '/includes/traits/PluginsLoadedActions.php';
require_once plugin_dir_path(__FILE__) . '/includes/traits/ActivationHooks.php';
require_once plugin_dir_path(__FILE__) . '/includes/traits/InitActions.php';

if (!class_exists('srm_gmap_embed_main')) {

    class srm_gmap_embed_main
    {
        use Settings, MapCRUD, Notice, Menu, AssetHandler, CommonFunctions, ActionLinks, PluginsLoadedActions, ActivationHooks, InitActions;

        private $plugin_name = 'WP Google Map';
        private $plugin_slug = 'gmap-embed';
        public $wpgmap_api_key = 'AIzaSyD79uz_fsapIldhWBl0NqYHHGBWkxlabro';


        /**
         * constructor function
         */
        function __construct()
        {
            $this->wpgmap_api_key = get_option('wpgmap_api_key');
            add_action('plugins_loaded', array($this, 'wpgmap_do_after_plugins_loaded'));
            add_action('activated_plugin', array($this, 'wpgmap_do_after_activation'), 10, 2);
            add_action('wp_enqueue_scripts', array($this, 'gmap_enqueue_scripts'));
            add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_gmap_scripts'));
            add_action('admin_menu', array($this, 'gmap_create_menu'));
            add_action('init', array($this, 'do_init_actions'));
            add_action('admin_init', array($this, 'gmapsrm_settings'));
            add_action('wp_ajax_wpgmapembed_save_map_data', array($this, 'save_wpgmapembed_data'));
            add_action('wp_ajax_wpgmapembed_load_map_data', array($this, 'load_wpgmapembed_list'));
            add_action('wp_ajax_wpgmapembed_popup_load_map_data', array($this, 'load_popup_wpgmapembed_list'));
            add_action('wp_ajax_wpgmapembed_get_wpgmap_data', array($this, 'get_wpgmapembed_data'));
            add_action('wp_ajax_wpgmapembed_remove_wpgmap', array($this, 'remove_wpgmapembed_data'));
            add_action('admin_notices', array($this, 'gmap_embed_notice_generate'));
            add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this,'gmap_srm_settings_link'));
            add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this,'gmap_srm_settings_linka'));
        }
    }
}
new srm_gmap_embed_main();

// including requird files
require_once plugin_dir_path(__FILE__) . '/includes/widget.php';
require_once plugin_dir_path(__FILE__) . '/includes/shortcodes.php';

if (isset($pagenow) and ($pagenow == 'post.php' || $pagenow == 'post-new.php')) {
    require_once plugin_dir_path(__FILE__) . '/includes/wpgmap_popup_content.php';
}
load_plugin_textdomain('gmap-embed', false, dirname(plugin_basename(__FILE__)) . '/languages');