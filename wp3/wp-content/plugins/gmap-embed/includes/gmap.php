<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require_once( plugin_dir_path( __FILE__ ) . '/helper.php' );
$no_of_map_created = gmap_embed_no_of_post();
if ( isset( $_GET['page'] ) ) {

	// Form actions like Settings, Contact
	require_once( plugin_dir_path( __FILE__ ) . '/form_actions.php' );

	$wpgmap_page = esc_html( $_GET['page'] );
	$wpgmap_tag  = '';
	if ( isset( $_GET['tag'] ) ) {
		$wpgmap_tag = esc_html( $_GET['tag'] );
	}
	?>
    <script type="text/javascript">
        var wp_gmap_api_key = '<?php echo esc_html( get_option( 'wpgmap_api_key' ) );?>';
    </script>
    <div class="wrap">
        <div id="gmap_container_inner">
            <!--contents-->

            <!--            Menu area-->
            <div class="gmap_header_section">

                <!--                Left area-->
                <div class="gmap_header_section_left">
                    <ul id="wp-gmap-nav">
                        <li class="<?php echo ( $wpgmap_page == 'wpgmapembed' && $wpgmap_tag == '' ) ? 'active' : ''; ?>">
                            <a href="<?php echo admin_url(); ?>admin.php?page=wpgmapembed" data-id="wp-gmap-all"
                               class="media-menu-item"><span class="dashicons-before dashicons-list-view"></span> <?php _e( 'All Maps', 'gmap-embed' ); ?></a>
                        </li>
                        <li class="<?php echo $wpgmap_tag == 'new' ? 'active' : ''; ?>">
							<?php
							if ( gmap_embed_is_using_premium_version() ) { ?>
                                <a href="<?php echo esc_url( admin_url() . 'admin.php?page=wpgmapembed&tag=new' ); ?>"
                                   data-id="wp-gmap-new"
                                   class="media-menu-item"><span class="dashicons-before dashicons-plus-alt"></span> <?php _e( 'Add New Map', 'gmap-embed' ); ?></a>
							<?php } else {
								require_once( plugin_dir_path( __FILE__ ) . '/premium-version-notice.php' );
							}
							?>
                        </li>

                        <li class="<?php echo $wpgmap_tag == 'settings' ? 'active' : ''; ?>">
                            <a href="<?php echo esc_url( admin_url() . 'admin.php?page=wpgmapembed&tag=settings' ); ?>"
                               data-id="wp-gmap-settings"
                               class="media-menu-item"><span class="dashicons-before dashicons-admin-settings"></span> <?php _e( 'Settings', 'gmap-embed' ); ?></a>
                        </li>
                        <li class="<?php echo $wpgmap_tag == 'contact' ? 'active' : ''; ?>">
                            <a href="<?php echo esc_url( admin_url() . 'admin.php?page=wpgmapembed&tag=contact' ); ?>"
                               data-id="wp-gmap-settings"
                               class="media-menu-item"><span class="dashicons-before dashicons-editor-help"></span> <?php _e( 'Having Problem?', 'gmap-embed' ); ?></a>
                        </li>
                        <li>
                            <a target="_blank"
                               href="<?php echo esc_url( 'https://www.youtube.com/watch?v=o90H34eacHg' ); ?>"
                               class="media-menu-item"><span class="dashicons-before dashicons-video-alt3"></span>
								<?php _e( 'See Video', 'gmap-embed' ); ?></a>
                        </li>
                        <li style="background-color: #ff8354;border-bottom: solid 5px #965d48;">
                            <a target="_blank"
                               style="cursor: pointer;" href="<?php echo esc_url( 'https://go.crisp.chat/chat/embed/?website_id=8be1afb1-b6a1-4afb-b45a-36982f8af534' ); ?>"
                               class="media-menu-item"><i class="dashicons dashicons-external"></i>
                                <?php _e( 'LIVE CHAT', 'gmap-embed' ); ?></a>
                        </li>
                    </ul>
                </div>

                <!--    Right Area-->
                <div class="gmap_header_section_right">
                <div class="gmap_header_section_right_inner">


					<?php
					if ( strlen( trim( get_option( 'wpgmapembed_license' ) ) ) !== 32 ) { ?>
                        <a target="_blank"
                           href="<?php echo esc_url( 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZBERRKARGNEYA' ); ?>"
                           class="button media-button button-default button-large gmap_get_pro_version">
                            GET PRO VERSION
                        </a>
						<?php
					} else {
						?>
                        <img style="margin-left: 10px;height: 60px;"
                             src="<?php echo esc_url( plugins_url( "../assets/images/pro_version.png", __FILE__ ) ); ?>"
                             />
						<?php
					}
					?>
                    <a class="gmap_donate_button"
                       href="<?php echo esc_url( 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZBERRKARGNEYA' ); ?>">
                        <img alt="Donate"
                             src="<?php echo esc_url( plugins_url( "../assets/images/paypal.png", __FILE__ ) ); ?>"
                             width="150"/>
                    </a>
                </div>
            </div>
            </div>

            <div id="wp-gmap-tabs">
				<?php
				if ( isset( $_GET['message'] ) ) {
					?>
                    <div class="message">
                        <div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
                            <p>
                                <strong>
									<?php
									$message_status = $_GET['message'];
									switch ( $message_status ) {
										case 1:
											echo __( 'Map has been created Successfully. <a href="' . esc_url( 'https://youtu.be/o90H34eacHg?t=231' ) . '" target="_blank"> See How to use >></a>', 'gmap-embed' );
											break;
										case 2:
											echo __( 'Map Updated Successfully. <a href="' . esc_url( 'https://youtu.be/o90H34eacHg?t=231' ) . '" target="_blank"> See How to use >></a>', 'gmap-embed' );
											break;
										case 3:
											echo __( 'Settings updated Successfully, Please click on <i style="color: green;">Create New Map</i> menu to create map.', 'gmap-embed' );
											break;
										case 4:
											echo __( $message, 'gmap-embed' );
											break;
										case - 1:
											echo __( 'Map Deleted Successfully.', 'gmap-embed' );
											break;
									}
									?>
                                </strong>
                            </p>
                            <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span>
                            </button>
                        </div>
                    </div>
					<?php
				}
				?>
				<?php
				if ( get_option( 'wpgmap_api_key' ) == false  and $wpgmap_tag!='settings') {
					require_once( plugin_dir_path( __FILE__ ) . '/wpgmap_settings_initial.php' );
				}
				?>
                <!---------------------------Maps List-------------->
				<?php
				if ( $wpgmap_page == 'wpgmapembed' && $wpgmap_tag == '' ) {
					?>
                    <div class="wp-gmap-tab-content active" id="wp-gmap-all">
						<?php
						require_once( plugin_dir_path( __FILE__ ) . '/wpgmap_list.php' );
						?>
                    </div>
					<?php
				}
				?>
                <!---------------------------Create New Map-------------->

                <div
                        class="wp-gmap-tab-content <?php echo ( $_GET['page'] == 'wpgmapembed' && $wpgmap_tag == 'new' ) ? 'active' : ''; ?>"
                        id="wp-gmap-new">
					<?php
					if ( $wpgmap_page == 'wpgmapembed' && $wpgmap_tag == 'new' ) {
						require_once( plugin_dir_path( __FILE__ ) . '/wpgmap_create.php' );
					}
					?>
                </div>

                <!---------------------------Existing map update-------------->

                <div
                        class="wp-gmap-tab-content <?php echo ( $wpgmap_page == 'wpgmapembed' && $wpgmap_tag == 'edit' ) ? 'active' : ''; ?>"
                        id="wp-gmap-edit">
					<?php
					if ( $wpgmap_page == 'wpgmapembed' && $wpgmap_tag == 'edit' ) {
						require_once( plugin_dir_path( __FILE__ ) . '/wpgmap_edit.php' );
					}
					?>
                </div>

                <!---------------------------Plugin Settings-------------->

                <div
                        class="wp-gmap-tab-content <?php echo ( $wpgmap_page == 'wpgmapembed' && $wpgmap_tag == 'contact' ) ? 'active' : ''; ?>"
                        id="wp-gmap-contact">
					<?php
					if ( $wpgmap_page == 'wpgmapembed' && $wpgmap_tag == 'contact' ) {
						require_once( plugin_dir_path( __FILE__ ) . '/wpgmap_contact.php' );
					}
					?>
                </div>

                <!---------------------------Plugin Settings-------------->

                <div
                        class="wp-gmap-tab-content <?php echo ( $wpgmap_page == 'wpgmapembed' && $wpgmap_tag == 'settings' ) ? 'active' : ''; ?>"
                        id="wp-gmap-settings">
					<?php
					if ( $wpgmap_page == 'wpgmapembed' && $wpgmap_tag == 'settings' ) {
						require_once( plugin_dir_path( __FILE__ ) . '/wpgmap_settings.php' );
					}
					?>
                </div>


            </div>
        </div>
    </div>
	<?php
}
?>
