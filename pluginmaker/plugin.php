<?php

define(BASENAME, basename(__FILE__, '.php'));
// start over
require_once "./core/class_core.php";
$action = $PM->action;
// declare class and title
$page['title'] = "New plugin";
$page['class'] = !empty($action) ? $action : "start";

/* PLUGIN CREATION */
// infos
/*if($action == "info") {
	$page['title'] = "New plugin";
	if($PM->request_method == "post") {
		$PM->clean_input();
		// namespace
		$tempname = 'namespace';
		if(empty($PM->input[$tempname])) {
			$tempname = 'name';
		}
		$PM->input['namespace'] = strtolower(str_replace(" ", "", trim($PM->input[$tempname])));
		// set the filename of the new plugin
		$PM->setfile($PM->input['namespace'].".php");
		// compatibility
		$PM->input['compatibility'] = implode(",", $PM->input['compatibility']);
		// build the plugin
		$PM->step_add("start");
		$PM->message("The plugin was created successfully.", "success");
	}
}
// settings
if($action == "pl_settings") {
	$page['title'] = "Settings";
	if($PM->request_method == "post") {
		$PM->clean_input();
		$PM->step_add("settings");
		$PM->message("The plugin's settings were parsed and created successfully.", "success");
	}
}*/

$next = array(
	'info' => 'pl_settings',
	'pl_settings' => 'pl_templates',
);

if($PM->request_method == "post") {
	$PM->clean_input();
	if(!$PM->error) {
		$PM->step_add($action);
		$PM->message($PM->get_message($action), 'success', 0, 1);
		header("Location: plugin.php?action=".$next[$action]);
		exit;
	}
}

// build the page
$PM->build_page();