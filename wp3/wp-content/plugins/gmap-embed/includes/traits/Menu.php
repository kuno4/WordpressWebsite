<?php

trait Menu
{
    /**
     * To create menu in admin panel
     */
    public function gmap_create_menu()
    {

        //create new top-level menu
        add_menu_page($this->plugin_name, $this->plugin_name, 'administrator', 'wpgmapembed', array(
            $this,
            'srm_gmap_main'
        ), 'dashicons-location', 11);

        $no_of_map_created = gmap_embed_no_of_post();
        //to create sub menu
        if (gmap_embed_is_using_premium_version()) {
            add_submenu_page('wpgmapembed', __("Add new Map", "gmap-embed"), __("Add New", "gmap-embed"), 'administrator', 'wpgmapembed&tag=new', array(
                $this,
                'srm_gmap_new'
            ), 11);
        }
    }

    /**
     * Google Map Embed Mail Page
     */
    public function srm_gmap_main()
    {
        require plugin_dir_path(__FILE__) . '../../includes/gmap.php';
    }
}