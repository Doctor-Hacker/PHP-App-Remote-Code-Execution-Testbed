<?php
include("../includes/constants.inc.php");
/*define("DB_SERVER", "localhost" );
define("DB_SERVER_USERNAME", "root" );
define("DB_SERVER_PASSWORD", "" );
define("DB_DATABASE", "kalangi_eschools" );
*/


/**
* INCLUDES path
*/
if (!defined("INCLUDES_PATH")) {
	define("INCLUDES_PATH", "includes");
}

/**
*  TEMPLATES path
*/
if (!defined("TEMPLATES_PATH")) {
	define("TEMPLATES_PATH", "templates");
}
/*
*  SUB (ORDER TEMPLATES path
**/
if (!defined("ORDER_TEMPLATES_PATH")) {
	define("ORDER_TEMPLATES_PATH", TEMPLATES_PATH . DS . "sub");
}
/**
* LABEL path
*/
if (!defined("LABELS_PATH")) {
	define("LABELS_PATH", TEMPLATES_PATH . DS . "labels");
}
/**
*   CLASS path
*/
if (!defined("INCLUDES_CLASS_PATH")) {
	define("INCLUDES_CLASS_PATH", "includes/classes");
}

define("IMAGES_PATH", TEMPLATES_PATH . DS . "images");
/**
*  CSS path
*/
 if (!defined("CSS_PATH")){
	 define("CSS_PATH", "templates/css");
 }

/**
*  JAVASCRIPT path
*/
if (!defined("JS_PATH")) {
	 define("JS_PATH", INCLUDES_PATH . DS . "js");
 }


/*
* LABEL information.
**/

	define("USER_LOGIN", "User Login");
	define("ADMIN_CONTACT", "admin@eschool.com");
	define("META_TITLE", "Schoolerp");

// Class Variables

global $configuration;
/*
$configuration['soap'] = "http://www.phpobjectgenerator.com/services/soap.php?wsdl";
$configuration['homepage'] = "http://www.phpobjectgenerator.com";
$configuration['revisionNumber'] = "";
$configuration['versionNumber'] = "3.0d";

$configuration['setup_password'] = '';
*/
// to enable automatic data encoding, run setup, go to the manage plugins tab and install the base64 plugin.
// then set db_encoding = 1 below.
// when enabled, db_encoding transparently encodes and decodes data to and from the database without any
// programmatic effort on your part.
$configuration['db_encoding'] = 0;
/*
// edit the information below to match your database settings
if ($_SERVER['HTTP_HOST']=='sandbox786.com'){
	$configuration['db']	= 'kalangi_eschool'; //	database name
	$configuration['host']	= 'localhost';		//	database host
	$configuration['user']	= 'kalangi_eschool';			//	database user
	$configuration['pass']	= 'eschool';				//	database password
	$configuration['port'] 	= '3306';			//	database port
}else{*/

	$configuration['db']	= DB_DATABASE; //	database name
	$configuration['host']	= DB_SERVER;		//	database host
	$configuration['user']	= DB_SERVER_USERNAME;			//	database user
	$configuration['pass']	= DB_SERVER_PASSWORD;				//	database password
	$configuration['port'] 	= '3306';			//	database port
/*}*/

//proxy settings - if you are behnd a proxy, change the settings below
$configuration['proxy_host']	 = false;
$configuration['proxy_port']	 = false;
$configuration['proxy_username'] = false;
$configuration['proxy_password'] = false;

//plugin settings
$configuration['plugins_path'] = $_SERVER['DOCUMENT_ROOT'] . '/eschools/includes/plugins';  //absolute path to plugins folder, e.g c:/mycode/test/plugins or /home/phpobj/public_html/plugins

?>