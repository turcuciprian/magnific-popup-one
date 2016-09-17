<?php
/*
  Plugin Name: Magnific Popup One
  Plugin URI: http://admin-builder.com
  Description: A plugin that Integrates the magnific popup popup script (from http://dimsemenov.com/plugins/magnific-popup/ ) to your site and makes images customly compatible, supports default wordpress gallery and can be configured for custom images to function.
  Version: 1.0
  Author: rootabout
  Author URI: http://admin-builder.com
  License: GPLv2 or later
  Text Domain: aB magnific popup
 */
 if (!function_exists('get_plugins')) {

                  require_once ABSPATH.'wp-admin/includes/plugin.php';
              }
              $plugin_folder = get_plugins('/'.plugin_basename(dirname(__FILE__)));
              $plugin_file = basename((__FILE__));
              $dir = plugin_dir_path( __FILE__ );
              if($dir.'/abExport.php'){
                require_once 'abExport.php';
              }
//magnific popup one enqueue script
 function mpoEnqueue(){
   wp_enqueue_script('mpoScripts', plugin_dir_url( __FILE__ ) .'src/jquery.magnific-popup.min.js');
   wp_enqueue_style('mpoStyles', plugin_dir_url( __FILE__ ) .'src/jquery.magnific-popup.css');
 }
 add_action('wp_enqueue_scripts','mpoEnqueue');
