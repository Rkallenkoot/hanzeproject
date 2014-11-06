<?php
ini_set("SMTP","smarthost.hanze.nl");
ini_set('smtp_server', 'smarthost.hanze.nl');
ini_set("smtp_port","25");
ini_set("sendmail_from","r.kallenkoot@st.hanze.nl");

// Root path for inclusion
define("INC_ROOT", dirname(__DIR__));

// Composer autoloader
require_once INC_ROOT. "/vendor/autoload.php";

/* These are loaded by autoload.php
require_once "../app/config/paths.php";
	 require_once "../app/config/database.php";

	 require_once "core/app.php";
	 require_once "core/controller.php";
*/

define("BASE", "http://localhost/hanzeproject/public");

// Root path for assets
define("ASSET_ROOT",
	'http://'.$_SERVER['HTTP_HOST'].
	str_replace(
		$_SERVER['DOCUMENT_ROOT'],
		'',
		str_replace('\\', '/', INC_ROOT).'/public'
	)
);
session_start();