<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>
<div data-columns="8">

    <span class="wpgmap_msg_error" style="width:80%;">
        <!--validation error will goes here-->
    </span>

    <!-- google map properties -->
    <div class="wp-gmap-properties-outer">
        <div class="wpgmap_tab_menu">
            <ul class="wpgmap_tab">
                <li class="active" id="wp-gmap-properties">General</li>
                <li id="wp-gmap-other-properties">Other Settings</li>
            </ul>
        </div>
        <div class="wp-gmap-tab-contents wp-gmap-properties">
            <table class="gmap_properties">
                <tr>
                    <td>
                        <label for="wpgmap_title"><b><?php _e( 'Map Title', 'gmap-embed' ); ?></b></label><br/>
                        <input id="wpgmap_title" name="wpgmap_title" value="" type="text"
                               class="regular-text">
                        <br/>

                        <input type="checkbox" value="1" name="wpgmap_show_heading"
                               id="wpgmap_show_heading">
                        <label for="wpgmap_show_heading"><?php _e( 'Show as map title', 'gmap-embed' ); ?></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="wpgmap_latlng"><b><?php _e( 'Latitude, Longitude(Approx)', 'gmap-embed' ); ?></b></label><br/>
                        <input id="wpgmap_latlng" name="wpgmap_latlng" value="" type="text"
                               class="regular-text">
                        <input type="hidden" name="wpgmap_center_lat_lng" id="wpgmap_center_lat_lng">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="wpgmap_upload_hidden" type="hidden" size="36" name="upload_image"
                               value="<?php echo esc_url('https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi2.png');?>"/>
                        <img src="<?php echo esc_url('https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi2.png');?>"
                             id="wpgmap_icon_img" width="32" style="float: left;">
                        <input id="upload_image_button" type="button" value="Change Marker Icon"
                               style="float: left;margin-left: 14px;margin-top: 12px;"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="wpgmap_map_zoom"><b><?php _e( 'Zoom', 'gmap-embed' ); ?></b></label><br/>
                        <input id="wpgmap_map_zoom" name="wpgmap_map_zoom" value="13" type="text"
                               class="regular-text">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="wpgmap_map_width"><b><?php _e( 'Width (%)', 'gmap-embed' ); ?></b></label><br/>
                        <input id="wpgmap_map_width" name="wpgmap_map_width" value="100%"
                               type="text" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="wpgmap_map_height"><b><?php _e( 'Height (px)', 'gmap-embed' ); ?></b></label><br/>
                        <input id="wpgmap_map_height" name="wpgmap_map_height" value="300px"
                               type="text" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="wpgmap_map_type"><b><?php _e( 'Map Type', 'gmap-embed' ); ?></b></label><br/>
                        <select id="wpgmap_map_type" class="regular-text">
                            <option>ROADMAP</option>
                            <option>SATELLITE</option>
                            <option>HYBRID</option>
                            <option>TERRAIN</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="wpgmap_map_address"><b><?php _e( 'Current Location Address(HTML supported)', 'gmap-embed' ); ?></b></label><br/>
                        <textarea id="wpgmap_map_address"  name="wpgmap_map_address" class="regular-text" rows="3"></textarea>
                        <br/>

                        <label for="wpgmap_show_infowindow"><input type="checkbox" value="1"
                                                                   name="wpgmap_show_infowindow"
                                                                   id="wpgmap_show_infowindow">
							<?php _e( 'Show location address in marker infowindow', 'gmap-embed' ); ?>
                        </label>

                    </td>
                </tr>

            </table>
        </div>
        <div class="wp-gmap-tab-contents wp-gmap-other-properties hidden">
            <table class="gmap_properties">
                <tr>
                    <td>
                        <label for="wpgmap_heading_class"><b><?php _e( 'Heading Custom Class', 'gmap-embed' ); ?> <span
                                        style="color:gray;">(if any)</span></b></label><br/>
                        <input id="wpgmap_heading_class" name="wpgmap_heading_class" value="" type="text"
                               class="regular-text">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="wpgmap_enable_direction"><input type="checkbox" value="1"
                                                                    name="wpgmap_enable_direction"
                                                                    id="wpgmap_enable_direction">
							<?php _e( 'Enable Direction in Map', 'gmap-embed' ); ?>
                        </label>


                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="wpgmap_disable_zoom_scroll"><input type="checkbox" value="1"
                                                                       name="wpgmap_disable_zoom_scroll"
                                                                       id="wpgmap_disable_zoom_scroll">
							<?php _e( 'Disable zoom on mouse scroll', 'gmap-embed' ); ?>
                        </label>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="wp-gmap-preview">
        <h1 id="wpgmap_heading_preview" style="padding: 0px;margin: 0px;"></h1>
        <input id="pac-input" class="controls" type="text"
               placeholder="<?php _e( 'Search by Address, Zip Code', 'gmap-embed' ); ?>"/>
        <div id="map" style="height: 520px;"></div>
    </div>

    <script type="text/javascript"
            src="<?php echo esc_url( plugins_url( "../assets/js/geo_based_map_create.js?v=".filemtime(__DIR__.'/../assets/js/geo_based_map_create.js'), __FILE__ ) ); ?>"></script>
</div>

<div class="media-frame-toolbar">
    <div class="media-toolbar">
        <div class="media-toolbar-secondary"
             style="text-align: right;float: right;margin-top:10px;margin-right:10px;">
            <span class="spinner" style="margin: 0px !important;float:left;"></span>
            <button class=" button button-primary button-large"
                    id="wp-gmap-embed-save"><?php _e( 'Save', 'gmap-embed' ); ?></button>
        </div>
    </div>
</div>
