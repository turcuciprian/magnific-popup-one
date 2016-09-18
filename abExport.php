<?php

        $abError = false;
        include_once ABSPATH.'wp-admin/includes/plugin.php';
        if (!is_plugin_active('admin-builder/admin-builder.php')) {
        if(!function_exists('sample_admin_notice__success'))
        {
          function sample_admin_notice__success()
          {
            $pluginInstalled = false;
            if (!function_exists('get_plugins')) {
              require_once ABSPATH.'wp-admin/includes/plugin.php';
            }
            $allPlugins = get_plugins();
            foreach ($allPlugins as $key => $value) {
              if ($key === 'admin-builder/admin_builder.php') {
                $pluginInstalled = true;
              }
             }
              if ($pluginInstalled){
                if (!is_plugin_active('admin-builder/admin_builder.php')) {
                  $abError = true;
                  $url = admin_url();
                  echo '<div class="notice notice-error is-dismissible">';
                  echo '<h3>Admin Builder Plugin is not ACTIVE!</h3>';
                  echo '<p>';
                  echo 'To get the full functionality , activate Admin Builder from the <a href="'.$url.'/plugins.php">plugins directory</a>.';
                  echo '</p>';
                  echo '</div>';
                } else {
                  $theJson = '';
                }
               } else {
                $abError = true;
                echo '<div class="notice notice-error is-dismissible">';
                echo '<h3>Admin Builder Plugin is not installed!</h3>';
                echo '<p>';
                echo 'To get the full functionality , install Admin Builder.';
                echo '</p>';
                echo '<p>';
                $action = 'install-plugin';
                $slug = 'admin-builder';
                $plugin_name = 'Admin Builder';
                $finalLink = wp_nonce_url(
                    add_query_arg(
                        array(
                            'action' => $action,
                            'plugin' => $slug
                        ),
                        admin_url( 'update.php' )
                    ),
                    $action.'_'.$slug
                );

                $install_link = '<a href="'.$finalLink.'" title="More info about '.$plugin_name.'">Install '.$plugin_name.'</a>';
                echo $install_link;
                echo '</p>';
                echo '</div>';
               }
              }
            add_action('admin_notices', 'sample_admin_notice__success');
           }
         }
               if (!$abError) {

                $theJson = '{"menus":[{"label":"Posts","type":"post","name":"posts","unique":true,"children":[],"$$hashKey":"object:45"},{"label":"Pages","type":"page","name":"pages","unique":true,"children":[],"$$hashKey":"object:46"},{"label":"Sidebars","type":"sidebars","name":"sidebars","unique":true,"pageTitle":"Custom Sidebar","pageDescription":"Custom Sidebar Description","capability":"manage_options","handler":"ab_menu_handler","children":[],"$$hashKey":"object:47"},{"label":"Rest Routes","type":"restRoutes","name":"restRoutes","unique":true,"children":[],"$$hashKey":"object:48"},{"label":"MPO Settings","type":"cPage","name":"mpoAdminPage1","unique":false,"children":[{"label":"Tab1","name":"mpoTab1Settings","context":"normal","priority":"default","fields":[{"name":"mpoAffectGallery","type":"checkbox","label":"Activate","description":"Activates the magnific popup functionality. Check this in order to make magnific popup active. If this is not checked, magnific popup functionality will not run.","extraText":"(Checked for true)","$$hashKey":"object:618"},{"name":"mpoCustImageClass","type":"textbox","label":"Custom image class","description":"The class that is going to be used to activate the magnific popup for images. Ex: a.magnific","$$hashKey":"object:4349"},{"name":"mpoApplyToGallery","type":"checkbox","label":"Apply to gallery","description":"If checked, applies the magnific popup to  default image galleries. Caution. The images must be set to link to media file.","extraText":"(Checked for true)","$$hashKey":"object:382"},{"name":"mpoCycle","type":"checkbox","label":"Cycle Trough images","description":"If the images are multiple with the same container class, check this if you want to be able to cycle trough the popup images","extraText":"( check for true)","$$hashKey":"object:2528"}],"$$hashKey":"object:60"}],"capability":"manage_options","handler":"mpoAP_menu_handler1","pageTitle":"Magnific Popup One Settings","$$hashKey":"object:57","pageDescription":"General functionality for Magnific popup one"}]}';
            if(class_exists('generalFunctionality')){
                $abGeneral = new generalFunctionality();
                $abGeneral->loadNew($theJson,$plugin_folder[$plugin_file]);
                }
              }
