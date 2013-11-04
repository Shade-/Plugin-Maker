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
	}
}

// create a new plugin
if($action == "plugin") {
	$page['title'] = "New plugin";
	if($PM->request_method == "post") {
		$PM->clean_input();
		// pluginlibrary
		if($PM->settings['pluginlibrary']) {
			$pluginlibrary = "\n\nif (!defined('PLUGINLIBRARY')) {
	define('PLUGINLIBRARY', MYBB_ROOT.'inc/plugins/pluginlibrary.php');
}";
		}
		// namespace
		$namespace = $PM->input['namespace'];
		if(empty($namespace)) {
			$namespace = strtolower(str_replace(" ", "", trim($PM->input['name'])));
		}
		// compatibility
		$compatibility = implode(",", $PM->input['compatibility']);
		// finally build content
		$content = "/**
 * {$PM->input['name']}
 * 
 * {$PM->input['description']}
 *
 * @package {$PM->input['name']}
 * @author  {$PM->input['author']}
 * @license 
 * @version {$PM->input['version']}
 */

if (!defined('IN_MYBB')) {
	die('Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.');
}{$pluginlibrary}

function {$namespace}_info() {
	return array(
		'name'			=>	'{$PM->input['name']}',
		'description'	=>	'{$PM->input['description']}',
		'website'		=>	'',
		'author'		=>	'{$PM->input['author']}',
		'authorsite'	=>	'{$PM->input['authorsite']}',
		'version'		=>	'{$PM->input['version']}',
		'compatibility'	=>	'{$compatibility}',
		'guid'			=>	''
	);
}";
		$PM->step_add($content,1);
	}
}

// list existing plugins
if($action == "pluginlist") {
	$page['title'] = "Pluginlist";
}

// build the page
$PM->build_page();