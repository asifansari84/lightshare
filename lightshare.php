<?php
/*
Plugin Name: Lightshare
Description: LightShare is a lightweight, high-performance social media sharing plugin built with a focus on speed and minimal code footprint.
Version: 1.0.0
Author: Nazim Husain
Author URI: https://nazimansari.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: lightshare
Domain Path: /languages
Requires at least: 5.0
Tested up to: 6.7
Requires PHP: 7.2

Lightshare is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Lightshare is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Lightshare. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// If this file is called directly, abort.
if (! defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('LIGHTSHARE_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lightshare-activator.php
 */
function activate_lightshare() {
	require_once plugin_dir_path(__FILE__) . 'includes/class-lightshare-activator.php';
	Lightshare_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lightshare-deactivator.php
 */
function deactivate_lightshare() {
	require_once plugin_dir_path(__FILE__) . 'includes/class-lightshare-deactivator.php';
	Lightshare_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_lightshare');
register_deactivation_hook(__FILE__, 'deactivate_lightshare');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-lightshare.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_lightshare() {

	$plugin = new Lightshare();
	$plugin->run();
}
run_lightshare();
