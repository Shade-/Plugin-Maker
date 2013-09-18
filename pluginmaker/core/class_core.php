<?php

/**
 * This is the core of Plugin Maker. Contains simple code used to build pages, get templates, write files with ease, etc.
 */

define("PM_CORE", dirname(__FILE__));
define("PLUGINPATH", dirname(PM_CORE)."/plugins/");

class PluginMaker {

	// the inputs received
	public $input = array();

	// the action, used to build every page
	public $action = "";
	
	// the method called
	public $request_method = "";
	
	// a comma-separated list of available pages
	public $allowed_pages = "plugin,settings";
	
	// init the class
	function __construct() {
		// clear the input
		$this->parse_incoming($_GET);
		$this->parse_incoming($_POST);
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$this->request_method = "post";
		} else if($_SERVER['REQUEST_METHOD'] == "GET") {
			$this->request_method = "get";
		}
		// validate the page
		$this->validate_page($this->input['action']);
	}
	
	// parses inputs
	function parse_incoming($array) {
		if(!is_array($array)) {
			return;
		}
		foreach($array as $key => $val) {
			$this->input[$key] = $val;
		}
	}
	
	// builds a page
	function build_page() {
		// header
		$this->get("header");
		// the actual page
		$this->get($this->action);
		// footer
		$this->get("footer");
		exit;
	}
	
	// gets a template
	function get($template) {
		global $PM;
		$file = PM_CORE."/styles/templates/$template.php";
		if(file_exists($file)) require_once $file;
	}
	
	// echoes some page infos declared in every page such as icon class, page name, etc.
	function pageinfo($info) {
		global $page;
		if(!empty($info)) echo $page[$info];
	}
	
	// validates a page to output
	function validate_page($action) {
		$this->action = !empty($action) && in_array($action, explode(",", $this->allowed_pages)) ? $action : BASENAME;
	}
	
	// reverts one or more steps
	function step_revert($file, $steps) {
		$new_content = "";
		if(!empty($steps)) {
			if(!is_array($steps)) $steps = array($steps);
			$old_content = file_get_contents(PLUGINPATH.$file);
			// detect steps
			preg_match_all('#(?:/\* STEP ([0-9]*) \*/)[^/\*]*#i', $old_content, $matches);
			$toremove = array_intersect($matches[1], $steps);
			// remove the old steps
			foreach($toremove as $key => $match) {
				$new_content = str_ireplace($matches[0][$key], "", $old_content);
			}
		}
		file_put_contents(PLUGINPATH.$file, $new_content);
	}
	
	// writes something on a file as a "step"
	function step_add($file, $content, $step) {
		if(!is_dir(PLUGINPATH)) mkdir(PLUGINPATH);
		$content = "/* STEP $step */\n\n".$content;
		file_put_contents(PLUGINPATH.$file, $content, FILE_APPEND);
	}
	
	// debugs any data
	function debug($data) {
		echo "<pre>";
		echo print_r($data);
		echo "</pre>";
		exit;
	}
}

// initialize the class
global $PM;
$PM = new PluginMaker();