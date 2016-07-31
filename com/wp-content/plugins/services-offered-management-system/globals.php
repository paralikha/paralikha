<?php
/*
| ----------------------
| # Globals
| ----------------------
*/

define( 'SOMS_PLUGIN_PATH', plugin_dir_path(__FILE__) );
define( 'SOMS_PLUGIN_ASSETS', plugin_dir_url(__FILE__) . 'assets/' );
define( 'SOMS_PLUGIN_VIEW', plugin_dir_path(__FILE__) . 'views/' );
define( 'SOMS_PLUGIN_CONTROLLER', plugin_dir_path(__FILE__) . 'controllers/' );
define( 'SOMS_PLUGIN_CSS', plugin_dir_url(__FILE__) . 'css/' );
define( 'SOMS_PLUGIN_JS', plugin_dir_url(__FILE__) . 'js/' );

define( 'SOMS_TEXT_DOMAIN', 'services-offered' );

include("includes/helpers.php");
 ?>