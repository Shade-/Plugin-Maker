<?php

define(BASENAME, "index");
require_once "./core/class_core.php";

$page['title'] = "Plugin Maker";
$page['class'] = "start";

// Class used for styling
if ($PM->action) {
	$page['class'] = $PM->action;
}

// Edit settings
if ($PM->action == "settings") {

	$page['title'] = "Settings";
	
	if ($PM->request_method == "post") {
	
		$PM->cache_settings();
		$PM->message("The settings have been updated correctly.", "success");
		
	}
	
}

// List existing plugins
if ($PM->action == "pluginlist") {
	$page['title'] = "Pluginlist";
}

if (!$PM->action) {
	$PM->clearfile();
}

$PM->build_page();

?>