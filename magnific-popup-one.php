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
              $dir = plugin_dir_path(__FILE__);
              if ($dir.'/abExport.php') {
                  require_once 'abExport.php';
              }
//magnific popup one enqueue script
 function mpoEnqueue()
 {
     global $abGen;
     $mpoAffectGallery = $abGen->getField('abOption_cPage_mpo1', 'mpoTab1Settings', 'mpoAffectGallery');
     if ($mpoAffectGallery) {
         wp_enqueue_script('jquery');
         wp_enqueue_script('mpoMagnificScripts', plugin_dir_url(__FILE__).'src/jquery.magnific-popup.min.js', array('jquery'));
         wp_enqueue_script('mpoCustomScript', plugin_dir_url(__FILE__).'src/script.js', array('jquery', 'mpoMagnificScripts'));

         //custom values
         $mpoApplyAll = $abGen->getField('abOption_cPage_mpo1', 'mpoTab1Settings', 'mpoApplyAll');
         $mpoCustImageClass = $abGen->getField('abOption_cPage_mpo1', 'mpoTab1Settings', 'mpoCustImageClass');
         $mpoApplyToGallery = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoTab1Settings','mpoApplyToGallery');
         $mpoCycle = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoTab1Settings','mpoCycle');
         $mpoFocus = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoFocus');

         //
         //Options fields
         //
         $extraOptions ='';

         $disableOn = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','disableOn');
         $mpoDOMW = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoDOMW');
         $mpoKey = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoKey');
         $mpoMidClick = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoMidClick');
         $mpoMainClass = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoMainClass');
         $mpoCloseOnContentClick = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoCloseOnContentClick');
         $mpoCloseOnBgClick = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoCloseOnBgClick');
         $mpoCloseBtnInside = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoCloseBtnInside');
         $mpoShowCloseBtn = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoShowCloseBtn');
         $mpoEnableEscapeKey = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoEnableEscapeKey');
         $mpoModal = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoModal');
         $mpoAlignTop = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoAlignTop');
         $mpoFixedContentPos = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoFixedContentPos');
         $mpoFixedBgPos = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoFixedBgPos');
         $mpoOverflowY = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoOverflowY');
         $mpoRemovalDelay = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoRemovalDelay');
         $mpoPrependTo = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoPrependTo');
         $mpoAutoFocusLast = $abGen->getField('abOption_cPage_mpoAdminPage1','mpoOptions','mpoAutoFocusLast');

         //disableON
         if($disableOn){
          //  $mpoDOMW
          $extraOptions .= ',disableOn: '.$mpoDOMW;
         }
         //key
         if(!empty($mpoKey)){
           $extraOptions .= ',key: '.$mpoKey;
         }
         //midClick
         if($mpoMidClick){
           $extraOptions .= ',midClick: true';
         }
         //mainClass
         if(!empty($mpoMainClass)){
           $extraOptions .= ',mainClass: \''.$mpoMainClass.'\'';
         }
         //closeOnContentClick
         if($mpoCloseOnContentClick){
           $extraOptions .= ',closeOnContentClick: true';
         }
         //closeOnBgClick
         if(!$mpoCloseOnBgClick){
           $extraOptions .= ',closeOnBgClick: false';
         }
         //closeBtnInside
         if(!$mpoCloseBtnInside){
           $extraOptions .= ',closeBtnInside: false';
         }
         //showCloseBtn
         if($mpoShowCloseBtn){
           $extraOptions .= ',showCloseBtn: false';
         }
         //enableEscapeKey
         if($mpoEnableEscapeKey){
           $extraOptions .= ',enableEscapeKey: false';
         }
         //modal
         if($mpoModal){
           $extraOptions .= ',modal: true';
         }
         //alignTop
         if($mpoAlignTop){
           $extraOptions .= ',alignTop: true';
         }
         //fixedContentPos
         if(!empty($mpoFixedContentPos)){
           $extraOptions .= ',fixedContentPos: '.$mpoFixedContentPos;
         }
         //fixedBgPos
         if(!empty($mpoFixedBgPos)){
           $extraOptions .= ',fixedBgPos: '.$mpoFixedBgPos;
         }
         //overflowY
         if(!empty($mpoOverflowY)){
           $extraOptions .= ',overflowY: '.$mpoOverflowY;
         }
         //removalDelay
         if(!empty($mpoRemovalDelay)){
           $extraOptions .= ',removalDelay: '.$mpoRemovalDelay;
         }
         //prependTo
         if(!empty($mpoPrependTo)){
           $extraOptions .= ',prependTo: '.$mpoPrependTo;
         }
         //autoFocusLast
         if(!$mpoAutoFocusLast){
           $extraOptions .= ',autoFocusLast: false';
         }

         if($mpoApplyToGallery){
           $mpoCustImageClass = '.gallery-icon a';
         }
         $galleryEnabled='';
         if($mpoCycle){
           $galleryEnabled = ",
            gallery: {
              enabled: true
            }";
         }

         if (!empty($mpoCustImageClass)) {
             $inlineScript = "
             jQuery(document).ready(function($){
               $('".$mpoCustImageClass."').magnificPopup({
                 type:'image'".$galleryEnabled."
                 ".$extraOptions."
                });
             });

             ";
         }
         wp_add_inline_script('mpoCustomScript', $inlineScript);
         wp_enqueue_style('mpoMAgnificStyles2', plugin_dir_url(__FILE__).'src/magnific-popup.css');
     }
 }

 add_action('wp_enqueue_scripts', 'mpoEnqueue');
