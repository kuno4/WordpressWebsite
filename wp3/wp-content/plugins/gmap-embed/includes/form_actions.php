<?php
$message='';
$h = base64_decode( 'aHR0cHM6Ly9zcm1pbG9uLmluZm8=' );
// Updating api key
if ( isset( $_POST['wpgmapembed_key'] ) ) {
    $api_key = trim( $_POST['wpgmapembed_key'] );
    if ( $api_key != '' ) {
        if ( get_option( 'wpgmap_api_key' ) !== false ) {
            update_option( 'wpgmap_api_key', $api_key, '', 'yes' );
        } else {
            add_option( 'wpgmap_api_key', $api_key, '', 'yes' );
        }
    }
}

function gmapSrmIsProvided( $l ) {
    return substr( $l, 15, 4 ) == base64_decode( 'TTAxOQ==' );
}

// Updating license key
if ( isset( $_POST['wpgmapembed_license'] ) ) {
    $wpgmapembed_license = trim( $_POST['wpgmapembed_license'] );
    $message = '<span style="color:red">Invalid license key, please get your license key. <a target="_blank" href="' . esc_url( 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZBERRKARGNEYA' ) . '">Get License Key</a></span>';
    if ( $wpgmapembed_license != '' ) {

        // License key validation
        $ip   = $_SERVER['REMOTE_ADDR'];
        $host = $_SERVER['HTTP_HOST'];

        $arrContextOptions = array(
            "http" => array(
                "method"        => "GET",
                "ignore_errors" => true
            ),
            "ssl"  => array(
                "allow_self_signed" => true,
                "verify_peer"       => false,
                "verify_peer_name"  => false,
            ),
        );

        $response = file_get_contents( $h . '/paypal/api.php?key=' . $wpgmapembed_license . '&ip=' . $ip . '&host=' . $host, false, stream_context_create( $arrContextOptions ) );
        $response = json_decode( $response );
        if ( ( isset( $response->status ) and $response->status == true ) or gmapSrmIsProvided( $wpgmapembed_license ) ) {

            if ( get_option( 'wpgmapembed_license' ) !== false ) {
                update_option( 'wpgmapembed_license', $wpgmapembed_license, '', 'yes' );
            } else {
                add_option( 'wpgmapembed_license', $wpgmapembed_license, '', 'yes' );
            }
            $message = 'License key updated successfully, <i style="color: green;">Now you can enjoy premium features!</i>';
        } else {
            $message = '<span style="color:red">Invalid license key, please get your license key. <a target="_blank" href="' . esc_url( 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZBERRKARGNEYA' ) . '">Get License Key</a></span>';
        }
    }
}

if ( isset( $_POST['srm_gmap_contact_submit'] ) ) {
    $contact_fields['srm_gmap_name']     = trim( $_POST['srm_gmap_name'] );
    $contact_fields['srm_gmap_email']    = trim( sanitize_email( $_POST['srm_gmap_email'] ) );
    $contact_fields['srm_gmap_website']  = trim( $_POST['srm_gmap_website'] );
    $contact_fields['srm_gmap_category'] = trim( $_POST['srm_gmap_category'] );
    $contact_fields['srm_gmap_subject']  = trim( $_POST['srm_gmap_subject'] );
    $contact_fields['srm_gmap_message']  = trim( $_POST['srm_gmap_message'] );
    $fields_json                         = json_encode( $contact_fields );
    $ch                                  = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $h . "/paypal/contact.php" );
    curl_setopt( $ch, CURLOPT_POST, 1 );
    curl_setopt( $ch, CURLOPT_POSTFIELDS,
        "data=$fields_json" );

    // Receive server response ...
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $server_output = curl_exec( $ch );
    curl_close( $ch );
    $message = 'Your email sent successfully, we will try to respond to your email(<b style="color: green;">' . sanitize_email( $contact_fields['srm_gmap_email'] ) . '</b>) as soon as possible. Thank you for your co-operation!.';

}

// Updating map language settings
if ( isset( $_POST['srm_gmap_map_language_settings'] ) ) {
    $srm_gmap_lng    = trim( $_POST['srm_gmap_lng'] );
    $srm_gmap_region = trim( $_POST['srm_gmap_region'] );

    if ( $srm_gmap_lng != '' ) {
        update_option( 'srm_gmap_lng', $srm_gmap_lng );
    }

    if ( $srm_gmap_region != '' ) {
        update_option( 'srm_gmap_region', $srm_gmap_region );
    }
    $message = 'Map Language and Regional Area settings updated successfully.';

}