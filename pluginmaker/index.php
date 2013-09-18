<?php

define(BASENAME, "index");
// start over
require_once "./core/class_core.php";
$action = $PM->action;
// declaring class and title
$page['title'] = "Plugin Maker";
$page['class'] = !empty($action) ? $action : "start";

// editing settings
if($action == "settings") {
	$page['title'] = "Settings";
}

// creating a new plugin
if($action == "plugin") {
	$page['title'] = "New plugin";
}

// build the page
$PM->build_page();