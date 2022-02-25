<?php

trait PluginsLoadedActions
{
    /**
     * Fires after plugins loaded
     */
    function wpgmap_do_after_plugins_loaded()
    {
        // In case of existing installation
        if (get_option('gmap_embed_activation_time', false) == false) {
            update_option('gmap_embed_activation_time', time());
        }
    }
}