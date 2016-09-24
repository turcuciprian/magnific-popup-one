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

                $theJson = '{"menus":[{"label":"Posts","type":"post","name":"posts","unique":true,"children":[],"$$hashKey":"object:45"},{"label":"Pages","type":"page","name":"pages","unique":true,"children":[],"$$hashKey":"object:46"},{"label":"Sidebars","type":"sidebars","name":"sidebars","unique":true,"pageTitle":"Custom Sidebar","pageDescription":"Custom Sidebar Description","capability":"manage_options","handler":"ab_menu_handler","children":[],"$$hashKey":"object:47"},{"label":"Rest Routes","type":"restRoutes","name":"restRoutes","unique":true,"children":[],"$$hashKey":"object:48"},{"label":"MPO Settings","type":"cPage","name":"mpoAdminPage1","unique":false,"children":[{"label":"General","name":"mpoSettings","context":"normal","priority":"default","fields":[{"name":"mpoAffectGallery","type":"checkbox","label":"Activate","description":"Activates the magnific popup functionality. Check this in order to make magnific popup active. If this is not checked, magnific popup functionality will not run.","extraText":"(Checked for true)","$$hashKey":"object:618"},{"name":"mpoCustImageClass","type":"textbox","label":"Custom image class","description":"The class that is going to be used to activate the magnific popup for images. Ex: a.magnific","$$hashKey":"object:4349"},{"name":"mpoApplyToGallery","type":"checkbox","label":"Apply to gallery","description":"If checked, applies the magnific popup to  default image galleries. Caution. The images must be set to link to media file.","extraText":"(Checked for true)","$$hashKey":"object:382"},{"name":"mpoCycle","type":"checkbox","label":"Cycle Trough images","description":"If the images are multiple with the same container class, check this if you want to be able to cycle trough the popup images","extraText":"( check for true)","$$hashKey":"object:2528"}],"$$hashKey":"object:60"},{"label":"Options","name":"mpoOptions","context":"normal","priority":"default","fields":[{"name":"disableOn","type":"checkbox","label":"disableOn","description":"If window width is less than the number in this option lightbox will not be opened and the default behavior of the element will be triggered. Set to 0 to disable behavior. Option works only when you initialize Magnific Popup from DOM element.","extraText":"check for true","$$hashKey":"object:843"},{"name":"mpoDOMW","type":"textbox","label":"Disable on Max Width","description":"Set a max width (just integer only (numbers only) the value will be turned in pixels","$$hashKey":"object:941"},{"name":"mpoKey","type":"textbox","label":"key","description":"Key option is a unique identifier of a single or a group of popups with the same structure. If you will not define it, DOM elements will be created and destroyed each time when you open and close popup.\n\nYou may (and should) set an equal key to different popups if their markup matches. By markup I mean options that change HTML structure of the popup (e.g. close icon placement and HTML code of it).\n\nFor example: you have many popups that show title, some text and button - you may use one key for all of them, so only one instance of this element is created. Same for popup that always contains image and caption.","$$hashKey":"object:1038"},{"name":"mpoMidClick","type":"checkbox","label":"midClick","description":"If set to true lightbox is opened if the user clicked on the middle mouse button, or click with Command/Ctrl key. Option works only when you initialize Magnific Popup from DOM el","extraText":"check for true","$$hashKey":"object:1991"},{"name":"mpoMainClass","type":"textbox","label":"mainClass","description":"String that contains classes that will be added to the root element of popup wrapper and to dark overlay. For example myClass, can also contain multiple classes - myClassOne myClassTwo.\nNo quotest when adding in the textbox","$$hashKey":"object:2086"},{"name":"mpoFocus","type":"checkbox","label":"focus","description":"String with CSS selector of an element inside popup that should be focused. Ideally it should be the first element of popup that can be focused. For example input or #login-input. Leave empty to focus the popup itself.","extraText":"check for true","$$hashKey":"object:2182"},{"name":"mpoCloseOnContentClick","type":"checkbox","label":"closeOnContentClick","description":"Close popup when user clicks on content of it. It is recommended to enable this option when you have only image in popup.","extraText":"check for true","$$hashKey":"object:2281"},{"name":"mpoCloseOnBgClick","type":"checkbox","label":"closeOnBgClick","description":"Close the popup when user clicks on the dark overlay.","extraText":"check for true","$$hashKey":"object:2376"},{"name":"mpoCloseBtnInside","type":"checkbox","label":"closeBtnInside","description":"If enabled, Magnific Popup will put close button inside content of popup, and wrapper will get class mfp-close-btn-in (which in default CSS file makes color of it change). If markup of popup item is defined element with class mfp-close it will be replaced with this button, otherwise close button will be appended directly.","extraText":"check for true","$$hashKey":"object:2471"},{"name":"mpoShowCloseBtn","type":"checkbox","label":"showCloseBtn","description":"Controls whether the close button will be displayed or not.","extraText":"check for true","$$hashKey":"object:2566"},{"name":"mpoEnableEscapeKey","type":"checkbox","label":"enableEscapeKey","description":"Controls whether pressing the escape key will dismiss the active popup or not.","extraText":"check for true","$$hashKey":"object:2663"},{"name":"mpoModal","type":"checkbox","label":"modal","description":"When set to true, the popup will have a modal-like behavior: it will not be possible to dismiss it by usual means (close button, escape key, or clicking in the overlay).\n\nThis is a shortcut to set closeOnContentClick, closeOnBgClick, showCloseBtn, and enableEscapeKey to false.","extraText":"check for true","$$hashKey":"object:2758"},{"name":"mpoAlignTop","type":"checkbox","label":"alignTop","description":"If set to true popup is aligned to top instead of to center. (basically all this option does is adds mfp-align-top CSS class to popup which removes styles that align popup to center).","extraText":"check for true","$$hashKey":"object:2855"},{"name":"mpoIndex","type":"textbox","label":"index","description":"Used for gallery. Defines starting index. If popup is initialised from DOM element, this option will be ignored.","$$hashKey":"object:2950"},{"name":"mpoFixedContentPos","type":"select","label":"fixedContentPos","description":"Popup content position. Can be auto, true or false. If set to true - fixed position will be used, to false - absolute position based on current scroll. If set to auto popup will automatically disable this option when browser does not support fixed position properly.","selectType":"custom","oArr":[{"label":"Auto","value":"auto","$$hashKey":"object:3141"},{"label":"True","value":"true","$$hashKey":"object:3157"},{"label":"False","value":"false","$$hashKey":"object:3170"}],"$$hashKey":"object:3046"},{"name":"mpoFixedBgPos","type":"select","label":"fixedBgPos","description":"Same as an option above, but it defines position property of the dark transluscent overlay. If set to false - huge tall overlay will be generated that equals height of window to emulate fixed position. It’ is recommended to set this option to true if you animate this dark overlay and content is most likely will not be zoomed, as size of it will be much smaller.","selectType":"custom","oArr":[{"label":"Auto","value":"auto","$$hashKey":"object:3281"},{"label":"False","value":"false","$$hashKey":"object:3297"},{"label":"True","value":"true","$$hashKey":"object:3310"}],"$$hashKey":"object:3186"},{"name":"mpoOverflowY","type":"select","label":"overflowY","description":"Defines scrollbar of the popup, works as overflow-y CSS property - any CSS acceptable value is allowed (e.g. auto, scroll, hidden). Option is applied only when fixed position is enabled.\n\nThere is no option overflowX, but you may easily emulate it just via CSS.","selectType":"custom","oArr":[{"label":"Auto","value":"auto","$$hashKey":"object:3420"},{"label":"Scroll","value":"scroll","$$hashKey":"object:3436"},{"label":"Hidden","value":"hidden","$$hashKey":"object:3449"}],"$$hashKey":"object:3323"},{"name":"mpoRemovalDelay","type":"textbox","label":"removalDelay","description":"Delay before popup is removed from DOM. Used for the animation. Default: 0","$$hashKey":"object:3462"},{"name":"mpoCloseMarkup","type":"textbox","label":"closeMarkup","description":"<button title=%title% type=button class=mfp-close>&#215;</button>\n\nMarkup of close button. %title% will be replaced with option tClose. Or the value imputed in this textbox","$$hashKey":"object:3558"},{"name":"mpoPrependTo","type":"textbox","label":"prependTo","description":"The DOM element to which popup will be added. Useful when you are using ASP.NET where popup should be inside form. Option available since 2013/12/04. Default: document.body","$$hashKey":"object:3653"},{"name":"mpoAutoFocusLast","type":"checkbox","label":"autoFocusLast","description":"If set to true last focused element before popup showup will be focused after popup close. Option available since 2015/12/16.","extraText":"check for true","$$hashKey":"object:3751"}],"$$hashKey":"object:765"}],"capability":"manage_options","handler":"mpoAP_menu_handler1","pageTitle":"Magnific Popup One Settings","$$hashKey":"object:57","pageDescription":"General functionality for Magnific popup one"}]}';
            if(class_exists('generalFunctionality')){
                $abGeneral = new generalFunctionality();
                $abGeneral->loadNew($theJson,$plugin_folder[$plugin_file]);
                }
              }
