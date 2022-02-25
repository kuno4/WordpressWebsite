=== GamiPress - BuddyBoss integration ===
Contributors: gamipress, tsunoa, rubengc, eneribs
Tags: buddyboss, gamipress, gamification, community, social, points, achievement, badge, award, reward, credit, engagement, ajax, buddypress, bp, social networking, activity, profile, messaging, friend, group, forum, notification, settings, social, community, network, networking
Requires at least: 4.4
Tested up to: 5.7
Stable tag: 1.1.5
License: GNU AGPLv3
License URI:  http://www.gnu.org/licenses/agpl-3.0.html

Connect GamiPress with BuddyBoss

== Description ==

Gamify your [BuddyBoss](https://www.buddyboss.com/platform/ "BuddyBoss") platform community thanks to the powerful gamification plugin, [GamiPress](https://wordpress.org/plugins/gamipress/ "GamiPress")!

This plugin automatically connects GamiPress with BuddyBoss platform adding new activity events and features.

= New Events =

* Account activation: When a user account get activated.
* Get assigned to a specific profile type: When a user gets assigned to a specific profile type.

= Follow Events =

* Start following someone: When a user starts following someone.
* Stop following someone: When a user stops following someone.
* Get a follower: When a user gets a follower.
* Lose a follower: When a user loses a follower.

= Email Invites Events =

* Send an email invitation: When a user sends an email invitation.
* Register from email invitation: When a user from an email invitation gets registered.
* Get an invited user registered: When a invited user gets registered.
* Account from email invitation gets activated: When a user account from an email invitation gets activated.
* Get an invited user account activated: When a invited user account gets activated.

= Profile Events =

* Change profile avatar: When a user changes his profile avatar.
* Change cover image: When a user changes his cover image.
* Update profile information: When a user updates his profile information.
* Complete a minimum percent of your profile: When a user completes a minimum percent of his profile.

= Friendship Events =

* Send friendship request: When a user request to another to become friends.
* Accept a friendship request: When a user accepts the friendship request from another one.
* Get a friendship request accepted: When a user gets a friendship request accepted from another one.
* Remove a friendship: When a user removes a friendship.
* Get a friendship removed: When a user gets a friendship removed.

= Message Events =

* Send/Reply private messages: When a user sends or replies to private messages.

= Activity Stream Events =

* Publish an activity stream message: When a user publishes an activity stream message.
* Remove an activity stream message: When a user removes an activity stream message.
* Reply activity stream message: When a user replies to an activity stream message.
* Favorite activity stream message: When a user favorites an activity stream message.
* Remove a favorite on an activity stream item: When a user removes a favorite on an activity stream message.
* Get a favorite on an activity stream item: When a user gets a new favorite on an activity stream message.
* Get a favorite removed from an activity stream item: When a user gets a favorite removed on an activity stream message.

= Group Events =

* Publish a group activity stream message: When a user publishes an activity stream message in a group.
* Remove a group activity stream message: When a user removes an activity stream message in a group.
* Create a group: When a user creates a new group.
* Join a group: When a user joins a group.
* Join a specific group: When a user joins a specific group.
* Leave a group: When a user leaves a group.
* Leave a specific group: When a user leaves a specific group.
* Get accepted on a private group: When a user gets accepted on a private group.
* Get accepted on a specific private group: When a user gets accepted on a specific private group.
* Group invitations: When a user invites someone to join a group.
* Group promotions: When a user get promoted or promotes another one as group moderator/administrator.

= Forums Events =

* New forum: When a user creates a new forum.
* New topic: When a user creates a new topic.
* New topic on a specific forum: When a user creates a new topic on a specific forum.
* New reply: When a user replies on a topic.
* New reply on a specific topic: When a user replies on a specific topic.
* New reply on any topic of a specific forum: When a user replies on a topic of a specific forum.
* Favorite a topic: When a user favorites a topic.
* Favorite a specific topic: When a user favorites a specific topic.
* Favorite any topic on a specific forum: When a user favorites a topic of a specific forum.
* Get favorite on a topic: When a topic author gets a new favorite on a topic.
* Delete a forum: When a user deletes a forum.
* Delete a topic: When a user deletes a topic.
* Delete a reply: When a user deletes a reply.

= New Features =

* Ability to block users by profile type to earn anything from GamiPress. (Like [Block Users](https://wordpress.org/plugins/gamipress-block-users/ "Block Users") add-on, but with BuddyBoss profile types)
* Drag and drop settings to select which points types, achievement types and/or rank types should be displayed at frontend profiles, activities and listings and in what order.
* Drag and drop settings to select which points types, achievement types and/or rank types should be displayed at frontend on forums reply author details and in what order.
* Setting to select which elements should be displayed in activity streams.

= Backward Compatibility =

If you have been using the GamiPress BuddyPress and bbPress integrations, the BuddyBoss integration will still working with the old triggers that comes from those integrations so you don't need to reconfigure these requirements.

== Installation ==

= From WordPress backend =

1. Navigate to Plugins -> Add new.
2. Click the button "Upload Plugin" next to "Add plugins" title.
3. Upload the downloaded zip file and activate it.

= Direct upload =

1. Upload the downloaded zip file into your `wp-content/plugins/` folder.
2. Unzip the uploaded zip file.
3. Navigate to Plugins menu on your WordPress admin area.
4. Activate this plugin.

== Frequently Asked Questions ==

= How can I display GamiPress elements on profile, listing or activities? =

You will find all the settings to manage the tabs displayed by navigating to GamiPress > Settings > Add-ons > "BuddyBoss" and "BuddyBoss Profile Tab" boxes.

= How can setup elements to be displayed at frontend on reply author details at forums? =

After installing GamiPress - BuddyBoss integration, you will find the plugin settings on your WordPress admin area navigating to the GamiPress menu -> Settings -> Add-ons tab at box named "BuddyBoss Forums".

Just choose the points types, achievement types and/or rank types to be displayed at frontend, setup the display options you want and click the "Save Settings" button.

= How can I display user earnings on BuddyBoss activity feed? =

On each type edit screen (points type, achievement type and rank type) you will find setting to manage which elements display on BuddyBoss activity feed.

== Changelog ==

= 1.1.5 =

* **Bud Fixes**
* Prevent to show deleted elements on achievements lists.

= 1.1.4 =

* **Bud Fixes**
* Fixed conflict on members listings.

= 1.1.3 =

* **Improvements**
* Prevent PHP warnings if settings are not properly updated.

= 1.1.2 =

* **New Features**
* Added settings to display user earnings on members listing.
* Added settings to display user earnings on activities.
* Added settings to block users by member type to earn anything from GamiPress.
* **Improvements**
* Redistributed the add-on settings to make them more easy to configure.
* Fully reworked the add-on settings separating in one box the settings to display on profile top, activity and listing and in other the elements to display on the profile tabs.
* **Developer Notes**
* Centralization of the top, activity and listing display in one single function.
* Filters to override the top, activity and listing display options.

= 1.1.1 =

* **Improvements**
* Added extra checks to meet if member types modules is active.

= 1.1.0 =

* **Improvements**
* Ensure that BuddyBoss gets completely loaded to avoid missing function errors.

= 1.0.9 =

* **Improvements**
* Prevent to make use of the user progress functions if it's module is not active.

= 1.0.8 =

* **Improvements**
* Apply points format on user profile points.
* Prevent to display empty HTML on user profile.

= 1.0.7 =

* **Improvements**
* Prevent to trigger favorite topic event if author favorites himself.
* Prevent to display empty HTML on reply author details.
* Trigger profile progress update included if widget is not configured.

= 1.0.6 =

* **Bug Fixes**
* Fixed the join a private group listener.

= 1.0.5 =

* **Bug Fixes**
* Fixed typo that causes some errors on the BuddyBoss profile progress widget.
* **Improvements**
* Prevent to check profile progress if fields involved hasn't been configured.

= 1.0.4 =

* **New Features**
* New event: Get assigned to a specific profile type.
* New event: Remove a friendship.
* New event: Get a friendship removed.
* New event: Complete a minimum percent of your profile.

= 1.0.3 =

* **New Features**
* Added 5 new events based to support BuddyBoss Email Invites.

= 1.0.2 =

* **New Features**
* Added settings to show/hide the achievement and rank types label on forums.

= 1.0.1 =

* **Bug Fixes**
* Fixed incorrect link for events related to a specific group.

= 1.0.0 =

* Initial release
