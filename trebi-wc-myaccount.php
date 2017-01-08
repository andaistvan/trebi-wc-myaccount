<?php
/**
 * Plugin Name: Trebi WooCommerce MYACCOUNT customization plugin
 * Plugin URI:
 * Description: WooCommerce - Trebi theme custom MYACCOUNT
 * Author: Arteriaweb
 * Author URI: http://arteriaweb.hu/
 * Version: 0.1
 * Text Domain: trebi-wc-myaccount.
 *
 * Copyright: (c) 2017 Arteriaweb (andaistvan@gmail.com)
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @author      Arteriaweb
 * @Category    Plugin
 *
 * @copyright   Copyright (c) 2016 Arteriaweb
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

//enque plugin scripts and stylesheets
function tmr_enqueued_assets()
{
    wp_enqueue_style('tmr-style', plugin_dir_url(__FILE__).'/assets/css/trebi_myaccount.min.css');
    /*wp_enqueue_script('tmr-script', plugin_dir_url(__FILE__).'/assets/js/tmr-main.min.js', array('jquery'), '1.0', true);*/
}
add_action('wp_enqueue_scripts', 'tmr_enqueued_assets');

// define plugin ROOT DIR
define('PLUGIN_DIR', dirname(__FILE__).'/');

//include functions files (php)
require PLUGIN_DIR.'includes/main-myaccount-functions.php';
