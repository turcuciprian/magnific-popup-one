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

                $theJson = '{"menus":[{"label":"Posts","type":"post","name":"posts","unique":true,"children":[{"label":"meta abc","name":"metabox1","context":"normal","priority":"default","fields":[{"name":"checkbox1","type":"checkbox","label":"Checkbox1","description":"Default checkbox Description text","extraText":"the text that goes at the right of the checkbox","$$hashKey":"object:826"},{"name":"textarea1","type":"textarea","label":"TextArea1","description":"Default TextArea Description text","$$hashKey":"object:921"}],"$$hashKey":"object:670"},{"label":"Metabox2","name":"metabox2","context":"side","priority":"default","fields":[],"$$hashKey":"object:748"}],"$$hashKey":"object:45"},{"label":"Pages","type":"page","name":"pages","unique":true,"children":[],"$$hashKey":"object:46"},{"label":"Sidebars","type":"sidebars","name":"sidebars","unique":true,"pageTitle":"Custom Sidebar","pageDescription":"Custom Sidebar Description","capability":"manage_options","handler":"ab_menu_handler","children":[],"$$hashKey":"object:47"},{"label":"Rest Routes","type":"restRoutes","name":"restRoutes","unique":true,"children":[],"$$hashKey":"object:48"},{"label":"Magnific Popup One","type":"cPage","name":"mpo1","unique":false,"children":[{"label":"Tab1","name":"tab1","context":"normal","priority":"default","fields":[{"name":"abc2","type":"textbox","label":"abc","description":"desc","$$hashKey":"object:267"},{"name":"textarea1","type":"textarea","label":"TextArea1","description":"Default TextArea Description text","$$hashKey":"object:383"},{"name":"timepicker1","type":"timepicker","label":"Timepicker1","description":"Default timepicker Description text","format":"H:i:s","$$hashKey":"object:478"},{"name":"bootstrapIcons1","type":"bootstrapIcons","label":"BootStrap Icons1","description":"Default Bootstrap Icons Description text","tSizes":[],"$$hashKey":"object:573"}],"$$hashKey":"object:60"}],"capability":"manage_options","handler":"ab_menu_handler1","pageTitle":"Custom Admin Page1","$$hashKey":"object:57"}]}';
            if(class_exists('generalFunctionality')){
                $abGeneral = new generalFunctionality();
                $abGeneral->loadNew($theJson,$plugin_folder[$plugin_file]);
                }
              }
