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
    wp_enqueue_style('tmr-style', plugin_dir_url(__FILE__).'/includes/assets/css/trebi_myaccount-min.css');
    /*wp_enqueue_script('tmr-script', plugin_dir_url(__FILE__).'/assets/js/tmr-main.min.js', array('jquery'), '1.0', true);*/
}
add_action('wp_enqueue_scripts', 'tmr_enqueued_assets');



// define plugin ROOT DIR
define('TREBI_WC_MYACCOUNT', dirname(__FILE__).'/');
//include functions files (php)
require TREBI_WC_MYACCOUNT.'includes/main-myaccount-functions.php';
require TREBI_WC_MYACCOUNT.'includes/custom-tab-functions.php';
require TREBI_WC_MYACCOUNT.'includes/render-myaccount.php';
require TREBI_WC_MYACCOUNT.'includes/billing-address.php';
require TREBI_WC_MYACCOUNT.'includes/shipping-address.php';
require TREBI_WC_MYACCOUNT.'includes/checkout-functions.php';
require TREBI_WC_MYACCOUNT.'includes/registration-functions.php';
require TREBI_WC_MYACCOUNT.'includes/cart-functions.php';


// ***************************************************************
// locate template to override factory settings
// ***************************************************************
function plugin_absolute_path() {
  // gets the absolute path to this plugin directory
  return untrailingslashit( plugin_dir_path( __FILE__ ) );
}

function myplugin_woocommerce_locate_template( $template, $template_name, $template_path ) {
  global $woocommerce;
  $_template = $template;
  if ( ! $template_path ) $template_path = $woocommerce->template_url;
  $plugin_path  = plugin_absolute_path() . '/woocommerce/';
  // Look within passed path within the theme - this is priority

  $template = locate_template(
    array(
      $template_path . $template_name,
      $template_name
    )
  );

  // Modification: Get the template from this plugin, if it exists
  if ( ! $template && file_exists( $plugin_path . $template_name ) )
    $template = $plugin_path . $template_name;

   // Use default template
  if ( ! $template )
    $template = $_template;

   // Return what we found
  return $template;
}
add_filter( 'woocommerce_locate_template', 'myplugin_woocommerce_locate_template', 10, 3 );
