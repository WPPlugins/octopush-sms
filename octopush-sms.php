<?php

/**
 * Octopush-sms.php
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://octopush.com
 * @since             0.0.1
 * @package           Octopush_Sms
 *
 * @wordpress-plugin
 * Plugin Name:       Octopush SMS
 * Plugin URI:        http://octopush.com/
 * Description:       This plugin allows to notify client and/or admin by sending an SMS when for example status of orders change. This plugin allows to create a campaign in order to send sms to a list of recipients as you can do with emails and newsletters.
 * Version:           1.3.0
 * Author:            octopush
 * Author URI:        http://octopush.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       octopush-sms
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Check if WooCommerce is active
 * */
if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))))
    return;

if ( ! class_exists( 'WC_API_Customers' ) ) {
    $WOOCOMMERCE_FOLDER = ABSPATH.'wp-content'.DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR.'woocommerce'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'api'.DIRECTORY_SEPARATOR.'legacy'.DIRECTORY_SEPARATOR.'v3'.DIRECTORY_SEPARATOR;
    require_once $WOOCOMMERCE_FOLDER.'class-wc-api-resource.php';
    require_once $WOOCOMMERCE_FOLDER.'class-wc-api-customers.php';
    require_once ABSPATH.'wp-content'.DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR.'woocommerce'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'class-wc-checkout.php';
}


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-octopush-sms-activator.php
 */
function activate_octopush_sms() {
    require_once plugin_dir_path(__FILE__) . 'includes'.DIRECTORY_SEPARATOR.'class-octopush-sms-activator.php';
    Octopush_Sms_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-octopush-sms-deactivator.php
 */
function deactivate_octopush_sms() {
    require_once plugin_dir_path(__FILE__) . 'includes'.DIRECTORY_SEPARATOR.'class-octopush-sms-deactivator.php';
    Octopush_Sms_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_octopush_sms');
register_deactivation_hook(__FILE__, 'deactivate_octopush_sms');

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes'.DIRECTORY_SEPARATOR.'class-octopush-sms.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_octopush_sms() {
    $plugin = new Octopush_Sms();
    $plugin->run();
}

run_octopush_sms();


