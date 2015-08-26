<?php

/*
Plugin Name: ITDP Custom Roles
Description: Add custom Wordpress roles that enable ITDP colleagues to perform A/B testing, etc.
Version: 1.10
Author: Joe Westcott
Author URI: http://www.joewestcott.info/

Release Notes:
1.10 added Editor-Tester permissions to edit widgets and menus
1.00 release
*/

/* Start Adding Functions Below this Line */

function add_roles_on_plugin_activation() {

global $role;
if (!isset($role))
        $role = new WP_Roles();

// Copy standard Editor role into "auth" variable
$auth = $role->get_role( 'editor' );

// Create new role, and copy capabilities from "auth". This new role creation will silently fail if the role already exists.
$role->add_role( 'editor_tester', 'Editor-Tester', $auth->capabilities );

// Add custom capabilities
$role->add_cap( 'editor_tester', 'manage_options' );
$role->add_cap( 'editor_tester', 'edit_theme_options' );

}

// Create new role(s) when we activate the plugin.
register_activation_hook( __FILE__, 'add_roles_on_plugin_activation' );

/* Stop Adding Functions Below this Line */

?>