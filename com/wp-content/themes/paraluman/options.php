<?php
define("BLANKET_URI", get_template_directory_uri() . "/");
define("BLANKET_ASSETS_URI", get_template_directory_uri() . "/assets/");
define("BLANKET_CSS_URI", get_template_directory_uri() . "/css/");
define("BLANKET_JS_URI", get_template_directory_uri() . "/js/");
define("BLANKET_VENDOR_URI", get_template_directory_uri() . "/vendor/");
define("BLANKET_INCLUDES_URI", get_template_directory_uri() . "/includes/");

define("BLANKET_DIR", get_template_directory() . "/");
define("BLANKET_DIR_CONTROLLERS", get_template_directory() . "/controllers/");
define("BLANKET_VIEWS", get_template_directory() . "/views/");
define("BLANKET_VENDOR", get_template_directory() . "/vendor/");
define("BLANKET_INCLUDES", get_template_directory() . "/includes/");

define('BLANKET_TEXT_DOMAIN', 'blanket-text-domain');

include get_template_directory()."/controllers/BlanketOptionsController.php";

global $post_id;
$blanket_options = new BlanketOptionsController();

add_action('admin_init', 'bto_admin_init');
function bto_admin_init() {
    global $blanket_options;
    $blanket_options->register();
}

add_action('admin_menu', 'blanket_add_menu_pages');
function blanket_add_menu_pages() {
    global $blanket_options;
    $blanket_options->pages();
}

 ?>