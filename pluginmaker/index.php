<?php

define(BASENAME, "index");
// start over
require_once "./core/class_core.php";
$action = $PM->action;
// declare class and title
$page['title'] = "Plugin Maker";
$page['class'] = !empty($action) ? $action : "start";

// edit settings
if($action == "settings") {
	$page['title'] = "Settings";
	if($PM->request_method == "post") {
		$PM->cache_settings();
		$PM->message("The settings have been updated correctly.", "success");
	}
}

// list existing plugins
if($action == "pluginlist") {
	$page['title'] = "Pluginlist";
}

// list existing plugins
if(!$action) {
	$PM->clearfile();
}

// build the page
$PM->build_page();