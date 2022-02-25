<?php

trait CommonFunctions
{
    /*
    * To update post meta data
    */

    public function __update_post_meta($post_id, $field_name, $value = '')
    {
        if (!get_post_meta($post_id, $field_name)) {
            add_post_meta($post_id, $field_name, $value);
        } else {
            update_post_meta($post_id, $field_name, $value);
        }
    }
}