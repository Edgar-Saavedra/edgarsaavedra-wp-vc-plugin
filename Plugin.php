<?php
/*
Plugin Name: Visual Composer Plugins
Plugin URI: https://github.com/Edgar-Saavedra/edgarsaavedra-wp-vc-plugin
Description: A wordpress plugin to add custom visual composer elements
Version: 1.0
Author: Edgar-Saavedra
Text Domain: edgarsaavedra-wp-vc-plugin
Domain Path: /languages/

	License: GNU General Public License v2.0
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

global $CustomVcPlugin;
$CustomVcPlugin = dirname(plugin_basename(__FILE__));
global $WPCustomPlugins;
$WPCustomPlugins[$CustomVcPlugin] = array(
 "version" => '0.1',
 "plugin_path" => plugin_dir_path(__FILE__),
 "plugin_dirname" => $CustomVcPlugin,
 "plugin_url" => plugin_dir_url(__FILE__)
);

// don't load directly
if (!defined('ABSPATH')) {
    die('You shouldnt be here');
}


register_activation_hook(__FILE__, function(){
//    We need to make Visual Composer manditory
    if (!is_plugin_active('js_composer/js_composer.php')) {
        wp_die('Please activate Visual Composer, and try again!');
    }
});

if (!function_exists('custom_wp_vc_text_domain')) {
    /**
     * Loads plugin text domain so it can be used in translation
     */
    function custom_wp_vc_text_domain() {
        global $WPCustomPlugins;
        global $CustomVcPlugin;
        load_plugin_textdomain('wm-wp-custom-sp-maps', FALSE, $WPCustomPlugins[$CustomVcPlugin]['plugin_path'] . '/languages');
    }

    add_action('plugins_loaded', __NAMESPACE__ . '\\custom_wp_vc_text_domain');
}

//autloaded folder
$assets = dirname(__FILE__).'/src/';


//our autoloader
require(dirname(__FILE__).'/ClassAutoLoader.php');
$loader = \ClassAutoloader::getLoader();

//set and register our namespace
$loader->setPsr4('Custom\\Plugins\\CustomVCPlugins\\', $assets);
$loader->register();

//load our plugin data
$plugin = new \Custom\Plugins\CustomVCPlugins\Load();

// Activation Hook
register_activation_hook(
    __FILE__,
    [$plugin, 'activate']
);

// Deactivation Hook
register_deactivation_hook(
    __FILE__,
    [$plugin, 'deactivate']
);