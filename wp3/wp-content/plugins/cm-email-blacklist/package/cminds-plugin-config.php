<?php

$cminds_plugin_config = array(
	'plugin-is-pro'				 => FALSE,
	'plugin-is-addon'			 => FALSE,
	'plugin-version'			 => '1.3.17',
	'plugin-abbrev'				 => 'cmeb',
	'plugin-file'				 => CMEB_PLUGIN_FILE,
	'plugin-dir-path'			 => plugin_dir_path( CMEB_PLUGIN_FILE ),
	'plugin-dir-url'			 => plugin_dir_url( CMEB_PLUGIN_FILE ),
	'plugin-basename'			 => plugin_basename( CMEB_PLUGIN_FILE ),
	'plugin-icon'				 => '',
    'plugin-affiliate'               => '',
    'plugin-redirect-after-install'  => admin_url( 'admin.php?page=cmeb_menu' ),
       'plugin-show-guide'              => TRUE,
    'plugin-guide-text'              => '    <div style="display:block">
        <ol>
            <li>The plugin only works when at least one of the General Options is checked. If both are used, then the domain has to be either Whitelisted or not in the Free Domain list.</li>
            <li>Go to <strong>"Plugin Settings"</strong> and decide which method to use: White list or Free Domain List</li>
            <li>If you choose to use the White List method <strong>"add the domains"</strong> from which user can register to your site</li>
            <li>If you chosen to use the Free Domains - registration to your site will be limited and will not include any domain appearing in the free domains list.</li>
            <li>You can use the testing option to test the ability to register with different domains </li>
        </ol>
    </div>',
    'plugin-guide-video-height'      => 240,
    'plugin-guide-videos'            => array(
        array( 'title' => 'Installation tutorial', 'video_id' => '158514903' ),
    ),
	'plugin-name'				 => CMEB_NAME,
	'plugin-license-name'		 => CMEB_NAME,
	'plugin-slug'				 => '',
	'plugin-short-slug'			 => 'email-blacklist',
	'plugin-menu-item'			 => CMEB_MENU_ITEM,
	'plugin-textdomain'			 => CMEB_SLUG_NAME,
       'plugin-upgrade-text'           => 'Good Reasons to Upgrade to Pro',
    'plugin-upgrade-text-list'      => array(
        array( 'title' => 'Introduction to email blacklist', 'video_time' => '0:00' ),
        array( 'title' => 'Blacklist and Whitelist domain explained', 'video_time' => '0:54' ),
        array( 'title' => 'Blacklist and Whitelist domain settings', 'video_time' => '1:24' ),
        array( 'title' => 'Free domain list from SpamAssassin', 'video_time' => '1:57' ),
        array( 'title' => 'User defined domain blacklist', 'video_time' => '2:46' ),
        array( 'title' => 'Domain tester', 'video_time' => '3:20' ),
        array( 'title' => 'User defined domain whitelist', 'video_time' => '3:37' ),
        array( 'title' => 'Registration log', 'video_time' => '4:55' ),
        array( 'title' => 'Frontend display of messages', 'video_time' => '5:27' ),
    ),
    'plugin-upgrade-video-height'   => 240,
    'plugin-upgrade-videos'         => array(
        array( 'title' => 'Email Blacklist Premium Features', 'video_id' => '123027044' ),
    ),
	'plugin-userguide-key'		 => '285-cm-email-registration-blacklist',
	'plugin-store-url'			 => 'https://www.cminds.com/wordpress-plugins-library/purchase-cm-email-registration-blacklist-plugin-for-wordpress/',
	'plugin-support-url'		 => 'https://wordpress.org/support/plugin/cm-email-blacklist',
	'plugin-review-url'			 => 'https://wordpress.org/support/view/plugin-reviews/cm-email-blacklist',
	'plugin-changelog-url'		 => 'https://www.cminds.com/wordpress-plugins-library/purchase-cm-email-registration-blacklist-plugin-for-wordpress/#changelog',
	'plugin-licensing-aliases'	 => array( '' ),
	'plugin-compare-table'	 => '
            <div class="pricing-table" id="pricing-table"><h2 style="padding-left:10px;">Upgrade The Email Registration Blacklist Plugin:</h2>
                <ul>
                    <li class="heading" style="background-color:red;">Current Edition</li>
                    <li class="price">FREE<br /></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Free Domain List<span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="A list of domains from SpamAssassin which can be used to filter blacklisted domains"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Include Domain WhiteList</li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Include Labels Customization</li>
                    <hr>
                    Other CreativeMinds Offerings
                    <hr>
                 <a href="https://www.cminds.com/wordpress-plugins-library/seo-keyword-hound-wordpress/" target="blank"><img src="' . plugin_dir_url( __FILE__ ). 'views/Hound2.png"  width="220"></a><br><br><br>
                <a href="https://www.cminds.com/store/cm-wordpress-plugins-yearly-membership/" target="blank"><img src="' . plugin_dir_url( __FILE__ ). 'views/banner_yearly-membership_220px.png"  width="220"></a><br>
               </ul>

                <ul>
                      <li class="heading">Pro<a href="https://www.cminds.com/wordpress-plugins-library/purchase-cm-email-registration-blacklist-plugin-for-wordpress/" style="float:right;font-size:11px;color:white;" target="_blank">More</a></li>
                    <li class="price">$29.00<br /> <span style="font-size:14px;">(For one Year / 2 Sites)<br />Additional pricing options available <a href="https://www.cminds.com/wordpress-plugins-library/purchase-cm-email-registration-blacklist-plugin-for-wordpress/" target="_blank"> >>> </a></span> <br /></li>
                    <li class="action"><a href="https://www.cminds.com/?edd_action=add_to_cart&download_id=32411&wp_referrer=https://www.cminds.com/checkout/&edd_options[price_id]=1" style="font-size:18px;" target="_blank">Upgrade Now</a></li>

                     <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>All Free Version Features <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="All free features are supported in the pro"></span></li>
<li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Online domain filtering using DNSBL service<span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="DNSBL Information provides a single place where you can check that blacklist status on more than 100 DNS based blacklists. The plugin connects to the server once a user try to register to check if his domain is defined as a spam domain."></span></li>
<li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Allow only Whitelisted domains to register<span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Restrict registration only to domains which appear on your whitelist"></span></li>
<li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Allow only Whitelisted emails to register<span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Restrict the registration to a defined list of emails which you upload. User using another email will not be able to register."></span></li>
<li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Prevent blacklisted emails or domains to register<span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Any email from a domain which appears in one of the blacklist used by the plugin will not be able to register"></span></li>
<li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Add Domains to Whitelist<span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Admin can manually add domain to the Whitelist. This will help override domains which appear in one of the other blacklist such as Spamassasian and allow users to register."></span></li>
<li style="text-align:left;"><span class="dashicons dashicons-yes"></span>User Emails Blacklist and Whitelist<span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Admin can add specific emails to the email blacklist or email whitelist. This will prevent users using these emails (ban them) from registering on the site."></span></li>
<li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Import from CSV file<span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Allow to import from a csv file of blacklisted or whitelisted emails"></span></li>
<li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Testing Domains<span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="You can test a domain to check if it is blacklisted based on any ￼of the rules you have defined. The testing imitates a user trying to register on your site"></span></li>
<li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Failed Registration Log<span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="The log includes the list of all failed registration ￼attempts and the reason why the domain / email was banned"></span></li>
<li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Customizing Messages<span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Admin can customize the messages shown to users once their ￼domain / email has been banned"></span></li>
<li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Spamassassin Domains List<span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Blacklist domains list originates from Spamassassin can be imported and updated to your blacklist domains list"></span></li>
<li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Plugin Settings<span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Plugins settings control what tools are used to filter domains registration."></span></li>
                 <li class="support" style="background-color:lightgreen; text-align:left; font-size:14px;"><span class="dashicons dashicons-yes"></span> One year of expert support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="You receive 365 days of WordPress expert support. We will answer questions you have and also support any issue related to the plugin. We will also provide on-site support."></span><br />
                         <span class="dashicons dashicons-yes"></span> Unlimited product updates <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="During the license period, you can update the plugin as many times as needed and receive any version release and security update"></span><br />
                        <span class="dashicons dashicons-yes"></span> Plugin can be used forever <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose not to renew the plugin license, you can still continue to use it as long as you want."></span><br />
                        <span class="dashicons dashicons-yes"></span> Save 40% once renewing license <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose to renew the plugin license you can do this anytime you choose. The renewal cost will be 35% off the product cost."></span></li>

            </div>',
);
