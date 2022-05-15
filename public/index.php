<?php
session_set_cookie_params(12 * 3600, '/');
session_start();


define('ROOT_DIR', dirname(__DIR__));
define('VIEW_DIR', ROOT_DIR . '/resources/views');

require_once(ROOT_DIR . '/vendor/autoload.php');

use Pecee\SimpleRouter\SimpleRouter as Router;
use JsonEnv\JsonEnv;

// Load helper methods
require_once(ROOT_DIR . '/helpers.php');

// Load environment
$env = new JsonEnv(ROOT_DIR . '/.env.json');
//$env->load();

// Load custom validation messages
require_once(ROOT_DIR . '/resources/i18n/custom_messages.php');
require_once(ROOT_DIR . '/resources/i18n/attribute_aliases.php');

// Set default Controller class namespace
Router::setDefaultNamespace('\App\Controllers');

// Load external routes file
require_once(ROOT_DIR . '/routes/web.php');

// Start the routing
Router::start();
