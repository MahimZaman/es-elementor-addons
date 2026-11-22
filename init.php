<?php

/**
 * Plugin Name: Elementor Addons by Emission Softwares
 * Description: Elegant quality elementor addons increasing the facility of your elementor plugin.
 * Author: Mahim Zaman
 * Plugin URI: https://condixia.com
 * Author URI: https://mahimzaman.com
 * Version: 0.9.0
 * Text Domain: es-ele-addons
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) return;

define('ESEA_PATH', trailingslashit(plugin_dir_path(__FILE__)));
define('ESEA_URL', trailingslashit(plugin_dir_url(__FILE__)));
define('ESEA_VERSION', '0.9.0');

// Autoload classes (simple PSR-4 style autoloader)
spl_autoload_register(function ($class) {
    if (strpos($class, 'ESEA\\' === 0)) {
        $class_name = str_replace('ESEA\\', '', $class);
        $file = __DIR__ . '/includes/' . str_replace('\\', '/', $class_name) . '.php';
        if (file_exists($file)) {
            include $file;
        }
    }
});

add_action('plugins_loaded', function () {
    if (did_action('elementor/loader')) {
        ESEA\Plugin::instance();
    }
});
