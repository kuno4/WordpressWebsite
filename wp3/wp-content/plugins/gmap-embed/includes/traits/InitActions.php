<?php

trait InitActions
{
    /**
     * Doing some code in init hook
     */
    public function do_init_actions()
    {

        // Review system hooks
        add_action('gmap_embed_review_already_did', array($this, 'review_already_did'));
        add_action('gmap_embed_review_later', array($this, 'review_later'));
        if (isset($_GET['plugin'])) {
            $plugin = sanitize_text_field($_GET['plugin']);
            if ($plugin === $this->plugin_slug) {
                if (isset($_GET['dismiss']) and $_GET['dismiss'] == 1) {
                    do_action('gmap_embed_review_already_did');
                }
                if (isset($_GET['later']) and $_GET['later'] == 1) {
                    do_action('gmap_embed_review_later');
                }
                wp_safe_redirect($this->redirect_to());
                exit;
            }
        }

        // Register Post Types
        register_post_type('wpgmapembed',
            array(
                'labels' => array(
                    'name' => __('Google Maps'),
                    'singular_name' => __('Map'),
                ),
                'public' => false,
                'has_archive' => false,
            )
        );
    }
}