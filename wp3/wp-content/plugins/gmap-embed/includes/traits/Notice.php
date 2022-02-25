<?php

trait Notice
{
    function gmap_embed_notice_generate()
    {
        $this->gmap_embed_generate_admin_review_notice();
    }

    /**
     * Do something on review already button click
     */
    public function review_already_did()
    {
        update_option('gmap_embed_is_review_done', true);
    }

    /**
     * Do something on review later button click
     */
    public function review_later()
    {
        update_option('gmap_embed_is_review_snoozed', true);
        update_option('gmap_embed_review_snoozed_at', time());
    }

    /**
     * Redirect to URL generate
     * @return string
     */
    public function redirect_to()
    {
        $request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $query_string = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        parse_str($query_string, $current_url);
        $unset_array = array('dismiss', 'plugin', '_wpnonce', 'later');

        foreach ($unset_array as $value) {
            if (isset($current_url[$value])) {
                unset($current_url[$value]);
            }
        }

        $current_url = http_build_query($current_url);
        $redirect_url = $request_uri . '?' . $current_url;
        return $redirect_url;
    }


    public function gmap_embed_generate_admin_review_notice()
    {
        $activation_time = get_option('gmap_embed_activation_time', false);
        $is_review_snoozed = get_option('gmap_embed_is_review_snoozed');
        $snoozed_time = get_option('gmap_embed_review_snoozed_at');

        //How may day's passed after activation
        $seconds_diff = time() - $activation_time;
        $passed_days = ($seconds_diff / 3600) / 24;

        //Snoozed how many day's before
        $seconds_diff = time() - $snoozed_time;
        $snoozed_before = ($seconds_diff / 3600) / 24;
        $is_review_done = get_option('gmap_embed_is_review_done');

        /**
         *
         * Review section will shows based on following cases
         * Case 1: Passed three(3) days and not snoozed
         * Case 2: Snoozed before 7 day's
         */
        if ($is_review_done == false and (($passed_days >= 3 and $is_review_snoozed == false) or ($is_review_snoozed == true and $snoozed_before >= 7))) {
            $scheme = (parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY)) ? '&' : '?';
            $url = $_SERVER['REQUEST_URI'] . $scheme;
            $dismiss_link = add_query_arg([
                'plugin' => 'gmap-embed',
                'dismiss' => true,
                '_wpnonce' => wp_create_nonce()
            ], $url);
            $later_link = add_query_arg([
                'plugin' => 'gmap-embed',
                'later' => true,
                '_wpnonce' => wp_create_nonce()
            ], $url);
            ?>
            <div class="gmap_embed_review_section notice notice-success"
                 style="margin:0 !important;padding:0 !important;">
                <img src="<?php echo plugins_url('../../assets/images/gmap_embed_logo.png', plugin_basename(__FILE__)); ?>"
                     width="60" style="float: left;margin: 9px 9px 0 5px !important"/>
                <p><?php _e("<span style='color:green;'>We hope you're" . ' enjoying of using <b style="color:#007cba">WP Google Map</b> plugin.
Could you please give us a BIG favour and give it a 5-star rating on Wordpress to help us spread the word and boost our motivation!</span>
', 'gmap-embed'); ?></p>
                <ul>
                    <li style="display: inline;margin-right:15px;"><a style="text-decoration: none"
                                                                      href="<?php echo esc_url('https://www.srmilon.info/wp-review-forum?utm_source=wp_admin&utm_medium=review_notice_view&utm_campaign=review_notice'); ?>"
                                                                      target="_blank"><span
                                    class="dashicons dashicons-external"></span> Ok, you deserve it!</a></li>
                    <li style="display: inline;margin-right:15px;"><a style="text-decoration: none"
                                                                      href="<?php echo esc_url($dismiss_link); ?>"><span
                                    class="dashicons dashicons-smiley"></span> I already did</a></li>
                    <li style="display: inline;margin-right:15px;"><a style="text-decoration: none"
                                                                      href="<?php echo esc_url($later_link); ?>"><span
                                    class="dashicons dashicons-calendar-alt"></span> Maybe Later</a></li>
                    <li style="display: inline;margin-right:15px;"><a style="text-decoration: none"
                                                                      href="<?php echo esc_url('https://www.srmilon.info/wp-support-forum?utm_source=wp_admin&utm_medium=review_notice_view&utm_campaign=review_notice_help'); ?>"
                                                                      target="_blank"><span
                                    class="dashicons dashicons-external"></span> I need help</a></li>
                    <li style="display: inline;margin-right:15px;"><a style="text-decoration: none"
                                                                      href="<?php echo esc_url($dismiss_link); ?>"><span
                                    class="dashicons dashicons-dismiss"></span> Never show again</a></li>
                </ul>
            </div>
            <?php
        }
    }
}