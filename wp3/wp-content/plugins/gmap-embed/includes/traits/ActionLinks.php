<?php

trait ActionLinks
{

    function gmap_srm_settings_link($links)
    {
        $links[] = '<a href="' .
            admin_url('admin.php?page=wpgmapembed') .
            '">' . __('Settings') . '</a>';

        return $links;
    }


    function gmap_srm_settings_linka($links)
    {
        if (!gmap_embed_is_using_premium_version()) {
            $links[] = '<a target="_blank" style="color: #11967A;font-weight:bold;" href="' . esc_url('https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZBERRKARGNEYA') . '">' . __('Upgrade To Premium') . '</a>';
        }
        $links[] = '<a target="_blank" href="' . esc_url('https://wordpress.org/support/plugin/gmap-embed/reviews/#new-post') . '">' . __('Rate Us') . '</a>';
        $links[] = '<a target="_blank" href="' . esc_url('https://wordpress.org/support/plugin/gmap-embed/#new-topic-0') . '">' . __('Support') . '</a>';

        return $links;
    }
}